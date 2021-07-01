-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2021 年 7 月 01 日 12:30
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `a_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `a_table`
--

CREATE TABLE `a_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `naiyou` text NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `a_table`
--

INSERT INTO `a_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(10, 'Yuma', 'Japan', 'ワクチン接種者の海外渡航制限を緩和すべきでないか', '2021-06-25 22:55:13'),
(14, 'Rapper', 'Japan', '海外にパートナーがいる人のためのビザ審査のあり方の再検討を進めるとともに、パートナーとの再会に向けたロードマップを明示すべきではないか。', '2021-06-28 22:37:38'),
(23, 'JPark', 'Japan', 'オリンピックの際に日本に入国するためには、ワクチンの接種を条件とすべきではないか。また、選手だけでなく、海外にパートナーがいる人のビザ要件緩和についても議論を進めるべきでないか。', '2021-07-01 20:47:57');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `a_table`
--
ALTER TABLE `a_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `a_table`
--
ALTER TABLE `a_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
