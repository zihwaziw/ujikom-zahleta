<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Perusahaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Tambah Data Perusahaan</h3>

  <form method="post" action="">
    <div class="mb-3">
      <label>Nama Perusahaan</label>
      <input type="text" name="nama_perusahaan" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
      <label>No. Telp</label>
      <input type="text" name="no_telp" class="form-control">
    </div>
    <div class="mb-3">
      <label>Fax</label>
      <input type="text" name="fax" class="form-control">
    </div>
    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
    <a href="perusahaan_index.php" class="btn btn-secondary">Kembali</a>
  </form>

  <?php
  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_perusahaan'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['no_telp'];
    $fax = $_POST['fax'];

    $koneksi->query("INSERT INTO perusahaan (nama_perusahaan, alamat, no_telp, fax)
    VALUES ('$nama', '$alamat', '$telp', '$fax')");
    echo "<script>alert('Data berhasil ditambahkan!');window.location='perusahaan_index.php';</script>";
  }
  ?>
</div>
</body>
</html>
