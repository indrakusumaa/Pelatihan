-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2020 at 03:18 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelatihanku`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `kebutuhan` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `kegiatan_id`, `kebutuhan`, `harga`, `jumlah`, `satuan`) VALUES
(22, 19, 'Developer', 4000, 4, 'orang'),
(27, 29, 'Tim Pembuat Prosedur Pendaftaran dan Penjadwalan', 3500000, 1, 'Orang'),
(30, 31, 'Developer', 23232323, 2, 'orang');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `tempat_terbit` varchar(255) NOT NULL,
  `halaman` int(5) NOT NULL,
  `tinggi` int(12) NOT NULL,
  `DDC` varchar(200) NOT NULL,
  `ISBN` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `no_inventaris` int(255) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_keg` text NOT NULL,
  `deskripsi_keg` text NOT NULL,
  `kategori_keg` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `pic_keg` varchar(255) NOT NULL,
  `pengusul` varchar(255) NOT NULL,
  `mengetahui` varchar(255) NOT NULL,
  `output_keg` varchar(255) NOT NULL,
  `keterangan` text,
  `target_waktu_rencana` date NOT NULL,
  `target_waktu_realisasi` date NOT NULL,
  `catatan_pic` text,
  `doc_admin` varchar(255) DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `user_id`, `nama_keg`, `deskripsi_keg`, `kategori_keg`, `status`, `pic_keg`, `pengusul`, `mengetahui`, `output_keg`, `keterangan`, `target_waktu_rencana`, `target_waktu_realisasi`, `catatan_pic`, `doc_admin`, `date_created`) VALUES
(19, 21, 'Kerja Praktek FRI Telkom University', 'Kerja Praktek', 'Kerja Praktek', 0, 'Kerja Praktek', 'I Made Indra Kusuma', 'Kerja Praktek', 'Kerja Praktek', 'Kerja Praktek', '2020-08-14', '2020-08-19', '', 'MultiCriteria_Analysis_ITSM_Tools1.docx', 1596775274),
(28, 1, 'Pembuatan prosedur sistem layanan pengelolaan Tugas Akhir Modul Pendaftaran dan Penjadwalan asaas', 'qwere', 'Aplikasi asa', 1, 'Kerja Praktek FRI', 'I Made Indra', 'Kerja Praktek', 'Kerja Praktek', 'asas', '2020-08-10', '2020-08-10', 'asas', 'Laporan_KP_2020_Template.docx', 1597033267),
(29, 21, 'Pembuatan prosedur sistem layanan pengelolaan Tugas Akhir Modul Pendaftaran dan Penjadwalan', 'Pembuatan prosedur ini bertujuan untuk melakukan sidang TA secara online pada fakultas rekayasa industri. Proses bisnis yang akan dirancang yaitu proses pendaftaran dan penjadwalan mahasiswa yang telah mengambil TA dan siap melakukan sidang pada periode yang ditetapkan layanan akademik FRI.', 'Aplikasi Web', 1, 'Fitriyana Dewi, S.Kom., M.Kom.', 'admin', 'Rachmadita Andreswari, S.Kom., M.Kom.', 'Prosedur pengelolaan TA untuk proses pendaftaran dan penjadwalan', 'Kerja Praktek FRI', '2020-04-27', '2020-08-05', '', 'Laporan_KP_2020_Template1.docx', 1597120021),
(30, 21, 'Pembuatan prosedur sistem layanan pengelolaan Tugas Akhir Modul Pendaftaran dan Penjadwalan ', 'Pembuatan prosedur sistem layanan pengelolaan Tugas Akhir Modul Pendaftaran dan Penjadwalan ', 'Kerja Praktek', 1, 'Kerja Praktek FRI', 'admin', 'Rachmadita Andreswari, S.Kom., M.Kom.', 'laporan', '-', '2020-08-25', '2020-08-30', '-', NULL, 1597377129),
(31, 21, 'asasasasas', 'ewwewew', 'asasas', 0, 'sasasas', 'admin', 'Kerja Praktek', 'Kerja Praktek', 'asasasas', '2020-11-25', '2020-11-18', 'ds', NULL, 1605360808);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nim_nip` int(10) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `nim_nip`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'I Made Indra', 'indra@gmail.com', 1202, 'default.png', '$2y$10$8EPxnQKZr1Q5lldGLKlrbusgMaCNTNLS7kLl4W6ADecE7P3qMeZCG', 2, 1, 1595917525),
(21, 'admin', 'admin@gmail.com', 1111, 'default.png', '$2y$10$H2WalMun9MnhBNHfy6cTZObFJrg9kK1CoNaZdWAuguTrklL9nhSIi', 1, 1, 1596353106),
(22, 'Janu Prianda Putra', 'janu@gmail.com', 121212, 'default.jpg', '$2y$10$m.Xc17bRQvXM4Tur1kUyT.k5FB0YjifImvHf1KctnUcLHDBm6ZSn6', 2, 1, 1596570125),
(23, 'I Made Indra Kusuma', 'indrakusuma70@gmail.com', 1202171120, '17_06_315_4x6.jpg', '$2y$10$IPxgOvfNzfJmSJUcVJlgVeUnP2FikGVNeK/JkmeZtaW8RCR2FugZ6', 2, 1, 1597037415);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(8, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Proposal Kegiatan', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 8, 'COBA', 'test/cobab', 'fas fa-fw fa-user-tie', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_kegiatan` (`kegiatan_id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_menu` (`menu_id`),
  ADD KEY `access_role` (`role_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menu_menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD CONSTRAINT `proposal_kegiatan` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `access_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `sub_menu_menu_id` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
