<?php
session_start();
unset( $_SESSION['error']);
require_once('php/phpConect/mysql_connact.php');
error_reporting(0);

if(isset($_SESSION["locked"])){
$diffrence=time()-$_SESSION["locked"];

if($diffrence>5){
    unset($_SESSION["locked"]);
    unset($_SESSION['login_attemts']); 
    unset( $_SESSION['error']);
}
}

if(isset($_POST['login'])){
    if(isset( $_SESSION['error'])){
        unset( $_SESSION['error']);
    } 

$email=mysqli_escape_string($conn_link,$_POST['email']);
$password=base64_encode(mysqli_escape_string($conn_link,$_POST['password']));
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

$encryption_password=openssl_encrypt($password,$chiper,$encryption_key,$option,$encryption_vi);
$sql="SELECT * from user WHERE Password='$encryption_password' and Email='$email' ";
$com=mysqli_query($conn_link,$sql)or die("error sql Comand");

if(mysqli_num_rows($com)>0){
    unset( $_SESSION['error']);
    $f=mysqli_fetch_array($com);
    $_SESSION['user_id']=$f[0];
    $_SESSION['rank']=$f['Rank'];

if( $_SESSION['rank']==="مستخدم")
header("location:user/index.php");

    else if( $_SESSION['rank']==="مدير")
    header("location:dashboard/index.php");
    }
else{
    $_SESSION['login_attemts']+=1;
  // 
    $_SESSION['error']="خطأ في إدخال بريد الكتروني او كلمة المرور";
}
}
?>

<html> 
    <head>
        <title>تسجيل الدخول</title>
        <link rel="stylesheet" href="Style/css/login_sinup.css">
        <link rel="stylesheet" href="Style/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
    </head>
    <body>
    <div class="overlay"></div>
    <header >
        <div class="container">
            
            
                <div class="wrapper">
                        <a href="signup.php"><span>تسجيل  </span></a>
                        </div>
                <div class="wrapper">
                        <a href="login.php"><span>تسجيل دخول </span></a>
                        </div>
                <h1>Shope Markt</h1>
            <nav>
                <ul>
                    
                    <li><a class="active" href="index.php">الرئيسة</a></li>
                </ul>
            </nav>
            <a class="logo" href="index.php">
                <i class="fa-solid fa-shop"></i>
                <!-- <img src="image/logo.png" alt="logo"> -->
            </a>
        </div>
    </header>
    <!-- End Header -->
    <!-- End Header -->
    <div class="box">
        <div class="container">
            <div class="from-box">
                <form action="" method="post">
            <h1>تسجيل الدخول </h1>
            <?php if(isset($_SESSION['error'])){
            echo '<p  class="error" ><i class="fa-solid fa-circle-exclamation"></i>'.$_SESSION['error'].'</p>';
            }
            ?>
            <div class="input-box">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" placeholder="بريد الكتروني" required>
            </div>
        <div class="input-box">
            <i class="fa-solid fa-lock"></i>
            <input type="password"  name="password" placeholder="كلمة السر" id="myInput" required>
            <span class="eye" onclick="myFunction()">
                <i id="hide1" class="fa-solid fa-eye"></i>
                <i id="hide2" class="fa-solid fa-eye-slash"></i>
            </span>
        </div>
        <?php if($_SESSION['login_attemts']>2){
            $_SESSION["locked"]=time();
            echo "<p class='error5min'><i class='fa-solid fa-circle-exclamation'></i>الرجاء إعادة المحاولة بعد 5  ثواني </p> ";
            
            }
            
        else {?>

        <button type="submit" name="login" class="login-button">تسجيل الدخول</button>
        <?php } ?>
        </form>

        </div>
        </div>
        </div>
        <script>
            function myFunction(){
                var x = document.getElementById("myInput");
                var y = document.getElementById("hide1");
                var z = document.getElementById("hide2");
                
                if(x.type === 'password'){
                    x.type = "text";
                    y.style.display = "block";
                    z.style.display = "none";
                }
                else{
                    x.type = "password";
                    y.style.display = "none";
                    z.style.display = "block";
                }
            }
        </script>
    </body>
</html>