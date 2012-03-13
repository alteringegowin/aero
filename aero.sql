-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2012 at 01:17 AM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aero`
--

-- --------------------------------------------------------

--
-- Table structure for table `aero_airlines`
--

CREATE TABLE IF NOT EXISTS `aero_airlines` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `airlines_name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `airlines_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `airlines_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `aero_airlines`
--

INSERT INTO `aero_airlines` (`id`, `airlines_name`, `airlines_logo`, `airlines_url`) VALUES
(1, 'GARUDA INDONESIA', 'logo-garuda-indonesia.png', 'http://www.garuda-indonesia.com/'),
(2, 'TRAVEL EXPRESS AVIATION', 'logo-sky-aviation.png', 'http://www.sky-aviation.co.id'),
(3, 'INDONESIA AIR ASIA', '', ''),
(4, 'TRANS AVIATION MAUNDER', '', ''),
(5, 'SKY AVIATION', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `aero_airlines_users`
--

CREATE TABLE IF NOT EXISTS `aero_airlines_users` (
  `airlines_id` int(4) unsigned NOT NULL,
  `user_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`airlines_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aero_airlines_users`
--

INSERT INTO `aero_airlines_users` (`airlines_id`, `user_id`) VALUES
(1, 2),
(2, 3),
(3, 6),
(4, 9),
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `aero_attachments`
--

CREATE TABLE IF NOT EXISTS `aero_attachments` (
  `voucher_id` int(8) unsigned NOT NULL,
  `attachment_type` smallint(1) unsigned NOT NULL,
  `attachment_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offline_mode` smallint(1) unsigned NOT NULL DEFAULT '0',
  KEY `voucher_id` (`voucher_id`),
  KEY `attachment_type` (`attachment_type`),
  KEY `offline_mode` (`offline_mode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aero_bandara`
--

CREATE TABLE IF NOT EXISTS `aero_bandara` (
  `kode` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `bandara` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aero_bandara`
--

INSERT INTO `aero_bandara` (`kode`, `bandara`) VALUES
('BTJ', 'Bandar Udara Internasional Sultan Iskandar Muda  Banda Aceh'),
('MES', 'Bandar Udara Internasional Polonia  Medan'),
('KNM', 'Bandar Udara Internasional Kuala Namu Kota Medan'),
('BTH', 'Bandar Udara Hang Nadim Batam'),
('TNJ', 'Bandar Udara Internasional Raja Haji Fisabilillah Tanjung Pinang'),
('PKU', 'Bandar Udara Sultan Syarif Kasim II Pekanbaru'),
('PDG', 'Bandar Udara Internasional Minangkabau Kota Padang'),
('PLM', 'Bandar Udara Sultan Mahmud Badaruddin II Palembang'),
('BKS', 'Bandar Udara Fatmawati Soekarno Bengkulu'),
('TKG', 'Bandar Udara Radin Inten II Bandar Lampung'),
('DJB', 'Bandar Udara Sultan Thaha Syarifuddin Jambi'),
('HLP', 'Bandar Udara Internasional Halim Perdanakusuma Jakarta'),
('SUB', 'Bandar Udara Internasional Juanda Surabaya'),
('BDO', 'Bandar Udara Internasional Husein Sastranegara Bandung'),
('SRG', 'Bandar Udara Achmad Yani Semarang'),
('SOC', 'Bandar Udara Adisumarmo Solo'),
('JOG', 'Bandar Udara Adi Sucipto Yogyakarta'),
('DPS', 'Bandar Udara Internasional Ngurah Rai Denpasar'),
('KOE', 'Bandar Udara El Tari Kupang'),
('BMU', 'Bandar Udara Muhammad Salahuddin Bima'),
('RTG', 'Bandar Udara Frans Sales Lega Ruteng'),
('BJW', 'Bandar Udara Soa Bajawa'),
('ENE', 'Bandar Udara H Hasan Aroeboesman Ende'),
('MOF', 'Bandar Udara Wai Oti Maumere'),
('ARD', 'Bandar Udara Mali Alor'),
('ABU', 'Bandar Udara Haliwen Atambua'),
('BPN', 'Bandar Udara Internasional Sepinggan Balikpapan'),
('PNK', 'Bandar Udara Internasional Supadio Pontianak'),
('TRK', 'Bandar Udara Internasional Juwata Tarakan'),
('UPG', 'Bandar Udara Sultan Hasanuddin Makassar'),
('KDI', 'Bandar Udara Internasional Haluoleo Kendari'),
('MDC', 'Bandar Udara Sam Ratulangi Manado'),
('PLW', 'Bandar Udara Mutiara Palu'),
('LUW', 'Bandar Udara Syukuran Aminuddin Amir Luwuk'),
('AMQ', 'Bandar Udara Pattimura Kota Ambon'),
('TSF', 'Bandar Udara Suka Sultan I Love Thaha Kota Sofifi'),
('DJJ', 'Bandar Udara Sentani Jayapura'),
('BIK', 'Bandar Udara Frans Kaisiepo Biak'),
('KNG', 'Bandar Udara Utarom Kaimana'),
('FKQ', 'Bandar Udara Torea Fakfak'),
('TIM', 'Bandar Udara Mozes Kilangin Tembagapura'),
('MKQ', 'Bandar Udara Mopah Merauke'),
('Ket', 'yaitu penerbangan internasional dan penerbangan domestik.'),
('SBG', 'Bandar Udara Maimun Saleh Sabang'),
('LSX', 'Bandar Udara Lhok Sukon Aceh Utara'),
('LSW', 'Bandar Udara Malikus Saleh Lhokseumawe'),
('MEQ', 'Bandar Udara Cut Nyak Dhien Nagan Raya'),
('TPK', 'Bandar Udara Teuku Cut Ali Tapaktuan'),
('SKL', 'Bandar Udara Syekh Hamzah Fansyuri Singkil'),
('SNB', 'Bandar Udara Lasikin Sinabang'),
('SIW', 'Bandar Udara Sibisa Toba Samosir'),
('BRT', 'Bandar Udara Barita Parbaba'),
('SQT', 'Bandar Udara Silangit Siborong-borong'),
('SIX', 'Bandar Udara Dr. Ferdinand Lumban Tobing Sibolga'),
('AEG', 'Bandar Udara Aek Godang Padang Sidempuan'),
('GNS', 'Bandar Udara Binaka Gunung Sitoli'),
('LSE', 'Bandar Udara Lasondre Pulau-pulau Batu'),
('DUM', 'Bandar Udara Pinang Kampai Dumai'),
('SEQ', 'Bandar Udara Sungai Pakning Bengkalis'),
('PPR', 'Bandar Udara Pasir Pengaraian Pasir Pengaraian'),
('SIQ', 'Bandar Udara Dabo Singkep'),
('RGT', 'Bandar Udara Japura Rengat'),
('TJB', 'Bandar Udara Sei Bati Karimun'),
('NTX', 'Bandar Udara Ranai Natuna'),
('MWK', 'Bandar Udara Matak Pal Matak'),
('RKO', 'Bandar Udara Rokot Sipura'),
('KRC', 'Bandar Udara Depati Parbo Kerinci'),
('MPC', 'Bandar Udara Mukomuko Mukomuko'),
('PGK', 'Bandar Udara Depati Amir Pangkalpinang'),
('TJQ', 'Bandar Udara H. A. S. Hanandjoeddin  Tanjung Pandan'),
('LLG', 'Bandar Udara Silampari Lubuklinggau'),
('PDO', 'Bandar Udara Pendopo Empat Lawang'),
('PLL', 'Bandar Udara Pendopo Melik City'),
('PCB', 'Bandar Udara Pondok Cabe Pamulang'),
('PPJ', 'Bandar Udara Pulau Panjang Kepulauan Seribu'),
('TSY', 'Bandar Udara Cibeureum Tasikmalaya'),
('CBN', 'Bandar Udara Cakrabhuwana Cirebon'),
('CXP', 'Bandar Udara Tunggul Wulung Cilacap'),
('PWL', 'Bandar Udara Wirasaba Purbalingga'),
('KWB', 'Bandar Udara Dewandaru Karimunjawa'),
('CPF', 'Bandar Udara Ngloram Cepu'),
('MLG', 'Bandar Udara Abdul Rachman Saleh Malang'),
('SUP', 'Bandar Udara Trunojoyo Sumenep'),
('MSI', 'Bandar Udara Masalembo Masalembo'),
('WGI', 'Bandar Udara Blimbingsari Banyuwangi'),
('SWQ', 'Bandar Udara Brangbiji Sumbawa Besar'),
('LYK', 'Bandar Udara Lunyuk Sumbawa'),
('BSX', 'Bandar Udara Internasional El Tari Kupang'),
('LBJ', 'Bandar Udara Komodo Manggarai Barat'),
('TMC', 'Bandar Udara Tambolaka Waikabubak'),
('WGP', 'Bandar Udara Umbu Mehang Kunda Waingapu'),
('LKA', 'Bandar Udara Gewayantana Larantuka'),
('LWE', 'Bandar Udara Wonopito Lewoleba'),
('RTI', 'Bandar Udara Lekunik Rote'),
('SAU', 'Bandar Udara Tardamu Pulau Sawu'),
('KTG', 'Bandar Udara Rahadi Oesman Ketapang'),
('SQG', 'Bandar Udara Susilo Sintang'),
('NPO', 'Bandar Udara Nanga Pinoh Nanga Pinoh'),
('PSU', 'Bandar Udara Pangsuma Putussibau'),
('PKY', 'Bandar Udara Tjilik Riwut Palangka Raya'),
('PKN', 'Bandar Udara Iskandar Pangkalan Bun'),
('TBM', 'Bandar Udara Tumbang Samba Katingan'),
('SMQ', 'Bandar Udara H. Asan Sampit'),
('MTW', 'Bandar Udara Beringin Muara Teweh'),
('BDJ', 'Bandar Udara Syamsuddin Noor Banjarmasin'),
('TJG', 'Bandar Udara Warukin Tanjung'),
('BTW', 'Bandar Udara Bersujud Batulicin'),
('KBU', 'Bandar Udara ST Raden Kotabaru'),
('SRI', 'Bandar Udara Temindung Samarinda'),
('NNX', 'Bandar Udara Nunukan Nunukan'),
('LBW', 'Bandar Udara Yuvai Semaring Krayan'),
('BYQ', 'Bandar Udara Bunyu Pulau Bunyu'),
('MLN', 'Bandar Udara R.A. Bessing Malinau'),
('LPU', 'Bandar Udara Long Ampung Kayan Selatan'),
('TJS', 'Bandar Udara Tanjung Harapan Tanjung Selor'),
('NAF', 'Bandar Udara Banaina Bulungan'),
('BEJ', 'Bandar Udara Kalimarau Tanjung Redeb'),
('SGQ', 'Bandar Udara Sangkimah Sangatta'),
('BXT', 'Bandar Udara Bontang Bontang'),
('TSX', 'Bandar Udara Tanjung Santan Marang Kayu'),
('KOD', 'Bandar Udara Kotabangun Kutai Kartanegara'),
('SZH', 'Bandar Udara Senipah Kutai Kartanegara'),
('MLK', 'Bandar Udara Melalan Melak'),
('DTD', 'Bandar Udara Datah Dawai Kutai Barat'),
('TNB', 'Bandar Udara Tanah Grogot Tanah Grogot'),
('STA', 'Bandar Udara Tanjung Bara Sangatta'),
('MXB', 'Bandar Udara Andi Djemma Masamba'),
('BUW', 'Bandar Udara Betoambari Bau-bau'),
('GTO', 'Bandar Udara Jalaluddin Gorontalo'),
('SQR', 'Bandar Udara Inco Soroako Waws Sorowako'),
('PSJ', 'Bandar Udara Kasiguncu Poso'),
('TLI', 'Bandar Udara Lalos Tolitoli'),
('LWU', 'Bandar Udara Lagaligo  Luwu'),
('MJU', 'Bandar Udara Tampa Padang Mamuju'),
('MNA', 'Bandar Udara Melonguane Melonguane'),
('BJG', 'Bandar Udara Mopait Bolaang Mongondow'),
('NAH', 'Bandar Udara Naha Tahuna'),
('UOL', 'Bandar Udara Pogugol Buol'),
('PUM', 'Bandar Udara Sangia Ni Bandera Pomalaa'),
('TTR', 'Bandar Udara Pongtiku Tana Toraja'),
('RAQ', 'Bandar Udara Sugimanuru Raha'),
('SLY', 'Bandar Udara H. Aroeppala  Selayar'),
('WKB', 'Bandar Udara Matahora  Wangi-wangi'),
('MRG', 'Bandar Udara Maranggo  Pulau Tomia'),
('AHI', 'Bandar Udara Amahai Masohi'),
('NDA', 'Bandar Udara Bandaneira Banda'),
('DOB', 'Bandar Udara Dobo Kepulauan Aru'),
('LUV', 'Bandar Udara Dumatubun Langgur'),
('SQN', 'Bandar Udara Emalamo Sanana'),
('GLX', 'Bandar Udara Gamarmalamo Galela'),
('GEB', 'Bandar Udara Gebe Gebe'),
('KAZ', 'Bandar Udara Kuabang Tobelo'),
('MAL', 'Bandar Udara Mangole Mangole'),
('NAM', 'Bandar Udara Namlea Namlea'),
('NRE', 'Bandar Udara Namrole Namrole'),
('BJK', 'Bandar Udara Nangasuri Benjina'),
('LAH', 'Bandar Udara Oesman Sadik Labuha'),
('SXK', 'Bandar Udara Olilit Saumlaki'),
('OTI', 'Bandar Udara Pitu Morotai'),
('RSK', 'Bandar Udara Abresso Manokwari'),
('TTE', 'Bandar Udara Sultan Babullah Ternate'),
('TAX', 'Bandar Udara Taliabu Taliabu'),
('WHI', 'Bandar Udara Wahai Pulau Seram'),
('AGD', 'Bandar Udara Anggi Anggi'),
('AAS', 'Bandar Udara Apalapsili Jayawijaya'),
('ARJ', 'Bandar Udara Arso Arso'),
('AYW', 'Bandar Udara Ayawasi Sorong'),
('BXB', 'Bandar Udara Babo Babo'),
('BXD', 'Bandar Udara Bade Merauke'),
('BXM', 'Bandar Udara Batom Pegunungan Bintang'),
('NTI', 'Bandar Udara Bintuni Bintuni'),
('BUI', 'Bandar Udara Bokondini Jayawijaya'),
('DRH', 'Bandar Udara Dabra Puncak Jaya'),
('ELR', 'Bandar Udara Elilim Jayawijaya'),
('EWI', 'Bandar Udara Enarotali Enarotali'),
('EWE', 'Bandar Udara Ewer Merauke'),
('ILA', 'Bandar Udara Illaga Paniai'),
('IUL', 'Bandar Udara Ilu Puncak Jaya'),
('INX', 'Bandar Udara Inanwatan Inanwatan'),
('SOQ', 'Bandar Udara Domine Eduard Osok Sorong'),
('FOO', 'Bandar Udara Yemburwo. Numfor Timur'),
('KBX', 'Bandar Udara Kambuaya Sorong Selatan'),
('KCD', 'Bandar Udara Kamur Asmat'),
('KBF', 'Bandar Udara Karubaga Jayawijaya'),
('KEQ', 'Bandar Udara Kebar Manokwari'),
('LLN', 'Bandar Udara Kelila Jayawijaya'),
('KEI', 'Bandar Udara Kepi Merauke'),
('KMM', 'Bandar Udara Kimaan Merauke'),
('KOX', 'Bandar Udara Kokonao Mimika'),
('LHI', 'Bandar Udara Lereh Jayapura'),
('ZRM', 'Bandar Udara Mararena Sarmi'),
('RDE', 'Bandar Udara Merdey Manokwari'),
('MDP', 'Bandar Udara Mindiptana Boven Digoel'),
('ONI', 'Bandar Udara Moanamani Dogiyai'),
('LII', 'Bandar Udara Mulia Puncak Jaya'),
('MUF', 'Bandar Udara Muting Merauke'),
('NBX', 'Bandar Udara Nabire Nabire'),
('OBD', 'Bandar Udara Obano Nabire'),
('OKQ', 'Bandar Udara Okaba Puncak Jaya'),
('OKL', 'Bandar Udara Oksibil Pegunungan Bintang'),
('GAV', 'Bandar Udara Pulau Gag Raja Ampat'),
('MKW', 'Bandar Udara Rendani Manokwari'),
('SEH', 'Bandar Udara Senggeh Keerom'),
('ZEG', 'Bandar Udara Senggo Mappi'),
('NKD', 'Bandar Udara Sinak Puncak Jaya'),
('ZRI', 'Bandar Udara Sudjarwo Tjondronegoro Serui'),
('TMH', 'Bandar Udara Tanah Merah Tanah Merah'),
('TXM', 'Bandar Udara Teminabuan Teminabuan'),
('TMY', 'Bandar Udara Tiom Jayawijaya'),
('UBR', 'Bandar Udara Ubrub Keerom'),
('WET', 'Bandar Udara Waghete Deiyai'),
('WMX', 'Bandar Udara Wamena Wamena'),
('WAR', 'Bandar Udara Waris Keerom'),
('WSR', 'Bandar Udara Wasior Wasior'),
('RUF', 'Bandar Udara Yuruf Jayawijaya'),
('UGU', 'Bandar Udara Zugapa Paniai');

-- --------------------------------------------------------

--
-- Table structure for table `aero_configurations`
--

CREATE TABLE IF NOT EXISTS `aero_configurations` (
  `param` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  KEY `param` (`param`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aero_configurations`
--

INSERT INTO `aero_configurations` (`param`, `value`) VALUES
('voucher_price_delay', '300000'),
('voucher_price_transfer', '150000'),
('voucher_price_cancelled', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `aero_groups`
--

CREATE TABLE IF NOT EXISTS `aero_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aero_groups`
--

INSERT INTO `aero_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'airlines', 'Airlines'),
(3, 'ciu', 'CIU');

-- --------------------------------------------------------

--
-- Table structure for table `aero_logs`
--

CREATE TABLE IF NOT EXISTS `aero_logs` (
  `user_id` int(4) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `log_text` text COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(4) unsigned NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `created_at` (`created_at`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aero_master_vouchers`
--

CREATE TABLE IF NOT EXISTS `aero_master_vouchers` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `voucher_date` date NOT NULL,
  `voucher_start` int(4) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `voucer_date` (`voucher_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aero_passengers`
--

CREATE TABLE IF NOT EXISTS `aero_passengers` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `voucher_id` int(8) unsigned NOT NULL,
  `passenger_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passenger_ticket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_code` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `next_voucher_key` bigint(10) unsigned NOT NULL,
  `price` double unsigned NOT NULL,
  `passanger_remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_status` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `voucer_code` (`voucher_code`),
  KEY `voucher_status` (`voucher_status`),
  KEY `passenger_name` (`passenger_name`),
  KEY `passenger_ticket` (`passenger_ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aero_users`
--

CREATE TABLE IF NOT EXISTS `aero_users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` int(10) unsigned NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_code` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `aero_users`
--

INSERT INTO `aero_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `fullname`) VALUES
(1, 2130706433, 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1268889823, 1, 'Admin'),
(2, 2130706433, 'user01', '3f88a087b26db383b86feb0e0b20128a9ad7ecde', NULL, '', NULL, NULL, NULL, 1330155047, 1331660227, 1, 'erwin'),
(4, 2130706433, 'ciu', '15ded39dd1853c309855a454de3e7cc9cd5cf066', NULL, '', NULL, NULL, NULL, 1330172977, 1330848441, 1, 'Administrator CIU'),
(5, 2130706433, 'garuda', '9ab1c26d763e54ddd09738177b84f139ffa74fb3', NULL, '', NULL, NULL, NULL, 1330252168, 1330263880, 1, 'Airlines Garuda 01'),
(6, 2130706433, 'airasia', '3e68901d87b8f4babf2828360da116ad5582156b', NULL, '', NULL, NULL, NULL, 1330252212, 1330261169, 1, 'Air Asia'),
(7, 2130706433, 'sky', 'adbf90a84db4fe1f5292b6bd1076dcd32f49c1aa', NULL, '', NULL, NULL, NULL, 1330252229, 1330486147, 1, 'SKY'),
(8, 2130706433, 'express', 'b37ffdfab82b83dcbf84c815c3cb4265ea8d0f68', NULL, '', NULL, NULL, NULL, 1330252247, 1330252247, 1, 'Travel Express'),
(9, 0, 'maunder', '17b661f7da583467e2e1d6b613360096ace4aecd', NULL, '', NULL, NULL, NULL, 1330848813, 1330848813, 1, 'TRANS AVIATION MAUNDER'),
(3, 2130706433, 'express2', 'b37ffdfab82b83dcbf84c815c3cb4265ea8d0f68', NULL, '', NULL, NULL, NULL, 1330252247, 1330252247, 1, 'Travel Express');

-- --------------------------------------------------------

--
-- Table structure for table `aero_users_groups`
--

CREATE TABLE IF NOT EXISTS `aero_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `aero_users_groups`
--

INSERT INTO `aero_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 4, 3),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `aero_vouchers`
--

CREATE TABLE IF NOT EXISTS `aero_vouchers` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(4) unsigned NOT NULL,
  `airlines_id` int(4) unsigned NOT NULL,
  `voucher_type` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `flight_date` date NOT NULL,
  `flight_number` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `departure_city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `arrival_city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `delay_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flight_std` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `flight_etd` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `total_pax_delay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_pax_transfer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_pax_cancelled` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci NOT NULL,
  `voucher_status` smallint(1) unsigned NOT NULL DEFAULT '0',
  `voucher_created_at` datetime NOT NULL,
  `voucher_verified` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `flight_status` (`voucher_status`),
  KEY `flight_type` (`voucher_type`),
  KEY `airlines_id` (`airlines_id`),
  KEY `user_id` (`user_id`),
  KEY `voucher_verified` (`voucher_verified`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
