-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 02:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration_staging`
--

-- --------------------------------------------------------

--
-- Table structure for table `lib_mode_seperation`
--

CREATE TABLE `lib_mode_seperation` (
  `mode_seperation_id` int(11) NOT NULL,
  `mode_seperation_description` varchar(50) NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `date_added` date NOT NULL,
  `mode_seperation_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lib_mode_seperation`
--

INSERT INTO `lib_mode_seperation` (`mode_seperation_id`, `mode_seperation_description`, `added_by`, `date_added`, `mode_seperation_status`) VALUES
(3, 'AWOL', '03-10961', '0000-00-00', 0),
(4, 'DECEASED', '03-10961', '0000-00-00', 0),
(5, 'END OF CONTRACT', '03-10961', '0000-00-00', 0),
(10, 'NON-RENEWAL', '03-10961', '0000-00-00', 0),
(11, 'PROMOTION', '03-10961', '0000-00-00', 0),
(14, 'RESIGNATION', '03-10961', '0000-00-00', 0),
(15, 'RETIREMENT', '03-10961', '0000-00-00', 0),
(17, 'TERMINATION', '03-10961', '0000-00-00', 0),
(18, 'TRANSFERRED', '03-10961', '0000-00-00', 0),
(19, 'WAIVED', '03-10961', '0000-00-00', 0),
(20, 'CHANGE ITEM CODE', '03-10961', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lib_mode_seperation`
--
ALTER TABLE `lib_mode_seperation`
  ADD PRIMARY KEY (`mode_seperation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lib_mode_seperation`
--
ALTER TABLE `lib_mode_seperation`
  MODIFY `mode_seperation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
