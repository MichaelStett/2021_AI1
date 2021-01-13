-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2021, 22:31
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `arturino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contractor`
--

CREATE TABLE `contractor` (
  `vatID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `contractor`
--

INSERT INTO `contractor` (`vatID`, `name`) VALUES
(5, 'drugiDD'),
(1, 'pierwszaFVKon'),
(6, 'trzeciDD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `equipment`
--

CREATE TABLE `equipment` (
  `inventoryNumber` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serialNumber` varchar(128) NOT NULL,
  `purchaseDate` date NOT NULL,
  `warrantyTo` date NOT NULL,
  `amountNet` double NOT NULL,
  `notes` text NOT NULL,
  `assignedFor` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoicepurchase`
--

CREATE TABLE `invoicepurchase` (
  `id` int(11) NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `addDate` date NOT NULL,
  `vatID` int(11) NOT NULL,
  `amountNet` double NOT NULL,
  `amountTax` double NOT NULL,
  `amountGross` double NOT NULL,
  `amountNetCurrencyValue` double NOT NULL,
  `amountNetCurrency` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `invoicepurchase`
--

INSERT INTO `invoicepurchase` (`id`, `invoiceNumber`, `addDate`, `vatID`, `amountNet`, `amountTax`, `amountGross`, `amountNetCurrencyValue`, `amountNetCurrency`) VALUES
(1, '334455', '2020-12-17', 1, 12.34, 23.45, 34.56, 45.67, 1),
(5, '45645645', '2020-12-08', 1, 456, 67787, 4545, 2342, 2),
(6, '12313123', '2020-12-10', 6, 4555, 45454, 65656, 343434, 1),
(7, '99999999', '2020-12-01', 5, 22, 33, 44, 22, 0),
(8, '7887878', '2020-12-10', 6, 45, 77, 66, 11, 3),
(9, '1', '2021-01-15', 5, 1, 1, 1, 0, 1),
(10, '1', '2021-01-15', 1, 1, 1, 1, 0, 1),
(11, '5', '2021-01-16', 6, 5, 5, 5, 0, 4),
(12, '5', '2021-01-14', 5, 5, 5, 5, 0, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoicesale`
--

CREATE TABLE `invoicesale` (
  `id` int(11) NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `addDate` date NOT NULL,
  `vatID` int(11) NOT NULL,
  `amountNet` double NOT NULL,
  `amountTax` double NOT NULL,
  `amountGross` double NOT NULL,
  `amountNetCurrencyValue` double NOT NULL,
  `amountNetCurrency` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `invoicesale`
--

INSERT INTO `invoicesale` (`id`, `invoiceNumber`, `addDate`, `vatID`, `amountNet`, `amountTax`, `amountGross`, `amountNetCurrencyValue`, `amountNetCurrency`) VALUES
(1, '334455', '2020-12-17', 1, 12.34, 23.45, 34.56, 45.67, 1),
(5, '45645645', '2020-12-08', 1, 456, 67787, 4545, 2342, 2),
(6, '12313123', '2020-12-10', 6, 4555, 45454, 65656, 343434, 1),
(7, '99999999', '2020-12-01', 5, 22, 33, 44, 22, 0),
(8, '7887878', '2020-12-10', 6, 45, 77, 66, 11, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `license`
--

CREATE TABLE `license` (
  `inventoryNumber` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `serialNumber` varchar(128) NOT NULL,
  `purchaseDate` date NOT NULL,
  `supportTo` date NOT NULL,
  `validTo` date NOT NULL,
  `notes` text NOT NULL,
  `assignedFor` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `otherdocuments`
--

CREATE TABLE `otherdocuments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `numberOfPage` int(11) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `password`) VALUES
(1, 'admin', 'adminFirstName', 'adminLastName', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`vatID`),
  ADD UNIQUE KEY `nazwa` (`name`);

--
-- Indeksy dla tabeli `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`inventoryNumber`),
  ADD UNIQUE KEY `assignedFor` (`assignedFor`),
  ADD UNIQUE KEY `invoiceId` (`invoiceId`);

--
-- Indeksy dla tabeli `invoicepurchase`
--
ALTER TABLE `invoicepurchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vatID` (`vatID`) USING BTREE;

--
-- Indeksy dla tabeli `invoicesale`
--
ALTER TABLE `invoicesale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vatID` (`vatID`) USING BTREE;

--
-- Indeksy dla tabeli `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`inventoryNumber`),
  ADD UNIQUE KEY `assignedFor` (`assignedFor`),
  ADD UNIQUE KEY `invoiceId` (`invoiceId`);

--
-- Indeksy dla tabeli `otherdocuments`
--
ALTER TABLE `otherdocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `contractor`
--
ALTER TABLE `contractor`
  MODIFY `vatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `equipment`
--
ALTER TABLE `equipment`
  MODIFY `inventoryNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `invoicepurchase`
--
ALTER TABLE `invoicepurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `invoicesale`
--
ALTER TABLE `invoicesale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `license`
--
ALTER TABLE `license`
  MODIFY `inventoryNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `otherdocuments`
--
ALTER TABLE `otherdocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`assignedFor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `equipment_ibfk_2` FOREIGN KEY (`invoiceId`) REFERENCES `invoicepurchase` (`id`);

--
-- Ograniczenia dla tabeli `invoicepurchase`
--
ALTER TABLE `invoicepurchase`
  ADD CONSTRAINT `invoicepurchase_ibfk_1` FOREIGN KEY (`vatID`) REFERENCES `contractor` (`vatID`);

--
-- Ograniczenia dla tabeli `invoicesale`
--
ALTER TABLE `invoicesale`
  ADD CONSTRAINT `invoicesale_ibfk_1` FOREIGN KEY (`vatID`) REFERENCES `contractor` (`vatID`);

--
-- Ograniczenia dla tabeli `license`
--
ALTER TABLE `license`
  ADD CONSTRAINT `license_ibfk_1` FOREIGN KEY (`assignedFor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `license_ibfk_2` FOREIGN KEY (`invoiceId`) REFERENCES `invoicepurchase` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
