  <?php

    $my_file = "./PKG/Firefox.pkg";

    if (file_exists($my_file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($my_file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($my_file));
    readfile($my_file);
    exit;
    }

   ?>
