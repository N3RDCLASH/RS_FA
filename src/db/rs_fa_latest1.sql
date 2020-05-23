-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 mei 2020 om 17:31
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Tabelstructuur voor tabel `bestedingen`
--

CREATE TABLE `bestedingen` (
  `besteding_id` int(11) NOT NULL,
  `taak_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemers`
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
-- Gegevens worden geëxporteerd voor tabel `deelnemers`
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
-- Tabelstructuur voor tabel `deelnemers_per_taak`
--

CREATE TABLE `deelnemers_per_taak` (
  `deelnemers_id` int(11) NOT NULL,
  `taak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `deelnemers_per_taak`
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
(4, 31),
(4, 33),
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
(7, 17),
(7, 31);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `deelnemers_type`
--

CREATE TABLE `deelnemers_type` (
  `type_id` int(255) NOT NULL,
  `type_naam` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `deelnemers_type`
--

INSERT INTO `deelnemers_type` (`type_id`, `type_naam`) VALUES
(4, 'student'),
(5, 'docent'),
(6, 'overige');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kwitantie`
--

CREATE TABLE `kwitantie` (
  `kwitantie_id` int(11) NOT NULL,
  `bestedingen_id` int(11) NOT NULL,
  `kwitantie_titel` char(1) DEFAULT NULL,
  `kwitantie_omschrijving` text DEFAULT NULL,
  `kwitantie_prijs` int(11) DEFAULT NULL,
  `kwitantie_file` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
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
-- Gegevens worden geëxporteerd voor tabel `projecten`
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
(19, 'zoom', 'flash', 1, NULL, '2020-05-21', '2020-05-30', 'open', '2020-05-21 00:23:51');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project_type`
--

CREATE TABLE `project_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `project_type`
--

INSERT INTO `project_type` (`type_id`, `type_name`) VALUES
(0, 'evenement'),
(1, 'werkzaamheid');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `richting`
--

CREATE TABLE `richting` (
  `richting_id` int(11) NOT NULL,
  `richting_naam` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taak_type`
--

CREATE TABLE `taak_type` (
  `type_id` int(255) NOT NULL,
  `type_naam` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `taak_type`
--

INSERT INTO `taak_type` (`type_id`, `type_naam`) VALUES
(3, 'uitvoering'),
(4, 'uitgave');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `taken`
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
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `taken`
--

INSERT INTO `taken` (`taak_id`, `project_id`, `naam`, `omschrijving`, `aantal`, `geschatteprijs`, `datum_start`, `datum_eind`, `type_id`) VALUES
(1, 3, 'Cupcakes Kopen', 'iem bai de san toh owru mang', 10, 200, NULL, NULL, NULL),
(2, 4, 'Kaarten schrijven', 'iem skrief den karta ', NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Tent Opzetten', 'iem set a tenti \r\njwz!', NULL, NULL, NULL, NULL, NULL),
(4, 9, 'test', 'test', NULL, NULL, NULL, NULL, NULL),
(5, 9, 'test2', 'test2', NULL, NULL, NULL, NULL, NULL),
(6, 9, 'test3', 'test3', NULL, NULL, NULL, NULL, NULL),
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
(19, 13, 'sdasd', 'asdas', NULL, NULL, NULL, NULL, NULL),
(20, 12, 'ss', 'ss', NULL, NULL, NULL, NULL, NULL),
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
(34, 18, 'Uitschrijven implementatie plan', 'Het uitschrijven van de stappen die ondernomen moeten worden', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` int(10) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
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
-- Tabelstructuur voor tabel `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(255) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`) VALUES
(0, 'beheerder'),
(1, 'administratie'),
(2, 'financiele administratie');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestedingen`
--
ALTER TABLE `bestedingen`
  ADD PRIMARY KEY (`besteding_id`),
  ADD KEY `taak_id` (`taak_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexen voor tabel `deelnemers`
--
ALTER TABLE `deelnemers`
  ADD PRIMARY KEY (`deelnemers_id`),
  ADD KEY `deelnemers_type` (`deelnemers_type`),
  ADD KEY `richitng_id` (`richting_id`);

--
-- Indexen voor tabel `deelnemers_per_taak`
--
ALTER TABLE `deelnemers_per_taak`
  ADD PRIMARY KEY (`deelnemers_id`,`taak_id`),
  ADD KEY `taak_id` (`taak_id`);

--
-- Indexen voor tabel `deelnemers_type`
--
ALTER TABLE `deelnemers_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexen voor tabel `kwitantie`
--
ALTER TABLE `kwitantie`
  ADD PRIMARY KEY (`kwitantie_id`,`bestedingen_id`),
  ADD KEY `taak_id` (`bestedingen_id`);

--
-- Indexen voor tabel `projecten`
--
ALTER TABLE `projecten`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `type` (`type`),
  ADD KEY `richting_id` (`richting_id`);

--
-- Indexen voor tabel `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexen voor tabel `richting`
--
ALTER TABLE `richting`
  ADD PRIMARY KEY (`richting_id`);

--
-- Indexen voor tabel `taak_type`
--
ALTER TABLE `taak_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexen voor tabel `taken`
--
ALTER TABLE `taken`
  ADD PRIMARY KEY (`taak_id`,`project_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexen voor tabel `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `deelnemers`
--
ALTER TABLE `deelnemers`
  MODIFY `deelnemers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `deelnemers_type`
--
ALTER TABLE `deelnemers_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `projecten`
--
ALTER TABLE `projecten`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `richting`
--
ALTER TABLE `richting`
  MODIFY `richting_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `taak_type`
--
ALTER TABLE `taak_type`
  MODIFY `type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `taken`
--
ALTER TABLE `taken`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `bestedingen`
--
ALTER TABLE `bestedingen`
  ADD CONSTRAINT `taak_id` FOREIGN KEY (`taak_id`) REFERENCES `taken` (`taak_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `taak_type` (`type_id`);

--
-- Beperkingen voor tabel `deelnemers`
--
ALTER TABLE `deelnemers`
  ADD CONSTRAINT `deelnemers_ibfk_1` FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`),
  ADD CONSTRAINT `deelnemers_ibfk_2` FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`),
  ADD CONSTRAINT `deelnemers_ibfk_3` FOREIGN KEY (`richting_id`) REFERENCES `richting` (`richting_id`);

--
-- Beperkingen voor tabel `deelnemers_per_taak`
--
ALTER TABLE `deelnemers_per_taak`
  ADD CONSTRAINT `deelnemers_per_taak_ibfk_1` FOREIGN KEY (`deelnemers_id`) REFERENCES `deelnemers` (`deelnemers_id`),
  ADD CONSTRAINT `deelnemers_per_taak_ibfk_2` FOREIGN KEY (`taak_id`) REFERENCES `taken` (`taak_id`);

--
-- Beperkingen voor tabel `kwitantie`
--
ALTER TABLE `kwitantie`
  ADD CONSTRAINT `kwitantie_ibfk_1` FOREIGN KEY (`bestedingen_id`) REFERENCES `bestedingen` (`besteding_id`);

--
-- Beperkingen voor tabel `projecten`
--
ALTER TABLE `projecten`
  ADD CONSTRAINT `projecten_ibfk_1` FOREIGN KEY (`type`) REFERENCES `project_type` (`type_id`),
  ADD CONSTRAINT `projecten_ibfk_2` FOREIGN KEY (`type`) REFERENCES `project_type` (`type_id`),
  ADD CONSTRAINT `projecten_ibfk_3` FOREIGN KEY (`richting_id`) REFERENCES `richting` (`richting_id`);

--
-- Beperkingen voor tabel `taken`
--
ALTER TABLE `taken`
  ADD CONSTRAINT `taken_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`),
  ADD CONSTRAINT `taken_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `taak_type` (`type_id`);

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
