<?php
include "../login/config.php";
$id = $_GET["id"];

$sql = "DELETE FROM `user_form` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: col.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
