<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM perusahaan WHERE id_perusahaan='$id'")->fetch_assoc();

if (isset($_POST['update'])) {
  $nama = $_POST['nama_perusahaan'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['no_telp'];
  $fax = $_POST['fax'];

  $koneksi->query("UPDATE perusahaan SET 
      nama_perusahaan='$nama', alamat='$alamat', no_telp='$telp', fax='$fax' 
      WHERE id_perusahaan='$id'");
  echo "<script>alert('Data berhasil diupdate!');window.location='perusahaan_index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Perusahaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Edit Data Perusahaan</h3>

  <form method="post">
    <div class="mb-3">
      <label>Nama Perusahaan</label>
      <input type="text" name="nama_perusahaan" value="<?= $data['nama_perusahaan']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" required><?= $data['alamat']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>No. Telp</label>
      <input type="text" name="no_telp" value="<?= $data['no_telp']; ?>" class="form-control">
    </div>
    <div class="mb-3">
      <label>Fax</label>
      <input type="text" name="fax" value="<?= $data['fax']; ?>" class="form-control">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
    <a href="perusahaan_index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
