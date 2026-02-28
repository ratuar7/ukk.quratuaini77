<?php
include '../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID pengaduan tidak ditemukan";
    exit;
}

$id = $_GET["id"];

/* ===========================
   PROSES UPDATE DATA
=========================== */
if (isset($_POST["simpan"])) {

    $status = $_POST['status'];
    $feedback = $_POST['feedback'];

    // Jika status = Selesai, set tanggal_selesai = NOW(), kalau tidak, biarkan NULL
    if (strtolower($status) == 'selesai') {
        $query_update = "
            UPDATE tbpengaduan
            SET status='$status',
                feedback='$feedback',
                tanggal_selesai=NOW()
            WHERE idpengaduan='$id'
        ";
    } else {
        $query_update = "
            UPDATE tbpengaduan
            SET status='$status',
                feedback='$feedback',
                tanggal_selesai=NULL
            WHERE idpengaduan='$id'
        ";
    }

    mysqli_query($koneksi, $query_update) or die(mysqli_error($koneksi));

    header("Location: kelola-pengaduan.php");
    exit;
}

/* ===========================
   AMBIL DATA DETAIL
=========================== */
$query = mysqli_query($koneksi, "
    SELECT tbpengaduan.*, tbkategori.nama_kategori
    FROM tbpengaduan
    LEFT JOIN tbkategori
        ON tbpengaduan.id_kategori = tbkategori.idkategori
    WHERE tbpengaduan.idpengaduan = '$id'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data pengaduan tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
</head>

<body>

    <h2>Detail Pengaduan</h2>

    <form method="POST">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td><b>ID Pengaduan</b></td>
                <td><?= $data['idpengaduan'] ?></td>
            </tr>
            <tr>
                <td><b>Kategori</b></td>
                <td><?= $data['nama_kategori'] ?></td>
            </tr>
            <tr>
                <td><b>Lokasi</b></td>
                <td><?= htmlspecialchars($data['lokasi']) ?></td>
            </tr>
            <tr>
                <td><b>Keterangan</b></td>
                <td><?= htmlspecialchars($data['keterangan']) ?></td>
            </tr>

            <tr>
                <td><b>Status</b></td>
                <td>
                    <select name="status">
                        <option value="Proses" <?= strtolower($data['status']) == 'proses' ? 'selected' : '' ?>>Proses</option>
                        <option value="Selesai" <?= strtolower($data['status']) == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><b>Feedback Admin</b></td>
                <td>
                    <textarea name="feedback" rows="4" cols="40"><?= htmlspecialchars($data['feedback']) ?></textarea>
                </td>
            </tr>
        </table>

        <br>
        <button type="submit" name="simpan">Simpan Perubahan</button>
        <a href="kelola-pengaduan.php">Kembali</a>
    </form>

</body>

</html>