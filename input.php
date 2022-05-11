<?php 
header("Content-Type: application/json; charset=UTF-8");
include "koneksi.php";
date_default_timezone_set('Asia/Jakarta');

$data = 0; //Ambil dari db dengan AJAX

$lampu = array("data_lampu" => $data);

$dataLampu = json_encode($lampu);
echo $dataLampu;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$data 		= file_get_contents("php://input");
	$json 		= json_decode($data, TRUE);

	$api 		= $json['api'];
	$v_sblm_bc 	= $json['v_sblm_bc'];
	$v_sblm_aki = $json['v_sblm_aki'];
	$v_stlh_aki = $json['v_stlh_aki'];

	$i_sblm_bc 	= $json['i_sblm_bc'];
	$i_sblm_aki = $json['i_sblm_aki'];
	$i_stlh_aki = $json['i_stlh_aki'];

	$daya_aki   = $json['daya_aki'];
	$lux 		= $json['lux'];
	$kalibrasi 	= $json['kalibrasi'];

	if($api == "1005221431KRJGRBMGL") {
		$sql = "INSERT INTO tb_grafik(v_sblm_bc, v_sblm_aki, v_stlh_aki, i_sblm_bc, i_sblm_aki, i_stlh_aki, daya_aki, intensitas_cahaya, kecepatan_angin) VALUES('$v_sblm_bc', '$v_sblm_aki', '$v_stlh_aki', '$i_sblm_bc', '$i_sblm_aki', '$i_stlh_aki', '$daya_aki', '$lux', '$kalibrasi')";

		if ($koneksi->query($sql) === TRUE) {
		  //echo "New record created successfully";
		} else {
		  //echo "Error: " . $koneksi->error;
		}

	}
}

?>

