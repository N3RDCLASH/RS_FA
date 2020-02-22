-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 12:26 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_fa`
--

-- --------------------------------------------------------

--
-- Table structure for table `deelnemers`
--

CREATE TABLE `deelnemers` (
  `deelnemers_id` int(11) NOT NULL,
  `deelnemers_type` int(11) DEFAULT NULL,
  `deelnemers_naam` varchar(30) DEFAULT NULL,
  `deelnemers_email` text DEFAULT NULL,
  `deelnemers_adres` text DEFAULT NULL,
  `deelnemers_telefoonnummer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deelnemers`
--

INSERT INTO `deelnemers` (`deelnemers_id`, `deelnemers_type`, `deelnemers_naam`, `deelnemers_email`, `deelnemers_adres`, `deelnemers_telefoonnummer`) VALUES
(2, 4, 'Joel Naarendorp', 'joel.naarendorp.natin@gmail.com', 'indiraghandiweg 250', '8921797'),
(3, 4, 'Sabrina Starke', 'sabrina.starke.natin@gmail.com', 'indiraghandiweg 35', '8875695'),
(4, 4, 'qwewq', 'wqweqwe@gmqil.com', 'sdas', '456'),
(5, 4, 'suraj', 'sur@kkkl', 'kkdk', '272738');

-- --------------------------------------------------------

--
-- Table structure for table `deelnemers_per_taak`
--

CREATE TABLE `deelnemers_per_taak` (
  `deelnemers_id` int(11) NOT NULL,
  `taak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deelnemers_type`
--

CREATE TABLE `deelnemers_type` (
  `type_id` int(255) NOT NULL,
  `type_naam` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deelnemers_type`
--

INSERT INTO `deelnemers_type` (`type_id`, `type_naam`) VALUES
(4, 'student'),
(5, 'docent'),
(6, 'overige');

-- --------------------------------------------------------

--
-- Table structure for table `kwitantie`
--

