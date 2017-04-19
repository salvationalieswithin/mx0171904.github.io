-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2016 at 09:55 AM
-- Server version: 5.6.34
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cricyard_live_tv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_banner`
--

CREATE TABLE IF NOT EXISTS `add_banner` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `Image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `add_banner`
--

INSERT INTO `add_banner` (`id`, `Image`) VALUES
(1, '36c4fea7954c5fede7142d1245423241.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `add_channel`
--

CREATE TABLE IF NOT EXISTS `add_channel` (
  `channel_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `Channels` varchar(255) NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `add_channel`
--

INSERT INTO `add_channel` (`channel_id`, `name`, `Image`, `link`, `description`, `Channels`) VALUES
(1, 'TV Continental', '60353c5c4bae0aa3f137dbd46e22e6b8.jpg', 'http://77.92.76.135:1935/tvce/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'TV Continental', 'Local Channels'),
(2, 'TV Maná-Maputo', '42cccd5c57f355a3a80cda1a6a68cdee.jpg', 'http://195.22.19.189:1935/tvmz/tvmz3/playlist.m3u8#sthash.LqmesLxw.dpuf', 'TV Maná-Maputo', 'Local Channels'),
(4, 'TVC News', '8ae7e9813daede90b979ef6d36ec3dd2.png', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'TVC News', 'News Channels'),
(5, 'FusionPlus TV', 'd3f1d6e47eaa9bbe559b1214e015cd99.png', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'FusionPlus TV', 'Music Channels'),
(6, 'BBC Sports', '1b6d90432a471974c1264f5814a01476.jpg', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'BBC Sports', 'Sports Channels'),
(8, 'movies', '40f9f9eee8802079f40e3826b9b510c9.png', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'Description for movies channels ', 'Movie Channels'),
(9, 'Kids1', '77d63a229d4db9ec30c6718f3178f260.png', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'Description for Kids1', 'Kids Channels'),
(10, 'video demand', '73dcef3f33b9adcb12f6ebf62ccb49e9.png', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'Description for video1', 'Videos On Demand'),
(11, 'entertainment', 'cb0e31b0b85816d24630b5f22e6cfa21.jpg', 'http://77.92.76.135:1935/tvcnews/livestream/playlist.m3u8#sthash.LqmesLxw.dpuf', 'Description for entertainment', 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
