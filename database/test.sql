-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2017 at 08:38 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(5) collate latin1_general_ci NOT NULL default '',
  `nama_dosen` varchar(40) collate latin1_general_ci default NULL,
  `no_telpon` varchar(20) collate latin1_general_ci default NULL,
  `alamat_dosen` varchar(100) collate latin1_general_ci default NULL,
  `jenis_kelamin` enum('P','L') collate latin1_general_ci default 'P',
  `tanggal_masuk_kerja` date default NULL,
  PRIMARY KEY  (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `no_telpon`, `alamat_dosen`, `jenis_kelamin`, `tanggal_masuk_kerja`) VALUES
('123', 'Budi Setiono', '08111111111', 'Ponorogo', 'L', '1980-01-01'),
('124', 'Dwi Ratna', '0822222222', 'Kediri', 'P', '1978-02-02'),
('125', 'Imam Mukhlash', '0855555555', 'Surabaya', 'L', '1979-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `frs`
--

CREATE TABLE `frs` (
  `id_frs` int(11) NOT NULL auto_increment,
  `nrp` varchar(10) collate latin1_general_ci default NULL,
  `tahun_ajaran` varchar(10) collate latin1_general_ci default NULL,
  `semester` char(2) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_frs`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `frs`
--

INSERT INTO `frs` (`id_frs`, `nrp`, `tahun_ajaran`, `semester`) VALUES
(1, '111', '2016-2017', '1'),
(2, '112', '2016-2017', '1'),
(3, '211', '2016-2017', '1'),
(4, '212', '2016-2017', '1'),
(5, '111', '2016-2017', '2'),
(6, '112', '2016-2017', '2'),
(7, '211', '2016-2017', '2'),
(8, '212', '2016-2017', '2');

-- --------------------------------------------------------

--
-- Table structure for table `frs_detail`
--

CREATE TABLE `frs_detail` (
  `id_frs` int(11) NOT NULL default '0',
  `id_jadwal` int(11) default NULL,
  `nilai_tugas` int(11) default NULL,
  `nilai_uts` int(11) default NULL,
  `nilai_uas` int(11) default NULL,
  `nilai_huruf` char(2) collate latin1_general_ci default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `frs_detail`
--

INSERT INTO `frs_detail` (`id_frs`, `id_jadwal`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_huruf`) VALUES
(1, 1, 80, 80, 80, 'AB'),
(1, 2, 85, 85, 85, 'A'),
(1, 3, 75, 75, 75, 'AB'),
(2, 1, 63, 63, 63, 'BC'),
(2, 2, 60, 60, 60, 'C'),
(3, 1, 70, 70, 70, 'B'),
(3, 2, 75, 75, 75, 'AB'),
(3, 3, 70, 70, 70, 'B'),
(4, 1, 45, 50, 45, 'D'),
(4, 2, 75, 75, 75, 'AB'),
(4, 3, 61, 61, 61, 'BC'),
(5, 4, 90, 90, 90, 'A'),
(5, 5, 60, 60, 60, 'C'),
(5, 6, 65, 65, 65, 'BC'),
(6, 4, 50, 50, 50, 'D'),
(6, 5, 45, 45, 45, 'D'),
(6, 6, 55, 55, 55, 'C'),
(7, 4, 60, 60, 60, 'C'),
(7, 5, 57, 57, 57, 'C'),
(7, 6, 45, 45, 45, 'D'),
(8, 4, 70, 70, 70, 'B'),
(8, 5, 75, 75, 75, 'AB'),
(8, 6, 50, 50, 50, 'D');

-- --------------------------------------------------------


--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL auto_increment,
  `nip` varchar(5) collate latin1_general_ci default NULL,
  `kd_mk` varchar(5) collate latin1_general_ci default NULL,
  `id_ruang` int(11) default NULL,
  `hari` varchar(10) collate latin1_general_ci default NULL,
  `pukul` varchar(6) collate latin1_general_ci default NULL,
  `tahun_ajaran` varchar(10) collate latin1_general_ci default NULL,
  `semester` char(1) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nip`, `kd_mk`, `id_ruang`, `hari`, `pukul`, `tahun_ajaran`, `semester`) VALUES
(1, '123', 'P1-1', 1, 'Senin', '07.00', '2016-2017', '1'),
(2, '124', 'P1-2', 2, 'Selasa', '09.00', '2016-2017', '1'),
(3, '125', 'P1-3', 3, 'Rabu', '11.00', '2016-2017', '1'),
(4, '123', 'P2-1', 4, 'Senin', '10.00', '2016-2017', '2'),
(5, '124', 'P2-2', 5, 'Selasa', '13.00', '2016-2017', '2'),
(6, '125', 'P2-3', 1, 'Senin', '14.00', '2016-2017', '2');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(10) collate latin1_general_ci NOT NULL default '',
  `nama_mhs` varchar(50) collate latin1_general_ci default NULL,
  `alamat_mhs` varchar(100) collate latin1_general_ci default NULL,
  `no_telpon` varchar(12) collate latin1_general_ci default NULL,
  `tahun_masuk` char(4) character set latin1 default NULL,
  `jenis_kelamin` enum('L','P') character set latin1 default 'L',
  `jurusan` varchar(50) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`nrp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama_mhs`, `alamat_mhs`, `no_telpon`, `tahun_masuk`, `jenis_kelamin`, `jurusan`) VALUES
('111', 'Andre', 'Surabaya', '08666666', '2016', 'L', 'Sistem Informasi'),
('112', 'Slamet', 'Sidoarjo', '08777777', '2016', 'L', 'Sistem Informasi'),
('211', 'Aan', 'Gresik', '08888888', '2016', 'L', 'Informatika'),
('212', 'Lia', 'Surabaya', '08444444', '2016', 'P', 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(5) collate latin1_general_ci NOT NULL default '',
  `nama_mk` varchar(100) collate latin1_general_ci default NULL,
  `sks` int(11) default NULL,
  `aktif` enum('0','1') collate latin1_general_ci default '1',
  PRIMARY KEY  (`kode_mk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `sks`, `aktif`) VALUES
('P1-1', 'Sistem Manajemen Basis Data dengan SQL Server', 3, '1'),
('P1-2', 'Pemrograman Visual Basic.NET', 3, '1'),
('P1-3', 'Pemrograman WEB dengan PHP dan MySql', 3, '1'),
('P2-1', 'Pemrograman Bisnis Visual Basic.NET (Lanjut)', 3, '1'),
('P2-2', 'Pemrograman Web Berbasis Bootstrap', 3, '1'),
('P2-3', 'Pemrograman Mobile (Android)', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL auto_increment,
  `nama_ruang` varchar(20) collate latin1_general_ci default NULL,
  `kapasitas` int(11) default NULL,
  `aktif` enum('1','0') collate latin1_general_ci default '1',
  PRIMARY KEY  (`id_ruang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kapasitas`, `aktif`) VALUES
(1, 'T101', 60, '1'),
(2, 'F101', 40, '1'),
(3, 'F102', 40, '1'),
(4, 'F110', 20, '1'),
(5, 'F109', 40, '1');
