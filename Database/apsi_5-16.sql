-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2017 at 12:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apsi_5-16`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` varchar(30) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `sifat_surat` char(1) NOT NULL,
  `status` varchar(30) NOT NULL,
  `terusan_surat` text NOT NULL,
  `instruksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `tgl_disposisi`, `sifat_surat`, `status`, `terusan_surat`, `instruksi`) VALUES
('disk20170120004226', '0000-00-00', '', 'Belum Didisposisi', '', ''),
('disk20170120010248', '2017-01-20', 'c', 'Sudah Didisposisi', 'test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 ', 'test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 '),
('disk20170120220306', '0000-00-00', '', 'Belum Didisposisi', '', ''),
('disk20170121024945', '2017-01-21', 'd', 'Sudah Didisposisi', 'test test test test test test ', 'test test test test test test  instruksi'),
('dism20170120003654', '2017-01-20', 'b', 'Sudah Didisposisi', 'kdkdd', 'sihdinais'),
('dism20170120003932', '2017-01-20', 'd', 'Sudah Didisposisi', 'kjj', 'kjkj'),
('dism20170120005407', '2017-01-20', 'd', 'Sudah Didisposisi', 'test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 test terusan disposisi 1 ', 'test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 test instruksi disposisi 1 '),
('dism20170120173850', '2017-01-20', 'd', 'Sudah Didisposisi', 'Terusan Surat A', 'Instruksi surat b'),
('dism20170120215951', '0000-00-00', '', 'Belum Didisposisi', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `kelola_surat_sk`
--
CREATE TABLE `kelola_surat_sk` (
`id_sk` varchar(30)
,`id_disposisi` varchar(30)
,`id_pesanan` varchar(30)
,`tgl_sk` date
,`perihal` varchar(100)
,`file` varchar(255)
,`tujuan_surat` varchar(100)
,`isi_surat` text
,`pengirim` varchar(100)
,`tgl_pesan` date
,`tgl_disposisi` date
,`sifat_surat` char(1)
,`status` varchar(30)
,`terusan_surat` text
,`instruksi` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kelola_surat_sk_d`
--
CREATE TABLE `kelola_surat_sk_d` (
`id_sk` varchar(30)
,`id_disposisi` varchar(30)
,`id_pesanan` varchar(30)
,`tgl_sk` date
,`perihal` varchar(100)
,`file` varchar(255)
,`tujuan_surat` varchar(100)
,`isi_surat` text
,`pengirim` varchar(100)
,`tgl_pesan` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kelola_surat_sm`
--
CREATE TABLE `kelola_surat_sm` (
`id_sm` varchar(30)
,`id_disposisi` varchar(30)
,`asal_surat` varchar(100)
,`tujuan_surat` varchar(100)
,`isi_surat` text
,`tgl_sm` date
,`tgl_terimasm` date
,`perihal` varchar(100)
,`file` varchar(255)
,`tgl_disposisi` date
,`sifat_surat` char(1)
,`status` varchar(30)
,`terusan_surat` text
,`instruksi` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kelola_surat_sm_d`
--
CREATE TABLE `kelola_surat_sm_d` (
`id_sm` varchar(30)
,`id_disposisi` varchar(30)
,`asal_surat` varchar(100)
,`tujuan_surat` varchar(100)
,`isi_surat` text
,`tgl_sm` date
,`tgl_terimasm` date
,`perihal` varchar(100)
,`file` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_sk` varchar(30) NOT NULL,
  `id_disposisi` varchar(30) NOT NULL,
  `id_pesanan` varchar(30) NOT NULL,
  `tgl_sk` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_sk`, `id_disposisi`, `id_pesanan`, `tgl_sk`, `perihal`, `file`) VALUES
('sk20170120004226', 'disk20170120004226', 'ps20170120004006', '2017-01-20', 'test surat keluar 1', ''),
('sk20170120004331', '', 'ps20170120004122', '2017-01-20', 'test surat keluar 2', ''),
('sk20170120010049', '', 'ps20170120010001', '2017-01-20', 'huh', ''),
('sk20170120010248', 'disk20170120010248', 'ps20170120004104', '2017-01-20', 'jiikninkn', ''),
('sk20170120220306', 'disk20170120220306', 'ps20170120084315', '2017-01-20', 'test 5', ''),
('sk20170121024945', 'disk20170121024945', 'ps20170121023917', '2017-01-21', 'tset test', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_sm` varchar(30) NOT NULL,
  `id_disposisi` varchar(30) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `isi_surat` text NOT NULL,
  `tgl_sm` date NOT NULL,
  `tgl_terimasm` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_sm`, `id_disposisi`, `asal_surat`, `tujuan_surat`, `isi_surat`, `tgl_sm`, `tgl_terimasm`, `perihal`, `file`) VALUES
('sm20170120003728', '', 'test surat masuk 2', 'test surat masuk 2', 'test surat masuk 2 test surat masuk 2 test surat masuk 2 test surat masuk 2 test surat masuk 2 ', '2017-01-02', '2017-01-03', 'test surat masuk 2', ''),
('sm20170120003932', 'dism20170120003932', 'test surat masuk 3', 'test surat masuk 3', 'test surat masuk 3 test surat masuk 3 test surat masuk 3 test surat masuk 3 test surat masuk 3 ', '2017-01-11', '2017-01-12', 'test surat masuk 3 ', ''),
('sm20170120005444', '', 'uitugui', 'ibikbuvuv', 'knknk', '2015-11-29', '2016-10-02', 'ihihih', ''),
('sm20170120173850', 'dism20170120173850', 'test peuting', 'test peuting tujuan', 'test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi test peuting isi ', '2017-01-18', '2017-01-20', 'hhhhhh', 'SCREEN_CAPTURE 2016-06-01 14-19-43-461.PNG'),
('sm20170120175200', '', 'dwa', 'dwa', 'dwa', '2017-01-20', '2017-01-20', 'daw', ''),
('sm20170120215951', 'dism20170120215951', 'Asal Surat A', 'Tujuan Surat A', 'Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A Isi Surat A ', '2017-01-19', '2017-01-20', 'Surat A', ''),
('sm20170120220139', '', 'Asal Surat B', 'tujuan Surat B', 'isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b isi surat b ', '2017-01-11', '2017-01-21', 'Surat B', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pesanan`
--

CREATE TABLE `surat_pesanan` (
  `id_pesanan` varchar(30) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `isi_surat` text NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `status_pesan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pesanan`
--

INSERT INTO `surat_pesanan` (`id_pesanan`, `tujuan_surat`, `isi_surat`, `pengirim`, `tgl_pesan`, `status_pesan`) VALUES
('ps20170120004006', 'test pesan surat 1', 'test pesan surat 1 test pesan surat 1 test pesan surat 1 test pesan surat 1 test pesan surat 1 ', 'test pesan surat 1', '2017-01-20', 'selesai'),
('ps20170120004104', 'test pesan surat 2', 'test pesan surat 2 test pesan surat 2 test pesan surat 2 test pesan surat 2 test pesan surat 2 ', 'test pesan surat 2', '2017-01-20', 'selesai'),
('ps20170120004122', 'test pesan surat 3', 'test pesan surat 3 test pesan surat 3 test pesan surat 3 test pesan surat 3 test pesan surat 3 ', 'test pesan surat 3', '2017-01-20', 'selesai'),
('ps20170120010001', 'htdhyt 446', ' vv vv  vv vv  vv vv  vv vv  vv vv  vv vv  vv vv ', 'hfhfhfhfh', '2017-01-20', 'selesai'),
('ps20170120084315', 'test tujuan pesan 5', 'test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 test isi pesan 5 ', 'test pesan 5', '2017-01-20', 'selesai'),
('ps20170120101012', 'jahito', 'clossersclossers clossersclossers clossersclossers clossersclossers clossersclossers ', 'renji', '2017-01-20', ''),
('ps20170120221832', 'Tujuan Surat B', 'Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A Isi Test Surat a isi test surat A ', 'Test Pengirim A', '2017-01-20', ''),
('ps20170121023917', 'test', 'tset', 'test', '2017-01-21', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` char(1) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kontak` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `alamat`, `jabatan`, `tgl_lahir`, `kontak`) VALUES
('01', 'admin', 'admin', 'a', 'admin', 'admin', 'admin', '2017-01-01', 'admin'),
('02', 'kapus', 'kapus', 'K', 'Budi', 'Cianjur', 'Kepala Persuratan', '2016-12-01', '085787654321'),
('03', 'up', 'up', 'U', 'Andi', 'Bandung Barat', 'Unit Persuratan', '2016-12-02', '081129381739'),
('04', 'pt', 'pt', 'P', 'Cecep', 'Ciranjang', 'Pejabat Terkait', '2016-12-03', '087727390392'),
('20170107172430', 'a', 'a', 'P', 'Dadang', 'Cipanas', 'Pejabat Terkait', '2016-11-10', '082138291029'),
('20170107172741', 'b', 'b', 'P', 'Elan', 'Cilaku', 'Pejabat Terkait', '2016-12-08', '0896271829372'),
('20170107183052', 'c', 'c', 'P', 'Fajar', 'Cipanas', 'Pejabat Terkait', '2017-01-08', '089927182737');

-- --------------------------------------------------------

--
-- Structure for view `kelola_surat_sk`
--
DROP TABLE IF EXISTS `kelola_surat_sk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelola_surat_sk`  AS  (select `surat_keluar`.`id_sk` AS `id_sk`,`surat_keluar`.`id_disposisi` AS `id_disposisi`,`surat_keluar`.`id_pesanan` AS `id_pesanan`,`surat_keluar`.`tgl_sk` AS `tgl_sk`,`surat_keluar`.`perihal` AS `perihal`,`surat_keluar`.`file` AS `file`,`surat_pesanan`.`tujuan_surat` AS `tujuan_surat`,`surat_pesanan`.`isi_surat` AS `isi_surat`,`surat_pesanan`.`pengirim` AS `pengirim`,`surat_pesanan`.`tgl_pesan` AS `tgl_pesan`,`disposisi`.`tgl_disposisi` AS `tgl_disposisi`,`disposisi`.`sifat_surat` AS `sifat_surat`,`disposisi`.`status` AS `status`,`disposisi`.`terusan_surat` AS `terusan_surat`,`disposisi`.`instruksi` AS `instruksi` from ((`surat_keluar` join `surat_pesanan`) join `disposisi`) where ((`surat_keluar`.`id_pesanan` = `surat_pesanan`.`id_pesanan`) and (`surat_keluar`.`id_disposisi` = `disposisi`.`id_disposisi`))) ;

-- --------------------------------------------------------

--
-- Structure for view `kelola_surat_sk_d`
--
DROP TABLE IF EXISTS `kelola_surat_sk_d`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelola_surat_sk_d`  AS  (select `surat_keluar`.`id_sk` AS `id_sk`,`surat_keluar`.`id_disposisi` AS `id_disposisi`,`surat_keluar`.`id_pesanan` AS `id_pesanan`,`surat_keluar`.`tgl_sk` AS `tgl_sk`,`surat_keluar`.`perihal` AS `perihal`,`surat_keluar`.`file` AS `file`,`surat_pesanan`.`tujuan_surat` AS `tujuan_surat`,`surat_pesanan`.`isi_surat` AS `isi_surat`,`surat_pesanan`.`pengirim` AS `pengirim`,`surat_pesanan`.`tgl_pesan` AS `tgl_pesan` from (`surat_keluar` join `surat_pesanan`) where ((`surat_keluar`.`id_disposisi` = '') and (`surat_keluar`.`id_pesanan` = `surat_pesanan`.`id_pesanan`))) ;

-- --------------------------------------------------------

--
-- Structure for view `kelola_surat_sm`
--
DROP TABLE IF EXISTS `kelola_surat_sm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelola_surat_sm`  AS  (select `surat_masuk`.`id_sm` AS `id_sm`,`surat_masuk`.`id_disposisi` AS `id_disposisi`,`surat_masuk`.`asal_surat` AS `asal_surat`,`surat_masuk`.`tujuan_surat` AS `tujuan_surat`,`surat_masuk`.`isi_surat` AS `isi_surat`,`surat_masuk`.`tgl_sm` AS `tgl_sm`,`surat_masuk`.`tgl_terimasm` AS `tgl_terimasm`,`surat_masuk`.`perihal` AS `perihal`,`surat_masuk`.`file` AS `file`,`disposisi`.`tgl_disposisi` AS `tgl_disposisi`,`disposisi`.`sifat_surat` AS `sifat_surat`,`disposisi`.`status` AS `status`,`disposisi`.`terusan_surat` AS `terusan_surat`,`disposisi`.`instruksi` AS `instruksi` from (`surat_masuk` join `disposisi`) where (`surat_masuk`.`id_disposisi` = `disposisi`.`id_disposisi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `kelola_surat_sm_d`
--
DROP TABLE IF EXISTS `kelola_surat_sm_d`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelola_surat_sm_d`  AS  (select `surat_masuk`.`id_sm` AS `id_sm`,`surat_masuk`.`id_disposisi` AS `id_disposisi`,`surat_masuk`.`asal_surat` AS `asal_surat`,`surat_masuk`.`tujuan_surat` AS `tujuan_surat`,`surat_masuk`.`isi_surat` AS `isi_surat`,`surat_masuk`.`tgl_sm` AS `tgl_sm`,`surat_masuk`.`tgl_terimasm` AS `tgl_terimasm`,`surat_masuk`.`perihal` AS `perihal`,`surat_masuk`.`file` AS `file` from `surat_masuk` where (`surat_masuk`.`id_disposisi` = '')) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indexes for table `surat_pesanan`
--
ALTER TABLE `surat_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
