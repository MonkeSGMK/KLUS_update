-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 01:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spul`
--

-- --------------------------------------------------------

--
-- Table structure for table `greedschap`
--

CREATE TABLE `greedschap` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `aantal` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `greedschap`
--

INSERT INTO `greedschap` (`id`, `naam`, `aantal`, `image_path`) VALUES
(4, 'bahcos', 0, 'assets/tools/bahcos.jpg'),
(5, 'boren van gaten', 1, 'assets/tools/boren_van_gaten.jpg'),
(6, 'decoupeerzaag', 3, 'assets/tools/decoupeerzaag.jpg'),
(7, 'diverse tangen', 2, 'assets/tools/diverse_tangen.jpg'),
(8, 'figuurzagen', 0, 'assets/tools/figuurzagen.jpg'),
(9, 'hamers', 0, 'assets/tools/hamers.jpg'),
(10, 'hoeklinialen', 0, 'assets/tools/hoeklinialen.jpg'),
(11, 'houtklemmen', 0, 'assets/tools/houtklemmen.jpg'),
(12, 'houtschaven', 0, 'assets/tools/houtschaven.jpg'),
(13, 'inbussleutel', 1, 'assets/tools/inbussleutel.jpg'),
(14, 'klemmen', 0, 'assets/tools/klemmen.jpg'),
(15, 'kraspennen', 0, 'assets/tools/kraspennen.jpg'),
(16, 'linialen', 0, 'assets/tools/linialen.jpg'),
(17, 'meetlint', 0, 'assets/tools/meetlint.jpg'),
(18, 'metaalzagen', 0, 'assets/tools/metaalzagen.jpg'),
(19, 'nietpistolen', 0, 'assets/tools/nietpistolen.jpg'),
(20, 'nijptangen', 0, 'assets/tools/nijptangen.jpg'),
(21, 'ratelsleutels', 0, 'assets/tools/ratelsleutels.jpg'),
(22, 'rolmaten', 0, 'assets/tools/rolmaten.jpg'),
(23, 'schrijfhaken', 0, 'assets/tools/schrijfhaken.jpg'),
(24, 'schroefmachines', 0, 'assets/tools/schroefmachines.jpg'),
(25, 'schroevendraaiers', 0, 'assets/tools/schroevendraaiers.jpg'),
(26, 'schuifmaten', 0, 'assets/tools/schuifmaten.jpg'),
(27, 'snijmatten', 0, 'assets/tools/snijmatten.jpg'),
(28, 'spijkers en schroeven', 0, 'assets/tools/spijkers_en_schroeven.jpg'),
(29, 'staalborstels', 0, 'assets/tools/staalborstels.jpg'),
(30, 'stanleymessen', 0, 'assets/tools/stanleymessen.jpg'),
(31, 'steeksleutels', 0, 'assets/tools/steeksleutels.jpg'),
(32, 'stoffer en blik', 0, 'assets/tools/stoffer_en_blik.jpg'),
(33, 'tangen', 0, 'assets/tools/tangen.jpg'),
(34, 'vijlen', 0, 'assets/tools/vijlen.jpg'),
(35, 'waterpas', 0, 'assets/tools/waterpas.jpg'),
(36, 'zagen', 0, 'assets/tools/zagen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `materiaal`
--

CREATE TABLE `materiaal` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `aantal` int(11) NOT NULL,
  `status` enum('voldoende','bijna op','op') DEFAULT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materiaal`
--

