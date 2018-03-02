<?php
require('init.php');
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
  </head>
  <body>
    <?php require('templates/header.html');?>
    <div class="jumbotron jumbotron-fluid custjumbotron">
      <div class="container">
        <h1 class="display-3">EnacPack</h1>
        <p class="lead">For easy and fast installation<br /></p>
      </div>
    </div>
    <div class="container">
      <?php
        $json = $shellJSON->getJSONdata();
        echo '<select id="selector" name="appNameSelec[]">';
        if(isset($_POST['appNameSelec'])){
          $appIdNameSel = $_POST['appNameSelec'];
        } else {
          $appIdNameSel = '';
        }
        foreach ($json->command as $app) {
          $names = ($app->name);
          if ($appIdNameSel == $names ){
            echo '<option value="' . $names . '" selected="selected">';
          } else {
            echo '<option value="' . $names .'">';
          }
          echo $names . '</option>';
        }
        echo '</select>';
      ?>
  </div>
  <div class="container">
    <form method="POST" name="myForm" action="">
      <label>ID</label>
      <input id="inputId" name="id"/><br />

      <label>Shell</label>
      <textarea id="area" name="textShell" rows="20" cols="70"></textarea><br />

      <button id="applyButton">apply</button>
      <button onclick="add(); return false;">add</button>
      <button onclick="delete(); return false;">delete</button>

    </form>
  </div>
  <?php require('templates/footer.html');?>
  <script src="scripts/scriptjquery.js" type="text/javascript"></script>
  </body>
</html>
