<?php
// koneksi.php - Menggunakan PDO (PHP Data Objects) untuk Keamanan Tingkat Tinggi

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "db_laporan_fasilitas";

try {
    // Membuat koneksi aman dengan sistem PDO
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    
    // Setel pengaturan error agar memunculkan exception jika ada masalah
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi PDO ke database gagal: " . $e->getMessage());
}
?>
