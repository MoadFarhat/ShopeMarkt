<?php
include 'Style/include/header.php';
require_once 'php/phpConect/mysql_connact.php';
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';

?>

    <!-- Start Product -->
    

    <div class="product" id="product">

 <?php  /* $c=$conn_link->query("SELECT Count(*) FROM category")or die();
$co=mysqli_fetch_array($c);
$count=mt_rand(0,$co[0]-2);
$ratio=$count;
$limitr=2;
$sql=$conn_link->query("SELECT 	CategoryID  From category Limit ".$ratio.",".$limitr)or die("error");
while($row=mysqli_fetch_array($sql)){
echo $row[0]."<br>";
$s=$row[0];*/

$sql4=$conn_link->query("SELECT DISTINCT( CategoryID) FROM product  ")or die("errror");

while($f=mysqli_fetch_array($sql4)){

$q=$conn_link->query("SELECT Category From category Where CategoryID='$f[0]' ")or die();
while($name=mysqli_fetch_array($q)){

?>

    
        <a href="search-category.php?g=<?php  echo $name[0]?>" class="title"><h2 class="main-title"><?php echo $name[0]?></h2></a>
        <div class="container">
            <?php $query=$conn_link->query("SELECT * FROM product WHERE CategoryID='$f[0]' ")or die("erroe");
            while($c=mysqli_fetch_array($query) ){
                $data=$c['Image'] ;
                $res=explode(" ",$data);
                $count=count($res)-1;?>
            <div class="box">
                <img src="image/image Proudect/<?php  echo $res[1];?>" alt="" />
                
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
                    <a href="">أضف إلى السلة</a>
                    <a href=""><i class="fas fa-long-arrow-alt-left"></i></a>
                    
                </div>
               
            </div>
            <?php  
            }
        ?>
          </div>
            <?php
            
}
           
}
?>
    
    </div>
  <?php /* <div class="container">
          <div class="box">
                <img src="image/car-02.jpg" alt="" />
                
                <div class="top">
                    <a href="#"><h3>تويوتا فورنر 2004</h3></a>  
                    <p>5%</p>
                </div>
                <div class="content">
                    <p> وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة </p>
                </div>
                <div class="Price">
                    <h3>10,000</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <a href=""><i class="fas fa-long-arrow-alt-left"></i></a>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/car-03.jpg" alt="" />
                
                <div class="top">
                    <a href="#"><h3>تويوتا فورنر 2004</h3></a>  
                    
                </div>
                <div class="content">
                    <p> وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة </p>
                </div>
                <div class="Price">
                    <h3>10,000</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <a href=""><i class="fas fa-long-arrow-alt-left"></i></a>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/car-04.jpg" alt="" />
                
                <div class="top">
                    <a href="#"><h3>تويوتا فورنر 2004</h3></a>  
                </div>
                <div class="content">
                    <p> وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة وصف السيارة </p>
                </div>
                <div class="Price">
                    <h3>10,000</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <a href=""><i class="fas fa-long-arrow-alt-left"></i></a>
                </div>
            </div>
        </div>
                <a href="search-category.php" class="title"><h2 class="main-title">ملابس</h2></a>

        <div class="container">
            <div class="box">
                <img src="image/jacket-01.jpg" alt="" />
                
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
        <a href="search-category.php" class="title"><h2 class="main-title">الاجهزة الكترونية</h2>                </a>

        <div class="container">
            <div class="box">
                <img src="image/computer-01.jpg" alt="" />
                
                <div class="top">
                  <a href="#"><h3>جهاز</h3></a> 
                  <p>10%</p> 
                    
                </div>
                <div class="content">
                    <p> وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز </p>
                </div>
                <div class="Price">
                    <h3>450</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/computer-02.jpg" alt="" />
                
                <div class="top">
                    <a href="#"><h3>جهاز</h3></a>  
                    <p>5%</p>
                    
                </div>
                <div class="content">
                    <p> وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز </p>
                </div>
                <div class="Price">
                    <h3>450</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/computer-03.jpeg" alt="" />
                
                <div class="top">
                    <a href="#"><h3>جهاز</h3></a>  
                    
                </div>
                <div class="content">
                    <p> وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز </p>
                </div>
                <div class="Price">
                    <h3>450</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
            <div class="box">
                <img src="image/computer-04.jpg" alt="" />
                
                <div class="top">
                    <a href="#"><h3>جهاز</h3></a>  
                    
                </div>
                <div class="content">
                    <p> وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز وصف جهاز </p>
                </div>
                <div class="Price">
                    <h3>450</h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
        
        </div>*/?>
    

<!-- End Product -->

<?php
include 'Style/include/footer.php';
?>
