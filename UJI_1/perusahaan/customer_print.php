<?php
include 'koneksi.php';
$customer = $koneksi->query("SELECT * FROM customer ORDER BY id_customer DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Data Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    @media print {
      .no-print {
        display: none;
      }
    }
    body {
      background: #fff;
    }
    h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff;
    }
    table {
      font-size: 14px;
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <h3 class="fw-bold">Data Customer</h3>
  
  <table class="table table-bordered">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama Customer</th>
        <th>Perusahaan</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; while($row = $customer->fetch_assoc()){ ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_customer']; ?></td>
        <td><?= $row['perusahaan_cust']; ?></td>
        <td><?= $row['alamat']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <div class="no-print mt-3 text-center">
    <button onclick="window.print()" class="btn btn-primary">🖨️ Cetak Data</button>
    <a href="customer_index.php" class="btn btn-secondary">Kembali</a>
  </div>
</div>

</body>
</html>
