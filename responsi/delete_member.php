<?php
// include database connection file
include_once("koneksi.php");
// Get id from URL to delete that user
$kode = $_GET['kode'];
// Delete user row from table based on given id
$result = mysqli_query($konek, "DELETE FROM member WHERE
kode= '$kode'");
// After delete redirect to Home, so that latest user list will be displayed .
header("Location:tampil_member.php");
