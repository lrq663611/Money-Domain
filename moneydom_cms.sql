-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2014 at 09:31 AM
-- Server version: 5.5.36-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moneydom_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`) VALUES
(1, 'Commomwealth Bank'),
(2, 'First Community Bank'),
(3, 'National Bank of Kenya'),
(4, 'Jamii Bora Bank'),
(5, 'CFC Stanbic Bank'),
(6, 'Family Bank'),
(7, 'Gulf African Bank'),
(8, 'Consolidated Bank of Kenya'),
(9, 'Trans National Bank'),
(10, 'Fidelity Commercial Bank'),
(11, 'Bank of Africa'),
(12, 'NIC Bank'),
(13, 'Oriental Commercial Bank'),
(14, 'Equatorial Commercial Bank');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(8) unsigned DEFAULT NULL,
  `top_level` tinyint(1) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `col1` varchar(50) DEFAULT NULL,
  `col2` varchar(50) DEFAULT NULL,
  `col3` varchar(50) DEFAULT NULL,
  `col4` varchar(50) DEFAULT NULL,
  `col5` varchar(50) DEFAULT NULL,
  `col6` varchar(50) DEFAULT NULL,
  `col7` varchar(50) DEFAULT NULL,
  `col8` varchar(50) DEFAULT NULL,
  `col9` varchar(50) DEFAULT NULL,
  `col10` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parent` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `top_level`, `name`, `col1`, `col2`, `col3`, `col4`, `col5`, `col6`, `col7`, `col8`, `col9`, `col10`) VALUES