CREATE TABLE `kwitantie` (
  `kwitantie_id` int(11) NOT NULL,
  `taak_id` int(11) NOT NULL,
  `kwitantie_titel` char(1) DEFAULT NULL,
  `kwitantie_omschrijving` text DEFAULT NULL,
  `kwitantie_prijs` int(11) DEFAULT NULL,
  `kwitantie_file` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

CREATE TABLE `projecten` (
  `project_id` int(11) NOT NULL,
  `naam` char(40) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `datum_start` date DEFAULT NULL,
  `datum_eind` date DEFAULT NULL,
  `status` char(10) DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`project_id`, `naam`, `omschrijving`, `type`, `datum_start`, `datum_eind`, `status`) VALUES
(3, 'Fundraising', 'Wo mek moni', 1, '2020-02-20', '2020-02-29', 'open'),
(4, 'Valentines Day', 'XOXOX', 1, '2020-02-20', '2020-02-26', 'open'),
(5, 'new year', 'idk', 1, '2020-02-25', '2020-02-27', 'open'),
(6, 'Erf Schoonmaken', 'maak skoon', 0, '2020-02-12', '2020-02-24', 'open'),
(9, 'test project', 'test', 0, '2020-02-12', '2020-02-02', 'open'),
(11, 'Cookout', 'eten koken', 0, '2020-02-19', '2020-02-28', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`type_id`, `type_name`) VALUES
(0, 'evenement'),
(1, 'werkzaamheid');

-- --------------------------------------------------------

--
-- Table structure for table `taak_type`
--

CREATE TABLE `taak_type` (
  `type_id` int(255) NOT NULL,
  `type_naam` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taak_type`
--

INSERT INTO `taak_type` (`type_id`, `type_naam`) VALUES
(3, 'uitvoering'),
(4, 'uitgave');

-- --------------------------------------------------------

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `taak_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `taak_type` int(11) DEFAULT NULL,
  `naam` char(50) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `prijs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taken`
--

INSERT INTO `taken` (`taak_id`, `project_id`, `taak_type`, `naam`, `omschrijving`, `aantal`, `prijs`) VALUES
(1, 3, 4, 'Cupcakes Kopen', 'iem bai de san toh owru mang', 10, 200),
(2, 4, 3, 'Kaarten schrijven', 'iem skrief den karta ', NULL, NULL),
(3, 3, 3, 'Tent Opzetten', 'iem set a tenti \r\njwz!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` int(10) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `user_name`, `user_password`) VALUES
(4, 1, 'test', '$2y$10$aaTZmQu/QQ3XPQC9o9IMk.U77klzj42FEeA7QhPjJM4o/RFoN3zVW'),
(5, 2, 'test1', '$2y$10$aaTZmQu/QQ3XPQC9o9IMk.U77klzj42FEeA7QhPjJM4o/RFoN3zVW'),
(6, 0, 'test0', '$2y$10$aaTZmQu/QQ3XPQC9o9IMk.U77klzj42FEeA7QhPjJM4o/RFoN3zVW');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`) VALUES
(0, 'overal_user'),
(1, 'administratie'),
(2, 'financiele administratie');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deelnemers`
--
ALTER TABLE `deelnemers`
  ADD PRIMARY KEY (`deelnemers_id`),
  ADD KEY `deelnemers_type` (`deelnemers_type`);

--
-- Indexes for table `deelnemers_per_taak`
--
ALTER TABLE `deelnemers_per_taak`
  ADD PRIMARY KEY (`deelnemers_id`,`taak_id`),
  ADD KEY `taak_id` (`taak_id`);

--
-- Indexes for table `deelnemers_type`
--
ALTER TABLE `deelnemers_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `kwitantie`
--
ALTER TABLE `kwitantie`
  ADD PRIMARY KEY (`kwitantie_id`,`taak_id`),
  ADD KEY `taak_id` (`taak_id`);

--
-- Indexes for table `projecten`
--
ALTER TABLE `projecten`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `taak_type`
--
ALTER TABLE `taak_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`taak_id`,`project_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `taak_type` (`taak_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deelnemers`
--
ALTER TABLE `deelnemers`
  MODIFY `deelnemers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deelnemers_type`
--
ALTER TABLE `deelnemers_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projecten`
--
ALTER TABLE `projecten`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `taak_type`
--
ALTER TABLE `taak_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taken`
--
ALTER TABLE `taken`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deelnemers`
--
ALTER TABLE `deelnemers`
  ADD CONSTRAINT `deelnemers_ibfk_1` FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`),
  ADD CONSTRAINT `deelnemers_ibfk_2` FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`);

--
-- Constraints for table `deelnemers_per_taak`
--
ALTER TABLE `deelnemers_per_taak`
  ADD CONSTRAINT `deelnemers_per_taak_ibfk_1` FOREIGN KEY (`deelnemers_id`) REFERENCES `deelnemers` (`deelnemers_id`),
  ADD CONSTRAINT `deelnemers_per_taak_ibfk_2` FOREIGN KEY (`taak_id`) REFERENCES `taken` (`taak_id`);

--
-- Constraints for table `kwitantie`
--
ALTER TABLE `kwitantie`
  ADD CONSTRAINT `kwitantie_ibfk_1` FOREIGN KEY (`taak_id`) REFERENCES `taken` (`taak_id`);

--
-- Constraints for table `projecten`
--
ALTER TABLE `projecten`
  ADD CONSTRAINT `projecten_ibfk_1` FOREIGN KEY (`type`) REFERENCES `project_type` (`type_id`);

--
-- Constraints for table `taken`
--
ALTER TABLE `taken`
  ADD CONSTRAINT `taken_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`),
  ADD CONSTRAINT `taken_ibfk_2` FOREIGN KEY (`taak_type`) REFERENCES `taak_type` (`type_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
