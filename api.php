<?php
require("init.php");

if ($_POST["method"]=="applyButton"){
  handleApply($_POST);
}

function handleApply($myPost) {

  $file_to_handle = fopen('assets/shellCom.json', 'r+');

  while(!feof($file_to_handle)){
    $line = fgets($file_to_handle);
    $plaintext=str_replace("\n"," ",$line);

    $pos_id = strpos($plaintext, '"id"');
    $pos_shell = strpos($plaintext, '"shell"');


    if($pos_id){
        $id = explode(":", $plaintext);
        $shell = explode(":", $plaintext);

        if($id[1] == $myPost['id'].", "){
            error_log('ID in the file : ' . $id[1]);
            error_log('ID posted : ' . $myPost['id']);
        }
      //error_log('Shell : ' . $shell[1]);
      }
    }
    fclose($file_to_handle);
}
