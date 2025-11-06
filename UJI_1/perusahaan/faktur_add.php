<?php
include 'koneksi.php';

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Ambil data customer dari database
$customers = $koneksi->query("SELECT id_customer, nama_customer FROM customer");

// Ambil data perusahaan juga kalau perlu
$perusahaan = $koneksi->query("SELECT id_perusahaan, nama_perusahaan FROM perusahaan");

if (isset($_POST['submit'])) {
    $no_faktur     = trim($_POST['no_faktur'] ?? '');
    $tgl_faktur    = trim($_POST['tgl_faktur'] ?? '');
    $due_date      = trim($_POST['due_date'] ?? '');
    $metode_bayar  = trim($_POST['metode_bayar'] ?? '');
    $ppn           = $_POST['ppn'] ?? 0;
    $dp            = $_POST['dp'] ?? 0;
    $grand_total   = $_POST['grand_total'] ?? 0;
    $user          = trim($_POST['user'] ?? '');
    $id_customer   = $_POST['id_customer'] ?? 0;
    $id_perusahaan = $_POST['id_perusahaan'] ?? 0;

    if ($no_faktur === '' || $tgl_faktur === '') {
        echo "<script>alert('No faktur dan tanggal harus diisi');</script>";
    } else {
        $stmt = $koneksi->prepare("
          INSERT INTO faktur
          (no_faktur, tgl_faktur, due_date, metode_bayar, ppn, dp, grand_total, user, id_customer, id_perusahaan)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param(
            "ssssddsdii",
            $no_faktur,
            $tgl_faktur,
            $due_date,
            $metode_bayar,
            $ppn,
            $dp,
            $grand_total,
            $user,
            $id_customer,
            $id_perusahaan
        );

        if ($stmt->execute()) {
            echo "<script>alert('Faktur berhasil ditambahkan'); window.location='faktur_index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan faktur: " . addslashes($stmt->error) . "');</script>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Faktur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-lg">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Tambah Faktur</h4>
      </div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">No Faktur</label>
              <input type="text" name="no_faktur" class="form-control" required>
            </div>
            <div class="col">
              <label class="form-label">Tanggal Faktur</label>
              <input type="date" name="tgl_faktur" class="form-control" required>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Due Date</label>
              <input type="date" name="due_date" class="form-control">
            </div>
            <div class="col">
              <label class="form-label">Metode Bayar</label>
              <select name="metode_bayar" class="form-select">
                <option value="Cash">Cash</option>
                <option value="Transfer">Transfer</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">PPN (%)</label>
              <input type="number" step="0.01" name="ppn" class="form-control">
            </div>
            <div class="col">
              <label class="form-label">DP</label>
              <input type="number" step="0.01" name="dp" class="form-control">
            </div>
            <div class="col">
              <label class="form-label">Grand Total</label>
              <input type="number" step="0.01" name="grand_total" class="form-control">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col">
              <label class="form-label">User</label>
              <input type="text" name="user" class="form-control">
            </div>
            <div class="col">
              <label class="form-label">Customer</label>
              <select name="id_customer" class="form-select">
                <option value="">-- Pilih Customer --</option>
                <?php while ($c = $customers->fetch_assoc()) { ?>
                  <option value="<?= $c['id_customer']; ?>"><?= htmlspecialchars($c['nama_customer']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col">
              <label class="form-label">Perusahaan</label>
              <select name="id_perusahaan" class="form-select">
                <option value="">-- Pilih Perusahaan --</option>
                <?php while ($p = $perusahaan->fetch_assoc()) { ?>
                  <option value="<?= $p['id_perusahaan']; ?>"><?= htmlspecialchars($p['nama_perusahaan']); ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="text-end">
            <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            <a href="faktur_index.php" class="btn btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
