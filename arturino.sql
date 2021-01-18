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
(1, 'pierwsza contractor'),
(2, 'drugi contractor'),
(3, 'trzeci contractor');

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
(1, 'fotel A', '1234', '2021-01-04', '2021-01-31', 789789, 'x', 1, 1),
(2,  'biurka', '5678', '2021-01-11', '2021-01-27', 785421, 'x', 1, 2),
(3,    'mysz', '9101', '2021-01-07', '2021-01-24', 34343434, 'fg', 1, 3);

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
(1, 'PL0987', '2020-12-01', 3, 10, 1, 20, 15, 0),
(2, 'PL6543', '2020-12-10', 1, 20, 2, 30, 25, 3),
(3, 'PL2137', '2021-01-12', 2, 30, 3, 40, 35, 1),
(4, 'PL0864', '2021-01-14', 1, 40, 4, 50, 45, 2),
(5, 'PL9753', '2021-01-18', 3, 50, 5, 60, 55, 4),
(6, 'PL1357', '2021-01-18', 3, 60, 6, 70, 65, 3),
(7, 'PL2468', '2021-01-20', 2, 70, 7, 90, 75, 1),
(8, 'PL1209', '2021-01-21', 1, 80, 8, 99, 85, 0);

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
(1, 'PL1234', '2020-12-17', 3, 12.34, 23.45,  34.56,  45.67, 1),
(2, 'PL5678', '2020-12-08', 2,   456, 67787,  45.45,   2342, 2),
(3, 'PL9101', '2020-12-10', 1,  4555, 45454, 656.56, 343434, 1);

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
(1, 'licencja1',   '123123123', '2021-01-12', '2021-01-28', '2021-01-29', 'w',   1, 4),
(2, 'windows 10',  '456789789', '2021-01-13', '2021-01-29', '2021-01-30', 'x',   2, 5),
(3, 'office 2019', '852852456', '2021-01-12', '2021-01-28', '2021-01-30', 'x,y', 3, 6),
(4, 'windows 7',  '7777777777', '2021-01-11', '2021-01-27', '2021-01-30', 'z',   4, 7),
(5, 'windwos 8.1', '123456789', '2021-01-06', '2021-01-24', '2021-01-31', 'v',   5, 8);

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
(1, 'dok1', '2021-01-11', 456, 'p'),
(2, 'dok2', '2021-01-11', 4554545, 'o'),
(3, 'dok3', '2021-01-09', 3434, 'i'),
(4, 'dok4', '2021-01-28', 343434, 'u'),
(5, 'dokAAA', '2021-01-13', 4545, 'y'),
(6, 'dokBBB', '2021-01-16', 45, 't');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `password`, `role`) VALUES
(1, 'admin', 'adminFirstName', 'adminLastName', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'user1', 'user1FirstName', 'user1LastName', '5f4dcc3b5aa765d61d8327deb882cf99', 'Employee'),
(3, 'user2', 'user2FirstName', 'user2LastName', '5f4dcc3b5aa765d61d8327deb882cf99', 'Employee'),
(4, 'user3', 'user3FirstName', 'user3LastName', '5f4dcc3b5aa765d61d8327deb882cf99', 'Employee'),
(5, 'user4', 'user4FirstName', 'user4LastName', '5f4dcc3b5aa765d61d8327deb882cf99', 'Auditor');

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


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `password`, `login`, `email`) VALUES
(1, 'admin', 'adminFirstName', 'adminLastName', 'admin', 'adminadmin', 'admin@gmail.com'),
(2, 'user', 'Jan', 'Kowalski', '12345789', 'jkowalski23', 'jkowalski2@gmail.com'),
(3, 'user', 'Piotr', 'Sas', '123456', 'psas3', 'psas3@user.com'),
(4, 'user', 'Radek', 'Sas', '123456', 'rsas4', 'rsas4@user.com'),
(5, 'user', 'Tadeusz', 'Sas', '123456', 'tsas5', 'tsas5@user.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
