-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 2 月 06 日 18:11
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_bm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_user_table`
--

CREATE TABLE IF NOT EXISTS `gs_bm_user_table` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_user_table`
--

INSERT INTO `gs_bm_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'ポッドキャスト管理者１', 'pod01', '$2y$10$ZuePZ73NEjh7yTxWi85aCOxII4jACTJc4wuwEqfwvaNQyWcCpdyFi', 1, 0),
(2, 'ポッドキャスト利用者２', 'pod02', '$2y$10$OKMDg8642CGpeew6DbzTF.sfB5Tu9ylLpW5KM8NS1lfit4LwgEFJ6', 0, 0),
(3, 'ポッドキャスト利用者３', 'pod03', '$2y$10$JDef9cicOxe01hu3hSLSIefhg0Q0YrrZktje2atjwKVBC.1acrMk6', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_user_table`
--
ALTER TABLE `gs_bm_user_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_user_table`
--
ALTER TABLE `gs_bm_user_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
