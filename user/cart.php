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
									while($row=mysqli_fetch_array($query)){
										$sql=$conn_link->query("SELECT Sum(Price) FROM product WHERE ProductID='$row[1]'")or die("error");
										$f=mysqli_fetch_array($sql);
										$sum+=$f[0];
									}
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
												<p class="data-subtitle font-weight-bold mb-0"><?php
												echo $sum;
												?> دينار</p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<p class="num-product mb-0"> توصيل </p>
											</div>
											<div class="col-md-6 col-6 text-center no-padding">
												<p class="data-subtitle font-weight-bold mb-0">50 دينار</p>
											</div>
										</div>
										<hr>
										<div class="row mb-5">
											<div class="col-md-6 col-6 text-center">
												<p class="num-product mb-0"> اجمالي </p>
											</div>
											<div class="col-md-6 col-6 text-center no-padding">
												<p class="data-subtitle font-weight-bold mb-0">1000 دينار</p>
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
														<p class="cart-price mb-0  text-left"><?php echo $q['Price']; ?> دينار</p>
														<!-- <p class="cart-items">2 Left</p> -->
													</div>
													<div class="col-md-3 col-3 mt-3">
														<i class="fas fa-plus-circle plus-icon"></i>
														<span class="num-items pr-2 pl-2"> <?php echo $row['cont_item']; ?></span>
														<i class="fas fa-minus-circle minus-icon"></i>
													</div>
													<br>
													<a href="#"class="col-md-12 col-12 delet">
                                                        
                                                            <i class="fas fa-trash trash-icon"></i>
                                                            <span class="icons-items pl-1"> حدف </span>
                                                    </a>
													<br>
													<a href="#"class="col-md-12 col-12 delet">
                                                        
													<i class="fa-solid fa-money-bill-1"></i>
                                                            <span class="icons-items pl-1"> شراء </span>
                                                    </a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } }} ?>
								<br>
							</div>
						</div>
					<?php /*	
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="centered-row mb-0">
											<div class="col-md-4 mb-1">
												<img src="../image/car-02.jpg" class="cart-image" />
											</div>
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-9 col-9">
														<p class="cart-product mb-0 text-right">اسم المنتج</p>
														<p class="cart-price mb-0  text-left">200 دينار</p>
														<!-- <p class="cart-items">2 Left</p> -->
													</div>
													<div class="col-md-3 col-3 mt-3">
														<i class="fas fa-plus-circle plus-icon"></i>
														<span class="num-items pr-2 pl-2"> 1 </span>
														<i class="fas fa-minus-circle minus-icon"></i>
													</div>
													<br>
													<a href="#"class="col-md-12 col-12 delet">
                                                        
                                                            <i class="fas fa-trash trash-icon"></i>
                                                            <span class="icons-items pl-1"> حدف </span>
                                                    </a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="centered-row mb-0">
											<div class="col-md-4 mb-1">
												<img src="../image/car-02.jpg" class="cart-image" />
											</div>
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-9 col-9">
														<p class="cart-product mb-0 text-right">اسم المنتج</p>
														<p class="cart-price mb-0  text-left">200 دينار</p>
														<!-- <p class="cart-items">2 Left</p> -->
													</div>
													<div class="col-md-3 col-3 mt-3">
														<i class="fas fa-plus-circle plus-icon"></i>
														<span class="num-items pr-2 pl-2"> 1 </span>
														<i class="fas fa-minus-circle minus-icon"></i>
													</div>
													<br>
													<a href="#"class="col-md-12 col-12 delet">
                                                        
                                                            <i class="fas fa-trash trash-icon"></i>
                                                            <span class="icons-items pl-1"> حدف </span>
                                                    </a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="centered-row mb-0">
											<div class="col-md-4 mb-1">
												<img src="../image/car-02.jpg" class="cart-image" />
											</div>
											<div class="col-md-8">
												<div class="row">
													<div class="col-md-9 col-9">
														<p class="cart-product mb-0 text-right">اسم المنتج</p>
														<p class="cart-price mb-0  text-left">200 دينار</p>
														<!-- <p class="cart-items">2 Left</p> -->
													</div>
													<div class="col-md-3 col-3 mt-3">
														<i class="fas fa-plus-circle plus-icon"></i>
														<span class="num-items pr-2 pl-2"> 1 </span>
														<i class="fas fa-minus-circle minus-icon"></i>
													</div>
													<br>
													<a href="#"class="col-md-12 col-12 delet">
                                                        
                                                            <i class="fas fa-trash trash-icon"></i>
                                                            <span class="icons-items pl-1"> حدف </span>
                                                    </a>
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
							</div>
						</div>
					</div>*/?>
				</div>
        </div>
			</div>
        
	</div>
	</div>



</body>
<?php
    include 'style/include/footer.php';
?>