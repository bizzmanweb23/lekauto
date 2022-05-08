-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 07:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizzmantest_lek_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$TOvbSWeUOcXBHGB/Y7J1S.59/9i1EcYyiAsvvgSeE8WLhyJ2xvAS6', 'en', '2021-10-08 08:52:46', '2021-10-08 08:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `broker_details`
--

CREATE TABLE `broker_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `landline_number` int(100) NOT NULL,
  `mobile_number` int(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `broker_type` varchar(100) NOT NULL,
  `broker_commision` varchar(10) NOT NULL,
  `status` int(10) NOT NULL COMMENT '1. active 2. Inactive',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `broker_details`
--

INSERT INTO `broker_details` (`id`, `unique_id`, `first_name`, `last_name`, `address`, `city`, `country`, `landline_number`, `mobile_number`, `email_address`, `broker_type`, `broker_commision`, `status`, `updated_at`) VALUES
(1, 'GBU0000001', 'Amritpal', 'Singh', 'Gilco Valley', 'Mohali', 'India', 1234567891, 2147483647, 'nandhu@gmail.com', '0', '40%', 1, '2022-04-08 23:10:51'),
(3, 'GBU0000002', 'Dilpreet', 'Kaur', 'Test', 'Singapore', 'Singapore', 2147483647, 676487697, 'dilpreet@gmail.com', 'Senior Broker', '10%', 1, '2022-02-09 08:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE `buyer_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicle_id` int(6) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `delivery_out_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `pl_date` date NOT NULL,
  `booking_date` date NOT NULL,
  `sell_code` varchar(100) NOT NULL,
  `sales_agreement_number` varchar(100) NOT NULL,
  `sale_agreement_price` varchar(100) NOT NULL,
  `buyer_gst` varchar(10) NOT NULL,
  `buy_over_date` date NOT NULL,
  `body_price` int(10) NOT NULL,
  `ets_transfer_value` varchar(100) NOT NULL,
  `ets_paper_buyer` varchar(100) NOT NULL,
  `dereg_date` date NOT NULL,
  `ap_receipt` varchar(100) NOT NULL,
  `amount_buyer` int(10) NOT NULL,
  `bank_buyer` varchar(100) NOT NULL,
  `cheque_number_buyer` varchar(100) NOT NULL,
  `cheque_date_buyer` date NOT NULL,
  `sell_to` varchar(100) NOT NULL,
  `invoice_number2` varchar(100) NOT NULL,
  `transaction_type_buyer` varchar(100) NOT NULL,
  `Etransfer_out_date` date NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `gst_amount_buyer` varchar(100) DEFAULT NULL,
  `gst_decimal_adjustment_buyer` varchar(100) DEFAULT NULL,
  `gst_amountbefore_adjustment_buyer` varchar(100) DEFAULT NULL,
  `total_selling_price` varchar(100) DEFAULT NULL,
  `ets_paper_to` varchar(100) DEFAULT NULL,
  `coe_encashment` varchar(255) DEFAULT NULL,
  `coe_encashment1` varchar(255) DEFAULT NULL,
  `parf_encashment` varchar(255) DEFAULT NULL,
  `parf_encashment1` varchar(255) DEFAULT NULL,
  `ets_paper` varchar(255) DEFAULT NULL,
  `invoice_date2` date DEFAULT NULL,
  `invoice_number3` varchar(255) DEFAULT NULL,
  `to_from_who` varchar(255) DEFAULT NULL,
  `buyer_remarks` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `ap_receipt1` varchar(255) DEFAULT NULL,
  `amount_buyer1` varchar(255) DEFAULT NULL,
  `bank_buyer1` varchar(255) DEFAULT NULL,
  `cheque_number_buyer1` varchar(255) DEFAULT NULL,
  `cheque_date_buyer1` date DEFAULT NULL,
  `sell_to1` varchar(255) DEFAULT NULL,
  `buyer_remarks1` varchar(255) DEFAULT NULL,
  `payment_mode1` varchar(255) DEFAULT NULL,
  `invoice_number4` varchar(255) DEFAULT NULL,
  `to_from_who1` varchar(255) DEFAULT NULL,
  `total_receivable` varchar(255) DEFAULT NULL,
  `total_received` varchar(255) DEFAULT NULL,
  `ar_balance_buyer` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `Etransfer_out_by` varchar(255) NOT NULL,
  `log_card` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `unique_id`, `vehicle_id`, `id_number`, `delivery_out_date`, `delivery_time`, `invoice_number`, `pl_date`, `booking_date`, `sell_code`, `sales_agreement_number`, `sale_agreement_price`, `buyer_gst`, `buy_over_date`, `body_price`, `ets_transfer_value`, `ets_paper_buyer`, `dereg_date`, `ap_receipt`, `amount_buyer`, `bank_buyer`, `cheque_number_buyer`, `cheque_date_buyer`, `sell_to`, `invoice_number2`, `transaction_type_buyer`, `Etransfer_out_date`, `invoice_date`, `selling_price`, `gst_amount_buyer`, `gst_decimal_adjustment_buyer`, `gst_amountbefore_adjustment_buyer`, `total_selling_price`, `ets_paper_to`, `coe_encashment`, `coe_encashment1`, `parf_encashment`, `parf_encashment1`, `ets_paper`, `invoice_date2`, `invoice_number3`, `to_from_who`, `buyer_remarks`, `payment_mode`, `ap_receipt1`, `amount_buyer1`, `bank_buyer1`, `cheque_number_buyer1`, `cheque_date_buyer1`, `sell_to1`, `buyer_remarks1`, `payment_mode1`, `invoice_number4`, `to_from_who1`, `total_receivable`, `total_received`, `ar_balance_buyer`, `status`, `Etransfer_out_by`, `log_card`, `updated_at`) VALUES
