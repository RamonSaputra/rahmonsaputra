<?php
include_once("koneksi.php");
session_start();
if ($_SESSION['login'] != "LOGIN") {
    header("location:index.php");
}
$result = mysqli_query($konek, "SELECT * FROM peminjaman WHERE tglkembali != '0000-00-00'");
?>
<html>

<head>
    <title>Halaman Utama</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #000;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="tampil_data.php">Halaman Utama</a></li>
        <li><a href="tampil_member.php">Data Member</a></li>
        <li><a href="tampil_dipinjam.php">Buku Dipinjam</a></li>
        <li><a href="tampil_belum_dikembalikan.php">Buku Belum Dikembalikan</a></li>
        <li><a href="tampil_dikembalikan.php">Buku Dikembalikan</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>
    <a href="pdf_kembali.php">Download PDF</a><br /><br />
    <table width='100%' border=1>
        <tr>
            <th>NOMOR PEMINJAMAN</th>
            <th>KODE ANGGOTA</th>
            <th>KODE BUKU</th>
            <th>TANGGAL PINJAM</th>
            <th>TANGGAL HARUS KEMBALI</th>
            <th>TANGGAL KEMBALI</th>
            <th>ACTION</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nopeminjaman'] . "</td>";
            echo "<td>" . $user_data['kodeangt'] . "</td>";
            echo "<td>" . $user_data['kodebk'] . "</td>";
            echo "<td>" . $user_data['tglpinjam'] . "</td>";
            echo "<td>" . $user_data['tglhrskembali'] . "</td>";
            echo "<td>" . $user_data['tglkembali'] . "</td>";
            echo "<td><a href='edit_dipinjam.php?nopeminjaman=$user_data[nopeminjaman]'>Edit</a></d>";
        }
        ?>
    </table>
</body>

</html>