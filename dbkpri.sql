-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2015 at 10:14 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id_calon_anggota` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_bergabung` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_anggota`
--

INSERT INTO `calon_anggota` (`id_calon_anggota`, `nama`, `nip`, `unit`, `tempat_lahir`, `tgl_lahir`, `pangkat`, `telepon`, `email`, `alamat`, `tgl_bergabung`) VALUES
(2, 'Jainul Arifin', '197307032014091003', 'LPTSI', 'Surabaya', '1973-07-03', 'IIa', '082141216929', 'jainul@its.ac.id', 'Menganti Permai Blok D4 no 02 Menganti Gersik', '2015-09-04 11:06:00'),
(3, 'Bhayu', '656218931', '1234', '', '0000-00-00', '', '', '', '', '2015-10-09 08:23:08'),
(4, 'Bhayu', '123', '123', '123', '2015-10-08', '123', '1213', '312', '2121', '2015-10-09 09:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL,
  `captcha_time` bigint(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=308 DEFAULT CHARSET=latin1;

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
  `kode_content` int(5) NOT NULL,
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
  `image_detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_label`
--

CREATE TABLE IF NOT EXISTS `content_label` (
  `kode_label` int(5) NOT NULL DEFAULT '0',
  `kode_content` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_slide`
--

CREATE TABLE IF NOT EXISTS `gambar_slide` (
  `id_updo` int(11) NOT NULL,
  `nm_file` varchar(50) NOT NULL,
  `tipe_file` varchar(20) NOT NULL,
  `ket_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `kode_comment` int(7) NOT NULL,
  `kode_content` int(5) DEFAULT NULL,
  `isi` text,
  `status` varchar(30) DEFAULT NULL,
  `pengirim` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kop_anggota`
--

CREATE TABLE IF NOT EXISTS `kop_anggota` (
  `id_userkoperasi` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `no_anggota` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `status_anggota` int(11) NOT NULL,
  `tgl_bergabung` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=273 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kop_anggota`
--

INSERT INTO `kop_anggota` (`id_userkoperasi`, `nama`, `nip`, `no_anggota`, `password`, `unit`, `status_anggota`, `tgl_bergabung`) VALUES
(2, 'KARSONI', '196605032007011001', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'FTSP-D3.T.SIP', 0, 'Januari 2009'),
(3, 'DWIE WAHYU H', '196712102007012001', '2', 'c81e728d9d4c2f636f067f89cc14862c', 'FTSP-D3.T.SIP', 0, 'Januari 2013'),
(4, 'JOKO SANTOSO', '197103122001121003', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'BKSP', 0, 'Januari 2009'),
(5, 'ELFA SUGIANTO', '197712122007101001', '4', 'a87ff679a2f3e71d9181a67b7542122c', 'UPT-KK', 0, 'Maret 2002'),
(6, 'A  N  I  K', '197209292007012001', '5', 'e4da3b7fbbce2345d7772b0674a318d5', 'FMIPA', 0, 'Maret 2002'),
(7, 'DZIKRUL HAKIM', '196807152007011003', '6', '1679091c5a880faf6fb5e6087eb1b2dc', 'FMIPA-KIM', 0, 'Maret 2002'),
(8, 'TOTOK MUJIONO', '196504221989031001', '7', '8f14e45fceea167a5a36dedd4bea2543', 'FTI-T.ELEK', 0, 'Oktober 2004'),
(9, 'DRS. FUAD CHOLISI', '195203181986011001', '8', 'c9f0f895fb98ab9159f51fd0297e236d', 'UPT-SOSHUM', 0, 'Oktober 2004'),
(10, 'MARLEJAN', '196309081987011001', '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'FTSP-T.SIP', 0, 'Oktober 2004'),
(11, 'IRNANINGSIH', '196810132002122001', '10', 'd3d9446802a44259755d38e6d163e820', 'SAC', 0, 'Oktober 2004'),
(12, 'ENDANG SRI PALUPI', '196405162006042001', '11', '6512bd43d9caa6e02c990b0a82652dca', 'FTSP-D3.T.SIP', 0, 'Oktober 2004'),
(13, 'THOLIB', '196207051990310001', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'FTI', 0, 'Oktober 2004'),
(14, 'TRI WAHYUDI', '197308282007011001', '13', 'c51ce410c124a10e0db5e4b97fc2af39', 'FTSP', 0, 'Oktober 2004'),
(15, 'ONGKOWIIJONO', '196105251988031002', '14', 'aab3238922bcc25a6f606eb525ffdc56', 'BKSP', 0, 'Oktober 2004'),
(16, 'YUDHO AGUNG P', '198202142009101001', '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'UPT-KK', 0, 'Oktober 2004'),
(17, 'RR. TRI ASTUTI S.', '197511122007012003', '16', 'c74d97b01eae257e44aa9d5bade97baf', 'UPT-BAHASA', 0, 'Oktober 2004'),
(18, 'HERU SETIAWAN', '196210191993031001', '17', '70efdf2ec9b086079795c442636b55fb', 'FTK', 0, 'Januari 2008'),
(19, 'MARDIANAH', '195811171986022001', '18', '6f4922f45568161a8cdf4ad2299f6d23', 'FTSP-DESPRO', 0, 'Januari 2013'),
(20, 'SUPARDI', '196907112007011002', '19', '1f0e3dad99908345f7439f8ffabdffc4', 'UPT-KK', 0, 'Maret 2002'),
(21, 'AGUS SETYAWAN', '196508191990031004', '20', '98f13708210194c475687be6106a3b84', 'UPT. PERPS', 0, 'Maret 2002'),
(22, 'CHRISTIN RISBANDINI', '197510101999032002', '21', '3c59dc048e8850243be8079a5c74d079', 'FMIPA-BIO', 0, 'Maret 2002'),
(23, 'ACHMAD YUNUS', '197207232006041008', '22', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'BAUK-OPRT', 0, 'Oktober 2004'),
(24, 'DEWI HIDAYATI', '196911211998022001', '23', '37693cfc748049e45d87b8c7d8b9aacd', 'FMIPA-BIO', 0, 'Oktober 2004'),
(25, 'MOCH. EFENDI', '196605132007011001', '24', '1ff1de774005f8da13f42943881c655f', 'FTI-D3.TEKIM', 0, 'Oktober 2004'),
(26, 'MARTONO', '197212052007011002', '25', '8e296a067a37563370ded05f5a3bf3ec', 'FTSP', 0, 'Oktober 2004'),
(27, 'FIRMAN HAWARI', '197202011999031001', '26', '4e732ced3463d06de0ca9a15b6153677', 'FTSP-DESPRO', 0, 'Maret 2002'),
(28, 'HERY SUSANTO', '196309131985031002', '27', '02e74f10e0327ad868d138f2b4fdd6f0', 'ITS-PRESS', 0, 'Maret 2002'),
(29, 'DYAH HIDAYATI', '196112271988032001', '28', '33e75ff09dd601bbe69f351039152189', 'BKSP', 0, 'Maret 2002'),
(30, 'IFA NURAISYAH A.MD', '198405112008012005', '29', '6ea9ab1baa0efb9e19094440c317e21b', 'BKSP', 0, 'Oktober 2004'),
(31, 'JAROT PRIYONGGO', '196602131999031001', '30', '34173cb38f07f89ddbebc2ac9128303f', 'BKSP', 0, 'Maret 2002'),
(32, 'ANIS WULANDARI', '197608202008102001', '31', 'c16a5320fa475530d9583c34fd356ef5', 'UPT. PERPS', 0, 'Oktober 2004'),
(33, 'UMAR', '196301122007011001', '32', '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'FTI-D3.TM', 0, 'Maret 2002'),
(34, 'PRASETYONO', '198402102009101003', '33', '182be0c5cdcd5072bb1864cdee4d3d6e', 'FTSP', 0, 'Maret 2002'),
(35, 'SYARBINI', '196603042007011001', '34', 'e369853df766fa44e1ed0ff613f563bd', 'FTSP-ARSTK', 0, 'Maret 2002'),
(36, 'MARIYADI', '196201191987011001', '35', '1c383cd30b7c298ab50293adfecb7b18', 'FTSP-ARSTK', 0, 'Oktober 2004'),
(37, 'RETNOWATI D', '197309212008102001', '36', '19ca14e7ea6328a42e0eb13d585e4c22', 'FTSP-TL', 0, 'Oktober 2004'),
(38, 'ABDUL ALIM', '197504162009101002', '37', 'a5bfc9e07964f8dddeb95fc584cd965d', 'BKSP', 0, 'Oktober 2004'),
(39, 'CATUR PUJIASTUTI', '197309102008102001', '38', 'a5771bce93e200c36f7cd9dfd0e5deaa', 'UPMB', 0, 'Oktober 2004'),
(40, 'ELI SUTRISNO', '198202282009101001', '39', 'd67d8ab4f4c10bf22aa353e27879133c', 'FMIPA-BIO', 0, 'Januari 2008'),
(41, 'DR. IR. BAMBANG  S. MT', '196509191990031003', '40', 'd645920e395fedad7bbbed0eca3fe2e0', 'FTI-D3.TM', 0, 'Januari 2008'),
(42, 'SUPRIYO', '196605102007011001', '41', '3416a75f4cea9109507cacd8e2f2aefc', 'FTIF', 0, 'Oktober 2004'),
(43, 'ELFA SUGIANTO', '197712122007101001', '42', 'a1d0c6e83f027327d8461063f4ac58a6', 'UPT-KK', 0, 'Januari 2008'),
(44, 'MOCH ROFIQ', '197111142007101001', '43', '17e62166fc8586dfa4d1bc0e1742c08b', 'UPT-FASOR', 0, 'Januari 2008'),
(45, 'NANIK SUSIANI', '195906111981032002', '44', 'f7177163c833dff4b38fc8d2872f1ec6', 'FMIPA', 0, 'Januari 2004'),
(46, 'NASRULLOH', '198209162009101002', '45', '6c8349cc7260ae62e3b1396831a8398f', 'FTI-TEKIM', 0, 'Oktober 2004'),
(47, 'UMI SAROH', '196402021986032003', '46', 'd9d4f495e875a2e075a1a4a6e1b9770f', 'BKSP', 0, 'Januari 2009'),
(48, 'WASILAH', '196003071981032002', '47', '67c6a1e7ce56d3d6fa748ab6d9af3fd7', 'BAUK-SDM', 0, 'Januari 2011'),
(49, 'SAYID MIFTHA', '''197609072007011001', '48', '642e92efb79421734881b53e1e1b18b6', 'FMIPA', 0, 'Januari 2011'),
(50, 'LILA YUWANA', '197509082000031001', '49', 'f457c545a9ded88f18ecee47145a72c0', 'FMIPA-FIS', 0, 'Januari 2013'),
(51, 'DR YENI RAHMAWATI', '197610202005012001', '50', 'c0c7c76d30bd3dcaefc96f40275bdc0a', 'FTI-TEKIM', 0, 'Januari 2014'),
(52, 'SURACHMAN', '195910221981031003', '51', '2838023a778dfaecdc212708f721b788', 'FTI-TEKIM', 0, 'Januari 2013'),
(53, 'SUCIPTO', '197004172007011002', '52', '9a1158154dfa42caddbd0694a4e9bdc8', 'LPPM', 0, 'Maret 2002'),
(54, 'SUTJI JANUARI WI.SE', '196901022007012001', '53', 'd82c8d1619ad8176d665453cfb2e55f0', 'BKSP', 0, 'Maret 2002'),
(55, 'AMANDA PUTRI WIDHESI', '198601302008122001', '54', 'a684eceee76fc522773286a895bc8436', 'BKSP', 0, 'Oktober 2004'),
(56, 'HERMANTO', '197801072008101001', '55', 'b53b3a3d6ab90ce0268229151c9bde11', 'UPT-KK', 0, 'Oktober 2004'),
(57, 'SRIAJI', '196508052007011002', '56', '9f61408e3afb633e50cdf1b20de6f466', 'FTI-D3.TEKIM', 0, 'Maret 2002'),
(58, 'SUYADI', '196705161987011001', '57', '72b32a1f754ba1c09b3695e0cb6cde7f', 'FTSP-ARSTK', 0, 'Maret 2002'),
(59, 'SUPRIADI', '196411271987011001', '58', '66f041e16a60928b05a7e228a89c3799', 'FTSP-ARSTK', 0, 'Maret 2002'),
(60, 'EDY SANTOSO', '196201071981031002', '59', '093f65e080a295f8076b1c5722a46aa2', 'BAKP', 0, 'Oktober 2004'),
(61, 'AGUS SANTOSO', '196012301981031003', '60', '072b030ba126b2f4b2374f342be9ed44', 'BAUK-SDM', 0, 'Oktober 2004'),
(62, 'M SUUD', '196405251989031002', '61', '7f39f8317fbdb1988ef4c628eba02591', 'UPT-KK', 0, 'Oktober 2004'),
(63, 'DRA CAROLINA E.P', '196304241994032002', '62', '44f683a84163b3523afe57c2e008bc8c', 'UPMB', 0, 'Oktober 2004'),
(64, 'AGUS SUGIO PRANOTO', '196708141990111002', '63', '03afdbd66e7929b125f8597834fa83a4', 'UPT. PERPS', 0, 'Oktober 2004'),
(65, 'DRS IIS HERISMAN', '196010021989031002', '64', 'ea5d2f1c4608232e07d3aa3d998e5135', 'FMIPA-MTK', 0, 'Maret 2002'),
(66, 'DJOKO PRIATIN', '1972010120021221003', '65', 'fc490ca45c00b1249bbe3554a4fdf6fb', 'FMIPA-MTK', 0, 'Januari 2006'),
(67, 'ARYA YUDHI W', '198409042010121002', '66', '3295c76acbf4caaed33c36b1b5fc2cb1', 'FTIF', 0, 'Januari 2006'),
(68, 'ANWAR', '196402101987011001', '67', '735b90b4568125ed6c3f678819b6e058', 'FTSP-TL', 0, 'Januari 2006'),
(69, 'NINA DARMAYANTI', '197101172000122001', '68', 'a3f390d88e4c41f2747bfa2f1b5f87db', 'BKSP', 0, 'Januari 2007'),
(70, 'DRS NGARBI', '196501151987021001', '69', '14bfa6bb14875e45bba028a21ed38046', 'BKSP', 0, 'Januari 2008'),
(71, 'NR WASPODO', '196511011987091001', '70', '7cbbc409ec990f19c78c75bd1e06f215', 'BKSP', 0, 'Januari 2008'),
(72, 'SHOLEH', '131753587', '71', 'e2c420d928d4bf8ce0ff2ec19b371514', 'UPT-FASOR', 0, 'Oktober 2004'),
(73, 'CAHYA PURNAMA DANI', '197011062007011001', '72', '32bb90e8976aab5298d5da10fe66f21d', 'BTSI', 0, 'Maret 2002'),
(74, 'WIWIN ROCHMAWATI', '198107022003122002', '73', 'd2ddea18f00665ce8623e36bd4e3c7c5', 'BTSI', 0, 'Maret 2002'),
(75, 'EKO ANDRI W', '197412021999031001', '74', 'ad61ab143223efbc24c7d2583be69251', 'FMIPA-FIS', 0, 'Maret 2002'),
(76, 'SUGENG', '196406052007011001', '75', 'd09bf41544a3365a46c9077ebb5e35c3', 'FMIPA-FIS', 0, 'Maret 2002'),
(77, 'TUTUG D', '195206131981031004', '76', 'fbd7939d674997cdb4692d34de8633c4', 'FTI-TF', 0, 'Maret 2002'),
(78, 'BAMBANG PUJIADI', '195911241986031001', '77', '28dd2c7955ce926456240b2ff0100bde', 'SAC', 0, 'Maret 2002'),
(79, 'WIYONO', '196703162009101001', '78', '35f4a8d465e6e1edc05f3d8ab658c551', 'BKSP', 0, 'Maret 2002'),
(80, 'SOLEHA', '198301072006042001', '79', 'd1fe173d08e959397adf34b1d77e88d7', 'FMIPA-MTK', 0, 'Maret 2002'),
(81, 'WAWAN PRAWONO', '198202182009101001', '80', 'f033ab37c30201f73f142449d037028d', 'FTI-D3.TEKIM', 0, 'Maret 2002'),
(82, 'NURUL HUDAH', '196504221986032001', '81', '43ec517d68b6edd3015b3edc9a11367b', 'FTI-TF', 0, 'Maret 2002'),
(83, 'PAMBOEDI R', '196101222006041001', '82', '9778d5d219c5080b9a6a17bef029331c', 'FTI-TM', 0, 'Maret 2002'),
(84, 'DANUN AL BAGIO', '196205131981031001', '83', 'fe9fc289c3ff0af142b6d3bead98a923', 'FTI-TEKIM', 0, 'Maret 2002'),
(85, 'SISWO DJOKO', '196005191981031003', '84', '68d30a9594728bc39aa24be94b319d21', 'FTSP', 0, 'Maret 2002'),
(86, 'HERI IMAN SUTRISNO', '196912251990021001', '85', '3ef815416f775098fe977004015c6193', 'FTSP-PWK', 0, 'Maret 2002'),
(87, 'WIWIK NURSIA', '197205091995122001', '86', '93db85ed909c13838ff95ccfa94cebd9', 'FTI-D3.TEKIM', 0, 'Maret 2002'),
(88, 'KHUSNUL KHOTIMAH', '197302052007012002', '87', 'c7e1249ffc03eb9ded908c236bd1996d', 'FTI-TF', 0, 'Maret 2002'),
(89, 'TEGUH INDRASTO', '196208171982031006', '88', '2a38a4a9316c49e5a833517c45d31070', 'FTK', 0, 'Oktober 2004'),
(90, 'HARI KRISTIONO', '197605282007011001', '89', '7647966b7343c29048673252e490f736', 'FTK', 0, 'Oktober 2004'),
(91, 'SUGENG DJOKO SKH', '197107242007101001', '90', '8613985ec49eb8f757ae6439e879bb2a', 'LPPM', 0, 'Maret 2002'),
(92, 'KUSUMA DEWI', '198312252006042001', '91', '54229abfcfa5649e7003b83dd4755294', 'BKSP', 0, 'Januari 2008'),
(93, 'RATNA LINDA P', '197904032009102002', '92', '92cc227532d17e56e07902b254dfad10', 'UPT-FASUM', 0, 'Maret 2002'),
(94, 'ABAS', '196401051987021001', '93', '98dce83da57b0395e163467c9dae521b', 'FMIPA-FIS', 0, 'Januari 2008'),
(95, 'KAMIN', '196001021981031006', '94', 'f4b9ec30ad9f68f89b29639786cb62ef', 'FMIPA-MTK', 0, 'Januari 2008'),
(96, 'WARLINDA EKA T', '198303082010122007', '95', '812b4ba287f5ee0bc9d43bbf5bbe87fb', 'FTI-D3.TEKIM', 0, 'Januari 2008'),
(97, 'TOTOK SETIAWAN', '197206032009101003', '96', '26657d5ff9020d2abefe558796b99584', 'FTI-TM', 0, 'Januari 2009'),
(98, 'SUTARI', '196202121985121001', '97', 'e2ef524fbf3d9fe611d5a8e90fefdc9c', 'FTI-T.MAT', 0, 'Maret 2002'),
(99, 'VIKTOR HARIADI', '197206032009102002', '98', 'ed3d2c21991e3bef5e069713af9fa6ca', 'FTIF', 0, 'Januari 2008'),
(100, 'UTOMO', '196705111985121001', '99', 'ac627ab1ccbdb62ec96e702f07f6425b', 'FTK', 0, 'Maret 2002'),
(101, 'SUHDIONO', '196112311982031030', '100', 'f899139df5e1059396431415e770c6dd', 'FTK', 0, 'Maret 2002'),
(102, 'AGUS NURWAHYUDI', '196012101983031006', '101', '38b3eff8baf56627478ec76a704e9b52', 'FTSP-T.SIP', 0, 'Maret 2002'),
(103, 'SUHUD SE', '196508281993031001', '102', 'ec8956637a99787bd197eacd77acce5e', 'BAKP', 0, 'Oktober 2004'),
(104, 'INDAH SUGIARTININGSIH', '195801081981032001', '103', '6974ce5ac660610b44d9b9fed0ff9548', 'BAKP', 0, 'Maret 2002'),
(105, 'ISMI AZIZAH', '197706192008102001', '104', 'c9e1074f5b3f9fc8ea15d152add07294', 'PASCASARJANA', 0, 'Maret 2002'),
(106, 'BAMBANG PRIAMBODO', '196612221987021001', '105', '65b9eea6e1cc6bb9f0cd2a47751a186f', 'BAKP', 0, 'Maret 2002'),
(107, 'DJUMARI', '196805052007011001', '106', 'f0935e4cd5920aa6c7c996a5ee53a70f', 'UPT. PERPS', 0, 'Oktober 2004'),
(108, 'EKO SULISTIONO', '197006182001121002', '107', 'a97da629b098b75c294dffdc3e463904', 'UPT. PERPS', 0, 'Maret 2002'),
(109, 'INDAH RIA S', '195809201981032002', '108', 'a3c65c2974270fd093ee8a9bf8ae7d0b', 'LPMP2KI', 0, 'Maret 2002'),
(110, 'DRS GONTJANG P.MSI', '196601021990031001', '109', '2723d092b63885e0d7c260cc007e8b9d', 'FMIPA-FIS', 0, 'Januari 2011'),
(111, 'ZAHROTUL ISTIQOMAH', '197901052005012001', '110', '5f93f983524def3dca464469d2cf9f3e', 'FMIPA-KIM', 0, 'Januari 2010'),
(112, 'IR ESTUTIE MAULANIE', '195305311985022001', '111', '698d51a19d8a121ce581499d7b701668', 'FTI-D3.T.SIP', 0, 'Januari 2009'),
(113, 'KAMSUN', '197209212007011002', '112', '7f6ffaa6bb0b408017b62254211691b5', 'FTI-TF', 0, 'Maret 2002'),
(114, 'DDIK TJATUR IRIANTO', '196201151981031001', '113', '73278a4a86960eeb576a8fd4c9ec6997', 'FTK', 0, 'Maret 2002'),
(115, 'SRI MURJANI', '195809271994032001', '114', '5fd0b37cd7dbbb00f97ba6ce92bf5add', 'FTSP', 0, 'Oktober 2004'),
(116, 'SANTI ANDAYANI', '197805162008102001', '115', '2b44928ae11fb9384c4cf38708677c48', 'BAKP', 0, 'Maret 2002'),
(117, 'NUR AINI', '196010301981032001', '116', 'c45147dee729311ef5b5c3003946c48f', 'BPS', 0, 'Maret 2002'),
(118, 'ACHMAD ARIFIN', '197411242007011003', '117', 'eb160de1de89d9058fcb0b968dbbbd68', 'UPT-KK', 0, 'Maret 2002'),
(119, 'INDAH PURWATI', '197612112007012002', '118', '5ef059938ba799aaa845e1c2e8a762bd', 'BKIBV', 0, 'Maret 2002'),
(120, 'DIDIT ARDIAT', '197009301995121001', '119', '07e1cd7dca89a1678042477183b7ac3f', 'FTI-D3TELEK', 0, 'Oktober 2004'),
(121, 'SITI AMINAH', '197802092009102001', '120', 'da4fb5c6e93e74d3df8527599fa62642', 'FTI-TEKIM', 0, 'Maret 2002'),
(122, 'ROCHMAT', '130911626', '121', '4c56ff4ce4aaf9573aa5dff913df997a', 'FTI-TEKIM', 0, 'Maret 2002'),
(123, 'POEDJIANTO', '196509241987011001', '122', 'a0a080f42e6f13b3a2df133f073095dd', 'FTSP-T.SIP', 0, 'Maret 2002'),
(124, 'TRI BUDI UTAMA', '196304171990031002', '123', '202cb962ac59075b964b07152d234b70', 'BAKP', 0, 'Maret 2002'),
(125, 'NOOR CHODIJAH MOERAD', '196309261990032001', '124', 'c8ffe9a587b126f152ed3d89a146b445', 'BKSP', 0, 'Maret 2002'),
(126, 'BAYU SUDIYONO', '197004212008101001', '125', '3def184ad8f4755ff269862ea77393dd', 'BKSP', 0, 'Oktober 2004'),
(127, 'BUDI PRAYITNO', '197504182009101003', '126', '069059b7ef840f0c74a814ec9237b6ec', 'BKSP', 0, 'Oktober 2004'),
(128, 'TARIP', '196112061981031001', '127', 'ec5decca5ed3d6b8079e2e7e7bacc9f2', 'UPT-KK', 0, 'Oktober 2004'),
(129, 'ISA ARIFIN', '196509131986031003', '128', '76dc611d6ebaafc66cc0879c71b5db5c', 'ITS-PRESS', 0, 'Oktober 2004'),
(130, 'EDY SUPRAYITNO', '196804271992031001', '129', 'd1f491a404d6854880943e5c3cd9ca25', 'UPT. PERPS', 0, 'Oktober 2004'),
(131, 'ASTUTIK NUR QOMARIYAH', '198409152009122004', '130', '9b8619251a19057cff70779273e95aa6', 'UPT. PERPS', 0, 'Oktober 2004'),
(132, 'WARNOTO', '196301081981031001', '131', '1afa34a7f984eeabdbb0a7d494132ee5', 'BPS', 0, 'Oktober 2004'),
(133, 'ARIYANTO', '196911021999031001', '132', '65ded5353c5ee48d0b7d48c591b8f430', 'FMIPA-KIM', 0, 'Oktober 2004'),
(134, 'DIDIK KHUSNUL ARIF', '197309301997021001', '133', '9fc3d7152ba9336a670e36d0ed79bc43', 'FMIPA-MTK', 0, 'Oktober 2004'),
(135, 'CUCUK WALUYO', '196305101986031006', '134', '02522a2b2726fb0a03bb19f2d8d9524d', 'FMIPA-MTK', 0, 'Januari 2006'),
(136, 'SUDARMI SE', '196107041981032001', '135', '7f1de29e6da19d22b51c68001e7e0e54', 'FTI-TEKIM', 0, 'Januari 2007'),
(137, 'DEWI PUSPITA SARI', '197810302001122001', '136', '42a0e188f5033bc65bf8d78622277c4e', 'FTI-TEKIM', 0, 'Januari 2008'),
(138, 'MOCH SHOLEH', '196110251981031002', '137', '3988c7f88ebcb58c6ce932b957b6f332', 'FTK', 0, 'Oktober 2004'),
(139, 'AGUS DWI P', '197307162002121001', '138', '013d407166ec4fa56eb1e1f8cbe183b9', 'BKSP', 0, 'Januari 2008'),
(140, 'KAMUDJI', '196509042007011001', '139', 'e00da03b685a0dd18fb6a08af0923de0', 'BKSP', 0, 'Januari 2014'),
(141, 'ASNAWI', '195807061983121001', '140', '1385974ed5904a438616ff7bdb3f7439', 'UPT-KK', 0, 'Oktober 2004'),
(142, 'KASRIPIN', '195906051987011001', '141', '0f28b5d49b3020afeecd95b4009adf4c', 'UPT. PERPS', 0, 'Januari 2008'),
(143, 'SITI SARININGSIH', '196312051986032002', '142', 'a8baa56554f96369ab93e4f3bb068c22', 'FMIPA-MTK', 0, 'Oktober 2004'),
(144, 'IRIYATNO', '196407151987021002', '143', '903ce9225fca3e988c2af215d4e544d3', 'FTI-D3T.ELEK', 0, 'Oktober 2004'),
(145, 'MUSA', '196510251987011001', '144', '0a09c8844ba8f0936c20bd791130d6b6', 'FTI-D3.TM', 0, 'Oktober 2004'),
(146, 'SUBAKIR', '195901181981031006', '145', '2b24d495052a8ce66358eb576b8912c8', 'FTI-TEKIM', 0, 'Oktober 2004'),
(147, 'PURNOMO', '196406261994031003', '146', 'a5e00132373a7031000fd987a3c9f87b', 'FTK', 0, 'Oktober 2004'),
(148, 'RUSLAN ABDUL GANI', '196703041995121001', '147', '8d5e957f297893487bd98fa830fa6413', 'FTK', 0, 'Oktober 2004'),
(149, 'TITUS  SABAT T', '197610032002121003', '148', '47d1e990583c9c67424d369f3414728e', 'FTSP-T.SIP', 0, 'Oktober 2004'),
(150, 'ABD SJUKUR', '195908241981031006', '149', 'f2217062e9a397a1dca429e7d70bc6ca', 'BKSP', 0, 'Maret 2002'),
(151, 'SUPASDI', '195903011982031003', '150', '7ef605fc8dba5425d6965fbd4c8fbe1f', 'BKSP', 0, 'Oktober 2004'),
(152, 'SUPARNO', '197504102001121003', '151', 'a8f15eda80c50adb0e71943adc8015cf', 'BKSP', 0, 'Oktober 2004'),
(153, 'PUJANANTO', '196806242007011002', '152', '37a749d808e46495a8da1e5352d03cae', 'BKSP', 0, 'Oktober 2004'),
(154, 'ACHJUMAH SUKARNI', '196109261985032001', '153', 'b3e3e393c77e35a4a3f3cbd1e429b5dc', 'BAUK-SDM', 0, 'Januari 2008'),
(155, 'SUNAWI', '197905152009101001', '154', '1d7f7abc18fcb43975065399b0d1e48e', 'UPMB', 0, 'Januari 2008'),
(156, 'SENTOT DIDIK S', '196005271987011001', '155', '2a79ea27c279e471f4d180b08d62b00a', 'FMIPA-MTK', 0, 'Januari 2006'),
(157, 'SUKIMIN', '196909102007011001', '156', '1c9ac0159c94d8d0cbedc973445af2da', 'FTI', 0, 'Oktober 2004'),
(158, 'NINIK RAHMANIYAH', '197210232007012001', '157', '6c4b761a28b734fe93831e3fb400ce87', 'FTI', 0, 'Oktober 2004'),
(159, 'AGUS SUWIYANTO', '196108082006041002', '158', '06409663226af2f3114485aa4e0a23b4', 'FTI', 0, 'Oktober 2004'),
(160, 'SUMINTO', '196906292001121001', '159', '140f6969d5213fd0ece03148e62e461e', 'FTI-TM', 0, 'Oktober 2004'),
(161, 'MUKTI UTOMO', '195810051983011001', '160', 'b73ce398c39f506af761d2277d853a92', 'FTI-TEKIM', 0, 'Oktober 2004'),
(162, 'MOCH HOESIN', '196107121981031002', '161', 'bd4c9ab730f5513206b999ec0d90d1fb', 'FTI-T.MAT', 0, 'Oktober 2004'),
(163, 'SOENARIJO', '195809291982021001', '162', '82aa4b0af34c2313a562076992e50aa3', 'FTK', 0, 'Oktober 2004'),
(164, 'LENDRA JUNI SETIAWAN', '197906052009101003', '163', '0777d5c17d4066b82ab86dff8a46af6f', 'UPT-KK', 0, 'Oktober 2004'),
(165, 'SUMADI', '197007222008101001', '164', 'fa7cdfad1a5aaf8370ebeda47a1ff1c3', 'UPT-KK', 0, 'Maret 2002'),
(166, 'BUDI HARTANTO', '196605172001121001', '165', '9766527f2b5d3e95d4a733fcfb77bd7e', 'UPT. PERPS', 0, 'Maret 2002'),
(167, 'DRS ANIS BADRES', '196009272006041001', '166', '7e7757b1e12abcb736ab9a754ffb617a', 'UPT-BAHASA', 0, 'Maret 2002'),
(168, 'DYAH SATYA YOGA', '195808241985112001', '167', '5878a7ab84fb43402106c575658472fa', 'OPM-SOSHUM', 0, 'Oktober 2004'),
(169, 'SETYA NUGROHO', '196508201999031001', '168', '006f52e9102a8d3be2fe5614f42ba989', 'FTI-T.ELEK', 0, 'Januari 2008'),
(170, 'ALI SAID', '197611282008101003', '169', '3636638817772e42b59d74cff571fbb3', 'FTI-D3.TM', 0, 'Januari 2008'),
(171, 'MUCHAMMAD ARIFIN', '198107182001121003', '170', '149e9677a5989fd342ae44213df68868', 'FTI-TF', 0, 'Januari 2008'),
(172, 'SAWAL', '196701041999031003', '171', 'a4a042cf4fd6bfb47701cbc8a1653ada', 'FTI-TF', 0, 'Januari 2010'),
(173, 'IRA WAHYUNI', '197704182005012002', '172', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e', 'FTI-TI', 0, 'Oktober 2004'),
(174, 'SUNYOTO', '197011122007021001', '173', 'f7e6c85504ce6e82442c770f7c8606f0', 'FTK', 0, 'Januari 2014'),
(175, 'DIDIK DWI SANTOSO', '197906182007101002', '174', 'bf8229696f7a3bb4700cfddef19fa23f', 'FTK', 0, 'Maret 2002'),
(176, 'IBNU WIBOWO', '195812031981031005', '175', '82161242827b703e6acf9c726942a1e4', 'FTSP-ARSTK', 0, 'Januari 2008'),
(177, 'SOLIKIN', '196103071987011001', '176', '38af86134b65d0f10fe33d30dd76442e', 'FTSP-ARSTK', 0, 'Januari 2008'),
(178, 'SUGIYANTO', '196610141987091001', '177', '96da2f590cd7246bbde0051047b0d6f7', 'FTSP-TL', 0, 'Januari 2008'),
(179, 'TULUS PURWANTO', '196504151990031002', '178', '8f85517967795eeef66c225f7883bdcb', 'LPPM', 0, 'Oktober 2004'),
(180, 'ANDRIANI LILIANA', '196604181989132001', '179', '8f53295a73878494e9bc8dd6c3c7104f', 'LPPM', 0, 'Januari 2008'),
(181, 'ASMAD', '196302221987031002', '180', '045117b0e0a11a242b9765e79cbf113f', 'HKTL', 0, 'Oktober 2004'),
(182, 'MOCH SIFAK', '196507121987021002', '181', 'fc221309746013ac554571fbd180e1c8', 'UPT-KK', 0, 'Oktober 2004'),
(183, 'MUHTAROM ILYAS', '195110111985031001', '182', '4c5bde74a8f110656874902f07378009', 'UPM-SOSHUM', 0, 'Oktober 2004'),
(184, 'MUDJIANA', '197811262009101002', '183', 'cedebb6e872f539bef8c3f919874e9d7', 'UPT. PERPS', 0, 'Maret 2002'),
(185, 'YAKUN', '196308081995121001', '184', '6cdd60ea0045eb7a6ec44c54d29ed402', 'FMIPA-KIM', 0, 'Maret 2002'),
(186, 'DRS NURUL HIDAYAT', '196304041989031002', '185', 'eecca5b6365d9607ee5a9d336962c534', 'FMIPA-MTK', 0, 'Oktober 2004'),
(187, 'SHOCHIB', '195908221989021001', '186', '9872ed9fc22fc182d371c3e9ed316094', 'FTI-D3.TM', 0, 'Oktober 2004'),
(188, 'KARDJI', '195902111981031001', '187', '31fefc0e570cb3860f2a6d4b38c6490d', 'FTI-TEKIM', 0, 'Januari 2006'),
(189, 'ARIF SUSANTO', '196801312007011002', '188', '9dcb88e0137649590b755372b040afad', 'FTSP-ARSTK', 0, 'Januari 2006'),
(190, 'HARSONO', '196212312006041034', '189', 'a2557a7b2e94197ff767970b67041697', 'FTSP-TL', 0, 'Januari 2006'),
(191, 'ALIYATI ELCHURIAH', '196210071982032001', '190', 'cfecdb276f634854f3ef915e2e980c31', 'FTSP-T.SIP', 0, 'Maret 2002'),
(192, 'MOCH JAINURI', '195910141981031003', '191', '0aa1883c6411f7873cb83dacb17b0afc', 'BAKP', 0, 'Oktober 2004'),
(193, 'PURWONO', '196509121987021001', '192', '58a2fc6ed39fd083f55d4182bf88826d', 'TU-PUSAT', 0, 'Januari 2008'),
(194, 'SLAMET SUGITO', '195909021981031001', '193', 'bd686fd640be98efaae0091fa301e613', 'UPT-KK', 0, 'Januari 2008'),
(195, 'TAUFIQ RAHMANU', '197605252007011002', '194', 'a597e50502f5ff68e3e25b9114205d4a', 'UPT. PERPS', 0, 'Januari 2008'),
(196, 'NANI RISWIDAYANTI', '197611042007012001', '195', '0336dcbab05b9d5ad24f4333c7658a0e', 'LPMP2KI', 0, 'Januari 2009'),
(197, 'SOKIP', '196810032007011002', '196', '084b6fbb10729ed4da8c3d3f5a3ae7c9', 'FMIPA-FIS', 0, 'Januari 2010'),
(198, 'SOPET', '196310041986032002', '197', '85d8ce590ad8981ca2c8286f79f59954', 'FMIPA-KIM', 0, 'Januari 2006'),
(199, 'KARI UTOMO', '195909221981031002', '198', '0e65972dce68dad4d52d063967f0a705', 'FTI', 0, 'Januari 2008'),
(200, 'ARIFIN', '197012052007011001', '199', '84d9ee44e457ddef7f2c4f25dc8fa865', 'FTI-TEKIM', 0, 'Januari 2013'),
(201, 'HERMAN PRATIKNO', '197304152000031001', '200', '3644a684f98ea8fe223c713b77189a77', 'FTK', 0, 'Januari 2013'),
(202, 'KASPUDJI', '196012211987011001', '201', '757b505cfd34c64c85ca5b5690ee5293', 'FTK', 0, 'Maret 2002'),
(203, 'DWI MUSDARWATI', '195911291986012001', '202', '854d6fae5ee42911677c739ee1734486', 'FTSP', 0, 'Maret 2002'),
(204, 'EVILIAWANTI', '197101222006042003', '203', 'e2c0be24560d78c5e599c2a9c9d0bbd2', 'FTSP-DESPRO', 0, 'Maret 2002'),
(205, 'AGUNG TJAHJONO', '196002111981031003', '204', '274ad4786c3abca69fa097b85867d9a4', 'BAKP', 0, 'Maret 2002'),
(206, 'IDAYATI', '197204172007012001', '205', 'eae27d77ca20db309e056e3d2dcd7d69', 'BAKP', 0, 'Oktober 2004'),
(207, 'RIRIT PURWANTI', '198308082008012011', '206', '7eabe3a1649ffa2b3ff8c02ebfd5659f', 'BKSP', 0, 'Maret 2002'),
(208, 'ABDUL ROCHIM', '196708312009101001', '207', '69adc1e107f7f7d035d7baf04342e1ca', 'BKSP', 0, 'Maret 2002'),
(209, 'R.H BUDI PRAMONO', '196208272006041001', '208', '091d584fced301b442654dd8c23b3fc9', 'UPT-ASRAMA', 0, 'Maret 2002'),
(210, 'SITI MUAWANAH', '198309252009102001', '209', 'b1d10e7bafa4421218a51b1e1f1b0ba2', 'UPT-GRAHA', 0, 'Maret 2002'),
(211, 'MUZAMMIL', '197009031990031003', '210', '6f3ef77ac0e3619e98159e9b6febf557', 'FMIPA-FIS', 0, 'Maret 2002'),
(212, 'DRS ALI YUNUS R', '196705141993031016', '211', 'eb163727917cbba1eea208541a643e74', 'FMIPA-FIS', 0, 'Oktober 2004'),
(213, 'SOBI''I', '196010261983011001', '212', '1534b76d325a8f591b52d302e7181331', 'FMIPA-STAT', 0, 'Oktober 2004'),
(214, 'SAMID', '197404152007101001', '213', '979d472a84804b9f647bc185a877a8b5', 'FTI-TF', 0, 'Januari 2006'),
(215, 'ARIFIN', '196305101985031007', '214', 'ca46c1b9512a7a8315fa3c5a946e8265', 'FTSP', 0, 'Januari 2008'),
(216, 'YUNIANTO', '197106102007011001', '215', '3b8a614226a953a8cd9526fca6fe9ba5', 'FTSP-TL', 0, 'Januari 2008'),
(217, 'MUJIANTO', '196103281981031001', '216', '45fbc6d3e05ebd93369ce542e8f2322d', 'BKSP', 0, 'Januari 2004'),
(218, 'MUSLIMIN', '196101121982121001', '217', '63dc7ed1010d3c3b8269faf0ba7491d4', 'UPT. PERPS', 0, 'Maret 2002'),
(219, 'Drs MATDURI', '196806172008101001', '218', 'e96ed478dab8595a7dbda4cbcbee168f', 'UPT-BAHASA', 0, 'Januari 2011'),
(220, 'MARSAM', '195905011981031002', '219', 'c0e190d8267e36708f955d7ab048990d', 'FMIPA', 0, 'Januari 2012'),
(221, 'TITIK MUDJIATI', '196508051989032002', '220', 'ec8ce6abb3e952a85b8551ba726a1227', 'FMIPA-MTK', 0, 'Januari 2011'),
(222, 'SOETRISNO', '196007121987011001', '221', '060ad92489947d410d897474079c1477', 'FTI', 0, 'Oktober 2004'),
(223, 'TARTIP JAYADI', '196709081992031002', '222', 'bcbe3365e6ac95ea2c0343a2395834dd', 'BAKP', 0, 'Oktober 2004'),
(224, 'MARSAID', '196001201981031003', '223', '115f89503138416a242f40fb7d7f338e', 'FTI-TEKIM', 0, 'Oktober 2004'),
(225, 'SUDIARTO', '196210091986031005', '224', '13fe9d84310e77f13a6d184dbf1232f3', 'FTSP', 0, 'Januari 2008'),
(226, 'ILYAS', '196603122007011001', '225', 'd1c38a09acc34845c6be3a127a5aacaf', 'FTSP-ARSTK', 0, 'Januari 2008'),
(227, 'UMAIRI', '197902072007011001', '226', '9cfdf10e8fc047a44b08ed031e1f0ed1', 'FTSP-ARSTK', 0, 'Januari 2009'),
(228, 'MUHAMMAD BURHANUDIN', '198210312009101001', '227', '705f2172834666788607efbfca35afb3', 'FTSP-PWK', 0, 'Oktober 2004'),
(229, 'MUHYIDIN S.SOS', '197002011990031001', '228', '74db120f0a8e5646ef5a30154e9f6deb', 'LPPM', 0, 'Oktober 2004'),
(230, 'ARMAN SURYANTO', '196701142007011001', '229', '57aeee35c98205091e18d1140e9f38cf', 'LPPM', 0, 'Januari 2009'),
(231, 'DARMAWAN', '1981102320091003', '230', '6da9003b743b65f4c0ccd295cc484e57', 'LPPM', 0, 'Januari 2008'),
(232, 'USUP', '195907151988031001', '231', '9b04d152845ec0a378394003c96da594', 'BAUK-SDM', 0, 'Maret 2002'),
(233, 'TUTUS WIBOWO', '195906051981031004', '232', 'be83ab3ecd0db773eb2dc1b0a17836a1', 'BIRO UMUM', 0, 'Maret 2002'),
(234, 'KOHAR', '196304231987021001', '233', 'e165421110ba03099a1c0393373c5b43', 'UPT-KK', 0, 'Maret 2002'),
(235, 'TRI RAHAYU H', '197511012008102001', '234', '289dff07669d7a23de0ef88d2f7129e7', 'UPM-SOSHUM', 0, 'Maret 2002'),
(236, 'AFENDI ADI HERMAWAN', '197502081999031001', '235', '577ef1154f3240ad5b9b413aa7346a1e', 'FMIPA-BIO', 0, 'Maret 2002'),
(237, 'HERY KUSMAYADI', '195910241987021001', '236', '01161aaa0b6d1345dd8fe4e481144d84', 'FTI-D3.TEKIM', 0, 'Oktober 2004'),
(238, 'HARDIMAN', '195805071983031002', '237', '539fd53b59e3bb12d203f45a912eeaf2', 'FTK', 0, 'Oktober 2004'),
(239, 'BAMBANG ISKANDARIAWAN', '196011221990021001', '238', 'ac1dd209cbcc5e5d1c6e28598e8cbbe8', 'FTSP-DESPRO', 0, 'Oktober 2004'),
(240, 'SUBAGIO', '196008042006041013', '239', '555d6702c950ecb729a966504af0a635', 'FTSP-GEOMATIKA', 0, 'Januari 2006'),
(241, 'EKO BIANTO', '196711201990031004', '240', '335f5352088d7d9bf74191e006d8e24c', 'BAKP', 0, 'Januari 2006'),
(242, 'ESTI PANGESTU', '196405071994032002', '241', 'f340f1b1f65b6df5b5e3f94d95b11daf', 'BAKP', 0, 'Januari 2006'),
(243, 'TARIMO', '196112311987021002', '242', 'e4a6222cdb5b34375400904f03d8e6a5', 'UPT-KK', 0, 'Januari 2006'),
(244, 'SARWONO', '197209282007011004', '243', 'cb70ab375662576bd1ac5aaf16b3fca4', 'UPT. PERPS', 0, 'Januari 2007'),
(245, 'Drs. SRI SUPRAPTI', '195402221984032001', '244', '9188905e74c28e489b44e954ec0b9bca', 'FMIPA', 0, 'Januari 2008'),
(246, 'Drs. EC. SUPARNO', '196305151985121001', '245', '0266e33d3f546cb5436a10798e657d97', 'FMIPA-FIS', 0, 'Januari 2008'),
(247, 'RATNA EDIATI', '196006221986032002', '246', '38db3aed920cf82ab059bfccbd02be6a', 'FMIPA-KIMIA', 0, 'Januari 2008'),
(248, 'TOAT AMINULLAH', '196911132007011002', '247', '3cec07e9ba5f5bb252d13f5f431e4bbb', 'FMIPA-MTK', 0, 'Oktober 2004'),
(249, 'Ir. SETIAWAN', '196010301987011001', '248', '621bf66ddb7c962aa0d22ac97d69b793', 'FMIPA-STATISTIKA', 0, 'Oktober 2004'),
(250, 'SURODJO', '196201011981031001', '249', '077e29b11be80ab57e1a2ecabb7da330', 'FTI-TEKIM', 0, 'Oktober 2004'),
(251, 'JUNI HARIJANTO', '197107062008101001', '250', '6c9882bbac1c7093bd25041881277658', 'FTK', 0, 'Januari 2006'),
(252, 'YEYES MULYADI', '197312072001121001', '251', '19f3cd308f1455b3fa09a282e0d496f4', 'FTK', 0, 'Oktober 2004'),
(253, 'IRFAN ARIFIN', '197707282009101001', '252', '03c6b06952c750899bb03d998e631860', 'FTSP-TL', 0, 'Januari 2011'),
(254, 'Sumadi', '197007222008101001', '253', 'c24cd76e1ce41366a4bbe8a49b02a028', 'PPS', 0, 'Januari 2012'),
(255, 'Moch Arief Budi Laksono', '196805041992031001', '254', 'c52f1bd66cc19d05628bd8bf27af3ad6', 'LPPM', 0, 'Januari 2013'),
(256, 'Agus Effendi', '196208171987021001', '255', 'fe131d7f5a6b38b23cc967316c13dae2', 'BKSP', 0, 'Januari 2012'),
(257, 'Prawito', '196708242007011003', '256', 'f718499c1c8cef6730f9fd03c8125cab', 'UPT-KK', 0, 'Januari 2012'),
(258, 'Suroto', '196509272007011001', '257', 'd96409bf894217686ba124d7356686c9', 'UPT-KK', 0, 'Januari 2009'),
(259, 'Choirul Chanafi', '196501291987021001', '258', '502e4a16930e414107ee22b6198c578f', 'FMIPA-STATISTIK', 0, 'Januari 2009'),
(260, 'Sriati', '197109122007012001', '259', 'cfa0860e83a4c3a763a7e62d825349f7', 'FTI-TEKIM', 0, 'Januari 2006'),
(261, 'Jarwo', '196609121987021001', '260', 'a4f23670e1833f3fdb077ca70bbd5d66', 'FTIF-SI', 0, 'Januari 2013'),
(262, 'Suwantono', '197004112006041001', '261', 'b1a59b315fc9a3002ce38bbe070ec3f5', 'FTK-T.PRKPLAN', 0, 'Januari 2013'),
(263, 'Joko Wahyudi', '197904052009101002', '262', '36660e59856b4de58a219bcf4e27eba3', 'FTK-T.KELAUTAN', 0, 'Januari 2013'),
(264, 'MASUPAR', '196407022007011001', '263', '8c19f571e251e61cb8dd3612f26d5ecf', 'FTSP-TL', 0, 'Maret 2002'),
(265, 'Octaviyanti Dwi W', '198110012005012001', '264', 'd6baf65e0b240ce177cf70da146c8dc8', 'FTSP-DESPRO', 0, 'Maret 2002'),
(266, ' Andy Afandy', '029', '265', 'e56954b4f6347e897f954495eab16a88', 'FTSP-TL', 0, 'Maret 2002'),
(267, 'Samsul Arifin', '036', '266', 'f7664060cc52bc6f3d620bcedc94a4b6', 'FMIPA', 0, 'Januari 2008'),
(268, 'Sumarsih', '031', '267', 'eda80a3d5b344bc40f3bc04f65b7a357', 'Wisma-Flamboyan', 0, 'Januari 2004'),
(269, 'Ernawati', '032', '268', '8f121ce07d74717e0b1f21d122e04521', 'Wisma-Flamboyan', 0, 'Oktober 2004'),
(270, 'Thousand Ach Tohar', '037', '269', '06138bc5af6023646ede0e1f7c1eac75', 'UPT-MEDICAL', 0, 'Oktober 2004'),
(271, ' Achmad Syihabbudin', '030', '270', '39059724f73a9969845dfe4146c5660e', 'KPN-ITS', 0, 'Maret 2002'),
(272, 'Nor Salim', '026', '271', '7f100b7b36092fb9b06dfb4fac360931', 'KPN-ITS', 0, 'Oktober 2004');

-- --------------------------------------------------------

--
-- Table structure for table `kop_pinjaman`
--

CREATE TABLE IF NOT EXISTS `kop_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `jumlah_pinjaman` varchar(50) DEFAULT NULL,
  `masa` int(11) NOT NULL,
  `sekarang` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `angsuran_pokok` varchar(50) DEFAULT NULL,
  `sisa_angsuran` varchar(50) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kop_simpanan`
--

CREATE TABLE IF NOT EXISTS `kop_simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `no_anggota` int(11) NOT NULL,
  `spn_pokok` varchar(50) NOT NULL,
  `spn_wajib` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `tgl_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `kode_label` int(5) NOT NULL,
  `judul_label` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `kode_blog` int(4) NOT NULL,
  `judul_blog` text,
  `deskripsi_blog` text,
  `limit_content` int(3) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `facebook_fans_page` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `g_plus` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `information` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `kode_user` int(5) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `g_plus` varchar(200) DEFAULT NULL,
  `about` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userapp`
--

INSERT INTO `userapp` (`kode_user`, `username`, `password`, `nama_lengkap`, `facebook`, `twitter`, `g_plus`, `about`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Rizki Rinaldi', '', '', '', ''),
(2, 'koperasi', '123456', 'Admin Koperasi', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `no` int(7) NOT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
(9, '::1', 'Windows 7', 'Firefox 40.0', '2015-10-06 04:45:00'),
(10, '::1', 'Windows 7', 'Chrome 38.0.2125.101', '2015-10-08 05:50:27'),
(11, '::1', 'Windows 7', 'Chrome 38.0.2125.101', '2015-10-09 08:01:00'),
(12, '::1', 'Windows 7', 'Chrome 38.0.2125.101', '2015-10-09 09:56:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_anggota`
--
ALTER TABLE `calon_anggota`
  ADD PRIMARY KEY (`id_calon_anggota`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`), ADD KEY `word` (`word`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`kode_content`);

--
-- Indexes for table `content_label`
--
ALTER TABLE `content_label`
  ADD PRIMARY KEY (`kode_content`,`kode_label`), ADD KEY `kode_label` (`kode_label`);

--
-- Indexes for table `gambar_slide`
--
ALTER TABLE `gambar_slide`
  ADD PRIMARY KEY (`id_updo`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`kode_comment`), ADD KEY `kode_content` (`kode_content`);

--
-- Indexes for table `kop_anggota`
--
ALTER TABLE `kop_anggota`
  ADD PRIMARY KEY (`id_userkoperasi`);

--
-- Indexes for table `kop_pinjaman`
--
ALTER TABLE `kop_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `kop_simpanan`
--
ALTER TABLE `kop_simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`kode_label`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`kode_blog`);

--
-- Indexes for table `userapp`
--
ALTER TABLE `userapp`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_anggota`
--
ALTER TABLE `calon_anggota`
  MODIFY `id_calon_anggota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=308;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `kode_content` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gambar_slide`
--
ALTER TABLE `gambar_slide`
  MODIFY `id_updo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `kode_comment` int(7) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kop_anggota`
--
ALTER TABLE `kop_anggota`
  MODIFY `id_userkoperasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=273;
--
-- AUTO_INCREMENT for table `kop_pinjaman`
--
ALTER TABLE `kop_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kop_simpanan`
--
ALTER TABLE `kop_simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `kode_label` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `kode_blog` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userapp`
--
ALTER TABLE `userapp`
  MODIFY `kode_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `no` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
