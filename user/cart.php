<?php
include 'style/include/header.php';
require_once '../php/phpConect/mysql_connact.php';
$sum=0;


?>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style/css/ct.css"> 
</head>
<body>


	<div class="container">
        <div class="tab-content cartmain">
            <div class="tab-pane container active" id="cart">
				<div class="row">
					<div class="col-md-3 order-last Order">
					<?php $query=$conn_link->query("SELECT * FROM `order` WHERE `UserID`=$_SESSION[user_id]")or die("error");
								if(mysqli_num_rows($query)==0){
                                            echo"<p>لا يوجد لديك منتجات</p>";
								}
								else{
									/*while($row=mysqli_fetch_array($query)){
										$sql=$conn_link->query("SELECT Sum(Price) FROM product WHERE ProductID='$row[1]'")or die("error");
										$f=mysqli_fetch_array($sql);
										$sum+=$f[0];
									}*/
								?>
						<div class="card">
							<div class="card-body no-padding">
								<div class="row">
									<div class="col-md-12">
										<p class="section-title6 text-center">اجمالي منتجات</p>
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<p class="num-product mb-0"> منتجات </p>
											</div>
											<div class="col-md-6 col-6 text-center no-padding">
												<p class="data-subtitle font-weight-bold mb-0 sumvergen" id="summ" ><?php
												//echo $sum;
												?> دينار</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<p class="num-product mb-0"> توصيل </p>
											</div>
											<div class="col-md-6 col-6 text-center no-padding ">
												<p class="data-subtitle font-weight-bold mb-0" id="delivary">50 </p>
											</div>
										</div>
										<hr>
										<div class="row mb-5">
											<div class="col-md-6 col-6 text-center">
												<p class="num-product mb-0"> اجمالي </p>
											</div>
											<div class="col-md-6 col-6 text-center no-padding">
												<p class="data-subtitle font-weight-bold mb-0" id="allsum"></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 mb-2">
												<a class="btn checkout-btn" href="#checkout" data-toggle="pill" role="button" type="submit">شراء</a>	
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
				
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<?php
								$query=$conn_link->query("SELECT * FROM `order` WHERE `UserID`=$_SESSION[user_id]")or die("error");
								if(mysqli_num_rows($query)==0){
                                            echo"<p>لا يوجد لديك منتجات</p>";
								}
								else{
									while($row=mysqli_fetch_array($query)){
										$sql=$conn_link->query("SELECT * FROM product WHERE ProductID='$row[1]'")or die("error");
										While($q=mysqli_fetch_array($sql)){
										$data=$q['Image'] ;
										$res=explode(" ",$data);
										$count=count($res)-1;
										$chiper="AES-128-CTR";//خوارزمية التشفير
        $option=0;
        $encryption_vi='1234567890123456';
        $encryption_key='Moad';
        $encryption_id=openssl_encrypt($row[0],$chiper,$encryption_key,$option,$encryption_vi); 
	
										?>
								
								<div class="card">
									<div class="card-body">
										<div class="centered-row mb-0">
											<div class="col-md-4 mb-1">
												<img src="../image/image Proudect/<?php echo $res[1];?>" class="cart-image" />
											</div>
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-9 col-9">
														<p class="cart-product mb-0 text-right"><?php echo $q['Product']; ?></p>
														<p class="cart-product mb-0 text-center"><?php echo $q['Price'] ;?></p>
														<p class="cart-price mb-0  text-left itotal" ><?php if($q['discount']==0)
														$w=$q['Price'];
														else
														$w=$q['Price']-(($q['Price']*$q['discount'])/100);
														echo $w; ?> دينار</p>
														<input type="text" class="iprice" value="<?php echo $w ?>" hidden />
														<!-- <p class="cart-items">2 Left</p> -->
													</div>
													<div class="col-md-3 col-3 mt-3">
													<button type="button" onclick=" Cliced();" class="add" style="border: none;"><i class="fas fa-plus-circle plus-icon"></i></button>
													<form method="post"  class="inpsubmit"action="cart.php" onsubmit="return check();">
														<input style="width:50px;border:none" type="number" main=1 max=<?php  echo $q['Quantity'];?> readonly onchange="subTotal()" class="num-items pr-2 pl-2 iquantity reult <?php echo $q[0];?>" value="<?php echo $row['cont_item']; ?>"/>
														<input type="text"  class="io" value="<?php echo $q['Quantity']; ?>" hidden>
														
															
														
													</form>
														<button type="button"class="mines" style="border: none;"><i class="fas fa-minus-circle minus-icon"></i></button>
													</div>
													<br>
													<a href="deletorder.php?d= <?php echo base64_encode($encryption_id);?>"class="col-md-12 col-12 delet">
                                                        
                                                            <i class="fas fa-trash trash-icon"></i>
                                                            <span class="icons-items pl-1"> حدف </span>
                                                    </a>
													<br/>
													
													<button onclick="er()" class ="view_prod" ><a  class="col-md-12 col-12 " >
													<i class="fa-solid fa-money-bill-1"></i>
                                                            <span class="icons-items pl-1"> شراء </span>
													</a></button>
													<form class="ersubmit" method="post" action="cart.php">
													<input type="text" name="iditem" class="iditem" value="<?php echo $row[0]; ?>" hidden>
													<input type="text" name="discount" class="iditem" value="<?php echo $q["discount"]; ?>" hidden>
													<input type="text" name="price" class="iditem" value="<?php echo $q['price']; ?>" hidden>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<?php } }} ?>
								<br>
							</div>
						</div>
				</div>
        </div>
			</div>
	
	
			<div class="row ">
			
		<?php  
		if(isset($_POST['iditem']))
		{echo"<script>  $(document).ready(function(){  $('.card2').show()
		});</script>";
			$id=$_POST['iditem'];
			
		$sql=$conn_link->query("SELECT * FROM `order` WHERE `OrderID` =$id") or die("error");
		$quey1=mysqli_fetch_array($sql);
		$query=$conn_link->query("SELECT * FROM product WHERE 	ProductID='$quey1[1]'")or die("error");
		$q1=mysqli_fetch_array($query);
		$data=$q1['Image'] ;
										$res=explode(" ",$data);
										$count=count($res)-1;?>
	<div class="card2 col-md-3"style="width:50%">
	<button id = "hide" class = "btn btn-sm btn-danger" style = "float:left; margin-top:-5px;" onclick="close_btn()"><span class = "glyphicon glyphicon-remove" ></span><span class="m3"> إغلاق</span></button>
        <img src="../image/image Proudect/<?php echo $res[1];?>"  class="card-img-top" alt="...">
        <div class="card-body ">
          <h5 class="card-title"><?php echo $q1['Product'] ?></h5>
          <p class="card-text truncate"><?php echo $q1['description'] ?></p>
             <div class="form-group">
             </div>
             <div class="row">
            	<div class="col-md-2"><label class="control-label">الكمية</label></div>
          	          <div class="input-group col-md-7 mb-3">
			                <div class="input-group-prepend">
			                    <button class="btn btn-outline-secondary" type="button" id="qty-minus"><span class="fa fa-minus"></button>
			             </div>
						 <form method="post" action="pay.php" >
			       <input type="number" style="width:80px"  value="<?php echo $quey1['cont_item'];?>" min = 1 max=<?php echo $q1['Quantity'];?> class="form-control text-center" name="qty" readonly>
			      <div class="input-group-prepend">
			        <button class="btn btn-outline-secondary" type="button" id="qty-plus"><span class="fa fa-plus"></span></button>
			     </div>
		    	</div>
             </div>
               <div class="text-center">
				
				<input type="text" name="orderid" value="<?php echo $id;?>" hidden>
					<input type="text" name="proudectid" value="<?php echo $q1['proudect_id'];?>" hidden>
					<input type="text" name="userid" value="<?php echo $q1['UserID'];?>" hidden>
					<input type="radio"  name="m1"class="radiodeiv"  value="توصيل" style="margin:10px">توصيل
					<input type="radio" name="m2" value="لا"style="margin:10px">لا
					
						<div  class="delev"> 
						<p>إختر شركة التوصيل</p>
						<select name="Company">
							<option></option>
							<?php  $query2=$conn_link->query("SELECT * FROM companie")or die();
							While($row=mysqli_fetch_array($query2))
							{
								$query2=$conn_link->query("SELECT `Name` FROM user WHERE UserID='$row[user_id]'")or die();
								$row2=mysqli_fetch_array($query2);
								?>

							<option value="<?php echo $row[0]; ?>"><?php echo $row2[0];?></option>
							<?php }?>
	</select>
						</div>
						<p>  </p>
						
             	<button type="submit" class="btn btn-outline-primary btn-sm btn-block" id="add_to_cart_modal"><i class="fa fa-cart-plus"></i> شراء</button>
				
				</form>
             </div>
           </div>
	   </div>
          </div>
          </div>
	</div>
	</div>
	<?php } ?>
							</div>
