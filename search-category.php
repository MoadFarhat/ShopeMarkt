<?php
include 'Style/include/header.php';
require_once 'php/phpConect/mysql_connact.php';
$chiper="AES-128-CTR";//خوارزمية التشفير
$option=0;
$encryption_vi='1234567890123456';
$encryption_key='Moad';
error_reporting(0);
if(empty($_POST['q']) and !isset($_GET['g']))
{
    header("location:index.php");
}
else{
if((isset($_POST['q']) and !isset($_GET['g']))or (!isset($_POST['q']) and isset($_GET['g']))){
    if(isset($_POST['q'])){
$sql=$conn_link->query("SELECT * FROM category Where Category like'%$_POST[q]%' ")or die();
if(mysqli_num_rows($sql)==0){
    $p=$conn_link->query("SELECT * FROM product Where Product like'%$_POST[q]%' ")or die();
    
    
}}


    else {
        $sql=$conn_link->query("SELECT * FROM category Where   Category like'%$_GET[g]%' ")or die();
            }
if(mysqli_num_rows($sql)>0)
{
    while($name=mysqli_fetch_array($sql)){
?>

    <!-- Start Product -->
    <div class="product" id="product">
        <h2 class="main-title"><?php echo $name[1];?></h2>
        <?php $query=$conn_link->query("SELECT * FROM product WHERE CategoryID='$name[0]'")or die("error"); 
        if(mysqli_num_rows($query)==0)
        {
            echo"<p>لايوجد منتجات في هذا القسم</p>";
        }
        else{
        ?>
        <div class="container">
            <?php  while($row=mysqli_fetch_array($query)){
                $data=$row['Image'] ;
                $res=explode(" ",$data);
                $count=count($res)-1;?>
            <div class="box">
                <img src="image/image Proudect/<?php  echo $res[1];?>" alt="" />
                
                <div class="top">
                <a href="product.php?r=<?php $encryption_id=openssl_encrypt($row[0],$chiper,$encryption_key,$option,$encryption_vi); 
                echo base64_encode($encryption_id) ;
                ?>"><h3><?php echo $row['Product'];?></h3></a>  
                    
                </div>
                <div class="content">
                    <p> <?php echo $row["description"];?> </p>
                </div>
                <div class="Price">
                    <h3><?php echo $row["Price"];?></h3>
                    <p>دينار</p>
                </div>
                <div class="info">
                    <a href="">أضف إلى السلة</a>
                    <i class="fas fa-long-arrow-alt-left"></i>
                    
                </div>
            </div>
            <?php }}}
}
?>
</div>
    </div>
<?php
   if(mysqli_num_rows($p)>0)
   {
      ?>
    <div class="product" id="product">
    <h2 class="main-title"><?php echo $_POST['q'];?></h2>
   
    
    <div class="container">
        <?php
    while($name=mysqli_fetch_array($p)){
   ?>
   
       <!-- Start Product -->

               <?php
                   $data=$name['Image'] ;
                   $res=explode(" ",$data);
                   $count=count($res)-1;?>
               <div class="box">
                   <img src="image/image Proudect/<?php  echo $res[1];?>" alt="" />
                   
                   <div class="top">
                   <a href="product.php?r=<?php $encryption_id=openssl_encrypt($row[0],$chiper,$encryption_key,$option,$encryption_vi); 
                   echo base64_encode($encryption_id) ;
                   ?>"><h3><?php echo $name['Product'];?></h3></a>  
                       
                   </div>
                   <div class="content">
                       <p> <?php echo $name["description"];?> </p>
                   </div>
                   <div class="Price">
                       <h3><?php echo $name["Price"];?></h3>
                       <p>دينار</p>
                   </div>
                   <div class="info">
                       <a href="">أضف إلى السلة</a>
                       <i class="fas fa-long-arrow-alt-left"></i>
                       
                   </div>
               </div>
               <?php }
  
   ?>
   </div>
       </div>

<?php
 }
}
else{
    echo "<p>لا يوجد منتاجات في هذا التصنيف</p>";
}
}
?>
    </div>
    </div>
    <!-- End Product -->
<?php
    include 'Style/include/footer.php';
?>
