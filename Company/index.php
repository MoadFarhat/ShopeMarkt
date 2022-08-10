<?php
include 'style/include/header.php';
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');

if(isset($_GET['m'])){
$mfile=$_FILES['file']['name'];
$mfiletemp=$_FILES['file']['tmp_name'];
$upload_file='../image/usersimage/'.$mfile;
move_uploaded_file($mfiletemp,$upload_file);
$sql="UPDATE user SET Image='$mfile' WHERE  UserID='$_SESSION[user_id]'";
$query=mysqli_query($conn_link,$sql)or die("error55");
header("location:index.php");
}
if( $_SESSION['rank']==4){
?>

<!-- Start Profile -->
<div class="profile">

      <?php $comm=$conn_link->query("SELECT * FROM user WHERE UserID ='$_SESSION[user_id]'" )or die ("error");
      $f=mysqli_fetch_array($comm);
      ?>
      <div class="container emp-profile">
        
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img" >
                        <img src="../image/usersimage/<?php echo $f['Image'];?>" alt=""/>
                        <div class="file btn btn-lg btn-primary" >
                        <form method="post" name="update" id="submit"  action="index.php?m=<?php echo 1;?>" enctype="multipart/form-data">
                            تغير الصورة
                            <input type="file"  id="image" name="file"/>
                            </form>  
                            </div>
                    </div>
                </div>
                    
                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
                                     <?php echo $f['Name'];?>
                                </h5>
                                <h6>
                                    <?php  echo $f['Address'];  ?>
                                   
                                </h6>
                                <!-- <p class="proile-rating">رقم الهاتف : <span>0926512478</span></p> -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist" >
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" href="index.php" >معلومات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" href="allproduct.php">منتجات</a>
                            </li>
    
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                  <div class="wrapper">
                    <a href="user_edit.php"><span>تعديل  </span></a>
                    </div>
                  <div class="wrapper">
                    <a href="newacity.php"><span>اضافة مدينة  </span></a>
                    </div>
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="تعديل"/> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>معلومات التواصل</p>
                        <a href=""><?php echo $f['Email']; ?></a><br/>
                        <a href="https://api.whatsapp.com/send?phone=+218<?php echo $f['phone'];?>&text= iam Ali "><?php echo $f['phone']; ?></a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent" style="margin-top: 2rem;">
                        <div class="tab-pane fade show active as123"  id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>الاسم</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p> <?php  echo $f['Name']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>بريد الالكتروني</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $f['Email'];  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>رقم الهاتف</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $f['phone']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>العنوان</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $f['Address']; ?></p>
                                        </div>
                                    </div>
                        </div>
  
                    </div>
                </div>
            </div>
                  
    </div>
  
</div>
    <!-- End Profile -->
  
<?php
    include 'style/include/footer.php';
?>
      <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(){
    var input=$(this).val();
    if(input !="" ){
     $('#submit').submit();
    }
else{
       alert("sleep");
    }
})
})
    </script>
    <?php
    }
    else{
        header("Location:../login.php?m=هذه الصفحة خاصة بالشركة");
    }?>