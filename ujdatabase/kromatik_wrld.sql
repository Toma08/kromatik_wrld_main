-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 09. 13:32
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `kromatik_wrld`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `index_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `date`, `index_pic`) VALUES
(1, ' WARNING-FIRST STAGE ', '2024. március 1-jén az Akvárium Klubban izgalmas és lendületes hangulat uralkodott a \"First Stage\" elnevezésű eseményen, amelyet a Warning Events és az On The Low szervezett közösen. Ez a rendezvény kifejezetten a feltörekvő magyar előadók bemutatkozását tűzte ki célul, és ezen az estén számos tehetséges művész kapott lehetőséget, hogy színpadra lépjen és megmutassa tehetségét.\r\n\r\nAz este során a klub hangulata vibrált az új zenei felfedezések iránti izgalomtól. A közönség lelkesen fogadta az első fellépőket, akik különféle műfajokban és stílusokban képviseltették magukat. A színpadon egymást követték a friss hangzások, a rap, a rock, a elektronikus zene és más zenei irányzatok képviselői.\r\n\r\nAz eseménynek köszönhetően új nézőpontok nyíltak meg a hazai zenei színtéren, miközben a közönség élvezte a kísérletező kedvet és az új hangokat. A \"First Stage\" a tehetség és az innováció ünnepe volt, amely inspiráló és emlékezetes pillanatokat teremtett mind a fellépők, mind a közönség számára.\r\n\r\nAz Akvárium Klub színpada továbbra is kiemelt helye maradt a zenei kreativitásnak és a fiatal tehetségek megmutatkozásának Budapesten. A \"First Stage\" esemény sikere biztató jel arra, hogy a magyar zenei színtér folyamatosan bővül és fejlődik, és továbbra is támogatja az új és izgalmas előadókat.', 'AKVÁRIUM KLUB,LOKÁL', '2024-03-01', 'https://firebasestorage.googleapis.com/v0/b/tempkromatik.appspot.com/o/index_photos%2Fwarning_index.png?alt=media&token=b3ca56f7-a97d-491e-b698-481daea261e2');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Benji', 'benji@bejni.hu', '19815bdf59f08c194d108a0e004363a9511e2174', '1'),
(2, 'Benji', 'benji@bejni.hu', '19815bdf59f08c194d108a0e004363a9511e2174', '1'),
(3, 'tom', 'tom@tom.hu', '26d58cf3df0903a2298788b72fced5bca9ea7144', '1');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
