-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2026 at 01:37 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `kategori` enum('Akademik','Pengumuman','Event','Beasiswa') NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('publish','draft') DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi`, `kategori`, `tanggal`, `status`) VALUES
(1, 'Engineering Competition', 'Acaara bem fakultas teknik dekan cup', 'Event', '2026-02-18', 'publish'),
(2, 'Seminar Public Speaking', 'Public Speaking Teknik ', 'Akademik', '2026-01-16', 'publish'),
(3, 'Umus Fest', 'Event gede jarene', 'Event', '2026-03-12', 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nama`, `nidn`, `alamat`, `telp`, `email`, `foto`) VALUES
(1, 'Aspuri Albarasi S.Pd.', '12345678', 'Cipelem', '089765342189', 'aspurihehe@email.com', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen_wali`
--

CREATE TABLE `tb_dosen_wali` (
  `id_wali` int NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `tahun_akademik` varchar(10) NOT NULL,
  `status` enum('aktif','tidak') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_dosen_wali`
--

INSERT INTO `tb_dosen_wali` (`id_wali`, `nidn`, `nim`, `tahun_akademik`, `status`) VALUES
(1, '12345678', '2355201001', '2025/2026', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int NOT NULL,
  `id_matkul` int NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id_jadwal`, `id_matkul`, `nidn`, `hari`, `jam_mulai`, `jam_selesai`, `ruangan`) VALUES
(1, 1, '12345678', 'Senin', '13:15:00', '15:30:00', 'Lab Dasar'),
(2, 4, '12345678', 'Selasa', '12:30:00', '14:00:00', 'T01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` int NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int NOT NULL,
  `semester` int NOT NULL,
  `id_prodi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `semester`, `id_prodi`) VALUES
(1, 'MK001', 'Pemprograman Website', 4, 5, 1),
(3, 'MK003', 'Komunikasi Bisnis', 2, 3, 3),
(4, 'MK002', 'Hukum Newton', 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `id_prodi` int NOT NULL,
  `semester` int NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id`, `nama`, `nim`, `alamat`, `telp`, `email`, `jk`, `id_prodi`, `semester`, `foto`) VALUES
(1, 'Fatkhul S.Kom.', '2355201001', 'Bulakamba', '083182210690', 'fatkhularif@gmail.com', 'L', 1, 5, 'Gambar_WhatsApp_2025-07-26_pukul_14_01_53_aa99ccde.jpg'),
(3, 'Rizky Bogor', '2355201003', 'Bangsri', '083861021822', 'rizkyhehe@gmail.com', 'L', 5, 1, 'WhatsApp_Image_2025-12-11_at_16_01_51.jpeg'),
(4, 'Kang Faridin Eaaa', '2355201004', 'Klampok City', '083873456992', 'kangid@gmail.com', 'L', 0, 0, 'WhatsApp_Image_2025-12-17_at_16_54_01.jpeg'),
(6, 'Onic Nazarkun', '233552010005', 'Losari', '083873456992', 'nazarkun@gmail.com', 'L', 0, 0, 'WhatsApp_Image_2025-12-11_at_16_01_50.jpeg'),
(7, 'Rijal Indigoo hehe', '55201230044', 'Losari', '089660272013', 'rizalhehe@gmail.com', 'L', 0, 0, 'WhatsApp_Image_2025-12-11_at_16_01_61.jpeg'),
(8, 'Ramadhan Saputra', '55201230001', 'Cigedog', '00895786297771', 'titisanputra@gmail.com', 'L', 0, 0, 'WhatsApp_Image_2025-12-11_at_16_12_35.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int NOT NULL,
  `kode_prodi` varchar(20) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `jenjang` enum('D3','S1','S2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`, `jenjang`) VALUES
(1, 'TI', 'Teknik Informatika', 'S1'),
(3, 'MNJ', 'Manajemen', 'S2'),
(4, 'HKM', 'Hukum', 'S1'),
(5, 'SI', 'Sistem Informasi', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'fatkhul', 'admin123', 'aktif'),
(2, 'fatkhul', 'admin123', 'aktif'),
(5, 'sasya', 'sasya123', 'aktif'),
(6, 'dewi', 'dewi123', 'aktif'),
(7, 'nazar', 'nazar123', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indexes for table `tb_dosen_wali`
--
ALTER TABLE `tb_dosen_wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `fk_dosen_wali` (`nidn`),
  ADD KEY `fk_mahasiswa_wali` (`nim`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_matkul` (`id_matkul`),
  ADD KEY `fk_jadwal_dosen` (`nidn`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`),
  ADD KEY `fk_matkul_prodi` (`id_prodi`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_dosen_wali`
--
ALTER TABLE `tb_dosen_wali`
  MODIFY `id_wali` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dosen_wali`
--
ALTER TABLE `tb_dosen_wali`
  ADD CONSTRAINT `fk_dosen_wali` FOREIGN KEY (`nidn`) REFERENCES `tb_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mahasiswa_wali` FOREIGN KEY (`nim`) REFERENCES `tb_mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `fk_jadwal_dosen` FOREIGN KEY (`nidn`) REFERENCES `tb_dosen` (`nidn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jadwal_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD CONSTRAINT `fk_matkul_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
