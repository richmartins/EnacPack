<?php
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");

  require_once 'php/init.php';

  try {
    if (isset($_POST["applyButton"])){
      handleApply($_POST, $shellJSON);
    }

    if (isset($_POST["addButton"])){
      handleAdd($_POST, $shellJSON);
    }

    if (isset($_POST["delButton"])){
        handleDel($_POST, $shellJSON);
    }


  } catch (RuntimeException $e) {
      echo $e->getMessage();

  }

?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/styles/style.css"/>
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

        echo '<option value="add">New shell...</option></select>';
      ?>
    </div>
    <form action="adder.php" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
         <input class="form-control" id="inputName" name="name" required/><br />
       </div>
        <label class="col-sm-2 col-form-label">ID</label>
        <div class="col-sm-10">
         <input class="form-control" id="inputId" name="id" required/><br />
       </div>
       <label class="col-sm-2 col-form-label">Shell</label>
       <div class="col-sm-10">
         <textarea id="area" name="shell" class="form-control" rows="8" required></textarea><br />
       </div>
       <div class="offset-sm-2 col-sm-10">
           <input id="input_file" type="file" name="uploadPngFile" hidden>
           <span class="btn btn-danger btn-lg custbtn" id='select_file'>Browse Icon...</span>
       </div>
       <div class="offset-sm-2 col-sm-10">
           <button name="applyButton" id="applyButton" class="btn btn-danger btn-lg custbtn" >apply</button>
           <button name="addButton" id="addButton" class="btn btn-danger btn-lg custbtn" >add</button>
           <button name="delButton" id="delButton" class="btn btn-danger btn-lg custbtn" >delete</button>
       </div>
      </div>
    </form>

    <?php require('templates/footer.html');?>
    </div>
  </body>
</html>

<?php
    function handleApply($myPost, $json) {

      $json_dec = $json->getJSONdata();

      $new_name = $myPost['name'];
      $new_id = $myPost['id'];
      $new_shell = $myPost['shell'];

      for ($i=0; $i < count($json_dec['command']); $i++) {
          if($json_dec['command'][$i]['id'] == $myPost['id']){
              $json_dec['command'][$i]['name'] = $new_name;
              $json_dec['command'][$i]['id'] = $new_id;
              $json_dec['command'][$i]['shell'] = $new_shell;
          }
      }


      foreach(array_keys($json_dec) as $v){
        $v = iconv('UTF-8','ISO-8859-9', $v);
      }

      $enc = json_encode($json_dec);

      file_put_contents('assets/shellCom.json', $enc);
    }

    function handleAdd($myPost, $json){
      $json_dec = $json->getJSONdata();

      $new_name = $myPost['name'];
      $new_id = $myPost['id'];
      $new_shell = $myPost['shell'];

      $i = count($json_dec['command']);

      $json_dec['command'][$i]['name'] = $new_name;
      $json_dec['command'][$i]['id'] = $new_id;
      $json_dec['command'][$i]['shell'] = $new_shell;

      foreach(array_keys($json_dec) as $v){
        $v = iconv('UTF-8','ISO-8859-9', $v);
      }

      $enc = json_encode($json_dec);

      file_put_contents('assets/shellCom.json', $enc);

    }

    function handleDel($myPost, $json){
      $delete = false;
      $json_dec = $json->getJSONdata();

      /*for ($i=0; $i < count($json_dec['command']); $i++) {
        $json_dec['command'][$i] = $json_dec['command'][$i];
        if($json_dec['command'][$i]['id'] == $myPost['id']){
          unset($json_dec['command'][$i]['id']);
          $delete = true;
        }
      }*/

      if($delete = true){
        $i = 0;
        foreach(array_keys($json_dec['command']) as $k => $v){
          echo $json_dec['command'][$k]['id'];
          echo $k . " = > " . $v;
        }
        $delete = false;
      }

      foreach(array_keys($json_dec) as $v){
        $v = iconv('UTF-8','ISO-8859-9', $v);
      }

      $enc = json_encode($json_dec);

      file_put_contents('assets/shellCom.json', $enc);
    }
?>
