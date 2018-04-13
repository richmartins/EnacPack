<?php
  require_once 'init.php';

  $json_dec = $shellJSON->getJSONdata();


  $new_content = 'omggggggg work please';

  $id = 2;

  foreach ($json_dec['command'] as $key => $value) {
    if($value['id'] == $id){
        $value['shell'] = $new_content;
    }
  }

  foreach(array_keys($json_dec) as $v){
    $v = iconv('UTF-8','ISO-8859-9', $v);
  }

  $enc = json_encode($json_dec);

  file_put_contents('assets/shellCom.json', $enc);
