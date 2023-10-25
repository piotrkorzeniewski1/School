-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Gru 2020, 11:04
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `demotywatory`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `demotywator`
--

CREATE TABLE `demotywator` (
  `id` int(255) NOT NULL,
  `id_uzytkownika` int(255) NOT NULL,
  `nazwa_autora` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data_dodania` date NOT NULL,
  `opis` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `zdjecie` text NOT NULL,
  `id_kategori` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `demotywator`
--

INSERT INTO `demotywator` (`id`, `id_uzytkownika`, `nazwa_autora`, `data_dodania`, `opis`, `zdjecie`, `id_kategori`) VALUES
(17, 1, 'test', '2020-12-08', 'Kotek', 'https://img14.dmty.pl//uploads/202012/1606803222_eziqhg_600.jpg', 4),
(18, 7, 'franko', '2020-12-08', 'Niestety', 'https://img5.dmty.pl//uploads/202012/1607346776_nmniz6_600.jpg', 4),
(23, 4, 'adam123', '2020-12-08', 'Przykro mi', 'https://img17.demotywatoryfb.pl//uploads/202012/1607420205_o6qens_600.jpg', 5),
(24, 4, 'adam123', '2020-12-08', 'Idą święta haha', 'https://img8.dmty.pl//uploads/202012/1607363518_yrorg1_600.jpg', 2),
(25, 5, 'bolek', '2020-12-08', 'Flip i Flap', 'https://img21.demotywatoryfb.pl//uploads/202012/1607354931_1yuo2f_600.jpg', 2),
(26, 5, 'bolek', '2020-12-08', 'wow', 'https://img21.demotywatoryfb.pl//uploads/202012/1607333662_mkalcn_600.jpg', 6),
(27, 6, 'jarek2', '2020-12-08', 'Zabawne', 'https://img20.dmty.pl//uploads/202012/1607431699_7d791j_600.jpg', 2),
(28, 6, 'jarek2', '2020-12-08', ':(', 'https://img18.dmty.pl//uploads/202012/1607416216_uxgwmz_600.jpg', 5),
(29, 2, 'adam', '2020-12-08', 'Haha', 'https://img4.dmty.pl//uploads/202012/1607362762_rz2irw_600.jpg', 2),
(31, 2, 'adam', '2020-12-13', 'Wirus', 'https://img5.dmty.pl//uploads/202012/1607371781_2fcaaj_600.jpg', 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(255) NOT NULL,
  `nazwa_kategori` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa_kategori`) VALUES
(2, 'smieszne'),
(3, 'niesamowite'),
(4, 'straszne'),
(5, 'smutne'),
(6, 'ciekawe');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(255) NOT NULL,
  `nick` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `acp` int(1) NOT NULL,
  `czy_ban` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `nick`, `password`, `email`, `acp`, `czy_ban`) VALUES
(1, 'test', 'test', 'test@wp.pl', 1, 0),
(2, 'adam', 'qwerty', 'adam@wp.pl', 0, 0),
(4, 'adam123', 'asdfg', 'adas2@wp.pl', 0, 0),
(5, 'bolek', 'lolek', 'bolekk@wp.pl', 0, 0),
(6, 'jarek2', 'jarek', 'jareczek@wp.pl', 0, 1),
(7, 'franko', 'franko', 'franko@wp.pl', 0, 0),
(8, 'kubas', 'kubas', 'kubaa@wp.pl', 0, 0),
(9, 'tost', 'tost', 'tost@wp.pl', 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `demotywator`
--
ALTER TABLE `demotywator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `demotywator`
--
ALTER TABLE `demotywator`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `demotywator`
--
ALTER TABLE `demotywator`
  ADD CONSTRAINT `demotywator_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategorie` (`id`),
  ADD CONSTRAINT `demotywator_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
