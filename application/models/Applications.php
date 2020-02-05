<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Default model to manipulate data in installer_scripts.json in "public/" folder
 */
class Applications extends CI_Model {
    private $raw;
    /**
     * Put installer_scripts.json content in $this->raw
     */
    function __construct() {
        parent::__construct();
        $this->raw = json_decode(file_get_contents(base_url() . 'public/installer_scripts.json'));
    }
    /**
     * Give installer_scripts.json decoded
     * @return object 
     */
    function getApplications(){
        return $this->raw;
    }

    /**
     * Check if applications exists in installer file script
     * @args String $name
     * @return boolean
     */
    function checkApplicationsExsits($name){
        foreach($this->raw->command as $k => $obj){
            if($obj->name === $name){
                return true;
            }
        }
        return false;
    }

    /**
     * give script in function of id passed
     * @args Int id
     * @return mixed
     */
    function getScript($id) {
        foreach($this->raw->command as $k => $obj) {
            if($id == $k){
                return $obj;
            }
        }
        return $error = 'No script was found';
    }

    /**
     * update the bash script in json file and the name at the id passed
     * @args String name, Int id, String script
     * @return boolean
     */
    function updateScript($name, $id, $newScript) {
        $rawArray = (array) $this->raw;
        if(self::checkApplicationsExsits($name)){
            $newData = [
                'name' => $name,
                'shell' => $newScript
            ];

            unset($rawArray['command'][$id]);
            $rawArray['command'][$id] = $newData;
            $rawArray['command'] = array_values($rawArray['command']);
            //encode to json to save
            $result = file_put_contents(FCPATH . "public/installer_scripts.json", json_encode($rawArray));
            if($result === false) {
                $error = 'An error occured while updating the file, please try again, or contact the webmaster';
                return $error;
            }else {
                return true;
            }
        }
    }

    /**
     * delete in installer file script the application in argument
     * @args String $name, Int $id
     * @return mixed
     */
    function deleteApplication($name, $id){
        $rawArray = (array) $this->raw;

        if($rawArray) {
            unset($rawArray["command"][$id]);
            $rawArray["command"] = array_values($rawArray["command"]);
            file_put_contents( FCPATH . "public/installer_scripts.json", json_encode($rawArray));
            unlink( FCPATH .  '/public/app-icons/' . $name . '.png');
        }

        if(!self::checkApplicationsExsits($name)){
            $error = 'Could not delete the script of ' . $name;
            return $error;
        }

        if(file_exists(FCPATH .'/public/app-icons/' . $name  .'png')){
            $error = 'Could not delete image file ' . $name . '.png ';
            return $error;
        }

        return true;
    }
}
