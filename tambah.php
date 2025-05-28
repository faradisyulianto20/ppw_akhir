<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Mobil</h1>

        <?php
        include_once("config.php");

        if(isset($_POST['submit'])) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $image_url = $_POST['image_url'];
            $status = $_POST['status'];
            $added_by = $_POST['added_by'];

            $errors = [];

            if(empty($brand)) $errors[] = "Brand tidak boleh kosong";
            if(empty($model)) $errors[] = "Model tidak boleh kosong";
            if(empty($year)) $errors[] = "Tahun tidak boleh kosong";
            if(empty($price) || !is_numeric($price)) $errors[] = "Harga tidak valid";
            if(empty($status)) $errors[] = "Status harus dipilih";

            if(empty($errors)) {
                $result = mysqli_query($conn, "INSERT INTO car(brand, model, year, price, description, image_url, status, added_by)
                                               VALUES('$brand', '$model', '$year', '$price', '$description', '$image_url', '$status', '$added_by')");
                if($result) {
                    echo "<div style='padding: 10px; background-color: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 15px;'>Data mobil berhasil ditambahkan. <a href='index.php'>Lihat Data</a></div>";
                } else {
                    echo "<div style='padding: 10px; background-color: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 15px;'>Error: " . mysqli_error($conn) . "</div>";
                }
            } else {
                echo "<div style='padding: 10px; background-color: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 15px;'><ul>";
                foreach($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul></div>";
            }
        }
        ?>

        <form action="tambah.php" method="post">
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" name="brand" id="brand" required>
            </div>

            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" required>
            </div>

            <div class="form-group">
                <label for="year">Tahun</label>
                <input type="number" name="year" id="year" min="1900" max="2099" step="1" required>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" id="price" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description"></textarea>
            </div>

            <div class="form-group">
                <label for="image_url">URL Gambar</label>
                <input type="text" name="image_url" id="image_url">
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Available">Available</option>
                    <option value="Being Rent">Being Rent</option>
                    <option value="Sold">Sold</option>
                </select>
            </div>

            <div class="form-group">
                <label for="added_by">Ditambahkan Oleh</label>
                <input type="text" name="added_by" id="added_by">
            </div>

            <div style="margin-top: 20px;">
                <input type="submit" name="submit" value="Simpan" class="btn bg-primary-color">
                <a href="index.php" class="btn bg-primary-color">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>