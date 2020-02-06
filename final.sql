-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 11:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `112_noti`
--

CREATE TABLE `112_noti` (
  `sl` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `seen_unseen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `112_noti`
--

INSERT INTO `112_noti` (`sl`, `type`, `ann`, `seen_unseen`) VALUES
(5, 'task', 'this is a test', 's'),
(6, 'announcement', 'tese', 's'),
(7, 'task', 'tesjhvvva', 's'),
(8, 'announcement', 'this is a test announce', 's'),
(9, 'task', 'mairala', 's'),
(10, 'announcement', 'hi', 's'),
(11, 'announcement', 'yes', 's'),
(12, 'announcement', '', 's'),
(13, 'announcement', 'Announcement for student 1', 's'),
(14, 'announcement', 'aaaaaaaaaaaa', 's'),
(15, 'announcement', 'top', 's'),
(16, 'announcement', 'new', 's'),
(17, 'announcement', 'new new new new', 's'),
(18, 'announcement', 'gggg', 's'),
(19, 'announcement', 'ujiuiuj', 's'),
(20, 'announcement', 'ujiuiuj', 's'),
(21, 'announcement', 'ujiuiuj', 's'),
(22, 'announcement', 'ujiuiuj', 's'),
(23, 'announcement', 'ujiuiuj', 's'),
(24, 'announcement', 'ujiuiuj', 's'),
(25, 'announcement', 'ujiuiuj', 's'),
(26, 'announcement', 'ujiuiuj', 's'),
(27, 'announcement', 'ujiuiuj', 's'),
(28, 'announcement', 'ujiuiuj', 's'),
(29, 'announcement', 'ujiuiuj', 's'),
(30, 'announcement', 'biruk', 's'),
(31, 'announcement', 'jjjj', 's'),
(32, 'announcement', 'll', 's'),
(33, 'announcement', '', 's'),
(34, 'announcement', '', 's'),
(35, 'announcement', 'ghghghg', 's'),
(36, 'announcement', 'selam selam', 's'),
(37, 'announcement', 'hhh', 's'),
(38, 'announcement', 'hi there\r\nhow r u doin', 's'),
(39, 'announcement', 'hohi', 's'),
(40, 'announcement', 'selam', 's'),
(41, 'announcement', 'some one is coming', 's'),
(42, 'announcement', 'someone is coming to your office', 's'),
(43, 'task', 'hello', 's'),
(44, '', 'hellllllllllllllllllllllllllllllllllllllllllllllll', 's'),
(45, '', 'hiwwwwwwwwwwi', 's'),
(46, '', 'ato kebede baby kewsu eyemta nw tedebek', 's'),
(47, '', 'dfghj', 's'),
(48, 'announcement', 'Hello you', 's'),
(49, 'announcement', 'announcement', 's'),
(50, 'task', 'hellllo hi ', 's'),
(51, '', 'jfhfhjhihufheuj', 's'),
(52, 'announcement', 'jhjhjk', 's'),
(53, 'task', 'Add Lidet Mikiru ID: R/1108/06 to course code:2 Date 2018-4-23', 's'),
(54, 'task', 'Add Hiwot Shumbeza ID: R/1777/06 to course code:4 Date 2018-4-01', 's'),
(55, 'task', 'Modify Lidet Mikiru ID: R/1110/06 to ', 's'),
(56, 'task', 'Add Mikiru ID: R/1000/06 to course code:8 Date 2018-4-23', 's'),
(57, 'task', 'Add Lidet Mikiru ID: R/1108/06 to course code:2 Date 2018-4-23', 's');

-- --------------------------------------------------------

--
-- Table structure for table `113_noti`
--

CREATE TABLE `113_noti` (
  `sl` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `seen_unseen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `113_noti`
--

INSERT INTO `113_noti` (`sl`, `type`, `ann`, `seen_unseen`) VALUES
(1, 'task', 'hey suny', 's'),
(2, 'task', 'this is in cse 102', 's'),
(3, 'announcement', 'its time to rock', 's'),
(4, 'task', 'who the hell are you', 's'),
(5, 'announcement', 'fh', 'u');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Att_Id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `ccode` int(11) NOT NULL,
  `s_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Att_Id`, `date`, `ccode`, `s_Id`) VALUES
