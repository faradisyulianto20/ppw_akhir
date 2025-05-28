<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        <h1>Data Mobil</h1>
        
        <div class="header-action">
            <a href="tambah.php" class="btn bg-primary-color text-white">Tambah Mobil</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Mobil</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Added By</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include file koneksi database
                include_once("config.php");

                // Query data mobil
                $result = mysqli_query($conn, "SELECT * FROM car ORDER BY car_id ASC");

                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$row["car_id"]."</td>";
                        echo "<td>".$row['brand']."</td>";
                        echo "<td>".$row['model']."</td>";
                        echo "<td>".$row['year']."</td>";
                        echo "<td>Rp ".number_format($row['price'], 0, ',', '.')."</td>";
                        echo "<td>".$row['status']."</td>";
                        echo "<td>".$row['added_by']."</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=".$row['car_id']."' class='btn bg-primary-color text-white'>Edit</a> ";
                        echo "<a href='hapus.php?id=".$row['car_id']."' class='btn bg-primary-color text-white' onclick='return confirm(\"Yakin ingin menghapus data?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' style='text-align:center'>Tidak ada data mobil</td></tr>";
                }

                // Tutup koneksi
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>