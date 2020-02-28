-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 03:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `job_title`, `password`, `picture`) VALUES
(19, 'John', 'john@gmail.com', '+9941234567', 'Select job type', '123456', ''),
(20, 'Victor Andreev', 'john@gmail.com', '+9941234567', 'Select job type', '123456', 'pp.jpg'),
(27, 'Tom', 'Johns@gmail.com', '+9941234567', 'Designer', '123456', '3e_lgpz3_400x400.jpeg'),
(28, 'Jennifer Lopez', 'jenny@gmail.com', '+9945367468', 'Developer', '123456', 'images (1).jpg'),
(30, 'John', 'john@gmail.com', '+9941234567', 'not set', '123456', ''),
(31, 'Bill Gates', 'billyboy@gmail.com', '21234567', 'Manager', '12345677', 'download.jpg'),
(32, 'Alekper', 'jon@gfdgdfgdf', '+9941232345346', 'Developer', '123456', 'images.jpg'),
(33, 'John', 'john@gmail.com', '+9941234567', 'not set', '123456', 'funny-profile-pic15.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
