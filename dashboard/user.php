<?php
include 'style/include/header.php';
require_once("../php/phpConect/chickLogin.php");
require_once('../php/phpConect/mysql_connact.php');
?>
<!-- Start User -->
<div class="user">
    <h2 class="main-title">مستخدمين</h2>
<div class="container">
    <div class="data-search">
        <form method="post">
            <div class="head">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="اسم">
                    <button type="submit"class="btn">بحث</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-wrapper"  id="serchresult">
        
        </div>
        <div class="alluser">
            <table class="fl-table"  >
                <thead>
                <tr>
                    <th>رقم المستخدم</th>
                    <th>اسم المستخدم</th>
                    <th>كلمة السر</th>
                    <th>الرتبة</th>
                    <th>البريد الالكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>العنوان</th>
                    <th>الصورة</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php    $query=$conn_link->query("SELECT * FROM user")or die("error");
                    if(mysqli_num_rows($query)==0){
                        echo'<h2>لا يوجد مستخدمين</h2>';
                    }
                else {
                    $x=1;
                   while( $f=mysqli_fetch_array($query)){
                    ?>
                <tr>
                    <th><?php echo $x ?></th>
                    <th><?php echo $f[1] ?></th>
                    <th><?php echo $f[2] ?></th>
                    <th><?php echo $f['Rank'] ?></th>
                    <th><?php echo $f['Email'] ?></th>
                    <th><?php echo $f['phone'] ?></th>
                    <th><?php echo $f['Address'] ?></th>
                    <th><img width="35px" height="35px" src="../image/usersimage/<?php echo $f['Image']  ?>" alt=""></th>
                    <td class="as12"><div class="multi-button">
                        <button class="updat" id="update">تعديل </button>
                        <button class="delete" id="delete" >حدف</button>
                        <?php
                        if($f['Rank']==="مستخدم"){
                        echo"<script>
                        document.getElementById('update').style.display='none';
                        document.getElementById('delete').style.display='block';
                        </script>";
                        }
                         if ($f['Rank']==="مدير"){
                            echo"<script>
                            document.getElementById('update').style.display='block';
                            document.getElementById('delete').style.display='none';
                             </script>";
                        }
                      if ($f['Rank']==="موظف"){
                            echo"<script>
                            document.getElementById('update').style.display='block';
                            document.getElementById('delete').style.display='block';
                             </script>";
                        }
                        
                        ?>
                      </div>
                    </td>
                </tr>
                <?php $x++;} }?>
             
                
                <tbody>
            </table>
        </div>
    </div>
    </div>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $('.alluser').css('display','block');
    $('.form-control').keyup(function(){
        var input=$(this).val();
        if(input !="" || input==" "){
            $('.alluser').css('display','none');
         $.ajax({
             url:"serchuser.php",
             method:"POST",
             data:{input:input},
             success:function(data){
                 $('#serchresult').html(data);
             }
         });
         $('#serchresult').css('display','block');
        }
    else{
            $('.alluser').css('display','block');
            $('#serchresult').css('display','none');
        }
    })
    })
    
    
    
    </script>
  
<!-- End User -->
<?php
include 'style/include/footer.php';
?>
  <script src="style/js/jquery.min.js"></script>
</body>
</html>