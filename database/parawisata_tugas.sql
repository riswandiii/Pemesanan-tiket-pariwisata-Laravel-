-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 07:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parawisata_tugas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayarans`
--

CREATE TABLE `bukti_pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_detail_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE `coments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parawisata_id` int(11) NOT NULL,
  `coment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `parawisata_id` int(11) NOT NULL,
  `like` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_30_130426_create_pesanans_table', 1),
(6, '2023_01_30_134647_create_pesanan_details_table', 1),
(7, '2023_01_30_134721_create_coments_table', 1),
(8, '2023_01_30_134737_create_likes_table', 1),
(9, '2023_01_30_134757_create_bukti_pembayarans_table', 1),
(10, '2023_01_30_134837_create_parawisatas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parawisatas`
--

CREATE TABLE `parawisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parawisata` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tentang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parawisatas`
--

INSERT INTO `parawisatas` (`id`, `parawisata`, `alamat`, `tentang`, `image`, `harga`, `maps`, `created_at`, `updated_at`) VALUES
(1, 'Patung Yesus Buntu Burake', 'Bukit Buntu Burake, Kota Makale, Sulawesi Selatan.', 'Pada dasarnya tempat ini merupakan objek wisata rohani untuk pemeluk agama Kristiani. Akan tetapi siapapun bisa menikmati pemandangan alam yang spektakuler dari jembatan kaca. Untuk mencapai ke bukit Buntu Burake, kamu menempuh perjalanan sekitar tujuh jam melalui jalan Poros Baru Makassar. Letak patung ini berada di kota Makale, tepat di atas bukit Buntu Burake. Dibangunnya patung ini mereplikasi gaya patung yang ada di Rio De Janeiro, Christ the Redeemer.', 'post-image/FcDLeK0n43qN1EbTGUhTmD742jK9JPTHEhKgOU9u.jpg', 50000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.03089844135!2d119.86096741643392!3d-3.092602637414553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93ede8a13000eb%3A0x647917fdb4da3657!2sBuntu%20Burake!5e0!3m2!1sid!2sid!4v1680885482995!5m2!1sid!2sid\" width=\"\" height=\"\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', '2023-04-07 09:39:14', '2023-04-07 09:40:53'),
(3, 'Kolam Air Limbong, telaga kecil di tengah tebing yang dramatis', 'Jl. Singki, Rantepao, Sulawesi Selatan, Indonesia', 'Akses menuju kolam juga sudah baik. Fasilitasnya pun lengkap, termasuk keberadaan beberapa rumah makan dan toilet. Kamu juga bisa bersepeda air sambil melihat rindangnya pepohonan yang menjorok ke perairan. Nyanyian burung yang bersorak-sorai turut meramaikan pesona alam di sekitar telaga, tebing yang tinggi memantulkan gema alam dan menghadirkan relaksasi.', 'post-image/XWGG6uulTt5KsSPGYFBhHTCx9zW7LUSweM4hG5QE.jpg', 10000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.4454841894158!2d119.8895854141109!3d-2.9737990406319192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93e9fabe0bfb89%3A0xa34ebee5201f231c!2sJl.%20Bukit%20Singki%2C%20Mentirotiku%2C%20Kec.%20Rantepao%2C%20Kabupaten%20Toraja%20Utara%2C%20Sulawesi%20Selatan%2091833!5e0!3m2!1sid!2sid!4v1680886757224!5m2!1sid!2sid\" width=\"\" height=\"\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" ', '2023-04-07 09:57:50', '2023-04-07 09:57:50'),
(4, 'Bonggakaradeng punya bukit teletubbies', 'Bukit Teletubbies, Desa Bonggakaradeng, Tana Toraja, Sulawesi Selatan.', 'Bonggakaradeng adalah sebuah kecamatan yang ada di Kabupaten Tana Toraja Sulawesi Selatan. Wilayah ini memiliki destinasi wisata yang mempertontonkan bentang alam yang luas dan padang rumput hijau. Daya tarik utamanya adalah pemandangan barisan gunung yang seperti permadani yang dibelah aliran sungai. Lokasi bukit Teletubies adalah area paling baik untuk melihat hamparan pegunungan dan menikmati atmosfer pedesaan.', 'post-image/ZS60wgxf7a9uA4dDpaeA4e0hjLH9pelbMmhq7ajk.jpg', 20000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.254062816373!2d119.68421371411281!3d-3.2871039420065657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d94767d17220bef%3A0x5107c8cf40927431!2sKantor%20Desa%20Bau!5e0!3m2!1sid!2sid!4v1680886975302!5m2!1sid!2sid\" width=\"\" height=\"\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', '2023-04-07 10:02:27', '2023-04-07 10:04:12'),
(5, 'Batu megalitikum para bangsawan di Bori Kalimbuang', 'Bori, Sesean, Toraja Utara, Sulawesi Selatan', 'Bori Kalimbuang merupakan susunan kompleks batu megalitik yang berdiri menjulang di atas padang rumput. Total ada 102 batu yang menjulang di area Bori Kalimbuang, yang disebut oleh masyarakat setempat sebagai “simbuang batu”. Batu-batu yang tinggi ini merupakan menhir yang dibuat saat persemayaman jenazah.', 'post-image/PTUd7TVB8JOIkGKcWtjCoobVCLXkqLhbewGxePkN.jpg', 40000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15938.569373312788!2d119.91239666641545!3d-2.9187990860192397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d93c3a5cd055e03%3A0x22ba5b021a3ec4fe!2sBori%2C%20Kec.%20Sesean%2C%20Kabupaten%20Toraja%20Utara%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1680887226416!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', '2023-04-07 10:07:38', '2023-04-07 10:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal_pesanan` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `parawisata_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_handphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `no_handphone`, `email`, `password`, `admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'riswand', 'Riswandi', '081241731108', 'riswandiandi017@gmail.com', '$2y$10$HXvJEdrcue4R/Ss4m3lz.u62rtHY78.Mh4GqYedCRtHt1DvgyDNGm', 1, NULL, NULL, '2023-04-07 09:33:54', '2023-04-07 09:33:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_pembayarans`
--
ALTER TABLE `bukti_pembayarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parawisatas`
--
ALTER TABLE `parawisatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti_pembayarans`
--
ALTER TABLE `bukti_pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parawisatas`
--
ALTER TABLE `parawisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
