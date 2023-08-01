<?php
include "db_conn.php";


include '../login/config.php';
session_start();
$id = $_GET["id"];
$admint = $_SESSION['admin'];

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

if (isset($_POST["submit"])) {
  $orderN = $_POST['orderN'];
  $price = $_POST['price'];
  $priceAd = $_POST['priceAd'];
  $note = $_POST['note'];
  $userNumber = $_POST['userNumber'];
  $addreces = $_POST['addreces'];
  $statuse = $_POST['statuse'];

  $sql = "UPDATE `orders` SET `orderN`='$orderN',`price`='$price',`note`='$note',`userNumber`='$userNumber',`statuse`='$statuse',`priceAd`='$priceAd' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php");
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
  <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">

  <title>PHP CRUD Application</title>
</head>

<body>
  
  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `orders` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">رقم الطلب :</label>
            <input type="number" class="form-control" name="orderN" value="<?php echo $row['orderN'] ?>">
          </div>
        </div>
        <div class="form-group mb-3">
                    <label for="male" class="form-input-label">رقم المستلم </label>
          <input type="text" class="form-control" name="userNumber" value="<?php echo $row["userNumber"] ?>">
                    <label for="female" class="form-input-label">العنوان </label>
          <input type="text" class="form-control" name="addreces" value="<?php echo $row["addreces"] ?> ">
          <div class="row mb-3">
                <div class="col">
                  <label class="form-label"> السعر مع التوصيل :</label>
                  <input type="text" class="form-control" name="priceAd" placeholder="الحساب التجاري  " value="<?php echo $row["priceAd"] ?> ">
               </div>
                  <div class="col">
                  <label class="form-label">السعر  الكامل  :</label>
                  <input type="text" class="form-control" name="price" placeholder="السعر " value="<?php echo $row["price"] ?> ">
               </div>
         
        </div>
        <!-- start textarea  -->
        <div class="form-floating">
  <textarea class="form-control" style="height: 180px" placeholder="اضف كامل التفاصيل عن الطلب " name="note" id="floatingTextarea"><?php echo $row['note'] ?></textarea>
  <label for="floatingTextarea">Comments</label>
</div>
        <!-- end textarea -->
        <select name="statuse" style="font-size: 20px; margin-top: 20px;">
              <option value="1" class="box"> قيد التجهيز</option>
              <option value="2" class="box">تم ارسال الطلب   </option>
              <option value="3" class="box">  تم استلام الطلب  </option>
              <option value="4" class="box">  راجع </option>
      </select>

        <div style="padding: 26px;">

          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>