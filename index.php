<?php

  $html = require_once('templates/template.html');


  $data  = file_get_contents('./asset/shellCom.json', FILE_USE_INCLUDE_PATH);
  $json = json_decode($data, TRUE);
  foreach ($json->{'shell'} as $key => $value) {
    if(!is_array($value)){
      echo $key . '=>' . $value . '<br/>';
    } else {
      foreach ($value as $key => $val){
        echo $key . '=>' . $value . '<br />';
      }
    }
  }

?>
