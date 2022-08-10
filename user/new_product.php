<?php
include 'style/include/header.php';
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if(isset($_POST['update'])){
  echo "in update";
}
if(isset($_POST['addproudct'])){
 $name=mysqli_real_escape_string($conn_link,$_POST['name']);
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $discount=$_POST['discount'];
  $description=mysqli_real_escape_string($conn_link,$_POST['description']);
  $catogry=$_POST['catogry'];
  $file='';
  $file_tmp='';
  $data='';
  $location="../image/image Proudect/";
  foreach($_FILES['images']['name'] as $key=>$val){
   $file=$_FILES['images']['name'][$key];
   $file_tmp=$_FILES['images']['tmp_name'][$key];
   move_uploaded_file($file_tmp,$location.$file);
   $data .=$file." ";
  }
$query=$conn_link->query("INSERT INTO product (Product,	Price,Quantity,description,discount	,Image,CategoryID,user_id ) VALUES ('$name', $price,
$quantity,'$description', $discount,' $data',$catogry,$_SESSION[user_id])")or die("error");

header("location:allproduct.php");
echo "in add";

}

?>

<!-- Start Profile -->
<div class="profile_edit">
    <h2 class="main-title">اضافة منتج</h2>

<div class="box">
    <div class="container">
        <div class="from-box">
            <div class="page">
            <form method="post" action=""  enctype="multipart/form-data">
                <label class="field field_v1">
                  <input class="field__input" name="name" placeholder="ادخل اسم منتج" required>
                  <span class="field__label-wrap">
                    <span class="field__label">اسم منتج</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" type="number" name="price"placeholder="ادخل السعر" required>
                  <span class="field__label-wrap">
                    <span class="field__label">السعر</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" type="number" name="quantity" placeholder="ادخل الكمية" required>
                  <span class="field__label-wrap">
                    <span class="field__label">الكمية</span>
                  </span>
                </label>
              </div>
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" type="number" name="discount" placeholder="ادخل التخفيض" required>
                  <span class="field__label-wrap">
                    <span class="field__label">التخفيض</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                    <textarea class="field__input" name="description" placeholder="ادخل الوصف" name="" id="" cols="30" rows="40"></textarea>
                  <span class="field__label-wrap">
                    <span class="field__label">الوصف</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                    <select class="field__input"  name="catogry" required>
<option >إختر أحد التصنيفات </option>
<?php
$comm=$conn_link->query("SELECT * FROM category")or die("error");
While($row=mysqli_fetch_array($comm))
{
?>
<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
<?php }?>

                    </select>
                  <span class="field__label-wrap">
                    <span class="field__label">إختر التصنيف</span>
                  </span>
                </label>
              </div>
              <div class="img1">
              <div class="img">
                <label for="inputTag">
                  ادخل الصورة 
                  <!-- <br/> -->
                  <!-- <i class="fa fa-2x fa-camera"></i> -->
                  <input id="inputTag" name="images[]" type="file" multiple />
                  <!-- <br/> -->
                  <!-- <span id="imageName"></span> -->
                </label>
              </div>
              </div>
</br>
</br> 
              <div class="wrapper">
              <button style="border: none;"type="submit" name="addproudct"> <a ><span>اضافة المنتج</span></button></a>
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
<?php if(isset($_GET['id'])){
  echo"<script> alert('in id');</script>";
  ?>
<div class="profile_edit">
<h2 class="main-title">اضافة منتج</h2>

<div class="box">
<div class="container">
    <div class="from-box">
        <div class="page">
        <form method="post" action="update.php"  enctype="multipart/form-data">
            <label class="field field_v1">
              <input class="field__input" name="name" placeholder="ادخل اسم منتج" required>
              <span class="field__label-wrap">
                <span class="field__label">اسم منتج</span>
              </span>
            </label>
          </div>
          <div class="page">
            <label class="field field_v1">
              <input class="field__input" name="price"placeholder="ادخل السعر" required>
              <span class="field__label-wrap">
                <span class="field__label">السعر</span>
              </span>
            </label>
          </div>
          <div class="page">
            <label class="field field_v1">
              <input class="field__input" name="quantity" placeholder="ادخل الكمية" required>
              <span class="field__label-wrap">
                <span class="field__label">الكمية</span>
              </span>
            </label>
          </div>
        <div class="page">
            <label class="field field_v1">
              <input class="field__input" name="discount" placeholder="ادخل التخفيض" required>
              <span class="field__label-wrap">
                <span class="field__label">التخفيض</span>
              </span>
            </label>
          </div>
          <div class="page">
            <label class="field field_v1">
                <textarea class="field__input" name="description" placeholder="ادخل الوصف" name="" id="" cols="30" rows="40"></textarea>
              <span class="field__label-wrap">
                <span class="field__label">الوصف</span>
              </span>
            </label>
          </div>
          <div class="page">
            <label class="field field_v1">
                <select class="field__input"  name="catogry" required>
<option >إختر أحد التصنيفات </option>
<?php
$comm=$conn_link->query("SELECT * FROM category")or die("error");
While($row=mysqli_fetch_array($comm))
{
?>
<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
<?php }?>

                </select>
              <span class="field__label-wrap">
                <span class="field__label">إختر التصنيف</span>
              </span>
            </label>
          </div>
          <div class="img1">
          <div class="img">
            <label for="inputTag">
              ادخل الصورة 
              <!-- <br/> -->
              <!-- <i class="fa fa-2x fa-camera"></i> -->
              <input id="inputTag" name="images[]" type="file" multiple />
              <!-- <br/> -->
              <!-- <span id="imageName"></span> -->
            </label>
          </div>
          </div>
</br>
</br> 
          <div class="wrapper">
          <button style="border: none;"type="submit" name="update"> <a ><span>اضافة المنتج</span></button></a>
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

 <?php }?>
    <!-- End Profile -->
<?php
    include 'style/include/footer.php';
?>