-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2012 at 09:32 PM
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
('voucher_price_cancelled', '150000'),
('voucher_price_reroute', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `aero_delay_codes`
--

CREATE TABLE IF NOT EXISTS `aero_delay_codes` (
  `code` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aero_delay_codes`
--

INSERT INTO `aero_delay_codes` (`code`, `note`) VALUES
('00', ''),
('01', ''),
('02', ''),
('03', ''),
('04', ''),
('05', ''),
('06', 'No gate/stand availability due to own airline activity'),
('07', 'Aircraft connection by maintenance'),
('08', 'Aircraft connection by miscellaneous, traffic, marketing flight operations, ground handling, cabin services, etc.'),
('09', 'Scheduled ground time less than declared minimum ground time'),
('10', ''),
('11', 'Late check-in, acceptance of passengers after deadline'),
('12', 'Late Check-in, congestion in check-in area'),
('13', 'Check-in error'),
('14', 'Overbooking, booking errors'),
('15', 'Boarding, discrepancies and paging, missing checked-in passenger at gate'),
('16', 'Commercial Publicity, Passenger Convenience, VIP, Press, Ground meals and missing personal items'),
('17', 'Catering order, late or incorrect order given to supplier'),
('18', 'Baggage processing, sorting, etc.'),
('19', ''),
('20', ''),
('21', 'A Documentation, errors, etc.'),
('22', 'Late positioning'),
('23', 'Late acceptance'),
('24', 'Inadequate packing'),
('25', 'Overbooking, booking errors'),
('26', 'Late preparation in warehouse'),
('27', 'Mail Oversales, packing, etc.'),
('28', 'Mail Late positioning'),
('29', 'Mail Late acceptance'),
('30', ''),
('31', 'Aircraft documentation late or inaccurate, weight and balance (Loadsheet), general declaration, passenger manifest, etc.'),
('32', 'Loading, Unloading, bulky/special load, cabin load, lack of loading staff'),
('33', 'Loading Equipment, lack of or breakdown, e.g. container pallet loader, lack of staff'),
('34', 'Servicing Equipment, lack of or breakdown, lack of staff, e.g. steps'),
('35', 'Aircraft Cleaning'),
('36', 'Fuelling, Defuelling, fuel supplier'),
('37', 'Catering, late delivery or loading'),
('38', 'ULD, Containers, pallets, lack of or breakdown'),
('39', 'Technical equipment, lack of or breakdown, lack of staff, e.g. pushback'),
('40', ''),
('41', 'Aircraft defects'),
('42', 'Scheduled maintenance, late release'),
('43', 'Non-scheduled maintenance, special checks and / or additional works beyond normal maintenance'),
('44', 'Spares and maintenance equipment, lack of or breakdown'),
('45', 'AOG (Aircraft on ground for technical reasons) Spares, to be carried to another station'),
('46', 'Aircraft change for technical reasons'),
('47', 'Standby aircraft, lack of planned standby aircraft for technical reasons'),
('48', 'Scheduled cabin configuration and version adjustment'),
('49', ''),
('50', ''),
('51', 'Damage during flight operations, bird or lightning strike, turbulence, heavy or overweight landing'),
('52', 'Damage during ground operations, collisions (other than during taxiing, loading/offloading damage, contamination, towing, extreme weather conditions'),
('53', ''),
('54', ''),
('55', 'Departure Control System, Check-in, weight and balance (loadcontrol), computer system error, baggage sorting, gate-reader error or problems'),
('56', 'Cargo preparation/documentation system'),
('57', 'Flight plans'),
('58', 'Other computer systems'),
('59', ''),
('60', ''),
('61', 'Flight plan, late completion or change of flight documentation'),
('62', 'Operational requirements, fuel, load alteration'),
('63', 'Late crew boarding or departure procedures'),
('64', 'Flight deck crew shortage, Crew rest'),
('65', 'Flight deck crew special request or error'),
('66', 'Late cabin crew boarding or departure procedures'),
('67', 'Cabin crew shortage'),
('68', 'Cabin crew error or special request'),
('69', 'Captain request for security check, extraordinary'),
('70', ''),
('71', 'Departure station'),
('72', 'Destination station'),
('73', 'Enroute or Alternate'),
('74', ''),
('75', 'De-Icing of aircraft, removal of ice/snow, frost prevention'),
('76', 'Removal of snow/ice/water/sand from airport/runway'),
('77', 'Aircraft ground handling impaired by adverse weather conditions'),
('78', ''),
('79', ''),
('80', ''),
('81', 'ATC restriction en-route or capacity'),
('82', 'ATC restriction due to staff shortage or equipment failure en-route'),
('83', 'ATC restriction at destination'),
('84', 'ATC restriction due to weather at destination'),
('85', 'Mandatory security'),
('86', 'Immigration, Customs, Health'),
('87', 'Airport Facilities, parking stands, ramp congestion, buildings, gate limitations, ...'),
('88', 'Restrictions at airport of destination, airport/runway closed due obstruction, industrial action, staff shortage, political unrest, noise abatement, night curfew, special flights, ...'),
('89', 'Restrictions at airport of departure, airport/runway closed due obstruction, industrial action, staff shortage, political unrest, noise abatement, night curfew, special flights, start-up and pushback, ...'),
('90', ''),
('91', 'Passenger or Load Connection, awaiting load or passengers from another flight. Protection of stranded passengers onto a new flight.'),
('92', 'Through Check-in error, passenger and bagage'),
('93', 'Aircraft rotation'),
('94', 'Cabin crew rotation'),
('95', 'Crew rotation (entire or cockpit crew)'),
('96', 'Operations control, rerouting, diversion, consolidation, aircraft change for reasons other than technical'),
('97', 'Industrial action within own airline'),
('98', 'Industrial action outside own airline'),
('99', 'Miscellaneous, not elsewhere specified');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `aero_users`
--

INSERT INTO `aero_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`, `fullname`) VALUES
(1, 2130706433, 'garuda1', '71f58b5e29c5c8453512196e143563a9c9bca21f', NULL, 'garuda1@garuda.co.id', NULL, NULL, NULL, 1332080475, 1332081029, 1, NULL),
(2, 2130706433, 'garuda2', '82b20ffe4ae3566d40cfbe44c1177eb1a554202a', NULL, 'garuda2@garuda.co.id', NULL, NULL, NULL, 1332080518, 1332080518, 1, NULL),
(3, 2130706433, 'express1', '5bc918466879df1afb7c56d2905bd6033e210a04', NULL, 'express@mail.com', NULL, NULL, NULL, 1332080610, 1332080610, 1, NULL),
(4, 2130706433, 'express2', 'f0ecae1dc3729023ece6ef43875c1e946e5fb401', NULL, 'express@mail.com', NULL, NULL, NULL, 1332080610, 1332080610, 1, NULL),
(5, 2130706433, 'airasia1', '23e6834af5a5ebfe5ce29dcfad58651ba90be923', NULL, 'airasia1@mail.com', NULL, NULL, NULL, 1332080739, 1332080739, 1, NULL),
(6, 2130706433, 'airasia2', 'e4355d5da85867d238622c9cbfd20fdd53c35d58', NULL, 'airasia12@mail.com', NULL, NULL, NULL, 1332080739, 1332080739, 1, NULL),
(7, 2130706433, 'trans1', '559b3e5d90b4cb2c2a33f4ed1d4d088ed365713e', NULL, 'trans1@mail.com', NULL, NULL, NULL, 1332080783, 1332080783, 1, NULL),
(8, 2130706433, 'trans2', 'fa328da94874045c88a3a503b8836a7ae07a9425', NULL, 'trans13@mail.com', NULL, NULL, NULL, 1332080783, 1332080783, 1, NULL),
(9, 2130706433, 'sky1', '8fc6102745141548cfd82cc26f43eea6686bf509', NULL, 'sky1@gmail.com', NULL, NULL, NULL, 1332080847, 1332080847, 1, NULL),
(10, 2130706433, 'sky2', '233a6537ee47ee81623f434a30a71e0b9cce04d4', NULL, 'sky2@gmail.com', NULL, NULL, NULL, 1332080847, 1332080847, 1, NULL),
(11, 2130706433, 'ciu', '6db3f06984bb536509045e92442122ed03687e27', NULL, 'ciu@gmail.com', NULL, NULL, NULL, 1332080907, 1332080907, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aero_users_groups`
--

CREATE TABLE IF NOT EXISTS `aero_users_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

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
(12, 11, 2);

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
