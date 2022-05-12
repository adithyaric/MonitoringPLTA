<?php
require 'koneksi.php';
// Kosongkan table gafik
// $koneksiMonitoring->query("TRUNCATE TABLE grafik");


// Data dummy grafik
// for ($i = 1; $i <= 12; $i++) {
//   $nilai = rand(30, 80);
//   if ($i == 1) {
//     $nilai = 0;
//   } elseif ($i == 12) {
//     $nilai = 100;
//   }
//   $insert = $koneksiMonitoring->query("INSERT INTO grafik SET bulan = {$i}, target_fisik = ($nilai*6/10), target_keuangan = " . ($nilai * 4 / 5) . ", realisasi_fisik=" . ($nilai * 6 / 11) . ",realisasi_keuangan=" . $nilai);
// }


$sql    = $koneksiMonitoring->query("SELECT * FROM grafik");
$output = [];
while ($data = $sql->fetch_array(MYSQLI_ASSOC)) {
  $output['fisik'][]  = (float) $data['target_fisik'];
  $output['keu'][]    = (float) $data['target_keuangan'];
  $output['r_fis'][]  = (float) $data['realisasi_fisik'];
  $output['r_keu'][]  = (float) $data['realisasi_keuangan'];
}


echo json_encode($output);
