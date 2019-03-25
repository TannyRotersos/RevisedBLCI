-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 06:01 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queuing`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountreg`
--

CREATE TABLE `accountreg` (
  `id` int(2) NOT NULL,
  `teller` int(2) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `stat` varchar(15) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountreg`
--

INSERT INTO `accountreg` (`id`, `teller`, `userid`, `stat`, `link`) VALUES
(1, 1, '', 'offline', 'teller/teller1.php'),
(2, 2, '', 'offline', 'teller/teller2.php'),
(3, 3, '', 'offline', 'teller/teller3.php'),
(4, 4, '', 'offline', 'teller/teller4.php'),
(7, 5, '', 'offline', 'teller/teller5.php'),
(8, 6, '', 'offline', 'teller/teller6.php'),
(9, 7, '', 'offline', 'admin/index.php'),
(10, 8, '', 'offline', 'kiosk.php');

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `link` varchar(50) NOT NULL,
  `accountype` varchar(6) NOT NULL,
  `stat` varchar(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `loggedto` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `userid`, `pass`, `link`, `accountype`, `stat`, `fname`, `lname`, `age`, `address`, `contact`, `loggedto`) VALUES
(6, 'tanny', '$2y$10$8GcS5LntveldpglQuM3dNeULSZ4RFPR3/JuxxKGwdk48d7VfhDXsu', 'admin', 'admin', 'offline', 'Tanny', 'Rotersos', 21, 'Basdacu, Loon, Bohol', 9094420621, ''),
(7, 'ninyah', '$2y$10$KSxJ69ytVWHY5ATNmx55ue8ivNEfxLwWszmIvrWb/fYlASvuqOUAy', 'teller', 'teller', 'offline', 'Ninyah', 'Pacatang', 20, 'Camanaga, San Miguel, Bohol', 9092225588, ''),
(8, 'kiosk', '$2y$10$8GcS5LntveldpglQuM3dNeULSZ4RFPR3/JuxxKGwdk48d7VfhDXsu', 'admin', 'kiosk', 'offline', 'Tanny', 'Rotersos', 21, 'Basdacu, Loon, Bohol', 9094420621, '');

-- --------------------------------------------------------

--
-- Table structure for table `display`
--

CREATE TABLE `display` (
  `quenumber` varchar(20) NOT NULL,
  `done` int(2) NOT NULL,
  `teller` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display`
--

INSERT INTO `display` (`quenumber`, `done`, `teller`) VALUES
('', 1, 1),
('', 1, 2),
('', 1, 3),
('', 1, 4),
('', 1, 5),
('', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `que`
--

CREATE TABLE `que` (
  `quenumber` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `accountnum` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `name2` varchar(50) NOT NULL,
  `accountnum2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `taposna` int(2) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `name3` varchar(50) NOT NULL,
  `accountnum3` varchar(50) NOT NULL,
  `amount3` varchar(15) NOT NULL,
  `name4` varchar(50) NOT NULL,
  `accountnum4` varchar(50) NOT NULL,
  `amount4` varchar(15) NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teller` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `que`
--

INSERT INTO `que` (`quenumber`, `name`, `accountnum`, `amount`, `name2`, `accountnum2`, `amount2`, `priority`, `taposna`, `contact`, `name3`, `accountnum3`, `amount3`, `name4`, `accountnum4`, `amount4`, `dtime`, `teller`, `user`) VALUES
(1, '', '', '', '', '', '', 'BL01', 0, '', '', '', '', '', '', '', '2019-03-25 04:45:47', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `que1`
--

CREATE TABLE `que1` (
  `quenumber` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `accountnum` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `name2` varchar(50) NOT NULL,
  `accountnum2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `name3` varchar(50) NOT NULL,
  `accountnum3` varchar(50) NOT NULL,
  `amount3` varchar(50) NOT NULL,
  `name4` varchar(50) NOT NULL,
  `accountnum4` varchar(50) NOT NULL,
  `amount4` varchar(50) NOT NULL,
  `taposna` int(2) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teller` varchar(50) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `que1`
--

INSERT INTO `que1` (`quenumber`, `name`, `accountnum`, `amount`, `name2`, `accountnum2`, `amount2`, `name3`, `accountnum3`, `amount3`, `name4`, `accountnum4`, `amount4`, `taposna`, `contact`, `dtime`, `teller`, `user`) VALUES
('BL01', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-03-07 05:14:58', '2', 'ninyah'),
('BL02', 'Tanny Rotersos', '865424', '855', 'Tanny Rotersos', '845321', '12', '', '', '', '', '', '', 1, '09123941655', '2019-02-16 00:08:47', '2', 'teller1'),
('BL03', 'Justine Dan Batausa', '85421', '255', '', '', '', 'Myra Asilo', '5412255', '63', '', '', '', 1, '09236541255', '2019-02-12 00:36:52', '1', 'teller1'),
('BL01', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-03-07 05:14:58', '2', 'ninyah'),
('BL02', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-02-16 00:08:47', '2', 'teller1'),
('BL03', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-14 00:58:13', '', ''),
('BL04', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-14 01:00:22', '', ''),
('BL01', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-03-07 05:14:58', '2', 'ninyah'),
('BL02', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-02-16 00:08:47', '2', 'teller1'),
('BL01', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-03-07 05:14:58', '2', 'ninyah'),
('BL02', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-21 01:00:31', '', ''),
('BL03', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-21 01:00:35', '', ''),
('BL04', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-21 01:00:39', '', ''),
('BL01', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '2019-03-07 05:14:58', '2', 'ninyah'),
('BL01', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-03-25 04:45:50', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE `senior` (
  `quenumber` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `accountnum` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `name2` varchar(50) NOT NULL,
  `accountnum2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `priority` varchar(50) NOT NULL,
  `taposna` int(2) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `name3` varchar(50) NOT NULL,
  `accountnum3` varchar(50) NOT NULL,
  `amount3` varchar(15) NOT NULL,
  `name4` varchar(50) NOT NULL,
  `accountnum4` varchar(50) NOT NULL,
  `amount4` varchar(15) NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teller` int(2) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `senior1`
--

CREATE TABLE `senior1` (
  `quenumber` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `accountnum` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `name2` varchar(50) NOT NULL,
  `accountnum2` varchar(50) NOT NULL,
  `amount2` varchar(50) NOT NULL,
  `name3` varchar(50) NOT NULL,
  `accountnum3` varchar(50) NOT NULL,
  `amount3` varchar(50) NOT NULL,
  `name4` varchar(50) NOT NULL,
  `accountnum4` varchar(50) NOT NULL,
  `amount4` varchar(50) NOT NULL,
  `taposna` int(2) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teller` int(2) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senior1`
--

INSERT INTO `senior1` (`quenumber`, `name`, `accountnum`, `amount`, `name2`, `accountnum2`, `amount2`, `name3`, `accountnum3`, `amount3`, `name4`, `accountnum4`, `amount4`, `taposna`, `contact`, `dtime`, `teller`, `user`) VALUES
('SL01', '', '', '', '', '', '', '', '', '', '', '', '', 0, '09123941655', '2019-02-14 00:58:02', 0, ''),
('SL02', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-14 00:58:07', 0, ''),
('SL03', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-14 00:58:18', 0, ''),
('SL04', '', '', '', '', '', '', '', '', '', '', '', '', 0, '0912', '2019-02-14 00:58:34', 0, ''),
('SL01', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-21 01:00:27', 0, ''),
('SL02', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2019-02-21 01:00:43', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountreg`
--
ALTER TABLE `accountreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`quenumber`);

--
-- Indexes for table `senior`
--
ALTER TABLE `senior`
  ADD PRIMARY KEY (`quenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountreg`
--
ALTER TABLE `accountreg`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `que`
--
ALTER TABLE `que`
  MODIFY `quenumber` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senior`
--
ALTER TABLE `senior`
  MODIFY `quenumber` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
