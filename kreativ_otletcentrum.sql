-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Dec 03. 12:24
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kreativ_otletcentrum`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `atvetel`
--

CREATE TABLE `atvetel` (
  `id` int(11) NOT NULL,
  `atveteli_pont` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `atvetel`
--

INSERT INTO `atvetel` (`id`, `atveteli_pont`) VALUES
(2, 'Gyomro, Teszt utca 1'),
(3, 'Budapest Teszt utca 2');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termekek`
--

CREATE TABLE `termekek` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `termekek`
--

INSERT INTO `termekek` (`id`, `nev`, `ar`, `mennyiseg`) VALUES
(1, 'adventi_koszoru', 6500, 9),
(2, 'fagyongy', 300, 60),
(4, '', 0, 0),
(5, '', 0, 0),
(6, '', 0, 0),
(7, '', 0, 0),
(8, '', 0, 0),
(9, 'gyönyg', 2222, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek_leiras`
--

CREATE TABLE `termek_leiras` (
  `id` int(11) NOT NULL,
  `leiras` varchar(1000) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `termek_leiras`
--

INSERT INTO `termek_leiras` (`id`, `leiras`) VALUES
(2, 'sadasdas'),
(3, 'gyertya');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `atvetel`
--
ALTER TABLE `atvetel`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termekek`
--
ALTER TABLE `termekek`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `termek_leiras`
--
ALTER TABLE `termek_leiras`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `atvetel`
--
ALTER TABLE `atvetel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `termekek`
--
ALTER TABLE `termekek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `termek_leiras`
--
ALTER TABLE `termek_leiras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
