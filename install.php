<?php
//get the id of app's that have been clicked in the last page
//compare the id's with the id's in the json file and "if" it's the same -> echo the shell in one random page
//then show : curl -S < url of the random page > | sh
// dont forget the "header part" of the shell

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instllation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
  </head>
    <?php
      require('templates/header.html');
      echo "<div class='container'>";
      $pathFile = "./shell-files/";
      $my_file = "";

      foreach ($_POST['check_app'] as $app) {
        $my_file .= $app;
      }
      $nameFile = "http://128.178.62.223/www/EnacPack/shell-files/". $my_file .".sh";

        //echo "<p>"; uncomment <p> to see what will be written in the file
        $data  = file_get_contents('./asset/shellCom.json');
        $json = json_decode($data);
        $h = $json->header[0]->shell;

        //echo nl2br($h) . '\n';
        $pShell = "";
        if(isset($_POST['submit'])){//to run PHP script on submit
          if(!empty($_POST['check_app'])){
            foreach($json->command as $commands){
              $names = ($commands->name);
              $shells = ($commands->shell);
              foreach ($_POST['check_app'] as $selected) {
                if($selected == $names){
                //echo $ids . "<br />"; test
                $pShell .= $shells;
                //echo nl2br($shells) . '\n';
                }
              }
            }
          }
        }
      //echo "</p>";
      $fullfilenname = $pathFile . $my_file;
      $handle = fopen($fullfilenname, 'w') or die('Cannot open file:  '.$fullfilenname); //implicitly creates file
      $data = $h . $pShell;
      fwrite($handle, $data);
      echo '<input class="form-control" type="text" value=" curl -S ' . $nameFile .' | sh" />' ;

      require('templates/footer.html'); ?>
    </div>
  </body>
</html>
