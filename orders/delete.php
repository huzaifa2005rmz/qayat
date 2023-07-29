<?php
include "../controle/db_conn.php";
$id = $_GET["id"];
$sql1 = "DELETE FROM `tb_images` WHERE order_id = $id";
$sql = "DELETE FROM `orders` WHERE id = $id";
mysqli_query($conn, $sql1);
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
