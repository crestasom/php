-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2018 at 08:16 AM
-- Server version: 10.0.34-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shrestha_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `converted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `members_id`, `stock_id`, `quantity`, `postDate`, `status`, `converted`) VALUES
(1, 43, 28, 1, '2016-02-25 08:56:45', 1, 1),
(2, 43, 23, 2, '2016-02-25 12:46:36', 1, 1),
(3, 43, 23, 1, '2016-02-25 13:25:17', 1, 1),
(4, 43, 23, 1, '2016-02-25 13:25:59', 1, 1),
(5, 43, 33, 1, '2016-02-26 07:39:45', 1, 1),
(6, 43, 23, 1, '2016-02-26 10:50:47', 1, 1),
(7, 43, 23, 1, '2016-02-26 11:04:34', 1, 1),
(8, 43, 23, 1, '2016-02-26 11:05:37', 1, 1),
(9, 43, 23, 1, '2016-02-26 11:08:54', 1, 1),
(10, 43, 23, 1, '2016-02-26 11:10:06', 1, 1),
(11, 43, 23, 1, '2016-02-27 03:14:56', 1, 1),
(12, 43, 23, 1, '2016-02-27 03:16:35', 1, 1),
(13, 43, 23, 1, '2016-02-27 03:18:33', 1, 1),
(15, 43, 28, 1, '2016-02-27 09:25:01', 1, 1),
(16, 43, 39, 2, '2016-02-28 12:15:41', 1, 1),
(17, 43, 28, 1, '2016-02-28 12:16:03', 1, 1),
(18, 43, 39, 1, '2016-02-28 12:21:37', 1, 1),
(19, 14, 28, 1, '2016-04-04 13:12:00', 1, 1),
(20, 43, 23, 1, '2016-11-27 02:33:48', 1, 1),
(21, 43, 24, 1, '2016-11-27 07:42:25', 1, 1),
(22, 43, 24, 1, '2016-11-27 07:43:41', 1, 1),
(23, 43, 24, 1, '2017-05-15 16:23:19', 1, 1),
(25, 43, 24, 5, '2017-08-28 10:42:47', 1, 0),
(27, 53, 24, 1, '2017-09-24 14:40:39', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `url` varchar(45) DEFAULT NULL,
  `seoTitle` varchar(45) DEFAULT NULL,
  `seoDesc` varchar(45) DEFAULT NULL,
  `hits` varchar(45) DEFAULT '0',
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_id`, `title`, `url`, `seoTitle`, `seoDesc`, `hits`, `postDate`, `status`) VALUES
(29, 0, 'Men\'s Clothing', 'mens-clothing', 'Men\'s Clothing', 'Men\'s Clothing', '1', '2015-10-29 12:01:03', 1),
(30, 0, 'Women\'s Clothings', 'womens-clothings', 'Women\'s Clothing', 'Women\'s Clothing', '1', '2015-10-29 12:01:26', 1),
(34, 29, 'Shoes', 'shoes', 'Men\'s Shoes', 'Men\'s Shoes', '116', '2015-10-29 15:00:58', 1),
(35, 30, 'Shoes', 'shoes', 'Women\'s Shoes', 'Men\'s Shoes', '74', '2015-10-29 15:09:48', 1),
(38, 29, 'T-shirts', 't-shirts', 'Men\'s T-shirt', 'Men\'s T-shirt', '57', '2015-11-03 12:10:39', 1),
(40, 29, 'Jacket', 'jacket', '', '', '65', '2015-12-07 12:35:03', 1),
(41, 30, 'Jackets', 'jackets', 'Women\'s jackets', 'Women\'s jackets', '60', '2016-02-25 07:13:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_ids` varchar(255) DEFAULT NULL,
  `contactName` varchar(45) DEFAULT NULL,
  `contactAddress` text,
  `contactEmail` varchar(45) DEFAULT NULL,
  `contactPhone` varchar(45) DEFAULT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `members_id`, `payment_id`, `order_ids`, `contactName`, `contactAddress`, `contactEmail`, `contactPhone`, `postDate`, `status`) VALUES
