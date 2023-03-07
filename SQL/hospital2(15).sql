-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 11:50 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Dokter','Farmasih','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id_admin`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(16, 'admin', 'Fardan', '202cb962ac59075b964b07152d234b70', 'Admin'),
(19, 'dokter', 'mahmud', '202cb962ac59075b964b07152d234b70', 'Dokter'),
(21, 'farmasih', 'puan', '202cb962ac59075b964b07152d234b70', 'Farmasih');

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id_pasienberobat` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `spesialis` int(11) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berobat2`
--

CREATE TABLE `berobat2` (
  `id_pasienberobat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `spesialis` int(11) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_obat`
--

CREATE TABLE `data_obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `harga_obat` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `kode_kamar` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` int(11) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `jumlah_kamar` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `kode_kamar`, `nama`, `kelas`, `harga`, `jumlah_kamar`, `tanggal`, `status`) VALUES
(53, 'KMR002', 'higa', 3, 'Rp.300.000', '1', '2023-01-18', 'selesai'),
(54, 'KMR003', 'higa', 2, 'Rp.500.000', '1', '2023-01-26', 'selesai'),
(55, 'KMR004', 'higa', 1, 'Rp.1.000.000', '1', '2023-02-10', 'pending'),
(56, 'KMR005', 'fardan', 2, 'Rp.500.000', '1', '2023-02-16', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_ri` int(20) NOT NULL,
  `kelas_kamar` varchar(200) NOT NULL,
  `harga_kamar` varchar(200) NOT NULL,
  `stok` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_ri`, `kelas_kamar`, `harga_kamar`, `stok`) VALUES
(1, 'Kelas 1', '1000000', '1'),
(2, 'Kelas 2', '500000', '19'),
(3, 'Kelas 3', '300000', '20');

-- --------------------------------------------------------

--
-- Table structure for table `spesialis`
--

CREATE TABLE `spesialis` (
  `id_spesialis` int(11) NOT NULL,
  `nama_spesialis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spesialis`
--

INSERT INTO `spesialis` (`id_spesialis`, `nama_spesialis`) VALUES
(4, 'Bedah'),
(5, 'Saraf'),
(6, 'Penyakit Dalam'),
(7, 'Dokter Umum');

-- --------------------------------------------------------

--
-- Table structure for table `sub_spesialis`
--

CREATE TABLE `sub_spesialis` (
  `id` int(50) NOT NULL,
  `id_spesialis` int(50) NOT NULL,
  `nama_sub` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_spesialis`
--

