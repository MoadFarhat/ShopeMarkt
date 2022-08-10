<?php
include 'Style/include/header.php';
require_once 'php/phpConect/mysql_connact.php';
$chiper="AES-128-CTR";       //خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';
error_reporting(0);
?>

<!-- Start Product -->
<div class="product" id="product">
<?php
$query = $conn_link->query("SELECT count(DISTINCT( CategoryID)) FROM `product`")or die("error");
$com=$query->fetch_array();
$count=$com[0];

     
$page=1;
$limit=$count/10;
$limit=ceil($limit);
if(isset($_GET['p']))
{
$page=$_GET['p'];
if($page>$limit or $page<1){
$page=1;}

}

$page=$page-1;
$p=$page * 10;
$sql4=$conn_link->query("SELECT DISTINCT( CategoryID) FROM product  limit ".$p.",". 10 ."")or die("errror");

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
$check=$p+10;
            echo'<div class="prev"><a class="lm" href="index.php?p=1">الأول </a>';
            if($_GET['p'] > 1){
            $backpage=$_GET['p']-1;
            echo'<a class="lm" href="index.php?p='.$backpage.'">السابق </a>';
            }

            
            for($i=1;$i<=$limit;$i++){
                if( $i==$_GET['p']){
                    echo '<a class="lm" id="active" disabled="disabled">'.$i.'</a>';
                }else{
                    ?>
                    
            <a class="lm" href="index.php?p=<?php echo $i;?>"><?php echo $i;?> </a><?php }
            }
            if($count > $check){
            $nextpage=$_GET['p'] + 1;
                    
            echo'<a class="lm" href="index.php?p='.$nextpage.' ">التالي </a>';
            }
        
            echo'<a  class="lm" href="index.php?p='.$limit.'">الأخير </a></div>';
?>
</div>
<!-- End Product -->

<?php
include 'Style/include/footer.php';
?>
