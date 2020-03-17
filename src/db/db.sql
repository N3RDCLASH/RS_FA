-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 05:59 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.7
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  AUTOCOMMIT = 0;
START TRANSACTION;
SET
  time_zone = "+00:00";
  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;
--
  -- Database: `rs_test`
  --
  -- --------------------------------------------------------
  --
  -- Table structure for table `betrokkenen`
  --
  CREATE TABLE `betrokkenen` (
    `betrokkenen_id` int(11) NOT NULL,
    `betrokkenen_type` int(11) DEFAULT NULL,
    `betrokkenen_naam` char(1) DEFAULT NULL,
    `betrokkenen_email` text DEFAULT NULL,
    `betrokkenen_adres` text DEFAULT NULL,
    `betrokkenen_telefoonnummer` text DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
  --
  -- Table structure for table `betrokkenen_type`
  --
  CREATE TABLE `betrokkenen_type` (
    `type_id` int(255) NOT NULL,
    `type_name` int(10) DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
  --
  -- Table structure for table `finale_besteding`
  --
  CREATE TABLE `finale_besteding` (
    `besteding_id` int(11) NOT NULL,
    `project_id` int(11) NOT NULL,
    `naam` char(50) DEFAULT NULL,
    `omschrijving` text DEFAULT NULL,
    `aantal` int(11) DEFAULT NULL,
    `prijs` int(11) DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
  --
  -- Table structure for table `geschatte_besteding`
  --
  CREATE TABLE `geschatte_besteding` (
    `besteding_id` int(11) NOT NULL,
    `project_id` int(11) NOT NULL,
    `naam` char(50) DEFAULT NULL,
    `omschrijving` text DEFAULT NULL,
    `aantal` int(11) DEFAULT NULL,
    `prijs` int(11) DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
  --
  -- Table structure for table `kwitantie`
  --
  CREATE TABLE `kwitantie` (
    `kwitantie_id` int(11) NOT NULL,
    `project_id` int(11) NOT NULL,
    `kwitantie_titel` char(1) DEFAULT NULL,
    `kwitantie_omschrijving` text DEFAULT NULL,
    `kwitantie_prijs` int(11) DEFAULT NULL,
    `kwitantie_file` blob DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
  --
  -- Table structure for table `projecten`
  --
  CREATE TABLE `projecten` (
    `project_id` int(11) NOT NULL,
    `naam` char(40) DEFAULT NULL,
    `omschrijving` text DEFAULT NULL,
    `type` char(10) DEFAULT NULL,
    `datum_start` date DEFAULT NULL,
    `datum_eind` date DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
-- --------------------------------------------------------
  --
  -- Table structure for table `user`
  --
  CREATE TABLE `user` (
    `user_id` int(11) NOT NULL,
    `user_type` int(10) NOT NULL,
    `user_name` char(10) NOT NULL,
    `user_password` char(64) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
  -- Dumping data for table `user`
  --
INSERT INTO `user` (
    `user_id`,
    `user_type`,
    `user_name`,
    `user_password`
  )
VALUES
  (
    4,
    2,
    'test',
    '$2y$10$aaTZmQu/QQ3XPQC9o9IMk.U77klzj42FEeA7QhPjJM4o/RFoN3zVW'
  );
-- --------------------------------------------------------
  --
  -- Table structure for table `user_type`
  --
  CREATE TABLE `user_type` (
    `type_id` int(255) NOT NULL,
    `type_name` char(20) DEFAULT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--
  -- Dumping data for table `user_type`
  --
INSERT INTO `user_type` (`type_id`, `type_name`)
VALUES
  (0, 'overal_user'),
  (1, 'administratie'),
  (2, 'finance');
--
  -- Indexes for dumped tables
  --
  --
  -- Indexes for table `betrokkenen`
  --
ALTER TABLE `betrokkenen`
ADD
  PRIMARY KEY (`betrokkenen_id`),
ADD
  KEY `betrokkenen_type` (`betrokkenen_type`);
--
  -- Indexes for table `betrokkenen_type`
  --
ALTER TABLE `betrokkenen_type`
ADD
  PRIMARY KEY (`type_id`);
--
  -- Indexes for table `finale_besteding`
  --
ALTER TABLE `finale_besteding`
ADD
  PRIMARY KEY (`besteding_id`, `project_id`),
ADD
  KEY `project_id` (`project_id`);
--
  -- Indexes for table `geschatte_besteding`
  --
ALTER TABLE `geschatte_besteding`
ADD
  PRIMARY KEY (`besteding_id`, `project_id`),
ADD
  KEY `project_id` (`project_id`);
--
  -- Indexes for table `kwitantie`
  --
ALTER TABLE `kwitantie`
ADD
  PRIMARY KEY (`kwitantie_id`, `project_id`),
ADD
  KEY `project_id` (`project_id`);
--
  -- Indexes for table `projecten`
  --
ALTER TABLE `projecten`
ADD
  PRIMARY KEY (`project_id`);
--
  -- Indexes for table `user`
  --
ALTER TABLE `user`
ADD
  PRIMARY KEY (`user_id`),
ADD
  KEY `user_type` (`user_type`);
--
  -- Indexes for table `user_type`
  --
ALTER TABLE `user_type`
ADD
  PRIMARY KEY (`type_id`);
--
  -- AUTO_INCREMENT for dumped tables
  --
  --
  -- AUTO_INCREMENT for table `betrokkenen`
  --
ALTER TABLE `betrokkenen`
MODIFY
  `betrokkenen_id` int(11) NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `finale_besteding`
  --
ALTER TABLE `finale_besteding`
MODIFY
  `besteding_id` int(11) NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `geschatte_besteding`
  --
ALTER TABLE `geschatte_besteding`
MODIFY
  `besteding_id` int(11) NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `projecten`
  --
ALTER TABLE `projecten`
MODIFY
  `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
  -- AUTO_INCREMENT for table `user`
  --
ALTER TABLE `user`
MODIFY
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
  -- Constraints for dumped tables
  --
  --
  -- Constraints for table `betrokkenen`
  --
ALTER TABLE `betrokkenen`
ADD
  CONSTRAINT `betrokkenen_ibfk_1` FOREIGN KEY (`betrokkenen_type`) REFERENCES `betrokkenen_type` (`type_id`);
--
  -- Constraints for table `finale_besteding`
  --
ALTER TABLE `finale_besteding`
ADD
  CONSTRAINT `finale_besteding_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);
--
  -- Constraints for table `geschatte_besteding`
  --
ALTER TABLE `geschatte_besteding`
ADD
  CONSTRAINT `geschatte_besteding_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);
--
  -- Constraints for table `kwitantie`
  --
ALTER TABLE `kwitantie`
ADD
  CONSTRAINT `kwitantie_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);
--
  -- Constraints for table `user`
  --
ALTER TABLE `user`
ADD
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`type_id`);
COMMIT;
  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;