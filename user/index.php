<?php
include 'style/include/header.php';
?>

<!-- Start Profile -->
<div class="profile">
      
      <div class="container emp-profile">
        <form method="post" >
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="../image/user-01.jpg" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            تغير الصورة
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
                                    معاذ فرحات
                                </h5>
                                <h6>
                                    ليبيا .. زليتن
                                </h6>
                                <!-- <p class="proile-rating">رقم الهاتف : <span>0926512478</span></p> -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="index.php" role="tab" aria-controls="home" aria-selected="true">معلومات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="allproduct.php" role="tab" aria-controls="profile" aria-selected="false">منتجات</a>
                            </li>
    
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                  <div class="wrapper">
                    <a href="user_edit.php"><span>تعديل  </span></a>
                    </div>
                  <div class="wrapper">
                    <a href="new_product.php"><span>اضافة منتج  </span></a>
                    </div>
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="تعديل"/> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>معلومات التواصل</p>
                        <a href="">mohad@gmail.com</a><br/>
                        <a href="https://api.whatsapp.com/send?phone=+218926506115&text= iam Ali ">0945214566</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active as123"  id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>اسم مستخدم</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>mohad123</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>الاسم</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>معاذ فرحات</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>بريد الالكتروني</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>mohad@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>رقم الهاتف</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>0945214566</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>العنوان</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>زليتن</p>
                                        </div>
                                    </div>
                        </div>
  
                    </div>
                </div>
            </div>
        </form>           
    </div>
  
</div>
    <!-- End Profile -->
<?php
    include 'style/include/footer.php';
?>
    