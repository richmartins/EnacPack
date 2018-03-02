<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* This is a init file which should be required on every other file to be
   sure that one will be able to use composer tools... (e.g. logger, csv)
*/
require_once __DIR__.'/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
global $logger;
$logger = new Logger('my_logger');
$shellJSON = new handleJsonFile('./asset/shellCom.json');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->addInfo('My logger is now ready');

class handleJsonFile {

  private $filename;
  function __construct($file = './asset/shellCom.json') {
    $this->filename = $file;
  }

  function getJSONdata() {
    $this->data = file_get_contents($this->filename);
    $this->json =json_decode($this->data);
    return $this->json;
  }
}
