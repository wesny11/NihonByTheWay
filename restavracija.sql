-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2014 at 07:38 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restavracija`
--
CREATE DATABASE IF NOT EXISTS `restavracija` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restavracija`;

-- --------------------------------------------------------

--
-- Table structure for table `hrana`
--

CREATE TABLE IF NOT EXISTS `hrana` (
  `HranaID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(30) NOT NULL,
  `VrstaHrane` varchar(15) NOT NULL,
  `Opis` varchar(200) NOT NULL,
  `Cena` float NOT NULL,
  `Slika` varchar(50) NOT NULL,
  PRIMARY KEY (`HranaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `hrana`
--

INSERT INTO `hrana` (`HranaID`, `Ime`, `VrstaHrane`, `Opis`, `Cena`, `Slika`) VALUES
(1, 'Miso juha', 'Juhe', 'Je tradicionalna japonska juha, kuhana na daÅ¡i osnovi in miso paste (pasta narejena iz fermentiranega riÅ¾a, jeÄmena in soje). Dodan je tofu, alge in drobnjak.', 3, 'images/miso-juha.jpg'),
(2, 'Ramen', 'Juhe', 'Je okusna juha na bazi sojine omake, s koÅ¡Äki piÅ¡ÄanÄjega mesa, s sveÅ¾o zelenjavo in kuhanim jajcem.', 3, 'images/ramen-juha.jpg'),
(3, 'Soba juha', 'Juhe', 'Juha z ajdovimi testeninami z dodatkom mirina (riÅ¾evega kisa), sojine omake, hondashia, aburage (tofujevi Å¾epki) in japonske gorske zelenjave.', 3, 'images/soba-juha.jpg'),
(4, 'Tempura Udon juha', 'Juhe', 'Je okusna juha z ocvrtimi tigrovimi kozicami, Å¡itake gobami, tuno in udon rezanci.', 3, 'images/tempura-udon.jpg'),
(5, 'Ishikare Nabe juha', 'Juhe', 'Krepka lososova juha na maslu, s porom, tofujem, meÅ¡animi gozdnimi gobami, udon rezanci in vodno kreÅ¡o.', 3, 'images/ishikare.jpg'),
(6, 'Udon juha', 'Juhe', 'Juha znaÄilna za otok Å ikoku, narejena na daÅ¡i osnovi z udon rezanci, temno sojino omako in drobnjakom.', 3, 'images/udon.jpg'),
(7, 'Anpan', 'Sladice', 'Kruhki napolnjeni s soÄno, sladko Azuki fiÅ¾olovo pasto.', 3, 'images/anpan.jpg'),
(8, 'Kakigori', 'Sladice', 'Ledena sladica iz kondenziranega mleka z okusem sadnega sirupa (jagoda, ÄeÅ¡nja, limona, zeleni Äaj, sladka sliva).', 3, 'images/kakigori.jpg'),
(9, 'Taiyaki', 'Sladice', 'KolaÄek v obliki ribe, z rdeÄo fiÅ¾olovo pasto z dodatkom sira, Äokolade in vanilijevega pudinga.', 3, 'images/Taiyaki.jpg'),
(10, 'Uiro', 'Sladice', 'SveÅ¾e kocke narejene iz riÅ¾a v prahu in sladkorja.', 2, 'images/Uiro.jpg'),
(11, 'Dango Rochi', 'Sladice', 'PeÄene riÅ¾eve kocke narejene iz kokosovega mleka, z aromo vanilije.', 3, 'images/dango-rochi.jpg'),
(12, 'Dorayaki', 'Sladice', 'Znamenite japonske palaÄinke polnjene s sladkim fiÅ¾olom.', 3, 'images/dorayaki.jpg'),
(13, 'Kayu', 'Ostalo', 'RiÅ¾ev moÄnik oz. kaÅ¡a z dodatkom Umeboshi ali Furikake.', 5, 'images/kayu.jpg'),
(14, 'Nikuyaga', 'Ostalo', 'Jed iz mesa, krompirja in Äebule, praÅ¾ene na sojini omaki, z zelenjavo.', 7, 'images/Nikujaga.jpg'),
(15, 'Ochazuke', 'Ostalo', 'Preprosta jed, narejena iz zelenega Äaja, z japonskimi kumaricami, lososom, algami, sezamovimi semeni in wasabi omako.', 6, 'images/ochazuke.jpg'),
(16, 'Tonkatsu', 'Ostalo', 'Jed z ocvrtim svinjskim kotletom in zeljem.', 6, 'images/Tonkatsu.jpg'),
(17, 'Yakitori', 'Ostalo', 'PeÄena piÅ¡ÄanÄja nabodala z bambusom, postreÅ¾ena s sladko slivovo omako.', 7, 'images/yakitori.jpg'),
(18, 'Karaage', 'Ostalo', 'MeÅ¡anica medaljonov iz piÅ¡Äanca, ribe in hobotnice, postreÅ¾ena s pekoÄo omako.', 7, 'images/karaage.jpg'),
(19, 'Chirasi Sushi', 'Sushi', 'Jed iz kuhanega okisanega riÅ¾a, v kombinaciji z morsko hrano in zelenjavo, postreÅ¾ena z ingverjevo, wasabi in sojino omako.', 9, 'images/chirasi.jpg'),
(20, 'Nigiri Sushi', 'Sushi', 'Pravokotno oblikovan kuhan riÅ¾, obloÅ¾en z lososom ali tuno, postreÅ¾en z wasabi omako.', 8, 'images/Nigiri.jpg'),
(21, 'Inari Sushi', 'Sushi', 'Preprosta jed iz ocvrtih tofujevih vreÄk, napolnjenih z riÅ¾em, postreÅ¾ena z jeguljino omako.', 9, 'images/Inari.jpg'),
(22, 'Gunkan Sushi', 'Sushi', 'Jed iz riÅ¾a, ovitega v posuÅ¡eno morsko travo, napolnjenega z ribjimi jajÄeci, postreÅ¾enega s ponsu omako.', 15, 'images/gunkan.jpg'),
(23, 'Norimaki Sushi', 'Sushi', 'Jed iz riÅ¾a, ovitega v posuÅ¡eno morsko travo, napolnjenega z morsko hrano, postreÅ¾enega s tsume omako.', 8, 'images/Norimaki.jpg'),
(24, 'Temaki Sushi', 'Sushi', 'Ro?no narejeni stoÅ¾ci iz morske trave, napolnjeni z riÅ¾em, morsko hrano in zelenjavo, postreÅ¾eni s sojino omako.', 8, 'images/Temaki.jpg'),
(25, 'Ika Sushi', 'Sushi', 'Preprosta jed iz dveh vrst lignjev, postreÅ¾ena z wasabi omako.', 9, 'images/ika.jpg'),
(26, 'Tekka Don Sushi', 'Sushi', 'Je riÅ¾eva jed z marinirano tuno na vrhu, zaÄinjena s pekoÄimi zaÄimbami in postreÅ¾ena s pekoÄo pomaranÄno omako.', 9, 'images/Tekka-don.jpg'),
(27, 'Tuna Tataki', 'Sushi', 'Na tanko narezana tuna, marinirana v kisu, popeÄena in zaÄinjena z ingverjem.', 6, 'images/Tuna-tataki.jpg'),
(28, 'Uramaki Sushi', 'Sushi', 'So riÅ¾eve rolice, napolnjene s tuno, avokadom, majonezo,kumarami in korenjem, postreÅ¾ene s sojino omako.', 7, 'images/uramaki.jpg'),
(29, 'Unagi Don', 'Ostalo', 'Jed iz kosov popeÄene jegulje z riÅ¾em, posuta s sezamovimi semeni, postreÅ¾ena s tare Å¾ar omako.', 8, 'images/Unagi-don.jpg'),
(30, 'Chankonabe', 'Ostalo', 'PiÅ¡ÄanÄja obara z dodanim tofujem, zelenjavo, koÅ¡Äki ribe in udon rezanci.', 7, 'images/chankonabe.jpg'),
(31, 'Sakuramochi', 'Sladice', 'Sladka riÅ¾eva tortica polnjena s pasto iz rdeÄega fiÅ¾ola, prekrita s ÄeÅ¡njevim listom.', 3, 'images/Sakuramochi.jpg'),
(32, 'Kompeito', 'Sladice', 'Obarvani bonboni iz Äistega sladkorja nenavadnih oblik, ki nastanejo med kuhanjem.', 2, 'images/Kompeito.jpg'),
(33, 'Butajiru juha', 'Juhe', 'Juha narejena iz svinjine in zelenjave, s konjakom, morsko travo, Äebulo, korenjem, krompirjem, tofujem in gobami.', 3, 'images/butajiru.jpg'),
(34, 'Fugu Chiri juha', 'Juhe', 'Juha narejena iz ribe napihovalke.', 4, 'images/fugu.jpg'),
(35, 'Test', 'Ostalo', 'Bla bla bla', 12, 'images/butajiru.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `komentarhrana`
--

CREATE TABLE IF NOT EXISTS `komentarhrana` (
  `KomentarHranaID` int(11) NOT NULL AUTO_INCREMENT,
  `Hrana_HranaID` int(11) NOT NULL,
  `Uporabnik_UporabnikID` int(11) NOT NULL,
  `Vsebina` varchar(100) NOT NULL,
  `Ocena` int(11) NOT NULL,
  PRIMARY KEY (`KomentarHranaID`),
  KEY `Hrana_HranaID_idx` (`Hrana_HranaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `komentarhrana`
--

INSERT INTO `komentarhrana` (`KomentarHranaID`, `Hrana_HranaID`, `Uporabnik_UporabnikID`, `Vsebina`, `Ocena`) VALUES
(4, 19, 3, 'Zelo dobro!', 5),
(6, 1, 4, 'To juho bom Å¡e naroÄila!', 5);

-- --------------------------------------------------------

--
-- Table structure for table `komentarpijaca`
--

CREATE TABLE IF NOT EXISTS `komentarpijaca` (
  `KomentarPijacaID` int(11) NOT NULL AUTO_INCREMENT,
  `Pijaca_PijacaID` int(11) NOT NULL,
  `Uporabnik_UporabnikID` int(11) NOT NULL,
  `Vsebina` varchar(100) NOT NULL,
  `Ocena` int(11) NOT NULL,
  PRIMARY KEY (`KomentarPijacaID`),
  KEY `Pijaca_PijacaID_idx` (`Pijaca_PijacaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `komentarpijaca`
--

INSERT INTO `komentarpijaca` (`KomentarPijacaID`, `Pijaca_PijacaID`, `Uporabnik_UporabnikID`, `Vsebina`, `Ocena`) VALUES
(1, 2, 2, 'To pijaÄo se splaÄa poskusiti!', 5),
(2, 1, 4, 'Tale je pa moÄna :)', 5);

-- --------------------------------------------------------

--
-- Table structure for table `narocila`
--

CREATE TABLE IF NOT EXISTS `narocila` (
  `NarocilaID` int(11) NOT NULL AUTO_INCREMENT,
  `Uporabniki_UporabnikID` int(11) NOT NULL,
  `SkupnaKolicina` int(11) DEFAULT NULL,
  `SkupnaCena` int(11) DEFAULT NULL,
  `Hrana_HranaID` int(11) DEFAULT NULL,
  `Pijaca_PijacaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`NarocilaID`),
  KEY `Uporabniki_UporabnikID_idx` (`Uporabniki_UporabnikID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pijaca`
--

CREATE TABLE IF NOT EXISTS `pijaca` (
  `PijacaID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(30) NOT NULL,
  `VrstaPijace` varchar(15) NOT NULL,
  `Opis` varchar(200) NOT NULL,
  `Cena` float NOT NULL,
  `Slika` varchar(50) NOT NULL,
  PRIMARY KEY (`PijacaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pijaca`
--

INSERT INTO `pijaca` (`PijacaID`, `Ime`, `VrstaPijace`, `Opis`, `Cena`, `Slika`) VALUES
(1, 'Sake', 'Alkoholna', 'Tradicionalna japonska alkoholna pijaÄa narejena iz fermentiranega riÅ¾a.', 12, 'images/sake.jpg'),
(2, 'Umeshu', 'Alkoholna', 'Alkoholna pijaÄa sladkega okusa narejena iz nezrelih sadeÅ¾ev posebne vrste slive.', 10, 'images/umeshu.jpg'),
(3, 'Shochu', 'Alkoholna', 'Alkoholna pijaÄa destilirana iz jeÄmena, sladkega krompirja, ajde ali riÅ¾a, ki lahko vsebuje tudi rjavi sladkor, sezamova semena ali kostanj.', 16, 'images/shochu.jpg'),
(4, 'Awamori', 'Alkoholna', 'Tradicionalna alkoholna pijaÄa z otoka Okinawa narejena iz dolgozrnatega riÅ¾a.', 14, 'images/awamori.jpg'),
(5, 'Matcha', 'Alkoholna', 'OsveÅ¾ilen in krepak zeleni Äaj v prahu izrazitega okusa.', 10, 'images/matcha.jpg'),
(6, 'Mugicha', 'Alkoholna', 'OsveÅ¾ilna pijaÄa narejena iz Å¾itaric, predvsem iz jeÄmena.', 10, 'images/mugicha.jpg'),
(7, 'Kirin Ichiban Shibori', 'Alkoholna', 'Japonsko pivo izrazitega okusa s 100% deleÅ¾em jeÄmenovega slada.', 5, 'images/kirin.jpg'),
(8, 'Happoshu', 'Alkoholna', 'Japonsko pivo z manjÅ¡im deleÅ¾em jeÄmenovega slada in dodatki.', 4, 'images/happoshu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE IF NOT EXISTS `uporabniki` (
  `UporabnikID` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(25) NOT NULL,
  `Priimek` varchar(25) NOT NULL,
  `Geslo` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Naslov` varchar(45) NOT NULL,
  `Mesto` varchar(45) NOT NULL,
  `PostnaStevilka` varchar(10) NOT NULL,
  `JeAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`UporabnikID`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `uporabniki`
--

INSERT INTO `uporabniki` (`UporabnikID`, `Ime`, `Priimek`, `Geslo`, `Email`, `Naslov`, `Mesto`, `PostnaStevilka`, `JeAdmin`) VALUES
(1, 'admin', '', 'admin', 'admin', '', '', '', 1),
(2, 'Janez', 'Novak', 'janezn', 'janezn@gmail.com', 'Novakova 1', 'Ljubljana', '1000', 0),
(3, 'Barbara', 'Drnovšek', 'barbarad', 'barbarad@gmail.com', 'Cankarjeva 7', 'Ljubljana', '1000', 0),
(4, 'Vesna', 'Horvat', 'mrvi', 'mrvi_89@yahoo.com', 'Ulica prvoborcev 9', 'Ljubljana', '1000', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentarhrana`
--
ALTER TABLE `komentarhrana`
  ADD CONSTRAINT `Hrana_HranaID` FOREIGN KEY (`Hrana_HranaID`) REFERENCES `hrana` (`HranaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentarpijaca`
--
ALTER TABLE `komentarpijaca`
  ADD CONSTRAINT `Pijaca_PijacaID` FOREIGN KEY (`Pijaca_PijacaID`) REFERENCES `pijaca` (`PijacaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `narocila`
--
ALTER TABLE `narocila`
  ADD CONSTRAINT `Uporabniki_UporabnikID` FOREIGN KEY (`Uporabniki_UporabnikID`) REFERENCES `uporabniki` (`UporabnikID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
