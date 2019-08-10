-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2019 at 11:02 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'irfanas542@gmail.com', 'irfan@55');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(237, 17, 1, 'Hello Irfan! Nice job...\r\nbe active', 'irfan', '2019-06-15 10:12:07'),
(238, 17, 1, 'ytdhgcb n', 'irfan', '2019-06-15 10:15:23'),
(239, 17, 1, 'THanks!', 'irfan', '2019-06-15 10:15:47'),
(240, 20, 1, 'hello how are you', 'irfan', '2019-06-16 06:23:00'),
(241, 18, 1, 'kjkjkkbjklbjlkn', 'ans', '2019-06-17 09:36:17'),
(242, 16, 1, 'helol\r\n', 'ans', '2019-06-17 10:50:06'),
(243, 16, 1, 'hokvnv, m', 'ans', '2019-06-17 10:50:12'),
(244, 29, 2, 'jfhjkf fjkhkhfkh hfj\r\n', 'irfan ansari', '2019-06-18 08:37:37'),
(247, 36, 2, 'hola\r\n', 'Irfan Ansari', '2019-06-21 23:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `msg_sub` text NOT NULL,
  `msg_topic` text NOT NULL,
  `reply` text NOT NULL,
  `status` int(255) NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender`, `receiver`, `msg_sub`, `msg_topic`, `reply`, `status`, `msg_date`) VALUES
(4, '2', '5', '', 'efcgh bnm', 'no_reply', 0, '2019-06-18 09:31:39'),
(5, '2', '5', '', 'efcgh bnm', 'no_reply', 0, '2019-06-18 09:32:50'),
(6, '2', '4', 'hello ', 'hkjnj hkjkvjk kvhkhhjklknm hjiokhgghuiop', 'no_reply', 0, '2019-06-18 09:33:10'),
(7, '2', '4', 'hello ', 'hkjnj hkjkvjk kvhkhhjklknm hjiokhgghuiop', 'no_reply', 0, '2019-06-18 09:33:48'),
(8, '3', '2', 'hello ', 'bvcxcvb', 'munna', 0, '2019-06-19 11:28:12'),
(9, '3', '2', 'vbnbvcx', 'dfbvcx', 'no_reply', 0, '2019-06-18 09:38:19'),
(10, '2', '4', 'kvjhnvn', 'vioojvjjn n', 'no_reply', 0, '2019-06-18 10:58:13'),
(16, '4', '2', 'Potato', 'bring  2kg of it ok', 'hooo', 0, '2019-06-19 11:28:03'),
(17, '4', '2', 'mango', 'we need it for breakfast', 'oh hello', 0, '2019-06-19 11:27:53'),
(18, '4', '2', 'urgent call ', 'talk to this number man 32656123', 'no_reply', 0, '2019-06-19 09:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`posts_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `post_date`) VALUES
(1, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-based, object-oriented[15] (although not a pure OO language, as it contains primitive types[16]), and designed to have as few implementation dependencies as possible. It is intended to let application developers write once, run anywhere (WORA),[17] meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.[18] Java applications are typically compiled to bytecode that can run on any Java virtual machine (JVM) regardless of the underlying computer architecture. The syntax of Java is similar to C and C++, but it has fewer low-level facilities than either of them. As of 2018, Java was one of the most popular programming languages in use according to GitHub,[19][20] particularly for client-server web applications, with a reported 9 million developers.[21]', '2019-06-14 08:55:04'),
(2, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based.Java is a general-purpose programming language that is class-based', '2019-06-14 08:56:29'),
(3, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-based', '2019-06-14 09:03:24'),
(4, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-based', '2019-06-14 09:05:55'),
(5, 1, 0, 'Hello Guys Here Php Project Goes', 'ghfgdsa', '2019-06-14 09:06:22'),
(6, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-based', '2019-06-14 09:06:33'),
(7, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-based', '2019-06-14 09:10:04'),
(8, 1, 0, 'Hello Guys Here Php Project Goes', 'Java is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-basedJava is a general-purpose programming language that is class-based', '2019-06-14 09:13:38'),
(13, 1, 0, 'Techmeme  Techmeme Techmeme ', ' Mobile applications (specially Android apps)\r\nDesktop applications\r\nWeb applications\r\nWeb servers and application servers\r\nGames\r\nDatabase connection\r\nAnd much, much more!		', '2019-06-14 10:08:24'),
(15, 1, 0, 'java', 'Java works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc.)\r\nIt is one of the most popular programming language in the world\r\nIt is easy to learn and simple to use\r\nIt is open-source and free\r\nIt is secure, fast and powerful\r\nIt has huge community support (tens of millions of developers)\r\n', '2019-06-14 10:11:18'),
(19, 2, 2, 'What is Lorem Ipsum?', '\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-06-18 08:32:51'),
(20, 2, 1, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:33:10'),
(21, 2, 4, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:33:24'),
(22, 2, 3, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:33:59'),
(23, 2, 1, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:34:09'),
(24, 2, 4, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:34:35'),
(25, 2, 1, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:35:11'),
(26, 2, 5, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:35:31'),
(27, 2, 2, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:35:48'),
(28, 2, 4, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:36:04'),
(29, 2, 4, 'What is Lorem Ipsum?', 'What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?What is Lorem Ipsum?', '2019-06-18 08:36:13'),
(30, 2, 5, 'its me irfan today bnmcvbn', 'good morning dude you are late  sdfghcvb', '2019-06-19 08:36:19'),
(35, 2, 2, 'Hello Murgi sdfghnm', 'How are you baby sdfghjk', '2019-06-21 22:59:21'),
(36, 2, 2, 'Hello Murgi', 'How are you baby', '2019-06-21 22:59:26'),
(37, 2, 8, 'Spring Mvc', 'The Spring Web MVC framework provides Model-View-Controller (MVC) architecture and ready components that can be used to develop flexible and loosely coupled web applications. The MVC pattern results in separating the different aspects of the application (input logic, business logic, and UI logic), while providing a loose coupling between these elements.', '2019-06-27 14:26:37'),
(38, 2, 8, 'Spring Mvc', 'The Spring Web MVC framework provides Model-View-Controller (MVC) architecture and ready components that can be used to develop flexible and loosely coupled web applications. The MVC pattern results in separating the different aspects of the application (input logic, business logic, and UI logic), while providing a loose coupling between these elements.', '2019-06-27 14:26:46'),
(39, 2, 9, 'Maven', 'Apache Maven is a software project management and comprehension tool. Based on the concept of a project object model (POM), Maven can manage a project\'s build, reporting and documentation from a central piece of information. \r\nIf you think that Maven could help your project, you can find out more information in the \"About Maven\" section of the navigation: this includes an in-depth description of what Maven is and a list of some of its main features. \r\nThis site is separated into the following sections, depending on how you\'d like to use Maven: ', '2019-06-27 14:28:07'),
(40, 2, 9, 'Maven', 'Support for Maven is available in a variety of different forms. \r\nTo get started, search the documentation, issue management system, the wiki or the mailing list archives to see if the problem has been solved or reported before. \r\nIf the problem has not been reported before, the recommended way to get help is to subscribe to the Maven Users Mailing list. Many other users and Maven developers will answer your questions there, and the answer will be archived for others in the future. \r\nYou can also reach the Maven developers on IRC. ', '2019-06-27 14:28:45'),
(42, 2, 9, 'vb calculator code ', 'Public Class Form1\r\n\r\n    Dim n1, n2 As Integer\r\n    Dim oprtr As String\r\n\r\n\r\n    Private Sub B1_Click(sender As Object, e As EventArgs) Handles B1.Click\r\n        TextBox1.Text += B1.Text\r\n\r\n    End Sub\r\n\r\n    Private Sub B2_Click(sender As Object, e As EventArgs) Handles B2.Click\r\n        TextBox1.Text += B2.Text\r\n    End Sub\r\n\r\n    Private Sub B3_Click(sender As Object, e As EventArgs) Handles B3.Click\r\n        TextBox1.Text += B3.Text\r\n    End Sub\r\n\r\n    Private Sub B4_Click(sender As Object, e As EventArgs) Handles B4.Click\r\n        TextBox1.Text += B4.Text\r\n\r\n    End Sub\r\n\r\n    Private Sub B5_Click(sender As Object, e As EventArgs) Handles B5.Click\r\n        TextBox1.Text += B5.Text\r\n    End Sub\r\n\r\n    Private Sub B6_Click(sender As Object, e As EventArgs) Handles B6.Click\r\n        TextBox1.Text += B6.Text\r\n    End Sub\r\n\r\n    Private Sub B7_Click(sender As Object, e As EventArgs) Handles B7.Click\r\n        TextBox1.Text += B7.Text\r\n    End Sub\r\n\r\n    Private Sub B8_Click(sender As Object, e As EventArgs) Handles B8.Click\r\n        TextBox1.Text += B8.Text\r\n    End Sub\r\n\r\n    Private Sub B9_Click(sender As Object, e As EventArgs) Handles B9.Click\r\n        TextBox1.Text += B9.Text\r\n    End Sub\r\n\r\n    Private Sub B0_Click(sender As Object, e As EventArgs) Handles B0.Click\r\n        TextBox1.Text += B0.Text\r\n    End Sub\r\n\r\n    Private Sub Bdot_Click(sender As Object, e As EventArgs) Handles Bdot.Click\r\n\r\n        If TextBox1.Text.Contains(\".\") Then\r\n            MsgBox(\"you can not enter multiple radix\")\r\n        Else\r\n            TextBox1.Text += Bdot.Text\r\n\r\n        End If\r\n\r\n    End Sub\r\n\r\n    Private Sub Bequal_Click(sender As Object, e As EventArgs) Handles Bequal.Click\r\n\r\n        n2 = Val(TextBox1.Text)\r\n\r\n        If oprtr = \"+\" Then\r\n            TextBox1.Text = n1 + n2\r\n\r\n        ElseIf oprtr = \"-\" Then\r\n            TextBox1.Text = n1 - n2\r\n\r\n        ElseIf oprtr = \"*\" Then\r\n            TextBox1.Text = n1 * n2\r\n\r\n        ElseIf oprtr = \"/\" Then\r\n            TextBox1.Text = n1 / n2\r\n\r\n        End If\r\n\r\n    End Sub\r\n\r\n    Private Sub Bclear_Click(sender As Object, e As EventArgs) Handles Bclear.Click\r\n\r\n        \' n2 = TextBox1.Text\r\n        TextBox1.Text = \"\"\r\n\r\n    End Sub\r\n\r\n    Private Sub Bplus_Click(sender As Object, e As EventArgs) Handles Bplus.Click\r\n\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"+\"\r\n        TextBox1.Text = \"\"\r\n\r\n    End Sub\r\n\r\n    Private Sub Bminus_Click(sender As Object, e As EventArgs) Handles Bminus.Click\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"-\"\r\n        TextBox1.Text = \"\"\r\n    End Sub\r\n\r\n    Private Sub Bmul_Click(sender As Object, e As EventArgs) Handles Bmul.Click\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"*\"\r\n        TextBox1.Text = \"\"\r\n    End Sub\r\n\r\n    Private Sub Bdiv_Click(sender As Object, e As EventArgs) Handles Bdiv.Click\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"/\"\r\n        TextBox1.Text = \"\"\r\n    End Sub\r\nEnd Class\r\n', '2019-07-26 05:57:15'),
(43, 2, 10, 'vb ', 'Public Class Form1\r\n\r\n    Dim n1, n2 As Integer\r\n    Dim oprtr As String\r\n\r\n\r\n    Private Sub B1_Click(sender As Object, e As EventArgs) Handles B1.Click\r\n        TextBox1.Text += B1.Text\r\n\r\n    End Sub\r\n\r\n    Private Sub B2_Click(sender As Object, e As EventArgs) Handles B2.Click\r\n        TextBox1.Text += B2.Text\r\n    End Sub\r\n\r\n    Private Sub B3_Click(sender As Object, e As EventArgs) Handles B3.Click\r\n        TextBox1.Text += B3.Text\r\n    End Sub\r\n\r\n    Private Sub B4_Click(sender As Object, e As EventArgs) Handles B4.Click\r\n        TextBox1.Text += B4.Text\r\n\r\n    End Sub\r\n\r\n    Private Sub B5_Click(sender As Object, e As EventArgs) Handles B5.Click\r\n        TextBox1.Text += B5.Text\r\n    End Sub\r\n\r\n    Private Sub B6_Click(sender As Object, e As EventArgs) Handles B6.Click\r\n        TextBox1.Text += B6.Text\r\n    End Sub\r\n\r\n    Private Sub B7_Click(sender As Object, e As EventArgs) Handles B7.Click\r\n        TextBox1.Text += B7.Text\r\n    End Sub\r\n\r\n    Private Sub B8_Click(sender As Object, e As EventArgs) Handles B8.Click\r\n        TextBox1.Text += B8.Text\r\n    End Sub\r\n\r\n    Private Sub B9_Click(sender As Object, e As EventArgs) Handles B9.Click\r\n        TextBox1.Text += B9.Text\r\n    End Sub\r\n\r\n    Private Sub B0_Click(sender As Object, e As EventArgs) Handles B0.Click\r\n        TextBox1.Text += B0.Text\r\n    End Sub\r\n\r\n    Private Sub Bdot_Click(sender As Object, e As EventArgs) Handles Bdot.Click\r\n\r\n        If TextBox1.Text.Contains(\".\") Then\r\n            MsgBox(\"you can not enter multiple radix\")\r\n        Else\r\n            TextBox1.Text += Bdot.Text\r\n\r\n        End If\r\n\r\n    End Sub\r\n\r\n    Private Sub Bequal_Click(sender As Object, e As EventArgs) Handles Bequal.Click\r\n\r\n        n2 = Val(TextBox1.Text)\r\n\r\n        If oprtr = \"+\" Then\r\n            TextBox1.Text = n1 + n2\r\n\r\n        ElseIf oprtr = \"-\" Then\r\n            TextBox1.Text = n1 - n2\r\n\r\n        ElseIf oprtr = \"*\" Then\r\n            TextBox1.Text = n1 * n2\r\n\r\n        ElseIf oprtr = \"/\" Then\r\n            TextBox1.Text = n1 / n2\r\n\r\n        End If\r\n\r\n    End Sub\r\n\r\n    Private Sub Bclear_Click(sender As Object, e As EventArgs) Handles Bclear.Click\r\n\r\n        \' n2 = TextBox1.Text\r\n        TextBox1.Text = \"\"\r\n\r\n    End Sub\r\n\r\n    Private Sub Bplus_Click(sender As Object, e As EventArgs) Handles Bplus.Click\r\n\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"+\"\r\n        TextBox1.Text = \"\"\r\n\r\n    End Sub\r\n\r\n    Private Sub Bminus_Click(sender As Object, e As EventArgs) Handles Bminus.Click\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"-\"\r\n        TextBox1.Text = \"\"\r\n    End Sub\r\n\r\n    Private Sub Bmul_Click(sender As Object, e As EventArgs) Handles Bmul.Click\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"*\"\r\n        TextBox1.Text = \"\"\r\n    End Sub\r\n\r\n    Private Sub Bdiv_Click(sender As Object, e As EventArgs) Handles Bdiv.Click\r\n        n1 = Val(TextBox1.Text)\r\n        oprtr = \"/\"\r\n        TextBox1.Text = \"\"\r\n    End Sub\r\nEnd Class\r\n', '2019-07-26 06:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`) VALUES
(2, 'HMTL'),
(3, 'JAVA'),
(4, 'CSS'),
(5, 'JAVA SCRIPT'),
(8, 'Spring'),
(9, 'Maven '),
(10, 'visual basics'),
(11, 'php advance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` text NOT NULL,
  `user_reg_date` text NOT NULL,
  `user_last_login` text NOT NULL,
  `status` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_reg_date`, `user_last_login`, `status`, `ver_code`, `posts`) VALUES
(2, 'Irfan Ansari', 'irfan@55', 'irfanas542@gmail.com', 'India', 'Male', '2019-05-30', 'IMG_20190714_141733_566.jpg', '2019-06-01 15:05:03', '', 'verified', 0, 'yes'),
(3, ' ansariboy', 'ansariboy', 'ansariboy@gmail.com', 'India', 'Male', '2019-05-30', 'irfan1.jpg', '2019-06-01 15:05:32', '', 'verified', 0, 'no'),
(4, 'anwar ansari', 'ansariboy2', 'irfan@gmail.com', 'India', 'Male', '2019-05-29', 'irfan1.jpg', '2019-06-01 15:07:51', '', 'verified', 482135239, 'no'),
(5, 'asgar ansari', 'asgar@48464', 'asgaransari@gmail.com', 'India', 'Male', '2019-06-06', 'irfan1.jpg', '2019-06-01 15:11:55', '', 'unvarified', 1812694469, 'no'),
(6, 'suhana', 'skhatoon', 'skhatoon@gmail.com', 'India', 'Male', '2019-05-30', 'irfan1.jpg', '2019-06-01 15:14:38', '', 'unvarified', 2117953743, 'no'),
(7, 'farmullah ansari', 'farmullah', 'farmullah@gamil.com', 'India', 'Male', '2019-06-06', 'irfan1.jpg', '2019-06-01 15:15:57', '', 'unvarified', 1195214209, 'no'),
(8, 'anwar ansari', 'irfan@55', 'anwar@gmil.com', 'America', 'Male', '2019-06-12', 'irfan1.jpg', '2019-06-03 16:42:10', '', 'unvarified', 115564837, 'no'),
(9, 'sandhya kumari', 'mukesh@420', 'ms420@gmail.com', 'India', 'Male', '2019-06-05', 'irfan1.jpg', '2019-06-07 14:03:36', '', 'unvarified', 1631182602, 'no'),
(10, 'Rahul ', '4562', 'rahul@gmail.com', 'India', 'Male', '2019-06-14', 'baby_laptops_children_1920x1200.jpg', '2019-06-14 11:48:27', '', 'unvarified', 1072280869, 'no'),
(12, 'saloni kumari rao', 'saloni123', 'saloni@gamil.com', 'America', 'Female', '2019-07-17', 'default.png', '2019-07-19 10:35:09', '', 'unvarified', 1731322851, 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
