-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2023 at 10:22 AM
-- Server version: 5.7.37
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compareduck1_goyama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `pid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `generated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `exp_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`pid`, `username`, `email`, `password`, `reset_link_token`, `generated_on`, `exp_date`) VALUES
(1, 'admin', 'admin@gmail.com', '953f09c44c61118452dfdc131a3a0f78', '', '2023-10-10 06:05:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `tagline` text,
  `image` longtext,
  `status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `tagline`, `image`, `status`) VALUES
(6, 'Fruitful Investment', 'Key to creating a\r\nfruitful\r\nInvestment\r\nPortfolio is\r\nDiversification.', '1697025734image.jpg', '1'),
(7, 'Biased Discissions', 'Non speculation\r\nand no Sector\r\nbiased discissions\r\nshould be taken\r\ncare of while\r\ninvesting.', '1697025775image.jpg', '1'),
(8, 'Wealth Creation ', 'We believe that Wealth Creation is a\r\nlong-term journey,\r\ncomes through\r\ndisciplined wealth\r\nPreservation over\r\nthe period...', '1697025813image.jpg', '1'),
(9, 'Sustain our capital', 'We need to\r\nsafeguard and\r\nsustain our capital\r\ncreated.', '1697025855image.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `systemsetting`
--

CREATE TABLE `systemsetting` (
  `id` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `tagline` longtext NOT NULL,
  `email` longtext NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footerlogo` varchar(255) NOT NULL,
  `abouttitle` longtext NOT NULL,
  `aboutdec` longtext NOT NULL,
  `footer_des` longtext,
  `facebook` longtext NOT NULL,
  `instagram` longtext NOT NULL,
  `twitter` longtext NOT NULL,
  `linkdin` longtext NOT NULL,
  `youtube` longtext NOT NULL,
  `Iframe` longtext NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `creatdate` varchar(255) NOT NULL,
  `updatedate` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemsetting`
--

INSERT INTO `systemsetting` (`id`, `companyname`, `tagline`, `email`, `mobile`, `address`, `logo`, `favicon`, `footerlogo`, `abouttitle`, `aboutdec`, `footer_des`, `facebook`, `instagram`, `twitter`, `linkdin`, `youtube`, `Iframe`, `status`, `creatdate`, `updatedate`) VALUES
(1, 'Goyama', '#', 'connect@goyamafinserv.com', '+91 73049 48075', ' A/308, Vardhman Chamber, Plot no. 84, Sector 17, Vashi Navi Mumbai - 400703', '1696917760logo.png', '1696917760favicon.png', '1696917760footerlogo.png', '#', '<p>Established in the year 2014, Goyama Financial Services is a trusted name in the financial industry. Our foundation is built upon a strong set of values that prioritize ethics, discipline, and commitment. As AMFI Registered Mutual Fund Distributors, we have a decade-worth of experience, catering to the diverse needs of our valued clients.</p>\r\n\r\n<p>At Goyama Financial Services, we take pride in our extensive client base, which consists of over 400 satisfied customers, and continues to grow steadily. We believe in fostering long-term relationships with our clients and strive to provide them with exceptional financial solutions tailored to their specific requirements.</p>\r\n\r\n<p>Our team of professionals holds various certifications and expertise in the financial sector. We have successfully completed the:</p>\r\n\r\n<p>- NISM-Series-V-A: Mutual Fund Distributors Certification Examination<br />\r\n- NISM-Series-X-A: Investment Adviser (Level 1) Certification Examination<br />\r\n- NISM-Series-X-B: Investment Adviser (Level 2) Certification Examination<br />\r\n- FPSB&#39;s CERTIFIED FINANCIAL PLANNER designation.</p>\r\n\r\n<p>At Goyama Financial Services, we prioritize our client&#39;s financial well-being above all else. We understand the importance of financial security and are dedicated to helping individuals and families achieve their financial objectives. With our expertise and commitment, we aim to provide reliable and efficient financial services that empower our clients to make informed decisions and secure their financial future.</p>\r\n\r\n<p>Join us on this journey toward financial success, and let Goyama Financial Services be your trusted partner in navigating the complexities of the financial world.</p>\r\n', 'Established in the year 2014, Goyama Financial Services is a trusted name in the financial industry. Our foundation is built upon a strong set of values that prioritize ethics, discipline, and commitment.', '', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.8767466615127!2d72.99713767449214!3d19.06915595656517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c1ac3fbc1841%3A0x413019fc28c99c72!2sGoyama%20Financial%20Services!5e0!3m2!1sen!2sin!4v1697008333782!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1', '11-10-2023 01:43:19 pm', '11-10-2023 01:43:19 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemsetting`
--
ALTER TABLE `systemsetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `systemsetting`
--
ALTER TABLE `systemsetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
