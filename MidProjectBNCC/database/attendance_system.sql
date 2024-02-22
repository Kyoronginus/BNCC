-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 12:18 PM
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
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` text NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstName`, `lastName`, `Email`, `Password`, `Bio`) VALUES
('1', 'Tohru', 'Djunaedi Sato', 'tohru@gmail.com', 'dajal123\r\n', 'hey'),
('1234', 'wetertt', 'etetttt', 'werqoweqro@gmail.com', 'tes', 'halo'),
('saf232', 'tes', 'qwer', 'rweqr@gmail.com', '28b662d883b6d76fd96e4ddc5e9ba780', NULL),
('45', 'tesat', 'satesa', 'etet@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL),
('34t', 'qwrewr', 'wqewrqwerqwer', 'qwerwqerwq@gmail.com', 'b93c4428f0ff2702402429b3b3629422', 'phpasw'),
('qwr2', 'wqer', 'qwer', 'qwer@casd', '22c276a05aa7c90566ae2175bcc2a9b0', NULL),
('tyi67', 'tesattsetse', 'serrrrrrrrrrrr', 'rr@gmailasfd.casd', '13478f43344a476345773acddff439ce', 'wqqwrewerqrwqerweqwerqwerqwerqwer'),
('df', 'tes', 'weqr', 'qwer@gmail.com', '0b06c2c0c425b07fe59b86042edc9c9a', NULL),
('UD01', 'admin', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'this is admin'),
('ES900', 'tes user si', 'asdfasdfaf', 'aaswasaasa@gmail.com', '7bfa73e9508e72c1d9bf56f83a338601', 'qwerwewerwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `ID` (`ID`,`firstName`,`lastName`,`Email`,`Password`,`Bio`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
