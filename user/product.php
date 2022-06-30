<?php
include 'style/include/header.php';
require_once '../php/phpConect/mysql_connact.php';
$encryption_id=base64_decode($_GET['r']);
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';
$id=openssl_decrypt($encryption_id,$chiper,$encryption_key,$option,$encryption_vi);
if(isset($_POST['addorder'])){
    $pid=$_POST['poudect'];
    $useId= $_POST['user'];
    if( empty($pid)or empty($useId)){
     echo'<script> alert("error found"); </script>';
    }
    else{
          $query=$conn_link->query("INSERT INTO `order`(`proudect_id`, `UserID`, `date_order`) VALUES ($pid,$useId,Now())")or die("error");
           header("Location:cart.php");
      
    }
}
?>
<head>
<!-- Main Shope Markt Css File -->
<link rel="stylesheet" href="../Style/css/ShopeMarkt.css">
</head>

    <!-- Start Product View -->
    <div class="product_view">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <?php $query=$conn_link->query("SELECT * FROM product WHERE ProductID='$id'")or die ("error in");
                    $row=mysqli_fetch_array($query); 
                    $data=$row['Image'] ;
                        $res=explode(" ",$data);
                        $count=count($res)-1;
                        ?>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../image/image Proudect/<?php  echo $res[1];?>">
                            </div>
                        
                            <?php   for($j=2;$j<$count;$j++){ ?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="../image/image Proudect/<?php  echo $res[$j];?>" >
                            </div>
                            <?php } ?>
                        </div>
                     
                        <a class="carousel-control-prev asd12" href="#carouselExampleControls" role="button" data-slide="prev">
                            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"></span> -->
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                        <a class="carousel-control-next  asd12" href="#carouselExampleControls" role="button" data-slide="next">
                            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"></span> -->
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </div>
                </div>
                <div class="neww">
                    <p class="newarrival text-center">جديد</p>
                    <h2><?php echo $row['Product'];?></h2>
                    <p><?php $sql=$conn_link->query("SELECT Category From category Where CategoryID='$row[CategoryID]'")or die("error");
                    $b=mysqli_fetch_array($sql);
                    echo $b[0]; ?></p>
                    <!-- <img src="image/sss.jpg" class="strat"> -->
                    <p class="price"> سعر <?php echo $row['Price'];  ?> د</p>
                    <p><b>تخفيض : </b>  %5</p>
                    <p><b>تاريخ الاضافة :</b> <?php  echo date('Y-m-d',strtotime($row['AddedDate']));  ?></p>
                    <form method="post" action="" onsubmit="return check();">
                    <label>الكمية:   </label>
                    <input type="number" id="m1" value="1" pattern="[1-9]$">
                    <p><b>الوصف :  </b><?php echo $row['description'];?></p>
                   
                        <input type="text" name="poudect" value="<?php echo $row[0];?>" hidden>
                        <input type="text" name="user" value="<?php echo $_SESSION['user_id'];?>" hidden>
                    <button type="submit" name="addorder" class="btn btn-default cart">اضاف الى سلة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product view -->
    <!-- Start Product -->
    <div class="product" id="product">
        <h2 class="main-title">ذات صلة</h2>
        <?php $query=$conn_link->query("SELECT * FROM product WHERE Product like '%$row[Product]%' and ProductID !='$row[0]'")or die(); 
        if(mysqli_num_rows($query)==0){
            $query=$conn_link->query("SELECT * FROM product WHERE  CategoryID='$row[CategoryID]' and ProductID !='$row[0]'")or die();
        }
        ?>
        <div class="container">
            <?php
        while($c=mysqli_fetch_array($query) ){
                $data=$c['Image'] ;
                $res=explode(" ",$data);
                $count=count($res)-1;?>
            <div class="box">
                <img src="../image/image Proudect/<?php  echo $res[1];?>" alt="" />
                
                <div class="top">
                  <a href="product.php?r=<?php $encryption_id=openssl_encrypt($c[0],$chiper,$encryption_key,$option,$encryption_vi); 
                  echo base64_encode($encryption_id) ;
                  ?>"><h3><?php echo $c['Product'];?></h3></a>  
                    
                </div>
                <div class="content">
                    <p> <?php  echo $c['description'];?> </p>
                </div>
                <div class="Price">
                    <h3><?php echo $c['Price'];?></h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="cart.php?p=<?php echo $encryption_id;?>">أضف إلى السلة</a>
                    <a href="cart.php?p=<?php echo $encryption_id;?>"><i class="fas fa-long-arrow-alt-left"></i></a>
                    
                </div>
               
            </div>
            <?php  
            }
        ?>
          </div>
          <?php /*
            <div class="box">
                <img src="image/jacket-02.jpg" alt="" />
                
                <div class="top">
                  <a href="#"><h3>قميص</h3></a>  
                  <p>30%</p>
                    
                </div>
                <div class="content">
                    <p> وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس </p>
                </div>
                <div class="Price">
                    <h3>70</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/shirt-03.jpg" alt="" />
                
                <div class="top">
                  <a href="#"><h3>قميص</h3></a>  
                    
                </div>
                <div class="content">
                    <p> وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس </p>
                </div>
                <div class="Price">
                    <h3>70</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/shirt-04.jpg" alt="" />
                
                <div class="top">
                  <a href="#"><h3>قميص</h3></a>  
                  <p>10%</p>
                </div>
                <div class="content">
                    <p> وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس وصف ملابس </p>
                </div>
                <div class="Price">
                    <h3>70</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
        </div>
        </div>*/ ?>
    </div>

    <!-- End Product -->
<script type="text/javascript">
    function check(){
    let number=document.getElementById('m1').value;
    if(number>0){
     
        return true;
    }
    else{
        alert("الرجاء إدخال الكمية بشكل صحيح");
        return false;
    }
}
</script>
<?php
include 'style/include/footer.php';
?>
