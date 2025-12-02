<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
</head>
<body>
<h2>Form Pendaftaran User</h2>

<form method="post" action="register_process.php">
    Username : <input type="text" name="username" required><br><br>
    Password : <input type="password" name="password" required><br><br>
    Gender :
    <select name="gender" required>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select><br><br>

    <input type="submit" value="Daftar">
</form>

<br>
<a href="login.php">Sudah punya akun? Login</a>

</body>
</html>
