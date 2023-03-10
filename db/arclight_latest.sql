-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 07:18 AM
-- Server version: 5.7.36
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arclight`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

DROP TABLE IF EXISTS `advertisement`;
CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advertisement_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advertisement_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_cover` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `album_cover`, `created_at`, `updated_at`, `created_by`, `updated_by`, `active`) VALUES
(1, 'Our Clients', '3914bcf1449a7f072a5c5199fb9c635e.png', 1671443010, NULL, 1, NULL, 1),
(2, 'Home Banner', '576ba1e3e7c67d00e5fa753ca1b5d6b5.jpg', 1672470275, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `desc_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `title_slug`, `subtitle`, `short_desc`, `description`, `desc_img`, `language`, `language_parent`, `created_by`, `updated_by`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', NULL, 'Expert 2-3 years', NULL, 'Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.', NULL, 1, NULL, 1, NULL, 1672467142, NULL, 1),
(2, 'Nisi magni odit consequatur autem nulla dolorem', NULL, 'Expert 2-3 years', NULL, 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.', NULL, 1, NULL, 1, NULL, 1672467164, NULL, 1),
(3, 'Nisi magni odit consequatur autem nulla dolorem', NULL, 'Expert 2-3 years', NULL, 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.', NULL, 1, NULL, 1, NULL, 1672467187, NULL, 1),
(4, 'Nisi magni odit consequatur autem nulla dolorem', NULL, 'Expert 2-3 years', NULL, 'Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.', NULL, 1, NULL, 1, NULL, 1672467208, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bio`
--

DROP TABLE IF EXISTS `bio`;
CREATE TABLE IF NOT EXISTS `bio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `desc_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_is` enum('A','I') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'A - Author, I - Illustrator',
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `brand_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

DROP TABLE IF EXISTS `candidate`;
CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `current_loc` varchar(255) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `email` varchar(155) DEFAULT NULL,
  `phonecode` varchar(10) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `notice_period` int(11) DEFAULT NULL,
  `join_now` enum('YES','NO') DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `career_id` int(11) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `job_role` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `resume` varchar(155) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

DROP TABLE IF EXISTS `career`;
CREATE TABLE IF NOT EXISTS `career` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `desc_img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `title`, `short_desc`, `description`, `desc_img`, `language`, `language_parent`, `created_at`, `updated_at`, `created_by`, `updated_by`, `active`) VALUES
(1, 'Drawing & design', NULL, 'Arclight artistic designers unlock the complexity in design and best possible design solution prior to kick off.', 'ce23c3b4fb8fcde44c52e156ef1d2354.jpg', 1, NULL, 1672462622, NULL, 1, NULL, 1),
(2, 'Approvals', NULL, 'Arclight extended knowledge in authority approvals made our project quick accessibility for mobilisation', '1f5aa65e77f548bf346b164f242e0e77.jpg', 1, NULL, 1672462638, NULL, 1, NULL, 1),
(3, 'Civil', NULL, 'Arclight mastery in assigned tasks builds sensational output that hold our business partners within us.', 'b8afa74f375f6c09934648a83084d577.jpg', 1, NULL, 1672462656, NULL, 1, NULL, 1),
(4, 'MEP', NULL, 'Arclight technicians can resolve any complex project into smooth execution of the project.', 'd330f4055cc29ae1515ef15add05a096.jpg', 1, NULL, 1672462673, NULL, 1, NULL, 1),
(5, 'Flooring', NULL, 'Arclight professional installers deliver appropriate flooring solutions and knowledge about standard safety guidelines.', 'ae217d92af4b793c51ee4452fe9ce467.jpg', 1, NULL, 1672462699, NULL, 1, NULL, 1),
(6, 'HVAC', NULL, 'Arclight HVAC professionals have highly technical skills and respond to emergency calls promptly.', 'afe3d3f26dd2a2a8d431c4c369d2aab5.jpg', 1, NULL, 1672462726, NULL, 1, NULL, 1),
(7, 'Joinery', NULL, 'Arclight, the ivory part of our interior team, stands with an equipped factory along with knowledgeable, skilled and unskilled staff.', '62497088cf3a6d4e573449bf52ecac96.jpg', 1, NULL, 1672462745, NULL, 1, NULL, 1),
(8, 'Painting', NULL, 'Arclight finishing touch support by an artisan team which makes normal walls into Italian finishes.', '608b6648ae757d04994a4cdd9326fdd1.jpg', 1, NULL, 1672462765, NULL, 1, NULL, 1),
(9, 'Graphics & Printing', NULL, 'Arclight graphic artists are exceptional creative and innovative designs in quick changing trendy markets.', 'bb705b8ac7936b9c46836270d7e7ecd5.jpg', 1, NULL, 1672462787, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `company_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_hour` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_iframe` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `full_name`, `address`, `email`, `phone`, `fax`, `work_hour`, `map`, `location_iframe`, `language`, `language_parent`, `created_by`, `updated_by`, `created_at`, `updated_at`, `active`) VALUES
(1, NULL, 'Office #1403, Regal Tower\r\nBusiness Bay, P.O Box 90158\r\nDubai, UAE', 'Info@arcligthinteriors.com', '04 250 6230\r\n050 638 95 65', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3610.4865908928005!2d55.25835551417471!3d25.186807938304565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69b4df276c75%3A0x9dc2da4dd1a0a797!2sThe%20Regal%20Tower!5e0!3m2!1sen!2sin!4v1667446956583!5m2!1sen!2sin', '', 1, 0, 1, 1, 1612591767, 1672643137, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'China', 'CHN', 156, 86),
(45, 'CX', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'Congo', 'COG', 178, 242),
(50, 'CD', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'France', 'FRA', 250, 33),
(74, 'GF', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'India', 'IND', 356, 91),
(100, 'ID', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'Niger', 'NER', 562, 227),
(156, 'NG', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'Peru', 'PER', 604, 51),
(169, 'PH', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'Poland', 'POL', 616, 48),
(172, 'PT', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'United States', 'USA', 840, 1),
(227, 'UM', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
CREATE TABLE IF NOT EXISTS `distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` enum('I','V','O','L') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'I-Image,V-Video,O-Other,L-Link',
  `file_for` enum('A','O') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'A-Album,O-Other',
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `parent_id`, `file`, `file_type`, `file_for`, `language`, `language_parent`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active`) VALUES
(1, 1, '92bce2b1fcdd6239aef44b4164efa75e.png', 'I', 'A', 1, NULL, 1671443010, 1, NULL, NULL, 1),
(2, 1, '326ebdb4ca2ad828930ee3045e416f8b.png', 'I', 'A', 1, NULL, 1671443083, 1, NULL, NULL, 1),
(3, 1, '4b91a6ed38c72be3ebe0232f86688288.png', 'I', 'A', 1, NULL, 1671443090, 1, NULL, NULL, 1),
(4, 1, '9315e261c1fa9e1d307c1b6efb34cb8c.png', 'I', 'A', 1, NULL, 1671443096, 1, NULL, NULL, 1),
(5, 1, '2f24fe78aed125b531842ecea9a30166.png', 'I', 'A', 1, NULL, 1671443102, 1, NULL, NULL, 1),
(6, 1, 'db2149d6c78e917d3374990c1e0a067a.png', 'I', 'A', 1, NULL, 1671443111, 1, NULL, NULL, 1),
(7, 1, '48f1b5d99b9547bfb168b770a13d0e91.png', 'I', 'A', 1, NULL, 1671443118, 1, NULL, NULL, 1),
(8, 1, '3914bcf1449a7f072a5c5199fb9c635e.png', 'I', 'A', 1, NULL, 1671443130, 1, NULL, NULL, 1),
(9, 2, '9442aa572051454ebf8cf9ea06a2e7b3.jpg', 'I', 'A', 1, NULL, 1672470276, 1, NULL, NULL, 1),
(10, 2, '61c89a64fb1fca81063198fa460ee9bc.jpg', 'I', 'A', 1, NULL, 1672470289, 1, NULL, NULL, 1),
(11, 2, '8bbbd0aa10d011530ce5caf2a6e413b8.jpg', 'I', 'A', 1, NULL, 1672470342, 1, NULL, NULL, 1),
(12, 2, 'f8e367d3162ee2cb6243d134490a7885.jpg', 'I', 'A', 1, NULL, 1672470354, 1, NULL, NULL, 1),
(13, 2, 'bbab92bddc6da01e4f5f02f759ea0a4f.jpg', 'I', 'A', 1, NULL, 1672470368, 1, NULL, NULL, 1),
(14, 2, '35b6945f97f0e188b777baabdb5a15b0.jpg', 'I', 'A', 1, NULL, 1672470378, 1, NULL, NULL, 1),
(15, 2, '576ba1e3e7c67d00e5fa753ca1b5d6b5.jpg', 'I', 'A', 1, NULL, 1672470388, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `files_description`
--

DROP TABLE IF EXISTS `files_description`;
CREATE TABLE IF NOT EXISTS `files_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files_description`
--

INSERT INTO `files_description` (`id`, `file_id`, `title`, `subtitle`, `short_desc`, `description`, `link`, `button_name`, `language`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active`) VALUES
(1, 1, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443010, 1, NULL, NULL, 1),
(2, 2, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443083, 1, NULL, NULL, 1),
(3, 3, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443090, 1, NULL, NULL, 1),
(4, 4, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443096, 1, NULL, NULL, 1),
(5, 5, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443102, 1, NULL, NULL, 1),
(6, 6, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443111, 1, NULL, NULL, 1),
(7, 7, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443118, 1, NULL, NULL, 1),
(8, 8, '', NULL, NULL, NULL, NULL, NULL, 1, 1671443130, 1, NULL, NULL, 1),
(9, 9, 'ARCLIGHT OFFICE', NULL, NULL, '', NULL, NULL, 1, 1672470276, 1, 1672471764, 1, 1),
(10, 10, 'Arclight Industrial', NULL, NULL, '', NULL, NULL, 1, 1672470289, 1, 1672471749, 1, 1),
(11, 11, 'Arclight Healthcare', NULL, NULL, '', NULL, NULL, 1, 1672470342, 1, 1672471777, 1, 1),
(12, 12, 'Arclight Hospitality', NULL, NULL, '', NULL, NULL, 1, 1672470354, 1, 1672471793, 1, 1),
(13, 13, 'Arclight F&B', NULL, NULL, '', NULL, NULL, 1, 1672470368, 1, 1672471806, 1, 1),
(14, 14, 'Arclight Retail', NULL, NULL, '', NULL, NULL, 1, 1672470378, 1, 1672471819, 1, 1),
(15, 15, 'Arclight Educational', NULL, NULL, '', NULL, NULL, 1, 1672470388, 1, 1672471835, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Admin'),
(2, 'customer', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `groups_permissions`
--

DROP TABLE IF EXISTS `groups_permissions`;
CREATE TABLE IF NOT EXISTS `groups_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `perm_id` int(11) DEFAULT NULL,
  `value` tinyint(4) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roleID_2` (`group_id`,`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

DROP TABLE IF EXISTS `label`;
CREATE TABLE IF NOT EXISTS `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `label_order` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` enum('ltr','rtl') COLLATE utf8mb4_unicode_ci DEFAULT 'ltr',
  `for_site` tinyint(4) DEFAULT NULL,
  `for_news` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `code`, `flag`, `direction`, `for_site`, `for_news`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active`) VALUES
(1, 'English', 'en', '8672daf9225991775a05767d34dafce1.png', 'ltr', 1, 1, 1, 1594977047, 1, 1611988290, 1, 1),
(2, 'Arabic', 'ar', '8a90ae033e99f92592a3e8104ce3f027.png', 'rtl', 1, 0, 0, 1594977047, 1, 1617787778, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_content`
--

DROP TABLE IF EXISTS `mail_content`;
CREATE TABLE IF NOT EXISTS `mail_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` enum('H','L') COLLATE utf8mb4_unicode_ci DEFAULT 'L' COMMENT 'H - High, L - Low',
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_sample`
--

DROP TABLE IF EXISTS `mail_sample`;
CREATE TABLE IF NOT EXISTS `mail_sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `logo` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_send`
--

DROP TABLE IF EXISTS `mail_send`;
CREATE TABLE IF NOT EXISTS `mail_send` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_send_count` int(11) DEFAULT '0',
  `mail_status` enum('S','F','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'P - Processing, S - Success, F - Failed',
  `processed_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `title`, `title_slug`, `description`, `language`, `language_parent`, `menu_order`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active`) VALUES
(1, 0, 'Home', NULL, NULL, 1, NULL, 1, 1671441921, 1, NULL, NULL, 1),
(2, 0, 'About Us', NULL, NULL, 1, NULL, 2, 1671449144, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsroom` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_cover` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` int(11) DEFAULT NULL,
  `seo_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_keywords` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('D','P') COLLATE utf8mb4_unicode_ci DEFAULT 'D' COMMENT 'D - Drafted, P - Publishd',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_code`, `newsroom`, `parent_id`, `title`, `title_slug`, `subtitle`, `short_desc`, `description`, `link`, `location`, `contact`, `news_cover`, `published_at`, `seo_title`, `seo_meta_keywords`, `seo_meta_description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `language`, `active`) VALUES
(1, 'P2391', 1, NULL, 'App', 'app', '', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1672672542, NULL, 1, NULL, 1, 1),
(2, 'P23342', 2, NULL, 'Books', 'books', '', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1672672627, NULL, 1, NULL, 1, 1),
(3, 'P23103', 3, NULL, 'Branding', 'branding', '', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1672672676, NULL, 1, NULL, 1, 1),
(4, 'P23564', 4, NULL, 'Product', 'product', '', NULL, '', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1672672722, NULL, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsroom`
--

DROP TABLE IF EXISTS `newsroom`;
CREATE TABLE IF NOT EXISTS `newsroom` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` enum('N','M','PV') COLLATE utf8mb4_unicode_ci DEFAULT 'N' COMMENT 'N - News, M - Multimedia, PV - Press Video',
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsroom`
--

INSERT INTO `newsroom` (`id`, `type`, `active`) VALUES
(1, 'N', 1),
(2, 'N', 1),
(3, 'N', 1),
(4, 'N', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_files`
--

DROP TABLE IF EXISTS `news_files`;
CREATE TABLE IF NOT EXISTS `news_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsroom` int(11) DEFAULT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_for` enum('FI','MI','NT','NV','O') COLLATE utf8mb4_unicode_ci DEFAULT 'O' COMMENT 'FI - Featured Image, MI - Multimedia Image, NT - News Thumbnail , NV - News Video, O - Other',
  `file_type` enum('I','V','L','O') COLLATE utf8mb4_unicode_ci DEFAULT 'O' COMMENT 'I - Image, V - Video, L - Link, O - Other',
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_files`
--

INSERT INTO `news_files` (`id`, `newsroom`, `file`, `file_for`, `file_type`, `created_at`, `created_by`, `active`) VALUES
(1, 1, 'e2e75ad274859e5976db2e8174ff0cd6.jpg', 'FI', 'I', 1672672542, 1, 1),
(2, 1, 'a04161efc96166fb9282f708cf7224d3.jpg', 'FI', 'I', 1672672542, 1, 1),
(3, 1, 'b10fd52f991beb72b195a8341833f3ea.jpg', 'FI', 'I', 1672672542, 1, 1),
(4, 2, 'c053626622eed838a6ae3ad9977f3e35.jpg', 'FI', 'I', 1672672628, 1, 1),
(5, 2, '077d919036a13debca0a9e06a123631f.jpg', 'FI', 'I', 1672672628, 1, 1),
(6, 2, '97a22c0368ec0bc631dc6b4adb99168d.jpg', 'FI', 'I', 1672672628, 1, 1),
(7, 3, 'ade2140b1d586df888d57e7bd2cd43f6.jpg', 'FI', 'I', 1672672676, 1, 1),
(8, 3, '29a343663b155996818e40c942bd3263.jpg', 'FI', 'I', 1672672677, 1, 1),
(9, 3, '6c3a073b4e7c3cae66a18a54aaf7b6ac.jpg', 'FI', 'I', 1672672677, 1, 1),
(10, 4, '8520bc5bb1482c942a372760a5d99bdb.jpg', 'FI', 'I', 1672672722, 1, 1),
(11, 4, '421825f4101ebf7a7824fdfdb9e9fbf9.jpg', 'FI', 'I', 1672672722, 1, 1),
(12, 4, 'b4860aefb62416400d7a66594494830a.jpg', 'FI', 'I', 1672672722, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_file_description`
--

DROP TABLE IF EXISTS `news_file_description`;
CREATE TABLE IF NOT EXISTS `news_file_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) DEFAULT NULL,
  `newsroom` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_file_description`
--

INSERT INTO `news_file_description` (`id`, `file_id`, `newsroom`, `language`, `title`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active`) VALUES
(1, 1, NULL, 1, 'App 1', 'Lorem ipsum, dolor sit amet consectetur', 1672672542, 1, NULL, NULL, 1),
(2, 2, NULL, 1, 'App 2', 'Lorem ipsum, dolor sit amet consectetur', 1672672542, 1, NULL, NULL, 1),
(3, 3, NULL, 1, 'App 3', 'Lorem ipsum, dolor sit amet consectetur', 1672672542, 1, NULL, NULL, 1),
(4, 4, NULL, 1, 'Books 1', 'Lorem ipsum, dolor sit amet consectetur', 1672672628, 1, NULL, NULL, 1),
(5, 5, NULL, 1, 'Books 2', 'Lorem ipsum, dolor sit amet consectetur', 1672672628, 1, NULL, NULL, 1),
(6, 6, NULL, 1, 'Books 3', 'Lorem ipsum, dolor sit amet consectetur', 1672672628, 1, NULL, NULL, 1),
(7, 7, NULL, 1, 'Branding 1', 'Lorem ipsum, dolor sit amet consectetur', 1672672676, 1, NULL, NULL, 1),
(8, 8, NULL, 1, 'Branding 2', 'Lorem ipsum, dolor sit amet consectetur', 1672672677, 1, NULL, NULL, 1),
(9, 9, NULL, 1, 'Branding 3', 'Lorem ipsum, dolor sit amet consectetur', 1672672677, 1, NULL, NULL, 1),
(10, 10, NULL, 1, 'Product 1', 'Lorem ipsum, dolor sit amet consectetur', 1672672722, 1, NULL, NULL, 1),
(11, 11, NULL, 1, 'Product 2', 'Lorem ipsum, dolor sit amet consectetur', 1672672722, 1, NULL, NULL, 1),
(12, 12, NULL, 1, 'Product 3', 'Lorem ipsum, dolor sit amet consectetur', 1672672722, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `menu` int(11) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `desc_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `seo_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_keywords` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `date`, `menu`, `order_by`, `title`, `title_slug`, `subtitle`, `short_desc`, `description`, `desc_img`, `language`, `language_parent`, `created_by`, `updated_by`, `created_at`, `updated_at`, `seo_title`, `seo_meta_keywords`, `seo_meta_description`, `active`) VALUES
(1, NULL, 1, NULL, 'Design is Intelligence Made Visible', 'design-is-intelligence-made-visible', 'Arclight expertise in interiors and industrial projects across the United Arab Emirates supported with professional and in-house facilities', '', '', NULL, 1, NULL, 1, NULL, 1671441997, NULL, NULL, NULL, NULL, 1),
(2, NULL, 1, NULL, 'Who We Are', 'who-we-are', '', '', 'An inspirational journey with passion and determination to create iconic interiors and experiences, Arclight Interiors provides turnkey solutions in fit out services with expertise in commercial &amp; industrial projects across UAE. With solid credentials in Retail, F&amp;B, Office, Healthcare and Industrial projects our quality workmanship and inhouse facilities ensures budget engineered solutions which are a notch above our client&rsquo;s expectations.<br /><br />Our associations with the best technical operations team in UAE makes us well equipped to take up projects of every type and size.<br /><br />Our team of designers, engineers and technicians efficiently achieves hassle free completion of projects in all scales within the limited time frame with premium spatial quality and functionality and that makes us to be chosen by our clients back-to-back', 'f8e4cda99dfb881be25ebc4b8238423d.jpg', 1, NULL, 1, NULL, 1671442539, NULL, NULL, NULL, NULL, 1),
(3, NULL, 1, NULL, 'Our Vision', 'our-vision', '', 'To be a socially responsible organisation by setting goals of highest standard and consistently improve on it to set new benchmarks in the fit-out industry.', '', NULL, 1, NULL, 1, NULL, 1671442731, NULL, NULL, NULL, NULL, 1),
(4, NULL, 1, NULL, 'Our Motto', 'our-motto', '', 'Ensure everlasting customer satisfaction. Exceed and surpass quality standards. Raise the benchmark consistently. Be responsible, committed and Use quality products. Devote 100% efforts in every project.', '', NULL, 1, NULL, 1, NULL, 1671442752, NULL, NULL, NULL, NULL, 1),
(5, NULL, 1, NULL, 'Our Mission', 'our-mission', '', 'Be responsible, committed and motivational to undertake any challenges in fit-out industry and deliver superior quality projects consistently to ensures everlasting customer satisfaction and loyalty', '', NULL, 1, NULL, 1, NULL, 1671442767, NULL, NULL, NULL, NULL, 1),
(6, NULL, 2, NULL, 'About Us', 'about-us', '', '', 'An inspirational journey with passion and determination to create iconic interiors and experiences, Arclight Interiors provides turnkey solutions in fit out services with expertise in commercial &amp; industrial projects across UAE. With solid credentials in Retail, F&amp;B, Office, Healthcare and Industrial projects our quality workmanship and inhouse facilities ensures budget engineered solutions which are a notch above our client&rsquo;s expectations. Our associations with the best technical operations team in UAE makes us well equipped to take up projects of every type and size. Our team of designers, engineers and technicians efficiently achieves hassle free completion of projects in all scales within the limited time frame with premium spatial quality and functionality and that makes us to be chosen by our clients back-to-back', '0119b34452aa70cc43b57b72073337d8.jpg', 1, 0, 1, 1, 1671449408, 1671449415, NULL, NULL, NULL, 1),
(7, NULL, 2, NULL, 'Why Us?', 'why-us', '', '', 'Our technical expertise and quality workmanship makes what we are. Offering the right solution to make every project hassle free and our ability to work smoothly with clients, principle contractors and subcontractors to meet the design and construction requirement has always helped us to grow', '2441810949b9e4b7b5df81d4d0e3a623.jpg', 1, NULL, 1, NULL, 1672122784, NULL, NULL, NULL, NULL, 1),
(8, NULL, 2, NULL, 'Why Us? (Second Image)', 'why-us-second-image', '', '', '', '53024c81f060253679339f09626e6f90.jpg', 1, NULL, 1, NULL, 1672122828, NULL, NULL, NULL, NULL, 1),
(9, NULL, 1, NULL, 'Projects', 'projects', '140', '', '', NULL, 1, NULL, 1, NULL, 1672470730, NULL, NULL, NULL, NULL, 1),
(10, NULL, 1, NULL, 'Years', 'years', '12', '', '', NULL, 1, NULL, 1, NULL, 1672470756, NULL, NULL, NULL, NULL, 1),
(11, NULL, 1, NULL, 'Clients', 'clients', '70', '', '', NULL, 1, NULL, 1, NULL, 1672470772, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `partner_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_key` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perm_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permKey` (`perm_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `illustrator` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `additonal_info` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `binding` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_pages` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_cover` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_per_unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `manufacturer_retail_price` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `product_group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `units_in_stock` int(11) DEFAULT NULL,
  `units_on_order` int(11) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `related_product` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_keywords` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_canonical_url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
CREATE TABLE IF NOT EXISTS `product_attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_order` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_value`
--

DROP TABLE IF EXISTS `product_attribute_value`;
CREATE TABLE IF NOT EXISTS `product_attribute_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `attribute_value` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_order` int(11) NOT NULL,
  `language` int(11) NOT NULL,
  `language_parent` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

DROP TABLE IF EXISTS `product_cart`;
CREATE TABLE IF NOT EXISTS `product_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `customer_type` enum('GU','RU') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'GU-Guest User, RU-Registered User',
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `category_order` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_files`
--

DROP TABLE IF EXISTS `product_files`;
CREATE TABLE IF NOT EXISTS `product_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `file` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_lg` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_for` enum('IG','VG','O') COLLATE utf8mb4_unicode_ci DEFAULT 'O' COMMENT 'O-Other, IG-Image Gallery, V-Video Gallery',
  `file_type` enum('I','V','L','O') COLLATE utf8mb4_unicode_ci DEFAULT 'O' COMMENT 'I - Image, VL - Video Link, L - Link, O - Other',
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_file_description`
--

DROP TABLE IF EXISTS `product_file_description`;
CREATE TABLE IF NOT EXISTS `product_file_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` bigint(20) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_group`
--

DROP TABLE IF EXISTS `product_group`;
CREATE TABLE IF NOT EXISTS `product_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_slug` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `group_order` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_inquiry`
--

DROP TABLE IF EXISTS `product_inquiry`;
CREATE TABLE IF NOT EXISTS `product_inquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

DROP TABLE IF EXISTS `product_order`;
CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `guest_checkout` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `quotation_id` int(11) DEFAULT NULL,
  `order_ref_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_company` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country_id` int(11) DEFAULT NULL,
  `billing_postal_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_fax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_date` int(11) DEFAULT NULL,
  `shipping_first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_company` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_district` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_postal_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country_id` int(11) DEFAULT NULL,
  `shipping_phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_fax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` enum('D','S','C','P') COLLATE utf8mb4_unicode_ci DEFAULT 'P' COMMENT 'D- Delivered, S - Shipped, C- Cancelled, P-Pending',
  `note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct_order` tinyint(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order_details`
--

DROP TABLE IF EXISTS `product_order_details`;
CREATE TABLE IF NOT EXISTS `product_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_status` enum('D','S','C','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'D- Delivered, S - Shipped, C- Cancelled, P-Pending',
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order_payment`
--

DROP TABLE IF EXISTS `product_order_payment`;
CREATE TABLE IF NOT EXISTS `product_order_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) DEFAULT NULL,
  `vat_amount` decimal(10,2) DEFAULT NULL,
  `shipping_charge` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `payment_option` tinyint(1) DEFAULT NULL COMMENT '1 - Cash on delivery',
  `payment_ref_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_msg` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` enum('P','S','F') COLLATE utf8mb4_unicode_ci DEFAULT 'P' COMMENT 'F-Failed, P-Pending, S-Success',
  `payment_mode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct_order` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_order_property`
--

DROP TABLE IF EXISTS `product_order_property`;
CREATE TABLE IF NOT EXISTS `product_order_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_details_id` int(11) DEFAULT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `attribute` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value_id` int(11) DEFAULT NULL,
  `attribute_value` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_payment_option`
--

DROP TABLE IF EXISTS `product_payment_option`;
CREATE TABLE IF NOT EXISTS `product_payment_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_property`
--

DROP TABLE IF EXISTS `product_property`;
CREATE TABLE IF NOT EXISTS `product_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `attribute_value_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation`
--

DROP TABLE IF EXISTS `product_quotation`;
CREATE TABLE IF NOT EXISTS `product_quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `quotation_ref_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quotation_status` enum('A','C','P','F') COLLATE utf8mb4_unicode_ci DEFAULT 'P' COMMENT 'A-Approved, C- Cancelled, P-Pending, F- Fulfilled',
  `note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation_details`
--

DROP TABLE IF EXISTS `product_quotation_details`;
CREATE TABLE IF NOT EXISTS `product_quotation_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_quotation_property`
--

DROP TABLE IF EXISTS `product_quotation_property`;
CREATE TABLE IF NOT EXISTS `product_quotation_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quotation_details_id` int(11) DEFAULT NULL,
  `attribute_id` int(11) DEFAULT NULL,
  `attribute` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute_value_id` int(11) DEFAULT NULL,
  `attribute_value` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

DROP TABLE IF EXISTS `product_rating`;
CREATE TABLE IF NOT EXISTS `product_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_shipping_charge`
--

DROP TABLE IF EXISTS `product_shipping_charge`;
CREATE TABLE IF NOT EXISTS `product_shipping_charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_box` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `address`, `address_2`, `city`, `district`, `state`, `country`, `fax`, `po_box`, `created_at`, `created_by`, `updated_at`, `updated_by`, `active`) VALUES
(1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

DROP TABLE IF EXISTS `resumes`;
CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) DEFAULT NULL,
  `name` int(11) DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `resume` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vat` int(11) DEFAULT NULL,
  `contact_email` varchar(250) DEFAULT NULL,
  `order_email` varchar(250) DEFAULT NULL,
  `quotation_email` varchar(250) DEFAULT NULL,
  `call_us` varchar(250) DEFAULT NULL,
  `copyright` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `contact_email`, `order_email`, `quotation_email`, `call_us`, `copyright`) VALUES
(1, NULL, 'arul@arabinfotec.com', NULL, NULL, NULL, '?? Copyright Arclight');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

DROP TABLE IF EXISTS `socialmedia`;
CREATE TABLE IF NOT EXISTS `socialmedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `name`, `url`, `status`, `created_at`) VALUES
(1, 'facebook', 'https://www.facebook.com/', 1, '2023-01-02 11:46:03'),
(2, 'instagram', 'https://www.instagram.com/', 1, '2023-01-02 11:46:27'),
(3, 'whatsapp', 'https://web.whatsapp.com/', 1, '2023-01-02 11:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statement` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statement_by` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `language_parent` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Default Password: password',
  `email` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_selector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_password_selector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_password_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` int(11) UNSIGNED DEFAULT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2y$10$.dcUf4bc6CsigMee8H1Rc.sCwM9rfCuYjg.dNCKRDqsqXWPA1Wcby', 'admin@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1672720966, 1, 'Admin', 'Admin', NULL, NULL),
(2, '117.206.26.127', 'U96942', '$2y$10$1P9RdFNCmOxEXwz5Uf6W9ue1uCXuCzdr/IOdzVrak9TmGdOjYK2sm', 'sinaj.hameed@gmail.com', NULL, NULL, 'fa00036e502d71a66942', '$2y$10$RJGTBa8J7Pe43CIb660py.vaHTv/WVQ2oAKYKOKezvFKi4LiWUkGy', 1615201942, NULL, NULL, 1615201758, 1615203701, 1, 'Sinaj', 'Hameed', '', ''),
(3, '117.206.26.127', 'U46083', '$2y$10$9dkvCqGsUawaraJrPJYp1ednxBwguzHmeP7nYFVtRhLEJIPYsGivi', 'connect2sreehari@gmail.com', NULL, NULL, '6701eb0d2c4f9b69702d', '$2y$10$vACoXO1mPl0y/PVPuhstMOxtmASYTokGNysO211eNUDC6qeRMzmZq', 1615202036, NULL, NULL, 1615201998, 1615284072, 1, 'Sreehari', 'S', '', ''),
(4, '117.206.26.127', 'U72594', '$2y$10$q/nQbiwML4hrW9UOMgaZT.mCnNmwSPgASiBn9S7qAEWI8867dlpqa', 'sinajhameed47@gmail.com', NULL, NULL, '1aa9b5a94deb042a45df', NULL, NULL, NULL, NULL, 1615202295, 1615202589, 1, 'Sinaj', 'Hameed', NULL, '9605780978'),
(5, '5.194.189.22', 'U43405', '$2y$10$/7mjTLCwoMOqdj23OpeXbeRlZ7quRaov762b9R64BgJV4kMUT1riK', 'sreechand@vstbiz.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615225894, 1615225894, 1, 'Sreechand', 'KS', NULL, '+971529914239'),
(6, '5.194.189.22', 'U62446', '$2y$10$evBAEEeOEOdc6pr2daaM6.TisceiGgJ5HLCuTxF9Hg9c6BpHGBikS', 'sreechand.ks@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1615226636, 1615226789, 1, 'Sreechand', 'Ks', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `group_id` mediumint(8) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(30, 2, 2),
(31, 3, 2),
(32, 4, 2),
(33, 5, 2),
(34, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_permissions`
--

DROP TABLE IF EXISTS `users_permissions`;
CREATE TABLE IF NOT EXISTS `users_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `perm_id` int(11) DEFAULT NULL,
  `value` tinyint(1) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userID` (`user_id`,`perm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
