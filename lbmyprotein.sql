-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 10, 2025 alle 09:49
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbmyprotein`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrelli`
--

CREATE TABLE `carrelli` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prodotto_id` int(11) NOT NULL,
  `quantita` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrelli`
--

INSERT INTO `carrelli` (`id`, `user_id`, `prodotto_id`, `quantita`) VALUES
(92, 15, 16, 1),
(93, 14, 4, 3),
(94, 24, 5, 3),
(95, 24, 15, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `prezzo` decimal(10,2) NOT NULL,
  `immagine` varchar(255) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `descrizione`, `prezzo`, `immagine`, `categoria`) VALUES
(4, 'CREATINA MONOIDRATO', '', 19.99, 'immagini/integrazione/creatina.jpg', 'Nutrizione'),
(5, 'MULTIVITAMINICO Whey', '', 15.99, 'immagini/integrazione/multivitaminico.jpg', 'Nutrizione'),
(6, 'OMEGA-3', 'Gli omega-3 sono acidi grassi essenziali che il corpo non produce da solo, per cui è necessario ottenerli dall\'alimentazione. Si trovano naturalmente nell\'olio di pesce, ciò significa che può essere difficile ottenerne una quantità sufficiente soltanto dall\'alimentazione.', 9.99, 'immagini/integrazione/omega3.jpg', 'Nutrizione'),
(7, 'T-SHIRT SPORTIVA', '', 23.99, 'immagini/active-wear/t-shirt_men.jpg', 'Activewear'),
(8, 'CANOTTA SPORTIVA MEN', '', 19.99, 'immagini/active-wear/canotta_men.jpg', 'Activewear'),
(9, 'PANTALONCINI SPORTIVI', '', 29.99, 'immagini/active-wear/shorts_men.jpg', 'Activewear'),
(10, 'BARRETTA PROTEICA', '', 16.99, 'immagini/snak/protein_bar.jpg', 'SnackDrink'),
(11, 'BROWNIE PROTEICO', '', 16.99, 'immagini/snak/protein_cookie.jpg', 'SnackDrink'),
(12, 'COOKIE PROTEICO', '', 28.99, 'immagini/snak/protein_brownie.jpg', 'SnackDrink'),
(13, 'MISCELA PRE-WORKOUT', '', 20.99, 'immagini/performance/pre_wo.jpg', 'Performance'),
(14, 'BCAA ESSENZIALI', '', 9.99, 'immagini/performance/bcaa.jpg', 'Performance'),
(15, 'ENERGY GEL', '', 22.99, 'immagini/performance/energy_gel.jpg', 'Performance'),
(16, 'IMPACT WHEY PROTEIN', '', 29.99, 'immagini/proteine/impact_whey_protein.jpg', 'Proteine'),
(17, 'IMPACT WHEY ISOLATE', '', 29.99, 'immagini/proteine/impact_whey_isolate.jpg', 'Proteine'),
(18, 'VEGAN PROTEIN', '', 26.99, 'immagini/proteine/vegan_protein.jpg', 'Alimentazione vegana'),
(29, 'BCAA ESSENZIALI', '', 9.99, 'immagini/performance/bcaa.jpg', 'Performance'),
(30, 'ENERGY GEL', '', 22.99, 'immagini/performance/energy_gel.jpg', 'Performance');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `username`, `password`, `email`) VALUES
(14, 'luigi', '$2y$10$yUXCX80gvyg6orLYkMzmUeBMH5aJ5k1M8teiBqv16Rh8lXHfXQegi', 'luigi@gmail.com'),
(15, 'armando', '$2y$10$qMHpr730yruH0tclUpN6QeXYyv97X9ejMvA9TXGnUChi6t93l7f4q', 'buscemilu@gmail.com'),
(16, 'buscemir', '$2y$10$/t.vc9U1sULSZ.6kKnuCw.PeVDH.Hfkd17h2uZKSnySiuevfKuYH6', 'buscemir@gmail.com'),
(19, 'luigi123', '$2y$10$x3fRgt9E5FORVeLqJvW7D.rPFpdmgKjRMNVZYfx8l3iS2FznbK4ry', 'luigi@gmail.com'),
(20, 'giggi', '$2y$10$t5uXB.SbelU1ZlQWyTaa9.tphh4BDIufH.4M5ciC8Rm861dZZULJS', 'luigi@gmail.com'),
(21, 'bungaboy24', '$2y$10$UN5U5uHxM.oLlLMA2kBKruqF4CTYgvK4V24cOe22oNe0UJ4XGv5ui', 'trabelsimanuel62@gmail.com'),
(22, 'TeaLaBionda01', '$2y$10$.U4U7u0YibjAcXjsidU1tenOrtcByc7fAR9b0A3ahF2SE4/4lpotS', 'teaincarbone@gmail.com'),
(24, 'prova', '$2y$10$f6rULdtOsd8vnfgBqTilEuAXi3dQaegsJCquVUEj0p2a9eAPd.9sG', 'prova@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrelli`
--
ALTER TABLE `carrelli`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_carrello` (`user_id`,`prodotto_id`),
  ADD KEY `prodotto_id` (`prodotto_id`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrelli`
--
ALTER TABLE `carrelli`
  ADD CONSTRAINT `carrelli_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utenti` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrelli_ibfk_2` FOREIGN KEY (`prodotto_id`) REFERENCES `prodotti` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
