<?php
require("init.php");

if ($_POST["method"]=="applyButton"){
  handleApply($_POST);
}

function handleApply($myPost) {
  $json_file = file_get_contents('assets/shellCom.json');
  $json_dec = json_decode($json_file, true);

  $new_id = $myPost['id'];
  $new_shell = $myPost['shell'];

  foreach ($json_dec['command'] as $k => $v) {
    if($v['id'] == $myPost['id']){
      $v['id'] = $new_id;
      $v['shell'] = $new_shell;
    }
  }

  foreach(array_keys($json_dec) as $v){
    $v = iconv('UTF-8','ISO-8859-9', $v);
  }

  $enc = json_encode($json_dec);

  file_put_contents('assets/shellCom.json', $enc);
}
