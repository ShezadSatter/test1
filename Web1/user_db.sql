-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 10:59 AM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `email` varchar(50) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `pswRepeat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`email`, `psw`, `pswRepeat`) VALUES
('shezad.satter@gmail.com', '$2y$10$RCxgHmy14O8gvspT4zEVTOFRWxH8qR22MTm3bArYZJ8oTvVxk4s92', ''),
('sdfgh@gmail.com', '$2y$10$CNGXdD0C6rZ3A2j0HPDFFel8TNBvQG9CYa0tCmJIvDHYFn2l0Vzj.', ''),
('Svjy@gmail.co', '$2y$10$mUgNZaU3FH1z/FuS6s.yveO/rFmdIrLG/fowFYcPNmFzVkp1wXgw6', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
