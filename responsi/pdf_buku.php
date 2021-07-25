<?php
// memanggil library FPDF
require('assets/fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'PERPUSTAKAAN UAD', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 7, 'DAFTAR SEMUA BUKU', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'KODE BUKU', 1, 0);
$pdf->Cell(50, 6, 'JUDUL BUKU', 1, 0);
$pdf->Cell(25, 6, 'PENGARANG', 1, 0);
$pdf->Cell(50, 6, 'PENERBIT', 1, 0);
$pdf->Cell(30, 6, 'TAHUN TERBIT', 1, 1);

$pdf->SetFont('Arial', '', 10);

include 'koneksi.php';
$mahasiswa = mysqli_query($konek, "select * from buku");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(30, 6, $row['kodebk'], 1, 0);
    $pdf->Cell(50, 6, $row['judul'], 1, 0);
    $pdf->Cell(25, 6, $row['pengarang'], 1, 0);
    $pdf->Cell(50, 6, $row['penerbit'], 1, 0);
    $pdf->Cell(30, 6, $row['thnterbit'], 1, 1);
}

$pdf->Output();
