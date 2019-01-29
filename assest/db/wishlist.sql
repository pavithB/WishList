-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 10:07 AM
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
(10, 'gggg', 'eeeeeedsacsa', 1548256949, 1, 'csdsd', 0, 3),
(13, '44444', 'dsfsfsfsfsfsfsfsfsfsfsfff', 1548262449, 1, 'ff', 25.25, 0),
(18, 'gcjmvh', 'yth', 1548275265, 1, 'rh', 0, 0),
(20, 'kk', 'kk', 1548326720, 5, 'kk', 55, 3),
(51, 'rererere', 'kkkk', 1548625350, 3, 'kkkk', 333, 3),
(52, 'thushan', 'dsddasdasdsd', 1548627005, 3, 'aaaa', 4444, 3),
(53, 'thushaneeeeeeeeee', 'vvvvv', 1548627026, 3, 'vvvv', 566555, 3),
(54, 'lllllllll', 'lllllllllll', 1548629284, 5, 'lllllllll', 25, 3),
(55, 'rrrr', 'rrr', 1548630324, 5, 'rrr', 0, 2),
(56, 'ccccccc', 'cccc', 1548630470, 5, 'ccccc', 34333, 3),
(59, 'toy car', 'remote control racing car', 1548655314, 7, 'https://getbootstrap.com/docsts/tooltips/', 2250, 1),
(66, 'dsada', 'dasdasd', 1548665446, 8, '', 0, 3),
(67, 'ssssss', 'sssssssssss', 1548673548, 3, 'sssss', 33333, 2),
(68, 'chocolate', 'specifically dark chockalete for the special event', 1548674594, 9, 'https://en.wikipedia.org/wiki/Chocolate', 250, 2),
(69, 'chocolate', 'swiss chocho', 1548679983, 7, 'https://m.fac56214449&id=100003620136118', 280, 2),
(70, 'flower vass', 'home decoration vass', 1548680040, 7, 'https://www.google.co', 500, 1),
(71, 'mobilephone', 'brand new iphone 10xs', 1548681132, 9, 'www.apple.com', 1000, 1),
(72, 'handfree', 'akg handfree wireless', 1548681199, 9, 'www.rrrrrrr.com', 56, 2),
(75, 'my1st item', 'item description', 1548682122, 10, 'www.item.com', 23, 1),
(77, 'wwww', 'wwww', 1548690024, 3, 'www', 33333, 1),
(79, 'sdadsd', 'csadas', 1548697456, 3, 'csacacsac', 4, 3),
(80, 'new', 'newdesc', 1548698178, 11, 'www.com.com', 23, 2),
(81, 'two', 'three', 1548698192, 11, 'four', 3333, 3),
(82, 'sacscs', 'cscas', 1548698200, 11, 'csascs', 444, 1),
(83, 'q', 'q', 1548698540, 12, 'q', 2, 1);

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
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Pavith Buddhima', 'pavithbuddhima@gmail.com', 'admin list', 'This is the description to describeabout the this wish list, we can breifly describe our wishlist', 0),
(7, 'jhon', '81dc9bdb52d04dc20036dbd8313ed055', 'Jhon Doe', 'JhonDoe@gmail.com', 'Birthday', 'This list contain all the gift i needed as i wish. and  if you need to  make this birthday special you know what to do', 0),
(9, 'joe', '81dc9bdb52d04dc20036dbd8313ed055', 'joe doe', 'joe@gmail.com', 'suprise', 'most awaited and exited daya in life, and need to be prepared for the day', 0),
(10, 'pavithb', '81dc9bdb52d04dc20036dbd8313ed055', 'pavith buddhima', 'pavith@gmail.com', 'anniversary', 'my wdding anniversary', 0),
(11, 'r', '4b43b0aee35624cd95b910189b3dc231', 'r', 'r@gmail.com', 'r', 'r', 0),
(12, 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'q', 'q@gmail.com', 'q', 'q', 0);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
