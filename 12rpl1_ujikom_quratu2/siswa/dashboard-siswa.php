<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard Siswa</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<style>
/* Reset & body font */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
}

/* Top bar / navbar */
.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f79ca8; /* pink lembut */
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 25px; /* jarak dengan konten bawah */
}

.top-bar h2 {
    color: white; /* teks jelas */
    margin: 0;
    font-size: 1.5rem;
}

/* Container kanan (menu + logout) */
.right-menu {
    display: flex;
    align-items: center;
    gap: 20px;
}

/* Menu links */
.menu-links {
    display: flex;
    gap: 15px;
}

.menu-links a {
    text-decoration: none;
    color: white;
    font-weight: 500;
    transition: 0.3s;
    text-transform: capitalize; /* agar rapi */
}

.menu-links a:hover {
    color: #ffe6e6;
}

/* Tombol logout */
.logout-btn {
    text-decoration: none;
    background-color: #ff6b6b;
    color: white;
    padding: 8px 15px;
    border-radius: 6px;
    font-weight: 500;
    transition: 0.3s;
}

.logout-btn:hover {
    background-color: #ff8787;
    box-shadow: 0 4px 10px rgba(255,135,135,0.3);
}
</style>
</head>
<body>

<!-- Navbar Siswa -->
<div class="top-bar">
    <h2>Dashboard Siswa</h2>

    <div class="right-menu">
        <div class="menu-links">
            <a href="data_aspirasi.php">Data Aspirasi</a>
            <a href="form-pengaduan.php">Form Pengaduan</a>
            <a href="histori-siswa.php">histori pengaduan</a>
        </div>

        <a href="/12rpl1_ujikom_quratu2/logout.php" class="logout-btn">Logout</a>
    </div>
</div>

</body>
</html>