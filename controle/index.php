<?php
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

?>





<?php
include "../controle/db_conn.php";

include '../login/config.php';
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

        <!-- start php code users  -->
                   <?php
                      $sqlimg = "SELECT * FROM `user_form` WHERE id = '$user_id'";
                      $resultimg = mysqli_query($conn, $sqlimg);
                       $img = mysqli_fetch_assoc($resultimg);
                       ?>
            <!-- end php code selsct users  -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <!-- My CSS -->
  <link rel="stylesheet" href="html/style.css?v=<?php echo time(); ?>">
<link href="
https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css
" rel="stylesheet">


  <title>AdminHub</title>
</head>
<body>

  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="../controle/col.php" class="brand">
      <i class='bx bxs-smile'></i>
      <span class="text">لوحة التحكم</span>
    </a>
    <ul class="side-menu top">
      <li >
        <a href="../controle/col.php">
          <i class='bx bxs-dashboard' ></i>
          <span class="text">المستخدمين</span>
        </a>
      </li>
      <li>
        <a href="addAccunt.php">
          <i class='bx bxs-shopping-bag-alt' ></i>
          <span class="text">اضافة حساب </span>
        </a>
      </li>
      <li>
        <a href="create-new-order.php">
          <i class='bx bxs-doughnut-chart' ></i>
          <span class="text">اضافة اوردر</span>
        </a>
      </li>
      <li class="active">
        <a href="index.php">
          <i class='bx bxs-message-dots' ></i>
          <span class="text">كل الاوردرات </span>
        </a>
      </li>
      
    </ul>
    <ul class="side-menu">
      <li>
        <a href="../login/Home.php">
          <i class='bx bxs-cog' ></i>
          <span class="text">Settings</span>
        </a>
      </li>
      <li>
        <a href="../login/Home.php" class="logout">
          <i class='bx bxs-log-out-circle' ></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- SIDEBAR -->



  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <i class='bx bx-menu' ></i>
      <a href="#" class="nav-link">Categories</a>
      <form action="saerch.php" method="POST">
        <div class="form-input">
          <input type="search" name="saerchInput" placeholder="Search...">
          <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
        </div>
      </form>
      <input type="checkbox" name="saerchInput" id="switch-mode" hidden>
      <label for="switch-mode" class="switch-mode"></label>
      <a href="#" class="notification">
        <i class='bx bxs-bell' ></i>
        <span class="num">8</span>
      </a>
      <a href="#" class="profile">
        <img src="../login/uploaded_img/<?php echo $img['image'] ?>">
      </a>
    </nav>
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
      <div class="head-title">
        <div class="left">
          <h1>Dashboard</h1>
          <ul class="breadcrumb">
            <li>
              <a href="#">Dashboard</a>
            </li>
            <li><i class='bx bx-chevron-right' ></i></li>
            <li>
              <a class="active" href="#">Home</a>
            </li>
          </ul>
        </div>
      
      </div>


      <div class="table-data">
        <div class="order">
          <div class="head">
            <h3>Recent Orders</h3>
            <i class='bx bx-search' ></i>
            <i class='bx bx-filter' ></i>
          </div>
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>ORDER NUMBER</th>
              </tr>
            </thead>

        
                 <tbody>
        <?php
        $sql = "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
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
            <td><a href="order.php?id=<?php echo $row["id"] ?>" class="link-dark" style= "color: red"><?php if($row["statuse"] == "1"){
              echo "قيد التجهيز ";}elseif($row["statuse"] == "2"){
                 echo "تم ارسال الطلب الى شركة التوصيل ";
              }elseif($row["statuse"] == "3"){
                echo "تم استلام الطلب ";
             }
             elseif($row["statuse"] == "4"){
              echo "طلب راجع";
           }?> </a></td>
                  <td><a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i style="padding: 10px; color: #333;" class="bi bi-trash-fill"></i></a></td>
                  <td><a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i style="padding: 10px; color: #333;" class="bi bi-pencil-square"></i></a> </td>
                  <td> <a href="order.php?id=<?php echo $row["id"] ?>" class="link-dark"><i style="padding: 10px; color: #333;" class="bi bi-box-arrow-up-right"></i> </a></td>

            
          </tr>
        <?php
        }
        ?>
      </tbody>
          </table>
        </div>
        
      </div>
    </main>
    <!-- MAIN -->
  </section>

  <!-- CONTENT -->

  <script src="html/script.js"></script>
</body>
</html>
