(1, NULL, 1, 'Saving Accounts', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 1, 'Term Deposits\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 1, 'Loans\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, NULL, 'Ordinary Savings Accounts', 'Features/Benefits', 'Interest Rate P.a (%)', 'Min. Opening/Operating Balance (Kes)', 'Min. Interest Earning Balance (Kes)', 'Monthly Maintenance Fees (Kes)', 'Learn More ', '', '', '', ''),
(5, 1, NULL, 'Student Savings Accounts', 'Features/Benefits', 'Interest Rate P.a (%)', 'Min. Opening/Operating Balance (Kes)', 'Min. Interest Earning Balance (Kes)', 'Monthly Maintenance Fees (Kes)', 'Learn More ', '', '', '', ''),
(6, 1, NULL, 'Junior Savings Accounts', 'Features/Benefits', 'Interest Rate P.a (%)', 'Min. Opening/Operating Balance (Kes)', 'Min. Interest Earning Balance (Kes)', 'Monthly Maintenance Fees (Kes)', 'Learn More ', '', '', '', ''),
(7, 3, NULL, 'Car Loan', 'Description/Conditions', 'Interest Rate P.a (%)', 'Maximum Repayment Period (Months)', 'Processing Fees (% of Total Loan)', 'Learn More', '', '', '', '', ''),
(9, 2, NULL, '1month Term Deposits', 'Details', 'Interest Rate P.a (%)', 'Min. Investment/Opening Balance (Kes)', 'Min. Account Balance (Kes)', 'Payment Frequency', 'Learn More', '', '', '', ''),
(10, 1, NULL, 'Ladies Savings Accounts', 'Features/Benefits', 'Interest Rate P.a (%)', 'Min. Opening/Operating Balance (Kes)', 'Min. Interest Earning Balance (Kes)', 'Monthly Maintenance Fees (Kes)', 'Learn More ', '', '', '', ''),
(11, 1, NULL, 'Hajj Savings Accounts', 'Features/Benefits', 'Interest Rate P.a (%)', 'Min. Opening/Operating Balance (Kes)', 'Min. Interest Earning Balance (Kes)', 'Monthly Maintenance Fees (Kes)', 'Learn More ', '', '', '', ''),
(12, 1, NULL, 'Diaspora Savings Accounts', 'Features/Benefits', 'Interest Rate P.a (%)', 'Min. Opening/Operating Balance (Kes)', 'Min. Interest Earning Balance (Kes)', 'Monthly Maintenance Fees (Kes)', 'Learn More ', '', '', '', ''),
(14, 2, NULL, '2 Month Term Deposits', 'Details', 'Interest Rate P.a (%)', 'Min. Investment/Opening Balance (Kes)', 'Min. Account Balance (Kes)', 'Payment Frequency', 'Learn More ', '', '', '', ''),
(15, 3, NULL, 'Personal Loans (Unsecured)', 'Description/Conditions', 'Interest Rate P.a (%)', 'Maximum Repayment Period (Months)', 'Processing Fees (%of Total Loan)', 'Learn More', '', '', '', '', ''),
(16, 3, NULL, 'Personal Loans (Secured)', 'Description/Conditions', 'Interest Rate P.a (%)', 'Maximum Repayment Period (Months)', 'Processing Fees (%of Total Loan)', 'Learn More', '', '', '', '', ''),
(17, 3, NULL, 'Vehicle Loans (Diaspora)', 'Description/Conditions', 'Interest Rate P.a (%)', 'Maximum Repayment Period (Months)', 'Processing Fees (%of Total Loan)', 'Learn More', '', '', '', '', ''),
(18, 2, NULL, '3 Month Term Deposits', 'Details', 'Interest Rate P.a (%)', 'Min. Investment/Opening Balance (Kes)', 'Min. Account Balance (Kes)', 'Payment Frequency', 'Learn More ', '', '', '', ''),
(19, 2, NULL, '6 Month Term Deposits', 'Details', 'Interest Rate P.a (%)', 'Min. Investment/Opening Balance (Kes)', 'Min. Account Balance (Kes)', 'Payment Frequency', 'Learn More ', '', '', '', ''),
(20, 2, NULL, '9 Month Term Deposits', 'Details', 'Interest Rate P.a (%)', 'Min. Investment/Opening Balance (Kes)', 'Min. Account Balance (Kes)', 'Payment Frequency', 'Learn More ', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` int(8) unsigned DEFAULT NULL,
  `bank_id` int(8) unsigned DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `last_edit` int(11) DEFAULT NULL,
  `col1` varchar(500) DEFAULT NULL,
  `col2` varchar(500) DEFAULT NULL,
  `col3` varchar(500) DEFAULT NULL,
  `col4` varchar(500) DEFAULT NULL,
  `col5` varchar(500) DEFAULT NULL,
  `col6` varchar(500) DEFAULT NULL,
  `col7` varchar(500) DEFAULT NULL,
  `col8` varchar(500) DEFAULT NULL,
  `col9` varchar(500) DEFAULT NULL,
  `col10` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cat` (`cat_id`),
  KEY `fk_bank` (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `bank_id`, `name`, `last_edit`, `col1`, `col2`, `col3`, `col4`, `col5`, `col6`, `col7`, `col8`, `col9`, `col10`) VALUES
(1, 6, 13, 'Ndoto Junior Account', 1405652080, '<ul><li>No maintenance charges</li><li>Free quarterly statement</li><li>One withdrawal per month</li><li>3 free bankers cheques for fees each term</li>', '3.5', '5000', '5000', '0', '<a href="http://www.commbank.com.au">Go to site</a>', '', '', '', ''),
(2, 6, 3, 'Vision Account', 1405727190, '<ul><li>Membership to vision account club</li><li>Receive free gift when you open the account</li>', 'up to 5.5', '500/500', '?', '0', '<a href="http://www.commbank.com.au">Go to site</a>', '', '', '', ''),
(3, 6, 12, 'Young Movers Savings Account', 1405652632, '<ul><li>Zero charges for incoming transfers</li><li>Zero monthly ledger fees</li><li>Free half annual statement</li><li>Mobile and internet banking</li><li>', '?', '2000/2000', '5000', '?', '<a href="http://www.commbank.com.au">Go to site</a>', '', '', '', ''),
(4, 10, 9, 'Mrembo Account', 1405728417, '<ul><li>Receive a cheque book</li><li>ATM card issued</li><li>Free internet banking</li><li>Free monthly statements</li><li>Access Chapaa Popote service</li></ul>', '?', '2,000/?', '1,000', '?', '<a href="http://www.commbank.com.au">Go to site</a>', '', '', '', ''),
(5, 10, 7, 'ANNISAA', 1405728736, '<ul><li>Access discounts at select partner outlets</li><li>Priority service at Annisaa centres or tellers</li><li>Get Visa ATM, debit card and free internal standing order</li></ul>', '?', '2,000/2,000', '10,000', '?', '<a href="http://www.commbank.com.au">Go to site</a>', '', '', '', ''),
(6, 5, 11, 'Student Savings Accounts', 1406097505, '<ul><li>Suitable for college and university students 18-25yrs</li><li>Withdrawals restricted only to ATMS</li><li>Receive half yearly statements</li><li>Get Kes 100 for school fees bankers cheques</li></ul>', '?', '500/500', '5,000', '?', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(7, 5, 9, 'Msomi Account', 1405729785, '<ul><li>No opening balance</li><li>No minimum balance</li><li>Receive an ATM card</li><li>Access free internet banking</li></ul>', '?', '0/0', '?', '?', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(8, 11, 2, 'Labbeyk Account', 1405730210, '<ul><li>Zero maintenance fees</li><li>Receive Hajj gift pack</li><li>Get free half yearly statement</li></ul>', '?', '1,000/1,000', '3,000', '0', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(9, 11, 7, 'Hajj Account', 1405730423, '<ul><li>No ledger or monthly service charges</li><li>Free standing orders into Hajj account</li><li>Profit paid quarterly into accounts</li></ul>', '?', '1,000/1,000', '10,000', '0', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(10, 12, 5, 'Heartland Account (Diaspora)', 1405731306, '<ul><li>Free money transfer from Heartland Acc to your international Acc</li><li>Free monthly statement</li><li>Account available in USD, GBP, EUR, ZAR, or KES</li><li>Zero commission trading in foreign currency</li><li>Zero monthly service fees for maintaining bank balance of Kes 155,000 or equivalent</li></ul>', '?', '5,000/0', '?', '?', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(11, 12, 7, 'Diaspora Savings Accounts', 1405731551, '<ul><li>Zero monthly maintenance and ledger fees</li><li>Preferential rates on foreign exchange</li><li>Access mortgage  financing</li></ul>', '?', '1,000/1,000', '10,000', '0', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(12, 4, 10, 'Fidelity Commercial Bank', 1405732009, '<ul><li>Opening balance as little as Kes 1,000</li><li>Minimum interest earning balance Kes 2,500</li></ul>', '3', '1000/?', '2,500', '?', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(13, 4, 4, 'Bora Savings Account', 1405732498, '<ul><li>Suitable for individuals with regular income</li><li>One monthly withdrawal</li><li>Access savings -linked to life insurance cover at Kes 365 p.a</li></ul>', '?', '1,000/500', '?', '0', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(14, 9, 2, 'Invest Plus', 1406097379, '<ul><li>Option of reinvesting the interest</li><li>Minimum deposit of Kes 50,000, USD 1,000, GBP 1,000 and EUR 1,000</li></ul>', '?', '50,000', '?', 'Maturity', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(15, 9, 10, 'Fixed Deposit Account', 1405927607, 'Minimum deposit or investment of Kes 100,000 is required', '?', '100,000', '?', '?', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(16, 14, 10, 'Fixed Deposit Account', 1405733878, '<ul><li>Minimum deposit or investment of Kes. 100,000 is required</li></ul>', '?', '100,000', '?', '?', '<a href="http://www.yoursite.com.au">Go to site</a>', '', '', '', ''),
(17, 14, 6, 'Fixed Deposit Account', 1405734069, '<ul><li>Access loans up to 90% the deposit amount at lower interest rates</li><li>Option to pre-arrange automatic roll over upon maturity</li></ul>', '?', '30,000', '?', 'Maturity', '<a href="http://www.commbank.com.au">Go to site</a>', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'moneydom', 'f00a1b31562eb685d6c727447d4f7380');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_parent` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_bank` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
