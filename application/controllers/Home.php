<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home
 */
class Home extends CI_Controller {
    private $data = [];
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('applications');
        $this->load->helper('file');;
    }
    
    /**
     * index
     *
     * @return void
     */
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
    
    /**
     * processInputHome
     *
     * @return void
     */
    public function processInputHome() {
        $selected = $this->input->get('checked_app');
        if(empty($selected)){
            $error = 'You must select at least one application';
            // $this->session->set_flashdata('error', $error);
            redirect('home');
        }

        $filename = '';
        $script   = '';
        $script  .= $this->applications->getApplications()->header->shell;
        
        foreach($this->applications->getApplications()->command as $command){
            foreach ($selected as $app){
                if ($command->name === $app) {
                    $filename .= $app;
                    $script .= $command->shell;
                }
            }
        }


        //create shell script
        $fullfilename = FCPATH . 'public/installer/' . $filename;
        $handle = fopen($fullfilename, 'w') or die('Cannot open file:  ' . $fullfilename); //implicitly creates file
        if(fwrite($handle, $script)){
            echo 'file was written';
            //render view
            redirect('install/?file='.$filename);
        } else {
            $error = '⚠️ unable to write file, please try again ⚠️';
            // $this->session->set_flashdata('error', $error);
            redirect('home');
        }
        fclose($handle);
    }
    
    /**
     * install
     *
     * @return void
     */
    public function install () {
        $name = $this->input->get('file');
        $url = base_url() . 'public/installer/' . $name;
        $this->data['title'] = 'Install';
        $this->data['description'] = "For easy and fast installation<br />
                                    Now just copy the command below and follow the instructions";
        $this->data['url'] = $url;
        $this->load->view('templates/header', $this->data);
        $this->load->view('install', $this->data);
        $this->load->view('templates/footer');
    }
}