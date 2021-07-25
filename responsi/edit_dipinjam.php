<?php
session_start();
if ($_SESSION['login'] != "LOGIN") {
    header("location:index.php");
}
include_once("koneksi.php");
$nopeminjaman = $_GET['nopeminjaman'];
$var = mysqli_query($konek, "SELECT * FROM peminjaman where nopeminjaman='$nopeminjaman'");
foreach ($var as $data1) {
?>
    <html>

    <head>
        <title>Tambah data mahasiswa</title>
    </head>

    <body>
        <a href="edit_dipinjam.php">Kembali</a>
        <br /><br />
        <form action="edit_dipinjam.php" method="post" name="form1">
            <table width="25%" border="0">
                <tr>
                    <td>NOMOR PEMINJAMAN</td>
                    <td><input type="text" name="nopeminjaman" value="<?php echo $data1['nopeminjaman'] ?>"></td>
                </tr>
                <tr>
                    <td>KODE ANGGOTA</td>
                    <td><input list="anggota" name="kodeangt" id="kodeangt" value="<?php echo $data1['kodeangt'] ?>">
                        <datalist id="anggota">
                            <?php
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
                    <td><input list="buku" name="kodebk" id="kodebk" value="<?php echo $data1['kodebk'] ?>">
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
                    <td><input type="date" name="tglpinjam" value="<?php echo $data1['tglpinjam'] ?>"></td>
                </tr>
                <tr>
                    <td>TANGGAL HARUS KEMBALI</td>
                    <td><input type="date" name="tglhrskembali" value="<?php echo $data1['tglhrskembali'] ?>"></td>
                </tr>
                <tr>
                    <td>TANGGAL KEMBALI</td>
                    <td><input type="date" name="tglkembali" value="<?php echo $data1['tglkembali'] ?>"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
    <?php
}
// Check If form submitted, insert form data into users table.
if (isset($_POST['Submit'])) {
    $nopeminjaman = $_POST['nopeminjaman'];
    $kodeangt = $_POST['kodeangt'];
    $kodebk = $_POST['kodebk'];
    $tglpinjam = $_POST['tglpinjam'];
    $tglharuskembali = $_POST['tglhrskembali'];
    $tglkembali = $_POST['tglkembali'];
    // include database connection file
    // Insert user data into table
    $result = mysqli_query($konek, "UPDATE peminjaman SET kodeangt = '$kodeangt', kodebk = '$kodebk', tglpinjam = '$tglpinjam', tglhrskembali = '$tglharuskembali', tglkembali = '$tglkembali' WHERE nopeminjaman ='$nopeminjaman'");
    header("Location:tampil_dipinjam.php");
}
    ?>
    </body>

    </html>