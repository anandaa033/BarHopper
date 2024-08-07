-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 01:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zbvfpszw_group_recommen`
--

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `drink_id` int(11) NOT NULL,
  `drink_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drink_id`, `drink_name`) VALUES
(5, 'เบียร์สด'),
(6, 'เบียร์คราฟ'),
(7, 'ค็อกเทล'),
(8, 'ม็อกเทล'),
(9, 'ไวน์'),
(10, 'เหล้า'),
(11, 'มิกซ์เซอร์'),
(12, 'น้ำหวาน/น้ำเปล่า'),
(13, 'เบียร์');

-- --------------------------------------------------------

--
-- Table structure for table `entdrink`
--

CREATE TABLE `entdrink` (
  `entDrink_id` int(11) NOT NULL,
  `drink_id` int(11) NOT NULL,
  `Ent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `Ent_id` int(11) NOT NULL,
  `ent_name` varchar(30) NOT NULL,
  `ent_address` text NOT NULL,
  `ent_locationX` float NOT NULL,
  `ent_locationY` float NOT NULL,
  `ent_timeOpen` time NOT NULL,
  `ent_timeClose` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `ent_monday` int(11) NOT NULL,
  `ent_tuesday` int(11) NOT NULL,
  `ent_wednesday` int(11) NOT NULL,
  `ent_thursday` int(11) NOT NULL,
  `ent_friday` int(11) NOT NULL,
  `ent_saturday` int(11) NOT NULL,
  `ent_sunday` int(11) NOT NULL,
  `ent_description` varchar(200) NOT NULL,
  `inter` int(11) DEFAULT NULL,
  `pop` int(11) DEFAULT NULL,
  `acoustic` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `jazz` int(11) DEFAULT NULL,
  `rock` int(11) DEFAULT NULL,
  `rap` int(11) DEFAULT NULL,
  `EDM` int(11) DEFAULT NULL,
  `folk` int(11) DEFAULT NULL,
  `live_music` int(11) DEFAULT NULL,
  `dj` int(11) DEFAULT NULL,
  `indie` int(11) DEFAULT NULL,
  `pub` int(11) DEFAULT NULL,
  `bar` int(11) DEFAULT NULL,
  `indoor` int(11) DEFAULT NULL,
  `outdoor` int(11) DEFAULT NULL,
  `cocktail_bar` int(11) DEFAULT NULL,
  `restaurant` int(11) DEFAULT NULL,
  `vintage` int(11) DEFAULT NULL,
  `minimal` int(11) DEFAULT NULL,
  `modern` int(11) DEFAULT NULL,
  `camp` int(11) DEFAULT NULL,
  `thai_ban` int(11) DEFAULT NULL,
  `luk_thung` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `entertainment`
--

