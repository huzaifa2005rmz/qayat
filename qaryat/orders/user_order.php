
<?php
include "../controle/db_conn.php";
$id = $_GET["id"];


  $sql = "SELECT * FROM `orders` WHERE id = $id LIMIT 1";



    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

include '../login/config.php';
session_start();
$user_id = $_SESSION['user_id'];



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
	<link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
	<title>user order </title>
</head>
<body>

	<div class="haeder-order">
		<h1> مطبعة عشتار </h1>
	</div>
       <div class="order-description">
        <?php

         $sqlUser = "SELECT * FROM `user_form` WHERE id = '$user_id'";


          $userInfo = mysqli_query($conn, $sqlUser);
          $userInfoN = mysqli_fetch_assoc($userInfo);
          $order_id =  $row['user_id'];
        ?>
        <p class="text-p "><?php echo $row['id'] ?> : ORDER ID FORM SYSTEM </p>
       	<p class="text-p "> اسم  الحساب التجاري : <?php echo $userInfoN['name'] ?></p>
       	<p class="text-p "> <?php echo $row['orderN'] ?> :رقم الطلب </p>
       	<p class="text-p "> النوع :<?php echo $row['price'] ?> </p>
       	<p class="text-p "><?php echo $row["userNumber"] ?> :رقم الهاتف </p>
       	<p class="text-p ">العنوان: <?php echo $row["addreces"]  ?>  </p>
        <span>ملاحضة </span>
       	<p class="text-p ">  <?php echo $row["note"]  ?> </p> 
       </div>
    <div class="images">

    <?php
          
            // start php code for foring kay 

$foringkeyImages = mysqli_query($conn,  "SELECT * FROM `orders` WHERE user_id = '$user_id' ORDER BY ID DESC LIMIT 1");
$foringkeyImage = mysqli_fetch_assoc($foringkeyImages);
  $order_idN = $foringkeyImage['id'];

  // end php code for foring kay 


      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_images WHERE order_id = '$order_idN'  ORDER BY ID DESC LIMIT 1 ");
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

