-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2018 at 09:34 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_bkp`
--

CREATE TABLE `admin_bkp` (
  `sid` int(11) NOT NULL,
  `sal` int(11) NOT NULL,
  `post` enum('Manager','Curator','Consultant','Sponsor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_bkp`
--

INSERT INTO `admin_bkp` (`sid`, `sal`, `post`) VALUES
(1, 10000, 'Curator'),
(4, 8200, 'Consultant'),
(6, 18000, 'Sponsor');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `art_id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL,
  `type` enum('P','S') DEFAULT NULL,
  `exhibit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`art_id`, `name`, `artist_id`, `price`, `year`, `quantity`, `type`, `exhibit_id`) VALUES
(1, 'Mona Lisa', 1, 5000, 0000, 1, 'P', NULL),
(2, 'Scream', 3, 11100, 2005, 2, 'P', NULL),
(3, 'starry night', 5, 6000, 1970, 3, 'P', NULL),
(4, 'the field', 2, 40000, 2011, 1, 'P', NULL),
(5, 'Egyptian cat', 5, 2000, 1998, 1, 'P', NULL),
(6, 'Aquarius', 5, 6500, 2001, 2, 'S', NULL),
(7, 'Sunset', 4, 7000, 2007, 2, 'S', NULL),
(8, 'Artemis', 4, 12750, 2010, 1, 'S', NULL),
(9, 'Angel', 2, 9800, 2003, 3, 'S', NULL),
(10, 'Hermit', 1, 15000, 2009, 1, 'S', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `fname` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `native` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `fname`, `dob`, `native`) VALUES
(1, 'Leonardo', '1400-04-02', 'Italy'),
(2, 'Valerie', '1953-11-17', 'Russia'),
(3, 'Michael', '2000-12-25', 'USA'),
(4, 'Tom', '2001-09-19', 'Norway'),
(5, 'Ivy', '1955-07-11', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `art_order`
--

CREATE TABLE `art_order` (
  `order_no` int(11) NOT NULL,
  `purchase_quantity` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `placement_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `delivery_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `art_view`
-- (See below for the actual view)
--
CREATE TABLE `art_view` (
`cust_id` int(11)
,`fname` varchar(20)
,`name` varchar(35)
);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `status` enum('PAID','PENDING','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `cust_id`, `art_id`, `status`) VALUES
(1, 4, 10, 'PAID'),
(2, 9, 2, 'PENDING'),
(3, 6, 5, 'PENDING'),
(4, 7, 3, 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `acc_no` int(20) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `acc_no`, `aid`) VALUES
(1, 123456, 1),
(2, 789456, 6);

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

CREATE TABLE `exhibition` (
  `exhibit_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exhibit_date` datetime NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maintain`
--

CREATE TABLE `maintain` (
  `maintain_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `exhibit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paintings`
--

CREATE TABLE `paintings` (
  `paint_id` int(11) NOT NULL,
  `medium` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paintings`
--

INSERT INTO `paintings` (`paint_id`, `medium`) VALUES
(1, 'Oil paints'),
(2, 'Charcoal'),
(3, 'water paints'),
(4, 'Oil paints'),
(5, 'Charcoal');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_no` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` int(20) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(11) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` bigint(10) NOT NULL,
  `admin` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`pid`, `fname`, `lname`, `dob`, `email`, `password`, `address`, `phone`, `admin`) VALUES
(0, 'Kiara', 'Knightley', '2018-10-04', 'kiara@gmail.in', 'abc123', NULL, 4564561236, 'Y'),
(1, 'Emmar', 'Black', '1953-10-17', 'lo@ko.in', 'loko', 'hbjmnk', 7778889191, 'Y'),
(2, 'Morgan', 'Stone', '1990-06-01', 'mstone@gmail.com', 'stone456', 'grey circle,greece', 7778889191, 'N'),
(3, 'Emma', 'Grace', '1953-10-17', 'grace@yahoo.com', 'egrace', 'Church Road,Chicago', 8965732454, 'Y'),
(4, 'Arnold', 'Rubens', '1972-08-12', 'rubens12@gmail.com', 'arbens', 'town square,Berlin', 9836521477, 'N'),
(5, 'Reshma', 'Nair', '1961-05-15', 'rnair@hotmail.com', 'nair61', 'Kochin,India', 7832568967, 'Y'),
(6, 'Neel', 'Mehra', '1972-08-19', 'mehra@yahoo.com', 'nm7289', 'Glass palace,Delhi', 7895632412, 'Y'),
(7, 'Pierre', 'Dupont', '1997-11-01', 'pdupont@yahoo.com', 'francenew', 'Nice,France', 7896321549, 'N'),
(8, 'Emmanuel', 'Stark', '1986-02-18', 'stark@gmail.com', 'ironman', 'crossroad,New York', 9655783261, 'N'),
(9, 'Rashid', 'Zebaan', '1977-11-09', 'rzrocks@yahoo.com', 'zebaan11', 'grand beach,Dubai', 7896325498, 'N'),
(10, '23', '23', '0002-02-22', '23@d.s', '23', NULL, 22, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sculptures`
--

CREATE TABLE `sculptures` (
  `sculp_id` int(11) NOT NULL,
  `weight` float(20,0) NOT NULL,
  `material_used` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sculptures`
--

INSERT INTO `sculptures` (`sculp_id`, `weight`, `material_used`) VALUES
(6, 700, 'brass'),
(7, 890, 'copper'),
(8, 500, 'gold'),
(9, 200, 'wood'),
(10, 350, 'brass');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `salary` int(20) NOT NULL DEFAULT '10000',
  `designation` enum('Curator','Manager','Consultant','Sponsor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `salary`, `designation`) VALUES
(1, 10000, 'Curator'),
(4, 8200, 'Consultant'),
(6, 18000, 'Sponsor');

--
-- Triggers `staff`
--
DELIMITER $$
CREATE TRIGGER `stf_bkp` AFTER INSERT ON `staff` FOR EACH ROW insert into admin_bkp(sid,sal,post) values(new.staff_id,new.salary,new.designation)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `art_view`
--
DROP TABLE IF EXISTS `art_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `art_view`  AS  select `c`.`cust_id` AS `cust_id`,`p`.`fname` AS `fname`,`a`.`name` AS `name` from ((`person` `p` join `art` `a`) join `customers` `c`) where ((`c`.`cust_id` = `p`.`pid`) and (`c`.`aid` = `a`.`art_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_bkp`
--
ALTER TABLE `admin_bkp`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `exhibit_id` (`exhibit_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `art_order`
--
ALTER TABLE `art_order`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `art_id` (`art_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `exhibition`
--
ALTER TABLE `exhibition`
  ADD PRIMARY KEY (`exhibit_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`maintain_id`),
  ADD KEY `exhibit_id` (`exhibit_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `paintings`
--
ALTER TABLE `paintings`
  ADD PRIMARY KEY (`paint_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_no`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sculptures`
--
ALTER TABLE `sculptures`
  ADD PRIMARY KEY (`sculp_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `art_order`
--
ALTER TABLE `art_order`
  MODIFY `order_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exhibition`
--
ALTER TABLE `exhibition`
  MODIFY `exhibit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`),
  ADD CONSTRAINT `art_ibfk_2` FOREIGN KEY (`exhibit_id`) REFERENCES `exhibition` (`exhibit_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`art_id`) REFERENCES `art` (`art_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `person` (`pid`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `art` (`art_id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `person` (`pid`);

--
-- Constraints for table `paintings`
--
ALTER TABLE `paintings`
  ADD CONSTRAINT `paintings_ibfk_1` FOREIGN KEY (`paint_id`) REFERENCES `art` (`art_id`);

--
-- Constraints for table `sculptures`
--
ALTER TABLE `sculptures`
  ADD CONSTRAINT `sculptures_ibfk_1` FOREIGN KEY (`sculp_id`) REFERENCES `art` (`art_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `person` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
