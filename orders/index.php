<?php
include "../controle/db_conn.php";

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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/elzero.css" />
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
      
          <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet" />


  <title>قرية الهدايا</title>
</head>

<body>
 <!-- Start Header -->
    <div class="header" id="header">
      <div class="container" style="align-items: stretch; justify-content: space-between;">
        <a href="#" class="logo" style="text-decoration: none;">Qaryat Gifts</a>
        <ul class="main-nav">
          <li><a href="add-new.php" style="text-decoration: none;">انشاء طلب  </a></li>
         
        </ul>
      </div>
    </div>
    <!-- End Header -->
 
<!-- start bootstrp craed  -->
<div class="card-group container" style="margin-top: 20px;">
     <?php
        $sql = "SELECT * FROM `orders` WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"> <?php echo $row["order_page_name"] ?></h5>
    <p class="card-text"><?php echo $row["note"] ?></</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> <span><?php echo $row["id"] ?></span>: ID </li>
    <li class="list-group-item"> <span><?php echo $row["orderN"] ?></span>: رقم الطلب  </li>
    <li class="list-group-item"><span><?php echo $row["userNumber"] ?></span>: رقم الستلم  </li>
    <li class="list-group-item"> <span><?php echo $row["addreces"] ?></span> : العنوان  </li>
    <li class="list-group-item"><span><?php echo $row["order_page_name"] ?></span>: اسم الحساب التجاري  </li>
    <li class="list-group-item"><span><?php echo $row["price"] ?></span> : السعر  </li>
  </ul>
  <div class="card-body" style="display: flex; justify-content: space-around; align-items:center;">
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark card-link"><i class="fa-solid fa-trash fs-5"></i></a>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark card-link"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="../orders/user_order.php?id=<?php echo $row["id"] ?>" class="link-dark card-link" style="font-size: 20px;"><i class="fa-solid fa-up-right-from-square"></i> </a>


  </div>
</div>
               <?php
        }
        ?>
</div>
<!-- end bootstrap cards  -->
  
    

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>