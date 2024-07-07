-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 09:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(2500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone XYZ', 'Mobile phones', 699.99, 'A high-end smartphone with a 6.5-inch display, 128GB storage, and a powerful camera system.', 'https://d2j6dbq0eux0bg.cloudfront.net/images/15537018/1408324852.jpg', '2024-07-07 04:12:58', '2024-06-04 06:16:35'),
(2, 'Laptop ABC', 'laptops', 1199.99, 'A lightweight laptop with a 15-inch display, 512GB SSD, and 16GB RAM, perfect for work and entertainment.', 'https://i5.walmartimages.com/seo/Lenovo-ThinkBook-13-3-Laptop-AMD-Ryzen-7-4800U-512GB-SSD-Windows-10-Pro-20WC0005US_1239580a-a62d-4d26-a051-a56b14aad654.aa78c7d020886df177545a4328ef00e8.jpeg?odnHeight=2000&odnWidth=2000&odnBg=FFFFFF', '2024-06-04 06:16:35', '2024-06-04 06:16:35'),
(3, 'Bluetooth Speaker QWE', 'audio', 49.99, 'A portable Bluetooth speaker with excellent sound quality and a long-lasting battery.', 'https://th.bing.com/th/id/OIP.5Bt3xOm7nMTj6qp6YPYxigHaEK?rs=1&pid=ImgDetMain', '2024-06-04 06:16:35', '2024-06-04 06:16:35'),
(5, '4K TV DEF', 'televisions', 799.99, 'A 55-inch 4K Ultra HD TV with HDR support and smart features for streaming your favorite shows.', 'https://th.bing.com/th/id/R.e5e8887dfacd7836e5e88aa6f0300acc?rik=HgMtgOejqZCUqQ&pid=ImgRaw&r=0', '2024-07-07 00:42:14', '2024-07-07 00:42:14'),
(6, 'Smartwatch GHI', 'wearables', 199.99, 'A stylish smartwatch with fitness tracking, heart rate monitoring, and notification alerts.', 'https://th.bing.com/th/id/OIP.5cXzquryCz4nFaZZzLpuEQHaEK?rs=1&pid=ImgDetMain', '2024-07-07 00:42:39', '2024-07-07 00:42:39'),
(7, 'Gaming Console JKL', 'gaming', 499.99, 'A next-gen gaming console with 4K gaming, a powerful processor, and an extensive game library.', 'https://th.bing.com/th/id/OIP.BQpmJbD-23bhGnsiGbIxygHaE8?rs=1&pid=ImgDetMain', '2024-07-07 00:43:01', '2024-07-07 00:43:01'),
(8, 'Wireless Headphones MNO', 'audio', 149.99, 'Noise-cancelling wireless headphones with high-quality sound and a comfortable fit.', 'https://th.bing.com/th/id/OIP.SqiWbhIgItuGPYh_2xs-XQHaHa?rs=1&pid=ImgDetMain', '2024-07-07 00:43:22', '2024-07-07 00:43:22'),
(9, 'Tablet PQR', 'tablets', 329.99, 'A 10-inch tablet with 64GB storage, perfect for reading, browsing, and entertainment.', 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-2022-hero-silver-wifi-select?wid=470&hei=556&fmt=jpeg&qlt=95&.v=1665677520473', '2024-07-07 00:43:46', '2024-07-07 00:43:46'),
(10, 'Smart Home Assistant STU', 'smart Home', 89.99, 'A smart home assistant with voice control, music streaming, and smart device integration.', 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6417/6417019_sd.jpg;maxHeight=640;maxWidth=550', '2024-07-07 00:44:10', '2024-07-07 00:44:10'),
(11, 'Digital Camera VWX', 'cameras', 449.99, 'A digital camera with 24MP resolution, 4K video recording, and a range of creative features.', 'https://cdn.komachine.com/media/product/vieworks_19020_wfzyvg.jpg', '2024-07-07 00:44:30', '2024-07-07 00:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `submit_review`
--

CREATE TABLE `submit_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(250) NOT NULL,
  `user_id` int(20) NOT NULL,
  `rating` int(20) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submit_review`
--

INSERT INTO `submit_review` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(8, 11, 1, 4, 'a', '2024-07-07 01:47:33', '2024-07-07 01:47:33'),
(9, 11, 1, 1, 's', '2024-07-07 01:48:00', '2024-07-07 01:48:00'),
(10, 11, 1, 1, 'ss', '2024-07-07 01:49:01', '2024-07-07 01:49:01'),
(11, 7, 1, 4, 'Good', '2024-07-07 02:05:06', '2024-07-07 02:05:06'),
(12, 2, 1, 3, 'Average\r\n', '2024-07-07 02:08:53', '2024-07-07 02:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `submit_review`
--
ALTER TABLE `submit_review`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submit_review`
--
ALTER TABLE `submit_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
