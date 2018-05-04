<?php
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  require_once 'php/init.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EnacPack</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css"/>
  </head>
  <body>
    <?php require('templates/header.html'); ?>
    <div class="jumbotron jumbotron-fluid custjumbotron">
      <div class="container">
        <h1 class="display-3"><a href="index.php">EnacPack</a></h1>
        <p class="lead">For easy and fast installation<br />Check the box(es) of app's that you want to install and then just click [install it] and follow the lead on the next page</p>
      </div>
    </div>
    <div class="container">
      <hr />
      <form action="install.php" method="post">
        <div class="card-deck custcard-deck">
        <?php
          $json = $shellJSON->getJSONdata();

          foreach ($json['command'] as $commands) {
            $id = $commands['id'];
            $name = $commands['name'];

            echo '<div class="card animated bounceIn " style="max-width 300px">
                    <div class="img-div">
                      <img class="card-img-top custimgtop" alt="'. $name . '" src="assets/images/LogoAPP/' . $name . '.png" />
                    </div>
                    <div class="card-body custcard-body">
                      <p class="card-title">' . $name . '</p>
                      <input id="card-val" class="card-text" type="checkbox" name="check_app[]" value="'. $name . '" />
                    </div>
                  </div>';
          }?>
        </div>
        <div class="text-center">
          <input type="submit" name ="submit" value="Install it" class="btn btn-danger btn-lg custbtn"/>
        </div>
      </form>
    <?php require('templates/footer.html'); ?>
  </div>
  </body>
</html>
