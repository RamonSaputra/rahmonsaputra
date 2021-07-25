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
$pdf->Cell(190, 7, 'DAFTAR BUKU YANG DIPINJAM', 0, 1, 'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 6, 'NOMOR PINJAMAN', 1, 0);
$pdf->Cell(35, 6, 'KODE AGGOTA', 1, 0);
$pdf->Cell(35, 6, 'KODE BUKU', 1, 0);
$pdf->Cell(40, 6, 'TANGGAL PINJAM', 1, 0);
$pdf->Cell(40, 6, 'TANGGAL HARUS KEMBALI', 1, 1);

$pdf->SetFont('Arial', '', 10);

include 'koneksi.php';
$mahasiswa = mysqli_query($konek, "select * from peminjaman");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(35, 6, $row['nopeminjaman'], 1, 0);
    $pdf->Cell(35, 6, $row['kodeangt'], 1, 0);
    $pdf->Cell(35, 6, $row['kodebk'], 1, 0);
    $pdf->Cell(40, 6, $row['tglpinjam'], 1, 0);
    $pdf->Cell(40, 6, $row['tglhrskembali'], 1, 1);
}

$pdf->Output();
