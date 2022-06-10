<?php
include 'style/include/header.php';
?>

<!-- Start Profile -->
<div class="profile_edit">
    <h2 class="main-title">اضافة منتج</h2>

<div class="box">
    <div class="container">
        <div class="from-box">
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل اسم منتج">
                  <span class="field__label-wrap">
                    <span class="field__label">اسم منتج</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل السعر">
                  <span class="field__label-wrap">
                    <span class="field__label">السعر</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل الكمية">
                  <span class="field__label-wrap">
                    <span class="field__label">الكمية</span>
                  </span>
                </label>
              </div>
            <div class="page">
                <label class="field field_v1">
                  <input class="field__input" placeholder="ادخل التخفيض">
                  <span class="field__label-wrap">
                    <span class="field__label">التخفيض</span>
                  </span>
                </label>
              </div>
              <div class="page">
                <label class="field field_v1">
                    <textarea class="field__input" placeholder="ادخل الوصف" name="" id="" cols="30" rows="40"></textarea>
                  <span class="field__label-wrap">
                    <span class="field__label">الوصف</span>
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
                <a href="signup.php"><span>اضافة المنتج</span></a>
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