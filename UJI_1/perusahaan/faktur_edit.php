<?php
include 'koneksi.php';
$id = $_GET['id'];
$faktur = $koneksi->query("SELECT * FROM faktur WHERE no_faktur='$id'")->fetch_assoc();
$customer = $koneksi->query("SELECT * FROM customer ORDER BY nama_customer ASC");

if (isset($_POST['update'])) {
  $tgl_faktur = $_POST['tgl_faktur'];
  $id_customer = $_POST['id_customer'];
  $grand_total = $_POST['grand_total'];

  $koneksi->query("UPDATE faktur SET 
      tgl_faktur='$tgl_faktur', id_customer='$id_customer', grand_total='$grand_total'
      WHERE no_faktur='$id'");
  echo "<script>alert('Faktur berhasil diupdate!');window.location='faktur_index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Faktur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h3 class="fw-bold text-primary mb-3">Edit Faktur</h3>

  <form method="post">
    <div class="mb-3">
      <label>No. Faktur</label>
      <input type="text" value="<?= $faktur['no_faktur']; ?>" class="form-control" readonly>
    </div>
    <div class="mb-3">
      <label>Tanggal Faktur</label>
      <input type="date" name="tgl_faktur" value="<?= $faktur['tgl_faktur']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Customer</label>
      <select name="id_customer" class="form-control" required>
        <?php while($row = $customer->fetch_assoc()) { ?>
          <option value="<?= $row['id_customer']; ?>" <?= ($row['id_customer'] == $faktur['id_customer']) ? 'selected' : ''; ?>>
            <?= $row['nama_customer']; ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="mb-3">
      <label>Grand Total (Rp)</label>
      <input type="number" name="grand_total" value="<?= $faktur['grand_total']; ?>" class="form-control" required>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Simpan</button>
    <a href="faktur_index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

</body>
</html>
