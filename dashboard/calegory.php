<?php
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if(isset($_POST['add'])){
$name=mysqli_real_escape_string($conn_link,$_POST['catogry']);
if(empty($name)){
header("location:calegory.php");}

else{
$query=$conn_link->query("INSERT INTO category (Category) Values ('$name')")or die("error");
header("location:calegory.php");
}
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
                <!-- <img src="image/logo.png" alt="logo"> -->
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
            <a href="calegory.html"><i class="fas fa-paper-plane"></i>
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
<div class="calegory">
        <h2 class="main-title">الأقسام</h2>
    <div class="container">
        <div class="data-search">
            <form method="post" action="">
                <div class="head">
                    <div class="input-group">
                        <input type="text" class="form-control" name="catogry" placeholder="اضافة  قسم" required>
                        <button type="submit"     name="add"       class="btn">اضافة</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>اسم التصنيف</th>
                    <th>تاريخ الاضافة</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php $q=$conn_link->query("SELECT * FROM category ")or die("error");
                    if(mysqli_num_rows($q)>0){
                  
                    while($f=mysqli_fetch_array($q)){
                    ?>
                <tr>
                    <td><?php  echo $f[1]; ?></td>
                    <td><?php  echo date('Y-m-d',strtotime($f[2])); ?></td>
                    <td class="as12"><div class="multi-button">
                        <button>تعديل </button>
                        <button >حدف</button>
                      </div></td>
                </tr>
                <?php }}
                $conn_link->close();?>
                
                <tbody>
            </table>
        </div>
        
    </div>
</div>
<!-- Start footer -->
    <div class="footer" id="footer">
        <div class="container">
            <p>&copy; 2022 <span>Shope Markt</span> جميع الحقوق محفوظة</p>
        </div>
    </div>
<!-- End footer -->
</body>
</html>