<?php
require_once '../php/phpConect/mysql_connact.php';

    
$counts=$_POST['qty'];
$companyid=$_POST['Company'];
$orderid=$_POST['orderid'];


$query3=$conn_link->query("SELECT * FROM companie WHERE CompanieID='$companyid'")or die();
$queryorder=$conn_link->query("SELECT * FROM `order` WHERE `OrderID`='$orderid'")or die();
    
     $infocompany=mysqli_fetch_array($query3);
     
     $queryCompanyinfo=$conn_link->query("SELECT * FROM user WHERE UserID='$infocompany[user_id]'")or die();
     $rowcompanyinfo=mysqli_fetch_array($queryCompanyinfo);
     $roworer=mysqli_fetch_array($queryorder);
     $query2pay=$conn_link->query("SELECT * FROM user WHERE UserID='$roworer[UserID]'")or die();
     $infopay=mysqli_fetch_array($query2pay);
    
     $query=$conn_link->query("SELECT * FROM product WHERE ProductID='$roworer[proudect_id]'")or die();
     $row=mysqli_fetch_array($query);
     $querinfo1=$conn_link->query("SELECT * FROM user WHERE UserID='$row[user_id]' ")or die();
     $rowinfEmailSalary=mysqli_fetch_array($querinfo1);
     if($row['discount']==0)
														$sum=$counts*$row['Price'];
														else
														$sum=$counts*($row['Price']-(($row['Price']*$row['discount'])/100));
   $newCont=$row['Quantity']-$counts;
                            $conn_link->query("CALL updateorder('$roworer[0]','$counts','$sum')")or die ();
                            $conn_link->query("CALL updateproudect('$row[0]','$newCont')")or die ();
                            $queryorder=$conn_link->query("SELECT * FROM `order` WHERE `OrderID`='$orderid'")or die();
                            $roworer=mysqli_fetch_array($queryorder);
     $infocompany=mysqli_fetch_array($query3);
     
     
   echo $sum;
     $data=$row['Image'] ;
     $res=explode(" ",$data);
     $count=count($res)-1;
     require_once('mail.php');
$mail->setFrom('xxxx@gmail.com', ' متجر Shope ');
$mail->addAddress($infopay['Email']); 
  $mail->Subject = ' تم شراء منتج';
    $mail->Body    = '<html dir="rtl"><div style="direction:rtl"><p dir="rtl"><b> معلومات عن المنتج الذي تم شراءه</b></p>
    <img src="../image/image Proudect/'. $res[1].'" class="cart-image"/>
	إسم المنتج:' .$row['Product']."</br>
	<p> الكمية :". $roworer['cont_item']."</p>  <p> السعر  :". $roworer['price']."</p>
    <p> معلومات عن شركةالتوصيل </p>
    <p> أسم الشركة:". $rowcompanyinfo['Name']."</p>
    <p>  البريد الإلكتروني:". $rowcompanyinfo['Email']."</p></div>
    </html> ";
    $mail->send();
    echo 'Message has been sent';
    $mail->setFrom('xxxx@gmail.com', ' متجر Shope ');
$mail->addAddress($rowinfEmailSalary["Email"]); 
  $mail->Subject = ' تم بيع منتج';
    $mail->Body    = '<html dir="rtl"><div style="direction:rtl"><p><b> معلومات عن المنتج الذي تم بيعه/b></p>
	إسم المنتج:' .$row['Product']."</br>
	<p> الكمية :". $roworer['cont_item']."</p>  <p> السعر  :". $roworer['price']."</p>
    <p> معلومات عن شركةالتوصيل </p>
    <p> أسم الشركة:". $rowcompanyinfo['Name']."</p>
    <p>  البريد الإلكتروني:". $rowcompanyinfo['	Email']."</p>
    <p>  رقم الهاتف:". $rowcompanyinfo['phone']."</p>
    </div>
    </html> ";
if( isset($_POST['m1']))
{
    $mail->send();
    $mail->setFrom('xxxx@gmail.com', ' متجر Shope ');
    $mail->addAddress($rowinfEmailSalary["Email"]); 
      $mail->Subject = ' منتج يطلب توصيله';
        $mail->Body    = '<html dir="rtl"><div style="direction:rtl"><p><b> معلومات عن المنتج المراد  توصيله</b></p>
      إسم المنتج:' .$row['Product']."</br>
      <p> الكمية :". $roworer['cont_item']."</p>  <p> السعر  :". $roworer['price']."</p>
        <p> معلومات عن الشخص البائع </p>
        <p> الإسم :". $rowinfEmailSalary['Name']."</p>
        <p>  البريد الإلكتروني:". $rowinfEmailSalary['	Email']."</p>
        <p>  رقم الهاتف:". $rowinfEmailSalary['phone']."</p>
        <p>  العنوان :". $rowinfEmailSalary['Address']."</p>
        <hr>
        <p> معلومات عن المشتري </p>
        <p> الإسم :". $infopay['Name']."</p>
        <p>  البريد الإلكتروني:". $infopay['	Email']."</p>
        <p>  رقم الهاتف:". $infopay['phone']."</p>
        <p>  العنوان :". $infopay['Address']."</p>
        </div>
        </html> ";
    
        $mail->send();
        echo "<script>alert('الرجاء الإنتظار إلي أن يصلك البريد الإلكتروني الذي يحتوي علي التفاصيل') </script>";
    header("location:cart.php");
        
}
    
    
    echo "<script>alert('الرجاء الإنتظار إلي أن يصلك البريد الإلكتروني الذي يحتوي علي التفاصيل') </script>";
    header("location:cart.php");
    
//}











?>