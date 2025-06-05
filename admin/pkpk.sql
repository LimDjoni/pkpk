-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2025 at 04:36 PM
-- Server version: 10.6.22-MariaDB
-- PHP Version: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkpktbk1_website`
--
CREATE DATABASE IF NOT EXISTS `pkpktbk1_website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pkpktbk1_website`;

-- --------------------------------------------------------

--
-- Table structure for table `announcementrups`
--

CREATE TABLE `announcementrups` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) DEFAULT NULL,
  `Title` varchar(5000) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `announcementrups`
--

INSERT INTO `announcementrups` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 12 November 2021', 'Announcement Extraordinary General Meeting of Shareholders (EGMS) November 12, 2021', 2021, '', '', 'Pengumuman_RUPSLB_PKPK_12_November_2021.pdf', '2021-11-12 15:15:18', NULL, '2021-12-13 14:15:32'),
(2, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 15 Juli 2021', 'Announcement Annual General Meeting of Shareholders (AGMS) July 15, 2021', 2021, '', '', 'Pengumuman_RUPST_PKPK_15_Juli_2021.pdf', '2021-07-15 15:20:23', NULL, '2021-12-13 14:15:23'),
(4, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 30 September 2020', 'Announcement Extraordinary General Meeting of Shareholders (EGMS) September 30, 2020', 2020, '', '', 'Pengumuman_RUPSLB_PKPK_30_September_2020.pdf', '2020-09-30 11:02:51', NULL, '2021-12-13 14:15:40'),
(5, 'Pengumuman Rapat Umum Pemegang Saham (RUPS) 23 Juli 2020', 'Announcement General Meeting of Shareholders (GMS) July 23, 2020', 2020, '', '', 'Pengumuman_RUPS_PKPK_23_Juli_2020.pdf', '2020-07-23 11:05:23', NULL, '2021-12-13 14:15:09'),
(6, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 23 Mei 2018', 'Announcement Annual General Meeting of Shareholders (AGMS) May 23, 2018', 2018, '', '', 'Pengumuman_RUPST_PKPK_23_Mei_2018.pdf', '2018-05-23 11:18:45', NULL, '2021-12-13 14:15:55'),
(7, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 24 Mei 2016', 'Announcement Annual General Meeting of Shareholders (AGMS) May 24, 2016', 2016, '', '', 'Pengumuman_RUPST_PKPK_24_Mei_2016.pdf', '2016-05-24 14:50:45', NULL, NULL),
(8, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 20 Desember 2015', 'Announcement Extraordinary General Meeting of Shareholders (EGMS) December 20, 2015', 2015, '', '', 'Pengumuman_RUPSLB_PKPK_29_Desember_2015.pdf', '2015-12-29 14:59:21', NULL, '2021-12-21 13:24:41'),
(9, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 16 Mei 2019', 'Announcement Annual General Meeting of Shareholders (AGMS) May 16, 2019', 2019, '', '', 'Pengumuman_RUPST_PKPK_16_Mei_2019.pdf', '2019-05-16 15:04:11', NULL, NULL),
(10, 'Pengumuman Rapat Umum Pemegang Saham (RUPS) 15 Mei 2017', 'Announcement General Meeting of Shareholders (GMS) May 15, 2017', 2017, '', '', 'Pengumuman_RUPS_PKPK_15_Mei_2017.pdf', '2017-05-15 15:07:48', NULL, NULL),
(11, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 8 Juni 2022', 'Announcement Annual General Meeting of Shareholders (AGMS) June 08, 2022', 2022, '', '', 'Pengumuman_RUPST_PKPK_08_Juni_2022.pdf', '2022-06-08 15:56:55', NULL, NULL),
(12, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 19 Agustus 2022', 'Announcement Extraordinary General Meeting of Shareholders (EGMS) August 19, 2022', 2022, '', '', 'PKPK - Surat Pengumuman RUPSLB.pdf', '2022-08-19 20:52:39', NULL, NULL),
(13, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 28 Februari 2023', 'Announcement Annual General Meeting of Shareholders (AGMS) February 28, 2023', 2023, '', '', 'Pengumuman RUPST 2023 - FINAL..pdf', '2023-01-19 14:41:14', NULL, NULL),
(14, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB), 27 Maret 2023', 'Announcement Extraordinary General Meeting of Shareholders (EGMS), March 27, 2023', 2023, '', '', 'Pengumuman RUPSLB PMHMETD 2023 - PRINT.pdf', '2023-03-27 10:41:45', NULL, NULL),
(15, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB), 15 Desember 2023', 'Announcement Extraordinary General Meeting of Shareholders (EGMS), December 15, 2023', 2023, '', '', 'PKPK - Pengumuman RUPSLB - SUBMIT.pdf', '2023-11-01 10:33:34', NULL, NULL),
(16, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 28 Mei 2024', ' 	Announcement Annual General Meeting of Shareholders (AGMS) May 28, 2024', 2024, '', '', 'PKPK - Pengumuman RUPSTahunan 2024 - SUBMIT.pdf', '2024-04-19 09:17:51', NULL, NULL),
(17, 'Pengumuman Rapat Umum Pemegang Saham Luar Biasa (RUPSLB), 8 Januari 2024', 'Announcement Extraordinary General Meeting of Shareholders (EGMS), January 8, 2024', 2024, '', '', 'PKPK-Pengumuman RUPSLB-SUBMIT.pdf', '2025-03-19 11:18:42', NULL, NULL),
(18, 'Pengumuman Rapat Umum Pemegang Saham Tahunan (RUPST) 10 Juni 2025', 'Announcement Annual General Meeting of Shareholders (AGMS) June 10, 2025', 2025, '', '', 'PKPK - Pengumuman RUPST Tahun Buku 2024 - SUBMIT.pdf', '2025-05-02 10:34:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `ID_Audit` int(11) NOT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `Revenue` float DEFAULT NULL,
  `ProfitBfTax` float DEFAULT NULL,
  `ProfitAttributable` float DEFAULT NULL,
  `EarningsPerShare` float DEFAULT NULL,
  `NonCurrentAsset` float DEFAULT NULL,
  `CurrentAssets` float DEFAULT NULL,
  `NonCurrentLia` float DEFAULT NULL,
  `CurrentLia` float DEFAULT NULL,
  `AttEquity` float DEFAULT NULL,
  `NavPerShare` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`ID_Audit`, `Year`, `Revenue`, `ProfitBfTax`, `ProfitAttributable`, `EarningsPerShare`, `NonCurrentAsset`, `CurrentAssets`, `NonCurrentLia`, `CurrentLia`, `AttEquity`, `NavPerShare`) VALUES
(1, 'FY2016', 8402370000, -22052900000, -13729500000, -25.45, 96269300000, 61433500000, 1006930000, 86910400000, 69785400000, 116.31),
(2, 'FY2017', 11148500000, -19518000000, -10411900000, -19.3, 95377300000, 42986000000, 74973700000, 3066610000, 59323000000, 98.87),
(3, 'FY2018', 6825410000, -169647000, -3744280000, -6.94, 91161800000, 36732700000, 71985800000, 329996000, 55578800000, 92.63),
(4, 'FY2019', 13253900000, -9492890000, -41250500000, -76.48, 58872500000, 12783000000, 57239900000, 87476500, 14328200000, 23.88),
(5, 'FY2020', 17334700000, 172167000, 53720900, 0.09, 61902900000, 6752830000, 26513400000, 1750790000, 40391500000, 67.32),
(6, 'FY2021', 3078120000, -1538880000, -379496000, -0.63, 57979300000, 6617840000, 24119100000, 466098000, 40012000000, 66.69);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `ID_CP` int(11) NOT NULL,
  `body_eng` text DEFAULT NULL,
  `body_indo` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`ID_CP`, `body_eng`, `body_indo`, `created_date`, `delete_date`, `update_date`) VALUES
(4, 'In 1983 PT Perdana Karya Perkasa Tbk (PKPK) was established primarily to support the operation of these oil and gas blocks by PT Vico Indonesia, Total E&P Indonesie, and PKPK\'s new customer since 2011 is Salamander Energy Ltd.\r\n\r\nSome time later, PKPK also expanded its business operations in other areas, such as in the Kangean and Pagerungan blocks for PT EMP Kangean, and most recently in the Sampang (Madura) area for Santos Energy Ltd, but basically PKPK\'s main business area is East Kalimantan. PKPK\'s business development in other sectors will later be carried out in the East Kalimantan region.\r\n\r\nPKPK\'s important business development in other sectors was coal transportation for PT Pamapersada Nusantara in Bontang in the late 1990s, then coal mining and the plantation support sector in 2005. The business development in the coal sector also marked the development of management, because together with PKPK carried out a Public Offering 20, 83% to the public, and listed its shares on the Indonesia Stock Exchange in July 2007.\r\n\r\nThe latest business sectors operated by PKPK are oil and gas supporting construction services for PT Vico Indonesia, Total E&P Indonesie, Salamander Energy Ltd, and Santos Energy Ltd, plantation services, including for the Smart group of companies, coal mining, and heavy equipment rental as a sector. support for these key business sectors.\r\n\r\nIn 2021, PT Deli Pratama Batubara acquired 900.000.000 shares or 75 percent of all issued and fully paid shares in PT Perdana Karya Perkasa Tbk.', 'Pada 1983 PT Perdana Karya Perkasa Tbk (PKPK) didirikan terutama adalah untuk menunjang pengoperasian blok-blok migas tersebut oleh PT Vico Indonesia, Total E&P Indonesie, dan pelanggan baru PKPK sejak 2011 adalah Salamander Energy Ltd.\r\n\r\nBeberapa kurun waktu sesudahnya, PKPK juga mengembangkan operasi usahanya di wilayah lain, seperti di blok Kangean dan Pagerungan untuk PT EMP Kangean, serta yang terbaru di wilayah Sampang (Madura) untuk Santos Energy Ltd, namun pada dasarnya wilayah usaha utama PKPK adalah Kalimantan Timur sedemikian rupa pengembangan usaha PKPK di sektor lainnya di kemudian hari dilakukan di wilayah Kalimantan Timur.\r\n\r\nPengembangan usaha penting PKPK di sektor lain adalah angkutan batubara untuk PT Pamapersada Nusantara di Bontang pada akhir 1990an, selanjutnya pertambangan batubara dan sektor penunjang perkebunan pada 2005. Pengembangan usaha di sektor batubara tersebut sekaligus menandai pengembangan manajemen, karena bersamaan dengan PKPK melaksanakan Penawaran Umum 20,83% kepada masyarakat, dan mencatatkan saham-sahamnya pada Bursa Efek Indonesia pada Juli 2007.\r\n\r\nSektor-sektor usaha terkini yang dioperasikan PKPK adalah jasa konstruksi penunjang migas untuk PT Vico Indonesia, Total E&P Indonesie, Salamander Energy Ltd, dan Santos Energy Ltd, jasa perkebunan, antara lain untuk grup perusahaan Smart, pertambangan batubara, serta sewa alat berat sebagai sektor penunjang bagi sektor-sektor usaha utama tersebut.\r\n\r\nPada tahun 2021, PT Deli Pratama Batubara mengakuisisi 900.000.000 lembar saham atau 75 persen dari seluruh saham yang ditempatkan dan disetor penuh dalam PT Perdana Karya Perkasa Tbk.', '2021-12-14 12:21:34', NULL, '2024-02-15 14:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `financialhighlight`
--

CREATE TABLE `financialhighlight` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) NOT NULL,
  `Title` varchar(5000) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Des` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `financialhighlight`
--

