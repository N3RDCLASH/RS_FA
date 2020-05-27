-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 08:46 PM
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
-- Database: `rs_fa_latest1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestedingen`
--

CREATE TABLE `bestedingen` (
  `besteding_id` int(11) NOT NULL,
  `taak_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `naam` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `prijs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bestedingen`
--

INSERT INTO `bestedingen` (`besteding_id`, `taak_id`, `type_id`, `naam`, `type`, `aantal`, `prijs`) VALUES
(2, 33, 0, 'dfdf', 3, 1, 344),
(3, 33, 0, 'sfsd', 3, 23, 333),
(4, 33, 0, 'wdwd', 3, 4, 12),
(5, 24, 0, 'fdf', 3, 12, 12),
(6, 24, 0, 'vhp', 3, 34, 55),
(7, 24, 0, 'vhp', 3, 34, 55),
(8, 24, 0, 'vhp', 3, 34, 55),
(9, 24, 0, 'vhp', 3, 34, 55),
(10, 24, 0, 'vhp', 3, 34, 55),
(11, 24, 0, 'gewe', 4, 34, 555),
(12, 19, 0, 'fgdfdf', 3, 445, 5454),
(14, 19, 0, 'sfdfdf', 3, 12, 2333),
(15, 33, 0, 'dgete', 3, 232, 123232),
(17, 19, 0, 'sfsd', 4, 12, 333),
(18, 19, 0, 'owgeueobgegb`', 3, 234, 45454);

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
  `richting_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deelnemers`
--

INSERT INTO `deelnemers` (`deelnemers_id`, `deelnemers_type`, `deelnemers_naam`, `deelnemers_email`, `deelnemers_adres`, `deelnemers_telefoonnummer`, `richting_id`) VALUES
(2, 4, 'Joel Naarendorp', 'joel.naarendorp.natin@gmail.com', 'indiraghandiweg 250', '8921797', NULL),
(3, 4, 'Sabrina Starke', 'sabrina.starke.natin@gmail.com', 'indiraghandiweg 35', '8875695', NULL),
(4, 4, 'qwewq', 'wqweqwe@gmqil.com', 'sdas', '456', NULL),
(5, 4, 'suraj', 'sur@kkkl', 'kkdk', '272738', NULL),
(7, 5, 'Sardha Raghosingh', 's.raghosing.natin@gmail.com', 'indiraghandiweg 398', '8923456', NULL),
(8, 5, 'Irwin Noordwijk', 'Irwin.Noorwijk.natin@gmail.com', 'vergeetmijnietstraat 13', '8923353', NULL);

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
(2, 24),
(2, 31),
(3, 10),
(3, 11),
(3, 12),
(3, 14),
(3, 15),
(3, 19),
(3, 20),
(3, 22),
(3, 23),
(3, 24),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(4, 31),
(4, 33),
(4, 35),
(4, 36),
(5, 12),
(5, 13),
(5, 15),
(5, 19),
(5, 23),
(5, 24),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(7, 17),
(7, 31),
(7, 37),
(8, 37);

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
  `besteding_id` int(11) NOT NULL,
  `kwitantie_titel` char(100) DEFAULT NULL,
  `kwitantie_omschrijving` text DEFAULT NULL,
  `kwitantie_prijs` int(11) DEFAULT NULL,
  `kwitantie_file` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kwitantie`
--

INSERT INTO `kwitantie` (`kwitantie_id`, `besteding_id`, `kwitantie_titel`, `kwitantie_omschrijving`, `kwitantie_prijs`, `kwitantie_file`) VALUES
(6, 14, 'sfdfdf', NULL, 2333, 'https://firebasestorage.googleapis.com/v0/b/rs-fa-1eb3d.appspot.com/o/IMG_0065.jpg?alt=media&token=53abd98d-0cb0-46b3-b1d5-b7ee1a680d8f'),
(7, 15, 'dgete', NULL, 123232, 'https://firebasestorage.googleapis.com/v0/b/rs-fa-1eb3d.appspot.com/o/WhatsApp%20Image%202019-07-18%20at%2010.14.07%20PM.jpeg?alt=media&token=4bca38b8-ff4d-4fed-bf8b-a9a355c79bcc'),
(8, 17, 'sfsd', NULL, 333, 'https://firebasestorage.googleapis.com/v0/b/rs-fa-1eb3d.appspot.com/o/x.png?alt=media&token=812dfad9-15e6-4378-9813-cbba91fbed1e'),
(9, 18, 'owgeueobgegb`', NULL, 45454, 'https://firebasestorage.googleapis.com/v0/b/rs-fa-1eb3d.appspot.com/o/WhatsApp%20Image%202019-07-18%20at%2010.14.07%20PM.jpeg?alt=media&token=89b1dbc9-4749-4604-8b5e-20f27eafa9b7');

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

CREATE TABLE `projecten` (
  `project_id` int(11) NOT NULL,
  `naam` char(40) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `richting_id` int(11) DEFAULT NULL,
  `datum_start` date DEFAULT NULL,
  `datum_eind` date DEFAULT NULL,
  `status` char(10) DEFAULT 'open',
  `CreatedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`project_id`, `naam`, `omschrijving`, `type`, `richting_id`, `datum_start`, `datum_eind`, `status`, `CreatedOn`) VALUES
(3, 'Fundraising', 'Wo mek moni', 1, NULL, '2020-02-20', '2020-02-29', 'open', '2020-03-24 21:27:03'),
(4, 'Valentines Day', 'XOXOX', 0, NULL, '2020-02-20', '2020-02-26', 'open', '2020-03-10 21:27:03'),
(5, 'new year', 'idk', 1, NULL, '2020-02-25', '2020-02-27', 'open', '2020-03-14 21:27:03'),
(6, 'Erf Schoonmaken', 'maak skoon mi boi ', 1, NULL, '2020-02-12', '2020-02-24', 'open', '2020-03-05 21:27:03'),
(9, 'test project', 'test', 0, NULL, '2020-02-12', '2020-02-02', 'closed', '2020-03-05 21:27:03'),
(11, 'Cookout', 'eten koken', 0, NULL, '2020-02-19', '2020-02-28', 'open', '2020-03-24 21:27:03'),
(12, 'test project 2', 'tjieng tori', 0, NULL, '2020-02-25', '2020-02-27', 'open', '2020-03-05 21:27:03'),
(13, 'test project 2', 'ss', 0, NULL, '2020-02-25', '2020-02-26', 'open', '2020-03-11 21:27:03'),
(14, 'New Project', 'Some project', 1, NULL, '2020-03-26', '2020-03-30', 'open', '2020-03-02 03:23:47'),
(15, 'fff', 'fff', 0, NULL, '2020-03-19', '2020-03-28', 'open', '2020-03-06 18:13:28'),
(16, 'Marktonderzoek Enterprise Architecture', 'De EA Onderzoeken', 1, NULL, '2020-05-14', '2020-05-31', 'open', '2020-05-14 02:21:10'),
(17, 'Opzetten Online School', 'Het opzetten van een online school', 1, NULL, '2020-05-15', '2020-06-07', 'open', '2020-05-14 02:25:03'),
(18, 'Uitbreiden Infrastructuur', 'Het uitbreiden van de ict infrastructuur ', 1, NULL, '2020-05-20', '2020-06-11', 'open', '2020-05-14 03:14:48'),
(19, 'zoom', 'flash', 1, NULL, '2020-05-21', '2020-05-30', 'open', '2020-05-21 00:23:51'),
(20, 'zoom', '1234', 1, NULL, '2020-05-25', '2020-05-29', 'open', '2020-05-21 20:35:32'),
(21, 'dfg', 'hjk', 1, NULL, '2020-05-26', '2020-05-30', 'open', '2020-05-21 22:07:58'),
(22, 'qwrr123', '567', 1, NULL, '2020-05-25', '2020-05-28', 'open', '2020-05-22 00:26:00'),
(23, 'kl', 'klm', 1, NULL, '2020-05-27', '2020-05-31', 'open', '2020-05-22 12:43:33');

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
-- Table structure for table `richting`
--

CREATE TABLE `richting` (
  `richting_id` int(11) NOT NULL,
  `richting_naam` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `naam` char(50) DEFAULT NULL,
  `omschrijving` text DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL,
  `geschatteprijs` int(11) DEFAULT NULL,
  `datum_start` date DEFAULT NULL,
  `datum_eind` date DEFAULT NULL,
  `taak_type` int(11) DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taken`
--

INSERT INTO `taken` (`taak_id`, `project_id`, `naam`, `omschrijving`, `aantal`, `geschatteprijs`, `datum_start`, `datum_eind`, `taak_type`) VALUES
(1, 3, 'Cupcakes Kopen', 'iem bai de san toh owru mang', 10, 200, NULL, NULL, 4),
(2, 4, 'Kaarten schrijven', 'iem skrief den karta ', NULL, NULL, NULL, NULL, 3),
(3, 3, 'Tent Opzetten', 'iem set a tenti \r\njwz!', NULL, 5622, NULL, NULL, 4),
(4, 9, 'test', 'test', NULL, NULL, NULL, NULL, 3),
(5, 9, 'test2', 'test2', NULL, NULL, NULL, NULL, NULL),
(6, 9, 'test3', 'test3', NULL, 500, NULL, NULL, 3),
(7, 9, 'test3', 'test3', NULL, NULL, NULL, NULL, NULL),
(8, 9, 'test3', 'test3', NULL, NULL, NULL, NULL, NULL),
(9, 9, 'test4', 'test4', NULL, NULL, NULL, NULL, NULL),
(10, 9, 'test5', 'test4', NULL, NULL, NULL, NULL, NULL),
(11, 9, 'test final', 'test4', NULL, NULL, NULL, NULL, NULL),
(12, 13, 'Een nieuwe taak', 'idk lol ', NULL, NULL, NULL, NULL, NULL),
(13, 5, 'Vuurwerk Kopen', 'ratatata', 2, 4000, NULL, NULL, NULL),
(14, 11, 'Spaghetti Koken', '5000 gram spaghetti koken', NULL, NULL, NULL, NULL, NULL),
(15, 14, 'New taak', 'gang shhhh', NULL, NULL, NULL, NULL, NULL),
(17, 12, 'trololol', 'memeLORD', NULL, NULL, NULL, NULL, NULL),
(18, 12, 'T’Challa', 'Wakanda Forever', NULL, NULL, NULL, NULL, NULL),
(19, 13, 'sdasd', 'asdas', NULL, 500, NULL, NULL, 3),
(20, 12, 'ss', 'ss', NULL, 2000, NULL, NULL, NULL),
(21, 14, 'kiwi', 'fruit', 1, 0, NULL, NULL, NULL),
(22, 14, 'pineapple', 'fruit', NULL, NULL, NULL, NULL, NULL),
(23, 6, 'Hark Kopen', 'xd', 4, 40, NULL, NULL, NULL),
(24, 11, 'houfhpsiof', 'KNEDPGSDOPGN', NULL, NULL, NULL, NULL, NULL),
(25, 12, 'manana', 'ssdads', NULL, NULL, NULL, NULL, NULL),
(26, 3, 'dfgere', 'tetetet ', NULL, NULL, NULL, NULL, NULL),
(27, 3, 'dfdf', 'dfsdf', NULL, NULL, NULL, NULL, NULL),
(28, 3, 'dasdasfd', 'dfgasdfd', NULL, NULL, NULL, NULL, NULL),
(29, 3, 'dasdasfddf32', 'dfgasdfd32', NULL, NULL, NULL, NULL, NULL),
(30, 3, 'ShivX', 'dfgasdfd32PR()N', NULL, NULL, NULL, NULL, NULL),
(31, 3, 'houfhpsiof', 'wewe', 0, 0, NULL, NULL, NULL),
(32, 17, 'Marktonderzoek doen', 'Onderzoeken mbv van een SWOT-analyse', NULL, NULL, NULL, NULL, NULL),
(33, 15, 'degpg-gj', 'sdsad', NULL, NULL, NULL, NULL, NULL),
(34, 18, 'Uitschrijven implementatie plan', 'Het uitschrijven van de stappen die ondernomen moeten worden', NULL, NULL, NULL, NULL, NULL),
(35, 3, 'dhfiwjfjk', 'hjgjeg;jl', 0, 0, NULL, NULL, 3),
(36, 3, 'houfhpsiofougogo[ih', 'nipo[', 0, 0, NULL, NULL, 3),
(37, 19, 'ggr', 'grsrrg', 0, 0, NULL, NULL, 3);

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
(11, 0, 'test', '$2y$10$oEqEbMhfDrk/O9vKEIY9VOzDsFlzOcTUuLywIShn193oG2.kOMLuG'),
(12, 1, 'Administrator', '$2y$10$P7UBbz2YCAmPRjMce3oGfeIST29u1hWraJhvwXFud7ImgRlEhTzce');

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
-- Indexes for table `bestedingen`
--
ALTER TABLE `bestedingen`
  ADD PRIMARY KEY (`besteding_id`),
  ADD KEY `taak_id` (`taak_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `deelnemers`
--
ALTER TABLE `deelnemers`
  ADD PRIMARY KEY (`deelnemers_id`),
  ADD KEY `deelnemers_type` (`deelnemers_type`),
  ADD KEY `richitng_id` (`richting_id`);

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
  ADD PRIMARY KEY (`kwitantie_id`,`besteding_id`),
  ADD KEY `taak_id` (`besteding_id`);

--
-- Indexes for table `projecten`
--
ALTER TABLE `projecten`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `type` (`type`),
  ADD KEY `richting_id` (`richting_id`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `richting`
--
ALTER TABLE `richting`
  ADD PRIMARY KEY (`richting_id`);

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
-- AUTO_INCREMENT for table `bestedingen`
--
ALTER TABLE `bestedingen`
  MODIFY `besteding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `deelnemers`
--
ALTER TABLE `deelnemers`
  MODIFY `deelnemers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deelnemers_type`
--
ALTER TABLE `deelnemers_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kwitantie`
--
ALTER TABLE `kwitantie`
  MODIFY `kwitantie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projecten`
--
ALTER TABLE `projecten`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `richting`
--
ALTER TABLE `richting`
  MODIFY `richting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taak_type`
--
ALTER TABLE `taak_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taken`
--
ALTER TABLE `taken`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestedingen`
--
ALTER TABLE `bestedingen`
  ADD CONSTRAINT `taak_id` FOREIGN KEY (`taak_id`) REFERENCES `taken` (`taak_id`);

--
-- Constraints for table `deelnemers`
--
ALTER TABLE `deelnemers`
  ADD CONSTRAINT `deelnemers_ibfk_1` FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`),
  ADD CONSTRAINT `deelnemers_ibfk_2` FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`),
  ADD CONSTRAINT `deelnemers_ibfk_3` FOREIGN KEY (`richting_id`) REFERENCES `richting` (`richting_id`);

--
-- Constraints for table `deelnemers_per_taak`
--
ALTER TABLE `deelnemers_per_taak`
  ADD CONSTRAINT `deelnemers_per_taak_ibfk_1` FOREIGN KEY (`deelnemers_id`) REFERENCES `deelnemers` (`deelnemers_id`),
  ADD CONSTRAINT `deelnemers_per_taak_ibfk_2` FOREIGN KEY (`taak_id`) REFERENCES `taken` (`taak_id`);

--
-- Constraints for table `projecten`
--
ALTER TABLE `projecten`
  ADD CONSTRAINT `projecten_ibfk_1` FOREIGN KEY (`type`) REFERENCES `project_type` (`type_id`),
  ADD CONSTRAINT `projecten_ibfk_2` FOREIGN KEY (`type`) REFERENCES `project_type` (`type_id`),
  ADD CONSTRAINT `projecten_ibfk_3` FOREIGN KEY (`richting_id`) REFERENCES `richting` (`richting_id`);

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
