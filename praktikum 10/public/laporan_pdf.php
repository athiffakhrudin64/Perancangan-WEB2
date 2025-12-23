<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/db.php';

use Mpdf\Mpdf;

$data = koneksi()->query("SELECT * FROM transaksi")->fetchAll(PDO::FETCH_ASSOC);

$html = "<h2 align='center'>LAPORAN TRANSAKSI</h2>";
$html .= "<table border='1' width='100%' cellpadding='8'>
<tr>
<th>ID</th><th>Tanggal</th><th>Barang</th>
<th>Qty</th><th>Harga</th><th>Subtotal</th>
</tr>";

$total = 0;
foreach ($data as $d) {
    $sub = $d['qty'] * $d['harga'];
    $total += $sub;
    $html .= "<tr>
    <td>{$d['id']}</td>
    <td>{$d['tanggal']}</td>
    <td>{$d['barang']}</td>
    <td>{$d['qty']}</td>
    <td>{$d['harga']}</td>
    <td>{$sub}</td>
    </tr>";
}

$html .= "<tr>
<td colspan='5'><b>TOTAL</b></td>
<td><b>{$total}</b></td>
</tr>
</table>";

$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("laporan_transaksi.pdf", "D");