-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 11:29 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_employee`
--

CREATE TABLE `wp_employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `middlename` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `age` int(10) NOT NULL,
  `contact` int(15) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_employee`
--

INSERT INTO `wp_employee` (`id`, `firstname`, `middlename`, `lastname`, `birthday`, `age`, `contact`, `address`) VALUES
(1, 'name1', 'middle1', 'last1', '1970-12-01', 12, 123, '123 name1'),
(2, 'test 2', 'test 2', 'test 2', '2018-06-04', 2, 2, 'test 2 address'),
(4, 'test 3', 'test 3', 'test 3', '2018-06-12', 3, 123, 'test 3 address');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_employee`
--
ALTER TABLE `wp_employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_employee`
--
ALTER TABLE `wp_employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
