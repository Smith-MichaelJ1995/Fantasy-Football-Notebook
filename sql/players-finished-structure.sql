-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2018 at 02:10 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantasyfootballnotebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `position` enum('QB','RB','WR','TE','K','DEF') NOT NULL,
  `team` enum('ARI','ATL','BAL','BUF','CAR','CHI','CIN','CLE','DAL','DEN','DET','GB','HOU','IND','JAX','KC','LAC','LAR','MIA','MIN','NE','NO','NYG','NYJ','OAK','PHI','PIT','SEA','SF','TB','TEN','WAS') NOT NULL,
  `age` int(11) NOT NULL,
  `dateofarticle` date NOT NULL,
  `projdraftround` int(11) NOT NULL,
  `injsus` enum('1','2','3','4','5','6','7','8','9','10','N/A') NOT NULL,
  `href` text NOT NULL,
  `newssrc` text NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Available','Drafted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `position`, `team`, `age`, `dateofarticle`, `projdraftround`, `injsus`, `href`, `newssrc`, `notes`, `created_at`, `status`) VALUES
(103, 'Tom Brady', 'QB', 'NE', 39, '2018-08-01', 6, '3', 'https://...', 'ESPN', 'Solid player who will put up dependable status, but age is an issue. Doesnt have a lot of talent to work with.', '2018-08-01 03:38:59', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
