<?php
$koneksiMonitoring = new mysqli("localhost", "root", "", "db_monitoring_old");

// Check connection
if ($koneksiMonitoring->connect_errno) {
    echo "Failed to connect to MySQL: " . $koneksiMonitoring->connect_error;
    exit();
}
