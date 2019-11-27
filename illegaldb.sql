-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2019 pada 09.26
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `title` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `nama`, `title`) VALUES
(1, 'nicholas', '202cb962ac59075b964b07152d234b70', 'Nicholas Nanda S.', 'heroes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_temp`
--

CREATE TABLE `cart_temp` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart_temp`
--

INSERT INTO `cart_temp` (`user_id`, `product_id`, `size`, `harga`, `jumlah`) VALUES
(2, 6, 'L', 115000, 1),
(3, 2, 'S', 125000, 1),
(3, 3, 'S', 100000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `ukuran` varchar(3) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `ukuran`, `jumlah`, `harga`) VALUES
(4, '3', 'S', 1, 100000),
(4, '8', 'S', 2, 110000),
(4, '2', 'L', 2, 125000),
(5, '2', 'L', 2, 125000),
(4, '7', 'L', 1, 115000),
(5, '7', 'L', 1, 115000),
(4, '11', 'L', 1, 125000),
(5, '11', 'L', 1, 125000),
(6, '2', 'M', 2, 125000),
(6, '7', 'L', 1, 115000),
(4, '3', 'S', 2, 100000),
(5, '3', 'S', 2, 100000),
(7, '3', 'S', 2, 100000),
(4, '9', 'S', 1, 100000),
(4, '15', 'S', 2, 130000),
(5, '9', 'S', 1, 100000),
(5, '15', 'S', 2, 130000),
(7, '9', 'S', 1, 100000),
(7, '15', 'S', 2, 130000),
(8, '9', 'S', 1, 100000),
(8, '15', 'S', 2, 130000),
(4, '10', 'S', 2, 135000),
(4, '11', 'S', 1, 125000),
(5, '10', 'S', 2, 135000),
(5, '11', 'S', 1, 125000),
(7, '10', 'S', 2, 135000),
(7, '11', 'S', 1, 125000),
(8, '10', 'S', 2, 135000),
(8, '11', 'S', 1, 125000),
(9, '10', 'S', 2, 135000),
(9, '11', 'S', 1, 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_list`
--

CREATE TABLE `order_list` (
  `user_id` int(11) NOT NULL,
  `status` varchar(24) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `no_resi` varchar(16) NOT NULL,
  `harga_unik` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_list`
--

INSERT INTO `order_list` (`user_id`, `status`, `total_harga`, `order_id`, `no_resi`, `harga_unik`, `bukti`) VALUES
(3, 'Confirmed', 320000, 4, 'SLK1875252', 0, ''),
(3, 'Confirmed', 490000, 5, 'JNF6635796', 0, ''),
(2, 'Not Verified', 365000, 6, '', 0, ''),
(3, 'Not Verified', 200000, 7, '', 0, ''),
(3, 'Not Verified', 360000, 8, '', 360341, ''),
(3, 'Confirmed', 395000, 9, 'CQX8615583', 395278, '04a339e4c22f533d841edd7c82deea08.PNG');

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
('1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '2', '3', '4', 6, 5, 'user', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `order_list`
--
ALTER TABLE `order_list`
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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
