<?php
include "../controle/db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $orderN = $_POST['orderN'];
  $price = $_POST['price'];
  $note = $_POST['note'];
  $userNumber = $_POST['userNumber'];
  $addreces = $_POST['addreces'];

  $sql = "UPDATE `orders` SET `orderN`='$orderN',`price`='$price',`note`='$note',`userNumber`='$userNumber' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
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
  <link rel="stylesheet" type="text/css" href="../css/elzero.css?v=<?php echo time(); ?>">


  <title>qaryat</title>
</head>

<body style="widit: auto;">
     <!-- Start Header -->
     <div class="header" id="header">
      <div class="container" style="">
        <a href="#" class="logo" style="text-decoration: none;">Qaryat Gifts</a>
        <ul class="main-nav">
          <li>
            <a href="index.php" style="text-decoration: none;"> عرض الطلبات </a>

          </li>
        </ul>
      </div>
    </div>
    <!-- End Header -->

  <div class="container">
    <div class="text-center mb-4">
    
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
            <label class="form-label">First Name:</label>
            <input type="number" class="form-control" name="orderN" value="<?php echo $row['orderN'] ?>">
          </div>

          <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="number" class="form-control" name="price" value="<?php echo $row['price'] ?>">
          </div>
        </div>
        <div class="form-group mb-3">
                    <label for="male" class="form-input-label">رقم المستلم </label>
          <input type="text" class="form-control" name="userNumber" value="<?php echo $row["userNumber"] ?>">
                    <label for="female" class="form-input-label">العنوان </label>
          <input type="text" class="form-control" name="addreces" value="<?php echo $row["addreces"] ?> ">
        </div>
        <!-- start textarea  -->
        <div class="form-floating">
  <textarea class="form-control" style="height: 180px" placeholder="اضف كامل التفاصيل عن الطلب " name="note" id="floatingTextarea"><?php echo $row['note'] ?></textarea>
  <label for="floatingTextarea">Comments</label>
</div>
        <!-- end textarea -->

        <div style="
    padding: 26px;
">
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