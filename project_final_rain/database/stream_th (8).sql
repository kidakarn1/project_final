-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 11:42 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stream_th`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `ass_id` int(11) NOT NULL COMMENT 'รหัสการประเมิน',
  `eva_id` int(11) NOT NULL COMMENT 'FK รหัสหัวข้อการประเมิน',
  `ass_score_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัส คะแนน',
  `ass_comments` text COLLATE utf8_unicode_ci NOT NULL,
  `hos_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'FK รหัสโรงพยาบาล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`ass_id`, `eva_id`, `ass_score_id`, `ass_comments`, `hos_id`) VALUES
(1, 11, 'LE00020001', '', 'asd2'),
(1, 12, 'LE00020001', '', 'asd2'),
(1, 13, 'LE00020001', '', 'asd2'),
(1, 14, 'LE00020001', '', 'asd2'),
(1, 15, 'LE00020001', '', 'asd2'),
(1, 16, 'LE00020001', '', 'asd2'),
(1, 17, 'LE00020001', '', 'asd2'),
(1, 18, 'LE00020001', '', 'asd2'),
(1, 19, 'LE00020001', '', 'asd2'),
(1, 20, 'LE00020001', '', 'asd2'),
(2, 21, 'MO00030001', '', 'asd2'),
(2, 22, 'MO00030001', '', 'asd2'),
(2, 23, 'MO00030001', '', 'asd2'),
(2, 24, 'MO00030001', '', 'asd2'),
(2, 25, 'MO00030001', '', 'asd2'),
(2, 26, 'MO00030001', '', 'asd2'),
(2, 29, 'MO00030001', '', 'asd2'),
(2, 30, 'MO00030001', '', 'asd2'),
(2, 31, 'MO00030001', '', 'asd2'),
(2, 32, 'MO00030001', '', 'asd2'),
(3, 1, 'UE00020001', '', 'asd2'),
(3, 2, 'UE00020001', '', 'asd2'),
(3, 3, 'UE00020001', '', 'asd2'),
(3, 4, 'UE00020001', '', 'asd2'),
(3, 5, 'UE00020001', '', 'asd2'),
(3, 6, 'UE00020001', '', 'asd2'),
(3, 7, 'UE00020001', '', 'asd2'),
(3, 8, 'UE00020001', '', 'asd2'),
(3, 9, 'UE00020001', '', 'asd2'),
(3, 10, 'UE00020001', '', 'asd2'),
(4, 11, 'LE00020001', '', 'asd2'),
(4, 12, 'LE00020001', '', 'asd2'),
(4, 13, 'LE00020001', '', 'asd2'),
(4, 14, 'LE00020001', '', 'asd2'),
(4, 15, 'LE00020001', '', 'asd2'),
(4, 16, 'LE00020001', '', 'asd2'),
(4, 17, 'LE00020001', '', 'asd2'),
(4, 18, 'LE00020001', '', 'asd2'),
(4, 19, 'LE00020001', '', 'asd2'),
(4, 20, 'LE00010001', '', 'asd2'),
(5, 21, 'MO00030001', '', 'asd2'),
(5, 22, 'MO00030001', '', 'asd2'),
(5, 23, 'MO00030001', '', 'asd2'),
(5, 24, 'MO00030001', '', 'asd2'),
(5, 25, 'MO00030001', '', 'asd2'),
(5, 26, 'MO00030001', '', 'asd2'),
(5, 29, 'MO00030001', '', 'asd2'),
(5, 30, 'MO00030001', '', 'asd2'),
(5, 31, 'MO00030001', '', 'asd2'),
(5, 32, 'MO00010001', '', 'asd2'),
(6, 1, 'UE00020001', '', 'asd2'),
(6, 2, 'UE00020001', '', 'asd2'),
(6, 3, 'UE00020001', '', 'asd2'),
(6, 4, 'UE00020001', '', 'asd2'),
(6, 5, 'UE00020001', '', 'asd2'),
(6, 6, 'UE00020001', '', 'asd2'),
(6, 7, 'UE00020001', '', 'asd2'),
(6, 8, 'UE00020001', '', 'asd2'),
(6, 9, 'UE00020001', '', 'asd2'),
(6, 10, 'UE00010001', '', 'asd2');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_category`
--

