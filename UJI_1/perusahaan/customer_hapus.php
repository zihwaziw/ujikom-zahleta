<?php
include 'koneksi.php';
$id = $_GET['id'];

$koneksi->query("DELETE FROM customer WHERE id_customer='$id'");
echo "<script>alert('Data customer berhasil dihapus!');window.location='customer_index.php';</script>";
?>