INSERT INTO `materiaal` (`id`, `naam`, `aantal`, `status`, `image_path`) VALUES
(5, 'Platkop schroevendraaiers', 2, 'voldoende', 'assets/materialen/Platkop_schroevendraaiers.jpg'),
(6, 'Electro schroevendraaier', 3, NULL, 'assets/materialen/Electro_schroevendraaier.jpg'),
(7, 'Kruiskop schroevendraaiers', 1, NULL, 'assets/materialen/Kruiskop_schroevendraaiers.jpg'),
(8, 'Plastic hoesjes', 2, NULL, 'assets/materialen/Plastic_hoesjes.jpg'),
(9, 'Knikkers', 2, NULL, 'assets/materialen/Knikkers.jpg'),
(10, 'Wattenstaafjes', 2, NULL, 'assets/materialen/Wattenstaafjes.jpg'),
(11, 'Houten figuren', 3, NULL, 'assets/materialen/Houten_figuren.jpg'),
(12, 'LEDS', 1, NULL, 'assets/materialen/LEDS.jpg'),
(13, 'Toetsen', 3, NULL, 'assets/materialen/Toetsen.jpg'),
(14, 'Post it', 3, NULL, 'assets/materialen/Post_it.jpg'),
(15, 'Spiegels klein', 2, NULL, 'assets/materialen/Spiegels_klein.jpg'),
(16, 'Garen', 1, NULL, 'assets/materialen/Garen.jpg'),
(17, 'Tangen', 0, NULL, 'assets/materialen/Tangen.jpg'),
(19, 'Satestokjes klein', 0, NULL, 'assets/materialen/Satestokjes_klein.jpg'),
(20, 'Houten knijpers', 3, NULL, 'assets/materialen/Houten_knijpers.jpg'),
(21, 'Houtjes', 3, NULL, 'assets/materialen/Houtjes.jpg'),
(22, 'Klittenband', 3, NULL, 'assets/materialen/Klittenband.jpg'),
(23, 'Kleur krijtjes', 0, NULL, 'assets/materialen/Kleur_krijtjes.jpg'),
(24, 'Kleur waxkrijten', 0, NULL, 'assets/materialen/Kleur_waxkrijten.jpg'),
(25, 'Waxine lichtjes', 0, NULL, 'assets/materialen/Waxine_lichtjes.jpg'),
(26, 'Gluesticks', 0, NULL, 'assets/materialen/Gluesticks.jpg'),
(27, 'Schroevendraaiers', 0, NULL, 'assets/materialen/Schroevendraaiers.jpg'),
(28, 'Doppen', 0, NULL, 'assets/materialen/Doppen.jpg'),
(29, 'Stanleymessen', 3, NULL, 'assets/materialen/Stanleymessen.jpg'),
(30, 'Keramiek', 3, NULL, 'assets/materialen/Keramiek.jpg'),
(31, 'Rietjes', 0, NULL, 'assets/materialen/Rietjes.jpg'),
(32, 'Pingpongballen', 0, NULL, 'assets/materialen/Pingpongballen.jpg'),
(33, 'Cocktailprikkers', 0, NULL, 'assets/materialen/Cocktailprikkers.jpg'),
(34, 'Kurk', 3, NULL, 'assets/materialen/Kurk.jpg'),
(35, 'Buizen', 3, NULL, 'assets/materialen/Buizen.jpg'),
(36, 'Buizen groot', 0, NULL, 'assets/materialen/Buizen_groot.jpg'),
(37, 'Lijmpistolen', 0, NULL, 'assets/materialen/Lijmpistolen.jpg'),
(38, 'Gehoorbescherming', 0, NULL, 'assets/materialen/Gehoorbescherming.jpg'),
(39, 'Spiegels', 2, NULL, 'assets/materialen/Spiegels.jpg'),
(40, 'Satestokjes', 0, NULL, 'assets/materialen/Satestokjes.jpg'),
(41, 'Ijslollystokjes', 0, NULL, 'assets/materialen/Ijslollystokjes.jpg'),
(42, 'Crêpepapier', 0, NULL, 'assets/materialen/Crêpepapier.jpg'),
(43, 'Plastic slangen', 0, NULL, 'assets/materialen/Plastic_slangen.jpg'),
(44, 'Tiewraps', 0, NULL, 'assets/materialen/Tiewraps.jpg'),
(45, 'Föhns', 3, NULL, 'assets/materialen/Föhns.jpg'),
(46, 'Schuurpapier', 3, NULL, 'assets/materialen/Schuurpapier.jpg'),
(47, 'Blik', 0, NULL, 'assets/materialen/Blik.jpg'),
(48, 'Wcrollen', 0, NULL, 'assets/materialen/Wcrollen.jpg'),
(49, 'Plastic', 0, NULL, 'assets/materialen/Plastic.jpg'),
(50, 'Plastic bakken', 0, NULL, 'assets/materialen/Plastic_bakken.jpg'),
(51, 'Kwasten', 0, NULL, 'assets/materialen/Kwasten.jpg'),
(52, 'Houten schijven', 0, NULL, 'assets/materialen/Houten_schijven.jpg'),
(53, 'Vinyl', 0, NULL, 'assets/materialen/Vinyl.jpg'),
(54, 'Ijzeren platen', 0, NULL, 'assets/materialen/Ijzeren_platen.jpg'),
(55, 'Handschoenen', 0, NULL, 'assets/materialen/handschoenen.jpg'),
(56, 'Brandhout', 0, NULL, 'assets/materialen/Brandhout.jpg'),
(57, 'Electrokabels', 3, NULL, 'assets/materialen/Electrokabels.jpg'),
(58, 'Spaken', 0, NULL, 'assets/materialen/Spaken.jpg'),
(59, 'Bekers', 0, NULL, 'assets/materialen/Bekers.jpg'),
(60, 'Gekleurd papier', 0, NULL, 'assets/materialen/Gekleurd_papier.jpg'),
(61, 'Passer', 0, NULL, 'assets/materialen/Passer.jpg'),
(62, 'Puntenslijpers', 0, NULL, 'assets/materialen/Puntenslijpers.jpg'),
(63, 'Zakjes', 0, NULL, 'assets/materialen/Zakjes.jpg'),
(64, 'Elastiekjes groot', 0, NULL, 'assets/materialen/Elastiekjes_groot.jpg'),
(65, 'Elastiekjes', 0, NULL, 'assets/materialen/Elastiekjes.jpg'),
(66, 'Paperclips', 0, NULL, 'assets/materialen/Paperclips.jpg'),
(67, 'Veiligheidsspelden groot', 0, NULL, 'assets/materialen/Veiligheidsspelden_groot.jpg'),
(68, 'Veiligheidsspelden klein', 0, NULL, 'assets/materialen/Veiligheidsspelden_klein.jpg'),
(69, 'Nylon draad', 0, NULL, 'assets/materialen/Nylon_draad.jpg'),
(70, 'Knopen', 0, NULL, 'assets/materialen/Knopen.jpg'),
(71, 'Kralen', 0, NULL, 'assets/materialen/Kralen.jpg'),
(72, 'Spijkers', 0, NULL, 'assets/materialen/Spijkers.jpg'),
(73, 'IJzerwaar', 0, NULL, 'assets/materialen/IJzerwaar.jpg'),
(74, 'AAA batterijen', 0, NULL, 'assets/materialen/AAA_batterijen.jpg'),
(75, 'Haarbandjes', 0, NULL, 'assets/materialen/Haarbandjes.jpg'),
(76, 'Punaises', 0, NULL, 'assets/materialen/Punaises.jpg'),
(77, 'Houtskool', 0, NULL, 'assets/materialen/Houtskool.jpg'),
(78, 'Klei', 0, NULL, 'assets/materialen/Klei.jpg'),
(79, 'Krijt', 3, NULL, 'assets/materialen/Krijt.jpg'),
(80, 'Nietjes', 0, NULL, 'assets/materialen/Nietjes.jpg'),
(81, 'Nietpistool nietjes', 3, NULL, 'assets/materialen/Nietpistool_nietjes.jpg'),
(82, 'Calculators', 0, NULL, 'assets/materialen/Calculators.jpg'),
(83, 'Markeerstiften', 0, NULL, 'assets/materialen/Markeerstiften.jpg'),
(84, 'Sleutels', 0, NULL, 'assets/materialen/Sleutels.jpg'),
(85, 'Gummen', 0, NULL, 'assets/materialen/Gummen.jpg'),
(86, 'Splitpen groot', 0, NULL, 'assets/materialen/Splitpen_groot.jpg'),
(87, 'Splitpennen', 0, NULL, 'assets/materialen/Splitpennen.jpg'),
(88, 'Stempels', 0, NULL, 'assets/materialen/Stempels.jpg'),
(89, 'Zaagsel', 0, NULL, 'assets/materialen/Zaagsel.jpg'),
(90, 'Gordijnhaken', 0, NULL, 'assets/materialen/Gordijnhaken.jpg'),
(91, 'Bouten', 0, NULL, 'assets/materialen/Bouten.jpg'),
(92, 'Moeren', 0, NULL, 'assets/materialen/Moeren.jpg'),
(93, 'Schroeven', 0, NULL, 'assets/materialen/Schroeven.jpg'),
(94, 'Ijzer overige', 0, NULL, 'assets/materialen/Ijzer_overige.jpg'),
(95, 'Lijm', 0, NULL, 'assets/materialen/Lijm.jpg'),
(96, 'Schilderstape', 0, NULL, 'assets/materialen/Schilderstape.jpg'),
(97, 'Plakband', 0, NULL, 'assets/materialen/Plakband.jpg'),
(98, 'Niettang', 0, NULL, 'assets/materialen/Niettang.jpg'),
(99, 'Scharen', 0, NULL, 'assets/materialen/Scharen.jpg'),
(100, 'Kleine scharen', 0, NULL, 'assets/materialen/Kleine_scharen.jpg'),
(101, 'Ijzerdraad', 0, NULL, 'assets/materialen/Ijzerdraad.jpg'),
(102, 'Stiften', 0, NULL, 'assets/materialen/Stiften.jpg'),
(103, 'Kleurpotloden', 0, NULL, 'assets/materialen/Kleurpotloden.jpg'),
(104, 'Potloden grijs', 0, NULL, 'assets/materialen/Potloden_grijs.jpg'),
(105, 'Pennen', 0, NULL, 'assets/materialen/Pennen.jpg'),
(106, 'Houtlijm', 0, NULL, 'assets/materialen/Houtlijm.jpg'),
(107, 'Duct tape', 0, NULL, 'assets/materialen/Duct_tape.jpg'),
(108, 'Dubbelzijdig tape', 0, NULL, 'assets/materialen/Dubbelzijdig_tape.jpg'),
(109, 'Stukjes touw', 0, NULL, 'assets/materialen/Stukjes_touw.jpg'),
(110, 'Katoen', 0, NULL, 'assets/materialen/Katoen.jpg'),
(111, 'Bollen touw', 0, NULL, 'assets/materialen/Bollen_touw.jpg'),
(112, 'Zeilen', 1, NULL, 'assets/materialen/Zeilen.jpg'),
(113, 'Bewaarzakken', 0, NULL, 'assets/materialen/Bewaarzakken.jpg'),
(114, 'Kranten', 0, NULL, 'assets/materialen/Kranten.jpg'),
(115, 'Tijdschriften', 3, NULL, 'assets/materialen/Tijdschriften.jpg'),
(116, 'Papier', 0, NULL, 'assets/materialen/Papier.jpg'),
(117, 'Folie', 0, NULL, 'assets/materialen/Folie.jpg'),
(118, 'Kleurfolie', 0, NULL, 'assets/materialen/Kleurfolie.jpg'),
(119, 'Textiel', 0, NULL, 'assets/materialen/Textiel.jpg'),
(120, 'Binnenbanden', 0, NULL, 'assets/materialen/Binnenbanden.jpg'),
(121, 'Gekleurd papier', 0, NULL, 'assets/materialen/Gekleurd_papier.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `naam`, `wachtwoord`) VALUES
(1, 'test', 'icle'),
(2, 'admin', '$2y$10$8CcOUXLKalM07jjZf1hp2.E7Vr1IBdyxQJGRXrsrvfKDwc8c7jHbm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `greedschap`
--
ALTER TABLE `greedschap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materiaal`
--
ALTER TABLE `materiaal`
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
-- AUTO_INCREMENT for table `greedschap`
--
ALTER TABLE `greedschap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `materiaal`
--
ALTER TABLE `materiaal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
