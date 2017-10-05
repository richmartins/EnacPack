<?php
  //useless right now
  function cardF($json){
      foreach ($json->command as $commands){

        $id = $commands->id;
        $name = $commands->name;

        $img = ' "<div class="card"><img alt=" ' . $name . ' " src="./asset/' . $name . '.png"  />';
        $lab = '<label>' . $name . '</label><br /> ';
        $input = '<input type="radio" name=" ' . $name . ' " id=" ' . $id . '" /></div>';
        //add to the html
      }
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
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
      <div class="container">
      <hr />
      <form action="pkg.php" method="post">
      <div class="card-deck" style="display: flex;">
          <?php
            //loading database(json)
            $data  = file_get_contents('./asset/shellCom.json');
            $json = json_decode($data);

            foreach ($json->command as $commands) {

              $id = ($commands->id);
              $name = ($commands->name);

              echo '<div class="card" style="width 300px"><img class="card-img-top" alt="'. $name . '" src="./images/LogoAPP/' . $name . '.png" height="60px" width="60px"/><div class="card-body"><p class="card-title">' . $name . '</p><input class="card-text" type="checkbox" name="check_app[]" value="' . $name .'.pkg " /></div></div>';

            }?>
      </div>
      <div class="text-center">
        <input type="submit" name ="submit" value="Install" class="btn btn-secondary"/>
      </div>
    </form>
    </div>
      <hr /><div id="footer">
        <p>Ri.Tenorio@ENACIT3@EPFL©</p>
      </div>
    </div>
    <script type="text/javascript" href="scripts/script.js"></script>
  </body>
</html>
