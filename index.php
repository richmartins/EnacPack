<?php

  libxml_use_internal_errors(true);
  //loading html
  $html = file_get_contents('templates/template.html');

  $classname = 'flex-items';

  //instancing object that will make me point in the DOM
  $doc = new DOMDocument;
  $doc->loadHTML($html);

  $myelem = $doc->createElement('div', 'test');
  $dom->appendChild($element);
  echo $dom->saveHTML();

  //object that point class
  $xpath = new    ($doc);

  $selector = $xpath->query("//*[@class='" . $classname . "']");

  //loading database(json)
  $data  = file_get_contents('./asset/shellCom.json');
  $json = json_decode($data);

  //cardF($json, $selector);

  echo $html;

  //var card while be where the code are generated in the html
  //$card = $xpath->getElementsByClassName($expression);

  //generate the cards
  //cardF($json, $card);


function cardF($json, $card){
    foreach ($json->command as $commands){

      $id = $commands->id;
      $name = $commands->name;

      $img = ' "<div class="card"><img alt=" ' . $name . ' " src="./asset/' . $name . '.png"  />';
      $lab = '<label>' . $name . '</label><br /> ';
      $input = '<input type="radio" name=" ' . $name . ' " id=" ' . $id . '" /></div>';
      //add to the html
      $card .= $img;
      $card .= $lab;
      $card .= $input;
    }
  }


  function parse(){
    //where i will parse the shells command
    foreach ($json->command as $commands) {
    if(str_replace($commands->shell, "\n", '<br />') /*!== FALSE*/){
        echo '<br />';
      }

      //echo $shellcom->shell . "<br />";

    }
  }

?>
