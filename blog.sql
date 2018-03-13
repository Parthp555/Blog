-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2017 at 03:23 PM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `id` int(11) NOT NULL,
  `blogger` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(150) NOT NULL,
  `descript` varchar(250) NOT NULL,
  `post` varchar(2500) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`id`, `blogger`, `date`, `title`, `descript`, `post`, `status`) VALUES
(1, 'karan1106', '2017-08-29 08:09:27', 'Real Madrid v/s Valencia: As it happened', 'Full-time: Real Madrid 2-2 Valencia\r\n', 'That was a very good game. Madrid were slightly off it but still very good, Asensio in particular, while Valencia played more or less as well as they can, strong at the back and ballsy going forward. They thoroughly earned their point, and look a good bet for the top four.', '1'),
(2, 'admin', '2017-08-29 08:10:16', ' Mayweather vs McGregor', 'Masterly Floyd Mayweather gives bold Conor McGregor a boxing schooling ', 'Floyd Mayweather defeats Conor McGregor by 10th round TKO\r\nHow Mayweather triumphed in his final fight\r\nMayweather pays tribute to his \'dance partner\' opponent after fight\r\nAfter this huge bout, will there be a rematch? \r\nPurse, prize money and winner earnings details\r\n', '1'),
(5, 'karan1106', '2017-08-29 08:23:47', 'Hockey captain Manpreet Singh', 'The #HiddenHero of sport more Indians should know about', 'On 18th June, 2017, 11 Indian men took the country to an embarrassing 180-run defeat at the hands of arch rival Pakistan in the finals of the ICC Champions Trophy at the Oval. Elsewhere, in London, another 11 Indian men hammered Pakistan to a 7-1 defeat in what is actually our country’s national game, hockey. The person responsible for this victory is the 25-year-old Manpreet Singh.\r\n\r\nFollowers of the sport will argue that the win against Pakistan offered pride, and little else. To them, and other critics, here’s news: just a few days ago, Manpreet led the Indian side to win against the invincible Dutch, and then the Austrians.', '1'),
(6, 'admin', '2017-08-29 08:24:36', '\'Best in the league\' - Ben Simmons\'', 'Ben Simmons may be one of the favourites to win this season\'s NBA Rookie of the Year title, but the Melbourne native has much loftier goals.', 'Simmons -- back home for a two-week break visiting family and friends, playing pick-up games, watching AFL matches, \"doing touristy things,\" and hosting his own basketball camp -- is on the verge of finally playing for the Philadelphia 76ers after a debut season wrecked by a serious foot injury.\r\n\r\nThe 2016 No.1 draft pick is, alongside first-year Los Angeles Lakers point guard Lonzo Ball, one of the hot favourites to take out this season\'s award for best rookie, but on Sunday he was forthright in outlining a much higher ambition.', '0'),
(7, 'karan1106', '2017-08-29 08:26:20', 'Neymar to PSG transfer saga', 'Everything to know about the Barcelona star\'s potential move', 'The Neymar to PSG rumors continue to pick up steam and have hit new levels of being a circus just days after a report from Brazil suggested that the Barcelona star was on the verge of moving to the French capital in a deal worth over $200 million.\r\nBarcelona defender Gerard Pique says on social media that Neymar is staying at the club. We\'ll have to see if Pique is right in the end.But in the end he was transferred to PSG for $220 Millon', '1');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` varchar(25) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `comment`, `time`) VALUES
(2, 'karan1106', 'Well this was interesting', '2017-08-29 09:33:07'),
(2, 'karan1106', 'New comment', '2017-08-29 09:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `userID` varchar(25) NOT NULL,
  `following` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`userID`, `following`) VALUES
('karan1106', 'admin'),
('admin', 'karan1106');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `userID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userID`) VALUES
(2, 'karan1106');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notif` int(11) NOT NULL,
  `userID` varchar(25) NOT NULL,
  `descript` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notif`, `userID`, `descript`, `status`, `time`) VALUES
(1, 'karan1106', 'You blog with blog id 1 is now available publicaly', 1, '2017-08-29 08:27:09'),
(2, 'admin', 'You blog with blog id 2 is now available publicaly', 1, '2017-08-29 08:27:11'),
(3, 'karan1106', 'You blog with blog id 7 is now available publicaly', 1, '2017-08-29 08:27:17'),
(4, 'karan1106', 'admin followed you', 1, '2017-08-29 08:29:34'),
(5, 'admin', 'karan1106 followed you', 1, '2017-08-29 08:45:48'),
(6, 'admin', 'karan1106 liked your blogpost with blogID 2.', 1, '2017-08-29 09:32:55'),
(7, 'admin', 'karan1106 commented on your blogpost with blogID 2.', 1, '2017-08-29 09:33:07'),
(8, 'admin', 'karan1106 liked your blogpost with blogID 2.', 1, '2017-08-29 09:33:13'),
(9, 'karan1106', 'admin unfollowed you', 1, '2017-08-29 09:34:42'),
(10, 'karan1106', 'admin followed you', 1, '2017-08-29 09:34:47'),
(11, 'karan1106', 'You blog with blog id 5 is now available publicaly', 1, '2017-08-29 09:38:22'),
(12, 'admin', 'karan1106 liked your blogpost with blogID 2.', 1, '2017-08-29 09:39:26'),
(13, 'admin', 'karan1106 commented on your blogpost with blogID 2.', 1, '2017-08-29 09:39:37'),
(14, 'admin', 'karan1106 unfollowed you', 1, '2017-08-29 09:40:17'),
(15, 'admin', 'karan1106 followed you', 1, '2017-08-29 09:40:31'),
(16, 'karan1106', 'Permissions were updated, you are Administrator now.', 1, '2017-08-29 09:46:32'),
(17, 'karan1106', 'Your write permissions have been updated.You cannot WriteBlogs anymore :(', 1, '2017-08-29 09:47:25'),
(18, 'karan1106', 'Your write permissions have been updated.You can write new blogposts now :)', 1, '2017-08-29 09:47:49'),
(19, 'karan1106', 'You blog with blog id 8 was deleted because of moderation policy', 1, '2017-08-29 09:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `profession` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `type` char(1) NOT NULL DEFAULT 'B',
  `canWrite` int(11) NOT NULL DEFAULT '0',
  `verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `password`, `name`, `mail`, `birthdate`, `profession`, `city`, `type`, `canWrite`, `verified`) VALUES
('adi101', '1234', 'adi', 'karan.juenja619@gmail.com', '1997-06-11', 'Student', 'Indore', 'B', 0, 0),
('admin', 'password', 'Super Admin', 'mailit987@gmail.com', '2017-08-01', 'Blogger', 'Surat', 'A', 1, 1),
('karan1106', '1234', 'Karan Juneja', 'karan.juneja1106@gmail.com', '1997-06-11', 'Student', 'Surat', 'A', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogger` (`blogger`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `id` (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`userID`,`following`),
  ADD KEY `following` (`following`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`,`userID`),
  ADD KEY `id` (`id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notif`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD CONSTRAINT `blogpost_ibfk_1` FOREIGN KEY (`blogger`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id`) REFERENCES `blogpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`following`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `blogpost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
