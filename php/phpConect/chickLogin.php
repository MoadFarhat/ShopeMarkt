<?php
session_start();
    if(!ISSET($_SESSION['user_id']))
        {
            header('location:../login.php');
        }
?>
