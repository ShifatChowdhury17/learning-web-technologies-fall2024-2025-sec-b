-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2025 at 11:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_payments`
--

CREATE TABLE `bill_payments` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_type` varchar(50) NOT NULL,
  `bill_number` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_payments`
--

INSERT INTO `bill_payments` (`id`, `transaction_id`, `user_id`, `bill_type`, `bill_number`, `amount`, `status`, `created_at`) VALUES
(1, 'BILL678c3ffc2b07b', 1, 'electricity', '85552585', 1299.00, 'Completed', '2025-01-19 05:57:48'),
(2, 'BILL678c40258c661', 1, 'phone', '01749813137', 246.00, 'Completed', '2025-01-19 05:58:29'),
(3, 'BILL678e7e179631a', 1, 'electricity', '85555', 1222.00, 'Completed', '2025-01-20 22:47:19'),
(4, 'BILL678e7e1799bf2', 1, 'electricity', '85555', 1222.00, 'Completed', '2025-01-20 22:47:19'),
(5, 'BILL678e7e38efb30', 1, 'electricity', '950750', 850.00, 'Completed', '2025-01-20 22:47:52'),
(6, 'BILL678e7e38f3167', 1, 'electricity', '950750', 850.00, 'Completed', '2025-01-20 22:47:52'),
(7, 'BILL678e7e541897b', 1, 'electricity', '8', 120.00, 'Completed', '2025-01-20 22:48:20'),
(8, 'BILL678e7e541c4dd', 1, 'electricity', '8', 120.00, 'Completed', '2025-01-20 22:48:20'),
(9, 'BILL678e80bf92ad5', 1, 'electricity', '77777', 850.00, 'Completed', '2025-01-20 22:58:39'),
(10, 'BILL678e80bf93998', 1, 'electricity', '77777', 850.00, 'Completed', '2025-01-20 22:58:39'),
(11, 'BILL678e819ef3d6f', 1, 'electricity', '55555', 1200.00, 'Completed', '2025-01-20 23:02:22'),
(12, 'BILL678e819f03391', 1, 'electricity', '55555', 1200.00, 'Completed', '2025-01-20 23:02:23'),
(13, 'BILL678e81b2cfde5', 1, 'water', '855', 855.00, 'Completed', '2025-01-20 23:02:42'),
(14, 'BILL678e81b2d3484', 1, 'water', '855', 855.00, 'Completed', '2025-01-20 23:02:42'),
(15, 'BILL678e856607375', 1, 'electricity', '580', 1200.00, 'Completed', '2025-01-20 23:18:30'),
(16, 'BILL678e856608acd', 1, 'electricity', '580', 1200.00, 'Completed', '2025-01-20 23:18:30'),
(17, 'BILL678e85ef40e41', 1, 'electricity', '950', 850.00, 'Completed', '2025-01-20 23:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `transaction` varchar(255) NOT NULL,
  `user_idd` int(11) NOT NULL,
  `block_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `created_at`, `transaction`, `user_idd`, `block_no`) VALUES
(11, '2025-01-18 10:31:56', 'czxczx', 0, 0),
(12, '2025-01-18 11:14:57', 'i am bad', 0, 0),
(13, '2025-01-18 12:55:10', 'block_no', 0, 0),
(19, '2025-01-19 06:07:19', '150000', 12, 1432),
(20, '2025-01-19 06:35:16', '20', 10000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `blocks table`
--

CREATE TABLE `blocks table` (
  `Block Number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks table`
--

INSERT INTO `blocks table` (`Block Number`) VALUES
('');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `sender_id`, `recipient_id`, `amount`, `created_at`) VALUES
(1, '297173mahdibg9', 1, 2, 999.00, '2025-01-01 09:33:20'),
(2, 'og280730695', 1, 2, 10000.00, '2025-01-01 10:29:28'),
(3, '0992mibhfydv', 1, 3, 10000000.00, '2025-01-02 21:56:33'),
(4, 'txn_678b92906e456', 1, 1, 100.00, '2025-01-18 03:37:52'),
(5, 'txn_678bd08a22ddd', 1, 1, 10000.00, '2025-01-18 08:02:18'),
(6, 'txn_678be1d37144f', 1, 1, 2000.00, '2025-01-18 09:16:03'),
(7, 'txn_678be2b93ba53', 1, 1, 20.00, '2025-01-18 09:19:53'),
(8, 'txn_678bf1f36e30d', 1, 1, 1000.00, '2025-01-18 10:24:51'),
(9, 'txn_678c8f5d14795', 1, 1, 10000.00, '2025-01-18 21:36:29'),
(10, 'txn_678c9abd9d0a1', 1, 1, 100.00, '2025-01-18 22:25:01'),
(12, '2467fshktik', 1, 3, 98000.00, '2025-01-01 22:38:55'),
(13, 'txn_678cab42aa055', 1, 1, 1000.00, '2025-01-18 23:35:30'),
(14, 'txn_678e33fa42318', 1, 1, 100.00, '2025-01-20 03:31:06'),
(15, 'txn_678e348a37b38', 1, 1, 90.00, '2025-01-20 03:33:30'),
(16, 'txn_678e36e0eca0a', 1, 1, 90.00, '2025-01-20 03:43:28'),
(17, 'txn_678e8193b120c', 1, 1, 1000.00, '2025-01-20 09:02:11'),
(18, 'txn_678f5182dc67f', 1, 1, 93.00, '2025-01-20 23:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` enum('user','miner') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `mobile_number`, `password`, `account_type`, `created_at`) VALUES
(10, 'adon fatima', 'adonfatima188@gmail.com', '01882512441', '123', 'user', '2025-01-18 20:07:48'),
(11, 'Fatima Adon', 'adonfatima18@gmail.com', '0188251244', 'adonfatima18@gmail.com', 'user', '2025-01-18 20:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `verify_block_table`
--

CREATE TABLE `verify_block_table` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_idd` int(11) NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `block_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify_block_table`
--

INSERT INTO `verify_block_table` (`id`, `user_idd`, `transaction`, `created_at`, `block_no`) VALUES
(1, 1432, 'gfhgh', '2025-01-18', 1111),
(2, 1, 'fssdf', '2025-01-18', 11),
(3, 1, 'fssdf', '2025-01-18', 11),
(4, 1, 'fssdf', '2025-01-18', 11),
(5, 1, 'fssdf', '2025-01-18', 11),
(6, 1, 'sdsdc', '2025-01-18', 11),
(7, 1, 'fssdf', '2025-01-18', 11),
(8, 0, 'i am bad', '2025-01-18', 0),
(9, 1, 'sdsdc', '2025-01-18', 11),
(10, 1, 'sdsdc', '2025-01-18', 11),
(11, 1, 'sdsdc', '2025-01-18', 11),
(12, 1, 'sdsdc', '2025-01-18', 11),
(13, 1, '15000', '2025-01-19', 11),
(14, 1, '15000', '2025-01-19', 11),
(15, 1, '15000', '2025-01-19', 11),
(16, 1, 'ami Adon', '2025-01-19', 999),
(17, 99, 'gjgh', '2025-01-19', 9),
(18, 1, 'sdsdc', '2025-01-19', 11),
(19, 0, '', '2025-01-19', 0),
(20, 1, 'fssdf', '2025-01-19', 11),
(21, 1090, '1400000', '2025-01-21', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `user_id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`user_id`, `balance`) VALUES
(1, 101793.00),
(11, 0.00),
(12, 0.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `verify_block_table`
--
ALTER TABLE `verify_block_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `verify_block_table`
--
ALTER TABLE `verify_block_table`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
