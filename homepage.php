<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "car_showcase";

        $conn = mysqli_connect($host, $username, $password, $database);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $result = $conn->query("SELECT * FROM car");
        $category = $conn->query("SELECT * FROM category");
        session_start();
    ?>

    
    <div class="d-flex flex-column">
            <div class="d-flex justify-content-between fw-bold primary-color fs-5 mx-5 my-5" id="navbar">
                <div>
                    golekmobil.
                </div>
                <div>
                    <ul class="d-flex gap-3 list-unstyled">
                        <li class="cursor-pointer"><a href="" class="text-decoration-none light-color">Home</a></li>
                        <li class="cursor-pointer"><a href="" class="text-decoration-none light-color">About</a></li>
                        <li class="cursor-pointer"><a href="#category" class="text-decoration-none light-color">Category</a></li>
                        
                        <li class="cursor-pointer"><a href="register.php" class="text-decoration-none light-color"><?= htmlspecialchars($_SESSION['user_name']) ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex mx-5 primary-color h-100 d-flex align-items-center position-relative" style="margin: 150px 0px;">
                <div class="d-flex flex-column gap-2">
                    <h1 class="fw-bold fs-1">Discover the Future of Driving</h1>
                    <p>Explore our premium collection of cars</p>
                    <div>
                        <a href="index.php" class="rounded text-decoration-none bg-primary-color py-2 px-4 rounded-5 bg-primary-color-hover">View Collections</a>
                        <a href="" class="rounded text-decoration-none bg-primary-color py-2 px-4 rounded-5 bg-primary-color-hover">Booking Car</a>
                    </div>
                </div>
                <div class="position-absolute" style="right: -100px;">
                    <img src="daihatsu.svg" alt="">
                </div>
            </div>

        <div class=" mt-4 mb-5 primary-color d-flex align-items-center justify-content-center flex-column pb-5">
            <div class="text-center mb-4">
                <h1 class=" fw-bold fs-1">Choose Your Dream Car</h1>
                <p>Best Choice is Your Own Choice</p>
            </div>

            <div class="rounded d-flex align-items-center justify-content-center gap-3 bg-primary-color py-3 px-4 rounded-5"  style="width: fit-content;">
                <i class="fas fa-search"></i>
                <input type="text" name="" id="" class="border-0 shadow-none" placeholder="Cari..." style="background-color: transparent; border: none; outline: none; color: #ffffff;">
            </div>
        </div>

        <div class="d-flex gap-3 m-5 p-5">
            <?php 
            $count = 0; 
            while ($row = $result->fetch_assoc()): 
                if ($count >= 3) break;  // berhenti setelah 3 data
            ?>
                <div class="d-flex flex-column gap-3 p-5 border rounded-5 bg-primary-color position-relative">
                    <div class="position-absolute" style="top: -150px; left: 20px;" >
                        <img src="daihatsu.svg" alt="" style="width: 350px;">
                    </div>
                    <div class="fw-bold fs-4">
                        <?= htmlspecialchars($row['brand']) ?>
                    </div>
                    <div class="d-flex gap-4">
                        <div><?= htmlspecialchars($row['model']) ?></div>
                        <div><?= htmlspecialchars($row['year']) ?></div>
                    </div>
                    <div><?= htmlspecialchars($row['description']) ?></div>
                    <div class="d-flex gap-3 align-items-center mt-auto">
                        <div>Rp <?= htmlspecialchars(number_format($row['price'], 0, ',', '.')) ?></div>
                        <a class="btn bg-primary-color bg-primary-color-hover rounded-5">Checkout</a>
                    </div>
                </div>
            <?php 
                $count++;
            endwhile; 
            ?>
        </div>


            <div class="bg-primary-color text-center py-3">
                <h1 class="fw-bold text-white">Category</h1>
            </div>

            <div class="d-flex justify-content-between ms-5 my-5 primary-color align-items-center" id="category">
                <div>
                    <h1 class="fw-bold">Always Fit You</h1>
                    <p>There is no better or less</p>
                    <a href="category.php" class="rounded text-decoration-none bg-primary-color py-2 px-4 rounded-5 bg-primary-color-hover">View Collections</a>
                </div>
                <div class="d-flex gap-3 bg-primary-color d-flex pb-5 px-5 rounded-start-5 text-white ">
                    <?php 
                        $count = 0; 
                        while ($row = $category->fetch_assoc()): 
                    ?>
                             <div class="bg-primary-color-hover pt-5 px-4 rounded-bottom-4 d-flex flex-column gap-3 pb-3">
                                <h1 class="fs-5 fw-bold text-white"><?= htmlspecialchars($row['name']) ?></h1>
                                <div class="p-2 rounded-4 bg-white d-flex align-self-center" style="height: 150px; width: 170px;">
                                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="" style="width: 150px;" class="m-auto" >
                                </div>
                                <p style="width: 200px;"><?= htmlspecialchars($row['description']) ?></p>
                            </div>
                    <?php 
                            $count++;
                        endwhile; 
                    ?>
                </div>
            </div>

            <div class="d-flex m-5 primary-color gap-5">
                <div style="width: 400px;">
                    <p class="fs-3 fw-bold">golekmobil.</p>
                    <p class="">an intuitive and user-friendly car showcase platform designed to help you find the perfect vehicle effortlessly.</p>
                    <div class="d-flex gap-3">
                        <i class="fab fa-instagram"></i>  <!-- Instagram -->
                        <i class="fas fa-phone"></i>       <!-- Phone -->
                        <i class="fas fa-map-marker-alt"></i> <!-- Map marker -->
                        <i class="fas fa-envelope"></i>    <!-- Email -->
                    </div>
                </div>
                <div>
                    <h1 class="fs-5 fw-bold">Legal Pages</h1>
                    <ul class="dark-hover-color list-unstyled">
                        <li>Terms of Use</li>
                        <li>Privacy Policy</li>
                        <li>Disclaimer</li>
                    </ul>
                </div>
            </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
