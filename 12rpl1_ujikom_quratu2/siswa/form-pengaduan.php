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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Pengaduan</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
/* Body & background */
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fbf7b8, #fbd0c8);
    min-height: 100vh;
}

/* Dashboard included, form container */
.form-container {
    max-width: 400px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    animation: fadeIn 0.8s ease forwards;
}

/* Animasi fadeIn */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Judul form */
h2 {
    margin-bottom: 25px;
    color: #f47c7c;
}

/* Label */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    color: #f47c7c;
    text-align: left;
}

/* Input, select, textarea */
input, select, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1.5px solid #f47c7c;
    border-radius: 8px;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}

/* Textarea */
textarea {
    resize: vertical;
}

/* Button submit */
button {
    background-color: #f47c7c;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
}

button:hover {
    background-color: #f9a1a1;
}

/* Responsive form container */
@media (max-width: 480px) {
    .form-container {
        margin: 20px;
        padding: 20px;
    }
}
</style>
</head>
<body>

<!-- Include dashboard/navbar -->
<?php include 'dashboard-siswa.php'; ?>

<div class="form-container">
    <h2>Form Pengaduan</h2>
    <form action="proses-aspirasi.php" method="POST">
        <label for="id_kategori">Kategori</label>
        <select name="id_kategori" id="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="1">Fasilitas Kelas</option>
            <option value="2">Fasilitas Lab</option>
            <option value="3">Lingkungan Sekolah</option>
        </select>

        <label for="lokasi">Lokasi</label>
        <input type="text" name="lokasi" id="lokasi" placeholder="Masukkan lokasi" required>

        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="4" placeholder="Jelaskan aspirasi Anda" required></textarea>

        <button type="submit" name="kirim">Kirim Pengaduan</button>
    </form>
</div>

</body>
</html>