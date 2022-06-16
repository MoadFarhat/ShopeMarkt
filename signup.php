<?php
session_start();
require_once('php/phpConect/mysql_connact.php');
error_reporting(0);
if(isset($_POST['login'])){
$name=mysqli_real_escape_string($conn_link,$_POST['username']);
$email=mysqli_real_escape_string($conn_link,$_POST['Email']);

$phone="".$_POST['phone'];
$password=base64_encode(mysqli_real_escape_string($conn_link,$_POST['passs']));
$address=mysqli_escape_string($conn_link,$_POST['adress']);
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

$encryption_password=openssl_encrypt($password,$chiper,$encryption_key,$option,$encryption_vi);
$regphone='/^09(1|2|4)[\d]{7}$/';
$mfile=$_FILES['image']['name'];
if(empty($name)or empty($email)or empty($phone)or empty($password) or empty($address) ){
    header("location:signup.php?e=الرجاء تعبئة جيع الحقول");
}

if(!preg_match($regphone,$phone)){
echo"<script> alert('الرجاء إدخال رقم الهاتف بشكل صحيح');</script>";
}
else{
    $mfile=$_FILES['image']['name'];
   
   if(empty($mfile)){
        $mfile="image/user.jpg";
    } 
    $mfiletemp=$_FILES['image']['tmp_name'];
    $upload_file='image/usersimage/'.$mfile;
    move_uploaded_file($mfiletemp,$upload_file);
   $rank="مستخدم";
   $q=$conn_link->query("SELECT Password FROM user WHERE Password='$encryption_password'")or die();
  
   if(mysqli_num_rows($q)>0){
    echo"<script> alert('الرجاء إدخال كلمة مرور أخري');</script>";
  }
  else{
   

   $sql="INSERT INTO user (Name,Email,Password,Address,phone,Rank,Image) VALUES('$name','$email','$encryption_password','$address','$phone','$rank','$mfile')";
   $query=mysqli_query($conn_link,$sql)or die("error55");
  $sql1=mysqli_query($conn_link,"SELECT UserID from user WHERE Password='$password' and Name='$name'")or die("error");
  $fetch=mysqli_fetch_array($sql1);
  $_SESSION['id_user']=$fetch[0];
header("location:user/index.php");
}

}
}

?>



<html>
    <head>
        <title>التسجيل</title>
        <link rel="stylesheet" href="Style/css/login_sinup.css">
        <link rel="stylesheet" href="Style/css/all.min.css">
         
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
        <div class="box">
            <div class="container">
        <div  class="sign-box">
            <h1>التسجيل  </h1>
            <form class="sign" method="post" action="" enctype="multipart/form-data">
            <div class="input-box">
                <input type="text" name="username" placeholder="ادخل الاسم" required>
            </div>
            <div class="input-box">
                <input type="email" name="Email" placeholder="ادخل البريد الكتروني" required>
            </div>
            <div class="input-box">
                <input type="tel" name="phone" placeholder="ادخل رقم الهاتف" required>
            </div>
            <div class="input-box">
                <input type="password" name="passs" placeholder="ادخل كلمة السر" id="myInput" required>
            <span class="eye" onclick="myFunction()">
                <i id="hide2" class="fa-solid fa-eye-slash"></i>
                <i id="hide1" class="fa-solid fa-eye"></i>
            </span>
            </div>
            <div class="input-box">
                <input type="text" name="adress" placeholder="ادخل العنوان " required>
            </div>
            <div class="img1">
              <div class="img">
                <label for="inputTag">
                  ادخل الصورة 
                  <!-- <br/> -->
                  <!-- <i class="fa fa-2x fa-camera"></i> -->
                  <input id="inputTag" name="image" type="file"/>
                  <!-- <br/> -->
                  <!-- <span id="imageName"></span> -->
                </label>
              </div>
              </div>
            <button type="submit" name="login" class="login-button">التسجيل</button>
            </form>
         </div>
        <h1 style="color:red"> <?php echo $_GET['e'];?></h1>
      
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