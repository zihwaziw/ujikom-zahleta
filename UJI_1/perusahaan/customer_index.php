<?php
include 'koneksi.php';
$customer = $koneksi->query("SELECT * FROM customer ORDER BY id_customer DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Data Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Kelola Data Customer</h3>
  <a href="customer_add.php" class="btn btn-success mb-3">+ Tambah Customer</a>
  <a href="customer_print.php" class="btn btn-info mb-3">🖨️ Cetak Data</a>
    <a href="dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

  <table class="table table-striped table-bordered">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama Customer</th>
        <th>Perusahaan</th>
        <th>Alamat</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while ($row = $customer->fetch_assoc()) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_customer']; ?></td>
        <td><?= $row['perusahaan_cust']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td>
          <a href="customer_edit.php?id=<?= $row['id_customer']; ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="customer_hapus.php?id=<?= $row['id_customer']; ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
