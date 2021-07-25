<?php

include "koneksi.php";


header('Content-Type: text/xml');
$query = "SELECT * FROM buku";
$hasil = mysqli_query($konek, $query);
$jumField = mysqli_num_fields($hasil);

echo "<?xml version='1.0'?>";
echo "<data>";
while ($data = mysqli_fetch_array($hasil)) {
    echo "<mahasiswa>";
    echo "<kodebuku>", $data['kodebk'], "</kodebuku>";
    echo "<judul>", $data['judul'], "</judul>";
    echo "<pengarang>", $data['pengarang'], "</pengarang>";
    echo "<penerbit>", $data['penerbit'], "</penerbit>";
    echo "<tahunterbit>", $data['thnterbit'], "</tahunterbit>";
    echo "</mahasiswa>";
}
echo "</data>";
