<?php 
include_once("../koneksi.php");

$id_item = $_GET['id_item'];
$delete = mysqli_query($conn, "DELETE FROM content WHERE id='$id_item'");

header("Location: product.php");
?>