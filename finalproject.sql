-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2017 at 01:34 AM
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
  `news_id` int(11) NOT NULL,
  `news_title` varchar(320) NOT NULL,
  `news_description` text NOT NULL,
  `news_image_url` varchar(6000) NOT NULL,
  `news_deadline` varchar(500) NOT NULL,
  `news_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_image_url`, `news_deadline`, `news_timestamp`) VALUES
(0, 'Logo Design and Business Card Design', 'My company need logo & Business.\r\nso if you are challenged to make this for us, you can send your work to:\r\ninfo@blablaland.de with subject Logo Design & Business Card.\r\nPrice: 2000€ Cash\r\nGood luck guys!', 'blablaland.png', '15 June 2017', '2017-02-04 00:17:27');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'whatever@gmail.com', 'admin', '2017-02-03 22:57:05'),
(2, 'john_doe', '6579e96f76baa00787a28653876c6127', 'john_doe@gmail.com', 'client', '2017-02-03 22:57:05');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
