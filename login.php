<?php
include_once("config.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // Cek credential admin hard-code
    if ($email === 'admin@gmail.com' && $password === 'admin123') {
        // Buat session admin dan redirect
        $_SESSION['user_id']   = 0;
        $_SESSION['user_name'] = 'Administrator';
        header("Location: index.php");
        exit;
    }

    if (empty($email) || empty($password)) {
        $error = "Email dan password harus diisi!";
    } else {
        // Cari user selain admin
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $name, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id']   = $id;
                $_SESSION['user_name'] = $name;
                header("Location: homepage.php");
                exit;
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Email tidak ditemukan!";
        }

        $stmt->close();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
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
                <h1 class="text-uppercase fw-bold">Login</h1>
                <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
                <form method="POST" action="login.php" autocomplete="off" class="d-flex flex-column gap-3">
                    <input type="email" name="email" placeholder="Email" autocomplete="new-email" required class="form-control rounded-5 p-3">
                    <input type="password" name="password" placeholder="Password" autocomplete="new-password" required class="form-control rounded-5 p-3">
                    <button type="submit" class="rounded text-decoration-none bg-primary-color py-2 px-4 rounded-5 bg-primary-color-hover text-">Login</button>
                </form>
                <a href="register.php" class="primary-color text-decoration-none text-reset">Buat akun?</a>
            </div>
            <div class="d-flex align-items-center bg-primary-color">
                <img src="daihatsu.svg" alt="">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
