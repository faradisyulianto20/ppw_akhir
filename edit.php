<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Mobil</h1>

    <?php
    include_once("config.php");

    if (!isset($_GET['id'])) {
        header("Location: index.php");
        exit();
    }

    $id = $_GET['id'];

    if (isset($_POST['update'])) {
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $description = $_POST['description'];
        $image_url = $_POST['image_url'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $added_by = $_POST['added_by'];

        $errors = [];

        if (empty($brand)) $errors[] = "Brand tidak boleh kosong";
        if (empty($model)) $errors[] = "Model tidak boleh kosong";
        if (empty($year)) $errors[] = "Tahun tidak boleh kosong";
        if (empty($description)) $errors[] = "Deskripsi tidak boleh kosong";
        if (empty($price)) $errors[] = "Harga tidak boleh kosong";
        if (empty($status)) $errors[] = "Status tidak boleh kosong";
        if (empty($added_by)) $errors[] = "Added by tidak boleh kosong";
        if (!is_numeric($year) || $year < 1886 || $year > date("Y") + 1) $errors[] = "Tahun tidak valid";

        if (empty($errors)) {
            $result = mysqli_query($conn, "UPDATE car SET 
                brand='$brand',
                model='$model',
                year='$year',
                description='$description',
                price='$price',
                status='$status',
                added_by='$added_by',
                image_url='$image_url'
                WHERE car_id=$id");


            if ($result) {
                echo "<div style='padding: 10px; background-color: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 15px;'>
                        Data mobil berhasil diperbarui. <a href='index.php'>Lihat Data</a>
                      </div>";
            } else {
                echo "<div style='padding: 10px; background-color: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 15px;'>
                        Error: " . mysqli_error($conn) . "
                      </div>";
            }
        } else {
            echo "<div style='padding: 10px; background-color: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 15px;'>
                    <ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul></div>";
        }
    }

    $result = mysqli_query($conn, "SELECT * FROM car WHERE car_id=$id");

    if (mysqli_num_rows($result) == 0) {
        header("Location: index.php");
        exit();
    }

    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="edit.php?id=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" value="<?php echo $row['model']; ?>" required>
        </div>
        <div class="form-group">
            <label for="year">Tahun</label>
            <input type="number" name="year" id="year" value="<?php echo $row['year']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" value="<?php echo $row['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description"><?php echo $row['description']; ?></textarea>
        <div class="form-group">
        <label for="status">Status</label>
            <select name="status" id="status">
                <option value="">-- Pilih Status --</option>
                <option value="Available" <?php if($row['status'] == 'Available') echo 'selected'; ?>>Available</option>
                <option value="Being Rent" <?php if($row['status'] == 'Being Rent') echo 'selected'; ?>>Being Rent</option>
                <option value="Sold" <?php if($row['status'] == 'Sold') echo 'selected'; ?>>Sold</option>
            </select>
        </div>
        <div class="form-group">
            <label for="added_by">Ditambahkan Oleh</label>
            <input type="text" name="added_by" id="added_by" value="<?php echo $row['added_by']; ?>">
        </div>
        <div style="margin-top: 20px;">
            <input type="submit" name="update" value="Update" class="btn bg-primary-color text-white">
            <a href="index.php" class="btn bg-primary-color text-white">Batal</a>
        </div>
    </form>
</div>
</body>
</html>