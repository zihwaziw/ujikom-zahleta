<?php
include 'koneksi.php';
$perusahaan = $koneksi->query("SELECT * FROM perusahaan ORDER BY id_perusahaan DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Data Perusahaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Kelola Data Perusahaan</h3>
  <a href="add.php" class="btn btn-success mb-3">+ Tambah Data</a>
  <a href="dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

  <table class="table table-striped table-bordered">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No. Telp</th>
        <th>Fax</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while ($row = $perusahaan->fetch_assoc()) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_perusahaan']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['no_telp']; ?></td>
        <td><?= $row['fax']; ?></td>
        <td>
          <a href="edit.php?id=<?= $row['id_perusahaan']; ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="hapus.php?id=<?= $row['id_perusahaan']; ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
