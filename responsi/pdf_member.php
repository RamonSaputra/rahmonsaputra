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
$pdf->Cell(190, 7, 'DAFTAR MEMBER', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 6, 'KODE', 1, 0);
$pdf->Cell(50, 6, 'NAMA', 1, 0);
$pdf->Cell(25, 6, 'ALAMAT', 1, 0);
$pdf->Cell(50, 6, 'NO HP', 1, 0);
$pdf->Cell(30, 6, 'EMAIL', 1, 1);

$pdf->SetFont('Arial', '', 10);

include 'koneksi.php';
$mahasiswa = mysqli_query($konek, "select * from member");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(30, 6, $row['kode'], 1, 0);
    $pdf->Cell(50, 6, $row['nama'], 1, 0);
    $pdf->Cell(25, 6, $row['alamat'], 1, 0);
    $pdf->Cell(50, 6, $row['nohp'], 1, 0);
    $pdf->Cell(30, 6, $row['email'], 1, 1);
}

$pdf->Output();
