<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@1,300&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
 <aside>
   
<div class="top">
  <div class="logo">
    <img src="image/user.jpg">
    <h2>Mar<span class="danger">ket</span></h2>
  </div>
  <div class="close" id="close-btn">
  <span class="material-symbols-sharp">
close
</span>
  </div>
</div>
<div class="sidebar">
<a href="#"><span class="material-symbols-sharp">
grid_view
</span><h3> الفحة الرئيسية</h3></a>
<a href="#" class="active"><span class="material-symbols-sharp">
person
</span><h3>  المنتجات</h3></a>
<a href="#"><span class="material-symbols-sharp">
monitoring
</span><h3> الإحصائيات</h3></a>
<a href="#"><span class="material-symbols-sharp">
add
</span><h3>  إضافة منتج </h3></a>
<a href="#"><span class="material-symbols-sharp">
logout
</span><h3>  تسجيل الخروج</h3></a>
</div>
 </aside>
 <main>
   <h1> التحكم</h1>
   <div class="date">
     <input type="date"/>
   </div>
   <div class="insights">
     <div class="sales">
     <span class="material-symbols-sharp">
analytics
</span>
<div class="middel">
  <div class="left">
    <h3>اللإجمالي</h3>
    <h1>250 دينار</h1>
  </div>
<div class="progress">
  <svg>
    <circle cx='38' cy='38' r='36'></circle>
</svg>
<div class="number">
  <p>81%</p>
</div>
</div>  
</div>
<small class=" text-muted">Last 24</small>
     </div>
     

     <div class="expenses">
     <span class="material-symbols-sharp">
bar_chart
</span>
<div class="middel">
  <div class="left">
    <h3>اللإجمالي</h3>
    <h1>250 دينار</h1>
  </div>
<div class="progress">
  <svg>
    <circle cx='38' cy='38' r='36'></circle>
</svg>
<div class="number">
  <p>81%</p>
</div>
</div>  
</div>
<small class=" text-muted">Last 24</small>
     </div>

     <div class="income ">
     <span class="material-symbols-sharp">
stacked_line_chart
</span>
<div class="middel">
  <div class="left">
    <h3>اللإجمالي</h3>
    <h1>250 دينار</h1>
  </div>
<div class="progress">
  <svg>
    <circle cx='38' cy='38' r='36'></circle>
</svg>
<div class="number">
  <p>81%</p>
</div>
</div>  
</div>
<small class=" text-muted">Last 24</small>
     </div>
   </div>
   <div class="recentOrder">
<h1> المنتجات</h1>
<table>
  <thead>
    <th>الإسم </th>
    <th>الكمية </th>
    <th>التصنيف </th>
    <th>السعر </th>
    <th>التخفيض </th>
  </thead>
  <tbody>
    <tr>
    <td> قميص</td>
    <td> 12</td>
    <td> ملابس</td>
    <td> 120</td>
    <td> 20</td>
    <td> <button class="btndelete "><a class="delete" href="#"><span class="wh">حذف  </span>  </a></button>
    <button class="btnupdate "><a class="update" href="#"><span class="wh">تعديل  </span></a></button>
  </td>
  </tr>
  <tr>
    <td> قميص</td>
    <td> 12</td>
    <td> ملابس</td>
    <td> 120</td>
    <td> 20</td>
    <td> <button class="btndelete "><a class="delete" href="#"><span class="wh">حذف  </span></a></button>
    <button class="btnupdate "><a class="update" href="#"><span class="wh">تعديل  </span> </a></button>
  </td>
  </tr>
  <tr>
    <td> قميص</td>
    <td> 12</td>
    <td> ملابس</td>
    <td> 120</td>
    <td> 20</td>
    <td> <button class="btndelete "><a class="delete" href="#"><span class="wh">حذف  </span> </a></button>
    <button class="btnupdate "><a class="update" href="#"><span class="wh">تعديل  </span></a></button>
  </td>
  </tr>
  </tbody>
</table>
<a class="all"href="#"> عرض الكل</a>
   </div>
 </main>
 <div class="right">
   <div class="top">
     <button id="menu-btn"> <span class="material-symbols-sharp">
menu
</span></button>
<div class="profile">
<div class="info">
  <p>مرحبا<b> معاذ</b></p>
  <small class="text-muted">مستخدم</small>
  </div>
  <div class="profile-photo">
  <img src="image/user.jpg"/>
  </div>


</div>
   </div>
 </div>
 </div>
</body>
</html>