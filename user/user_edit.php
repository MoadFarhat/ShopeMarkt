<?php
include 'style/include/header.php';

require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');


if(isset($_POST['update'])){
$name=mysqli_real_escape_string($conn_link,$_POST['name']);
$password=base64_encode(mysqli_real_escape_string($conn_link,$_POST['password']));
$Email=mysqli_real_escape_string($conn_link,$_POST['Email']);
$phone=mysqli_real_escape_string($conn_link,$_POST['phone']);
$adress=mysqli_real_escape_string($conn_link,$_POST['adress']);
$mfile=$_FILES['image']['name'];
if(empty($name)or empty($password)or empty($Email) or empty($phone)  or empty($adress) ){
  echo "<script> alert('الرجاء إدخال جميع الحقول')</script>";
}
else{
  $regphone='/^09(1|2|4)[\d]{7}$/';
  if(!preg_match($regphone,$phone)){
    echo"<script> alert('الرجاء إدخال رقم الهاتف بشكل صحيح');</script>";
    }
    else{
      $chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

$encryption_password=openssl_encrypt($password,$chiper,$encryption_key,$option,$encryption_vi);
      $mfiletemp=$_FILES['image']['tmp_name'];
    $upload_file='../image/usersimage/'.$mfile;
    move_uploaded_file($mfiletemp,$upload_file);
     
   $sql="UPDATE  user SET Name='$name',Email='$Email',Password='$encryption_password',Address='$adress',phone='$phone',Image='$mfile' WHERE UserID='$_SESSION[user_id]'";
   $query=mysqli_query($conn_link,$sql)or die("error55");
   header("location:index.php");
    }

}
}


?>


<!-- Start Profile -->
<div class="profile_edit">
    <h2 class="main-title">تعديل بيانات الشخصية</h2>
<?php   $comm=$conn_link->query("SELECT * FROM user WHERE UserID ='$_SESSION[user_id]'" )or die ("error");
      $row=mysqli_fetch_array($comm)?>
<div class="box">
    <div class="container">
        <div class="from-box">
            <div class="page">
              <form method="post" action=""  enctype="multipart/form-data">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل اسم مستخدم" name="name" value="<?php echo $row['Name'];?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">اسم المستخدم</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل كلمة السر" name="password" value="<?php 
                  $encryption_id= $row['Password'];
                  $chiper="AES-128-CTR";//خوارزمية التشفير
                  $option=0;
                  $encryption_vi='1234567890123456';
                  $encryption_key='Moad';
                  
                  $password=openssl_decrypt($encryption_id,$chiper,$encryption_key,$option,$encryption_vi); 
                  
                  echo base64_decode($password);?>"required>
                  <span class="field__label-wrap">
                    <span class="field__label">كلمة السر</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل البريد الالكتروني" name="Email"  value="<?php echo $row['Email'];?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">البريد الالكتروني</span>
                  </span>
                </label>
              </div>
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل رقم الهاتف" name ="phone" value="<?php echo $row['phone'];?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">رقم الهاتف</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل العنوان" name="adress" value="<?php echo $row['Address'];?>" required >
                  <span class="field__label-wrap">
                    <span class="field__label">العنوان</span>
                  </span>
                </label>
              </div>
              <div class="img1">
              <div class="img">
                <label for="inputTag">
                  ادخل الصورة 
                  <!-- <br/> -->
                  <!-- <i class="fa fa-2x fa-camera"></i> -->
                  <input id="inputTag" type="file" name="image" value="<?php echo $row['Image'];?>" />
                  <!-- <br/> -->
                  <!-- <span id="imageName"></span> -->
                </label>
              </div>
              </div>
            
              <div class="wrapper">
              <button style="border: none;"type="submit" name="update"> <a>  <span>التسجيل</span></button></a>
                </div>
</form>
              <div class="wrapper">
                <a href="index.php"><span>رجوع صفحة شخصية</span></a>
                </div>
            <!-- <button type="button" class="login-button">التسجيل</button> -->
        </div>
    </div>
</div>
</div>
    <!-- End Profile -->
<?php
    include 'style/include/footer.php';
?>
   