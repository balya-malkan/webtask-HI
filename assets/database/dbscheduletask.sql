-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2016 at 11:47 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbscheduletask`
--

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_mainmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mainmenu` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1= admin,2=user',
  PRIMARY KEY (`id_mainmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_mainmenu`, `nama_mainmenu`, `icon`, `aktif`, `link`, `level`) VALUES
(1, 'home', 'gi gi-bank', 'y', 'home', 1),
(2, 'schedule', 'fa fa-calendar', 'y', 'schedule', 1),
(3, 'event', 'fa fa-building-o', 'y', 'event', 1),
(4, 'activity', 'gi gi-group', 'y', 'activity', 1),
(5, 'master data', 'fa fa-bar-chart-o', 'y', 'master', 1),
(6, 'report', 'gi gi-notes_2', 'y', 'report', 1),
(7, 'home', 'gi gi-bank', 'y', 'home', 2),
(8, 'schedule', 'fa fa-calendar', 'y', 'schedule', 2),
(9, 'event', 'fa fa-building-o', 'y', 'event', 2),
(10, 'activity', 'gi gi-group', 'y', 'activity', 2);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_submenu` int(11) NOT NULL AUTO_INCREMENT,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_submenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_mainmenu`, `nama_submenu`, `link`, `aktif`, `icon`, `level`) VALUES
(1, 5, 'User', 'user', 'y', 'gi gi-parents', 1),
(2, 5, 'type task', 'type', 'y', 'gi gi-address_book', 1),
(3, 5, 'Divisi', 'divisi', 'y', 'gi gi-cargo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_divisi`
--

CREATE TABLE IF NOT EXISTS `tm_divisi` (
  `nkddivisi` varchar(3) NOT NULL,
  `snamadivisi` varchar(50) NOT NULL,
  `sdesc` varchar(100) NOT NULL,
  PRIMARY KEY (`nkddivisi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_divisi`
--

INSERT INTO `tm_divisi` (`nkddivisi`, `snamadivisi`, `sdesc`) VALUES
('001', 'IT', 'IT Koplak'),
('002', 'MKT', 'Marketing Sales'),
('003', 'Accounting', 'Finance And GL'),
('004', 'PPIC', 'Control Work Command'),
('005', 'HRD', 'Human Resource');

-- --------------------------------------------------------

--
-- Table structure for table `tm_type`
--

CREATE TABLE IF NOT EXISTS `tm_type` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `nTypeCD` varchar(3) NOT NULL,
  `sTypeName` varchar(50) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tm_type`
--

INSERT INTO `tm_type` (`idType`, `nTypeCD`, `sTypeName`) VALUES
(1, '1', 'SCHEDULE'),
(2, '2', 'EVENT'),
(3, '3', 'ACTIVITY');

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE IF NOT EXISTS `tm_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `sUsername` varchar(100) NOT NULL,
  `sName` varchar(100) NOT NULL,
  `spassword` varchar(100) NOT NULL,
  `nLevel` int(1) NOT NULL,
  `nActive` int(1) NOT NULL,
  `sRemaks` text NOT NULL,
  `dLastLogin` datetime NOT NULL,
  `sDivisi` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`idUser`, `sUsername`, `sName`, `spassword`, `nLevel`, `nActive`, `sRemaks`, `dLastLogin`, `sDivisi`) VALUES
(1, 'admin', 'balya romdhon', '0192023a7bbd73250516f069df18b500', 1, 1, '', '2016-04-26 09:14:42', '001'),
(3, 'user', 'user marketing', '6ad14ba9986e3615423dfca256d04e3f', 2, 1, '', '2016-04-26 08:59:53', '002');

-- --------------------------------------------------------

--
-- Table structure for table `tr_schedule`
--

CREATE TABLE IF NOT EXISTS `tr_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nTypeCD` int(5) NOT NULL,
  `dDate` date NOT NULL,
  `swaktu` varchar(20) NOT NULL,
  `swaktuEnd` varchar(20) NOT NULL,
  `sDesc` text NOT NULL,
  `sMember` text NOT NULL,
  `sRenewalName` varchar(50) NOT NULL,
  `sRenewalIP` varchar(30) NOT NULL,
  `dRenewalDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tr_schedule`
--

INSERT INTO `tr_schedule` (`id`, `nTypeCD`, `dDate`, `swaktu`, `swaktuEnd`, `sDesc`, `sMember`, `sRenewalName`, `sRenewalIP`, `dRenewalDate`) VALUES
(1, 1, '2016-04-27', '00:00:00', '', 'Liburan', 'Balya,malkan', '', '', '0000-00-00 00:00:00'),
(2, 1, '2016-04-30', '00:00:00', '', 'Kunjungan ke TSK JAPAN', 'Mr.Yoshimoto,Mr.Ferry', '', '', '0000-00-00 00:00:00'),
(3, 1, '2016-05-13', '00:00:00', '', 'Kunjungan Ke TAIWAN', 'Mr.Yoshimoto,Mr.Ferry\r\n', '', '', '0000-00-00 00:00:00'),
(4, 1, '2016-04-30', '00:00:00', '', 'Kunjungan ke CIREBON', 'Mr.Yoshimoto,Mr.Ferry', '', '', '0000-00-00 00:00:00'),
(5, 1, '2016-06-11', '00:00:00', '', 'Kunjungan ke CIKARANG', 'Mr.Yoshimoto,Mr.Ferry', '', '', '0000-00-00 00:00:00'),
(6, 1, '2016-08-17', '00:00:00', '', 'Kunjungan Ke  TOYOTA Sunter', 'Mr.Suhanda,Mr.Sulaeman', '', '', '0000-00-00 00:00:00'),
(8, 2, '2016-04-28', '08:00', '11:00', 'Latihan Pemadam Kebakaran', 'Maman,Aris R', '', '', '0000-00-00 00:00:00'),
(9, 2, '2016-11-30', '06:00', '17:00', 'Tour Karyawan', 'All Karyawan', '', '', '0000-00-00 00:00:00'),
(14, 3, '2016-04-27', '08:00', '09:45', 'Meeting New Model', 'EDDY DJADJA,JIMIN,SRI ENDAH,PERDI', '', '', '0000-00-00 00:00:00'),
(18, 3, '2016-04-28', '10:00', '12:00', 'HIJUNKA System', 'IT,MKT\r\n', '', '', '0000-00-00 00:00:00'),
(19, 3, '2016-10-21', '08:00', '10:00', 'Pembentukan panitia Tour', 'Maman,Suhanda,Sulaiman', '', '', '0000-00-00 00:00:00'),
(20, 3, '2016-04-30', '17:00', '23:00', 'Karoeke bersama', 'IT,MKT,ACC', '', '', '0000-00-00 00:00:00'),
(23, 2, '2016-04-27', '20:00', '22:00', 'test event', 'balya', '', '', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
