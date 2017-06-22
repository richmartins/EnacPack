<?php

  $html = require_once('templates/template.html');

  $data  = file_get_contents('./asset/shellCom.json', FILE_USE_INCLUDE_PATH);

  $json = json_decode($data);

  //gotta prepare the loop that will generate the cards with the Radio Button
  foreach ($json->command as $commands){
    $id = $commands->id;
    $name = $commands->name;
    echo $id;
    echo $name;
    $img = '<img alt=" ' . $name . ' " src="./asset/' . $name . '.png"  />';
    $lab = '<label>' . $name . '</label><br /> ';
    $input = '<input type="radio" name=" ' . $name . ' " id=" ' . $id . '" />';

    //add to the html but how ?
  }

  //where i will parse the shells command

  foreach ($json->command as $commands) {
  if(str_replace($commands->shell, "\n", '<br />') /*!== FALSE*/){
      echo '<br />';
    }

    //echo $shellcom->shell . "<br />";

  }

?>
