<?php

  $html = require_once('templates/template.html');


  $data  = file_get_contents('./asset/shellCom.json', FILE_USE_INCLUDE_PATH);

  $json = json_decode($data);


  foreach ($json->command as $shellcom) {
    if(strpos($shellcom->shell, "\n") !== FALSE){
      echo '<br />';
    }

    echo $shellcom->shell . "<br />";

  }

?>
