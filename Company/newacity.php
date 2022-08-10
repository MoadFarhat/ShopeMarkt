<?php
include 'style/include/header.php';
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if(isset($_POST['addemploye'])){
$city1=mysqli_real_escape_string($conn_link,$_POST['name']);
$city2=(mysqli_real_escape_string($conn_link,$_POST['password']));
$price=$_POST['email'];

      $sql="INSERT INTO companie (`Com_from`,`com_to`,`price`,`user_id`) VALUES('$city1','$city2','$price','$_SESSION[user_id]')";
      $query=mysqli_query($conn_link,$sql)or die("error55");
        header("location:index.php");
    }


?> 
<!-- Start Admin -->
<div class="admin">
    <h2 class="main-title">اضافة خدمة توصيل بين المدن</h2>

<div class="box">
    <div class="container">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="from-box">
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="name"placeholder="من " required>
                  <span class="field__label-wrap">
                    <span class="field__label">من المدينة</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" name="password"placeholder=" إلي " required >
                  <span class="field__label-wrap">
                    <span class="field__label">  إلي المدينة</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" type="number" name="email" placeholder="أدخل سعر التوصل" required>
                  <span class="field__label-wrap">
                    <span class="field__label">أدخل سعر التوصل</span>
                  </span>
                </label>
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

    
