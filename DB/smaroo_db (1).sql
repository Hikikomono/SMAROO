-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Mai 2020 um 18:36
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `smaroo_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `humidity`
--

CREATE TABLE `humidity` (
  `data` float NOT NULL,
  `date` datetime NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `humidity`
--

INSERT INTO `humidity` (`data`, `date`, `ID`) VALUES
(0.7, '2020-02-01 23:00:00', 1),
(0.72, '2020-02-02 23:00:00', 2),
(0.71, '2020-02-03 23:00:00', 3),
(0.64, '2020-02-04 23:00:00', 4),
(0.61, '2020-02-05 23:00:00', 5),
(0.7, '2020-02-06 23:00:00', 6),
(0.76, '2020-02-07 23:00:00', 7),
(0.76, '2020-02-08 23:00:00', 8),
(0.64, '2020-02-09 23:00:00', 9),
(0.65, '2020-02-10 23:00:00', 10),
(0.64, '2020-02-11 23:00:00', 11),
(0.67, '2020-02-12 23:00:00', 12),
(0.71, '2020-02-13 23:00:00', 13),
(0.7, '2020-02-14 23:00:00', 14),
(0.69, '2020-02-15 23:00:00', 15),
(0.75, '2020-02-16 23:00:00', 16),
(0.63, '2020-02-17 23:00:00', 17),
(0.63, '2020-02-18 23:00:00', 18),
(0.45, '2020-04-01 22:00:00', 19),
(0.5, '2020-04-02 22:00:00', 20),
(0.55, '2020-04-03 22:00:00', 21),
(0.45, '2020-04-04 22:00:00', 22),
(0.44, '2020-04-05 22:00:00', 23),
(0.23, '2020-04-06 22:00:00', 24),
(0.26, '2020-04-07 22:00:00', 25),
(0.33, '2020-04-08 22:00:00', 26),
(0.5, '2020-04-09 22:00:00', 27),
(0.45, '2020-04-10 22:00:00', 28),
(0.48, '2020-04-11 22:00:00', 29),
(0.57, '2020-04-12 22:00:00', 30),
(0.47, '2020-04-13 22:00:00', 31),
(0.4, '2020-04-14 22:00:00', 32),
(0.38, '2020-04-15 22:00:00', 33),
(0.45, '2020-04-16 22:00:00', 34),
(0.54, '2020-04-17 22:00:00', 35),
(0.71, '2020-04-18 22:00:00', 36),
(0.43, '2020-04-19 22:00:00', 37),
(0.41, '2020-04-20 22:00:00', 38);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `temperature`
--

CREATE TABLE `temperature` (
  `data` float NOT NULL,
  `date` datetime NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `temperature`
--

INSERT INTO `temperature` (`data`, `date`, `ID`) VALUES
(14, '2020-02-01 23:00:00', 1),
(10, '2020-02-02 23:00:00', 2),
(6, '2020-02-03 23:00:00', 3),
(0, '2020-02-04 23:00:00', 4),
(4, '2020-02-05 23:00:00', 5),
(5, '2020-02-06 23:00:00', 6),
(5, '2020-02-07 23:00:00', 7),
(6, '2020-02-08 23:00:00', 8),
(13, '2020-02-09 23:00:00', 9),
(4, '2020-02-10 23:00:00', 10),
(4, '2020-02-11 23:00:00', 11),
(10, '2020-02-12 23:00:00', 12),
(10, '2020-02-13 23:00:00', 13),
(11, '2020-02-14 23:00:00', 14),
(12, '2020-02-15 23:00:00', 15),
(13, '2020-02-16 23:00:00', 16),
(11, '2020-02-17 23:00:00', 17),
(11, '2020-02-18 23:00:00', 18),
(14, '2020-04-01 22:00:00', 19),
(16, '2020-04-02 22:00:00', 20),
(15, '2020-04-03 22:00:00', 21),
(18, '2020-04-04 22:00:00', 22),
(20, '2020-04-05 22:00:00', 23),
(20, '2020-04-06 22:00:00', 24),
(21, '2020-04-07 22:00:00', 25),
(24, '2020-04-08 22:00:00', 26),
(21, '2020-04-09 22:00:00', 27),
(20, '2020-04-10 22:00:00', 28),
(23, '2020-04-11 22:00:00', 29),
(23, '2020-04-12 22:00:00', 30),
(7, '2020-04-13 22:00:00', 31),
(17, '2020-04-14 22:00:00', 32),
(24, '2020-04-15 22:00:00', 33),
(25, '2020-04-16 22:00:00', 34),
(23, '2020-04-17 22:00:00', 35),
(14, '2020-04-18 22:00:00', 36),
(17, '2020-04-19 22:00:00', 37),
(18, '2020-04-20 22:00:00', 38),
(13, '2020-02-01 21:00:00', 39),
(13, '2020-04-20 21:00:00', 40);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `humidity`
--
ALTER TABLE `humidity`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `temperature`
--
ALTER TABLE `temperature`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `humidity`
--
ALTER TABLE `humidity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `temperature`
--
ALTER TABLE `temperature`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
