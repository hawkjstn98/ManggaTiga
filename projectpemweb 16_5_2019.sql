-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2019 at 02:56 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectpemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barangId` int(11) NOT NULL,
  `barangNama` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `categoryId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `aksesBarang` int(11) NOT NULL,
  `promoId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barangId`, `barangNama`, `details`, `categoryId`, `brandId`, `hargaJual`, `stock`, `aksesBarang`, `promoId`) VALUES
(1, 'Acus', 'Ini Barang Mahal.', 1, 1, 9000000, 1, 1, 1),
(2, 'B390 Pro', 'Ini barang murah', 1, 1, 900000, 3, 1, 1),
(3, 'Apple MacBook MRQN2 Gold', '1.2GHz Dual-Core Intel Core m3 (Turbo Boost up to 3.0GHz), RAM 8GB 1866MHz LPDDR3, 256GB SSD, 12-inch, Intel HD Graphics 615, MacOS', 2, 3, 19599000, 5, 1, 1),
(4, 'Apple MacBook Pro MR942 Touch Bar Grey/ MR972 Touch Bar Silver', '2.6GHz 6-core 8th-generation Intel Core i7 processor (Turbo Boost up to 4.3GHz), 16GB 2400MHz DDR4, 512GB SSD Storage, 15-inch Retina Display, Radeon Pro 560X with 4GB of GDDR5', 2, 3, 36450000, 5, 1, 1),
(5, 'MSI GE63 8RF Win 10 + Optane', 'Intel Core i7-8750HQ, RAM 16GB, HDD 1TB, Optane 16GB, SSD 256GB, 15.6\", nVidia GeForce GTX 1070 8GB, Win 10 Home', 2, 18, 31999000, 5, 1, 1),
(6, 'MSI GT75 8RG Win 10 + Optane', 'Intel Core i9-8950HK, RAM 32GB, HDD 1TB, Optane 16GB, SSD 512GB, 17.3\", nVidia GeForce GTX 1080 8GB, Win 10 Home', 2, 18, 65999000, 5, 1, 1),
(7, 'Lenovo Ideapad 330S-5AID', 'Intel Core i7 8550U, RAM 4GB, Intel Optane 16GB, HDD 1TB, nVidia GeForce GTX 1050 4GB GDDR5, 15.6 FHD IPS, Win 10 Home', 2, 15, 14700000, 5, 1, 1),
(8, 'Lenovo IP510S-0LID/0MID', 'Intel Core i7 7500U, RAM 4GB DDR4, HDD 1TB, 14\" FHD, nVidia Geforce 940MX 2GB, Win 10 Home', 2, 15, 11000000, 5, 1, 1),
(9, 'HP Elitebook 820 G3 40PA', 'Intel Core i7-6500U, 8GB DDR4, 256GB SSD, WiFi, Bluetooth, Intel HD Graphics 520, Camera, Fingerprint, 12.5\", Win 10 Pro', 2, 13, 19850000, 5, 1, 1),
(10, 'HP Pavilion 13-AN0014TU', 'Intel Core i7-8565U, RAM 8GB, SSD 512GB, 13.3\" FHD, Intel HD Graphics, NO DVDRW, Win 10 Home', 2, 13, 14850000, 5, 1, 1),
(11, 'LG 27\" LED 27GK750 Gaming Monitor With FreeSync', '', 3, 16, 7600000, 5, 1, 1),
(12, 'LG 19\" LED 19MB15T (Touchscreen)', '', 3, 16, 3315000, 5, 1, 1),
(13, 'SAMSUNG 28\" U28E590D LED - 4K Resolution !', '', 3, 21, 5060000, 5, 1, 1),
(14, 'SAMSUNG 27\" C27F591F CURVED LED Wide Screen', '', 3, 21, 3850000, 5, 1, 1),
(15, 'DELL 24\" P2418HT LED Touch Screen', '', 3, 10, 4945000, 5, 1, 1),
(16, 'DELL 23\" P2314T LED Touch Screen', '', 3, 10, 4035000, 5, 1, 1),
(17, 'Corsair Crystal 570X RGB Mirror Tempered Glass', '', 4, 8, 3005000, 5, 1, 1),
(18, 'Corsair Obsidian 1000D Black', '', 4, 8, 7660000, 5, 1, 1),
(19, 'be quiet! Gaming Case DARK BASE 900 Silver - Modular Construction', '', 4, 6, 2750000, 5, 1, 1),
(20, 'be quiet! Gaming Case DARK BASE PRO 900 Black REV.2 - Modular Construction - Fully Window Side Panel', '', 4, 6, 3990000, 5, 1, 1),
(21, 'Cooler MasterBox 5 MSI Dragon Edition', '', 4, 7, 898000, 5, 1, 1),
(22, 'Cooler Master Cosmos II 25th Anniversary Edition (RC-1200-KKN2)', '', 4, 7, 5880000, 5, 1, 1),
(23, 'CUBE GAMING BEAST RED- Alumunium Case + Tempered Glass Double Side Panel', '', 4, 9, 3500000, 5, 1, 1),
(24, 'CUBE GAMING HOT WHEEL - Aluminum Case - Include Water Cooling System - Unique Design - RGB Led Strip', '', 4, 9, 4500000, 5, 1, 1),
(25, 'Asus ROG STRIX B360-H Gaming (LGA1151, B360, DDR4, USB3.1, SATA3)', '', 5, 5, 2350000, 5, 1, 1),
(26, 'Asus TUF Z390-PLUS Gaming (LGA1151, Z390, DDR4, USB3.1, SATA3)', '', 5, 5, 3440000, 5, 1, 1),
(27, 'MSI X99A Gaming Pro Carbon (LGA2011v3, X99, DDR4) - CLEARANCE SALE', '', 5, 18, 4120000, 5, 1, 1),
(28, 'MSI X299 Tomahawk Arctic (LGA2066, X299, DDR4) By WPG', '', 5, 18, 5827000, 5, 1, 1),
(29, 'Gigabyte Z390 Aorus Xtreme Waterforce (LGA1151, Z390, DDR4, USB3.1, SATA3)', '', 5, 11, 13450000, 5, 1, 1),
(30, 'Gigabyte X299 Designare EX (LGA 2066, X299, DDR4)', '', 5, 11, 9188000, 5, 1, 1),
(31, 'ASRock Fatal1ty X299 Gaming K6 (LGA2066, X299, DDR4)', '', 5, 4, 4250000, 5, 1, 1),
(32, 'ASRock Z390 Phantom Gaming 9 (LGA1151, Z390, DDR4, USB3.1, SATA3)', '', 5, 4, 4400000, 5, 1, 1),
(33, 'Seasonic Focus Gold 650GC - 650W - 80+ Gold Certified - 5 Years Warranty Replacement', '', 6, 23, 1280000, 5, 1, 1),
(34, 'Seasonic M12II-620 Evo Edition 620W Full Modular - 80+ Bronze Certified - [Brown Box] - New Item - 5 Years Warranty', '', 6, 23, 990000, 5, 1, 1),
(35, 'be quiet! PURE POWER 10 700W - 80+ Silver Certified - 3 Years Warranty - Number 1 PSU in Germany', '', 6, 6, 1180000, 5, 1, 1),
(36, 'be quiet! SYSTEM POWER U9 700W - 80+ Bronze Certified - 3 Years Warranty - Number 1 PSU in Germany', '', 6, 6, 1020000, 5, 1, 1),
(37, 'Corsair CXM Series 750W Modular - Bronze', '', 6, 8, 1405000, 5, 1, 1),
(38, 'Corsair TXM Series 750W Modular - Gold', '', 6, 8, 1735000, 5, 1, 1),
(39, 'Thermaltake Smart RGB 700W', '', 6, 25, 1130000, 5, 1, 1),
(40, 'Thermaltake Digital Toughpower Grand RGB 1000W Titanium', '', 6, 25, 4300000, 5, 1, 1),
(41, 'Intel Core i7-9700K 3.6Ghz Up To 4.9Ghz - Cache 12MB [Box] Socket LGA 1151 - Coffeelake Series', '', 7, 14, 6650000, 5, 1, 1),
(42, 'Intel Core i9-9900K 3.6Ghz Up To 5.0Ghz - Cache 16MB [Box] Socket LGA 1151 - Coffeelake Series', '', 7, 14, 8800000, 5, 1, 1),
(43, 'AMD Ryzen 7 Pinnacle Ridge 2700X 3.7Ghz Up To 4.3Ghz Cache 16MB 105W AM4 [Box] - 8 Core - YD270XBGAFBOX - With AMD Wraith Prism Cooler', '', 7, 2, 4955000, 5, 1, 1),
(44, 'AMD Ryzen Threadripper 2990WX 3.4Ghz Up To 4.0Ghz Cache 64MB 250W TR4 [Box] - 32 Core - YD299XAZAFWOF', '', 7, 2, 28250000, 5, 1, 1),
(45, 'be quiet! Dark Rock TF - 2x SilentWings PWM 14CM - Double Tower For Double Power', '', 8, 6, 1280000, 5, 1, 1),
(46, 'be quiet! Silent Loop 280mm - Superior & Silence Water Cooling - 2xPure Wings 2 140mm PWM', '', 8, 6, 2180000, 5, 1, 1),
(47, 'Cooler MasterFan Pro 140AF RGB 3 In 1 With Controller', '', 8, 7, 990000, 5, 1, 1),
(48, 'Cooler MasterLiquid ML360R RGB', '', 8, 7, 1828000, 5, 1, 1),
(49, 'Corsair ML120 RGB (Three Pack) - 12CM Fan', '', 8, 8, 1435000, 5, 1, 1),
(50, 'Corsair Hydro Series H150i PRO Water Cooler', '', 8, 8, 2660000, 5, 1, 1),
(51, 'Corsair DDR4 Vengeance LPX PC25600 32GB (2X16GB) - CMK32GX4M2B3200C16', '', 9, 8, 3635000, 5, 1, 1),
(52, 'Corsair DDR4 Dominator PC24000 32GB (2X16GB) - CMD32GX4M2B3000C15', '', 9, 8, 4360000, 5, 1, 1),
(53, 'Team T-Force Night Hawk DDR4 RGB PC25600 3200Mhz Dual Channel 32GB (2x16GB) 16-18-18-38 - TF1D432G3200HC16CDC01 - Black Heatspreader', '', 9, 29, 3560000, 5, 1, 1),
(54, 'Team T-Force Xcalibur RGB DDR4 PC28800 Dual Channel 16GB (2x8GB) 18-20-20-44 - TF6D416G3600HC18EDC01', '', 9, 29, 2710000, 5, 1, 1),
(55, 'Gskill DDR4 AEGIS PC21300 16GB (2x8GB) Dual Channel F4-2666C19D-16GIS', '', 9, 12, 2085000, 5, 1, 1),
(56, 'Gskill DDR4 TridentZ PC32000 32GB (2x16GB) Dual Channel F4-4000C19D-32GTZSW', '', 9, 12, 8680000, 5, 1, 1),
(57, 'Asus GeForce GTX 1070 8GB DDR5 Dual - OC Version', '', 10, 5, 6000000, 5, 1, 1),
(58, 'Asus GeForce RTX 2080 8GB DDR6 - Strix OC', '', 10, 5, 17000000, 5, 1, 1),
(59, 'Gigabyte GeForce GTX 1070 8GB DDR5 Windforce - GV-N1070WF2OC-8GD', '', 10, 11, 5760000, 5, 1, 1),
(60, 'Gigabyte GeForce RTX 2070 8GB DDR6 Aorus - GV-N2070AORUS-8GC', '', 10, 11, 11475000, 5, 1, 1),
(61, 'MSI GeForce RTX 2080 Ti 11GB DDR6 - Ventus OC', '', 10, 18, 20699000, 5, 1, 1),
(62, 'MSI Geforce GTX 1660 6GB DDR5 - Ventus XS 6G OC', '', 10, 18, 3729000, 5, 1, 1),
(63, 'Zotac GeForce GTX 1080 Ti 11GB DDR5X Mini', '', 10, 28, 9215000, 5, 1, 1),
(64, 'Zotac GeForce RTX 2080 8GB DDR6 AMP - Triple Fan', '', 10, 28, 12748000, 5, 1, 1),
(65, 'Seagate 4TB For NAS - IronWolf Pro Series', '', 11, 22, 3250000, 5, 1, 1),
(66, 'Seagate 2TB SSHD - FireCuda Series', '', 11, 22, 1610000, 5, 1, 1),
(67, 'WDC 3TB SATA3 64MB - Red - WD30EFRX (For NAS) - Garansi 3 Th', '', 11, 27, 1445000, 5, 1, 1),
(68, 'WD Passport Wireless Pro 4TB', '', 11, 27, 3440000, 5, 1, 1),
(69, 'Toshiba Canvio Ready 2TB USB 3.0', '', 11, 26, 980000, 5, 1, 1),
(70, 'Toshiba 8TB SATA3 7200RPM', '', 11, 26, 3645000, 5, 1, 1),
(71, 'Samsung SSD 860 PRO 512GB - Grs 5th', '', 12, 21, 2360000, 5, 1, 1),
(72, 'Samsung SSD 970 EVO M.2 500GB MZ-V7E500BW - Grs 5th', '', 12, 21, 2360000, 5, 1, 1),
(73, 'Team M.2 2280 TM8FP3512G0C101 - 512GB R 1500MB/s - PCI-e 3.0 x4 With NVMe', '', 12, 29, 1415000, 5, 1, 1),
(74, 'Team T-Force Delta R T253TR500G3C315 - 500GB Black', '', 12, 29, 1165000, 5, 1, 1),
(75, 'Corsair 240GB CSSD-F240GBLE200B Force Series LE200 SATA III', '', 12, 8, 805000, 5, 1, 1),
(76, 'Corsair 960GB CSSD-F960GBMP300 Force Series MP300 - M.2 NVMe PCIe', '', 12, 8, 2660000, 5, 1, 1),
(77, 'Intel SSD 400GB 750 Series', '', 12, 14, 5385000, 5, 1, 1),
(78, 'Intel SSD 2048GB 660P Series M.2', '', 12, 14, 6919000, 5, 1, 1),
(79, 'Sades Keyboard Mechanical Excalibur', '', 13, 20, 645000, 5, 1, 1),
(80, 'Sades Keyboard Mechanical Thyrsus', '', 13, 20, 560000, 5, 1, 1),
(81, 'Corsair Vengeance K70 RGB MK.2 Low Profile (Cherry MX Speed, RGB Backlight)', '', 13, 8, 2250000, 5, 1, 1),
(82, 'Corsair Vengeance K95 RGB Platinum (Cherry MX Speed RGB, RGB Backlight and LightEdges)', '', 13, 8, 2500000, 5, 1, 1),
(83, 'Steelseries Apex 100 + Rival 95 PC Bang', '', 13, 24, 735000, 5, 1, 1),
(84, 'Steelseries Apex M750 RGB', '', 13, 24, 2040000, 5, 1, 1),
(85, 'Razer Tartarus Chroma - Expert RGB Gaming Keypad', '', 13, 19, 1110000, 5, 1, 1),
(86, 'Razer DeathStalker Ultimate', '', 13, 19, 3635000, 5, 1, 1),
(87, 'Logitech G413 Silver Mechanical Gaming Keyboard', '', 13, 17, 1020000, 5, 1, 1),
(88, 'Logitech G910 Orion Spectrum RGB Mechanical Gaming Keyboard', '', 13, 17, 2265000, 5, 1, 1),
(89, 'Sades Mouse S-16 Gunblade', '', 14, 20, 215000, 5, 1, 1),
(90, 'Sades Mouse Scythe', '', 14, 20, 230000, 5, 1, 1),
(91, 'Corsair Gaming Glaive RGB (Black)', '', 14, 8, 1100000, 5, 1, 1),
(92, 'Corsair Gaming Dark Core RGB SE', '', 14, 8, 1325000, 5, 1, 1),
(93, 'SteelSeries Rival DotA2 Edition', '', 14, 24, 840000, 5, 1, 1),
(94, 'Steelseries Rival 310 PUBG Edition', '', 14, 24, 970000, 5, 1, 1),
(95, 'Razer Orochi 8200', '', 14, 19, 1075000, 5, 1, 1),
(96, 'Razer Ouroboros', '', 14, 19, 1995000, 5, 1, 1),
(97, 'Logitech G502 Gaming Mouse Proteus Spectrum', '', 14, 17, 805000, 5, 1, 1),
(98, 'Logitech MX Master 2s Wireless Mouse', '', 14, 17, 1060000, 5, 1, 1),
(99, 'Asus Zenbook UX430UN-GV001T/GV003T', 'Intel Core i7-8550U, RAM 16GB, SSD 512GB SATA, nVidia Geforce MX150 2GB, 14\" FHD, Win 10', 2, 5, 17350000, 5, 1, 1),
(100, 'Asus G703GX-I7832T - Ask Us For Discount', 'Intel Core i7-8750H, RAM 32GB, HDD 1TB, SSD 512GB, nVidia GeForce RTX 2080 8GB, 17.3\" FHD, Win 10', 2, 5, 56470000, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandNama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandNama`) VALUES
(1, 'Omega'),
(2, 'AMD'),
(3, 'Apple'),
(4, 'ASRock'),
(5, 'Asus'),
(6, 'be quiet!'),
(7, 'Cooler Master'),
(8, 'Corsair'),
(9, 'Cubegaming'),
(10, 'Dell'),
(11, 'Gigabyte'),
(12, 'Gskill'),
(13, 'HP'),
(14, 'Intel'),
(15, 'Lenovo'),
(16, 'LG'),
(17, 'Logitech'),
(18, 'MSI'),
(19, 'Razer'),
(20, 'Sades'),
(21, 'Samsung'),
(22, 'Seagate'),
(23, 'Seasonic'),
(24, 'SteelSeries'),
(25, 'Thermaltake'),
(26, 'Toshiba'),
(27, 'WD'),
(28, 'Zotac'),
(29, 'Team');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_promo`
--

CREATE TABLE `carousel_promo` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel_promo`
--

INSERT INTO `carousel_promo` (`id`, `description`, `path`) VALUES
(1, 'Promo 1', '/assets/carousel/1.png'),
(2, 'Promo 2', '/assets/carousel/2.png'),
(3, 'Promo 3', '/assets/carousel/3.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryNama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryNama`) VALUES
(1, 'IbuPapan'),
(2, 'Notebook'),
(3, 'LCD'),
(4, 'Casing'),
(5, 'Motherboard'),
(6, 'Power Supply'),
(7, 'Processor'),
(8, 'Cooler'),
(9, 'RAM'),
(10, 'VGA Card'),
(11, 'Harddisk'),
(12, 'SSD'),
(13, 'Keyboard'),
(14, 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `gambarId` int(11) NOT NULL,
  `gambarPath` text NOT NULL,
  `barangId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`gambarId`, `gambarPath`, `barangId`) VALUES
(1, '/images/motherboard/acus.jpeg', 1),
(2, '/images/motherboard/acus2.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promoId` int(11) NOT NULL,
  `persen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`promoId`, `persen`) VALUES
(1, 0),
(2, 5),
(3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_user`
--

CREATE TABLE `tipe_user` (
  `tipeId` int(11) NOT NULL,
  `tipeNama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_user`
--

INSERT INTO `tipe_user` (`tipeId`, `tipeNama`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionId`, `userId`, `waktu`) VALUES
(1, 1, '2019-04-23 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `transactionId` int(11) NOT NULL,
  `barangId` int(11) NOT NULL,
  `barangHarga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`transactionId`, `barangId`, `barangHarga`, `jumlah`) VALUES
(1, 1, 50000, 1),
(1, 2, 1000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `namaDepan` text NOT NULL,
  `namaBelakang` text NOT NULL,
  `email` text NOT NULL,
  `noHP` text NOT NULL,
  `saldo` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tipeUser` int(11) NOT NULL,
  `shoppingCart` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `namaDepan`, `namaBelakang`, `email`, `noHP`, `saldo`, `alamat`, `tipeUser`, `shoppingCart`) VALUES
(1, 'MarioWibu', '12345', 'Mario', 'Wibu', 'mariowibu@gmail.com', '0888888888888888', 50000, 'Jl. Sesama Ngen', 1, ''),
(2, 'Wibuwibu', '9f5760fc729a5d70ecd4d0e63490226459c8722e62060d417fe3d95ca9a3a2fa', 'Mario', 'Wibu', 'wibuwibu@wibu.com', '081234678910', 0, 'jl kewibuan saya juga pusing', 2, 'Not Available Yet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barangId`),
  ADD KEY `barang_ibfk_1` (`categoryId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `promoId` (`promoId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `carousel_promo`
--
ALTER TABLE `carousel_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gambarId`,`barangId`),
  ADD KEY `barangId` (`barangId`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promoId`);

--
-- Indexes for table `tipe_user`
--
ALTER TABLE `tipe_user`
  ADD PRIMARY KEY (`tipeId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`transactionId`,`barangId`),
  ADD KEY `barangId` (`barangId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `tipeUser` (`tipeUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barangId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `carousel_promo`
--
ALTER TABLE `carousel_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `gambarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipe_user`
--
ALTER TABLE `tipe_user`
  MODIFY `tipeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`promoId`) REFERENCES `promo` (`promoId`);

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`barangId`) REFERENCES `barang` (`barangId`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_ibfk_1` FOREIGN KEY (`transactionId`) REFERENCES `transaction` (`transactionId`),
  ADD CONSTRAINT `transaction_detail_ibfk_2` FOREIGN KEY (`barangId`) REFERENCES `barang` (`barangId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
