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

if(isset($_POST['submit'])){
  

  $imageProduct = $_FILES['imageProduct'];
$title = $_POST['title'];
$contact = $_POST['contact'];
$price = $_POST['price'];


        $allowedExts = array("jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["imageProduct"]["name"]);
        $extension = end($temp);
        if ((($_FILES["imageProduct"]["type"] == "image/gif") ||
         ($_FILES["imageProduct"]["type"] == "image/jpeg") || ($_FILES["imageProduct"]["type"] == "image/jpg") || ($_FILES["imageProduct"]["type"] == "image/pjpeg") || ($_FILES["imageProduct"]["type"] == "image/x-png") || ($_FILES["imageProduct"]["type"] == "image/png")) && ($_FILES["imageProduct"]["size"] < 100000) && in_array($extension, $allowedExts)) {
            if ($_FILES["imageProduct"]["error"] > 0) {
                echo "Return Code: " . $_FILES["imageProduct"]["error"] . "<br>";
            } else {
        
              $nameFimagr = md5($title);
                $newfileName =  $nameFimagr. $title . "." . $temp[1];
                $temp[0] = rand(0, 3000); //Set to random number
                $_FILES["imageProduct"]["name"] = $newfileName;
                $fileName;
        
                if (file_exists("images" . $_FILES["imageProduct"]["name"])) {
                    echo $newfileName . " already exists. ";
                } else {
                    move_uploaded_file($_FILES["imageProduct"]["tmp_name"], "images/" . $_FILES["imageProduct"]["name"]);
                    echo "Stored in: " . "images/" . $newfileName;
                }
            }
            $sqlAddP = "INSERT INTO products (`imageProduct`, `title`, `contact`, `price` ) VALUES('$newfileName', '$title', '$contact', '$price')";

            $relut =  mysqli_query($conn, $sqlAddP);
            
            if($relut){
            echo " product added sucses fulliy";
            }
        } else {
            echo "Invalid file";
        }


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
<link href="
https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css
" rel="stylesheet">


  <title>AdminHub</title>
</head>
<body>


<form action="" method ="POST" enctype="multipart/form-data">
  <input type="file" name="imageProduct">
  <input type="text" name="title">
  <input type="text" name="contact">
  <input type="text" name="price">
 <button type="submit" name="submit">submit</button>
</form>


  <script src="html/script.js"></script>
</body>
</html>
















