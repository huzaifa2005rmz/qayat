<?php
require 'config.php';

include '../login/config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>
<html>
  <head> </head>
  <body>
    <table border = 1 cellspacing = 0 cellpadding = 10>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Image</td>
      </tr>
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_images");
      ?>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td style = "display: flex; align-items: center; gap: 10px;">
          <?php
          foreach (json_decode($row["image"]) as $image) : ?>
          <img src="uploads/<?php echo $image; ?>" width = 200>
          <?php endforeach; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="upload.php">Upload Image</a>
      <script>
     document.location.href = '../orders/user_order.php';
  </script>
  </body>
</html>
 