INSERT INTO `financialhighlight` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Lembar Sorotan Produk', 'Product Highlights Sheet', 2021, '', '', 'Product-Highlights-Sheet-dated-14-Jan-2020.pdf', '2021-05-25 15:16:25', NULL, '2021-12-10 10:10:36'),
(2, 'Financial Highlight 2020', '', 2020, 'Financial Highlight 2020', '', 'DNS.pdf', '2021-05-25 15:32:05', '2021-12-09 14:40:39', '2021-05-25 15:36:02'),
(3, 'Product Highlights Sheet 2019', '', 2019, 'Product Highlights Sheet 2019', '', 'DPAL.pdf', '2021-05-25 15:35:21', '2021-12-09 14:40:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financialstatement`
--

CREATE TABLE `financialstatement` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) NOT NULL,
  `Title` varchar(5000) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Des` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `financialstatement`
--

INSERT INTO `financialstatement` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(3, 'Laporan Keuangan 31 Maret 2020 (Tidak Diaudit)', 'Financial Statement as of March 31, 2020 (Unaudited)', 2020, '', '', 'LKTW_I_2020_PKPK.pdf', '2020-03-31 13:04:43', NULL, '2021-12-09 13:54:45'),
(4, 'Laporan Keuangan 30 Juni 2020 (Tidak Diaudit)', 'Financial Statement as of June 30, 2020 (Unaudited)', 2020, '', '', 'LKTW_II_2020_PKPK.pdf', '2020-06-30 13:20:05', NULL, '2021-12-09 13:57:21'),
(5, 'Laporan Keuangan 31 Desember 2019', 'Financial Statement as of December 31, 2019 ', 2019, '', '', 'LKT_2019_PKPK_audited.pdf', '2019-12-31 13:26:21', NULL, '2021-12-09 13:59:34'),
(7, 'Laporan Keuangan 31 Maret 2019 (Tidak Diaudit)', 'Financial Statement as of March 31, 2019 (Unaudited)', 2019, '', '', 'LKTW_I_2019_PKPK.pdf', '2019-03-31 13:32:04', NULL, '2021-12-09 14:00:08'),
(8, 'Laporan Keuangan 30 Juni 2019 (Tidak Diaudit)', 'Financial Statement as of June 30, 2019 (Unaudited)', 2019, '', '', 'LKTW_II_2019_PKPK.pdf', '2019-06-30 14:13:02', NULL, NULL),
(9, 'Laporan Keuangan 30 September 2019 (Tidak Diaudit)', 'Financial Statement as of September 30, 2019 (Unaudited)', 2019, '', '', 'LKTW_III_2019_PKPK.pdf', '2019-09-30 09:21:49', NULL, NULL),
(10, 'Laporan Keuangan 31 Desember 2018', 'Financial Statement as of December 31, 2018', 2018, '', '', 'LKT_2018_PKPK.pdf', '2018-12-31 09:23:32', NULL, NULL),
(11, 'Laporan Keuangan 31 Maret 2018 (Tidak Diaudit)', 'Financial Statement as of March 31, 2018 (Unaudited)', 2018, '', '', 'LKTW_I_2018_PKPK.pdf', '2018-03-31 09:24:17', NULL, NULL),
(12, 'Laporan Keuangan 30 Juni 2018 (Tidak Diaudit)', 'Financial Statement as of June 30, 2018 (Unaudited)', 2018, '', '', 'LKTW_II_2018_PKPK.pdf', '2018-06-30 09:24:56', NULL, NULL),
(13, 'Laporan Keuangan 30 September 2018 (Tidak Diaudit)', 'Financial Statement as of September 30, 2018 (Unaudited)', 2018, '', '', 'LKTW_III_2018_PKPK.pdf', '2018-09-30 09:26:51', NULL, NULL),
(14, 'Laporan Keuangan 31 Desember 2017', 'Financial Statement as of December 31, 2017', 2017, '', '', 'LKT_2017_PKPK.pdf', '2017-12-31 09:27:36', NULL, NULL),
(15, 'Laporan Keuangan 31 Maret 2017 (Tidak Diaudit)', 'Financial Statement as of March 31, 2017 (Unaudited)', 2017, '', '', 'LKTW_I_2017_PKPK.pdf', '2017-03-31 09:29:59', NULL, NULL),
(16, 'Laporan Keuangan 30 Juni 2017 (Tidak Diaudit)', 'Financial Statement as of June 30, 2017 (Unaudited)', 2017, '', '', 'LKTW_II_2017_PKPK.pdf', '2017-06-30 09:30:44', NULL, NULL),
(17, 'Laporan Keuangan 30 September 2017 (Tidak Diaudit)', 'Financial Statement as of September 30, 2017 (Unaudited)', 2017, '', '', 'LKTW_III_2017_PKPK.pdf', '2017-09-30 09:32:50', NULL, NULL),
(18, 'Laporan Keuangan 31 Desember 2016', 'Financial Statement as of December 31, 2016', 2016, '', '', 'LKT_2016_PKPK.pdf', '2016-12-31 09:33:36', NULL, NULL),
(19, 'Laporan Keuangan 31 Maret 2016 (Tidak Diaudit)', 'Financial Statement as of March 31, 2016 (Unaudited)', 2016, '', '', 'LKTW_I_2016_PKPK.pdf', '2016-03-31 09:34:20', NULL, NULL),
(20, 'Laporan Keuangan 30 Juni 2016 (Tidak Diaudit)', 'Financial Statement as of June 30, 2016 (Unaudited)', 2016, '', '', 'LKTW_II_2016_PKPK.pdf', '2016-06-30 09:34:56', NULL, NULL),
(21, 'Laporan Keuangan 30 September 2016 (Tidak Diaudit)', 'Financial Statement as of September 30, 2016 (Unaudited)', 2016, '', '', 'LKTW_III_2016_PKPK.pdf', '2016-09-30 09:35:35', NULL, NULL),
(22, 'Laporan Keuangan 31 Desember 2015', 'Financial Statement as of December 31, 2015', 2015, '', '', 'LK_2015_PKPK.pdf', '2015-12-31 09:37:36', NULL, NULL),
(23, 'Laporan Keuangan 31 Maret 2015 (Tidak Diaudit)', 'Financial Statement as of March 31, 2015 (Unaudited)', 2015, '', '', 'LKT_2015_PKPK.pdf', '2015-03-31 09:38:39', NULL, NULL),
(24, 'Laporan Keuangan 30 Juni 2015 (Tidak Diaudit)', 'Financial Statement as of June 30, 2015 (Unaudited)', 2015, '', '', 'LKTT_2015_PKPK.pdf', '2015-06-30 09:39:10', NULL, NULL),
(25, 'Laporan Keuangan 30 September 2015 (Tidak Diaudit)', 'Financial Statement as of September 30, 2015 (Unaudited)', 2015, '', '', 'LKTW3_2015_PKPK.pdf', '2015-09-30 09:39:42', NULL, NULL),
(26, 'Laporan Keuangan 30 September 2020 (Tidak Diaudit)', 'Financial Statement as of September 30, 2020 (Unaudited)', 2020, '', '', 'LKTW_III_2020_PKPK.pdf', '2020-09-30 16:55:01', NULL, NULL),
(27, 'Laporan Keuangan 31 Desember 2020', 'Financial Statement as of December 31, 2020', 2020, '', '', 'LKT_2020_PKPK.pdf', '2020-12-31 16:58:20', NULL, '2021-12-10 16:58:52'),
(28, 'Laporan Keuangan 31 Maret 2021 (Tidak Diaudit)', 'Financial Statement as of March 31, 2021 (Unaudited)', 2021, '', '', 'LKTW_I_2021_PKPK.pdf', '2021-03-31 16:59:59', NULL, '2021-12-10 17:00:11'),
(29, 'Laporan Keuangan 30 Juni 2021 (Tidak Diaudit)', 'Financial Statement as of June 30, 2021 (Unaudited)', 2021, '', '', 'LKTW_II_2021_PKPK.pdf', '2021-06-30 17:00:36', NULL, NULL),
(30, 'Laporan Keuangan 30 September 2021 (Tidak Diaudit)', 'Financial Statement as of September 30, 2021 (Unaudited)', 2021, '', '', 'LKTW_III_2021_PKPK.pdf', '2021-09-30 17:02:14', NULL, NULL),
(31, 'Laporan Keuangan 31 Desember 2021 (Audit)', 'Financial Statement as of December 31, 2021 (Audited)', 2021, '', '', 'LKT_2021_PKPK_Audited.pdf', '2022-04-12 17:08:07', NULL, NULL),
(32, 'Laporan Keuangan 31 Maret 2022 (Tidak Diaudit)', 'Financial Statement as of  March 31, 2022 (Unaudited)', 2022, '', '', 'LKTW_I_2022_PKPK.pdf', '2022-05-31 21:32:09', NULL, NULL),
(33, 'Laporan Keuangan 30 Juni 2022 (Audit)', 'Financial Statement as of June 30, 2022 (Audited)', 2022, '', '', 'LKTW_II_2022_PKPK.pdf', '2022-08-31 14:01:01', NULL, NULL),
(34, 'Laporan Keuangan 31 Desember 2022 (Audit)', 'Financial Statement as of December 31, 2022 (Audited)', 2022, '', '', 'Report Audit PT Perdana Karya Perkasa_31 Dec 22.pdf', '2023-02-12 11:42:45', NULL, NULL),
(35, 'Laporan Keuangan 31 Maret 2023 (Tidak Diaudit)', 'Financial Statement as of March 31, 2023 (Unaudited)', 2023, '', '', 'LKTW I 2023 PKPK.pdf', '2023-06-06 11:55:35', NULL, NULL),
(36, 'Laporan Keuangan 30 September 2022 (Tidak Diaudit)', 'Financial Statement as of September 30, 2022 (Unaudited)', 2022, '', '', 'LKTW III 2022 PKPK.pdf', '2022-09-30 11:56:42', NULL, NULL),
(37, 'Laporan Keuangan 30 Juni 2023 (Tidak Diaudit)', 'Financial Statement as of June 30, 2023 (Unaudited)', 2023, '', '', 'Perdana Karya Perkasa Tbk - 30 Juni 2023..pdf', '2023-08-14 11:11:25', NULL, '2023-08-14 11:14:14'),
(38, 'Laporan Keuangan 30 September 2023 (Tidak Diaudit)', 'Financial Statement as of  September 30, 2023 (Unaudited)', 2023, '', '', 'LKTW III 2023 PKPK.pdf', '2023-10-30 13:40:20', NULL, NULL),
(39, 'Laporan Realisasi Penggunaan Dana Hasil Penawaran Umum per 31 Desember 2023', 'Report on the Realization of Use of Public Offering Proceeds as of December 31, 2023', 2023, '', '', 'Laporan Realisasi Penggunaan Dana Hasil PMHMETD-2023-SUBMIT.pdf', '2024-01-12 10:06:04', NULL, '2024-01-12 10:08:39'),
(40, 'Laporan Realisasi Penggunaan Dana Hasil Penawaran Umum per 8 Januari 2024', 'Report on the Realization of Use of Public Offering Proceeds as of January 8, 2024', 2024, '', '', 'Laporan Realisasi Penggunaan Dana Hasil PMHMETD-2024-SUBMIT.pdf', '2024-01-12 10:07:36', NULL, NULL),
(41, 'Laporan Keuangan 31 Desember 2023 (Audit)', 'Financial Statement as of December 31, 2023 (Audited)', 2023, '', '', 'LKT 2023 Audited.pdf', '2024-02-28 10:14:56', NULL, NULL),
(42, 'Laporan Keuangan Konsolidasian Interim Per 31 Maret 2024 dan 31 Desember 2023 dan Untuk Periode Tiga Bulan Yang Berakhir Pada Tanggal-Tanggal 31 Maret 2024 dan 2023', 'Interim Consolidated Financial Statements As Of March 31, 2024 and December 31, 2023 and For The Three-Month Periods Ended March 31, 2024 and 2023', 2024, '', '', 'LKTW I 2024.pdf', '2024-04-29 15:59:21', NULL, NULL),
(43, 'Laporan Keuangan 30 Juni 2024 (Tidak Diaudit)', ' Financial Statement as of June 30, 2024 (Unaudited)', 2024, '', '', 'PKPK - LK TW II - 2024..pdf', '2024-07-30 12:44:24', NULL, '2024-08-06 12:42:01'),
(44, 'Laporan Keuangan Konsolidasian Interim Per 30 September 2024 dan 31 Desember 2023 dan untuk Periode Sembilan Bulan Yang Berakhir Pada Tanggal-Tanggal 30 September 2024 dan 2023', 'Interim Consolidated Financial Statements As Of September 30, 2024 and December 31, 2023 and For The Nine-Month Periods Ended September 30, 2024 and 2023', 2024, '', '', 'LK TW III PKPK 30 Sept 2024.pdf', '2024-10-31 08:55:27', NULL, NULL),
(45, 'LAPORAN KEUANGAN KONSOLIDASIAN PER 31 DESEMBER 2024 DAN UNTUK TAHUN YANG BERAKHIR PADA TANGGAL TERSEBUT BESERTA LAPORAN AUDITOR INDEPENDEN', 'CONSOLIDATED FINANCIAL STATEMENTS AS OF DECEMBER 31, 2024 AND FOR THE YEAR THEN ENDED WITH INDEPENDENT AUDITORâ€™S REPORT', 2024, '', '', 'LKT Konsolidasian Audited 2024.pdf', '2025-03-25 19:21:55', NULL, NULL),
(46, 'LAPORAN KEUANGAN KONSOLIDASIAN INTERIM PER 31 MARET 2025 DAN 31 DESEMBER 2024 DAN UNTUK PERIODE TIGA BULAN YANG BERAKHIR PADA TANGGAL-TANGGAL 31 MARET 2025 DAN 2024', 'INTERIM CONSOLIDATED FINANCIAL STATEMENTS AS OF MARCH 31, 2025 AND DECEMBER 31, 2024 AND FOR THE THREE-MONTH PERIODS ENDED MARCH 31, 2025 AND 2024', 2025, '', '', 'LK TW 1 2025 - PKPK .pdf', '2025-04-30 11:22:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gcg`
--

