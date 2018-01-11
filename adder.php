
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
  <?php require('templates/header.html')?>
  <div class="jumbotron jumbotron-fluid custjumbotron">
    <div class="container">
      <h1 class="display-3">EnacPack</h1>
      <p class="lead">For easy and fast installation<br /></p>
    </div>
  </div>

<div class="container">
  <form id="adderForm" method="post">
    <?php
      $data  = file_get_contents('./asset/shellCom.json');
      $json = json_decode($data);


      if(isset($_POST['appNameSelec'])){
        $appIdNameSel = $_POST['appNameSelec'];
        echo $appIdNameSel . '<br />';
      } else {
        echo 'bugged <br />';
      }

      echo '<select id="selector" name ="appNameSelec" onchange="change()" >';
      foreach ($json->command as $app) {
        $names = ($app->name);
        echo '<option value="' .$names . '" selected="selected">'. $names . '</option>';
      }

      echo '</select><br />
            </from>
            <button >Refresh</button><br />';


      $ids = ($app->id);
      $shells = ($app->shell);
      echo '<label>ID</label>
            <input name="id" value="'. $ids . '"/><br />
            <label>Shell</label>
            <input name="shell value"' . $shells .'"/><br />';
    ?>

    <button >aplly</button>

  </div>

  <?php require('templates/footer.html')?>
</body>
</html>
