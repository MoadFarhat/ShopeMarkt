<?php
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
if(isset($_POST['add'])){
$name=mysqli_real_escape_string($conn_link,$_POST['catogry']);
if(empty($name)){
header("location:calegory.php?e=الرجاءإدخال إسم");}

else{
$query=$conn_link->query("INSERT INTO category (Category) Values ('$name')")or die("error");
header("location:calegory.php");
}
}


include 'style/include/header.php';
?>

<div class="calegory">
        <h2 class="main-title">الأقسام</h2>
    <div class="container">
        <div class="data-search" id="data-search">
            <form method="post" action="">
                <div class="head">
                    <div class="input-group">
                        <input type="text" class="form-control" name="catogry" placeholder="اضافة  قسم" required>
                        <button type="submit"     name="add"       class="btn">اضافة</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-wrapper" id="table-wrapper">
            <table class="fl-table">
                <thead>
                <tr>
                    <th>اسم التصنيف</th>
                    <th>تاريخ الاضافة</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php $q=$conn_link->query("SELECT * FROM category ")or die("error");
                    if(mysqli_num_rows($q)>0){
                  
                    while($f=mysqli_fetch_array($q)){
                        $chiper="AES-128-CTR";//خوارزمية التشفير
                        $option=0;
                        $encryption_vi='1234567890123456';
                        $encryption_key='Moad';
                        $encryption_id=openssl_encrypt($f[0],$chiper,$encryption_key,$option,$encryption_vi); 
                    ?>
                <tr>
                    <td><?php  echo $f[1]; ?></td>
                    <td><?php  echo date('Y-m-d',strtotime($f[2])); ?></td>
                    <td class="as12"><div class="multi-button">
                    <a href="calegoryupdate.php?d=<?php echo base64_encode($encryption_id);?>"><button >تعديل </button>
                        <a  onclick="deleteCatogry(this);" href="deleteCalegory.php?d=<?php 
echo base64_encode($encryption_id); ?>"style="width:50%"> <button style="width:100%" name="delete" >حدف</button></a>
                      </div></td>
                </tr>
                <?php }}
                $conn_link->close();?>
                
                <tbody>
            </table>
        </div>
    </div>
</div>
        
</div>

<?php
include 'style/include/footer.php';
?>


<script  type = "text/javascript">
function deleteCatogry(that){
    var delete_func = confirm("هل تريد حذف  التصنيف");
			if(delete_func==true){
				window.location = anchor.attr("href");
			}
}

</script>
</body>
</html>