<?php
include "../controle/db_conn.php";
require '../img/config.php';
include '../login/config.php';

session_start();
$user_id = $_SESSION['user_id'];

 


$userInfo1 = mysqli_query($conn,  "SELECT * FROM `user_form` WHERE id = '$user_id'");
$userInfo = mysqli_fetch_assoc($userInfo1);




      $images = mysqli_query($conn, "SELECT * FROM tb_images"); 
      $img = mysqli_fetch_assoc($images);

if (isset($_POST["submit"])) {
   $orderN = $_POST['orderN'];
   $price = $_POST['price'];
   $note = $_POST['note'];
   $userNumber = $_POST['userNumber'];
   $addreces = $_POST['addreces'];
   $user_id = $userInfo['id'];
   $order_page_name = $_SESSION['user_name'];




   $sql = "INSERT INTO `orders`(`orderN`, `price`, `note`, `userNumber`, `addreces`, `user_id`, `order_page_name`) 
   VALUES ('$orderN','$price','$note','$userNumber','$addreces', '$user_id', '$order_page_name')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      $_SESSION['order_img'] = $orderN;
      header("Location: ../img/upload.php");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="../css/elzero.css" />


   <title>PHP CRUD Application</title>
</head>

<body>
    <!-- Start Header -->
    <div class="header" id="header">
      <div class="container">
        <a href="#" class="logo">Qaryat Gifts</a>
        <ul class="main-nav">
         <li><a href="index.php"> عرض الطلبات   </a></li>

         
        </ul>
      </div>
    </div>
    <!-- End Header -->
   <div class="container" style="margin-top:30px">
      <div class="text-center mb-4">
         <h3>انشاء طلب جديد</h3>
         <p class="text-muted">املء المعلومات ثم اضغط ارسال</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
              
               <div class="col">
                  <label class="form-label">رقم الطلب :</label>
                  <input type="number" class="form-control" name="orderN" placeholder="رقم الطلب ">
               </div>
                  <div class="col">
                  <label class="form-label">السعر   :</label>
                  <input type="number" class="form-control" name="price" placeholder="السعر ">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">رقم هاتف المستلم :</label>
               <input type="text" class="form-control" name="userNumber" placeholder="اكتب رقم المستلم ">
            </div>

            <div class="form-group mb-3">
               <label>العنوان :</label>
               <input type="text" class="form-control" name="addreces" placeholder="بغداد\السيدية \ شارع التجاري ">
            </div>
             <div class="col">
                  <label class="form-label">ملاحضة:</label>
  <textarea class="form-control" style="height: 180px" placeholder="اضف كامل التفاصيل عن الطلب " name="note" id="floatingTextarea"></textarea>
                 </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>