  <?php

    //$my_file = $_POST['check_app'];
    //creating the script file
    $file = 'Firefox.pkg';
    //echo $my_file[0];

    header('Content-Disposition: attachement; filename="PKG/' . $file . '"');
    header('Content-Type: application/vnd.apple.installer+xml');
    readfile('PKG/' . $file);
    header('index.php');

   ?>
