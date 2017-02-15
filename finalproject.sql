-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2017 at 11:55 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_title` varchar(320) NOT NULL,
  `news_description` text NOT NULL,
  `news_image_url` varchar(6000) NOT NULL,
  `news_deadline` varchar(500) NOT NULL,
  `news_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_title`, `news_description`, `news_image_url`, `news_deadline`, `news_timestamp`) VALUES
('Logo Design and Business Card Design', 'My company need logo & Business.\r\nso if you are challenged to make this for us, you can send your work to:\r\ninfo@blablaland.de with subject Logo Design & Business Card.\r\nPrice: 2000€ Cash\r\nGood luck guys!', 'blablaland.png', '15 June 2017', '2017-02-04 00:17:27'),
('Web Design & Mobile App Design', 'We are the new startup based in Leipzig. We just need a couple amazing thing.\r\nAs you can see we need a great web design and mobile app design.\r\nWe have the budget only 1200€ in transfer.\r\nThis challenge is for everyone in Camping Art.\r\nSend us your artwork to hello@liebemachtspass.de with subject Web Design / Mobile App.\r\nGood Luck guys!', '', '12 August 2017', '2017-02-04 08:53:01'),
('Brand design', 'Hey, we are form Vittel AG and we based in Berlin.\r\nI heard some many friends of mine, all people in here are absolute amazing.\r\nWe need you to help us to make our brand new design.\r\nIt could be for all challenger in Camping Art.\r\nWe have 3200€ for the winner and this project should be original and look fancy as well.\r\nAfter we got all design, we will call you soon as possible.\r\nWhat are you waiting for? Good luck', 'http://www.nestle-waters.com/asset-library/publishingimages/newfolder/imagebank/bouteilles/vittel_hr.png', '30 June 2017', '2017-02-13 11:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(64) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_role` varchar(32) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`, `user_role`, `user_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'irhamputraprasetyo@gmail.com', 'admin', '2017-02-10 19:20:27'),
(0, 'irhamputra', 'ae51f075e63bfa905c95ee1c5f6fb036', 'hello@irhamputra.com', 'Designer', '2017-02-10 19:24:14'),
(0, 'ulfapus', 'a08151cf65d440fc13ef28c94e0be3d8', 'ulfapus@gmail.com', 'Client', '2017-02-10 19:25:10'),
(0, 'm.stockenberg', '505c660dbdd33aa583a9098540b34a8b', 'm.stockenberg@gmail.com', 'Client', '2017-02-15 21:55:23'),
(0, 'm.lutze', '925d7518fc597af0e43f5606f9a51512', 'whatever@blabla.de', 'Designer', '2017-02-15 22:51:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
