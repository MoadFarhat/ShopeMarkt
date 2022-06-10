<?php
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
$encryption_id=base64_decode($_GET['d']);
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

$id=openssl_decrypt($encryption_id,$chiper,$encryption_key,$option,$encryption_vi); 
if(isset($_POST['update'])){
$name=mysqli_real_escape_string($conn_link,$_POST['catogry']);
if(empty($name)){
    echo "<script> alert('الرجاء إدخال إسم التصنيف');  </script>";
}

$command=$conn_link->query("UPDATE category SET Category='$name' WHERE  CategoryID='$id' ")or die ("error");
header("location:calegory.php");

}

include 'style/include/header.php';

$q=$conn_link->query("SELECT * FROM category WHERE CategoryID='$id'")or die("eror select");
$row=mysqli_fetch_array($q);

?>
<div class="calegory">
        <h2 class="main-title">تعديل قسم</h2>
    <div class="container">
        <div class="data-search" id="data-search">
            <form method="post" action="">
                <div class="head">
                    <div class="input-group">
                        <input type="text" class="form-control" name="catogry" placeholder="تعديل  قسم" value="<?php  echo $row[1]; ?>" required>
                        <button type="submit"     name="update"       class="btn">تعديل</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>

<?php
include 'style/include/footer.php';
?>
