-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Sep 2019 pada 23.44
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wow`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nodins`
--

CREATE TABLE IF NOT EXISTS `nodins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no_nodin` varchar(30) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `nodin_type` varchar(10) DEFAULT NULL,
  `nodin_date` date DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `no_nodin_parent` varchar(25) DEFAULT NULL,
  `to` varchar(11) DEFAULT NULL,
  `cc` varchar(11) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `nodins`
--

INSERT INTO `nodins` (`id`, `no_nodin`, `title`, `nodin_type`, `nodin_date`, `target_date`, `no_nodin_parent`, `to`, `cc`, `body`) VALUES
(1, '01270/MK.05/EN-01/VI/2019', 'Request ABC', 'Request', '2019-09-01', '2019-09-15', NULL, 'GM PSM', 'Managers', 'Adalah'),
(2, '002/BO', 'Request DEF', 'Request', '2019-09-02', '2019-09-07', NULL, 'GM PSM', 'Managers', 'Adalah'),
(3, '001/IT', 'Request Development ABC', 'IT', '2019-09-03', '2019-09-05', NULL, 'GM PSM', 'Managers', 'sehubungan 01270/MK.05/EN-01/VI/2019 lele'),
(4, '01386/MK.05/EN-01/VII/2019', 'RFS ABC', 'RFS', '2019-09-05', '2019-09-09', NULL, 'Quality', 'Managers', 'sehubungan 01270/MK.05/EN-01/VI/2019 lala'),
(5, '001/RFC', 'RFC ABC', 'RFC', '2019-09-05', '2019-09-09', NULL, 'BO', 'Managers', 'sehubungan 01386/MK.05/EN-01/VII/2019 lele');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stats`
--

CREATE TABLE IF NOT EXISTS `stats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `total_request` int(11) DEFAULT NULL,
  `total_rfs` int(11) DEFAULT NULL,
  `total_rfi` int(11) DEFAULT NULL,
  `total_rfc` int(11) DEFAULT NULL,
  `total_itr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(25) NOT NULL DEFAULT '',
  `department` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `subdir` varchar(10) DEFAULT 'BA & PSM',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `department`, `password`, `subdir`) VALUES
('ab', 'abc', NULL, 'BA & PSM'),
('arfaneyza', 'New Toddler in the World', NULL, NULL),
('hasbi_akbar', 'Hooray - hooray', NULL, NULL),
('rachmawaty', 'Consumer Analytics and Reporting', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
