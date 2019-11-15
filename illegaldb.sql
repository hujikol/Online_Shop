-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2019 pada 07.57
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `illegaldb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `harga`, `gambar`) VALUES
(1, 'Bottle', 115000, 'bottle.jpg'),
(2, 'Confusion', 125000, 'confusion.jpg'),
(3, 'Dragnet', 100000, 'dragnet.jpg'),
(4, 'Increse', 105000, 'increase.jpg'),
(5, 'Mammon', 115000, 'mammon.jpg'),
(6, 'Motorbike Skull', 115000, 'motorskull.jpg'),
(7, 'Motorbike Skull Yuhu', 115000, 'motoryuhu.jpg'),
(8, 'Nope', 110000, 'nope.jpg'),
(9, 'Reject', 100000, 'reject.jpg'),
(10, 'Rock', 135000, 'rock.jpg'),
(11, 'Shoemaker', 125000, 'shoemaker.jpg'),
(12, 'Skateboard', 120000, 'sktboard.jpg'),
(13, 'Stay', 115000, 'stay.jpg'),
(14, 'Surfing', 125000, 'surfing.jpg'),
(15, 'Triangle', 130000, 'triangle.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `kode_pos` int(5) NOT NULL,
  `tipe` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`email`, `password`, `firstname`, `lastname`, `alamat`, `kota`, `no_telp`, `kode_pos`, `tipe`, `user_id`) VALUES
('nikolasnanda@gmail.com', '202cb962ac59075b964b07152d234b70', 'nicholas', 'nanda', 'abcd', 'desc', 12049, 12345, 'user', 1),
('tet@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', 'a', 'b', 'c', 'd', 8475, 12345, 'user', 2),
('1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1', '1', '1', 1, 1, 'user', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
