<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Faktur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3 class="text-primary">Data Faktur</h3>
      <div>
        <a href="faktur_add.php" class="btn btn-success me-2">+ Tambah Faktur</a>
        <a href="faktur_print.php" class="btn btn-primary" target="_blank">🖨️ Cetak Data Faktur</a>
        <a href="dashboard.php" class="btn btn-secondary me-2">Kembali ke Dashboard</a>
      </div>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>No Faktur</th>
          <th>Tanggal</th>
          <th>Jatuh Tempo</th>
          <th>Metode Bayar</th>
          <th>PPN (%)</th>
          <th>DP</th>
          <th>Grand Total</th>
          <th>User</th>
          <th>ID Customer</th>
          <th>ID Perusahaan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM faktur ORDER BY tgl_faktur DESC";
        $result = $koneksi->query($query);

        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
              <td>{$no}</td>
              <td>{$row['no_faktur']}</td>
              <td>{$row['tgl_faktur']}</td>
              <td>{$row['due_date']}</td>
              <td>{$row['metode_bayar']}</td>
              <td>{$row['ppn']}</td>
              <td>Rp " . number_format($row['dp'], 0, ',', '.') . "</td>
              <td>Rp " . number_format($row['grand_total'], 0, ',', '.') . "</td>
              <td>{$row['user']}</td>
              <td>{$row['id_customer']}</td>
              <td>{$row['id_perusahaan']}</td>
              <td>
                <a href='faktur_hapus.php?id={$row['no_faktur']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin mau hapus?\")'>Hapus</a>
              </td>
            </tr>";
            $no++;
          }
        } else {
          echo "<tr><td colspan='12' class='text-center text-muted'>Belum ada data faktur</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
