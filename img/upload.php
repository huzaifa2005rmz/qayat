<?php
require '../img/config.php';


include '../login/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login/login.php');
}


if(isset($_POST["submit"])){
  $name = $_SESSION['user_id'];
  $totalFiles = count($_FILES['fileImg']['name']);
  $filesArray = array();

  for($i = 0; $i < $totalFiles; $i++){
    $imageName = $_FILES["fileImg"]["name"][$i];
    $tmpName = $_FILES["fileImg"]["tmp_name"][$i];

    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));

    $newImageName = uniqid() . '.' . $imageExtension;

    move_uploaded_file($tmpName, 'uploads/' . $newImageName);
    $filesArray[] = $newImageName;
  }

  // start php code for foring kay 

$foringkeyImages = mysqli_query($conn,  "SELECT * FROM `orders` WHERE user_id = '$user_id' ORDER BY ID DESC LIMIT 1");
$foringkeyImage = mysqli_fetch_assoc($foringkeyImages);
  $order_idN = $foringkeyImage['id'];

  // end php code for foring kay 



  $filesArray = json_encode($filesArray);
  $query = "INSERT INTO tb_images(`id`, `order_id`, `name`, `image`) VALUES('','$order_idN', '$name', '$filesArray')";
  mysqli_query($conn, $query);
  echo
  '
  <script>
    alert("تم ارسال طلبك بنجاح ");
    document.location.href = "../orders/user_order.php?id=' .$order_idN.'";
  </script>
  ';
}
?>
<html>
  <head> 
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop or Browse: File Upload | qaryat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="drag-area">
    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
    <header>قم بتحميل الصور الخاصة بل طلب </header>
    <span>او </span>
    <button id="Browse">اضغط ثم حمل الصور </button><br>
    <input type="file" hidden name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple><br>
          <button type = "submit" name = "submit">Submit</button>
  </div>

    </form>
    <br>
    <script src="/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
