<?php
// include database connection file
include_once("koneksi.php");
// Get id from URL to delete that user
$nopeminjaman = $_GET['nopeminjaman'];
// Delete user row from table based on given id
$result = mysqli_query($konek, "DELETE FROM peminjaman WHERE
nopeminjaman = '$nopeminjaman'");
// After delete redirect to Home, so that latest user list will be displayed .
header("Location:tampil_dipinjam.php");
