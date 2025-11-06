<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hapus = $koneksi->query("DELETE FROM faktur WHERE no_faktur='$id'");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus!');window.location='faktur_index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');window.location='faktur_index.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');window.location='faktur_index.php';</script>";
}
?>
