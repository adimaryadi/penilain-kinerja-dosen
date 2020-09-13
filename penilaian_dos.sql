-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 12:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian_dos`
--

-- --------------------------------------------------------

--
-- Table structure for table `apa_itu_ppdb`
--

CREATE TABLE `apa_itu_ppdb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten_header` text COLLATE utf8mb4_unicode_ci,
  `pendaftaran` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verifikasi_uji` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penggumuman` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_ulang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel_blog`
--

CREATE TABLE `artikel_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_artikel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_users` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users_post` int(30) DEFAULT NULL,
  `foto_artikel` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_artikel` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontent_artikel` text COLLATE utf8mb4_unicode_ci,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `jumlah_pembaca` int(200) DEFAULT NULL,
  `link_url` text COLLATE utf8mb4_unicode_ci,
  `izin_post` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel_blog`
--

INSERT INTO `artikel_blog` (`id`, `judul_artikel`, `post_users`, `id_users_post`, `foto_artikel`, `kategori_artikel`, `kontent_artikel`, `komentar`, `jumlah_pembaca`, `link_url`, `izin_post`, `created_at`, `updated_at`) VALUES
(15, 'djisadjia djwia jdiwa jdiaw', 'dadan satria', 30, 'public/foto_artikel/1570009970example desain.png', 'Matematika', '<p>asdjwia jdiwad jawidjiawjd wia jdawijdiawjdwajdwajdid</p>', NULL, NULL, 'djisadjia-djwia-jdiwa-jdiaw-2019-10-02 09:53:26am', 'active', '2019-10-02 02:52:50', '2019-10-02 02:53:26'),
(16, 'asdsajdijwiajdiajljdliwja', 'administrator', 1, 'public/foto_artikel/1570010057dadan.png', 'Matematika', '<p>isa djias djiasd iasjdisa</p>', NULL, NULL, 'asdsajdijwiajdiajljdliwja-2019-10-02 09:54:17am', 'active', '2019-10-02 02:54:17', '2019-10-02 02:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_berita` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pembaca` bigint(20) DEFAULT NULL,
  `gambar_berita` text COLLATE utf8mb4_unicode_ci,
  `link_berita` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `izin_post` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_berita` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_users` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_post_users` bigint(20) NOT NULL,
  `link_youtube` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `jumlah_pembaca`, `gambar_berita`, `link_berita`, `konten`, `izin_post`, `kategori_berita`, `post_users`, `id_post_users`, `link_youtube`, `created_at`, `updated_at`) VALUES
(2, 'Kegiatan Kurban 2018', 22, 'public/berita/1568878604gb112.jpg', 'Kegiatan-Kurban-20181568878604', '<p>Pendidikan berkurban di berbagai lembaga pendidikan saat ini sudah semakin banyak dilakukan. Selain sebagai sarana pendidikan bagi para siswa, kegiatan ini juga dapat memupuk rasa persaudaraan untuk saling berbagi.&nbsp;Kegiatan Kurban yang diadakan di SMKN 8 Bandung merupakan sebuah pembelajaran bagi siswa yg ada di sekolah, kegiatan ini dilaksanakan pada hari kamis tanggal 23 Agustus 2018.</p>', 'active', 'motor bekas', 'administrator', 1, '', '2019-09-19 00:36:44', '2019-09-19 00:36:44'),
(4, 'Kegiatan \"Maca Buku Bareng\" SMK NEGERI 8 BANDUNG', 69, 'public/berita/1568948089a.jpg', 'Kegiatan-\"Maca-Buku-Bareng\"-SMK-NEGERI-8-BANDUNG1569217585', '<p>Meningkatkan kualitas karakter, kompetensi dan kesejahteraan hidup seseorang, adalah dengan menanamkan budaya literasi (membaca-berpikir-menulis-berkreasi). Kegiatan &quot;Maca Buku Bareng&quot; SMK NEGERI 8 BANDUNG. Salam literasi!</p>', 'active', 'mobil bekas', 'administrator', 1, 'https://www.youtube.com/embed/OwBMG_F-5EE', '2019-09-19 19:54:49', '2019-09-22 22:46:25'),
(5, 'Kegiatan rekruitmen dari PT Hino Motor Manufacturing Indonesia', 47, 'public/berita/1569221357kegiatas rekrutment.jpg', 'Kegiatan-rekruitmen-dari-PT-Hino-Motor-Manufacturing-Indonesia1569221417', '<p>Kegiatan rekruitmen dari PT Hino Motor Manufacturing Indonesia pada hari Senin,&nbsp; 23 September 2019 yang diikuti oleh 525 peserta alumni SMK dari berbagai daerah di Jawa Barat,</p>', 'active', 'mobil bekas', 'administrator', 1, NULL, '2019-09-22 23:49:17', '2019-09-22 23:50:17'),
(6, 'Turut Berbelasungkawa', 26, 'public/berita/1569221803turut berduka.jpg', 'Turut-Berbelasungkawa1569221803', '<p>Innalillahi Wa Inna illaihirojiun<br />\r\nKami segenap keluarga besar SMK Negeri 8 Bandung, mengucapkan turut berbelasungkawa atas meninggalnya salah satu siswa SMK Negeri 8 Bandung.</p>', 'active', 'mobil bekas', 'administrator', 1, NULL, '2019-09-22 23:56:43', '2019-09-22 23:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `box_tentang_kami`
--

CREATE TABLE `box_tentang_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_box` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_box` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebagai` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `universitas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `box_tentang_kami`
--

INSERT INTO `box_tentang_kami` (`id`, `foto_box`, `nama_box`, `sebagai`, `universitas`, `rating`, `created_at`, `updated_at`) VALUES
(2, 'public/tentang_kami_box/1565777204ruanglesonline_teacher4.png', 'Rully', 'Tutor Bahasa inggris', 'Universitas Indonesia', 4, '2019-08-14 03:06:44', '2019-08-14 03:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `config_background_gallery`
--

CREATE TABLE `config_background_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config_background_gallery`
--

INSERT INTO `config_background_gallery` (`id`, `background_gallery`, `created_at`, `updated_at`) VALUES
(2, 'public/config_gallery_background/1569810255gb112.jpg', '2019-09-29 19:24:15', '2019-09-29 19:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `data_prestasi`
--

CREATE TABLE `data_prestasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_down_menu`
--

CREATE TABLE `footer_down_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_menu` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontent_menu` text COLLATE utf8mb4_unicode_ci,
  `link_url` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_down_menu`
--

INSERT INTO `footer_down_menu` (`id`, `judul_menu`, `kontent_menu`, `link_url`, `created_at`, `updated_at`) VALUES
(3, 'TENTANG RUANGURU', '<ul _ngcontent-fub-c5=\"\"><li _ngcontent-fub-c5=\"\">Tentang Kami</li><li _ngcontent-fub-c5=\"\">Karir</li><li _ngcontent-fub-c5=\"\">Bantuan</li><li _ngcontent-fub-c5=\"\">Kontak Kami</li></ul>', NULL, '2019-08-28 20:01:07', '2019-08-28 20:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `footer_up`
--

CREATE TABLE `footer_up` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_footer_atas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_footer_atas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_up`
--

INSERT INTO `footer_up` (`id`, `nama_footer_atas`, `gambar_footer_atas`, `created_at`, `updated_at`) VALUES
(2, 'Download GRATIS Aplikasi Ruangguru sekarang juga!', 'public/gambar_footer_atas/1566982967abstrak.jpg', '2019-08-28 02:02:47', '2019-08-28 02:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `foto_gallery`
--

CREATE TABLE `foto_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_gallery` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_gallery`
--

INSERT INTO `foto_gallery` (`id`, `kategori_gallery`, `foto_gallery`, `created_at`, `updated_at`) VALUES
(17, 'Seminar Workshop Latihan', 'public/gallery_foto/15695745051_V7TMAzvhW7_cn9FbkKqOcQ.png', NULL, '2019-09-29 21:44:12'),
(18, 'Seminar Workshop Latihan', 'public/gallery_foto/1569821281data kesiswaan_1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_gallery` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_gallery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_depan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting` date DEFAULT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul_gallery`, `kategori_gallery`, `foto_depan`, `link_gallery`, `sorting`, `konten`, `created_at`, `updated_at`) VALUES
(2, 'Seminar Workshop Latihan SBPTN', 'Seminar Workshop Latihan', 'public/gallery_post/1569551869a.jpg', 'Seminar-Workshop-Latihan-SBPTN1569551869', '2019-09-28', '<p>adj iasjdisa isajdi sasajdisaasd asduwhaushd uwak shdukw hauk hduwak husd hwauk hduwak hdwua</p>', '2019-09-26 19:37:49', '2019-09-26 19:37:49'),
(4, 'test galleri', 'Otomotif', 'public/gallery_post/1569821025turut-berduka.jpg', 'test-galleri1569821025', '2019-09-20', '<p>asdh uashdusa dhuwh aus dhwua hsduwai hsud whauid hwu</p>', '2019-09-29 22:17:31', '2019-09-29 22:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `guru_milenial`
--

CREATE TABLE `guru_milenial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_btn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_milenial`
--

INSERT INTO `guru_milenial` (`id`, `konten`, `gambar`, `link_btn`, `created_at`, `updated_at`) VALUES
(2, '<p>MENJADI GURU ERA PENDIDIKAN 4.0<br />\r\nKita mulai dengan mengatakan bahwa Era Pendidikan 4.0 saat ini merupakan tantangan yang tidak hanya berfokus pada apa yang diajarkan tetapi cara pengajarannya. e-Learning telah memfasilitasi pembelajaran dengan lebih banyak cara daripada yang pernah kita bayangkan</p>', 'public/guru_milenial/1568694994banner2.png', 'tentang-kami', '2019-09-16 21:36:34', '2019-09-16 22:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `homecontentpage`
--

CREATE TABLE `homecontentpage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontent` text COLLATE utf8mb4_unicode_ci,
  `gambar_kontent` text COLLATE utf8mb4_unicode_ci,
  `posisi` enum('kiri','kanan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` enum('biru','kuning','merah','putih') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homecontentpage`
--

INSERT INTO `homecontentpage` (`id`, `judul`, `kontent`, `gambar_kontent`, `posisi`, `background`, `created_at`, `updated_at`) VALUES
(4, 'ruangbelajar', '<p>#BelajarJadiMudah dengan misi-misi seru berisi video, kuis, dan rangkuman! Ribuan video belajar, latihan soal, dan rangkuman untuk setiap mata pelajaran utama dari jenjang SD, SMP, dan SMA siap buat kamu dapat nilai bagus di ulangan harian, UTS, UAS, UN, bahkan SBMPTN.</p>', 'public/gambar_konten_home_bawah/1567067635ruanglesonline_assets-phone-2.png', 'kanan', 'merah', '2019-08-29 01:33:55', '2019-08-29 01:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `homecontentsproducttwo`
--

CREATE TABLE `homecontentsproducttwo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_kedua` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontents` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `gambar_kontent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` enum('left','right') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homecontentsproducttwo`
--

INSERT INTO `homecontentsproducttwo` (`id`, `judul`, `judul_kedua`, `kontents`, `link`, `gambar_kontent`, `posisi`, `created_at`, `updated_at`) VALUES
(3, 'ruangbelajar for Desktop', 'Akses ruangbelajar jadi lebih nyaman', '<p>Fitur yang ditunggu-tunggu kini sudah hadir! Gunakan ruangbelajar di PC atau laptop kamu. Belajar kini lebih nyaman dengan layar yang lebih besar.</p>', 'www.google.com', 'public/homekonten/1565163608home_ruangbelajardesktop-section-mobile.png', 'right', '2019-08-07 00:40:08', '2019-08-08 00:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `homeruanginformasi`
--

CREATE TABLE `homeruanginformasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_btn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homeruanginformasi`
--

INSERT INTO `homeruanginformasi` (`id`, `konten`, `gambar`, `link_btn`, `created_at`, `updated_at`) VALUES
(2, '<p><em>Pendidikan adalah senjata untuk mengubah dunia.</em><br />\r\n<br />\r\nSegala Infomasi berupa tulisan baik dari siswa/siswi maupun guru kami rangkai dalam sebuah blog yang semoga bisa bermanfaat. Cheers!</p>', 'public/ruang_informasi/1568703193informasi.png', 'tentang-kami', '2019-09-16 23:53:13', '2019-09-16 23:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `homestatistik`
--

CREATE TABLE `homestatistik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengajar_terbaik` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homestatistik`
--

INSERT INTO `homestatistik` (`id`, `pengajar_terbaik`, `prestasi_sekolah`, `created_at`, `updated_at`) VALUES
(3, '40', '23', '2019-09-17 20:45:57', '2019-09-17 20:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `home_logo_our_clients`
--

CREATE TABLE `home_logo_our_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_logo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_our_client` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_logo_our_clients`
--

INSERT INTO `home_logo_our_clients` (`id`, `nama_logo`, `logo_our_client`, `created_at`, `updated_at`) VALUES
(1, 'Honda', 'public/logo_our_client/15687799221568028802honda-mobil.png', '2019-09-17 21:12:02', '2019-09-17 21:12:02'),
(2, 'Daihatsu', 'public/logo_our_client/15687799711568028589Logo-Daihatsu.png', '2019-09-17 21:12:51', '2019-09-17 21:12:51'),
(3, 'ahass', 'public/logo_our_client/15687799991568028994ahass.png', '2019-09-17 21:13:19', '2019-09-17 21:13:19'),
(4, 'Daya adicipta', 'public/logo_our_client/15687800131568029057logodaya_medium.png', '2019-09-17 21:13:33', '2019-09-17 21:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `home_selamat_datang`
--

CREATE TABLE `home_selamat_datang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_selamat_datang`
--

INSERT INTO `home_selamat_datang` (`id`, `judul`, `konten`, `gambar`, `created_at`, `updated_at`) VALUES
(3, '<h3 style=\"color: #fff;\">Selamat</h3><h3 style=\"color: #b3003b;\"> Datang</h3>', '<p><em>&quot;Ing ngarsa sung tuladha. Ing madya mangun karso. Tut wuri Handayani.&quot;</em>&nbsp;(KI HAJAR DEWANTARA)<br />\r\n<br />\r\nSebagai media informasi dan komunikasi website SMK Negeri 8 Bandung dibangun dan dikembangkan dalam rangka meningkatkan layanan sekolah kepada peserta didik, orang tua, masyarakat dan stakeholder. Kualitas layanan menjadi salah satu misi sekolah dan kaitannya dengan transparansi dan akuntabilitas sekolah.</p>', 'public/SelamatDatang/1568620380banner3.png', '2019-09-16 00:53:00', '2019-09-16 00:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_ppdb`
--

CREATE TABLE `informasi_ppdb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `gambar_ppdb_informasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan_tentang_kami`
--

CREATE TABLE `jurusan_tentang_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_jurusan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten_jurusan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan_tentang_kami`
--

INSERT INTO `jurusan_tentang_kami` (`id`, `judul_jurusan`, `gambar_jurusan`, `konten_jurusan`, `created_at`, `updated_at`) VALUES
(3, 'TEKNIK KENDARAAN RINGAN (TKR)', 'public/gambar_jurusan/1569904140TKR.jpg', '<p>Tujuan :</p>\r\n\r\n<p>Membekali peserta didik dengan keterampilan, pengetahuan dan &nbsp;sikap agar kompeten dalam : &nbsp;<br />\r\n<br />\r\na. Perawatan dan perbaikan engine otomotif. &nbsp;<br />\r\nb.&nbsp;Perawatan dan perbaikan sistem pemindah tenaga.&nbsp;<br />\r\nc.&nbsp;Perawatan dan perbaikan chasis otomotif.&nbsp;<br />\r\nd.&nbsp;Perawatan dan perbaikan sistem kelistrikan otomotif.&nbsp;<br />\r\ne. Kemampuan untuk mengemudikan mobil. &nbsp;</p>\r\n\r\n<p>Paket keahlian TKR mempunyai 2 kelas unggulan&nbsp; yang &nbsp;langsung dididik oleh&nbsp; DU/DI (Dunia Usaha/Dunia Industri) &nbsp;yaitu kelas Astra Daihatsu dan Honda.</p>', '2019-09-30 21:29:00', '2019-09-30 21:29:00'),
(4, 'TEKNIK SEPEDA MOTOR (TSM)', 'public/gambar_jurusan/1569904181TSM.jpg', '<p>Tujuan :</p>\r\n\r\n<p>Membekali peserta didik dengan keterampilan, pengetahuan dan &nbsp;sikap agar kompeten dalam : &nbsp;<br />\r\n<br />\r\na.&nbsp;Perawatan dan perbaikan engine sepeda motor.<br />\r\nb.&nbsp;Perawatan dan perbaikan sistem kelistrikan sepeda motor.&nbsp;<br />\r\nc.&nbsp;Perawatan dan perbaikan chasis sepeda motor.<br />\r\nd.&nbsp;Perawatan dan perbaikan servis berkala. &nbsp;<br />\r\n<br />\r\nPaket Keahlian TSM berkerjasama dengan AHASS dan &nbsp;PT. Daya Adicipta &nbsp; &nbsp; &nbsp; Mustika.</p>', '2019-09-30 21:29:41', '2019-09-30 21:29:41'),
(5, 'TEKNIK PERBAIKAN BODI OTOMOTIF (TPBO)', 'public/gambar_jurusan/1569904229TPBO.jpg', '<p>Tujuan :</p>\r\n\r\n<p>Membekali peserta didik dengan keterampilan, pengetahuan dan sikap agar kompeten dalam :<br />\r\n&nbsp;<br />\r\na. Perawatan dan perbaikan bodi otomotif.<br />\r\nb. Menciptakan teknisi profesional di bidang las, ketok bodi otomotif.&nbsp;<br />\r\nc. Menciptakan teknisi profesional di bidang pengecatan bodi otomotif. &nbsp;<br />\r\nd. Perawatan dan perbaikan kelistrikan bodi otomotif.</p>', '2019-09-30 21:30:29', '2019-09-30 21:30:29'),
(6, 'TEKNIK PENDINGIN DAN TATA UDARA (TPTU)', 'public/gambar_jurusan/1569904260TPTU.jpg', '<p>Tujuan :</p>\r\n\r\n<p>Membekali peserta didik dengan keterampilan, keterampilan dan sikap agar kompeten dalam :<br />\r\n<br />\r\na. Mengerjakan pemasangan sistem instalasi refrigerasi dan tata udara<br />\r\nb.&nbsp;Mendiagnosa kerusakan sistem instalasi refrigerasi dan tata udara<br />\r\nc. Memperbaiki dan merawat peralatan sistem refrigerasi dan tata udara<br />\r\nd. Melakukan pemasangan/instalasi dan tata udara</p>', '2019-09-30 21:31:00', '2019-09-30 21:31:00'),
(7, 'TEKNIK ELEKTRONIKA INDUSTRI (TEI)', 'public/gambar_jurusan/1569904296TEI.jpg', '<p>Tujuan :</p>\r\n\r\n<p>Membekali peserta didik dengan keterampilan, pengetahuan, dan sikap agar kompeten :<br />\r\n<br />\r\na. Menerapkan Dasar-dasar Teknik Digital<br />\r\nb. Menerapkan konsep Elektronika Digital dan Rangkaian Elektronika<br />\r\n&nbsp; &nbsp; Komputer<br />\r\nc. Merakit Perangkat Keras Komputer<br />\r\nd. Mengerjakan Dasar-dasar Pekerjaan Bengkel Elektronika<br />\r\ne. Memprogram peralatan listrik pengendali elektronika yang berkaitan<br />\r\n&nbsp; &nbsp; dengan I/O berbantuan PLC dan Komputer.<br />\r\nf. &nbsp;Merakit peralatan dan perangkat elektronika Sistem Pengendali Elektronik.</p>', '2019-09-30 21:31:36', '2019-09-30 21:31:36');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_artikel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `kategori_artikel`, `created_at`, `updated_at`) VALUES
(1, 'pengetahuan alam', '2019-08-15 02:54:39', '2019-08-15 21:40:06'),
(3, 'Matematika', '2019-08-16 01:39:45', '2019-08-16 01:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_berita` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `kategori_berita`, `created_at`, `updated_at`) VALUES
(2, 'mobil bekas', '2019-09-18 21:41:19', '2019-09-18 21:41:19'),
(3, 'motor bekas', '2019-09-19 00:18:55', '2019-09-19 00:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_gallery`
--

CREATE TABLE `kategori_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_gallery` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_gallery`
--

INSERT INTO `kategori_gallery` (`id`, `kategori_gallery`, `created_at`, `updated_at`) VALUES
(1, 'Seminar Workshop Latihan', '2019-09-26 02:04:44', '2019-09-26 02:04:44'),
(2, 'Otomotif', '2019-09-26 03:11:49', '2019-09-26 03:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_siswa`
--

CREATE TABLE `kategori_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_kategori` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_siswa`
--

INSERT INTO `kategori_siswa` (`id`, `judul_kategori`, `logo_kategori`, `created_at`, `updated_at`) VALUES
(4, 'SD', 'public/kategori_siswa_produk/1565253732sd.webp', '2019-08-08 01:42:12', '2019-08-08 01:42:12'),
(5, 'SMP', 'public/kategori_siswa_produk/1565338623smp.webp', '2019-08-09 01:17:03', '2019-08-09 01:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_group`
--

CREATE TABLE `kelas_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_group`
--

INSERT INTO `kelas_group` (`id`, `kelas`, `created_at`, `updated_at`) VALUES
(2, '10a', '2019-08-19 22:29:41', '2019-08-19 22:29:41'),
(3, '11a', '2019-08-19 22:41:17', '2019-08-19 22:41:17'),
(4, '12a', '2019-08-19 22:41:25', '2019-08-19 22:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nama_komentar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_foto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_artikel`
--

INSERT INTO `komentar_artikel` (`id`, `id_artikel`, `id_users`, `nama_komentar`, `path_foto`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 7, 21, 'adimaryadi', 'public/profil_imgs/default.png', 'sandi', '2019-09-16 20:50:34', '2019-09-16 20:50:34'),
(2, 13, 21, 'adimaryadi', 'public/profil_imgs/default.png', 'halo', '2019-09-17 01:17:55', '2019-09-17 01:17:55'),
(3, 13, 21, 'adimaryadi', 'public/profil_imgs/default.png', 'hai', '2019-09-17 03:19:05', '2019-09-17 03:19:05'),
(4, 13, 21, 'adimaryadi', 'public/profil_imgs/default.png', 'halo tes', '2019-09-19 06:54:05', '2019-09-19 06:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_berita`
--

CREATE TABLE `komentar_berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_berita` bigint(20) NOT NULL,
  `foto_gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentar_berita`
--

INSERT INTO `komentar_berita` (`id`, `komentar`, `id_google`, `email`, `id_berita`, `foto_gambar`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'hai', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 02:05:35', '2019-09-23 02:05:35'),
(2, 'hallo', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 02:09:27', '2019-09-23 02:09:27'),
(3, 'tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 19:33:43', '2019-09-23 19:33:43'),
(4, 'tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 19:36:49', '2019-09-23 19:36:49'),
(5, 'test', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 19:37:44', '2019-09-23 19:37:44'),
(6, 'hallo', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 19:37:52', '2019-09-23 19:37:52'),
(7, 'hallo', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 19:37:55', '2019-09-23 19:37:55'),
(8, 'hallo', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 19:37:58', '2019-09-23 19:37:58'),
(9, 'haloo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:11:06', '2019-09-23 20:11:06'),
(10, 'haloo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:11:07', '2019-09-23 20:11:07'),
(11, 'haloo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:11:46', '2019-09-23 20:11:46'),
(12, 'hallo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:24:51', '2019-09-23 20:24:51'),
(13, 'hallo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:25:46', '2019-09-23 20:25:46'),
(14, 'hallo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:25:46', '2019-09-23 20:25:46'),
(15, 'hallo tes', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:25:46', '2019-09-23 20:25:46'),
(16, 'asdjsaijdiasjd', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-09-23 20:31:14', '2019-09-23 20:31:14'),
(24, 'asdj isajdiasjdi ajsiaidjadasdusahdusah duah', '117556659108858495249', 'adimaryaditech@gmail.com', 6, 'https://lh6.googleusercontent.com/-j5LHt59gSts/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reEbchb2d7JbEMbDpWmIy2_t49_IA/s96-c/photo.jpg', 'adi maryadi', '2019-09-24 00:03:54', '2019-09-24 00:04:15'),
(25, 'asdasdjasidj', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:18:31', '2019-10-02 21:18:31'),
(26, 'asdasdjasidj', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:18:39', '2019-10-02 21:18:39'),
(27, 'jiasjdisajd', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:20:07', '2019-10-02 21:20:07'),
(28, 'jiasjdisajd', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:20:18', '2019-10-02 21:20:18'),
(29, 'asjdi jdiwa', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:22:15', '2019-10-02 21:22:15'),
(30, 'asd wajijwd', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:23:15', '2019-10-02 21:23:15'),
(31, 'ajdiw ajdwa jdi', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:25:39', '2019-10-02 21:25:39'),
(32, 'ajdiw ajdwa jdi', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:25:45', '2019-10-02 21:25:45'),
(33, 'asd asdsa', '111292662622812454353', 'adimaryadiinten@gmail.com', 6, 'https://lh3.googleusercontent.com/a-/AAuE7mCvHtLZB3kZU4XUeEfkK6fMA9euGxTGnPHdphMT=s96-c', 'adi maryadi', '2019-10-02 21:29:13', '2019-10-02 21:29:13'),
(34, 'asdasd wajdu wau', '117556659108858495249', 'adimaryaditech@gmail.com', 6, 'https://lh6.googleusercontent.com/-j5LHt59gSts/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reEbchb2d7JbEMbDpWmIy2_t49_IA/s96-c/photo.jpg', 'adi maryadi', '2019-10-02 21:31:15', '2019-10-02 21:31:15'),
(37, 'test komentar', '117556659108858495249', 'adimaryaditech@gmail.com', 6, 'https://lh6.googleusercontent.com/-j5LHt59gSts/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reEbchb2d7JbEMbDpWmIy2_t49_IA/s96-c/photo.jpg', 'adi maryadi', '2019-10-02 21:35:11', '2019-10-02 21:35:11'),
(38, 'test komentar', '117556659108858495249', 'adimaryaditech@gmail.com', 6, 'https://lh6.googleusercontent.com/-j5LHt59gSts/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reEbchb2d7JbEMbDpWmIy2_t49_IA/s96-c/photo.jpg', 'adi maryadi', '2019-10-02 21:37:00', '2019-10-02 21:37:00'),
(39, 'test komentar', '117556659108858495249', 'adimaryaditech@gmail.com', 6, 'https://lh6.googleusercontent.com/-j5LHt59gSts/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reEbchb2d7JbEMbDpWmIy2_t49_IA/s96-c/photo.jpg', 'adi maryadi', '2019-10-02 21:37:01', '2019-10-02 21:37:01'),
(40, 'test komentar', '117556659108858495249', 'adimaryaditech@gmail.com', 6, 'https://lh6.googleusercontent.com/-j5LHt59gSts/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3reEbchb2d7JbEMbDpWmIy2_t49_IA/s96-c/photo.jpg', 'adi maryadi', '2019-10-02 21:37:01', '2019-10-02 21:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `konten_dekat_footer`
--

CREATE TABLE `konten_dekat_footer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_konten` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo_header`
--

CREATE TABLE `logo_header` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_header` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_header`
--

INSERT INTO `logo_header` (`id`, `logo_header`, `created_at`, `updated_at`) VALUES
(3, 'public/logo_header/1568707685smk_8_logo_small.png', '2019-08-27 22:15:51', '2019-09-17 01:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu_page_unit_kerja`
--

CREATE TABLE `menu_page_unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_judul` text COLLATE utf8mb4_unicode_ci,
  `gambar_page` text COLLATE utf8mb4_unicode_ci,
  `konten_page` text COLLATE utf8mb4_unicode_ci,
  `link_menu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_page_unit_kerja`
--

INSERT INTO `menu_page_unit_kerja` (`id`, `judul_menu`, `sub_judul`, `gambar_page`, `konten_page`, `link_menu`, `created_at`, `updated_at`) VALUES
(3, 'Manajemen Mutu (MM)', 'Merumuskan, melaksanakan dan mengkoordinasikan kegiatan penjamin mutu dalam proses KBM dan kegiatan sekolah berdasarkan standar manajemen mutu.', NULL, '<p>Nama Unit : Manajemen Mutu</p>\r\n\r\n<p>Tanggung jawab :<br />\r\nMerumuskan, melaksanakan dan mengkoordinasikan kegiatan penjamin mutu dalam proses KBM dan kegiatan sekolah berdasarkan standar manajemen mutu.</p>\r\n\r\n<p>Wewenang :<br />\r\n1. Menyusun dan mengembangkan dokumen.<br />\r\n2. Mengelola dan memelihara dokumen/rekaman.<br />\r\n3. Melakukan penjaminan mutu proses dan hasil.<br />\r\n4. Membantu Kepala Sekolah dalam mengendalikan proses pendidikan dan latihan.</p>\r\n\r\n<p>Tugas :<br />\r\n1. Menyusun program kerja tahunan.<br />\r\n2. Melaksanakan pembinaan dan koordinasi pelaksanaan sistem manajemen mutu.<br />\r\n3. Melakukan koordinasi penyusunan dokumen sistem manajemen mutu<br />\r\n4. Mengkoordinasi pemeliharaan dokumen / rekaman.<br />\r\n5. Melaksanakan dan mengkoordinasikan administrasi sistem manajemen mutu.<br />\r\n6. Mengkoordinasikan pelaksanaan audit internal/eksternal.<br />\r\n7. Melaporkan hasil pelaksanaan audit.<br />\r\n8. Mengkoordinir kegiatan tinjauan manajemen.<br />\r\n9. Melaksanakan tugas lain yang ditetapkan oleh Kepala Sekolah yang berkaitan dengan penjaminan mutu diklat.</p>\r\n\r\n<p>﻿STRUKTUR ORGANISASI MM 2016-2017</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n﻿﻿﻿Program Kerja MM 2016-2017</p>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>NO.</td>\r\n			<td>URAIAN KEGIATAN</td>\r\n		</tr>\r\n		<tr>\r\n			<td>1</td>\r\n			<td>Implementasi Sistem Manajemen Mutu ISO 9001:2008</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2</td>\r\n			<td>Rapat Koordinasi Wakil Manajemen Mutu dengan Staf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3</td>\r\n			<td>Menyusun Analisis Jabatan dan Buku Organisasi Manajemen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4</td>\r\n			<td>Awareness ISO 9001:2015</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5</td>\r\n			<td>Menyusun Pedoman Mutu dan SOP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6</td>\r\n			<td>Menyusun panduan pengendalian dokumen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7</td>\r\n			<td>Sosialisasi Pengendalian Dokumen&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>8</td>\r\n			<td>Menyusun RKAS Excel</td>\r\n		</tr>\r\n		<tr>\r\n			<td>9</td>\r\n			<td>Menyusun RKAS SIMDA</td>\r\n		</tr>\r\n		<tr>\r\n			<td>10</td>\r\n			<td>Menyusun dan mengolah Angket Harapan Pelanggan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>11</td>\r\n			<td>Menyusun pedoman verifikasi dokumen unit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12</td>\r\n			<td>Verifikasi dokumen unit</td>\r\n		</tr>\r\n		<tr>\r\n			<td>13</td>\r\n			<td>Perekapan kotak saran</td>\r\n		</tr>\r\n		<tr>\r\n			<td>14</td>\r\n			<td>Penyusunan form kinerja staf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>15</td>\r\n			<td>Pengumpulan laporan kinerja staf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>16</td>\r\n			<td>Perekapan laporan kinerja staf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>17</td>\r\n			<td>Penyebaran dan pengolahan angket kinerja sekolah</td>\r\n		</tr>\r\n		<tr>\r\n			<td>18</td>\r\n			<td>Penyebaran dan pengolahan angket pelaksanaan UAS Ganjil</td>\r\n		</tr>\r\n		<tr>\r\n			<td>19</td>\r\n			<td>Penyebaran dan pengolahan angket pelaksanaan&nbsp; Praktik Kerja Industri</td>\r\n		</tr>\r\n		<tr>\r\n			<td>20</td>\r\n			<td>Penyebaran dan Pengolahan angket pelaksanaan Kunjungan Industri</td>\r\n		</tr>\r\n		<tr>\r\n			<td>21</td>\r\n			<td>Bimtek Peyempurnaan Panduan Mutu LSP P-1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>22</td>\r\n			<td>Penyusunan dokumen LSP P-1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>23</td>\r\n			<td>Tinjauan Ulang IK menjadi SOP</td>\r\n		</tr>\r\n		<tr>\r\n			<td>24</td>\r\n			<td>Review SDP Sekolah Rujukan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>25</td>\r\n			<td>Rapat Persiapan&nbsp; Audit Internal 1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>26</td>\r\n			<td>Pelaksanaan&nbsp; Audit Internal 1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>27</td>\r\n			<td>Verifikasi Hasil&nbsp; Audit Internal 1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>28</td>\r\n			<td>Rapat Tinjauan Manajemen (RTM)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>29</td>\r\n			<td>Survaillence Audit dan Up Grading ISO 9001:2015</td>\r\n		</tr>\r\n		<tr>\r\n			<td>30</td>\r\n			<td>Mengikuti pelatihan ISO ke PT. TUV</td>\r\n		</tr>\r\n		<tr>\r\n			<td>31</td>\r\n			<td>Menyusun laporan kegiatan Bidang Manajemen Mutu</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'Manajemen-Mutu-(MM)1569394933', '2019-09-25 00:02:13', '2019-09-25 00:02:13'),
(4, 'Kesiswaaan', 'Tujuan pendidikan nasional adalah mencerdaskan kehidupan bangsa dan mengembangkan manusia Indonesia seutuhnya, yaitu manusia yang beriman dan bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur, kreatif, berdisiplin, memiliki pengetahuan dan keterampilan, kesehatan jasmani dan rohani, kepribadian yang mantap dan mandiri serta rasa tanggung jawab kemasyarakatan dan kebangsaan.', 'public/gambar_menu/1569394994data kesiswaan_1.jpg', '<p>Tujuan pendidikan nasional adalah mencerdaskan kehidupan bangsa dan mengembangkan manusia Indonesia seutuhnya, yaitu manusia yang beriman dan bertaqwa terhadap Tuhan Yang Maha Esa dan berbudi pekerti luhur, kreatif, berdisiplin, memiliki pengetahuan dan keterampilan, kesehatan jasmani dan rohani, kepribadian yang mantap dan mandiri serta rasa tanggung jawab kemasyarakatan dan kebangsaan.</p>\r\n\r\n<p>Untuk mencapai tujuan tersebut, dilakukan kegiatan-kegiatan melalui jalur pembinaan kesiswaan. Pembinaan adalah segala kegiatan yang meliputi perencanaan, pengaturan, pelaksanaan, pengawasan, penilaian dan pemberian bantuan. Siswa adalah peserta didik yang mengikuti pendidikan. Untuk itu kesiswaan merupakan keadaan peserta didik atau siswa sebagai insan pribadi, insan pendidikan, dan sebagai insan pembangunan sesuai nilai-nilai Pancasila.</p>\r\n\r\n<p>Pembinaan kesiswaan diSMK Negeri 8 Bandung secara umum membantu Kepala Sekolah dalam urusan kesiswaan yaitu dalam menyusun program kerja pembinaan kesiswaan, 5K &ndash; 7K, kegiatan luar sekolah, dan mengkoordinasi pelaksanaannya.</p>\r\n\r\n<p>Sehubungan dengan hal itu, agar pelaksanaan program pembinaan kesiswaan SMK Negeri 8 Bandung mencapai hasil yang baik maka diatur suatu mekanisme dan pembagian tugas melalui pembinaan dalam bidang:</p>\r\n\r\n<table border=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td>1.</td>\r\n			<td>Pembinaan Ketaqwaan terhadap Tuhan YME :&nbsp;Pembinaan ketaqwaan siswa terhadap Tuhan YME dan pembinaan kepribadian dan budi pekerti luhur siswa.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>2.</td>\r\n			<td>Pembinaan OSIS &amp; Kepemimpinan:&nbsp;Pembinaan, pengelolaan, dan pengembangan OSIS di sekolah.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>3.</td>\r\n			<td>Pembinaan Lingkungan Hidup:&nbsp;Pembinaan kegiatan siswa mengenai kepedulian pada lingkungan hidup.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>4.</td>\r\n			<td>Pembinaan Kehidupan Berbangsa &amp; Bernegara:&nbsp;pembinaan bagi siswa dalam melaksanakan tata tertib sekolah, upacara bendera, serta pembinaan pendidikan dan pendahuluan bela Negara.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>5.</td>\r\n			<td>Pembinaan Wawasan Wiyatamandala:&nbsp;pembinaan bagi siswa untuk bersikap menempatkan sekolah sebagai lingkungan pendidikan&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>6.</td>\r\n			<td>Pembinaan Ketrmpilan, Apresiasi &amp; Kreasi Seni:&nbsp;pembinaan bagi siswa untuk mengembangkan wawasan dan keterampilan siswa di bidang seni, dan kewiraswastaan siswa serta membina persepsi, apresiasi dan kreasi siswa.&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>7.</td>\r\n			<td>Pembinaan Kesegaran Jasmani &amp; Daya Kreasi: &nbsp;pembinaan bagi siswa dalam meningkatkan kesadaran hidup sehat di lingkungan sekolah, rumah, dan masyarakat/lingkungan. kesegaran jasmani dan daya kreasi siswa.&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Terkait dengan upaya mewujudkan hasil yang baik dan tepat dalam pembinaan kesiswaan maka perlu adanya keterlibatan semua warga sekolah, baik secara langsung maupun tidak langsung. Dengan demikian, diharapkan seluruh warga sekolah peduli terhadap pembinaan kesiswaan khususnya di SMK Negeri 8 Bandung. Sebagai wujud rasa tanggung jawab kita bersama berikanlah masukan dan pengontrolan yang berkesinambungan. Pada akhirnya semoga semua yang kita berikan pada anak didik kita mendapat bimbingan, petunjuk dan ridho dari Allah SWT.</p>\r\n\r\n<p>Amiin.</p>', 'Kesiswaaan1569394994', '2019-09-25 00:03:14', '2019-09-25 00:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(6, '2016_06_01_000004_create_oauth_clients_table', 2),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(42, '2019_07_31_041827_unitkerja__sliders', 3),
(43, '2019_07_31_042034_unit_kerja_form', 3),
(44, '2019_07_31_042258_siswa__bootcamp', 3),
(45, '2019_07_31_042331_siswa_testimonials', 3),
(46, '2019_07_31_042611_siswa_categori_product', 3),
(47, '2019_07_31_042635_siswa__product', 3),
(48, '2019_07_31_070903_p_p_d_b__form', 3),
(49, '2019_07_31_071301_guru_terbaik__p_p_d_b', 3),
(50, '2019_07_31_071458_slider_murid__p_p_d_b', 3),
(51, '2019_07_31_071654_box_tentang_kami', 3),
(52, '2019_07_31_071730_slider_tentang_kami', 3),
(53, '2019_07_31_071937_kategori_artikel', 3),
(54, '2019_07_31_072002_artikel', 3),
(55, '2019_07_31_072130_slider_home', 3),
(56, '2019_08_07_042103_home_contents_product_two', 4),
(57, '2019_08_07_092414_home_logo_our_client', 5),
(58, '2019_08_20_044014_ruang_kelas', 6),
(59, '2019_08_20_095505_tugas_sekolah', 7),
(60, '2019_08_22_095942_pengumpulan_tugas', 8),
(61, '2019_08_27_092852_logo_header', 9),
(62, '2019_08_27_093610_home_content_page', 9),
(63, '2019_08_28_052052_footer_up', 10),
(64, '2019_08_28_060453_footer_down_menu', 10),
(65, '2019_08_29_084047_pemerintah_provinsi', 11),
(66, '2019_08_30_062350_konten_dekat_footer', 12),
(67, '2019_09_12_083543_komentar_artikel', 13),
(68, '2019_09_16_050619_home_selamat_datang', 14),
(69, '2019_09_16_084553_smart_school', 15),
(72, '2019_09_17_034925_guru_milenials', 16),
(73, '2019_09_17_055407_home_ruang_informasi', 17),
(74, '2019_09_17_081911_home_statistik', 18),
(75, '2019_09_18_061526_visi_misi_tentang_kami', 19),
(76, '2019_09_18_083537_misi_tentang_kami', 20),
(78, '2019_09_19_023742_berita', 21),
(79, '2019_09_19_033406_kategori_berita', 22),
(80, '2019_09_20_093858_berita_komentar', 23),
(82, '2019_09_24_094956_menu_page_unit_kerja', 24),
(88, '2019_09_25_094004_gallery', 25),
(89, '2019_09_26_063331_kategori_gallery', 25),
(90, '2019_09_26_064035_foto_gallery', 25),
(91, '2019_09_27_094632_config_background_gallery', 26),
(92, '2019_10_01_023352_jurusan_tentang_kami', 27),
(93, '2019_10_08_085707_sarana_dan_prasarana', 28),
(94, '2019_10_16_082550_sejarah_sekolah', 28),
(95, '2019_10_17_064518_prestasi_sekolah', 28),
(96, '2019_10_18_060652_fasilitas_sekolah', 28),
(97, '2019_10_18_090939_informasi_p_p_d_b', 28),
(98, '2019_10_21_085538_apa_itu_p_p_d_b', 28),
(99, '2019_10_22_033832_persyaratan_calon_perserta_didik', 28),
(100, '2020_08_01_094321_riwayat__pendidikan', 28),
(101, '2020_08_01_110952_riwayat_mengajar', 29),
(102, '2020_08_01_111206_penelitian', 29),
(103, '2020_08_02_063519_riwayat_penelitian', 30);

-- --------------------------------------------------------

--
-- Table structure for table `misi_tentang_kami`
--

CREATE TABLE `misi_tentang_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `misi_tentang_kami`
--

INSERT INTO `misi_tentang_kami` (`id`, `judul`, `konten`, `gambar_misi`, `created_at`, `updated_at`) VALUES
(4, 'Misi', '<ol>\r\n	<li>Memberikan layanan prima melalui penerapan SMM ISO 9001:2015 kepada siswa, guru, pegawai, masyarakat dan sekolah aliansi.</li>\r\n	<li>Membentuk karakter siswa yang jujur, disiplin dan bertanggungjawab.</li>\r\n	<li>Menghasilkan tamatan yang profesional sebagai mekanik / tenaga kerja yang kompeten, wirausahawan yang sukses dan dapat melanjutkan ke perguruan tinggi.</li>\r\n	<li>Meningkatkan profesionalisme tenaga pendidik dan tenaga kependidikan.</li>\r\n	<li>Meningkatkan hubungan kemitraan dengan Stakeholder dalam rangka peningkatan mutu lulusan.</li>\r\n	<li>Meningkatkan sarana prasarana yang berwawasan lingkungan dengan mengacu kepada standar pelayanan prima.</li>\r\n	<li>Menciptakan lingkungan kerja yang kondusif dan harmonis.</li>\r\n</ol>', 'public/misi_tentang_kami/1568799972banner8.png', '2019-09-18 02:46:12', '2019-09-18 02:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'qOEmJNK5y59VZnEYXK986lVjcHXKUYWHbrtDxK4V', 'http://localhost', 1, 0, 0, '2019-07-25 23:27:14', '2019-07-25 23:27:14'),
(2, NULL, 'Laravel Password Grant Client', 'yPMpWsg32vKH0RmfBoTleWjeqimdxFlkm6v4DR8y', 'http://localhost', 0, 1, 0, '2019-07-25 23:27:14', '2019-07-25 23:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-07-25 23:27:14', '2019-07-25 23:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemerintah_provinsi`
--

CREATE TABLE `pemerintah_provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_belakang` text COLLATE utf8mb4_unicode_ci,
  `pemerintah_kabupaten` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemerintah_provinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_ilmu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dosen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan_tugas`
--

CREATE TABLE `pengumpulan_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelajaran` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tugas` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_murid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_murid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nis` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_tugas` text COLLATE utf8mb4_unicode_ci,
  `nilai_tugas` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan_calon_perserta`
--

CREATE TABLE `persyaratan_calon_perserta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_guru_terbaik`
--

CREATE TABLE `ppdb_guru_terbaik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_guru_terbaik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebagai_guru` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universitas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_guru` int(20) DEFAULT NULL,
  `kontent_guru_terbaik` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppdb_guru_terbaik`
--

INSERT INTO `ppdb_guru_terbaik` (`id`, `foto_guru_terbaik`, `nama_guru`, `sebagai_guru`, `universitas`, `rating_guru`, `kontent_guru_terbaik`, `created_at`, `updated_at`) VALUES
(5, 'public/foto_guru_terbaik/1569834673TEI.jpg', NULL, NULL, NULL, 4, NULL, '2019-09-30 02:11:13', '2019-09-30 02:11:13'),
(6, 'public/foto_guru_terbaik/1569834723TKR.jpg', NULL, NULL, NULL, 5, NULL, '2019-09-30 02:12:03', '2019-09-30 02:12:03'),
(7, 'public/foto_guru_terbaik/1569834748TPBO.jpg', NULL, NULL, NULL, 3, NULL, '2019-09-30 02:12:28', '2019-09-30 02:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb_pmb`
--

CREATE TABLE `ppdb_pmb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sekolah_smp` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `Alamat_siswa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `RT` int(11) NOT NULL,
  `RW` int(11) NOT NULL,
  `kecamatan` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_ayah` int(11) NOT NULL,
  `tanggal_lahir_ayah` date NOT NULL,
  `nomor_telepon_ayah` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur_ibu` int(11) NOT NULL,
  `tanggal_lahir_ibu` date NOT NULL,
  `no_telepon_ibu` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_orang_tua` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon_siswa` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_siswa_smp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kehadiran` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_mengajar`
--

CREATE TABLE `riwayat_mengajar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_mata_kuliah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_mata_kuliah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perguruan_tinggi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dosen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perguruan_tinggi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_akademik` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_izasah` date DEFAULT NULL,
  `jenjang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dosen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id`, `perguruan_tinggi`, `gelar_akademik`, `tanggal_izasah`, `jenjang`, `id_dosen`, `created_at`, `updated_at`) VALUES
(2, 'Sekolah tinggi sains teknologi', 'Sarjana teknik', '2020-08-08', 'S2', '34', '2020-08-01 22:20:47', '2020-08-01 22:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_penelitian`
--

CREATE TABLE `riwayat_penelitian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_penelitian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_ilmu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lembaga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_dosen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sarana_dan_prasarana`
--

CREATE TABLE `sarana_dan_prasarana` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_fasilitas` text COLLATE utf8mb4_unicode_ci,
  `posisi_garis` enum('kiri','kanan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sejarah_sekolah`
--

CREATE TABLE `sejarah_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_sejarah_sekolah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_sejarah` text COLLATE utf8mb4_unicode_ci,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_bootcamp`
--

CREATE TABLE `siswa_bootcamp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_bootcamp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_siswa_bootcamp` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontent_bootcamp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_bootcamp`
--

INSERT INTO `siswa_bootcamp` (`id`, `logo_bootcamp`, `judul_siswa_bootcamp`, `kontent_bootcamp`, `created_at`, `updated_at`) VALUES
(4, 'public/siswa_bootcamp/1565064816abstrak.jpg', 'Group Belajar Online dengan Kakak Tutor Standby', '<p>dari Matematika, Fisika, Sosiologi, sampai mata pelajaran persiapan masuk PTN ada semua! Selain itu di setiap grup belajar akan dipandu</p>', '2019-08-05 21:13:36', '2019-08-05 21:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_product`
--

CREATE TABLE `siswa_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daftar_fitur` text COLLATE utf8mb4_unicode_ci,
  `harga_product` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_produk` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_product`
--

INSERT INTO `siswa_product` (`id`, `nama`, `tahun_ajaran`, `daftar_fitur`, `harga_product`, `kategori_produk`, `created_at`, `updated_at`) VALUES
(3, 'KELAS 6 SD', 'Paket 1 Tahun Ajaran 2019/2020', '<ul>\r\n	<li>buku</li>\r\n	<li>pulpen</li>\r\n	<li>penghapus</li>\r\n</ul>', 'Rp 5.400.000', 'SD', '2019-08-09 00:28:55', '2019-08-09 00:28:55'),
(4, 'Kelas 7', 'Tahun Ajaran 2019/2020', '<p>asdjiwaji jawi jawi jaid jawidjwaidjisajdi wjai djiwa jdiwa jwi jdiwa djawidj</p>', 'Rp 3.400.000', 'SMP', '2019-08-09 02:00:16', '2019-08-09 02:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `slider_home`
--

CREATE TABLE `slider_home` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar_slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_images` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_home`
--

INSERT INTO `slider_home` (`id`, `gambar_slider`, `url_images`, `created_at`, `updated_at`) VALUES
(5, 'public/sliders_home/1564659607webbanner-bimbel.jpg', NULL, '2019-08-01 04:40:07', '2019-08-01 04:40:07'),
(6, 'public/sliders_home/1564659622webbanner-main.jpg', NULL, '2019-08-01 04:40:22', '2019-08-01 04:40:22'),
(7, 'public/sliders_home/1564659631webbanner-mitra-baru.jpg', 'google.com', '2019-08-01 04:40:31', '2019-08-01 06:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `slider_ppdb`
--

CREATE TABLE `slider_ppdb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_slider_ppdb` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_slider` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kedua` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebagai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontent_slider` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_ppdb`
--

INSERT INTO `slider_ppdb` (`id`, `foto_slider_ppdb`, `nama_slider`, `nama_kedua`, `sebagai`, `kontent_slider`, `created_at`, `updated_at`) VALUES
(2, 'public/slider_ppdb/1565767147ruangles_landingpage-testi1-new.jpg', 'Gabby A', '10 Besar Sekolah', 'Mengambil Les matematika  SMA', '<p>Belajar dengan guru di Ruangguru sangat asik. Tadinya nilai matematika ku 40-50 bahkan pernah 0, setelah les privat di Ruangguru nilaiku jadi 70-80 bahkan sekarang aku masuk 10 besar. Belajarnya tidak monoton karena gurunya bisa menyesuaikan. Bahkan sekarang aku ajak adikku juga ikutan les dan nilainya juga naik dan mama jadi senang</p>', '2019-08-14 00:19:07', '2019-08-14 00:19:07'),
(3, 'public/slider_ppdb/1565767675ruanglesonline_teacher3.png', 'Dhannardi', NULL, 'guru les matematika', '<p>Belajar dengan guru di Ruangguru sangat asik. Tadinya nilai matematika ku 40-50 bahkan pernah 0, setelah les privat di Ruangguru nilaiku jadi 70-80 bahkan sekarang aku masuk 10 besar. Belajarnya tidak monoton karena gurunya bisa menyesuaikan. Bahkan sekarang aku ajak adikku juga ikutan les dan nilainya juga naik dan mama jadi senang</p>', '2019-08-14 00:27:55', '2019-08-14 00:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `slider_tentang_kami`
--

CREATE TABLE `slider_tentang_kami` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebagai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontent_slider` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_tentang_kami`
--

INSERT INTO `slider_tentang_kami` (`id`, `foto_slider`, `nama`, `sebagai`, `kontent_slider`, `created_at`, `updated_at`) VALUES
(4, 'public/slider_tentang_kami/1565855172ruanglesonline_testimonial2.jpg', 'Sisi Fitri', 'Siswa SMA 1', '<p>Aku merasa puas karena aku bisa mengerjakan tugas dengan baik dan aku lebih bisa mengerti pelajaran dengan cara pengajaran yang cepat serta efektif melalui ruanglesonline. Penjelasan dari guru juga mudah untuk dipahami. Menariknya...saat aku gak bisa mengerjakan PR dan gak bisa nanya sama gurunya, aku jadinya bisa mengerti lewat ruanglesonline. Pokoknya guru di ruanglesonline itu terbaik deh!</p>', '2019-08-15 00:46:12', '2019-08-15 00:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `slider_unit_kerja`
--

CREATE TABLE `slider_unit_kerja` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_slider` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebagai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontent_slider` text COLLATE utf8mb4_unicode_ci,
  `gambar_slider` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_universitas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_unit_kerja`
--

INSERT INTO `slider_unit_kerja` (`id`, `nama_slider`, `sebagai`, `kontent_slider`, `gambar_slider`, `logo_universitas`, `created_at`, `updated_at`) VALUES
(5, 'Dhanardi Riansyah', 'Master teacher Matematika', '<p>Kak Dhanar siap menjawab semua kegalauan Matematikamu! Lulusan jurusan Matematika Universitas Indonesia ini, sudah berpengalaman mengajar matematika selama lebih dari 8 tahun. Tidak cuma mengajar bimbel dan privat, Kak Dhanar juga sering ikut serta dalam mengembangkan soal-soal intensif SBMPTN yang dipakai di seluruh Indonesia. Wow!</p>', 'public/slider_unit_kerja/1564985701teacher-math-big.png', 'public/logo_universitas/1564992284columbia-logo@3x.png,public/logo_universitas/1564992284uny-logo@3x.png', '2019-08-04 23:15:01', '2019-08-05 01:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `smart_school`
--

CREATE TABLE `smart_school` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_btn` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smart_school`
--

INSERT INTO `smart_school` (`id`, `konten`, `gambar`, `link_btn`, `created_at`, `updated_at`) VALUES
(2, '<p>TATA KELOLA SEKOLAH BERBASIS ICT<br />\r\nMendayagunakan teknologi komunikasi dan informasi di sekolah adalah salah satu upaya untuk meningkatkan mutu pendidikan dan layanan sekolah, yaitu dengan mengintegrasikan seluruh element mulai dari TU, Akademik, PPDB, Sarpras dan Web Sekolah.</p>', 'public/smart_school/1568690142banner6.png', 'siswa', '2019-09-16 20:15:42', '2019-09-16 20:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_siswa`
--

CREATE TABLE `testimonials_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar_siswa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_testimonials` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sebagai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontent_testimonials` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials_siswa`
--

INSERT INTO `testimonials_siswa` (`id`, `gambar_siswa`, `nama_testimonials`, `sebagai`, `kontent_testimonials`, `created_at`, `updated_at`) VALUES
(3, 'public/slider_bootcamp/1565073492abdurrahman.webp', 'Eka', 'Pengajar Matematik 1', '<p>&ldquo;Saya menyukai mengajar karena saya percaya bahwa pendidikan dapat membantu setiap insan untuk mewujudkan mimpi-mimpi mereka. Dan saya bahagia bisa menjadi salah satu bagian dari proses itu di RGDB.&rdquo;</p>', '2019-08-05 23:38:12', '2019-08-05 23:38:12'),
(4, 'public/slider_bootcamp/1565080693ruanglesonline_teacher1.png', 'sandi rifmawan', 'Master teacher biologis', '<p>&ldquo;Saya menyukai mengajar karena saya percaya bahwa pendidikan dapat membantu setiap insan untuk mewujudkan mimpi-mimpi mereka. Dan saya bahagia bisa menjadi salah satu bagian dari proses itu di RGDB.&rdquo;</p>', '2019-08-06 01:38:13', '2019-08-06 01:38:13'),
(5, 'public/slider_bootcamp/1565080751ruanglesonline__intro-banner-iqbal.png', 'mahmud', 'Master Teacher fisika', '<p>asdaddjsad jia djisa djsaid jasid ji djiasjdiosaj di</p>', '2019-08-06 01:39:11', '2019-08-06 01:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_sekolah`
--

CREATE TABLE `tugas_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_tugas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dari_guru` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pelajaran` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_tugas` text COLLATE utf8mb4_unicode_ci,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi_tugas` text COLLATE utf8mb4_unicode_ci,
  `kadaluarsa_tugas` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas_sekolah`
--

INSERT INTO `tugas_sekolah` (`id`, `judul_tugas`, `dari_guru`, `pelajaran`, `file_tugas`, `kelas`, `deskripsi_tugas`, `kadaluarsa_tugas`, `created_at`, `updated_at`) VALUES
(3, 'Bahasa Indonesia', 'guru - dadan', 'Indonesia', 'public/tugas_sekolah/1566368549Digital_Image_Processing_2ndEd.pdf', '11a', 'adjias jiasjdiasjdias djiajdias jdisad jiasjdisaj dias djias', '2019-08-25', '2019-08-20 23:22:29', '2019-08-20 23:22:29'),
(4, 'sandi', 'guru - dadan', 'tes', 'public/tugas_sekolah/1566368844tugas assosiation.xlsx', '12a', 'asd as dasjdias jdias djiasd jaisjdia', '2019-08-25', '2019-08-20 23:27:24', '2019-08-20 23:27:24'),
(5, 'asdjias aisd jaiji', 'guru - dadan', 'jias djsaidaisdsajdj', 'public/tugas_sekolah/1566368892Database1.accdb', '10a', 'asdsa dasdasdajdidjdj', '2019-08-24', '2019-08-20 23:28:12', '2019-08-20 23:28:12'),
(6, 'biologi', 'guru - dadan', 'fisika', 'public/tugas_sekolah/1566369191paklaring20190723_10522650.pdf', '12a', 'asdj iasjisa dasjdsajdas ajaiiaijai dj', '2019-08-05', '2019-08-20 23:33:11', '2019-08-20 23:33:11'),
(8, 'test jadi update realtime', 'guru - dadan', 'bahasa sunda', 'public/tugas_sekolah/1566382069Ayat-v1.4_standard.zip', '10a', 'dadan', '2019-08-31', '2019-08-20 23:50:17', '2019-08-21 03:13:47'),
(10, 'test', 'guru - dadan satria', 'dadan', 'public/tugas_sekolah/1566472521763_Resident_Evil_2.zip', '12a', 'asdsa ad', '2019-08-29', '2019-08-22 04:15:22', '2019-08-22 04:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja_help`
--

CREATE TABLE `unit_kerja_help` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerja_help`
--

INSERT INTO `unit_kerja_help` (`id`, `nama`, `no_telepon`, `email`, `pesan`, `created_at`, `updated_at`) VALUES
(5, 'dadan', '89655088505', 'dadansatria@gmail.com', 'asdjiajdiasjdiajdijwij iwajdiw ajdiwa jiaw jiaw jdi', '2019-08-04 22:29:32', '2019-08-04 22:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `unit_page_fasilitas_sekolah`
--

CREATE TABLE `unit_page_fasilitas_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','mahasiswa','dosen','alumni') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_induk` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `status` enum('inactive','active') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruang_kelas` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` enum('informatika','sipil','arsitek','elektro') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_fungsional` text COLLATE utf8mb4_unicode_ci,
  `gelar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_img`, `level`, `nomor_induk`, `nomor_telepon`, `alamat`, `status`, `ruang_kelas`, `jurusan`, `jabatan_fungsional`, `gelar`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin@admin.com', NULL, '$2y$10$i.wYUdu5PiSyHSdZxjEe2uYykPNkeR9o.AuVnYVcfduCGMOv62jhG', NULL, 'public/profil_imgs/default.png', 'admin', '1116009', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-26 00:44:13', '2019-07-26 00:44:13'),
(34, 'Dadan', 'dadan@gmail.com', NULL, '$2y$10$UIlxT.7DGwp4ZzOWBAvCQeQJkUSbDZAUUoDbkFZWVPnPpE9OEYvdu', NULL, 'public/profil_imgs/1596363150dadan.jpg', 'dosen', '1116009', NULL, NULL, 'active', NULL, 'informatika', NULL, 'S1 teknik', 'Sekolah tinggi sains teknologi', '2020-08-01 16:32:31', '2020-08-02 17:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_belakang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `konten`, `gambar_belakang`, `created_at`, `updated_at`) VALUES
(2, '<h1>Visi SMK Negeri 8 Bandung</h1>\r\n\r\n<p style=\"font-size: 1.4em;\">Menjadi sekolah berwawasan lingkungan yang unggul untuk menghasilkan tamatan yang berakhlak mulia dan profesional.</p>', 'public/tentang_kami/1568795264tentangkami.jpg', '2019-09-18 00:26:57', '2019-09-18 01:31:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apa_itu_ppdb`
--
ALTER TABLE `apa_itu_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel_blog`
--
ALTER TABLE `artikel_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `box_tentang_kami`
--
ALTER TABLE `box_tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_background_gallery`
--
ALTER TABLE `config_background_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_down_menu`
--
ALTER TABLE `footer_down_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_up`
--
ALTER TABLE `footer_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_gallery`
--
ALTER TABLE `foto_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_milenial`
--
ALTER TABLE `guru_milenial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homecontentpage`
--
ALTER TABLE `homecontentpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homecontentsproducttwo`
--
ALTER TABLE `homecontentsproducttwo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeruanginformasi`
--
ALTER TABLE `homeruanginformasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestatistik`
--
ALTER TABLE `homestatistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_logo_our_clients`
--
ALTER TABLE `home_logo_our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_selamat_datang`
--
ALTER TABLE `home_selamat_datang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_ppdb`
--
ALTER TABLE `informasi_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan_tentang_kami`
--
ALTER TABLE `jurusan_tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_gallery`
--
ALTER TABLE `kategori_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_siswa`
--
ALTER TABLE `kategori_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_group`
--
ALTER TABLE `kelas_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten_dekat_footer`
--
ALTER TABLE `konten_dekat_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_header`
--
ALTER TABLE `logo_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_page_unit_kerja`
--
ALTER TABLE `menu_page_unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi_tentang_kami`
--
ALTER TABLE `misi_tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemerintah_provinsi`
--
ALTER TABLE `pemerintah_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persyaratan_calon_perserta`
--
ALTER TABLE `persyaratan_calon_perserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_guru_terbaik`
--
ALTER TABLE `ppdb_guru_terbaik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppdb_pmb`
--
ALTER TABLE `ppdb_pmb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_mengajar`
--
ALTER TABLE `riwayat_mengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_penelitian`
--
ALTER TABLE `riwayat_penelitian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarana_dan_prasarana`
--
ALTER TABLE `sarana_dan_prasarana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sejarah_sekolah`
--
ALTER TABLE `sejarah_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_bootcamp`
--
ALTER TABLE `siswa_bootcamp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa_product`
--
ALTER TABLE `siswa_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_home`
--
ALTER TABLE `slider_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_ppdb`
--
ALTER TABLE `slider_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_tentang_kami`
--
ALTER TABLE `slider_tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_unit_kerja`
--
ALTER TABLE `slider_unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smart_school`
--
ALTER TABLE `smart_school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_siswa`
--
ALTER TABLE `testimonials_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_sekolah`
--
ALTER TABLE `tugas_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kerja_help`
--
ALTER TABLE `unit_kerja_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_page_fasilitas_sekolah`
--
ALTER TABLE `unit_page_fasilitas_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apa_itu_ppdb`
--
ALTER TABLE `apa_itu_ppdb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel_blog`
--
ALTER TABLE `artikel_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `box_tentang_kami`
--
ALTER TABLE `box_tentang_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `config_background_gallery`
--
ALTER TABLE `config_background_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_prestasi`
--
ALTER TABLE `data_prestasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_down_menu`
--
ALTER TABLE `footer_down_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footer_up`
--
ALTER TABLE `footer_up`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foto_gallery`
--
ALTER TABLE `foto_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guru_milenial`
--
ALTER TABLE `guru_milenial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homecontentpage`
--
ALTER TABLE `homecontentpage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `homecontentsproducttwo`
--
ALTER TABLE `homecontentsproducttwo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homeruanginformasi`
--
ALTER TABLE `homeruanginformasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `homestatistik`
--
ALTER TABLE `homestatistik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_logo_our_clients`
--
ALTER TABLE `home_logo_our_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_selamat_datang`
--
ALTER TABLE `home_selamat_datang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi_ppdb`
--
ALTER TABLE `informasi_ppdb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan_tentang_kami`
--
ALTER TABLE `jurusan_tentang_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_gallery`
--
ALTER TABLE `kategori_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_siswa`
--
ALTER TABLE `kategori_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas_group`
--
ALTER TABLE `kelas_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `komentar_berita`
--
ALTER TABLE `komentar_berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `konten_dekat_footer`
--
ALTER TABLE `konten_dekat_footer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo_header`
--
ALTER TABLE `logo_header`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_page_unit_kerja`
--
ALTER TABLE `menu_page_unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `misi_tentang_kami`
--
ALTER TABLE `misi_tentang_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemerintah_provinsi`
--
ALTER TABLE `pemerintah_provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumpulan_tugas`
--
ALTER TABLE `pengumpulan_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persyaratan_calon_perserta`
--
ALTER TABLE `persyaratan_calon_perserta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppdb_guru_terbaik`
--
ALTER TABLE `ppdb_guru_terbaik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ppdb_pmb`
--
ALTER TABLE `ppdb_pmb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_mengajar`
--
ALTER TABLE `riwayat_mengajar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat_penelitian`
--
ALTER TABLE `riwayat_penelitian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sarana_dan_prasarana`
--
ALTER TABLE `sarana_dan_prasarana`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sejarah_sekolah`
--
ALTER TABLE `sejarah_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa_bootcamp`
--
ALTER TABLE `siswa_bootcamp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa_product`
--
ALTER TABLE `siswa_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_home`
--
ALTER TABLE `slider_home`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider_ppdb`
--
ALTER TABLE `slider_ppdb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider_tentang_kami`
--
ALTER TABLE `slider_tentang_kami`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider_unit_kerja`
--
ALTER TABLE `slider_unit_kerja`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smart_school`
--
ALTER TABLE `smart_school`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials_siswa`
--
ALTER TABLE `testimonials_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tugas_sekolah`
--
ALTER TABLE `tugas_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit_kerja_help`
--
ALTER TABLE `unit_kerja_help`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_page_fasilitas_sekolah`
--
ALTER TABLE `unit_page_fasilitas_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
