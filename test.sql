-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Sty 2021, 17:27
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test`
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
(9, '1', '2021-01-15', 1111111111, 1, 1, 1, 0, 1),
(10, '1', '2021-01-15', 1111111111, 1, 1, 1, 0, 1),
(11, '5', '2021-01-16', 1111111111, 5, 5, 5, 0, 5),
(12, '5', '2021-01-14', 1111111112, 5, 5, 5, 0, 5);

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
(8, '7887878', '2020-12-10', 6, 45, 77, 66, 11, 3),
(9, '1', '2021-01-21', 1111111111, 1, 1, 1, 1, 1),
(10, '2', '2021-01-14', 1111111111, 1, 2, 1, 1, 2),
(11, '3', '2021-01-13', 1111111111, 1, 3, 3, 1, 3),
(12, '1', '2021-01-16', 1111111111, 1, 1, 1, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `invoicepurchase`
--
ALTER TABLE `invoicepurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `invoicesale`
--
ALTER TABLE `invoicesale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