INSERT INTO `sub_spesialis` (`id`, `id_spesialis`, `nama_sub`) VALUES
(2, 4, 'Bedah Plastik'),
(3, 4, 'Bedah Digestif'),
(4, 4, 'Bedah Forensik'),
(5, 5, 'saraf terjepit'),
(6, 5, 'saraf dalam'),
(7, 7, 'Gigi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_berobat`
--

CREATE TABLE `tambah_berobat` (
  `id_berobat` int(11) NOT NULL,
  `kode_pasien` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `spesialis` int(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_berobat`
--

INSERT INTO `tambah_berobat` (`id_berobat`, `kode_pasien`, `nik`, `nama`, `spesialis`, `tanggal`, `keterangan`) VALUES
(31, 'P-001', '12345', 'higa', 7, '2023/01/19', 'berobat'),
(32, 'P-002', '12', 'fardan', 7, '2023/01/28', 'berobat'),
(33, 'P-003', '12', 'fardan', 4, '2023/02/08', 'berobat'),
(34, 'P-004', '12', 'fardan', 4, '2023/02/24', 'berobat');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_berobat2`
--

CREATE TABLE `tambah_berobat2` (
  `id_berobat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pasien` varchar(200) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `spesialis` int(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `tlp` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_berobat2`
--

INSERT INTO `tambah_berobat2` (`id_berobat`, `id_user`, `kode_pasien`, `nik`, `nama`, `spesialis`, `tanggal`, `keterangan`, `status`, `tlp`) VALUES
(44, 18, 'P-001', '123', 'rian', 7, '2023-02-23', 'berobat', 'selesai', 0),
(45, 18, 'P-004', '444', 'maya', 4, '2023/02/24', 'berobat', 'selesai', 0),
(46, 18, 'P-001', '444', 'maya', 7, '2023-02-24', 'berobat', 'selesai', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tambah_dokter`
--

CREATE TABLE `tambah_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_spesialis` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `jadwal` varchar(200) NOT NULL,
  `jam` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_dokter`
--

INSERT INTO `tambah_dokter` (`id_dokter`, `nama`, `id_spesialis`, `id_sub`, `jadwal`, `jam`, `foto`) VALUES
(38, 'dr.brian', 5, 6, 'Senin sd Jumat', '08.00 sd 12.00', 'doctors-3.jpg'),
(59, 'dr.wisnu', 7, 7, 'Senin sd Jumat', '08.00 sd 12.00', 'doctors-4.jpg'),
(61, 'Dr. Kusuma Am,s,.dr.,SpB-KBD', 7, 7, 'Selasa', '08.00 sd 12.00', 'team1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_obat`
--

CREATE TABLE `tambah_obat` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `kegunaan` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_obat`
--

INSERT INTO `tambah_obat` (`id`, `nama`, `harga`, `kegunaan`, `foto`) VALUES
(14, 'betadine', '15000', 'mengobati luka', 'pich1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_pasien`
--

CREATE TABLE `tambah_pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `ttl` varchar(200) NOT NULL,
  `jk` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `kewarganegaraan` varchar(200) NOT NULL,
  `tlp` int(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_pasien`
--

INSERT INTO `tambah_pasien` (`id`, `nik`, `nama`, `ttl`, `jk`, `pekerjaan`, `kewarganegaraan`, `tlp`, `alamat`, `tanggal_input`) VALUES
(39, '12', 'fardan', 'Cirebon, 30 juni 2001', 'Laki Laki', 't', 'WNI', 345454, 'y', '2023-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_pasien2`
--

CREATE TABLE `tambah_pasien2` (
  `id_pasien` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `ttl` varchar(200) NOT NULL,
  `jk` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `kewarganegaraan` varchar(200) NOT NULL,
  `tlp` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_pasien2`
--

INSERT INTO `tambah_pasien2` (`id_pasien`, `id_user`, `nik`, `nama`, `ttl`, `jk`, `pekerjaan`, `kewarganegaraan`, `tlp`, `alamat`, `tanggal_input`) VALUES
(41, 18, '123', 'rian', '1 september 2004', 'Laki Laki', '', '', '65656', '', '2023-01-28'),
(50, 18, '11111', 'a', '2023-02-11', 'Laki Laki', '', '', '6232323', '', '2023-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_pb`
--

CREATE TABLE `tambah_pb` (
  `id_pb` int(11) NOT NULL,
  `id_inap` int(11) NOT NULL,
  `nama_pb` varchar(200) NOT NULL,
  `tujuan_spesialis` int(11) NOT NULL,
  `tanggal_pb` varchar(200) NOT NULL,
  `riwayat` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_pb`
--

INSERT INTO `tambah_pb` (`id_pb`, `id_inap`, `nama_pb`, `tujuan_spesialis`, `tanggal_pb`, `riwayat`, `status`) VALUES
(66, 53, 'higa', 7, '2023/01/19', 'menginap', 'selesai'),
(67, 54, 'higa', 7, '2023/02/10', 'menginap', 'selesai'),
(68, 56, 'fardan', 6, '2023/02/24', 'menginap', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_rm`
--

CREATE TABLE `tambah_rm` (
  `id_rm` int(11) NOT NULL,
  `id_inap` int(11) NOT NULL,
  `nm_pasien` varchar(200) NOT NULL,
  `keluhan` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `resep` varchar(200) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `tanggal_rm` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_rm`
--

INSERT INTO `tambah_rm` (`id_rm`, `id_inap`, `nm_pasien`, `keluhan`, `diagnosis`, `resep`, `tindakan`, `tanggal_rm`, `status`) VALUES
(77, 53, 'higa', 'ww', 'ww', 'ww', 'Rawat Jalan', '2023-02-24', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_rm2`
--

CREATE TABLE `tambah_rm2` (
  `id_rm2` int(11) NOT NULL,
  `nama_ps` varchar(200) NOT NULL,
  `keluhan_ps` varchar(200) NOT NULL,
  `diagnosis_ps` varchar(200) NOT NULL,
  `resep_obat` varchar(200) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tambah_rm3`
--

CREATE TABLE `tambah_rm3` (
  `id_rm2` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ps` varchar(200) NOT NULL,
  `keluhan_ps` varchar(200) NOT NULL,
  `diagnosis_ps` varchar(200) NOT NULL,
  `resep_obat` varchar(200) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_regis` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(200) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `id_regis`, `nik`, `nama`, `tgl_lahir`, `jk`, `no_tlp`, `tanggal`, `status`) VALUES
(81, 19, 2121212, 'Fardan', '2023-02-01', 'Laki Laki', '628478574854875', '2023-02-01', 'selesai'),
(82, 19, 11222, 'fardan agung setiawan', '2023-02-03', 'Laki Laki', '62864767476456', '2023-02-02', 'selesai'),
(83, 18, 444, 'maya', '2023-02-16', 'Perempuan', '6276767676', '2023-02-24', 'selesai'),
(84, 18, 11111, 'a', '2023-02-11', 'Laki Laki', '6232323', '2023-02-24', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrasi`
--

CREATE TABLE `tbl_registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telp` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registrasi`
--

INSERT INTO `tbl_registrasi` (`id_registrasi`, `nama`, `email`, `no_telp`, `alamat`, `password`) VALUES
(18, 'Fardan Septian', 'fardan@gmail.com', '62878788', 'y', '123'),
(19, 'aufa', 'aufa@gmail.com', '6289565656565', 'jln. kehidupan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `total_tagihan` varchar(200) NOT NULL,
  `total_obat` varchar(200) NOT NULL,
  `uang_bayar` varchar(200) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pasien`, `diagnosis`, `tindakan`, `total_tagihan`, `total_obat`, `uang_bayar`, `tanggal_transaksi`) VALUES
(63, 'higa', 'bb', 'Pulang', '215000', 'betadine (1) ', '300000', '2023-01-19'),
(64, 'Fardan', 'usus buntu', 'Rawat Jalan', '230000', 'betadine (1) ,betadine (1) ', '500000', '2023-02-08'),
(65, 'fardan agung setiawan', 'bb', 'Rawat Jalan', '215000', 'betadine (1) ', '250000', '2023-02-08'),
(66, 'aufa', 'skoliosis', 'Rawat Jalan', '215000', 'betadine (1) ', '799000', '2023-02-08'),
(67, 'fardan', 'y', 'Rawat Jalan', '215000', 'betadine (1) ', '300000', '2023-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi2`
--

CREATE TABLE `transaksi2` (
  `id_transaksi` int(11) NOT NULL,
  `id_psinap` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `diagnosis` varchar(200) NOT NULL,
  `tindakan` varchar(200) NOT NULL,
  `total_tagihan` varchar(200) NOT NULL,
  `total_obat` varchar(200) NOT NULL,
  `uang_bayar` varchar(200) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi2`
--

INSERT INTO `transaksi2` (`id_transaksi`, `id_psinap`, `nama_pasien`, `diagnosis`, `tindakan`, `total_tagihan`, `total_obat`, `uang_bayar`, `tanggal_transaksi`) VALUES
(74, 53, 'higa', 'xx', 'Pulang', '1415000', 'betadine (1) ', '2000000', '2023-01-19'),
(75, 56, 'fardan', 'bb', 'Pulang', '4215000', 'betadine (1) ', '5000000', '2023-02-24'),
(76, 53, 'higa', 'ww', 'Rawat Jalan', '2015000', 'betadine (1) ', '3000000', '2023-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `y`
--

CREATE TABLE `y` (
  `y` int(2) NOT NULL,
  `o` int(2) NOT NULL,
  `w` int(2) NOT NULL,
  `e` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_pasienberobat`),
  ADD KEY `id_spesialis` (`spesialis`);

--
-- Indexes for table `berobat2`
--
ALTER TABLE `berobat2`
  ADD PRIMARY KEY (`id_pasienberobat`),
  ADD KEY `id_spesialis` (`spesialis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_obat`
--
ALTER TABLE `data_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id_ri`);

--
-- Indexes for table `spesialis`
--
ALTER TABLE `spesialis`
  ADD PRIMARY KEY (`id_spesialis`);

--
-- Indexes for table `sub_spesialis`
--
ALTER TABLE `sub_spesialis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_spesialis` (`id_spesialis`);

--
-- Indexes for table `tambah_berobat`
--
ALTER TABLE `tambah_berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `spesialis` (`spesialis`);

--
-- Indexes for table `tambah_berobat2`
--
ALTER TABLE `tambah_berobat2`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `spesialis` (`spesialis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tambah_dokter`
--
ALTER TABLE `tambah_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_sub` (`id_sub`),
  ADD KEY `id_spesialis` (`id_spesialis`);

--
-- Indexes for table `tambah_obat`
--
ALTER TABLE `tambah_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tambah_pasien`
--
ALTER TABLE `tambah_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tambah_pasien2`
--
ALTER TABLE `tambah_pasien2`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tambah_pb`
--
ALTER TABLE `tambah_pb`
  ADD PRIMARY KEY (`id_pb`),
  ADD KEY `tujuan_spesialis` (`tujuan_spesialis`),
  ADD KEY `id_inap` (`id_inap`);

--
-- Indexes for table `tambah_rm`
--
ALTER TABLE `tambah_rm`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_inap` (`id_inap`);

--
-- Indexes for table `tambah_rm2`
--
ALTER TABLE `tambah_rm2`
  ADD PRIMARY KEY (`id_rm2`);

--
-- Indexes for table `tambah_rm3`
--
ALTER TABLE `tambah_rm3`
  ADD PRIMARY KEY (`id_rm2`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_regis` (`id_regis`);

--
-- Indexes for table `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi2`
--
ALTER TABLE `transaksi2`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_psinap` (`id_psinap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_pasienberobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `berobat2`
--
ALTER TABLE `berobat2`
  MODIFY `id_pasienberobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_obat`
--
ALTER TABLE `data_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id_ri` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spesialis`
--
ALTER TABLE `spesialis`
  MODIFY `id_spesialis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_spesialis`
--
ALTER TABLE `sub_spesialis`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tambah_berobat`
--
ALTER TABLE `tambah_berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tambah_berobat2`
--
ALTER TABLE `tambah_berobat2`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tambah_dokter`
--
ALTER TABLE `tambah_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tambah_obat`
--
ALTER TABLE `tambah_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tambah_pasien`
--
ALTER TABLE `tambah_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tambah_pasien2`
--
ALTER TABLE `tambah_pasien2`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tambah_pb`
--
ALTER TABLE `tambah_pb`
  MODIFY `id_pb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tambah_rm`
--
ALTER TABLE `tambah_rm`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tambah_rm2`
--
ALTER TABLE `tambah_rm2`
  MODIFY `id_rm2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tambah_rm3`
--
ALTER TABLE `tambah_rm3`
  MODIFY `id_rm2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_registrasi`
--
ALTER TABLE `tbl_registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `transaksi2`
--
ALTER TABLE `transaksi2`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `berobat_ibfk_1` FOREIGN KEY (`spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berobat2`
--
ALTER TABLE `berobat2`
  ADD CONSTRAINT `berobat2_ibfk_1` FOREIGN KEY (`spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berobat2_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `rawat_inap` (`id_ri`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_spesialis`
--
ALTER TABLE `sub_spesialis`
  ADD CONSTRAINT `sub_spesialis_ibfk_1` FOREIGN KEY (`id_spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_berobat`
--
ALTER TABLE `tambah_berobat`
  ADD CONSTRAINT `tambah_berobat_ibfk_1` FOREIGN KEY (`spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_berobat2`
--
ALTER TABLE `tambah_berobat2`
  ADD CONSTRAINT `tambah_berobat2_ibfk_1` FOREIGN KEY (`spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tambah_berobat2_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_dokter`
--
ALTER TABLE `tambah_dokter`
  ADD CONSTRAINT `tambah_dokter_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `sub_spesialis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tambah_dokter_ibfk_2` FOREIGN KEY (`id_spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_pasien2`
--
ALTER TABLE `tambah_pasien2`
  ADD CONSTRAINT `tambah_pasien2_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_pb`
--
ALTER TABLE `tambah_pb`
  ADD CONSTRAINT `tambah_pb_ibfk_1` FOREIGN KEY (`tujuan_spesialis`) REFERENCES `spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tambah_pb_ibfk_2` FOREIGN KEY (`id_inap`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_rm`
--
ALTER TABLE `tambah_rm`
  ADD CONSTRAINT `tambah_rm_ibfk_1` FOREIGN KEY (`id_inap`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tambah_rm3`
--
ALTER TABLE `tambah_rm3`
  ADD CONSTRAINT `tambah_rm3_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`id_regis`) REFERENCES `tbl_registrasi` (`id_registrasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi2`
--
ALTER TABLE `transaksi2`
  ADD CONSTRAINT `transaksi2_ibfk_1` FOREIGN KEY (`id_psinap`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
