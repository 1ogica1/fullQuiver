-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2014 at 09:58 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fullquiver`
--

-- --------------------------------------------------------

--
-- Table structure for table `bow`
--

CREATE TABLE IF NOT EXISTS `bow` (
  `product_id` int(5) NOT NULL,
  `bow_style` varchar(75) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `material` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `bow_range` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bow`
--

INSERT INTO `bow` (`product_id`, `bow_style`, `weight`, `material`, `bow_range`) VALUES
(1, 'compound', 5, 'wood and plastic', 5),
(2, 'compound', 8, 'bamboo', 15),
(3, 'compound', 2, 'wood', 39),
(4, 'compound', 4, 'bamboo', 25),
(5, 'compound', 9, 'wood', 27),
(6, 'long', 2, 'wood', 21),
(7, 'long', 6, 'metal', 28),
(8, 'long', 2, 'bamboo', 17),
(9, 'long', 2, 'metal', 36),
(10, 'compound', 3, 'wood', 23);

--
-- Triggers `bow`
--
DELIMITER //
CREATE TRIGGER `bow_constraints` BEFORE INSERT ON `bow`
 FOR EACH ROW BEGIN
	IF LCASE(NEW.bow_style) <> ('long' || 'compound') THEN
		SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Style value must either be RECURVE or LONG.';
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`cust_id` int(5) NOT NULL,
  `class` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `f_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `l_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `e_address` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `street_add` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `postal_code` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `province` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `phone_num` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `u_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `p_word` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `class`, `f_name`, `l_name`, `e_address`, `street_add`, `postal_code`, `city`, `province`, `phone_num`, `u_name`, `p_word`) VALUES
(1, 'User', 'Harper', 'Merrill', 'nisl@volutpatNulladignissim.com', '1942 Placerat. Street', 'P3G 5P6', 'Orangeville', 'ON', '(690) 480-8941', 'OSL42YSY8HS', 'password'),
(2, 'User', 'Zeph', 'Mack', 'semper@fringillacursus.com', 'Ap #303-2262 Dui Avenue', 'B1P 8P1', 'Cape Breton Island', 'NS', '(396) 642-1866', 'VLG03ZAU6BS', '475B89E3'),
(3, 'User', 'Sonia', 'Roy', 'interdum@velarcu.ca', '1299 Porta Ave', 'T4H 0Y4', 'Trochu', 'AB', '(938) 949-8223', 'THH86JMH4AC', '6C1967B1'),
(4, 'User', 'Martha', 'Kirkland', 'tempus@adipiscingelit.ca', '549-1396 Nibh St.', 'V9Y 2P0', 'Ucluelet', 'BC', '(199) 237-7573', 'RKP32NFT2JG', '707292BF'),
(5, 'User', 'Jelani', 'Sampson', 'a.nunc@mi.ca', 'Ap #314-7084 Et Road', 'L0R 1P4', 'Tay', 'ON', '(505) 161-8666', 'CGA60CKX5LV', '85447637'),
(6, 'User', 'Madison', 'Cross', 'Donec.dignissim@pharetranibh.org', '890-4064 Adipiscing Rd.', 'V6P 5E9', 'Vancouver', 'BC', '(555) 284-3918', 'BTM71GLT8KV', '57A2A083'),
(7, 'User', 'Carly', 'Beck', 'libero@aliquetdiamSed.ca', 'Ap #400-520 Duis Ave', 'L2Z 9S3', 'Gloucester', 'ON', '(216) 187-9657', 'BTT43GAQ0JS', '20FC43E1'),
(8, 'User', 'Ignacia', 'Young', 'nec@necorci.net', '5171 Mauris Rd.', 'N7E 9T7', 'Minto', 'ON', '(495) 936-9053', 'HUP17VJD6AM', '2D6AFEEB'),
(9, 'User', 'Kiara', 'Potts', 'vulputate.dui@Sedegetlacus.co.uk', 'Ap #211-7259 Ullamcorper, Street', 'R2T 9G0', 'Brandon', 'MB', '(325) 849-1950', 'PVK36KCB1MH', '8A452CA2'),
(10, 'User', 'Driscoll', 'Walker', 'ipsum@fringillacursuspurus.edu', 'P.O. Box 638, 4397 Tellus. Rd.', 'L0A 1T9', 'Burlington', 'ON', '(718) 209-4473', 'SXO02HJP3VV', '2F14D126'),
(11, 'User', 'Morgan', 'Kirkland', 'amet@tincidunt.org', '5810 Blandit St.', 'N7M 0T5', 'Whitchurch-Stouffville', 'ON', '(781) 150-1587', 'WCS39YTG4VA', '63CD40A9'),
(12, 'User', 'Charissa', 'Case', 'laoreet.posuere.enim@eu.net', '1755 Aliquam Ave', 'T9A 3J6', 'Lac La Biche County', 'AB', '(157) 606-1492', 'WKM25TAI0DS', 'BD56EE86'),
(13, 'Guest', 'Zena', 'Mitchell', 'orci@natoquepenatibuset.com', 'Ap #386-2078 Cum Av.', 'G2J 4E7', 'Champlain', 'QC', '(100) 963-2733', NULL, NULL),
(14, 'Guest', 'Harper', 'Daniels', 'molestie.pharetra@mollis.org', 'P.O. Box 268, 9773 Est, Ave', 'H6B 7W5', 'Murdochville', 'QC', '(681) 216-5060', NULL, NULL),
(15, 'Guest', 'Kevin', 'Buckley', 'porta@tellusidnunc.com', 'Ap #178-7745 Elit. Road', 'M0E 5A6', 'Windsor', 'ON', '(868) 925-8480', NULL, NULL),
(16, 'Guest', 'Malik', 'Jimenez', 'at.sem.molestie@semper.org', '6032 Ut Ave', 'P7C 9Y0', 'Cobourg', 'ON', '(921) 713-5103', NULL, NULL),
(17, 'Guest', 'Evan', 'Harmon', 'et@Integeraliquamadipiscing.edu', '101-3936 Accumsan Ave', 'J4B 0N1', 'Hampstead', 'QC', '(520) 752-0949', NULL, NULL),
(18, 'Guest', 'Candace', 'Mckee', 'erat@Pellentesque.ca', 'Ap #771-9600 Et Rd.', 'M9W 2Z2', 'LaSalle', 'ON', '(135) 273-4665', NULL, NULL),
(19, 'Guest', 'Carly', 'Franklin', 'pharetra.sed.hendrerit@facilisisegetipsum.ca', '2898 Vitae, St.', 'P5Z 2Z7', 'Markham', 'ON', '(985) 693-9639', NULL, NULL),
(20, 'Guest', 'Margaret', 'Mullen', 'lectus.convallis.est@magnaatortor.ca', 'Ap #904-8043 Id, Avenue', 'J3T 9B8', 'Collines-de-l''Outaouais', 'QC', '(487) 980-0751', NULL, NULL),
(21, 'Guest', 'Austin', 'Hurst', 'nisi.nibh@nisidictumaugue.org', 'P.O. Box 232, 1378 Natoque St.', 'P8L 2J3', 'Cumberland', 'ON', '(532) 827-3271', NULL, NULL),
(22, 'Guest', 'Noel', 'Haney', 'amet@enimgravida.ca', '651-1086 Quis St.', 'A9A 9E8', 'Harbour Grace', 'NL', '(130) 999-2563', NULL, NULL),
(23, 'Guest', 'Tanya', 'Cochran', 'libero@Quisqueimperdiet.edu', '118-9651 Elementum, St.', 'L6M 1B3', 'Goderich', 'ON', '(861) 515-2911', NULL, NULL),
(24, 'Guest', 'Hop', 'Wilder', 'purus.accumsan.interdum@egetmagna.net', '6888 Ac St.', 'N1M 9P9', 'Ramara', 'ON', '(224) 415-6808', NULL, NULL),
(25, 'Guest', 'Heather', 'Morin', 'purus@ullamcorpereu.com', '8857 A, Rd.', 'N9B 9P7', 'Owen Sound', 'ON', '(169) 155-0141', NULL, NULL),
(29, 'USER', 'Kyle', 'Crossman', 'Kcross119@yahoo.ca', '758 Kemsley Dr.', 'N7V 2M2', 'Sarnia', 'ON', '5193375059', 'CrunchyHotDogs', 'password'),
(30, 'USER', 'Sam', 'Spencer', 'ss@lc.ca', '111', 'jlkjfldkjf', 'dfljdfj', 'ON', '412423', 'fsdfdf', 'fff'),
(31, 'USER', 'Frank', 'Mudold', 'Placeholder@email.com', '111 Street Name', 'N7V 2M2', 'Sarnia', 'AB', '333-333-3333', 'NoOrderHistory', 'NoOrderHistory'),
(32, 'USER', 'Frank', 'Mudold', 'Placeholder@email.coms', '111 Street Name', 'N7V 2M2', 'Sarnia', 'AB', '333-333-3333', 'HasOrders', 'HasOrders');

--
-- Triggers `customer`
--
DELIMITER //
CREATE TRIGGER `customer_constraints` BEFORE INSERT ON `customer`
 FOR EACH ROW BEGIN
	IF (UCASE(NEW.class) <> ('GUEST' || 'USER'))
    	THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Class must be either guest or user';
    END IF;
    
    IF (NEW.phone_num = NULL) && (NEW.e_address = NULL)
    	THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Must have phone and/or email data';
    END IF;
    
    IF (UCASE(NEW.class) = UCASE('user')) && ((NEW.u_name IS NULL) && (NEW.p_word IS NULL))
		THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Users must have a username and password.';
    END IF;
    
    IF (UCASE(NEW.class) = UCASE('guest')) && ((NEW.u_name IS NOT NULL) || (NEW.p_word IS NOT NULL))
		THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Guests must not have a username and password.';
    END IF;
    
    
    IF (UCASE(NEW.province) <> ('AB' || 'BC' || 'MB' || 'NB' || 'NL' || 'NS' || 'NT' || 'NU' || 'ON' || 'PE' || 'QC' || 'SK' || 'YT'))
    	THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Province must be of type (AB, BC, MB, NB, NL, NS, NT, NU, ON, PE, QC, SK or YT).';
     END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_customer`
