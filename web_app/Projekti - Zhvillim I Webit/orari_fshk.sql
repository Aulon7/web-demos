-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 05:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orari_fshk`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `fshijPerdorues` (IN `p_id` INT)  BEGIN
DELETE FROM `perdoruesi`
WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertoPerdorues` (IN `p_id` INT, IN `p_emri` CHAR(20), IN `p_mbiemri` CHAR(20), IN `p_email` CHAR(40), IN `p_fjalekalimi` CHAR(32), IN `p_roli` INT)  BEGIN
INSERT INTO `perdoruesi`(id, emri, mbiemri, email, fjalekalimi, roli)
VALUES (p_id, p_emri, p_mbiemri, p_email, MD5(p_fjalekalimi), p_roli);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ndryshoPerdorues` (IN `p_id` INT, IN `p_emri` CHAR(20), IN `p_mbiemri` CHAR(20), IN `p_email` CHAR(40), IN `p_fjalekalimi` CHAR(32))  BEGIN
UPDATE `perdoruesi`
SET emri = p_emri, mbiemri = p_mbiemri, email = p_email, fjalekalimi = MD5(p_fjalekalimi)
WHERE id = p_id;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `vitiStudimeve` (`idSemestri` INT) RETURNS CHAR(20) CHARSET utf8mb4 BEGIN
DECLARE vitiStudimeve CHAR(20);
 IF idSemestri = 1 OR idSemestri = 2 THEN
		SET vitiStudimeve = 'Viti i pare';
    ELSEIF (idSemestri = 3 OR idSemestri = 4) THEN
        SET vitiStudimeve = 'Viti i dyte';
    ELSEIF (idSemestri = 5 OR idSemestri = 6) THEN
        SET vitiStudimeve = 'Viti i katert';
    END IF;
    RETURN (vitiStudimeve);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dita`
--

CREATE TABLE `dita` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dita`
--

INSERT INTO `dita` (`id`, `pershkrimi`) VALUES
(1, 'E hene'),
(2, 'E marte'),
(3, 'E merkure'),
(4, 'E enjte'),
(5, 'E premte'),
(6, 'E shtune');

-- --------------------------------------------------------

--
-- Table structure for table `kohezgjatja`
--

CREATE TABLE `kohezgjatja` (
  `id` int(11) NOT NULL,
  `fillimiOres` time DEFAULT NULL,
  `mbarimiOres` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kohezgjatja`
--

