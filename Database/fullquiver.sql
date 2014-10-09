-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2014 at 10:28 PM
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
  `product_id` int(11) NOT NULL,
  `style` varchar(75) NOT NULL,
  `weight` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `range` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL,
  `class` varchar(25) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `e_address` varchar(100) NOT NULL,
  `street_add` varchar(100) NOT NULL,
  `apt_num` varchar(75) DEFAULT NULL,
  `postal_code` varchar(25) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `phone_num` varchar(25) NOT NULL,
  `u_name` varchar(25) DEFAULT NULL,
  `p_word` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gear`
--

CREATE TABLE IF NOT EXISTS `gear` (
  `product_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `model` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL,
  `date_placed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `order`
--
DELIMITER //
CREATE TRIGGER `Example_Trigger` BEFORE INSERT ON `order`
 FOR EACH ROW BEGIN
	if  new.date_placed = '2012-12-12' then
       SIGNAL SQLSTATE '45000'   
       SET MESSAGE_TEXT = 'Cannot add or update row: only';
	end if; 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_customer`
--

CREATE TABLE IF NOT EXISTS `order_customer` (
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `skill_level` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `color` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `bow_style` varchar(100) DEFAULT NULL,
  `bow_weight` int(11) DEFAULT NULL,
  `bow_material` varchar(100) DEFAULT NULL,
  `bow_range` int(11) DEFAULT NULL,
  `scope_diameter` decimal(10,0) DEFAULT NULL,
  `scope_length` int(11) DEFAULT NULL,
  `scope_magnification` decimal(10,0) DEFAULT NULL,
  `scope_num_pins` int(11) DEFAULT NULL,
  `stand_height` int(11) DEFAULT NULL,
  `string_style` varchar(100) DEFAULT NULL,
  `string_diameter` decimal(10,0) DEFAULT NULL,
  `string_strand_count` int(11) DEFAULT NULL,
  `gear_size` int(11) DEFAULT NULL,
  `gear_gender` varchar(1) DEFAULT NULL,
  `gear_model` varchar(100) DEFAULT NULL,
  `gear_type` varchar(25) DEFAULT NULL,
  `gear_style` varchar(25) DEFAULT NULL,
  `quiver_model` varchar(25) DEFAULT NULL,
  `quiver_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='A table used to hold all of the products.';

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `promotion_id` int(11) NOT NULL,
  `promotion_name` varchar(250) NOT NULL,
  `discount_percent` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiver`
--

CREATE TABLE IF NOT EXISTS `quiver` (
  `product_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scope`
--

CREATE TABLE IF NOT EXISTS `scope` (
  `product_id` int(11) NOT NULL,
  `diameter` decimal(10,0) NOT NULL,
  `length` int(11) NOT NULL,
  `magnification` decimal(10,0) NOT NULL,
  `num_pins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stand`
--

CREATE TABLE IF NOT EXISTS `stand` (
  `product_id` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `string`
--

CREATE TABLE IF NOT EXISTS `string` (
  `product_id` int(11) NOT NULL,
  `style` varchar(75) NOT NULL,
  `diameter` decimal(10,0) NOT NULL,
  `strand_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `phone_num` varchar(25) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contact`
--

CREATE TABLE IF NOT EXISTS `supplier_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_phone_num` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `gear`
--
ALTER TABLE `gear`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_customer`
--
ALTER TABLE `order_customer`
 ADD PRIMARY KEY (`order_id`,`cust_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`), ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
 ADD PRIMARY KEY (`promotion_id`), ADD UNIQUE KEY `promotion_name` (`promotion_name`);

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
 ADD PRIMARY KEY (`supplier_id`), ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `supplier_contact`
--
ALTER TABLE `supplier_contact`
 ADD PRIMARY KEY (`contact_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
