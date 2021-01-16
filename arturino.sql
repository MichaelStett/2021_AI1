-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Sty 2021, 09:33
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

--
-- Zrzut danych tabeli `equipment`
--

INSERT INTO `equipment` (`inventoryNumber`, `name`, `serialNumber`, `purchaseDate`, `warrantyTo`, `amountNet`, `notes`, `assignedFor`, `invoiceId`) VALUES
(1, 'fotel A', '123456', '2021-01-04', '2021-01-31', 789789, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 1),
(2, 'biurka gamingowe', '3333333333333333333333333', '2021-01-11', '2021-01-27', 785421, 'jhhjghjgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 1, 8),
(3, 'mysz 1', '111111111111111', '2021-01-07', '2021-01-24', 34343434, 'fg', 1, 5),
(4, 'klawiatura', '333333333333333333333', '2021-01-11', '2021-01-26', 56, 'a', 1, 6),
(5, 'sluchawki', 'dfdsfsdfsf', '2021-01-12', '2021-01-12', 0, '', 1, 7),
(6, 'mikrofon', 'yututyutut', '2021-01-05', '2021-01-29', 0, 'f', 1, 10),
(11, 'sluchawki', 'dfdsfsdfsf', '2021-01-12', '2021-01-12', 78, '', 1, 11),
(12, 'mikrofon', 'yututyutut', '2021-01-05', '2021-01-29', 89, 'f', 1, 12);

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

--
-- Zrzut danych tabeli `license`
--

INSERT INTO `license` (`inventoryNumber`, `name`, `serialNumber`, `purchaseDate`, `supportTo`, `validTo`, `notes`, `assignedFor`, `invoiceId`) VALUES
(1, 'licencja1', '123123123', '2021-01-12', '2021-01-28', '2021-01-29', 'notatka moja 1', 1, 8),
(4, 'windows 10', '456789789', '2021-01-13', '2021-01-29', '2021-01-30', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 1, 1),
(5, 'office 2019', '852852456', '2021-01-12', '2021-01-28', '2021-01-30', 'ioiouogmhjm,dhgjdgnfghnhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1, 11),
(6, 'windows 7', '7777777777', '2021-01-11', '2021-01-27', '2021-01-30', 'iooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', 1, 12),
(7, 'windwos 8.1', '123456789', '2021-01-06', '2021-01-24', '2021-01-31', 'tytytyty', 1, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `otherdocuments`
--

CREATE TABLE `otherdocuments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `numOfPage` int(11) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `otherdocuments`
--

INSERT INTO `otherdocuments` (`id`, `name`, `date`, `numOfPage`, `notes`) VALUES
(1, 'dok1', '2021-01-11', 456, 'ssssssssssssssssssssssssssssssssssssssssssssssssssss'),
(2, 'dok2', '2021-01-11', 4554545, 'gfdgdgfdg'),
(3, 'dok3', '2021-01-09', 3434, 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg'),
(4, 'dok4', '2021-01-28', 343434, ''),
(5, 'dokAAA', '2021-01-13', 4545, 'fgfgfg'),
(6, 'dokBBB', '2021-01-16', 45, '');

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
  ADD UNIQUE KEY `invoiceId` (`invoiceId`),
  ADD KEY `assignedFor` (`assignedFor`) USING BTREE;

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
  ADD UNIQUE KEY `invoiceId` (`invoiceId`),
  ADD KEY `assignedFor` (`assignedFor`) USING BTREE;

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
  MODIFY `inventoryNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `inventoryNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `otherdocuments`
--
ALTER TABLE `otherdocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
