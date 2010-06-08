-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 08 juni 2010 kl 09:45
-- Serverversion: 5.1.36
-- PHP-version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `flashback`
--

-- --------------------------------------------------------

--
-- Struktur för tabell `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `publisher` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data i tabell `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `time`, `publisher`) VALUES
(1, 'Första nyheten', 'Detta är första nyheten.', '2010-06-08 11:38:30', 'Lars'),
(2, 'Login-system', 'Loginsystemet ska nu vara fullt fungerande.', '2010-06-08 11:38:30', 'Lars');

-- --------------------------------------------------------

--
-- Struktur för tabell `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `regdate`) VALUES
(1, 'victor', 'victor', 'mustafa@gmail.com', '2010-06-06 18:30:47'),
(2, 'jonas', 'dinmamma', 'jonas@dinmamma.com', '2010-06-06 18:40:51'),
(8, 'test', 'test', 'test', '2010-06-07 04:55:53'),
(9, 'kurt', '123123', '123@123.com', '2010-06-07 15:21:47'),
(10, 'decent', 'losen', 'joakim@joakimpalm.se', '2010-06-07 15:35:50'),
(11, 'zaak', 'oskar1337', 'Zakke@pimpstyle.com', '2010-06-07 23:01:55'),
(12, 'api', 'lolboll', 'adrian.iredahl@gmail.com', '2010-06-08 08:55:01'),
(13, 'testsson', 'testsson', 'anton.anonym@gmail.com', '2010-06-08 09:34:58');
