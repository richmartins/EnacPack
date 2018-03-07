<?php
require("init.php");
$logger->addInfo('api.php');


if ($_POST["method"]=="applyButton"){
  handleApply($_POST);
}

function handleApply($param) {
  //$logger->addInfo('handleApply1');

  error_log(var_export($param, true));
  
  $handle = fopen('assets/shellCom.json', 'a') or die('Cannot open file:  the json'); //implicitly creates file


  foreach ($jsonfile->command as $value) {
    $ids=$value->id;
    $shells=$value->shell;

    if($ids == $param['id']){
      $shells = $sendjsonfile->shell;
    }
  }

  fclose($handle);

  error_log(fread($handle));
  error_log($handle);
  echo "{resolve:success}";
}