--

CREATE TABLE IF NOT EXISTS `order_customer` (
  `order_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_customer`
--

INSERT INTO `order_customer` (`order_id`, `cust_id`) VALUES
(23, 29),
(24, 29),
(25, 29),
(34, 29),
(35, 29),
(36, 29),
(38, 29),
(39, 29),
(40, 29),
(41, 29),
(42, 29),
(43, 29),
(44, 29),
(45, 29),
(46, 29),
(37, 32);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(23, 3, 1),
(24, 3, 1),
(24, 11, 1),
(24, 27, 3),
(25, 38, 1),
(25, 39, 1),
(25, 40, 1),
(25, 41, 1),
(25, 42, 1),
(25, 43, 1),
(26, 1, 1),
(27, 2, 1),
(28, 4, 1),
(29, 12, 1),
(30, 1, 1),
(31, 3, 1),
(32, 1, 1),
(33, 2, 1),
(34, 2, 1),
(35, 1, 1),
(36, 2, 1),
(37, 18, 3),
(38, 1, 1),
(39, 8, 1),
(40, 27, 1),
(41, 3, 2),
(41, 41, 1),
(42, 2, 1),
(43, 7, 1),
(44, 4, 1),
(45, 2, 1),
(46, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE IF NOT EXISTS `order_table` (
`order_id` int(5) NOT NULL,
  `date_placed` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`order_id`, `date_placed`) VALUES
(23, '2014-11-18'),
(24, '2014-11-18'),
(25, '2014-11-19'),
(26, '2014-11-19'),
(27, '2014-11-19'),
(28, '2014-11-19'),
(29, '2014-11-19'),
(30, '2014-11-21'),
(31, '2014-11-21'),
(32, '2014-11-25'),
(33, '2014-11-25'),
(34, '2014-11-28'),
(35, '2014-11-28'),
(36, '2014-11-28'),
(37, '2014-12-03'),
(38, '2014-12-03'),
(39, '2014-12-03'),
(40, '2014-12-03'),
(41, '2014-12-04'),
(42, '2014-12-04'),
(43, '2014-12-04'),
(44, '2014-12-04'),
(45, '2014-12-04'),
(46, '2014-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(5) NOT NULL,
  `product_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `color` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='A table used to hold all of the products.' AUTO_INCREMENT=44 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `supplier_id`, `skill_level`, `price`, `color`, `product_type`) VALUES
(1, 'Conquest 04', 0, 2, '63.63', 'Navy Blue', 'bow'),
(2, 'Conquest 05', 0, 5, '191.11', 'Red', 'bow'),
(3, 'Mini Genesis', 1, 4, '85.87', 'Pink', 'bow'),
(4, 'Monster Safari', 0, 4, '35.15', 'Black', 'bow'),
(5, 'Genesis', 2, 1, '78.01', 'Cyan', 'bow'),
(6, 'Lynx', 0, 3, '23.36', 'Brown', 'bow'),
(7, 'Bobcat', 0, 4, '59.63', 'Brown', 'bow'),
(8, 'Wolf', 0, 2, '44.53', 'Black', 'bow'),
(9, 'Taiga Nuovo', 0, 4, '37.58', 'Black', 'bow'),
(10, 'Spirit', 0, 2, '99.71', 'Silver', 'bow'),
(11, 'Solocam 01', 0, 4, '42.86', 'Navy Blue', 'quiver'),
(12, 'QVR Quiver', 0, 3, '35.65', 'Black', 'quiver'),
(13, 'Old Style Quiver', 0, 2, '97.05', 'Black', 'quiver'),
(14, 'Solocam 02', 0, 4, '66.69', 'Green', 'quiver'),
(15, 'Eagle Eye', 0, 2, '79.31', 'Navy Blue', 'scope'),
(16, 'Tasco Red Dot Scope', 3, 3, '37.21', 'Red', 'scope'),
(17, 'Jarash Elite Scope', 0, 2, '70.19', 'Black', 'scope'),
(18, 'Three Pin Finder', 0, 4, '76.19', 'Yellow', 'scope'),
(26, 'Three Pin Lock', 0, 2, '31.13', 'Black', 'scope'),
(27, 'Tasco Pronghorn Scope', 0, 2, '93.20', 'Cyan', 'scope'),
(28, 'Replacement Sight Pin', 0, 4, '25.28', 'Black', 'scope'),
(29, 'One Pin Finder', 0, 2, '39.34', 'Black', 'scope'),
(30, 'Bow and Arrow Rack', 0, 1, '36.71', 'Brown', 'stand'),
(31, 'Triangle Bow Rack', 0, 2, '57.33', 'Brown', 'stand'),
(33, 'Infitic Bow Stand 05', 0, 3, '86.53', 'Blue', 'stand'),
(37, 'Infitic Bow Stand 02', 0, 2, '64.21', 'Red', 'stand'),
(38, 'Purple Nylon String', 0, 2, '33.37', 'Purple', 'string'),
(39, 'Yellow Nylon String', 0, 1, '33.37', 'Yellow', 'string'),
(40, 'Violet Nylon String', 0, 3, '33.37', 'Violet', 'string'),
(41, 'Pink Nylon String', 0, 4, '33.37', 'Pink', 'string'),
(42, 'Light Blue Nylon String', 0, 4, '33.37', 'Light Blue', 'string'),
(43, 'Green Nylon String', 0, 3, '33.37', 'Green', 'string');

--
-- Triggers `product`
--
DELIMITER //
CREATE TRIGGER `product_constraints` BEFORE INSERT ON `product`
 FOR EACH ROW BEGIN
	if  NEW.price <= 0.0 then
       SIGNAL SQLSTATE '45000'   
       SET MESSAGE_TEXT = 'Price must be greater than 0.0.';
	end if; 
    
    if  NEW.skill_level NOT IN (1, 2, 3, 4)
       THEN SIGNAL SQLSTATE '45000'   
       SET MESSAGE_TEXT = 'Skill level must be 1, 2, 3 or 4.';
	end if; 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
`promotion_id` int(5) NOT NULL,
  `promotion_name` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `discount_percent` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_id`, `promotion_name`, `discount_percent`, `start_date`, `end_date`) VALUES
(1, 'Fall Promo', '0.10', '2013-10-02', '2015-10-01'),
(2, 'Clearance', '0.50', '2013-10-20', '2015-05-17'),
(3, 'Special Promo', '0.60', '2013-11-28', '2015-06-23');

--
-- Triggers `promotion`
--
DELIMITER //
CREATE TRIGGER `promotion_constraints` BEFORE INSERT ON `promotion`
 FOR EACH ROW BEGIN
	IF NEW.end_date < NEW.start_date
		THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'End date must be after start date.';
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `promotion_product`
--

CREATE TABLE IF NOT EXISTS `promotion_product` (
  `promotion_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `promotion_product`
--

INSERT INTO `promotion_product` (`promotion_id`, `product_id`) VALUES
(1, 1),
(1, 2),
(2, 7),
(2, 14),
(3, 42),
(3, 43);

-- --------------------------------------------------------

--
-- Table structure for table `quiver`
--

CREATE TABLE IF NOT EXISTS `quiver` (
  `product_id` int(5) NOT NULL,
  `model` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `size` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiver`
--

INSERT INTO `quiver` (`product_id`, `model`, `size`) VALUES
(11, 'QVR 3000', 'S'),
(12, 'QVR 1500', 'L'),
(13, 'QVR3250', 'M'),
(14, 'QVR 3000', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `scope`
--

CREATE TABLE IF NOT EXISTS `scope` (
  `product_id` int(5) NOT NULL,
  `scope_diameter` decimal(10,2) NOT NULL,
  `length` int(11) NOT NULL,
  `magnification` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scope`
--

INSERT INTO `scope` (`product_id`, `scope_diameter`, `length`, `magnification`) VALUES
(15, '0.29', 9, '3'),
(16, '0.34', 9, '2'),
(17, '0.16', 6, '2'),
(18, '0.24', 6, '3'),
(26, '0.32', 9, '6'),
(27, '0.28', 9, '4'),
(28, '0.26', 6, '4'),
(29, '0.06', 9, '4');

-- --------------------------------------------------------

--
-- Table structure for table `stand`
--

CREATE TABLE IF NOT EXISTS `stand` (
  `product_id` int(5) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stand`
--

INSERT INTO `stand` (`product_id`, `height`) VALUES
(30, 2),
(31, 2),
(33, 4),
(37, 3);

-- --------------------------------------------------------

--
-- Table structure for table `string`
--

CREATE TABLE IF NOT EXISTS `string` (
  `product_id` int(5) NOT NULL,
  `string_style` varchar(75) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `strand_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `string`
--

INSERT INTO `string` (`product_id`, `string_style`, `strand_count`) VALUES
(38, 'one cam', 14),
(39, 'recurve', 14),
(40, 'Long', 16),
(41, 'two cam', 16),
(42, 'one cam', 20),
(43, 'recurve', 12);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`company_id` int(5) NOT NULL,
  `company_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `phone_num` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `street_address` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `city` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `province` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `product_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`company_id`, `company_name`, `phone_num`, `street_address`, `city`, `province`, `product_type`) VALUES
(1, 'Nisl Maecenas Associates', '(485) 769-1616', 'Ap #546-6873 Nunc St.', 'Leamington', 'ON', 'bows'),
(2, 'Semper Inc.', '(431) 444-3284', 'Ap #224-1065 Suspendisse St.', 'Ramara', 'ON', 'bow accessories'),
(3, 'Ac Turpis Egestas Ltd', '(101) 835-3934', '784-392 Eu, Rd.', 'Castor', 'AB', 'gear'),
(4, 'Nunc Sit Institute', '(865) 878-2185', '7200 Posuere Ave', 'Vaughan', 'ON', 'bow accessories'),
(5, 'Eget Magna Inc.', '(739) 469-2684', '4002 Scelerisque Av.', 'Vanier', 'ON', 'bows');

--
-- Triggers `supplier`
--
DELIMITER //
CREATE TRIGGER `supplier_constraints` BEFORE INSERT ON `supplier`
 FOR EACH ROW BEGIN
	IF (LCASE(NEW.product_type) <> ('gear' || 'bow accessories' || 'bows'))
		THEN SIGNAL SQLSTATE '45000'
	    SET MESSAGE_TEXT = 'Must be of type gear, bow accessories or bows.';
    END IF;

	IF (UCASE(NEW.province) <> ('AB' || 'BC' || 'MB' || 'NB' || 'NL' || 'NS' || 'NT' || 'NU' || 'ON' || 'PE' || 'QC' || 'SK' || 'YT'))
    	THEN SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Province must be of type (AB, BC, MB, NB, NL, NS, NT, NU, ON, PE, QC, SK or YT).';
     END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contact`
--

CREATE TABLE IF NOT EXISTS `supplier_contact` (
`contact_id` int(5) NOT NULL,
  `contact_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `contact_phone_num` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `company_id` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `supplier_contact`
--

INSERT INTO `supplier_contact` (`contact_id`, `contact_name`, `contact_phone_num`, `company_id`) VALUES
(11, 'Lunea Beach', '(449) 216-5023', 1),
(12, 'Jamal Walton', '(254) 103-3785', 2),
(13, 'Alan Wilson', '(683) 623-3971', 3),
(14, 'Ignacia Casey', '(165) 642-9554', 4),
(15, 'Dorian Spence', '(446) 303-9377', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bow`
--
ALTER TABLE `bow`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`cust_id`), ADD UNIQUE KEY `u_name` (`u_name`);

--
-- Indexes for table `order_customer`
--
ALTER TABLE `order_customer`
 ADD PRIMARY KEY (`order_id`,`cust_id`), ADD KEY `ord_cust_cust_id_fk` (`cust_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
 ADD PRIMARY KEY (`order_id`,`product_id`), ADD KEY `order_prod_prod_id_fk` (`product_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`), ADD FULLTEXT KEY `product_name_2` (`product_name`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
 ADD PRIMARY KEY (`promotion_id`), ADD UNIQUE KEY `promotion_name` (`promotion_name`);

--
-- Indexes for table `promotion_product`
--
ALTER TABLE `promotion_product`
 ADD PRIMARY KEY (`promotion_id`,`product_id`), ADD KEY `prom_prod_prod_fk` (`product_id`);

--
-- Indexes for table `quiver`
--
ALTER TABLE `quiver`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `scope`
--
ALTER TABLE `scope`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stand`
--
ALTER TABLE `stand`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `string`
--
ALTER TABLE `string`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`company_id`), ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
 ADD PRIMARY KEY (`contact_id`), ADD UNIQUE KEY `supplier_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
MODIFY `promotion_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `company_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
MODIFY `contact_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bow`
--
ALTER TABLE `bow`
ADD CONSTRAINT `bow_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_customer`
--
ALTER TABLE `order_customer`
ADD CONSTRAINT `ord_cust_cust_id_fk` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
ADD CONSTRAINT `ord_cust_ord_id_fk` FOREIGN KEY (`order_id`) REFERENCES `order_table` (`order_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
ADD CONSTRAINT `ord_prod_ord_id_fk` FOREIGN KEY (`order_id`) REFERENCES `order_table` (`order_id`),
ADD CONSTRAINT `ord_prod_prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `promotion_product`
--
ALTER TABLE `promotion_product`
ADD CONSTRAINT `prom_prod_prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
ADD CONSTRAINT `prom_prod_prom_id_fk` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`promotion_id`);

--
-- Constraints for table `quiver`
--
ALTER TABLE `quiver`
ADD CONSTRAINT `quiver_prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scope`
--
ALTER TABLE `scope`
ADD CONSTRAINT `scope_prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stand`
--
ALTER TABLE `stand`
ADD CONSTRAINT `stand_prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `string`
--
ALTER TABLE `string`
ADD CONSTRAINT `string_prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
ADD CONSTRAINT `supp_comp_supp_id_fk` FOREIGN KEY (`company_id`) REFERENCES `supplier` (`company_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
