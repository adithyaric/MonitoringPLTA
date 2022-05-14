<?php
// $koneksiMonitoring = new mysqli("localhost", "root", "", "db_monitoring");
$koneksi = new mysqli("localhost", "root", "", "db_monitoring");

// Check connection
if ($koneksi->connect_errno) {
    echo "Failed to connect to MySQL: " . $koneksi->connect_error;
    exit();
}
