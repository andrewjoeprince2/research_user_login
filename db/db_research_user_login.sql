-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2018 at 10:06 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_research_user_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(500) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_level` tinyint(3) UNSIGNED NOT NULL,
  `user_ip` varchar(50) NOT NULL DEFAULT 'no',
  `user_last_login` varchar(100) NOT NULL,
  `user_current_login` varchar(100) NOT NULL,
  `user_attempts` tinyint(3) UNSIGNED NOT NULL,
  `user_passtest` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_level`, `user_ip`, `user_last_login`, `user_current_login`, `user_attempts`, `user_passtest`) VALUES
(15, 'Justin', 'jbrunner', '$2y$10$Uqqv.BOykv2hHamaEjI4DeKi3Sc7T5HgDU1B96t5077JyAjVPkos6', 'jbrunner@evilcorp.com', 2, '::1', '02/21/2018 17:02:38', '02/21/2018 17:04:25', 0, 'mSWUIf9hT8'),
(16, 'Joe', 'joe', '$2y$10$Pw4w4bb/hHIrWqL8aTpymetlZUpemnQhikHG46AS7pNdYnvQapZrC', 'sdfsd@evilcorp', 1, '::1', '02/21/2018 17:04:18', '02/21/2018 17:05:19', 0, 'FvDPuGW0tj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
