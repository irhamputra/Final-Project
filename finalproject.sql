-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2017 at 04:42 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `finalproject`
--

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
(1, 'admin', 'admin', 'irhamputraprasetyo@gmail.com', 'admin', '2017-02-02 09:33:52'),
(2, 'irhamputra', '94d72ffd8d33de4f486b795446cff440', 'hello@irhamputra.com', 'admin', '2017-02-02 12:27:19');
