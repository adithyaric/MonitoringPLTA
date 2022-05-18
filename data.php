<?php
include "koneksi.php";

$return_array = array();

$query = "SELECT * FROM tb_grafik ORDER BY created_at DESC LIMIT 10";

$result = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_assoc($result)) {
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

    $return_array[] = array(
        "created_at" => $created_at,
        "v_sblm_bc" => $v_sblm_bc,
        "v_sblm_aki" => $v_sblm_aki,
        "v_stlh_aki" => $v_stlh_aki,

        "i_sblm_bc" => $i_sblm_bc,
        "i_sblm_aki" => $i_sblm_aki,
        "i_stlh_aki" => $i_stlh_aki,

        "daya_aki" => $daya_aki,
        "kecepatan_angin" => $kecepatan_angin,
        "intensitas_cahaya" => $intensitas_cahaya,
    );
    //    $data[] = $row;
}

// Encoding array in JSON Format
echo json_encode($return_array, JSON_NUMERIC_CHECK);
// echo json_encode(array("return_array" =>$data, JSON_NUMERIC_CHECK));
