<?php
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
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta charset="utf-8" />
    <title>Accueil</title>
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
      <div class="card-deck" style="display: flex;">
          <?php
            //loading database(json)
            $data  = file_get_contents('./asset/shellCom.json');
            $json = json_decode($data);

            foreach ($json->command as $commands) {

              $id = ($commands->id);
              $name = ($commands->name);

              echo '<div class="card" style="width 300px">';
              echo '<img class="card-img-top" alt="'. $name . '" src="./images/LogoAPP/' . $name . '.png" height="60px" width="60px"/>';
              echo '<div class="card-body">';
              echo '<p class="card-title">' . $name . '</p>';
              echo '<input class="card-text" type="checkbox" name="' . $name . '" id="' . $id .'" aria-label="Radio button for following text input">';
              echo '</div></div>';
            }?>
    </div>
    <button type="button" class="btn btn-secondary">Install</button>
  </div>
      <hr /><div id="footer">
        <p>Richard©</p>
      </div>
    </div>
    <script type="text/javascript" href="scripts/script.js"></script>
  <!--  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
  </body>
</html>
