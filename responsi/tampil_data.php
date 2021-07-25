<?php
include_once("koneksi.php");
session_start();
if ($_SESSION['login'] != "LOGIN") {
    header("location:index.php");
}
$result = mysqli_query($konek, "SELECT * FROM buku");
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
    <a href="tambah_buku.php">Tambah Buku Baru</a><br />
    <a href="pdf_buku.php">Download PDF Buku</a><br />
    <a href="json_buku.php">Tampil Buku Dalam Json</a><br />
    <a href="xml_buku.php">Tampil Buku Dalam XML</a><br />
    <table width='100%' border=1>
        <tr>
            <th>KODE BUKU</th>
            <th>JUDUL</th>
            <th>PENGARANG</th>
            <th>PENERBIT</th>
            <th>TAHUN TERBIT</th>
            <th>ACTION</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['kodebk'] . "</td>";
            echo "<td>" . $user_data['judul'] . "</td>";
            echo "<td>" . $user_data['pengarang'] . "</td>";
            echo "<td>" . $user_data['penerbit'] . "</td>";
            echo "<td>" . $user_data['thnterbit'] . "</td>";
            echo "<td><a href='edit.php?nim=$user_data[kodebk]'>Edit</a> |
<a href='delete_buku.php?kodebk=$user_data[kodebk]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>