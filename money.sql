-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 23, 2020 at 04:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `money`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `username` char(255) NOT NULL,
  `date` date NOT NULL,
  `nature` char(255) NOT NULL,
  `amt` int(255) NOT NULL,
  `d_amt` int(255) NOT NULL,
  `w_amt` int(255) NOT NULL,
  `description` char(255) NOT NULL,
  `bal` int(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`username`, `date`, `nature`, `amt`, `d_amt`, `w_amt`, `description`, `bal`, `id`) VALUES
('ABC', '2020-01-02', 'Deposit', 2000, 2000, 0, 'try-4', 6000, 7),
('ABC', '2019-12-31', 'Deposit', 2000, 2000, 0, 'try-6', 4000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Image` char(255) NOT NULL,
  `Name` char(255) NOT NULL,
  `Username` char(255) NOT NULL,
  `Password` char(255) NOT NULL,
  `Seq_Q` char(255) NOT NULL,
  `Seq_A` char(255) NOT NULL,
  `O_Balance` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Image`, `Name`, `Username`, `Password`, `Seq_Q`, `Seq_A`, `O_Balance`) VALUES
('Untitled-3.psd', 'XYZ', 'ABC', 'XYZ', 'What is the name of your best friend?', 'ABC', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `Image` (`Image`,`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
