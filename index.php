<?php

  libxml_use_internal_errors(true);
  //loading html
  $html = file_get_contents('templates/template.html');

  //instancing object that will make me point in the DOM
  $doc = new DOMDocument;
  @$doc->loadHTML($html);

  $classname = 'flex-items';
  //object that point class CSS
  $xpath = new DOMXPath($doc);

  $nodes = $finder->query("//*[contains(@class, '$classname')]");

  //loading database(json)
  $data  = file_get_contents('./asset/shellCom.json');
  $json = json_decode($data);

  //selecting the things you know
  //$card = $xpath->getElementsByClassName($expression);

  //generate the cards
  //cardF($json, $card);


  //function that generate the cards
  function cardF($json, $card){
    foreach ($json->command as $commands){

      $id = $commands->id;
      $name = $commands->name;

      $img = ' "<div class="card"><img alt=" ' . $name . ' " src="./asset/' . $name . '.png"  />';
      $lab = '<label>' . $name . '</label><br /> ';
      $input = '<input type="radio" name=" ' . $name . ' " id=" ' . $id . '" /></div>';
      //add to the html but how ?
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
