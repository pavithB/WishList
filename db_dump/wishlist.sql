-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 03:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wishlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createtime` int(10) NOT NULL,
  `user_id` int(20) NOT NULL,
  `url` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `priority` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `title`, `description`, `createtime`, `user_id`, `url`, `price`, `priority`) VALUES
(59, 'toy cardwqd', 'remote control racing car', 1548655314, 7, 'https://getbootstrap.com/docsts/tooltips/', 2250, 3),
(68, 'chocolate', 'specifically dark chockalete for the special event', 1548674594, 9, 'https://en.wikipedia.org/wiki/Chocolate', 250, 1),
(70, 'flower vass', 'home decoration vass', 1548680040, 7, 'https://www.google.com', 500, 1),
(71, 'mobilephone', 'brand new iphone 10xs', 1548681132, 9, 'www.apple.com', 1000, 1),
(108, 'www', 'wwwwrrrr', 1548858181, 9, 'www', 222, 1),
(111, 'ddqwd', 'dwqdqw', 1548871451, 20, 'dqwdqw', 33, 2),
(114, 'sqs', 'ss', 1548934317, 7, 'ss', 344, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wishlist_name` varchar(100) NOT NULL,
  `wishlist_description` varchar(1000) NOT NULL,
  `shareable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `email`, `wishlist_name`, `wishlist_description`, `shareable`) VALUES
(7, 'jhon', '81dc9bdb52d04dc20036dbd8313ed055', 'Jhon Doe', 'JhonDoe@gmail.com', 'Birthday', 'This list contain all the gift i needed as i wish. and  if you need to  make this birthday special you know what to do', 0),
(9, 'joe', '81dc9bdb52d04dc20036dbd8313ed055', 'joe doe', 'joe@gmail.com', 'suprise', 'most awaited and exited daya in life, and need to be prepared for the day', 0),
(19, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'admin', 'sdfghjkfghjkf', 0),
(20, 'adm', 'b09c600fddc573f117449b3723f23d64', 'jhbnefew', 'pavith@gmIL.COM', 'my wish list', 'rethfyguhjikoddxthfcghujhkl', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
