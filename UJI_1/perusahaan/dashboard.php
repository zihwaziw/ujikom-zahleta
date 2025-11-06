<?php
// dashboard.php
// --- jika mau pakai login nanti bisa ditambah session di sini ---

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Sistem Faktur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f6fa;
      font-family: 'Poppins', sans-serif;
    }
    .navbar {
      background-color: #007bff;
    }
    .navbar-brand, .nav-link {
      color: white !important;
      font-weight: 500;
    }
    .card-menu {
      border: none;
      transition: transform 0.3s, box-shadow 0.3s;
      border-radius: 20px;
    }
    .card-menu:hover {
      transform: translateY(-8px);
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.1);
    }
    .card-menu i {
      font-size: 45px;
      color: #007bff;
    }
    footer {
      text-align: center;
      margin-top: 40px;
      color: #888;
    }
  </style>
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">💼 Sistem Faktur</a>
    </div>
  </nav>

  <!-- DASHBOARD CONTENT -->
  <div class="container py-5">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-primary">Menu Utama</h2>
      <p class="text-muted">Pilih menu di bawah untuk mengelola data</p>
    </div>

    <div class="row g-4 justify-content-center">

      <!-- Kelola Data Perusahaan -->
      <div class="col-md-4 col-sm-6">
        <div class="card card-menu p-4 text-center">
          <i class="bi bi-building"></i>
          <h5 class="mt-3 fw-bold">Kelola Data Perusahaan</h5>
          <p class="text-muted">Tambah, ubah, atau hapus data perusahaan.</p>
          <a href="perusahaan_index.php" class="btn btn-primary">Masuk</a>
        </div>
      </div>

      <!-- Kelola Data Customer -->
      <div class="col-md-4 col-sm-6">
        <div class="card card-menu p-4 text-center">
          <i class="bi bi-people"></i>
          <h5 class="mt-3 fw-bold">Kelola Data Customer</h5>
          <p class="text-muted">Lihat, tambah, atau cetak data pelanggan.</p>
          <a href="customer_index.php" class="btn btn-primary">Masuk</a>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
      <div class="card card-menu p-4 text-center">
        <i class="bi bi-box-seam"></i>
        <h5 class="mt-3 fw-bold">Kelola Data Produk</h5>
        <p>Tambah, ubah, dan hapus data produk</p>
        <a href="produk_index.php" class="btn btn-primary">Buka</a>
      </div>
    </div>

      <!-- Kelola Data Penjualan -->
      <div class="col-md-4 col-sm-6">
        <div class="card card-menu p-4 text-center">
          <i class="bi bi-receipt-cutoff"></i>
          <h5 class="mt-3 fw-bold">Kelola Data Penjualan</h5>
          <p class="text-muted">Input transaksi dan cetak faktur penjualan.</p>
          <a href="faktur_index.php" class="btn btn-primary">Masuk</a>
        </div>
      </div>

    </div>
  </div>

  <footer>
    <p>© 2025 Sistem Faktur | Dibuat oleh Zihwa 💙</p>
  </footer>

  <!-- ICONS & SCRIPT -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
