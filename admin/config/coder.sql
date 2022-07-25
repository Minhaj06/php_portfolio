-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 10:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coder`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_image` varchar(30) NOT NULL,
  `experience` int(9) NOT NULL,
  `about_title` text NOT NULL,
  `about_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_image`, `experience`, `about_title`, `about_desc`) VALUES
(1, 'about.png', 3, 'Read About My Life Struggle Story!', 'Assalamu Alaikum, It\'s me Md Minhaj Kobir. I\'m a Web & WordPress Developer. I am a student of Computer Science & Technology at Chapainawabganj Polytechnic Institute.');

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achieve_id` int(11) NOT NULL,
  `clients` int(3) NOT NULL DEFAULT 0,
  `projects` int(3) NOT NULL DEFAULT 0,
  `awards` int(3) NOT NULL DEFAULT 0,
  `experience` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`achieve_id`, `clients`, `projects`, `awards`, `experience`) VALUES
(1, 4, 19, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fname` varchar(91) NOT NULL,
  `lname` varchar(91) NOT NULL,
  `occupation` varchar(90) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` varchar(91) NOT NULL,
  `cv` varchar(91) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `fname`, `lname`, `occupation`, `subtitle`, `image`, `cv`) VALUES
(1, 'Coder || Advanced Thinking', 'Md Minhaj', 'Kobir', 'Web Developer', 'A Professional Web Developer And Student Of Computer Science & Technology. I write code. I love programming. Programming is fun.', '120144.png', 'CV of Md Minhaj Kobir.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `serv_item_id` int(11) NOT NULL,
  `service_name` varchar(30) NOT NULL,
  `service_icon` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`serv_item_id`, `service_name`, `service_icon`) VALUES
(1, 'Web Design', '<i class=\"fa-solid fa-laptop-code\"></i>'),
(2, 'Web Development', '<i class=\"fa-solid fa-code\"></i>'),
(3, 'WordPress', '<i class=\"fa-brands fa-wordpress\"></i>'),
(4, 'Wix', '<i class=\"fa-brands fa-wix\"></i>'),
(5, 'JavaScript', '<i class=\"fa-brands fa-js\"></i>'),
(6, 'JQuery', '<i class=\"fa-solid fa-dollar-sign\"></i>'),
(7, 'React', '<i class=\"fa-brands fa-react\"></i>'),
(8, 'PHP', '<i class=\"fa-brands fa-php\"></i>'),
(9, 'Laravel', '<i class=\"fa-brands fa-laravel\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `service_section`
--

CREATE TABLE `service_section` (
  `serv_sec_id` int(10) NOT NULL,
  `service_title` varchar(30) NOT NULL,
  `service_desc` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_section`
--

INSERT INTO `service_section` (`serv_sec_id`, `service_title`, `service_desc`) VALUES
(1, 'Our Services', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et is the quasi architecto beatae vitae dicta sunt explicabo');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(30) NOT NULL,
  `skill_percentage` varchar(10) NOT NULL,
  `skill_color` varchar(30) NOT NULL DEFAULT '#FF4900'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`, `skill_percentage`, `skill_color`) VALUES
(2, 'php', '83', '#FF4900'),
(3, 'CSS', '93', '#FF7004'),
(4, 'bootstrap', '93', '#FF9809'),
(5, 'React', '70', '#FFBF0D'),
(9, 'WordPress', '92', '#FF9809');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `contact_no` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `contact_no`, `image`, `role_as`, `status`, `created_at`) VALUES
(1, 'Md. Minhaj', 'Kobir', 'Minhaj06', '123', 'milonmdminhajkobir@gmail.com', '01303142457', 'Minhaj06.jpg', 1, 0, '2022-07-15 17:58:11'),
(3, 'Md. Nayan', 'Ali', 'Nayan144', '123', 'nayanali144@gmail.com', '015485586454', 'Nayan144.jpg', 0, 0, '2022-07-20 06:31:01'),
(5, 'Md', 'Taharu', 'Taharul06', '123', 'taharul@gmail.com', '01303142457', 'Taharul06.jpg', 0, 0, '2022-07-20 09:47:23'),
(49, 'Test', 'Ltest', 'Test', '123', 'test@gmail.com', '01758721121', 'Test.jpg', 0, 0, '2022-07-20 07:13:59'),
(51, 'Test2', 'Ltest2', 'Test2', '123', 'test2@gmail.com', '0195854555555', 'Test2.jpg', 1, 0, '2022-07-20 06:20:05'),
(52, 'Test3', 'Ltest3', 'Test3', '123', 'test3@gmail.com', '0195854555555', 'Test3.jpg', 0, 0, '2022-05-12 14:53:00'),
(53, 'Test4', 'Ltest4', 'Test4', '123', 'test4@gmail.com', '0195854555555', 'Test4.jpg', 0, 0, '2022-05-12 14:57:53'),
(54, 'Test5', 'Ltest5', 'Test5', '123', 'test5@gmail.com', '01999999999', 'Test5.jpg', 0, 0, '2022-07-20 07:14:11'),
(55, 'Test6', 'Ltest6', 'Test6', '123', 'test6@gmail.com', '01758721121', 'Test6.jpg', 0, 0, '2022-05-12 15:02:56'),
(56, 'Test7', 'Ltest7', 'Test7', '123', 'test7@gmail.com', '0174584445444', 'Test7.jpg', 0, 0, '2022-05-12 15:11:11'),
(57, 'Test8', 'Ltest8', 'Test8', '123', 'test8@gmail.com', '0195854555555', 'Test8.jpg', 0, 0, '2022-05-12 15:25:38'),
(58, 'Test9', 'Ltest9', 'Test9', '123', 'test9@gmail.com', '01758721121', 'Test9.jpg', 0, 0, '2022-05-12 15:30:14'),
(59, 'Test10', 'Ltest10', 'Test10', '123', 'test10@gmail.com', '01999999999', 'Test10.jpg', 0, 0, '2022-05-12 15:38:38'),
(60, 'Test11', 'Ltest11', 'Test11', '123', 'test11@gmail.com', '0174584445444', 'Test11.jpg', 1, 0, '2022-05-12 16:04:21'),
(63, 'Test13', 'Ltest13', 'Test13', '123', 'test13@gmail.com', '01758721121', 'Test13.jpg', 0, 0, '2022-05-12 16:12:28'),
(65, 'Test15', 'Ltest15', 'Test15', '123', 'test15@gmail.com', '0174584445444', 'Test15.jpg', 0, 0, '2022-05-12 16:18:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achieve_id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`serv_item_id`);

--
-- Indexes for table `service_section`
--
ALTER TABLE `service_section`
  ADD PRIMARY KEY (`serv_sec_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achieve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `serv_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_section`
--
ALTER TABLE `service_section`
  MODIFY `serv_sec_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
