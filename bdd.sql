-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 03, 2022 alle 17:55
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `annonces`
--

CREATE TABLE `annonces` (
  `annonceId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` double NOT NULL,
  `DATE` varchar(30) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `categorie` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `UPDATE_TIME` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `annonces`
--

INSERT INTO `annonces` (`annonceId`, `title`, `price`, `DATE`, `image`, `description`, `categorie`, `userId`, `UPDATE_TIME`) VALUES
(1, 'ps4', 30, '2022-04-09', 'marker2.png', 'pour pieces', 2, 14, '2022-06-01'),
(2, 'titre de l\'annonce 2', 48, '2022-05-15', 'pic2.png', 'texte de l\'annonce 2', 4, 16, NULL),
(3, 'titre de l\'annonce 3', 38, '2021-03-04', 'pic8.png', 'texte de l\'annonce 3', 3, 30, NULL),
(4, 'titre de l\'annonce 4', 58, '2022-01-04', 'pic4.png', 'texte de l\'annonce 4', 1, 30, NULL),
(5, 'titre de l\'annonce 5', 59.32, '2000-03-20', 'pic6.png', 'description de l\'annonce', 4, 30, NULL),
(6, 'titre de l\'annonce 6', 39.32, '1999-12-01', 'pic7.png', 'description de l\'annonce', 6, 16, NULL),
(7, 'titre de l\'annonce 7', 69.32, '2017-11-21', 'pic3.png', 'description de l\'annonce', 5, 16, NULL),
(8, 'titre de l\'annonce 8 ', 89.32, '2015-07-30', 'pic9.png', 'description de l\'annonce', 3, 16, NULL),
(9, 'titre de l\'annonce 9 ', 99.32, '2022-01-14', 'pic8.png', 'description de l\'annonce', 2, 16, NULL),
(10, 'titre de l\'annonce 10', 19.32, '2020-06-12', 'pic5.png', 'description de l\'annonce', 1, 14, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `NAME` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id`, `NAME`) VALUES
(1, 'Jouet'),
(2, 'Jeux'),
(3, 'Livres'),
(4, 'Bijoux'),
(5, 'Voitures'),
(6, 'Locations'),
(9, 'vêtements\n');

-- --------------------------------------------------------

--
-- Struttura della tabella `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `contact`
--

INSERT INTO `contact` (`id`, `nom`, `mail`, `telephone`, `message`) VALUES
(7, 'yasser ', 'yasser@gmail.com', '3519876282', 'j ai un probleme  '),
(8, 'obrian', 'dfghm@gmail.com', '1234567890', ' dfmhinjryeorwseajvnaiqemrbw0\'0\'vbr\'h\'jtrj\'fyg0wrht\'njr\'es\'hejt\'rt\'ersrh\' wr\'');

-- --------------------------------------------------------

--
-- Struttura della tabella `favoris`
--

CREATE TABLE `favoris` (
  `userId` int(11) NOT NULL,
  `annonceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `favoris`
--

INSERT INTO `favoris` (`userId`, `annonceId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 7),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(14, 8),
(14, 9),
(16, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `nom` varchar(11) NOT NULL,
  `prenom` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `mail`, `admin`, `nom`, `prenom`) VALUES
(1, 'ilyes', '$2y$10$RFfTkeN64D8zryF0qsC7ZeaqT0ZnLrcEXFmC3N52TPmHDPEOyBGmO', 'ilyes@gmail.com', 0, 'Sais', 'Ilyes'),
(14, 'yasser', '$2y$10$O9dPy/kaUqzHuKpa18phPO0uRsIdBigogXBo6ZqdGGeoxbvTnLtEO', 'yasser@gmail.com', 1, 'yasser', 'el mellali'),
(16, 'vahid', '$2y$10$RFfTkeN64D8zryF0qsC7ZeaqT0ZnLrcEXFmC3N52TPmHDPEOyBGmO', 'vahid@gmail.com', 1, 'tourang', 'vahid'),
(30, 'giacomino', '$2y$10$UuacxMuntrGRVnqfkyTQcOauGoNsf0sK5tKQF/8tMuLolnS7bfw.S', 'giacomo@gmail.com', 1, 'giacomino', 'giovanni');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`annonceId`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `userId` (`userId`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`userId`,`annonceId`),
  ADD KEY `annonceId` (`annonceId`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `annonces`
--
ALTER TABLE `annonces`
  MODIFY `annonceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Limiti per la tabella `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`annonceId`) REFERENCES `annonces` (`annonceId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
