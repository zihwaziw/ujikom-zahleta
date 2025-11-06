<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Tambah Data Customer</h3>

  <form method="post" action="">
    <div class="mb-3">
      <label>Nama Customer</label>
      <input type="text" name="nama_customer" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Perusahaan Customer</label>
      <input type="text" name="perusahaan_cust" class="form-control">
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="customer_index.php" class="btn btn-secondary">Kembali</a>
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_customer'];
    $perusahaan = $_POST['perusahaan_cust'];
    $alamat = $_POST['alamat'];

    $koneksi->query("INSERT INTO customer (nama_customer, perusahaan_cust, alamat)
    VALUES ('$nama', '$perusahaan', '$alamat')");
    echo "<script>alert('Data customer berhasil ditambahkan!');window.location='customer_index.php';</script>";
  }
  ?>
</div>
</body>
</html>
