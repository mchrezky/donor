-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 04:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcinspector`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `no_alat` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `asset_no` varchar(25) NOT NULL,
  `nopol` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `location` text NOT NULL,
  `date_inspeksi` date NOT NULL,
  `status_inspeksi` varchar(25) NOT NULL,
  `kapasitas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`no_alat`, `nama`, `brand`, `asset_no`, `nopol`, `year`, `location`, `date_inspeksi`, `status_inspeksi`, `kapasitas`) VALUES
('C-001', 'Truck Mounted Crane', 'HINO UNIC', '1A0402-010', 'B 9217 NG', '2009', 'TGP', '2020-09-17', 'Final Inspection', 13),
('C-002', 'TMC FORKLIFT', 'TMC', '1A0402-012', 'B 7789 FT', '2017', 'SBI -NAROGONG BOGOR', '2020-10-01', 'Final Inspection', 5);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id_jawab` int(11) NOT NULL,
  `id_inspection` varchar(255) NOT NULL,
  `id_question` int(11) DEFAULT NULL,
  `jawab` varchar(64) DEFAULT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE `categori` (
  `id` int(1) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`id`, `nama`) VALUES
(1201, 'Body dan Cabin Condition'),
(1202, 'Chassis dan Frame'),
(1203, 'Engine Condition'),
(1204, 'Electrical System'),
(1205, 'Steering System'),
(1206, 'Air /Hydraulic Brake System'),
(1207, 'Accessories & Attachment'),
(1208, 'Crane'),
(1209, 'Document Review'),
(1301, 'ENGINE'),
(1302, 'COOLING SYSTEM'),
(1303, 'FUEL SYSTEM '),
(1304, 'LUBRICATION SYSTEM'),
(1305, 'AIR INDUCTION'),
(1306, 'ELECTRIC SYSTEM'),
(1307, 'BRAKE SYSTEM'),
(1308, 'HYDRAULIC SYSTEM'),
(1309, 'TORQUE CONVERTER'),
(1310, 'STEERING SYSTEM'),
(1311, 'BODY & CHASIS'),
(1312, 'ATTACHMENT');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`) VALUES
('ABS01', 'PT. ABIN PUTRA RAYA', 'Green Sedayu Bizpark, GS-15/66, Jl. Cakung-Cilincing Timur Raya , Jakarta Timur'),
('AMT01', 'PT. AMYTHAS', 'komplek Golden Plaza Blok E , No 21-22 Jalan Fatmawati No.15 , Gandaria Selatan Cilandak , Jakarta Selatan DKI,Jakarta 12420'),
('BJA01', 'PT. BUANA JAYA AGUNG', 'Jalan Jati Rawamangun No 1, Jakarta Timur, Jakarta'),
('SBI01', 'PT. SOLUSI BANGUN INDONESIA ', 'Telavera Office Park , Jalan Letjen TB Simatupang No 22-26 Jakarta 12430'),
('WK01', 'PT. WIJAYA KARYA Tbk', 'Cawang No. 20 Jakarta Timur');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_result`
--

CREATE TABLE `inspection_result` (
  `id_inspection` varchar(25) CHARACTER SET utf8mb4 NOT NULL,
  `id_sewa` varchar(25) NOT NULL,
  `id_question` int(11) NOT NULL,
  `tgl_inspection` timestamp NOT NULL DEFAULT current_timestamp(),
  `result` varchar(25) NOT NULL,
  `cek_inspection` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_result`
--

INSERT INTO `inspection_result` (`id_inspection`, `id_sewa`, `id_question`, `tgl_inspection`, `result`, `cek_inspection`) VALUES
('101F05M072070', '101F05M0720', 70, '2021-02-09 12:12:32', 'GOOD', 'ok'),
('101F05M072071', '101F05M0720', 71, '2021-02-09 12:12:39', 'GOOD', 'ok'),
('101F05M072072', '101F05M0720', 72, '2021-02-09 12:12:45', 'GOOD', 'ok'),
('101F05M072073', '101F05M0720', 73, '2021-02-09 12:12:51', 'NOT GOOD', 'bad');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1606028271),
('m130524_201442_init', 1606028397),
('m190124_110200_add_verification_token_column_to_user_table', 1606028398);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `no_alat` varchar(25) NOT NULL,
  `question` text NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `no_alat`, `question`, `cat`) VALUES