CREATE TABLE `assessment_category` (
  `ass_cat_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสหมวดการประเมิน',
  `ass_cat_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหมวดการประเมิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment_category`
--

INSERT INTO `assessment_category` (`ass_cat_id`, `ass_cat_name`) VALUES
('LE', 'การเคลื่อนไหวขา'),
('MO', 'การเคลื่อนไหวพื้นฐาน'),
('UE', 'การเคลื่อนไหวแขน');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_score`
--

CREATE TABLE `assessment_score` (
  `ass_score_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสคะแนน 2 ตัวแรกประเภท ตัวที่6ข้อ ตัวสุดท้ายลำดับ ',
  `ass_score_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดคะแนน',
  `ass_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assessment_score`
--

INSERT INTO `assessment_score` (`ass_score_id`, `ass_score_description`, `ass_score`) VALUES
('LE00000001', 'ไม่สามารถทำการทดสอบการเคลื่อนไหวในช่วงการเคลื่อนไหวใดๆ (รวมถึงการเคลื่อนไหวเพียงแวบเดียวหรือเล็กน้อย)', 0),
('LE00010001', 'สามารถปฎิบัติได้เพียงบางส่วนของการเคลื่อนไหว และมีรูปแบบการเคลื่อนไหวผิดปกติ อย่างชัดเจน', 1),
('LE00010002', 'สามารถปฎิบัติได้เพียงบางส่วนของการเคลื่อนไหว แต่รูปแบบการเคลื่อนไหวเทียบได้กับด้านที่ไม่มีปัญหา', 1),
('LE00010003', 'สามารถปฎิบัติได้เพียงบางส่วนของการเคลื่อนไหว แต่รูปแบบการเคลื่อนไหวเทียบได้กับด้านที่ไม่มีปัญหา', 1),
('LE00020001', 'สามารถเคลื่อนไหวได้อยางสมบูรณ์ ่ โดยรูปแบบการเคลื่อนไหวเทียบได้กบด้านที่ไม ั ่มีปัญหา', 2),
('LE000X0001', 'กิจกรรมที่ไม่ได้ทดสอบ (ระบุเหตุผล: ช่วงการเคลื่อนไหว, อาการปวด, อื่น ๆ (ให้เหตุผล))', 0),
('MO00000001', 'ไม่สามารถทํากิจกรรมทดสอบในช่วงการเคลื่อนไหวใดๆ (เช่น มีส่วนร่วมได้น้อย)', 0),
('MO00010001', 'สามารถทํากิจกรรมได้เองเพียงบางส่วน (ต้องการความช่วยเหลือบางส่วน หรือต้องให้พยุงเพื่อทํา\r\nให้สําเร็จ)โดยให้หรือไม่ให้การช่วยเหลือและมีรูปแบบที่ผิดปกติชัดเจน', 1),
('MO00010002', 'สามารถทํากิจกรรมได้เองเพียงบางส่วน (ต้องการความช่วยเหลือบางส่วน หรือต้องพยุงเพื่อทําให้\r\nสําเร็จ) โดยให้หรือไม่ให้การช่วยเหลือ แต่มีรูปแบบการเคลื่อนไหวปกติ', 1),
('MO00010003', 'สามารถทํากิจกรรมได้ด้วยตัวเองจนสําเร็จโดยให้หรือไม่ให้การช่วยเหลือแต่มีรูปแบบการ\r\nเคลื่อนไหวที่ผิดปกติชัดเจน', 1),
('MO00020001', 'สามารถทํากิจกรรมได้ด้วยตัวเองจนสําเร็จ โดยมีรูปแบบการเคลื่อนไหวปกติแต่ต้องให้การ\r\nช่วยเหลือ', 2),
('MO00030001', 'สามารถทํากิจกรรมได้ด้วยตัวเองจนสําเร็จโดยมีรูปแบบการเคลื่อนไหวปกติและไม่ต้องให้การ\r\nช่วยเหลือ', 3),
('MO000X0001', 'กิจกรรมที่ไม่ได้ทดสอบ (ระบุเหตุผล: ช่วงการเคลื่อนไหว, อาการปวด, อื่น ๆ (ให้เหตุผล))', 0),
('UE00000001', 'ไม่สามารถทำการทดสอบการเคลื่อนไหวในช่วงการเคลื่อนไหวใดๆ (รวมถึงการเคลื่อนไหวเพียงแวบเดียวหรือเล็กน้อย)', 0),
('UE00010001', 'สามารถปฎิบัติได้เพียงบางส่วนของการเคลื่อนไหว และมีรูปแบบการเคลื่อนไหวผิดปกติ อย่างชัดเจน', 1),
('UE00010002', 'สามารถปฎิบัติได้เพียงบางส่วนของการเคลื่อนไหว แต่รูปแบบการเคลื่อนไหวเทียบได้กับด้านที่ไม่มีปัญหา', 1),
('UE00010003', 'สามารถเคลื่อนไหวได้อย่างสมบูรณ์ แต่มีรูปแบบการเคลื่อนไหวที่ผิดปกติอย่างชัดเจน', 1),
('UE00020001', 'สามารถเคลื่อนไหวได้อยางสมบูรณ์ ่ โดยรูปแบบการเคลื่อนไหวเทียบได้กบด้านที่ไม ั ่มีปัญหา', 2),
('UE000X0001', 'กิจกรรมที่ไม่ได้ทดสอบ (ระบุเหตุผล: ช่วงการเคลื่อนไหว, อาการปวด, อื่น ๆ (ให้เหตุผล))', 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `eva_id` int(11) NOT NULL COMMENT 'รหัสหัวข้อการประเมิน',
  `eva_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหัวข้อการประเมิน',
  `eva_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดของหัวข้อ',
  `eva_note` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเหตุ',
  `eva_times` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เวลาลง',
  `ass_cat_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`eva_id`, `eva_name`, `eva_description`, `eva_note`, `eva_times`, `ass_cat_id`) VALUES
(1, 'เคลื่อนสะบักออกในท่านอนหงาย', 'ยกไหล่ขึ้น ให้มือของคุณยื่นไปแตะเพดาน', 'นักกายภาพบำบัดจัดแขนของผู้ป่วยให้อยู่ในท่างอไหล่ 90 องศา และเหยียดข้อศอกออก', '0', 'UE'),
(2, 'เหยียดข้อศอกในท่านอนหงาย(เริ่มด้วยการงอข้อศอกให้เต็มที่) ', 'ยกมือของคุณขึ้นไปแตะเพดาน โดยเหยียดข้อศอกให้มากที่สุดเท่าที่จะทำได้', 'นักกายภาพบำบัดแขนของผู้ป่วยให้อยู่ในท่างอไหล่ 90 องศาในกรณีที่ทำร่วมกับการเหยียดไหล่และ / หรือการกางไหล่  = ผิดปกติชัดเจน (คะแนน 1a หรือ 1c)', '0', 'UE'),
(3, 'ยักไหล่', 'ยักไหล่ให้สูงที่สุดเท่าคุณจะทำได้', 'ยักไหล่ทั้งสองข้างพร้อมกัน', '0', 'UE'),
(4, 'ยกมือไปแตะด้านบนของศรีษะ', 'ยกมือของคุณมาแตะที่ด้านบนของศรีษะ', '', '0', 'UE'),
(5, 'วางมือบนกระดูกกระเบนเหน็บ', 'เอื้อมมือไปด้านหลัง และข้ามไปแตะอีกข้างให้ได้ไกลที่สุดเท่าที่คุณจะทำได้', '', '0', 'UE'),
(6, 'ยกแขนขึ้นเหนือศรีษะให้สูง', 'ยกมือขึ้นไปหาเพดานให้สูงที่สุดเท่าที่คุณจะทำได้', '', '0', 'UE'),
(7, 'หงายและคว่ำมือ(ข้อศอกงอ 90 องศา)', 'งอข้อศอกค้างไว้และวางแขนชิดลำตัว หมุนแขนเพื่อให้ฝ่ามือหงายขึ้น จากนั้นหมุนอีกทีเพื่อให้ฝ่ามือคว่ำลง', 'เคลื่อนไหวได้เพียงทิศทางเดียว = เคลื่อนไหวบางส่วน(คะแนน 1a หรือ 1) ', '0', 'UE'),
(8, 'กำมือจากท่าแบมือ', 'กำหมัด โดยให้นิ้วโป้งของคุณอยู่ด้านนอก', 'ต้องกระดกมือขึ้นเล็กน้อย (ตั้งข้อมือขึ้น) ถึงจะได้คะแนนเต็ม', '0', 'UE'),
(9, 'แบมือจากท่ากำมือ', 'แบมือออกให้หมด', '', '0', 'UE'),
(10, 'เอาโป้งมาแตะกับนิ้วชี้ (ปลายนิ้วชนปลายนิ้ว)', 'ใช้นิ้วโป้งและนิ้วชี้ทำเป็นรูปวงกลม', '', '0', 'UE'),
(11, 'งอสะโพกและเข่าในท่านอนหงาย(ท่านอนหงายชันเข่าขึ้น 2 ข้าง)', 'งอและสะโพกและเข่าของคุณ เพื่อให้ท้าววางราบบนเตียง', '', '0', 'LE'),
(12, 'งอสะโพกในท่านั่ง', 'ยกเข่าให้สูงที่สุดเท่าที่คุณจะทำได้', '', '0', 'LE'),
(13, 'เหยียดเข่าในท่านั่ง', 'เหยียดเข่าให้ตรงโดยยกเท้าขึ้น', '', '0', 'LE'),
(14, 'งอเข่าในท่านั่ง', 'เลื่อนเท้าของคุณไปด้านหลังให้ได้ไกลที่สุด', 'เริ่มจากการวางเท้าด้านที่มีปัญหาไปด้านหน้า(ส้นเท้าอยู่ในแนวเดียวกันกับปลายเท้าอีกข้าง)', '0', 'LE'),
(15, 'กระดกข้อเท้าในท่านั่ง', 'ให้ส้นเท้าอยู่ติดพื้นไว้ และยกปลายเท้าของคุณขึ้นจากพื้นให้สูงที่สุดเท่าที่คุณทำได้', '', '0', 'LE'),
(16, 'ถีบปลายเท้าในท่านั่ง', 'ให้ปลายเท้าอยู่ติดพื้น และยกส้นเท้าของคุณจากพื้นให้สูงที่สุดเท่าที่ทำได้', '', '0', 'LE'),
(17, 'เหยียดเข่าและกระดกข้อเท้าในท่านั่ง', 'เหยียดเข่าให้ตรง พร้อมกับกระดกปลายเท้าขึ้น', 'การเหยียดเข่าโดยไม่มีการกระดกข้อเท้า = เคลื่อนไหวบางส่วน (คะแนน 1a หรือ 1c)', '0', 'LE'),
(18, 'การงอสะโพกด้านที่มีปัญหาพร้อมเหยียดเข่า', 'การงอสะโพกด้านที่มีปัญหาพร้อมเหยียดเข่า', '', '0', 'LE'),
(19, 'งอเข่าด้านที่มีปัญหาพร้อมเหยียดสะโพก', 'ให้สะโพกตรง งอเข่าไปด้านหลัง และยกส้นเท้ามาทางก้น', '', '0', 'LE'),
(20, 'กระดกข้อเท้าที่มีปัญหาพร้อมเหยียดเข่า', 'ให้ส้นเท้าอยู่ติดกับพื้น และยกปลายเท้าขึ้นจากพื้นให้ได้สูงที่สุดเท่าที่จะทำได้', '', '0', 'LE'),
(21, 'ตะแคงไปด้านข้าง (เริ่มจากท่านอนหงาย)', 'ตะแคงไปด้านข้าง', 'อาจตะแคงไปด้านใดด้านหนึ่ง; ใช้แขนดึงเพื่อพลิกตัว = ให้การช่วยเหลือ (2 คะแนน)', '0', 'MO'),
(22, 'ยกสะโพกขึ้นจากเตียงในท่านอนหงายชันเข่าทั้ง 2 ข้าง (ท่าสะพาน) ', 'ยกสะโพกให้สูงที่สุดเท่าที่คุณจะทำได้', 'นักายภาพบำบัดต้องจับเท้าไว้แต่ในกรณีที่เข่าเหยียดออกอย่างแรง ขณะที่ทำท่าสะพาน = ผิดปกติชัดเจน (คะแนน 1a หรือ 1c); ในกรณีที่ต้องการ การช่วยเหลือ (ภายนอกหรือจากนักกายภาพบำบัด) เพื่อให้เข่าอยู่ในแถวกลาง ', '0', 'MO'),
(23, 'เปลี่ยนจากท่านอนหงายมาเป็นท่านั่ง (โดยให้เท้าวางบนพื้น)', 'ลุกขึ้นนั่งและวางเท้าลงพื้', 'อาจลุกขึ้นนั่งจากด้านใดด้านหนึ่ง โดยใช้วิธีการใดๆ และเป็นวิธีที่ปลอดภัย; ใช้เวลานานกว่า 20 วินาที = ผิดปกติชัดเจน (คะแนน 1a หรือ 1c); ดึงตัวเองขึ้นโดยใช้ราวเตียงหรือขอบเตียง = ให้การช่วยเหลือ (คะแนน 2', '0:20', 'MO'),
(24, 'ลุกขึ้นยืนจากท่านั่ง', 'ยืนขึ้น พยายามลงน้ำหนักบนขาทั้งสองข้างให้เท่ากัน', 'ใช้มือดันตัวขึ้นยืน = ให้การช่วยเหลือ (คะแนน 2);ไม่สมมาตร เช่น ลำตัวเอียงยืนลงน้ำหนักข้างใดข้างหนึ่ง สะโพกบิดไปด้านหลังหรืองอหรือเหยียดเข่าด้านที่มีปัญหามากไป = ผิดปกติชัดเจน (คะแนน 1a หรือ 1c)', '0', 'MO'),
(25, 'ยืนค้างไว้ให้นับถึง 20', 'ยืนอยู่นิ่ง ๆ ระหว่างที่นับถึง 20', '', '0:50', 'MO'),
(26, 'วางเท้าด้านที่มีปัญหาลงบันไดขั้นแรก (หรือเก้าอี้สูง 18 ซม.)', 'ยกเท้าขึ้น และวางบนบันไดขั้นแรก (หรือเก้าอี้) ที่อยู่ตรงหน้าคุณ', 'การเอาเท้ากลับลงบนพื้นจะไม่ประเมิน;ใช้ราวจับ = ให้การช่วยเหลือ (คะแนน 2)', '0', 'MO'),
(29, 'ก้าวถอยหลังไป 3 ก้าว (วงจรการเดิน 1 รอบครึ่ง)', 'ก้าวถอยหลังไป 3 ก้าว โดยวางเท้าข้างหนึ่งไว้หลังเท้าอีกข้าง', '', '0', 'MO'),
(30, 'ก้าวไปด้านข้างที่เป็นด้านที่มีปัญหา 3 ก้าว', 'ก้าวไปด้านที่อ่อนแรงของคุณ 3 ก้าว', '', '0', 'MO'),
(31, 'เดินภายในอาคาร 10 เมตร (บนทางเรียบ, ไม่มีสิ่งกีดขวาง)', 'เดินเป็นเส้นตรงไปที่ ...... (จุดที่กำหนดอยู่ห่างออกไป 10 เมตร', 'กายอุปกรณ์ = ให้การช่วยเหลือ (คะแนน 2); นานเกิน 20 วินาที = ผิดปกติชัดเจน (คะแนน 1c)', '0', 'MO'),
(32, 'เดินลงบันได 3 ขั้น โดยสลับเท้า', 'เดินลงบันได 3 ขั้น ถ้าคุณทำได้ ให้วางเท้าเพียง 1 ข้างบนแต่ละขั้นบันได', 'ราวจับ = ให้การช่วยเหลือ (คะแนน 2);ไม่สลับเท้า = ผิดปกติชัดเจน (คะแนน 1a หรือ 1c)', '0', 'MO');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hos_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสโรงพยาบาล',
  `hos_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อโรงพยาบาล',
  `hos_status` int(2) NOT NULL DEFAULT '1' COMMENT 'สถานะโรงพยาบาล 1 ใช้งานได้ 0ใช้งานไม่ได้',
  `host_cat_id` int(11) NOT NULL COMMENT 'FK รหัสหน่วยงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hos_id`, `hos_name`, `hos_status`, `host_cat_id`) VALUES
('A123456789', 'มศว', 1, 1),
('A25444', 'โรงพยบาล สงขลา', 1, 1),
('ADS56888', 'ศรีนครินวิโรต', 1, 2),
('asd2', 'ชลบุรี', 1, 2),
('B123456789', 'หาดใหญ่', 1, 2),
('qewqeq', 'สงขลา', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_category`
--

CREATE TABLE `hospital_category` (
  `host_cat_id` int(11) NOT NULL COMMENT 'รหัสหน่วยงานโรงพยาบาล',
  `host_cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหน่วยงาน เช่น เอกชน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hospital_category`
--

INSERT INTO `hospital_category` (`host_cat_id`, `host_cat_name`) VALUES
(1, 'สถานบันรัฐบาล'),
(2, 'สถานบันเอกชน');

-- --------------------------------------------------------

--
-- Table structure for table `main_assessment`
--

CREATE TABLE `main_assessment` (
  `main_ass_id` int(11) NOT NULL,
  `Assessment_time` int(11) NOT NULL COMMENT 'ครั้งการประเมิน',
  `ass_id` int(11) NOT NULL COMMENT 'FK assessment',
  `total_score` int(11) NOT NULL,
  `pat_id_card_number` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'FK หมายเลขบัตรผู้ป่วย',
  `id_card_number` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'FK รหัสผู้ประเมิน',
  `assessment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่ประเมิน',
  `ass_cat_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'MO' COMMENT 'FK ประเภท',
  `sumscore` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'คะแนนรวมแต่ละประเภท',
  `avg_mode` int(11) NOT NULL COMMENT 'ค่เฉลี่ยแต่ละประเภท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `main_assessment`
--

INSERT INTO `main_assessment` (`main_ass_id`, `Assessment_time`, `ass_id`, `total_score`, `pat_id_card_number`, `id_card_number`, `assessment_date`, `ass_cat_id`, `sumscore`, `avg_mode`) VALUES
(125, 1, 1, 33, '1209501100690', '1209501100690', '2019-07-29 14:34:43', 'LE', '20', 100),
(126, 1, 2, 67, '1209501100690', '1209501100690', '2019-07-29 14:35:40', 'MO', '30', 100),
(127, 1, 3, 100, '1209501100690', '1209501100690', '2019-07-29 14:36:11', 'UE', '20', 100),
(128, 2, 4, 32, '1209501100690', '1209501100690', '2019-07-29 14:38:35', 'LE', '19', 95),
(129, 2, 5, 63, '1209501100690', '1209501100690', '2019-07-29 14:39:01', 'MO', '28', 93),
(130, 2, 6, 94, '1209501100690', '1209501100690', '2019-07-29 14:39:17', 'UE', '19', 95);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `hn` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสประจำตัวผู้ป่วย',
  `title_id` int(11) NOT NULL COMMENT 'คำนำหน้าชื่อผู้ป่วย',
  `pat_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้ป่วย',
  `pat_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุลผู้ป่วย',
  `birthday` date NOT NULL COMMENT 'วันเกิด เพื่อทำเป็นอายุ',
  `weight` int(11) NOT NULL COMMENT 'น้ำหนัก',
  `height` int(11) NOT NULL COMMENT 'ส่วนสูง',
  `career` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อาชีพ',
  `rel_id` int(11) NOT NULL COMMENT 'FK รหัสสถานะความสัมพัน',
  `stroke_days` date NOT NULL COMMENT 'วันที่ป่วยโรคหลอดเลือดสมอง',
  `doctor_diagnosis` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'การวินิจฉัยของแพทย์',
  `physical_therapy_diagnosis` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'การวินิจฉัยทางกายภาพบำบัด',
  `important_symptoms_patients` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อาการสำคัญผู้ป่วย',
  `history_of_physical_therapy_treatment` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประวัติการรักษาทางกายภาพบำบัด ',
  `warning` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ข้อควรระวัง',
  `congenital_disease` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'โรคประจำตัว',
  `drug_allergy_history` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ประวัติการแพ้ยา',
  `hos_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสโรงพยาบาล',
  `id_card_number` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขบัตรประชาชน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`hn`, `title_id`, `pat_fname`, `pat_lname`, `birthday`, `weight`, `height`, `career`, `rel_id`, `stroke_days`, `doctor_diagnosis`, `physical_therapy_diagnosis`, `important_symptoms_patients`, `history_of_physical_therapy_treatment`, `warning`, `congenital_disease`, `drug_allergy_history`, `hos_id`, `id_card_number`) VALUES
('123456', 6, 'กิดาการ', 'อินทปัญญา', '2018-03-13', 50, 180, 'นักศึกษา', 2, '2019-07-08', 'วินิจฉัย', 'ทางบำบัด', 'อาการผู้ป่วย', 'ประวัติการรักษา', 'ข้อควรระวัง', 'โรคประจำตัว', 'แพ้ยานะจ๊ะ', 'asd2', '1209501100690'),
('test123456', 1, 'test123456', 'test123456', '2019-07-12', 50, 180, 'test123456', 1, '2019-07-19', 'test123456', 'test123456', 'test123456', '-', '-', '-', '-', 'A25444', '9258589385665');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id_card_number` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `per_username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `title_id` int(11) NOT NULL COMMENT 'รหัสคำนำหน้าชื่อ',
  `per_fname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `per_lname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `per_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `per_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `per_department` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หน่วยงาน',
  `cat_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id_card_number`, `per_username`, `per_password`, `title_id`, `per_fname`, `per_lname`, `per_email`, `per_phone`, `per_department`, `cat_id`) VALUES
('1199900610099', 'ford', '80ca06abfa1a5104af9a770f485dad07', 6, 'คริษฐา', 'ปาละนันทน์', 'ggeasynoob@gmail.com', '0927486210', 'KMUTNB', 'PT'),
('1200101740596', 'admin', '21232f297a57a5a743894a0e4a801fc3', 6, 'ปฐมพร', 'รุ่งเรืองฤทัย', 'rain-za@hotmail.com', '0950470205', 'KMUTNB', 'AM'),
('1209501100690', 'kidakarn', '773b42be9c4abb6431981fb932a28fae', 6, 'กิดาการ', 'อินทปัญญา', 'rain-za@hotmail.com', '0950470205', 'KMUTNB', 'PT'),
('157990778395', 'thawatchai', 'bb6030e9a5553c5433c6178e39c8d579', 6, 'ธวัชชัย', 'ฐานดี', 'thawatchai@gmail.com', '0955672506', 'KMUTNB', 'MG');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_category`
--

CREATE TABLE `personnel_category` (
  `cat_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสหน่วยงานพนักงาน',
  `cat_name_eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหน่วยงานพนักงานภาษาอังกฤษ',
  `cat_name_th` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อหน่วยงานพนักงานภาษาไทย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `personnel_category`
--

INSERT INTO `personnel_category` (`cat_id`, `cat_name_eng`, `cat_name_th`) VALUES
('AM', 'Admin ', 'ผู้ดูแลระบบ'),
('MG', 'head of department', 'หัวหน้าแผนก'),
('PT', 'physical therapist', 'นักกายภาพบำบัด');

-- --------------------------------------------------------

--
-- Table structure for table `relationship_status`
--

CREATE TABLE `relationship_status` (
  `rel_id` int(11) NOT NULL,
  `rel_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `relationship_status`
--

INSERT INTO `relationship_status` (`rel_id`, `rel_name`) VALUES
(1, 'โสด'),
(2, 'สมรส'),
(3, 'หม้าย'),
(4, 'หย่าล้าง');

-- --------------------------------------------------------

--
-- Table structure for table `title_name`
--

CREATE TABLE `title_name` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `title_name`
--

INSERT INTO `title_name` (`title_id`, `title_name`) VALUES
(1, 'ด.ช.'),
(2, 'ด.ญ.'),
(3, 'ดร.'),
(4, 'ผศ.ดร.'),
(5, 'คุณ'),
(6, 'นาย'),
(7, 'นางสาว'),
(8, 'นาง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`ass_id`,`eva_id`),
  ADD KEY `eva_id` (`eva_id`),
  ADD KEY `ass_score_id` (`ass_score_id`),
  ADD KEY `hos_id` (`hos_id`);

--
-- Indexes for table `assessment_category`
--
ALTER TABLE `assessment_category`
  ADD PRIMARY KEY (`ass_cat_id`);

--
-- Indexes for table `assessment_score`
--
ALTER TABLE `assessment_score`
  ADD PRIMARY KEY (`ass_score_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`eva_id`),
  ADD KEY `ass_cat_id` (`ass_cat_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hos_id`),
  ADD KEY `host_cat_id` (`host_cat_id`);

--
-- Indexes for table `hospital_category`
--
ALTER TABLE `hospital_category`
  ADD PRIMARY KEY (`host_cat_id`);

--
-- Indexes for table `main_assessment`
--
ALTER TABLE `main_assessment`
  ADD PRIMARY KEY (`main_ass_id`),
  ADD KEY `ass_id` (`ass_id`),
  ADD KEY `pat_id_card_number` (`pat_id_card_number`),
  ADD KEY `id_card_number` (`id_card_number`),
  ADD KEY `ass_cat_id` (`ass_cat_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_card_number`),
  ADD KEY `title_id` (`title_id`),
  ADD KEY `rel_id` (`rel_id`),
  ADD KEY `hos_id` (`hos_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id_card_number`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `title_id` (`title_id`);

--
-- Indexes for table `personnel_category`
--
ALTER TABLE `personnel_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `relationship_status`
--
ALTER TABLE `relationship_status`
  ADD PRIMARY KEY (`rel_id`);

--
-- Indexes for table `title_name`
--
ALTER TABLE `title_name`
  ADD PRIMARY KEY (`title_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `eva_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวข้อการประเมิน', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hospital_category`
--
ALTER TABLE `hospital_category`
  MODIFY `host_cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหน่วยงานโรงพยาบาล', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_assessment`
--
ALTER TABLE `main_assessment`
  MODIFY `main_ass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `relationship_status`
--
ALTER TABLE `relationship_status`
  MODIFY `rel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `title_name`
--
ALTER TABLE `title_name`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_10` FOREIGN KEY (`hos_id`) REFERENCES `hospital` (`hos_id`),
  ADD CONSTRAINT `assessment_ibfk_11` FOREIGN KEY (`ass_score_id`) REFERENCES `assessment_score` (`ass_score_id`),
  ADD CONSTRAINT `assessment_ibfk_12` FOREIGN KEY (`ass_id`) REFERENCES `main_assessment` (`ass_id`),
  ADD CONSTRAINT `assessment_ibfk_8` FOREIGN KEY (`eva_id`) REFERENCES `evaluation` (`eva_id`);

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`ass_cat_id`) REFERENCES `assessment_category` (`ass_cat_id`);

--
-- Constraints for table `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `hospital_ibfk_1` FOREIGN KEY (`host_cat_id`) REFERENCES `hospital_category` (`host_cat_id`);

--
-- Constraints for table `main_assessment`
--
ALTER TABLE `main_assessment`
  ADD CONSTRAINT `main_assessment_ibfk_2` FOREIGN KEY (`id_card_number`) REFERENCES `personnel` (`id_card_number`),
  ADD CONSTRAINT `main_assessment_ibfk_3` FOREIGN KEY (`pat_id_card_number`) REFERENCES `patient` (`id_card_number`),
  ADD CONSTRAINT `main_assessment_ibfk_4` FOREIGN KEY (`ass_cat_id`) REFERENCES `assessment_category` (`ass_cat_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`title_id`) REFERENCES `title_name` (`title_id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`rel_id`) REFERENCES `relationship_status` (`rel_id`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`hos_id`) REFERENCES `hospital` (`hos_id`);

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `personnel_category` (`cat_id`),
  ADD CONSTRAINT `personnel_ibfk_2` FOREIGN KEY (`title_id`) REFERENCES `title_name` (`title_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
