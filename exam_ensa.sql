-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 10:44 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_ensa`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ID_exam` int(11) NOT NULL,
  `Nom_exam` varchar(15) NOT NULL,
  `ID_mdl` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID_exam`, `Nom_exam`, `ID_mdl`, `date_debut`, `date_fin`) VALUES
(1, 'CC1', 1, '2020-06-23 08:00:00', '2020-06-23 09:30:00'),
(2, 'CC1', 2, '2020-06-23 08:00:00', '2020-06-23 09:30:00'),
(3, 'CC1', 3, '2020-06-23 08:00:00', '2020-06-23 10:00:00'),
(4, 'CC1', 4, '2020-07-20 09:00:00', '2020-07-20 10:00:00'),
(7, 'CC1', 8, '2020-07-20 09:00:00', '2020-07-20 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `ID_mdl` int(11) NOT NULL,
  `Nom_mdl` text NOT NULL,
  `Nbr_etd` int(11) NOT NULL,
  `filiere` varchar(10) NOT NULL,
  `ID_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`ID_mdl`, `Nom_mdl`, `Nbr_etd`, `filiere`, `ID_prof`) VALUES
(1, 'Algèbre 1', 300, '2AP1', 1),
(2, 'Analyse 1', 300, '2AP1', 2),
(3, 'Physique 1', 300, '2AP1', 3),
(4, 'Mécanique 1', 300, '2AP1', 4),
(5, 'Informatique 1', 300, '2AP1', 5),
(6, 'Langue et Communication 1', 300, '2AP1', 6),
(7, 'Algèbre 2', 300, '2AP1', 7),
(8, 'Analyse 2', 300, '2AP1', 8),
(9, 'Physique 2', 300, '2AP1', 9),
(10, 'Chimie', 300, '2AP1', 10),
(11, 'Mathématiques Assistées par Ordinateur (MAO)', 300, '2AP1', 11),
(12, 'Langue et Communication 2', 300, '2AP1', 12),
(13, 'Algèbre 3', 250, '2AP2', 1),
(14, 'Analyse 3', 250, '2AP2', 13),
(15, 'Physique 3', 250, '2AP2', 14),
(16, 'Mécanique 2', 250, '2AP2', 4),
(17, 'Informatique 2', 250, '2AP2', 5),
(18, 'Langue et Communication 3', 250, '2AP2', 6),
(19, 'Analyse 4', 250, '2AP2', 15),
(20, 'Mathématiques Appliquées', 250, '2AP2', 16),
(21, 'Physique 4', 250, '2AP2', 17),
(22, 'Electronique', 250, '2AP2', 18),
(23, 'Management', 250, '2AP2', 20),
(24, 'Langue et Communication 4', 250, '2AP2', 21);

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `ID_prof` int(11) NOT NULL,
  `Nom_prof` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`ID_prof`, `Nom_prof`) VALUES
(1, 'Prof 1'),
(2, 'Prof 2'),
(3, 'Prof 3'),
(4, 'Prof 4'),
(5, 'Prof 5'),
(6, 'Prof 6'),
(7, 'Prof 7'),
(8, 'Prof 8'),
(9, 'Prof 9'),
(10, 'Prof 10'),
(11, 'Prof 11'),
(12, 'Prof 12'),
(13, 'Prof 13'),
(14, 'Prof 14'),
(15, 'Prof 15'),
(16, 'Prof 16'),
(17, 'Prof 17'),
(18, 'Prof 18'),
(19, 'Prof 19'),
(20, 'Prof 20'),
(21, 'Prof 21'),
(22, 'Prof 22'),
(23, 'Prof 23'),
(24, 'Prof 24'),
(25, 'Prof 25'),
(26, 'Prof 26'),
(27, 'Prof 27'),
(28, 'Prof 28'),
(31, 'test111');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `ID_salle` int(11) NOT NULL,
  `Nom_salle` varchar(10) NOT NULL,
  `Capacite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`ID_salle`, `Nom_salle`, `Capacite`) VALUES
(1, 'Amphi', 60),
(2, '001', 25),
(3, '003', 25),
(4, '004', 25),
(5, '005', 30),
(6, '006', 30),
(7, '103', 25),
(8, '104', 25),
(9, '105', 30),
(10, '106', 30),
(11, '203', 25),
(12, '204', 25),
(13, '205', 30),
(14, '206', 30),
(15, '200', 25),
(16, '201', 30),
(17, '202', 25),
(20, '203', 25),
(21, '204', 20),
(22, '205', 30);

-- --------------------------------------------------------

--
-- Table structure for table `salle_exam`
--

CREATE TABLE `salle_exam` (
  `ID_affect` int(11) NOT NULL,
  `ID_exam` int(11) NOT NULL,
  `ID_salle` int(11) NOT NULL,
  `ID_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salle_exam`
--

INSERT INTO `salle_exam` (`ID_affect`, `ID_exam`, `ID_salle`, `ID_prof`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 2, 3),
(4, 1, 2, 4),
(6, 1, 3, 6),
(7, 2, 4, 7),
(8, 2, 4, 8),
(9, 2, 5, 9),
(10, 2, 5, 10),
(11, 3, 6, 11),
(12, 3, 6, 12),
(13, 3, 7, 13),
(14, 3, 7, 14),
(15, 7, 12, 28),
(16, 7, 13, 27);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom_utilisateur` varchar(20) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom_utilisateur`, `mot_de_passe`) VALUES
('admin', 'admin'),
('test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ID_exam`),
  ADD KEY `ID_mdl` (`ID_mdl`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`ID_mdl`),
  ADD KEY `ID_prof` (`ID_prof`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`ID_prof`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`ID_salle`);

--
-- Indexes for table `salle_exam`
--
ALTER TABLE `salle_exam`
  ADD PRIMARY KEY (`ID_affect`),
  ADD KEY `ID_prof` (`ID_prof`),
  ADD KEY `ID_salle` (`ID_salle`),
  ADD KEY `ID_exam` (`ID_exam`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`nom_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ID_exam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `ID_mdl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `ID_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `ID_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `salle_exam`
--
ALTER TABLE `salle_exam`
  MODIFY `ID_affect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`ID_mdl`) REFERENCES `module` (`ID_mdl`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`ID_prof`) REFERENCES `professeur` (`ID_prof`);

--
-- Constraints for table `salle_exam`
--
ALTER TABLE `salle_exam`
  ADD CONSTRAINT `salle_exam_ibfk_3` FOREIGN KEY (`ID_prof`) REFERENCES `professeur` (`ID_prof`),
  ADD CONSTRAINT `salle_exam_ibfk_4` FOREIGN KEY (`ID_salle`) REFERENCES `salle` (`ID_salle`),
  ADD CONSTRAINT `salle_exam_ibfk_5` FOREIGN KEY (`ID_exam`) REFERENCES `exam` (`ID_exam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
