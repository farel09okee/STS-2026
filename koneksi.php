<?php

$host     = "localhost";
$username = "root";
$password = ""; 
$database = "db_laporan_fasilitas"; 

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $username, $password, $database);

// Periksa apakah koneksi berhasil atau gagal
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Set charset agar mendukung format data teks di database dengan baik
$conn->set_charset("utf8mb4");
?>
