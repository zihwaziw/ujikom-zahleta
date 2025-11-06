<?php
include 'koneksi.php';

// Ambil id produk dari URL
$id = $_GET['id'];

// Ambil data produk berdasarkan ID
$data = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
  $nama_produk = $_POST['nama_produk'];
  $price = $_POST['price'];
  $jenis = $_POST['jenis'];
  $stock = $_POST['stock'];

  // Update data produk
  $update = $koneksi->query("UPDATE produk 
    SET nama_produk='$nama_produk', price='$price', jenis='$jenis', stock='$stock' 
    WHERE id_produk='$id'");

  if ($update) {
    echo "<script>alert('Data produk berhasil diperbarui!');window.location='produk_index.php';</script>";
  } else {
    echo "<script>alert('Gagal memperbarui data produk!');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h4 class="mb-4 text-center text-warning">Edit Data Produk</h4>
      <form method="post">
        <div class="mb-3">
          <label>Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" value="<?= htmlspecialchars($data['nama_produk']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Harga (Price)</label>
          <input type="number" name="price" class="form-control" step="0.01" value="<?= $data['price'] ?>" required>
        </div>
        <div class="mb-3">
          <label>Jenis</label>
          <input type="text" name="jenis" class="form-control" value="<?= htmlspecialchars($data['jenis']) ?>" required>
        </div>
        <div class="mb-3">
          <label>Stok</label>
          <input type="number" name="stock" class="form-control" value="<?= $data['stock'] ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-warning w-100">Update</button>
      </form>
      <a href="produk_index.php" class="btn btn-secondary mt-3 w-100">Kembali</a>
    </div>
  </div>
</body>
</html>
