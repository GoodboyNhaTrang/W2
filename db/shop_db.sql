-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 04:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(19, 20, 'Spider-Man: Across The Spider-Verse', 70, 1, 'spiderman.jpg'),
(20, 1, 'Breaking Bad', 40, 1, 'break.jpg'),
(21, 20, 'THỎ BẢY MÀU VÀ NHỮNG NGƯỜI NGHĨ NÓ LÀ BẠN', 80, 1, 'comic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(100) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `category_name`) VALUES
(1, 'history'),
(2, 'comic'),
(3, 'self-help'),
(4, 'science-fiction'),
(5, 'business'),
(6, 'horror'),
(7, 'romance');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 2, 'Nguyen Hai Nam', 'nguyenhainam203@gmail.com', '1234567890', 'naisu'),
(3, 20, 'Named', 'nguyenhainam203@gmail.com', '1', 'Hello World :3'),
(4, 20, 'namnguyen', 'hainam@gmail.com', '1', 'Hello World!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 1, 'Lucio Pelu', '123456789', 'lucio123@gmail.com', 'cash on delivery', 'flat no. 123, Jogeshwari, mumbai, india - 400104', 'the world (2), happy lemons(3)', 50, '2023-04-10', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category_id`) VALUES
(4, 'JoJo Rabbit', 100, 'jojoRabbit.jpg', 2),
(8, 'Spider-Man: Across The Spider-Verse', 70, 'spiderman.jpg', 2),
(9, 'Puss in Boots: The Last Wish', 70, 'unnamed.jpg', 2),
(13, 'The Fabelmans', 50, 'fabelmans.jpg', 7),
(15, 'All Quiet on the Western Front', 50, 'all.jpg', 1),
(17, 'Breaking Bad', 40, 'break.jpg', 6),
(18, 'Paper please 11111', 65, 'Papers_Please_S-842699808-large.jpg', 6),
(19, 'Scissor Seven', 70, 'scissorseven.jpg', 2),
(20, 'Sakamoto Days', 75, 'sakamoto.jpg', 2),
(23, 'Dám Hạnh Phúc', 123, 'damhanhphuc.jpg', 3),
(24, 'Đắc Nhân Tâm', 71, 'dacnhantam.png', 3),
(25, 'Ngôn ngữ cở thể trong tình yêu', 115, 'nnctttt.jpg', 3),
(26, 'Lãnh Đạo Luôn Ăn Sau Cùng', 88, 'simon3.jpg', 5),
(27, 'Cuốn Sách Hoàn Hảo Về Ngôn Ngữ Cơ Thể', 150, 'nnct1.jpg', 3),
(28, 'SỰ TRỖI DẬY VÀ SUY TÀN CỦA ĐẾ CHẾ THỨ BA - LỊCH SỬ ĐỨC QUỐC XÃ', 327, 'lichsu.jpg', 1),
(29, 'THỎ BẢY MÀU VÀ NHỮNG NGƯỜI NGHĨ NÓ LÀ BẠN', 80, 'comic.jpg', 2),
(30, 'DC Poster Portfolio: Clay Mann SC', 15, 'dc.jpg', 2),
(31, 'Mask (Dark Horse Comics / Dc Comics)', 12, 'dc2.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Nam', 'nguyenhainam203@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user'),
(10, 'admin01', 'admin01@gmail.com', '96a3be3cf272e017046d1b2674a52bd3', 'admin'),
(20, 'usernametest', 'user@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
