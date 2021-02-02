-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 02, 2021 at 02:18 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_clients`
--

DROP TABLE IF EXISTS `app_clients`;
CREATE TABLE IF NOT EXISTS `app_clients` (
  `ClientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`ClientId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses_categories`
--

DROP TABLE IF EXISTS `app_expenses_categories`;
CREATE TABLE IF NOT EXISTS `app_expenses_categories` (
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ExpenseName` varchar(30) NOT NULL,
  `FixedPayment` decimal(7,2) NOT NULL,
  PRIMARY KEY (`ExpenseId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_expenses_daily_list`
--

DROP TABLE IF EXISTS `app_expenses_daily_list`;
CREATE TABLE IF NOT EXISTS `app_expenses_daily_list` (
  `DExpenseId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ExpenseId` tinyint(3) UNSIGNED NOT NULL,
  `Payment` decimal(7,2) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`DExpenseId`),
  KEY `ExpenseId` (`ExpenseId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_notifications`
--

DROP TABLE IF EXISTS `app_notifications`;
CREATE TABLE IF NOT EXISTS `app_notifications` (
  `NotificationId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) NOT NULL,
  `Content` varchar(255) NOT NULL,
  `Type` tinyint(2) NOT NULL,
  `Created` datetime NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  `Seen` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`NotificationId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_piping_products`
--

