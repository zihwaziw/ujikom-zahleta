<?php
include 'koneksi.php';
$produk = $koneksi->query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h4 class="mb-4 text-center">Kelola Data Produk</h4>
      <a href="produk_add.php" class="btn btn-success mb-3">+ Tambah Produk</a>
      <table class="table table-bordered table-striped">
        <thead class="table-dark text-center">
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stok</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = $produk->fetch_assoc()) {
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_produk'] ?></td>
            <td><?= number_format($row['price'], 0, ',', '.') ?></td>
            <td><?= $row['jenis'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td class="text-center">
              <a href="produk_edit.php?id=<?= $row['id_produk'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="produk_delete.php?id=<?= $row['id_produk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="dashboard.php" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
    </div>
  </div>
</body>
</html>
