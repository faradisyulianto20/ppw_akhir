<?php
include_once("config.php");

// Proses registrasi saat form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $pass_confirm = $_POST['password_confirm'];  // ini yang diperbaiki
    session_start();

    // Validasi sederhana
    if (empty($user) || empty($email) || empty($pass)) {
        echo "Semua field harus diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email tidak valid!";
    } elseif ($pass !== $pass_confirm) {
        echo "Password dan konfirmasi password tidak cocok!";
    } else {
        // Cek apakah username/email sudah ada
        $stmt = $conn->prepare("SELECT id FROM users WHERE name = ? OR email = ?");
        $stmt->bind_param("ss", $user, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            echo "Username atau email sudah digunakan!";
        } else {
            // Hash password sebelum simpan
            $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

            // Insert data user baru
            $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $user, $email, $pass_hash);
            if ($stmt->execute()) {
                echo "Registrasi berhasil!";
                $_SESSION['user'] = $user;
            } else {
                echo "Terjadi kesalahan saat menyimpan data.";
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #00213B;
        }
    </style>
</head>
<body>
    <div class="vh-100 d-flex justify-content-end align-items-center primary-color">
        <div class="d-flex " style="height: fit-content;">
            <div class="bg-white p-5 rounded-start-5 d-flex flex-column gap-5" style="width:600px;">
                <p class="fw-bold">golekmobil.</p>
                <h1 class="text-uppercase fw-bold">Register</h1>
                <form action="register.php" method="POST" class="d-flex flex-column gap-3">
                    <input type="text" name="name" placeholder="Username" autocomplete="new-username" required class="form-control rounded-5 p-3">
                    <input type="email" name="email" placeholder="Email" autocomplete="new" required class="form-control rounded-5 p-3">
                    <input type="password" name="password" placeholder="Password" autocomplete="new-password" required class="form-control rounded-5 p-3">
                    <input type="password" name="password_confirm" placeholder="Konfirmasi Password" autocomplete="new" required class="form-control rounded-5 p-3">
                    <button type="submit" class="rounded text-decoration-none bg-primary-color py-2 px-4 rounded-5 bg-primary-color-hover text-">Register</button>
                </form>
                <a href="login.php" class="primary-color text-decoration-none text-reset">Sudah punya akun?</a>
            </div>
            <div class="d-flex align-items-center bg-primary-color">
                <img src="daihatsu.svg" alt="">
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>