(1, 'LAB0000001', 0, 'LAB202', '2022-01-29', '00:00:00', 'LABI01112', '2022-01-22', '2022-01-20', 'LA', 'Test', '10000', 'Central', '2022-01-20', 10, '10', 'Test', '2022-01-15', 'TEst', 10000, 'test', '10001', '2022-01-21', 'Test', 'LABI10001', '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2022-02-03 07:08:20'),
(3, 'LAB0000003', 0, '12243535', '2022-02-22', '12:19:00', 'IN1324546', '2022-02-22', '2022-02-16', 'Test', '3152', '100', 'Central', '2022-02-15', 100, '10', 'Test', '2022-02-22', 'Yes', 1000, 'Test', '123325', '2022-03-04', 'Test', 'IN2435265', 'Local', '2022-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '2022-04-14 16:44:43'),
(4, 'LAB0000004', 0, '134252', '2022-03-10', '22:56:00', '23523532', '2022-03-17', '2022-03-30', 'IN13413', '14324', '1000', 'Central', '2022-03-10', 1000000, '34322', 'Test', '2022-03-24', 'Test', 432535, 'Test', '2454643', '2022-03-17', 'Test', '5463626', 'Local', '2022-03-24', NULL, '56', '700', '46', '656', '45645', '235', '345', '345346', '5647', '647', '7464', NULL, '3467', '4536', '4634', '2343', '2356', '352535', '2352', '352', NULL, '2346', '352', '34526', '4637', '6342', '34634', '5245', '374', '576', '34534', '6346', '2022-04-14 16:44:30'),
(5, 'LAB0000005', 0, 'SD 12345', '2022-04-02', '03:29:00', 'tdf', '2022-04-23', '2022-04-09', 'tugu', 'tj', 'fhr', 'Central', '2022-04-21', 0, '2022-04-23', 'zvds', '2022-04-23', 'Yes', 0, 'AXIS', 'vzc', '2022-04-10', 'Seller1', 'vxcgx', 'Credit', '2022-04-16', '2022-04-22', 'fjyg', 'ty', 'zxcv', 'zxv', 'dfv', 'hnlk', 'uliu', 'uhkiu', 'hkum', 'hku', '2022-04-30', '2022-04-15', 'vzcv', 'vzc', 'czsdvf', 'Debit', 'No', 'lji', 'AXIS', 'ilhhj', '2022-04-10', 'Seller1', 'yjgt', 'Debit', 'vsds', 'ilu', 'jhngt', 'tuyjt', 'tjy', 'Y', 'Broker1', '100', '2022-04-12 19:00:52'),
(6, 'LAB0000006', 0, 'SD 12345', '2022-04-16', '00:18:00', 'hjj', '2022-04-09', '2022-05-01', 'gh', 'bmhjb', 'jyhg', 'Central', '2022-04-16', 0, '2022-04-03', 'hkjhuk', '2022-04-23', 'Yes', 900, 'HDFC', 'nhmgm', '2022-04-10', 'Seller2', 'hkgujk', 'Debit', '2022-04-16', '2022-04-10', 'jhg', '900', '900', '900', '800', 'hgjh', 'hiukhk', 'jmnbh', 'jh,nil', 'jhiu', '2022-05-01', '2022-04-23', 'thf', 'kuik', 'gjhg', 'Credit', 'Yes', 'ikjio', 'HDFC', 'lkj', '2022-04-23', 'Seller1', 'fghfh', 'Debit', 'yut', 'ukyui', 'y7iy', 'oiuio', 'kuy', 'N', 'Broker1', '100', '2022-04-14 16:09:15'),
(7, 'LAB0000007', 0, 'SD 12345', '2022-03-30', '22:13:00', 'y', '2022-04-23', '2022-04-23', 'tuyut', 'fthf', 'cg', 'State', '2022-04-01', 0, '2022-04-09', 'uiljku', '2022-04-24', 'Yes', 0, 'HDFC', 'uilu', '2022-04-24', 'Seller1', 'mjhg', 'Debit', '2022-04-30', '2022-04-30', 'hgfh', 'gjyuhg', 'gujhmg', 'jmh', 'gujkg', 'hkj,hmb', 'hmjg', 'gjhmg', ',jkjkl', 'l,iul', '2022-04-10', '2022-04-09', 'hgtf', 'yhkuy', 'tujyt', 'Debit', 'Yes', 'uy7i', 'Overseas Bank', 'uih', '2022-04-23', 'Seller2', 'tyjt', 'Debit', 'tyjt', 'yjt', 'uyt', 'tuy7j', 'tyjt', 'N', 'Broker2', 'jgyj', '2022-04-14 16:43:29'),
(8, 'LAB0000008', 0, 'xxx123', '2022-04-08', '22:21:00', 'trdtr', '2022-04-17', '2022-04-03', 'ftyhf', 'rd', 'ftyfr', 'Central', '2022-04-16', 0, '2022-04-09', 'gyujg', '2022-04-16', 'No', 0, 'HDFC', 'hjkh', '2022-04-30', 'Seller2', 'ui', 'Debit', '2022-04-09', '2022-04-23', 'tr', 'tyrf', 'fthf', 't76', 'tuyjgt', 'jhg', 'gyjh', 'gjy', 'hg', 'bjhmg', '2022-04-16', '2022-04-23', 'uy', 'sfews', 'ghfty', 'Debit', 'No', 'vzcfsc', 'Overseas Bank', 'xbf', '2022-04-17', 'Seller2', '3ew3', 'Credit', 'rew', 'dgf', 'fgj', 'gfuygyu', 'bhmg', 'Y', 'Broker1', 'gyjgj', '2022-04-14 16:57:56'),
(9, 'LAB0000009', 8, 'xxx123', '2022-04-02', '00:37:00', 'gnfgh', '2022-04-16', '2022-04-17', 'fyu', 'gjhg', 'gjyhg', 'State', '2022-04-09', 0, '2022-04-16', 'hjkmh', '2022-04-17', 'Yes', 0, 'Indian Bank', 'nhgjh', '2022-04-24', 'Seller2', 'gjhyg', 'Debit', '2022-04-30', '2022-04-28', 'gjhmg', 'tgjygt', 'gmhng', 'gmjhg', 'gjhg', 'mbhgjhm', 'bnmb', 'nfgnf', 'hjkmhk', 'hjmhk', '2022-04-17', '2022-04-16', 'jhgt', 'vbnv', 'ghmg', 'Debit', 'Yes', 'h,jmnh', 'AXIS', 'n,mn', '2022-04-24', 'Seller2', 'mnbg', 'Credit', 'nbgv', 'jmkh', 'ghng', 'yuhky', 'jkmhg', 'N', 'Broker1', 'yiy', '2022-04-14 17:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `costtype_details`
--

CREATE TABLE `costtype_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `costType` varchar(100) NOT NULL,
  `status` int(5) NOT NULL COMMENT '1. Active 2. Deactive',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `costtype_details`
--

INSERT INTO `costtype_details` (`id`, `unique_id`, `costType`, `status`, `updated_at`) VALUES
(2, 'LACT0000001', 'Repair', 1, '2022-02-09 06:11:16'),
(3, 'LACT0000002', 'Miscellenous', 1, '2022-02-09 06:11:26'),
(4, 'LACT0000003', 'XYZ', 1, '2022-02-09 06:11:38'),
(5, 'LACT0000004', 'ABC', 1, '2022-02-09 06:11:49'),
(6, 'LACT0000005', 'Cost Type', 1, '2022-02-10 12:05:27'),
(7, 'LACT0000006', 'Admin Fee', 1, '2022-03-14 06:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `cost_details`
--

CREATE TABLE `cost_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicle_id` int(100) NOT NULL,
  `vehicleNameCost` varchar(100) NOT NULL,
  `costType` varchar(100) NOT NULL,
  `vendorNameCost` varchar(100) NOT NULL,
  `cost_description` varchar(1000) NOT NULL,
  `totalAmount` varchar(100) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `floor_interest` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost_details`
--

INSERT INTO `cost_details` (`id`, `unique_id`, `vehicle_id`, `vehicleNameCost`, `costType`, `vendorNameCost`, `cost_description`, `totalAmount`, `transaction_type`, `floor_interest`, `updated_at`) VALUES
(1, 'LAC0000001', 2, 'Mazda', 'Repair', 'Test', 'TEst32143', '100000', 'debit', '', '2022-02-10 21:49:46'),
(2, 'LAC0000001', 3, 'XYZ', 'XYZ', 'TEst23', 'vhjbclkjflbw', '1000', 'debit', '', '2022-02-09 06:46:34'),
(3, 'LAC0000001', 6, 'ABC', 'ABC', 'Test6', 'Testing', '1000', 'credit', '', '2022-02-09 06:46:39'),
(4, 'LAC0000001', 2, 'Kia', 'Miscellenous', 'Test', 'TEst32143', '100000', 'credit', '', '2022-02-10 21:49:46'),
(5, 'LAC0000001', 2, 'Toyata', 'Miscellenous', 'Test', 'TEst32143', '100000', 'credit', '', '2022-02-10 21:49:46'),
(6, 'LAC0000001', 1, 'XYZ', 'Repair', 'Test', 'XYZ', '100', 'credit', '10%', '2022-02-15 05:27:17'),
(7, 'LAC0000001', 9, 'KIA1234', 'Repair', 'Test', 'Painting', '1000', 'credit', '10', '2022-02-28 06:54:37'),
(8, 'LAC0000001', 2, 'Toyoto', 'Repair', 'ABC', 'Test123', '100000', 'credit', '3%', '2022-04-06 09:34:45'),
(9, 'LAC0000001', 3, 'Toyoto', 'Miscellenous', 'XXXX', 'Test1', '200000', 'debit', '5%', '2022-04-06 09:36:36'),
(10, 'LAC0000001', 3, 'Vespa', 'Miscellenous', 'XXXXXXX', 'Test12', '200000', 'credit', '5%', '2022-04-06 09:37:26'),
(11, 'LAC0000001', 3, 'XXXX', 'Miscellenous', 'XXXX', 'Test1', '100000', 'credit', '5%', '2022-04-06 09:38:30'),
(12, 'LAC0000001', 2, 'Vespa', 'Miscellenous', 'XXXX', 'Test1', '200000', 'credit', '5', '2022-04-06 09:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `gst_details`
--

CREATE TABLE `gst_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `gst_name` varchar(100) NOT NULL,
  `gst_charges` varchar(100) NOT NULL,
  `status` int(6) NOT NULL COMMENT '1. Active  2. Deactive',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gst_details`
--

INSERT INTO `gst_details` (`id`, `unique_id`, `gst_name`, `gst_charges`, `status`, `updated_at`) VALUES
(2, 'LAG0000001', 'Central', '10', 1, '2022-02-03 06:42:35'),
(4, 'LAG0000002', 'State', '8', 1, '2022-02-03 06:44:04'),
(5, 'LAG0000003', 'Test', '12', 1, '2022-02-28 06:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `insuranceprovider_details`
--

CREATE TABLE `insuranceprovider_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `insuranceProviderName` varchar(100) NOT NULL,
  `status` int(6) NOT NULL COMMENT '1. Active 2. Inactive',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insuranceprovider_details`
--

INSERT INTO `insuranceprovider_details` (`id`, `unique_id`, `insuranceProviderName`, `status`, `updated_at`) VALUES
(3, 'LAIP0000003', 'XYZ', 1, '2022-02-04 09:32:19'),
(5, 'LAIP0000004', 'ABC', 1, '2022-02-08 05:15:25'),
(6, 'LAIP0000005', 'Amrit', 1, '2022-02-28 06:57:33'),
(7, 'LAIP0000006', 'Asif', 1, '2022-03-23 10:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `insurancetype_details`
--

CREATE TABLE `insurancetype_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `insuranceType` varchar(100) NOT NULL,
  `status` int(6) NOT NULL COMMENT '1. Active 2. Inactive',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurancetype_details`
--

INSERT INTO `insurancetype_details` (`id`, `unique_id`, `insuranceType`, `status`, `updated_at`) VALUES
(2, '', 'Full Insurance', 0, '2022-02-08 05:04:22'),
(3, '', 'Third Party', 0, '2022-02-08 05:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_details`
--

CREATE TABLE `insurance_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `insuranceVehicleName` varchar(100) NOT NULL,
  `insuranceRegistrationNumber` varchar(100) NOT NULL,
  `insuranceStartDate` date NOT NULL,
  `insuranceEndDate` date NOT NULL,
  `insuranceType` varchar(100) NOT NULL,
  `insuranceProvider` varchar(100) NOT NULL,
  `insuranceValidity` varchar(10) NOT NULL,
  `SKU_Code` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance_details`
--

INSERT INTO `insurance_details` (`id`, `unique_id`, `insuranceVehicleName`, `insuranceRegistrationNumber`, `insuranceStartDate`, `insuranceEndDate`, `insuranceType`, `insuranceProvider`, `insuranceValidity`, `SKU_Code`, `updated_at`) VALUES
(4, 'LAI0000003', 'Toyata', 'TOY456', '2022-02-17', '2022-05-17', 'Full Insurance', 'XYZ', '3', 'SKUCODE0000001', '2022-02-16 23:14:07'),
(5, 'LAI0000004', 'Toyata', 'TOY123', '2022-02-17', '2023-02-17', 'Third Party', 'XYZ', '1', 'SKUCODE0000001', '2022-02-17 04:32:19'),
(6, 'LAI0000005', 'KIA', 'KIA1234', '2022-02-28', '2022-04-28', 'Full Insurance', 'Test', '3', 'SKUCODE0000001', '2022-02-28 06:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_details`
--

CREATE TABLE `manufacture_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicleManufactureName` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1. Active 2. InActive',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacture_details`
--

INSERT INTO `manufacture_details` (`id`, `unique_id`, `vehicleManufactureName`, `status`, `updated_at`) VALUES
(1, 'LAVM0000001', 'Mazda', 1, '2022-03-01 05:40:34'),
(2, 'LAVM0000002', 'Nissan', 1, '2022-03-01 08:32:05'),
(3, 'LAVM0000003', 'Holden', 1, '2022-03-01 08:32:18'),
(5, 'LAVM0000005', 'KIA', 1, '2022-03-01 08:32:48'),
(6, 'LAVM0000006', 'Toyata', 1, '2022-03-03 09:06:25'),
(7, 'LAVM0000007', 'Sanuzki', 1, '2022-03-05 11:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous_details`
--

CREATE TABLE `miscellaneous_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicle_id` int(50) NOT NULL,
  `vehicleName` varchar(100) NOT NULL,
  `vehicleRegistrationNumber` varchar(100) NOT NULL,
  `vendorName` varchar(100) NOT NULL,
  `miscellaneous_description` varchar(100) NOT NULL,
  `amount_spent` int(100) NOT NULL,
  `gst_charges` int(50) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `miscellaneous_details`
--

INSERT INTO `miscellaneous_details` (`id`, `unique_id`, `vehicle_id`, `vehicleName`, `vehicleRegistrationNumber`, `vendorName`, `miscellaneous_description`, `amount_spent`, `gst_charges`, `total_amount`, `updated_at`) VALUES
(1, 'LAM0000001', 2, 'Test1', 'Test11', 'Test11', 'Test11', 100, 7, 107, '2022-02-10 21:49:46'),
(4, 'LAM0000003', 2, 'Test2', 'Test2222222', 'Test22', 'test2222', 200, 20, 220, '2022-02-10 21:49:46'),
(5, 'LAM0000004', 1, 'Toyata 2018', 'MQV01', 'Test1', 'Test', 100, 10, 110, '2022-02-11 03:13:37'),
(6, 'LAM0000004', 1, 'Toyata 2018', 'MQV01', 'Test2', 'Test2', 200, 10, 210, '2022-02-11 03:13:37'),
(7, 'LAM0000005', 9, 'KIA 2021', 'KIA1234', 'Test', 'Painting', 100, 10, 1000, '2022-02-28 06:52:31'),
(8, 'LAM0000005', 9, 'KIA 2021', 'KIA1234', 'Test1', 'Denting', 1000, 10, 1010, '2022-02-28 06:52:31'),
(9, 'LAM0000006', 1, 'Mazda2017', 'MAZ12345', 'Test3', 'XYZ', 100, 10, 110, '2022-03-14 07:14:11'),
(10, 'LAM0000007', 3, 'Toyata2018', 'ABX1234', 'ABC123', 'Test1', 10000, 600, 100000, '2022-04-06 09:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicle_id` int(6) NOT NULL,
  `broker` varchar(255) NOT NULL,
  `veh_no` varchar(200) NOT NULL,
  `gst` varchar(200) NOT NULL,
  `reg_date` date NOT NULL,
  `make` int(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `col` varchar(200) NOT NULL,
  `omv_e_tsf` date NOT NULL,
  `ul_parf` varchar(200) NOT NULL,
  `propellant` varchar(200) NOT NULL,
  `o` varchar(200) NOT NULL,
  `coe` varchar(200) NOT NULL,
  `coe_exp` date NOT NULL,
  `r_tax_exp` date NOT NULL,
  `price` varchar(200) NOT NULL,
  `loc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `unique_id`, `vehicle_id`, `broker`, `veh_no`, `gst`, `reg_date`, `make`, `model`, `col`, `omv_e_tsf`, `ul_parf`, `propellant`, `o`, `coe`, `coe_exp`, `r_tax_exp`, `price`, `loc`) VALUES
(1, 'LPL0000001', 6, 'skCh', 'vzdf', 'central', '2022-04-17', 0, 'dvs', 'vzv', '2022-04-10', 'vzcv', 'Diesel', 'vzcv', 'vzd', '0000-00-00', '0000-00-00', 'vzc', 'vz'),
(2, 'LPL0000001', 8, 'hgf', 'uj', 'central', '2022-04-02', 0, 'gbjhmg', 'vnhgv', '2022-04-10', 'gyjht', 'Diesel', 'gjhnm', 'hkju', '0000-00-00', '0000-00-00', 'yjht', 'hliu');

-- --------------------------------------------------------

--
-- Table structure for table `repair_details`
--

CREATE TABLE `repair_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicle_id` int(6) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_registration_number` varchar(100) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `repair_cost` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair_details`
--

INSERT INTO `repair_details` (`id`, `unique_id`, `vehicle_id`, `vehicle_name`, `vehicle_registration_number`, `vendor_name`, `repair_cost`, `updated_at`) VALUES
(1, 'LAR0000001', 2, 'Test11', 'Test111', 'Test11111', '100', '2022-02-10 21:49:46'),
(2, 'LAR0000001', 2, 'Test22', 'Test2222', 'Test222222', '200', '2022-02-10 21:49:46'),
(3, 'LAR0000002', 7, 'Nisaan', '4787', 'Test', '1000', '2022-01-31 06:54:41'),
(4, 'LAR0000002', 7, 'Nisaan', 'KUT23424', 'Test2', '100', '2022-01-31 06:54:41'),
(5, 'LAR0000003', 1, 'Toyata 2018', 'MQV01', 'Test', '100', '2022-02-10 11:33:01'),
(6, 'LAR0000004', 1, 'Toyata 2018', 'MQV01', 'Test1', '200', '2022-02-10 11:36:46'),
(7, 'LAR0000005', 9, 'KIA 2021', 'KIA1234', 'Test', '1000', '2022-02-28 06:51:24'),
(8, 'LAR0000005', 9, 'KIA 2021', 'KIA1234', 'Test1', '100', '2022-02-28 06:51:24'),
(9, 'LAR0000005', 9, 'KIA 2021', 'KIA1234', 'Test2', '1000', '2022-02-28 06:51:24'),
(10, 'LAR0000006', 1, 'Mazda2017', 'MAZ12345', 'Test2', '1000', '2022-03-14 04:15:29'),
(11, 'LAR0000007', 4, 'Sanuzki2020', 'ABC123', 'ABC123', '1000', '2022-04-06 09:32:47'),
(12, 'LAR0000008', 3, 'Toyata2018', 'ABX1234', 'XXXXX', '1000', '2022-04-06 09:33:12'),
(13, 'LAR0000009', 1, 'Mazda2018', 'MAZ12567', 'CCCC', '2000', '2022-04-06 14:23:34'),
(14, 'LAR0000010', 3, 'Toyata2018', 'ABX1234', 'hghgg', '8000', '2022-04-08 09:07:36'),
(15, 'LAR0000010', 3, 'Toyata2018', 'ABX1234', 'XXXXX', '2000', '2022-04-08 09:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

CREATE TABLE `seller_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `vehicle_id` int(50) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `purchase_date` date NOT NULL,
  `estimate_delivery` date NOT NULL,
  `delivery_in_date` date NOT NULL,
  `time` time NOT NULL,
  `purchase_price` int(50) NOT NULL,
  `gst` varchar(100) NOT NULL,
  `total_purchase_price` int(50) NOT NULL,
  `agreement_number` varchar(100) NOT NULL,
  `settlement_number` varchar(255) NOT NULL,
  `note` varchar(100) NOT NULL,
  `ap_payment` varchar(100) NOT NULL,
  `amount` int(50) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `cheque_number` varchar(100) NOT NULL,
  `cheque_date` date NOT NULL,
  `to_from` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `transaction_type` varchar(100) NOT NULL,
  `DN/CN_Number` varchar(255) NOT NULL,
  `DN/CN_Amount` varchar(255) NOT NULL,
  `GST_Amount` varchar(255) NOT NULL,
  `GST_Decimal_Adjustment` varchar(255) NOT NULL,
  `GST_Amount_Before_Adjustment` varchar(255) NOT NULL,
  `AP_Balance` varchar(255) NOT NULL,
  `P_settlement_Remark` varchar(255) NOT NULL,
  `E-Transfer_In_Date` date NOT NULL,
  `Asking_Price` varchar(255) NOT NULL,
  `E-Transfer_By` varchar(255) NOT NULL,
  `Alternate_price` varchar(255) NOT NULL,
  `Log_card` varchar(255) NOT NULL,
  `Alternate` varchar(255) NOT NULL,
  `Buy_Code` varchar(255) NOT NULL,
  `Trade_In_By` varchar(255) NOT NULL,
  `Broker1` varchar(255) NOT NULL,
  `Com_Rtn` varchar(255) NOT NULL,
  `Return_Date` date NOT NULL,
  `Broker2` varchar(255) NOT NULL,
  `Com_Rtn2` varchar(255) NOT NULL,
  `Return_Date2` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_details`
--

INSERT INTO `seller_details` (`id`, `unique_id`, `vehicle_id`, `id_number`, `purchase_date`, `estimate_delivery`, `delivery_in_date`, `time`, `purchase_price`, `gst`, `total_purchase_price`, `agreement_number`, `settlement_number`, `note`, `ap_payment`, `amount`, `bank`, `cheque_number`, `cheque_date`, `to_from`, `remarks`, `transaction_type`, `DN/CN_Number`, `DN/CN_Amount`, `GST_Amount`, `GST_Decimal_Adjustment`, `GST_Amount_Before_Adjustment`, `AP_Balance`, `P_settlement_Remark`, `E-Transfer_In_Date`, `Asking_Price`, `E-Transfer_By`, `Alternate_price`, `Log_card`, `Alternate`, `Buy_Code`, `Trade_In_By`, `Broker1`, `Com_Rtn`, `Return_Date`, `Broker2`, `Com_Rtn2`, `Return_Date2`, `updated_at`) VALUES
(1, 'LAS0000001', 1, 'SD1245464', '2022-03-17', '2022-03-17', '2022-03-31', '09:47:00', 10000, 'State', 100000, 'IN2421515', '', 'Test', 'Test', 100000, 'Test', '4324623152', '2022-03-24', 'TEST', 'Test', 'Local', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '2022-03-14 04:14:54'),
(3, 'LAS0000003', 0, '', '0000-00-00', '0000-00-00', '0000-00-00', '00:00:00', 0, '', 0, '', '', '', '', 0, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '2022-04-10 12:44:03'),
(4, 'LAS0000004', 0, 'SD 12345', '0000-00-00', '0000-00-00', '0000-00-00', '00:00:00', 0, '', 0, '', '', '', '', 0, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '2022-04-10 13:03:02'),
(5, 'LAS0000005', 0, 'SD 12345', '2022-03-31', '2022-05-08', '2022-04-15', '20:10:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'jhfgjf', 'Yes', 10000, 'HDFC', 'AB12345', '2022-04-20', 'AB1234', 'xchahcb', 'offline', '65656', '2000', '7000', '4000', '7000', '4000', 'xxx', '2022-04-06', '6000', 'offline', '500', 'cccc', '600', 'xxx123', 'ghghgh', 'Broker1', 'xxx', '2022-04-22', 'Broker1', 'xxx', '2022-04-08', '2022-04-10 15:05:53'),
(8, 'LAS0000002', 0, '', '0000-00-00', '0000-00-00', '0000-00-00', '00:00:00', 0, '', 0, '', '', '', '', 0, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '0000-00-00', '2022-04-10 15:03:13'),
(9, 'LAS0000003', 7, 'yyy123', '2022-04-08', '2022-04-19', '2022-03-31', '23:00:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'vmbmcad', 'Yes', 10000, 'Overseas Bank', 'AB12345', '2022-04-21', 'AB1234', 'bnnm,', 'offline', '3444', '700', '456', '779', '800', '2000', '7000', '2022-04-07', '700', 'offline', '6000', '900', '9000', '7000', '6000', 'Broker2', '600', '2022-04-15', 'Broker1', '600', '2022-04-14', '2022-04-11 04:11:38'),
(10, 'LAS0000004', 0, 'SD 12345', '2022-04-15', '2022-04-22', '2022-04-15', '01:05:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'bhmbh', 'Yes', 10000, 'AXIS', 'AB12345', '2022-04-21', 'AB1234', 'zvx', 'offline', '5668768', '7000', '700', '600', '800', '5656', '56', '2022-04-05', '600', 'online', '600', '768768', 'hdGH', '6777', '6768', 'Broker1', '5656', '2022-04-06', 'Broker2', '67676', '2022-04-28', '2022-04-10 15:37:06'),
(11, 'LAS0000005', 0, 'SD 12345', '2022-04-01', '2022-04-23', '2022-04-27', '00:08:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'JHGJ', 'Yes', 10000, 'HDFC', 'AB12345', '2022-04-22', 'AB1234', 'BVBMB', 'offline', 'WQ44', '77897', '4000', '6000', '898989', '656', '575', '2022-04-07', '700', 'offline', '600', 'U8789', '800', '6787', '666', 'Broker1', 'T768', '2022-04-22', 'Broker1', '566', '2022-04-14', '2022-04-10 15:39:28'),
(12, 'LAS0000006', 0, 'SD 12345', '2022-04-07', '2022-04-20', '2022-04-19', '15:08:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'vzvz', 'Yes', 10000, 'AXIS', 'AB12345', '2022-04-30', 'AB1234', 'y77', 'offline', '5656', '7789', 'yiy', '6766', '768q3768', 'i77', '787878', '2022-04-15', '6768', 'offline', '76768', '8789t789', '7676', 'bvu7', '768', 'Broker1', '767', '2022-04-24', 'Broker1', '7676', '2022-04-15', '2022-04-11 05:39:11'),
(13, 'LAS0000007', 0, 'SD 12345', '2022-04-03', '2022-04-09', '2022-04-22', '15:13:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'bn', 'Yes', 10000, 'HDFC', 'AB12345', '2022-05-06', 'AB1234', 'ghg', 'offline', 'tt777', '768768', '7878', '76768', '768', '6776', '6bv', '2022-04-23', '656', 'offline', '768768', 'ui8u', '768768', 'yutu5', '768768', 'Broker1', '786', '2022-04-22', 'Broker1', '567', '2022-04-15', '2022-04-11 05:44:13'),
(14, 'LAS0000008', 0, 'xxx123', '2022-04-02', '2022-04-09', '2022-04-30', '15:20:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'jhk', 'No', 10000, 'AXIS', 'AB12345', '2022-04-02', 'AB1234', 'ghfh', 'online', '7676', '77', '8000', '8000', '8000', '7000', 'xxx123', '2022-04-09', '4000', 'online', '7000', '800', '8000', 'xxx123', 'xxx123', 'Broker1', '4000', '2022-04-22', 'Broker1', 'vnb', '2022-04-15', '2022-04-11 05:51:28'),
(15, 'LAS0000009', 0, 'SD 12345', '2022-04-02', '2022-04-23', '2022-04-23', '15:35:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'ui', 'No', 10000, 'HDFC', 'AB12345', '2022-04-29', 'AB1234', '7868', 'online', 'khjk', '8989', '900', '768', '778', '5666666666', '6576', '2022-04-08', '76576', 'offline', '66677', '76878', '8876', '68767', '56765', 'Broker1', '576', '2022-04-21', 'Broker1', '56765', '2022-04-15', '2022-04-11 07:06:51'),
(16, 'LAS0000010', 0, 'SD 12345', '2022-04-02', '2022-04-23', '2022-04-23', '15:35:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'ui', 'No', 10000, 'HDFC', 'AB12345', '2022-04-29', 'AB1234', '7868', 'online', 'khjk', '8989', '900', '768', '778', '5666666666', '6576', '2022-04-08', '76576', 'offline', '66677', '76878', '8876', '68767', '56765', 'Broker1', '576', '2022-04-21', 'Broker1', '56765', '2022-04-15', '2022-04-11 07:06:55'),
(17, 'LAS0000011', 0, 'SD 12345', '2022-04-02', '2022-04-23', '2022-04-23', '15:35:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'ui', 'No', 10000, 'HDFC', 'AB12345', '2022-04-29', 'AB1234', '7868', 'online', 'khjk', '8989', '900', '768', '778', '5666666666', '6576', '2022-04-08', '76576', 'offline', '66677', '76878', '8876', '68767', '56765', 'Broker1', '576', '2022-04-21', 'Broker1', '56765', '2022-04-15', '2022-04-11 07:07:03'),
(18, 'LAS0000012', 0, 'SD 12345', '2022-04-02', '2022-04-23', '2022-04-23', '15:35:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'ui', 'No', 10000, 'HDFC', 'AB12345', '2022-04-29', 'AB1234', '7868', 'online', 'khjk', '8989', '900', '768', '778', '5666666666', '6576', '2022-04-08', '76576', 'offline', '66677', '76878', '8876', '68767', '56765', 'Broker1', '576', '2022-04-21', 'Broker1', '56765', '2022-04-15', '2022-04-11 07:07:40'),
(19, 'LAS0000013', 0, 'SD 12345', '2022-04-02', '2022-04-23', '2022-04-15', '02:48:00', 10000, 'Central', 1000, 'AB1234', 'AB123', 'z', 'Yes', 10000, 'Overseas Bank', 'AB12345', '2022-04-15', 'AB1234', 'jkhjk', 'offline', '6y78', '6000', '9000', '600', '8000', '7600', 'rtf', '2022-04-09', '600', 'offline', '900', 'iou9', '77', '800', 'gjhg', 'Broker1', '676', '2022-04-22', 'Broker1', '7tu6yt', '2022-04-10', '2022-04-12 17:21:45'),
(20, 'LAS0000014', 0, 'SD 12345', '2022-04-02', '2022-04-17', '2022-04-08', '22:56:00', 10000, 'State', 1000, 'AB1234', 'AB123', 'hmbbhm', 'Yes', 10000, 'Overseas Bank', 'AB12345', '2022-04-30', 'AB1234', 'ghhkjg', 'offline', 'ghh', 'iipii', '900', '600', '900', '600', '577', '2022-04-16', '800', 'offline', '6000', '9098', '900', '800', 'tgjhg', 'Broker1', 'jhg', '2022-04-23', 'Broker1', 'yuuiky', '2022-04-29', '2022-04-12 17:24:52'),
(21, 'LAS0000015', 6, 'SD 12345', '2022-04-03', '2022-04-23', '2022-04-29', '01:57:00', 10000, 'Central', 0, 'AB1234', 'AB123', 'hjbh', 'Yes', 10000, 'AXIS', 'AB12345', '2022-04-29', 'AB1234', 'gjhg', 'offline', '768768768', '9000', '78989', '76tu', 'hujh', '768768768', 'ytrtfr', '2022-04-07', '6000', 'online', '988', '88', 'tyuiy7i', '8p98', 'yiy', 'Broker1', 'oiuo', '2022-04-30', 'Broker1', '7t7i', '2022-04-22', '2022-04-12 17:28:15'),
(22, 'LAS0000016', 8, 'xxx123456', '2022-04-10', '2022-05-01', '2022-05-01', '02:38:00', 0, 'Central', 0, 'yiu', 'yuiy', 'yujgt', 'Yes', 400, 'Indian Bank', 'AB12345', '2022-05-01', 'AB1234', 'gjyg', 'offline', 'ytyu', 'vfynhj', 'gjnhg', 'yjt', '678', '88989', 'gjygt', '2022-04-30', 'tty', 'offline', '6777', 'yuky', '7878', 'rtyrh', 'tyjht', 'Broker1', 'rfth', '2022-04-30', 'Broker2', '5rtyr', '2022-04-16', '2022-04-14 17:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `job_position` varchar(100) NOT NULL,
  `emp_image` varchar(100) NOT NULL,
  `country_code_m` varchar(100) NOT NULL,
  `work_mobile` int(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `country_code_p` varchar(100) NOT NULL,
  `work_phone` int(20) NOT NULL,
  `work_email` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `identification_no` varchar(100) NOT NULL,
  `country_code_cp` varchar(100) NOT NULL,
  `contact_phone` int(20) NOT NULL,
  `passport_no` varchar(100) NOT NULL,
  `bank_accnt_no` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `home_work_distance` int(20) NOT NULL,
  `dob` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `country_of_birth` varchar(100) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `other_id_name` varchar(100) NOT NULL,
  `other_id_no` varchar(100) NOT NULL,
  `other_id_file` varchar(100) NOT NULL,
  `edu_certificate_level` varchar(100) NOT NULL,
  `field_of_study` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `status` int(20) NOT NULL COMMENT '1. Active 2.Deactive',
  `website` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `unique_id`, `emp_name`, `job_position`, `emp_image`, `country_code_m`, `work_mobile`, `department`, `country_code_p`, `work_phone`, `work_email`, `contact_address`, `country`, `contact_email`, `identification_no`, `country_code_cp`, `contact_phone`, `passport_no`, `bank_accnt_no`, `gender`, `home_work_distance`, `dob`, `place_of_birth`, `country_of_birth`, `marital_status`, `other_id_name`, `other_id_no`, `other_id_file`, `edu_certificate_level`, `field_of_study`, `school`, `status`, `website`, `updated_at`) VALUES
(1, 'GMU0000001', 'Amritpal Singh', 'CEO', 'QZxEzDKdmoZTapprove.png', '+91', 2147483647, 'Sales', '+60', 2147483647, 'amrit@gmail.com', 'Mohali', 'India', 'amrit@gmail.com', '3564567', '+65', 352345678, 'kjg456578', 'Test', 'Male', 54, '2022-01-03', 'Mohali', 'India', 'Single', 'Test', '4678978587', 'zemI8iCo1iLmLEK AUTO LOGO.jpg', 'Graduate', 'IT', 'GNDU', 1, '', '2022-02-01 06:30:55'),
(2, 'GMU0000001', 'Dilpreet', 'Manager', 'wVShp8ItM1vdimages.jpg', '+91', 2147483647, 'Management', '+91', 324654352, 'dilpreet@gmail.com', 'Mohali', 'India', 'dilpreet@gmail.com', '46789787', '+91', 2147483647, 'K12343124', 'Test', 'Male', 10, '2022-01-31', 'India', 'India', 'Single', 'Test', '54678689', 'j4OCGfXZyQ6zdownload.jpg', 'Graduate', 'IT', 'GNDU', 1, 'All', '2022-02-15 05:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `system_id` varchar(100) NOT NULL,
  `vehicle_status` varchar(100) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `vehicle_make` varchar(100) NOT NULL,
  `vehicle_year` varchar(100) NOT NULL,
  `body_type` varchar(100) NOT NULL,
  `price_list_make` varchar(100) NOT NULL,
  `price_list_model` varchar(100) NOT NULL,
  `pricelist_plus` varchar(100) NOT NULL,
  `accessory` varchar(1000) NOT NULL,
  `chasis_number` varchar(100) NOT NULL,
  `engine_number` varchar(100) NOT NULL,
  `propellant` varchar(100) NOT NULL,
  `laden` varchar(100) NOT NULL,
  `unladen` varchar(100) NOT NULL,
  `enginecap_ton` varchar(100) NOT NULL,
  `pax` varchar(100) NOT NULL,
  `year_of_manufacture` varchar(100) NOT NULL,
  `original_reg_date` date NOT NULL,
  `color` varchar(100) NOT NULL,
  `number_of_tsf` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `incharge_by` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  `Created_by` varchar(100) NOT NULL,
  `last_modifiedBy` varchar(100) NOT NULL,
  `transfer_fee` varchar(100) NOT NULL,
  `road_tax` varchar(100) NOT NULL,
  `roadTax_expiry` date NOT NULL,
  `road_tax_type` varchar(100) NOT NULL,
  `inspection_expiry` date NOT NULL,
  `layUp_expiry` date NOT NULL,
  `coe_logcard` varchar(100) NOT NULL,
  `coe_acc` varchar(100) NOT NULL,
  `coe_number` varchar(100) NOT NULL,
  `coe_expiryDate` date NOT NULL,
  `coe_to_pay` varchar(100) NOT NULL,
  `omv` varchar(100) NOT NULL,
  `parf_amount` varchar(100) NOT NULL,
  `registeration_fee` varchar(100) NOT NULL,
  `arf_amount` varchar(100) NOT NULL,
  `cves_surcharge` varchar(100) NOT NULL,
  `cevs_rebate` varchar(100) NOT NULL,
  `ets_paper_form` varchar(100) NOT NULL,
  `use_tcoe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `unique_id`, `system_id`, `vehicle_status`, `vehicle_number`, `vehicle_make`, `vehicle_year`, `body_type`, `price_list_make`, `price_list_model`, `pricelist_plus`, `accessory`, `chasis_number`, `engine_number`, `propellant`, `laden`, `unladen`, `enginecap_ton`, `pax`, `year_of_manufacture`, `original_reg_date`, `color`, `number_of_tsf`, `location`, `incharge_by`, `entry_date`, `Created_by`, `last_modifiedBy`, `transfer_fee`, `road_tax`, `roadTax_expiry`, `road_tax_type`, `inspection_expiry`, `layUp_expiry`, `coe_logcard`, `coe_acc`, `coe_number`, `coe_expiryDate`, `coe_to_pay`, `omv`, `parf_amount`, `registeration_fee`, `arf_amount`, `cves_surcharge`, `cevs_rebate`, `ets_paper_form`, `use_tcoe`) VALUES
(2, 'GVU0000002', 'VIC123456', 'NotOrdered', 'NIS123456', 'Nissan', '2020', 'Sedan', 'Nissan', '2020', '1000', 'Test', 'NIS54365326', 'NIS96788576', 'Diesel', 'Test', 'Test', '1000', '100', '2016', '2022-03-14', 'Black', '10', 'Mohali', 'Test', '2022-03-16', 'Test', 'Test', '1000', '100', '2022-03-26', '12 months', '2022-04-07', '2022-04-08', 'Test', 'Test', '12098', '2022-04-09', 'Paid', '10000', '100', '1000', '23', '1000', 'Test', 'Yes', 'Yes'),
(3, 'GVU0000003', 'ABC12345', 'Ordered', 'ABX1234', 'Toyata', '2018', 'Sedan', 'Sanuzki', '2018', '10000', 'Test1', 'ABX12345', 'ABX123456', 'Diesel', 'Test1', 'Test1', '2000', '200', '2002', '2022-03-01', 'Red', '15', 'Erode', 'Test1', '2022-03-04', 'Test1', 'Test1', '500', '100', '2022-03-09', '12 months', '2022-03-02', '2022-03-04', 'Test1', 'Test1', '123456', '2022-03-02', 'Paid', '10000', '100', '1000', '2000', '200', 'Test1', 'Yes', 'Yes'),
(4, 'GVU0000004', 'XYZ12345', 'NotOrdered', 'ABC123', 'Sanuzki', '2020', 'sedan', 'Toyata', '2020', '50000', 'Test5', 'XYZ12345', 'XYZ12345', 'Diesel', 'Test5', 'Test5', '3000', '300', '2001', '2022-03-05', 'White', '20', 'Chennai', 'Test5', '2022-03-05', 'Test5', 'Test5', '500', '200', '2022-03-03', '12 months', '2022-03-04', '2022-03-04', 'Test5', 'Test5', '12345678', '2022-03-03', 'Not Paid', '10000', '200', '500', '1000', '300', 'Test5', 'yes', 'Yes'),
(5, 'GVU0000005', 'ABC123457', 'Ordered', 'ABX12348', 'Nissan', '2010', 'Sedan', 'Toyata', '2020', '50000', 'ggg', 'ABX123457', 'XYZ123458', 'Petrol', 'Test5', 'Test1', '3000', '200', '2001', '2022-04-10', 'Black', '15', 'Chennai', 'Test1', '2022-04-10', 'Test5', 'Test1', '500', '100', '2022-04-24', '12 months', '2022-04-10', '2022-04-03', 'Test1', 'Test1', '123456', '2022-04-03', 'Paid', '10000', '100', '1000', '2000', '200', 'Test1', 'Yes', 'Yes'),
(6, 'GVU0000006', 'xxx123', 'Ordered', 'xxx123', 'Mazda', '2018', 'xxx', 'Nissan', '2019', '2000', 'xxxx', '123', '123', 'Petrol', '123', '123', '123', '123', '2018', '2022-04-29', 'Black', '23', 'xxx', 'ccc', '2022-04-06', 'xxx', 'xxxx', '500', '700', '2022-04-07', '6 months', '2022-04-14', '2022-04-21', 'xxx', 'xxxx', '34567', '2022-04-21', 'Paid', 'vvvv', '6000', '6000', '7000', '800', '8000', 'xxx', 'Yes'),
(7, 'GVU0000007', 'abc1238', 'Ordered', 'xxx123', 'Toyata', '2018', 'xxx', 'Mazda', '2019', '2000', 'uyu', '123', '123', 'Natural Gas', '123', '123', '123', '123', '2018', '2022-04-30', 'Black', '333', 'Chennai', 'ccc', '2022-04-03', 'xxx', 'xxxx', '500', '700', '2022-04-03', '12 months', '2022-04-30', '2022-04-09', 'xxx', 'xxxx', '34567', '2022-04-09', 'Paid', 'vvvv', '6000', '6000', '7000', '800', '8000', 'xxx', 'Yes'),
(8, 'GVU0000008', 'SD 12345', 'Ordered', 'xxx123', 'Toyata', '2018', 'xxx', 'Mazda', '2019', '2000', 'uyu', '123', '123', 'Natural Gas', '123', '123', '123', '123', '2018', '2022-04-30', 'Black', '333', 'Chennai', 'ccc', '2022-04-03', 'xxx', 'xxxx', '500', '700', '2022-04-03', '12 months', '2022-04-30', '2022-04-09', 'xxx', 'xxxx', '34567', '2022-04-09', 'Paid', 'vvvv', '6000', '6000', '7000', '800', '8000', 'xxx', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broker_details`
--
ALTER TABLE `broker_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costtype_details`
--
ALTER TABLE `costtype_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_details`
--
ALTER TABLE `cost_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gst_details`
--
ALTER TABLE `gst_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insuranceprovider_details`
--
ALTER TABLE `insuranceprovider_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurancetype_details`
--
ALTER TABLE `insurancetype_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_details`
--
ALTER TABLE `insurance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture_details`
--
ALTER TABLE `manufacture_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous_details`
--
ALTER TABLE `miscellaneous_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_details`
--
ALTER TABLE `repair_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_details`
--
ALTER TABLE `seller_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `broker_details`
--
ALTER TABLE `broker_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `costtype_details`
--
ALTER TABLE `costtype_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cost_details`
--
ALTER TABLE `cost_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gst_details`
--
ALTER TABLE `gst_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `insuranceprovider_details`
--
ALTER TABLE `insuranceprovider_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insurancetype_details`
--
ALTER TABLE `insurancetype_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `insurance_details`
--
ALTER TABLE `insurance_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufacture_details`
--
ALTER TABLE `manufacture_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `miscellaneous_details`
--
ALTER TABLE `miscellaneous_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `repair_details`
--
ALTER TABLE `repair_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller_details`
--
ALTER TABLE `seller_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
