<?php
// users.php
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Data Users</title>
</head>
<body>
    <div class="d-flex justify-content-between p-5 fw-bold bg-primary-color">
        <p><a href="homepage.php" class="text-decoration-none text-white">golekmobil.</a></p>
        <ul class="d-flex list-unstyled gap-3 ">
            <li><a href="index.php" class="text-decoration-none text-white">Data Mobil</a></li>
            <li><a href="category.php" class="text-decoration-none text-white">Kategori</a></li>
            <li><a href="data-users.php" class="text-decoration-none text-white">Users</a></li>
        </ul>
    </div>

    <div class="container my-5">
        <h1>Data Users</h1>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query data users
                $result = mysqli_query($conn, "SELECT id, name, email, password, role FROM users ORDER BY id ASC");

                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . substr(htmlspecialchars($row['password']), 0, 10) . "</td>";
                        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' style='text-align:center'>Tidak ada data users</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
