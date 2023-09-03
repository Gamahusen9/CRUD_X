-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 03:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gmail` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `gmail`, `password`) VALUES
(22, 'gama husen', '$2y$10$p5DARW7iHwzAMJlGNR6gCO74uvVIXJXfLn/TRTf4ci2cvNuPdVRfu', '$2y$10$.t/CkbD5eVzx5nfbUtfJQeUOd2CcIuiDVDkzofziCToS984wBxELq'),
(23, 'rajib narja', '$2y$10$NenJUIWmEnEwbUUmH6UdcOUVBEHu7g4wkA63ygdMss3SaWbp/byu6', '$2y$10$2R.wyJUxI41mxk.GWmF0CuA4RRjvG.Uq5xfg.dayLnahjR58/I3Z2'),
(24, 'feri', '$2y$10$90IzcwkdoyLpIXbJZo17XOCMQDfKftvwGJPwGQwxshFXR64Il8b2G', '$2y$10$n..Rfl3Dy9lBKdC7M7y3CeqvC7K9VTU9gYlhhvr3qk5XVw0zK.lpq'),
(25, 'ikhfan', '$2y$10$kQRB4uIisPA1z3EN8gJbauJeQKFElyhRpb9dzvcbuceajOHDS8JLe', '$2y$10$7U88KJFkCfnJ5C5B4dxvtuESPU.Nt6mNSy7ZbsLeCpJgIccSe6sxC'),
(26, 'ji', '$2y$10$8QtGf81q3DOQP7UkuVPlAO.m185JDCH0sZ8xP/Z5T6ldT82tEXooq', '$2y$10$dyPEhnd5N6cSoVCQ7nG/oePwWmBx4yKbLsz.tKOGWSNBeIT5bdmle'),
(27, 'ya', '$2y$10$ExLxNJNeytNOpyTQKfw5jeSV7y9qzWSIb0FG.fnXKKrFW0oCinHvO', '$2y$10$t9JRrS2C/C9qzETo64x5Zu1lYpUywAH3QaNNaQvbt4XbrhR2uYHbm'),
(28, 'razzah decky satia', '$2y$10$8Q.jr1ZcxoPk8hU/fKawhu.g.bP3fLdb8pgsi5vWhryJtlDgqYiSO', '$2y$10$cmwIuT/XnXstdFdhV5bz7OlLiMyzM3yKaBYtFZJPudlgLfII4kod6');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
