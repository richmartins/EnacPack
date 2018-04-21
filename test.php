<?php
require_once "init.php";

$json_dec = $shellJSON->getJSONdata();

$new_id = 25000;
$new_shell = "lolololo";

$i = count($json_dec['command'])+1;

$json_dec['command'][$i]['id'] = $new_id;
$json_dec['command'][$i]['shell'] = $new_shell;

echo $json_dec['command'][$i]['shell'];

foreach(array_keys($json_dec) as $v){
  $v = iconv('UTF-8','ISO-8859-9', $v);
}

$enc = json_encode($json_dec);

file_put_contents('assets/shellCom.json', $enc);
