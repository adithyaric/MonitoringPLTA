<?php
require('./assets/fpdf/fpdf.php');
include "koneksi.php";

$tanggal_awal = $_GET['dari_tgl'];
$tanggal_akhir = $_GET['sampai_tgl'];
$data_select = $_GET['data_select'];


#insert library FPDF dan bentuk objek
$pdf = new FPDF();
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 20, "LAPORAN DATA MONITORING PLTA", 0, 1, 'C');

#tampilkan headernya
$pdf->Cell(10, 7, '', 0, 1); //Sedikti jarak

#Judul Bold
$pdf->SetFont('Arial', 'B', 10);

#ambil data di tabel dan masukkan ke array
$return_array = array();
$query = "SELECT * FROM tb_grafik WHERE DATE(created_at) BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY id ASC";
// $query = "SELECT * FROM tb_grafik ORDER BY id ASC";
$sql = mysqli_query($koneksi, $query);
#tampilkan data tabelnya
switch ($data_select) {
	case 1:
		$pdf->Cell(35, 6, "Created At", 1, 0);
		$pdf->Cell(25, 6, "tegangan", 1, 0);
		$pdf->Cell(35, 6, "Arus", 1, 1);
		while ($row = mysqli_fetch_assoc($sql)) {
			$created_at = $row['created_at'];
			$v_sblm_bc = $row['v_sblm_bc'];			
			$i_sblm_bc = $row['i_sblm_bc'];

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(35, 6, $created_at, 1, 0);
			$pdf->Cell(25, 6, $v_sblm_bc, 1, 0);
			$pdf->Cell(35, 6, $i_sblm_bc, 1, 1);
		}
		break;
	case 2:
		$pdf->Cell(35, 6, "Created At", 1, 0);
		$pdf->Cell(25, 6, "tegangan", 1, 0);
		$pdf->Cell(35, 6, "Arus", 1, 1);
		while ($row = mysqli_fetch_assoc($sql)) {
			$created_at = $row['created_at'];			
			$v_sblm_aki = $row['v_sblm_aki'];
			$i_sblm_aki = $row['i_sblm_aki'];

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(35, 6, $created_at, 1, 0);
			$pdf->Cell(25, 6, $v_sblm_aki, 1, 0);
			$pdf->Cell(35, 6, $i_sblm_aki, 1, 1);
		}
		break;
	case 3:
		$pdf->Cell(35, 6, "Created At", 1, 0);		
		$pdf->Cell(35, 6, "Daya Aki", 1, 1);
		while ($row = mysqli_fetch_assoc($sql)) {
			$created_at = $row['created_at'];
			$daya_aki = $row['daya_aki'];

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(35, 6, $created_at, 1, 0);
			$pdf->Cell(35, 6, $daya_aki, 1, 1);
		}
		break;
	case 4:
		$pdf->Cell(35, 6, "Created At", 1, 0);
		$pdf->Cell(35, 6, "Kecepatan angin", 1, 1);
		while ($row = mysqli_fetch_assoc($sql)) {
			$created_at = $row['created_at'];
			$kecepatan_angin = $row['kecepatan_angin'];

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(35, 6, $created_at, 1, 0);
			$pdf->Cell(35, 6, $kecepatan_angin, 1, 1);
		}
		break;
	case 5:
		$pdf->Cell(35, 6, "Created At", 1, 0);
		$pdf->Cell(35, 6, "Intensitas Cahaya", 1, 1);
		while ($row = mysqli_fetch_assoc($sql)) {
			$created_at = $row['created_at'];
			$intensitas_cahaya = $row['intensitas_cahaya'];

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(35, 6, $created_at, 1, 0);
			$pdf->Cell(35, 6, $intensitas_cahaya, 1, 1);
		}
		break;

	default:
		break;
}

#output file PDF
$pdf->Output();
