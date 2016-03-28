-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 06:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'News Sush'),
(2, 'Events K2'),
(4, 'Disco'),
(5, 'Billion'),
(6, 'Trillion'),
(7, 'Cars'),
(8, 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `tags`, `date`) VALUES
(12, 5, 'Second Post', '                                                   It was a typo for what was intended to be an assignment statement. The programmer ''s finger had\r\nbounced on the "equals" key, accidentally pressing it twice instead of once. The statement as written\r\ncompared x to 2, generated true or false, and discarded the result .\r\nC is enough of an expression language that the compiler did not complain about a statement which\r\nevaluated an expression, had no side-effects, and simply threw away the result. We didn''t know\r\nwhether to bless our good fortune at locating the problem, or cry with frustration at such a common\r\ntyping error causing such an expensive problem. Some versions of the lint program would have\r\ndetected this problem, but it''s all too easy to avoid the automatic use of this essential tool.\r\nThis book gathers together many other salutary stories. It records the wisdom of many experienced\r\nprogrammers, to save the reader from having to rediscover everything independently. It acts as a guide\r\nfor territory that, while broadly familiar, still has some unexplored corners. There are extended\r\ndiscussions of major topics like declarations and arrays/pointers, along with a great many hints and\r\nmnemonics. The terminology of ANSI C is used throughout, along with translations into ordinary\r\nEnglish where needed.        ', 'The Sush K2', 'Sush', '2015-10-01 15:02:37'),
(14, 2, 'New Post Recent', 'It was a typo for what was intended to be an assignment statement. The programmer ''s finger had\r\nbounced on the "equals" key, accidentally pressing it twice instead of once. The statement as written\r\ncompared x to 2, generated true or false, and discarded the result .\r\nC is enough of an expression language that the compiler did not complain about a statement which\r\nevaluated an expression, had no side-effects, and simply threw away the result. We didn''t know\r\nwhether to bless our good fortune at locating the problem, or cry with frustration at such a common\r\ntyping error causing such an expensive problem. Some versions of the lint program would have\r\ndetected this problem, but it''s all too easy to avoid the automatic use of this essential tool.\r\nThis book gathers together many other salutary stories. It records the wisdom of many experienced\r\nprogrammers, to save the reader from having to rediscover everything independently. It acts as a guide\r\nfor territory that, while broadly familiar, still has some unexplored corners. There are extended\r\ndiscussions of major topics like declarations and arrays/pointers, along with a great many hints and\r\nmnemonics. The terminology of ANSI C is used throughout, along with translations into ordinary\r\nEnglish where needed.', 'Sush', 'zinimini', '2015-10-01 15:58:59'),
(15, 1, 'Hello World', 'This makes it easy to tell what''s a C reserved word, and what''s a name the programmer supplied.\r\nSome people say that you can''t compare apples and oranges, but why notâ€”they are both hand-held\r\nround edible things that grow on trees. Once you get used to it, the fruit loops really seem to help.\r\nThere is one other conventionâ€”sometimes we repeat a key point to emphasize it. In addition, we\r\nsometimes repeat a key point to emphasize it.\r\nLike a gourmet recipe book, Expert C Programming has a collection of tasty morsels ready for the\r\nreader to sample. Each chapter is divided into related but self-contained sections; it''s equally easy to\r\nread the book serially from start to finish, or to dip into it at random and review an individual topic at\r\nlength. The technical details are sprinkled with many true stories of how C programming works in\r\npractice. Humor is an important technique for mastering new material, so each chapter ends with a\r\n"light relief" section containing an amusing C story or piece of software folklore to give the reader a\r\nchange of pace.\r\nReaders can use this book as a source of ideas, as a collection of C tips and idioms, or simply to learn\r\nmore about ANSI C, from an experienced compiler writer. In sum, this book has a collection of useful\r\nideas to help you master the fine art of ANSI C. It gathers all the information, hints, and guidelines\r\ntogether in one place and presents them for your enjoyment. So grab the back of an envelope, pull out\r\nyour lucky coding pencil, settle back at a comfy terminal, and let the fun begin!', 'K2', 'hello', '2015-10-01 16:25:48'),
(16, 1, 'This Is Latest Post', 'I Just won an Lottery and bought Lamborghini Aventedor ! ', 'K2', 'Rich, Billionair', '2015-10-20 07:22:57'),
(17, 1, 'Chandrapur Pune Chandrapur', 'Alo mi alo. Punyat alo. mmfbmahsfhbka kvakfvk vkfvkhmva  fgvbhkm c', 'Rahul', 'Pune', '2015-11-19 07:33:34'),
(18, 4, 'Moshi Moshi Appas', 'Moshi Moshi Appas la Khwada Dya re. Nahitar Appas Doka Fodel re :D\nAta Change kartoy .\n', 'Appas', '', '2015-11-23 14:10:48'),
(19, 8, 'Pune Party', 'I just reached pune. ', 'Ketan Times Man of the Year', 'Pune', '2016-03-16 17:47:53');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
