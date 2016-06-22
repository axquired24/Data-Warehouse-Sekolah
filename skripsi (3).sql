-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Jun 2016 pada 16.18
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akreditasi`
--

CREATE TABLE IF NOT EXISTS `akreditasi` (
`idakreditasi` int(5) NOT NULL,
  `namaakreditasi` varchar(30) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodea` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data untuk tabel `akreditasi`
--

INSERT INTO `akreditasi` (`idakreditasi`, `namaakreditasi`, `status`, `tanggal`, `kodea`) VALUES
(31, 'A', 'insert', '2016-06-21 16:37:32', 'a'),
(32, 'B', 'update', '2016-06-21 16:37:40', 'b'),
(33, 'B', 'update', '2016-06-21 16:39:29', 'b'),
(34, 'C', 'insert', '2016-06-21 16:39:39', 'c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakta`
--

CREATE TABLE IF NOT EXISTS `fakta` (
`idfakta` int(30) NOT NULL,
  `induk` varchar(45) NOT NULL COMMENT 'Nomor Induk Siswa',
  `nis` varchar(30) NOT NULL COMMENT 'Nomor Induk Sekolah',
  `kodewa` varchar(30) NOT NULL COMMENT 'Kode Waktu',
  `status` varchar(30) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data untuk tabel `fakta`
--

INSERT INTO `fakta` (`idfakta`, `induk`, `nis`, `kodewa`, `status`, `tanggal`) VALUES
(42, '21q', '123', '012', 'insert', '2016-06-21 21:35:11'),
(43, '21q', '123', '012', 'update', '2016-06-21 21:35:58'),
(44, '11111', '22323', '014', 'insert', '2016-06-22 06:59:24'),
(45, '1211', '22222', '014', 'insert', '2016-06-22 06:59:36'),
(46, '1212', '22222', '012', 'insert', '2016-06-22 06:59:50'),
(47, '1212', '44444', '20', 'insert', '2016-06-22 07:00:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isitabel`
--

CREATE TABLE IF NOT EXISTS `isitabel` (
`idisitabel` int(11) NOT NULL,
  `unixkey` text NOT NULL,
  `namasiswa` varchar(40) NOT NULL,
  `induk` varchar(30) NOT NULL,
  `namasekolah` varchar(30) NOT NULL,
  `namakategori` varchar(20) NOT NULL,
  `namajenis` varchar(20) NOT NULL,
  `namaakreditasi` varchar(30) NOT NULL,
  `namawil` varchar(40) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=492 ;

--
-- Dumping data untuk tabel `isitabel`
--

INSERT INTO `isitabel` (`idisitabel`, `unixkey`, `namasiswa`, `induk`, `namasekolah`, `namakategori`, `namajenis`, `namaakreditasi`, `namawil`, `tahun`) VALUES
(479, '8514811', 'rocan', '1212', 'SMA 4 Sragen', 'Negeri', 'SMA', 'B', 'Sragen', 2013),
(480, '8514811', 'Sigid', '21q', 'SMA 123', 'Negeri', 'SMA', 'B', 'Masaran', 2012),
(481, '8514811', 'Sigid H', '11111', 'SMK 2 Sragen', 'Negeri', 'SMK', 'C', 'Sragen', 2014),
(482, '8514811', 'udin', '1211', 'SMA 2 Sragen', 'Negeri', 'SMA', 'B', 'Sragen', 2014),
(483, '5337727', 'rocan', '1212', 'SMA 4 Sragen', 'Negeri', 'SMA', 'B', 'Sragen', 2013),
(484, '5337727', 'Sigid', '21q', 'SMA 123', 'Negeri', 'SMA', 'B', 'Masaran', 2012),
(485, '5337727', 'Sigid H', '11111', 'SMK 2 Sragen', 'Negeri', 'SMK', 'C', 'Sragen', 2014),
(486, '5337727', 'udin', '1211', 'SMA 2 Sragen', 'Negeri', 'SMA', 'B', 'Sragen', 2014),
(487, '8911132', 'rocan', '1212', 'SMA 4 Sragen', 'Negeri', 'SMA', 'B', 'Sragen', 2013),
(488, '8911132', 'Sigid', '21q', 'SMA 123', 'Negeri', 'SMA', 'B', 'Masaran', 2012),
(489, '8911132', 'Sigid H', '11111', 'SMK 2 Sragen', 'Negeri', 'SMK', 'C', 'Sragen', 2014),
(490, '8911132', 'udin', '1211', 'SMA 2 Sragen', 'Negeri', 'SMA', 'B', 'Sragen', 2014),
(491, '9730902', 'Sigid H', '11111', 'SMK 2 Sragen', 'Negeri', 'SMK', 'C', 'Sragen', 2014);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sekolah`
--

CREATE TABLE IF NOT EXISTS `jenis_sekolah` (
`idjenissekolah` int(10) NOT NULL,
  `namajenis` varchar(20) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodejs` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jenis_sekolah`
--

INSERT INTO `jenis_sekolah` (`idjenissekolah`, `namajenis`, `status`, `tanggal`, `kodejs`) VALUES
(1, 'SMA', 'insert', '2016-06-18 06:08:32', 'sma'),
(2, 'MA', 'insert', '2016-06-18 06:08:32', 'ma'),
(3, 'SMK', 'insert', '2016-06-18 13:57:18', 'smk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
`idjurusan` int(11) NOT NULL,
  `namajurusan` varchar(30) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodej` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `namajurusan`, `status`, `tanggal`, `kodej`) VALUES
(45, 'IPA', 'insert', '2016-06-21 16:41:11', 'a'),
(46, 'IPS', 'insert', '2016-06-21 16:41:23', 's'),
(47, 'IPS', 'update', '2016-06-21 16:41:34', 'ips');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_sekolah`
--

CREATE TABLE IF NOT EXISTS `kategori_sekolah` (
`idkategorisekolah` int(11) NOT NULL,
  `namakategori` varchar(20) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodeks` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `kategori_sekolah`
--

INSERT INTO `kategori_sekolah` (`idkategorisekolah`, `namakategori`, `status`, `tanggal`, `kodeks`) VALUES
(1, 'Negeri', 'insert', '2016-06-18 06:10:02', 'n'),
(2, 'Swasta', 'insert', '2016-06-18 06:10:02', 's');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loginsekolah`
--

CREATE TABLE IF NOT EXISTS `loginsekolah` (
`idlogin` int(11) NOT NULL,
  `namasekolah` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `loginsekolah`
--

INSERT INTO `loginsekolah` (`idlogin`, `namasekolah`, `nis`, `email`, `username`, `password`, `level`) VALUES
(1, 'SUPER ADMIN', 'super', 'super', 'SSS', '12345', 'admin'),
(4, 'SMA 2 Sragen', '22222', 'aa@gmail.com', 'Q', '123', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lupapasword`
--

CREATE TABLE IF NOT EXISTS `lupapasword` (
  `id` int(11) NOT NULL,
  `namasekolah` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lupapasword`
--

INSERT INTO `lupapasword` (`id`, `namasekolah`, `email`, `pesan`) VALUES
(1, 'amaamama', 'amamam@gmail.com', 'hhaahhahah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE IF NOT EXISTS `sekolah` (
`idsekolah` int(11) NOT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `namasekolah` varchar(30) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodeks` varchar(30) NOT NULL,
  `kodejs` varchar(30) NOT NULL,
  `kodea` varchar(30) NOT NULL,
  `kodewi` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`idsekolah`, `nis`, `namasekolah`, `status`, `tanggal`, `kodeks`, `kodejs`, `kodea`, `kodewi`) VALUES
(31, '123', 'nanna', 'insert', '2016-06-21 08:33:44', 'n', 'sma', 'aas', 'msr'),
(32, '123', 'SMA 123', 'update', '2016-06-21 16:57:15', 'n', 'sma', 'b', 'msr'),
(33, '22323', 'SMK 2 Sragen', 'insert', '2016-06-21 21:09:27', 'n', 'smk', 'c', 'srg'),
(34, '22323', 'SMK 2 Sragen', 'update', '2016-06-21 21:15:59', 'n', 'smk', 'c', 'srg'),
(35, '44444', 'SMA 4 Sragen', 'insert', '2016-06-22 06:54:39', 'n', 'sma', 'b', 'srg'),
(36, '22222', 'SMA 2 Sragen', 'insert', '2016-06-22 06:54:58', 'n', 'sma', 'b', 'srg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`idsiswa` int(11) NOT NULL,
  `induk` varchar(20) NOT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `jeniskelamin` varchar(45) DEFAULT NULL,
  `nem` float DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodej` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `induk`, `namasiswa`, `jeniskelamin`, `nem`, `status`, `tanggal`, `kodej`) VALUES
(1, '21q', 'Sigid', 'laki-laki', 112, 'insert', '2016-06-18 08:55:20', 'ipa'),
(3, '11111', 'Sigid H', 'Laki-laki', 12, 'update', '2016-06-18 14:50:34', 'ipa'),
(4, '1211', 'udib', 'Laki-laki', 12, 'insert', '2016-06-20 13:42:21', 'ipa'),
(5, '1211', 'udin', 'Laki-laki', 12, 'update', '2016-06-20 13:43:38', 'ipa'),
(7, '1212', 'rocan', 'Laki-laki', 21, 'insert', '2016-06-21 00:29:44', 'tkj'),
(10, '1211', 'udin', 'Laki-laki', 12, 'update', '2016-06-21 08:46:22', ''),
(11, '1211', 'udin', 'Laki-laki', 12, 'update', '2016-06-21 08:48:11', ''),
(12, '87', 'yyy', 'Laki-laki', 12, 'insert', '2016-06-21 08:49:21', 'biologi'),
(13, '1211', 'udin', 'Laki-laki', 12, 'update', '2016-06-21 08:49:30', 'ipa'),
(14, '', '', '', 0, 'delete', '2016-06-21 16:29:40', ''),
(15, '1212', 'rocan', 'Laki-laki', 21, 'update', '2016-06-21 16:29:53', 'ips'),
(16, '', '', '', 0, 'delete', '2016-06-21 16:29:58', ''),
(17, '', '', '', 0, 'delete', '2016-06-21 16:32:21', ''),
(18, '', '', '', 0, 'delete', '2016-06-21 16:32:28', ''),
(19, '21q', 'Sigid', 'Laki-laki', 112, 'update', '2016-06-21 16:56:45', 'ips'),
(20, '11111', 'Sigid H', 'Laki-laki', 12, 'update', '2016-06-21 16:57:29', 'ips'),
(21, '1211', 'udin', 'Laki-laki', 12, 'update', '2016-06-21 16:59:34', 'a'),
(22, '87', 'yyy', 'Perempuan', 12, 'update', '2016-06-21 16:59:44', 'ips'),
(23, '87', 'yyy', 'Perempuan', 12, 'delete', '2016-06-21 21:08:45', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
`idwaktu` int(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'insert',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kodewa` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`idwaktu`, `tahun`, `status`, `tanggal`, `kodewa`) VALUES
(12, 2010, 'insert', '2016-06-18 06:11:22', '010'),
(13, 2011, 'insert', '2016-06-18 06:11:22', '011'),
(14, 2010, 'update', '2016-06-18 07:31:07', '010'),
(15, 2010, 'delete', '2016-06-18 07:31:14', '010'),
(16, 2011, 'update', '2016-06-18 09:49:56', '011'),
(17, 2010, 'update', '2016-06-18 09:50:18', '010'),
(18, 2012, 'update', '2016-06-18 09:50:49', '010'),
(19, 2017, 'update', '2016-06-18 09:51:00', '010'),
(20, 2017, 'update', '2016-06-18 11:10:15', '017'),
(21, 2017, 'delete', '2016-06-20 13:28:20', '017'),
(22, 2010, 'update', '2016-06-20 13:28:32', '010'),
(23, 2012, 'insert', '2016-06-20 13:28:54', '012'),
(24, 2010, 'delete', '2016-06-20 13:29:42', '010'),
(25, 2011, 'delete', '2016-06-20 13:29:48', '011'),
(26, 2012, 'delete', '2016-06-20 13:29:53', '012'),
(27, 2013, 'insert', '2016-06-20 13:31:56', '012'),
(28, 2014, 'insert', '2016-06-21 00:28:56', '014'),
(29, 2015, 'update', '2016-06-21 16:48:02', '014'),
(30, 2015, 'delete', '2016-06-21 16:49:08', '014'),
(31, 2013, 'insert', '2016-06-21 21:34:05', '20'),
(32, 2012, 'update', '2016-06-22 06:55:45', '012'),
(33, 2014, 'insert', '2016-06-22 06:55:59', '014');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE IF NOT EXISTS `wilayah` (
`idwilayah` int(11) NOT NULL,
  `kodewi` varchar(30) NOT NULL,
  `namawil` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'insert',
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`idwilayah`, `kodewi`, `namawil`, `status`, `tanggal`) VALUES
(1, 'srg', 'Sragen', 'insert', '2016-06-18 13:12:07'),
(2, 'tn', 'Tanon', 'insert', '2016-06-18 13:12:07'),
(18, 'msr', 'Masaran', 'insert', '2016-06-18 20:58:17'),
(19, 'gs', 'Gesi', 'insert', '2016-06-18 20:58:17'),
(20, 'gs', 'Gesi', 'delete', '2016-06-20 20:36:32'),
(21, 'tn', 'Tanoni', 'update', '2016-06-20 20:36:42'),
(22, 'msr', 'Masarann', 'update', '2016-06-21 14:47:44'),
(23, 'msr', 'Masaran', 'update', '2016-06-21 23:26:36'),
(24, 'tn', 'Tanoni', 'update', '2016-06-21 23:50:08'),
(25, 'tn', 'Tanoni', 'update', '2016-06-22 04:26:34'),
(26, 'tn', 'Tanoni', 'update', '2016-06-22 04:27:32'),
(27, 'tn', 'Tanoni', 'update', '2016-06-22 04:28:07'),
(28, 'msr', 'Masaran', 'update', '2016-06-22 04:31:54'),
(29, 'msr', 'Masaran', 'update', '2016-06-22 04:32:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasi`
--
ALTER TABLE `akreditasi`
 ADD PRIMARY KEY (`idakreditasi`);

--
-- Indexes for table `fakta`
--
ALTER TABLE `fakta`
 ADD PRIMARY KEY (`idfakta`);

--
-- Indexes for table `isitabel`
--
ALTER TABLE `isitabel`
 ADD PRIMARY KEY (`idisitabel`);

--
-- Indexes for table `jenis_sekolah`
--
ALTER TABLE `jenis_sekolah`
 ADD PRIMARY KEY (`idjenissekolah`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`idjurusan`);

--
-- Indexes for table `kategori_sekolah`
--
ALTER TABLE `kategori_sekolah`
 ADD PRIMARY KEY (`idkategorisekolah`);

--
-- Indexes for table `loginsekolah`
--
ALTER TABLE `loginsekolah`
 ADD PRIMARY KEY (`idlogin`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
 ADD PRIMARY KEY (`idsekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`idsiswa`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
 ADD PRIMARY KEY (`idwaktu`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
 ADD PRIMARY KEY (`idwilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akreditasi`
--
ALTER TABLE `akreditasi`
MODIFY `idakreditasi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `fakta`
--
ALTER TABLE `fakta`
MODIFY `idfakta` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `isitabel`
--
ALTER TABLE `isitabel`
MODIFY `idisitabel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=492;
--
-- AUTO_INCREMENT for table `jenis_sekolah`
--
ALTER TABLE `jenis_sekolah`
MODIFY `idjenissekolah` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
MODIFY `idjurusan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `kategori_sekolah`
--
ALTER TABLE `kategori_sekolah`
MODIFY `idkategorisekolah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loginsekolah`
--
ALTER TABLE `loginsekolah`
MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
MODIFY `idsekolah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `idsiswa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
MODIFY `idwaktu` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
MODIFY `idwilayah` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
