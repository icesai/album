-- phpMyAdmin SQL Dump
-- version 4.2.3deb1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2014 年 07 月 17 日 17:25
-- 伺服器版本: 5.5.37-1
-- PHP 版本： 5.6.0RC2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `aaa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `aaa`
--

CREATE TABLE IF NOT EXISTS `aaa` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`imgno` int(11) NOT NULL,
  `tmpname` char(255) NOT NULL,
  `imgname` char(25) NOT NULL,
  `username` char(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- 資料表的匯出資料 `aaa`
--

INSERT INTO `aaa` (`time`, `imgno`, `tmpname`, `imgname`, `username`) VALUES
('2014-07-16 07:06:17', 14, '2121.JPG', '111', 'LEE');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `aaa`
--
ALTER TABLE `aaa`
 ADD PRIMARY KEY (`imgno`), ADD UNIQUE KEY `imgno` (`imgno`), ADD KEY `imgno_2` (`imgno`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `aaa`
--
ALTER TABLE `aaa`
MODIFY `imgno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
