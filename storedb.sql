-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 15, 2021 at 08:25 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET FOREIGN_KEY_CHECKS=0;
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
-- Table structure for table `app_fields`
--

DROP TABLE IF EXISTS `app_fields`;
CREATE TABLE IF NOT EXISTS `app_fields` (
  `FieldId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FieldName` varchar(60) NOT NULL,
  `FieldImage` varchar(42) DEFAULT NULL,
  `FieldDesc` text,
  `FieldChildCat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FieldId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_fields`
--

INSERT INTO `app_fields` (`FieldId`, `FieldName`, `FieldImage`, `FieldDesc`, `FieldChildCat`) VALUES
(1, 'Piping &amp; Tubing', 'cglwaw_5nlwvu_z2luzw_vyaw5n_xzu3mc.jpg', 'When you need structural based solutions specifically steel tubing, pipes and hollow sections (CHS, SHS and RHS), look no further. Qatar Steel Industries factory is the leading steel pipe supplier in Qatar. Our product line meets the strictest quality checks which make us the number one pipe manufacturer in the region. Our tubes, pipes and hollow section are sourced and made from the best of raw material,&quot;\r\n            ', NULL),
(2, 'Pumpd &amp; Motors', 'uhvtch_mmtw90_b3jzie_ljb24u_cg5njd.png', 'Pump is a machine or mechanical equipment which is required to lift liquid from low level to high level or to flow liquid from low pressure area to high pressure area or as a booster in a piping network system.\r\n\r\nPrincipally, pump converts mechanical energy of motor into fluid flow energy.\r\n\r\nPump also can be used in process operations that requires a high hydraulic pressure. This can be seen in heavy duty equipment&rsquo;s. Often heavy duty equipment&rsquo;s requires a high discharge pressure and a low suction pressure. Due to low pressure at suction side of pump, fluid will lift from certain depth, whereas due to high pressure at discharge side of pump, it will push fluid to lift until reach desired height.', NULL),
(3, 'Instrumentys &amp; Sensors', 'sw5zdh_j1bwvu_dhnjy2_9ulnbu_zyqyys.png', 'An instrument is a device that measures or manipulates process physical variables such as flow, temperature, level, or pressure etc. ... Instruments often comprise control systems of varied processes. The control of processes is one of the main branches of applied instrumentation.&quot;\r\n            &quot;\r\n            &quot;\r\n            ', NULL),
(4, 'Valves &amp; Flow Control', 'dmfsdm_utawnv_bi5wbm_ckmmek_mdckew.png', 'Flow control valves come in all shapes, sizes, and designs. Their basic function, however, is the same&mdash;to control flow of air. Flow control valves for hydraulic systems (liquids under pressure) are of the same basic design. A typical example of a flow control valve is the simple water faucet installed in homes.', NULL);

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
  `ProductTables` varchar(255) NOT NULL,
  `ProductDatasheet` varchar(255) NOT NULL,
  `ProductDateReg` char(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_piping_products`
--

INSERT INTO `app_piping_products` (`ProductId`, `ProductName`, `ProductDesc`, `ProductImages`, `ProductCat`, `ProductOuterDia`, `ProductWallThk`, `ProductLength`, `ProductSurface`, `ProductTesting`, `ProductCertificates`, `ProductStandards`, `ProductGrades`, `ProductTables`, `ProductDatasheet`, `ProductDateReg`, `UserId`) VALUES
(12, 'dshgfhfg', '            fhgmLorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore sint harum dolores. Ratione nostrum nobis at tempore repellat consequatur impedit, voluptates fuga, quidem sed voluptate perspiciatis esse qui mollitia. Minus, aperiam. Cupiditate, eaque. Adipisci non nostrum quam consequuntur eos nobis, atque cupiditate libero, dolores voluptas culpa eveniet, enim inventore perspiciatis', 'mjaxnd_qxnzm4_nzm3lm_pwzyqy_ysqwny.jpg|mjaxnd_qxnzy5_mdu5lm_pwzyqy_ysqwny.jpg|mjaxnd_qxnzc0_mde5lm_pwzyqy_ysqwny.jpg|mjaxnd_qxnzgw_ntyylm_pwzyqy_ysqwny.jpg', 'Hollow Section Tubes|Scaffolding Tube', 'From bvng To gfhjh', 'From tt To 55', 'From 5 To 5', 'Fusion bond Epoxy coating, Bitumen Coating', 'Chemical Component Analysis, Mechanical Properties (Ultimate tensile strength, Impact Test', 'API 5L, EN10219', 'API 5CT, ASTM A252, EN10219', '{\"API_5L\":[\"GR A\",\"GR B\",\"X42\"],\"ASTM_A252\":[\"GR 1\",\"GR 2\",\"GR 3\"],\"ASTM_53\":[\"GR A\",\"GR B\",\"GR C\"],\"EN\":[\"S275JR\"],\"BS_4360\":[\"Grade 43\",\"Grade 50\"],\"ASME\":[\"ASME\"]}', 'mjaxnd_a0mtcw_otm3mz_mzndmz_mzquan.jpg', 'svmxmj_v4mtaw_ltmxns_atzgf0_ysbzag.pdf', '2021-Feb-03 Wed, 09:02:44', 1),
(13, 'sgdd', '            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore sint harum dolores. Ratione nostrum nobis at tempore repellat consequatur impedit, voluptates fuga, quidem sed voluptate perspiciatis esse qui mollitia. Minus, aperiam. Cupiditate, eaque. Adipisci non nostrum quam consequuntur eos nobis, atque cupiditate libero, dolores voluptas culpa eveniet, enim inventore perspiciatis', 'rfndxz_ayodcu_slbhjd_jhjda3_jhlltk.jpg|rfndxz_ayodgu_slbhjd_jhjda3_jhlltk.jpg|rfndxz_ayodku_slbhjd_jhjda3_jhlltk.jpg|rvjxmj_axndqx_nzk3nz_i4lmpw_zyqyys.jpg', 'Welded Pipes|SSAW Steel Pipes', 'From d To d', 'From e To r', 'From t To y', 'Fusion bond Epoxy coating, Coal Tar Epoxy, 3PE', 'Impact Test, X-ray Test', 'API 5L, EN10219', 'JIS, IS', '{\"API_5L\":[\"GR B\",\"X42\"],\"ASTM_A252\":[\"GR 2\",\"GR 3\"],\"ASTM_53\":[\"GR C\"],\"EN\":[\"S275JR\",\"S355JRH\"],\"ASME\":[\"ASME\"]}', 'rvjxvg_fibguu_anbnjd_jhjda3_jhlltk.jpg', 'tglhbm_nozw5n_ifb1bx_atsvmg_chvtcc.pdf', '2021-Feb-04 Thu, 05:02:25', 1),
(14, 'hgfkhiyiiottl', '            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore sint harum dolores. Ratione nostrum nobis at tempore repellat consequatur impedit, voluptates fuga, quidem sed voluptate perspiciatis esse qui mollitia. Minus, aperiam. Cupiditate, eaque. Adipisci non nostrum quam consequuntur eos nobis, atque cupiditate libero, dolores voluptas culpa eveniet, enim inventore perspiciatis', 'rfndxz_ayodcu_slbhjd_jhjda3_jhlltk.jpg|rfndxz_ayodgu_slbhjd_jhjda3_jhlltk.jpg|rfndxz_ayodku_slbhjd_jhjda3_jhlltk.jpg|rvjxmj_axndqx_nzk3nz_i4lmpw_zyqyys.jpg', 'Welded Pipes|SSAW Steel Pipes', 'From d To d', 'From e To r', 'From t To y', 'Fusion bond Epoxy coating, Coal Tar Epoxy, 3PE', 'Impact Test, X-ray Test', 'API 5L, EN10219', 'JIS, IS', '{\"API_5L\":[\"GR B\",\"X42\"],\"ASTM_A252\":[\"GR 2\",\"GR 3\"],\"ASTM_53\":[\"GR C\"],\"EN\":[\"S275JR\",\"S355JRH\"],\"ASME\":[\"ASME\"]}', 'rvjxvg_fibguu_anbnjd_jhjda3_jhlltk.jpg', 'tglhbm_nozw5n_ifb1bx_atsvmg_chvtcc.pdf', '2021-Feb-04 Thu, 05:02:25', 1),
(15, 'gfdggjkhoopui', '            fhgmLorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore sint harum dolores. Ratione nostrum nobis at tempore repellat consequatur impedit, voluptates fuga, quidem sed voluptate perspiciatis esse qui mollitia. Minus, aperiam. Cupiditate, eaque. Adipisci non nostrum quam consequuntur eos nobis, atque cupiditate libero, dolores voluptas culpa eveniet, enim inventore perspiciatis', 'mjaxnd_qxnzm4_nzm3lm_pwzyqy_ysqwny.jpg|mjaxnd_qxnzy5_mdu5lm_pwzyqy_ysqwny.jpg|mjaxnd_qxnzc0_mde5lm_pwzyqy_ysqwny.jpg|mjaxnd_qxnzgw_ntyylm_pwzyqy_ysqwny.jpg', 'Hollow Section Tubes|Scaffolding Tube', 'From bvng To gfhjh', 'From tt To 55', 'From 5 To 5', 'Fusion bond Epoxy coating, Bitumen Coating', 'Chemical Component Analysis, Mechanical Properties (Ultimate tensile strength, Impact Test', 'API 5L, EN10219', 'API 5CT, ASTM A252, EN10219', '{\"API_5L\":[\"GR A\",\"GR B\",\"X42\"],\"ASTM_A252\":[\"GR 1\",\"GR 2\",\"GR 3\"],\"ASTM_53\":[\"GR A\",\"GR B\",\"GR C\"],\"EN\":[\"S275JR\"],\"BS_4360\":[\"Grade 43\",\"Grade 50\"],\"ASME\":[\"ASME\"]}', 'mjaxnd_a0mtcw_otm3mz_mzndmz_mzquan.jpg', 'svmxmj_v4mtaw_ltmxns_atzgf0_ysbzag.pdf', '2021-Feb-03 Wed, 09:02:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_products_categories`
--

DROP TABLE IF EXISTS `app_products_categories`;
CREATE TABLE IF NOT EXISTS `app_products_categories` (
  `CategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(30) NOT NULL,
  `CategoryDesc` text NOT NULL,
  `CategoryImage` varchar(50) DEFAULT NULL,
  `CategoryField` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`CategoryId`),
  KEY `CategoryField` (`CategoryField`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_products_categories`
--

INSERT INTO `app_products_categories` (`CategoryId`, `CategoryName`, `CategoryDesc`, `CategoryImage`, `CategoryField`) VALUES
(8, 'Welded Steel Pipes', 'Welded steel pipe is one pipe the surface has the steel pipe joint,which is use the steel belt or steel plate material through the bending deformation into round ,square ect then welded into shape. \r\nWelded steel pipes products are widely used in boilers, automobiles, ship building lightweight structural steel of the doors and windows, furniture, agricultural machinery, scaffolding, wire conduit, top shelves, containers, etc.. which can meet customer requirements, the special specifications welded pipe can be processed according to user requirements. Welded pipes for conveying water, sewage, gas, air, heating, steam and other low-pressure fluid and other uses. \r\nAccording to different welding methods can be divided into electric arc welding pipe, the high frequency or low frequency electric resistance welded pipe and gas welding pipe, furnace welding pipe , bondi pipe, etc. \r\nElectric Resistance Welded steel pipe used in oil drilling and machinery manufacturing, etc. \r\nFurnace pipe welding pipe can be used for water gas pipe, etc . \r\nLongitudinal Submerge-arc Welded used for high pressure straight oil and gas transportation etc. \r\nSpiral welded pipe used for the oil and gas transmission, and pipe pile etc. ', 'bwpheg_5kx3f4_bnptnf_9uem0z_bg1fch.jpg', 1),
(9, 'Seamless Streel Pipe', 'Seamless steel pipe (SMLS) is formed by drawing a solid billet over a piercing rod to create the hollow shell, without welding or seam. It is suitable for bending and flanging. The most advantage is increasing the ability of withstanding higher pressure. So it is widely used for boiler and pressure vessel, automotive area, oil well, and equipment components.\r\n\r\nSeamless steel pipe can be cut, threaded or grooved. And the coating method includes black / red lacquer, varnish painting, hot dip galvanization, etc', 'u2vhbw_xlc3mt_c3rlzw_wtcglw_zs5qcg.jpg', 1),
(10, 'Oil COuntry Tubular Goods', 'The term Oil Country Tubular Goods describes tubes that are used in oil and gas production: As a rule these include drill pipe, casing and tubing.\r\n\r\nOil Country Tubular Goods are used both onshore and offshore. In the industry, they are also referred to by the acronym OCTG (for &ldquo;Oil Country Tubular Goods&rdquo;). Each wellbore proceeds in multiple phases, during which\r\n\r\n    drill pipe, casing (lines the wellbore), and tubing (delivery or production tubes that transport the oil and gas to the surface) \r\n\r\nare used alternately. With voestalpine Tubulars GmbH &amp; Co KG, voestalpine has an experienced and reputable OCTG manufacturer in the Group. The company, which is based in Kindberg, Austria, is a world leader in high-strength, seamless Oil Country Tubular Goods.&quot;\r\n            ', 't0nury_5wbmck_mmekmd_ckewvo_q1nod1.png', 1),
(11, 'Holloow Section Tube', 'HSS is sometimes mistakenly referenced as hollow structural steel. Rectangular and square HSS are also commonly called tube steel or box section. Circular HSS are sometimes mistakenly called steel pipe, although true steel pipe is actually dimensioned and classed differently from HSS. (HSS dimensions are based on exterior dimensions of the profile; pipes are also manufactured to an exterior tolerance, albeit to a different standard.) The corners of HSS are heavily rounded, having a radius which is approximately twice the wall thickness. The wall thickness is uniform around the section.\r\n\r\nIn the UK, or other countries which follow British construction or engineering terminology, the term HSS is not used. Rather, the three basic shapes are referenced as CHS, SHS, and RHS, being circular, square, and rectangular hollow sections. Typically, these designations will also relate to metric sizes, thus the dimensions and tolerances differ slightly from HSS.&quot;\r\n            ', 'sfntlm_pwzyqy_ysqwny_r5zu5d_u053un.jpg', 1),
(12, 'Pipe Fittings &amp; Flanges', 'Pipe fittings are components used to join pipe sections together with other fluid control products like valves and pumps to create pipelines. The common connotation for the term fittings is associated with the ones used for metal and plastic pipes which carry fluids. There are also other forms of pipe fittings that can be used to connect pipes for handrails and other architectural elements, where providing a leak-proof connection is not a requirement. Pipe fittings may be welded or threaded, mechanically joined, or chemically adhered, to name the most common mechanisms, depending on the material of the pipe.', 'yxnzb3_j0bwvu_dc1vzi_1waxbl_lwzpdh.jpg', NULL);

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
-- Table structure for table `app_product_props`
--

DROP TABLE IF EXISTS `app_product_props`;
CREATE TABLE IF NOT EXISTS `app_product_props` (
  `PXId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PXName` varchar(30) NOT NULL,
  `PXProp` text NOT NULL,
  PRIMARY KEY (`PXId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_product_props`
--

INSERT INTO `app_product_props` (`PXId`, `PXName`, `PXProp`) VALUES
(1, 'length', '{\"Type\":\"text\",\"Values\":[\"Type the length value and the unit like (12 mtr) Or (1200 mm)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(2, 'width', '{\"Type\":\"text\",\"Values\":[\"Type the width value and the unit like (10cm) Or (100 mm)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(3, 'height', '{\"Type\":\"text\",\"Values\":[\"Type the height value and the unit like (1.20 mtr) Or (1200 mm)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(4, 'pressure', '{\"Type\":\"text\",\"Values\":[\"Type the Pressure Value and the unit like (16 bar)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(6, 'wrong', '{\"Type\":\"text\",\"Values\":[\"hf\",\" jt\",\" uy\",\" io\",\" pkgj\",\" dgh\"],\"Default\":[\"dgh\"],\"ApplyMultiple\":\"off\"}'),
(7, 'Outer_Diameter', '{\"Type\":\"text\",\"Values\":[\"Type The Outer Dimension With Unit Like (200mm Or 8in)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(8, 'Inner_Diamenter', '{\"Type\":\"text\",\"Values\":[\"Type The Inner Diameter With Unit Like (200mm OR 8in)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(9, 'flow', '{\"Type\":\"text\",\"Values\":[\"Specify Flow Value with Measuring Unit Like (120Mtr Or 300Yrd)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}'),
(10, 'effeciency', '{\"Type\":\"text\",\"Values\":[\"Specify The Value of Effeciency Like (80%)\"],\"Default\":[\"\"],\"ApplyMultiple\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `app_product_scheme`
--

DROP TABLE IF EXISTS `app_product_scheme`;
CREATE TABLE IF NOT EXISTS `app_product_scheme` (
  `PSId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PSName` varchar(255) NOT NULL,
  PRIMARY KEY (`PSId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_product_scheme`
--

INSERT INTO `app_product_scheme` (`PSId`, `PSName`) VALUES
(2, 'Piping &amp; Tubing | Welded Steel Pipes | SSAW');

-- --------------------------------------------------------

--
-- Table structure for table `app_product_scheme_props`
--

DROP TABLE IF EXISTS `app_product_scheme_props`;
CREATE TABLE IF NOT EXISTS `app_product_scheme_props` (
  `PSPId` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `SchemeId` int(10) UNSIGNED NOT NULL,
  `PropId` int(10) UNSIGNED NOT NULL,
  `PropType` tinyint(2) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`PSPId`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_product_scheme_props`
--

INSERT INTO `app_product_scheme_props` (`PSPId`, `SchemeId`, `PropId`, `PropType`) VALUES
(0000000058, 2, 9, NULL),
(0000000060, 2, 10, NULL),
(0000000061, 2, 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`UserId`, `Username`, `Password`, `Email`, `PhoneNumber`, `SubscriptionDate`, `LastLogin`, `GroupId`, `Status`) VALUES
(1, 'admin', '$2a$07$yeNCSNwRpYopOhv0TrrReO0C4Wi7SyOYpdAtAYFfM4w.l4e6Q8jEW', 'admin@hotmail.com', '0100000002222', '2019-04-28', '2021-02-15 08:18:56', 1, 1),
(2, 'sayed', '$2a$07$yeNCSNwRpYopOhv0TrrReOunIisW1b8.JDsNKxyuF3O29C6ouWfCC', 'sayed@hotmail.com', '2454545', '2019-04-28', '2019-04-28 15:24:42', 1, 1),
(3, 'sayed Ali', '$2a$07$yeNCSNwRpYopOhv0TrrReOunIisW1b8.JDsNKxyuF3O29C6ouWfCC', 'sayed2@hotmail.com', '2454545', '2021-02-06', '2021-02-06 14:45:44', 2, 1);

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
-- Constraints for table `app_products_categories`
--
ALTER TABLE `app_products_categories`
  ADD CONSTRAINT `app_products_categories_ibfk_1` FOREIGN KEY (`CategoryField`) REFERENCES `app_fields` (`FieldId`);

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
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
