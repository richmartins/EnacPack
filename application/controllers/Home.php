<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    private $data = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('applications');
        $this->load->helper('file');
    }

    public function index(){
        $applications = $this->applications->getApplications();

        $this->data['applications'] = $applications->command;
        $this->data['title'] = 'Home';
        $this->data['description'] = "For easy and fast installation<br />
                                    Check the box(es) of app's that you want to 
                                    install and then just click [install] and 
                                    follow the lead on the next page";

		$this->load->view('templates/header', $this->data);
		$this->load->view('home', $this->data);
		$this->load->view('templates/footer');
    }

    public function process_input_home() {
        $selected = $this->input->get('checked_app');
        $filename = '';
        $script = '';

        
        $script .= $this->applications->getApplications()->header->shell;
        
        foreach($this->applications->getApplications()->command as $command){
            foreach ($selected as $app){
                if ($command->name === $app) {
                    $filename .= $app;
                    $script .= $command->shell;
                }
            }
        }
        
        print_r($script);
        //create bash file
        $fullfilename = FCPATH . 'public/installer/' . $filename;
        $handle = fopen($fullfilename, 'w') or die('Cannot open file:  '.$fullfilename); //implicitly creates file
        if(fwrite($handle, $script)){
            echo 'file was written';
            //render view
        } else {
            $error = ['error' => 'unable to write file'];
            $this->session->set_flashdata('error', $error);
            redirect('home');
        }
        fclose($handle);
    }
}