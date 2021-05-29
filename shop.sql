-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2019 at 07:51 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `book-rent`
--

CREATE TABLE `book-rent` (
  `due_date` date NOT NULL,
  `return_date` date NOT NULL,
  `issue` varchar(50) NOT NULL,
  `std_id` varchar(11) NOT NULL,
  `b_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` char(30) NOT NULL,
  `bname` char(50) NOT NULL,
  `btype` varchar(100) DEFAULT NULL,
  `pub_name` char(50) DEFAULT NULL,
  `buyprice` float DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `bname`, `btype`, `pub_name`, `buyprice`, `image`) VALUES
('eee', 'international law', 'Law', 'sufi', 400, '0a67e8c8fdb1dd8411f3cabf32c89876.jpg'),
('h23', 'muslim', 'English', 'bengal', 270, '06f514002b004c48984041154b467c77.jpg'),
('hh', 'hp', 'Engineering', 'sufi', 150, '8343fa92588e57eb80abe26e267304d5.jpg'),
('p-1', 'das', 'dsf', 'asd', 100, ''),
('p-100', 'potato', 'Grocery', 'n/a', 18, '183965ea6c21f1d152f11f008f1a9af7.jpg'),
('p-2', 'das', 'dsf', 'asd', 200, ''),
('p-3', 'das', 'dsf', 'asd', 150, ''),
('rr', 'dark', 'Law', 'bengal', 400, '2d3178761c481f927d795b8eaad0ad71.jpg'),
('toy', 'strory', 'Law', 'bengal', 270, 'a0ee90e3ad22dcdaa2328add7c650bd6.jpg'),
('www', 'Hindu law', 'Engineering', 'bengal', 270, '669aa19f05547daa4db93be09337cbd6.jpg'),
('yy', 'Hindu law', 'Law', 'bengal', 150, 'bed5a8740465a38471acfcb7cc1ce99b.jpg'),
('yy1', 'labor law', 'Law', 'bengal', 400, 'c192f35bfbf186900090ea8b997b82a9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `order_id` char(30) NOT NULL,
  `b_id` char(30) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`order_id`, `b_id`, `quantity`, `total`) VALUES
('o-1', 'p-1', 2, 300),
('o-1', 'p-2', 2, 500),
('O-237', 'hh', 1, 150),
('O-414', 'p-1', 33, 3300);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `b_id` char(30) NOT NULL,
  `sellingPrice` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`b_id`, `sellingPrice`, `quantity`) VALUES
('eee', 130, 120),
('h23', 500, 170),
('hh', 300, 1000),
('p-1', 150, -249),
('p-100', 500, 170),
('p-2', 250, 48),
('p-3', 350, 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` char(30) NOT NULL,
  `name` char(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` char(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `name`, `address`, `gender`, `mobile`, `dob`, `email`, `password`) VALUES
('c-1', 'fsdf', 'ctg', '', 3467, '0000-00-00', 'dfgsgsd', ''),
('c-1000', 'hasan', 'dhaka', 'male', 1776868, '0000-00-00', 'mehedi249@gmail.com', '1234'),
('c-1001', 'mehedi', 'chittagong', 'male', 989878, '0000-00-00', 'mehedih256@gmail.com', '12345'),
('c-1002', 'hasan', 'dhaka', 'male', 456867856, '0000-00-00', 'mehedi249@gmail.com', '12345'),
('c-1003', 'dddd', 'dhaka', 'male', 2147483647, '2000-02-21', 'mehedi249@gmail.com', ''),
('c-1005', 'fssgagasd', 'chittagong', 'male', 1776868, '1990-03-01', 'mehedih256@gmail.com', ''),
('c-12', 'dfgsdfhfgh', 'dhaka', 'male', 1776868, '2000-12-12', 'dfghdf', ''),
('c-2', 'fsdf', 'ctg', '', 3467, '0000-00-00', 'dfgsgsd', ''),
('c-20', 'minhaz', 'ctg', 'female', 1873457389, '2019-11-06', 'minhazic78@gmail.com', '12345'),
('c-29', 'rihan', 'dhaka', 'male', 1098309230, '2019-11-07', 'tola', '12345'),
('c-3', 'fsdf', 'ctg', '', 3467, '0000-00-00', 'dfgsgsd', ''),
('c-35', 'sdjjhsdjh', 'dhaka', 'male', 1776868, '2019-10-01', 'mehedih256@gmail.com', '12345'),
('c-47', 'Mohammad Minhaz  uddin', 'chittagong', 'male', 1815140873, '2019-11-15', 'minhazic78@gmail.com', '1234554'),
('c-62', 'Mohammad Minhaz  uddin', 'chittagong', 'male', 1815140873, '2019-11-08', 'minhazic78@gmail.com', '12345687'),
('c-79', 'mehedi', 'dhaka', 'male', 989878, '2019-10-01', 'mehedi249@gmail.com', '12345'),
('c-80', 'gsdfgs', 'chittagong', 'male', 2147483647, '2019-10-01', 'mehedi249@gmail.com', '12345'),
('c-90', 'rihan', 'dhaka', 'male', 1098309230, '2019-11-07', 'tola', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student_order`
--

CREATE TABLE `student_order` (
  `order_id` char(30) NOT NULL,
  `std_id` char(30) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_order`
--

INSERT INTO `student_order` (`order_id`, `std_id`, `order_date`, `status`) VALUES
('o-1', 'c-1', '2019-09-28', 1),
('o-2', 'c-1', '2019-09-28', 0),
('O-237', 'c-90', '0000-00-00', 0),
('o-3', 'c-2', '2019-09-28', 0),
('O-414', 'c-90', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`order_id`,`b_id`),
  ADD KEY `fk_porder` (`b_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`b_id`) USING BTREE;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `student_order`
--
ALTER TABLE `student_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order` (`std_id`),
  ADD KEY `cus_id` (`std_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `fk_cusorder` FOREIGN KEY (`order_id`) REFERENCES `student_order` (`order_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_porder` FOREIGN KEY (`b_id`) REFERENCES `store` (`b_id`) ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `fk_store` FOREIGN KEY (`b_id`) REFERENCES `books` (`b_id`) ON UPDATE CASCADE;

--
-- Constraints for table `student_order`
--
ALTER TABLE `student_order`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`std_id`) REFERENCES `student` (`std_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
