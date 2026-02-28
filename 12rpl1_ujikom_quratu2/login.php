<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
/* ==========================
   Body & Font
========================== */
body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #fbf7b8, #fbd0c8);
    margin: 0;
    padding: 0;
}

/* ==========================
   Navbar
========================== */
nav {
    background-color: #f47c7c;
    padding: 15px 30px;
    color: white;
    font-weight: 600;
    text-align: left;
}

/* ==========================
   Container utama
========================== */
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 40px;
    text-align: center;
}

/* ==========================
   Selamat Datang
========================== */
.welcome {
    margin-bottom: 30px;
    color: #f47c7c;
}

.welcome h1 {
    font-size: 1.5rem;
    line-height: 1.4;
}

/* ==========================
   Form Login
========================== */
.login-form {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    width: 300px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.login-form h2 {
    margin-bottom: 20px;
    color: #f47c7c;
}

/* Input field */
.login-form input[type="text"],
.login-form input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1.5px solid #f47c7c;
    border-radius: 8px;
    outline: none;
    font-size: 14px;
    text-align: center;
}

/* Submit button */
.login-form input[type="submit"] {
    background-color: #f47c7c;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-form input[type="submit"]:hover {
    background-color: #f9a1a1;
}

/* ==========================
   Responsive
========================== */
@media (max-width: 400px) {
    .login-form {
        width: 90%;
        padding: 20px;
    }

    .welcome h1 {
        font-size: 1.2rem;
    }
}
</style>
</head>
<body>

<!-- Navbar -->
<nav>APLIKASI PENGADUAN SISWA</nav>

<div class="container">
    <!-- Selamat Datang -->
    <div class="welcome">
        <h1>SELAMAT DATANG DI APLIKASI PENGADUAN SISWA</h1>
    </div>

    <!-- Form Login -->
    <div class="login-form">
        <h2>FORM LOGIN</h2>
        <form method="POST" action="proses-login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</div>

</body>
</html>