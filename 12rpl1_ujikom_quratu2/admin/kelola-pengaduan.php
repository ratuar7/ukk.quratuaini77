<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pengaduan</title>
    <style>
        /* Font dan body */
        body {
            font-family: Arial, sans-serif; 
            margin: 20px;
            background: linear-gradient(135deg, #fbf7b8, #fbd0c8); /* gradasi soft */
        }

        h2 {
            text-align: center;
            color: #f47c7c;
        }

        a {
            text-decoration: none;
            color: #f47c7c;
            margin-bottom: 10px;
            display: inline-block;
        }

        table {
            width: 100%;
            border-collapse: collapse; 
            background-color: #fff; 
        }

        th, td {
            border: 1px solid #f47c7c;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f47c7c; 
            color: #fff;
        }

        .even-row {
            background-color: #fff7f7;
        }

        /* Hover */
        tr:hover {
            background-color: #ffe6e6;
        }

        /* Tombol detail */
        button {
            padding: 5px 10px;
            border: none;
            background-color: #f47c7c;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #f9a1a1;
        }
    </style>
</head>

<body>
<?php include 'dashboard.php'; ?>
    <h2>Kelola Pengaduan - Admin</h2>
   

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Username</th>
                <th>Nama Kategori</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            include("../config/koneksi.php");
            $query = mysqli_query($koneksi, "
                SELECT tbpengaduan.*, tbkategori.nama_kategori, tbuser.username
                FROM tbpengaduan
                LEFT JOIN tbkategori ON tbpengaduan.id_kategori = tbkategori.idkategori
                LEFT JOIN tbuser ON tbpengaduan.nis = tbuser.nis
                ORDER BY tbpengaduan.tanggal DESC
            ");
            while ($data = mysqli_fetch_assoc($query)):
                $rowClass = ($no % 2 == 0) ? 'even-row' : '';
            ?>
                <tr class="<?= $rowClass ?>">
                    <td><?= $no++; ?></td>
                    <td><?= date('d-m-Y', strtotime($data['tanggal'])); ?></td>
                    <td><?= $data['username']; ?></td>
                    <td><?= $data['nama_kategori']; ?></td>
                    <td><?= $data['lokasi']; ?></td>
                    <td><?= $data['keterangan']; ?></td>
                    <td><?= $data['status']; ?></td>
                    <td>
                        <a href="detail-pengaduan.php?id=<?= $data['idpengaduan']; ?>">
                            <button type="button">Detail</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>

</html>