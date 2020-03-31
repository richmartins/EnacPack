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

    function isLogged(){
        if($_SESSION['user'] !== null){
            return true;
        }
        redirect('auth/login');
    }

    function login(){
        $this->tequilaClt->SetApplicationName('ENACPACK');
        $this->tequilaClt->SetWantedAttributes(array('uniqueid','name','firstname','unit', 'unitid', 'where', 'group'));
        $this->tequilaClt->SetWishedAttributes(array('email', 'title'));
        $this->tequilaClt->SetCustomFilter('unit=ENAC-IT');
        $this->tequilaClt->setApplicationURL(base_url() . 'auth/login');
        $this->tequilaClt->Authenticate();

        redirect('auth/settings');
    }

    function logout() {
        $this->tequilaClt->Logout(base_url());
    }

    function process_edit(){
        self::isLogged();

        $name   = $this->input->post('name');
        $id     = $this->input->post('id');
        $script = $this->input->post('script');

        //update script in json file
        if( null !== $script ) {
            $res = $this->applications->updateScript($name, $id, $script);
            if($res !== true){
                $error = $res;
                redirect('auth/?name=' . $name . '&id=' . $id . '&delete=0' . '&error=' . $error);
            }
        }

        //update image
        if ($_FILES['img']['size'] !== 0){
            $filename  = $this->input->post('name');
            $ext       = 'png';
            $file_name = $this->input->post('name') .'.' . $ext;

            $config['upload_path']          = './public/app-icons/';
            $config['allowed_types']        = 'png';
            $config['file_name']            = $file_name;
            $config['max_size']             = 500;
            $config['max_width']            = 512;
            $config['max_height']           = 512;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('img')){
                $error = ['error' => $this->upload->display_errors()];
                redirect('auth/?error=' . $error . '&name=' . $name . '&id=' . $id . '&delete=0');
            }
        }
        redirect('auth');
    }

    function settings(){
        self::isLogged();

        $this->data['title'] = 'Settings';
        $this->data['description'] = "For easy and fast installation<br />
                                      Check the box(es) of app's that you want to install and then just click [install] and follow the lead on the next page";
        $this->data['commands'] = $this->applications->getApplications()->command;

        //render view settings page
        $this->load->view('templates/header', $this->data);
        $this->load->view('settings', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    function edit(){
        self::isLogged();

        $id   = $this->input->get('id');
        $name = $this->input->get('name');

        //fetching data to render view edit page
        $this->data['title']       = 'Edit ' . $name . ' | EnacPack';
        $this->data['command']     = $this->applications->getScript($id);
        $this->data['description'] = "Edit page for application " . $name;
        
        //render view edit page
        $this->load->view('templates/header', $this->data);
        $this->load->view('edit', $this->data);
        $this->load->view('templates/footer', $this->data);
    }

    function delete(){
        seft::isLogged();

        $name   = $this->input->get('name');
        $delete = $this->input->get('delete');
        $id     = $this->input->get('id');

        if( $name !== null && $delete !== null && $id !== null ){
            //check if name applications exists
            if($this->applications->checkApplicationsExsits($name)){
                $result = $this->applications->deleteApplication($name, $id);
                if($result){
                    redirect('auth/settings');
                }else{
                    //error
                    $error = $result;
                    $this->session->set_flashdata('error', $error);
                    redirect('auth/settings');
                }
            }
        }
    }

    function index(){
        self::isLogged();

        redirect('auth/settings');
    }
}