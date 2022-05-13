<?php
include "koneksi.php";
$data=$_POST["data"];

$sql="UPDATE tb_lampu set data='$data' where id=1";
if($koneksi->query($sql)===TRUE){
    echo "Data Lampu updated";
}
