-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `edu` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` varchar(20) NOT NULL DEFAULT current_timestamp(),
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cell`, `username`, `password`, `gender`, `photo`, `age`, `edu`, `status`, `trash`, `created_at`, `updated_at`) VALUES
(1, 'Md Mohiuddin', 'sobuj@gmail.com', '01719369459', 'sobuj123', '$2y$10$S1Py0giKpQdeYyvaBod9D.F8J0jRJxdd492TzqV8u4SYsLGCNt43S', 'Male', '1636175647_1828585408_men2.jpg', 25, 'BSC', 1, 0, '2021-11-05 21:40:58', '2021-11-06 01:11:37'),
(2, 'Afreen', 'afreen@gmail.com', '01908123456', 'afreen', '$2y$10$VLehUYpryAnZfTVBG/vg.eWx2DfOXlnSjbMAh3qsoEL3JYSTEpnie', 'Female', '1636175692_1970648016_kid1.jpg', NULL, NULL, 1, 0, '2021-11-06 10:28:31', NULL),
(3, 'mim', 'mim@gmail.com', '01912345670', 'mim', '$2y$10$Pf3MBck3KC3xNewAc7o4s.Ar2.hjcHznvnMGWHuMMNPPYxcGNWcVW', 'Female', '1636177828_1668229083_kid2.jpg', 23, 'BSC', 1, 0, '2021-11-06 11:46:50', '2021-11-06 01:11:53'),
(4, 'Khan Asraf', 'khan@gmail.com', '01912345671', 'khan', '$2y$10$YIECTIyBJL9jV5VQDrcZb.Wh66zMRzStfVq5W.qVIW8yhA8bS42S.', 'Male', '1636177858_1572953393_241028924_572281784188964_6329298856840478865_n.jpg', NULL, NULL, 1, 0, '2021-11-06 11:47:31', NULL),
(5, 'sujon', 'sujon@gmail.com', '01912345761', 'sujon', '$2y$10$jOPxal/j/MU8sSLLCmf/nO1smXNrXtvk2P6HgFYXYHN2XoJX8qGqy', 'Male', '1636177997_1954076238_mohiuddin_personal_50.png', NULL, NULL, 1, 0, '2021-11-06 11:48:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
