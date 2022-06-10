<?php
include 'style/include/header.php';
?>

<!-- Start Profile -->
<div class="profile_edit">
    <h2 class="main-title">تعديل بيانات الشخصية</h2>

<div class="box">
    <div class="container">
        <div class="from-box">
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل اسم مستخدم">
                  <span class="field__label-wrap">
                    <span class="field__label">اسم المستخدم</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل كلمة السر">
                  <span class="field__label-wrap">
                    <span class="field__label">كلمة السر</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل البريد الالكتروني">
                  <span class="field__label-wrap">
                    <span class="field__label">البريد الالكتروني</span>
                  </span>
                </label>
              </div>
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل رقم الهاتف">
                  <span class="field__label-wrap">
                    <span class="field__label">رقم الهاتف</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل العنوان">
                  <span class="field__label-wrap">
                    <span class="field__label">العنوان</span>
                  </span>
                </label>
              </div>
              <div class="img1">
              <div class="img">
                <label for="inputTag">
                  ادخل الصورة 
                  <!-- <br/> -->
                  <!-- <i class="fa fa-2x fa-camera"></i> -->
                  <input id="inputTag" type="file"/>
                  <!-- <br/> -->
                  <!-- <span id="imageName"></span> -->
                </label>
              </div>
              </div>
            
              <div class="wrapper">
                <a href="signup.php"><span>التسجيل</span></a>
                </div>
              <div class="wrapper">
                <a href="index.php"><span>رجوع صفحة شخصية</span></a>
                </div>
            <!-- <button type="button" class="login-button">التسجيل</button> -->
        </div>
    </div>
</div>
</div>
    <!-- End Profile -->
<?php
    include 'style/include/footer.php';
?>
   