-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 01:13 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tonsillitis_ds`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idadmin` int(3) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbpasien`
--

CREATE TABLE `tbpasien` (
  `idpasien` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpasien`
--

INSERT INTO `tbpasien` (`idpasien`, `nama`, `kelamin`, `umur`, `alamat`, `noip`, `tanggal`, `pekerjaan`, `email`) VALUES
(1, 'Mala', 'Wanita', '33', 'Lhokseumawe', '127.0.0.1', '2017-09-12', '', 'malawai@gmail.com'),
(2, 'Mala', 'Wanita', '33', 'Lhokseumawe', '127.0.0.1', '2017-09-12', '', 'malawai@gmail.com'),
(3, 'Junaya', 'Wanita', '33', 'Mulieng', '::1', '2018-01-10', '', 'yunaa@gmail.com'),
(4, 'Rudi Anjani', 'Laki-laki', '15', 'Matang', '::1', '2018-01-11', '', 'rudi@gmail.com'),
(5, 'Rusli', 'Laki-laki', '33', 'Matang', '::1', '2018-01-14', '', 'ruslia@gmail.com'),
(6, 'Arun', 'Laki-laki', '33', 'Lhokseumawe', '::1', '2018-01-15', '', 'arun@gmail.com'),
(7, 'Fauzan', 'Laki-laki', '22', 'Matangkuli', '::1', '2018-01-16', '', 'zoelfathi@gmail.com'),
(8, 'Juanda', 'Laki-laki', '19', 'Lhokseumawe', '::1', '2018-02-09', '', 'juanda@gmail.com'),
(9, 'Uji', 'Laki-laki', '9', '9', '::1', '2018-02-09', '', '9'),
(10, 'Husani', 'Laki-laki', '5', 'Cunda', '::1', '2018-02-09', '', 'Husaini@gmail.com'),
(11, 'Jamilah', 'Wanita', '3', 'Binjei', '::1', '2018-02-10', '', 'jamilah@gmail.com'),
(12, 'Zainal', 'Laki-laki', '33', 'Kandang', '::1', '2018-02-16', '', 'zainalabidin@gmail.c'),
(13, 'eeee', 'Laki-laki', '45', 'we', '::1', '2022-10-31', '', 'we'),
(14, 'dicsr', 'Laki-laki', '12', 'Jabar', '::1', '2022-10-31', '', 'najib.azfa@gmail.com'),
(15, 'test', 'Laki-laki', '45', 'Jawa Barat', '::1', '2022-10-31', '', 'erer'),
(16, 'test', 'Laki-laki', '45', 'Jawa Barat', '::1', '2022-10-31', '', 'erer'),
(17, 'test', 'Laki-laki', '45', 'Jawa Barat', '::1', '2022-10-31', '', '3434'),
(18, 'test', 'Laki-laki', '45', 'Jawa Barat', '::1', '2022-10-31', '', '3434');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id` int(5) NOT NULL,
  `kdgejala` varchar(3) NOT NULL,
  `gejala` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id`, `kdgejala`, `gejala`) VALUES
