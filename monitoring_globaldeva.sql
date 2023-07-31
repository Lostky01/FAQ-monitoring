-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2023 at 08:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_globaldeva`
--

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `project_id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'KPP CLOUD', 'https://kpp.gss-login.com', '2021-12-21 07:41:38', '2021-12-29 02:38:43'),
(2, 1, 'KPP ASTO', 'http://10.13.130.48', '2021-12-21 07:41:38', '2021-12-29 02:38:53'),
(3, 1, 'KPP INDE', 'http://10.13.65.76/', '2021-12-21 07:42:01', '2021-12-29 07:05:33'),
(4, 2, 'PAMA GSS', 'https://pama.gss-login.com/', '2021-12-21 07:42:53', '2021-12-29 07:05:53'),
(5, 2, 'OPA GSS', 'http://opa.gss-login.com/', '2021-12-21 07:42:53', '2021-12-29 07:06:22'),
(6, 2, 'OPA PAMAPERSADA', 'https://opa.pamapersada.com/', '2021-12-21 07:43:14', '2021-12-29 07:06:42'),
(7, 3, 'DEMO GSS', 'http://demo.gss-login.com/', '2021-12-21 07:43:14', '2021-12-29 07:07:37'),
(8, 4, 'LB SSL 13', 'https://lb-ssl-13.goodeva.id/', '2021-12-21 07:43:14', '2021-12-29 07:07:47'),
(11, 6, 'Monitoring Library', 'https://monitoring.globaldeva.com', '2022-01-12 11:45:40', '2022-01-12 11:45:40');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) NOT NULL,
  `id_site` bigint(20) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `image_url2` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `id_site`, `pertanyaan`, `jawaban`, `image_url`, `image_url2`, `created_at`, `updated_at`) VALUES
(5, 42, '<p>fafaf</p>', 'gagaga', '1690531468_64c3768cf0838.jpg', '1690531468_64c3768cf0b4f.jpg', '2023-07-27 17:00:00', '2023-07-28 01:04:28'),
(6, 21, '<p>oke</p>', 'okracistdriver', '1690532139_RhPNPOywU9.jpg', '1690532139_5g3U3aeRJM.jpg', '2023-07-27 17:00:00', '2023-07-28 01:15:39'),
(7, 35, '<p>danjkdnakfafa</p>', '<p>fsaga njkfsbajkfsa</p>', '1690533917_3UA42SpTYk.jpg', '1690533917_cfp635iQOH.jpg', '2023-07-27 17:00:00', '2023-07-28 01:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `domain_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `visit` int(11) DEFAULT 0,
  `image_url` text DEFAULT NULL,
  `image_url2` text DEFAULT NULL,
  `image_url3` text DEFAULT NULL,
  `image_url4` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `title`, `description`, `project_id`, `domain_id`, `date`, `visit`, `image_url`, `image_url2`, `image_url3`, `image_url4`, `created_at`, `updated_at`) VALUES
