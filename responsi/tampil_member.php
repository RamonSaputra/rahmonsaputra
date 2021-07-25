<?php
include_once("koneksi.php");
session_start();
if ($_SESSION['login'] != "LOGIN") {
    header("location:index.php");
}
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
    <a href="tambah_member.php">Tambah Member Baru</a><br />
    <a href="pdf_member.php">Download PDF Member</a><br><br>
    <table width='100%' border=1>
        <tr>
            <th>KODE</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>NO TELEPON</th>
            <th>EMAIL</th>
            <th>FOTO</th>
            <th>ACTION</th>
        </tr>
        <?php
        $result = mysqli_query($konek, "SELECT * FROM member");
        foreach ($result as $user_data) {
            echo "<tr>";
            echo "<td>" . $user_data['kode'] . "</td>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['alamat'] . "</td>";
            echo "<td>" . $user_data['nohp'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . "<img src='$user_data[foto]' width='70' height='90' />" . "</td>";
            echo "<td><a href='edit.php?$user_data[kode]'>Edit</a> |
<a href='delete_member.php?kode=$user_data[kode]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>