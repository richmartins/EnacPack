<?php
//get the id of app's that have been clicked in the last page
//compare the id's with the id's in the json file and "if" it's the same -> echo the shell in one random page
//then show : curl -S < url of the random page > | sh
// dont forget the "header part" of the shell

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/style.css"/>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
</head>
<body>
  <div class="headerImg">
    <div class="headItem"><img  alt="EnacLogo" src="images/LOGO-enac-it3.png" width="193px" height="189px"/></div>
    <div class="headItem"><img alt="EpflLogo" src="images/Logo_EPFL.png" width="173px" height="169px" /></div>
  </div>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3">EnacPack</h1>
      <p class="lead">EnacPack is a API for the installation of basic software.</p>
    </div>
  </div>
  <?php

    $my_file =  generateRandomString() . ".txt";

      //echo "<p>"; uncomment everything to see what will be written in the file
      $data  = file_get_contents('./asset/shellCom.json');
      $json = json_decode($data);
      $h = $json->header[0]->shell;

      //echo nl2br($h) . '\n';
      if(isset($_POST['submit'])){//to run PHP script on submit
        if(!empty($_POST['check_app'])){
          foreach($json->command as $commands){
            $ids = ($commands->id);
            $shells = ($commands->shell);
            foreach ($_POST['check_app'] as $selected) {
              if($selected == $ids){
              //echo $ids . "<br />"; test
              $pShell .= $shells;
              //echo nl2br($shells) . '\n';
              }
            }
          }
        }
      }
    //echo "</p>";
    //Download => PKG

   ?>

 </div>
 <hr /><div id="footer">
   <p>Ri.Tenorio@ENACIT3@EPFL©</p>
 </div>
</div>
<script type="text/javascript" href="scripts/script.js"></script>
</body>
</html>
