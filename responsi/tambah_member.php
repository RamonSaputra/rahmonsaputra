<?php
session_start();
if ($_SESSION['login'] != "LOGIN") {
    header("location:index.php");
}
?>

<html>

<head>
    <title>Tambah data mahasiswa</title>
</head>

<body>
    <a href="tampil_member.php">Kembali</a>
    <br /><br />
    <form action="tambah_member.php" method="post">
        <table width="25%" border="0">
            <tr>
                <td>KODE</td>
                <td><input type="text" name="kode"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>NOMOR HP</td>
                <td><input type="text" name="nohp"></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>FOTO</td>
                <td><input type="text" name="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $nohp = $_POST['nohp'];
        $email = $_POST['email'];
        $foto = $_POST['foto'];
        // include database connection file
        include_once("koneksi.php");
        // Insert user data into table
        $result = mysqli_query($konek, "INSERT INTO member(kode,nama,alamat,nohp,email,foto) VALUES ('$kode','$nama','$alamat','$nohp','$email','$foto')");
        header("location:tampil_member.php");
    }
    ?>
</body>

</html>