<?php
require('./assets/fpdf/fpdf.php');
include "koneksi.php";

#insert library FPDF dan bentuk objek
$pdf = new FPDF();
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 20, "LAPORAN DATA MONITORING PLTA", 0, 1, 'C');

#tampilkan headernya
$pdf->Cell(10, 7, '', 0, 1); //Sedikti jarak

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(35, 10, 'created_at', 1, 0);
$pdf->Cell(25, 10, 'Daya Aki', 1, 0);
$pdf->Cell(35, 10, 'Kecepatan Angin', 1, 0);
$pdf->Cell(35, 10, 'Intensitas Cahaya', 1, 1);

$pdf->SetFont('Arial', '', 10);

#ambil data di tabel dan masukkan ke array
$return_array = array();
$query = "SELECT * FROM tb_grafik ORDER BY id ASC";
$sql = mysqli_query($koneksi, $query);
#tampilkan data tabelnya
while ($row = mysqli_fetch_assoc($sql)) {
	$created_at = $row['created_at'];
	//Tegangan
	$v_sblm_bc = $row['v_sblm_bc'];
	$v_sblm_aki = $row['v_sblm_aki'];
	$v_stlh_aki = $row['v_stlh_aki'];
	//Arus
	$i_sblm_bc = $row['i_sblm_bc'];
	$i_sblm_aki = $row['i_sblm_aki'];
	$i_stlh_aki = $row['i_stlh_aki'];

	$daya_aki = $row['daya_aki'];
	$kecepatan_angin = $row['kecepatan_angin'];
	$intensitas_cahaya = $row['intensitas_cahaya'];


	$pdf->Cell(35, 6, $created_at, 1, 0);
	$pdf->Cell(25, 6, $daya_aki, 1, 0);
	$pdf->Cell(35, 6, $kecepatan_angin, 1, 0);
	$pdf->Cell(35, 6, $intensitas_cahaya, 1, 1);
}

#output file PDF
$pdf->Output();
