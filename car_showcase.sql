-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2025 at 04:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_showcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` enum('Available','Being Rent','Sold') NOT NULL,
  `added_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `brand`, `model`, `year`, `price`, `description`, `image_url`, `status`, `added_by`) VALUES
(15, 'Honda', 'Civic', '2019', 280000000, 'Honda Civic menawarkan desain sporty dan performa mesin yang responsif. Dilengkapi dengan fitur keselamatan terbaru, membuat pengalaman berkendara menjadi aman dan menyenangkan.', '', 'Being Rent', 'Admin'),
(16, 'Mitsubishi', 'Pajero Sport', '2021', 450000000, 'Mitsubishi Pajero Sport merupakan SUV tangguh yang cocok untuk medan berat maupun perkotaan. Dilengkapi fitur off-road dan interior mewah, ideal untuk petualangan dan kenyamanan.', '', 'Available', 'Admin'),
(17, 'Suzuki', 'Ertiga', '2018', 160000000, 'Suzuki Ertiga adalah MPV yang menawarkan kabin luas dan desain modern. Mesin hemat bahan bakar dan teknologi canggih membuat perjalanan keluarga menjadi lebih nyaman dan efisien.', '', 'Available', 'Admin'),
(18, 'Daihatsu', 'Xenia', '2017', 140000000, 'Daihatsu Xenia merupakan mobil MPV yang ekonomis dan praktis, sangat cocok untuk penggunaan sehari-hari. Interior yang lapang dan handling yang ringan menjadi nilai tambah.', '', 'Sold', 'Admin'),
(19, 'BMW', 'X5', '2022', 1200000000, 'BMW X5 adalah SUV mewah dengan performa tinggi dan teknologi inovatif. Desain eksterior yang agresif dipadukan dengan kenyamanan interior kelas premium.', '', 'Available', 'Admin'),
(20, 'Mercedes-Benz', 'C-Class', '2020', 900000000, 'Mercedes-Benz C-Class menghadirkan sedan elegan dengan fitur keselamatan lengkap dan mesin bertenaga. Cocok untuk pengendara yang mengutamakan gaya dan kenyamanan.', '', 'Available', 'Admin'),
(21, 'Tesla', 'Model 3', '2023', 1000000000, 'Tesla Model 3 adalah mobil listrik dengan teknologi autopilot canggih dan performa yang luar biasa. Menawarkan penghematan bahan bakar sekaligus pengalaman berkendara futuristik.', '', 'Available', 'Admin'),
(22, 'Hyundai', 'Tucson', '2021', 400000000, 'Hyundai Tucson hadir dengan desain modern dan fitur keselamatan lengkap. SUV ini menawarkan ruang kabin yang luas dan sistem hiburan mutakhir.', '', 'Sold', 'Admin'),
(23, 'Ford', 'Ranger', '2019', 350000000, 'Ford Ranger adalah pickup truck yang tangguh dengan kemampuan off-road handal. Cocok untuk pekerjaan berat maupun petualangan di alam bebas.', '', 'Available', 'Admin'),
(24, 'Nissan', 'X-Trail', '2020', 420000000, 'Nissan X-Trail menawarkan SUV yang nyaman dengan fitur canggih dan ruang kabin luas. Ideal untuk keluarga yang suka berpetualang dan melakukan perjalanan jauh.', '', 'Available', 'Admin'),
(25, 'Volkswagen', 'Polo', '2018', 220000000, 'Volkswagen Polo adalah hatchback kompak dengan desain stylish dan performa responsif. Sangat cocok untuk penggunaan sehari-hari di perkotaan.', '', 'Sold', 'Admin'),
(26, 'Mazda', 'CX-5', '2022', 480000000, 'Mazda CX-5 hadir dengan teknologi SkyActiv yang efisien serta desain elegan. Interior yang nyaman dan fitur keselamatan canggih menambah nilai lebih.', '', 'Available', 'Admin'),
(27, 'Kia', 'Seltos', '2021', 390000000, 'Kia Seltos menawarkan SUV compact dengan desain sporty dan fitur hiburan lengkap. Cocok untuk pengendara muda yang aktif dan stylish.', '', 'Available', 'Admin'),
(28, 'Chevrolet', 'Trailblazer', '2020', 410000000, 'Chevrolet Trailblazer adalah SUV dengan mesin bertenaga dan interior luas. Dilengkapi teknologi keselamatan modern yang membuat perjalanan lebih aman.', '', 'Available', 'Admin'),
(29, 'Lexus', 'RX', '2021', 1100000000, 'Lexus RX merupakan SUV mewah dengan desain premium dan fitur-fitur eksklusif. Menyajikan kenyamanan maksimal untuk pengendara dan penumpang.', '', 'Sold', 'Admin'),
(30, 'Audi', 'A4', '2019', 850000000, 'Audi A4 adalah sedan mewah dengan desain aerodinamis dan performa mesin yang bertenaga. Dilengkapi sistem infotainment canggih dan interior berkualitas tinggi.', '', 'Available', 'Admin'),
(31, 'Renault', 'Duster', '2018', 270000000, 'Renault Duster merupakan SUV yang ekonomis namun tangguh, cocok untuk pengendara yang mencari mobil serbaguna dengan harga terjangkau.', '', 'Available', 'Admin'),
(32, 'Honda', 'CR-V', '2020', 450000000, 'Honda CR-V menawarkan SUV dengan kabin luas dan fitur keselamatan mutakhir. Performa mesin yang responsif membuatnya nyaman untuk perjalanan jauh.', '', 'Available', 'Admin'),
(33, 'Toyota', 'Rush', '2021', 300000000, 'Toyota Rush adalah SUV compact dengan desain sporty dan kabin yang lapang. Sangat cocok untuk penggunaan harian dan perjalanan keluarga.', '', 'Available', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `image`, `description`) VALUES
(1, 'Sedan', 'sedan.svg', 'A classic passenger car with a separate trunk. Ideal for city and highway driving.'),
(2, 'Electric Vehicle', 'electric.svg', 'Powered by electricity instead of fuel. Eco-friendly and increasingly popular. '),
(3, 'SUV', 'suv.svg', 'Larger vehicles with higher ground clearance and often all-wheel drive. Suitable for families and rougher roads.'),
(4, 'MPV', 'mpv.svg', 'Spacious, family-friendly cars that can seat 6–8 people. Great for long trips.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('User','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'user', 'faradisy20@gmail.com', '$2y$10$3he9OJFMK6P6lkm7iReIOOqON/8.sU5GEqKD3tQbm8nZ/.UX0BttS', 'User'),
(2, 'Faradis', 'faradisyulianto2006@mail.ugm.ac.id', '$2y$10$JF5ml5X6SAcpPiTIvoIcLOHK7aixKPla4r9CP9CORwW06p0q.GkuG', 'User'),
(3, 'adis', 'faradis@gmail.com', '$2y$10$bdWMdR/mNMYfr2f/tATNbeWEPjCRDvAxPONDDgUPj/2WPM9tdvp6e', 'User'),
(4, 'makanbang', 'makan@gmail.com', '$2y$10$8jfPM8lprqwXl.p2Y5Rbre2pA1PaW1a3HuG8BfYyDGrY0ofitwo1y', 'User'),
(5, '123', '123@gmail.com', '$2y$10$KIf1hYwNy9E2RKGOsSYD4.tKndKzIyxeSW33.iszXxPjG9FM/BYn6', 'User'),
(6, 'adisss', 'adisss@gmail.com', '$2y$10$itQ.WqOMaosmanqKhrbe9eUbpASoapfbJujGU6bl1dhxcRjtKs5zu', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
