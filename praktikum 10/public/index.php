<?php
require_once __DIR__ . '/../src/db.php';

$data = koneksi()->query("SELECT * FROM transaksi")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Data Transaksi</title>
</head>
<body>

<h2>Data Transaksi</h2>
<a href="laporan_pdf.php">Download PDF</a>

<table border="1" cellpadding="8">
<tr>
  <th>ID</th><th>Tanggal</th><th>Barang</th>
  <th>Qty</th><th>Harga</th><th>Subtotal</th>
</tr>

<?php foreach ($data as $d): ?>
<tr>
  <td><?= $d['id'] ?></td>
  <td><?= $d['tanggal'] ?></td>
  <td><?= $d['barang'] ?></td>
  <td><?= $d['qty'] ?></td>
  <td><?= number_format($d['harga']) ?></td>
  <td><?= number_format($d['qty'] * $d['harga']) ?></td>
</tr>
<?php endforeach; ?>

</table>
</body>
</html>