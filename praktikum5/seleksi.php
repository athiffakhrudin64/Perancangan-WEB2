<?php
require_once "koneksi.php";

$sql = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $sql);
?>

<h3>Daftar Mahasiswa</h3>

<table border="1" cellpadding="6" cellspacing="0">
<tr>
    <th>NIM</th>
    <th>Nama</th>
    <th>Alamat</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['nim'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['alamat'] ?></td>
</tr>
<?php } ?>
</table>
