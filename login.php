<?php
  require_once 'php/init.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/styles/stylelogin.css" />
  <title>Login</title>
</head>
<body>
  <?php require('templates/header.html') ?>
  <div class="jumbotron jumbotron-fluid custjumbotron">
    <div class="container">
      <h1 class="display-3"><a href="index.php">EnacPack</a></h1>
      <p class="lead">For easy and fast installation<br />
                      This page is only for administrators. If you are not, no need to be here !</p>
    </div>
  </div>
  <div class="container">
      <div class="raw">
          <div>
              <div class="form-login">
              <h4 class="custh4">ENAC IT3 admin</h4>
              <input type="text" id="userName" class="form-control input-md chat-input" placeholder="username" />
              </br>
              <input type="text" id="userPassword" class="form-control input-md chat-input" placeholder="password" />
              </br>
              <div class="wrapper">
              <span class="group-btn">
                  <a href="adder.php" class="btn btn-danger btn-lg">login</a>
              </span>
              </div>
              </div>
          </div>
      </div>
      <?php require('templates/footer.html'); ?>
  </div>
</body>
</html>
