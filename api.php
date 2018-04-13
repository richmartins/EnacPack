<?php
  require_once 'init.php';

  if ($_POST["method"]=="applyButton"){

    handleApply($_POST, $shellJSON);
  }

  function handleApply($myPost, $json) {

    $json_dec = $json->getJSONdata();
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

    error_log($json_dec['command'][1]['shell']);


  }
