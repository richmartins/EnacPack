<?php

  //loading database(json)
  $data  = file_get_contents('./asset/shellCom.json');
  $json = json_decode($data);


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
<html>
  <head>
    <meta charset="utf-8" />
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
  </head>
  <body>
    <div id="container">
      <div class="header">
        <div class="headItm"><img  alt="EnacLogo" src="images/LOGO-enac-it3.png" width="173px" height="169px"/></div>
        <div class="headItm"><h1>EnacPack</h1></div>
        <div class="headItm"><img alt="EpflLogo" src="images/Logo_EPFL.png" width="173px" height="169px" /></div>
      </div>
      <div class="description">
        <p>EnacPack is a API for the installation of basic software.</p>
      </div><hr />
      <div class="flex-item">

      </div>
      <hr/><div>
        <p>Richard©</p>
      </div>
    </div>
    <script type="text/javascript" href="scripts/script.js"></script>
  </body>
</html>
