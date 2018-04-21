<?php
  require_once 'init.php';

  if ($_POST["method"]=="applyButton"){
    handleApply($_POST, $shellJSON);
  }

  if ($_POST["method"]=="addButton"){
    handleAdd($_POST, $shellJSON);
  }

  if ($_POST["method"]=="delButton"){
      handleDel();
  }

  function handleApply($myPost, $json) {

    $json_dec = $json->getJSONdata();

    $new_name = $myPost['name'];
    $new_id = $myPost['id'];
    $new_shell = $myPost['shell'];

    for ($i=0; $i < count($json_dec['command']); $i++) {
        if($json_dec['command'][$i]['id'] == $myPost['id']){

            $json_dec['command'][$i]['name'] = $new_name;
            $json_dec['command'][$i]['id'] = $new_id;
            $json_dec['command'][$i]['shell'] = $new_shell;
        }
    }
    error_log('handle apply');


    foreach(array_keys($json_dec) as $v){
      $v = iconv('UTF-8','ISO-8859-9', $v);
    }

    $enc = json_encode($json_dec);

    file_put_contents('assets/shellCom.json', $enc);
  }

  function handleAdd(){
    $json_dec = $json->getJSONdata();

    $new_name = $myPost['name'];
    $new_id = $myPost['id'];
    $new_shell = $myPost['shell'];

    $i = count($json_dec['command'])+1;

    $json_dec['command'][$i]['id'] = $new_name;
    $json_dec['command'][$i]['id'] = $new_id;
    $json_dec['command'][$i]['shell'] = $new_shell;

    foreach(array_keys($json_dec) as $v){
      $v = iconv('UTF-8','ISO-8859-9', $v);
    }

    $enc = json_encode($json_dec);

    file_put_contents('assets/shellCom.json', $enc);

  }

  function handleDel(){
      error_log('inner del function');
  }
