<?php
$host = "127.0.0.1"; // jangan localhost
$user = "root";
$pass = "";
$db   = "coba";

// jika MySQL di port lain, misal 3307:
$port = 3307; // GANTI sesuai XAMPP kamu

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>