(6, 'Analisa Grafik', '<p>Login -&gt; Masuk Ke Pemantauan Tidur -&gt; Cari nrp user yang ingin di analisa -&gt; setelah ketemu klik aksi -&gt; lalu klik riwayat tidur -&gt; Kemudian cari tanggal yang ingin di analisa -&gt; Analisa grafik tsb</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:29:08', '2021-12-29 13:16:28'),
(7, 'Analisa Grafik', '<p>Login -&gt; Masuk Ke Pemantauan Tidur -&gt; Cari nrp user yang ingin di analisa -&gt; setelah ketemu klik aksi -&gt; lalu klik riwayat tidur -&gt; Kemudian cari tanggal yang ingin di analisa -&gt; Analisa grafik tsb</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:29:09', '2021-12-29 13:26:04'),
(8, 'Import Operator', '<p>Login -&gt; Masuk ke data operator -&gt; Klik Import -&gt; Pilih Import Operator -&gt; Lalu pilih file yang sudah di edit -&gt; Lalu klik import -&gt; Setelah itu Cek data apakah ada yang gagal?, Jika berhasil semua klik import, Jika tidak back kembali dan revisi excel nrp yang gagal</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:30:07', '2021-12-29 13:25:08'),
(9, 'Import Operator', '<p>Login -&gt; Masuk ke data operator -&gt; Klik Import -&gt; Pilih Import Operator -&gt; Lalu pilih file yang sudah di edit -&gt; Lalu klik import -&gt; Setelah itu Cek data apakah ada yang gagal?, Jika berhasil semua klik import, Jika tidak back kembali dan revisi excel nrp yang gagal</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:30:34', '2021-12-28 13:30:34'),
(10, 'Ubah Operator', '<p class=\"MsoListParagraph\" style=\"margin-left: 54.0pt; mso-add-space: auto;\"><span lang=\"IN\" style=\"font-size: 12.0pt; line-height: 107%;\">Login -&gt; Masuk ke data operator -&gt; Cari Nrp user yang ingin di ubah -&gt; Klik Aksi -&gt; Lalu klik Ubah Operator -&gt; Lalu ubah field&rdquo; yang ingin diubah -&gt; Kemudian klik aksi -&gt; Klik Ubah Shift -&gt; Lalu ubah status license tidak aktif menjadi aktif -&gt; klik simpan</span></p>', NULL, NULL, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:30:54', '2021-12-28 13:30:54'),
(11, 'SOP Ubah Operator', '<p>Langkah-langkah untuk mengubah Operator</p>\r\n<p>1. Login -&gt;</p>\r\n<p>2. Masuk ke data operator -&gt;</p>\r\n<p>3. Cari Nrp user yang ingin di ubah -&gt;</p>\r\n<p>4. Klik Aksi -&gt;</p>\r\n<p>5. Lalu klik Ubah Operator -&gt;</p>\r\n<p>6. Lalu ubah field&rdquo; yang ingin diubah -&gt;</p>\r\n<p>7. lalu klik simpan</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:31:38', '2022-07-26 09:13:38'),
(12, 'Status License Tidak Aktif (Dibagian Setelah Login)', '<p>Login -&gt; Masuk Ke Data Operator -&gt; Cari Nrp ybs -&gt; Klik aksi -&gt; Klik Ubah Shift -&gt; Lalu ubah status license tidak aktif menjadi aktif -&gt; klik simpan</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:32:13', '2021-12-28 13:38:13'),
(13, 'Status License Tidak Aktif (Dibagian Setelah Login)', '<p>Login -&gt; Masuk Ke Data Operator -&gt; Cari Nrp ybs -&gt; Klik aksi -&gt; Klik Ubah Shift -&gt; Lalu ubah status license tidak aktif menjadi aktif -&gt; klik simpan</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:33:05', '2021-12-28 13:33:05'),
(14, 'Cek Data Departement', '<p>Login -&gt; Masuk Ke Data Departemen -&gt; Lalu di data departemen anda bisa Melakukan tambah, ubah dan cek id departement tsb</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:33:19', '2021-12-29 13:25:44'),
(15, 'Cek Data Departement', '<p class=\"MsoListParagraph\" style=\"margin-left: 53.5pt; mso-add-space: auto;\"><span lang=\"IN\" style=\"font-size: 12.0pt; line-height: 107%;\">Login -&gt; Masuk Ke Data Departemen -&gt; Lalu di data departemen anda bisa Melakukan tambah, ubah dan cek id departement tsb</span></p>', 1, NULL, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:33:36', '2021-12-28 13:33:36'),
(16, 'Cek Data Departement', '<p class=\"MsoListParagraph\" style=\"margin-left: 53.5pt; mso-add-space: auto;\"><span lang=\"IN\" style=\"font-size: 12.0pt; line-height: 107%;\">Login -&gt; Masuk Ke Data Departemen -&gt; Lalu di data departemen anda bisa Melakukan tambah, ubah dan cek id departement tsb</span></p>', 1, NULL, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:37:17', '2021-12-28 13:37:17'),
(17, 'Cek Data Departement', '<p>Login -&gt; Masuk Ke Data Departemen -&gt; Lalu di data departemen anda bisa Melakukan tambah, ubah dan cek id departement tsb</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:37:25', '2021-12-28 13:37:25'),
(18, 'Cek Data Shift', '<p>Login -&gt; Masuk Ke Data Shift -&gt; Lalu di data shift anda bisa Melakukan tambah, ubah dan cek cut off shift tsb</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:38:53', '2021-12-28 13:38:53'),
(19, 'Cek Data Shift', '<p>Login -&gt; Masuk Ke Data Shift -&gt; Lalu di data shift anda bisa Melakukan tambah, ubah dan cek cut off shift tsb</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:39:23', '2021-12-28 13:39:23'),
(20, 'Cek Data Shift Off', '<p>Login -&gt; Masuk Ke Data Shift OFF -&gt; Lalu di data shift anda bisa Melakukan tambah, ubah dan cek cut off shift OFF tsb</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:39:49', '2021-12-28 13:39:49'),
(21, 'Cek Data Shift Off', '<p>Login -&gt; Masuk Ke Data Shift OFF -&gt; Lalu di data shift anda bisa Melakukan tambah, ubah dan cek cut off shift OFF tsb</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:40:25', '2021-12-28 13:40:25'),
(22, 'Cek User GL', '<p>Login -&gt; Masuk Ke Data User GL -&gt; Lalu di data User GL anda bisa Melakukan tambah, ubah dan cek Data GL tsb sesuai dengan sitenya</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:40:43', '2021-12-28 13:40:43'),
(23, 'Cek User GL', '<p>Login -&gt; Masuk Ke Data User GL -&gt; Lalu di data User GL anda bisa Melakukan tambah, ubah dan cek Data GL tsb sesuai dengan sitenya</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:41:19', '2021-12-28 13:41:19'),
(24, 'Cek Data Site', '<p>Login -&gt; Masuk Ke Data Master Site -&gt; Lalu di data Master Site anda bisa Melakukan tambah, ubah dan Site</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:41:42', '2021-12-28 13:41:42'),
(25, 'Cek Data Site', '<p>Login -&gt; Masuk Ke Data Master Site -&gt; Lalu di data Master Site anda bisa Melakukan tambah, ubah dan Site</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:42:04', '2021-12-28 13:42:04'),
(26, 'Cek Riwayat Import Operator', '<p>Login -&gt; Masuk Ke Riwayat import pindah license -&gt; Lalu cek user pindah apakah sudah benar apa belum</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:42:30', '2021-12-28 13:42:30'),
(27, 'Cek Riwayat Import Operator', '<p>Login -&gt; Masuk Ke Riwayat import pindah license -&gt; Lalu cek user pindah apakah sudah benar apa belum</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:42:55', '2021-12-28 13:42:55'),
(28, 'Cek Riwayat Mac Address', '<p>Login -&gt; Masuk Ke Riwayat Mac Address -&gt; Lalu anda bisa cek riwayat mac address</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:43:29', '2021-12-28 13:43:29'),
(29, 'Cek Riwayat Mac Address', '<p>Login -&gt; Masuk Ke Riwayat Mac Address -&gt; Lalu anda bisa cek riwayat mac address</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:43:33', '2021-12-28 13:43:33'),
(30, 'Download Report Daily Fatigue/Sleep Log', '<p>Login -&gt; Masuk ke Report Data -&gt; Lalu pilih report -&gt; Kemudian pilih tanggal/bulan -&gt; Lalu Klik Cetak Report</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:44:29', '2021-12-28 13:44:29'),
(31, 'Download Report Daily Fatigue/Sleep Log', '<p>Login -&gt; Masuk ke Report Data -&gt; Lalu pilih report -&gt; Kemudian pilih tanggal/bulan -&gt; Lalu Klik Cetak Report</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:44:33', '2021-12-28 13:44:33'),
(32, 'Cek Riwayat Upload Data Tidur', '<p>Login -&gt; Masuk Ke Riwayat Upload Tidur -&gt; Lalu anda bisa cek jam riwayat upload tidur user</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:45:37', '2021-12-28 13:45:37'),
(33, 'Cek Data Instalasi', '<p>Login -&gt; Masuk Ke Data Instalasi -&gt; Di Data Instalasi Anda bisa cek active license dan juga print user existing di sistem</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:46:33', '2021-12-28 13:46:33'),
(34, 'Cek Data Belum Absen', '<p>Login -&gt; Masuk Ke menu belum absen -&gt; Di menu belum absen anda bisa lihat user yang belum absen pada hari sekarang</p>', 1, 2, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:47:32', '2021-12-28 13:47:32'),
(35, 'Cek Riwayat Upload Data Tidur', '<p>Login -&gt; Masuk Ke Riwayat Upload Tidur -&gt; Lalu anda bisa cek jam riwayat upload tidur user</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:53:25', '2021-12-28 13:53:25'),
(36, 'Cek Data Instalasi', '<p>Login -&gt; Masuk Ke Data Instalasi -&gt; Di Data Instalasi Anda bisa cek active license dan juga print user existing di sistem</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:54:30', '2021-12-28 13:54:30'),
(37, 'Cek Data Belum Absen', '<p>Login -&gt; Masuk Ke menu belum absen -&gt; Di menu belum absen anda bisa lihat user yang belum absen pada hari sekarang</p>\r\n<p>&nbsp;</p>', 1, 3, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 13:55:28', '2021-12-28 13:55:28'),
(38, 'Analisa Grafik', '<p>Login -&gt; Masuk Ke Pemantauan Tidur -&gt; Cari nrp user yang ingin di analisa -&gt; setelah ketemu klik aksi -&gt; lalu klik riwayat tidur -&gt; Kemudian cari tanggal yang ingin di analisa -&gt; Analisa grafik tsb</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:12:07', '2021-12-28 15:12:07'),
(39, 'Cek Riwayat Upload data tidur', '<p>Login -&gt; Masuk Ke Riwayat Upload Tidur -&gt; Lalu anda bisa cek jam riwayat upload tidur user</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:13:05', '2021-12-28 15:13:05'),
(40, 'Print Report Data', '<p>Login -&gt; Klik Report Data -&gt; lalu masuk Report Data -&gt; Lalu pilih report -&gt; Kemudian pilih tanggal/bulan -&gt; Lalu Klik Cetak Report</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:13:55', '2021-12-28 15:13:55'),
(41, 'Cek Kode Maintenance', '<p>Login -&gt; Masuk Ke Data Kode Maintenance -&gt; Cek kode maintenance sesuai dengan sitenya</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:14:25', '2021-12-28 15:14:25'),
(42, 'Cek Realtime Absen', '<p>Login -&gt; Masuk Ke Realtime Absen -&gt; Di menu realtime absen anda bisa melihat data sebulan user dan juga data belum dan sudah absen pada hari ini</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:14:44', '2021-12-28 15:14:44'),
(43, 'Cek Data Instalasi', '<p>Login -&gt; Klik Report Data -&gt; Lalu Masuk Ke Data Instalasi -&gt; Di Data Instalasi Anda bisa cek active license dan juga print user existing di sistem</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:15:40', '2021-12-28 15:15:40'),
(44, 'Cek Kode Cuti', '<p>Login -&gt; Masuk Ke Kode Cuti -&gt; Cek kode cuti sesuai sitenya</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:16:46', '2021-12-28 15:16:46'),
(45, 'Cek Riwayat pindah license (Manual Lewat Web opa.gss)', '<p>Login -&gt; Klik Report Data -&gt; Lalu Masuk ke riwayat pindah lisensi -&gt; Lalu anda bisa cek user pindah diproses dengan benar atau belum</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:16:48', '2021-12-28 15:16:48'),
(46, 'Cek Kode Maintenance', '<p>Login -&gt; Masuk Ke Kode Maintenance -&gt; Cek kode maintenance sesuai dengan sitenya</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:17:19', '2021-12-29 13:45:15'),
(47, 'Cek Kode Kemanan Reset', '<p>Login -&gt; Masuk Ke Kode Kemanan Reset -&gt; Cek kode Kemanan Reset sesuai sitenya</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:17:25', '2021-12-28 15:17:25'),
(48, 'Cek Data ID Gelang Dan Versi Install User', '<p>Login -&gt; Klik Report Data -&gt; Lalu Masuk Ke Data ID Gelang Dan Versi Install -&gt; Lalu di data ID Gelang Dan Versi Install anda bisa melihat versi aplikasi dan id gelang dari beberapa site</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:17:39', '2021-12-28 15:17:39'),
(49, 'Cek Kode Clear Data', '<p>Login -&gt; Masuk Ke Kode Clear Data -&gt; Cek kode Clear Data sesuai sitenya</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:18:12', '2021-12-28 15:18:12'),
(50, 'Cek Data License Aktif', '<p>Login -&gt; Lalu Masuk Ke Data License Aktif -&gt; Di Data License Aktif Anda bisa cek license yang aktif dan juga print user yang aktif existing di sistem</p>', 2, 6, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:18:36', '2021-12-28 15:18:36'),
(51, 'Cek Kode Cuti', '<p><span style=\"font-family: Calibri, sans-serif;\">Login -&gt; Masuk Ke Kode Cuti -&gt; Cek kode cuti sesuai sitenya</span></p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:18:39', '2021-12-29 13:45:24'),
(52, 'Cek Kode Absen Ulang', '<p>Login -&gt; Masuk Ke Kode Clear Data -&gt; Cek kode Clear Data sesuai sitenya</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:19:02', '2021-12-28 15:19:02'),
(53, 'Cek Kode Clear Data', '<p>Login -&gt; Masuk Ke Kode Clear Data -&gt; Cek kode Clear Data sesuai sitenya</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:19:17', '2021-12-29 13:45:33'),
(54, 'Import Operator', '<p>Login -&gt; Masuk ke data operator -&gt; Klik Import Operator -&gt; Pilih Import Operator -&gt; Lalu pilih file import operator yang sudah disesuaikan -&gt; Lalu klik import -&gt; Setelah itu Cek data apakah ada yang gagal?, Jika berhasil semua klik import, Jika tidak back kembali dan revisi excel nrp yang gagal</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:20:16', '2021-12-29 13:43:15'),
(55, 'Ubah Operator', '<p>Login -&gt; Masuk ke data operator -&gt; Cari Nrp user yang ingin di ubah -&gt; Klik Aksi -&gt; Lalu klik Ubah Operator -&gt; Lalu ubah field&rdquo; yang ingin diubah -&gt; lalu klik simpan</p>\r\n<p>&nbsp;</p>\r\n<p>https://monitoring.globaldeva.com/info</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:21:10', '2022-07-26 09:14:40'),
(56, 'Generate License', '<p>Login -&gt; Masuk Ke Master Lisensi -&gt; Klik Button Generate -&gt; Lalu ketik number yang ingin di generate dan pilih site yang sesuai -&gt; Lalu klik Simpan</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:22:00', '2021-12-28 15:22:00'),
(57, 'Cek Riwayat Pindah License (Via Import)', '<p>Login -&gt; Masuk ke data operator -&gt; Klik Import Operator -&gt; Klik riwayat pindah license -&gt; Lalu cek user pindah license apakah sudah benar apa belum</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:22:27', '2021-12-29 13:44:08'),
(58, 'Generate License', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Master Lisensi -&gt; Klik Button Generate -&gt; Lalu ketik number yang ingin di generate dan pilih site yang sesuai -&gt; Lalu klik Simpan</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:23:57', '2021-12-29 13:43:53'),
(59, 'Export License', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Master Lisensi -&gt; Klik Export License -&gt; Lalu pilih Site yang ingin di export -&gt; Kemudian Klik export</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:24:37', '2021-12-29 13:44:01'),
(60, 'Data Kuota License', '<p>Login -&gt; Masuk Ke Data Kuota License -&gt; Cek Kuota License sesuai sitenya</p>\r\n<p>&nbsp;</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:26:33', '2021-12-28 15:26:33'),
(61, 'Cek Riwayat Mac Address', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Riwayat Mac Address -&gt; Lalu anda bisa cek riwayat mac address</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:26:34', '2021-12-29 13:44:27'),
(62, 'Cek Data License', '<p>Login -&gt; Masuk Ke Data Lisensi -&gt; Cek Data Lisensi Apakah Sudah Melekat Sesuai dengan usernya atau belum<br /><br /></p>\r\n<p><strong>Note :</strong></p>\r\n<p>Untuk Point Data License biasanya hanya make sure data licensenya saja</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:28:48', '2021-12-28 15:35:57'),
(63, 'Cek Riwayat License', '<p>Login -&gt; Klik Master Data -&gt; Lalu masuk ke riwayat lisensi -&gt; Lalu di data riwayat license anda bisa lihat data license diaktifkan, dinonaktifkan, ditambahkan, digunakan, dihapus</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:32:57', '2021-12-29 13:44:20'),
(64, 'Cek Data Departement', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Data Departemen -&gt; Lalu di data departemen anda bisa Melakukan tambah, ubah dan cek id departement tsb</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:36:56', '2021-12-29 13:46:09'),
(65, 'Cek Data Shift', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Data Shift -&gt; Lalu di data shift anda bisa Melakukan tambah, ubah dan cek cut off shift tsb</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:37:27', '2021-12-29 13:45:44'),
(66, 'Status License Tidak Aktif (Sebelum Login)', '<p>Login -&gt; Masuk Ke Data Operator -&gt; Cari Nrp ybs -&gt; Cek License ybs ada apa tidak -&gt; jika ada hanya statusnya yang ingin dirubah -&gt; klik aksi -&gt; Klik Ubah Shift &amp; Status Lisensi Operator -&gt; Lalu ubah status license tidak aktif menjadi aktif -&gt; klik simpan</p>', 1, 1, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:37:46', '2021-12-28 15:37:46'),
(67, 'Cek Data Shift Off', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Data Shift OFF -&gt; Lalu di data shift anda bisa Melakukan tambah, ubah dan cek cut off shift OFF tsb</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:38:07', '2021-12-29 13:45:39'),
(68, 'Cek Master Site', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Data Master Site -&gt; Lalu di data Master Site anda bisa Melakukan tambah, ubah dan Site</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:38:47', '2021-12-29 13:45:03'),
(69, 'Cek Master App Version', '<p>Login -&gt; Klik Master Data -&gt; Lalu Masuk Ke Data Master App Version -&gt; Lalu di master app version anda bisa melihat versi aplikasi dari beberapa site</p>', 2, 5, '2021-12-28', 0, NULL, NULL, NULL, NULL, '2021-12-28 15:39:42', '2021-12-29 13:45:09'),
(70, 'Cek Data Gelang Di LB', '<p>Login -&gt; Masuk Ke Singkron Master Gelang -&gt; Kemudian cari id gelang yang ingin di cek</p>', 4, 8, '2021-12-29', 0, NULL, NULL, NULL, NULL, '2021-12-29 16:36:07', '2021-12-29 16:36:07'),
(71, 'Assign User LB', '<p>Login -&gt; Klik Master Data GSS Connect -&gt; Lalu Masuk Ke Master GL Operator -&gt; Kemudian Pilih GL -&gt; Lalu cari user yang ingin di assign dengan cara ctrl + f -&gt; setelah itu klik pada user -&gt; kemudian klik simpan</p>', 4, 8, '2021-12-29', 0, NULL, NULL, NULL, NULL, '2021-12-29 16:36:37', '2021-12-29 16:36:37'),
(72, 'Panduan Susah Konek Gelang', '<p>Untuk dapat konek ke gelang:</p>\r\n<p>1. Pastikan bluetooth aktif<br />2. Pastikan tidak terpairing dengan device lain</p>\r\n<p>...</p>', 6, NULL, '2022-01-12', 0, NULL, NULL, NULL, NULL, '2022-01-12 11:44:49', '2022-01-12 11:44:49'),
(73, 'Panduan Susah Konek Gelang', '<p>1. ..</p>\r\n<p>2. ...</p>', 6, 11, '2022-01-12', 0, NULL, NULL, NULL, NULL, '2022-01-12 11:46:53', '2022-01-12 11:46:53'),
(74, 'Apps OPA 1.5.8', '<p>https://drive.google.com/file/d/1YtgboLHrLRIdsZ4MX1W7f3EfXbJrLiBh/view?usp=drivesdk</p>\r\n<p>&nbsp;</p>\r\n<p>OPA V1.5.8 MiBand 5</p>', 2, 4, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 08:36:47', '2023-07-07 08:36:47'),
(75, 'OPA V1.7.1 MiBand 7', '<p>https://drive.google.com/file/d/1ShEG6isE5BM-cv_saFa1KhNToQIYSNrw/view?usp=drivesdk</p>\r\n<p>&nbsp;</p>\r\n<p>OPA V1.7.1 MiBand 7</p>\r\n<p>Build 20012023.2220</p>\r\n<p>Deliver Version</p>', 2, 4, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 09:07:16', '2023-07-07 09:07:16'),
(76, 'OPA PAMA V1.7.2 MiBand7', '<p>https://1drv.ms/u/s!AgMTQXkYOy2X9RGslurabklEU6gJ?e=99eLZb</p>\r\n<p>&nbsp;</p>\r\n<p>OPA PAMA V1.7.2 MiBand7</p>\r\n<p>Build 17032023.1015</p>\r\n<p>Deliver</p>', 2, 4, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 09:07:57', '2023-07-07 09:07:57'),
(77, 'OPA V1.6.8 Mi Band 6', '<p>https://drive.google.com/file/d/1bv1G10_KRduSX46uAVclKvn6Nf3vJ72a/view?usp=share_link</p>\r\n<p>&nbsp;</p>\r\n<p>OPA V1.6.8 Mi Band 6</p>', 2, 4, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 09:08:34', '2023-07-07 09:08:34'),
(78, 'Smart Safety V3.8.5', '<p>https://1drv.ms/u/s!AgMTQXkYOy2XgYVkE87Txf1csiAqcA?e=U5zy4w</p>\r\n<p>Bisa untuk ABB, SMM dan UDU</p>\r\n<p>Smart Safety V3.8.5</p>\r\n<p>Build 07062023.2031</p>\r\n<p>Deliver</p>', 2, 4, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 09:10:12', '2023-07-07 09:10:12'),
(79, 'KPP DFIT ASTO 3.8.5', '<p>https://1drv.ms/u/s!AgMTQXkYOy2XgYFSRscuf47UJgkqRw?e=cJPasT</p>\r\n<p>&nbsp;</p>\r\n<p>KPP DFIT ASTO 3.8.5</p>\r\n<p>Build 15052023.1519</p>\r\n<p>Deliver</p>\r\n<p>&nbsp;</p>\r\n<p>Update :</p>\r\n<p>1. Improvement, Penyesuaian data pengurangan app usage di periode tidur pada versi device Miband 6,7</p>\r\n<p>2. Improvement, Stabilisasi fitur upload dan riwayat upload aplikasi Dfit</p>\r\n<p>3. Improvement, Stabilisasi proses fetching data tidur dari gelang ke aplikasi dfit</p>', 1, 2, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 09:11:45', '2023-07-07 09:11:45'),
(80, 'KPP DFIT V3.8.6-HN', '<p>https://1drv.ms/u/s!AgMTQXkYOy2XgYcTrO95j421JF0CtQ?e=22Eewh</p>\r\n<p>&nbsp;</p>\r\n<p>DFIT INDE HN</p>\r\n<p>&nbsp;</p>\r\n<p>KPP DFIT V3.8.6-HN</p>\r\n<p>Build 16062023.1705</p>\r\n<p>Deliver</p>\r\n<p>&nbsp;</p>\r\n<p>Update :</p>\r\n<p>1. Improvement, Stabilisasi algoritma koreksi otomatis pada device Miband 5,6,7</p>\r\n<p>2. Improvement, Stabilisasi fitur flow upload aplikasi Dfit</p>\r\n<p>3. Improvement, Stabilisasi proses fetching data tidur dari gelang ke aplikasi dfit</p>\r\n<p>4. Improvement, Pointing hostname https://dfitinde.kppmining.com</p>\r\n<p>5. Improvement, Stabilisasi proses upload offline</p>\r\n<p>6. Improvement, Tampilan login awal aplikasi</p>\r\n<p>7. Improvement, Penyesuaian tampilan pada dashboard aplikasi sesuai dengan shift</p>', 1, 3, '2023-07-07', 0, NULL, NULL, NULL, NULL, '2023-07-07 09:15:18', '2023-07-07 09:15:18'),
(81, 'Deep Sleep Panjang', '<p>Semangat Pagi!</p>', 2, 6, '2023-07-10', 0, NULL, NULL, NULL, NULL, '2023-07-10 12:52:42', '2023-07-10 12:52:42'),
(192, 'fafafa', '<p>afafafa</p>', 6, 11, '2023-07-20', 0, 'image_info-wdFnc4iZ34-20230720090717.jpg', NULL, NULL, NULL, '2023-07-20 02:50:17', '2023-07-25 20:30:14'),
(200, 'checcc', '<p>vaadafa</p>', 6, 11, '2023-07-24', 0, 'image_info-CDG8kZcutt-20230724070748.png', 'image_info-hy5tDiokVL-20230724070748.jpg', NULL, NULL, '2023-07-24 00:36:48', '2023-07-25 20:30:29'),
(201, 'fdsfdsf', '<p>fdfssfds</p>', 6, 11, '2023-07-25', 0, 'image_info-HFIKudXVhM-20230725020726.jpg', 'image_info-jjQUrCxhOw-20230725020726.jpg', 'image_info-Dn3Dpmi9ai-20230725020726.jpg', 'image_info-TPHHGPEyss-20230725020726.jpg', '2023-07-24 19:28:26', '2023-07-24 19:28:26'),
(205, 'favaaf', '<p>vafava</p>', 6, 11, '2023-07-25', 0, '1690365766_64c0ef4660749.jpg', '1690365766_64c0ef4660c15.jpg', NULL, NULL, '2023-07-24 23:33:24', '2023-07-26 03:02:46'),
(207, 'daava', '<p>afvavafa</p>', 6, 11, '2023-07-25', 0, NULL, NULL, NULL, NULL, '2023-07-24 23:56:21', '2023-07-26 01:26:22'),
(208, 'dada', '<p>afafafa</p>', 6, 11, '2023-07-25', 0, NULL, NULL, NULL, NULL, '2023-07-25 03:04:53', '2023-07-25 03:20:52'),
(211, 'saA', '<p>das</p>', 6, 11, '2023-07-27', 0, '1690441734_64c21806dedba.jpg', '1690441734_64c21806df30d.jpg', '1690441734_64c21806df6d8.jpg', '1690441734_64c21806df9ec.jpg', '2023-07-27 00:08:54', '2023-07-27 00:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'KPP GSS', 'kpp.png', '2021-12-21 07:35:18', '2021-12-21 07:35:18'),
(2, 'PAMA GSS', 'pama.png', '2021-12-21 07:35:18', '2021-12-21 07:35:18'),
(3, 'DEMO GSS', 'demo-gss.png', '2021-12-21 07:36:27', '2021-12-21 07:36:27'),
(4, 'LB SSL', 'demo-gss.png', '2021-12-21 07:36:27', '2021-12-21 07:36:27'),
(6, 'Library', '11-05-2022-7181-demo-gss.png', '2022-01-12 11:42:00', '2022-05-11 08:27:58'),
(7, 'GOODEVA GSS', '12-07-2022-5021-11-05-2022-7181-demo-gss.png', '2022-07-12 09:49:06', '2022-07-12 09:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `projects` text NOT NULL,
  `status` int(1) DEFAULT 0 COMMENT '0=tidak aktif 1=aktif',
  `jam_induksi` int(11) DEFAULT NULL,
  `menit_induksi` int(11) DEFAULT NULL,
  `parent_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `projects`, `status`, `jam_induksi`, `menit_induksi`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'ABKL', 'OPA', 1, 7, 0, '6', '2020-04-15 02:43:28', '2020-05-04 15:39:44'),
(5, 'goodeva', '', 1, NULL, NULL, NULL, '2020-04-27 08:57:18', '2020-04-27 08:57:38'),
(20, 'KPCS', 'OPA', 1, 8, 0, NULL, '2021-04-01 09:05:15', '2021-04-01 09:05:15'),
(21, 'ASMI', 'OPA', 1, 8, 0, NULL, '2021-04-01 09:10:20', '2021-04-01 09:10:20'),
(22, 'SMMS', 'OPA', 1, 8, 0, NULL, '2021-04-01 09:10:41', '2021-04-01 09:10:41'),
(35, 'MTBU', 'OPA', 1, 8, 0, '', '2021-09-30 14:55:18', '2021-10-13 14:44:52'),
(36, 'KIDE', 'OPA', 1, 8, NULL, '', '2021-09-30 14:56:34', '2021-11-08 17:11:28'),
(39, 'BAYA', 'OPA', 1, NULL, NULL, NULL, '2022-05-25 05:02:15', '2022-05-25 05:02:15'),
(40, 'INDE', 'DFIT', 1, NULL, NULL, NULL, '2022-05-25 08:16:38', '2022-05-25 08:16:38'),
(41, 'ABB', 'GSS', 0, NULL, NULL, NULL, '2022-05-25 08:17:42', '2022-05-25 08:17:42'),
(42, 'ASTO', 'DFIT', 1, NULL, NULL, NULL, '2022-05-25 08:19:55', '2022-05-25 08:19:55'),
(43, 'SMM', 'GSS', 1, NULL, NULL, NULL, '2022-05-25 08:20:38', '2022-05-25 08:20:38');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
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
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
