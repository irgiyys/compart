<?php 
include("./functions/koneksi.php");
include("./functions/session.php");

seller();
$id = $_GET['id'];
$deleted_at = date("Y-m-d H:i:s");
$query = "UPDATE `product` SET `deleted_at` = '$deleted_at' WHERE `product`.`id` = $id";
mysqli_query($conn, $query);
$conn->close();
header("location:dashboard.php");
?>