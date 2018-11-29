-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 02:09 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dabasveltes`
--

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `group`, `item`, `url`, `created_at`, `updated_at`) VALUES
(1, 'fruits', 'apples', 'apple.png', NULL, NULL),
(2, 'fruits', 'bananas', 'banana.png', NULL, NULL),
(3, 'fruits', 'watermelons', 'watermelon.png', NULL, NULL),
(4, 'fruits', 'pumpkins', 'pumpkin.png', NULL, NULL),
(5, 'vegetables', 'beans', '', NULL, NULL),
(6, 'vegetables', 'tomatoes', '', NULL, NULL),
(7, 'vegetables', 'potatoes', 'potatoes.png', NULL, NULL),
(8, 'vegetables', 'carrots', 'carrot.png', NULL, NULL),
(9, 'vegetables', 'cabbages', '', NULL, NULL),
(10, 'animal products', 'milk', 'milk.png', NULL, NULL),
(11, 'animal products', 'eggs', 'egg.png', NULL, NULL),
(12, 'animal products', 'cheese', 'cheese.png', NULL, NULL),
(13, 'animal products', 'meat', 'steak.png', NULL, NULL),
(14, 'misc', 'bread', 'bread.png', NULL, NULL),
(15, 'misc', 'misc', 'question.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
