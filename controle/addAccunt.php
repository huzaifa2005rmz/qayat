<?php

include '../login/config.php';


session_start();
$admint = $_SESSION['admin'];
include "db_conn.php";

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





if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../login/uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image, usertype) VALUES('$name', '$email', '$pass', '$image', '$user_type')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:../login/login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

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


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Boxicons -->
   <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   <!-- My CSS -->
   <link rel="stylesheet" href="html/style.css?v=<?php echo time(); ?>">

   <title>AdminHub</title>
</head>
<body>


   <!-- SIDEBAR -->
   <section id="sidebar">
      <a href="#" class="brand">
         <i class='bx bxs-smile'></i>
         <span class="text">لوحة التحكم</span>
      </a>
      <ul class="side-menu top">
         <li >
            <a href="col.php">
               <i class='bx bxs-dashboard' ></i>
               <span class="text">المستخدمين</span>
            </a>
         </li>
         <li class="active">
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
         <li>
            <a href="index.php">
               <i class='bx bxs-message-dots' ></i>
               <span class="text">كل الاوردرات </span>
            </a>
         </li>
         
      </ul>
      <ul class="side-menu">
         <li>
            <a href="#">
               <i class='bx bxs-cog' ></i>
               <span class="text">Settings</span>
            </a>
         </li>
         <li>
            <a href="#" class="logout">
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
         <form action="#">
            <div class="form-input">
               <input type="search" placeholder="Search...">
               <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
            </div>
         </form>
         <input type="checkbox" id="switch-mode" hidden>
         <label for="switch-mode" class="switch-mode"></label>
         <a href="#" class="notification">
            <i class='bx bxs-bell' ></i>
            <span class="num">8</span>
         </a>
         <a href="#" class="profile">
            <img src="img/people.png">
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

<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
   
      <select name="user_type" style="
    font-size: 30px;
">
<option value="clint" class="box">حساب زبون</option>
        <option value="page" class="box">حساب تجاري </option>
                <option value="huzaifaD" class="box">  حساب متحكم </option>

        
      </select>
      <input type="text" name="name" placeholder="enter username" class="box" required>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="register now" class="btn">
      
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>
         
      </main>
      <!-- MAIN -->
   </section>
   <!-- CONTENT -->

   <script src="html/script.js"></script>
</body>
</html>

