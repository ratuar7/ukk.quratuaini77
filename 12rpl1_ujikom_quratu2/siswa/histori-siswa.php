<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != "Siswa") {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Histori Pengaduan Selesai</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fbf7b8, #fbd0c8);
    margin: 0;
    padding: 20px;
    color: #333;
}

/* Judul halaman */
h2.page-title {
    text-align: center;
    color: #f47c7c;
    margin-bottom: 20px;
}

/* Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

/* Header table */
th {
    background-color: #f79ca8;
    color: white;
    padding: 10px;
    text-align: center;
}

/* Seluruh sel */
td {
    padding: 10px;
    text-align: center;
    border: 1px solid #f47c7c;
}

tr:nth-child(even) td {
    background-color: #fff7f7;
}

tr:hover td {
    background-color: #ffe6e6;
}

td.tanggal, th.tanggal {
    width: 120px;
}
</style>
</head>
<body>

<!-- Include dashboard siswa -->
<?php include 'dashboard-siswa.php'; ?>

<h2 class="page-title">Histori Pengaduan Selesai Anda</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Lapor</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Tanggal Selesai</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include '../config/koneksi.php';

        $no = 1;
        $nis = mysqli_real_escape_string($koneksi, $_SESSION['nis']);
        $query = mysqli_query($koneksi, "
            SELECT tbpengaduan.*, tbkategori.nama_kategori
            FROM tbpengaduan
            LEFT JOIN tbkategori
                ON tbpengaduan.id_kategori = tbkategori.idkategori
            WHERE tbpengaduan.nis = '$nis' AND LOWER(tbpengaduan.status) = 'selesai'
            ORDER BY tbpengaduan.tanggal_selesai DESC
        ");

        if(mysqli_num_rows($query) > 0):
            while($data = mysqli_fetch_assoc($query)):
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td class="tanggal"><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
            <td><?= htmlspecialchars($data['nama_kategori']); ?></td>
            <td><?= htmlspecialchars($data['lokasi']); ?></td>
            <td><?= htmlspecialchars($data['keterangan']); ?></td>
            <td><?= ucfirst($data['status']); ?></td>
            <td class="tanggal"><?= date('d-m-Y', strtotime($data['tanggal_selesai'])); ?></td>
        </tr>
        <?php
            endwhile;
        else:
        ?>
        <tr>
            <td colspan="7" style="text-align:center; font-style:italic; color:#f47c7c;">
                Belum ada pengaduan yang selesai
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>