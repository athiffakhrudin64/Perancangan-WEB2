<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>

<h1>Halo, <?= $_SESSION['username']; ?>!</h1>
<h3>Selamat datang di halaman utama</h3>

<p>Jenis kelamin Anda: <?= $_SESSION['gender']; ?></p>

<br>
<a href="logout.php">Logout</a>

</body>
</html>
