<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM customer WHERE id_customer='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
  $nama = $_POST['nama_customer'];
  $perusahaan = $_POST['perusahaan_cust'];
  $alamat = $_POST['alamat'];

  $koneksi->query("UPDATE customer SET 
      nama_customer='$nama', perusahaan_cust='$perusahaan', alamat='$alamat'
      WHERE id_customer='$id'");
  echo "<script>alert('Data customer berhasil diupdate!');window.location='customer_index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Edit Data Customer</h3>

  <form method="post">
    <div class="mb-3">
      <label>Nama Customer</label>
      <input type="text" name="nama_customer" value="<?= $data['nama_customer']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Perusahaan Customer</label>
      <input type="text" name="perusahaan_cust" value="<?= $data['perusahaan_cust']; ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required><?= $data['alamat']; ?></textarea>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
    <a href="customer_index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
