<?php 
session_start(); // pastikan session sudah aktif
include '../config/koneksi.php';

if (isset($_POST['kirim'])) {
    // Ambil NIS siswa dari session
    $nis = $_SESSION['nis']; 
    $idkategori = $_POST['id_kategori'];
    $lokasi = $_POST['lokasi'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO `tbpengaduan` (nis, id_kategori, lokasi, keterangan)
              VALUES ('$nis', '$idkategori', '$lokasi', '$keterangan')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Laporan berhasil dikirim!');
                window.location='data_aspirasi.php';
              </script>";
    } else {
        echo "Gagal mengirim laporan: " . mysqli_error($koneksi);
    } 
}
?>