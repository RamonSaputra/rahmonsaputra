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
    <a href="tampil_data.php">Kembali</a>
    <br /><br />
    <form action="tambah_buku.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>KODE BUKU</td>
                <td><input type="text" name="kodebk"></td>
            </tr>
            <tr>
                <td>JUDUL</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>PENGARANG</td>
                <td><input type="text" name="pengarang"></td>
            </tr>
            <tr>
                <td>PENERBIT</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>TAHUN TERBIT</td>
                <td><input type="text" name="thnterbit"></td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $kodebk = $_POST['kodebk'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $thnterbit = $_POST['thnterbit'];
        // include database connection file
        include_once("koneksi.php");
        // Insert user data into table
        $result = mysqli_query($konek, "INSERT INTO
buku(kodebk,judul,pengarang,penerbit,thnterbit) VALUES('$kodebk','$judul',
'$pengarang','$penerbit','$thnterbit')");
        header("location:tampil_data.php");
    }
    ?>
</body>

</html>