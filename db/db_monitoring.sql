-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 10, 2022 at 08:34 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `judul` varchar(255) NOT NULL,
  `penjelasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `created_at`, `judul`, `penjelasan`) VALUES
(1, '2022-05-09 21:55:23', 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, quas? Blanditiis ullam sit mollitia suscipit reprehenderit, optio non porro'),
(2, '2022-05-09 21:55:23', 'Lorem ipsum dolor sit amet.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. In quibusdam quidem dolorum repellendus, voluptatum minima nemo dicta quae accusantium atque dignissimos.'),
(3, '2022-05-10 12:04:18', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa ullam quasi unde. Provident accusantium, dolores quis, blanditiis sit cum quaerat veniam nostrum molestias tenetur culpa minus nemo beatae vitae alias.'),
(4, '2022-05-10 12:04:18', 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos, assumenda pariatur amet accusantium id a voluptatum dolor aperiam perferendis. Perferendis omnis sequi natus, architecto facilis iste. Fugiat rerum eligendi quisquam!');

-- --------------------------------------------------------

--
-- Table structure for table `tb_grafik`
--

CREATE TABLE `tb_grafik` (
  `id` int(11) NOT NULL,
  `created_at` time NOT NULL,
  `tegangan` varchar(255) NOT NULL,
  `kecepatan_angin` varchar(255) NOT NULL,
  `arus_sebelum_bc` varchar(255) NOT NULL,
  `arus_sebelum_ca` varchar(255) NOT NULL,
  `intensitas_cahaya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_grafik`
--

INSERT INTO `tb_grafik` (`id`, `created_at`, `tegangan`, `kecepatan_angin`, `arus_sebelum_bc`, `arus_sebelum_ca`, `intensitas_cahaya`) VALUES
(1, '14:28:55', '10', '100', '20', '40', '60'),
(2, '14:28:55', '70', '90', '10', '40', '40'),
(3, '03:29:32', '88', '55', '30', '20', '77'),
(4, '03:29:32', '45', '65', '33', '50', '25'),
(5, '03:29:59', '30', '44', '55', '45', '35'),
(6, '03:29:59', '35', '45', '50', '20', '55'),
(7, '04:17:21', '100', '101', '22', '33', '77');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_grafik`
--
ALTER TABLE `tb_grafik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_grafik`
--
ALTER TABLE `tb_grafik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
