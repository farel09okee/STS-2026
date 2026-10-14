<?php
include "koneksi.php";

// Simpan data jika ada postingan form
if (isset($_POST['kirim'])) {
    $nama_pelapor   = $_POST['nama_pelapor'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $lokasi         = $_POST['lokasi'];
    $id_kategori    = $_POST['id_kategori'];
    $deskripsi      = $_POST['deskripsi'];
    $prioritas      = $_POST['prioritas'];

    $sql = "INSERT INTO laporan_kerusakan (nama_pelapor, nama_fasilitas, lokasi, id_kategori, deskripsi, prioritas) 
            VALUES ('$nama_pelapor', '$nama_fasilitas', '$lokasi', '$id_kategori', '$deskripsi', '$prioritas')";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
}

// Ambil data untuk tabel
$tampil = mysqli_query($conn, "SELECT lr.*, kf.nama_kategori FROM laporan_kerusakan lr 
                                JOIN kategori_fasilitas kf ON lr.id_kategori = kf.id_kategori 
                                ORDER BY lr.id_laporan DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lapor Kerusakan</title>
    <link href="sts.css" rel="stylesheet">
</head>
<body>

    <h2>Sistem Pelaporan Kerusakan Fasilitas Sekolah</h2>
    
    <div class="baris">
        <div class="kiri kotak">
            <h3>Buat Laporan</h3>
            <form action="" method="POST">
                <label>Nama Pelapor</label><input type="text" name="nama_pelapor" required>
                <label>Nama Fasilitas</label><input type="text" name="nama_fasilitas" required>
                <label>Lokasi</label><input type="text" name="lokasi" required>
                <label>Kategori</label>
                <select name="id_kategori" required>
                    <option value="1">Elektronik</option>
                    <option value="2">Furnitur</option>
                    <option value="3">Jaringan</option>
                    <option value="4">Peralatan Kelas</option>
                </select>
                <label>Deskripsi</label><textarea name="deskripsi" rows="2" required></textarea>
                <label>Prioritas</label>
                <select name="prioritas" required>
                    <option value="Rendah">Rendah</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Tinggi">Tinggi</option>
                </select>
                <button type="submit" name="kirim">Kirim Laporan</button>
            </form>
        </div>

        <div class="kanan kotak">
            <h3>Daftar Laporan</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Fasilitas</th>
                        <th>Lokasi</th>
                        <th>Pelapor</th>
                        <th>Deskripsi</th>
                        <th>Prioritas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($tampil)) { 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <b><?php echo $data['nama_fasilitas']; ?></b><br>
                            <small style="color: gray;"><?php echo $data['nama_kategori']; ?></small>
                        </td>
                        <td><?php echo $data['lokasi']; ?></td>
                        <td><?php echo $data['nama_pelapor']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td><?php echo $data['prioritas']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
