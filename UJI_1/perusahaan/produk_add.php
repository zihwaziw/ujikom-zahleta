<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  // Ambil data dari form
  $nama_produk = $_POST['nama_produk'];
  $price = $_POST['price'];
  $jenis = $_POST['jenis'];
  $stock = $_POST['stock'];

  // Cek apakah semua input terisi
  if ($nama_produk != '' && $price != '' && $jenis != '' && $stock != '') {

    // Query simpan data
    $query = $koneksi->query("INSERT INTO produk (nama_produk, price, jenis, stock)
    VALUES ('$nama_produk', '$price', '$jenis', '$stock')");

    if ($query) {
      echo "<script>alert('Produk berhasil ditambahkan!');window.location='produk_index.php';</script>";
    } else {
      echo "<script>alert('Gagal menambahkan produk!');</script>";
    }

  } else {
    echo "<script>alert('Semua field harus diisi!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h4 class="mb-4 text-center text-primary">Tambah Data Produk</h4>
      <form method="post">
        <div class="mb-3">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Harga (Price)</label>
          <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
          <label>Jenis</label>
          <input type="text" name="jenis" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Stok</label>
          <input type="number" name="stock" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
      </form>
      <a href="produk_index.php" class="btn btn-secondary mt-3 w-100">Kembali</a>
    </div>
  </div>
</body>
</html>
