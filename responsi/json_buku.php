<?php
include "koneksi.php";

$sql = "select * from buku order by kodebk ";
$tampil = mysqli_query($konek, $sql);
if (mysqli_num_rows($tampil) > 0) {
    $no = 1;
    $response = array();
    $response["data"] = array();
    while ($r = mysqli_fetch_array($tampil)) {
        $h['kodebk'] = $r['kodebk'];
        $h['judul'] = $r['judul'];
        $h['pengarang'] = $r['pengarang'];
        $h['penerbit'] = $r['penerbit'];
        $h['thnterbit'] = $r['thnterbit'];
        array_push($response["data"], $h);
    }
    echo json_encode($response);
} else {
    $response["message"] = "tidak ada data";
    echo json_encode($response);
}
