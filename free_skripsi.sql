-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2020 pada 09.39
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `free_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cash`
--

CREATE TABLE `tb_cash` (
  `id_cash` int(8) NOT NULL,
  `id_konsumen` int(8) NOT NULL,
  `id_block` int(8) NOT NULL,
  `type` varchar(10) NOT NULL,
  `spesifikasi` text NOT NULL,
  `harga` int(15) NOT NULL,
  `dp` int(15) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `jumblah` int(15) NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cash`
--

INSERT INTO `tb_cash` (`id_cash`, `id_konsumen`, `id_block`, `type`, `spesifikasi`, `harga`, `dp`, `pembayaran`, `jumblah`, `keterangan`, `total`) VALUES
(20, 30, 1212, 'wowd', 'asem', 800000, 50000, '9000000', 2147483647, 'berhabisoudowqdqid9uwd9wegdywegf9ygewyfgewyfgwefgwhidhqkhwdhwdhwihiwhiwhdiwhdiwhdiwhidwhidhwdiwhid', 7617637),
(33, 11111, 400, '22', 'iui', 3233, 3535, '5000000', 6686, 'ok', 4545);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(8) NOT NULL,
  `id_tukang` int(8) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `gaji` int(15) NOT NULL,
  `jumblah` int(15) NOT NULL,
  `total_gaji` int(15) NOT NULL,
  `cashbon` int(15) NOT NULL,
  `sisa_gaji` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `id_tukang`, `jabatan`, `gaji`, `jumblah`, `total_gaji`, `cashbon`, `sisa_gaji`) VALUES
(555060001, 22, 'tukang baso', 5000000, 25, 5500000, 300000, 5200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutang`
--

CREATE TABLE `tb_hutang` (
  `id_hutang` int(8) NOT NULL,
  `id_konsumen` int(8) NOT NULL,
  `hutang` int(15) NOT NULL,
  `bayar` int(15) NOT NULL,
  `sisa_hutang` int(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hutang`
--

INSERT INTO `tb_hutang` (`id_hutang`, `id_konsumen`, `hutang`, `bayar`, `sisa_hutang`, `keterangan`) VALUES
(1, 11111, 700000, 500000, 400000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus et deserunt a obcaecati consequatur nemo molestiae harum doloribus, sequi nobis distinctio omnis cum commodi est dolorem nisi itaque maxime ad!w');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_inventaris` int(8) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jumblah` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_inventaris`, `nama_barang`, `jumblah`, `keterangan`) VALUES
(1045060001, 'sabun', 2000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veritatis tenetur praesentium obcaecati maiores expedita consequatur sapiente provident eligendi, rerum eius, minus nostrum, iure vel. Laudantium eius iste repudiandae ea.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kavling`
--

CREATE TABLE `tb_kavling` (
  `id_block` int(8) NOT NULL,
  `noblock` varchar(10) NOT NULL,
  `luas_tanah` varchar(10) NOT NULL,
  `no_sertifikat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kavling`
--

INSERT INTO `tb_kavling` (`id_block`, `noblock`, `luas_tanah`, `no_sertifikat`) VALUES
(400, '5635625', '723797', '08928294'),
(1212, '74', '97385792', '72575284586481');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id_konsumen` int(8) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `noktp` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `nama`, `noktp`, `pekerjaan`, `alamat`, `status`, `nohp`) VALUES
(30, 'fajar', '27828462', 'proggramer', 'bekasi', 'perjaka', '089462864826'),
(11111, 'asep', '7827484827', 'supir', 'bekasi', 'kawin', '08089379479');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembeli` int(8) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `jumblah` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembeli`, `nama_barang`, `jumblah`, `harga`, `total`, `keterangan`) VALUES
(2006160001, 'papa', 208, 300000, 40000, 'lopsjihihi idwhowhd diwhdwoh wdouwgd odwhoduwho dowhduwhd odwhdohw diwhdhwoid diwhdiwh diwhdowih dowdhwohd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_keluar` int(8) NOT NULL,
  `id_block` int(8) NOT NULL,
  `nama_material` varchar(25) NOT NULL,
  `jumblah` int(10) NOT NULL,
  `harga` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_keluar`, `id_block`, `nama_material`, `jumblah`, `harga`, `total`) VALUES
(913060001, 400, 'ssusu', 42, 50000, 2100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proses`
--

CREATE TABLE `tb_proses` (
  `id_proses` int(8) NOT NULL,
  `id_block` int(8) NOT NULL,
  `id_tukang` int(8) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `proses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_proses`
--

INSERT INTO `tb_proses` (`id_proses`, `id_block`, `id_tukang`, `bulan`, `proses`) VALUES
(803060001, 1212, 22, '2020-06-18', '77799');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stokmaterial`
--

CREATE TABLE `tb_stokmaterial` (
  `id_stok` int(8) NOT NULL,
  `nama_material` varchar(25) NOT NULL,
  `jumblah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_stokmaterial`
--

INSERT INTO `tb_stokmaterial` (`id_stok`, `nama_material`, `jumblah`) VALUES
(143060001, 'sabun', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tukang`
--

CREATE TABLE `tb_tukang` (
  `id_tukang` int(8) NOT NULL,
  `nama_tukang` varchar(20) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tukang`
--

INSERT INTO `tb_tukang` (`id_tukang`, `nama_tukang`, `jabatan`, `alamat`, `nohp`) VALUES
(22, 'indo', 'supir', 'kshp', '970797');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_cash`
--
ALTER TABLE `tb_cash`
  ADD PRIMARY KEY (`id_cash`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_block` (`id_block`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_tukang` (`id_tukang`);

--
-- Indeks untuk tabel `tb_hutang`
--
ALTER TABLE `tb_hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indeks untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indeks untuk tabel `tb_kavling`
--
ALTER TABLE `tb_kavling`
  ADD PRIMARY KEY (`id_block`);

--
-- Indeks untuk tabel `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id_block` (`id_block`);

--
-- Indeks untuk tabel `tb_proses`
--
ALTER TABLE `tb_proses`
  ADD PRIMARY KEY (`id_proses`),
  ADD KEY `id_block` (`id_block`);

--
-- Indeks untuk tabel `tb_stokmaterial`
--
ALTER TABLE `tb_stokmaterial`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tb_tukang`
--
ALTER TABLE `tb_tukang`
  ADD PRIMARY KEY (`id_tukang`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_cash`
--
ALTER TABLE `tb_cash`
  MODIFY `id_cash` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555060002;

--
-- AUTO_INCREMENT untuk tabel `tb_hutang`
--
ALTER TABLE `tb_hutang`
  MODIFY `id_hutang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_inventaris` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1046060003;

--
-- AUTO_INCREMENT untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  MODIFY `id_keluar` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=919060003;

--
-- AUTO_INCREMENT untuk tabel `tb_proses`
--
ALTER TABLE `tb_proses`
  MODIFY `id_proses` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=803060002;

--
-- AUTO_INCREMENT untuk tabel `tb_stokmaterial`
--
ALTER TABLE `tb_stokmaterial`
  MODIFY `id_stok` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145060003;

--
-- AUTO_INCREMENT untuk tabel `tb_tukang`
--
ALTER TABLE `tb_tukang`
  MODIFY `id_tukang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
