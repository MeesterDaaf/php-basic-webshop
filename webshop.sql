-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 mei 2019 om 14:59
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `id` int(5) NOT NULL,
  `gebruikersnaam` varchar(50) NOT NULL,
  `wachtwoord` varchar(40) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`id`, `gebruikersnaam`, `wachtwoord`, `rol`) VALUES
(1, 'bart', 'bart', 'medewerker'),
(2, 'david', 'david', 'medewerker'),
(3, 'henk', 'henk', 'klant');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `klant_id` int(5) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `geboortedatum` datetime DEFAULT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `game_aankoop` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`klant_id`, `voornaam`, `achternaam`, `geboortedatum`, `woonplaats`, `game_aankoop`) VALUES
(1, 'Henk', 'van Balen', '2000-05-18 00:00:00', 'Amsterdam', 6),
(2, 'Marloes', 'Bakker', '1999-12-12 00:00:00', 'Amsterdam', 4),
(3, 'Emma', 'da Silva', '2001-04-28 00:00:00', 'Amstelveen', 5),
(4, 'Mohammed', 'Atari', '1997-02-17 00:00:00', 'Amstelveen', 7),
(5, 'Piet', 'Pieters', '2001-04-28 00:00:00', 'Ouderkerk', 1),
(6, 'Johanna', 'Eduardo', '1995-09-02 00:00:00', 'Hoorn', 3),
(7, 'Angela ', 'Mohammed', '1997-05-17 00:00:00', 'Amstelveen', 9),
(8, 'Jan', 'Vermeer', '1998-02-01 00:00:00', 'Amsterdam', 4),
(9, 'Bert', 'Hendriks', '1994-05-14 00:00:00', 'Utrecht', 8),
(10, 'Marri', 'Janssen', '1972-02-15 00:00:00', 'Almere', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `game_id` int(5) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `uitgever` varchar(50) NOT NULL,
  `platform` varchar(20) NOT NULL,
  `prijs` decimal(5,2) NOT NULL,
  `voorraad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`game_id`, `titel`, `uitgever`, `platform`, `prijs`, `voorraad`) VALUES
(1, 'Need for Speed Payback', 'Electronic Arts', 'PS4', '27.50', 2),
(2, 'Need for Speed Payback', 'Electronic Arts', 'Xbox One', '31.00', 44),
(3, 'Need for Speed Payback', 'Electronic Arts', 'PC', '22.50', 18),
(4, 'Mario Kart 8 Deluxe', 'Nintendo', 'Switch', '54.99', 53),
(5, 'Zelda', 'Nintendo', 'Switch', '59.99', 3),
(6, 'Fifa 2018', 'Electronic Arts', 'OC', '29.99', 31),
(7, 'Fifa 2018', 'Electronic Arts', 'PS4', '29.99', 20),
(8, 'Fifa 2018', 'Electronic Arts', 'Xbox One', '29.99', 0),
(9, 'Fifa 2018', 'Electronic Arts', 'Switch', '29.99', 0),
(10, 'Rocket League', 'Warner Bros', 'PS4', '27.99', 20),
(11, 'Rocket League', 'Warner Bros', 'Xbox One', '27.99', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`game_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `klant_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `game_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
