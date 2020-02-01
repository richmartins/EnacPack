<?php defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'application/libraries/tequila.php';


class Auth extends CI_Controller {
    private $tequilaClt;
    private $data = [];
    private $sKey;
    private $user;

    function __construct(){
        parent::__construct();
        $this->load->model('applications');
        $this->load->helper('cookie');
        $this->tequilaClt = new TequilaClient();
    }

    function login(){
        $this->tequilaClt->SetApplicationName('ENACPACK');
        $this->tequilaClt->SetWantedAttributes(array('ENAC-IT'));
        $this->tequilaClt->SetApplicationURL( base_url() . 'auth/');
        
        if(! $this->tequilaClt->Authenticate()){
            echo'not logged';
        } else {
            // $org  = $this->tequilaClt->getValue('org');
            $this->user = $this->tequilaClt->getValue('user');
            // $host = $this->tequilaClt->getValue('host');
            $this->sKey = $this->tequilaClt->GetKey();

            $_COOKIE['user'] = $this->user;
            $_COOKIE['sKey'] = $this->sKey;
        }
    }

    function logout() {
        $this->tequilaClt->logout(base_url() . 'auth/login');
    }

    function process_edit(){
        //Check if post script or img
        if( null !== $this->input->post('script')){
            //update script in json file
            $result = $this->applications->updateScript($this->input->post('name'), $this->input->post('id'), $this->input->post('script'));
        }
        if (null !== $this->input->post('img')){
            //update image
            echo 'do something with the image';
        } 
    }

    function index(){
        if(! isset($_COOKIE['TequilaPHP'])){
            redirect('auth/login');
        }

        var_dump($_COOKIE);


        $this->data['title'] = 'Settings';
        $this->data['description'] = '';
        $this->data['commands'] = $this->applications->getApplications()->command;

        if( null !== $this->input->get('name') && null !== $this->input->get('delete') && null !== $this->input->get('id')){
            if ($this->input->get('delete') == true) {
                //check if name applications exists
                foreach($this->data['commands'] as $command) { #<<<<<<<<<<<<<<< can be optimized with checkApplicationsExists
                    if($command->name === $this->input->get('name')){
                        // if true delete it the name
                        $result = $this->applications->deleteApplication($this->input->get('name'), $this->input->get('id'));
                        if($result){
                            redirect('auth/');
                        }else {
                            
                            $error = $result;
                            // $this->session->set_flashdata('error', $error);
                            redirect('auth/');
                        }
                    }
                }
            } else {
                //redirect to Edit  page
                $this->data['title'] = 'Edit ' ; # <<<< concat name of app editing
                $this->data['command'] = $this->applications->getScript($this->input->get('id'));

                $this->load->view('templates/header', $this->data);
                $this->load->view('edit', $this->data);
                $this->load->view('templates/footer', $this->data);
            }
        } else {
            $this->load->view('templates/header', $this->data);
            $this->load->view('settings', $this->data);
            $this->load->view('templates/footer', $this->data);
        }
    }
}