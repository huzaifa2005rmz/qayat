
<?php
include "../controle/db_conn.php";




include "db_conn.php";

include '../login/config.php';
session_start();
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










$id = $_GET["id"];


  $sql = "SELECT * FROM `orders` WHERE id = $id ";



    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

include '../login/config.php';

$user_id = $_SESSION['user_id'];
$admint = $_SESSION['admin'];





if(!isset($user_id)){
   header('location:../login/login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login/login.php');
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../orders/style.css?v=<?php echo time(); ?>">
	<title>user order </title>
   <style>
      @media print{
       #hidn{
         visibility: hidden;
       }
      }
   </style>
</head>
<body>

	<div class="haeder-order">
		<h1> مطبعة عشتار </h1>
	</div>
       <div class="order-description" style="padding: 0;">
        <?php

         $sqlUser = "SELECT * FROM `user_form` WHERE id = '$user_id'";


          $userInfo = mysqli_query($conn, $sqlUser);
          $userInfoN = mysqli_fetch_assoc($userInfo);
          $order_id =  $row['user_id'];
        ?>
        <p class="text-p "><span><?php echo $row['id'] ?> </span>: ORDER ID FORM SYSTEM </p>
       	<p class="text-p ">  <span><?php echo $userInfoN['name'] ?></span> : منشائ الطلب   </p>
        <p class="text-p "> <span><?php echo $row['page_name'] ?></span> اسم  الحساب التجاري : </p>
       	<p class="text-p "> <span><?php echo $row['orderN'] ?></span> :رقم الطلب </p>
       	<p class="text-p "> <span><?php echo $row['price'] ?></span>: السعر</p>
       	<p class="text-p "><span><?php echo $row["userNumber"] ?> </span>:رقم الهاتف </p>
       	<p class="text-p "> <span><?php echo $row["Governorate"] ?> <?php echo $row["addreces"] ?></span>  : العنوان</p>
    
       	<p class="text-p ">  <?php echo $row["note"]  ?> </p> 
       </div>
    <div class="images">
    <a href="index.php" style="text-decoration: none; color:#fff; border: 1px solid #fff; padding: 10px; background: #333; display: block; margin: 36px auto;" id="hidn">العودة الى الصفحة الرئيسية  </a>

    <?php
          
            // start php code for foring kay 

$foringkeyImages = mysqli_query($conn,  "SELECT * FROM `orders` WHERE id = '$id'");
$foringkeyImage = mysqli_fetch_assoc($foringkeyImages);
  $order_idN = $foringkeyImage['id'];

  // end php code for foring kay 


      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_images WHERE order_id = '$order_idN'");
      ?>
      <?php foreach ($rows as $row) : ?>
          <?php
          foreach (json_decode($row["image"]) as $image) : ?>
          <img src="../img/uploads/<?php echo $image; ?>" width = 200>
          <?php endforeach; ?>
      <?php endforeach; ?>


    </div>

</body>
</html>


