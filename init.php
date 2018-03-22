<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$shellJSON = new handleJsonFile('./assets/shellCom.json');
//$jsonHandler = new codeJson();


class handleJsonFile {
  private $filename;

  function __construct($file = './assets/shellCom.json') {
    $this->filename = $file;
  }

  function getJSONdata() {
    $this->data = file_get_contents($this->filename);
    $this->json =json_decode($this->data);
    return $this->json;
  }
}
