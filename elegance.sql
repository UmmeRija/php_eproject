-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2025 at 10:53 PM
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
  `phone` varchar(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `stylist` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `name`, `email`, `phone`, `gender`, `dates`, `times`, `branch`, `service`, `status`, `stylist`) VALUES
(1, 1, 'Yumna', 'yumna@gmail.com', '321', 'Female', '28-07-2025', '02:00 PM', 'PECHS Block II', 'Global Colouring', 'Pending', 'Hala Khan'),
(2, 1, 'Yumna', 'yumna@gmail.com', '321', 'Female', '12-07-2025', '01:00 PM', 'Saddar', 'Eye Make Up', 'Pending', NULL),
(4, 2, 'Hala', 'hala@gmail.com', '334', 'Female', '30-06-2025', '01:00 PM', 'PECHS Block II', 'Luxury Facials/Rituals', 'Pending', NULL),
(5, 2, 'Hala', 'hala@gmail.com', '334', 'Female', '12-07-2025', '11:00 AM', 'PECHS Block II', 'Advanced Hair Moisturising', 'Pending', NULL),
(6, 3, 'Raza', 'raza@gmail.com', '331', 'Male', '04-07-2025', '11:00 AM', 'North Nazimabad', 'Cut and Hair Care', 'Pending', NULL),
(7, 4, 'Sania', 'sania@gmail.com', '334', 'Others/Undefined', '04-07-2025', '01:00 PM', 'Saddar', 'Straightening', 'Pending', NULL),
(8, 8, 'Hala Khan', 'haladawood2828@gmail.com', '312', 'Female', '30-06-2025', '12:00 PM', 'Saddar', 'Global Colouring', 'Pending', NULL),
(9, 1, 'Hala Khan', 'haladawood2828@gmail.com', '2147483647', 'Female', '30-06-2025', '02:00 PM', 'Defence Block V', 'Oiling', 'Pending', NULL),
(10, 8, 'Hala Khan', 'haladawood2828@gmail.com', '312', 'Female', '02-07-2025', '11:00 AM', 'North Nazimabad', 'Engagement Make Up', 'Pending', NULL),
(11, 8, 'Hala Khan', 'haladawood2828@gmail.com', '312', 'Female', '30-06-2025', '03:00 PM', 'Defence Block V', 'Hala Khan', 'Pending', ''),
(12, 7, 'Alisha Rajput', 'alishakhan22@gmail.com', '312', 'Female', '24-07-2025', '12:00 PM', 'North Nazimabad', 'Head Massage', 'Pending', 'Hala Khan'),
(13, 1, 'Yumna', 'yumna@gmail.com', '321', 'Female', '18-07-2025', '12:00 PM', 'Defence Block V', 'Base Make Up', 'Pending', 'Hala Khan'),
(14, 1, 'Yumna', 'yumna@gmail.com', '0321-388073', 'Female', '05-07-2025', '11:00 AM', 'Saddar', 'Rebonding', 'Pending', 'Hala Khan'),
(15, 1, 'Yumna', 'yumna@gmail.com', '0321-388073', 'Female', '11-07-2025', '12:00 PM', 'Defence Block V', 'Hair Cut', 'Pending', 'Hala Khan'),
(16, 1, 'Yumna', 'yumna@gmail.com', '0321-388073', 'Female', '18-07-2025', '05:00 PM', 'Malir Cantt', 'Bridal & Reception Make Up', 'Pending', 'No Preferences');

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
(1, 'abc', 'abc@gmail.com', '0333-4567891', 'hello this is a test'),
(2, 'yumna', 'yumna@gmail.com', '0321-3880737', 'cfhujhuf');

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
(5, 'Ahmed', 'ahmed@gmail.com', '$2y$10$S7ff5Tb4ijU6Te5lk4hfeOxsvzx.IGpaf50KLe5Bq/RgrKF75aW4K', '0332-4567832'),
(6, 'Hala Khan', 'haladawood2828@gmail.comq', '$2y$10$v.jR5hpKdWkiSw/pP9tAd.OiJfhfe3WI2doKa2XRRRHqKLmujqyD6', '0312-2497999'),
(7, 'Alisha Rajput', 'alishakhan22@gmail.com', '$2y$10$j1oJoPuucqpkEIz421OwZuyBQco47H5MvscgaR4xm2ekAoHQbu4M.', '0312-3333333'),
(8, 'Hala Khan', 'haladawood2828@gmail.com', '$2y$10$WmF.KgMjmft8zLISupMB0umAP6Wa/5cHGWja0paDeSQ6ZEpRmptEG', '0312-2222233');

-- --------------------------------------------------------

--
-- Table structure for table `stylist`
--

CREATE TABLE `stylist` (
  `FullName` varchar(100) DEFAULT NULL,
  `EmailAdress` varchar(100) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Specialization` varchar(255) DEFAULT NULL,
  `YearsOfExperience` varchar(100) DEFAULT NULL,
  `WorkingHours` varchar(100) DEFAULT NULL,
  `Portfolio` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT 'Pending',
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stylist`
--

INSERT INTO `stylist` (`FullName`, `EmailAdress`, `PhoneNo`, `Gender`, `Specialization`, `YearsOfExperience`, `WorkingHours`, `Portfolio`, `Status`, `Id`) VALUES
('Hala Khan', 'haladawood2828@gmail.com', 2147483647, 'Female', 'I am A Nail Painter', '2', '4PM - 7PM ', 'aslaa.PNG', 'Pending', 1),
('Alisha', 'alishakhan22@gmail.com', 2147483647, 'Female', 'I am A Nail Painter', '6', '4PM - 7PM ', 'CHECKOUT.PNG', 'Pending', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailAdress` varchar(100) DEFAULT NULL,
  `Passwords` varchar(255) DEFAULT NULL,
  `ContactNo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FullName`, `EmailAdress`, `Passwords`, `ContactNo`) VALUES
(1, 'Hala Khan', 'haladawood2828@gmail.com', '$2y$10$u8h7WlE8TO3hwiqOg5Hj5OGht2IDlB6L7BYHx5Ti4kL4WNKmHlL/W', 2147483647),
(2, 'Alisha', 'alishakhan22@gmail.com', '$2y$10$h7eKREkUtp7ikmjBeTAsZeokwMaGzFq13hgis8cjZyRLFt17C/1NK', 2147483647);

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
-- Indexes for table `stylist`
--
ALTER TABLE `stylist`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stylist`
--
ALTER TABLE `stylist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
