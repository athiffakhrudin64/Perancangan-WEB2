<?php

function data_handler($root)
{
    if (isset($_GET['act']) && $_GET['act'] == 'add') {
        form_tambah($root);
        return;
    }

    if (isset($_GET['act']) && $_GET['act'] == 'edit') {
        form_edit($root, $_GET['id']);
        return;
    }

    if (isset($_GET['act']) && $_GET['act'] == 'del') {
        hapus_data($root, $_GET['id']);
        return;
    }

    tampil_data($root);
}

// --------------------------
// TAMPIL DATA
// --------------------------
function tampil_data($root)
{
    global $koneksi;

    $sql = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $sql);
?>
    <h2>Administrasi Data Mahasiswa</h2>
    <a href="<?= $root ?>&act=add">Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="6" cellspacing="0" width="600">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="<?= $root ?>&act=edit&id=<?= $row['nim'] ?>">Edit</a> |
                    <a href="<?= $root ?>&act=del&id=<?= $row['nim'] ?>" onclick="return confirm('Hapus data <?= $row['nim'] ?>?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php
}

// --------------------------
// TAMBAH DATA
// --------------------------
function form_tambah($root)
{
?>
    <h2>Tambah Data</h2>

    <form method="post" action="">
        NIM: <input type="text" name="nim"><br><br>
        Nama: <input type="text" name="nama"><br><br>
        Alamat: <input type="text" name="alamat"><br><br>

        <input type="submit" name="simpan" value="Simpan">
        <a href="<?= $root ?>">Batal</a>
    </form>

<?php
    if (isset($_POST['simpan'])) {
        global $koneksi;

        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        $sql = "INSERT INTO mahasiswa VALUES('$nim','$nama','$alamat')";
        mysqli_query($koneksi, $sql);

        echo "<script>document.location='$root';</script>";
    }
}

// --------------------------
// EDIT DATA
// --------------------------
function form_edit($root, $id)
{
    global $koneksi;

    $sql = "SELECT * FROM mahasiswa WHERE nim='$id'";
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, $sql));
?>
    <h2>Edit Data</h2>

    <form method="post" action="">
        NIM: <input type="text" name="nim" value="<?= $data['nim'] ?>" readonly><br><br>
        Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>
        Alamat: <input type="text" name="alamat" value="<?= $data['alamat'] ?>"><br><br>

        <input type="submit" name="update" value="Update">
        <a href="<?= $root ?>">Batal</a>
    </form>

<?php
    if (isset($_POST['update'])) {

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];

        mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', alamat='$alamat' WHERE nim='$id'");

        echo "<script>document.location='$root';</script>";
    }
}

// --------------------------
// HAPUS DATA
// --------------------------
function hapus_data($root, $id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$id'");

    echo "<script>alert('Data $id berhasil dihapus'); document.location='$root';</script>";
}
