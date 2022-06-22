<?php
include 'style/include/header.php';
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
error_reporting(0);
$encryption_id=base64_decode($_GET['d']);
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

$id=openssl_decrypt($encryption_id,$chiper,$encryption_key,$option,$encryption_vi); 
if(isset($_POST['update'])){
$name=mysqli_real_escape_string($conn_link,$_POST['name']);
$password=base64_encode(mysqli_real_escape_string($conn_link,$_POST['password']));
$email=mysqli_real_escape_string($conn_link,$_POST['email']);
$phone=mysqli_real_escape_string($conn_link,"".$_POST['phone']);
$addres=mysqli_real_escape_string($conn_link,$_POST['addres']);
$rank=$_POST['term1']." ".$_POST['term2']." ".$_POST['term3'];
$mfile=$_FILES['image']['name'];
if(empty($name)or empty($password)or empty($email) or empty($phone)  or empty($addres) or  empty($rank)  ){
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
   $sql="UPDATE  user Set Name='$name',Email='$email',Password='$encryption_password',Address='$addres',phone='$phone',Rank='$rank',Image='$mfile' WHERE 	UserID='$id'";
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
    <?php   $q=$conn_link->query("SELECT * FROM user WHERE UserID='$id'")or die("eror select");
$row=mysqli_fetch_array($q); ?>
    <div class="container">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="from-box">
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="name"placeholder="ادخل اسم مستخدم" value= "<?php echo $row['Name']; ?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">اسم المستخدم</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="password"placeholder="ادخل كلمة السر" value= "<?php
                   $password=openssl_decrypt( $row['Password'],$chiper,$encryption_key,$option,$encryption_vi);
                   echo base64_decode($password); ?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">كلمة السر</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="email" placeholder="ادخل البريد الالكتروني" value= "<?php echo $row['Email']; ?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">البريد الالكتروني</span>
                  </span>
                </label>
              </div>
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="phone" placeholder="ادخل رقم الهاتف" required value= "<?php echo $row['phone']; ?>"  pattern="^09(1|2|4)[\d]{7}$">
                  <span class="field__label-wrap">
                    <span class="field__label">رقم الهاتف</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="addres" placeholder="ادخل العنوان" value= "<?php echo $row['Address']; ?>" required>
                  <span class="field__label-wrap">
                    <span class="field__label">العنوان</span>
                  </span>
                </label>
              </div>
              <div class="page">
              <label class="field field_v1">
              <input type="checkbox" name="term1" value="مدير" style="margin-top:2rem"><b style="margin-top:2rem;margin-right:10px">مدير<b>
							<input type="checkbox" name="term2" value="موظف"style="margin-top:2rem"><b style="margin-top:2rem;margin-right:10px">موظف</b>
							<input type="checkbox" name="term3" value="مستخدم"style="margin-top:2rem" ><b style="margin-top:2rem;margin-right:10px">مستخدم</b>
              <span class="field__label-wrap">
                    <span class="field__label">الصلاحية</span>
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
              <button type="submit" name="update"style="border: none;">  <a><span>التسجيل</span></button></a>
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
