-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-11-11 23:49:47
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `Arti_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Arti_Title` text,
  `Arti_Content` text NOT NULL,
  `userID` int(3) NOT NULL,
  PRIMARY KEY (`Arti_ID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`Arti_ID`, `Arti_Title`, `Arti_Content`, `userID`) VALUES
(53, 'Leaked Luxembourg files expose global companies'' secret deals to avoid tax', 'Pepsi, Ikea, FedEx and nearly 340 other international companies have secured secret deals from Luxembourg, allowing many of them to slash their global tax bills by routing hundreds of billions of dollars through the tiny European country, leaked documents show.\r\n\r\nThe companies have saved billions of dollars in total taxes, according to a review of nearly 28,000 pages of confidential documents obtained by the Washington-based International Consortium of Investigative Journalists and shared with journalists from 26 countries, including CBC News.\r\n\r\nThe companies can book big tax savings by creating complicated accounting and legal structures that move profits to low-tax Luxembourg from higher-tax countries where they''re headquartered or do lots of business.', 3),
(103, 'Nunavut put community''s health ''at risk', '					When Makibi Timilak smiled, it indented his chipmunk cheeks with the deepest dimples. His family says the three-month-old Inuk boy smiled often, and rarely fell sick.\r\n\r\nBut on April 4, 2012, his mother, Neevee Akesuk, said Makibi bawled all day and refused to eat. His nose kept running, a constant stream of mucus. At times, his breathing became laboured.Worried, Akesuk made a panicked call to the local 24/7 community health centre in the remote Nunavut hamlet of Cape Dorset.					', 1),
(104, 'Nunavut ', '					When Makibi Timilak smiled, it indented his chipmunk cheeks with the deepest dimples. His family says the three-month-old Inuk boy smiled often, and rarely fell sick.\r\n\r\nBut on April 4, 2012, his mother, Neevee Akesuk, said Makibi bawled all day and refused to eat. His nose kept running, a constant stream of mucus. At times, his breathing became laboured.Worried, Akesuk made a panicked call to the local 24/7 community health centre in the remote Nunavut hamlet of Cape Dorset.					', 1),
(114, 'It''s Jim', 'Hi, this is my first article on this website.', 2);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(3) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(10) NOT NULL,
  `UserPassword` varchar(12) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserPassword`, `FirstName`, `LastName`, `Email`) VALUES
(1, 'Jane123', 'abc', 'Jane', 'Doe', 'jane123@gmai.com'),
(2, 'Jim234', 'bcd', 'Jim', 'Doe', 'jim234@gmail.com'),
(3, 'Dave345', 'cde', 'Dave', 'Doe', 'dave345@gmail.com');

--
-- 限制导出的表
--

--
-- 限制表 `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `articleuser` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
