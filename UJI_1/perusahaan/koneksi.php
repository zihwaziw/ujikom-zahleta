<?php
$koneksi = new mysqli("localhost", "root", "", "sistem_faktur");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
