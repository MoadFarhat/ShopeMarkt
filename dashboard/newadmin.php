<?php
include 'style/include/header.php';
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if(isset($_POST['addemploye'])){
$name=mysqli_real_escape_string($conn_link,$_POST['name']);
$password=base64_encode(mysqli_real_escape_string($conn_link,$_POST['password']));
$email=mysqli_real_escape_string($conn_link,$_POST['email']);
$phone=mysqli_real_escape_string($conn_link,"".$_POST['phone']);
$addres=mysqli_real_escape_string($conn_link,$_POST['addres']);
$mfile=$_FILES['image']['name'];
if(empty($name)or empty($password)or empty($email) or empty($phone)  or empty($addres) ){
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
      $rank=2;
      $sql="INSERT INTO user (Name,Email,Password,Address,phone,Rank,Image) VALUES('$name','$email','$encryption_password','$addres','$phone','$rank','$mfile')";
      $query=mysqli_query($conn_link,$sql)or die("error55");
        header("location:user.php");
    }
}
}

?> 
<!-- Start Admin -->
<div class="admin">
    <h2 class="main-title">اضافة موظف</h2>

<div class="box">
    <div class="container">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="from-box">
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="name"placeholder="ادخل اسم مستخدم" required>
                  <span class="field__label-wrap">
                    <span class="field__label">اسم المستخدم</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="password"placeholder="ادخل كلمة السر" required >
                  <span class="field__label-wrap">
                    <span class="field__label">كلمة السر</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="email" placeholder="ادخل البريد الالكتروني" required>
                  <span class="field__label-wrap">
                    <span class="field__label">البريد الالكتروني</span>
                  </span>
                </label>
              </div>
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="phone" placeholder="ادخل رقم الهاتف" required>
                  <span class="field__label-wrap">
                    <span class="field__label">رقم الهاتف</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="addres" placeholder="ادخل العنوان">
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
                  <input id="inputTag" type="file" name="image" required/>
                  <!-- <br/> -->
                  <!-- <span id="imageName"></span> -->
                </label>
              </div>
              </div>
            
              <div class="wrapper">
              <button type="submit" name="addemploye"style="border: none;">  <a><span>التسجيل</span></button></a>
                </div>
            <!-- <button type="button" class="login-button">التسجيل</button> -->
        </div>
    </div>
</div>
</div>
</form>
<!-- End Admin -->
<?php
include 'style/include/footer.php';
?>

    <script>
        let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")

        input.addEventListener("change", ()=>{
            let inputImage = document.querySelector("input[type=file]").files[0];

            imageName.innerText = inputImage.name;
        })
    </script>
