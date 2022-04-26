-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-04-26 11:30:02
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `puffs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dish`
--

CREATE TABLE `dish` (
  `dId` varchar(16) NOT NULL,
  `dName` varchar(32) NOT NULL,
  `dPrice` int(8) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `eId` varchar(32) NOT NULL,
  `ePassword` varchar(32) NOT NULL,
  `eName` varchar(32) NOT NULL,
  `eLevel` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`eId`, `ePassword`, `eName`, `eLevel`) VALUES
('linda', '222222', 'Linda Lin', 3),
('wenhao', '111111', 'Wenhao Heish', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `oId` varchar(16) NOT NULL,
  `oDate` date NOT NULL,
  `oSendDate` date NOT NULL,
  `oName` varchar(32) NOT NULL,
  `oPhone` varchar(16) NOT NULL,
  `oAddress` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `present`
--

CREATE TABLE `present` (
  `sId` varchar(16) NOT NULL,
  `sPrice` int(8) NOT NULL,
  `sName` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `supplier`
--

CREATE TABLE `supplier` (
  `sNo` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `supplier`
--

INSERT INTO `supplier` (`sNo`, `name`, `phone`, `address`) VALUES
(10000001, 'NTOU', '02-2345-6789', 'KeeLung #1'),
(10000002, 'CSE', '02-2345-2222', 'KeeLung #2'),
(10000003, 'KEELUNG', '02-2345-3333', 'KeeLung #3'),
(10000004, 'MUMU', '02-2345-6789', 'KeeLung #4');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dId`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eId`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oId`);

--
-- 資料表索引 `present`
--
ALTER TABLE `present`
  ADD PRIMARY KEY (`sId`);

--
-- 資料表索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
