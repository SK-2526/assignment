-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 25, 2026 at 12:28 PM
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
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `account_type` enum('Savings','Current') NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `customer_id`, `account_number`, `account_type`, `bank_name`, `country`) VALUES
(2, 2, '102934852', 'Savings', 'Axis Bank', 'India'),
(10, 22, '2011833232', 'Current', 'HDFC', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` int(10) NOT NULL,
  `pan_no` varchar(10) DEFAULT NULL,
  `deposite` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile_no`, `pan_no`, `deposite`) VALUES
(1, 'Rahul Sharma', 'rahul@gmail.com', 2147483642, 'ABCDE1234F', 5000),
(2, 'Sneha Gupta', 'sneha@gmail.com', 2116483647, 'FGHIJ5678K', 25000),
(3, 'Amit Verma', 'amit@example.com', 2147483647, 'KLMNO9012P', 10000),
(4, 'Priya Singh', 'priya@gmail.com', 2147482647, 'QRSTU3456V', 6000),
(5, 'Vikram Rao', 'vikram@example.com', 2147483647, 'WXYZA7890B', 8500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` int(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_no`, `password`, `role`) VALUES
(1, 'Aliza', 'aliza@gmail.com', 1234567891, '$2y$10$fUenBghqTYSGWAOZpsltA.o9sGfKTZuSEAoiXMTBHFTfuj9k9cyOO', 'user'),
(2, 'Anza', 'anza@gmail.com', 2147483647, '$2y$10$Gmxy.kCsf3kA0RynyLxSKu9kYL2l.1hQ1P.OoVYVflIE3CIjgVTOq', 'user'),
(14, 'admin', 'admin@gmail.com', 1234547711, '$2y$10$p4HxaFpF3Zpn0k//OWmlxOJzjUSNU6rUlwHLkCTJfcbwHelGZwTC2', 'admin'),
(22, 'Anil', 'anil@gmail.com', 1244567322, '$2y$10$6XR8y2xm844oZ2Eh9aU/duuDSrEh/uurKdlXwzpJ3KznQgah4lgdG', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
