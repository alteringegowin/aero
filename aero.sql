-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 27, 2012 at 11:25 AM
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
(3, 'INDONESIA AIR ASIA', 'logo-airasia.png', ''),
(4, 'TRANS AVIATION MAUNDER', 'logo-travel-express-aviaton.png', ''),
(5, 'SKY AVIATION', 'logo-sky-aviation.png', '');

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
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10);

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

--
-- Dumping data for table `aero_attachments`
--

INSERT INTO `aero_attachments` (`voucher_id`, `attachment_type`, `attachment_file`, `offline_mode`) VALUES
(1, 1, 'output.pdf', 0),
(1, 2, 'output1.pdf', 0),
(2, 1, '758_2px.jpg', 0),
(2, 2, '758_2px1.jpg', 0),
(3, 1, '758_2px2.jpg', 0),
(3, 2, '758_2px3.jpg', 0);

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
('UGU', 'Bandar Udara Zugapa Paniai'),
('CGK', 'JAKARTA');

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
('voucher_price_cancelled', '150000'),
('voucher_price_reroute', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `aero_delay_codes`
--

CREATE TABLE IF NOT EXISTS `aero_delay_codes` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `airlines_id` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `airline_id` (`airlines_id`),
  KEY `code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=142 ;

--
-- Dumping data for table `aero_delay_codes`
--

INSERT INTO `aero_delay_codes` (`id`, `code`, `note`, `airlines_id`) VALUES
(1, '00', '', 0),
(2, '01', '', 0),
(3, '02', '', 0),
(4, '03', '', 0),
(5, '04', '', 0),
(6, '05', '', 0),
(7, '06', 'No gate/stand availability due to own airline activity', 0),
(8, '07', 'Aircraft connection by maintenance', 0),
(9, '08', 'Aircraft connection by miscellaneous, traffic, marketing flight operations, ground handling, cabin services, etc.', 0),
(10, '09', 'Scheduled ground time less than declared minimum ground time', 0),
(11, '10', '', 0),
(12, '11', 'Late check-in, acceptance of passengers after deadline', 0),
(13, '12', 'Late Check-in, congestion in check-in area', 0),
(14, '13', 'Check-in error', 0),
(15, '14', 'Overbooking, booking errors', 0),
(16, '15', 'Boarding, discrepancies and paging, missing checked-in passenger at gate', 0),
(17, '16', 'Commercial Publicity, Passenger Convenience, VIP, Press, Ground meals and missing personal items', 0),
(18, '17', 'Catering order, late or incorrect order given to supplier', 0),
(19, '18', 'Baggage processing, sorting, etc.', 0),
(20, '19', '', 0),
(21, '20', '', 0),
(22, '21', 'A Documentation, errors, etc.', 0),
(23, '22', 'Late positioning', 0),
(24, '23', 'Late acceptance', 0),
(25, '24', 'Inadequate packing', 0),
(26, '25', 'Overbooking, booking errors', 0),
(27, '26', 'Late preparation in warehouse', 0),
(28, '27', 'Mail Oversales, packing, etc.', 0),
(29, '28', 'Mail Late positioning', 0),
(30, '29', 'Mail Late acceptance', 0),
(31, '30', '', 0),
(32, '31', 'Aircraft documentation late or inaccurate, weight and balance (Loadsheet), general declaration, passenger manifest, etc.', 0),
(33, '32', 'Loading, Unloading, bulky/special load, cabin load, lack of loading staff', 0),
(34, '33', 'Loading Equipment, lack of or breakdown, e.g. container pallet loader, lack of staff', 0),
(35, '34', 'Servicing Equipment, lack of or breakdown, lack of staff, e.g. steps', 0),
(36, '35', 'Aircraft Cleaning', 0),
(37, '36', 'Fuelling, Defuelling, fuel supplier', 0),
(38, '37', 'Catering, late delivery or loading', 0),
(39, '38', 'ULD, Containers, pallets, lack of or breakdown', 0),
(40, '39', 'Technical equipment, lack of or breakdown, lack of staff, e.g. pushback', 0),
(41, '40', '', 0),
(42, '41', 'Aircraft defects', 0),
(43, '42', 'Scheduled maintenance, late release', 0),
(44, '43', 'Non-scheduled maintenance, special checks and / or additional works beyond normal maintenance', 0),
(45, '44', 'Spares and maintenance equipment, lack of or breakdown', 0),
(46, '45', 'AOG (Aircraft on ground for technical reasons) Spares, to be carried to another station', 0),
(47, '46', 'Aircraft change for technical reasons', 0),
(48, '47', 'Standby aircraft, lack of planned standby aircraft for technical reasons', 0),
(49, '48', 'Scheduled cabin configuration and version adjustment', 0),
(50, '49', '', 0),
(51, '50', '', 0),
(52, '51', 'Damage during flight operations, bird or lightning strike, turbulence, heavy or overweight landing', 0),
(53, '52', 'Damage during ground operations, collisions (other than during taxiing, loading/offloading damage, contamination, towing, extreme weather conditions', 0),
(54, '53', '', 0),
(55, '54', '', 0),
(56, '55', 'Departure Control System, Check-in, weight and balance (loadcontrol), computer system error, baggage sorting, gate-reader error or problems', 0),
(57, '56', 'Cargo preparation/documentation system', 0),
(58, '57', 'Flight plans', 0),
(59, '58', 'Other computer systems', 0),
(60, '59', '', 0),
(61, '60', '', 0),
(62, '61', 'Flight plan, late completion or change of flight documentation', 0),
(63, '62', 'Operational requirements, fuel, load alteration', 0),
(64, '63', 'Late crew boarding or departure procedures', 0),
(65, '64', 'Flight deck crew shortage, Crew rest', 0),
(66, '65', 'Flight deck crew special request or error', 0),
(67, '66', 'Late cabin crew boarding or departure procedures', 0),
(68, '67', 'Cabin crew shortage', 0),
(69, '68', 'Cabin crew error or special request', 0),
(70, '69', 'Captain request for security check, extraordinary', 0),
(71, '70', '', 0),
(72, '71', 'Departure station', 0),
(73, '72', 'Destination station', 0),
(74, '73', 'Enroute or Alternate', 0),
(75, '74', '', 0),
(76, '75', 'De-Icing of aircraft, removal of ice/snow, frost prevention', 0),
(77, '76', 'Removal of snow/ice/water/sand from airport/runway', 0),
(78, '77', 'Aircraft ground handling impaired by adverse weather conditions', 0),
(79, '78', '', 0),
(80, '79', '', 0),
(81, '80', '', 0),
(82, '81', 'ATC restriction en-route or capacity', 0),
(83, '82', 'ATC restriction due to staff shortage or equipment failure en-route', 0),
(84, '83', 'ATC restriction at destination', 0),
(85, '84', 'ATC restriction due to weather at destination', 0),
(86, '85', 'Mandatory security', 0),
(87, '86', 'Immigration, Customs, Health', 0),
(88, '87', 'Airport Facilities, parking stands, ramp congestion, buildings, gate limitations, ...', 0),
(89, '88', 'Restrictions at airport of destination, airport/runway closed due obstruction, industrial action, staff shortage, political unrest, noise abatement, night curfew, special flights, ...', 0),
(90, '89', 'Restrictions at airport of departure, airport/runway closed due obstruction, industrial action, staff shortage, political unrest, noise abatement, night curfew, special flights, start-up and pushback, ...', 0),
(91, '90', '', 0),
(92, '91', 'Passenger or Load Connection, awaiting load or passengers from another flight. Protection of stranded passengers onto a new flight.', 0),
(93, '92', 'Through Check-in error, passenger and bagage', 0),
(94, '93', 'Aircraft rotation', 0),
(95, '94', 'Cabin crew rotation', 0),
(96, '95', 'Crew rotation (entire or cockpit crew)', 0),
(97, '96', 'Operations control, rerouting, diversion, consolidation, aircraft change for reasons other than technical', 0),
(98, '97', 'Industrial action within own airline', 0),
(99, '98', 'Industrial action outside own airline', 0),
(100, '99', 'Miscellaneous, not elsewhere specified', 0),
(101, '1', 'INSUFFICIENT BLOCK TIME', 3),
(102, '5', 'ANNEX 17', 3),
(103, '15', 'LATE COMPLETION OF BOARDING', 3),
(104, '16', 'HEADCOUNT GS - WRONG HEADCOUNT BY GS AT GATE', 3),
(105, '22', 'CARGO/MAIL LOADING/UNLOADING', 3),
(106, '31', 'LOADING INSTRUCTION - LATE OR INCORRECT', 3),
(107, '32', 'BAGGAGE LOADING/UNLOADING', 3),
(108, '34', 'SERVICING EQUIPMENT - WATER CART U/S', 3),
(109, '38', 'PUSHBACK EQUIPMENT - TOW TRUCK LATE/TOW BAR', 3),
(110, '39', 'LATE RAMP PERSONNEL - NO MARSHALLER', 3),
(111, '40', 'EOB/ENGINEERING LATE - EOB/HEADSET MAN/TRANSIT PERSONEL', 3),
(112, '41', 'AIRCRAFT DEFECTS/DAMAGE - AOG/TECHNICAL', 3),
(113, '44', 'GTSU/GPU - LATE TO ACFT/NOT AVAILABLE', 3),
(114, '49', 'AIRCRAFT DOCUMENTATION - AIRCRAFT TECHNICAL DOCUMENT DISCREPANCIES', 3),
(115, '51', 'DAMAGE DURING FLIGHT OPERATIONS - BIRD OR LIGHTNING STRIKE, TURBULENCE, HEAVY LANDING', 3),
(116, '52', 'DAMAGE DURING GROUND OPERATIONS - COLLISIONS DURING LOADING/OFFLOADING,TOWING', 3),
(117, '53', 'LATE DELIVERY OF INFLIGHT SERVICES', 3),
(118, '56', 'IFC LOADING DISCREPANCIES - MEAL NOT TALLY WITH C/CREW CALCULATION OR', 3),
(119, '60', 'HEADCOUNT CABIN CREW - HEADCOUNT AT ACFT', 3),
(120, '61', 'FLIGHT DOCUMENTS - FLIGHT PLAN, GD, EMBARKATION, VR', 3),
(121, '63', 'LATE CABIN CREW BOARDING - ROSTERED / STBY', 3),
(122, '66', 'LATE TECH CREW BOARDING - ROSTERED / STBY', 3),
(123, '71', 'WX AT DEPARTURE STATION', 3),
(124, '72', 'WX AT ARRIVAL STATION', 3),
(125, '73', 'WX ENROUTE OR ALTERNATE', 3),
(126, '75', 'DE ICING OF AIRCRAFT', 3),
(127, '81', 'ATC SEQUENCE FOR DEPARTURE', 3),
(128, '82', 'ATC ENROUTE RESTRICTION', 3),
(129, '89', 'ATC CLEARANCE - GATE HOLD PROCEDURE, ROUTE CLEARANCE', 3),
(130, '83', 'ATC SEQUENCE FOR ARRIVAL', 3),
(131, '85', 'RAMP CONGESTION - ACFT BLOCKED OTHER ACFT FOR PUSHBACK', 3),
(132, '86', 'IMMIGRATION,CUSTOM,HEALTH   @   CIQ  ', 3),
(133, '87', 'AIRPORT FACILITIES - PARKING STANDS, APORT POWER FAILURE', 3),
(134, '88', 'RESTRICTIONS AT AIRPORT OF ARRIVAL - AIRPRT/RUNWAY CLOSE DUE TO OBSTRUCTION,CURFEW,POLITICAL UNREST', 3),
(135, '89', 'RESTRICTIONS AT AIRPORT OF DEPARTURE  WITH START UP AND PUSHBACK', 3),
(136, '93', 'AIRCRAFT ROTATION/ CONSEQUENCE', 3),
(137, '96', 'DIVERSION', 3),
(138, '99', 'REASON DOES NOT MATCH ANY CODES', 3),
(139, '13', 'PASSENGER DISRUPTION - UNRULY PAX/ SMOKING PAX', 3),
(140, '36', 'FUELING/DEFUELING', 3),
(141, '37', 'UPLIFT FUEL MORE THAN 12000LITRES', 3);

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

--
-- Dumping data for table `aero_logs`
--

INSERT INTO `aero_logs` (`user_id`, `created_at`, `log_text`, `group_id`) VALUES
(5, '2012-04-26 12:50:05', '<a href="http://local.host/aero/ciu/detail/1"> request voucher QZ770</a>', 3),
(5, '2012-04-26 12:50:05', '<a href="http://local.host/aero/release/detail/1"> request voucher QZ770</a>', 2),
(5, '2012-04-26 13:13:45', '<a href="http://local.host/aero/ciu/detail/1"> print a voucher </a>', 3),
(5, '2012-04-26 13:13:45', '<a href="http://local.host/aero/release/detail/1"> print a voucher </a>', 2),
(13, '2012-04-26 15:46:12', '<a href="http://local.host/aero/ciu/detail/1"> import data pasenger </a>', 3),
(13, '2012-04-26 15:46:12', '<a href="http://local.host/aero/release/detail/1"> import data pasenger </a>', 2),
(13, '2012-04-26 15:48:49', '<a href="http://local.host/aero/ciu/detail/1"> import data pasenger </a>', 3),
(13, '2012-04-26 15:48:49', '<a href="http://local.host/aero/release/detail/1"> import data pasenger </a>', 2),
(13, '2012-04-26 15:50:57', '<a href="http://local.host/aero/ciu/detail/1"> import data pasenger </a>', 3),
(13, '2012-04-26 15:50:57', '<a href="http://local.host/aero/release/detail/1"> import data pasenger </a>', 2),
(5, '2012-04-26 16:38:57', '<a href="http://local.host/aero/ciu/detail/2"> request voucher QZ222</a>', 3),
(5, '2012-04-26 16:38:57', '<a href="http://local.host/aero/release/detail/2"> request voucher QZ222</a>', 2),
(5, '2012-04-26 16:40:00', '<a href="http://local.host/aero/ciu/detail/1"> print a voucher </a>', 3),
(5, '2012-04-26 16:40:00', '<a href="http://local.host/aero/release/detail/1"> print a voucher </a>', 2),
(5, '2012-04-26 16:42:37', '<a href="http://local.host/aero/ciu/detail/1"> print a voucher </a>', 3),
(5, '2012-04-26 16:42:37', '<a href="http://local.host/aero/release/detail/1"> print a voucher </a>', 2),
(1, '2012-04-26 17:03:55', '<a href="http://local.host/aero/ciu/detail/3"> request voucher GA111</a>', 3),
(1, '2012-04-26 17:03:55', '<a href="http://local.host/aero/release/detail/3"> request voucher GA111</a>', 2),
(13, '2012-04-26 17:05:32', '<a href="http://local.host/aero/ciu/detail/3"> import data pasenger </a>', 3),
(13, '2012-04-26 17:05:32', '<a href="http://local.host/aero/release/detail/3"> import data pasenger </a>', 2),
(1, '2012-04-26 17:11:36', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:11:36', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:11:58', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:11:58', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:12:57', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:12:57', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:14:41', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:14:41', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:15:10', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:15:10', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:15:11', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:15:11', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:15:12', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:15:12', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:15:13', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:15:13', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:15:45', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:15:45', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:16:36', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:16:36', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:16:52', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:16:52', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:17:48', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:17:48', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:19:15', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:19:15', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:19:42', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:19:42', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:20:21', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:20:21', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:21:44', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:21:44', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:21:46', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:21:46', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:21:48', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:21:48', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:22:26', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:22:26', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:23:04', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:23:04', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2),
(1, '2012-04-26 17:23:34', '<a href="http://local.host/aero/ciu/detail/3"> print a voucher </a>', 3),
(1, '2012-04-26 17:23:34', '<a href="http://local.host/aero/release/detail/3"> print a voucher </a>', 2);

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
  `voucher_type` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `next_voucher_key` bigint(10) unsigned NOT NULL,
  `price` double unsigned NOT NULL,
  `passanger_remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_status` smallint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `voucer_code` (`voucher_code`),
  KEY `voucher_status` (`voucher_status`),
  KEY `passenger_name` (`passenger_name`),
  KEY `passenger_ticket` (`passenger_ticket`),
  KEY `voucher_type` (`voucher_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=212 ;

--
-- Dumping data for table `aero_passengers`
--

INSERT INTO `aero_passengers` (`id`, `voucher_id`, `passenger_name`, `passenger_ticket`, `voucher_code`, `voucher_type`, `next_voucher_key`, `price`, `passanger_remark`, `voucher_status`) VALUES
(1, 1, 'ERWIN HANDOKO', '0', 'QZ770-AAS-AMQ-0134-000000000001', 'delay', 2, 300000, '0', 0),
(2, 1, 'HANDOKO', '0', 'QZ770-AAS-AMQ-0134-000000000002', 'delay', 3, 300000, '0', 0),
(3, 1, 'ERWIN C', '0', 'QZ770-AAS-AMQ-0134-000000000003', 'delay', 4, 300000, '0', 0),
(4, 1, 'NANANG AS', '0', 'QZ770-AAS-AMQ-0134-000000000004', 'delay', 5, 300000, '0', 0),
(5, 1, 'NANANG BS', '0', 'QZ770-AAS-AMQ-0134-000000000005', 'delay', 6, 300000, '0', 0),
(6, 1, 'KOMARUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000006', 'delay', 7, 300000, '0', 0),
(7, 1, 'HASBULLAH', '0', 'QZ770-AAS-AMQ-0134-000000000007', 'delay', 8, 300000, '0', 0),
(8, 1, 'CHEN', '0', 'QZ770-AAS-AMQ-0134-000000000008', 'delay', 9, 300000, '0', 0),
(9, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000009', 'delay', 10, 300000, '0', 0),
(10, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000010', 'delay', 11, 300000, '0', 0),
(11, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000011', 'delay', 12, 300000, '0', 0),
(12, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000012', 'delay', 13, 300000, '0', 0),
(13, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000013', 'delay', 14, 300000, '0', 0),
(14, 1, 'TECHIES', '0', 'QZ770-AAS-AMQ-0134-000000000014', 'delay', 15, 300000, '0', 0),
(15, 1, 'PUDGE', '0', 'QZ770-AAS-AMQ-0134-000000000015', 'delay', 16, 300000, '0', 0),
(16, 1, 'BANEHALLOW', '0', 'QZ770-AAS-AMQ-0134-000000000016', 'delay', 17, 300000, '0', 0),
(17, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000017', 'delay', 18, 300000, '0', 0),
(18, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000018', 'delay', 19, 300000, '0', 0),
(19, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000019', 'delay', 20, 300000, '0', 0),
(20, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000020', 'delay', 21, 300000, '0', 0),
(21, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000021', 'delay', 22, 300000, '0', 0),
(22, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000022', 'delay', 23, 300000, '0', 0),
(23, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000023', 'delay', 24, 300000, '0', 0),
(24, 1, '0', '0', 'QZ770-AAS-AMQ-0134-000000000024', 'delay', 25, 300000, '0', 0),
(25, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000025', 'delay', 26, 300000, '0', 0),
(26, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000026', 'delay', 27, 300000, '0', 0),
(27, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000027', 'delay', 28, 300000, '0', 0),
(28, 1, 'KOMARUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000028', 'delay', 29, 300000, '0', 0),
(29, 1, 'HASBULLAH', '0', 'QZ770-AAS-AMQ-0134-000000000029', 'delay', 30, 300000, '0', 0),
(30, 1, 'CHEN', '0', 'QZ770-AAS-AMQ-0134-000000000030', 'delay', 31, 300000, '0', 0),
(31, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000031', 'delay', 32, 300000, '0', 0),
(32, 1, 'KOMARUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000032', 'delay', 33, 300000, '0', 0),
(33, 1, 'HASBULLAH', '0', 'QZ770-AAS-AMQ-0134-000000000033', 'delay', 34, 300000, '0', 0),
(34, 1, 'CHEN', '0', 'QZ770-AAS-AMQ-0134-000000000034', 'delay', 35, 300000, '0', 0),
(35, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000035', 'delay', 36, 300000, '0', 0),
(36, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000036', 'delay', 37, 300000, '0', 0),
(37, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000037', 'delay', 38, 300000, '0', 0),
(38, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000038', 'delay', 39, 300000, '0', 0),
(39, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000039', 'delay', 40, 300000, '0', 0),
(40, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000040', 'delay', 41, 300000, '0', 0),
(41, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000041', 'delay', 42, 300000, '0', 0),
(42, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000042', 'delay', 43, 300000, '0', 0),
(43, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000043', 'delay', 44, 300000, '0', 0),
(44, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000044', 'delay', 45, 300000, '0', 0),
(45, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000045', 'delay', 46, 300000, '0', 0),
(46, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000046', 'delay', 47, 300000, '0', 0),
(47, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000047', 'delay', 48, 300000, '0', 0),
(48, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000048', 'delay', 49, 300000, '0', 0),
(49, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000049', 'delay', 50, 300000, '0', 0),
(50, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000050', 'delay', 51, 300000, '0', 0),
(51, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000051', 'delay', 52, 300000, '0', 0),
(52, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000052', 'delay', 53, 300000, '0', 0),
(53, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000053', 'delay', 54, 300000, '0', 0),
(54, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000054', 'delay', 55, 300000, '0', 0),
(55, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000055', 'delay', 56, 300000, '0', 0),
(56, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000056', 'delay', 57, 300000, '0', 0),
(57, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000057', 'delay', 58, 300000, '0', 0),
(58, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000058', 'delay', 59, 300000, '0', 0),
(59, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000059', 'delay', 60, 300000, '0', 0),
(60, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000060', 'delay', 61, 300000, '0', 0),
(61, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000061', 'delay', 62, 300000, '0', 0),
(62, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000062', 'delay', 63, 300000, '0', 0),
(63, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000063', 'delay', 64, 300000, '0', 0),
(64, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000064', 'delay', 65, 300000, '0', 0),
(65, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000065', 'delay', 66, 300000, '0', 0),
(66, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000066', 'delay', 67, 300000, '0', 0),
(67, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000067', 'delay', 68, 300000, '0', 0),
(68, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000068', 'delay', 69, 300000, '0', 0),
(69, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000069', 'delay', 70, 300000, '0', 0),
(70, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000070', 'delay', 71, 300000, '0', 0),
(71, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000071', 'delay', 72, 300000, '0', 0),
(72, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000072', 'delay', 73, 300000, '0', 0),
(73, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000073', 'delay', 74, 300000, '0', 0),
(74, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000074', 'delay', 75, 300000, '0', 0),
(75, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000075', 'delay', 76, 300000, '0', 0),
(76, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000076', 'delay', 77, 300000, '0', 0),
(77, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000077', 'delay', 78, 300000, '0', 0),
(78, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000078', 'delay', 79, 300000, '0', 0),
(79, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000079', 'delay', 80, 300000, '0', 0),
(80, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000080', 'delay', 81, 300000, '0', 0),
(81, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000081', 'delay', 82, 300000, '0', 0),
(82, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000082', 'delay', 83, 300000, '0', 0),
(83, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000083', 'delay', 84, 300000, '0', 0),
(84, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000084', 'delay', 85, 300000, '0', 0),
(85, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000085', 'delay', 86, 300000, '0', 0),
(86, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000086', 'delay', 87, 300000, '0', 0),
(87, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000087', 'delay', 88, 300000, '0', 0),
(88, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000088', 'delay', 89, 300000, '0', 0),
(89, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000089', 'delay', 90, 300000, '0', 0),
(90, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000090', 'delay', 91, 300000, '0', 0),
(91, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000091', 'delay', 92, 300000, '0', 0),
(92, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000092', 'delay', 93, 300000, '0', 0),
(93, 1, 'LUNA MOONFANG', '0', 'QZ770-AAS-AMQ-0134-000000000093', 'delay', 94, 300000, '0', 0),
(94, 1, 'AMIR SAMSUDIN', '0', 'QZ770-AAS-AMQ-0134-000000000094', 'delay', 95, 300000, '0', 0),
(95, 1, 'MOH. MUNIR', '0', 'QZ770-AAS-AMQ-0134-000000000095', 'delay', 96, 300000, '0', 0),
(96, 1, 'CECIL', '0', 'QZ770-AAS-AMQ-0134-000000000096', 'delay', 97, 300000, '0', 0),
(97, 1, 'BASIR', '0', 'QZ770-AAS-AMQ-0134-000000000097', 'delay', 98, 300000, '0', 0),
(98, 1, 'SVEN', '0', 'QZ770-AAS-AMQ-0134-000000000098', 'delay', 99, 300000, '0', 0),
(99, 1, 'LINA INVERSE', '0', 'QZ770-AAS-AMQ-0134-000000000099', 'delay', 100, 300000, '0', 0),
(100, 1, 'TERAKHIR', '0', 'QZ770-AAS-AMQ-0134-000000000100', 'delay', 101, 300000, '0', 0),
(101, 2, '', '', 'QZ222-AAS-AAS-0132-000000000001', 'delay', 2, 300000, '', 0),
(102, 2, '', '', 'QZ222-AAS-AAS-0132-000000000002', 'delay', 3, 300000, '', 0),
(103, 2, '', '', 'QZ222-AAS-AAS-0132-000000000003', 'delay', 4, 300000, '', 0),
(104, 2, '', '', 'QZ222-AAS-AAS-0132-000000000004', 'delay', 5, 300000, '', 0),
(105, 2, '', '', 'QZ222-AAS-AAS-0132-000000000005', 'delay', 6, 300000, '', 0),
(106, 2, '', '', 'QZ222-AAS-AAS-0132-000000000006', 'delay', 7, 300000, '', 0),
(107, 2, '', '', 'QZ222-AAS-AAS-0132-000000000007', 'delay', 8, 300000, '', 0),
(108, 2, '', '', 'QZ222-AAS-AAS-0132-000000000008', 'delay', 9, 300000, '', 0),
(109, 2, '', '', 'QZ222-AAS-AAS-0132-000000000009', 'delay', 10, 300000, '', 0),
(110, 2, '', '', 'QZ222-AAS-AAS-0132-000000000010', 'delay', 11, 300000, '', 0),
(111, 2, '', '', 'QZ222-AAS-AAS-0132-000000000011', 'delay', 12, 300000, '', 0),
(112, 2, '', '', 'QZ222-AAS-AAS-0132-000000000012', 'delay', 13, 300000, '', 0),
(113, 2, '', '', 'QZ222-AAS-AAS-0132-000000000013', 'delay', 14, 300000, '', 0),
(114, 2, '', '', 'QZ222-AAS-AAS-0132-000000000014', 'delay', 15, 300000, '', 0),
(115, 2, '', '', 'QZ222-AAS-AAS-0132-000000000015', 'delay', 16, 300000, '', 0),
(116, 2, '', '', 'QZ222-AAS-AAS-0132-000000000016', 'delay', 17, 300000, '', 0),
(117, 2, '', '', 'QZ222-AAS-AAS-0132-000000000017', 'delay', 18, 300000, '', 0),
(118, 2, '', '', 'QZ222-AAS-AAS-0132-000000000018', 'delay', 19, 300000, '', 0),
(119, 2, '', '', 'QZ222-AAS-AAS-0132-000000000019', 'delay', 20, 300000, '', 0),
(120, 2, '', '', 'QZ222-AAS-AAS-0132-000000000020', 'delay', 21, 300000, '', 0),
(121, 2, '', '', 'QZ222-AAS-AAS-0132-000000000021', 'delay', 22, 300000, '', 0),
(122, 2, '', '', 'QZ222-AAS-AAS-0132-000000000022', 'delay', 23, 300000, '', 0),
(123, 2, '', '', 'QZ222-AAS-AAS-0132-000000000023', 'delay', 24, 300000, '', 0),
(124, 2, '', '', 'QZ222-AAS-AAS-0132-000000000024', 'delay', 25, 300000, '', 0),
(125, 2, '', '', 'QZ222-AAS-AAS-0132-000000000025', 'delay', 26, 300000, '', 0),
(126, 2, '', '', 'QZ222-AAS-AAS-0132-000000000026', 'delay', 27, 300000, '', 0),
(127, 2, '', '', 'QZ222-AAS-AAS-0132-000000000027', 'delay', 28, 300000, '', 0),
(128, 2, '', '', 'QZ222-AAS-AAS-0132-000000000028', 'delay', 29, 300000, '', 0),
(129, 2, '', '', 'QZ222-AAS-AAS-0132-000000000029', 'delay', 30, 300000, '', 0),
(130, 2, '', '', 'QZ222-AAS-AAS-0132-000000000030', 'delay', 31, 300000, '', 0),
(131, 2, '', '', 'QZ222-AAS-AAS-0132-000000000031', 'delay', 32, 300000, '', 0),
(132, 2, '', '', 'QZ222-AAS-AAS-0132-000000000032', 'delay', 33, 300000, '', 0),
(133, 2, '', '', 'QZ222-AAS-AAS-0132-000000000033', 'delay', 34, 300000, '', 0),
(134, 2, '', '', 'QZ222-AAS-AAS-0132-000000000034', 'delay', 35, 300000, '', 0),
(135, 2, '', '', 'QZ222-AAS-AAS-0132-000000000035', 'delay', 36, 300000, '', 0),
(136, 2, '', '', 'QZ222-AAS-AAS-0132-000000000036', 'delay', 37, 300000, '', 0),
(137, 2, '', '', 'QZ222-AAS-AAS-0132-000000000037', 'delay', 38, 300000, '', 0),
(138, 2, '', '', 'QZ222-AAS-AAS-0132-000000000038', 'delay', 39, 300000, '', 0),
(139, 2, '', '', 'QZ222-AAS-AAS-0132-000000000039', 'delay', 40, 300000, '', 0),
(140, 2, '', '', 'QZ222-AAS-AAS-0132-000000000040', 'delay', 41, 300000, '', 0),
(141, 2, '', '', 'QZ222-AAS-AAS-0132-000000000041', 'delay', 42, 300000, '', 0),
(142, 2, '', '', 'QZ222-AAS-AAS-0132-000000000042', 'delay', 43, 300000, '', 0),
(143, 2, '', '', 'QZ222-AAS-AAS-0132-000000000043', 'delay', 44, 300000, '', 0),
(144, 2, '', '', 'QZ222-AAS-AAS-0132-000000000044', 'delay', 45, 300000, '', 0),
(145, 2, '', '', 'QZ222-AAS-AAS-0132-000000000045', 'delay', 46, 300000, '', 0),
(146, 2, '', '', 'QZ222-AAS-AAS-0132-000000000046', 'delay', 47, 300000, '', 0),
(147, 2, '', '', 'QZ222-AAS-AAS-0132-000000000047', 'delay', 48, 300000, '', 0),
(148, 2, '', '', 'QZ222-AAS-AAS-0132-000000000048', 'delay', 49, 300000, '', 0),
(149, 2, '', '', 'QZ222-AAS-AAS-0132-000000000049', 'delay', 50, 300000, '', 0),
(150, 2, '', '', 'QZ222-AAS-AAS-0132-000000000050', 'delay', 51, 300000, '', 0),
(151, 2, '', '', 'QZ222-AAS-AAS-0132-000000000051', 'delay', 52, 300000, '', 0),
(152, 2, '', '', 'QZ222-AAS-AAS-0132-000000000052', 'delay', 53, 300000, '', 0),
(153, 2, '', '', 'QZ222-AAS-AAS-0132-000000000053', 'delay', 54, 300000, '', 0),
(154, 2, '', '', 'QZ222-AAS-AAS-0132-000000000054', 'delay', 55, 300000, '', 0),
(155, 2, '', '', 'QZ222-AAS-AAS-0132-000000000055', 'delay', 56, 300000, '', 0),
(156, 2, '', '', 'QZ222-AAS-AAS-0132-000000000056', 'delay', 57, 300000, '', 0),
(157, 2, '', '', 'QZ222-AAS-AAS-0132-000000000057', 'delay', 58, 300000, '', 0),
(158, 2, '', '', 'QZ222-AAS-AAS-0132-000000000058', 'delay', 59, 300000, '', 0),
(159, 2, '', '', 'QZ222-AAS-AAS-0132-000000000059', 'delay', 60, 300000, '', 0),
(160, 2, '', '', 'QZ222-AAS-AAS-0132-000000000060', 'delay', 61, 300000, '', 0),
(161, 2, '', '', 'QZ222-AAS-AAS-0132-000000000061', 'delay', 62, 300000, '', 0),
(162, 2, '', '', 'QZ222-AAS-AAS-0132-000000000062', 'delay', 63, 300000, '', 0),
(163, 2, '', '', 'QZ222-AAS-AAS-0132-000000000063', 'delay', 64, 300000, '', 0),
(164, 2, '', '', 'QZ222-AAS-AAS-0132-000000000064', 'delay', 65, 300000, '', 0),
(165, 2, '', '', 'QZ222-AAS-AAS-0132-000000000065', 'delay', 66, 300000, '', 0),
(166, 2, '', '', 'QZ222-AAS-AAS-0132-000000000066', 'delay', 67, 300000, '', 0),
(167, 2, '', '', 'QZ222-AAS-AAS-0132-000000000067', 'delay', 68, 300000, '', 0),
(168, 2, '', '', 'QZ222-AAS-AAS-0132-000000000068', 'delay', 69, 300000, '', 0),
(169, 2, '', '', 'QZ222-AAS-AAS-0132-000000000069', 'delay', 70, 300000, '', 0),
(170, 2, '', '', 'QZ222-AAS-AAS-0132-000000000070', 'delay', 71, 300000, '', 0),
(171, 2, '', '', 'QZ222-AAS-AAS-0132-000000000071', 'delay', 72, 300000, '', 0),
(172, 2, '', '', 'QZ222-AAS-AAS-0132-000000000072', 'delay', 73, 300000, '', 0),
(173, 2, '', '', 'QZ222-AAS-AAS-0132-000000000073', 'delay', 74, 300000, '', 0),
(174, 2, '', '', 'QZ222-AAS-AAS-0132-000000000074', 'delay', 75, 300000, '', 0),
(175, 2, '', '', 'QZ222-AAS-AAS-0132-000000000075', 'delay', 76, 300000, '', 0),
(176, 2, '', '', 'QZ222-AAS-AAS-0132-000000000076', 'delay', 77, 300000, '', 0),
(177, 2, '', '', 'QZ222-AAS-AAS-0132-000000000077', 'delay', 78, 300000, '', 0),
(178, 2, '', '', 'QZ222-AAS-AAS-0132-000000000078', 'delay', 79, 300000, '', 0),
(179, 2, '', '', 'QZ222-AAS-AAS-0132-000000000079', 'delay', 80, 300000, '', 0),
(180, 2, '', '', 'QZ222-AAS-AAS-0132-000000000080', 'delay', 81, 300000, '', 0),
(181, 2, '', '', 'QZ222-AAS-AAS-0132-000000000081', 'delay', 82, 300000, '', 0),
(182, 2, '', '', 'QZ222-AAS-AAS-0132-000000000082', 'delay', 83, 300000, '', 0),
(183, 2, '', '', 'QZ222-AAS-AAS-0132-000000000083', 'delay', 84, 300000, '', 0),
(184, 2, '', '', 'QZ222-AAS-AAS-0132-000000000084', 'delay', 85, 300000, '', 0),
(185, 2, '', '', 'QZ222-AAS-AAS-0132-000000000085', 'delay', 86, 300000, '', 0),
(186, 2, '', '', 'QZ222-AAS-AAS-0132-000000000086', 'delay', 87, 300000, '', 0),
(187, 2, '', '', 'QZ222-AAS-AAS-0132-000000000087', 'delay', 88, 300000, '', 0),
(188, 2, '', '', 'QZ222-AAS-AAS-0132-000000000088', 'delay', 89, 300000, '', 0),
(189, 2, '', '', 'QZ222-AAS-AAS-0132-000000000089', 'delay', 90, 300000, '', 0),
(190, 2, '', '', 'QZ222-AAS-AAS-0132-000000000090', 'delay', 91, 300000, '', 0),
(191, 2, '', '', 'QZ222-AAS-AAS-0132-000000000091', 'delay', 92, 300000, '', 0),
(192, 2, '', '', 'QZ222-AAS-AAS-0132-000000000092', 'delay', 93, 300000, '', 0),
(193, 2, '', '', 'QZ222-AAS-AAS-0132-000000000093', 'delay', 94, 300000, '', 0),
(194, 2, '', '', 'QZ222-AAS-AAS-0132-000000000094', 'delay', 95, 300000, '', 0),
(195, 2, '', '', 'QZ222-AAS-AAS-0132-000000000095', 'delay', 96, 300000, '', 0),
(196, 2, '', '', 'QZ222-AAS-AAS-0132-000000000096', 'delay', 97, 300000, '', 0),
(197, 2, '', '', 'QZ222-AAS-AAS-0132-000000000097', 'delay', 98, 300000, '', 0),
(198, 2, '', '', 'QZ222-AAS-AAS-0132-000000000098', 'delay', 99, 300000, '', 0),
(199, 2, '', '', 'QZ222-AAS-AAS-0132-000000000099', 'delay', 100, 300000, '', 0),
(200, 2, '', '', 'QZ222-AAS-AAS-0132-000000000100', 'delay', 101, 300000, '', 0),
(201, 3, 'ERWIN HANDOKO BIN MUHAMAD NATSIR', 'GA1001', 'GA111-AAS-AAS-0108-000000000001', 'delay', 2, 300000, '-', 0),
(202, 3, 'AHMAD', 'GA1002', 'GA111-AAS-AAS-0108-000000000002', 'delay', 3, 300000, '-', 0),
(203, 3, 'BUDI', 'GA1003', 'GA111-AAS-AAS-0108-000000000003', 'delay', 4, 300000, '-', 0),
(204, 3, 'WATI', 'GA1004', 'GA111-AAS-AAS-0108-000000000004', 'delay', 5, 300000, '-', 0),
(205, 3, 'SUNANDAR', 'GA1005', 'GA111-AAS-AAS-0108-000000000005', 'delay', 6, 300000, '-', 0),
(206, 3, 'LINA', 'GA1006', 'GA111-AAS-AAS-0108-000000000006', 'delay', 7, 300000, '-', 0),
(207, 3, 'AVRIL', 'GA1007', 'GA111-AAS-AAS-0108-000000000007', 'delay', 8, 300000, '-', 0),
(208, 3, 'MEI', 'GA1008', 'GA111-AAS-AAS-0108-000000000008', 'delay', 9, 300000, '-', 0),
(209, 3, 'MAMAT', 'GA1009', 'GA111-AAS-AAS-0108-000000000009', 'delay', 10, 300000, '-', 0),
(210, 3, 'MUMUN', 'GA1010', 'GA111-AAS-AAS-0108-000000000010', 'delay', 11, 300000, '-', 0),
(211, 3, 'NITA', 'GA1011', 'GA111-AAS-AAS-0108-000000000011', 'delay', 12, 300000, '-', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `aero_users`
--

INSERT INTO `aero_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `fullname`) VALUES
(1, 2130706433, 'garuda1', '71f58b5e29c5c8453512196e143563a9c9bca21f', NULL, 'garuda1@garuda.co.id', NULL, NULL, NULL, 1332080475, 1335434591, 1, 'garuda1'),
(2, 2130706433, 'garuda2', '82b20ffe4ae3566d40cfbe44c1177eb1a554202a', NULL, 'garuda2@garuda.co.id', NULL, NULL, NULL, 1332080518, 1332080518, 1, 'garuda2'),
(3, 2130706433, 'express1', '5bc918466879df1afb7c56d2905bd6033e210a04', NULL, 'express@mail.com', NULL, NULL, NULL, 1332080610, 1332080610, 1, 'express1'),
(4, 2130706433, 'express2', 'f0ecae1dc3729023ece6ef43875c1e946e5fb401', NULL, 'express@mail.com', NULL, NULL, NULL, 1332080610, 1332080610, 1, 'express2'),
(5, 2130706433, 'airasia1', '23e6834af5a5ebfe5ce29dcfad58651ba90be923', NULL, 'airasia1@mail.com', NULL, NULL, NULL, 1332080739, 1335417124, 1, 'airasia1'),
(6, 2130706433, 'airasia2', 'e4355d5da85867d238622c9cbfd20fdd53c35d58', NULL, 'airasia12@mail.com', NULL, NULL, NULL, 1332080739, 1332080739, 1, 'airasia2'),
(7, 2130706433, 'trans1', '559b3e5d90b4cb2c2a33f4ed1d4d088ed365713e', NULL, 'trans1@mail.com', NULL, NULL, NULL, 1332080783, 1332080783, 1, 'trans1'),
(8, 2130706433, 'trans2', 'fa328da94874045c88a3a503b8836a7ae07a9425', NULL, 'trans13@mail.com', NULL, NULL, NULL, 1332080783, 1332080783, 1, 'trans2'),
(9, 2130706433, 'sky1', '8fc6102745141548cfd82cc26f43eea6686bf509', NULL, 'sky1@gmail.com', NULL, NULL, NULL, 1332080847, 1332082759, 1, 'sky1'),
(10, 2130706433, 'sky2', '233a6537ee47ee81623f434a30a71e0b9cce04d4', NULL, 'sky2@gmail.com', NULL, NULL, NULL, 1332080847, 1332080847, 1, 'sky2'),
(11, 2130706433, 'ciu', '6db3f06984bb536509045e92442122ed03687e27', NULL, 'ciu@gmail.com', NULL, NULL, NULL, 1332080907, 1335415778, 1, 'ciu'),
(12, 2130706433, 'ciumember', '536a1ed45c7c47eb481e61119699522d8fc49ff5', NULL, 'ciu@gmail.com', NULL, NULL, NULL, 1332173896, 1333089732, 1, 'ciumember'),
(13, 2130706433, 'adminciu', '2cf60c998df86c05affb88b99011fbde90e0eea8', NULL, '', NULL, NULL, NULL, 1335416654, 1335417673, 1, 'Admin CIU');

-- --------------------------------------------------------

--
-- Table structure for table `aero_users_groups`
--

CREATE TABLE IF NOT EXISTS `aero_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `aero_users_groups`
--

INSERT INTO `aero_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 11, 2),
(13, 12, 3),
(14, 12, 3),
(15, 13, 3);

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
  `total_pax_reroute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_pax_transfer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_pax_cancelled` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` text COLLATE utf8_unicode_ci NOT NULL,
  `voucher_status` smallint(1) unsigned NOT NULL DEFAULT '0',
  `voucher_created_at` datetime NOT NULL,
  `voucher_verified` smallint(1) unsigned NOT NULL DEFAULT '0',
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_status` (`voucher_status`),
  KEY `flight_type` (`voucher_type`),
  KEY `airlines_id` (`airlines_id`),
  KEY `user_id` (`user_id`),
  KEY `voucher_verified` (`voucher_verified`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aero_vouchers`
--

INSERT INTO `aero_vouchers` (`id`, `user_id`, `airlines_id`, `voucher_type`, `flight_date`, `flight_number`, `departure_city`, `arrival_city`, `delay_reason`, `flight_std`, `flight_etd`, `total_pax_delay`, `total_pax_reroute`, `total_pax_transfer`, `total_pax_cancelled`, `attachment`, `voucher_status`, `voucher_created_at`, `voucher_verified`, `keterangan`) VALUES
(1, 5, 3, 'delay', '2012-04-26', 'QZ770', 'AAS', 'AMQ', '34', '00:00', '24:41', '100', '0', '0', '0', '', 2, '2012-04-26 12:50:05', 1, 'this is note'),
(2, 5, 3, 'delay', '2012-04-26', 'QZ222', 'AAS', 'AAS', '32', '00:00', '04:25', '100', '0', '0', '0', '', 0, '2012-04-26 16:38:57', 0, 'test'),
(3, 1, 1, 'delay', '2012-04-26', 'GA111', 'AAS', 'AAS', '08', '00:00', '14:51', '11', '0', '0', '0', '', 2, '2012-04-26 17:03:55', 1, 'TEST NOTE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