DROP TABLE IF EXISTS `app_piping_products`;
CREATE TABLE IF NOT EXISTS `app_piping_products` (
  `ProductId` int(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(100) NOT NULL,
  `ProductDesc` text NOT NULL,
  `ProductImages` varchar(255) DEFAULT NULL,
  `ProductCat` varchar(255) DEFAULT NULL,
  `ProductOuterDia` varchar(255) NOT NULL,
  `ProductWallThk` varchar(255) NOT NULL,
  `ProductLength` varchar(255) NOT NULL,
  `ProductSurface` varchar(255) NOT NULL,
  `ProductTesting` varchar(255) NOT NULL,
  `ProductCertificates` varchar(255) NOT NULL,
  `ProductStandards` varchar(255) NOT NULL,
  `ProductGrades` varchar(255) NOT NULL,
  `ProductTable` varchar(255) NOT NULL,
  `ProductDatasheet` varchar(255) NOT NULL,
  `ProductDateReg` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_products_categories`
--

DROP TABLE IF EXISTS `app_products_categories`;
CREATE TABLE IF NOT EXISTS `app_products_categories` (
  `CategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) NOT NULL,
  `Image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_products_list`
--

DROP TABLE IF EXISTS `app_products_list`;
CREATE TABLE IF NOT EXISTS `app_products_list` (
  `ProductId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryId` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(30) DEFAULT NULL,
  `Quantity` smallint(5) UNSIGNED NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Unit` tinyint(1) NOT NULL,
  `BarCode` char(20) DEFAULT NULL,
  PRIMARY KEY (`ProductId`),
  KEY `CategoryId` (`CategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices`
--

DROP TABLE IF EXISTS `app_purchases_invoices`;
CREATE TABLE IF NOT EXISTS `app_purchases_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `SupplierId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `Created` date NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`InvoiceId`),
  KEY `SupplierId` (`SupplierId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_details`
--

DROP TABLE IF EXISTS `app_purchases_invoices_details`;
CREATE TABLE IF NOT EXISTS `app_purchases_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `ProductPrice` decimal(7,2) NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProductId` (`ProductId`),
  KEY `InvoiceId` (`InvoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_purchases_invoices_receipts`
--

DROP TABLE IF EXISTS `app_purchases_invoices_receipts`;
CREATE TABLE IF NOT EXISTS `app_purchases_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentAmount` decimal(8,2) NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAccountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferedTo` varchar(30) DEFAULT NULL,
  `Created` date NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ReceiptId`),
  KEY `InvoiceId` (`InvoiceId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices`
--

DROP TABLE IF EXISTS `app_sales_invoices`;
CREATE TABLE IF NOT EXISTS `app_sales_invoices` (
  `InvoiceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ClientId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentStatus` tinyint(1) NOT NULL,
  `Created` date NOT NULL,
  `Discount` decimal(8,2) DEFAULT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`InvoiceId`),
  KEY `ClientId` (`ClientId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_details`
--

DROP TABLE IF EXISTS `app_sales_invoices_details`;
CREATE TABLE IF NOT EXISTS `app_sales_invoices_details` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ProductId` int(10) UNSIGNED NOT NULL,
  `Quantity` smallint(6) NOT NULL,
  `ProductPrice` decimal(7,2) NOT NULL,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProductId` (`ProductId`),
  KEY `InvoiceId` (`InvoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_sales_invoices_receipts`
--

DROP TABLE IF EXISTS `app_sales_invoices_receipts`;
CREATE TABLE IF NOT EXISTS `app_sales_invoices_receipts` (
  `ReceiptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `InvoiceId` int(10) UNSIGNED NOT NULL,
  `PaymentType` tinyint(1) NOT NULL,
  `PaymentAmount` decimal(8,2) NOT NULL,
  `PaymentLiteral` varchar(60) NOT NULL,
  `BankName` varchar(30) DEFAULT NULL,
  `BankAccountNumber` varchar(30) DEFAULT NULL,
  `CheckNumber` varchar(15) DEFAULT NULL,
  `TransferedTo` varchar(30) DEFAULT NULL,
  `Created` date NOT NULL,
  `UserId` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`ReceiptId`),
  KEY `InvoiceId` (`InvoiceId`),
  KEY `UserId` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_suppliers`
--

DROP TABLE IF EXISTS `app_suppliers`;
CREATE TABLE IF NOT EXISTS `app_suppliers` (
  `SupplierId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`SupplierId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE IF NOT EXISTS `app_users` (
  `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` varchar(12) NOT NULL,
  `Password` char(60) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `SubscriptionDate` date NOT NULL,
  `LastLogin` datetime NOT NULL,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `Email` (`Email`),
  KEY `GroupId` (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`UserId`, `Username`, `Password`, `Email`, `PhoneNumber`, `SubscriptionDate`, `LastLogin`, `GroupId`, `Status`) VALUES
(1, 'admin', '$2a$07$yeNCSNwRpYopOhv0TrrReO0C4Wi7SyOYpdAtAYFfM4w.l4e6Q8jEW', 'admin@hotmail.com', '0100000002222', '2019-04-28', '2019-04-28 15:21:40', 1, 1),
(2, 'sayed', '$2a$07$yeNCSNwRpYopOhv0TrrReOunIisW1b8.JDsNKxyuF3O29C6ouWfCC', 'sayed@hotmail.com', '2454545', '2019-04-28', '2019-04-28 15:24:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups`
--

DROP TABLE IF EXISTS `app_users_groups`;
CREATE TABLE IF NOT EXISTS `app_users_groups` (
  `GroupId` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(20) NOT NULL,
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_groups`
--

INSERT INTO `app_users_groups` (`GroupId`, `GroupName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `app_users_groups_privileges`
--

DROP TABLE IF EXISTS `app_users_groups_privileges`;
CREATE TABLE IF NOT EXISTS `app_users_groups_privileges` (
  `Id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `GroupId` tinyint(1) UNSIGNED NOT NULL,
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `GroupId` (`GroupId`),
  KEY `PrivilegeId` (`PrivilegeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_users_privileges`
--

DROP TABLE IF EXISTS `app_users_privileges`;
CREATE TABLE IF NOT EXISTS `app_users_privileges` (
  `PrivilegeId` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Privilege` varchar(30) NOT NULL,
  `PrivilegeTitle` varchar(30) NOT NULL,
  PRIMARY KEY (`PrivilegeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_users_profiles`
--

DROP TABLE IF EXISTS `app_users_profiles`;
CREATE TABLE IF NOT EXISTS `app_users_profiles` (
  `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Image` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users_profiles`
--

INSERT INTO `app_users_profiles` (`UserId`, `FirstName`, `LastName`, `Address`, `DOB`, `Image`) VALUES
(1, 'adham', 'allam', NULL, NULL, NULL),
(2, 'sayed', 'allam', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_expenses_daily_list`
--
ALTER TABLE `app_expenses_daily_list`
  ADD CONSTRAINT `app_expenses_daily_list_ibfk_1` FOREIGN KEY (`ExpenseId`) REFERENCES `app_expenses_categories` (`ExpenseId`),
  ADD CONSTRAINT `app_expenses_daily_list_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_notifications`
--
ALTER TABLE `app_notifications`
  ADD CONSTRAINT `app_notifications_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_products_list`
--
ALTER TABLE `app_products_list`
  ADD CONSTRAINT `app_products_list_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `app_products_categories` (`CategoryId`);

--
-- Constraints for table `app_purchases_invoices`
--
ALTER TABLE `app_purchases_invoices`
  ADD CONSTRAINT `app_purchases_invoices_ibfk_1` FOREIGN KEY (`SupplierId`) REFERENCES `app_suppliers` (`SupplierId`),
  ADD CONSTRAINT `app_purchases_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_purchases_invoices_details`
--
ALTER TABLE `app_purchases_invoices_details`
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_products_list` (`ProductId`),
  ADD CONSTRAINT `app_purchases_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`);

--
-- Constraints for table `app_purchases_invoices_receipts`
--
ALTER TABLE `app_purchases_invoices_receipts`
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_purchases_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_purchases_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_sales_invoices`
--
ALTER TABLE `app_sales_invoices`
  ADD CONSTRAINT `app_sales_invoices_ibfk_1` FOREIGN KEY (`ClientId`) REFERENCES `app_clients` (`ClientId`),
  ADD CONSTRAINT `app_sales_invoices_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_sales_invoices_details`
--
ALTER TABLE `app_sales_invoices_details`
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `app_products_list` (`ProductId`),
  ADD CONSTRAINT `app_sales_invoices_details_ibfk_2` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`);

--
-- Constraints for table `app_sales_invoices_receipts`
--
ALTER TABLE `app_sales_invoices_receipts`
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_1` FOREIGN KEY (`InvoiceId`) REFERENCES `app_sales_invoices` (`InvoiceId`),
  ADD CONSTRAINT `app_sales_invoices_receipts_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);

--
-- Constraints for table `app_users`
--
ALTER TABLE `app_users`
  ADD CONSTRAINT `app_users_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`);

--
-- Constraints for table `app_users_groups_privileges`
--
ALTER TABLE `app_users_groups_privileges`
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `app_users_groups` (`GroupId`),
  ADD CONSTRAINT `app_users_groups_privileges_ibfk_2` FOREIGN KEY (`PrivilegeId`) REFERENCES `app_users_privileges` (`PrivilegeId`);

--
-- Constraints for table `app_users_profiles`
--
ALTER TABLE `app_users_profiles`
  ADD CONSTRAINT `app_users_profiles_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `app_users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
