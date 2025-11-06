<?php
session_start();
include 'koneksi2.php'; // pastikan variabel koneksi $conn

$kasir = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';

// ambil faktur terakhir
$sql_header = "SELECT f.no_faktur, f.tgl_faktur, c.nama_customer, c.alamat
FROM faktur f JOIN customer c ON f.id_customer = c.id_customer
ORDER BY f.no_faktur DESC
LIMIT 1";

$result_header = $conn->query($sql_header);
if(!$result_header) die("Query header error: ".$conn->error);
if($result_header->num_rows==0) die("Tidak ada data faktur di database!");

$header = $result_header->fetch_assoc();
$no_faktur = $header['no_faktur'];

// ambil detail faktur join produk
$sql_detail = "SELECT p.nama_produk, d.qty, d.price
FROM detail_faktur d
JOIN produk p ON d.id_produk = p.id_produk
WHERE d.no_faktur='$no_faktur'";

$result_detail = $conn->query($sql_detail);
if(!$result_detail) die("Query detail error: ".$conn->error);

$items = [];
$total = 0;
$disc = 0; // diskon default

while($row = $result_detail->fetch_assoc()){
    $row['subtotal'] = ($row['price'] - $disc) * $row['qty'];
    $total += $row['subtotal'];
    $items[] = $row;
}

$pajak = $total * 0.1;
$grand_total = $total + $pajak;
?>

<!DOCTYPE html>
<html>
<head>
<title>Faktur <?php echo $no_faktur; ?></title>
<style>
body { font-family: Arial, sans-serif; }
.header, .footer { text-align: center; }
table { width: 100%; border-collapse: collapse; margin-top: 10px; }
table, th, td { border: 1px solid black; }
th, td { padding: 5px; text-align: left; }
.right { text-align: right; }
</style>
</head>
<body>
<div class="header">
    <h2>PT. Contoh Perusahaan</h2>
    <p>Alamat: Jl. Contoh No. 123, Kota Contoh</p>
    <p>Telp: 08123456789 | Email: info@contoh.com</p>
</div>
<hr>
<table>
<tr>
    <td><strong>Nama Pelanggan:</strong> <?php echo $header['nama_customer']; ?></td>
    <td><strong>No Faktur:</strong> <?php echo $header['no_faktur']; ?></td>
</tr>
<tr>
    <td><strong>Alamat:</strong> <?php echo $header['alamat']; ?></td>
    <td><strong>Tanggal:</strong> <?php echo $header['tgl_faktur']; ?></td>
</tr>
<tr>
    <td><strong>Telp:</strong> 08123456789</td>
    <td><strong>Kasir:</strong> <?php echo $kasir; ?></td>
</tr>
</table>

<table>
<tr>
<th>No</th><th>Nama</th><th>Qty</th><th>Harga</th><th>Disc</th><th>Subtotal</th>
</tr>
<?php $no=1; foreach($items as $item){ ?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $item['nama_produk']; ?></td>
<td class="right"><?php echo $item['qty']; ?></td>
<td class="right"><?php echo number_format($item['price']); ?></td>
<td class="right"><?php echo number_format($disc); ?></td>
<td class="right"><?php echo number_format($item['subtotal']); ?></td>
</tr>
<?php } ?>
<tr>
<td colspan="5" class="right"><strong>Total</strong></td>
<td class="right"><?php echo number_format($total); ?></td>
</tr>
<tr>
<td colspan="5" class="right"><strong>Pajak (10%)</strong></td>
<td class="right"><?php echo number_format($pajak); ?></td>
</tr>
<tr>
<td colspan="5" class="right"><strong>Grand Total</strong></td>
<td class="right"><?php echo number_format($grand_total); ?></td>
</tr>
</table>

<p><strong>Catatan:</strong> Barang yang sudah dibeli tidak bisa dikembalikan. Penerima: Pembeli</p>

<div class="footer">
<p>Terima kasih atas kepercayaan Anda!</p>
</div>

<script>window.print();</script>
</body>
</html>
