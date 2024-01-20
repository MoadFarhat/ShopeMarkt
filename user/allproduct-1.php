<?php
require_once('../php/phpConect/mysql_connact.php');
    
$comm=$conn_link->query("SELECT * FROM user WHERE UserID ='$_GET[id]'" )or die ("error");
      $f=mysqli_fetch_array($comm);

      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($f);

?>