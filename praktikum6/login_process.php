<?php
session_start();
require_once "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");

if (mysqli_num_rows($sql) == 1) {
    $data = mysqli_fetch_assoc($sql);
    
    if (password_verify($password, $data['password'])) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['gender']   = $data['gender'];

        header("Location: home.php");
        exit;
    } else {
        echo "Password salah";
    }
} else {
    echo "Username tidak ditemukan";
}

?>