(1, 43, 12, '1', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-25 12:32:57', 1),
(2, 43, 13, '', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-25 12:40:49', 1),
(3, 43, 14, '2', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-25 13:23:34', 1),
(4, 43, 15, '3', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-25 13:25:36', 1),
(5, 43, 16, '4', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-25 13:27:09', 1),
(6, 43, 17, '5', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 08:41:18', 1),
(7, 43, 18, '6', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 10:58:46', 1),
(8, 43, 19, '', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 11:01:12', 1),
(9, 43, 20, '7', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 11:04:49', 1),
(10, 43, 21, '', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 11:05:24', 1),
(11, 43, 22, '8', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 11:05:48', 1),
(12, 43, 23, '9', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 11:09:09', 1),
(13, 43, 24, '', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-26 11:09:47', 1),
(14, 43, 25, '10', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-27 03:13:02', 1),
(15, 43, 26, '11', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-27 03:15:07', 1),
(16, 43, 27, '12', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-27 03:16:47', 1),
(17, 43, 28, '13', 'som', 'aarubari', 'crestasom@gmail.com', '99233234', '2016-02-27 03:18:45', 1),
(18, 43, 29, '14', 'Som', 'Jorpati', 'crestasom@gmail.com', '98303248', '2016-02-27 09:52:23', 1),
(19, 43, 30, '15, 16', 'Som', 'Jorpati', 'crestasom@gmail.com', '98303248', '2016-02-28 12:21:02', 1),
(20, 43, 31, '17', 'Som', 'Jorpati', 'crestasom@gmail.com', '98303248', '2016-02-28 12:32:17', 1),
(21, 14, 32, '18', '', '', '', NULL, '2016-04-04 14:36:03', 0),
(22, 43, 33, '19', 'Som Shrestha', 'aarubari', 'crestasom@gmail.com', '9849156505', '2016-11-27 07:35:34', 0),
(23, 43, 34, '20', 'Som Shrestha', 'jorpati', 'crestasom@gmail.com', '9849156505', '2016-11-27 07:42:40', 0),
(24, 43, 35, '21', 'Som Shrestha', 'jorpati', 'crestasom@gmail.com', '9849156505', '2016-11-27 07:43:54', 0),
(25, 43, 36, '22', 'Som Shrestha', 'fsfd', 'crestasom@gmail.com', '7867876', '2017-06-23 08:38:25', 0),
(26, 53, 37, '23', 'Resham Udas', 'jorpati', 'resham12315@gmail.com', '09809898', '2017-09-24 14:40:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(45) DEFAULT NULL,
  `seoTitle` varchar(45) DEFAULT NULL,
  `seoDesc` varchar(45) DEFAULT NULL,
  `hits` varchar(45) DEFAULT '0',
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `title`, `url`, `seoTitle`, `seoDesc`, `hits`, `postDate`, `status`, `image`) VALUES
(1, 'Nike', 'nike-shoes', 'Nike Shoes', 'Nike Shoes', '113', '2015-06-25 16:44:50', 1, '/ecommerce/uploads/files/manufacturer/download.jpg'),
(2, 'Vans', 'vans-shoes', 'Vans Shoes', 'Vans Shoes', '61', '2015-06-25 16:45:15', 1, '/ecommerce/uploads/files/manufacturer/vans-logo.jpg_pagespeed_ce_OBx57oJ2Us.jpg'),
(3, 'Rayban', 'rayban', 'Rayban', 'rayban', '54', '2015-10-15 12:57:03', 1, '/project/uploads/files/manufacturer/received_1013699598671038.jpeg'),
(4, 'Levis', 'levis', 'Levis', 'Levis', '52', '2015-10-28 08:00:16', 1, 'Choose-Image'),
(5, 'Erike Shoes', 'erike-shoes', 'Erike Shoes', 'Erike Shoes', '130', '2016-02-22 10:09:37', 1, 'Choose-Image'),
(6, 'Others', 'others', 'Mixed Product of different manufacturers', 'Mixed Product of different manufacturers', '53', '2016-02-25 07:08:16', 1, 'Choose-Image');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `address` text,
  `mobile` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lastLoginIp` varchar(45) DEFAULT NULL,
  `lastLoginDate` datetime DEFAULT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `verCode` int(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `secretKey` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fullname`, `address`, `mobile`, `email`, `password`, `postDate`, `lastLoginIp`, `lastLoginDate`, `approved`, `verCode`, `status`, `secretKey`) VALUES
(1, 'Ram Shrestha', NULL, NULL, 'ramstha@hotmail.com', '202cb962ac59075b964b07152d234b70', '2015-06-30 14:07:18', NULL, NULL, 1, 4979, 1, 'd655110fe2683576e936688654697094'),
(2, '', NULL, NULL, 'shyam@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2015-07-01 13:10:04', NULL, NULL, 1, NULL, 1, 'cc7453be5675cbef543d8f5cdf491809'),
(10, '', NULL, NULL, 'aditi_shrestha@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2015-07-01 13:29:31', NULL, NULL, 1, NULL, 1, 'f7e06441765b5192294381a37c869ba3'),
(11, 'hari tamang', NULL, NULL, 'tamanghari@gmail.com', '202cb962ac59075b964b07152d234b70', '2015-10-29 08:58:31', NULL, NULL, 0, NULL, 1, 'c81f2eb0568ca647fc6d73b6f4186990'),
(12, 'Hari Tamang', NULL, NULL, 'tamanghari1@gmail.com', '202cb962ac59075b964b07152d234b70', '2015-10-29 08:59:32', NULL, NULL, 0, NULL, 1, '45e558bfc8691e921c3bc80a5d7297a1'),
(13, 'hari tamang', NULL, NULL, 'tamanghari@hotmail.com', '202cb962ac59075b964b07152d234b70', '2015-10-29 09:04:50', NULL, NULL, 0, NULL, 1, 'ee122428dcad9f58413f4b619310e946'),
(14, 'abc sharma', NULL, NULL, 'abcmail@yahoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-29 09:06:19', NULL, NULL, 1, NULL, 1, '3717775affb6592b1740b5cb1c00b6c6'),
(15, 'som', NULL, NULL, 'shrestha_som@gmail.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:12:44', NULL, NULL, 0, NULL, 1, '4e5c744658d529316dc2b57b632a6efe'),
(16, 'som', NULL, NULL, 'shrestha_som@gmail.coma', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:13:17', NULL, NULL, 0, NULL, 1, '37c0046712899be05f4d574b5f74e879'),
(18, 'somm', NULL, NULL, 'som@mail.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:22:59', NULL, NULL, 0, NULL, 1, '941d18a05e03ba8cb9843ddcced776eb'),
(21, 'dsfsd', NULL, NULL, 'wiwej2LKSD@JSD.CLJS', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:36:50', NULL, NULL, 0, NULL, 1, 'a5bcbcd923211501473d1d8c1350a583'),
(22, 'pod', NULL, NULL, 'lkdglkj@sdf.slf', 'bcbe3365e6ac95ea2c0343a2395834dd', '2015-10-31 09:41:40', NULL, NULL, 0, NULL, 1, '1bb2b8b2339c0d0c6056099eab06bed6'),
(23, 'djlk', NULL, NULL, 'lssdfjk@sdjf.cos', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:49:55', NULL, NULL, 0, NULL, 1, '046143c50e261c9faf22afe0716dc275'),
(24, 'abc', NULL, NULL, 'abcmail@yahaoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:55:13', NULL, NULL, 0, NULL, 1, 'fab3f8692db110b7a87c22f33c1f6cb9'),
(25, 'abc', NULL, NULL, 'abcmail@yaahaoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:55:51', NULL, NULL, 0, NULL, 1, 'b57c1ac7f51a4458291f43be98e8ef05'),
(26, 'abc', NULL, NULL, 'abcmail@yaaahaoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:56:29', NULL, NULL, 0, NULL, 1, '3d462569866de9de8221404eb8f7e3b2'),
(27, 'abc', NULL, NULL, 'abcmail@yaaaahaoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 09:57:48', NULL, NULL, 0, NULL, 1, '422538301c5642a353d0a57c4a607272'),
(28, 'abc', NULL, NULL, 'abcmail@yaaaaahaoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 10:02:36', NULL, NULL, 0, NULL, 1, '23bfaa2315b264abc5045bacda7c68e5'),
(29, 'abc', NULL, NULL, 'abcmail@yaaaaaahaoo.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 10:04:18', NULL, NULL, 0, NULL, 1, '143b84b7269c905800f53342f16e56ee'),
(30, 'avd', NULL, NULL, 'asassdf@mail.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 10:07:05', NULL, NULL, 0, NULL, 1, '25e96528108bea03bc8100c38e5422aa'),
(31, 'abc', NULL, NULL, 'abcm@yaho.com', '202cb962ac59075b964b07152d234b70', '2015-10-31 10:13:03', NULL, NULL, 0, NULL, 1, 'ec3c1a343d47108579edd1834a2dfd2a'),
(32, 'abc', NULL, NULL, 'abcm@yaho.comq', '202cb962ac59075b964b07152d234b70', '2015-10-31 10:17:51', NULL, NULL, 0, NULL, 1, '3a8642c224a7b37edc0569b6dd753e43'),
(33, 'dnsf', NULL, NULL, 'dnsf@email.com', '202cb962ac59075b964b07152d234b70', '2015-11-07 00:13:24', NULL, NULL, 0, NULL, 1, 'cbdf1e53b8aec4bc01234c892a9761eb'),
(34, 'dnsf', NULL, NULL, 'dnsf@email.coma', '202cb962ac59075b964b07152d234b70', '2015-11-07 00:15:02', NULL, NULL, 0, NULL, 1, '4e63e0fc015ed716ca189fec3cbfa6e5'),
(35, 'djsdi', NULL, NULL, 'oisdsoi@dskfj.sdlk', '202cb962ac59075b964b07152d234b70', '2015-11-07 00:17:19', NULL, NULL, 0, NULL, 1, '72686c75d1166a6f0a6e7ac29c9ced45'),
(36, 'dnsf', NULL, NULL, 'dnsf@email.comas', '202cb962ac59075b964b07152d234b70', '2015-11-07 00:19:48', NULL, NULL, 0, NULL, 1, '90f06970b0730e80e8d36a122975833b'),
(37, 'spdsdp', NULL, NULL, 'posdgposd@posd.sdkj', '202cb962ac59075b964b07152d234b70', '2015-11-07 00:22:37', NULL, NULL, 0, NULL, 1, '77195d3bbb02c57a6430fe8ec6e63fab'),
(38, 'zvkdsj', NULL, NULL, 'lksdglksd@kdg.epo', '202cb962ac59075b964b07152d234b70', '2015-11-07 00:24:00', NULL, NULL, 0, NULL, 1, '70e810733cb96ce5d5cf8a3e6e263870'),
(39, ';lsdkj', NULL, NULL, 'saldkasdfj@lksdg.com', '202cb962ac59075b964b07152d234b70', '2015-11-07 04:17:44', NULL, NULL, 1, NULL, 1, 'd2b077f0ffb51fc3f7e3517de78fe43a'),
(40, 'sadlk', NULL, NULL, 'klsdjflksdfjk@ksf.com', '202cb962ac59075b964b07152d234b70', '2015-11-07 04:18:49', NULL, NULL, 0, NULL, 1, 'e3e2cf3a603cfd90bdf262222f0a514a'),
(41, 'abcd', NULL, NULL, 'abc@d.e', '202cb962ac59075b964b07152d234b70', '2015-11-08 04:12:37', NULL, NULL, 0, NULL, 1, '2a7895bcf8da4f00c38ab482f552a95c'),
(42, 'Shrestha Som', NULL, NULL, '10206114901965531', '', '2015-11-23 08:46:57', NULL, NULL, 0, NULL, 1, NULL),
(43, 'Som Shrestha', NULL, NULL, 'crestasom@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-07 07:31:37', NULL, NULL, 1, 9574, 1, '24a1e1065369b33d68901950661fff13'),
(44, 'sadfs', NULL, NULL, 'sdsdfsdfs@sds.css', '202cb962ac59075b964b07152d234b70', '2015-12-07 12:41:09', NULL, NULL, 1, NULL, 1, 'f1a2ed8272360ebb10b6c8b2626374f8'),
(45, 'assfs', NULL, NULL, 'sdsdgfhf@sdg.vx', '202cb962ac59075b964b07152d234b70', '2015-12-07 12:42:19', NULL, NULL, 1, NULL, 1, '814a0c9fd626d47012aaa51f2b8c3cc9'),
(46, 'Aaditya Tamang', NULL, NULL, '139616086405630', '', '2015-12-14 07:07:34', NULL, NULL, 0, NULL, 1, NULL),
(47, 'sushan shrestha', NULL, NULL, 'sushan@gmail.com', '4f5a196bd1ae4f5dc19267e127af76d4', '2016-04-04 13:01:29', NULL, NULL, 0, NULL, 1, '888680da575a54e7e420f99f002527dc'),
(48, 'apple', NULL, NULL, 'apple@gmail.com', '1f3870be274f6c49b3e31a0c6728957f', '2016-04-04 13:03:07', NULL, NULL, 0, NULL, 1, 'dc7de5f593f76bea846230e0a9911954'),
(49, 'som', 'jorpati', '9849156505', 'somps012348@nec.edu.np', '202cb962ac59075b964b07152d234b70', '2016-11-29 04:33:27', NULL, NULL, 0, 6832, 1, 'e148252a902a8a3878d12ed69a3e407e'),
(50, 'som', 'jorpati', '9821424234', 'somps@gmail.com', '202cb962ac59075b964b07152d234b70', '2016-12-05 03:52:51', NULL, NULL, 0, NULL, 1, '08f55141a12ea9c8300e287c17c76702'),
(51, 'Anjan Ghising Tamang', 'Boudha,Kathmandu', '9803849626', 'anjanghisingtamang@gmail.com', 'e1a6ecb2f59f0b30e3037a083bba7dd9', '2017-08-28 09:29:38', NULL, NULL, 0, NULL, 1, 'c8e67d4c129f8d0c2993169bf54a7e2a'),
(52, 'Avram Kelly', 'Labore exercitationem proident sunt in aliqua Do non qui aliquam aut quia nemo proident modi', '9849234131', 'sojijuseva@hotmail.com', '9639746f6d1d869a6916aaf459a309b4', '2017-09-21 02:44:18', NULL, NULL, 0, NULL, 1, 'cf45feafc0638c32f219c63d720956fd'),
(53, 'Resham Udas', 'jorpati', '09809898', 'resham12315@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2017-09-24 14:39:08', NULL, NULL, 1, NULL, 1, 'd3b7fcf3ae9281bdadd95a262ccf6ab7');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `converted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `members_id`, `stock_id`, `quantity`, `postDate`, `status`, `converted`) VALUES
(1, 43, 28, 1, '2016-02-25 12:32:57', 1, 0),
(2, 43, 23, 2, '2016-02-25 13:23:34', 1, 0),
(3, 43, 23, 1, '2016-02-25 13:25:35', 1, 0),
(4, 43, 23, 1, '2016-02-25 13:27:09', 1, 0),
(5, 43, 33, 1, '2016-02-26 08:41:18', 1, 0),
(6, 43, 23, 1, '2016-02-26 10:58:46', 1, 0),
(7, 43, 23, 1, '2016-02-26 11:04:48', 1, 0),
(8, 43, 23, 1, '2016-02-26 11:05:48', 1, 0),
(9, 43, 23, 1, '2016-02-26 11:09:09', 1, 0),
(10, 43, 23, 1, '2016-02-27 03:13:02', 1, 0),
(11, 43, 23, 1, '2016-02-27 03:15:07', 1, 0),
(12, 43, 23, 1, '2016-02-27 03:16:47', 1, 0),
(13, 43, 23, 1, '2016-02-27 03:18:45', 1, 0),
(14, 43, 28, 1, '2016-02-27 09:52:22', 1, 0),
(15, 43, 39, 2, '2016-02-28 12:21:01', 1, 0),
(16, 43, 28, 1, '2016-02-28 12:21:01', 1, 0),
(17, 43, 39, 1, '2016-02-28 12:32:17', 1, 0),
(18, 14, 28, 1, '2016-04-04 14:36:03', 1, 0),
(19, 43, 23, 1, '2016-11-27 07:35:34', 1, 0),
(20, 43, 24, 1, '2016-11-27 07:42:40', 1, 0),
(21, 43, 24, 1, '2016-11-27 07:43:54', 1, 0),
(22, 43, 24, 1, '2017-06-23 08:38:25', 1, 0),
(23, 53, 24, 1, '2017-09-24 14:40:59', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `payway` varchar(45) DEFAULT NULL,
  `transactionKey` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `detail` varchar(45) DEFAULT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `members_id`, `payway`, `transactionKey`, `amount`, `detail`, `postDate`, `status`) VALUES
(1, 1, 'paypal', '27V596509P074392H', '1.50', 'After payment in paypal', '2015-11-18 01:54:32', '1'),
(2, 1, 'paypal', '27V596509P074392H', '1.50', 'After payment in paypal', '2015-11-18 01:58:38', '1'),
(3, 1, 'paypal', '27V596509P074392H', '1.50', 'After payment in paypal', '2015-11-18 02:04:02', '1'),
(4, 1, 'paypal', '2XE139482G2518225', '0.74', 'After payment in paypal', '2015-11-18 13:04:35', '1'),
(5, 43, 'Cash On Delivery', NULL, '240.00', NULL, '2015-12-08 08:40:31', '1'),
(6, 43, 'Cash On Delivery', NULL, NULL, NULL, '2015-12-08 08:42:58', '1'),
(7, 43, 'Cash On Delivery', NULL, '240.00', NULL, '2015-12-08 08:43:43', '1'),
(8, 43, 'Cash On Delivery', NULL, '1650.00', NULL, '2016-02-25 12:29:14', '1'),
(9, 43, 'Cash On Delivery', NULL, '1650.00', NULL, '2016-02-25 12:31:56', '1'),
(10, 43, 'Cash On Delivery', NULL, '1650.00', NULL, '2016-02-25 12:32:26', '1'),
(11, 43, 'Cash On Delivery', NULL, '1650.00', NULL, '2016-02-25 12:32:35', '1'),
(12, 43, 'Cash On Delivery', NULL, '1650.00', NULL, '2016-02-25 12:32:56', '1'),
(13, 43, 'paypal', '9G342928KG3497907', '0.10', 'After payment in paypal', '2016-02-25 12:40:49', '1'),
(14, 43, 'Cash On Delivery', NULL, '6530.00', NULL, '2016-02-25 13:23:34', '1'),
(15, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-25 13:25:35', '1'),
(16, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-25 13:27:09', '1'),
(17, 43, 'Esewa', '0006QIQ', '1', 'After payment in esewa', '2016-02-26 08:41:18', '1'),
(18, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-26 10:58:46', '1'),
(19, 43, 'Cash On Delivery', NULL, NULL, NULL, '2016-02-26 11:01:12', '1'),
(20, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-26 11:04:48', '1'),
(21, 43, 'Cash On Delivery', NULL, NULL, NULL, '2016-02-26 11:05:24', '1'),
(22, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-26 11:05:48', '1'),
(23, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-26 11:09:09', '1'),
(24, 43, 'Cash On Delivery', NULL, NULL, NULL, '2016-02-26 11:09:47', '1'),
(25, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-27 03:13:02', '1'),
(26, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-27 03:15:07', '1'),
(27, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-27 03:16:47', '1'),
(28, 43, 'Cash On Delivery', NULL, '3265.00', NULL, '2016-02-27 03:18:45', '1'),
(29, 43, 'Esewa', '0006QJ9', '1650.00', 'After payment in esewa', '2016-02-27 09:52:22', '1'),
(30, 43, 'Esewa', '0006QJP', '2850.00', 'After payment in esewa', '2016-02-28 12:21:01', '1'),
(31, 43, 'Paypal', '2A656461HH151562D', '6.00', 'After payment in paypal', '2016-02-28 12:32:17', '1'),
(32, 14, 'Cash On Delivery', NULL, '1650.00', 'Cash on Delivery', '2016-04-04 14:36:03', '1'),
(33, 43, 'Esewa', '0007DV0', '3101', 'After payment in esewa', '2016-11-27 07:35:34', '1'),
(34, 43, 'Cash On Delivery', NULL, '3265.00', 'Cash on Delivery', '2016-11-27 07:42:40', '1'),
(35, 43, 'Cash On Delivery', NULL, '3265.00', 'Cash on Delivery', '2016-11-27 07:43:54', '1'),
(36, 43, 'Esewa', '0007JN5', '3101', 'After payment in esewa', '2017-06-23 08:38:25', '1'),
(37, 53, 'Cash On Delivery', NULL, '3265.00', 'Cash on Delivery', '2017-09-24 14:40:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double(12,2) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `summary` text,
  `detail` text,
  `seoTitle` varchar(45) DEFAULT NULL,
  `seoDesc` varchar(45) DEFAULT NULL,
  `hits` varchar(45) DEFAULT '0',
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `manufacturer_id`, `category_id`, `title`, `url`, `image`, `price`, `unit`, `summary`, `detail`, `seoTitle`, `seoDesc`, `hits`, `postDate`, `status`) VALUES
(40, 5, 34, 'Erke Grey and Yellow Running Shoes', 'erke-grey-and-yellow-running-shoes', 'Erika1.jpg,Erika2.jpg,Erika3.jpg', 3265.00, 'pcs', ' For men\r\n\r\nâ€¢ Type: Running shoes\r\n\r\nâ€¢ Style: Lace-up closure with fine stitch detailing on mesh upper\r\n\r\nâ€¢ Colour: Grey and Yellow', '<p>&bull; Revel in comfort and style</p>\r\n\r\n<p>&bull; Brand: Erke</p>\r\n\r\n<p>&bull; Product code: 391</p>\r\n\r\n<p>&bull; Style No.:11115103341</p>\r\n\r\n<p>&bull; For men</p>\r\n\r\n<p>&bull; Type: Running shoes</p>\r\n\r\n<p>&bull; Style: Lace-up closure with fine stitch detailing on mesh upper</p>\r\n\r\n<p>&bull; Colour: Grey and Yellow</p>\r\n\r\n<p>&bull; Upper Material: Micro Fibre and mesh</p>\r\n\r\n<p>&bull; Sole Material: Rubber</p>\r\n\r\n<p>&bull; For daily and sportswear</p>\r\n\r\n<p>&bull; Excellent for your running and jogging sessions</p>\r\n\r\n<p>&bull; Outsole that prevents sliding in high-speed movements</p>\r\n\r\n<p>&bull; Brand logo on tongue</p>\r\n\r\n<p>&bull; Sporty and sturdy</p>\r\n\r\n<p>&bull; Lightweight and comfortable</p>\r\n\r\n<p>&bull; Size-39-42</p>\r\n', 'Erke Grey and Yellow Running Shoes', 'Erke Grey and Yellow Running Shoes', '88', '2016-02-22 10:18:24', 1),
(42, 6, 34, 'Black Cardigan for Men', 'black-cardigan-for-men', 'cardigan1.JPG,cardigan2.JPG', 1650.00, 'pcs', 'â€¢ Colour â€“ Black\r\n\r\nâ€¢ Material â€“ Woollen ', '<p>&bull; Colour &ndash; Black</p>\r\n\r\n<p>&bull; Material &ndash; Woollen</p>\r\n', 'Black Cardigan for Men', 'Black Cardigan for Men', '45', '2016-02-25 07:10:20', 1),
(43, 6, 41, 'Ladies Jacket Purple 843', 'ladies-jacket-purple-843', 'purple jacket.jpg', 1600.00, 'pcs', 'â€¢ Colour â€“ Black\r\n\r\nâ€¢ Material â€“ Woollen ', '<p>&bull; Colour &ndash; Black</p>\r\n\r\n<p>&bull; Material &ndash; Woollen</p>\r\n', 'Ladies Jacket Purple 843', 'Ladies Jacket Purple 843', '26', '2016-02-25 07:15:05', 1),
(44, 6, 38, 'Nepal Flag Printed Combo T-shirt', 'nepal-flag-printed-combo-t-shirt', 'nepal printed.jpg', 1000.00, 'pcs', '', '<div class=\"row-small-12\">\r\n<div class=\"card full-width\">\r\n<div class=\"product-description\">\r\n<ul>\r\n	<li>Color : Multi</li>\r\n	<li>Fabric : &nbsp;Cotton/Polyster mixed</li>\r\n	<li>Neck : Round</li>\r\n	<li>Sleeves : Half</li>\r\n	<li>Wearability : Printed</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"hr row\">\r\n<div class=\"small-4 pvm\">Condition: New</div>\r\n\r\n<div class=\"small-4 pvm\">Gender: Men&#39;s</div>\r\n\r\n<div class=\"small-4 pvm\">Material: Other</div>\r\n\r\n<div class=\"small-4 pvm\">Weight: 0.40 kg</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'Nepal Flag Printed Combo T-shirt', 'Nepal Flag Printed Combo T-shirt', '35', '2016-02-25 07:54:39', 1),
(45, 1, 34, 'Jean John Printed T-shirt', 'jean-john-printed-t-shirt', 'jean john printed.jpg', 1000.00, 'pcs', '    Color : Multi\r\n    Fabric : Cotton\r\n    Neck : Round\r\n    Sleeves : Half\r\n    Wearability : Printed\r\n    Disclaimer : Product color may slightly vary due to photographic lighting sources or your monitor settings.\r\n    Wash Care : Mild Wash\r\n\r\nBrand: Other\r\nCondition: New\r\nGender: Men\'s\r\nMaterial: Cotton\r\nWeight: 0.60 kg\r\n', '<div class=\"row-small-12\">\r\n<div class=\"card full-width\">\r\n<div class=\"product-description\">\r\n<ul>\r\n	<li>Color : Multi</li>\r\n	<li>Fabric : Cotton</li>\r\n	<li>Neck : Round</li>\r\n	<li>Sleeves : Half</li>\r\n	<li>Wearability : Printed</li>\r\n	<li>Disclaimer : Product color may slightly vary due to photographic lighting sources or your monitor settings.</li>\r\n	<li>Wash Care : Mild Wash</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"hr row\">\r\n<div class=\"small-4 pvm\">Brand: <a href=\"http://www.kaymu.com.np/other/\">Other</a></div>\r\n\r\n<div class=\"small-4 pvm\">Condition: New</div>\r\n\r\n<div class=\"small-4 pvm\">Gender: Men&#39;s</div>\r\n\r\n<div class=\"small-4 pvm\">Material: Cotton</div>\r\n\r\n<div class=\"small-4 pvm\">Weight: 0.60 kg</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 'Jean John Printed T-shirt', 'Jean John Printed T-shirt', '31', '2016-02-25 07:57:45', 1),
(46, 6, 38, 'Round Neck Green T-Shirt ', 'round-neck-green-t-shirt-', 'Round Neck.jpg', 600.00, 'pcs', '\r\nBrand: Other\r\nCondition: New\r\nGender: Men\'s\r\nMaterial: Cotton\r\nOccasion: Casual\r\nStitched/Unstitched: Stitched\r\nWeight: 0.30 kg\r\n', '<div class=\"hr row\">\r\n<div class=\"small-4 pvm\">Brand: <a href=\"http://www.kaymu.com.np/other/\">Other</a></div>\r\n\r\n<div class=\"small-4 pvm\">Condition: New</div>\r\n\r\n<div class=\"small-4 pvm\">Gender: Men&#39;s</div>\r\n\r\n<div class=\"small-4 pvm\">Material: Cotton</div>\r\n\r\n<div class=\"small-4 pvm\">Occasion: Casual</div>\r\n\r\n<div class=\"small-4 pvm\">Stitched/Unstitched: Stitched</div>\r\n\r\n<div class=\"small-4 pvm\">Weight: 0.30 kg</div>\r\n</div>\r\n', 'Round Neck Green T-Shirt ', 'Round Neck Green T-Shirt ', '49', '2016-02-25 08:00:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(4) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `entryDate` datetime DEFAULT NULL,
  `detail` text,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `product_id`, `size`, `quantity`, `entryDate`, `detail`, `postDate`, `status`) VALUES
(23, 40, '39', 0, '0000-00-00 00:00:00', NULL, '2016-02-22 10:18:24', 1),
(24, 40, '40', 16, '0000-00-00 00:00:00', NULL, '2016-02-22 10:18:24', 1),
(25, 40, '41', 10, '0000-00-00 00:00:00', NULL, '2016-02-22 10:18:24', 1),
(26, 40, '42', 10, '0000-00-00 00:00:00', NULL, '2016-02-22 10:18:25', 1),
(28, 42, 'l', 7, '0000-00-00 00:00:00', NULL, '2016-02-25 07:10:21', 1),
(29, 42, 'm', 10, '0000-00-00 00:00:00', NULL, '2016-02-25 07:10:21', 1),
(30, 42, 'xl', 10, '0000-00-00 00:00:00', NULL, '2016-02-25 07:10:21', 1),
(31, 43, 'xl.x', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:15:05', 1),
(32, 43, 'm', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:15:05', 1),
(33, 44, 's', -1, '0000-00-00 00:00:00', NULL, '2016-02-25 07:54:40', 1),
(34, 44, 'm', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:54:40', 1),
(35, 44, 'l', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:54:40', 1),
(36, 45, 's', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:57:45', 1),
(37, 45, 'm', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:57:46', 1),
(38, 45, 'l', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 07:57:46', 1),
(39, 46, 's', -3, '0000-00-00 00:00:00', NULL, '2016-02-25 08:00:09', 1),
(40, 46, 'm', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 08:00:09', 1),
(41, 46, 'l', 0, '0000-00-00 00:00:00', NULL, '2016-02-25 08:00:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(45) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `postDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `lastLoginIp` varchar(40) DEFAULT NULL,
  `secretKey` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `email`, `password`, `postDate`, `status`, `isadmin`, `lastLoginIp`, `secretKey`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2015-06-20 10:57:54', 1, 1, '163.182.171.218', 9170),
(2, 'Som Shrestha ', 'som', 'som@gmail.com', '202cb962ac59075b964b07152d234b70', '2015-06-22 15:26:00', 1, 0, '143.95.237.51', 0),
(3, 'lzkdglk', 'laksdjlas', 'lkasfflas', '93484e17048451fa077c5a50778bad35', '2015-06-23 13:43:54', 0, 0, '', 0),
(5, 'aklf', 'lksdlks', 'lk;asdfj', '937e2b4ae5b00ee2c522a9297ebc9785', '2015-06-23 13:44:38', 1, 0, '', 0),
(6, 'asflkasfj;kas', 'lksdjlksdgjskldg', 'lsdkgjlskdgjlskdgjksdlj', '89d538fccfb4d33a4b5a82db1d244803', '2015-06-23 13:44:56', 1, 0, '', 0),
(7, 'salina shiwakoti', 'salina', 'salina@gmail.com', '202cb962ac59075b964b07152d234b70', '2016-01-23 07:41:55', 1, 0, '::1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_members1_idx` (`members_id`),
  ADD KEY `fk_cart_stock1_idx` (`stock_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_UNIQUE` (`url`,`category_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_delivery_members1_idx` (`members_id`),
  ADD KEY `fk_delivery_payment1_idx` (`payment_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_UNIQUE` (`url`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `secretKey_UNIQUE` (`secretKey`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_members1_idx` (`members_id`),
  ADD KEY `fk_orders_stock1_idx` (`stock_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_members1_idx` (`members_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url_UNIQUE` (`url`),
  ADD KEY `fk_product_category_idx` (`category_id`),
  ADD KEY `fk_product_manufacturer1_idx` (`manufacturer_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_product1_idx` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_members` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cart_stock1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_payment1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_stock1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_members1` FOREIGN KEY (`members_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_manufacturer1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
