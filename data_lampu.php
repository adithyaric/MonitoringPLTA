<?php
include "koneksi.php";

$column = "SELECT data as count FROM tb_lampu";
$data = mysqli_query($koneksi, $column);
$data = mysqli_fetch_all($data, MYSQLI_ASSOC);
echo $data = json_encode(array_column($data, 'count'), JSON_NUMERIC_CHECK);
