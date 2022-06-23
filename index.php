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
<!-- End Product -->

<?php
include 'Style/include/footer.php';
?>
