-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2023 pada 08.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_percetakanku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email_ku` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email_ku`, `password`, `nama_lengkap`) VALUES
(1, 'ricardo', 'percetakan@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ricardo'),
(2, 'ucok', '', 'ucok', 'ucokkkk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contoh`
--

CREATE TABLE `contoh` (
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contoh`
--

INSERT INTO `contoh` (`bukti`) VALUES
('20211205163159kardus.jpg'),
('kardus.jpg'),
('majalah.jpg'),
('20211205163526majalah.jpg'),
('20211205163531paper cup.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'demak', 20000),
(2, 'semarang', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'ricardo@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'ricardo', '0895365161071', 'jl.kp.belakang'),
(2, 'baba@gmail.com', 'admin', 'ucokk', '0896555', ''),
(3, 'gagak', 'admin', 'gagagagaga', '078665', ''),
(4, 'ricardo23@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ricardo Dharma Saputra', '089654566', 'jl. kapuk kamal raya, no.17, kamal, kalideres, jakarta barat'),
(5, 'ricardo26@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ricardo', '09878965', 'jl.ki.hajar'),
(6, 'ricardodharma@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ricardo Dharma Saputra', '89329019', 'jl.haji jimin'),
(7, 'ricardo1@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ricardo Dharma Saputra', '9379402', 'jl.gang sempit'),
(8, 'dharma@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ricardo Dharma Saputra', '99999', 'jl.suilo'),
(9, 'saputra@gmail.com', '202cb962ac59075b964b07152d234b70', 'saputra', '88888', 'jl.gatot');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(6, 23, 'RICARDO DHARMA SAPUTRA', 'BRI', 30000, '2021-12-05', 'brosur.jpg'),
(7, 21, 'RICARDO DHARMA SAPUTRA', 'BRI', 60000, '2021-12-05', 'cetak buku.jpg'),
(8, 24, 'RICARDO DHARMA SAPUTRA', 'BRI', 44000, '2021-12-05', 'paper cup.jpg'),
(9, 27, 'RICARDO DHARMA SAPUTRA', 'BRI', 1020000, '2021-12-13', 'IMG_20190601_204613_HDR-400x284.jpg'),
(10, 28, 'RICARDO DHARMA SAPUTRA', 'BRI', 900000, '2021-12-14', 'tf.jpg'),
(11, 29, 'RICARDO DHARMA SAPUTRA', 'BRI', 40000, '2021-12-14', 'tsunami.jpg'),
(12, 30, 'RICARDO DHARMA SAPUTRA', 'BRI', 50000, '2021-12-14', 'tf.jpg'),
(13, 31, 'RICARDO DHARMA SAPUTRA', 'BRI', 50000, '2021-12-14', 'IMG_20190601_204613_HDR-400x284.jpg'),
(14, 32, 'RICARDO DHARMA SAPUTRA', 'BRI', 30000, '2021-12-14', 'IMG_20190601_204613_HDR-400x284.jpg'),
(15, 33, 'RICARDO DHARMA SAPUTRA', 'BRI', 34000, '2021-12-14', 'tf.jpg'),
(16, 36, 'saputra', 'BRI', 24000, '2023-02-06', 'login.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 2, 1, '2021-12-02', 500, '', 0, 'pending', ''),
(2, 2, 2, '2021-12-03', 322, '', 0, 'pending', ''),
(3, 2, 1, '2021-12-08', 200, '', 0, 'pending', ''),
(4, 2, 0, '2021-12-03', 40000, '', 0, 'pending', ''),
(5, 2, 0, '2021-12-03', 40000, '', 0, 'pending', ''),
(6, 2, 0, '2021-12-03', 40000, '', 0, 'pending', ''),
(7, 2, 0, '2021-12-03', 40000, '', 0, 'pending', ''),
(8, 2, 1, '2021-12-03', 60000, '', 0, 'pending', ''),
(9, 2, 1, '2021-12-03', 60000, '', 0, 'pending', ''),
(10, 2, 2, '2021-12-03', 50000, '', 0, 'pending', ''),
(11, 2, 2, '2021-12-03', 10000, '', 0, 'pending', ''),
(12, 2, 1, '2021-12-03', 30000, '', 0, 'pending', ''),
(13, 2, 0, '2021-12-03', 34000, '', 0, 'pending', ''),
(14, 2, 1, '2021-12-03', 50000, '', 0, 'pending', ''),
(15, 2, 1, '2021-12-03', 80000, '', 0, 'pending', ''),
(16, 2, 1, '2021-12-04', 54000, '', 0, 'pending', ''),
(17, 2, 2, '2021-12-04', 84000, '', 0, 'sudah kirim pembayaran', ''),
(18, 4, 1, '2021-12-04', 54000, '', 0, 'Barang dikirim', ''),
(19, 3, 2, '2021-12-04', 30000, '', 0, 'pending', ''),
(20, 1, 2, '2021-12-04', 44000, 'semarang', 10000, 'pending', ''),
(21, 4, 1, '2021-12-04', 60000, 'demak', 20000, 'barang dikirim', 'sgb4a3nef'),
(22, 4, 0, '2021-12-04', 1000000, '', 0, 'barang dikirim', 'gjadaw7391209'),
(23, 4, 2, '2021-12-05', 30000, 'semarang', 10000, 'barang dikirim', '3rqfrqeww'),
(24, 4, 2, '2021-12-05', 44000, 'semarang', 10000, 'batal', 'mohon maaf'),
(25, 4, 1, '2021-12-07', 74000, 'demak', 20000, 'pending', ''),
(26, 4, 0, '2021-12-11', 20000, '', 0, 'pending', ''),
(27, 4, 1, '2021-12-13', 1020000, 'demak', 20000, 'barang dikirim', 'daw8309k'),
(28, 4, 1, '2021-12-14', 34000, 'demak', 20000, 'barang dikirim', 'jawd39902'),
(29, 4, 2, '2021-12-14', 40000, 'semarang', 10000, 'batal', ''),
(30, 4, 1, '2021-12-14', 50000, 'demak', 20000, 'Pemesanan di Batalkan', 'karena tida sesuai jumlah'),
(31, 4, 2, '2021-12-14', 50000, 'semarang', 10000, 'Pemesanan di Batalkan', 'jjjj'),
(32, 4, 2, '2021-12-14', 30000, 'semarang', 10000, 'Barang dikirim', 'jawd78'),
(33, 7, 1, '2021-12-14', 34000, 'demak', 20000, 'Barang dikirim', 'jsadw8293'),
(34, 4, 1, '2022-01-03', 34000, 'demak', 20000, 'pending', ''),
(35, 1, 2, '2023-02-03', 50000, 'semarang', 10000, 'pending', ''),
(36, 9, 2, '2023-02-06', 24000, 'semarang', 10000, 'barang dikirim', 'asdqawu7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 30, '', 0, 0, 0, 0),
(2, 2, 2, 15, '', 0, 0, 0, 0),
(3, 3, 2, 20, '', 0, 0, 0, 0),
(4, 5, 4, 1, '', 0, 0, 0, 0),
(5, 6, 4, 1, '', 0, 0, 0, 0),
(6, 7, 4, 1, '', 0, 0, 0, 0),
(7, 8, 4, 1, '', 0, 0, 0, 0),
(8, 9, 4, 1, '', 0, 0, 0, 0),
(9, 10, 4, 1, '', 0, 0, 0, 0),
(10, 12, 3, 300, '', 0, 0, 0, 0),
(11, 13, 2, 1, '', 0, 0, 0, 0),
(12, 14, 7, 1, '', 0, 0, 0, 0),
(13, 15, 3, 1, '', 0, 0, 0, 0),
(14, 15, 4, 1, '', 0, 0, 0, 0),
(15, 16, 2, 1, '', 0, 0, 0, 0),
(16, 17, 2, 1, '', 0, 0, 0, 0),
(17, 17, 3, 2, '', 0, 0, 0, 0),
(18, 18, 2, 1, '', 0, 0, 0, 0),
(19, 19, 3, 1, 'Kalender 2022', 20000, 555, 555, 20000),
(20, 20, 2, 1, 'amplop', 34000, 40, 40, 34000),
(21, 21, 4, 1, 'banner', 40000, 200, 200, 40000),
(22, 22, 3, 50, 'Kalender 2022', 20000, 555, 27750, 1000000),
(23, 23, 3, 1, 'Kalender 2022', 20000, 555, 555, 20000),
(24, 24, 2, 1, 'amplop', 34000, 40, 40, 34000),
(25, 25, 3, 1, 'Kalender 2022', 20000, 555, 555, 20000),
(26, 25, 2, 1, 'amplop', 34000, 40, 40, 34000),
(27, 26, 3, 1, 'Kalender 2022', 20000, 555, 555, 20000),
(28, 27, 3, 50, 'Kalender 2022', 20000, 555, 27750, 1000000),
(29, 28, 2, 1, 'amplop kerenn', 14000, 50, 50, 14000),
(30, 29, 7, 1, 'majalah', 30000, 999, 999, 30000),
(31, 30, 7, 1, 'majalah', 30000, 999, 999, 30000),
(32, 31, 4, 1, 'banner', 40000, 200, 200, 40000),
(33, 32, 8, 1, 'papper cup', 20000, 999, 999, 20000),
(34, 33, 2, 1, 'amplop kerenn', 14000, 50, 50, 14000),
(35, 34, 2, 1, 'amplop kerenn', 14000, 50, 50, 14000),
(36, 35, 4, 1, 'banner', 40000, 200, 200, 40000),
(37, 36, 2, 1, 'amplop kerenn', 14000, 50, 50, 14000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(2, 'amplop kerenn', 14000, 50, 'amplop.jpg', 'keren bangett', 996),
(4, 'banner', 40000, 200, 'banner.jpg', 'pesan sesuai keinginan anda', 998),
(5, 'Kardus custom', 10000, 999, 'kardus.jpg', 'harga adalah harga satuan', 1000),
(6, 'Nota & Kwitansi', 25000, 999, 'Nota & Kwitansi.jpg', 'bisa di cutom tersendiri', 1000),
(7, 'majalah', 30000, 999, 'majalah.jpg', 'harga di atas adalah harga satuan', 998),
(8, 'papper cup', 20000, 999, 'paper cup.jpg', 'bisa pesan sesuai keinginan', 999),
(9, 'shopping Bag', 15000, 999, 'shopping Bag.jpg', 'harga adalah harga satuan', 1000),
(10, 'Undangan Pernikahan ', 14000, 999, 'undangan.jpg', 'harga suatu saat akan berubah', 1000),
(11, 'Brosur', 10000, 999, 'brosur.jpg', 'bisa pesan sesuai keinginan', 1000),
(12, 'Sticky Notes', 5000, 999, 'sticky notes.jpg', 'bahan sangat bagus ', 1000),
(13, 'cetak x banner', 30000, 999, 'c0b3bc62d17aa77e3da8fbef37630dfd.jfif', 'harga tergantung ketebalan isi buku', 1000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
