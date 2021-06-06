-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2021 at 08:44 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `receptoar`
--

-- --------------------------------------------------------

--
-- Table structure for table `glas`
--

DROP TABLE IF EXISTS `glas`;
CREATE TABLE IF NOT EXISTS `glas` (
  `ID_objava` int(11) NOT NULL,
  `ID_korisnik` int(11) NOT NULL,
  `Glasao` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_objava`,`ID_korisnik`),
  KEY `fk_Glas_Korisnik_idx` (`ID_korisnik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `glas`
--

INSERT INTO `glas` (`ID_objava`, `ID_korisnik`, `Glasao`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 5, 1),
(2, 2, 1),
(2, 6, 1),
(4, 2, 1),
(4, 5, 1),
(4, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE IF NOT EXISTS `komentar` (
  `ID_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `ID_objava` int(11) NOT NULL,
  `Tekst` varchar(255) DEFAULT NULL,
  `Broj_lajkova` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_komentar`),
  KEY `fk_Komentar_Objava1_idx` (`ID_objava`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`ID_komentar`, `ID_objava`, `Tekst`, `Broj_lajkova`) VALUES
(1, 2, 'Koliko vremena za pripremu?', 1),
(2, 1, 'Lepo :)', 0),
(3, 5, 'Ukusno!', 0),
(4, 1, 'Lepse', 0),
(18, 2, '3', 0),
(19, 4, 'qqq', 0),
(21, 1, 'fino @', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `ID_korisnik` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(18) NOT NULL,
  `Prezime` varchar(18) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Korisnicko_ime` varchar(18) NOT NULL,
  `Lozinka` varchar(18) NOT NULL,
  `Broj_pobeda` int(11) NOT NULL,
  `Kategorija_korisnika` char(1) NOT NULL,
  PRIMARY KEY (`ID_korisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`ID_korisnik`, `Ime`, `Prezime`, `Email`, `Korisnicko_ime`, `Lozinka`, `Broj_pobeda`, `Kategorija_korisnika`) VALUES
(1, 'Andjela', 'Dubak', 'andjela@gmail.com', 'andjela', '123456789', 0, 'A'),
(2, 'Aleksandar', 'Dopudja', 'dop@gmail.com', 'aleksandar', '123456789', 0, 'M'),
(3, 'Petar', 'Petrovic', 'petar@gmail.com', 'petar', '123456789', 0, 'M'),
(4, 'Marko', 'Markovic', 'marko@gmail.com', 'marko', '123456789', 0, 'K'),
(5, 'Ana', 'Davidovic', 'ana@gmail.com', 'ana', '123456789', 0, 'K'),
(6, 'Nikola', 'Nikolic', 'nikola@gmail.com', 'nikola', '123456789', 0, 'K');

-- --------------------------------------------------------

--
-- Table structure for table `lajk`
--

DROP TABLE IF EXISTS `lajk`;
CREATE TABLE IF NOT EXISTS `lajk` (
  `ID_korisnik` int(11) NOT NULL,
  `ID_komentar` int(11) NOT NULL,
  `Lajkovao` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_korisnik`,`ID_komentar`),
  KEY `fk_lajk_komentar1_idx` (`ID_komentar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lajk`
--

INSERT INTO `lajk` (`ID_korisnik`, `ID_komentar`, `Lajkovao`) VALUES
(1, 4, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(2, 21, 1),
(5, 2, 1),
(5, 3, 1),
(5, 4, 1),
(5, 19, 1),
(5, 21, 1),
(6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `objava`
--

DROP TABLE IF EXISTS `objava`;
CREATE TABLE IF NOT EXISTS `objava` (
  `ID_objava` int(11) NOT NULL AUTO_INCREMENT,
  `ID_korisnik` int(11) NOT NULL,
  `ID_tema` int(11) NOT NULL,
  `Naziv` varchar(255) NOT NULL,
  `Fotografija` varchar(255) NOT NULL,
  `Opis` varchar(255) NOT NULL,
  `Broj_glasova` int(11) NOT NULL,
  `Pobednicka` tinyint(1) NOT NULL,
  `Sastojci` varchar(255) NOT NULL,
  `Vreme` timestamp NOT NULL,
  `Broj_komentara` int(11) NOT NULL,
  PRIMARY KEY (`ID_objava`),
  UNIQUE KEY `ID_objava_UNIQUE` (`ID_objava`),
  KEY `fk_Objava_Korisnik1_idx` (`ID_korisnik`),
  KEY `fk_Objava_Tema1_idx` (`ID_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `objava`
--

INSERT INTO `objava` (`ID_objava`, `ID_korisnik`, `ID_tema`, `Naziv`, `Fotografija`, `Opis`, `Broj_glasova`, `Pobednicka`, `Sastojci`, `Vreme`, `Broj_komentara`) VALUES
(1, 4, 1, 'Garniamo piletina', 'http://localhost/receptoar/public/uploads/1.jpg', 'Prvo na puteru propržite pileći karabatak sa svih strana. Nalijte vodom 2 prsta preko piletine. Od momenta kada provri pustite da krčka 10 minuta. Dodajte isečenu na kolutove šargarepu i grašak. Dodajte soli i kuvajte 20 minuta na tihoj vatri. Od mlevene ', 9, 0, '1 pileci karabatak,150 g mlade sargarepe,100 g mladog graska,2 kasicice otopljenog putera,1 kasicica susamovog ulja,1 kasicica mlevene zacinske paprike,1 kasika brasna\npo ukusu soli i bibera,1/2 kasicice karija,1 cen belog luka,1/2 kasicice harisa paste,1', '2021-06-07 19:16:53', 3),
(2, 5, 1, 'Leksovacka muckalica', 'http://localhost/receptoar/public/uploads/2.jpg', 'U tiganj stavite iseckanu slaninu. Kada slanina pocne da se topi dodajte na rezance isecen crni luk. Kada luk zastakli, dodajte na isti nacin isecenu papriku i paradajz. Sve posolite pobiberite i kuvajte poklopljeno na laganoj vatri desetak minuta, nakon ', 3, 0, '500 g svinjskog vrata pecenog na rostilju,1 veci crveni luk,2 sveze paprike,1 ljuta sveza paprika,1 kg svezeg paradajza,ulje,so i biber po ukusu.', '2021-06-07 19:17:32', 1),
(4, 6, 1, 'Grasak', 'http://localhost/receptoar/public/uploads/3.jpg', 'Meso lepo oprati i iseci na kocke srednje velicine. Luk oljustiti i sitno iseckati. U dublju serpu sipati ulje staviti meso i crni luk, lovorov list i malo vode i dinstati uz povremeno mesanje. Povremeno dodavati po malo vode kada ispari. Kada se meso lep', 3, 0, '400 g svinjskog mesa,300 g mladog graska,2 glavice crnog luka,2 cena belog luka,2 sargarepe,2 kasike brasna,1 kasicica aleve paprike,so,suvi biljni zacin,mleveni biber,lovorov list,persun', '2021-06-07 19:18:54', 1),
(5, 5, 1, 'Supa sa curecim mesom', 'http://localhost/receptoar/public/uploads/4.jpg', 'Curece meso iseci na komade velicine zalogaja. Naliti vodom malo posoliti i kuvati na umerenoj temperaturi oko 30 minuta. Skidati penu. Naseckati zelen za supu i dodati mesu. Po ukusu dodati i zacine i nastaviti sa kuvanjem dok povrce omeksa.', 3, 0, '300 g cureceg belog mesa,po potrebi voda,2 cena belog luka,1/2 pakovanja zeleni za supu,po ukusu so,suvi biljni zacin,beli biber', '2021-06-07 19:22:36', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

DROP TABLE IF EXISTS `tema`;
CREATE TABLE IF NOT EXISTS `tema` (
  `ID_tema` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(50) NOT NULL,
  `Aktuelna` tinyint(1) NOT NULL,
  `Vreme` int(11) NOT NULL,
  PRIMARY KEY (`ID_tema`),
  UNIQUE KEY `ID_tema_UNIQUE` (`ID_tema`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`ID_tema`, `Naziv`, `Aktuelna`, `Vreme`) VALUES
(1, 'Brza hrana', 2, 1560124800),
(2, 'Kuvano', 3, 1560729600);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_Komentar_Objava1` FOREIGN KEY (`ID_objava`) REFERENCES `objava` (`ID_objava`) ON DELETE CASCADE;

--
-- Constraints for table `lajk`
--
ALTER TABLE `lajk`
  ADD CONSTRAINT `fk_Lajk_Korisnik1` FOREIGN KEY (`ID_korisnik`) REFERENCES `korisnik` (`ID_korisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_lajk_komentar1` FOREIGN KEY (`ID_komentar`) REFERENCES `komentar` (`ID_komentar`) ON DELETE CASCADE;

--
-- Constraints for table `objava`
--
ALTER TABLE `objava`
  ADD CONSTRAINT `fk_Objava_Korisnik1` FOREIGN KEY (`ID_korisnik`) REFERENCES `korisnik` (`ID_korisnik`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_Objava_Tema1` FOREIGN KEY (`ID_tema`) REFERENCES `tema` (`ID_tema`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
