-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 10:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wappastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(14, 2, 11, 4, '2023-10-13 08:46:11', '2023-10-13 08:46:26'),
(15, 2, 2, 1, '2023-10-13 13:56:38', '2023-10-13 13:56:38'),
(16, 2, 4, 2, '2023-10-13 13:57:37', '2023-10-13 13:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `sender_name`, `sender_email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ahmad aminu', 'ahmad@gmail.com', 'gratitude', 'i appriciate your service', '2023-10-13 12:36:52', '2023-10-13 12:36:52'),
(2, 'Alhassan Hassan', 'alhassanh88@gmail.com', 'Feedback', 'i have received my order today. it is such a nice product.', '2023-10-14 14:46:31', '2023-10-14 14:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `phone`, `profile`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '09012345678', '', 'zaria', '2023-09-28 19:54:37', '2023-09-28 19:54:37'),
(2, 3, '08123456789', '', 'igabi, kaduna', '2023-10-13 08:39:40', '2023-10-13 08:39:40'),
(3, 4, '09012345633', '', 'kwarbai, zaria', '2023-10-14 11:04:25', '2023-10-14 15:09:03'),
(4, 5, '08098765432', NULL, 'kaduna, kaduna', '2023-10-19 07:09:03', '2023-10-19 07:09:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_02_070613_create_customers_table', 1),
(8, '2023_09_28_100818_create_products_table', 2),
(9, '2023_10_11_153946_create_carts_table', 3),
(11, '2023_10_12_101232_create_orders_table', 4),
(12, '2023_10_13_122958_create_contact_messages_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `paid_price` double(8,2) NOT NULL,
  `status` enum('undelivered','delivered') NOT NULL DEFAULT 'undelivered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `quantity`, `paid_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 3000.00, 'delivered', '2023-10-12 10:56:28', '2023-10-12 20:37:29'),
(2, 1, 3, 1, 2000.00, 'delivered', '2023-10-12 10:56:28', '2023-10-12 20:40:52'),
(3, 1, 4, 2, 6000.00, 'delivered', '2023-10-12 12:05:46', '2023-10-14 11:02:13'),
(4, 1, 5, 1, 2500.00, 'delivered', '2023-10-12 12:12:42', '2023-10-19 07:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('shirts','trousers') NOT NULL,
  `gender` enum('boys','girls') NOT NULL,
  `color` enum('black','white','red') NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `gender`, `color`, `quantity`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Cotton Blouse Shirt', 'shirts', 'girls', 'red', 7, 1500.00, '1695917617.jpg', '2023-09-28 15:13:38', '2023-10-13 13:56:38'),
(3, 'Short Sleeve Shirt', 'shirts', 'boys', 'black', 9, 2000.00, '1695917760.jpg', '2023-09-28 15:16:00', '2023-10-12 10:33:35'),
(4, 'Long Sleeve Long Shirt', 'shirts', 'girls', 'red', 0, 3000.00, '1695917936.jpg', '2023-09-28 15:18:56', '2023-10-13 13:57:41'),
(5, 'jeans trousers', 'trousers', 'boys', 'black', 4, 2500.00, '1695918035.jpg', '2023-09-28 15:20:35', '2023-10-12 12:07:20'),
(6, 'Chinos Trousers', 'trousers', 'boys', 'white', 8, 5000.00, '1695921446.jpg', '2023-09-28 16:17:26', '2023-09-28 16:17:26'),
(7, 'Short Sleeve Shirt', 'shirts', 'boys', 'white', 5, 4500.00, '1695936073.jpg', '2023-09-28 20:21:13', '2023-10-11 22:00:02'),
(11, 'Radiya Clothing Samples', 'shirts', 'girls', 'black', 6, 4500.00, '1697218925.jpg', '2023-10-12 16:40:30', '2023-10-13 16:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'hafsat mahmud', 'hafsat@wappahstore.com', '$2y$10$.TPNAfxwofEgehLu6u.lP.dcwukdb9ZFqEnmanFKw.M.qHZZB06Jm', '2023-09-16 15:39:57', 'rLLDCsgXS0nF9I0k6aKfLkm4GeI0zuSZkfr3yMHXRxtwOkGjvkeSXArUj83D', '2023-09-16 15:39:57', '2023-09-16 15:39:57'),
(2, 'customer', 'Alhassan Hassan', 'alhassanh@wappahstore.com', '$2y$10$mQE8ToV/7NlWkOApSNQXU.1tgRAFoiwOGwewosimXD60EcZm0r6bu', NULL, NULL, '2023-09-28 19:54:37', '2023-10-14 15:01:19'),
(3, 'customer', 'sani ali', 'sani@wappahstore.com', '$2y$10$YGQapmE0u1kPHP04ydZLxOK2PJWiciLIZAIU4bJB/T73e7L0oNx1a', NULL, NULL, '2023-10-13 08:39:40', '2023-10-13 08:39:40'),
(4, 'customer', 'Fatima Aliyu', 'fati@wappahstore.com', '$2y$10$QZe/XbqaTo2i6qPJfGkcy.6iBj2aqcAj7YWJt.Mcywb3OV5CHIADy', NULL, NULL, '2023-10-14 11:04:25', '2023-10-14 11:04:25'),
(5, 'customer', 'sadiya abdullahi', 'sadiya@wappahstore.com', '$2y$10$n79pXKXGB8Ps1c9DFCy9y.k6vkgw.hkITRYWdaKgdsloFjVyekKzy', NULL, NULL, '2023-10-19 07:09:03', '2023-10-19 07:10:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
