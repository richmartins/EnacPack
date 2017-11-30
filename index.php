<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
  </head>
  <body>
    <?php require('templates/header.html'); ?>
    <div class="container">
    <hr />
    <form action="install.php" method="post">
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
      <?php require('templates/footer.html'); ?>
    </div>
  </body>
</html>
