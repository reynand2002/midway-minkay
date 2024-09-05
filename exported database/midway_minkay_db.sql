-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 04:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midway_minkay_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `accomodation_id` int(11) NOT NULL,
  `accomodation_name` varchar(255) NOT NULL,
  `accomodation_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`accomodation_id`, `accomodation_name`, `accomodation_description`) VALUES
(12, 'PUBLISH RATE', '2 pax, Air-conditioned, FREE breakfast, soap, towels, blanket.'),
(13, 'PROMO RATE', 'PROMO RATE: 2 pax, Air-conditioned, FREE breakfast, soap, towels, blanket'),
(14, 'BARKADAHAN PROMO COMES W/ FREE BREAKFAST', 'FREE breakfast and etc.'),
(15, 'FUNCTION HALLS RATE', 'FUNCTION HALLS RATE');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `amenities_id` int(11) NOT NULL,
  `amenities_name` varchar(125) NOT NULL,
  `amenities_description` varchar(125) NOT NULL,
  `amenities_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(90) NOT NULL,
  `address` varchar(90) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `terms` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `photo` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `email`, `firstname`, `lastname`, `city`, `address`, `birthdate`, `phone`, `nationality`, `terms`, `username`, `password`, `zip_code`, `photo`) VALUES
(95, 'aeldredjohn.tanahura@gmail.com', 'Aeldred John', 'Tañahura', 'Iligan City', 'Sta. Elena', '2001-06-11', '09361878506', 'Filipino', 1, 'dred', '321db91c2992a4058225401ab94696bad40ae9c9', 9200, 'guest/photos/background.jpg'),
(96, 'alex@gmail.com', 'Alex', 'Go', 'naawan', 'poblacion', '2000-11-23', '091212121212', 'Filipino', 1, 'alex', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 9023, ''),
(97, 'elay@gmail.com', 'Eliza', 'Silvoza', 'Surigao del Sur', 'Surigao del Sur', '2002-01-30', '911', 'Filipino', 1, 'eliza', '5a4dba7031f26b48027e79eff3f161d4b2f1ccf1', 8303, 'guest/photos/smft.png'),
(99, 'lovely@gmail.com', 'Lovely Jean', 'Tinoy', 'Naawan', 'Naawan', '2023-10-03', '+639361988506', 'Japanese', 1, 'lovely', 'e5a0af1773f05a4df991573a065f34ba3f6a876e', 9200, 'guest/photos/avatar2.png'),
(100, 'reinan@gmail.com', 'Reinan', 'Sabas', 'Maranding', 'Lanao del Norte', '2002-01-01', '09276598220', 'Filipino', 1, 'reinan', '9279f113c8ccbdee285d0b7d338e8b9ba26d634c', 9200, 'guest/photos/reinan.jpg'),
(101, 'vonjustine.caumeran@gmail.com', 'Von Justine', 'Caumeran', 'Iligan City', 'Steeltown', '2001-08-25', '911', 'Filipino', 1, 'von', '799127ac3aff262f043774fc7aa286d5b9c3ab18', 9200, 'guest/photos/avatar5.png'),
(102, 'reyceldamaolao@gmail.com', 'Reycel', 'Damaulao', 'Misamis Oriental', 'Morupok, Cebu City', '2024-02-12', '09123456789', 'Filipino', 1, 'reycel1234', 'bbe5d6f54ae98a92ea5c9e17fcc4d4e4d45f50ce', 9022, ''),
(103, 'ken.dandasan@gmail.com', 'Ken Anthony', 'Dandasan', 'Misamis Oriental', 'Pagahan, Initao', '1997-08-22', '09051684467', 'Filipino', 1, 'kentoy', 'b4e92d5f225f53179e6a39b1b427c2ce09f086c5', 9021, ''),
(104, 'ingielouhalasan@gmail.com', 'Ingie Lou ', 'Halasan', 'Misamis Oriental', 'Purok 3A Tubigan Initao', '1990-06-01', '0948366965', 'Filipino', 1, 'ingielouuu', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', 9020, ''),
(105, 'stephanie.garcia@gmail.com', 'Stephanie', 'Garcia', 'Iligan City', 'Sta. Filomina', '2002-08-27', '09995231894', 'Filipino', 1, 'stephaniieeee', '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96', 9200, ''),
(106, 'mariehalasan@gmail.com', 'Marie', 'Halasan', 'Misamis Oriental', 'Pagahan, Initao', '2002-03-01', '09123456789', 'Filipino', 1, 'mariehalasan', 'fe4f471d54b99199cd3c233b280519f4700c7b8d', 9022, ''),
(107, 'mariehalasan@gmail.com', 'Marie', 'Halasan', 'Misamis Oriental', 'Pagahan, Initao', '2002-02-12', '09123456789', 'Filipino', 1, 'mariehalasan', '5ee4d4cb4d5856794663cc310ec66bbc2752f177', 9022, ''),
(108, 'elizarosesilvoza27@gmail.com', 'eliza ', 'silvoza', 'Misamis Oriental', 'Pagahan, Initao', '2002-03-24', '09062366139', 'Filipino', 1, 'eliza', '2dda073181d81ff7529e2054db053a2f45b6dfb5', 9022, ''),
(109, 'reynand.sabas06@gmail.com', 'Reinan', 'Sabas', 'Misamis Oriental', 'Pagahan, Initao', '2002-05-02', '09051684467', 'Filipino', 1, 'reinan', 'cf9101c34c76ab72eb0eac54be84949c528cd3e0', 9022, ''),
(110, 'alahdenbaigan@yahoo.com', 'Marie', 'Sabas', 'Misamis Oriental', 'Pagahan, Initao', '2003-03-09', '09363212130', 'Filipino', 1, 'alahden', '69f5259e60ba572156f20cfdc3a77effc0e9b577', 9019, ''),
(111, 'reynand.sabas06@gmail.com', 'jeric leo', 'echavez', 'Misamis Oriental', 'Morupok, Cebu City', '2002-05-01', '09051684467', 'Filipino', 1, 'JERIC', 'ad423d6f1daecf562138052915bd910a9fad3e5e', 9200, ''),
(112, 'reynand.sabas06@gmail.com', 'minkay', 'manzano', 'Misamis Occidental', 'Pagahan, Initao', '2002-03-02', '09919503720', 'Filipino', 1, 'minkay', 'fc7d7bc160d7c5e99bcbe1a728ebd30821fe1097', 9200, ''),
(113, 'reynand.sabas06@gmail.com', 'Andy', 'Sabas', 'Misamis Oriental', 'Pagahan, Initao', '2002-03-27', '09919503720', 'Filipino', 1, 'andyvon', '0778608e97c671e85e150e471f59705c09658a27', 1908, ''),
(114, 'reynand.sabas06@gmail.com', 'Marie', 'Halasan', 'Misamis Oriental', 'Pagahan, Initao', '2002-03-24', '09363212130', 'Filipino', 1, 'mariemay', '9c3f9b3720f4db53777142e86a2c73a8d938ccf9', 9200, ''),
(115, 'reynand.sabas06@gmail.com', 'Hannah', 'Rics', 'El Salvador City', 'Purok 1, mahayahay, Molave', '2002-05-22', '09123456789', 'Filipino', 1, 'hannah', 'fe038fb98fb3a4bb8a30d9efbb1289d9df0180e7', 9022, '');

-- --------------------------------------------------------

--
-- Table structure for table `message_us`
--

CREATE TABLE `message_us` (
  `message_us_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `confirmation_code` varchar(30) NOT NULL,
  `reference_number` varchar(50) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `msg_view` tinyint(1) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `trans_date`, `confirmation_code`, `reference_number`, `p_qty`, `guest_id`, `price`, `msg_view`, `status`) VALUES
(81, '2023-09-28 19:32:16', '123456789', '', 1, 95, 2500, 0, 'Checkedout'),
(82, '2023-09-28 19:39:43', '99999999', '', 2, 95, 6500, 0, 'Checkedout'),
(83, '2023-09-28 20:08:29', '09159056977', '', 1, 95, 3500, 0, 'Checkedout'),
(85, '2023-10-02 16:34:06', '12541224', '', 1, 95, 9500, 0, 'Checkedout'),
(86, '2023-10-02 16:36:54', '1224567', '', 1, 95, 3000, 0, 'Checkedout'),
(87, '2023-10-13 13:00:59', '23456', '', 1, 95, 2500, 0, 'Checkedout'),
(88, '2023-10-13 13:01:46', '999909', '', 1, 95, 3000, 0, 'Checkedout'),
(89, '2023-10-13 13:02:44', '9990098', '', 1, 95, 2500, 0, 'Cancelled'),
(90, '2023-10-16 16:06:09', '234567', '', 1, 96, 3000, 0, 'Checkedout'),
(92, '2023-10-18 11:46:35', '10100101', '', 1, 97, 1799, 0, 'Checkedout'),
(93, '2023-10-18 16:33:07', '69696', '', 1, 97, 2500, 0, 'Checkedout'),
(94, '2023-10-24 14:19:19', '252522', '', 1, 95, 2500, 0, 'Checkedout'),
(95, '2023-10-24 23:50:41', '2212122163', '', 1, 95, 3000, 0, 'Checkedout'),
(97, '2023-10-25 13:53:33', '2546987512452369874521547', '', 2, 99, 32500, 0, 'Checkedout'),
(98, '2023-11-08 10:42:00', '74690876', '', 1, 95, 2500, 0, 'Cancelled'),
(99, '2023-11-08 10:42:41', '90374849', '', 1, 95, 3000, 0, 'Checkedout'),
(100, '2023-11-08 10:43:17', '74883993', '', 1, 95, 3500, 0, 'Checkedout'),
(101, '2023-11-08 10:43:43', '346688', '', 1, 95, 1799, 0, 'Checkedout'),
(102, '2023-11-08 10:44:11', '4567800', '', 1, 95, 1999, 0, 'Checkedout'),
(103, '2023-11-08 10:44:44', '3457889', '', 1, 95, 2999, 0, 'Cancelled'),
(104, '2023-11-08 10:45:15', '23456780', '', 1, 95, 7499, 0, 'Checkedout'),
(105, '2023-11-08 10:45:44', '23456789', '', 1, 95, 11999, 0, 'Cancelled'),
(106, '2023-11-08 10:46:21', '2378907', '', 1, 95, 6999, 0, 'Checkedout'),
(107, '2023-11-08 10:46:52', '456789', '', 1, 95, 3999, 0, 'Checkedout'),
(108, '2023-11-08 10:47:17', '345678', '', 1, 95, 4799, 0, 'Cancelled'),
(109, '2023-11-08 10:48:45', '3456789', '', 1, 95, 11999, 0, 'Checkedout'),
(112, '2023-11-08 11:12:08', '3457896', '', 1, 95, 2500, 0, 'Cancelled'),
(114, '2023-11-10 01:50:07', '000000000215400', '', 1, 95, 2500, 0, 'Checkedout'),
(115, '2023-11-10 01:58:47', '0x742d35Cc6634C0532925a3b844Bc', '', 1, 100, 20993, 0, 'Checkedout'),
(116, '2023-11-10 02:01:29', '2252522163', '', 1, 100, 12593, 0, 'Checkedout'),
(117, '2023-11-10 02:06:51', '000333000', '', 1, 100, 87500, 0, 'Checkedout'),
(118, '2023-11-28 18:50:20', '1000101000101', '', 1, 95, 5998, 0, 'Checkedout'),
(119, '2023-11-28 20:33:06', '50000', '', 1, 95, 6000, 0, 'Checkedout'),
(120, '2023-12-17 21:34:45', '00000090999000', '', 1, 95, 3000, 0, 'Cancelled'),
(121, '2024-01-03 14:43:44', '3625051515269', '', 1, 101, 2500, 0, 'Cancelled'),
(122, '2024-01-04 11:41:23', '1213147641200', '', 1, 102, 2999, 0, 'Checkedout'),
(123, '2024-01-04 12:18:03', '4013091353372', '', 1, 103, 1999, 0, 'Checkedout'),
(124, '2024-01-04 12:23:32', '6012786314199', '', 1, 104, 7998, 0, 'Checkedout'),
(125, '2024-01-04 12:31:22', '4012961834550', '', 1, 105, 5000, 0, 'Checkedout'),
(126, '2024-01-04 15:24:55', '4013140441268', '', 1, 106, 5000, 0, 'Checkedout'),
(128, '2024-01-04 15:41:05', '4027140551258', '', 1, 108, 9000, 0, 'Checkedout'),
(129, '2024-01-05 17:11:05', '147852369', '', 1, 95, 2500, 0, 'Checkedout'),
(131, '2024-01-05 17:34:10', '4013140441258', '', 1, 109, 5000, 0, 'Checkedout'),
(135, '2024-01-05 17:51:57', '5013560499958', '', 1, 110, 2500, 0, 'Checkedout'),
(137, '2024-01-05 17:58:02', '56565656', '', 1, 111, 5000, 0, 'Checkedout'),
(138, '2024-01-05 18:00:35', '566Y787', '', 1, 112, 2500, 0, 'Checkedout'),
(139, '2024-01-05 18:02:05', '3457689809', '', 1, 113, 5000, 0, 'Checkedout'),
(140, '2024-01-05 18:03:37', '465789909', '', 1, 114, 2500, 0, 'Checkedout'),
(141, '2024-01-06 00:06:54', '24000', '', 2, 95, 13000, 0, 'Checkedout'),
(142, '2024-01-06 20:52:54', 'ajyt3030', '', 1, 95, 2500, 0, 'Cancelled'),
(143, '2024-01-06 22:58:46', 'angggiyoooooongggg', '', 1, 95, 2500, 0, 'Checkedout'),
(146, '2024-01-07 23:32:36', 'bookingnisfeb00', '', 1, 95, 5000, 0, 'Checkedout'),
(152, '2024-02-12 16:23:36', '4013196441258', '', 1, 115, 3598, 0, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `confirmation_code` varchar(50) NOT NULL,
  `trans_date` datetime NOT NULL DEFAULT current_timestamp(),
  `room_id` int(11) NOT NULL,
  `arrival` datetime NOT NULL,
  `departure` datetime NOT NULL,
  `r_price` double NOT NULL,
  `guest_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `book_date` datetime NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `confirmation_code`, `trans_date`, `room_id`, `arrival`, `departure`, `r_price`, `guest_id`, `status`, `book_date`, `remarks`) VALUES
(106, '123456789', '2023-09-28 11:32:16', 11, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(107, '99999999', '2023-09-28 11:39:43', 12, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 3000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(108, '99999999', '2023-09-28 11:39:43', 13, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 3500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(109, '09159056977', '2023-09-28 12:08:29', 13, '2023-09-27 00:00:00', '2023-09-27 00:00:00', 3500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(112, '12541224', '2023-10-02 08:34:06', 24, '2023-10-02 00:00:00', '2023-10-02 00:00:00', 9500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(113, '1224567', '2023-10-02 08:36:54', 12, '2023-10-02 00:00:00', '2023-10-02 00:00:00', 3000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(114, '23456', '2023-10-13 05:00:59', 11, '2023-10-13 00:00:00', '2023-10-13 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(115, '999909', '2023-10-13 05:01:46', 12, '2023-10-13 00:00:00', '2023-10-14 00:00:00', 3000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(116, '9990098', '2023-10-13 05:02:44', 11, '2023-10-13 00:00:00', '2023-10-14 00:00:00', 2500, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(117, '234567', '2023-10-16 08:06:10', 12, '2023-10-17 00:00:00', '2023-10-18 00:00:00', 3000, 96, 'Checkedout', '0000-00-00 00:00:00', ''),
(119, '10100101', '2023-10-18 03:46:35', 14, '2023-10-18 00:00:00', '2023-10-18 00:00:00', 1799, 97, 'Checkedout', '0000-00-00 00:00:00', ''),
(120, '69696', '2023-10-18 08:33:07', 11, '2023-10-18 00:00:00', '2023-10-18 00:00:00', 2500, 97, 'Checkedout', '0000-00-00 00:00:00', ''),
(121, '252522', '2023-10-24 06:19:19', 11, '2023-10-24 00:00:00', '2023-10-24 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(122, '2212122163', '2023-10-24 15:50:41', 12, '2023-10-24 00:00:00', '2023-10-24 00:00:00', 3000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(125, '2546987512452369874521547', '2023-10-25 05:53:33', 11, '2023-10-25 00:00:00', '2023-10-25 00:00:00', 2500, 99, 'Checkedout', '0000-00-00 00:00:00', ''),
(126, '2546987512452369874521547', '2023-10-25 05:53:34', 26, '2023-10-25 00:00:00', '2023-10-25 00:00:00', 30000, 99, 'Checkedout', '0000-00-00 00:00:00', ''),
(127, '74690876', '2023-11-08 02:42:00', 11, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 2500, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(128, '90374849', '2023-11-08 02:42:41', 12, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 3000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(129, '74883993', '2023-11-08 02:43:17', 13, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 3500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(130, '346688', '2023-11-08 02:43:43', 14, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 1799, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(131, '4567800', '2023-11-08 02:44:11', 15, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 1999, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(132, '3457889', '2023-11-08 02:44:44', 16, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 2999, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(133, '23456780', '2023-11-08 02:45:15', 17, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 7499, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(134, '23456789', '2023-11-08 02:45:44', 22, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 11999, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(135, '2378907', '2023-11-08 02:46:21', 19, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 6999, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(136, '456789', '2023-11-08 02:46:52', 20, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 3999, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(137, '345678', '2023-11-08 02:47:17', 21, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 4799, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(138, '3456789', '2023-11-08 02:48:45', 22, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 11999, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(139, '23456789', '2023-11-08 02:50:45', 23, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 2999, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(141, '3457896', '2023-11-08 03:12:08', 11, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 2500, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(142, '3456789', '2023-11-08 03:12:45', 11, '2023-11-08 00:00:00', '2023-11-08 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(143, '000000000215400', '2023-11-09 17:50:07', 11, '2023-11-10 00:00:00', '2023-11-10 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(145, '2252522163', '2023-11-09 18:01:29', 14, '2023-11-10 00:00:00', '2023-11-17 00:00:00', 12593, 100, 'Checkedout', '0000-00-00 00:00:00', ''),
(146, '000333000', '2023-11-09 18:06:51', 25, '2023-11-10 00:00:00', '2023-11-17 00:00:00', 87500, 100, 'Checkedout', '0000-00-00 00:00:00', ''),
(147, '1000101000101', '2023-11-28 10:50:20', 16, '2023-11-28 00:00:00', '2023-11-30 00:00:00', 5998, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(148, '50000', '2023-11-28 12:33:06', 12, '2023-01-02 00:00:00', '2023-01-04 00:00:00', 6000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(149, '00000090999000', '2023-12-17 13:34:45', 12, '2023-12-17 00:00:00', '2023-12-17 00:00:00', 3000, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(150, '3625051515269', '2024-01-03 06:43:46', 11, '2024-01-03 00:00:00', '2024-01-03 00:00:00', 2500, 101, 'Cancelled', '0000-00-00 00:00:00', ''),
(151, '1213147641200', '2024-01-04 03:41:23', 16, '2024-01-04 00:00:00', '2024-01-04 00:00:00', 2999, 102, 'Checkedout', '0000-00-00 00:00:00', ''),
(152, '4013091353372', '2024-01-04 04:18:03', 15, '2024-02-18 00:00:00', '2024-02-19 00:00:00', 1999, 103, 'Checkedout', '0000-00-00 00:00:00', ''),
(153, '6012786314199', '2024-01-04 04:23:32', 20, '2023-12-25 00:00:00', '2023-12-27 00:00:00', 7998, 104, 'Checkedout', '0000-00-00 00:00:00', ''),
(154, '4012961834550', '2024-01-04 04:31:22', 11, '2023-11-01 00:00:00', '2023-11-03 00:00:00', 5000, 105, 'Checkedout', '0000-00-00 00:00:00', ''),
(155, '4013140441268', '2024-01-04 07:24:55', 11, '2024-01-11 00:00:00', '2024-01-13 00:00:00', 5000, 106, 'Checkedout', '0000-00-00 00:00:00', ''),
(157, '4027140551258', '2024-01-04 07:41:05', 12, '2024-01-18 00:00:00', '2024-01-21 00:00:00', 9000, 108, 'Checkedout', '0000-00-00 00:00:00', ''),
(158, '147852369', '2024-01-05 09:11:05', 11, '2024-01-05 00:00:00', '2024-01-05 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(162, '4013140441258', '2024-01-05 09:34:10', 11, '2024-02-06 00:00:00', '2024-02-08 00:00:00', 5000, 109, 'Checkedout', '0000-00-00 00:00:00', ''),
(163, '4013140441258', '2024-01-05 09:47:23', 11, '2024-02-06 00:00:00', '2024-02-08 00:00:00', 5000, 109, 'Checkedout', '0000-00-00 00:00:00', ''),
(166, '5013560499958', '2024-01-05 09:51:57', 11, '2024-02-07 00:00:00', '2024-02-08 00:00:00', 2500, 110, 'Checkedout', '0000-00-00 00:00:00', ''),
(168, '56565656', '2024-01-05 09:58:02', 11, '2024-02-09 00:00:00', '2024-02-11 00:00:00', 5000, 111, 'Checkedout', '0000-00-00 00:00:00', ''),
(169, '566Y787', '2024-01-05 10:00:35', 11, '2024-02-08 00:00:00', '2024-01-09 00:00:00', 2500, 112, 'Checkedout', '0000-00-00 00:00:00', ''),
(170, '3457689809', '2024-01-05 10:02:05', 11, '2024-02-15 00:00:00', '2024-02-17 00:00:00', 5000, 113, 'Checkedout', '0000-00-00 00:00:00', ''),
(171, '465789909', '2024-01-05 10:03:37', 11, '2024-02-15 00:00:00', '2024-01-27 00:00:00', 2500, 114, 'Checkedout', '0000-00-00 00:00:00', ''),
(172, '24000', '2024-01-05 16:06:54', 12, '2024-01-05 00:00:00', '2024-01-07 00:00:00', 6000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(173, '24000', '2024-01-05 16:06:54', 13, '2024-01-05 00:00:00', '2024-01-07 00:00:00', 7000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(174, 'ajyt3030', '2024-01-06 12:52:54', 11, '2024-01-06 00:00:00', '2024-01-06 00:00:00', 2500, 95, 'Cancelled', '0000-00-00 00:00:00', ''),
(175, 'angggiyoooooongggg', '2024-01-06 14:58:46', 11, '2024-01-06 00:00:00', '2024-01-07 00:00:00', 2500, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(178, 'bookingnisfeb00', '2024-01-07 15:32:36', 11, '2024-02-01 00:00:00', '2024-02-03 00:00:00', 5000, 95, 'Checkedout', '0000-00-00 00:00:00', ''),
(184, '4013196441258', '2024-02-12 08:23:36', 14, '2024-02-14 00:00:00', '2024-02-16 00:00:00', 3598, 115, 'Confirmed', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_num` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `room` varchar(250) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `num_person` int(11) NOT NULL,
  `price` double NOT NULL,
  `room_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_num`, `accomodation_id`, `room`, `room_description`, `num_person`, `price`, `room_image`) VALUES
(11, 5, 12, 'Standard Room', 'FREE hygiene kits, towels, breakfast and aircon', 2, 2500, 'rooms/room1.jpg'),
(12, 5, 12, 'Deluxe Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 3000, 'rooms/room2.jpg'),
(13, 5, 12, 'Suite Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 3500, 'rooms/room3.jpg'),
(14, 4, 13, 'Standard Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 1799, 'rooms/PR_Standard_Room.JPG'),
(15, 5, 13, 'Deluxe Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 1999, 'rooms/PR_Deluxe_Room.JPG'),
(16, 5, 13, 'Suite Room', 'FREE hygiene kits, towels and breakfast and aircon', 2, 2999, 'rooms/PR_Suite_Room.JPG'),
(17, 5, 14, 'Family Suite Room (FR. SAL)', 'FREE breakfast, 3hours Videoke, 1 trip Banana Boat, Zipline', 8, 7499, 'rooms/Family_Suite_Room.JPG'),
(18, 5, 14, 'Family Suite Room (alvarez)', 'FREE breakfast, lunch, dinner, 3hours Videoki, 1 trip Banana Boat, Zipline', 5, 9999, 'rooms/Family_Suite_Room_(2).JPG'),
(19, 5, 14, 'Family Suite Room', '--', 10, 6999, 'rooms/Family_Suite_Room_(3).JPG'),
(20, 5, 14, 'Family Suite Room(5pax)', '--', 5, 3999, 'rooms/01.jpg'),
(21, 5, 14, 'Family Suite Room(12pax)', '--', 12, 4799, 'rooms/02.jpg'),
(22, 5, 14, 'Family Suite Room(20pax)', 'FREE Free 1 trip Banana boat 10 pax', 20, 11999, 'rooms/03.jpg'),
(23, 5, 14, 'Ocean View Suite Room(2pax)', '--', 20, 2999, 'rooms/ocean.jpg'),
(24, 5, 15, 'LONGINO HALL', '30-40 pax with \r\nSound System, \r\nAir-Conditioned & \r\nVideoke', 40, 9500, 'rooms/FH_LONGINO_HALLS.JPG'),
(25, 5, 15, 'WORLD VISION (50-60 persons)', '50-60 pax, with \r\nSound System, \r\nAir-Conditioned & \r\nVideoke', 60, 12500, 'rooms/FH_WORLD_VISION.JPG'),
(26, 5, 15, 'Daniot Hall', 'Minimun of 150 pax with SS, AC & Videoke', 150, 30000, 'rooms/hall3.jpg'),
(27, 5, 15, 'Jam Adiong Hall', 'Minimun of 100 pax with SS, AC & Videoke', 100, 20000, 'rooms/hall4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `useraccount_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL,
  `role` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`useraccount_id`, `name`, `username`, `password`, `role`, `phone`) VALUES
(1, 'Eliza Rose E. Silvoza', 'eliza', 'f43a79dfd42415a8656f99967c2caaf66ded84db', 'Guest In-charge', '09051137952'),
(2, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', '09361878506');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`accomodation_id`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `message_us`
--
ALTER TABLE `message_us`
  ADD PRIMARY KEY (`message_us_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `confirmation_code` (`confirmation_code`),
  ADD KEY `guest_id` (`guest_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `confirmation_code` (`confirmation_code`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `accomodation_id` (`accomodation_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`useraccount_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `accomodation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `amenities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `message_us`
--
ALTER TABLE `message_us`
  MODIFY `message_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `useraccount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`guest_id`) REFERENCES `guest` (`guest_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`accomodation_id`) REFERENCES `accomodation` (`accomodation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
