<?php
require("init.php");
$logger->addInfo('api.php');


if ($_POST["method"]=="applyButton"){
  handleApply($_POST);
}

function handleApply($param) {
  error_log(var_export($param, true));
  $logger->addInfo('handleApply1');
  /*$handle = fopen($pathFile, 'w') or die('Cannot open file:  '.$fullfilenname); //implicitly creates file*/
  echo "{resolve:success}";
}
