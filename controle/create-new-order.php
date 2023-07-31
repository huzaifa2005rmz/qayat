<?php
include "../controle/db_conn.php";
require '../img/config.php';
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
 


$userInfo1 = mysqli_query($conn,  "SELECT * FROM `user_form` WHERE id = '$user_id'");
$userInfo = mysqli_fetch_assoc($userInfo1);




      $images = mysqli_query($conn, "SELECT * FROM tb_images"); 
      $img = mysqli_fetch_assoc($images);

if (isset($_POST["submit"])) {
   $orderN = $_POST['orderN'];
   $page_name = $_POST['page_name'];
   $price = $_POST['price'];
   $note = $_POST['note'];
   $userNumber = $_POST['userNumber'];
   $addreces =  $_POST['addreces'] ;
   $Governorate = $_POST['Governorate'];
   $user_id = $userInfo['id'];
   $order_page_name = $_SESSION['user_name'];
   $statuse = 1;




   $sql = "INSERT INTO `orders`(`orderN`, `price`, `note`, `userNumber`, `addreces`, `user_id`, `order_page_name`, `page_name`, `statuse`, `Governorate`) 
   VALUES ('$orderN','$price','$note','$userNumber','$addreces', '$user_id', '$order_page_name', '$page_name', '$statuse', '$Governorate')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      $_SESSION['order_img'] = $orderN;
      header("Location: ../img/upload-col.php");
   } else {
      echo "Failed: " . mysqli_error($conn);
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
     <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="style.css">
   <!-- My CSS -->
   <link rel="stylesheet" href="html/style.css?v=<?php echo time(); ?>">

   <title>AdminHub</title>
</head>
<body>


   <!-- SIDEBAR -->
   <section id="sidebar">
      <a href="col.php" class="brand">
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
         <li>
            <a href="addAccunt.php">
               <i class='bx bxs-shopping-bag-alt' ></i>
               <span class="text">اضافة حساب </span>
            </a>
         </li>
         <li class="active">
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
            <img src="../login/uploaded_img/<?php echo $img['image'] ?>">
         </a>
      </nav>
      <!-- NAVBAR -->

      <!-- MAIN -->


   <div class="container">
    

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px; text-align:end;">
            <div class="row mb-3">
              
               <div class="col">
                  <label class="form-label">رقم الطلب :</label>
                  <input type="number" class="form-control" name="orderN" placeholder="رقم الطلب ">
               </div>
                <div class="col">
                  <label class="form-label"> اسم الحساب التجاري   :</label>
                  <input type="text" class="form-control" name="page_name" placeholder="الحساب التجاري  ">
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
            
            <div class="form-group mb-3" ">
               <label>العنوان :</label>
               <select name="Governorate" style="font-size: 20px; margin-top: 20px; text-align:end;" class="form-select" aria-label="Default select example">
              <option value="أربيل" class="box"> أربيل</option>
              <option value="الأنبار" class="box">الأنبار</option>
              <option value="بابل" class="box">  بابل</option>
              <option value="بغداد" class="box"> بغداد  </option>
              <option value="البصرة" class="box">  البصرة </option>
              <option value="حلبجة" class="box"> حلبجة  </option>
              <option value="دهوك" class="box"> دهوك  </option>
              <option value="القادسية" class="box"> القادسية  </option>
              <option value="ديالى" class="box"> ديالى  </option>
              <option value="ذي قار" class="box">  ذي قار </option>
              <option value="السليمانية" class="box">  السليمانية </option>
              <option value="صلاح الدين" class="box"> صلاح الدين  </option>
              <option value="	كركوك" class="box"> 	كركوك  </option>
              <option value="كربلاء" class="box"> كربلاء  </option>
              <option value="	المثنى" class="box"> 	المثنى  </option>
              <option value="ميسان" class="box"> ميسان  </option>
              <option value="النجف" class="box">  النجف </option>
              <option value="نينوى" class="box">  نينوى </option>

      </select>      
      <div class="mb-3">
               <label class="form-label">العنوان </label>
               <input type="text" class="form-control" name="addreces" placeholder="اكتب رقم المستلم ">
            </div>
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

     
      <!-- MAIN -->
   </section>
   <!-- CONTENT -->

   <script src="html/script.js"></script>
    <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

