<?php 
 
 include "db_conn.php";
session_start();

	$admint = $_SESSION['admin'];


include '../login/config.php';
$user_id = $_SESSION['user_id'];
 $admint = $_SESSION['admin'];


if($admint == "huzaifaD"){
    if(!isset($user_id)){
       header('location:../login/login.php');
    };

    if(isset($_GET['logout'])){
       unset($user_id);
       session_destroy();
       header('location:../login/login.php');
    }
}else{
         header('location:../login/login.php');

}


if(isset($_POST['saerchInput'])){
	$saerchInput = $_POST['saerchInput'];

	$sqlSerch = "SELECT * FROM orders WHERE userNumber LIKE '{$saerchInput}%' or id LIKE '{$saerchInput}%'
  or order_page_name LIKE '{$saerchInput}%'";
	$resultSaerch = mysqli_query($conn, $sqlSerch);

	if(mysqli_num_rows($resultSaerch) > 0){
		?>
     
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Qaryat Gifts </title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="..//css/elzero.css?v=<?php echo time(); ?>" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
     <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  </head>
  <body>
    <!-- Start Header -->
    <div class="header" id="header">
      <div class="container">
        <ul class="main-nav">
          <li><a href="index.php">orders</a></li>
          <li><a href="../index.php">home</a></li>
          <li><a href="col.php">controle panel </a></li>
          <li>
            <a href="../login/login.php">تسجيل الدخول</a>
            
          </li>
        </ul>
        <form class="row g-3" action="saerch.php" method="POST">
  <div class="col-auto">
    <input type="text" class="form-control" name="saerchInput" id="inputPassword2 live-saerch" placeholder="بحث  ...">
  </div>
  <div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary mb-3">بحث </button>
  </div>
</form>
      </div>
    </div>
    <!-- End Header -->

  <div class="container" style="padding: 30px;">
    
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
         <th scope="col">الحساب التجاري  </th>
          <th scope="col">رقم الطلب </th>
          <th scope="col">السعر</th>
          <th scope="col">ملاحضات</th>
          <th scope="col">رقم المستلم </th>
          <th scope="col">العنوان </th>
                     <th scope="col">حذف </th>

           <th scope="col">تعديل </th>

           <th scope="col"> عرض</th>
           <th scope="col"> الحالة </th>



        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($resultSaerch)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["order_page_name"] ?></td>
            <td><?php echo $row["orderN"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td style="width: 200px;
    overflow: hidden;
    display: block;
    height: 50px;
    text-align: end;"><?php echo $row["note"] ?></td>
            <td><?php echo $row["userNumber"] ?></td>
            <td><?php echo $row["addreces"] ?></td>
                  <td><a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="bi bi-trash-fill"></i></a></td>
                  <td><a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="bi bi-pencil-square"></i></a> </td>
                  <td> <a href="order.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="bi bi-box-arrow-up-right"></i> </a></td>
                  <td><a href="order.php?id=<?php echo $row["id"] ?>" class="link-dark" style= "text-decoration: auto;
    color: red;
    font-weight: 700;
    list-style: none;"><?php if($row["statuse"] == "1"){
              echo "قيد التجهيز ";}elseif($row["statuse"] == "2"){
                 echo "تم ارسال الطلب الى شركة التوصيل ";
              }elseif($row["statuse"] == "3"){
                echo "تم استلام الطلب ";
             }
             elseif($row["statuse"] == "4"){
              echo "طلب راجع";
           }?> </a></td>


            
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- jqyery script link cdn  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</body>

</html>
       <?php
	}elseif(mysqli_num_rows($resultSaerch) < 1){
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Qaryat Gifts </title>
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="..//css/elzero.css?v=<?php echo time(); ?>" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />
     <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  </head>
  <body>
    <!-- Start Header -->
    <div class="header" id="header">
      <div class="container">
        <ul class="main-nav">
          <li><a href="index.php">orders</a></li>
          <li><a href="../index.php">home</a></li>
          <li><a href="col.php">controle panel </a></li>
          <li>
            <a href="../login/login.php">تسجيل الدخول</a>
            
          </li>
        </ul>
        <form class="row g-3" action="saerch.php" method="POST">
  <div class="col-auto">
    <input type="text" class="form-control" name="saerchInput" id="inputPassword2 live-saerch" placeholder="بحث  ...">
  </div>
  <div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary mb-3">بحث </button>
  </div>
</form>
      </div>
    </div>
    <!-- End Header -->

  <div class="container" style="padding: 30px;">
    
    <a href="add-new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
         <th scope="col">الحساب التجاري  </th>
          <th scope="col">رقم الطلب </th>
          <th scope="col">السعر</th>
          <th scope="col">ملاحضات</th>
          <th scope="col">رقم المستلم </th>
          <th scope="col">العنوان </th>
                     <th scope="col">حذف </th>

           <th scope="col">تعديل </th>

           <th scope="col"> عرض</th>


        </tr>
      </thead>
    
    </table>
      <h1 style="text-align: center;">لا يوجد نتائج </h1>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- jqyery script link cdn  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</body>

</html>

   <?php

	}

	
}



?>