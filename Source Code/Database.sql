-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Bulan Mei 2024 pada 16.36
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_iot`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(8) NOT NULL,
  `sensor_actuator` enum('sensor','actuator') NOT NULL,
  `value` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `mqtt_topic` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `serial_number`, `sensor_actuator`, `value`, `name`, `mqtt_topic`, `time`) VALUES
(1, '12345678', 'sensor', '30', 'Suhu', '12345678/taman/suhu', '2024-05-18 11:01:46'),
(2, '12345678', 'sensor', '29', 'suhu', '123456789/taman/suhu', '2024-05-18 11:01:46'),
(3, 'abcdefg', 'actuator', '90', 'Servo', '12345678/taman/pintu', '2024-05-18 11:01:46'),
(4, '12345678', 'actuator', '23', 'servo', 'kelasiot/12345678/servo', '2024-05-18 11:01:46'),
(6, '12345678', 'sensor', '21', 'suhu', 'kelasiot/12345678/suhu', '2024-05-18 11:01:46'),
(8, '12345678', 'sensor', '1400', 'potentiometer', 'kelasiot/12345678/potentiometer', '2024-05-18 13:46:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `devices`
--

CREATE TABLE `devices` (
  `serial_number` varchar(8) NOT NULL,
  `mcu_type` varchar(15) NOT NULL,
  `location` text NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `devices`
--

INSERT INTO `devices` (`serial_number`, `mcu_type`, `location`, `created_time`, `active`) VALUES
('12345678', 'ESP32', 'Taman', '2024-05-05 14:05:03', 'Yes'),
('87654321', 'Test', 'lokasi', '2024-05-05 15:52:21', 'Yes'),
('abcdefg', 'ESP32', '-', '2024-05-09 19:06:19', 'Yes'),
('qwertyu', 'ESP32', '-', '2024-05-10 07:26:50', 'No'),
('zxcvb', 'ATMega32', 'Lantai 10', '2024-05-10 07:47:40', 'Yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User',
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `fullname`, `role`, `active`) VALUES
('bambang', '$2y$10$Th27BSkQb1K.3QJKgxMZeeKvzsczcSYqeS935gzCd4NwBWMuitCz2', 'Bambang Puji', 'Admin', 'Yes'),
('bunga', '$2y$10$fRqPD5XtZ2vHZMHD2jpQQe.DRLb0PqkKyMEX1Zw/5MvogbB.GO84a', 'Bunga Kembang', 'User', 'Yes'),
('kamu', '$2y$10$ElprxcumTLXGL3Dmh9sgTuM8jAoQTRNXDV8JwhlM9PFGGY2p8lLmS', 'Kamu', 'User', 'No');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_number` (`serial_number`);

--
-- Indeks untuk tabel `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`serial_number`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`serial_number`) REFERENCES `devices` (`serial_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
