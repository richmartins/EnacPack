<?php defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'application/libraries/tequila.php';


class Auth extends CI_Controller {
    private $tequilaClt;
    private $data = [];

    function __construct(){
        parent::__construct();
        $this->load->model('applications');
        $this->load->helper('cookie');
        $this->tequilaClt = new TequilaClient();
    }

    function login(){
        $this->tequilaClt->SetApplicationName('ENACPACK');
        $this->tequilaClt->SetWantedAttributes(array('uniqueid','name','firstname','unit', 'unitid', 'where', 'group'));
        $this->tequilaClt->SetWishedAttributes(array('email', 'title'));
        // $this->tequilaClt->SetWantedAttributes(array('ENAC-IT'));
        $this->tequilaClt->SetCustomFilter('unit=ENAC-IT');
        $this->tequilaClt->SetApplicationURL( base_url() . 'auth/login');
        $this->tequilaClt->Authenticate();

        $_SESSION['sKey'] = $this->tequilaClt->GetKey();
        redirect('auth');
    }

    function logout() {
        $this->tequilaClt->Logout(base_url()); #<<<<<<<<<<<< wtf of url i have to put here | see later
    }

    function process_edit(){
        if(! isset($_SESSION['sKey'])){
            redirect('auth/login');
        }
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
        if(! isset($_SESSION['sKey'])){
            redirect('auth/login');
        }

        var_dump($_COOKIE);
        var_dump($this->tequilaClt);


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