<style>
	
	.card2{
display: none;
	}
	.delev{
		display: none;
	}
</style>
        
	<script type="text/javascript">
	
        let quan=document.getElementsByClassName('iquantity');
	    let price=document.getElementsByClassName('iprice');
	    let total=document.getElementsByClassName('itotal');
	    let sum=document.getElementById('summ');
		let allsum=document.getElementById('allsum');
		let delivary=document.getElementById('delivary');
	    
	    function subTotal(){
		let s=0;
		  for(i=0;i<price.length;i++)
		  {
			
                total[i].innerText=(price[i].value)*(quan[i].value);
			   
			    s+=(price[i].value)*(quan[i].value);
			    sum.innerText=s+" دينار"
                
			  
		  }
		  allsum.innerText=s+parseInt(delivary.textContent)+" دينار"
	    }
	    
    function check(index){
    let number=document.getElementsByClassName('reult');
	let quantity=document.getElementsByClassName('io');
	let add=document.getElementsByClassName('add');
let mines=document.getElementsByClassName('mines');
  
		 if(parseInt(number[index].value)>0 && parseInt(number[index].value)<=parseInt(quantity[index].value)){
 
   subTotal();
        return true;
    }
    else{
        
		if(parseInt(number[index].value)<=0 ){
	
   mines[index].setAttribute('disapled','disapled');
	    alert("الرجاء إدخال كمية أكبر من الصفر"+(index+1));
		
	
		}
		if(parseInt(number[index].value) >= parseInt(quantity[index].value+1) ){
			alert("  الكمية  المدخلة أكبر من المطلوبة للمنتج رقم"+(index+1));
			add[index].setAttribute('disapled','disapled');
		}
		subTotal();
        return false;
    }
}
//}
subTotal();
function Cliced(){
	let number=document.getElementsByClassName('reult');
let add=document.getElementsByClassName('add');
let mines=document.getElementsByClassName('mines');
for(let i=0;i<=add.length;i++){
	let sum=parseInt(number[i].value);
	
	
add[i].addEventListener("click",function(){
	sum+=1
	number[i].value=sum
	check(i)

	
})
sum=parseInt(number[i].value);
mines[i].addEventListener("click",function(){
	if(sum==1){
		return false;
	}
	else{
	sum-=1
	number[i].value=sum
	 check(i)
	}
})

}
}
$('#qty-minus').click(function(){
		var qty = $('input[name="qty"]').val();
		if(qty == 1){
			return false;
		}else{
			$('input[name="qty"]').val(parseInt(qty) -1);
		}
	})
	$('#qty-plus').click(function(){
		var qty = $('input[name="qty"]').val();
			$('input[name="qty"]').val(parseInt(qty) +1);
	})
	//$('.view_prod').click(function(){
		function er(){
		let buttonsubmit=document.getElementsByClassName('view_prod');
		let input=document.getElementsByClassName('iditem');
		let ersubmit=document.getElementsByClassName('ersubmit');
		for(let i=0;i<buttonsubmit.length;i++){
			
			buttonsubmit[i].addEventListener("click",function(){
				ersubmit[i].submit();
})}}

function close_btn(){
	$('.card2').hide();
}
$(document).ready(function(){
$('.radiodeiv').click(function(){
$(".delev").show();
} )
})
</script>
</div>
</body>
<?php
    include 'style/include/footer.php';
?>