CREATE TABLE `gcg` (
  `ID_GCG` int(11) NOT NULL,
  `OverviewEng` text DEFAULT NULL,
  `OverviewInd` text DEFAULT NULL,
  `RaNEng` text DEFAULT NULL,
  `RaNInd` text DEFAULT NULL,
  `IAEng` text DEFAULT NULL,
  `IAInd` text DEFAULT NULL,
  `ICEng` text DEFAULT NULL,
  `ICInd` text DEFAULT NULL,
  `RMEng` text DEFAULT NULL,
  `RMInd` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gcg`
--

INSERT INTO `gcg` (`ID_GCG`, `OverviewEng`, `OverviewInd`, `RaNEng`, `RaNInd`, `IAEng`, `IAInd`, `ICEng`, `ICInd`, `RMEng`, `RMInd`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'In the face of increasingly challenging business and competitive environment, The Company commits to carry out Good Corporate Governance (GCG) in the daily business activities with the aim of improving performance and corporate values. The Company believes that through continuous implementation of GCG, the Company can survive in the midst of difficult situations and challenges.\r\n\r\nIn its implementation, the Company is oriented to the laws, regulations, practices and GCG recommendations that are believed will increase the value of Shareholders and Business Partners in long term. The commitment of the management to continuously improve and enhance GCG is expected to be able to push financial performance to the fullest. The growing performance will ultimately bring the Company to sustainable growth and always be able to increase contributions for all stakeholders.\r\n\r\nThere are 5 (five) GCG principles implemented by the Company:\r\n1. Transparency\r\nTransparency in the decision making process as well as in disclosing material information and relevant about the Company.\r\n\r\n2. Accountability\r\nClarity of functions, implementation and accountability of company organizations so that the management is performed effectively.\r\n\r\n3. Responsibility\r\nConformity in the Company management to the laws and regulations and principles of sound Corporation.\r\n\r\n4. Independence\r\nthe Company is managed professionally without conflict of interest and influence/pressure from any party.\r\n\r\n5. Fairness\r\nFairness and equality in meeting the rights of Stakeholders arising pursuant to agreements and regulations.', 'Dalam menghadapi lingkungan bisnis dan kompetisi yang semakin menantang, Perseroan berkomitmen untuk melakukan praktik Tata Kelola Perusahaan yang baik (Good Corporate Governance) dalam kegiatan usaha sehari-hari dengan tujuan meningkatkan kinerja dan nilai Perseroan. Perseroan percaya bahwa melalui penerapan GCG secara berkelanjutkan maka Perseroan mampu bertahan di tengah situasi dan tantangan yang sulit sekalipun.\r\n\r\nDalam penerapannya, Perseroan berorientasi kepada undang-undang, peraturan, praktik dan rekomendasi GCG yang diyakini secara jangka panjang akan meningkatkan nilai Pemegang Saham dan Mitra Usaha. Komitmen manajemen untuk terus memperbaiki dan meningkatkan GCG diharapkan akan mampu mendorong kinerja keuangan secara maksimal. Kinerja yang tumbuh pada akhirnya akan membawa Perseroan pada pertumbuhan yang berkelanjutan dan senantiasa mampu meningkatkan kontribusi bagi seluruh pemangku kepentingan.\r\n\r\nTerdapat 5 (lima) prinsip GCG yang diterapkan Perseroan:\r\n1. Transparansi\r\nKeterbukaan dalam melaksanakan proses pengambilan keputusan dan keterbukaan dalam mengungkapkan informasi material dan relevan mengenai Perseroan.\r\n\r\n2. Akuntabilitas\r\nKejelasan fungsi, pelaksanaan dan pertanggungjawaban organisasi sehingga pengelolaan terlaksana secara efektif.\r\n\r\n3. Pertanggungjawaban\r\nKesesuaian di dalam pengelolaan Perseroan terhadap peraturan perundang-undangan dan prinsip-prinsip korporasi yang sehat.\r\n\r\n4. Kemandirian\r\nPerseroan dikelola secara profesional tanpa benturan kepentingan dan pengaruh/tekanan dari pihak manapun.\r\n\r\n5. Kewajaran\r\nKeadilan dan kesetaraan dalam memenuhi hak-hak pemangku kepentingan yang timbul berdasarkan perjanjian dan perundang-undangan.', 'The Nomination and Remuneration Committee is established by and responsible to the Board of Commissioners. The Nomination and Remuneration Committee members have met the criteria and expertise as defined in the Financial Services Authority (Otoritas Jasa Keuangan) Regulation No. 34/POJK.04/ 2014.\r\n\r\n<b>The main tasks of the Nomination & Remuneration Committee are as follow:</b>\r\n1. Provide recommendations to the Board of Commissioners regarding the composition of the positions, requirements and evaluation criteria for the performance assessment, capacity building and the nomination of election of the Board member of Directors and/or Commissioners.\r\n\r\n2. Provide recommendations to the Board of Commissioners regarding the structure, policies and remuneration, and the conformity assessment of remuneration to the performance of the Board member of Directors and/ or Commissioners.', 'Komite Nominasi dan Remunerasi dibentuk oleh dan bertanggung jawab kepada Dewan Komisaris. Anggota Komite Nominasi dan Remunerasi telah memenuhi kriteria dan keahlian sebagaimana dimaksud dalam Peraturan OJK No. 34/POJK.04/2014.\r\n\r\n<b>Tugas utama Komite Nominasi & Remunerasi:</b>\r\n1. Memberikan rekomendasi kepada Dewan Komisaris mengenai komposisi jabatan, kriteria persyaratan & evaluasi penilaian kinerja, pengembangan kemampuan & nominasi pemilihan anggota Direksi dan/atau Dewan Komisaris.\r\n\r\n2. Memberikan rekomendasi kepada Dewan Komisaris mengenai struktur, kebijakan dan besaran remunerasi, dan penilaian kesesuaian remunerasi terhadap kinerja anggota Direksi dan/ atau Dewan komisaris.', 'In line with the Company\'s efforts to enhance the value of strong internal governance and improve operations, an Internal Audit Unit was formed, following POJK 56/2015.\r\n\r\n<b>The Corporate Internal Audit structure is as follows:</b>\r\n1. Internal Audit Chairman is appointed and dismissed directly by the President Director with the Board of Commissioners approval, and therefore, is directly responsible to the President Director.\r\n\r\n2. The Internal Audit has main task to create and submit audit report concerning the implementation of management decision, either one that has been done, is being done, or has not carried out, to the President Director and the Board of Commissioners.\r\n\r\n3. In the execution of its duties, the Internal Audit coordinates and cooperates with the Audit Committee.\r\n\r\n<b>Internal Audit Charter</b>\r\nIn accordance with Financial Services Authority Regulation Number 56 /POJK.04/2015 concerning the Establishment and Guidelines for the Preparation of the Internal Audit Unit Charter, the Company has prepared an Internal Audit Charter in 2023. The Internal Audit Charter outlines the Internal Audit Unit\'s structure and position, duties and responsibilities, roles, authorities, code of conduct, competency, independency, accountability andÂ workÂ relations.', 'Sejalan dengan usaha Perseroan untuk meningkatkan nilai tata kelola internal yang kuat dan memperbaiki operasional, maka dibentuk Unit Audit Internal, sesuai dengan POJK 56/2015.\r\n\r\n<b>Struktur Audit Internal Perseroan adalah sebagai berikut:</b>\r\n1. Ketua Audit Internal diangkat dan diberhentikan secara langsung oleh Direktur Utama dengan persetujuan Dewan Komisaris, oleh karenanya bertanggung jawab kepada Direktur Utama.\r\n\r\n2. Tugas utama audit internal adalah membuat dan menyampaikan laporan audit tentang implementasi keputusan manajemen, baik yang telah, sedang dan yang belum dilaksanakan kepada Direktur Utama dan Dewan Komisaris.\r\n\r\n3. Dalam pelaksanaan tugasnya Audit Internal berkoordinasi dan bekerjasama dengan Komite Audit.\r\n\r\n<b>Piagam Audit Internal</b>\r\nSesuai dengan Peraturan Otoritas Jasa Keuangan Nomor 56 /POJK.04/2015 tentang Pembentukan dan Pedoman Penyusunan Piagam Unit Audit Internal, Perseroan telah menyusun Piagam Audit Internal pada tahun 2023. Piagam Audit Internal secara garis besar memuat struktur dan kedudukan, tugas dan tanggungjawab, peranan, wewenang, kode etik, kompetensi, independensi, pertanggungjawaban, sertaÂ hubunganÂ kerja.', 'The existing internal control system in the Company leads to aspects of compliance with applicable laws and regulations. The financial and operational controls in the Company are as follows:\r\n\r\n1. The Board of Commissioners supervises and provides advices regarding the Companyâ€™s management process, business development, and risk management by applying the precautionary principle.\r\n\r\n2. The Board of Directors develops the Companyâ€™s internal control system so that it can function effectively.\r\n\r\n3. The Internal Audit Unit assists the President Director in carrying out internal audits of the Companyâ€™s finances and operations; and providing suggestions for improvement.\r\n\r\n4. The Audit Committee evaluates the implementation of audit by the Internal Audit.\r\n\r\n<b>Evaluation of the Effectiveness of the Internal Control System  </b>\r\nThe Board of Directors had established the Internal Audit Unit as the work unit responsible for implementing the internal control function as part of the Companyâ€™s efforts to evaluate the effectiveness of the internal control system within the Company, which includes the financial control system, operational and compliance with laws and regulations.', 'Sistem pengendalian internal yang ada dalam Perseroan mengarah pada aspek kepatuhan terhadap peraturan perundang- undangan yang berlaku. Pengendalian keuangan dan operasional di Perseroan diselenggarakan sebagai berikut:\r\n\r\n1. Dewan Komisaris melakukan pengawasan dan memberikan saran terkait proses pengelolaan perusahaan, pengembangan usaha, serta pengelolaan risiko dengan menerapkan prinsip kehati-hatian.\r\n\r\n2. Direksi mengembangkan sistem pengendalian internal perusahaan agar dapat berfungsi secara efektif.\r\n\r\n3. Unit Audit Internal membantu Direktur Utama dalam melaksanakan audit internal keuangan dan operasional perusahaan serta memberikan saran-saran perbaikan.\r\n\r\n4. Komite Audit menilai pelaksanaan audit yang dilakukan oleh Internal Audit.\r\n\r\n<b>Evaluasi Terhadap Efektivitas Sistem Pengendalian Internal</b>\r\nDireksi membentuk Unit Kerja Internal Audit sebagai unit kerja Perseroan yang bertugas menjalankan fungsi pengendalian internal. Hal ini merupakan upaya Perseroan sebagai langkah evaluasi terhadap efektivitas sistem pengendalian internal di lingkungan Perseroan, yang meliputi sistem pengendalian keuangan, operasional dan kepatuhan terhadap peraturan perundang-undangan.', 'The Company implements the risk management system to control all the risks that may lead disruption to business operations. The Company\'s business activities are not free from risk factors, which if managed properly can not only reduce the potential for servitude in doing business but can be a lever in increasing business.\r\n\r\nRisk management is carried out in line with GCG implementation. Each of identification and monitoring of risks that could arise and affect to operational activities and company business shall followed up with the assessment and risks analysis, and be described in risk profiles to determine the action plans of necessary prevention and mitigation needed, based on the clear and measurable method and system within the management of risks.\r\n\r\n<b>The Companyâ€™s Risk Profile</b>\r\nThe Companyâ€™s operations are affected by various risks. In 2020, the Company yet again had identified, assessed, managed and monitored the risks inherent in all of the Companyâ€™s operational and strategic functions. The risks the Company is exposed to are as follows:\r\n1. Construction Industryâ€™s Growth Risk\r\nThe potential impact of the global and domestic economic slowdown caused by Covid-19 pandemic could slow the construction industryâ€™s growth in oil and gas sector. In addition, this risk can adversely affect the Companyâ€™s business activities, operating performance, financial condition and business prospect.\r\n\r\n2. Business Competition Risk\r\nThe domestic oil and gas construction services business in Indonesia is growing increasingly competitive. This is indicated by the escalating price war between contractors. In order to stay ahead of the competition, the Company continues to provide the best service by optimizing existing resources. The competition risk can adversely affect the Companyâ€™s business activities, operating performance, financial condition and business prospect.\r\n\r\n3. Social & Political Risk\r\nThe changing dynamics of socio-political climate can have a significant impact on the economic sector, especially in oil and gas sector. This risk arises due to changes in the socio-political climate and the governmentâ€™s strategic decisions related to ideological, political, economic, social, cultural, and defense and security matters.\r\n\r\nThe emergence of this risk can lead to subsequent risks, such as the likelihood of investors postponing direct investment while waiting for the socio-political climate to stabilize. If such a risk were to occur, numerous business activities in various industrial sectors may slow down or even ceased. This could lower the number of the Companyâ€™s works/projects that could adversely affect the Companyâ€™s business activities, operating performance, financial condition, and business prospect.\r\n\r\n<b>Evaluation of Risk Management System Implementation</b>\r\nThe management periodically evaluates the effectiveness of the Companyâ€™s risk management system, and works together with the project heads to evaluate project performance.', 'Perusahaan menerapkan pengelolaan sistem manajemen risiko untuk mengendalikan semua risiko yang dapat menyebabkan gangguan terhadap kegiatan operasional dan bisnis perusahaan. Kegiatan usaha Perseroan tidak luput dari faktor risiko, yang bila dikelola dengan baik tidak hanya dapat mengurangi potensi hambaatan dalam berusaha namun dapat menjadi pengungkit peningkatan usaha.\r\n\r\nPengelolaan risiko dilaksanakan sejalan dengan implementasi GCG. Setiap pengidentifikasian dan pemantauan risiko yang mungkin dapat timbul dan berdampak terhadap aktifitas operasional dan bisnis perusahaan ditindak lanjuti dengan penilaian dan analisis risiko dan mendeskripsikannya dalam profil risiko untuk menetapkan rencana-rencana tindakan pencegahan dan mitigasi yang diperlukan berdasarkan metode dan sistem yang jelas dan terukur dalam pengelolaan risiko.\r\n\r\n<b>Profil Risiko Perseroan</b>\r\nOperasional Perseroan dipengaruhi oleh berbagai macam risiko. Sepanjang 2020, Perseroan kembali melakukan identifikasi, penilaian, penanganan, dan pemantauan terhadap risiko-risiko yang melekat pada seluruh fungsi operasional dan strategis Perusahaan. Sedangkan, profil risiko yang mungkin dihadapi Perseroan adalah sebagai berikut:\r\n1. Risiko Pertumbuhan Industri Konstruksi\r\nPotensi dampak penurunan ekonomi secara global maupun domestik akibat pandemi Covid-19 dapat mengakibatkan pelambatan pertumbuhan industri konstruksi sektor migas. Selanjutnya, potensi risiko ini dapat memberikan dampak negatif terhadap kegiatan usaha, kinerja operasional, kondisi keuangan dan prospek usaha Perseroan.\r\n\r\n2. Risiko Persaingan Usaha\r\nKondisi sektor bisnis jasa konstruksi migas di Indonesia semakin kompetitif. Hal ini ditandai dengan terjadinya peningkatan persaingan harga antar kontraktor. Untuk tetap memenangkan persaingan, Perseroan senantiasa memberikan pelayanan terbaik dengan mengoptimalkan sumber daya yang ada. Risiko persaingan risiko dapat menimbulkan dampak negatif terhadap kegiatan usaha, kinerja operasional, kondisi keuangan, dan prospek usaha Perseroan.\r\n\r\n3. Risiko Sosial & Politik\r\nDinamika perubahan sosial-politik dapat menimbulkan dampak yang besar terhadap sektor ekonomi, khususnya sektor migas. Risiko ini muncul akibat adanya perubahan situasi sosial-politik dan keputusan strategis negara yang terkait dengan faktor ideologi, politik, ekonomi, sosial, budaya dan pertahanan keamanan.\r\n\r\nMunculnya risiko ini dapat menimbulkan risiko berikutnya, seperti potensi dari investor untuk menahan investasi langsung karena menunggu kondisi sosial-politik yang stabil. Bila hal tersebut terjadi, maka dikhawatirkan kegiatan usaha di berbagai sektor industri akan menurun atau bahkan terhenti. Terjadinya hal tersebut dapat mengurangi pekerjaan/proyek Perseroan yang berpotensi dapat memengaruhi secara negatif terhadap kegiatan usaha, kinerja operasional, kondisi keuangan, dan prospek usaha Perseroan.\r\n\r\n<b>Evaluasi Penerapan Sistem Manajemen Risiko</b>\r\nManajemen melakukan evaluasi terhadap efektivitas sistem manajemen risiko Perseroan secara berkala, dan bekerja sama dengan kepala proyek dalam mengevaluasi kinerja proyek.', '2021-12-17 13:36:13', NULL, '2025-04-29 12:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `gcg2`
--

CREATE TABLE `gcg2` (
  `ID_GCG2` int(11) NOT NULL,
  `ID_GCG` int(11) DEFAULT NULL,
  `COCEng` text DEFAULT NULL,
  `COCInd` text DEFAULT NULL,
  `WhistleEng` text DEFAULT NULL,
  `WhistleInd` text DEFAULT NULL,
  `IaDEng` text DEFAULT NULL,
  `IaDInd` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gcg2`
--

INSERT INTO `gcg2` (`ID_GCG2`, `ID_GCG`, `COCEng`, `COCInd`, `WhistleEng`, `WhistleInd`, `IaDEng`, `IaDInd`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 1, 'Ethics are the basic foundation for the Company, all management, and employees in carrying out their duties and responsibilities, including maintaining integrity and professionalism at work. The Company is equipped with Code of Conduct ratified in 2015. The Code of Conduct regulates values or norms that are explicitly stated as behavior standard that applies to and must be obeyed by the Board of Commissioners, Board of Directors, the Management, and all employees in carrying out their duties according to their respective positions.\r\n\r\nThe contents of the Code of Conduct are as follows:\r\n1. Introduction\r\n2. Vision, Mission and Values\r\n3. Code of Conduct Policy\r\n4. Enforcement Mechanism\r\n5. Reward and Punishment\r\n\r\nThe Company consistently disseminates its Code of Conduct. Each member of the Company is able to submit reports of violations or suspected violations that occur within the Company.', 'Etika merupakan dasar dasar bagi Perseroan, seluruh manajemen dan karyawan dalam melaksanakan tugas dan tanggung jawabnya, termasuk menjaga integritas dan profesionalisme dalam bekerja. Perseroan mempunyai Pedoman Perilaku (Code of Conduct) yang disahkan pada tahun 2015. Pedoman Perilaku ini mengatur kebijakan nilai atau norma yang dinyatakan secara eksplisit sebagai suatu standar perilaku yang berlaku bagi dan harus dipatuhi oleh Dewan Komisaris, Direksi, Manajemen, dan seluruh karyawan dalam melaksanakan tugas sesuai jabatan masing-masing.\r\n\r\nIsi dari Pedoman Perilaku Perseroan adalah antara lain sebagai berikut:\r\n1. Pendahuluan\r\n2. Visi, Misi, dan Nilai Perseoran\r\n3. Kebijakan Perilaku Perseroan\r\n4. Mekanisme Penegakan\r\n5. Penghargaan dan Sanksi\r\n\r\nPerseroan melakukan sosialisasi Pedoman Perilaku yang dimiliki secara konsisten. Setiap karyawan Perseroan dapat menyampaikan laporan atas pelanggaran atau dugaan pelanggaran yang terjadi di lingkungan Perseroan.', 'The Company has a mechanism so that every violation that arises is known by management, in addition to being investigated and taking action to prevent any potential violations that arise.', 'Perseroan telah memiliki mekanisme agar setiap pelanggaran yang muncul diketahui oleh manajemen, selain untuk diinvestigasi dan penindakan juga untuk mencegah setiap potensi pelanggaran yang muncul.', 'Dissemination of information and data relating to the company\'s performance and activities are regularly conducted through various media, such as the GMS, Annual Reports, periodic Financial Statements, public exposes, press releases, printed advertising media, stock exchange electronic reporting systems (BEI\'s e-reporting) as well as corporateâ€™s website at: http://www.pkpk-tbk.co.id.', 'Penyebaran informasi dan data berkaitan dengan kinerja dan kegiatan Perseroan dilakukan secara berkala melalui berbagai media, seperti RUPS, Laporan Tahunan, Laporan Keuangan berkala, paparan publik, siaran pers, iklan media cetak, sarana pelaporan elektronik (e-reporting) Bursa, dan melalui website Perseroan di: http://www.pkpk-tbk.co.id.', '2021-12-17 13:36:13', NULL, '2025-04-29 12:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `growth_journey`
--

CREATE TABLE `growth_journey` (
  `ID_GJ` int(11) NOT NULL,
  `Deskripsi` text DEFAULT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `title` varchar(5000) DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Judul` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `growth_journey`
--

INSERT INTO `growth_journey` (`ID_GJ`, `Deskripsi`, `PDF`, `Tahun`, `title`, `Des`, `Judul`, `created_date`, `delete_date`, `update_date`) VALUES
(3, 'Perusahaan didirikan dengan nama PT Perdana Karya Kaltim', 'growth-journey-1.jpg', 1983, 'Establishment', 'The company was established under the name PT Perdana Karya Kaltim', 'Pendirian', '1983-12-14 17:10:32', NULL, '2021-12-15 11:00:38'),
(5, 'Perubahan nama menjadi PT Perdana Karya Perkasa', 'growth-journey-12-_resized360x260.jpeg', 2006, 'Perdana Karya Perkasa First Known', 'Change of name to PT Perdana Karya Perkasa', 'Perdana Karya Perkasa Pertama Dikenal', '2006-12-15 11:19:23', NULL, NULL),
(6, 'Mencatatkan sahamnya di Bursa Efek Indonesia sektor riil bidang pertambangan batubara', 'growth-journey-10-_resized360x260.jpg', 2007, 'Stock Exchange', 'Listing its shares on the Indonesia Stock Exchange in the real sector of coal mining', 'Bursa Efek', '2007-12-15 11:20:19', NULL, NULL),
(7, 'Berubah klasifikasi industri menjadi Pertambangan Minyak & Gas Bumi', 'growth-journey-11-_resized360x260.jpeg', 2015, 'Classification Change', 'Changed industrial classification to Oil & Gas Mining', 'Perubahan Klasifikasi', '2015-12-15 11:20:51', NULL, NULL),
(8, 'PT Deli Pratama Batubara mengakuisisi sebagian besar saham', 'growth-journey-8-_resized360x260.jpeg', 2021, 'Change of Controlling Shareholder', 'PT Deli Pratama Batubara acquires most of the shares', 'Perubahan Pemegang Saham Pengendali', '2021-12-15 11:21:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `ID_HM` int(11) NOT NULL,
  `ImgEng` varchar(5000) DEFAULT NULL,
  `ImgIndo` varchar(5000) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`ID_HM`, `ImgEng`, `ImgIndo`, `position`, `created_date`, `delete_date`, `update_date`) VALUES
(24, 'Alat.jpg', 'Alat.jpg', 1, '2021-12-16 13:30:59', '2022-06-13 11:11:11', '2022-06-13 11:09:15'),
(25, 'Alat2 - english.png', 'Alat2 - Indonesia.png', 2, '2021-12-16 13:34:40', NULL, '2025-05-27 00:38:17'),
(26, 'Alat2.jpg', 'Alat2 (1).jpg', 3, '2021-12-16 13:34:52', NULL, '2025-04-29 12:02:10'),
(27, 'Alat3.jpg', 'Alat3.jpg', 4, '2021-12-16 13:34:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invitationrups`
--

CREATE TABLE `invitationrups` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) DEFAULT NULL,
  `Title` varchar(5000) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invitationrups`
--

INSERT INTO `invitationrups` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 30 November 2021', 'Invitation For The Extraordinary General Meeting Of Shareholders (EGMS) November 30, 2021', 2021, '', '', 'Panggilan_RUPSLB_PKPK_22_Desember_2021.pdf', '2021-12-22 15:56:14', NULL, '2021-12-21 13:26:14'),
(2, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) 30 Juli 2021', 'Invitation Annual General Meeting of Shareholders (AGMS) July 30, 2021', 2021, '', '', 'Panggilan_RUPST_PKPK_23_Agustus_2021.pdf', '2021-08-23 15:59:50', NULL, '2021-12-21 13:26:43'),
(3, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa Ke-II (RUPSLB) 11 November 2020', 'Invitation For The Extraordinary General Meeting Of Shareholders Part II (EGMS) November 11, 2020  ', 2020, '', '', 'Panggilan_RUPSLB_II_PKPK_18_November_2020.pdf', '2020-11-18 16:03:16', NULL, '2021-12-21 13:27:16'),
(5, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 15 Oktober 2020', 'Invitation For The Extraordinary General Meeting Of Shareholders (EGMS) October 15, 2020', 2020, '', '', 'Panggilan_RUPSLB_PKPK_6_November_2020.pdf', '2020-11-06 11:21:56', NULL, '2021-12-21 13:27:46'),
(6, 'Pemanggilan Rapat Umum Pemegang Saham (RUPS) 7 Agustus 2020', 'Invitation General Meeting of Shareholders (GMS) August 7, 2020', 2020, '', '', 'Panggilan_RUPS_PKPK_31_Agustus_2020.pdf', '2020-08-31 11:23:46', NULL, '2021-12-21 13:28:10'),
(7, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) 31 Mei 2019', 'Invitation Annual General Meeting of Shareholders (AGMS) May 31, 2019', 2019, '', '', 'Panggilan_RUPST_PKPK_24_Juni_2019.pdf', '2019-06-24 13:13:19', NULL, '2021-12-21 13:28:41'),
(8, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) 7 Juni 2018', 'Invitation Annual General Meeting of Shareholders (AGMS) June 7, 2018', 2018, '', '', 'Panggilan_RUPST_PKPK_29_Juni_2018.pdf', '2018-06-29 14:33:46', NULL, '2021-12-21 13:29:03'),
(9, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa Ke-II (RUPSLB) 4 Juli 2017', 'Invitation For The Extraordinary General Meeting Of Shareholders Part II (EGMS) July 4, 2017', 2017, '', '', 'Panggilan_RUPSLB_II_PKPK_12_Juli_2017.pdf', '2017-07-12 14:35:10', NULL, '2021-12-21 13:29:27'),
(10, 'Pemanggilan Rapat Umum Pemegang Saham (RUPS) 30 Mei 2017', 'Invitation General Meeting of Shareholders (GMS) May 30, 2017', 2017, '', '', 'Panggilan_RUPS_PKPK_21_Juni_2017.pdf', '2017-06-21 14:45:58', NULL, '2021-12-21 13:29:57'),
(11, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) 8 Juni 2016', 'Invitation Annual General Meeting of Shareholders (AGMS) June 8, 2016', 2016, '', '', 'Panggilan_RUPST_PKPK_30_Juni_2016.pdf', '2016-06-30 14:48:49', NULL, '2021-12-21 13:30:42'),
(12, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) 7 Desember 2015', 'Invitation For The Extraordinary General Meeting Of Shareholders (EGMS) December 7, 2015', 2015, '', '', 'Panggilan_RUPSLB_PKPK_29_Desember_2015.pdf', '2015-12-29 14:53:23', NULL, '2021-12-21 13:31:18'),
(13, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa Ke-II (RUPSLB) 11 Januari 2016', 'Invitation For The Extraordinary General Meeting Of Shareholders Part II (EGMS) January 11, 2016', 2016, '', '', 'Panggilan_RUPSLB_II_PKPK_19_Januari_2016.pdf', '2016-01-19 14:54:07', NULL, '2021-12-21 13:31:00'),
(14, 'PEMANGGILAN RAPAT UMUM PEMEGANG SAHAM LUAR BIASA KEDUA (RUPS LB), 4 JANUARI 2022', 'INVITATION FOR THE SECOND EXTRAORDINARY GENERAL MEETING OF SHAREHOLDERS (EGMS),  JANUARY 4, 2022', 2022, '', '', 'PKPK - Pemanggilan RUPSLB KEDUA.pdf', '2022-01-04 16:01:35', NULL, '2022-01-04 16:06:25'),
(15, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) Tahun Buku 2021 (15 Juli 2022)', 'Invitation Annual General Meeting of Shareholders (AGMS) for the 2021 financial year (15 July 2022)', 2022, '', '', 'PKPK_Panggilan RUPST PKPK_15 Juli 2022.pdf-edt', '2022-06-23 13:38:06', '2022-06-23 14:18:37', NULL),
(16, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) Tahun Buku 2021 (15 Juli 2022)', 'Invitation Annual General Meeting of Shareholders (AGMS) for the 2021 financial year (15 July 2022)', 2022, '', '', 'PKPK_Panggilan RUPST PKPK_15 Juli 2022.pdf', '2022-06-23 14:27:21', NULL, NULL),
(17, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (7 Oktober 2022)', 'Invitation Extraordinary General Meeting of Shareholders (EGMS) (7 October 2022)', 2022, '', '', 'PKPK - Surat Panggilan RUPSLB.pdf', '2022-09-05 16:43:11', NULL, NULL),
(18, 'Ralat Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (27 Oktober 2022)', 'Correction of Invitation Extraordinary General Meeting of Shareholders (EGMS) (27 October 2022)', 2022, '', '', 'PKPK - Surat Panggilan RUPSLB (Ralat).pdf', '2022-10-05 20:30:06', NULL, NULL),
(19, 'Ralat Kedua Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (18 November 2022)', 'The Second Correction of Invitation Extraordinary General Meeting of Shareholders (EGMS) (18 November 2022)', 2022, '', '', 'PKPK - Ralat Panggilan RUPSLB II.pdf', '2022-10-26 17:55:22', NULL, NULL),
(20, 'Pengumuman Pembatalan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (18 November 2022)', 'Announcement of Cancellation of Extraordinary General Meeting of Shareholders (EGMS) (18 November 2022)', 2022, '', '', 'PKPK-Pembatalan RUPS LB (18 November 2022).pdf', '2022-11-16 16:44:11', NULL, NULL),
(21, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) Tahun Buku 2022 (28 Februari 2023)', 'Invitation Annual General Meeting of Shareholders (AGMS) for the 2022 financial year (28 February 2023)', 2023, '', '', 'PKPK_Panggilan RUPST PKPK_28 Februari 2023..pdf', '2023-02-03 11:10:36', NULL, '2023-02-03 11:22:21'),
(22, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (5 Mei 2023)', 'Invitation Extraordinary General Meeting of Shareholders (EGMS) (5 Mei 2023)', 2023, '', '', 'PKPK - Panggilan RUPSLB HMETD PKPK (5Mei2023).pdf', '2023-04-11 10:51:47', NULL, NULL),
(23, 'Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (15 Desember 2023)', 'Invitation Extraordinary General Meeting of Shareholders (EGMS) (15 Desember 2023)', 2023, '', '', 'PKPK - Pemanggilan RUPSLB (15Des23) - SUBMIT.pdf', '2023-11-23 11:05:12', NULL, NULL),
(24, 'Ralat Pemanggilan Rapat Umum Pemegang Saham Luar Biasa (RUPSLB) (8 Januari 2024)', ' 	Correction of Invitation Extraordinary General Meeting of Shareholders (EGMS) (8 January 2024)', 2024, '', '', 'PKPK - Ralat Pemanggilan RUPSLB (Peng. Dana).pdf', '2023-12-13 22:13:24', NULL, NULL),
(25, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) Tahun Buku 2023 (28 Mei 2024)', 'Invitation to the Annual General Meeting of Shareholders (AGMS) for Financial Year 2023 (28 May 2024)', 2024, '', '', 'PKPK - Pemanggilan RUPSTahunan 2023 -PRINT.pdf', '2024-05-06 15:24:31', NULL, NULL),
(26, 'Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) Tahun Buku 2024 (10 Juni 2025)', ' 	Invitation to the Annual General Meeting of Shareholders (AGMS) for Financial Year 2024 (10 June 2025', 2025, '', '', 'PKPK - Pemanggilan RUPST Tahun Buku  2024 - SUBMIT.pdf', '2025-05-19 10:16:31', NULL, NULL),
(27, 'Tata Tertib  Rapat Umum Pemegang Saham Tahunan (â€œRUPSTâ€)  PT Perdana Karya Perkasa Tbk. tanggal 10 Juni 2025', 'Rules of Procedure of the Annual General Meeting of Shareholders (â€œAGMSâ€) of PT Perdana Karya Perkasa Tbk. dated June 10, 2025', 2025, '', '', 'PKPK - Tata Tertib RUPST - 10Jun2025 - PRINT.pdf', '2025-05-19 11:09:10', NULL, '2025-05-21 10:23:31'),
(28, 'Ralat Pemanggilan Rapat Umum Pemegang Saham Tahunan (RUPST) (10 Juni 2025)', 'Correction of Invitation General Meeting of Shareholders (AGMS) (10 Juni 2025)', 2025, '', '', 'PKPK - Ralat Pem. RUPST Thn Bku 2024 - SUBMIT.pdf', '2025-05-20 16:19:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keterbukaaninformasi`
--

CREATE TABLE `keterbukaaninformasi` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) DEFAULT NULL,
  `Title` varchar(5000) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `keterbukaaninformasi`
--

INSERT INTO `keterbukaaninformasi` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Pemberitahuan Perubahaan Corsec 1 Oktober 2021', 'Corsec Change Notice October 1, 2021', 2021, '', '', 'Pemberitahuan_Perubahan_Corsec_Okt_21.pdf', '2021-10-01 16:43:58', NULL, '2021-12-13 16:51:24'),
(2, 'Informasi Kepada Pemegang Saham (IKPS) Terkait Transaksi Material dan Transaksi Afiliasi PKPK 15 Mei 2017', 'Information to Shareholders Regarding Material Transactions and Affiliated Transactions PKPK May 15, 2017', 2017, '', '', 'Final_IKPS_PKPK_2017.pdf', '2017-05-15 16:56:23', NULL, '2021-12-13 16:59:24'),
(3, 'Informasi Kepada Pemegang Saham (IKPS) Terkait Transaksi Material dan Transaksi Afiliasi PKPK 7 Agustus 2020', 'Information to Shareholders Regarding Material Transactions and Affiliated Transactions PKPK August 7, 2020', 2020, '', '', 'Final_IKPS_PKPK_2020.pdf', '2020-08-07 16:58:45', NULL, NULL),
(4, 'Tambahan Informasi Kepada Pemegang Saham (IKPS) Terkait Transaksi Material dan Transaksi Afiliasi PKPK 19 Juni 2017', 'Additional Information to Shareholders Regarding Material Transactions and Affiliated Transactions PKPK June 19, 2017	', 2017, '', '', 'Tambahan_IKPS_PKPK_19_Juni_2017.pdf', '2017-06-19 17:00:47', NULL, NULL),
(5, 'Keterbukaan Informasi atas Pengalihan Saham Treasuri melalui Konversi Utang kepada PT Royal Victoria Hotel 2 September 2020', 'Disclosure Information on Transfer of Treasury Shares through Debt Conversion to PT Royal Victoria Hotel September 2, 2020', 2020, '', '', 'Pengalihan_saham_treasuri_PKPK.pdf', '2020-09-02 17:02:37', NULL, NULL),
(6, 'Keterbukaan Informasi atas Rencana Penambahan Modal Dengan Hak Memesan Efek Terlebih Dahulu (HMETD), 19 Agustus 2022', 'Disclosure Information on Capital Increase Plan Through Pre-emptive Rights, August 19, 2022', 2022, '', '', 'PKPK - KI PMHMETD.pdf', '2022-08-19 20:56:09', NULL, NULL),
(7, 'Pemberitahuan Perubahaan Corsec 1 Maret 2023', 'Corsec Change Notice March 1, 2023', 2023, '', '', 'KI Pengangkatan Irma - PRINT.pdf', '2023-03-16 17:25:03', NULL, NULL),
(8, 'Keterbukaan Informasi atas Rencana Penambahan Modal Dengan Hak Memesan Efek Terlebih Dahulu (HMETD), 27 Maret 2023', 'Disclosure Information on Capital Increase Plan Through Pre-emptive Rights, March 27, 2023', 2023, '', '', 'PKPK - KI HMETD - SIGN.pdf', '2023-03-27 11:29:39', NULL, '2023-03-27 11:35:43'),
(9, 'Tambahan Informasi atas Keterbukaan Informasi kepada Para Pemegang Saham PT Perdana Karya Perkasa Tbk dalam rangka Penambahan Modal dengan Memberikan Hak Memesan Efek Terlebih Dahulu ', 'Additional Information on Disclosure of Information to the Shareholders of PT Perdana Karya Perkasa Tbk in the Context of Increasing Capital by Providing Pre-emptive Rights', 2023, '', '', 'Tambahan Keterbukaan Informasi RI PKPK (230414).pdf', '2023-04-14 20:29:03', NULL, NULL),
(10, 'Keterbukaan Informasi atas Rencana Penambahan Modal Dengan Hak Memesan Efek Terlebih Dahulu (HMETD), 5 Juni 2023', 'Disclosure Information on Capital Increase Plan Through Pre-emptive Rights, June 5, 2023', 2023, '', '', 'PKPK - KI 5 Juni 2023.pdf', '2023-07-03 16:43:00', NULL, '2023-08-01 13:32:17'),
(11, 'a', 'a', 2023, '', '', 'Prospektus PKPK - CETAK.pdf', '2023-07-03 16:48:03', '2023-07-03 16:48:07', NULL),
(12, 'Keterbukaan Informasi Dalam Rangka Memenuhi POJK No. 17/POJK.04/2020 Tentang Transaksi Material dan Perubahan Kegiatan Usaha, 1 November 2023', 'Information Disclosure in Order to Fulfill POJK No. 17/POJK.04/2020 Concerning Material Transactions and Changes in Business Activities, 1 November 2023', 2023, '', '', 'PKPK - KI Transaksi Afiliasi dan Material - Submit.pdf', '2023-11-01 11:19:31', NULL, NULL),
(13, 'Keterbukaan Informasi Dalam Rangka Memenuhi POJK No. 17/POJK.04/2020 Tentang Transaksi Material dan Perubahan Kegiatan Usaha, 4 Januari 2024', 'Information Disclosure in Order to Fulfill POJK No. 17/POJK.04/2020 Concerning Material Transactions and Changes in Business Activities, 4 January 2024', 2024, '', '', 'Perubahan dan atau tambahan atas KI PKPK..pdf', '2024-01-04 07:47:46', NULL, NULL),
(14, 'Daftar Riwayat Hidup Calon AnggotaÂ DireksiÂ PT Perdana KaryaÂ PerkasaÂ Tbk.', 'Curriculum Vitae of Candidates for Members of the Board of Directors of PT Perdana KaryaÂ PerkasaÂ Tbk.', 2024, '', '', 'CV Agus dan CV Bambang.pdf', '2024-05-06 19:37:49', '2024-05-08 14:25:02', NULL),
(15, 'Daftar Riwayat Hidup Calon Anggota Direksi PT Perdana KaryaÂ PerkasaÂ Tbk.', 'Curriculum Vitae of Candidates for Members of the Board of Directors of PT Perdana Karya Perkasa Tbk.', 2024, '', '', 'CV BSW & CV AGUS.pdf', '2024-05-08 16:29:07', NULL, '2024-05-21 14:20:19'),
(16, 'Siaran Pers Peresmian Pengapalan Perdana Batubara milik PT Tri Oetama Persada (TRIOP) Anak Usaha dari PT Perdana Karya Perkasa Tbk (PKPK) di Port Tanjung Jawa, Kalimantan Tengah', 'Press Release Inauguration of PT Tri Oetama Persada (TRIOP) First Coal Barging A Subsidiary of PT Perdana Karya Perkasa Tbk (PKPK) At Tanjung Jawa Port, Central Kalimantan', 2024, '', '', 'Siaran Pers PKPK+TOP (Billingual) - SUBMIT.pdf', '2024-09-10 11:22:42', NULL, NULL),
(17, 'Laporan Informasi atau Fakta Material', 'Disclosure Information for Material Facts', 2025, 'Disclosure+of+Information+regarding+changes+in+the+name+of+the+controller+of+PT+Perdana+Karya+Perkasa+Tbk.+namely+PT+Deli+Pratama+Batubara+became+PT+Deli+Putra+Bangsa.', 'Keterbukaan+Informasi+atas+Perubahan+nama+pengendali+PT+Perdana+Karya+Perkasa+Tbk.+yaitu+PT+Deli+Pratama+Batubara+menjadi+PT+Deli+Putra+Bangsa.', 'PKPK-KI Perubahan nama PT DPB menjadi PT Deli Putra Bangsa-SUBMIT.pdf', '2025-03-05 19:42:40', NULL, NULL),
(18, 'Siaran Pers: PKPK melesat dari Rugi berbalik menjadi Laba', 'Press Release: PKPK Increase Sharply with Fantastic Profit', 2025, '', '', 'PKPK+TOP - Siaran Pers2025-Billingual-SUBMIT.pdf', '2025-04-14 14:53:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) NOT NULL,
  `Title` varchar(5000) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `Des` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(58, 'Laporan Tahunan 2020', 'Annual Report 2020', 2020, 'Indonesia%27s+economic+growth+throughout+2020+experienced+a+contraction+of+2.07+percent+compared+to+2019.+This+was+influenced+by+the+weakening+in+various+economic+sectors+due+to+the+Covid-19+pandemic.', 'Pertumbuhan+ekonomi+Indonesia+sepanjang+tahun+2020+mengalami+kontraksi+2%2C07+persen+dibandingkan+tahun+2019.Hal+ini++dipengaruhi+oleh+pelemahan+di+berbagai+sektor+ekonomi+karena+pandemi+Covid-19.', 'Annual Report 2020 PKPK.pdf', '2020-12-08 15:17:06', NULL, '2021-12-08 16:00:13'),
(59, 'Laporan Tahunan 2019', 'Annual Report 2019', 2019, 'Throughout+2019%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+obtained+a+new+contract+of+Rp+8%2C668+billion%2C+in+addition+to+continuing+work+from+the+contract+obtained+the+previous+year.+The+losses+that+the+Company+is+still+experiencing+have+spurred+us+to+work+even+better+in+improving+the+Company%27s+business+performance.', 'Sepanjang+tahun+2019%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+memperoleh+kontrak+baru+sebesar+Rp+8%2C668+milyar%2C+disamping+melanjutkan+pekerjaan+dari+kontrak+yang+diperoleh+tahun+sebelumnya.+Kerugian+yang+masih+dialami+Perseroan+memacu+kami+untuk+bekerja+lebih+baik+lagi+dalam+meningkatkan+kinerja+bisnis+Perseroan.', 'Annual Report 2019 PKPK.pdf', '2019-12-08 15:29:05', NULL, NULL),
(60, 'Laporan Tahunan 2018', 'Annual Report 2018', 2018, 'Throughout+2018%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+obtained+a+new+contract+of+Rp+6.086+billion.', 'Sepanjang+tahun+2018%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+memperoleh+kontrak+baru+sebesar+Rp+6%2C086+milyar.', 'Annual Report 2018 PKPK.pdf', '2018-12-08 16:04:50', NULL, NULL),
(61, 'Laporan Tahunan 2017', 'Annual Report 2017', 2017, 'Throughout+2017%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+experienced+an+increase+in+revenue+of+32.68%25+compared+to+the+previous+year.', 'Sepanjang+tahun+2017%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+mengalami+peningkatan+pendapatan+sebesar+32%2C68%25+dibanding+tahun+sebelumnya.', 'Annual Report 2017 PKPK.pdf', '2017-12-08 16:05:14', NULL, NULL),
(62, 'Laporan Tahunan 2016', 'Annual Report 2016', 2016, 'Throughout+2016%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+experienced+a+58%25+decrease+in+revenue+compared+to+the+previous+year%2C+due+to+delays+in+several+construction+project+tenders.+The+losses+suffered+by+the+Company+in+2016+spurred+us+to+work+even+better+in+improving+business+performance+and+operating+cost+efficiency.', 'Sepanjang+tahun+2016%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+mengalami+penurunan+pendapatan+sebesar+58%25+dibanding+tahun+sebelumnya%2C+yang+disebabkan+tertundanya+beberapa+tender+proyek+konstruksi.+Kerugian+yang+dialami+Perseroan+di+tahun+2016+memacu+kami+untuk+bekerja+lebih+baik+lagi+dalam+meningkatkan+kinerja+bisnis+dan+efisiensi+biaya+operasi.', 'Annual Report 2016 PKPK.pdf', '2016-12-08 16:05:43', NULL, NULL),
(63, 'Laporan Tahunan 2015', 'Annual Report 2015', 2015, 'Throughout+2015%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+decreased+revenue+by+74%25+compared+to+the+previous+year%2C+due+to+delays+in+several+construction+project+tenders.+The+losses+suffered+by+the+Company+in+2015+spurred+us+to+work+even+better+in+improving+business+performance+and+operating+cost+efficiency.', 'Sepanjang+tahun+2015%2C+PT.+Perdana+Karya+Perkasa%2C+Tbk.+mengalami+penurunan+pendapatan+sebesar+74%25+dibanding+tahun+sebelumnya%2C+yang+disebabkan+tertundanya+beberapa+tender+proyek+konstruksi.+Kerugian+yang+dialami+Perseroan+di+tahun+2015+memacu+kami+untuk+bekerja+lebih+baik+lagi+dalam+meningkatkan+kinerja+bisnis+dan+efisiensi+biaya+operasi.', 'Annual Report 2015 PKPK.pdf', '2015-12-08 16:06:16', NULL, NULL),
(64, 'Laporan Tahunan 2021', 'Annual Report 2021', 2021, 'Throughout+2021%2C+the+global+economy+is+still+affected+by+the+prolonged+COVID-19+pandemi.+In+the+midst+of+that+economic+pressures%2C+PT+Perdana+Karya+Perkasa%0D%0ATbk+has+undertaken+strategic+initiatives+to+adapt+to+changes+caused+by+COVID-19+pandemic.%0D%0A%0D%0AThe+Company+had+made+several+fundamental+changes+in+strategic+planning+for+sustainable+growth.%0D%0ATherefore%2C+in+this+Annual+Report%2C+the+theme+is+%E2%80%9CStrengthening+the+Foundation+for+Growth%E2%80%9D%2C+which+describes+the+spirit+to+deal+with+the+future.', 'Sepanjang+tahun+2021%2C+Perekonomian+global+masih+dipengaruhi+oleh+pandemic+COVID-19+yang+berkepanjangan.+Di+tengah+tekanan+perekonomian+tersebut%2C+PT+Perdana+Karya+Perkasa+Tbk+telah%0D%0Aberupaya+untuk+melakukan+langkah-langkah+strategis+untuk+beradaptasi+atas+perubahan+yang+terjadi+akibat+adanya+pandemi+COVID-19.%0D%0A%0D%0APerseroan+telah+melakukan+beberapa+perubahan+mendasar+dalam++perencanaan+strategis+untuk+pertumbuhan+berkelanjutan.+Oleh+sebab+itu%2C+pada+Laporan+Tahunan+ini+Perseroan+memilih+tema+%E2%80%9CPenguatan+Fondasi+untuk+Pertumbuhan%E2%80%9D%2C+yang+merupakan+semangat+untuk+menghadapi+masa+depan.', 'PKPK - Annual Report Tahun 2021.pdf', '2022-06-24 18:27:23', NULL, '2022-11-25 10:41:28'),
(65, 'Laporan Tahunan 2022', 'Annual Report 2022', 2022, 'The+Company+realises+that+the+future+challenges+will%0D%0Aincrease%2C+especially+those+challenges+beyond+the%0D%0ACompany%E2%80%99s+control+such+as+increasing+risk+of+stagflation%2C%0D%0Ainflationary+pressures%2C+and+geopolitical+situations+as+well%0D%0Aas+challenges+directly+related+to+the+Company%E2%80%99s+business%0D%0Acompetition+which+is+price+competition.+However%2C%0D%0Athe+Company+has+been+focusing+on+its+business%0D%0Afoundation+and+strategies+in+running+the+business+to%0D%0Aimprove+performance+in+the+future.+We+strive+optimally%0D%0Aand+focus+on+the+Company%E2%80%99s+goals%2C+that+are+safe+and%0D%0Aenvironmentally+responsible+operation.+The+Company%E2%80%99s%0D%0Abusiness+prospects+focus+on+the+construction+business%0D%0Asector+that+will+provide+more+advantage+in+creating%0D%0Acompetitiveness+and+growth.+In+line+with+this+spirit%2C+the%0D%0ACompany+has+showcased+the+theme+%E2%80%9CBuilding+New%0D%0AValues%2C+Enlarging+Future+Opportunities%E2%80%9D+for+the+2022%0D%0AAnnual+Report.+', 'Perseroan+menyadari+bahwa+tantangan+di+masa+yang%0D%0Aakan+datang+akan+terus+meningkat%2C+terutama+yang%0D%0Aterjadi+di+luar+kendali+Perseroan+seperti+meningkatnya%0D%0Aresiko+stagflasi%2C+tekanan+inflasi%2C+dan+situasi+geopolitik%0D%0Aserta+tantangan+yang+berhubungan+langsung+dengan%0D%0Apersaingan+usaha+Perseroan+adalah+persaingan%0D%0Aharga.+Namun%2C+Perseroan+tetap+berfokus+kepada%0D%0Apondasi+bisnis+dan+strategi+dalam+menjalankan+bisnis%0D%0Aagar+dapat+meningkatkan+kinerja+di+masa+yang+akan%0D%0Adatang.+Kami+berusaha+dengan+optimal+dan+fokus+pada%0D%0Atujuan+Perseroan%2C+yaitu+operasional+yang+aman+dan%0D%0Abertanggung+jawab+terhadap+lingkungan.+Prospek+usaha%0D%0APerseroan+yang+berfokus+pada+bidang+usaha+konstruksi%0D%0Aakan+memberikan+keunggulan+dalam+mengembangkan%0D%0Akompetensi+daya+saing+dan+menciptakan+pertumbuhan.%0D%0ASejalan+dengan+semangat+tersebut%2C+Perseroan%0D%0Amengangkat+tema+%E2%80%9CBuilding+New+Values%2C+Enlarging%0D%0AFuture+Opportunities%E2%80%9D+sebagai+tema+Laporan+Tahunan%0D%0ATahun+2022.', 'AR PKPK 2022 - FINAL.pdf', '2023-02-17 13:22:55', NULL, '2024-02-02 13:48:39'),
(66, 'Laporan Tahunan 2023', 'Annual Report 2023', 2023, 'The+Company+recognizes+the+challenges+of+an%0D%0Auncertain+economic+future%2C+climate+changes%2C%0D%0Aand+global+geopolitical+conflicts.+The+Company%E2%80%99s%0D%0Apriorities+on+improving+operational+efficiency%2C%0D%0Aadded+value%2C+and+positively+impact+sustainability.%0D%0AStrategic+initiatives+involve+solid+commitment+to%0D%0Aprofessionalism%2C+maintaining+the+reputation+of%0D%0Apartners+and+customers.+With+the+vision+of+%E2%80%9CTo%0D%0AGrow+With+Nation%2C%E2%80%9D+PT+Perdana+Karya+Perkasa%0D%0ATbk+emphasizes+performance+optimization%0D%0Ato+sustain+and+create+growth+opportunities.+A%0D%0Athorough+evaluation+conducted+on+operations%2C+from%0D%0Atechnology+to+resource+efficiency.+Sustainability%2C%0D%0Aincluding+social+and+environmental+responsibility%2C%0D%0Abecame+a+main+focus%2C+committed+to+have+a+positive%0D%0Aimpact+on+society+and+maintain+ecological+balance.%0D%0AWith+the+theme+%E2%80%9CPerformance+Optimization%0D%0Afor+Sustainable+Growth%E2%80%9D+the+Company+brings%0D%0Atogetherness+operational+efficiency%2C+sustainable%0D%0Agrowth%2C+and+socio-environmental+responsibility+in%0D%0Aone+comprehensive+strategic+move.', 'Perusahaan+menyadari+dalam+menghadapi%0D%0Atantangan+masa+depan+ekonomi+yang+penuh%0D%0Aketidakpastian%2C+perubahan+iklim%2C+dan+konflik%0D%0Ageopolitik+global.+Prioritas+Perusahaan+ada%0D%0Apada+peningkatan+efisiensi+operasional%2C+nilai%0D%0Atambah%2C+dan+dampak+positif+pada+keberlanjutan.%0D%0ALangkah-langkah+strategis+melibatkan+komitmen%0D%0Akuat+terhadap+profesionalisme%2C+menjaga+reputasi%0D%0Amitra+kerja%2C+dan+pelanggan.+Dengan+visi+%E2%80%9CUntuk%0D%0ABerkembang+Bersama+Bangsa%2C%E2%80%9D+PT+Perdana%0D%0AKarya+Perkasa+Tbk+menekankan+optimalisasi%0D%0Akinerja+untuk+mempertahankan+dan+menciptakan%0D%0Apeluang+pertumbuhan.+Evaluasi+menyeluruh%0D%0Adilakukan+terhadap+operasional%2C+dari+teknologi%0D%0Ahingga+efisiensi+sumber+daya.+Keberlanjutan%2C%0D%0Atermasuk+tanggung+jawab+sosial+dan+lingkungan%2C%0D%0Amenjadi+fokus+utama%2C+dengan+komitmen+untuk%0D%0Amemberikan+dampak+positif+pada+masyarakat%0D%0Adan+menjaga+keseimbangan+ekologis.+Dalam%0D%0Atema+%E2%80%9COptimalisasi+Kinerja+untuk+Pertumbuhan%0D%0ABerkelanjutan%2C%E2%80%9D+Perusahaan+menyatukan%0D%0Aefisiensi+operasional%2C+pertumbuhan+berkelanjutan%2C%0D%0Adan+tanggung+jawab+sosial-lingkungan+dalam+satu%0D%0Alangkah+strategis+yang+komprehensif.', 'AR PKPK 2023 - SUBMIT.pdf', '2024-04-26 11:02:04', NULL, NULL),
(67, 'Laporan Tahunan 2024', 'Annual Report 2024', 2024, 'Building+Harmonious+Synergies+Toward+Outstanding+Progress.%0D%0A%0D%0AThe+dynamic+industry+drives+the+Company+to+strengthen+collaboration+and+synergy%2C+both+internally+and+externally%2C+to+achieve+competitive+excellence.+The+Company+is+committed+to+seizing+opportunities+to+create+added+value+for+stakeholders%2C+with+harmonious+synergy+as+the+primary+strategy+to+optimize+resources+and+expand+business+reach.+The+theme+%E2%80%9CBuilding+Harmonious+Synergies+Toward+Outstanding+Progress%E2%80%9D+highlights+the+importance+of+collaboration+in+achieving+remarkable+progress.+Synergies+with+business+partners%2C+subsidiaries%2C+employees%2C+and+the+community+strengthen+operations+and+broaden+business+scope%2C+supporting+the+stability+of+the+Company.+The+focus+on+operational+efficiency%2C+resource+optimization%2C%0D%0Aand+continuous+innovation+serves+as+the+main+pillars+of+sustainable+growth%2C+ensuring+the+Company%E2%80%99s+readiness+to+face+future+challenges.+This+theme+reflects+the+Company%E2%80%99s+commitment+to+driving+exceptional+progress+through+harmonious+synergies+and+delivering+a+positive+impact+for+stakeholders.%0D%0A', 'Membangun+Sinergi+yang+Harmonis+Menuju+Kemajuan+yang+Cemerlang.%0D%0A%0D%0AIndustri+yang+dinamis+mendorong+Perusahaan+untuk+memperkuat+kolaborasi+dan+sinergi%2C+baik+internal+maupun+eksternal+untuk+mencapai+keunggulan+kompetitif.+Perseroan+berkomitmen+memanfaatkan+peluang+guna+menciptakan+nilai+tambah+bagi+pemangku+kepentingan%2C+dengan+sinergi+harmonis+sebagai+strategi+utama+untuk+mengoptimalkan+sumber+daya+dan+memperluas+jangkauan+bisnis.+Tema+%E2%80%9CBuilding+Harmonious+Synergies+Toward+Outstanding+Progress%E2%80%9C+menyoroti+pentingnya+kolaborasi+dalam+mencapai+kemajuan+cemerlang.+Sinergi+dengan+mitra+bisnis%2C+anak+Perusahaan%2C+karyawan%2C+dan+masyarakat+memperkuat+operasional+dan+memperluas+jangkauan+bisnis+dalam+mendukung+stabilitas+Perusahaan.+Fokus+pada+efisiensi+operasional%2C+optimalisasi+sumber+daya%2C+dan+inovasi+berkelanjutan+menjadi+pilar+utama+pertumbuhan+yang+berkelanjutan%2C+memastikan+kesiapan+Perusahaan+menghadapi+tantangan+masa+depan.+Tema+ini+mencerminkan+komitmen+Perseroan+mendorong+kemajuan+luar+biasa+melalui+sinergi+yang+harmonis+dan+dampak+positif+bagi+pemangku+kepentingan.', 'AR PKPK 2024 - SUBMIT.pdf', '2025-04-28 12:00:57', NULL, '2025-05-27 00:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `ID_M` int(11) NOT NULL,
  `Overview` varchar(5000) DEFAULT NULL,
  `bocEng` text DEFAULT NULL,
  `bocIndo` text DEFAULT NULL,
  `bodEng` text DEFAULT NULL,
  `bodIndo` text DEFAULT NULL,
  `acEng` text DEFAULT NULL,
  `acIndo` text DEFAULT NULL,
  `csEng` text DEFAULT NULL,
  `csIndo` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`ID_M`, `Overview`, `bocEng`, `bocIndo`, `bodEng`, `bodIndo`, `acEng`, `acIndo`, `csEng`, `csIndo`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'management.png', 'Board of Commissioners is one of the Companyâ€™s organs functioning as supervisor for the management conducted by the Board of Directors. The Board\'s supervisory function includes directing, monitoring, and evaluating the implementation of the Company\'s strategic policies. Another function attached to the Board of Commissioners is to provide advice to the Directors for the interests of the Company and ensure that the implementation of GCG runs well.\r\n\r\n<b>Board Manual</b>\r\nThe Company has implemented the Board Manual in accordance with Financial Services Authority No. 33/POJK.04/2014 on Board of Directors and Board of Commissioners of Listed or Public Companies that requires the Board of Commissioners to prepare a manual that binds each member.\r\nThe contents of the Guidelines are following the provisions and legislation in force, including regulating responsibilities and authorities, meeting mechanisms, performance evaluations and criteria, conflicts of interest, and the nomination and remuneration functions of the board of Commissioners.\r\n\r\n<b>Duties and Responsibilities</b>\r\nBoard of Commissioners have the following responsibilities:\r\n1. To oversee management policies, the general management of the Company, both the Company and the Company\'s business, and provides advice to the Directors.\r\n2. To oversee the implementation of the business plan and budget.\r\n3. To monitor and evaluate the performance of Board of Directors.\r\n4. To oversee the implementation of risk management and actions of Board of Directors upon the audit findings.\r\n5. To monitor effectiveness of good corporate governance implementation.\r\n6. Responsible for the duty implementation of Board of Commissioners to the GMS.', 'Dewan Komisaris merupakan salah satu bagian dari Organ Perseroan yang berperan dalam melakukan pengawasan terhadap aktivitas pengelolaan yang dilaksanakan oleh Direksi beserta jajarannya. Fungsi pengawasan Dewan termasuk dalam hal mengarahkan, memantau, dan mengevaluasi pelaksanaan kebijakan strategis Perseroan. Fungsi lain yang melekat pada Dewan Komisaris adalah memberikan nasihat kepada Direksi untuk kepentingan Perseroan, serta memastikan pelaksanaan GCG berjalan dengan baik.\r\n\r\n<b>Pedoman Kerja</b>\r\nPerseroan telah menerapkan Pedoman Kerja Dewan Komisaris sesuai ketentuan Otoritas Jasa Keuangan (OJK) No. 33/ POJK.04/2014 tentang Direksi dan Dewan Komisaris Emiten atau Perusahaan Publik yang mengatur bahwa Dewan Komisaris wajib menyusun pedoman yang mengikat setiap anggota Dewan Komisaris.\r\nIsi Pedoman telah sesuai dengan ketentuan serta perundangan-undangan yang berlaku, antara lain mengatur mengenai tanggung jawab dan wewenang, mekanisme rapat, penilaian dan kriteria kinerja, benturan kepentingan serta fungsi nominasi dan remunerasi dari Dewan Komisaris.\r\n\r\n<b>Tugas dan Tanggung Jawab</b>\r\nDewan Komisaris Perseroan memiliki tanggung jawab sebagai berikut :\r\n1. Mengawasi kebijaksanaan pengurusan, jalannya pengurusan pada umumnya, baik mengenai Perseroan maupun usaha Perseroan, serta memberikan nasihat kepada Direksi.\r\n2. Mengawasi pelaksanaan rencana usaha dan anggaran.\r\n3. Memantau dan mengevaluasi kinerja Direksi.\r\n4. Mengawasi pelaksanaan manajemen risiko dan tindakan Direksi atas temuan audit.\r\n5. Mengawasi efektivitas penerapan tata kelola perusahaan.\r\n6. Mempertanggungjawabkan pelaksanaan tugas Dewan Komisaris kepada RUPS.', 'The management of the Company is carried out by the Directors with collegial responsibilities, to make decisions and implement those decisions following the division of tasks and authority. The basic duties and responsibilities of the Directors are to generate added value for stakeholders and ensure the sustainability of the Company\'s business. Each member of the Board of Directors has a division of responsibilities and authority following the Articles of Association and the applicable laws and regulations.\r\n\r\n<b>Board Manual</b>\r\nThe Company is equipped with Board Manual prepared in accordance with Financial Services Authority No. 33/POJK.04/2014 on Board of Directors and Board of Commissioners of Listed or Public Companies that requires the Board of Directors and Board of Commissioners to prepare a manual that binds each member.\r\n\r\n<b>Duties and Responsibilities</b>\r\nThe Companyâ€™s Board of Directors have the following duties and responsibilities:\r\n1. To manage daily operation of the Company.\r\n2. To implement policies, principles, values, strategy, goals and targets of the Company.\r\n3. To maintain Companyâ€™s business sustainability in a long term.\r\n4. To ensure performance target achievement and applied prudence principles.', 'Pengurusan Perseroan dilaksanakan oleh Direksi dengan tanggung jawab secara kolegial, untuk mengambil keputusan dan melaksanakan keputusan tersebut sesuai dengan pembagian tugas dan wewenangnya. Tugas dan tanggung jawab yang mendasar dari Direksi adalah menghasilkan nilai tambah bagi para pemangku kepentingan serta memastikan kesinambungan usaha Perseroan. Masing-masing anggota Direksi memiliki pembagian tanggung jawab dan wewenang masing- masing sesuai dengan Anggaran Dasar dan peraturan serta perundang-undangan yang berlaku.\r\n\r\n<b>Pedoman Kerja Direksi</b>\r\nPerseroan memiliki Pedoman Kerja Direksi sesuai ketentuan Otoritas Jasa Keuangan (OJK) No. 33/ POJK.04/2014 tentang Direksi dan Dewan Komisaris Emiten atau Perusahaan Publik yang mengatur bahwa Direksi dan Dewan Komisaris wajib menyusun pedoman yang mengikat setiap anggota Direksi dan Dewan Komisaris.\r\n\r\n<b>Tugas dan Tanggung Jawab</b>\r\nDireksi Perseroan memiliki tugas pokok dan tanggung jawab untuk:\r\n1. Mengelola kegiatan usaha operasional Perseroan sehari-hari.\r\n2. Menerapkan kebijakan, prinsip-prinsip, nilai-nilai, strategi, tujuan dan sasaran kinerja Perseroan.\r\n3. Menjaga kelangsungan bisnis Perseroan dalam jangka panjang.\r\n4. Mencapai target kerja dan menerapkan prinsip kehati-hatian.', 'The Audit Committee was formed to carry out independent oversight of the financial reporting and external audit processes. Other objectives are to provide independent oversight of the risk management and control process and to carry out independent oversight of the Company\'s governance processes. The Audit Committee members have met the independence criteria and have the expertise and integrity as defined in Financial Services Authority (Otoritas Jasa Keuangan) Regulation No. 55/POJK.04/2015.\r\n\r\n<b>Audit Committee Charter</b>\r\nThe Audit Committee has the Charter including: composition, structure and membership requirements, duties and responsibilities, working and reporting conditions, the term of office, as well as complaints management procedure.\r\n\r\n<b>Audit Committeeâ€™s Independency</b>\r\nThe Audit Committee consists of an Independent Commissioner who serves as chairman as well as members from outside the Company who are able to work professionally and independently. In order to ensure the Audit Committeeâ€™s independency, all members do not work at public accounting firms, law firms, public appraisers, or other entities providing assurance services, or other consulting services to the Company, and did not work at the Company 6 (six) months prior to their appointment as members of the Audit Committee. In addition, members of the Audit Committee do not directly or indirectly have shares in the Company, and are not affiliated with members of the Board of Commissioners, Board of Directors or majority shareholder of the Company.\r\n\r\n<b>Duties and Responsibilities</b>\r\nAudit Committee duties and responsibilities is to facilitate Board of Commissioners in running its supervisory function. The main tasks of Audit Committee:\r\n1. To conduct periodic evaluations to the policies and management of company business from risk potential that may arise.\r\n2. To provide an independent opinion upon the Directors reports to the Board of Commissioners.\r\n3. To ensure the implementation of internal control system within management.\r\n4. Provide recommendation related to integrity and quality of published financial statement.\r\n5. Audit implementation effectiveness by external and internal auditor.', 'Komite Audit dibentuk dengan tujuan untuk melaksanakan pengawasan independen atas proses laporan keuangan dan audit eksternal. Tujuan lainnya adalah untuk memberikan pengawasan independen atas proses manajemen risiko dan kontrol, serta untuk melaksanakan pengawasan independen atas proses tata kelola Perseroan. Anggota Komite Audit telah memenuhi kriteria independensi dan memiliki keahlian dan integritas sebagaimana dimaksud dalam Peraturan OJK no. 55/POJK.04/2015.\r\n\r\n<b>Pedoman Kerja Komite Audit</b>\r\nKomite Audit memiliki Pedoman Kerja yang mencakup: komposisi, struktur dan persyaratan keanggotaan, tugas dan tanggung jawab Komite Audit, ketentuan kerja dan pelaporan, masa tugas Komite Audit, serta ketentuan penanganan pengaduan.\r\n\r\n<b>Independensi Komite Audit</b>\r\nKomposisi Komite Audit terdiri dari Komisaris Independen sebagai ketua dan anggota yang berasal dari pihak di luar Perseroan yang mampu bertugas secara profesional dan independen. Independensi Komite Audit ini mensyaratkan seluruh anggotanya yang bukan merupakan orang dalam Kantor Akuntan Publik, Kantor Konsultan Hukum, Kantor Jasa Penilai Publik, atau pihak lain; yang memberi jasa assurance, ataupun jasa konsultasi lain kepada Perseroan, dan bukan merupakan orang yang bekerja di Perseroan dalam waktu 6 (enam) bulan sebelum diangkat sebagai anggota Komite Audit. Selain itu, anggota Komite Audit juga tidak mempunyai saham langsung maupun tidak langsung pada Perseroan, dan tidak mempunyai hubungan afiliasi dengan anggota Dewan Komisaris, Direksi, atau Pemegang Saham Utama Perseroan.\r\n\r\n<b>Tugas dan Tanggung Jawab</b>\r\nKomite Audit bertugas dan bertanggung jawab untuk memfasilitasi Dewan Komisaris dalam menjalankan fungsi pengawasannya. Tugas utama Komite Audit:\r\n1. Melakukan evaluasi secara periodik terhadap kebijakan dan pengelolaan manajemen usaha dari potensi risiko yang mungkin timbul.\r\n2. Memberikan pendapat independen terhadap laporan-laporan Direksi kepada Dewan Komisaris.\r\n3. Memastikan sistem pengendalian internal dilaksanakan dalam manajemen.\r\n4. Memberikan rekomendasi terkait dengan integritas dan mutu laporan keuangan yang dipublikasikan.\r\n5. Efektivitas pelaksanaan audit oleh Auditor Eksternal maupun Internal.', 'The Corporate Secretary has an important role in bridging communications to both internal and external parties of the Company such as communication with employees, regulators, shareholders, investors, and other stakeholders. He also has a role in ensuring that the Company complies with Capital Market regulations.\r\n\r\n<b>Duties and Responsibilities</b>\r\nThe main duties and responsibilities of the Corporate Secretary are as follows:\r\n1. Maintaining corporate relationships with the Capital Market authority, Shareholders, investors, mass media, and public at general.\r\n2. To provide services to the public regarding the information needed by investors relating to the condition of the Company.\r\n3. To represent the Company in correspondence with the capital market authority following the authority granted by the Company.\r\n4. Ensuring the Corporate compliances to the law regulations, Capital Market rules, Limited Liability Act (UUPT) and Corporate Articles of Association.\r\n5. Assisting the Corporate Board Commissioners and Directors in the implementation of GCG:\r\nâ€ƒa. Public information disclosure including the availability of information on the Companyâ€™s website.\r\nâ€ƒb. Punctual submission of reports to the Financial Services Authority.\r\nâ€ƒc. Organization and documentation of the General Meeting of Shareholders.', 'Sekretaris Perusahaan memiliki peranan penting dalam menjembatani komunikasi baik kepada pihak internal maupun eksternal Perseroan seperti komunikasi dengan karyawan, regulator, para pemegang saham, investor, dan pemangku kepentingan lainnya. Ia juga berperan dalam memastikan bahwa Perseroan telah patuh pada peraturan-undangan di bidang Pasar Modal.\r\n\r\n<b>Tugas dan Tanggungjawab</b>\r\nTugas dan tanggung jawab utama Sekretaris Perusahaan sebagai berikut:\r\n1. Menjaga hubungan Perseroan dengan otoritas Pasar Modal, Pemegang Saham, investor, media massa, dan masyarakat pada umumnya.\r\n2. Untuk memberikan layanan kepada publik tentang informasi yang dibutuhkan oleh investor yang berkaitan dengan kondisi Perusahaan.\r\n3. Untuk mewakili Perusahaan dalam korespondensi dengan otoritas pasar modal sesuai dengan otoritas yang diberikan oleh Perusahaan.\r\n4. Memastikan kepatuhan Perseroan terhadap undang-undang dan peraturan pasar modal, UU Perseroan Terbatas, dan Anggaran Dasar Perseroan sendiri.\r\n5. Membantu Dewan Komisaris dan Direksi Perseroan dalam penerapan GCG, yang meliputi:\r\nâ€ƒa. Keterbukaan informasi kepada masyarakat, termasuk ketersediaan informasi pada situs web Perusahaan.\r\nâ€ƒb. Penyampaian laporan kepada OJK secara tepat waktu.\r\nâ€ƒc. Penyelengaraan dan dokumentasi Rapat Umum Pemegang Saham.', '2021-12-20 13:58:32', NULL, '2021-12-20 14:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `our_businesses`
--

CREATE TABLE `our_businesses` (
  `ID_OB` int(11) NOT NULL,
  `mining` text DEFAULT NULL,
  `tambang` text DEFAULT NULL,
  `equipment` text DEFAULT NULL,
  `perlengkapan` text DEFAULT NULL,
  `land` text DEFAULT NULL,
  `lahan` text DEFAULT NULL,
  `construction` text DEFAULT NULL,
  `konstruksi` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `our_businesses`
--

INSERT INTO `our_businesses` (`ID_OB`, `mining`, `tambang`, `equipment`, `perlengkapan`, `land`, `lahan`, `construction`, `konstruksi`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Currently PT. Perdana Karya Perkasa Tbk. penetrated the coal mining sector to meet local and overseas needs (Thailand, Philippines, Malaysia and Taiwan).', 'Saat ini PT. Perdana Karya Perkasa Tbk. merambah bidang pertambangan batubara untuk memenuhi kebutuhan lokal dan luar negeri (Thailand, Philipina, Malaysia dan Taiwan).', 'PT. Perdana Karya Perkasa Tbk. leasing equipment as well as operational support, maintenance and supply of various spare parts for light and heavy vehicles to meet mining, plantation and oil and gas activities.', 'PT. Perdana Karya Perkasa Tbk. menyewakan peralatan sekaligus dukungan operasional, pemeliharaan dan penyediaan berbagai suku cadang bagi kendaraan ringan maupun berat untuk memenuhi kegiatan pertambangan, perkebunan dan migas.', 'PT. Perdana Karya Perkasa Tbk. is very experienced in Business Land Preparation which is located in the largest area around the Kalimantan Area.', 'PT. Perdana Karya Perkasa Tbk sangat berpengalaman di Business Land Preparation yang lokasi area terbesar di sekitar Area Kalimantan.', 'Several local and national companies have entrusted various jobs to PT. Perdana Karya Perkasa Tbk. which includes planning and design, fabrication, installation, testing, material support, provision of labor services and maintenance services.\r\n1. Pipeline installation and maintenance of oil and gas pipelines.\r\n2. Installation of machinery, electricity and instrumentation.\r\n3. Installation of production equipment/facilities.\r\n4. Construction of buildings and architecture.\r\n5. Construction of steel structures/supports in the oil and gas environment on land and at sea.\r\n6. Civil construction and earthworks.', 'Beberapa perusahaan daerah maupun nasional, telah mempercayakan berbagai pekerjaan pada PT Perdana Karya Perkasa Tbk. yang meliputi perencanaan dan perancangan, fabrikasi, instalasi, pengujian, dukungan material, penyediaan jasa tenaga kerja serta jasa pemeliharaan.\r\n1. Instalasi pipa dan pemeliharaan jaringan pipa minyak dan gas.\r\n2. Pemasangan mesin, listrik dan instrumentasi.\r\n3. Instalasi peralatan/fasilitas produksi.\r\n4. Konstruksi bangunan gedung dan arsitektur.\r\n5. Konstruksi struktur/penyangga baja di lingkungan migas di darat maupun di laut.\r\n6. Konstruksi sipil dan pekerjaan tanah.', '2021-12-20 11:19:01', NULL, '2021-12-20 13:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `ID_People` int(11) NOT NULL,
  `Name` varchar(5000) DEFAULT NULL,
  `Jabatan` varchar(5000) DEFAULT NULL,
  `Position` varchar(5000) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Img` varchar(5000) DEFAULT NULL,
  `Status` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`ID_People`, `Name`, `Jabatan`, `Position`, `Deskripsi`, `Des`, `Img`, `Status`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Jusuf Mangga Barani', 'KOMISARIS UTAMA', 'PRESIDENT COMMISSIONER', 'Warga Negara Indonesia, 71 tahun, berdomisili di Depok. Bapak Jusuf Mangga Barani menjabat sebagai Komisaris Utama Perseroan sejak tahun 2021.\r\n\r\nRiwayat Pendidikan: \r\nâ€¢ Akademi Kepolisian dan Kejuruan Perwira Brigade Mobile (1975)\r\nâ€¢ Perguruan Tinggi Ilmu Kepolisian (1984)\r\nâ€¢ Sekolah Staf dan Pimpinan Polri (1987)\r\nâ€¢ Sekolah Perwira Tinggi Polri (1999)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Wakil Direktur Utama PT. Arkon (sejak 2016 â€“ sekarang)\r\nâ€¢ Komisaris Utama PT. Victoria Investama Tbk (2017 â€“ sekarang)\r\nâ€¢ Wakil Kepala Kepolisian Indonesia (2011)\r\n\r\nBapak Jusuf Mangga Barani tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 71 years old, domiciled in Depok. Mr. Jusuf Mangga Barani serves as President Commissioner of the Company since 2021.\r\n\r\nEducational Background:\r\nâ€¢ Police Academy and Mobile Brigade Officer Training (1975)\r\nâ€¢ College of Police Science (1984)\r\nâ€¢ Police Staff and Command School (1987)\r\nâ€¢ Senior Police Officer School (1999)\r\n\r\nCareer History:\r\nâ€¢ Vice President Director of PT. Arkon (since 2016 â€“ present)\r\nâ€¢ President Commissioner of PT. Victoria Investama Tbk (2017 â€“ present)\r\nâ€¢ Deputy Chief of the Indonesian National Police (2011)\r\n\r\nMr. Jusuf Mangga Barani has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Bpk_Jusuf_Mangga_Barani.jpg', 'Komisaris', '2021-12-15 12:09:01', NULL, '2025-04-29 17:25:47'),
(2, 'Suki', 'KOMISARIS', 'COMMISSIONER', 'Warga Negara Indonesia, 54 tahun, berdomisili di Jakarta. Bapak Suki menjabat sebagai Komisaris Perseroan sejak tahun 2021. \r\n\r\nRiwayat Pendidikan:\r\nSMEA YPN Pemangkat Sambas di Kabupaten Sambas, Kalimantan Barat (1989/1990)\r\n\r\nRiwayat Pekerjaan:\r\nKomisaris PT Deli Pratama Batubara (2021 - Sekarang)\r\n\r\nBapak Suki tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 54 years old, domiciled in Jakarta. Mr. Suki serves as Commissioner of the Company since 2021.\r\n\r\nEducational Background:\r\nSMEA YPN Pemangkat Sambas di Kabupaten Sambas, Kalimantan Barat (1989/1990)\r\n\r\nCareer History:\r\nCommissioner of PT Deli Pratama Batubara (2021 - Present)\r\n\r\nMr. Suki has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Bpk_Suki.jpg', 'Komisaris', '2021-12-15 12:12:18', NULL, '2025-04-29 17:31:58'),
(3, 'Sammy Tony Saul Lalamentik', 'KOMISARIS INDEPENDEN', 'INDEPENDENT COMMISSIONER', 'Warga Negara Indonesia, berusia 62 tahun, berdomisili di Jakarta. Bapak Sammy T. S. Lalamentik  saat ini menjabat sebagai Komisaris Independen Perseroan sejak tahun 2021. \r\n\r\nRiwayat Pendidikan:\r\nâ€¢ D3 Akuntansi, Sekolah Tinggi Akuntansi Negara, Jakarta, Indonesia (1984)\r\nâ€¢ Program Pelatihan Profesional untuk Analis Keuangan Chartered - IPAF Indonesia & AIMR USA (1991)\r\nâ€¢ Keuangan Perusahaan Internasional - Institut Keuangan New York USA (1992)\r\nâ€¢ Pemodelan Risiko Kredit - Fakultas Keuangan Internasional London UK (2003)\r\nâ€¢ Standar Akuntansi Tata Kelola Perusahaan - JICA Bapepam (2005)\r\nâ€¢ Soft Competency - OTI Internasional & Bapepam LK (2011)\r\nâ€¢ Sertifikasi Pengawas Sektor Jasa Keuangan (SJK) Level 2 (2018)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Komisaris Independen PT Surya Fajar Urun Dana (Sejak 2024 - sekarang)\r\nâ€¢ Komisaris Independen PT Arsy Buana Travelindo Tbk. (2024 - sekarang)\r\nâ€¢ Komisaris Independen PT OSO Sekuritas Indonesia (2024 - sekarang)\r\nâ€¢ Komite Audit PT Nusantara Sejahtera Raya Tbk (2023 - sekarang)\r\nâ€¢ Komite Audit PT Avia Avian Tbk (2022 - sekarang)\r\nâ€¢ Komisaris Independen PT Super Energy Tbk (2020 - sekarang)\r\nâ€¢ Komisaris PT Kredit Rating Indonesia (2020 - sekarang)\r\nâ€¢ Otoritas Jasa Keuangan (hingga 2020)\r\n\r\nBapak Sammy T. S. Lalamentik tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 62 years old, domiciled in Jakarta. Mr. Sammy T. S. Lalamentik serves as Independent Commissioner of the Company since 2021. \r\n\r\nEducational Background:\r\nâ€¢ Diploma in Accounting, State College of Accountancy, Jakarta, Indonesia (1984)\r\nâ€¢ Professional Training Program for Chartered Financial Analysts - IPAF Indonesia & AIMR USA (1991)\r\nâ€¢ International Corporate Finance - New York Institute of Finance, USA (1992)\r\nâ€¢ Credit Risk Modeling - Faculty of International Finance, London, UK (2003)\r\nâ€¢ Corporate Governance Accounting Standards - JICA Bapepam (2005)\r\nâ€¢ Soft Competency - OTI International & Bapepam LK (2011)\r\nâ€¢ Certification for Financial Services Sector Supervisors (SJK) Level 2 (2018)\r\n\r\nCareer History:\r\nâ€¢ Independent Commissioner of PT Surya Fajar Urun Dana (2024 - present)\r\nâ€¢ Independent Commissioner of PT Arsy Buana Travelindo Tbk. (2024 - present)\r\nâ€¢ Independent Commissioner of PT OSO Sekuritas Indonesia (2024 - present)\r\nâ€¢ Audit Committee of PT Nusantara Sejahtera Raya Tbk (2023 - present)\r\nâ€¢ Audit Committee of PT Avia Avian Tbk (2022 - present)\r\nâ€¢ Independent Commissioner of PT Super Energy Tbk (2020 - present)\r\nâ€¢ Commissioner of PT Kredit Rating Indonesia (2020 - present)\r\nâ€¢ Financial Services Authority (OJK) (until 2020)\r\n\r\nMr. Sammy T. S. Lalamentik has no affiliation with members of the Board of Directors, other members of the Board of Commissioners, or controlling shareholders.', 'Bpk_Sammy_T.S._Lalamentik.png', 'Komisaris', '2021-12-15 12:13:16', NULL, '2025-04-29 18:18:58'),
(4, 'Haryanto Sofian', 'DIREKTUR UTAMA', 'PRESIDENT DIRECTOR', 'Warga Negara Indonesia, 62 tahun, berdomisili di Bekasi. Bapak Haryanto Sofian menjabat sebagai Direktur Utama Perseroan sejak tahun 2021.\r\n\r\nRiwayat Pendidikan:\r\nSarjana Ekonomi di Universitas Negeri Jenderal Soedirman (1984)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Direktur Utama PT Putra Brawijaya Lima (2021- Sekarang)\r\nâ€¢ Direktur PT Bhakti Harapan Sejahtera (2021 - Sekarang)\r\nâ€¢ Direktur PT Deli Pratama Batubara (2020 - Sekarang)\r\nâ€¢ Direktur Utama PT Trium Putra Prima (2010 - Sekarang)\r\nâ€¢ Founder Sepatu dan Sandal DR.KEVIN (1993)\r\n\r\nBapak Haryanto Sofian tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 62 years old, domiciled in Bekasi. Mr. Haryanto Sofian serves as President Director of the Company since 2021. \r\n\r\nEducational Background:\r\nBachelor of Economics from Jenderal Soedirman State University (1984)\r\n\r\nCareer History:\r\nâ€¢ President Director of PT Putra Brawijaya Lima (2021 - Present)\r\nâ€¢ Director of PT Bhakti Harapan Sejahtera (2021 â€“ Present)\r\nâ€¢ Director of PT Deli Pratama Batubara (2020 - Present)\r\nâ€¢ President Director of PT Trium Putra Prima (2010 â€“ Present)\r\nâ€¢ Founder of DR.KEVIN Shoes and Sandals (1993)\r\n\r\nMr. Haryanto Sofian has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Bpk_Haryanto_Sofian.jpg', 'Direksi', '2021-12-15 12:50:44', NULL, '2025-04-29 18:29:50'),
(5, 'DR. Untung Haryono', 'DIREKSI', 'DIRECTOR', 'Warga Negara Indonesia, 42 tahun, Bapak Untung Haryono, menjabat sebagai Direktur Perseroan sejak tahun 2009. Sebelumnya, beliau menjabat sebagai Sekretaris Perusahaan di PT Perdana Karya Perkasa, Tbk. (2014-2021).\r\n\r\nBeliau memperoleh gelar Doktor Manajemen dari Universitas Mulawarman, Samarinda (2016).\r\n\r\nBapak Untung Haryono tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 42 years old, Mr. Untung Haryono, serves as Director of the Company since 2009. Previously, he served as Corporate Secretary at PT Perdama Karya Perkasa, Tbk. (2014-2021). \r\n\r\nHe obtained his Doctor of Management degree from Mulawarman University, Samarinda (2016).\r\n\r\nMr. Untung Haryono has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.\r\n', 'Untung.jpg', 'Direksi', '2021-12-15 13:29:38', '2024-05-28 16:49:43', '2022-11-18 15:35:21'),
(6, ' Sammy Tony Saul Lalamentik', 'KETUA', 'CHIEF', 'Warga Negara Indonesia, berusia 62 tahun, berdomisili di Jakarta. Bapak Sammy T. S. Lalamentik menjabat sebagai Ketua Komite Audit sejak tanggal 23 Desember 2021. \r\n\r\nRiwayat Pendidikan:\r\nâ€¢ D3 Akuntansi, Sekolah Tinggi Akuntansi Negara, Jakarta, Indonesia (1984)\r\nâ€¢ Program Pelatihan Profesional untuk Analis Keuangan Chartered - IPAF Indonesia & AIMR USA (1991)\r\nâ€¢ Keuangan Perusahaan Internasional - Institut Keuangan New York USA (1992)\r\nâ€¢ Pemodelan Risiko Kredit - Fakultas Keuangan Internasional London UK (2003)\r\nâ€¢ Standar Akuntansi Tata Kelola Perusahaan - JICA Bapepam (2005)\r\nâ€¢ Soft Competency - OTI Internasional & Bapepam LK (2011)\r\nâ€¢ Sertifikasi Pengawas Sektor Jasa Keuangan (SJK) Level 2 (2018)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Komisaris Independen PT Surya Fajar Urun Dana (Sejak 2024 - sekarang)\r\nâ€¢ Komisaris Independen PT Arsy Buana Travelindo Tbk. (2024 - sekarang)\r\nâ€¢ Komisaris Independen PT OSO Sekuritas Indonesia (2024 - sekarang)\r\nâ€¢ Komite Audit PT Nusantara Sejahtera Raya Tbk (2023 - sekarang)\r\nâ€¢ Komite Audit PT Avia Avian Tbk (2022 - sekarang)\r\nâ€¢ Komisaris Independen PT Super Energy Tbk (2020 - sekarang)\r\nâ€¢ Komisaris PT Kredit Rating Indonesia (2020 - sekarang)\r\nâ€¢ Otoritas Jasa Keuangan (hingga 2020)\r\n\r\nBapak Sammy T. S. Lalamentik tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 62 years old, domiciled in Jakarta. Mr. Sammy T. S. Lalamentik  serves as Chair of the Audit Committee since 23 December 2021. 							\r\n\r\nEducational Background:\r\nâ€¢ Diploma in Accounting, State College of Accountancy, Jakarta, Indonesia (1984)\r\nâ€¢ Professional Training Program for Chartered Financial Analysts - IPAF Indonesia & AIMR USA (1991)\r\nâ€¢ International Corporate Finance - New York Institute of Finance, USA (1992)\r\nâ€¢ Credit Risk Modeling - Faculty of International Finance, London, UK (2003)\r\nâ€¢ Corporate Governance Accounting Standards - JICA Bapepam (2005)\r\nâ€¢ Soft Competency - OTI International & Bapepam LK (2011)\r\nâ€¢ Certification for Financial Services Sector Supervisors (SJK) Level 2 (2018)\r\n\r\nCareer History:\r\nâ€¢ Independent Commissioner of PT Surya Fajar Urun Dana (2024 - present)\r\nâ€¢ Independent Commissioner of PT Arsy Buana Travelindo Tbk. (2024 - present)\r\nâ€¢ Independent Commissioner of PT OSO Sekuritas Indonesia (2024 - present)\r\nâ€¢ Audit Committee of PT Nusantara Sejahtera Raya Tbk (2023 - present)\r\nâ€¢ Audit Committee of PT Avia Avian Tbk (2022 - present)\r\nâ€¢ Independent Commissioner of PT Super Energy Tbk (2020 - present)\r\nâ€¢ Commissioner of PT Kredit Rating Indonesia (2020 - present)\r\nâ€¢ Financial Services Authority (OJK) (until 2020)\r\n\r\nMr. Sammy T. S. Lalamentik has no affiliation with members of the Board of Directors, other members of the Board of Commissioners, or controlling shareholders.', 'Bpk_Sammy_T.S._Lalamentik.png', 'Komite Audit', '2021-12-15 13:34:02', NULL, '2025-04-29 19:05:51'),
(7, 'Ferianto, SE, MM', 'ANGGOTA', 'MEMBER', 'Warga Negara Indonesia, 64 tahun, berdomisili di Depok. Bapak Ferianto menjabat sebagai Anggota Komite Audit Perseroan sejak tanggal 23 Desember 2021. \r\n\r\nRiwayat Pendidikan:\r\nâ€¢ Sarjana Ekonomi Pembangunan, Universitas Muslim Indonesia Makassar (1986)\r\nâ€¢ Magister Manajemen Keuangan, Universitas Bhayangkara Jakarta (2009)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Komisaris Independen PT Logisticsplus Internasional Tbk (2023 - sekarang)\r\nâ€¢ Kepala Bagian Standar dan Pedoman Pemeriksaan Pasar Modal, Direktorat Standar Akuntansi dan Tata Kelola, Otoritas Jasa Keuangan dan beberapa posisi di Badan Pengawas Pasar Modal, Departemen Keuangan Republik Indonesia (tahun 2019)\r\n\r\nBapak Ferianto tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 64 years old, domiciled in Depok. Mr. Ferianto serves as Audit Comittee Member of the Company since 23 December 2021. \r\n\r\nEducational Background:\r\nâ€¢ Bachelorâ€™s Degree in Development Economics, Universitas Muslim Indonesia Makassar (1986)\r\nâ€¢ Masterâ€™s Degree in Financial Management, Universitas Bhayangkara Jakarta (2009)\r\n\r\nCareer History:\r\nâ€¢ Independent Commissioner, PT Logisticsplus Internasional Tbk (2023 - Present)\r\nâ€¢ Head of the Standards and Guidelines Section for Capital Market Supervision, Directorate of Accounting Standards and Governance, Financial Services Authority, and various positions in the Capital Market Supervisory Agency, Ministry of Finance of the Republic of Indonesia (2019)\r\n\r\nMr. Ferianto has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Ferianto.jpg', 'Komite Audit', '2021-12-15 13:34:47', NULL, '2025-04-29 18:52:16'),
(8, 'Ari Binsar', 'ANGGOTA', 'MEMBER', 'Warga Negara Indonesia, 59 tahun, berdomisili di Tangerang. Bapak Ari Bisnar menjabat sebagai Anggota Komite Audit Perseroan sejak tahun 2021. Selain itu, beliau juga menjabat sebagai Komite Audit di PT Gaya Abadi Sempurna Tbk sejak 2019, Komite Audit di PT Indah Prakarsa Sentosa Tbk sejak 2018, dan Direktur di PT Strategis Prima Konsultanindo sejak 2018.\r\n\r\nBeliau memperoleh gelar Diploma III (1985) dan Diploma IV (1992) dari Sekolah Tinggi Akuntansi Negara, Jakarta, Indonesia.\r\n\r\nBapak Ari Binsar tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali', 'Indonesian citizen, 59 years old, domiciled in Tangerang. Mr. Ari Binsar serves as Audit Comittee Member of the Company since 2021. In addition, he also serves as Audit Committee at PT Gaya Abadi Sempurna Tbk since 2019, Audit Committee at PT Indah Prakarsa Sentosa Tbk since 2018, and Director at PT Strategis Prima Konsultanindo since 2018.\r\n\r\nHe obtained Diploma III (1985) and Diploma IV (1992) from Sekolah Tinggi Akuntansi Negara, Jakarta, Indonesia.\r\n\r\nMr. Ari Binsar has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Bpk_Ari_Binsar.jpg', 'Komite Audit', '2021-12-15 13:35:21', '2023-03-01 13:51:32', NULL),
(9, ' Antonius Ferry Bastian', 'SEKRETARIS PERUSAHAAN', 'CORPORATE SECRETARY', 'Warga Negara Indonesia, 34 tahun, berdomisili di Jakarta. Bapak Antonius Ferry Bastian menjabat sebagai Corporate Secretary Perseroan sejak tahun 2021. Selain itu, beliau juga menjabat sebagai Kepala Departemen Legal dalam lingkungan usaha PT Deli Pratama Batubara sejak tahun 2018.\r\n\r\nBeliau memperoleh gelar Sarjana Hukum (2011) dan Master Hukum (2021) dari Universitas Tarumanagara, Jakarta, Indonesia. Beliau telah menjadi anggota Perhimpunan Advokat Indonesia (PERADI) sejak tahun 2016.\r\n\r\nBapak Antonius Ferry Bastian tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 34 years old, domiciled in Jakarta. Mr. Antonius Ferry Bastian serves as Corporate Secretary of the Company since 2021. In addition, he serves as Head of Legal Department within the business environment of PT Deli Pratama Batubara.\n\nHe obtained S1 Bachelor of Law (2011) and Master of Law (2021) from Universitas Tarumanagara, Jakarta, Indonesia. He also become a member of Perhimpunan Advokat Indonesia (PERADI) since 2016.\n\nMr. Antonius Ferry Bastian has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Bpk_Antonius_Ferry_Bastian.jpg', 'Sekretaris Perusahaan', '2021-12-15 13:36:03', '2023-03-01 13:27:04', '2023-03-01 13:03:40'),
(10, 'Irma Euginia', 'Sekretaris Perusahaan', 'Corporate Secretary', 'Warga Negara Indonesia, 52 tahun, berdomisili di Jakarta. Ibu Irma Euginia menjabat sebagai Corporate Secretary Perseroan sejak tanggal 1 Maret 2023. \r\n\r\nRiwayat Pendidikan:\r\nSarjana Hukum dari Universitas Universitas Katolik Atma Jaya, Jakarta Indonesia (1995)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Kepala Divisi Legal PT Deli Pratama Batubara (tahun 2021 â€“ 2022)\r\nâ€¢ Kepala Divisi Legal PT Karyamas Adinusantara (tahun 2016 â€“ 2021)\r\nâ€¢ Kepala Divisi Legal PT Surya Semesta Internusa Tbk (tahun 2013 - 2015)\r\nâ€¢ Legal Manager PT Smart Tbk (tahun 2010 - 2012)\r\nâ€¢ Kepala Divisi Legal PT Pelayaran Tempuran Emas Tbk (tahun 2008 - 2010)\r\nâ€¢ Kepala Divisi Legal PT Dos Ni Roha (tahun 2006 - 2008)\r\nâ€¢ Legal Manager PT Kalbe Farma Tbk (tahun 2004 - 2006)\r\nâ€¢ Legal Manager PT Dankos Farma (tahun 1996 - 2004)\r\nâ€¢ Associate Lawyer Makes and Partners Law Firm (tahun 1995 -1996 )\r\n\r\nIbu Irma Euginia tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 52 years old, domiciled in Jakarta. Mrs. Irma Euginia serves as Corporate Secretary of the Company since 1 March 2023. \r\n\r\nEducational Background:\r\nBachelor of Law degree from Atma Jaya Catholic University, Jakarta, Indonesia (1995)\r\n\r\nCareer History:\r\nâ€¢ Head of Legal Division at PT Deli Pratama Batubara (2021â€“2022)\r\nâ€¢ Head of Legal Division at PT Karyamas Adinusantara (2016â€“2021)\r\nâ€¢ Head of Legal Division at PT Surya Semesta Internusa Tbk (2013â€“2015)\r\nâ€¢ Legal Manager at PT Smart Tbk (2010â€“2012)\r\nâ€¢ Head of Legal Division at PT Pelayaran Tempuran Emas Tbk (2008â€“2010)\r\nâ€¢ Head of Legal Division at PT Dos Ni Roha (2006â€“2008)\r\nâ€¢ Legal Manager at PT Kalbe Farma Tbk (2004â€“ 2006)\r\nâ€¢ Legal Manager at PT Dankos Farma (1996 â€“ 2004)\r\nâ€¢ Associate Lawyer at Makes and Partners Law Firm (1995â€“1996)\r\n\r\nMrs. Irma Euginia has no affiliation with other members of the Board of Directors, Board of Commissioners, and controlling shareholders.', 'Irma Euginia-Corsec.jpg', 'Sekretaris Perusahaan', '2023-03-01 13:40:58', NULL, '2025-04-29 19:03:25'),
(11, 'Ari Binsar', 'ANGGOTA', 'MEMBER', 'Warga Negara Indonesia, 61 tahun, berdomisili di Jakarta. Bapak Ari Binsar menjabat sebagai Anggota Komite Audit Perseroan sejak tahun 2021. \n\nSelain itu, beliau juga menjabat sebagai Komite Audit di PT Gaya Abadi Sempurna Tbk sejak 2019, Komite Audit di PT Indah Prakarsa Sentosa Tbk sejak 2018, dan Direktur di PT Strategis Prima Konsultanindo sejak 2018. Beliau memperoleh gelar Diploma III (1985) dan Diploma IV (1992) dari Sekolah Tinggi Akuntansi Negara, Jakarta, Indonesia. \n\nBapak Ari Binsar tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 61 years old, domiciled in Jakarta. Mr. Ari Binsar has served as Member of the Company\'s Audit Committee since 2021. \n\nAdditionally, he has also served on the Audit Committee at PT Gaya Abadi Perfect Tbk since 2019, the Audit Committee at PT Indah Prakarsa Sentosa Tbk since 2018, and Director at PT Strategis Prima Consultantindo since 2018. He obtained a Diploma III degree (1985) and Diploma IV (1992) from the State College of Accountancy, Jakarta, Indonesia. \n\nMr. Ari Binsar has no affiliation with other members of the Board of Directors, Board of Commissioners, or controlling shareholders.', 'Bpk_Ari_Binsar.jpg', 'Komite Audit', '2024-05-28 16:37:23', '2024-05-29 17:44:59', NULL),
(12, 'Sabina Aulia', 'ANGGOTA', 'MEMBER', 'Warga Negara Indonesia, 34 tahun, berdomisili di Bogor. Ibu Sabina Aulia menjabat sebagai Anggota Komite Audit Perseroan sejak tanggal 28 Mei 2024. \n\nRiwayat Pendidikan:\nSarjana Akuntansi, Perbanas Institute Jakarta (2013)\n\nRiwayat Pekerjaan:\n- Sekretaris Direktur Layanan ICT untuk Komunitas & Pemerintah, Bakti KOMINFO (2023 - Sekarang)\n- Audit Internal Techno Consult Indonesia (2021 - 2023)\n- Administrator Proyek CME (Proyek Tower BTS) Konsultan, Bakti KOMINFO (2021 - 2021)\n- Senior Finance and Accounting PT Mitramedia Lestari Nusantara (2017 - 2020)\n- Staf Bisnis Keuangan dan Administrasi, PT Propagare Aktifasi Media (2015 - 2017)\n- Staf AR Keuangan, PT Multi Fabrindo Gemilang (Medco Group) (2013 - 2015)\n\nIbu Sabina Aulia tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 34 years old, domiciled in Bogor. Ms. Sabina Aulia has served as Member of the Company\'s Audit Committee since 28 May 2024. \n\nEducational Background:\nBachelor\'s Degree in Accounting, Perbanas Institute Jakarta (2013)\n\nCareer History:\n- Secretary to Director of ICT Services for Community & Government, Bakti KOMINFO (2023 - Present)\n- Internal Audit Techno Consult Indonesia (2021 - 2023)\n- Project Administrator CME (Tower BTS Project) Consultant, Bakti KOMINFO (2021 - 2021)\n- Senior Finance and Accounting PT Mitramedia Lestari Nusantara (2017 - 2020)\n- Finance and Admin Business Staff, PT Propagare Aktifasi Media (2015 - 2017)\n- AR Finance Staff, PT Multi Fabrindo Gemilang (Medco Group) (2013 - 2015)\n\nMs. Sabina Aulia has no affiliation with members of the Board of Directors, other Board of Commissioners, or controlling shareholders.', 'Ibu_Sabina_Aulia.jpg', 'Komite Audit', '2024-05-30 15:37:02', NULL, NULL),
(13, 'Bambang Subagio Wiyono', 'DIREKSI', 'DIRECTOR', 'Warga Negara Indonesia, 64 tahun, berdomisili di Tangerang. Bapak Bambang Subagio Wiyono menjabat sebagai Direktur Perseroan sejak tahun 2024. \r\n\r\nRiwayat Pendidikan:\r\nSarjana Teknik Sipil, Universitas Parahyangan, Bandung (1986)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Direktur Utama PT Intitirta Primasakti, Jakarta (2023 - Sekarang)\r\nâ€¢ Direktur PT Sarolangun Ketalo Coal, Jakarta (2011 - Sekarang)\r\nâ€¢ Direktur PT Inti Bangun Sarana, Jakarta (2014 - 2023)\r\nâ€¢ Direktur PT Karsatama Bumi Sejahtera, Jakarta (1997 - 2000)\r\nâ€¢ General Manager PT Bumi Alam Papan Indah, Jakarta (1991 - 1997)\r\nâ€¢ Direktur PT Central Alam Sejahtera, Jakarta (1987 - 1991)\r\nâ€¢ Project Manager PT Bumi Sarana Rejeki, Tangerang (1987-1989)\r\nâ€¢ Site Manager Project PT Bumi Sarana Rejeki, Tangerang (1986-1987)\r\nâ€¢ Staf Perencana Sipil PT Gita Rancana Konsultan, Bandung (1986)\r\nâ€¢ Staf Ahli Madya/Asisten Dosen Universitas Katolik Parahyangan, Bandung (1985 - 1987)\r\n\r\nBapak Bambang Subagio Wiyono tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.\r\n', 'Indonesian citizen, 64 years old, domiciled in Tangerang. Mr. Bambang Subagio Wiyono has served as Director of the Company since 2024. \r\n\r\nEducational Background:\r\nBachelor of Civil Engineering, Parahyangan University, Bandung (1986)\r\n\r\nCareer History:\r\nâ€¢ President Director of PT Intitirta Primasakti, Jakarta (2023 - Present)\r\nâ€¢ Director of PT Sarolangun Ketalo Coal, Jakarta (2011 - Present)\r\nâ€¢ Director of PT Inti Bangun Sarana, Jakarta (2014 - 2023)\r\nâ€¢ Director of PT Karsatama Bumi Sejahtera, Jakarta (1997 - 2000)\r\nâ€¢ General Manager of PT Bumi Alam Papan Indah, Jakarta (1991 - 1997)\r\nâ€¢ Director of PT Central Alam Sejahtera, Jakarta (1987 - 1991)\r\nâ€¢ Project Manager of PT Bumi Sarana Rejeki, Tangerang (1987 - 1989)\r\nâ€¢ Site Manager of PT Bumi Sarana Rejeki Project, Tangerang (1986 - 1987)\r\nâ€¢ Civil Engineering Planner Staff of PT Gita Rancana Konsultan, Bandung (1986)\r\nâ€¢ Senior Expert Staff/Assistant Lecturer at Parahyangan Catholic University, Bandung (1985 - 1987)\r\n\r\nMr. Bambang Subagio Wiyono has no affiliation with members of the Board of Directors, other Board of Commissioners, and controlling shareholders.', 'Bpk_Bambang_Subagio_Wiyono.jpeg', 'Direksi', '2024-05-30 15:37:05', NULL, '2025-04-29 18:41:30'),
(14, 'Agus Satria Utara', 'DIREKSI', 'DIRECTOR', 'Warga Negara Indonesia, 59 tahun, berdomisili di Jakarta. Bapak Agus Satria Utara menjabat sebagai Direktur Perseroan sejak tahun 2024.\r\n \r\nRiwayat Pendidikan:\r\nâ€¢ Magister Ilmu Administrasi Perpajakan, Universitas Indonesia, Jakarta (2003)\r\nâ€¢ Sarjana Akuntansi, STIE Nusantara, Jakarta (2001)\r\nâ€¢ Diploma III Pajak Sekolah Tinggi Akuntansi Negara (STAN), Jakarta (1987)\r\n\r\nRiwayat Pekerjaan:\r\nâ€¢ Komisaris PT Tribuana Global Group (2023 - Sekarang)\r\nâ€¢ Kepala Bidang Pemeriksaan, Penagihan, Intelijen dan Penyidikan (P2IP) Kantor Wilayah DJP Jakarta Khusus (2021 - 2023)\r\nâ€¢ Kepala Kantor KPP Pratama Karawang Selatan â€“ Jawa Barat II (2020 - 2021)\r\nâ€¢ Kepala Bidang Pemeriksaan, Penagihan, Intelijen dan Penyidikan (P2IP) Kantor Wilayah DJP Riau (2018 - 2020)\r\nâ€¢ Kepala Bidang Pemeriksaan, Penagihan, Intelijen dan Penyidikan (P2IP) Kantor Wilayah DJP Riau dan Kepulauan Riau (2016 - 2018)\r\nâ€¢ Kepala Bidang Pemeriksaan, Penagihan, Intelijen dan Penyidikan (P2IP) Kantor Wilayah DJP Jakarta Selatan (2014 - 2016)\r\nâ€¢ Penyidik/PPNS di Direktorat Jenderal Pajak (2008 - 2014)\r\nâ€¢ Auditor/FPP di Direktorat Jenderal Pajak(1990 - 2008)\r\n\r\nBapak Agus Satria Utara tidak memiliki hubungan afiliasi dengan anggota Direksi, Dewan Komisaris lainnya, dan pemegang saham pengendali.', 'Indonesian citizen, 59 years old, domiciled in Jakarta. Mr. Agus Satria Utara has served as Director of the Company since 2024.\r\n\r\nEducational Background:\r\nâ€¢ Master of Tax Administration, University of Indonesia, Jakarta (2003)\r\nâ€¢ Bachelor of Accounting, STIE Nusantara, Jakarta (2001)\r\nâ€¢ Diploma III in Taxation, State College of Accountancy (STAN), Jakarta (1987)\r\n\r\nCareer History:\r\nâ€¢ Commissioner of PT Tribuana Global Group (2023 - Present)\r\nâ€¢ Head of Inspection, Collection, Intelligence, and Investigation Division (P2IP), Directorate General of Taxes (DGT) Jakarta Special Office (2021 - 2023)\r\nâ€¢ Head of Primary Tax Office (KPP Pratama) South Karawang â€“ West Java II (2020 - 2021)\r\nâ€¢ Head of Inspection, Collection, Intelligence, and Investigation Division (P2IP), DGT Riau Office (2018 - 2020)\r\nâ€¢ Head of Inspection, Collection, Intelligence, and Investigation Division (P2IP), DGT Riau and Riau Islands Office (2016 - 2018)\r\nâ€¢ Head of Inspection, Collection, Intelligence, and Investigation Division (P2IP), DGT South Jakarta Office (2014- 2016)\r\nâ€¢ Investigator/FPP PPNS, Directorate General of Taxation (2008 - 2014)\r\nâ€¢ Tax Auditor, Directorate General of Taxation (1990 - 2008)\r\n\r\nMr. Agus Satria Utara has no affiliation with other members of the Board of Directors, Board of Commissioners, or controlling shareholders.', 'Bpk_Agus_Satria_Utara.jpeg', 'Direksi', '2024-05-30 15:37:10', NULL, '2025-04-29 18:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `rupsmom`
--

CREATE TABLE `rupsmom` (
  `ID_Laporan` int(11) NOT NULL,
  `Judul` varchar(5000) DEFAULT NULL,
  `Title` varchar(5000) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Des` text DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `PDF` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rupsmom`
--

INSERT INTO `rupsmom` (`ID_Laporan`, `Judul`, `Title`, `Tahun`, `Des`, `Deskripsi`, `PDF`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'Ringkasan Risalah RUPST RUPSLB 31 Agustus 2020', 'MOM AGMS EGMS August 31, 2020', 2020, '', '', 'Ringkasan_Risalah_RUPST_RUPSLB_PKPK_31_Agustus_2020.pdf', '2020-08-31 16:29:50', NULL, '2021-12-13 14:36:27'),
(3, 'Ringkasan Risalah RUPST 3 Juli 2018', 'MOM AGMS July 3, 2018', 2018, '', '', 'Ringkasan_Risalah_RUPST_PKPK_29_Juni_2018.pdf', '2018-06-29 13:11:20', NULL, '2021-12-21 13:32:59'),
(4, 'Ringkasan Risalah RUPST RUPSLB 21 Juni 2017', 'MOM AGMS EGMS June 21, 2017', 2017, '', '', 'Ringkasan_Risalah_RUPST_RUPSLB_PKPK_21_Juni_2017.pdf', '2017-06-21 14:37:22', NULL, NULL),
(5, 'Ringkasan Risalah RUPST 24 Juni 2019', 'MOM AGMS June 24, 2019	', 2019, '', '', 'Ringkasan_Risalah_RUPST_PKPK_24_Juni_2019.pdf', '2019-06-24 10:52:44', NULL, NULL),
(6, 'Ringkasan Risalah RUPST 30 Juni 2016', 'MOM AGMS June 30, 2016', 2016, '', '', 'Ringkasan_Risalah_RUPST_PKPK_30_Juni_2016.pdf', '2016-06-30 10:54:22', NULL, NULL),
(7, 'Ringkasan Risalah RUPST 30 Juni 2015', 'MOM AGMS June 30, 2015', 2015, '', '', 'Ringkasan_Risalah_RUPST_PKPK_30_Juni_2015.pdf', '2015-06-30 10:55:06', NULL, NULL),
(8, 'Ringkasan Risalah RUPSLB 5 Mei 2023', 'MOM EGMS May 5, 2023', 2023, '', '', 'pkpk-covernote-RUPSLB-5Mei2023.pdf', '2023-05-08 16:30:57', NULL, '2025-03-19 11:20:14'),
(9, 'Ringkasan Risalah RUPSLB 8 Januari 2024', 'MOM EGMS January 8, 2024', 2024, '', '', 'Cover Note Notaris RUPS LB Peng. Dana-8Jan2024.pdf', '2024-01-09 14:39:26', NULL, NULL),
(10, 'Ringkasan Risalah RUPST 28 Mei 2024', 'MOM AGMS EGMS May 28, 2024', 2024, '', '', 'PKPK-Cover Note RUPST.pdf', '2025-03-19 10:12:27', NULL, '2025-05-27 00:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `shareholder`
--

CREATE TABLE `shareholder` (
  `ID_SH` int(11) NOT NULL,
  `shareholder_name` varchar(5000) DEFAULT NULL,
  `nama_pemegangsaham` varchar(5000) DEFAULT NULL,
  `NOS` int(11) DEFAULT NULL,
  `percent` float DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shareholder`
--

INSERT INTO `shareholder` (`ID_SH`, `shareholder_name`, `nama_pemegangsaham`, `NOS`, `percent`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'PT DELI PUTRA BANGSA', 'PT DELI PUTRA BANGSA', 900000000, 75, '2021-12-20 11:58:51', NULL, '2025-03-19 09:52:12'),
(2, 'PUBLIC', 'MASYARAKAT', 300000000, 25, '2021-12-20 12:01:08', NULL, '2024-07-24 14:39:23'),
(3, 'BAMBANG SUBAGIO WIYONO', 'BAMBANG SUBAGIO WIYONO', 2285000, 0.19, '2024-07-24 14:31:48', '2024-07-24 14:39:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subheader`
--

CREATE TABLE `subheader` (
  `ID` int(11) NOT NULL,
  `pageInd` varchar(5000) DEFAULT NULL,
  `pageEng` varchar(5000) DEFAULT NULL,
  `PageNameInd` varchar(5000) DEFAULT NULL,
  `PageNameEng` varchar(5000) DEFAULT NULL,
  `sub_header` varchar(5000) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subheader`
--

INSERT INTO `subheader` (`ID`, `pageInd`, `pageEng`, `PageNameInd`, `PageNameEng`, `sub_header`, `description`, `created_date`, `delete_date`, `update_date`) VALUES
(1, 'visi-&-misi', 'vision-&-mission', 'Visi & Misi', 'Vission & Mission', '7.png', 'Vision And Mission', NULL, NULL, '2025-05-06 12:07:45'),
(2, 'tentang-kami', 'about-us', 'Profile Perusahaan', 'Company Profile', '3.png', 'Company Profile', NULL, NULL, '2025-05-06 12:07:34'),
(4, 'perjalanan-perusahaan', 'growth-journey', 'Perjalanan Perusahaan', 'Growth Journey', '8.png', 'Growth Journey', '2021-12-14 16:13:03', NULL, '2025-05-06 12:06:56'),
(5, 'managemen', 'management', 'Managemen', 'Management', '1.png', 'Management', '2021-12-15 11:29:33', NULL, '2025-05-06 12:06:43'),
(6, 'laporan-perusahaan', 'company-report', 'Laporan Perusahaan', 'Company Report', '2.png', 'Company Report', '2021-12-15 13:59:22', NULL, '2025-05-06 12:06:23'),
(7, 'rups', 'general-meeting-shareholders', 'Rapat Umum Pemegang Saham', 'General Meeting Shareholders', '16.png', 'GMS', '2021-12-15 14:00:50', NULL, '2025-05-06 12:34:24'),
(8, 'kepemilikan-saham', 'shareholders-information', 'Kepemilikan Saham', 'Shareholders Information', '4.png', 'Shareholder Information', '2021-12-15 14:04:14', NULL, '2025-05-06 12:05:56'),
(9, 'keterbukaan-informasi', 'disclosure-information', 'Keterbukaan Informasi', 'Disclosure Information', '5.png', 'Disclosure Information', '2021-12-15 14:08:28', NULL, '2025-05-06 12:05:46'),
(10, 'prospektus', 'prospectus', 'Prospektus', 'Prospectus', '17.png', 'Prospektus', '2021-12-15 14:18:23', NULL, '2025-05-06 12:34:50'),
(11, 'penghargaan-&-sertifikat', 'award-&-certifications', 'Penghargaan & Sertifikat', 'Award & Certifications', '10.png', '', '2021-12-16 14:28:57', NULL, '2025-05-06 12:04:52'),
(12, 'tata-kelola-perusahaan', 'good-corporate-governance', 'Tata Kelola Perusahaan', 'Good Corporate Governance', '11.png', '', '2021-12-16 14:30:21', NULL, '2025-05-06 12:04:31'),
(13, 'bisnis-kami', 'our-businesses', 'Bisnis Kami', 'Our Businesses', '12.png', '', '2021-12-16 14:30:59', NULL, '2025-05-06 12:04:21'),
(14, 'hubungi-kami', 'contact', 'Hubungi Kami', 'Contact Us', '13.png', '', '2021-12-16 14:32:04', NULL, '2025-05-06 12:04:11'),
(15, 'peta-situs', 'sitemap', 'Peta Situs', 'Sitemap', '15.png', '', '2021-12-16 14:32:46', NULL, '2025-05-06 12:02:48'),
(16, 'pencarian', 'search', 'Pencarian', 'Search', '14.png', '', '2021-12-16 14:33:37', NULL, '2025-05-06 12:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Role` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) NOT NULL,
  `about_me` varchar(20000) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Role`, `username`, `email_address`, `password`, `firstname`, `lastname`, `address`, `city`, `country`, `phone_number`, `about_me`, `update_date`, `created_date`, `delete_date`) VALUES
(1, 1, 'Admin', 'djoni.h@deli.id', 'admin12345', 'Djoni', 'Halim', 'Jl. Arteri Permata Hijau', 'Jakarta Selatan', 'Indonesia', '081275289975', 'Work at Deli Niaga Sejahtera since 2019.\r\nits a nice place to work', '2021-05-25 11:59:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vission_mission`
--

CREATE TABLE `vission_mission` (
  `ID_VM` int(11) NOT NULL,
  `vission` varchar(5000) DEFAULT NULL,
  `visi` varchar(5000) DEFAULT NULL,
  `mission` varchar(5000) DEFAULT NULL,
  `misi` varchar(5000) DEFAULT NULL,
  `motto` varchar(5000) DEFAULT NULL,
  `moto` varchar(5000) DEFAULT NULL,
  `phylosophy` varchar(5000) DEFAULT NULL,
  `filosofi` varchar(5000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vission_mission`
--

INSERT INTO `vission_mission` (`ID_VM`, `vission`, `visi`, `mission`, `misi`, `motto`, `moto`, `phylosophy`, `filosofi`, `created_date`, `delete_date`, `update_date`) VALUES
(3, 'TO GROW WITH THE NATION', 'UNTUK BERKEMBANG BERSAMA BANGSA', 'TO RENDER SATISFACTION TO THE STAKEHOLDERS', 'UNTUK MEMBERIKAN KEPUASAN KEPADA MITRA USAHA', 'RELIABLE PARTNER', 'MITRA SETIA TERPERCAYA', '1. STRIVE TO BE THE BEST\r\n2. MAINTAIN GOOD COOPERATION AMONGST EMPLOYEES\r\n3. KEEP STRONG COMMITMENT TO CUSTOMER AND STAKEHOLDERS', '1. BERUSAHA MENCAPAI YANG TERBAIK\r\n2. MEMBINA KERJASAMA YANG BAIK ANTAR KARYAWAN\r\n3. MEMEGANG TEGUH KOMITMEN BAIK TERHADAP PELANGGAN DAN MITRA KERJA', '2021-12-14 13:33:38', NULL, '2022-05-17 17:09:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcementrups`
--
ALTER TABLE `announcementrups`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`ID_Audit`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`ID_CP`);

--
-- Indexes for table `financialhighlight`
--
ALTER TABLE `financialhighlight`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `financialstatement`
--
ALTER TABLE `financialstatement`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `gcg`
--
ALTER TABLE `gcg`
  ADD PRIMARY KEY (`ID_GCG`);

--
-- Indexes for table `gcg2`
--
ALTER TABLE `gcg2`
  ADD PRIMARY KEY (`ID_GCG2`);

--
-- Indexes for table `growth_journey`
--
ALTER TABLE `growth_journey`
  ADD PRIMARY KEY (`ID_GJ`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`ID_HM`);

--
-- Indexes for table `invitationrups`
--
ALTER TABLE `invitationrups`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `keterbukaaninformasi`
--
ALTER TABLE `keterbukaaninformasi`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`ID_M`);

--
-- Indexes for table `our_businesses`
--
ALTER TABLE `our_businesses`
  ADD PRIMARY KEY (`ID_OB`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`ID_People`);

--
-- Indexes for table `rupsmom`
--
ALTER TABLE `rupsmom`
  ADD PRIMARY KEY (`ID_Laporan`);

--
-- Indexes for table `shareholder`
--
ALTER TABLE `shareholder`
  ADD PRIMARY KEY (`ID_SH`);

--
-- Indexes for table `subheader`
--
ALTER TABLE `subheader`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vission_mission`
--
ALTER TABLE `vission_mission`
  ADD PRIMARY KEY (`ID_VM`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcementrups`
--
ALTER TABLE `announcementrups`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `ID_Audit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `ID_CP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `financialhighlight`
--
ALTER TABLE `financialhighlight`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financialstatement`
--
ALTER TABLE `financialstatement`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gcg`
--
ALTER TABLE `gcg`
  MODIFY `ID_GCG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gcg2`
--
ALTER TABLE `gcg2`
  MODIFY `ID_GCG2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `growth_journey`
--
ALTER TABLE `growth_journey`
  MODIFY `ID_GJ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `ID_HM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `invitationrups`
--
ALTER TABLE `invitationrups`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `keterbukaaninformasi`
--
ALTER TABLE `keterbukaaninformasi`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `ID_M` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `our_businesses`
--
ALTER TABLE `our_businesses`
  MODIFY `ID_OB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `ID_People` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rupsmom`
--
ALTER TABLE `rupsmom`
  MODIFY `ID_Laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shareholder`
--
ALTER TABLE `shareholder`
  MODIFY `ID_SH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subheader`
--
ALTER TABLE `subheader`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vission_mission`
--
ALTER TABLE `vission_mission`
  MODIFY `ID_VM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