INSERT INTO `kohezgjatja` (`id`, `fillimiOres`, `mbarimiOres`) VALUES
(1, '08:00:00', '09:30:00'),
(2, '09:30:00', '11:00:00'),
(3, '11:00:00', '12:30:00'),
(4, '12:30:00', '14:00:00'),
(5, '14:00:00', '15:30:00'),
(6, '15:30:00', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lenda`
--

CREATE TABLE `lenda` (
  `kodi` int(11) NOT NULL,
  `emri` char(30) DEFAULT NULL,
  `grupetEligjeratave` int(11) DEFAULT NULL,
  `grupetEushtrimeve` int(11) DEFAULT NULL,
  `numriStudenteve` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lenda`
--

INSERT INTO `lenda` (`kodi`, `emri`, `grupetEligjeratave`, `grupetEushtrimeve`, `numriStudenteve`) VALUES
(101, 'Hyrje ne Programim', 2, 4, 60),
(102, 'Hyrje ne Informatike', 2, 2, 60),
(103, 'Matematika 1', 2, 4, 60),
(104, 'Media e Re dhe Multimedia', 2, 2, 60),
(105, 'Hyrje ne Rrjeta', 2, 2, 60),
(201, 'Algorimet dhe S.Te dhenat', 2, 4, 60),
(202, 'Hyrje ne Web Teknologji', 2, 4, 60),
(203, 'Matematika Diskrete', 2, 4, 60),
(204, 'Sistemet Operative', 2, 2, 60),
(205, 'Anglisht per SH.K 2', 2, 2, 60),
(301, 'Inxhinieringu Softuerik', 2, 2, 45),
(302, 'Sistemet e databazave', 2, 4, 45),
(303, 'Web Dizajn', 2, 4, 45),
(304, 'Programimi i Orientuar ne Ob.', 2, 4, 45),
(305, 'Anglisht per SH.K 3', 2, 2, 45),
(401, 'Grafik Kompjuterike', 2, 2, 45),
(402, 'Databaza e Avancuar', 2, 4, 45),
(403, 'Web i Avancuar', 2, 4, 45),
(404, 'Metodat Kerkimore', 2, 2, 45),
(405, 'Marketingu Online', 2, 2, 45),
(501, 'Intelegjenca Artificiale', 2, 2, 30),
(502, 'Kompjutimi Cloud', 2, 2, 30),
(503, 'Projekt', 2, 2, 30),
(504, 'Zhvillim i Lojrave', 2, 2, 30),
(505, 'Kerkimet Operacionale', 2, 2, 30),
(601, 'Kompjutimi Mobil', 2, 2, 30),
(602, 'Sistemet e Shperndara', 2, 2, 30),
(603, 'Siguria ne IT', 2, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `ligjerimet`
--

CREATE TABLE `ligjerimet` (
  `dita` int(11) NOT NULL,
  `lenda` int(11) NOT NULL,
  `profesori` int(11) NOT NULL,
  `kohezgjatja` int(11) NOT NULL,
  `semestri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ligjerimet`
--

INSERT INTO `ligjerimet` (`dita`, `lenda`, `profesori`, `kohezgjatja`, `semestri`) VALUES
(1, 101, 100001, 1, 1),
(1, 104, 100008, 4, 1),
(1, 201, 100001, 2, 2),
(1, 301, 100011, 5, 3),
(1, 401, 100007, 5, 4),
(1, 501, 100003, 2, 5),
(1, 502, 100003, 1, 5),
(1, 601, 100009, 1, 6),
(2, 102, 100006, 2, 1),
(2, 202, 100002, 1, 2),
(2, 203, 100005, 4, 2),
(2, 302, 100002, 1, 3),
(2, 402, 100002, 1, 4),
(2, 503, 100002, 6, 5),
(2, 602, 100007, 6, 6),
(3, 103, 100005, 4, 1),
(3, 303, 100002, 4, 3),
(3, 404, 100011, 2, 4),
(3, 504, 100009, 2, 5),
(4, 204, 100003, 5, 2),
(4, 403, 100002, 2, 4),
(4, 505, 100007, 5, 5),
(4, 603, 100004, 5, 6),
(5, 105, 100008, 2, 1),
(5, 304, 100001, 1, 3),
(6, 205, 100010, 5, 2),
(6, 305, 100010, 1, 3),
(6, 405, 100004, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

CREATE TABLE `perdoruesi` (
  `id` int(11) NOT NULL,
  `emri` char(20) DEFAULT NULL,
  `mbiemri` char(20) DEFAULT NULL,
  `email` char(40) DEFAULT NULL,
  `fjalekalimi` char(32) DEFAULT NULL,
  `roli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`id`, `emri`, `mbiemri`, `email`, `fjalekalimi`, `roli`) VALUES
(100001, 'Ercan', 'Canhasi', 'ercan.canhasi@uni-prizren.com', 'e2a6a1ace352668000aed191a817d143', 2),
(100002, 'Zirije', 'Hasani', 'zirije.hasani@uni-prizren.com', 'bb36c34eb6644ab9694315af7d68e629', 2),
(100003, 'Arsim', 'Susuri', 'arsim.susuri@uni-prizren.com', '3dc81e3f2c523fb5955761bbe2d150f2', 2),
(100004, 'Naim', 'Baftiu', 'naim.baftiu@uni-prizren.com', '1ea85063355fbfad3de73ab038261d62', 2),
(100005, 'Avdullah', 'Zejnullahu', 'avdullah.zejnullahu@uni-prizren.com', 'efd1a2f9b0b5f14b1fac70a7f8e8a9e7', 2),
(100006, 'Samedin', 'Krrabaj', 'samedin.krrabaj@uni-prizren.com', '758691fdf7ae3403db0d3bd8ac3ad585', 2),
(100007, 'Agon', 'Koka', 'agon.koka@uni-prizren.com', '9e3fc2a6d0f45c7a999ab01ebcacaf94', 2),
(100008, 'Astrit', 'Hulaj', 'astrithulaj@uni-prizren.com', '9e3fc2a6d0f45c7a999ab01ebcacaf94', 2),
(100009, 'Fesal', 'Baxhaku', 'fesalbaxhaku@uni-prizren.com', '795202367b2120e77b231d4d2b98e2b9', 2),
(100010, 'Kadri', 'Krasniqi', 'kadrikrasniqi@uni-prizren.com', 'daa28096f9e8879ab3a02b90aa0e2f83', 2),
(100011, 'Malush', 'Mjaku', 'malushmjaku@uni-prizren.com', '09a146c8d1cfdbdb54ceb60ede93cdab', 2),
(100012, 'Arta', 'Misini', 'arta.misini@uni-prizren.com', '21bf043d935e1499b3749c2f483df890', 2),
(100013, 'Arber', 'Beshiri', 'arberbeshiri@uni-prizren.com', '33932d50e450ef3ccfbcf69ac9ba04e5', 2),
(100014, 'Betim', 'Maloku', 'betimmaloku@uni-prizren.com', 'a3c3a95f3e42519d7ba5284cffcd4e25', 2),
(200001, 'Aulon', 'Morina', 'aulonmorina@gmail.com', 'ee8f208b135d4940dbb80d0335e20a1f', 3),
(200002, 'Admir', 'Binaj', 'admirbinaj@gmail.com', '7db88cdd3c295d227680b119a479ddfb', 3),
(200003, 'Ardit', 'Tolaj', 'ardittolaj@gmail.com', '5c74d3dd8616593a3f272f2114354099', 3),
(200004, 'Endrit', 'Krasniqi', 'endritkrasniqi@gmail.com', '797e5af4abd9f8d8e0cf07550e051b5c', 3),
(200005, 'Jetlir', 'Destani', 'jetlirdestani@gmail.com', 'a210495a82b1a68acb20d201f24da34b', 3),
(200006, 'Ermir', 'Shala', 'ermirshala@gmail.com', '302fedbdf963ca2223bddd79419730a1', 3),
(800800, 'Admin', 'Admin', 'administrator@uni-prizren.com', '5f158ede88a67605c4a024d6f4cc9824', 1);

--
-- Triggers `perdoruesi`
--
DELIMITER $$
CREATE TRIGGER `shlyejStudentin` AFTER DELETE ON `perdoruesi` FOR EACH ROW BEGIN 
DELETE FROM studenti where id = OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `shtoStudentin` AFTER INSERT ON `perdoruesi` FOR EACH ROW BEGIN 
INSERT INTO `studenti` (id, vitiRegjistrimit, semestri)
VALUES (new.id, NOW(), '1');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id` int(11) NOT NULL,
  `titulliAkademik` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id`, `titulliAkademik`) VALUES
(100001, 'Profesor i Asocuar'),
(100002, 'Profesor i Asocuar'),
(100003, 'Profesor i Asocuar'),
(100004, 'Profesor i Asocuar'),
(100005, 'Profesor i Asocuar'),
(100006, 'Profesor i Asocuar'),
(100007, 'Profesor Asistent'),
(100008, 'Profesor Asistent'),
(100009, 'Profesor Asistent'),
(100010, 'Profesor Asistent'),
(100011, 'Profesor Asistent'),
(100012, 'Asistent'),
(100013, 'Asistent'),
(100014, 'Asistent');

-- --------------------------------------------------------

--
-- Table structure for table `rezultatet`
--

CREATE TABLE `rezultatet` (
  `lenda` int(11) NOT NULL,
  `profesori` int(11) NOT NULL,
  `semestri` int(11) NOT NULL,
  `studenti` int(11) NOT NULL,
  `regjistruar` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rezultatet`
--

INSERT INTO `rezultatet` (`lenda`, `profesori`, `semestri`, `studenti`, `regjistruar`) VALUES
(101, 100001, 1, 200001, 'Po'),
(102, 100006, 1, 200001, 'Po'),
(103, 100005, 1, 200001, 'Po'),
(104, 100008, 1, 200001, 'Po'),
(105, 100008, 1, 200001, 'Po'),
(201, 100001, 2, 200002, 'Po'),
(202, 100002, 2, 200002, 'Po'),
(203, 100005, 2, 200002, 'Po'),
(204, 100003, 2, 200002, 'Po'),
(205, 100010, 2, 200002, 'Po');

-- --------------------------------------------------------

--
-- Table structure for table `roli`
--

CREATE TABLE `roli` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roli`
--

INSERT INTO `roli` (`id`, `pershkrimi`) VALUES
(1, 'Administrator'),
(2, 'Profesor'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `semestri`
--

CREATE TABLE `semestri` (
  `id` int(11) NOT NULL,
  `pershkrimi` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semestri`
--

INSERT INTO `semestri` (`id`, `pershkrimi`) VALUES
(1, 'Semestri i pare'),
(2, 'Semestri i dyte'),
(3, 'Semestri i trete'),
(4, 'Semestri i katert'),
(5, 'Semestri i peste'),
(6, 'Semestri i gjashte');

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `vitiRegjistrimit` date DEFAULT NULL,
  `semestri` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `vitiRegjistrimit`, `semestri`) VALUES
(200001, '2019-04-10', 1),
(200002, '2019-04-10', 2),
(200003, '2020-04-10', 3),
(200004, '2020-04-10', 4),
(200005, '2017-04-10', 5),
(200006, '2017-04-10', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dita`
--
ALTER TABLE `dita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kohezgjatja`
--
ALTER TABLE `kohezgjatja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lenda`
--
ALTER TABLE `lenda`
  ADD PRIMARY KEY (`kodi`),
  ADD UNIQUE KEY `kodi` (`kodi`);

--
-- Indexes for table `ligjerimet`
--
ALTER TABLE `ligjerimet`
  ADD PRIMARY KEY (`dita`,`lenda`,`profesori`,`semestri`,`kohezgjatja`),
  ADD KEY `lenda` (`lenda`),
  ADD KEY `profesori` (`profesori`),
  ADD KEY `semestri` (`semestri`),
  ADD KEY `kohezgjatja` (`kohezgjatja`);

--
-- Indexes for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `roli` (`roli`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rezultatet`
--
ALTER TABLE `rezultatet`
  ADD PRIMARY KEY (`lenda`,`profesori`,`semestri`,`studenti`),
  ADD KEY `profesori` (`profesori`),
  ADD KEY `semestri` (`semestri`),
  ADD KEY `studenti` (`studenti`);

--
-- Indexes for table `roli`
--
ALTER TABLE `roli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestri`
--
ALTER TABLE `semestri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `semestri` (`semestri`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kohezgjatja`
--
ALTER TABLE `kohezgjatja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lenda`
--
ALTER TABLE `lenda`
  MODIFY `kodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2131232;

--
-- AUTO_INCREMENT for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123123124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ligjerimet`
--
ALTER TABLE `ligjerimet`
  ADD CONSTRAINT `ligjerimet_ibfk_1` FOREIGN KEY (`lenda`) REFERENCES `lenda` (`kodi`),
  ADD CONSTRAINT `ligjerimet_ibfk_2` FOREIGN KEY (`profesori`) REFERENCES `profesori` (`id`),
  ADD CONSTRAINT `ligjerimet_ibfk_3` FOREIGN KEY (`semestri`) REFERENCES `semestri` (`id`),
  ADD CONSTRAINT `ligjerimet_ibfk_4` FOREIGN KEY (`dita`) REFERENCES `dita` (`id`),
  ADD CONSTRAINT `ligjerimet_ibfk_5` FOREIGN KEY (`kohezgjatja`) REFERENCES `kohezgjatja` (`id`);

--
-- Constraints for table `perdoruesi`
--
ALTER TABLE `perdoruesi`
  ADD CONSTRAINT `perdoruesi_ibfk_1` FOREIGN KEY (`roli`) REFERENCES `roli` (`id`);

--
-- Constraints for table `profesori`
--
ALTER TABLE `profesori`
  ADD CONSTRAINT `fk_profesor_perdoruesid` FOREIGN KEY (`id`) REFERENCES `perdoruesi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `profesori_ibfk_1` FOREIGN KEY (`id`) REFERENCES `perdoruesi` (`id`);

--
-- Constraints for table `rezultatet`
--
ALTER TABLE `rezultatet`
  ADD CONSTRAINT `rezultatet_ibfk_1` FOREIGN KEY (`lenda`) REFERENCES `lenda` (`kodi`),
  ADD CONSTRAINT `rezultatet_ibfk_2` FOREIGN KEY (`profesori`) REFERENCES `profesori` (`id`),
  ADD CONSTRAINT `rezultatet_ibfk_3` FOREIGN KEY (`semestri`) REFERENCES `semestri` (`id`),
  ADD CONSTRAINT `rezultatet_ibfk_4` FOREIGN KEY (`studenti`) REFERENCES `studenti` (`id`);

--
-- Constraints for table `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `perdoruesi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`id`) REFERENCES `perdoruesi` (`id`),
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`semestri`) REFERENCES `semestri` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
