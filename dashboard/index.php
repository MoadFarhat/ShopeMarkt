<?php
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if($_SESSION['rank']!="مدير"){
header("location:../login.php?e=هذه الصفحة خاصة بالمدير");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shope Markt</title>
    <!-- Main Shope Markt Css File -->
    <link rel="stylesheet" href="style/css/style.css">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="style/css/all.min.css">
    <!-- RenderAll Elements Normally -->
    <link rel="stylesheet" href="style/css/normalize.css">
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

</head>
<body>
    <!-- Start Header -->
    
    <header >
        <div class="container">
            <div class="wrapper">
                <a href="../index.html"><span>صفحة رئيسية  </span></a>
                </div>
                <h1>Shope Markt</h1>
           
            <a class="logo" href="main.html">
                <i class="fa-solid fa-shop"></i>
            </a>
        </div>
    </header>
<!-- End Header -->
<!-- Start Landing -->
    <div class="landing" id="">
        <div class="overlay"></div>
        <h1>لوحة التحكم</h1>
    </div>
<!-- End Landing -->
<!-- Start control -->
<div class="control">
    <div class="container">
        <div class="wrapper">
            <a href="index.html"><i class="fas fa-home"></i>
                <span>لوحة تحكم </span></a>
        </div>
        <div class="wrapper">
            <a href="calegory.php"><i class="fas fa-paper-plane"></i>
                <span>الاقسام</span></a>
        </div>
        <div class="wrapper">
            <a href="newadmin.html"><i class="fas fa-user-friends"></i>
                <span>اضافة مدير</span></a>
        </div>
        <div class="wrapper">
            <a href="user.html"><i class="fas fa-user-friends"></i>
                <span>مستخدمين</span></a>
        </div>
    </div>
</div>
<!-- End control -->
<!-- Start Stats -->
<div class="stats">
    <h2 class="main-title">بيانات المتجر</h2>
    <div class="container">
        <div class="box">
            <i class="far fa-user fa-2x fa-fw"></i>
            <?php $query= $conn_link->query("SELECT count(*) from user WHERE Rank!='مدير'")or die("error");
           if(mysqli_num_rows($query)<0){
            $row[0]=0;
           }
           else{
            $row=mysqli_fetch_array($query);
        $count=$row[0];
        }
            ?>
            <span class="number" data-goal="150">121458<?php  echo $count;?></span>
            <span class="text">المستخدمين</span>
        </div>
        <div class="box">
            <i class="fa-solid fa-cart-shopping fa-2x fa-fw"></i>
            <span class="number" data-goal="135">6521</span>
            <span class="text">منتجات</span>
        </div>
        <div class="box">
            <i class="fa-solid fa-list fa-2x fa-fw"></i>
            <span class="number" data-goal="50">15</span>
            <span class="text">الاقسام</span>
        </div>
        <div class="box">
            <i class="fa-solid fa-sack-dollar fa-2x fa-fw"></i>
            <span class="number" data-goal="500">1,025,478</span>
            <span class="text">الارباح</span>
        </div>
    </div>
</div>
<!-- End Stats -->

    <!-- Start footer -->
    <div class="footer" id="footer">
        <div class="container">
            <p>&copy; 2022 <span>Shope Markt</span> جميع الحقوق محفوظة</p>
        </div>
    </div>
    <!-- End footer -->
</body>
</html>