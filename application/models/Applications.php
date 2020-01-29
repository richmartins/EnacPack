<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Applications extends CI_Model {
    private $raw;

    function __construct() {
        parent::__construct();
        $this->raw = json_decode(file_get_contents(base_url() . 'public/installer_scripts.json'));
    }

    function getApplications(){
        return $this->raw;
    }
}