(1, 'C-001', 'Cabin?', 1201),
(2, 'C-001', 'Paint?', 1201),
(3, 'C-001', 'Door ( Seal Rubber, Handle, & Keys) ?', 1201),
(4, 'C-001', 'Bumper?', 1201),
(5, 'C-001', 'Windows(Manual/power window)?', 1201),
(6, 'C-001', 'Jack For Cabin (Manual / hys. Motor) ?', 1201),
(7, 'C-001', 'Dash Board?', 1201),
(8, 'C-001', 'Chassis?', 1202),
(9, 'C-001', 'Cross Member?', 1202),
(10, 'C-001', 'Frame?', 1202),
(11, 'C-001', 'Platform?', 1202),
(12, 'C-001', 'Visual Check For Oil?', 1203),
(13, 'C-001', 'Fuel Level Indicator?', 1203),
(14, 'C-001', 'Staring Of Engine?', 1203),
(15, 'C-001', 'Sound During Operation (Rough Idling)?', 1203),
(16, 'C-001', 'Radiator?', 1203),
(17, 'C-001', 'Turbocharge & After Coller (if Available)?', 1203),
(18, 'C-001', 'Air Pressure?', 1203),
(19, 'C-001', 'Fuel Gauge?', 1203),
(20, 'C-001', 'Tachometer?', 1203),
(21, 'C-001', 'Speedometer?', 1203),
(22, 'C-001', 'Coolant Temperature?', 1203),
(23, 'C-001', 'Odometer?', 1203),
(24, 'C-001', 'Voltmeter?', 1203),
(25, 'C-001', 'Oil Temparature?', 1203),
(26, 'C-001', 'Head Lamp (High, Low)?', 1204),
(27, 'C-001', 'Fogh Lamp(if Available)?', 1204),
(28, 'C-001', 'Clearance Lamp ?', 1204),
(29, 'C-001', 'Frant/ Rear Side turn Signal Lamp ?', 1204),
(30, 'C-001', 'back Stop or Tail Lamp ?', 1204),
(31, 'C-001', 'Horn ?', 1204),
(32, 'C-001', 'Wiper & Washer ?', 1204),
(33, 'C-001', 'Engine Brake ?', 1204),
(34, 'C-001', 'Ignition Switch (On/Off) ?', 1204),
(35, 'C-001', 'Play Steering Wheel ?', 1205),
(36, 'C-001', 'Wear of steering ?', 1205),
(37, 'C-001', 'Verify all lubrication points regreased per lube Chart ?', 1205),
(38, 'C-001', 'Main Brake ?', 1206),
(39, 'C-001', 'Parking Brake ?', 1206),
(40, 'C-001', 'Brake oil level indicator ?', 1206),
(41, 'C-001', 'Visual Chek For oil?', 1206),
(42, 'C-001', 'Air Tank Compressor ?', 1206),
(43, 'C-001', 'Air Line Hose / Pipe & Valve ?', 1206),
(44, 'C-001', 'Brake Pedal ?', 1206),
(45, 'C-001', 'Safety seat belt (manual / auto retract) ?', 1207),
(46, 'C-001', 'Ashtray (asbak) ?', 1207),
(47, 'C-001', 'Lighter ?', 1207),
(48, 'C-001', 'Radio / Tape ?', 1207),
(49, 'C-001', 'Air Conditioner ?', 1207),
(50, 'C-001', 'Tool kit set ?', 1207),
(51, 'C-001', 'Three Angle Reflection ?', 1207),
(52, 'C-001', 'First Air Box', 1207),
(53, 'C-001', 'Fire Extinguisher ?', 1207),
(54, 'C-001', 'Reserve Tire ?', 1207),
(55, 'C-001', 'Outrigger front (left / right ) ?', 1208),
(56, 'C-001', 'Outrigger Rear ( Left / Right if available ) ?', 1208),
(57, 'C-001', 'Hydraulic oil reservoir ?', 1208),
(58, 'C-001', 'Hydraulic pump ?', 1208),
(59, 'C-001', 'Outriggers ?', 1208),
(60, 'C-001', 'Hydraukic piping ?', 1208),
(61, 'C-001', 'Boom and cylinders ?', 1208),
(62, 'C-001', 'Sheave ?', 1208),
(63, 'C-001', 'Hook and Hook Latch ?', 1208),
(64, 'C-001', 'Shop Manual ?', 1209),
(65, 'C-001', 'Part Catalog ?', 1209),
(66, 'C-001', 'Manual Operation ?', 1209),
(67, 'C-001', 'STNK ?', 1209),
(68, 'C-001', 'KIUR ?', 1209),
(69, 'C-001', 'Manucfature Certificate ?', 1209),
(70, 'C-002', 'Cylinder Head ?', 1301),
(71, 'C-002', 'Cylinder Block ?', 1301),
(72, 'C-002', 'Oil Pan ?', 1301),
(73, 'C-002', 'Intake Manifold ?', 1301),
(74, 'C-002', 'Damper ?', 1301),
(75, 'C-002', 'Radiator ?', 1302),
(76, 'C-002', 'Hose / Slang ?', 1302),
(77, 'C-002', 'Water Pump ?', 1302),
(78, 'C-002', 'Fan ?', 1302),
(79, 'C-002', 'V-Belt ?', 1302),
(80, 'C-002', 'Thermostat ?', 1302),
(81, 'C-002', 'Fuel Pump ?', 1303),
(82, 'C-002', 'Nozzle ?', 1303),
(83, 'C-002', 'Transfer Pump ?', 1303),
(84, 'C-002', 'Fuel Line ?', 1303),
(85, 'C-002', 'Filter ?', 1303),
(86, 'C-002', 'Fuel Tank ?', 1303),
(87, 'C-002', 'Oil Pump ?', 1304),
(88, 'C-002', 'Filter ?', 1304),
(90, 'C-002', 'Lube Line ?', 1304),
(91, 'C-002', 'Turbo ?', 1305),
(92, 'C-002', 'Filter ?', 1305),
(93, 'C-002', 'Air Indicator ?', 1305),
(94, 'C-002', 'Batterry ?', 1306),
(95, 'C-002', 'Starting Motor ?', 1306),
(96, 'C-002', 'Altenator ?', 1306),
(97, 'C-002', 'Wiring ?', 1306),
(98, 'C-002', 'Engine Control Panel ?', 1306),
(99, 'C-002', 'Lighting ?', 1306),
(100, 'C-002', 'Safety Device ?', 1306),
(101, 'C-002', 'Ignition Switch ?', 1306),
(102, 'C-002', 'Master Cylinder ?', 1307),
(103, 'C-002', 'Brake Lining / Shoe ?', 1307),
(104, 'C-002', 'Brake Line ?', 1307),
(105, 'C-002', 'Brake Drum ?', 1307),
(106, 'C-002', 'Air Tank ?', 1307),
(107, 'C-002', 'Compressor ?', 1307),
(108, 'C-002', 'Parking Brake ?', 1307),
(109, 'C-002', 'Hydraulik Pump ?', 1308),
(110, 'C-002', 'Hydraulic Cylinder ?', 1308),
(111, 'C-002', 'Control Valve ?', 1308),
(112, 'C-002', 'Hydraulic Line ?', 1308),
(113, 'C-002', 'Hydraulic Tank ?', 1308),
(114, 'C-002', 'Oil Hydraulic ?', 1308),
(115, 'C-002', 'Filter ?', 1308),
(116, 'C-002', 'Trans Pump ?', 1308),
(117, 'C-002', 'Control Valve ?', 1308),
(118, 'C-002', 'Filter Seal ?', 1308),
(119, 'C-002', 'Gear and Bearing ?', 1308),
(120, 'C-002', 'Oil Seal ?', 1308),
(121, 'C-002', 'Hose lIne ?', 1308),
(122, 'C-002', 'T.C. Pump ?', 1309),
(123, 'C-002', 'Turbin & Impeler ?', 1309),
(124, 'C-002', 'Bearing ?', 1309),
(125, 'C-002', 'Propeler Shaft ?', 1309),
(126, 'C-002', 'Steering Wheel ?', 1310),
(127, 'C-002', 'Tyrod ?', 1310),
(128, 'C-002', 'Ball Joint ?', 1310),
(129, 'C-002', 'Stabilizer ?', 1310),
(130, 'C-002', 'Rod Steering  ?', 1310),
(131, 'C-002', 'Steering Pump ?', 1310),
(132, 'C-002', 'Steering Cylinder ?', 1310),
(133, 'C-002', 'Steering Oil / Tank ?', 1310),
(134, 'C-002', 'Steering Line ?', 1310),
(135, 'C-002', 'King Pin ?', 1310),
(136, 'C-002', 'Ring Cylinder ? ', 1310),
(137, 'C-002', 'Ring Cylinder ? ', 1310),
(138, 'C-002', 'Cabin / Canopy ?', 1311),
(139, 'C-002', 'Chasis ?', 1311),
(140, 'C-002', 'Muffler', 1311),
(141, 'C-001', 'Tyre ?', 1311),
(142, 'C-002', 'Mounting ?', 1311),
(143, 'C-002', 'Fark ?', 1311),
(144, 'C-002', 'Mask ?', 1311),
(145, 'C-002', 'Chain ?', 1311),
(146, 'C-002', 'Raller ?', 1311),
(147, 'C-002', 'Manual Book ?', 1312),
(148, 'C-002', 'Part Book ?', 1312),
(149, 'C-002', 'Copy Certificate ?', 1312);

