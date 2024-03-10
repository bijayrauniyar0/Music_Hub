-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicplayer992`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(6) UNSIGNED NOT NULL,
  `stage_name` varchar(30) NOT NULL,
  `handle` varchar(30) NOT NULL,
  `Phone_number` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `artistImage` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `stage_name`, `handle`, `Phone_number`, `Email`, `artistImage`, `created_at`) VALUES
(1, 'Arijit Singh', '@arijit', '1122334455', 'arijitsingh@gmail.com', 'arijit.jpeg', '2024-02-25 04:43:33'),
(2, 'Atif Aslam', '@atifaslam', '1122334454', 'atifaslam@gmail.com', 'atif.jpg', '2024-02-25 04:56:49'),
(3, 'Loop Verse', '@loopverse', '1234567890', 'andreysandrey.10@gmail.com', 'me1.jpg', '2024-02-25 05:05:43'),
(4, 'Himesh Reshamiya', '@himeshr', '1234554321', 'himesh@gmail.com', 'himesh.jpg', '2024-02-25 05:10:04'),
(5, 'K K', '@kk', '1234567891', 'kk@gmail.com', 'kk.jpg', '2024-02-25 10:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_data`
--

CREATE TABLE `uploaded_data` (
  `id` int(11) NOT NULL,
  `stage_name` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `handle` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `uploaded_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_data`
--

INSERT INTO `uploaded_data` (`id`, `stage_name`, `email`, `handle`, `title`, `description`, `genre`, `thumbnail`, `audio`, `duration`, `uploaded_at`) VALUES
(1, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Apna Bana Le', 'Song from Bhediya', 'pop', 'apnabanale.jpg', 'Apna_Bana_Le.mp3', 212, '2024-02-25 10:32:33'),
(2, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Uska Hi Bana', 'Song From 1920 Evil Returns', 'classical', 'uska_hi_bana.jpg', 'Uska_Hi_Bana.mp3', 189, '2024-02-25 10:34:31'),
(3, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Kabhi Jo Badal Barse', 'Song from movie jackpot', 'pop', 'kabhi_jo_badal_barse.jpg', 'Kabhi_Jo_Badal_Barse.mp3', 197, '2024-02-25 10:35:10'),
(4, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Tum Hi Ho', 'Song from aashiqui 2', 'pop', 'aashiqui.jpg', 'Tum_hi_ho.mp3', 240, '2024-02-25 10:37:12'),
(5, 'Atif Aslam ', 'atifaslam@gmail.com', '@atifaslam', 'Tu Jaane Na', 'Song from ajab prem ki gajab kahani', 'pop', 'tujaanena.jpg', 'tu_jaane_na.mp3', 217, '2024-02-25 10:42:53'),
(6, 'Atif Aslam ', 'atifaslam@gmail.com', '@atifaslam', 'Woh Lamhe Woh Baate', 'Song from movie zeher', 'pop', 'wohlamhe.jpg', 'Woh_Lamhe_woh_Baatein.mp3', 187, '2024-02-25 10:43:57'),
(7, 'Atif Aslam ', 'atifaslam@gmail.com', '@atifaslam', 'Aadat Si Hai Mujhko', 'A heartbroken song', 'country', 'aadatsihai.jpg', 'Aadat_Si_Mujhko.mp3', 246, '2024-02-25 10:45:09'),
(8, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Dekha Hazaro Dafa Aapko', 'Song From Movie Rustom', 'pop', 'dekhahazarodafa.jpeg', 'Dekha_Hazaro_Dafa_Aapko.mp3', 203, '2024-02-25 10:46:51'),
(9, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Jhoome Jo Pathan', 'Song from movie pathan', 'rock', 'jhoomejopathan.jpg', 'Jhoome_Jo_Pathaan.mp3', 241, '2024-02-25 10:47:46'),
(10, 'Arijit Singh ', 'arijitsingh@gmail.com', '@arijit', 'Tera Chehera', 'Song from movie sanam teri kasam', 'pop', 'terachehera.jpg', 'Tera_Chehera.mp3', 203, '2024-02-25 10:48:39'),
(11, 'Loop Verse ', 'andreysandrey.10@gmail.com', '@loopverse', 'Sakhiyaan', 'Song by Maninder Buttar', 'pop', 'sakhiyaan.jpg', 'Sakhiyaan_Song_.mp3', 182, '2024-02-25 10:51:28'),
(12, 'Loop Verse ', 'andreysandrey.10@gmail.com', '@loopverse', 'Jee Le Zara', 'suspenseful song', 'hiphop', 'jeele.jpeg', 'Jee_Le_Zaraa_.mp3', 195, '2024-02-25 10:52:02'),
(13, 'Himesh Reshamiya ', 'himesh@gmail.com', '@himeshr', 'Hookah Bar', 'Party Song', 'hiphop', 'hookah.jpg', 'Hookah_Bar.mp3', 248, '2024-02-25 10:57:32'),
(14, 'K K ', 'kk@gmail.com', '@kk', 'Zara Sa', 'Purely a magical song from movie Jannat', 'pop', 'zara.jpg', 'Zara_Sa_Jannat.mp3', 368, '2024-02-25 16:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `Phone_number` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `dob`, `Phone_number`, `Email`, `Password`, `created_at`) VALUES
(1, 'Arijit', 'Singh', '2024-02-01', '1122334455', 'arijitsingh@gmail.com', '$2y$10$y5W7JOReS/hT3QAkQbsRseTwK2GeN2Nj5T6NygECdMurQEldco19q', '2024-02-25 03:17:24'),
(3, 'Atif', 'Aslam', '2024-02-06', '1122334454', 'atifaslam@gmail.com', '$2y$10$duzrhzHvQLKBO7XqeiMIPOHPnAP6RiCdccpqb1oqwKcg73ed3TGHy', '2024-02-25 04:55:57'),
(4, 'Bijay', 'Rauniyar', '2024-01-05', '1234567890', 'andreysandrey.10@gmail.com', '$2y$10$dLc7BrYGSeMVASj1aMnCW.bSWktJE43h.bQ.7nimD0fI67x25pIjO', '2024-02-25 05:04:58'),
(5, 'Himesh ', 'Reshamiya', '2024-02-13', '1234554321', 'himesh@gmail.com', '$2y$10$rAiu4C/DELi/y67pQs4/mejQpoSeTQG2RKwjJB8WOhWpuN2QilwQi', '2024-02-25 05:09:21'),
(6, 'K', 'K', '2024-02-01', '1234567891', 'kk@gmail.com', '$2y$10$5m7OPBCXdEXFwRR/7QcpBeb.FuOraP031ZV91LMsp1aQk5xK/dJbu', '2024-02-25 10:43:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `handle` (`handle`),
  ADD UNIQUE KEY `Phone_number` (`Phone_number`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `artitImage` (`artistImage`);

--
-- Indexes for table `uploaded_data`
--
ALTER TABLE `uploaded_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Phone_number` (`Phone_number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uploaded_data`
--
ALTER TABLE `uploaded_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
