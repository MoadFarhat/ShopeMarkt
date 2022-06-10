<?php
include 'style/include/header.php';
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
                    <button type="button"class="btn">بحث</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
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
            <tr>
                <th>1</th>
                <th>محمد</th>
                <th>123</th>
                <th>مدير</th>
                <th>moh@gmail.com</th>
                <th>0912589634</th>
                <th>الخمس</th>
                <th><img width="35px" height="35px" src="../image/user.jpg" alt=""></th>
                <td class="as12"><div class="multi-button">
                    <button>تعديل </button>
                  </div>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <th>مختار</th>
                <th>456</th>
                <th>مستخدم</th>
                <th>moktar@gmail.com</th>
                <th>0922545634</th>
                <th>طرابلس</th>
                <th><img width="35px" height="35px" src="../image/user.jpg" alt=""></th>
                <td class="as12"><div class="multi-button">
                    <!-- <button>تعديل </button> -->
                    <button>حدف</button>
                  </div>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <th>خليفة</th>
                <th>456789</th>
                <th>موظف</th>
                <th>alz@gmail.com</th>
                <th>0944569273</th>
                <th>زليتن</th>
                <th><img width="35px" height="35px" src="../image/user.jpg" alt=""></th>
                <td class="as12"><div class="multi-button">
                    <button>تعديل </button>
                    <button>حدف</button>
                  </div>
                </td>
            </tr>
            
            <tbody>
        </table>
    </div>
    
</div>
</div>
<!-- End User -->
<?php
include 'style/include/footer.php';
?>

</body>
</html>