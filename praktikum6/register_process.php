<?php
require_once "koneksi.php";

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$gender   = $_POST['gender'];

$cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");

if (mysqli_num_rows($cek) > 0) {
    echo "Username sudah terdaftar, silakan pilih yang lain.";
    exit;
}

$sql = "INSERT INTO login VALUES('$username', '$password', '$gender')";

if (mysqli_query($koneksi, $sql)) {
    echo "User berhasil terdaftar<br>";
    echo "<a href='login.php'>Login Sekarang</a>";
} else {
    echo "Gagal daftar: " . mysqli_error($koneksi);
}
?>
