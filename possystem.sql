-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 12:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `possystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(17, 'Electronics', '2018-01-16 23:31:36', '2018-01-16 23:31:36'),
(18, 'Cosmetics', '2018-01-16 23:32:30', '2018-01-16 23:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Arko Babu', '2232', '2018-01-16 01:22:21', '2018-01-16 01:22:21'),
(2, 'Azad', '154785', '2018-01-16 23:33:21', '2018-01-16 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_no` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(10) UNSIGNED NOT NULL,
  `total_price` int(10) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `grnd_price` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `customer_name`, `product_name`, `quantity`, `unit_price`, `total_price`, `discount`, `grnd_price`, `created_at`, `updated_at`) VALUES
(1, 222, 'Arko Babu', 'hp laptop', 22, 50, 1100, 2, 1078, '2018-01-16 21:14:17', '2018-01-16 21:14:17'),
(2, 222, 'Arko Babu', 'hp laptop', 222, 262, 58164, 22, 45368, '2018-01-16 21:29:51', '2018-01-16 21:29:51'),
(3, 2222, 'Arko Babu', 'hp laptop', 2, 262, 524, 22, 409, '2018-01-16 21:33:55', '2018-01-16 21:33:55'),
(4, 22, 'Arko Babu', 'hp laptop', 2222, 262, 582164, 22, 454088, '2018-01-16 21:50:16', '2018-01-16 21:50:16'),
(5, 25252, 'Arko Babu', 'hp laptop', 2222, 262, 582164, 22, 454088, '2018-01-16 21:50:42', '2018-01-16 21:50:42'),
(6, 222, 'Arko Babu', 'hp laptop', 2222, 262, 582164, 22, 454088, '2018-01-16 21:52:10', '2018-01-16 21:52:10'),
(7, 2222546, 'Arko Babu', 'hp laptop', 5, 262, 1310, 33, 878, '2018-01-16 21:53:06', '2018-01-16 21:53:06'),
(8, 23333, 'Arko Babu', 'hp laptop', 33, 262, 8646, 3, 8387, '2018-01-16 22:28:34', '2018-01-16 22:28:34'),
(9, 233333, 'Azad', 'Mobile', 2, 27500, 55000, 5, 52250, '2018-01-16 23:37:29', '2018-01-16 23:37:29'),
(10, 23444, 'Arko Babu', 'Samsung', 4, 4433, 17732, 10, 15959, '2018-01-16 23:39:07', '2018-01-16 23:39:07'),
(11, 2334444, 'Azad', 'hp laptop', 44, 52500, 2310000, 5, 2194500, '2018-01-16 23:42:14', '2018-01-16 23:42:14'),
(12, 234444, 'Azad', 'hp laptop', 4, 52500, 210000, 3, 203700, '2018-01-16 23:42:58', '2018-01-16 23:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_01_11_115122_create_categories_table', 1),
(14, '2018_01_14_041829_create_products_table', 2),
(15, '2018_01_14_041947_create_storages_table', 2),
(16, '2018_01_14_042033_create_invoices_table', 2),
(17, '2018_01_14_042155_create_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_price` int(10) UNSIGNED NOT NULL,
  `profit` int(10) UNSIGNED NOT NULL,
  `s_price` int(10) UNSIGNED NOT NULL,
  `catname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `b_price`, `profit`, `s_price`, `catname`, `created_at`, `updated_at`) VALUES
(1, 'hp laptop', 50000, 5, 52500, 'A new', '2018-01-16 01:20:53', '2018-01-16 23:37:01'),
(2, 'Mobile', 25000, 10, 27500, 'Electronics', '2018-01-16 23:32:56', '2018-01-16 23:32:56'),
(3, 'Samsung', 3333, 33, 4433, 'Electronics', '2018-01-16 23:35:59', '2018-01-16 23:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `storages`
--

CREATE TABLE `storages` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quant` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arko', 'arko.azad@yahoo.com', '$2y$10$z5VMrtTiG3rsljL2p5O.huoJ3tMT/vT9NrH7KFqrmbRa83UarTukq', 'YCZNCdmLP2lV60RDHeoTKg5EtsBRSMRQ2z857fhdJDsEmG7AtQ8IqYAkYau1', '2018-01-16 22:45:04', '2018-01-16 22:45:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storages`
--
ALTER TABLE `storages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `storages`
--
ALTER TABLE `storages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