-- --------------------------------------------------------

--
-- Stand-in structure for view `question_inspection`
-- (See below for the actual view)
--
CREATE TABLE `question_inspection` (
`id` int(11)
,`no_alat` varchar(25)
,`question` text
,`cat` int(11)
,`categori` varchar(255)
,`id_inspection` varchar(25)
,`id_sewa` varchar(25)
,`id_question` int(11)
,`tgl_inspection` timestamp
,`result` varchar(25)
,`cek_inspection` varchar(25)
);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `no_sewa` varchar(25) NOT NULL,
  `no_alat` varchar(25) NOT NULL,
  `id_customer` varchar(25) NOT NULL,
  `lama_sewa` varchar(25) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `nama_pic` varchar(25) NOT NULL,
  `approve` varchar(20) DEFAULT NULL,
  `accept` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`no_sewa`, `no_alat`, `id_customer`, `lama_sewa`, `tgl_sewa`, `tgl_selesai`, `telpon`, `nama_pic`, `approve`, `accept`) VALUES
('079F05M1620', 'C-002', 'SBI01', '30 Hari', '2020-05-01', '2020-05-31', '2147483647', '10', NULL, NULL),
('092F05M0720', 'C-001', 'BJA01', '30 Hari', '2020-07-02', '2020-08-20', '2147483647', '2', NULL, NULL),
('101F05M0720', 'C-002', 'SBI01', '30 Hari', '2020-06-01', '2020-06-30', '2147483647', '10', NULL, NULL),
('104F05M0720', 'C-001', 'AMT01', '30 Hari', '2020-07-14', '2020-08-14', '2147483647', '2', NULL, NULL),
('162F05M1220', 'C-001', 'ABS01', '30 Hari', '2020-11-06', '2020-12-05', '2147483647', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `level`) VALUES
(2, 'Eko Siswanto', 'GrK7ahxQEVHT6RucqytCmi_dbAoMbLM-', '$2y$13$2ek0z.wREB0.Emt5mbL.3.7aXl9VWqRv1JcoWpCNmjgEXCvLvswu2', NULL, 'ekosiswanto@trubagardapiranti.id', 10, 1606028443, 1606028443, '9QVoM_Uo8B9jyVElFCrD2ZI3yZZq7QzE_1606028442', 'Inspector'),
(3, 'Anton Indra Yitno', 'GrK7ahxQEVHT6RucqytCmi_dbAoMbLM-', '$2y$13$2ek0z.wREB0.Emt5mbL.3.7aXl9VWqRv1JcoWpCNmjgEXCvLvswu2', NULL, 'anton.indra@trubagardapiranti.id', 10, 1606028443, 1606028443, '9QVoM_Uo8B9jyVElFCrD2ZI3yZZq7QzE_1606028442', 'Inspector'),
(4, 'Suyoko', 'GrK7ahxQEVHT6RucqytCmi_dbAoMbLM-', '$2y$13$2ek0z.wREB0.Emt5mbL.3.7aXl9VWqRv1JcoWpCNmjgEXCvLvswu2', NULL, 'suyoko@gmail.com', 10, 1606028443, 1606028443, '9QVoM_Uo8B9jyVElFCrD2ZI3yZZq7QzE_1606028442', 'QCHSE HEAD'),
(5, 'Hatif Afif', 'GrK7ahxQEVHT6RucqytCmi_dbAoMbLM-', '$2y$13$2ek0z.wREB0.Emt5mbL.3.7aXl9VWqRv1JcoWpCNmjgEXCvLvswu2', NULL, 'hatifafif@gmail.com', 10, 1606028443, 1606028443, '9QVoM_Uo8B9jyVElFCrD2ZI3yZZq7QzE_1606028442', 'MAINTENANCE HEAD'),
(6, 'hana', 'ggDjMsKLgjnaIsrwZbt3kBF2BULoMtkJ', '$2y$13$nG1SWniMMC80oGxyHEpjc.o6SpuOBLR2yOewDMTdMF1kU7mOHyQfm', NULL, 'hana@gmail.com', 10, 1606035143, 1606035143, '0V0HXjOzQP0Iw0n5_PKjqydzFZnf0QiI_1606035143', ''),
(7, 'angga', 'ecLq2soXsAMgDnQQHf0Bw_-RCNl9EJQT', '$2y$13$gbsrn1q7XXWYUoChNSwVL.pYoGgGL/aawiVrke2Q2VQECOgT35xbi', NULL, 'angga@gmail.com', 10, 1606035526, 1606035526, 'ezmSyb0g-zq4KmthAmp8DLFOv4y-QKK9_1606035526', ''),
(8, 'vinca', '_jUfbXuvpuWjR0A6dDp-R8DeplDCoh06', '$2y$13$uaNFF2.lFZEVgqHBWv4bWelSaN0C4I3p0XTN17QUjIHfeNQhrkhAO', NULL, 'vinca@gmail.com', 10, 1606036926, 1606036926, '0mxfzc-qqbnddjM7uQjkY-da-khYt9vr_1606036926', 'Admin'),
(9, 'gatsu', 'fPnanbsO7Ne4GTFR2hNl02sKrgywa1sk', '$2y$13$i/U/89UG7603DyaGVKPhleSzfl81SgZ3fvvfY784ZC1b7jzzqO7iW', NULL, 'gatsu@gmail.com', 10, 1606037032, 1606037032, 'cB9YfpxyjBGNKoLwix5So8nSAOCdnACQ_1606037032', 'Admin'),
(10, 'dwi', 'sA44BpLeiif_f3VnhmmuKMjKjVrADBe-', '$2y$13$yxkqWTH9wD2FUu63go4mseT1EBactDvG8Ozj7DXoI0mnDccd/rNsO', NULL, 'dwi@gmail.com', 10, 1606037065, 1606037065, '0rj44P3WTAToPaH3MQOcJtHMYGRvOBs5_1606037065', 'Admin'),
(11, 'Wagiman', 'NeuryDsPCS5kJy9oF2jYp3vHBHDW1J9p', '$2y$13$BKrH65p638CRDv7OxkiUMOAsC5UX89ZCDa5x0uf2ZaTYKjYLknfRu', NULL, 'wagiman@trubagardapiranti.id', 10, 1608998494, 1608998494, 't0UXf2ksaXxl3hLxgNHY__133z1NqN5d_1608998493', 'Inspector'),
(12, 'faqih', 'KBt2lBlv-8SCOCIpT9mCd9Kof2kjo_HO', '$2y$13$4k44BRR47wAwTM7nS4UjtuSCn/6C99Hj8rPBoHGA1kYUnYfnVhkQy', NULL, 'faqih@gmail.com', 10, 1609065453, 1609065453, 'aECr2HOlV2pXBz0EvwjC80tpMiXF53-o_1609065453', 'Admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sewa`
-- (See below for the actual view)
--
CREATE TABLE `vw_sewa` (
`no_sewa` varchar(25)
,`no_alat` varchar(25)
,`id_customer` varchar(25)
,`lama_sewa` varchar(25)
,`tgl_sewa` date
,`tgl_selesai` date
,`telpon` varchar(20)
,`nama_pic` varchar(25)
,`approve` varchar(20)
,`accept` varchar(20)
,`pic` varchar(255)
,`customer` varchar(30)
,`alat` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_sewa_pic`
-- (See below for the actual view)
--
CREATE TABLE `vw_sewa_pic` (
`no_sewa` varchar(25)
,`no_alat` varchar(25)
,`id_customer` varchar(25)
,`lama_sewa` varchar(25)
,`tgl_sewa` date
,`tgl_selesai` date
,`telpon` varchar(20)
,`nama_pic` varchar(25)
,`approve` varchar(20)
,`accept` varchar(20)
,`pic` varchar(255)
,`customer` varchar(30)
,`alat` varchar(25)
,`id_inspection` varchar(25)
,`id_sewa` varchar(25)
,`id_question` int(11)
,`tgl_inspection` timestamp
,`result` varchar(25)
,`cek_inspection` varchar(25)
,`tot_result` bigint(21)
,`good` bigint(21)
,`no_good` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `question_inspection`
--
DROP TABLE IF EXISTS `question_inspection`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `question_inspection`  AS  select `a`.`id_question` AS `id`,`a`.`no_alat` AS `no_alat`,`a`.`question` AS `question`,`a`.`cat` AS `cat`,`c`.`nama` AS `categori`,`b`.`id_inspection` AS `id_inspection`,`b`.`id_sewa` AS `id_sewa`,`b`.`id_question` AS `id_question`,`b`.`tgl_inspection` AS `tgl_inspection`,`b`.`result` AS `result`,`b`.`cek_inspection` AS `cek_inspection` from ((`question` `a` join `categori` `c` on(`a`.`cat` = `c`.`id`)) left join `inspection_result` `b` on(`a`.`id_question` = `b`.`id_question`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sewa`
--
DROP TABLE IF EXISTS `vw_sewa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sewa`  AS  select `a`.`no_sewa` AS `no_sewa`,`a`.`no_alat` AS `no_alat`,`a`.`id_customer` AS `id_customer`,`a`.`lama_sewa` AS `lama_sewa`,`a`.`tgl_sewa` AS `tgl_sewa`,`a`.`tgl_selesai` AS `tgl_selesai`,`a`.`telpon` AS `telpon`,`a`.`nama_pic` AS `nama_pic`,`a`.`approve` AS `approve`,`a`.`accept` AS `accept`,`b`.`username` AS `pic`,`c`.`nama` AS `customer`,`d`.`nama` AS `alat` from (((`sewa` `a` join `user` `b` on(`a`.`nama_pic` = `b`.`id`)) join `customer` `c` on(`a`.`id_customer` = `c`.`id_customer`)) join `alat` `d` on(`a`.`no_alat` = `d`.`no_alat`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_sewa_pic`
--
DROP TABLE IF EXISTS `vw_sewa_pic`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_sewa_pic`  AS  select `a`.`no_sewa` AS `no_sewa`,`a`.`no_alat` AS `no_alat`,`a`.`id_customer` AS `id_customer`,`a`.`lama_sewa` AS `lama_sewa`,`a`.`tgl_sewa` AS `tgl_sewa`,`a`.`tgl_selesai` AS `tgl_selesai`,`a`.`telpon` AS `telpon`,`a`.`nama_pic` AS `nama_pic`,`a`.`approve` AS `approve`,`a`.`accept` AS `accept`,`a`.`pic` AS `pic`,`a`.`customer` AS `customer`,`a`.`alat` AS `alat`,`b`.`id_inspection` AS `id_inspection`,`b`.`id_sewa` AS `id_sewa`,`b`.`id_question` AS `id_question`,`b`.`tgl_inspection` AS `tgl_inspection`,`b`.`result` AS `result`,`b`.`cek_inspection` AS `cek_inspection`,count(`b`.`result`) AS `tot_result`,count(if(`b`.`result` = 'GOOD',1,NULL)) AS `good`,count(if(`b`.`result` = 'NOT GOOD',1,NULL)) AS `no_good` from (`vw_sewa` `a` left join `inspection_result` `b` on(`a`.`no_sewa` = `b`.`id_sewa`)) group by `a`.`no_sewa` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`no_alat`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_jawab`),
  ADD KEY `id_question` (`id_question`),
  ADD KEY `id_inspection` (`id_inspection`);

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `inspection_result`
--
ALTER TABLE `inspection_result`
  ADD PRIMARY KEY (`id_inspection`),
  ADD KEY `inspeksi_sewa` (`id_sewa`),
  ADD KEY `id_question` (`id_question`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `qestion_alat` (`no_alat`),
  ADD KEY `cat` (`cat`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`no_sewa`),
  ADD KEY `customer_sewa` (`id_customer`),
  ADD KEY `sewa_alat` (`no_alat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`id_inspection`) REFERENCES `inspection_result` (`id_inspection`);

--
-- Constraints for table `inspection_result`
--
ALTER TABLE `inspection_result`
  ADD CONSTRAINT `inspection_result_ibfk_1` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`),
  ADD CONSTRAINT `inspeksi_sewa` FOREIGN KEY (`id_sewa`) REFERENCES `sewa` (`no_sewa`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `qestion_alat` FOREIGN KEY (`no_alat`) REFERENCES `alat` (`no_alat`),
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `categori` (`id`);

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `customer_sewa` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `sewa_alat` FOREIGN KEY (`no_alat`) REFERENCES `alat` (`no_alat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
