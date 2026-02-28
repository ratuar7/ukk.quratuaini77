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
<title>Data Aspirasi</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fbf7b8, #fbd0c8);
    margin: 0;
    padding: 30px;
}

/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

/* Judul */
h2.page-title {
    color: #f47c7c;
    margin-bottom: 20px;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

th, td {
    border: 1px solid #f47c7c;
    padding: 10px;
    font-size: 13px;
    text-align: center;
}

th {
    background-color: #f79ca8;
    color: white;
}

tr:nth-child(even) td {
    background-color: #fff7f7;
}

tr:hover td {
    background-color: #ffe6e6;
}

/* Kolom tanggal lebih lebar */
td:nth-child(4), th:nth-child(4) {
    width: 120px;
}
</style>
</head>
<body>

<!-- Include dashboard/navbar -->
<?php include 'dashboard-siswa.php'; ?>

<div class="container">
    <h2 class="page-title">Data Aspirasi</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Idkategori</th>
                <th>NIS</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../config/koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, "
                SELECT tbpengaduan.*, tbkategori.nama_kategori
                FROM tbpengaduan
                LEFT JOIN tbkategori 
                ON tbpengaduan.id_kategori = tbkategori.idkategori
                WHERE tbpengaduan.nis = '".mysqli_real_escape_string($koneksi, $_SESSION['nis'])."'
                ORDER BY tbpengaduan.tanggal DESC
            ");
            if(mysqli_num_rows($query) > 0):
                while ($data = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['id_kategori']); ?></td>
                    <td><?= htmlspecialchars($data['nis']); ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                    <td><?= htmlspecialchars($data['lokasi']); ?></td>
                    <td><?= htmlspecialchars($data['keterangan']); ?></td>
                    <td><?= ucfirst($data['status']); ?></td>
                    <td><?= htmlspecialchars($data['feedback']); ?></td>
                </tr>
                <?php endwhile;
            else: ?>
                <tr>
                    <td colspan="8">Belum ada aspirasi</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>