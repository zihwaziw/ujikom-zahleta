<?php
include 'koneksi.php';
$id = $_GET['id'];

$koneksi->query("DELETE FROM perusahaan WHERE id_perusahaan='$id'");
echo "<script>alert('Data berhasil dihapus!');window.location='perusahaan_index.php';</script>";
?>
