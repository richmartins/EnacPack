<?php
  require_once 'init.php';

  $json_file = file_get_contents('assets/shellCom.json');
  $json_dec = json_decode($json_file, true);

  $new_content = 'he';

  $i = 1;

  function save_content($json_dec, $index, $new_content){
    $json_dec['command'][$i]['shell'] = $new_content;


    foreach(array_keys($json_dec) as $v){
      $v = iconv('UTF-8','ISO-8859-9', $v);
    }

    $enc = json_encode($json_dec);

    file_put_contents('assets/shellCom0.json', $enc);
  }
