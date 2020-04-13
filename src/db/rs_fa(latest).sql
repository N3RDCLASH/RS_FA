-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 03:59 AM
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
  `deelnemers_telefoonnummer` text DEFAULT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deelnemers`
--

INSERT INTO `deelnemers` (`deelnemers_id`, `deelnemers_type`, `deelnemers_naam`, `deelnemers_email`, `deelnemers_adres`, `deelnemers_telefoonnummer`, `CreatedOn`) VALUES
(2, 4, 'Joel Naarendorp', 'joel.naarendorp.natin@gmail.com', 'indiraghandiweg 250', '8921797', '2020-03-05 21:27:17'),
(3, 4, 'Sabrina Starke', 'sabrina.starke.natin@gmail.com', 'indiraghandiweg 35', '8875695', '2020-03-05 21:27:17'),
(4, 4, 'qwewq', 'wqweqwe@gmqil.com', 'sdas', '456', '2020-03-05 21:27:17'),
(5, 4, 'suraj', 'sur@kkkl', 'kkdk', '272738', '2020-03-05 21:27:17'),
(7, 5, 'Sardha Raghosingh', 's.raghosing.natin@gmail.com', 'indiraghandiweg 398', '8923456', '2020-03-10 03:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `deelnemers_per_taak`
--

CREATE TABLE `deelnemers_per_taak` (
  `deelnemers_id` int(11) NOT NULL,
  `taak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deelnemers_per_taak`
--

INSERT INTO `deelnemers_per_taak` (`deelnemers_id`, `taak_id`) VALUES
(2, 6),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 18),
(2, 19),
(2, 21),
(2, 22),
(3, 10),
(3, 11),
(3, 12),
(3, 14),
(3, 15),
(3, 19),
(3, 20),
(3, 22),
(5, 12),
(5, 13),
(5, 15),
(5, 19),
(7, 17);

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
  `status` char(10) DEFAULT 'open',
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`project_id`, `naam`, `omschrijving`, `type`, `datum_start`, `datum_eind`, `status`, `CreatedOn`) VALUES
(3, 'Fundraising', 'Wo mek moni', 1, '2020-02-20', '2020-02-29', 'open', '2020-03-24 21:27:03'),
(4, 'Valentines Day', 'XOXOX', 1, '2020-02-20', '2020-02-26', 'open', '2020-03-10 21:27:03'),
(5, 'new year', 'idk', 1, '2020-02-25', '2020-02-27', 'open', '2020-03-14 21:27:03'),
(6, 'Erf Schoonmaken', 'maak skoon', 0, '2020-02-12', '2020-02-24', 'open', '2020-03-05 21:27:03'),
(9, 'test project', 'test', 0, '2020-02-12', '2020-02-02', 'closed', '2020-03-05 21:27:03'),
(11, 'Cookout', 'eten koken', 0, '2020-02-19', '2020-02-28', 'open', '2020-03-24 21:27:03'),
(12, 'test project 2', 'tjieng tori', 0, '2020-02-25', '2020-02-27', 'open', '2020-03-05 21:27:03'),
(13, 'test project 2', 'ss', 0, '2020-02-25', '2020-02-26', 'open', '2020-03-11 21:27:03'),
(14, 'New Project', 'Some project', 1, '2020-03-26', '2020-03-30', 'open', '2020-03-02 03:23:47'),
(15, 'fff', 'fff', 0, '2020-03-19', '2020-03-28', 'open', '2020-03-06 18:13:28');

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
(3, 3, 3, 'Tent Opzetten', 'iem set a tenti \r\njwz!', NULL, NULL),
(4, 9, 3, 'test', 'test', NULL, NULL),
(5, 9, 3, 'test2', 'test2', NULL, NULL),
(6, 9, 3, 'test3', 'test3', NULL, NULL),
(7, 9, 3, 'test3', 'test3', NULL, NULL),
(8, 9, 3, 'test3', 'test3', NULL, NULL),
(9, 9, 3, 'test4', 'test4', NULL, NULL),
(10, 9, 3, 'test5', 'test4', NULL, NULL),
(11, 9, 3, 'test final', 'test4', NULL, NULL),
(12, 13, 3, 'Een nieuwe taak', 'idk lol ', NULL, NULL),
(13, 5, 4, 'Vuurwerk Kopen', 'ratatata', 2, 4000),
(14, 11, 3, 'Spaghetti Koken', '5000 gram spaghetti koken', NULL, NULL),
(15, 14, 3, 'New taak', 'gang shhhh', NULL, NULL),
(17, 12, 3, 'trololol', 'memeLORD', NULL, NULL),
(18, 12, 3, 'T’Challa', 'Wakanda Forever', NULL, NULL),
(19, 13, 3, 'sdasd', 'asdas', NULL, NULL),
(20, 12, 3, 'ss', 'ss', NULL, NULL),
(21, 14, 4, 'kiwi', 'fruit', 1, 0),
(22, 14, 3, 'pineapple', 'fruit', NULL, NULL);

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
(4, 1, 'test', '$2y$10$MB/OndXLco1k8AAS60CW9OqSSsIvgu68.XgLBpPxBqrmckioc9BtW'),
(5, 2, 'test0', '$2y$10$BmJwJWjba7pluzATPoXgu.0j9CIeXJ4Dn1zQ4WzwLhFwijDAGCC6m'),
(6, 0, 'test1', '$2y$10$6j6lOYog8yml5u2/hvCEC.BwubnkQT6NQRtrmKDRQ7IFS/62gA.R6'),
(7, 0, 'Mayra Tdlorehg', '$2y$10$oEqEbMhfDrk/O9vKEIY9VOzDsFlzOcTUuLywIShn193oG2.kOMLuG'),
(8, 2, 'Sardha Raghosing', '$2y$10$oEqEbMhfDrk/O9vKEIY9VOzDsFlzOcTUuLywIShn193oG2.kOMLuG'),
(9, 1, 'Sabrina Starke', '$2y$10$/eMY3lZDniTPqkflgTLcj.xMm/aQA/JZXKB.0PYxh/64geHLLmhc6'),
(10, 0, 'Joel Naarendorp', '$2y$10$oEqEbMhfDrk/O9vKEIY9VOzDsFlzOcTUuLywIShn193oG2.kOMLuG'),
(11, 0, 'test', '$2y$10$oEqEbMhfDrk/O9vKEIY9VOzDsFlzOcTUuLywIShn193oG2.kOMLuG');

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
(0, 'beheerder'),
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
  MODIFY `deelnemers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deelnemers_type`
--
ALTER TABLE `deelnemers_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projecten`
--
ALTER TABLE `projecten`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `taak_type`
--
ALTER TABLE `taak_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taken`
--
ALTER TABLE `taken`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
