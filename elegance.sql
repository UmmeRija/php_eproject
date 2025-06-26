-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 06:31 PM
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
-- Database: `elegance`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `name`, `email`, `phone`, `gender`, `dates`, `times`, `branch`, `service`, `status`) VALUES
(1, 1, 'Yumna', 'yumna@gmail.com', 321, 'Female', '28-06-2025', '02:00 PM', 'PECHS Block II', 'Global Colouring', 'Pending'),
(2, 1, 'Yumna', 'yumna@gmail.com', 321, 'Female', '12-07-2025', '01:00 PM', 'Saddar', 'Eye Make Up', 'Pending'),
(4, 2, 'Hala', 'hala@gmail.com', 334, 'Female', '30-06-2025', '01:00 PM', 'PECHS Block II', 'Luxury Facials/Rituals', 'Pending'),
(5, 2, 'Hala', 'hala@gmail.com', 334, 'Female', '12-07-2025', '11:00 AM', 'PECHS Block II', 'Advanced Hair Moisturising', 'Pending'),
(6, 3, 'Raza', 'raza@gmail.com', 331, 'Male', '04-07-2025', '11:00 AM', 'North Nazimabad', 'Cut and Hair Care', 'Pending'),
(7, 4, 'Sania', 'sania@gmail.com', 334, 'Others/Undefined', '04-07-2025', '01:00 PM', 'Saddar', 'Straightening', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'abc', 'abc@gmail.com', '0333-4567891', 'hello this is a test');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwords` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `passwords`, `phone`) VALUES
(1, 'Yumna', 'yumna@gmail.com', '$2y$10$X1UxiRYL/pFekZSWi/FqYOu0YLIiOxbsbQtarnh5J32dplEfwQF36', '0321-3880737'),
(2, 'Hala', 'hala@gmail.com', '$2y$10$Ue9ZTce24gdLsSU0sKl5L.tkF9u951MHyPKhhGgkCOJG9HWD9v3ey', '0334-9876512'),
(3, 'Raza', 'raza@gmail.com', '$2y$10$IWXQZTnkyM9yDkl2vQ5mD..vCpJNWLb.mRrWkWlj1emf6ucKiNX3O', '0331-9764532'),
(4, 'Sania', 'sania@gmail.com', '$2y$10$CW0Mn6vIFITFuF90vuRXOOw1DrrLZU19XKblkL0Ed10/d3SqPeCTO', '0334-4567891'),
(5, 'Ahmed', 'ahmed@gmail.com', '$2y$10$S7ff5Tb4ijU6Te5lk4hfeOxsvzx.IGpaf50KLe5Bq/RgrKF75aW4K', '0332-4567832');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