(1, 'G1', 'Gigi terasa sakit'),
(2, 'G2', 'Nyeri saat mengunyah dan menelan'),
(3, 'G3', 'Ada demam'),
(4, 'G4', 'Pembengkakan kelenjar getah bening dileher'),
(5, 'G5', 'pembengkakan di rahang'),
(6, 'G6', 'Bau mulut busuk'),
(7, 'G7', 'Disertai sakit kepala'),
(8, 'G8', 'Gusi membengkak'),
(9, 'G9', 'Nanah pada pangkal gusi'),
(10, 'G10', 'Gusi terasa lunak'),
(11, 'G11', 'Gusi mudah berdarah'),
(12, 'G12', 'Gusi mudah terluka'),
(13, 'G13', 'Gusi berwarna merah'),
(14, 'G14', 'Endapan plak pada permukaan gigi'),
(15, 'G15', 'Endapan karang pada permukaan gigi'),
(16, 'G16', 'Nyeri pada gusi'),
(17, 'G17', 'Terbentuk kantong diantara gigi dan gusi'),
(18, 'G18', 'Gusi terasa kebal ketika disentuh'),
(19, 'G19', 'Gusi menurun/resesi'),
(20, 'G20', 'Peradangan pada pulpa'),
(21, 'G21', 'Adanya lubang pada gigi'),
(22, 'G22', 'Gigi berwarna coklat/hitam'),
(23, 'G23', 'Gigi terasa ngilu apabila memakan/meminum yang manis, dingin dan panas'),
(24, 'G24', 'Pembusukkan gigi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id` int(4) NOT NULL,
  `idpasien` int(10) NOT NULL,
  `kdpenyakit` char(4) NOT NULL,
  `persentase` varchar(5) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id`, `idpasien`, `kdpenyakit`, `persentase`, `tanggal`) VALUES
(1, 18, 'P2', '13.04', '2022-10-31 21:09:15'),
(2, 18, 'P3', '56.52', '2022-10-31 21:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int(11) NOT NULL,
  `kdpenyakit` varchar(3) DEFAULT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `definisi` text,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `kdpenyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
(1, 'P1', 'Abses Periapikal', 'Abses gigi adalah terbentuknya kantung atau benjolan berisi nanah pada gigi yang disebabkan oleh infeksi bakteri. Abses gigi biasanya muncul pada ujung akar gigi (abses periapikal).\r\nInfeksi bakteri penyebab abses gigi umumnya terjadi pada orang dengan kebersihan dan kesehatan gigi yang buruk. Nanah yang berkumpul pada benjolan, lambat laun akan terasa bertambah nyeri.', '- dianjurkan berkumur-kumur dengan air garam hangat\r\n\r\n- Dibagian luar pipi kompres dengan air panas\r\n\r\n- dianjurkan pergi ke dokter gigi'),
(2, 'P2', 'Gingivitis', 'Pulpitis paling sering disebabkan oleh pembusukan gigi, penyebab lainnya adalah cedera. Ketika terjadi peradangan pulpa tidak memiliki ruang yang cukup untuk membengkak karena terbungkus dalam dinding yang keras sehingga terjadi peningkatan tekanan dalam gigi. Peradangan yang ringan, jika berhasil diatasi, tidak akan menimbulkan kerusakan gigi yang permanen.\r\n', '- Bersihkan gusi dengan betadine\r\n\r\n- Dianjurkan menyikat gigi secara benar\r\n\r\n- Kumur-kumur dengan rebusan sirih\r\n\r\n- Apabila tidak ada perubahan dianjurkan konsultsi ke dokter gigi'),
(3, 'P3', 'Periodontitis', 'Periodontitis adalah infeksi gusi yang merusak jaringan lunak dan tulang penyangga gigi. Kondisi ini perlu segera diobati karena dapat menyebabkan gigi tanggal. Periodontitis banyak diderita pada usia remaja.\r\nSaat terjadi periodontitis, bakteri menumpuk sebagai plak pada pangkal gigi, sehingga merusak jaringan di sekitar gigi dan menimbulkan abses gigi, serta berisiko menyebabkan kerusakan tulang.', '- Dianjurkan pembersihan karang gigi ke dokter gigi'),
(4, 'P4', 'Pulpitis', 'Pulpitis merupakan peradangan yang terjadi di pulpa, yakni bagian gigi paling dalam yang terdapat saraf dan pembuluh darah. Kondisi ini bisa menyebabkan munculnya nyeri yang luar biasa.Pulpitis paling sering disebabkan oleh pembusukan gigi, penyebab lainnya adalah cedera. Ketika terjadi peradangan pulpa tidak memiliki ruang yang cukup untuk membengkak karena terbungkus dalam dinding yang keras sehingga terjadi peningkatan tekanan dalam gigi. Peradangan yang ringan, jika berhasil diatasi, tidak akan menimbulkan kerusakan gigi yang permanen.\r\n', '- Tetesi gigi dengan minyak cengkeh\r\n- Tutup lubang pada gigi dengan kapas\r\n- kurangi mengkonsumsi makanan/minuman yang manis, dingin dan panas\r\n- Dianjurkan konsultasi ke dokter gigi'),
(5, 'P5', 'Karies Gigi', 'Karies gigi adalah kondisi saat muncul lubang pada gigi. Karies gigi disebabkan oleh bakteri.\r\n\r\nKaries gigi dan kerusakan gigi merupakan masalah kesehatan paling umum di dunia. Apabila lubang tidak diatasi, lubang akan membesar dan mempengaruhi lapisan dalam gigi. Kondisi ini dapat menyebabkan sakit gigi parah, infeksi dan lepasnya gigi.', '- Tetesi lubang dengan minyak cengkeh\r\n- Kurangi mengkonsumsi makanan/minum yang manis, dingin dan panas\r\n- Anjurkan pergi ke dokter gigi untuk proses penambalan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id_problem` int(11) DEFAULT NULL,
  `id_evidence` int(11) DEFAULT NULL,
  `cf` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`id_problem`, `id_evidence`, `cf`) VALUES
(1, 24, 0.3),
(2, 16, 0.3),
(5, 22, 0.55),
(5, 21, 0.55),
(5, 15, 0.55),
(4, 20, 0.3),
(4, 5, 0.3),
(3, 19, 0.3),
(3, 18, 0.3),
(2, 14, 0.3),
(3, 17, 0.5),
(1, 23, 0.3),
(3, 15, 0.75),
(1, 9, 0.3),
(3, 12, 0.55),
(1, 8, 0.3),
(1, 7, 0.3),
(1, 6, 0.3),
(1, 4, 0.85),
(1, 3, 0.4),
(1, 2, 0.6),
(1, 1, 0.6),
(2, 13, 0.3),
(2, 12, 0.6),
(2, 11, 0.6),
(2, 10, 0.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbpasien`
--
ALTER TABLE `tbpasien`
  MODIFY `idpasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
