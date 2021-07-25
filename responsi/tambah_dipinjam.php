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
    <form action="tambah_dipinjam.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>NOMOR PEMINJAMAN</td>
                <td><input type="text" name="nopeminjaman"></td>
            </tr>
            <tr>
                <td>KODE ANGGOTA</td>
                <td><input list="anggota" name="kodeangt" id="kodeangt">
                    <datalist id="anggota">
                        <?php
                        include_once("koneksi.php");
                        $var = mysqli_query($konek, "SELECT * FROM member");
                        foreach ($var as $data) {
                            echo "<option value='$data[kode]'>$data[nama]";
                        }
                        ?>
                    </datalist>
                </td>
            </tr>
            <tr>
                <td>KODE BUKU</td>
                <td><input list="buku" name="kodebk" id="kodebk">
                    <datalist id="buku">
                        <?php
                        $var = mysqli_query($konek, "SELECT * FROM buku");
                        foreach ($var as $data) {
                            echo "<option value='$data[kodebk]'>$data[judul]";
                        }
                        ?>
                    </datalist>
                </td>
            </tr>
            <tr>
                <td>TANGGAL PINJAM</td>
                <td><input type="date" name="tglpinjam"></td>
            </tr>
            <tr>
                <td>TANGGAL HARUS KEMBALI</td>
                <td><input type="date" name="tglhrskembali"></td>
            </tr>
            <tr>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <?php
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $nopeminjaman = $_POST['nopeminjaman'];
        $kodeangt = $_POST['kodeangt'];
        $kodebk = $_POST['kodebk'];
        $tglpinjam = $_POST['tglpinjam'];
        $tglharuskembali = $_POST['tglhrskembali'];
        $tglkembali = "0000-00-00";
        // include database connection file
        // Insert user data into table
        $result = mysqli_query($konek, "INSERT INTO
peminjaman (nopeminjaman,kodeangt,kodebk,tglpinjam,tglhrskembali,tglkembali) VALUES('$nopeminjaman','$kodeangt','$kodebk','$tglpinjam','$tglharuskembali','$tglkembali')");
        header("location:tampil_dipinjam.php");
    }
    ?>
</body>

</html>