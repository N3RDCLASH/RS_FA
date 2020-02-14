CREATE TABLE `user` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `user_type` int(10) NOT NULL,
  `user_name` char(10) NOT NULL,
  `user_password` char
);

CREATE TABLE `user_type` (
  `type_id` int(255) PRIMARY KEY NOT NULL,
  `type_name` int(10)
);

CREATE TABLE `projecten` (
  `project_id` int PRIMARY KEY AUTO_INCREMENT,
  `naam` char(40),
  `omschrijving` text,
  `type` char(10),
  `datum_start` date,
  `datum_eind` date,
  `status` char
);

CREATE TABLE `geschatte_besteding` (
  `besteding_id` int AUTO_INCREMENT,
  `project_id` int,
  `naam` char(50),
  `omschrijving` text,
  `aantal` int,
  `prijs` int,
  PRIMARY KEY (`besteding_id`, `project_id`)
);

CREATE TABLE `finale_besteding` (
  `besteding_id` int AUTO_INCREMENT,
  `project_id` int,
  `naam` char(50),
  `omschrijving` text,
  `aantal` int,
  `prijs` int,
  PRIMARY KEY (`besteding_id`, `project_id`)
);

CREATE TABLE `deelnemers` (
  `deelnemers_id` int PRIMARY KEY AUTO_INCREMENT,
  `deelnemers_type` int,
  `deelnemers_naam` char,
  `deelnemers_email` text,
  `deelnemers_adres` text,
  `deelnemers_telefoonnummer` text
);

CREATE TABLE `deelnemers_type` (
  `type_id` int(255) PRIMARY KEY NOT NULL,
  `type_name` int(10)
);

CREATE TABLE `deelnemers_per_project` (
  `deelnemers_id` int,
  `project_id` int,
  PRIMARY KEY (`deelnemers_id`, `project_id`)
);

CREATE TABLE `kwitantie` (
  `kwitantie_id` int NOT NULL,
  `project_id` int,
  `kwitantie_titel` char,
  `kwitantie_omschrijving` text,
  `kwitantie_prijs` int,
  `kwitantie_file` blob,
  PRIMARY KEY (`kwitantie_id`, `project_id`)
);

CREATE TABLE `taken` (
  `taak_id` int AUTO_INCREMENT,
  `project_id` int,
  PRIMARY KEY (`taak_id`, `project_id`)
);

ALTER TABLE `deelnemers_per_project` ADD FOREIGN KEY (`deelnemers_id`) REFERENCES `deelnemers` (`deelnemers_id`);

ALTER TABLE `deelnemers_per_project` ADD FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);

ALTER TABLE `taken` ADD FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);

ALTER TABLE `kwitantie` ADD FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);

ALTER TABLE `geschatte_besteding` ADD FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);

ALTER TABLE `finale_besteding` ADD FOREIGN KEY (`project_id`) REFERENCES `projecten` (`project_id`);

ALTER TABLE `user` ADD FOREIGN KEY (`user_type`) REFERENCES `user_type` (`type_id`);

ALTER TABLE `deelnemers` ADD FOREIGN KEY (`deelnemers_type`) REFERENCES `deelnemers_type` (`type_id`);