INSERT INTO `entertainment` (`Ent_id`, `ent_name`, `ent_address`, `ent_locationX`, `ent_locationY`, `ent_timeOpen`, `ent_timeClose`, `user_id`, `ent_monday`, `ent_tuesday`, `ent_wednesday`, `ent_thursday`, `ent_friday`, `ent_saturday`, `ent_sunday`, `ent_description`, `inter`, `pop`, `acoustic`, `country`, `jazz`, `rock`, `rap`, `EDM`, `folk`, `live_music`, `dj`, `indie`, `pub`, `bar`, `indoor`, `outdoor`, `cocktail_bar`, `restaurant`, `vintage`, `minimal`, `modern`, `camp`, `thai_ban`, `luk_thung`) VALUES
(101, 'นักตั้งวง', '203 61 Am Phur Rd, Tambon Bang Kung, Mueang Surat Thani District, Surat Thani 84000', 9.14735, 99.3365, '18:30:00', '00:00:00', 43, 1, 1, 1, 1, 1, 1, 1, 'บรรยากาศอบอุ่น ราคาสบายกระเป๋า', 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0),
(102, 'สราญ\'รมณ์', '233/218 ซอย อำเภอ มะขามเตี้ย Mueang Surat Thani District, Surat Thani 84000', 9.14457, 99.3376, '16:30:00', '00:00:00', 43, 1, 1, 1, 1, 1, 1, 1, 'เพียงท่านมาก่อนสามทุ่มราคายาวๆทั้งคืนเลยจ้า', 0, 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1),
(103, 'KIN Cafe&craft ', '4/7 หมู่ที่ 2 ตำบลบางใบไม้ อำเภอเมือง จังหวัดสุราษฏร์ธานี เทศบาลนครสุราษฎร์ธานี 84000', 9.13929, 99.315, '10:00:00', '22:00:00', 49, 0, 1, 1, 1, 1, 1, 1, 'กลางวันเป็นคาเฟ่ กลางคืนเป็นนั่งชิลด์ ฟังเพลงสบายๆ \r\nเครื่องดื่มเย็นๆ? มี 2 โซนให้เลือก ริมน้ำบรรยากาศริมแม่น้ำตาปี ชมวิวไฟสะพานศรีตาปี หรือห้องแอร์เย็นๆสบายๆ เราก็พร้อมบริการ ', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0),
(104, 'The Grounds Contemporary ', '3/135-136 ถ.ท่าชนะ ต.ตลาด อ.เมือง จ.สุราษฎร์ธานี Surat Thani Thailand', 9.13653, 99.3273, '18:00:00', '00:00:00', 49, 1, 0, 1, 1, 1, 1, 1, 'Wednesday•Wine•Woman\r\nEvery Wednesday 50% for the second one', 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0),
(105, '69 my station', '39Q9+MGX Unnamed Road Mueang Surat Thani District, Surat Thani 84100', 9.08931, 99.3688, '18:00:00', '01:00:00', 50, 1, 1, 1, 1, 1, 1, 1, 'เหล่าคนรักปาร์ตี้ มารวมตัวกันที่ 69 My Station', 0, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0),
(106, 'Bloom URT', '84000, Mueang Surat Thani District, Surat Thani', 9.14076, 99.3296, '18:00:00', '00:00:00', 50, 1, 1, 1, 1, 1, 1, 1, 'บลูมยูอาร์ทีที่ที่คนหน้าตาดีเค้าเที่ยวกัน', 1, 1, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(107, 'ROAD BEAR', '39V9+MW8 Unnamed Rd Mueang Surat Thani District, Surat Thani 84000', 9.09433, 99.3699, '18:00:00', '00:00:00', 50, 1, 1, 1, 1, 1, 1, 1, 'มากินข้าวจิบเบียร์เบาๆ ลานโล่งตรงโค้งบ้านหมีกัน', 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 1, 0, 0, 1, 0, 0),
(108, 'ชมจันทร์ วาไรตี้', '79, 172 ถนน โลลกรัฐ Bang Kung, Mueang Surat Thani District, Surat Thani 84000', 9.14361, 99.3521, '19:00:00', '01:00:00', 51, 1, 1, 1, 1, 1, 1, 1, 'ครบทุกรส จบที่ชมจันทร์ มันส์แน่นอน', 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1),
(109, 'โต๊ะแดง Red table', '39H8+P4G, Makham Tia, Mueang Surat Thani District, Surat Thani 84100', 9.07937, 99.3653, '18:00:00', '00:00:00', 51, 1, 1, 1, 1, 1, 1, 1, 'นั้งที่ดี คือมานั้งชิวร้านเราครับ ', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(110, 'น่าซอย Na_soy ', '523 ถนนชนเกษม, Surat Thani, Thailand, Surat Thani', 9.13694, 99.3311, '18:00:00', '01:00:00', 51, 1, 1, 1, 1, 1, 1, 1, '', 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(111, 'เพลิน', 'Am Pher Rd ตำบลบางกุ้ง อำเภอเมืองสุราษฎร์ธานี สุราษฎร์ธานี 84000', 9.13976, 99.3409, '17:00:00', '01:00:00', 52, 1, 1, 1, 1, 1, 1, 1, '', 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(112, 'Sound About', 'ศรีเกษม, Surat Thani, Thailand, Surat Thani', 9.12495, 99.3444, '19:30:00', '00:00:00', 52, 1, 1, 1, 1, 1, 1, 1, 'ร้านชิลล์ แห่งใหม่ ของสุราษฎร์ธานี  ที่มีการตกแต่งร้านธีม “ท้องฟ้าสีชมปูวว์ววว”', 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 1, 0, 0, 0),
(113, 'The Botanist House ', '102/5 หมู่6 ซอยเสม็ดเรียง22 ถนนเลี่ยงเมือง เทศบาลนครสุราษฎร์ธานี 84000', 9.11625, 99.3449, '15:00:00', '00:00:00', 53, 1, 1, 1, 1, 1, 1, 1, 'พร้อม! บ้านนักพฤกษศาสตร์ เปิดทุกวัน 03.00 น.- 00.00 น.', 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0),
(114, 'Ther เทอ', 'ศรีเกษม, Surat Thani, Thailand, Surat Thani', 9.12012, 99.3182, '17:00:00', '00:00:00', 53, 1, 1, 1, 1, 1, 1, 1, '', 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0),
(115, 'DAY & NIGHT', '83/25 Liang Mueang Rd, Surat, Thailand, Surat Thani', 9.10885, 99.3286, '11:00:00', '00:00:00', 53, 1, 1, 1, 1, 1, 1, 1, 'DAY & NIGHT Cafe • Bar • Restaurant ', 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 1, 1, 1, 0, 1, 0, 0, 0),
(116, 'Time23', '83/34 หมู่ 3 ถนน เลี่ยงเมือง ตำบล มะขามเตี้ย อำเภอ เมือง เทศบาลนครสุราษฎร์ธานี 84000', 9.10287, 99.3209, '11:00:00', '00:00:00', 53, 1, 1, 1, 1, 1, 1, 1, 'มาฮีลใจและร่างกาย ไปกับความอร่อยของอาหารและค็อกเทลตัวเด็ดของทางร้าน  พร้อมเสียงดนตรีชิล ๆ กันดีกว่า', 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 0, 0),
(117, 'ดีกรี บาร์ I Degree Bar ', '81/23 ม.1 ถ.โฉลกรัฐ, Surat Thani, Thailand, Surat Thani', 9.14949, 99.3486, '18:30:00', '00:00:00', 54, 1, 1, 1, 1, 1, 1, 1, '', 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(118, ' TIM By กงซี้ ', 'ถนนท่าชนะ, Surat Thani, Thailand, Surat Thani', 9.09419, 99.3566, '19:00:00', '01:00:00', 54, 1, 1, 1, 1, 1, 1, 1, '', 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0),
(119, 'Time Machine ', '548/1 ถ.หน้าเมือง ต.มะขามเตี้ย อ.เมือง, Surat Thani, Thailand, Surat Thani', 9.1591, 99.3255, '17:00:00', '00:00:00', 54, 1, 1, 1, 1, 1, 1, 1, '', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(120, 'Kanuthouse ', '24, 22 ซอย 1, ต.ตลาด, อ.เมือง, สุราษฎร์ธานี 84000', 9.14088, 99.3285, '11:00:00', '22:00:00', 55, 1, 1, 0, 1, 1, 1, 1, 'Coffee , food , drinks , cocktail , beer : 11.00 - 22.00น. ร้านปิดทุกวันพุธ ', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0),
(121, 'Not Teen Anymore ', '168/18 Ban Don Rd., Talat, Muang Surat Thani, Surat Thani, Thailand, Surat Thani', 9.14813, 99.3279, '17:00:00', '00:00:00', 55, 1, 1, 1, 1, 1, 1, 1, 'รสชาติของความรักอะหรอ ไม่อร่อยเท่าเบียร์หรอก...', 0, 1, 1, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0),
(122, 'Fergie ', ' ตลาด, 168/8, อำเภอเมืองสุราษฎร์ธานี 84000', 9.14351, 99.3228, '16:00:00', '00:00:00', 55, 1, 1, 1, 1, 1, 1, 1, '', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(123, ' ชม Chom ', '132 ถ.ตลาดใหม่ , Surat Thani, Thailand, Surat Thani', 9.13926, 99.3108, '18:00:00', '00:00:00', 55, 1, 1, 1, 1, 1, 1, 1, 'สนุกทุกค่ำคืน ที่นี่ที่เดียว“ชมบาร์”', 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
(124, 'Ma Chill ', 'ชนเกษม 28, มะขามเตี้ย, สุราษฎร์ธานี 84000, ประเทศไทย, Surat Thani, Thailand, Surat Thani', 9.09419, 99.3566, '18:00:00', '00:00:00', 56, 1, 1, 1, 1, 1, 1, 1, 'ดนตรีสดทุกวันเวลา 20:00 - 22:30 น. แนวเพลง 90 / ตลาด  ถ่ายทอดสดฟุตบอลบอล พรีเมียร์ลีก ลิขสิทธิ์แท้ ', 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(125, 'Signature', 'ถนนศรีเกษม ตำบลมะขามเตี้ย, Surat Thani, Thailand, Surat Thani', 9.13149, 99.3262, '17:00:00', '00:00:00', 56, 1, 1, 1, 1, 1, 1, 1, 'นั่งตรงไหน ก็สนุกได้ เพราะที่นี่ Signature', 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0),
(128, 'Ananda', '138/3 ม.1 ต.มะเร็ต อ.เกาะสมุย จ.สุราษฎร์ธานี', 9.0842, 99.3229, '23:26:00', '12:26:00', 43, 1, 1, 0, 0, 1, 0, 0, 'ร้านนั่งชิวสไตล์มินิมอล ราคาเบาๆบนด่านฟ้าตึก', 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `entimg`
--

CREATE TABLE `entimg` (
  `entImg_id` int(11) NOT NULL,
  `entImg_path` text NOT NULL,
  `ent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `entimg`
--

INSERT INTO `entimg` (`entImg_id`, `entImg_path`, `ent_id`) VALUES
(10, '6227748620240115_0525000.jpg', 107),
(11, '6227748620240115_0525001.jpg', 107),
(12, '6227748620240115_0525002.jpg', 107),
(51, '193030206820240215_1224400.jpg', 109),
(52, '65216641820240215_1234350.jpg', 110),
(53, '65216641820240215_1234351.jpg', 110),
(54, '25995838620240215_0436070.jpg', 111),
(55, '36633807920240215_0446430.jpg', 112),
(56, '36633807920240215_0446431.jpg', 112),
(57, '26788856220240216_0501510.jpg', 113),
(58, '26788856220240216_0501511.jpg', 113),
(59, '26788856220240216_0501512.jpg', 113),
(60, '105829896920240216_0635180.jpg', 115),
(61, '105829896920240216_0635181.jpg', 115),
(62, '105829896920240216_0635182.jpg', 115),
(63, '66148977920240216_0643290.jpg', 116),
(64, '66148977920240216_0643291.jpg', 116),
(65, '66148977920240216_0643292.jpg', 116),
(66, '77347627520240216_0702200.jpg', 117),
(67, '77347627520240216_0702201.jpg', 117),
(68, '45043209520240216_0722010.jpg', 118),
(69, '45043209520240216_0722011.jpg', 118),
(70, '45043209520240216_0722012.jpg', 118),
(71, '90669421820240216_0825190.jpg', 119),
(72, '90669421820240216_0825191.jpg', 119),
(73, '90669421820240216_0825192.jpg', 119),
(74, '173529573620240216_0843200.jpg', 120),
(75, '173529573620240216_0843201.jpg', 120),
(76, '173529573620240216_0843202.jpg', 120),
(77, '153199435420240216_0853280.jpg', 121),
(78, '153199435420240216_0853281.jpg', 121),
(79, '153199435420240216_0853282.jpg', 121),
(80, '12336856720240216_0900430.jpg', 122),
(81, '141696187320240216_0909380.jpg', 123),
(82, '141696187320240216_0909381.jpg', 123),
(83, '141696187320240216_0909382.jpg', 123),
(84, '166174851020240216_0922480.jpg', 124),
(85, '166174851020240216_0922481.jpg', 124),
(86, '166174851020240216_0922482.jpg', 124),
(87, '55264333620240216_0931160.jpg', 125),
(88, '55264333620240216_0931161.jpg', 125),
(89, '55264333620240216_0931162.jpg', 125),
(90, '429639811_2702515980056143_1650203822093957181_n.jpg', 101),
(91, '429769325_437637728618003_5299490636738267161_n.jpg', 101),
(92, '431230275_379389664844367_8705213489704078785_n.jpg', 101),
(93, '429624198_1071445907450347_8385571196689351436_n.jpg', 102),
(94, '431042904_1400421647346417_1277491983205328080_n.jpg', 102),
(95, '429865218_744186121145947_4126827876175461030_n.jpg', 102),
(96, '429809297_425210633291154_3157992724378354649_n.jpg', 103),
(97, '431145106_932356524777616_5552587426995604661_n.jpg', 103),
(98, '429839451_831378715461614_1187263813593523716_n.jpg', 103),
(99, '429839302_1102364877649869_6396333756472562031_n.jpg', 104),
(100, '429814932_974373824053109_189675771154608149_n.jpg', 104),
(101, '431165021_7592665280751642_2538943686062479592_n.jpg', 104),
(102, '429897651_416304904224739_6220481544253373050_n.jpg', 105),
(103, '429345062_1039587023774430_6939252881141959033_n.jpg', 105),
(104, '431042119_384616260873901_6529414784505884857_n.jpg', 105),
(105, '429800428_394164333363738_1595035342698209837_n.jpg', 106),
(106, '429772655_396878126372351_8841990892517231985_n.jpg', 106),
(107, '429801458_947037673782356_6049653403547893740_n.jpg', 106),
(108, '429833755_809344837684025_3528490752025845626_n.jpg', 108),
(109, '429787490_3713000362280259_8718825596606661523_n.jpg', 108),
(110, '429917356_749903863528708_7862421589538781228_n.jpg', 108),
(111, '43211611620240307_0527050.jpg', 128);

-- --------------------------------------------------------

--
-- Table structure for table `entmusic`
--

CREATE TABLE `entmusic` (
  `entMusic_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `Ent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `entmusic`
--

INSERT INTO `entmusic` (`entMusic_id`, `music_id`, `Ent_id`) VALUES
(226, 2, 83),
(227, 3, 83),
(228, 5, 83),
(229, 9, 83),
(230, 10, 83),
(231, 12, 83),
(375, 1, 84),
(376, 2, 84),
(377, 3, 84),
(378, 5, 84),
(379, 9, 84),
(380, 10, 84),
(381, 12, 84);

-- --------------------------------------------------------

--
-- Table structure for table `entstyle`
--

CREATE TABLE `entstyle` (
  `entStyle_id` int(11) NOT NULL,
  `style_id` int(11) NOT NULL,
  `Ent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `entstyle`
--

INSERT INTO `entstyle` (`entStyle_id`, `style_id`, `Ent_id`) VALUES
(4, 2, 83),
(5, 4, 83),
(6, 5, 83),
(50, 2, 84),
(51, 3, 84);

-- --------------------------------------------------------

--
-- Table structure for table `enttype`
--

CREATE TABLE `enttype` (
  `entType_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `Ent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `enttype`
--

INSERT INTO `enttype` (`entType_id`, `type_id`, `Ent_id`) VALUES
(1, 2, 83),
(2, 4, 83),
(3, 5, 83),
(45, 2, 84),
(46, 3, 84);

-- --------------------------------------------------------

--
-- Table structure for table `groupmember`
--

CREATE TABLE `groupmember` (
  `groupmember_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groupmember`
--

INSERT INTO `groupmember` (`groupmember_id`, `group_id`, `user_id`) VALUES
(108, 37, 44),
(109, 37, 44),
(162, 54, 44),
(167, 54, 45),
(168, 54, 45),
(171, 54, 45),
(172, 54, 45),
(175, 55, 44),
(178, 55, 45),
(179, 55, 45);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `user_id`) VALUES
(37, 'ปาร์ตี้กันเถอะ', 42),
(54, 'ถือศีล กินเบียร์', 44),
(55, 'ตั้งตี้', 44);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `music_id` int(11) NOT NULL,
  `music_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_id`, `music_name`) VALUES
(1, 'สากล'),
(2, 'POP'),
(3, 'อคูสติก'),
(4, 'เพื่อชีวิต'),
(5, 'แจ๊ส'),
(6, 'ร็อค'),
(7, 'แร็พ'),
(8, 'EDM'),
(9, 'โฟล์คซอง'),
(10, 'ดนตรีสด'),
(11, 'เปิดเพลง'),
(12, 'อินดี้');

-- --------------------------------------------------------

--
-- Table structure for table `post_rating`
--

CREATE TABLE `post_rating` (
  `rating_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Ent_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post_rating`
--

INSERT INTO `post_rating` (`rating_id`, `userid`, `Ent_id`, `rating`, `survey_id`) VALUES
(109, 44, 103, 2, 12),
(110, 44, 101, 5, 12),
(111, 44, 102, 3, 12),
(112, 45, 101, 2, 12),
(113, 45, 102, 5, 12),
(114, 45, 103, 2, 12),
(115, 44, 101, 3, 14),
(116, 44, 102, 5, 14),
(117, 44, 103, 5, 14),
(118, 42, 101, 4, 15),
(119, 42, 102, 3, 15),
(120, 42, 103, 5, 15),
(121, 44, 101, 4, 15),
(122, 44, 102, 2, 15),
(123, 44, 103, 2, 15),
(124, 42, 101, 3, 16),
(125, 42, 102, 5, 16),
(126, 42, 103, 2, 16),
(127, 44, 101, 5, 16),
(128, 44, 103, 4, 16),
(129, 44, 101, 4, 17),
(130, 44, 102, 3, 17),
(131, 44, 103, 3, 17),
(132, 45, 101, 1, 17),
(133, 45, 102, 3, 17),
(134, 45, 103, 5, 17),
(135, 44, 101, 4, 18),
(136, 44, 102, 3, 18),
(137, 44, 103, 2, 18),
(138, 44, 101, 4, 20),
(139, 44, 102, 4, 20),
(140, 44, 103, 3, 20),
(141, 44, 101, 4, 21),
(142, 44, 102, 3, 21),
(143, 44, 103, 3, 21),
(144, 44, 101, 5, 22),
(145, 44, 102, 3, 22),
(146, 44, 103, 3, 22),
(147, 42, 101, 1, 18),
(148, 42, 102, 5, 18),
(149, 42, 103, 2, 18),
(150, 42, 101, 1, 22),
(151, 42, 102, 5, 22),
(152, 42, 103, 3, 22),
(153, 42, 101, 3, 24),
(154, 42, 102, 3, 24),
(155, 42, 103, 5, 24),
(156, 44, 101, 5, 24),
(157, 44, 102, 1, 24),
(158, 44, 103, 1, 24),
(159, 44, 101, 4, 25),
(160, 44, 102, 3, 25),
(161, 44, 103, 5, 25),
(162, 42, 101, 5, 25),
(163, 42, 102, 1, 25),
(164, 42, 103, 1, 25),
(165, 44, 101, 4, 26),
(166, 44, 102, 2, 26),
(167, 44, 103, 3, 26),
(168, 45, 101, 3, 26),
(169, 45, 102, 3, 26),
(170, 45, 103, 5, 26),
(171, 44, 101, 5, 27),
(172, 44, 102, 4, 27),
(173, 44, 103, 4, 27),
(174, 44, 101, 4, 28),
(175, 44, 102, 4, 28),
(176, 44, 103, 4, 28),
(177, 44, 101, 4, 29),
(178, 44, 123, 3, 29),
(179, 44, 102, 3, 29),
(180, 42, 102, 5, 28),
(181, 42, 105, 3, 28),
(182, 42, 107, 3, 28),
(183, 45, 102, 3, 28),
(184, 45, 105, 5, 28),
(185, 45, 107, 4, 28),
(186, 44, 107, 5, 30),
(187, 44, 101, 3, 30),
(188, 44, 103, 3, 30),
(189, 42, 107, 3, 30),
(190, 42, 101, 5, 30),
(191, 42, 103, 2, 30),
(192, 45, 107, 2, 30),
(193, 45, 101, 2, 30),
(194, 45, 103, 5, 30),
(195, 44, 102, 5, 31),
(196, 44, 105, 3, 31),
(197, 44, 107, 3, 31),
(198, 42, 102, 1, 31),
(199, 42, 105, 5, 31),
(200, 42, 107, 4, 31),
(201, 44, 107, 3, 33),
(202, 44, 101, 5, 33),
(203, 44, 103, 3, 33),
(204, 42, 107, 4, 33),
(205, 42, 101, 3, 33),
(206, 42, 103, 3, 33),
(207, 44, 105, 4, 35),
(208, 44, 106, 3, 35),
(209, 44, 108, 3, 35),
(210, 42, 105, 4, 35),
(211, 42, 106, 4, 35),
(212, 42, 108, 5, 35),
(213, 44, 104, 4, 37),
(214, 44, 123, 3, 37),
(215, 44, 125, 3, 37),
(216, 42, 104, 2, 37),
(217, 42, 123, 5, 37),
(218, 42, 125, 3, 37),
(219, 44, 105, 4, 39),
(220, 44, 106, 3, 39),
(221, 44, 123, 2, 39),
(222, 44, 107, 4, 40),
(223, 44, 102, 3, 40),
(224, 44, 113, 3, 40),
(225, 44, 107, 1, 41),
(226, 44, 123, 4, 41),
(227, 44, 125, 3, 41),
(228, 44, 123, 3, 42),
(229, 44, 102, 3, 42),
(230, 44, 103, 4, 42),
(231, 44, 103, 4, 43),
(232, 44, 108, 3, 43),
(233, 44, 123, 3, 43),
(234, 44, 107, 5, 44),
(235, 44, 101, 4, 44),
(236, 44, 103, 4, 44),
(237, 44, 104, 4, 45),
(238, 44, 103, 3, 45),
(239, 44, 115, 4, 45),
(240, 44, 105, 4, 46),
(241, 44, 102, 5, 46),
(242, 44, 103, 4, 46),
(243, 44, 104, 4, 47),
(244, 44, 105, 3, 47),
(245, 44, 106, 3, 47),
(246, 44, 101, 5, 50),
(247, 44, 102, 5, 50),
(248, 44, 103, 4, 50),
(249, 45, 101, 4, 50),
(250, 45, 102, 4, 50),
(251, 45, 103, 4, 50),
(252, 44, 103, 4, 51),
(253, 44, 123, 4, 51),
(254, 44, 101, 4, 51),
(255, 44, 107, 5, 53),
(256, 44, 101, 4, 53),
(257, 44, 109, 4, 53),
(258, 44, 103, 5, 54),
(259, 44, 107, 3, 54),
(260, 44, 113, 4, 54),
(261, 44, 102, 5, 56),
(262, 44, 105, 4, 56),
(263, 44, 112, 4, 56);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `rank_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `Ent_id` tinyint(4) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rank_id`, `score`, `Ent_id`, `survey_id`) VALUES
(19, 0.75, 101, 29),
(20, 0.535714, 123, 29),
(21, 0.5, 102, 29),
(22, 0.484848, 102, 28),
(23, 0.484848, 105, 28),
(24, 0.484848, 107, 28),
(25, 0.526316, 107, 30),
(26, 0.447368, 101, 30),
(27, 0.447368, 103, 30),
(28, 0.535714, 123, 29),
(29, 0.5, 102, 29),
(30, 0.5, 107, 29),
(31, 0.571429, 102, 31),
(32, 0.571429, 105, 31),
(33, 0.571429, 107, 31),
(34, 0.5, 123, 31),
(35, 0.444444, 102, 31),
(36, 0.444444, 105, 31),
(37, 0.6, 107, 33),
(38, 0.533333, 101, 33),
(39, 0.5, 103, 33),
(40, 0.6, 107, 33),
(41, 0.533333, 101, 33),
(42, 0.5, 103, 33),
(43, 0.777778, 108, 34),
(44, 0.666667, 105, 34),
(45, 0.666667, 123, 34),
(46, 0.608696, 105, 35),
(47, 0.565217, 106, 35),
(48, 0.521739, 108, 35),
(49, 0.5, 104, 36),
(50, 0.5, 113, 36),
(51, 0.5, 115, 36),
(52, 0.473684, 104, 37),
(53, 0.473684, 123, 37),
(54, 0.473684, 125, 37),
(55, 0.470588, 102, 38),
(56, 0.470588, 105, 38),
(57, 0.470588, 107, 38),
(58, 0.625, 105, 39),
(59, 0.5, 106, 39),
(60, 0.5, 123, 39),
(61, 0.636364, 107, 40),
(62, 0.545455, 102, 40),
(63, 0.545455, 113, 40),
(64, 0.454545, 107, 41),
(65, 0.454545, 123, 41),
(66, 0.454545, 125, 41),
(67, 0.583333, 123, 42),
(68, 0.5, 102, 42),
(69, 0.5, 103, 42),
(70, 0.444444, 103, 43),
(71, 0.444444, 108, 43),
(72, 0.444444, 123, 43),
(73, 0.666667, 107, 44),
(74, 0.533333, 101, 44),
(75, 0.533333, 103, 44),
(76, 0.666667, 104, 45),
(77, 0.555556, 103, 45),
(78, 0.555556, 115, 45),
(79, 0.416667, 105, 46),
(80, 0.333333, 102, 46),
(81, 0.333333, 103, 46),
(82, 0.625, 104, 47),
(83, 0.625, 105, 47),
(84, 0.625, 106, 47),
(85, 0.4375, 101, 50),
(86, 0.4375, 102, 50),
(87, 0.4375, 103, 50),
(88, 0.538462, 103, 51),
(89, 0.538462, 123, 51),
(90, 0.461538, 101, 51),
(91, 0.571429, 107, 53),
(92, 0.428571, 101, 53),
(93, 0.428571, 109, 53),
(94, 0.583333, 103, 54),
(95, 0.5, 107, 54),
(96, 0.5, 113, 54),
(97, 0.8, 104, 55),
(98, 0.8, 127, 55),
(99, 0.6, 102, 55),
(100, 0.6, 102, 56),
(101, 0.6, 105, 56),
(102, 0.5, 112, 56);

-- --------------------------------------------------------

--
-- Table structure for table `style`
--

CREATE TABLE `style` (
  `style_id` int(11) NOT NULL,
  `style_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `style`
--

INSERT INTO `style` (`style_id`, `style_name`) VALUES
(1, 'วินเทจ'),
(2, 'มินิมอล'),
(3, 'โมเดิร์น'),
(4, 'แคมป์'),
(5, 'ไทบ้าน'),
(6, 'ลูกทุ่ง');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `group_id`, `user_id`) VALUES
(9, 37, 42),
(15, 37, 42),
(16, 37, 42),
(18, 37, 42),
(24, 37, 42),
(39, 55, 44),
(40, 55, 44),
(41, 55, 44),
(42, 55, 44),
(43, 55, 44),
(44, 55, 44),
(45, 55, 44),
(46, 55, 44),
(47, 55, 44),
(48, 55, 44),
(49, 55, 44),
(50, 55, 44),
(51, 55, 44),
(53, 55, 44),
(54, 55, 44),
(55, 55, 44),
(56, 55, 44);

-- --------------------------------------------------------

--
-- Table structure for table `survey_item`
--

CREATE TABLE `survey_item` (
  `survey_item_id` int(11) NOT NULL,
  `survey_id` tinyint(4) NOT NULL,
  `inter` int(11) NOT NULL,
  `pop` int(11) NOT NULL,
  `acoustic` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `jazz` int(11) NOT NULL,
  `rock` int(11) NOT NULL,
  `rap` int(11) NOT NULL,
  `EDM` int(11) NOT NULL,
  `folk` int(11) NOT NULL,
  `live_music` int(11) NOT NULL,
  `dj` int(11) NOT NULL,
  `indie` int(11) NOT NULL,
  `pub` int(11) NOT NULL,
  `bar` int(11) NOT NULL,
  `indoor` int(11) NOT NULL,
  `outdoor` int(11) NOT NULL,
  `cocktail_bar` int(11) NOT NULL,
  `restaurant` int(11) NOT NULL,
  `vintage` int(11) NOT NULL,
  `minimal` int(11) NOT NULL,
  `modern` int(11) NOT NULL,
  `camp` int(11) NOT NULL,
  `thai_ban` int(11) NOT NULL,
  `luk_thung` int(11) NOT NULL,
  `user_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_item`
--

INSERT INTO `survey_item` (`survey_item_id`, `survey_id`, `inter`, `pop`, `acoustic`, `country`, `jazz`, `rock`, `rap`, `EDM`, `folk`, `live_music`, `dj`, `indie`, `pub`, `bar`, `indoor`, `outdoor`, `cocktail_bar`, `restaurant`, `vintage`, `minimal`, `modern`, `camp`, `thai_ban`, `luk_thung`, `user_id`) VALUES
(10, 9, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 0, 44),
(11, 9, 1, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 42),
(12, 10, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 45),
(13, 10, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 44),
(14, 11, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 44),
(15, 11, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 45),
(16, 11, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 42),
(21, 12, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 45),
(22, 12, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 1, 44),
(23, 14, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 44),
(24, 15, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 0, 42),
(25, 15, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 44),
(26, 16, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 42),
(27, 16, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 44),
(28, 17, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 44),
(29, 17, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 45),
(30, 17, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 42),
(31, 18, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 42),
(32, 18, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 44),
(33, 19, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 44),
(34, 20, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 44),
(35, 20, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 45),
(36, 21, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 44),
(37, 22, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 44),
(38, 22, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 42),
(39, 24, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 42),
(40, 24, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 44),
(41, 25, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 44),
(42, 25, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 42),
(43, 26, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 44),
(44, 26, 1, 1, 1, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 45),
(45, 27, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 44),
(46, 28, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 44),
(47, 29, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 44),
(48, 29, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 42),
(49, 28, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 42),
(50, 28, 0, 1, 0, 1, 0, 1, 0, 0, 1, 1, 1, 1, 1, 0, 1, 0, 0, 1, 1, 0, 1, 1, 1, 0, 45),
(51, 30, 1, 0, 1, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 44),
(52, 30, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 42),
(53, 30, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 1, 45),
(54, 31, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 44),
(55, 31, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 1, 42),
(56, 32, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 0, 44),
(57, 33, 1, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 0, 1, 0, 1, 44),
(58, 33, 1, 1, 1, 0, 1, 0, 0, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 42),
(59, 34, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 0, 44),
(60, 35, 0, 0, 0, 1, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 44),
(61, 35, 1, 0, 0, 0, 1, 1, 1, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 1, 1, 1, 1, 0, 0, 0, 42),
(62, 36, 1, 0, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 0, 1, 0, 44),
(63, 37, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 44),
(64, 37, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 1, 1, 42),
(65, 38, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 44),
(66, 39, 0, 0, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 44),
(67, 39, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 42),
(68, 40, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 44),
(69, 41, 1, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 0, 0, 44),
(70, 42, 1, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 44),
(71, 43, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 44),
(72, 44, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 44),
(73, 45, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 44),
(74, 46, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, 44),
(75, 47, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 44),
(76, 48, 1, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1, 0, 1, 0, 0, 44),
(77, 49, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, 0, 44),
(78, 50, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 0, 1, 44),
(79, 50, 1, 0, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 1, 1, 0, 1, 0, 45),
(80, 50, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 1, 1, 1, 0, 0, 0, 42),
(81, 51, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 44),
(82, 53, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 44),
(83, 54, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 0, 1, 1, 0, 44),
(84, 55, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0, 44),
(85, 56, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 1, 0, 44);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`) VALUES
(1, 'ผับ'),
(2, 'บาร์'),
(3, 'indoor'),
(4, 'outdoor'),
(5, 'cocktail bar'),
(6, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `usertype_id` tinyint(4) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `usertype_id`, `user_email`, `user_password`) VALUES
(42, 'Lisa Manobal', 2, 'lisa@gmail.com', '$2y$10$DfJpnoZ0nu3vXYeAeIeZy.6RquVWWtbHqNps7PSlWQnnyXZWtIgMS'),
(43, 'Pharwinee Wichitsak', 1, 'pharwi@gmail.com', '$2y$10$Ckb5K54Pcq2aha0U4wjo4.D/1IjdtGvy.6rriGhC8Q71Y1owqGlji'),
(44, 'Ananda Junlavanno', 2, 'anandafinal.1200@gmail.com', '$2y$10$2y.BffxKAtgty.DK.ry7meMk4fSM1zft0HE8E0fZOvhBwETw4uYZC'),
(45, 'David Jones', 2, 'david@gmail.com', '$2y$10$K5MWHYQNbfKPGVdLvuxNOO3iBzxTH0CwYVmrh0uZx/g.SoEGY4JaC'),
(47, 'siwipa', 1, 'siwipa@gmail.com', '$2y$10$Vo5EzZissp1w8M8EPKVANOPuT.wU6F9c9wuaXUOF2yq0ySINGQ/g2'),
(49, 'Json', 1, 'json@gmail.com', '$2y$10$jhGmUl0LFdRMWnE6YusY6uOCjbieuutMFlw3G/EaK6OtQEHTozv3G'),
(50, 'test', 1, 'testtest@gmail.com', '$2y$10$h1zWzSAb8iqs30WzwPK.0.xhJfuj0a.EUYnNunFVhB6wlSxvAJ1C2'),
(51, 'Aphatsara', 1, 'aphatsara@gmail.com', '$2y$10$QSTGTHByEnn3K4IAxgJl1.nMT.6MipFBN5RvqWRJGZmo.bWHnH62e'),
(52, 'Saranya Manee', 1, 'saranya@email.com', '$2y$10$NhEf9DnStMxQmNUJJyDTWOSCNpPuBJzw5zj1v7MfrPCX7NB8nQo3i'),
(53, 'Hitari', 1, 'hitari@gmail.com', '$2y$10$NWhaSyvYkdHksIjIJx.6z.DIqmWYUIrlirpkkkfJ7/BMNgoMkr.M.'),
(54, 'Teera', 1, 'Teera2000@gmail.com', '$2y$10$D0PpntQ1Hb18dDzYRrrkBeNZVKJ8KOH2obfiwMjF11GDZHIbWP/ky'),
(55, 'kanut', 1, 'kanut@gmail.com', '$2y$10$/9Zl6DV.HspRXHSEwAyZKuaVgrCo6PzPqIRrKEKQ1A/bf9onVTMxS'),
(56, 'Visky Doona', 1, 'visky@hotmail.com', '$2y$10$J6CKTgvJHG.iDzm3kw02NOg3/qSriosPahmmm9uOtF41AKtlp.J8O'),
(57, 'nanda', 2, 'nanda@gmail.com', '$2y$10$BnXuoVpuwp49P50WFyLAXOiGLkQssA6sWGiF7.UZN2ez0izCpJACW');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertype_id` tinyint(4) NOT NULL,
  `usertype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertype_id`, `usertype_name`) VALUES
(1, 'เจ้าของร้าน'),
(2, 'ผู้ใช้ทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `top_rank` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drink_id`);

--
-- Indexes for table `entdrink`
--
ALTER TABLE `entdrink`
  ADD PRIMARY KEY (`entDrink_id`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`Ent_id`);

--
-- Indexes for table `entimg`
--
ALTER TABLE `entimg`
  ADD PRIMARY KEY (`entImg_id`);

--
-- Indexes for table `entmusic`
--
ALTER TABLE `entmusic`
  ADD PRIMARY KEY (`entMusic_id`);

--
-- Indexes for table `entstyle`
--
ALTER TABLE `entstyle`
  ADD PRIMARY KEY (`entStyle_id`);

--
-- Indexes for table `enttype`
--
ALTER TABLE `enttype`
  ADD PRIMARY KEY (`entType_id`);

--
-- Indexes for table `groupmember`
--
ALTER TABLE `groupmember`
  ADD PRIMARY KEY (`groupmember_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`music_id`);

--
-- Indexes for table `post_rating`
--
ALTER TABLE `post_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`rank_id`),
  ADD KEY `group_id` (`survey_id`);

--
-- Indexes for table `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `survey_item`
--
ALTER TABLE `survey_item`
  ADD PRIMARY KEY (`survey_item_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UserName` (`user_name`),
  ADD KEY `usertype_id` (`usertype_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `drink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `entdrink`
--
ALTER TABLE `entdrink`
  MODIFY `entDrink_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=768;

--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `Ent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `entimg`
--
ALTER TABLE `entimg`
  MODIFY `entImg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `entmusic`
--
ALTER TABLE `entmusic`
  MODIFY `entMusic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=586;

--
-- AUTO_INCREMENT for table `entstyle`
--
ALTER TABLE `entstyle`
  MODIFY `entStyle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `enttype`
--
ALTER TABLE `enttype`
  MODIFY `entType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `groupmember`
--
ALTER TABLE `groupmember`
  MODIFY `groupmember_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `music_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `post_rating`
--
ALTER TABLE `post_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `rank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `style`
--
ALTER TABLE `style`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `survey_item`
--
ALTER TABLE `survey_item`
  MODIFY `survey_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertype_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
