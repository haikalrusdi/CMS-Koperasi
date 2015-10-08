-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2015 at 10:23 AM
-- Server version: 5.1.63-0+squeeze1
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbkpri`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_anggota`
--

CREATE TABLE IF NOT EXISTS `calon_anggota` (
  `id_calon_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_bergabung` datetime NOT NULL,
  PRIMARY KEY (`id_calon_anggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `calon_anggota`
--

INSERT INTO `calon_anggota` (`id_calon_anggota`, `nama`, `nip`, `unit`, `tempat_lahir`, `tgl_lahir`, `pangkat`, `telepon`, `email`, `alamat`, `tgl_bergabung`) VALUES
(2, 'Jainul Arifin', '197307032014091003', 'LPTSI', 'Surabaya', '1973-07-03', 'IIa', '082141216929', 'jainul@its.ac.id', 'Menganti Permai Blok D4 no 02 Menganti Gersik', '2015-09-04 11:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` bigint(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=308 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(307, 1369401795, '::1', 'fR7Tsa28');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `kode_content` int(5) NOT NULL AUTO_INCREMENT,
  `judul_content` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `content` text,
  `deskripsi` text,
  `image_header` varchar(200) DEFAULT NULL,
  `tags` text,
  `status` varchar(20) DEFAULT NULL,
  `tampilan_status` varchar(10) NOT NULL,
  `counter` int(5) DEFAULT NULL,
  `image_detail` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kode_content`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `content_label`
--

CREATE TABLE IF NOT EXISTS `content_label` (
  `kode_label` int(5) NOT NULL DEFAULT '0',
  `kode_content` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_content`,`kode_label`),
  KEY `kode_label` (`kode_label`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_slide`
--

CREATE TABLE IF NOT EXISTS `gambar_slide` (
  `id_updo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_file` varchar(50) NOT NULL,
  `tipe_file` varchar(20) NOT NULL,
  `ket_file` text NOT NULL,
  PRIMARY KEY (`id_updo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `kode_comment` int(7) NOT NULL AUTO_INCREMENT,
  `kode_content` int(5) DEFAULT NULL,
  `isi` text,
  `status` varchar(30) DEFAULT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`kode_comment`),
  KEY `kode_content` (`kode_content`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kop_anggota`
--

CREATE TABLE IF NOT EXISTS `kop_anggota` (
  `id_userkoperasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `no_anggota` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `status_anggota` int(11) NOT NULL,
  `tgl_bergabung` varchar(100) NOT NULL,
  PRIMARY KEY (`id_userkoperasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kop_pinjaman`
--

CREATE TABLE IF NOT EXISTS `kop_pinjaman` (
  `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` int(11) NOT NULL,
  `jumlah_pinjaman` varchar(50) DEFAULT NULL,
  `masa` int(11) NOT NULL,
  `sekarang` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `angsuran_pokok` varchar(50) DEFAULT NULL,
  `sisa_angsuran` varchar(50) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`id_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kop_simpanan`
--

CREATE TABLE IF NOT EXISTS `kop_simpanan` (
  `id_simpanan` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` int(11) NOT NULL,
  `spn_pokok` varchar(50) NOT NULL,
  `spn_wajib` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tgl_update` datetime NOT NULL,
  PRIMARY KEY (`id_simpanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `kode_label` int(5) NOT NULL AUTO_INCREMENT,
  `judul_label` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_label`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `kode_blog` int(4) NOT NULL AUTO_INCREMENT,
  `judul_blog` text,
  `deskripsi_blog` text,
  `limit_content` int(3) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `facebook_fans_page` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `g_plus` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `information` text,
  PRIMARY KEY (`kode_blog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`kode_blog`, `judul_blog`, `deskripsi_blog`, `limit_content`, `facebook`, `facebook_fans_page`, `twitter`, `g_plus`, `email`, `information`) VALUES
(1, 'Koperasi Pegawai Negeri Institut Teknlogi Sepuluh Nopember (ITS)', 'Ini adalah website Koperasi milik Institut Teknlogi Sepuluh Nopember (ITS)', 2, '', '', '', '', 'koperasi@its.ac.id', '');

-- --------------------------------------------------------

--
-- Table structure for table `userapp`
--

CREATE TABLE IF NOT EXISTS `userapp` (
  `kode_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `g_plus` varchar(200) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`kode_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userapp`
--

INSERT INTO `userapp` (`kode_user`, `username`, `password`, `nama_lengkap`, `facebook`, `twitter`, `g_plus`, `about`) VALUES
(1, 'admin', 'admin', 'Rizki Rinaldi', '', '', '', ''),
(2, 'koperasi', '123456', 'Admin Koperasi', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `no` int(7) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`no`, `ip`, `os`, `browser`, `tanggal`) VALUES
(1, '::1', 'Unknown Windows OS', 'Firefox 40.0', '2015-09-22 19:23:33'),
(2, '::1', 'Windows 7', 'Firefox 40.0', '2015-09-23 03:04:41'),
(3, '::1', 'Windows 7', 'Firefox 40.0', '2015-09-23 15:31:25'),
(4, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-01 08:44:44'),
(5, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-02 04:29:51'),
(6, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-02 17:23:27'),
(7, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-03 09:58:18'),
(8, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-05 05:43:53'),
(9, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-06 04:45:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_label`
--
ALTER TABLE `content_label`
  ADD CONSTRAINT `content_label_ibfk_1` FOREIGN KEY (`kode_content`) REFERENCES `content` (`kode_content`),
  ADD CONSTRAINT `content_label_ibfk_2` FOREIGN KEY (`kode_label`) REFERENCES `label` (`kode_label`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`kode_content`) REFERENCES `content` (`kode_content`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
