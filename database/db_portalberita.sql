-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 06:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portalberita`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tgl_publikasi` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penulis` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `tgl_publikasi`, `id_kategori`, `id_penulis`, `img`) VALUES
(1, 'Pemerintah Umumkan Program Vaksinasi Massal', 'Pemerintah mengumumkan program vaksinasi massal untuk mengatasi pandemi COVID-19. Program ini akan mencakup semua warga negara.', '2023-11-03', 8, 2, ''),
(2, 'Tim Nasional Menang dalam Pertandingan Terakhir', 'Tim nasional memenangkan pertandingan terakhir mereka dengan skor 2-1, memastikan tempat di babak selanjutnya.', '2023-11-03', 6, 3, ''),
(3, 'Perusahaan Teknologi Rilis Produk Baru', 'Perusahaan teknologi terkemuka merilis produk terbaru mereka, yang diharapkan akan mengubah cara kita berinteraksi dengan teknologi.', '2023-11-03', 7, 4, ''),
(4, 'Penelitian Baru Mengungkapkan Manfaat Makanan Seha', 'Penelitian terbaru menunjukkan bahwa makanan sehat memiliki manfaat signifikan bagi kesehatan manusia. Ini adalah kabar baik bagi mereka yang peduli akan pola makan mereka.', '2023-11-03', 8, 1, ''),
(5, 'Peluncuran Film Baru Mendapat Respon Positif', 'Film terbaru yang dirilis telah mendapat respon positif dari penonton dan kritikus. Ini adalah karya besar dari sutradara terkenal.', '2023-11-03', 5, 4, ''),
(6, 'Pengusaha Sukses Berbagi Kiat Bisnis', 'Pengusaha sukses berbagi kiat-kiat bisnis mereka dalam seminar terbaru. Mereka memberikan wawasan berharga kepada para wirausaha.', '2023-11-03', 1, 3, ''),
(7, 'Penemuan Terbaru dalam Dunia Sains', 'Ilmuwan telah mengumumkan penemuan terbaru yang dapat mengubah cara kita memahami alam semesta. Penemuan ini adalah terobosan besar dalam sains.', '2023-11-03', 8, 2, ''),
(8, 'Artis Terkenal Akan Tampil dalam Konser Mega', 'Artis terkenal akan tampil dalam konser mega yang dijadwalkan berlangsung bulan depan. Konser ini diharapkan akan menarik ribuan penggemar.', '2023-11-03', 5, 4, ''),
(9, 'Peneliti Peringatkan Tentang Pemanasan Global', 'Peneliti iklim memperingatkan bahwa pemanasan global terus meningkat dan dapat memiliki dampak serius pada lingkungan. Tindakan segera diperlukan.', '2023-11-03', 9, 1, ''),
(10, 'Pandemi COVID-19: Update Terkini', 'Update terkini tentang pandemi COVID-19 termasuk tingkat vaksinasi dan perkembangan varian baru.', '2023-11-03', 8, 2, ''),
(11, 'Keputusan Terkini dalam Pemilihan Umum', 'Keputusan terkini dalam pemilihan umum mencakup perolehan suara dan pemenang di berbagai daerah.', '2023-11-03', 2, 2, ''),
(12, 'Perusahaan Rintis Merilis Aplikasi Inovatif', 'Perusahaan rintis merilis aplikasi inovatif yang dapat memudahkan pengguna dalam melakukan aktivitas sehari-hari.', '2023-11-03', 3, 4, ''),
(13, 'Kabar Gembira dari Tim Sepak Bola', 'Tim sepak bola lokal meraih kemenangan penting dalam pertandingan terbaru mereka.', '2023-11-03', 6, 1, ''),
(14, 'Penemuan Baru dalam Bidang Kesehatan', 'Penelitian baru-baru ini telah menghasilkan penemuan yang dapat mengubah cara kita mengatasi masalah kesehatan tertentu.', '2023-11-03', 8, 1, ''),
(15, 'Artis Pop Terkenal Akan Mengadakan Konser Dunia', 'Artis pop terkenal akan mengadakan tur konser dunia yang akan mencakup banyak negara.', '2023-11-03', 5, 3, ''),
(16, 'Perusahaan Teknologi Informasi Mendapatkan Investa', 'Perusahaan teknologi informasi terkemuka berhasil mengamankan investasi besar untuk pengembangan produk-produk baru.', '2023-11-03', 1, 3, ''),
(17, 'Peneliti Lingkungan Menganalisis Dampak Perubahan ', 'Penelitian terbaru mengungkapkan dampak perubahan iklim pada lingkungan dan spesies tertentu.', '2023-11-03', 1, 1, ''),
(18, 'Sains: Temuan Baru dalam Penelitian Astrofisika', 'Para ilmuwan telah mengumumkan temuan baru dalam penelitian astrofisika yang mengubah pemahaman kita tentang alam semesta.', '2023-11-03', 1, 1, ''),
(19, 'Pameran Seni Terbaru di Galeri Lokal', 'Galeri seni lokal mengadakan pameran seni terbaru yang menampilkan karya seni terkini dari seniman-seniman lokal.', '2023-11-03', 18, 1, ''),
(20, 'Perkembangan Terkini dalam Hukum dan Peradilan', 'Perkembangan terkini dalam dunia hukum mencakup perubahan dalam peraturan dan keputusan pengadilan terbaru.', '2023-11-03', 19, 1, ''),
(21, 'Wisatawan Menikmati Liburan di Destinasi Eksotis', 'Destinasi wisata eksotis telah menjadi tujuan populer bagi para wisatawan yang mencari petualangan.', '2023-11-03', 5, 2, ''),
(22, 'Penelitian Terbaru Menunjukkan Manfaat Aktivitas F', 'Penelitian terbaru menyoroti manfaat aktivitas fisik teratur bagi kesehatan dan kesejahteraan manusia.', '2023-11-03', 8, 4, ''),
(23, 'Pemerintah Daerah Meluncurkan Inisiatif Kebudayaan', 'Pemerintah daerah telah meluncurkan inisiatif untuk mempromosikan dan melestarikan warisan budaya lokal.', '2023-11-03', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Berita Utama', 'Kategori untuk berita-berita utama dan headline utama.'),
(2, 'Politik', 'Kategori untuk berita-berita yang berkaitan dengan politik dan pemerintahan.'),
(3, 'Ekonomi', 'Kategori untuk berita-berita ekonomi dan pasar keuangan.'),
(4, 'Dunia', 'Kategori untuk berita-berita internasional dan perkembangan di seluruh dunia.'),
(5, 'Hiburan', 'Kategori untuk berita-berita tentang film, musik, selebriti, dan industri hiburan.'),
(6, 'Olahraga', 'Kategori untuk berita-berita tentang peristiwa olahraga, pertandingan, dan prestasi atlet.'),
(7, 'Teknologi', 'Kategori untuk berita-berita inovasi teknologi, perangkat, aplikasi, dan perusahaan teknologi.'),
(8, 'Kesehatan', 'Kategori untuk berita-berita tentang masalah kesehatan, penelitian medis, obat-obatan, dan perawatan kesehatan.'),
(9, 'Lingkungan', 'Kategori untuk berita-berita tentang isu-isu lingkungan, perubahan iklim, dan pelestarian alam.'),
(10, 'Sains', 'Kategori untuk berita-berita tentang penemuan ilmiah, penelitian, dan perkembangan dalam bidang sains.'),
(11, 'Pendidikan', 'Kategori untuk berita-berita tentang sistem pendidikan, penelitian pendidikan, dan masalah-masalah pendidikan.'),
(12, 'Gaya Hidup', 'Kategori untuk berita-berita tentang gaya hidup, mode, makanan, perjalanan, dan topik terkait lainnya.'),
(13, 'Opini', 'Kategori untuk artikel pendapat dan kolom yang memberikan pandangan penulis tentang berbagai topik.'),
(14, 'Teknologi Informasi', 'Kategori untuk berita-berita tentang teknologi informasi, keamanan siber, dan perkembangan dalam dunia komputasi.'),
(15, 'Bisnis', 'Kategori untuk berita-berita tentang dunia bisnis, perusahaan, wirausaha, dan ekonomi bisnis.'),
(16, 'Kriminalitas', 'Kategori untuk berita-berita tentang kejahatan, investigasi, hukum, dan peristiwa terkait keamanan.'),
(17, 'Agama', 'Kategori untuk berita-berita tentang agama, peristiwa keagamaan, dan isu-isu keagamaan.'),
(18, 'Seni dan Budaya', 'Kategori untuk berita-berita tentang seni, budaya, seni rupa, dan peristiwa seni lainnya.'),
(19, 'Hukum', 'Kategori untuk berita-berita tentang sistem hukum, peradilan, dan perkembangan hukum.'),
(20, 'Perjalanan', 'Kategori untuk berita-berita tentang destinasi perjalanan, wisata, dan petualangan.');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama_penulis` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama_penulis`, `email`, `bio`) VALUES
(1, 'John Doe', 'johndoe@email.com', 'Penulis berita dengan fokus pada berita politik dan pemerintahan.'),
(2, 'Jane Smith', 'janesmith@email.com', 'Penulis berita hiburan yang mengikuti perkembangan industri hiburan dan selebriti.'),
(3, 'David Johnson', 'david@email.com', 'Penulis teknologi yang tertarik pada perkembangan terbaru dalam dunia teknologi.'),
(4, 'Emily Brown', 'emily@email.com', 'Penulis kesehatan yang memberikan informasi terkini tentang masalah kesehatan dan perawatan.');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penulis` (`id_penulis`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
