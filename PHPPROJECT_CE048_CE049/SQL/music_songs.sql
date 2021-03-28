-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 12:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `music_songs`
--

CREATE TABLE `music_songs` (
  `id` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `pathofmusicfile` varchar(500) NOT NULL,
  `pathofimagefile` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music_songs`
--

INSERT INTO `music_songs` (`id`, `name`, `filename`, `pathofmusicfile`, `pathofimagefile`, `username`) VALUES
(3, 'song.mp3', 'khairiyat', 'musicfiles/song.mp3', 'imagefiles/pexels-pixabay-326055.jpg', 'Sahil'),
(5, 'New Flute Ringtone Radha Krishna Ringtone Krishna Flute ringtone Shree Krishna Flute Ringtone.mp3', 'Radha Krishna Flute', 'musicfiles/New Flute Ringtone Radha Krishna Ringtone Krishna Flute ringtone Shree Krishna Flute Ringtone.mp3', 'imagefiles/Screenshot from 2021-03-09 21-13-06.png', 'JSY'),
(7, 'Scam 1992 Theme (Official) - Achint.mp3', 'scam 1992 BGM', 'musicfiles/Scam 1992 Theme (Official) - Achint.mp3', 'imagefiles/Screenshot from 2021-03-09 22-43-02.png', 'JSY'),
(8, 'Gori Radha Ne Kado Kaan - Wrong Side Raju Kirtidan Gadhvi Garba Navratri.mp3', 'Gori Radha ne kado Kaan', 'musicfiles/Gori Radha Ne Kado Kaan - Wrong Side Raju Kirtidan Gadhvi Garba Navratri.mp3', 'imagefiles/Screenshot from 2021-03-09 22-44-53.png', 'JSY'),
(9, 'Meri Aashiqui Rochak Kohli, Jubin Nautiyal Ihana D Shree Anwar Sagar Bhushan Kumar.mp3', 'Meri Ashiqui', 'musicfiles/Meri Aashiqui Rochak Kohli, Jubin Nautiyal Ihana D Shree Anwar Sagar Bhushan Kumar.mp3', 'imagefiles/Screenshot from 2021-03-09 22-44-33.png', 'JSY'),
(11, 'Radha rani lage .. best voice... official ...mp3', 'Radha rani lage', 'musicfiles/Radha rani lage .. best voice... official ...mp3', 'imagefiles/Screenshot from 2021-03-09 22-48-24.png', 'JSY'),
(12, 'Perfect - Ed Sheeran.mp3', 'Perfect', 'musicfiles/Perfect - Ed Sheeran.mp3', 'imagefiles/Screenshot from 2021-03-09 23-01-59.png', 'JSY'),
(14, 'The Chainsmokers - Closer ft. Halsey.mp3', 'Closer', 'musicfiles/The Chainsmokers - Closer ft. Halsey.mp3', 'imagefiles/Screenshot from 2021-03-09 23-08-16.png', 'JSYYY'),
(15, '🎺 Cold mess - Prateek Kuhad.mp3', 'Cold mess', 'musicfiles/🎺 Cold mess - Prateek Kuhad.mp3', 'imagefiles/Screenshot from 2021-03-09 23-10-55.png', 'JSYYY'),
(16, 'ily i love you baby - Surf Mesa feat. Emilee.mp3', 'ily', 'musicfiles/ily i love you baby - Surf Mesa feat. Emilee.mp3', 'imagefiles/Screenshot from 2021-03-09 23-13-24.png', 'JSYYY'),
(18, '🎺 Cold mess - Prateek Kuhad.mp3', 'defrt', 'musicfiles/🎺 Cold mess - Prateek Kuhad.mp3', 'imagefiles/x.jpg', 'JSY'),
(19, 'Shayad.mp3', 'Shayad', 'musicfiles/Shayad.mp3', 'imagefiles/shayadimg.jpg', 'AakarshCE'),
(20, 'Tu Hi Yaar Mera - Pati Patni Aur Woh (SongsMp3.Com).mp3', 'Tu hi yaar mera', 'musicfiles/Tu Hi Yaar Mera - Pati Patni Aur Woh (SongsMp3.Com).mp3', 'imagefiles/terayaarhumeinimg.jpg', 'AakarshCE'),
(29, 'Buddhu Sa Mann – Kapoor & Sons Sidharth Alia Fawad Rishi Kapoor Armaan Amaal.mp3', 'Buddhu Sa maan', 'musicfiles/Buddhu Sa Mann – Kapoor & Sons Sidharth Alia Fawad Rishi Kapoor Armaan Amaal.mp3', 'imagefiles/buddhu sa mann.jpg', 'AakarshInamdar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music_songs`
--
ALTER TABLE `music_songs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music_songs`
--
ALTER TABLE `music_songs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
