-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2022 at 05:07 PM
-- Server version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ex85671`
--

-- --------------------------------------------------------

--
-- Table structure for table `inschrijvingen`
--

CREATE TABLE `inschrijvingen` (
  `id` int(11) NOT NULL,
  `boekingsnummer` int(255) NOT NULL,
  `studentnummer` int(255) NOT NULL,
  `identiteitsbewijs` int(255) NOT NULL,
  `opmerkingen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reizen`
--

CREATE TABLE `reizen` (
  `boekingsnummer` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `bestemming` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `max_inschrijvingen` int(255) NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reizen`
--

INSERT INTO `reizen` (`boekingsnummer`, `titel`, `bestemming`, `omschrijving`, `begindatum`, `einddatum`, `max_inschrijvingen`, `img`) VALUES
(5, 'Jungle Cruise', 'Amazon', 'een lange cruise', '2022-05-19', '2022-05-26', 20, 0x73756e7365742e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `studentnummer` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `reisID` int(255) NOT NULL,
  `identiteitsbewijs` int(255) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `studentnummer`, `naam`, `wachtwoord`, `reisID`, `identiteitsbewijs`, `level`) VALUES
(1, 85671, 'Joshua', '92005ecf3788faea8346a7919fba0232188561ab', 1, 1, 1),
(2, 12345, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reisID` (`boekingsnummer`),
  ADD UNIQUE KEY `studentnummer` (`studentnummer`);

--
-- Indexes for table `reizen`
--
ALTER TABLE `reizen`
  ADD PRIMARY KEY (`boekingsnummer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentnummer` (`studentnummer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reizen`
--
ALTER TABLE `reizen`
  MODIFY `boekingsnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  ADD CONSTRAINT `inschrijvingen_ibfk_1` FOREIGN KEY (`boekingsnummer`) REFERENCES `reizen` (`boekingsnummer`),
  ADD CONSTRAINT `inschrijvingen_ibfk_2` FOREIGN KEY (`studentnummer`) REFERENCES `users` (`studentnummer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
