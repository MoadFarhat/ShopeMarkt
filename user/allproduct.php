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
?>



<!-- Start Profile -->
<div class="profile">
    
<?php $comm=$conn_link->query("SELECT * FROM user WHERE UserID ='$_SESSION[user_id]'" )or die ("error");
      $f=mysqli_fetch_array($comm);
      ?>
      
      <div class="container emp-profile">
       
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="../image/usersimage/<?php echo $f['Image'];?>" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                        <form method="post" name="update" id="submit"  action="allproduct.php?m=<?php echo 1;?>" enctype="multipart/form-data">
                            تغير الصورة
                            <input type="file"  id="image" name="file"/>
                            </form>
                        </div>
                    </div>
                </div>
  
                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
                                    <?php echo $f['Name']; ?> 
                                </h5>
                                <h6>
                                <?php echo $f['Address']; ?> 
                                    ليبيا .. زليتن
                                </h6>
                                <!-- <p class="proile-rating">رقم الهاتف : <span>0926512478</span></p> -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="home-tab"  href="index.php" >معلومات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab"  href="allproduct.php" >منتجات</a>
                            </li>
    
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                  <div class="wrapper">
                    <a href="user_edit.php"><span>تعديل  </span></a>
                    </div>
                  <div class="wrapper">
                    <a href="new_product.php"><span>اضافة منتج  </span></a>
                    </div>
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="تعديل"/> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>معلومات التواصل</p>
                        <a href="">mohad@gmail.com</a><br/>
                        <a href="https://api.whatsapp.com/send?phone=+218926506115&text= iam Ali ">0945214566</a><br/>
                    </div>
                </div>
            <div class="col-md-8">
            <div class="allproduct">
                <!-- <div class="tab-content profile-tab" id="myTabContent"> -->
                    <!-- <div class="tab-pane fade show active "  id="home" role="tabpanel" aria-labelledby="home-tab"> -->
                <div class="bigbox">
               <?php
               $query=$conn_link->query("SELECT * FROM product WHERE user_id =$_SESSION[user_id]")or die("error");
              while($row =mysqli_fetch_array($query))
              {
               ?>
                    <div class="box">
                    <?php $data=$row['Image'] ;
                        $res=explode(" ",$data);
                        $count=count($res)-1;
                       
                        ?>
                          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                       
                        <div class="carousel-inner">
                      
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../image/image Proudect/<?php  echo $res[1];?>" alt="">
                            </div>
              <?php   for($j=2;$j<$count;$j++){ ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="../image/image Proudect/<?php  echo $res[$j];?>" alt="">
                            </div>
                            <?php } ?>
                            </div>
                              
                    </div>
                    
                        <div class="top">
                            <a href="#"><h3><?php  echo $row['Product'];   ?></h3></a>  
                            
                        </div>
                      
                        <div class="content">
                            <p><?php  echo $row['description'];   ?> </p>
                        </div>
                        <div class="Price">
                            <h3><?php echo $row['Price']; ?></h3>
                            <p>دينار</p>
                        </div>
                        <div class="info">
                            <!-- <a href="">أضف إلى السلة</a>
                            <i class="fas fa-long-arrow-alt-left"></i> -->
                            <div class="wrapper">
                                <a href="deleteproudect.php?$id=<?php echo $row[0];?>"><span>حدف  </span></a>
                                </div><div class="wrapper">
                                    <a href="new_product.php?$id=<?php echo $row[0];?>"><span>تعديل  </span></a>
                                    </div>
                        </div>
                    </div>
                    <?php }?>
                    
                   
                   
                        
                        </div>
                    </div>
                   
                    
                    <!-- </div> -->
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