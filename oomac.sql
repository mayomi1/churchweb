-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2016 at 12:23 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oomac`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `blog_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `post_title`, `post_content`, `post_date`, `post_author`, `blog_image`) VALUES
(44, 'great new', 'The history of Oloyede memorial Anglican church</h3>\r\n                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.\r\n                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.\r\n                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.\r\n                Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of\r\n                them accusamus labore sustainable VHS.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in ', '2016-08-16 03:14:09', '1', 'bblite.JPG'),
(46, 'huuh', 'mnjjl njjhhhhhhj', '2016-08-16 11:21:33', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_reply`
--

CREATE TABLE `blog_reply` (
  `reply_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `reply_author` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `reply_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_reply`
--

INSERT INTO `blog_reply` (`reply_id`, `blog_id`, `reply_author`, `comment`, `reply_date`) VALUES
(4, 45, 'new', 'test', '2016-08-16 11:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_details` text NOT NULL,
  `event_picture` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `event_details`, `event_picture`, `date`) VALUES
(6, 'youth sunday', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.\r\n                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.\r\n                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.\r\n                Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#039;t heard of\r\n                them accusamus labore sustainable VHS.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquamLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore', 'dd.jpg', '12/07/2017');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(1, 'maya1.JPG'),
(2, 'Capture.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `password`) VALUES
(1, 'admin', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3');

-- --------------------------------------------------------

--
-- Table structure for table `prayer_request`
--

CREATE TABLE `prayer_request` (
  `id` int(11) NOT NULL,
  `name_of_sender` varchar(200) NOT NULL,
  `prayer_request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prayer_request`
--

INSERT INTO `prayer_request` (`id`, `name_of_sender`, `prayer_request`) VALUES
(1, 'thek', 'rjwjeew');

-- --------------------------------------------------------

--
-- Table structure for table `president`
--

CREATE TABLE `president` (
  `id` int(11) NOT NULL,
  `vicar_adress` text,
  `vicar_picture` varchar(200) DEFAULT NULL,
  `president_address` text,
  `president_picture` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `president`
--

INSERT INTO `president` (`id`, `vicar_adress`, `vicar_picture`, `president_address`, `president_picture`) VALUES
(1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.\r\n                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.\r\n                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.\r\n                Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#039;t heard of\r\n                them accusamus labore sustainable VHS.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquamLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquamLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam', 'ol.jpg', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.\r\n                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.\r\n                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo.\r\n                Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#039;t heard of\r\n                them accusamus labore sustainable VHS.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquamLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquamLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.\r\n                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n                sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam', '14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `units_list`
--

CREATE TABLE `units_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `units` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units_list`
--

INSERT INTO `units_list` (`id`, `name`, `units`) VALUES
(1, 'wale', 'Editorial');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_reply`
--
ALTER TABLE `blog_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `prayer_request`
--
ALTER TABLE `prayer_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president`
--
ALTER TABLE `president`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units_list`
--
ALTER TABLE `units_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `blog_reply`
--
ALTER TABLE `blog_reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prayer_request`
--
ALTER TABLE `prayer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `president`
--
ALTER TABLE `president`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `units_list`
--
ALTER TABLE `units_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
