-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： db
-- 產生時間： 2022 年 06 月 13 日 17:23
-- 伺服器版本： 10.7.3-MariaDB-1:10.7.3+maria~focal
-- PHP 版本： 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `puffs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dish`
--

CREATE TABLE `dish` (
  `dId` int(8) NOT NULL,
  `dName` varchar(32) NOT NULL,
  `dPrice` int(8) NOT NULL,
  `description` varchar(128) NOT NULL,
  `sNo` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `dish`
--

INSERT INTO `dish` (`dId`, `dName`, `dPrice`, `description`, `sNo`) VALUES
(20221001, '奶油泡芙', 10000, '經典必選', 20228001),
(20221002, '鳳梨泡芙', 45, '台鳳16號精選鳳梨\r\n清新香甜', 20228002),
(20221003, '草莓泡芙', 45, '春季限量', 20228003),
(20221004, '抹茶泡芙', 40, '零卡', 20228004),
(20221088, '奶油泡芙88', 8888, '經典必選88', 20228001);

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

CREATE TABLE `employee` (
  `eId` int(8) NOT NULL,
  `ePassword` varchar(32) NOT NULL,
  `eName` varchar(32) NOT NULL,
  `eLevel` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `employee`
--

INSERT INTO `employee` (`eId`, `ePassword`, `eName`, `eLevel`) VALUES
(20229003, '333333', 'Rock', 1),
(20229006, '666666', 'YuAn', 2),
(20229009, '999999', 'Wenhao', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `oId` int(8) NOT NULL,
  `oDate` date NOT NULL,
  `oSendDate` date NOT NULL,
  `oName` varchar(32) NOT NULL,
  `oPhone` varchar(16) NOT NULL,
  `oAddress` varchar(128) NOT NULL,
  `eId` int(8) NOT NULL,
  `dId` int(8) NOT NULL,
  `dNum` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`oId`, `oDate`, `oSendDate`, `oName`, `oPhone`, `oAddress`, `eId`, `dId`, `dNum`) VALUES
(1, '2022-05-20', '2022-05-23', 'Apple', '0910123456', '台北市信義區東大路1號', 20229009, 20221001, 1),
(2, '2022-05-22', '2022-05-23', 'Bill', '0912654321', '台中市西屯區逢甲大學1號', 20229006, 20221001, 1),
(3, '2022-05-30', '2022-06-01', 'Cindy', '0918987654', '基隆市仁愛區仁一路88號', 20229009, 20221001, 1),
(4, '2022-06-01', '2022-06-02', 'David', '0935123456', '高雄市鳥松鄉99號', 20229006, 20221001, 1),
(5, '2022-06-13', '2022-06-13', 'Rock', '0977777777', '高雄市鳥松鄉99號', 20229003, 20221001, 1);

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
(0, 'temp', '02-0000-0000', 'KeeLung #0'),
(20228001, 'NTOU', '02-2345-6789', 'KeeLung #1'),
(20228002, 'CSE', '02-2345-2222', 'KeeLung #2'),
(20228003, 'KEELUNG', '02-2345-3333', 'KeeLung #3'),
(20228004, 'MUMU', '02-2345-6789', 'KeeLung #4');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dId`),
  ADD KEY `sNo` (`sNo`);

--
-- 資料表索引 `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eId`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oId`),
  ADD KEY `eId` (`eId`),
  ADD KEY `dId` (`dId`);

--
-- 資料表索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `oId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20227006;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `dish_ibfk_1` FOREIGN KEY (`sNo`) REFERENCES `supplier` (`sNo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 資料表的限制式 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`eId`) REFERENCES `employee` (`eId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`dId`) REFERENCES `dish` (`dId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
