-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Okt 2015 pada 13.34
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dcodress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Kasual'),
(2, 'Pesta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_post`
--

CREATE TABLE IF NOT EXISTS `category_post` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `category_post`
--

INSERT INTO `category_post` (`id`, `category_id`, `post_id`) VALUES
(2, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_product`
--

CREATE TABLE IF NOT EXISTS `category_product` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`) VALUES
(5, 1, 10),
(8, 2, 14),
(9, 1, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data untuk tabel `colors`
--

INSERT INTO `colors` (`id`, `name`) VALUES
(33, '#000000'),
(34, '#424153'),
(35, '#FDADC7'),
(36, '#CCCCCC'),
(37, '#999999'),
(38, '#E7D8B1'),
(39, '#FFFF00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `color_product`
--

CREATE TABLE IF NOT EXISTS `color_product` (
`id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `color_product`
--

INSERT INTO `color_product` (`id`, `product_id`, `color_id`) VALUES
(1, 14, 33),
(2, 14, 34),
(3, 15, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
`id` int(10) unsigned NOT NULL,
  `conf_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conf_val` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `configuration`
--

INSERT INTO `configuration` (`id`, `conf_key`, `conf_val`, `created_at`, `updated_at`) VALUES
(1, 'origin_shipment', '327', '2015-09-18 06:31:21', '2015-09-18 06:31:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
`id` int(10) unsigned NOT NULL,
  `kode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `total` double(16,2) NOT NULL,
  `payment_method` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `confirmation_date` date NOT NULL,
  `verification_date` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handphone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ongkir` double(16,2) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `kode`, `user_id`, `total`, `payment_method`, `status`, `confirmation_date`, `verification_date`, `email`, `name`, `handphone`, `province`, `province_id`, `city`, `city_id`, `district`, `district_id`, `address`, `created_at`, `updated_at`, `ongkir`, `note`) VALUES
(1, '20150918001', NULL, 255000.00, 2, 3, '2015-09-18', '2015-09-20', 'asdasd@asdasd.com', 'Angga Kesuma', '012931023192', 'Lampung', 18, 'Mesuji', 282, '', 0, 'Jl. Ukar koloklo akuma apa atuh..', '2015-09-18 06:32:38', '2015-09-20 09:47:59', 25000.00, 'JNE - 12312412312312'),
(2, 'aadfasdf', NULL, 1000000.00, 1, 3, '0000-00-00', '2015-09-21', '', '', '', '', 0, '', 0, '', 0, '', '0000-00-00 00:00:00', '2015-09-20 18:58:20', 0.00, 'Akan kami antar pada tanggal 21 Maret 2015 ke alamat tujuan'),
(3, 'asdasdfsadf', NULL, 0.00, 0, 1, '0000-00-00', '0000-00-00', '', '', '', '', 0, '', 0, '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, ''),
(4, 'asdasdawewe', NULL, 0.00, 0, 1, '0000-00-00', '0000-00-00', '', '', '', '', 0, '', 0, '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, ''),
(5, 'aawewefwef', NULL, 0.00, 0, 1, '0000-00-00', '0000-00-00', '', '', '', '', 0, '', 0, '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, ''),
(6, '12312312312', NULL, 0.00, 0, 1, '0000-00-00', '0000-00-00', '', '', '', '', 0, '', 0, '', 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.00, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_items`
--

CREATE TABLE IF NOT EXISTS `invoice_items` (
`id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) unsigned NOT NULL,
  `price` double(16,2) NOT NULL,
  `subtotal` double(16,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_payment_by_transfer`
--

CREATE TABLE IF NOT EXISTS `invoice_payment_by_transfer` (
`id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `trans_amount` double(16,2) NOT NULL,
  `trans_date` date NOT NULL,
  `from_bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_rekening_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_rekening_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `invoice_payment_by_transfer`
--

INSERT INTO `invoice_payment_by_transfer` (`id`, `invoice_id`, `trans_amount`, `trans_date`, `from_bank_name`, `from_rekening_number`, `from_account_name`, `to_bank_name`, `to_rekening_number`, `to_account_name`, `created_at`, `updated_at`) VALUES
(1, 1, 120000.00, '2015-09-16', 'BCA', '1231231412', 'agus', 'BCA', '012931203123', 'Angga', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_status`
--

CREATE TABLE IF NOT EXISTS `invoice_status` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `invoice_status`
--

INSERT INTO `invoice_status` (`id`, `name`) VALUES
(1, 'Belum Konfirmasi'),
(2, 'Menunggu Verifikasi'),
(3, 'Selesai, Barang dalam pengiriman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_09_10_004057_create_table_social_login', 1),
('2015_09_10_005222_create_table_profil', 1),
('2015_09_10_005605_create_table_products', 1),
('2015_09_12_135753_create_sharing_discount_table', 1),
('2015_09_13_160656_create_invoices_table', 1),
('2015_09_15_144417_create_table_invoice_items', 1),
('2015_09_16_025148_create_table_roles', 1),
('2015_09_16_025302_create_role_user_table', 1),
('2015_09_17_082850_create_configuration_table', 1),
('2015_09_18_081803_create_invoice_payment_by_transfer_table', 1),
('2015_09_18_092602_add_ongkir_column', 1),
('2015_09_18_132753_create_our_bank_account', 1),
('2015_09_19_010354_add_resi_column', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `our_bank_account`
--

CREATE TABLE IF NOT EXISTS `our_bank_account` (
`id` int(10) unsigned NOT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rekening_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `our_bank_account`
--

INSERT INTO `our_bank_account` (`id`, `bank_name`, `rekening_number`, `account_name`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '192312831924', 'Angga Kesuma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'BNI', '12312931239', 'Angga Kesuma', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Mandiri', '1923881923192', 'Angga Kesuma', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Cost On Delivery (COD)'),
(2, 'Bank Transfer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `kode` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `kode`, `image`, `description`, `updated_at`, `created_at`) VALUES
(1, 3, 'c46f6658655da613542235e52ba7490f', 'c46f6658655da613542235e52ba7490f.jpg', 'Pink Blue sangat mempesona :D', '2015-10-02 02:03:15', '2015-10-02 02:02:35'),
(2, 3, '98a85dc74b6724f3764935c7012d5841', '98a85dc74b6724f3764935c7012d5841.jpg', 'jn', '2015-10-02 05:37:17', '2015-10-02 05:36:24'),
(3, 3, '5b5cd42e780414dfe2ffd88aa6afd1df', '5b5cd42e780414dfe2ffd88aa6afd1df.jpg', '', '2015-10-04 00:52:22', '2015-10-04 00:52:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_color`
--

CREATE TABLE IF NOT EXISTS `post_color` (
`id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data untuk tabel `post_color`
--

INSERT INTO `post_color` (`id`, `post_id`, `color_id`) VALUES
(30, 1, 33),
(31, 1, 34),
(32, 1, 35),
(33, 1, 36),
(34, 1, 37),
(35, 2, 36),
(36, 2, 33),
(37, 2, 38),
(38, 2, 37),
(39, 3, 36),
(40, 3, 33),
(41, 3, 38),
(42, 3, 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_image`
--

CREATE TABLE IF NOT EXISTS `post_image` (
`id` int(10) unsigned NOT NULL,
  `post_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `price` double(16,2) NOT NULL,
  `original_price` double(16,2) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `weight`, `price`, `original_price`, `status`, `description`, `kode`, `slug`, `created_at`, `updated_at`) VALUES
(10, 3, 'Sunday Outfit ', 1.00, 700000.00, 600000.00, 0, 'Sangat cocok di gunakan pada hari minggu yang santai', '20151004001', 'sunday-outfit', '2015-10-03 19:31:55', '2015-10-03 19:31:55'),
(14, 3, 'Biru merdeka', 1.00, 200000.00, 100000.00, 1, 'Warna biru untuk menyambut kemerdakaan RI', '20151004002', 'biru-merdeka', '2015-10-03 21:43:36', '2015-10-03 21:43:36'),
(15, 3, 'Sexy tiny', 1.00, 300000.00, 200000.00, 1, 'sesy bangetzzz', '20151004003', 'sexy-tiny', '2015-10-04 03:23:20', '2015-10-04 03:23:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
`id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `url`, `order`) VALUES
(1, 10, 'products/201510040011.jpg', 1),
(2, 10, 'products/201510040012.jpg', 2),
(5, 14, 'products/201510040021.jpg', 1),
(6, 15, 'products/201510040031.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handphone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `district` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bos', '2015-09-18 06:31:20', '2015-09-18 06:31:20'),
(2, 'Supplier', '2015-09-18 06:31:20', '2015-09-18 06:31:20'),
(3, 'Admin', '2015-09-18 06:31:20', '2015-09-18 06:31:20'),
(4, 'Member', '2015-09-18 06:31:20', '2015-09-18 06:31:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2015-09-18 06:31:21', '2015-09-18 06:31:21'),
(2, 2, 1, '2015-09-18 06:31:21', '2015-09-18 06:31:21'),
(4, 4, 4, '2015-09-29 04:37:36', '2015-09-29 04:37:36'),
(5, 5, 4, '2015-09-29 04:39:01', '2015-09-29 04:39:01'),
(7, 3, 1, '2015-09-30 16:21:14', '2015-09-30 16:21:14'),
(8, 3, 2, '2015-09-30 16:21:14', '2015-09-30 16:21:14'),
(9, 3, 3, '2015-09-30 16:21:14', '2015-09-30 16:21:14'),
(10, 3, 4, '2015-09-30 16:21:14', '2015-09-30 16:21:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sharing_discount`
--

CREATE TABLE IF NOT EXISTS `sharing_discount` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `disc` double(16,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_login`
--

CREATE TABLE IF NOT EXISTS `social_login` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banned` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `avatar`, `banned`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'John', 'j.doe@codingo.me', '$2y$10$8acOKq5lntMdDyMCHw.1fukclqnr6k2ZlSv23Y9fxTV6P.seaYN82', '', 0, NULL, '2015-09-18 06:31:21', '2015-09-18 06:31:21'),
(2, '', 'Jane', 'jane.doe@codingo.me', '$2y$10$WlVudEFh6K7r3KyLI/dCZusMWWRC0Rp0Zo0stdy.KKv0fn5VWSv/W', '', 0, NULL, '2015-09-18 06:31:21', '2015-09-18 06:31:21'),
(3, '', 'Angga kesuma', 'anggakesuma@gmail.com', '$2y$10$lyuq7TpP3KDov8.7U4C2be5U4VNmzpfaq7755X7WsT677/nae58ma', '', 0, NULL, '2015-09-29 04:34:43', '2015-09-29 04:34:43'),
(4, '', 'Angga kesuma', 'anggakesuma@ymail.com', '$2y$10$TJCagtwSyeNT30u4A9hF7e2OXTaZ9eMV.h6vP2VlQq6R6Wr6aceVG', '', 0, NULL, '2015-09-29 04:37:36', '2015-09-29 04:37:36'),
(5, '', 'Angga kesuma2', 'anggakesuma@asdasmail.com', '$2y$10$JnCwb3Xf20b3wnlgscXUYOYZ2Q3Fs49KCNV9ULy0qcrEzxDfIIICK', '', 0, 'zAtV8V8yXPn2ve8goxVaeEKGgLGr9leG4OGLcZAwawb6VOuvkNpQDBriPN1O', '2015-09-29 04:39:01', '2015-09-29 05:39:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
 ADD PRIMARY KEY (`id`), ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`), ADD KEY `invoice_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `invoice_payment_by_transfer`
--
ALTER TABLE `invoice_payment_by_transfer`
 ADD PRIMARY KEY (`id`), ADD KEY `invoice_payment_by_transfer_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoice_status`
--
ALTER TABLE `invoice_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_bank_account`
--
ALTER TABLE `our_bank_account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_color`
--
ALTER TABLE `post_color`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_image`
--
ALTER TABLE `post_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `products_slug_unique` (`slug`), ADD UNIQUE KEY `kode` (`kode`), ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
 ADD PRIMARY KEY (`id`), ADD KEY `profil_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
 ADD PRIMARY KEY (`id`), ADD KEY `role_user_user_id_index` (`user_id`), ADD KEY `role_user_role_id_index` (`role_id`);

--
-- Indexes for table `sharing_discount`
--
ALTER TABLE `sharing_discount`
 ADD PRIMARY KEY (`id`), ADD KEY `sharing_discount_user_id_foreign` (`user_id`), ADD KEY `sharing_discount_product_id_foreign` (`product_id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
 ADD PRIMARY KEY (`id`), ADD KEY `social_login_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoice_payment_by_transfer`
--
ALTER TABLE `invoice_payment_by_transfer`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice_status`
--
ALTER TABLE `invoice_status`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `our_bank_account`
--
ALTER TABLE `our_bank_account`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_color`
--
ALTER TABLE `post_color`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `post_image`
--
ALTER TABLE `post_image`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sharing_discount`
--
ALTER TABLE `sharing_discount`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_login`
--
ALTER TABLE `social_login`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice_items`
--
ALTER TABLE `invoice_items`
ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `invoice_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoice_payment_by_transfer`
--
ALTER TABLE `invoice_payment_by_transfer`
ADD CONSTRAINT `invoice_payment_by_transfer_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `profil`
--
ALTER TABLE `profil`
ADD CONSTRAINT `profil_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION,
ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sharing_discount`
--
ALTER TABLE `sharing_discount`
ADD CONSTRAINT `sharing_discount_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `sharing_discount_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `social_login`
--
ALTER TABLE `social_login`
ADD CONSTRAINT `social_login_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
