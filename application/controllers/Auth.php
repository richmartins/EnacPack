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
        $this->data['logged'] = (isset($_SESSION['sKey'])) ? $_SESSION['sKey'] : null ;

    }

    function login(){
        $this->tequilaClt->SetApplicationName('ENACPACK');
        $this->tequilaClt->SetWantedAttributes(array('uniqueid','name','firstname','unit', 'unitid', 'where', 'group'));
        $this->tequilaClt->SetWishedAttributes(array('email', 'title'));
        $this->tequilaClt->SetCustomFilter('unit=ENAC-IT');
        $this->tequilaClt->SetApplicationURL( base_url() . 'auth/login');
        $this->tequilaClt->Authenticate();
        $_SESSION['sKey'] = $this->tequilaClt->GetKey();
        redirect('auth');
    }

    function logout() {
        $this->tequilaClt->Logout(base_url());
    }

    function process_edit(){
        if(! isset($_SESSION['sKey'])){
            redirect('auth/login');
        }
        $result = [];

        //update script in json file
        if( !empty($this->input->post('script'))){
            $res = $this->applications->updateScript($this->input->post('name'), $this->input->post('id'), $this->input->post('script'));
            if($res !== true){
                $error = $res; # <<<<<<<<<< pass this to the next page
                redirect('auth/?name=' . $this->input->post('name') . '&id=' . $this->input->post('id'));
        }
        //update image
        if (!empty($_FILES['img'])){
            $filename  = $this->input->post('name');
            $ext       = 'png';
            $file_name = $this->input->post('name') .'.' . $ext;

            $config['upload_path']          = './public/app-icons/';
            $config['allowed_types']        = 'png';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('img')){
                $error = array('error' => $this->upload->display_errors());
                redirect('auth/?error=' . $error . '&name=' . $this->input->post('name') . '&id=' . $id . '&delete=0');
            }
        }

        redirect('auth');
    }

    function index(){
        if(! isset($_SESSION['sKey'])){
            redirect('auth/login');
        }
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