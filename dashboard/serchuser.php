<?php
require_once('../php/phpConect/mysql_connact.php');
if(isset($_POST['input'])){
    $input=$_POST['input'];
    
    $query=$conn_link->query("SELECT * FROM user WHERE Name like '%$input%'")or die("error serch");
    $x=1;
    if(mysqli_num_rows($query)>0){ ?>
  <div class="table-wrapper"  id="serch" >
  <table class="fl-table" id="serch">
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
      <?php 
      while($row=mysqli_fetch_array($query)){ ?>
         
      <tr>
          <th><?php echo $x;?></th>
          <th><?php echo $row[1];?></th>
          <th><?php echo $row[2];?></th>
          <th><?php echo $row['Rank'];?></th>
          <th><?php echo $row['Email'];?></th>
          <th><?php echo $row['phone'];?></th>
          <th><?php echo  $row['Address'];?></th>
          <th><img width="35px" height="35px" src="../image/user.jpg" alt=""></th>
          <td class="as12"><div class="multi-button">
              <button>تعديل </button>
            </div>
          </td>
      </tr>
      <?php $x++; }?>
      </tbody>
      </tabel
   <?php }
    else{
        echo"<h2> لا توجد بيانات بهذا الإسم </h2>";
    }
}



?>