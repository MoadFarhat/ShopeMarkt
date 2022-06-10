<?php
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if($_SESSION['rank']!="مدير"){
header("location:../login.php?e=هذه الصفحة خاصة بالمدير");
}
?>
<?php
include 'style/include/header.php';
?>
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
<?php
include 'style/include/footer.php';
?>
