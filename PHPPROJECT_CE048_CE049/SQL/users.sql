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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `user_type` varchar(6) NOT NULL,
  `path_of_user_img` varchar(100) NOT NULL DEFAULT 'userimage/defualt_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `age`, `user_type`, `path_of_user_img`) VALUES
(4, 'SAHIL__', 'admin_sahil', '$2y$10$M/Oo961TaM6N09tnVL7DjOPpIQ881MPJz9h.f8ax/1n.unXF9JHUe', 'abc@gamil.com', '9876543210', 21, 'admin', 'userimage/defualt_image.png'),
(10, 'JARIWALA SAHIL', 'JSY', '$2y$10$UunfDRHRSgvR819K7fhA0.6WO1qScX8OzMlrrR4UpaLmfS6h2A5k6', 'sahil@gmail.com', '9876543210', 18, 'user', 'userimage/pexels-pixabay-531321.jpg'),
(11, 'SAHIL YOGESHKUMAR JARIWALA', 'admin_sahilJSY', '$2y$10$JlRrVByQAXnTIOag/xf6Huwt6U0YBABrXO3nA6WDDbbZvF3JkpQTi', 'abfhvjvbjb@g.com', '9876543210', 18, 'admin', 'userimage/defualt_image.png'),
(13, 'sahil jariwala', 'xyz', '$2y$10$d4Xxn5GNJXFJNQXQ6BS0h.7Bx1YWz.vtVLL1UZRepYX//vdLd.zNq', 'abc@g.com', '9876543210', 19, 'user', 'userimage/pexels-pixabay-326055.jpg'),
(14, 'Aakarsh', 'POR', '$2y$10$xMM7PdVW4widNv2WEdIkDOeAqzn3HQkm8822nveN.7Om9Od5Lc3dm', 'larvtry@gmail.com', '1234567890', 19, 'user', 'userimage/defualt_image.png'),
(15, 'Aakarsh Inamdar', 'def', '$2y$10$UYGYVm8btj.kk8QSKExzXeAXTZxl2OY8YcuPlkGW3idyd2I54xexC', 'larvtry@gmail.com', '1234567890', 12, 'user', 'userimage/defualt_image.png'),
(16, 'sahil jariwala', 'lmn', '$2y$10$VJ63l7eML5LmvQQPbffD5e9i3wcHtBcx.gCnXH0vh1Is4UyRvG9ru', 'abc', '6355780354', 20, 'user', 'userimage/defualt_image.png'),
(17, 'sahil', 'ghj', '$2y$10$7p5fL.0PqM4gcJdTGgko7OwvZBwLb7zpA0aJ0Rl/u1f9bRHSfJkHi', 'larvtry@gmail.com', '63557803900', 17, 'user', 'userimage/defualt_image.png'),
(18, 'abc', 'abc', '$2y$10$4FsTMaywJ13D84CcBZdZ/utJmBLmtcrMl4UUpReOapJS4.tJl4qrC', 'abc@g.com', '1234567890', 12, 'user', 'userimage/defualt_image.png'),
(19, 'Aakarsh', 'admin_InamdarAakarsh', '$2y$10$dApeXGuNJOkrj/VKJuPKneLB.PnvCLcQdKtv2kakDl0wsplt6kXPO', 'inamdaraakarsh@gmail.com', '+918320758348', 20, 'admin', 'userimage/IMG_20200904_122126.jpg'),
(20, 'Aakarsh', 'AakarshCE', '$2y$10$dApeXGuNJOkrj/VKJuPKneLB.PnvCLcQdKtv2kakDl0wsplt6kXPO', 'inamdaraakarsh@gmail.com', '+918320758348', 20, 'user', 'userimage/defualt_image.png'),
(21, 'Aakarsh Inamdar', 'Aakarsh', '$2y$10$8CGrCigvntqXehlSSH2eIuWubI7UfW1e5gULBysb2BT3Jdke8RnWy', 'inamdaraakarsh@gmail.com', '1234567890', 20, 'user', 'userimage/defualt_image.png'),
(24, 'Aakarsh', 'admin_Aakarsh_Inamdar', '$2y$10$dApeXGuNJOkrj/VKJuPKneLB.PnvCLcQdKtv2kakDl0wsplt6kXPO', 'inamdaraakarsh@gmail.com', '+918320758348', 20, 'admin', 'userimage/defualt_image.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