(2, '2018-05-08', 4, 1),
(3, '2018-05-08', 4, 4),
(4, '2018-05-08', 4, 3),
(5, '2018-05-01', 3, 5),
(6, '2018-05-03', 5, 3),
(7, '2018-05-08', 4, 1),
(8, '2018-05-08', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cname` varchar(30) NOT NULL,
  `ccode` int(11) NOT NULL,
  `t_Id` int(11) NOT NULL,
  `s_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cse101_ann`
--

CREATE TABLE `cse101_ann` (
  `sl` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse101_ann`
--

INSERT INTO `cse101_ann` (`sl`, `type`, `ann`, `date`) VALUES
(16, 'task', 'this is a test', '23-09-16 11:23:50am'),
(17, 'announcement', 'tese', '23-09-16 11:24:16am'),
(18, 'task', 'tesjhvvva', '23-09-16 11:24:24am'),
(19, 'announcement', 'this is a test announce', '23-09-16 11:37:17am'),
(20, 'task', 'mairala', '06-02-17 11:05:51am'),
(21, 'announcement', 'hi', '15-01-18 10:12:26am'),
(22, 'announcement', 'yes', '15-01-18 10:32:13am'),
(23, 'announcement', '', '15-01-18 10:34:18am'),
(24, 'announcement', 'Announcement for student 1', '15-01-18 10:49:02am'),
(25, 'announcement', 'aaaaaaaaaaaa', '15-01-18 10:51:20am'),
(26, 'announcement', 'top', '15-01-18 11:08:07am'),
(27, 'announcement', 'new', '15-01-18 11:12:57am'),
(28, 'announcement', 'new new new new', '15-01-18 11:13:32am'),
(29, 'announcement', 'gggg', '15-01-18 01:07:02pm'),
(41, 'announcement', 'biruk', '15-01-18 01:21:02pm'),
(42, 'announcement', 'jjjj', '15-01-18 01:22:19pm'),
(43, 'announcement', 'll', '15-01-18 01:23:26pm'),
(44, 'announcement', '', '23-01-18 05:53:15pm'),
(45, 'announcement', '', '23-01-18 07:07:04pm'),
(46, 'announcement', 'ghghghg', '23-01-18 07:15:09pm'),
(47, 'announcement', 'selam selam', '23-01-18 07:21:04pm'),
(48, 'announcement', 'hhh', '24-01-18 08:07:04am'),
(49, 'announcement', 'hi there\r\nhow r u doin', '24-01-18 09:30:56am'),
(50, 'announcement', 'hohi', '24-01-18 09:32:11am'),
(51, 'announcement', 'selam', '24-01-18 01:10:23pm'),
(52, 'announcement', 'some one is coming', '24-01-18 01:33:10pm'),
(53, 'announcement', 'someone is coming to your office', '02-02-18 01:06:52pm'),
(54, 'task', 'hello', '10-02-18 04:44:17pm'),
(55, '', 'hellllllllllllllllllllllllllllllllllllllllllllllll', '13-02-18 02:15:23pm'),
(56, '', 'hiwwwwwwwwwwi', '13-02-18 05:22:57pm'),
(57, '', 'ato kebede baby kewsu eyemta nw tedebek', '18-02-18 04:44:14pm'),
(58, '', 'dfghj', '18-02-18 05:20:15pm'),
(59, 'announcement', 'Hello you', '19-02-18 10:09:01am'),
(60, 'announcement', 'announcement', '05-06-18 01:05:45am'),
(61, 'task', 'hellllo hi ', '05-06-18 01:12:15am'),
(62, '', 'jfhfhjhihufheuj', '05-06-18 02:38:02pm'),
(63, 'announcement', 'jhjhjk', '11-06-18 09:42:52pm'),
(64, 'task', 'Add Lidet Mikiru ID: R/1108/06 to course code:2 Date 2018-4-23', '14-06-18 05:54:27am'),
(65, 'task', 'Add Hiwot Shumbeza ID: R/1777/06 to course code:4 Date 2018-4-01', '14-06-18 06:49:51am'),
(66, 'task', 'Modify Lidet Mikiru ID: R/1110/06 to ', '14-06-18 06:50:52am'),
(67, 'task', 'Add Mikiru ID: R/1000/06 to course code:8 Date 2018-4-23', '14-06-18 06:52:28am'),
(68, 'task', 'Add Lidet Mikiru ID: R/1108/06 to course code:2 Date 2018-4-23', '14-06-18 06:52:40am');

-- --------------------------------------------------------

--
-- Table structure for table `cse101_student`
--

CREATE TABLE `cse101_student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse101_student`
--

INSERT INTO `cse101_student` (`id`, `name`) VALUES
('112', 'shohan');

-- --------------------------------------------------------

--
-- Table structure for table `cse102_ann`
--

CREATE TABLE `cse102_ann` (
  `sl` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ann` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse102_ann`
--

INSERT INTO `cse102_ann` (`sl`, `type`, `ann`, `date`) VALUES
(1, 'task', 'hey suny', '23-09-16 11:29:52am'),
(2, 'task', 'this is in cse 102', '23-09-16 11:37:58am'),
(3, 'announcement', 'its time to rock', '23-09-16 12:03:25pm'),
(4, 'task', 'who the hell are you', '23-09-16 12:03:37pm'),
(5, 'announcement', 'fh', '15-01-18 01:07:54pm');

-- --------------------------------------------------------

--
-- Table structure for table `cse102_student`
--

CREATE TABLE `cse102_student` (
  `id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse102_student`
--

INSERT INTO `cse102_student` (`id`, `name`) VALUES
('113', 'suny');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_Id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL,
  `dep` text NOT NULL,
  `sex` text NOT NULL,
  `sphone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `group` int(11) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `finger` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_Id`, `fname`, `mname`, `lname`, `id`, `dep`, `sex`, `sphone`, `email`, `group`, `stream`, `finger`, `image`) VALUES
(1, 'Genet', 'Atakilt', 'kebede', 'R/0809/06', 'Electrical', 'F', '0923274173', 'genet_ati@yahoo.com', 2, 'Control', '00011101', 'genet.jpg'),
(2, 'Tinsae', 'Kassahun', 'Yifru', 'R/1211/06', 'Electrical', 'F', '0956342897', 'mahigrama@mail.com', 3, 'Control', '01101011', 'tinakassahun.png'),
(3, 'Hiwot', 'Desalegn', 'Tezera', 'R/0960/06', 'Electrical', 'F', '0931890289', 'hiwotdesalegn@yahoo.com', 2, 'Communication', '11101111', 'hiwot.png'),
(4, 'Lensa', 'Abera', 'Gelan', 'R/1100/06', 'Electrical', 'F', '0923274173', 'lensa_abera50@yahoo.com', 2, 'Control', '1101010', 'lensa.jpg'),
(5, 'Sosina', 'Atinafu', 'Tezera', 'R/0810/06', 'Electrical', 'F', '0931890289', 'sosidesu@yahoo.com', 2, 'Control', '1111111111', 'sosina.png');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `block` int(11) NOT NULL,
  `room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `fname`, `mname`, `lname`, `dep`, `phone`, `email`, `block`, `room`) VALUES
(8, 'Tilahun', 'Mulatu', 'Ashebr', 'Computer Science', '234567', 'tilahun@yahoo.com', 518, 24),
(9, 'Ibsa', 'Ibsa', 'Ibsa', 'Mechanical', '094653564', 'Ibsa@gmail.com', 108, 2),
(10, 'Kassahun', 'Ayele', 'Shiferaw', 'Computer Science', '09676775', 'kassu17@gmail.com', 509, 23),
(11, 'simegnew', 'Kassahun', 'Elias', 'Electrical', '094676', 'simegnew@gmail.com', 509, 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'lensa', 'lensa', 'instructor'),
(3, 'ahmed', '1234', 'instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `112_noti`
--
ALTER TABLE `112_noti`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `113_noti`
--
ALTER TABLE `113_noti`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Att_Id`),
  ADD KEY `s_Id` (`s_Id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ccode`);

--
-- Indexes for table `cse101_ann`
--
ALTER TABLE `cse101_ann`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `cse101_student`
--
ALTER TABLE `cse101_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cse102_ann`
--
ALTER TABLE `cse102_ann`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `cse102_student`
--
ALTER TABLE `cse102_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_Id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `112_noti`
--
ALTER TABLE `112_noti`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `113_noti`
--
ALTER TABLE `113_noti`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `Att_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ccode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cse101_ann`
--
ALTER TABLE `cse101_ann`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `cse102_ann`
--
ALTER TABLE `cse102_ann`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`s_Id`) REFERENCES `student` (`s_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
