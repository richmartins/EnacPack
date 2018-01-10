<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./styles/style.css" />
  <link rel="stylesheet" type="text/css" href="./styles/stylelogin.css" />
  <title>Login</title>
</head>
<body>
  <?php require('templates/header.html') ?>
  <div class="jumbotron jumbotron-fluid custjumbotron">
    <div class="container">
      <h1 class="display-3">EnacPack</h1>
      <p class="lead">For easy and fast installation<br />
                      This page is only for administrators. If you are not, no need to be here !</p>
    </div>
  </div>
  <div class="container">
      <div class="raw">
          <div class="cutposition centered">
              <div class="form-login">
              <h4 class="custh4">ENAC IT3 admin</h4>
              <input type="text" id="userName" class="form-control input-md chat-input" placeholder="username" />
              </br>
              <input type="text" id="userPassword" class="form-control input-md chat-input" placeholder="password" />
              </br>
              <div class="wrapper">
              <span class="group-btn">
                  <a href="#" class="btn btn-danger btn-lg">login <i class="fa fa-sign-in"></i></a>
              </span>
              </div>
              </div>
          </div>
      </div>
  </div>
  <?php require('templates/footer.html'); ?>
</body>
</html>
