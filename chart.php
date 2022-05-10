<?php
include "koneksi.php";

function colm($koneksi, $param)
{
    $column = "SELECT $param as count FROM tb_grafik ORDER BY id ASC";
    $value = mysqli_query($koneksi, $column);
    $value = mysqli_fetch_all($value, MYSQLI_ASSOC);
    $value = json_encode(array_column($value, 'count'), JSON_NUMERIC_CHECK);

    return $value;
}

$created_at = colm($koneksiMonitoring, 'created_at');
$tegangan = colm($koneksiMonitoring, 'tegangan');
$arus_sebelum_bc = colm($koneksiMonitoring, 'arus_sebelum_bc');
$arus_sebelum_ca = colm($koneksiMonitoring, 'arus_sebelum_ca');
$kecepatan_angin = colm($koneksiMonitoring, 'kecepatan_angin');
$intensitas = colm($koneksiMonitoring, 'intensitas_cahaya');
