<?php
  require('init.php');
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Installation</title>
    <link rel="stylesheet" href="assets/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css"/>
  </head>
  <body>

    <?php
      require('templates/header.html');
    ?>
    <div class="jumbotron jumbotron-fluid custjumbotron">
      <div class="container">
        <h1 class="display-3"><a href="index.php">EnacPack</a></h1>
        <p class="lead">For easy and fast installation<br />Now just copy past this link in your terminal and wait for the end</p>
      </div>
    </div>
    <div class='container'>
    <?php
      $pathFile = "./shell-files/";
      $my_file = "";

      foreach ($_POST['check_app'] as $app) {
        $my_file .= $app;
      }
      $url = "http://128.178.62.223/www/EnacPack/shell-files/". $my_file;
      $json = $shellJSON->getJSONdata();
      $h = $json['header']['shell'];

      $pShell = "";
      if(isset($_POST['submit'])){//to run PHP script on submit
        if(!empty($_POST['check_app'])){
          foreach($json['command'] as $commands){
            $names = $commands['name'];
            $shells = $commands['shell'];
            foreach ($_POST['check_app'] as $selected) {
              if($selected == $names){
                $pShell .= $shells;
              }
            }
          }
        }
      }
      $fullfilenname = $pathFile . $my_file;
      $handle = fopen($fullfilenname, 'w') or die('Cannot open file:  '.$fullfilenname); //implicitly creates file
      $data = $h . $pShell;
      fwrite($handle, $data);
      fclose($handle);?>
      <form>
        <div class="input-group">
          <input type="text" class="form-control" value="<?php echo $url;?>" placeholder="path to the file" id="copy-input" />
          <span class="input-group-btn">
            <button class="btn btn-default" type="button" id="copy-button" data-toggle="tooltip" data-placement="button" title="Copy to Clipboard">Copy</button>
          </span>
        </div>
      </form>
      <?php require('templates/footer.html'); ?>
    </div>
  </body>
</html>
