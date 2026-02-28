<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Histori Pengaduan Selesai</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<style>
/* Font dan background */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fbf7b8, #fbd0c8);
    margin: 0;
    padding: 15px;
    color: #333;
}

h2 {
    text-align: center;
    color: #f47c7c;
}

a {
    display: inline-block;
    margin: 15px 0;
    color: #f47c7c;
    text-decoration: none;
    font-weight: 500;
}

a:hover {
    text-decoration: underline;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    background: #ffffff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* Header table */
th {
    background-color: #f47c7c;
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

.even-row td {
    background-color: #fff7f7;
}

tr:hover td {
    background-color: #ffe6e6;
}

.tanggal {
    width: 110px;
}
</style>
</head>
<body>
<?php include 'dashboard.php'; ?>
<h2>Histori Pengaduan (Status Selesai)</h2>


<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Lapor</th>
            <th>Username</th>
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
        session_start();

        $no = 1;
        $query = mysqli_query($koneksi, "
            SELECT tbpengaduan.*, tbkategori.nama_kategori, tbuser.username
            FROM tbpengaduan
            LEFT JOIN tbkategori
                ON tbpengaduan.id_kategori = tbkategori.idkategori
            LEFT JOIN tbuser
                ON tbpengaduan.nis = tbuser.nis
            WHERE LOWER(tbpengaduan.status) = 'selesai'
            ORDER BY tbpengaduan.tanggal_selesai DESC
        ");

        if(mysqli_num_rows($query) > 0):
            while($data = mysqli_fetch_assoc($query)):
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
            <td><?= htmlspecialchars($data['username']); ?></td>
            <td><?= htmlspecialchars($data['nama_kategori']); ?></td>
            <td><?= htmlspecialchars($data['lokasi']); ?></td>
            <td><?= htmlspecialchars($data['keterangan']); ?></td>
            <td><?= ucfirst($data['status']); ?></td>
            <td><?= $data['tanggal_selesai'] ? date('d-m-Y', strtotime($data['tanggal_selesai'])) : '-' ?></td>
        </tr>
        <?php
            endwhile;
        else:
        ?>
        <tr>
            <td colspan="8" style="text-align:center;">Belum ada pengaduan selesai</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>