<?php
require('init.php');
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Page</title>
    <link rel="stylesheet" href="assets/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
  </head>
  <body>
    <?php require('templates/header.html');?>
    <div class="jumbotron jumbotron-fluid custjumbotron">
      <div class="container">
        <h1 class="display-3"><a href="index.php">EnacPack</a></h1>
        <p class="lead">For easy and fast installation<br /></p>
      </div>
    </div>
    <div class="container">
      <form method="POST" name="myForm" action="">
      <div class="selector-div">
      <?php
        $json = $shellJSON->getJSONdata();
        echo '<select class="custom-select" id="selector" name="appNameSelec[]">';
        if(isset($_POST['appNameSelec'])){
          $appIdNameSel = $_POST['appNameSelec'];
        } else {
          $appIdNameSel = '';
        }
        foreach ($json['command'] as $app) {
          $names = $app['name'];
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
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">ID</label>
      <div class="col-sm-10">
       <input class="form-control" id="inputId" name="id"/><br />
     </div>
     <label class="col-sm-2 col-form-label">Shell</label>
     <div class="col-sm-10">
       <textarea id="area" name="textShell" class="form-control" rows="8"></textarea><br />
     </div>
     <div class="offset-sm-2 col-sm-10">
       <button id="applyButton" class="btn btn-danger btn-lg custbtn">apply</button>
       <button id="addButton" class="btn btn-danger btn-lg custbtn">add</button>
       <button id="delButton" class="btn btn-danger btn-lg custbtn">delete</button>
     </div>
    </div>
    </form>
    <?php require('templates/footer.html');?>
    </div>
  </body>
</html>
