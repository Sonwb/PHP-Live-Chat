-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Nis 2022, 16:01:27
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `chat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `livechat`
--

CREATE TABLE `livechat` (
  `user_id` int(11) NOT NULL,
  `isim` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` text NOT NULL,
  `client` text NOT NULL,
  `yetki` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `livechat`
--

INSERT INTO `livechat` (`user_id`, `isim`, `email`, `ip`, `client`, `yetki`) VALUES
(1, 'umut', 'umut', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'müsteri'),
(2, 'Admin', 'destek@hizligetir.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36 OPR/86.0.4363.23', 'ceo');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `send_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages_sub`
--

CREATE TABLE `messages_sub` (
  `id` int(11) NOT NULL,
  `messagesid` int(11) NOT NULL,
  `yazi` text NOT NULL,
  `tarih` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `messages_sub`
--

INSERT INTO `messages_sub` (`id`, `messagesid`, `yazi`, `tarih`, `user_id`) VALUES
(1, 1, 'e', '2022-04-24', 1),
(2, 1, 'naber', '2022-04-24', 2),
(3, 1, 'iyidir', '2022-04-24', 1),
(4, 1, 'tm', '2022-04-24', 2),
(5, 1, 'tm', '2022-04-24', 1),
(6, 1, 'json deneme', '2022-04-24', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `livechat`
--
ALTER TABLE `livechat`
  ADD PRIMARY KEY (`user_id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages_sub`
--
ALTER TABLE `messages_sub`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `livechat`
--
ALTER TABLE `livechat`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `messages_sub`
--
ALTER TABLE `messages_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
