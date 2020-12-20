-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Dez 2020 um 17:45
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
-- Datenbank: `flexxter`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblausleihen`
--

CREATE TABLE `tblausleihen` (
  `AusleihenID` int(20) NOT NULL,
  `Datum` date NOT NULL,
  `Typ` varchar(50) NOT NULL,
  `Employee_fk` int(20) NOT NULL,
  `Machine_fk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblausleihen`
--

INSERT INTO `tblausleihen` (`AusleihenID`, `Datum`, `Typ`, `Employee_fk`, `Machine_fk`) VALUES
(3, '0000-00-00', 'ausliehe', 1, 2),
(4, '0000-00-00', 'rueckgabe', 1, 2),
(5, '0000-00-00', 'ausliehe', 1, 8),
(6, '0000-00-00', 'ausliehe', 1, 7),
(7, '0000-00-00', 'rueckgabe', 1, 7),
(8, '0000-00-00', 'rueckgabe', 1, 9),
(9, '0000-00-00', 'ausliehe', 1, 4),
(10, '0000-00-00', 'rueckgabe', 1, 4),
(11, '0000-00-00', 'ausliehe', 1, 2),
(12, '0000-00-00', 'rueckgabe', 1, 2),
(13, '0000-00-00', 'rueckgabe', 1, 3),
(14, '0000-00-00', 'ausliehe', 1, 2),
(15, '0000-00-00', 'rueckgabe', 1, 6),
(16, '0000-00-00', 'ausliehe', 1, 3),
(17, '0000-00-00', 'ausliehe', 1, 4),
(18, '0000-00-00', 'rueckgabe', 1, 8),
(19, '0000-00-00', 'ausliehe', 1, 6),
(20, '0000-00-00', 'ausliehe', 1, 7),
(21, '0000-00-00', 'rueckgabe', 1, 3),
(22, '0000-00-00', 'rueckgabe', 1, 7),
(23, '0000-00-00', 'ausliehe', 1, 7),
(24, '0000-00-00', 'rueckgabe', 1, 7),
(25, '0000-00-00', 'ausliehe', 1, 7),
(26, '0000-00-00', 'rueckgabe', 1, 7),
(27, '0000-00-00', 'ausliehe', 1, 7),
(28, '0000-00-00', 'rueckgabe', 1, 7),
(29, '0000-00-00', 'ausliehe', 1, 7),
(30, '0000-00-00', 'rueckgabe', 1, 7),
(31, '0000-00-00', 'ausliehe', 1, 7),
(32, '0000-00-00', 'rueckgabe', 1, 5),
(33, '0000-00-00', 'ausliehe', 1, 5),
(34, '0000-00-00', 'ausliehe', 1, 1),
(35, '0000-00-00', 'rueckgabe', 1, 6),
(36, '0000-00-00', 'ausliehe', 1, 8),
(37, '0000-00-00', 'ausliehe', 1, 6),
(38, '0000-00-00', 'rueckgabe', 1, 4),
(39, '2020-12-20', 'rueckgabe', 1, 5),
(40, '0000-00-00', 'ausliehe', 1, 4),
(41, '2020-12-20', 'rueckgabe', 1, 1),
(42, '2020-12-20', 'ausliehe', 1, 1),
(43, '2020-12-20', 'rueckgabe', 1, 1),
(44, '2020-12-20', 'ausliehe', 1, 1),
(45, '2020-12-20', 'rueckgabe', 1, 1),
(46, '2020-12-20', 'ausliehe', 1, 9),
(47, '2020-12-20', 'rueckgabe', 1, 6),
(48, '2020-12-20', 'ausliehe', 1, 3),
(49, '2020-12-20', 'rueckgabe', 1, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblemployees`
--

CREATE TABLE `tblemployees` (
  `EmployeeID` int(20) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblemployees`
--

INSERT INTO `tblemployees` (`EmployeeID`, `Surname`, `Password`) VALUES
(1, 'Sandy', 'sandy'),
(2, 'Garros', 'garros'),
(3, 'Alex', 'alex'),
(4, 'Steve', 'steve'),
(5, 'Maxime', 'maxime'),
(6, 'Tatiana', 'tatiana');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblmachines`
--

CREATE TABLE `tblmachines` (
  `MachineID` int(20) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `tblmachines`
--

INSERT INTO `tblmachines` (`MachineID`, `Title`, `Description`, `Status`) VALUES
(1, 'laptop', 'this is the description for the current machine', 1),
(2, 'Keyboard', 'This Keyboard ist ganz neu und gultig', 0),
(3, 'Monitor', 'Das ist ein Acer Monitor und ist vom Acer Unternehmen gebaut', 0),
(4, 'Mikrowelle', 'Diese ist gultig und ist von Severin Unternehmen gebaut', 1),
(5, 'Moulinex', 'gultig aber gebraucht.', 1),
(6, 'Mouse', 'this is the description of this Mouse', 1),
(7, 'Toaster', 'This is the description of the current Toater', 0),
(8, 'Kopfhorer', 'This Kopfhorer ist gebraucht und ist von Samsung gebaut', 0),
(9, 'Microfon', 'ganz neu un dvon Aplle gebaut', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tblausleihen`
--
ALTER TABLE `tblausleihen`
  ADD PRIMARY KEY (`AusleihenID`),
  ADD KEY `Employee_fk` (`Employee_fk`,`Machine_fk`),
  ADD KEY `Machine_fk` (`Machine_fk`);

--
-- Indizes für die Tabelle `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indizes für die Tabelle `tblmachines`
--
ALTER TABLE `tblmachines`
  ADD PRIMARY KEY (`MachineID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tblausleihen`
--
ALTER TABLE `tblausleihen`
  MODIFY `AusleihenID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT für Tabelle `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `EmployeeID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `tblmachines`
--
ALTER TABLE `tblmachines`
  MODIFY `MachineID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `tblausleihen`
--
ALTER TABLE `tblausleihen`
  ADD CONSTRAINT `Machine` FOREIGN KEY (`Machine_fk`) REFERENCES `tblmachines` (`MachineID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee` FOREIGN KEY (`Employee_fk`) REFERENCES `tblemployees` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
