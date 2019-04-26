-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 06:38 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easycard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `act_request.php` int(2) NOT NULL DEFAULT '0',
  `adds.php` int(2) NOT NULL DEFAULT '0',
  `cashout_request.php` int(2) NOT NULL DEFAULT '0',
  `category.php` int(2) NOT NULL DEFAULT '0',
  `dynamics.php` int(2) NOT NULL DEFAULT '0',
  `income_plan.php` int(2) NOT NULL DEFAULT '0',
  `index.php` int(2) NOT NULL DEFAULT '0',
  `offers.php` int(2) NOT NULL DEFAULT '0',
  `orders.php` int(2) NOT NULL DEFAULT '0',
  `products.php` int(2) NOT NULL DEFAULT '0',
  `returns.php` int(2) DEFAULT '0',
  `stock_orders.php` int(2) NOT NULL DEFAULT '0',
  `subadmin.php` int(2) DEFAULT '0',
  `support.php` int(2) NOT NULL DEFAULT '0',
  `transections.php` int(2) NOT NULL DEFAULT '0',
  `st_orders.php` int(2) NOT NULL DEFAULT '0',
  `pr_orders.php` int(2) NOT NULL DEFAULT '0',
  `stn_orders.php` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `number`, `password`, `act_request.php`, `adds.php`, `cashout_request.php`, `category.php`, `dynamics.php`, `income_plan.php`, `index.php`, `offers.php`, `orders.php`, `products.php`, `returns.php`, `stock_orders.php`, `subadmin.php`, `support.php`, `transections.php`, `st_orders.php`, `pr_orders.php`, `stn_orders.php`) VALUES
(1, '01813404900', 'f36050bd4158316a71612962b83ba030', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dynamics`
--

CREATE TABLE `dynamics` (
  `id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dynamics`
--

INSERT INTO `dynamics` (`id`, `content`, `value`, `description`) VALUES
(1, 'standerd_joining_min_pv', '25', 'Standerd joining minimum pv'),
(2, 'max_email', '7', 'Maximum account on one email'),
(3, 'premium_joining_min_pv', '50', 'Premium joining minimum pv'),
(4, 'stockiest_joining_min_pv', '2000', 'Stockiest joining minimum pv'),
(5, 'dealer_joining_min_pv', '10000', 'Premium joining minimum pv'),
(6, 'company_banner', 'shop-banner.jpg', 'Index page company banner'),
(7, 'helpline', '0111111111', 'Header Helpline Number'),
(8, 'side_banner_one', 'genuine_blog_1.png', 'Side Ad Banner one'),
(9, 'side_banner_two', 'genuine_blog_1.png', 'Side Ad Banner two'),
(10, 'from_stockiest_charge', '2', 'cashout from stockiest charge in percent'),
(11, 'min_withdraw', '50', 'Minimum withdrawals amount'),
(12, 'withdraw_charge', '1', 'Withdraw Charge in Percent');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(6) NOT NULL,
  `mobile_number` int(14) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `name` text,
  `mobile` varchar(11) DEFAULT NULL,
  `nid` int(25) DEFAULT NULL,
  `rf_card` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `mobile`, `nid`, `rf_card`, `password`, `gender`) VALUES
(2, 'asif', '01813404900', 5345345, '0', '912ec803b2ce49e4a541', 'Male'),
(9, 'Shariful Islam  Shajjad', '01952100400', 2147483647, '01813404900', 'f36050bd4158316a71612962b83ba030', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dynamics`
--
ALTER TABLE `dynamics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dynamics`
--
ALTER TABLE `dynamics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
