<?php
  require_once 'init.php';

  $json_dec = $shellJSON->getJSONdata();


  $new_content = 'omggggggg asdasdaswork please';

  $id = 2;
  $index=0;

  #$json_dec['command'][$id]['shell'] = $new_content;

  for ($i=0; $i < count($json_dec['command']); $i++) {
      if($json_dec['command'][$i]['id'] == $id){
          $json_dec['command'][$i]['shell'] = $new_content;
      }
  }
  var_dump($json_dec);

  foreach(array_keys($json_dec) as $v){
    $v = iconv('UTF-8','ISO-8859-9', $v);
  }

  $enc = json_encode($json_dec);

  file_put_contents('assets/shellCom.json', $enc);
