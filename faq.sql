-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 11:01 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'maksim.ilmast@yandex.com'),
(2, 'maksim', '6b4ab9131026551fc58b0fa066c03d51', 'maksim.ilmast@yandex.com');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Tietotekniikka'),
(2, 'Palvelinjärjestelmät'),
(8, 'Linux'),
(9, 'Ohjelmointi'),
(10, 'Tietokannat'),
(13, 'Kaapelointi'),
(14, 'Mikrokontrollerit');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `answer` text,
  `category_id` int(11) NOT NULL,
  `visibility` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `author`, `email`, `answer`, `category_id`, `visibility`, `date_added`) VALUES
(66, 'Mitä tarkoittaa datakeskus?', 'test', 'test@test.com', 'This is something!', 2, 1, '2018-02-09 18:27:47'),
(67, 'Virtuaalitekniikka palvelimessa?', 'Maksim', 'maksim.ilmast@yandex.com', 'Virtualisoinnilla tarkoitetaan tyypillisesti fyysisen palvelimen resurssien (prosessorit, muisti, IO-laitteet) määrittelyä yhden tai useamman loogisen palvelimen käyttöön. Loogisesta palvelimesta tai virtuaalipalvelimesta käytetään usein myös nimitystä image.\r\n\r\nLaitevalmistajilla on erilaisia toteutuksia. Parhaimmillaan nämä hoitavat fyysisen palvelimen/palvelimien resurssien allokoinnin täysin automaattisesti loogisen palvelimen kuormituksen mukaan.', 2, 1, '2018-02-09 18:29:25'),
(69, 'Kuka oli Linuxin pääkehittäjä?', 'test', 'test@test.com', 'Linus Torvalds', 8, 1, '2018-02-09 18:32:15'),
(70, 'Käytetäänkö Linuxia myös sulautetuissa järjestelmissä?', 'Maksim', 'maksim.ilmast@yandex.com', 'Linuxia käytetään myös kämmentietokoneissa ja matkapuhelimissa, kotikäyttöön tarkoitetuissa ADSL-modeemeissa, WLAN-tukiasemissa ja palomuureissa sekä teollisissa laitteissa sulautettuna käyttöjärjestelmänä.\r\n\r\nSulautetuissa järjestelmissä GNU-projektin työkalut korvataan usein kevyemmillä, kuten BusyBox-työkaluilla ja joskus myös GNU C-kirjasto kevyemmällä vaihtoehdolla kuten uClibc.\r\n\r\nSuomalainen Nokia käytti Maemoa, joka myöhemmin yhdistyi Intelin Moblin-projektin kanssa MeeGoksi. Osin Meegon pohjalta Jolla kehitti Sailfish OS:n. Myös Googlen omistama monissa älypuhelimissa ja taulutietokoneissa käytetty Android käyttää Linux-ydintä. Huhtikuussa 2017 Android ohitti suosiossa Windowsin ja siitä tuli maailman käytetyin käyttöjärjestelmä, kun lukuihin lasketaan kaikki internettiin kytketyt laitteet.\r\n\r\nSulautettujen Linuxien erikoistapauksia ovat käyttöjärjestelmät, joiden tarkoituksena on saada esimerkiksi pelikonsoli, kuten PlayStation tai Xbox, toimimaan kotitietokoneena. Medialaitteet kuten TiVo käyttävät Linuxia.\r\n\r\nAutomotive Grade Linux on autoteollisuudelle tarkoitettu projekti. Mazda ja Toyota ilmoittivat vuonna 2017 aikeestaan kehittää yhdessä Linux-pohjainen alusta autoihin. Audi on siirtynyt Linux-pohjaiseen Android Auto -alustaan.\r\n\r\nLinuxista on myös UClinux-versio mikrokontrollereille , joissa ei ole muistinhallintayksikköä.', 8, 1, '2018-02-09 18:34:34'),
(71, 'Mistä tulee Linuxin nimi?', 'Maksim', 'maksim.ilmast@yandex.com', 'Nimi ”Linux” tulee Linux-ytimestä, jonka alun perin kehitti Linus Torvalds vuonna 1991.', 8, 1, '2018-02-09 18:39:23'),
(72, 'What does a database mean?', 'Maksim', 'maksim.ilmast@yandex.com', 'A database is an organized collection of data, stored and accessed electronically. Database designers typically organize the data to model aspects of reality in a way that supports processes requiring information, such as (for example) modelling the availability of rooms in hotels in a way that supports finding a hotel with vacancies.', 10, 1, '2018-02-09 18:42:24'),
(73, 'What is the function of computer network?', 'Maksim', 'maksim.ilmast@yandex.com', 'This branch of computer science aims to manage networks between computers worldwide.', 1, 1, '2018-02-09 18:44:07'),
(86, 'Mistä aineista sähköjohdot yleensä tehdään?', 'test', 'test@test.com', 'Sähköjohdot tehdään yleensä kuparista tai alumiinista ja ne eristetään muovi- tai kumieristevaipalla.', 13, 1, '2018-07-18 18:07:33'),
(87, 'Mikä on sähköjohdon historia?', 'test', 'test@test.com', 'Ensimmäisenä sähkön johtuvuusominaisuuden havaitsi saksalainen Otto von Guericke 1600-luvulla. Hän ei kuitenkaan ymmärtänyt löytönsä merkitystä. Gray huomasi sähkönjohtavuuden hankaussähköä tuottavan lasiputken kanssa tehtyjen kokeidensa yhteydessä. Hän yhdisti lasiputken pellavalankoihin ja myöhemmin silkkilankoihin, joita pitkin sähköä voitiin siirtää. Gray kokeili monia aineita ja huomasi toisten esineiden kelpaavan johtimiksi ja toisten eristeiksi. Eristeet osoittautuvat samoiksi kuin aiemmin William Gilbertin määrittelemät sähköiset aineet, joita hankaamalla syntyi sähköisiä ilmiöitä.', 13, 1, '2018-07-18 18:09:20'),
(88, 'Mistä riippuu kaapelin virrankesto?', 'test', 'test@test.com', 'Kaapelin virrankesto riippuu poikkipinta-alasta - tavanomaisissa olosuhteissa 1,5 mm²:n kuparijohdin kestää noin 10 A:n virran.', 13, 1, '2018-07-18 18:10:24'),
(89, 'Missä mikro-ohjaimia käytetään?', 'test', 'test@test.com', 'Mikro-ohjaimia käytetään sulautetuissa järjestelmissä, eli melkeinpä kaikissa taskulamppua monimutkaisemmissa elektroniikkalaitteissa.', 14, 1, '2018-07-18 18:15:56'),
(90, 'What was the first microprocessor?', 'test', 'test@test.com', 'The first microprocessor was the 4-bit Intel 4004 released in 1971, with the Intel 8008 and other more capable microprocessors becoming available over the next several years. However, both processors required external chips to implement a working system, raising total system cost, and making it impossible to economically computerize appliances.', 14, 1, '2018-07-18 18:18:07'),
(91, 'What is Firmware?', 'test', 'test@test.com', 'The earliest microcontrollers used mask ROM to store firmware. Later microcontrollers (such as the early versions of the Freescale 68HC11 and early PIC microcontrollers) had EPROM memory, which used a translucent window to allow erasure via UV light, while production versions had no such window, being OTP (one-time-programmable). Firmware updates were equivalent to replacing the microcontroller itself, thus many products were not upgradeable.\r\n\r\nThe Microchip PIC16C84, introduced in 1993, was the first microcontroller to use EEPROM to store firmware. In the same year, Atmel introduced the first microcontroller using NOR Flash memory to store firmware. Today\'s microcontrollers almost exclusively use flash memory, with a few models using FRAM, and some ultra-low-cost parts still use OTP or Mask-ROM.', 14, 1, '2018-07-18 18:18:45'),
(92, 'Mitä tarkoittaa ohjelmointi?', 'test', 'test@test.com', 'Ohjelmointi tarkoittaa tietokoneelle tai vastaavalle laitteelle jollakin tavalla, tyypillisesti kirjoittamalla, annettavia toimintaohjeita formaalilla kielellä.', 9, 1, '2018-07-18 18:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `suggestion` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`) VALUES
(4, 'test@test.com', 'test', '098f6bcd4621d373cade4e832627b4f6'),
(5, 'user@gmail.com', 'user', '901aa19ce830fbf32cae9866bf0db409');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
