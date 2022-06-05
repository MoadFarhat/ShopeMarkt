<?php
$database['host']='localhost';//للاتصال
$database['username']='root';
$database['userpass']='';
$database['name']='shopemarkt';
$conn_link=mysqli_connect($database['host'],$database['username'],$database['userpass'],$database['name'])or die(mysqli_connect_error());
?>