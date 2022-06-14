<?php
require_once("../php/phpConect/chickLogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shope Markt</title>
    <!-- Main Shope Markt Css File -->
    <link rel="stylesheet" href="Style/css/user.css">
    <!-- Main bootstrap Css File -->
    <link rel="stylesheet" href="Style/css/bootstrap.min.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="Style/css/all.min.css">
    <!-- RenderAll Elements Normally -->
    <link rel="stylesheet" href="Style/css/normalize.css">
    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">  
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/jquery.min.js"></script>
    
    
</head>
<body>
    <!-- Start Header -->
    <header >
        <div class="container">
            <?php
                if($_SESSION['rank']==="مدير")
                {
            ?>
                    <div class="wrapper">
                        <a href="../dashboard/index.php"><span>لوحة التحكم  </span></a>
                    </div>
                    <div class="wrapper">
                        <a href="logout.php"><span>تسجيل خروج   </span></a>
                    </div>
                        
            <?php
                    }else{
            ?>
                <div class="icons">
                    <a href="card.html"><i class="fa-solid fa-cart-shopping "></i></a> 
                    <a href="index.php"><i class="fa-regular fa-user"></i></i></a> 
                </div>
                <div class="wrapper">
                        <a href="logout.php"><span>تسجيل خروج   </span></a>
                </div>
            <?php  
                    } 
            ?>
        <div class="search"  >
                <form id="searchFormTop" action="" method="get" >
                    <input type="text" class="searchbox" name="q" id="q" placeholder="بحث">
                    <span class="search-btn-wrap">
                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </form>
            </div>
                <h1>Shope Markt</h1>
            <nav>
                <ul>
                    <li><a  href="#footer">حول</a></li>
                    <li><a  href="#category" >الاقسام</a></li>
                    <li><a class="active" href="main.php">الرئيسة</a></li>
                </ul>
            </nav>
            <a class="logo" href="main.php">
                <i class="fa-solid fa-shop"></i>
                <!-- <img src="image/logo.png" alt="logo"> -->
            </a>
        </div>
    </header>
    <!-- End Header -->
    <!-- Start Landing -->
    <div class="landing" id="heade">
        <div class="overlay"></div>
            </div>   
    </div>
<!-- End Landing -->