-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 11:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dolphin`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(6) NOT NULL,
  `title` varchar(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `company` varchar(30) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `assigned_to` int(6) UNSIGNED NOT NULL,
  `created_by` int(6) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) VALUES
(2, '', 'Christopher&#39;s', 'Apartments', '500000504@my.fiveislands.uwi.edu', '856955', 'Hoser', 'Support', 1, 1, '2023-11-21 19:55:22', '2023-12-09 15:11:29'),
(11, '', 'Christopher&#39;s', 'Apartments', 'admin@project2.com', '856955', 'Hoser', 'Sales Lead', 1, 1, '2023-11-21 20:42:22', '2023-12-09 14:59:23'),
(15, '', 'Christopher\'s', 'Apartments', 'dadliskinanu@gmail.com', '856955', 'Hoser', 'Sales', 1, 1, '2023-11-21 23:57:23', '2023-11-21 23:57:23'),
(16, '', 'hellen', 'smith', 'ioi@helen.com', '54567879', 'Henton', 'Sales Lead', 1, 1, '2023-11-21 23:58:59', '2023-12-09 15:05:53'),
(17, '', 'Christopher&#39;s', 'nun', 'new@mail.com', '564646', 'Hose', 'Support', 1, 1, '2023-11-22 01:00:29', '2023-12-09 14:47:36'),
(18, '', 'Rain', 'Jane', 'rjan@mail.gov', '345-676-7687', 'Lowes', 'Sales', 1, 1, '2023-11-22 01:04:46', '2023-11-22 01:04:46'),
(19, '', 'kpl', 'pl', 'l@fok.com', '345794', 'Hoes', 'Sales', 1, 1, '2023-11-22 01:06:56', '2023-11-22 01:06:56'),
(20, '', 'kpl', 'Apartments', 'juran352@hotmail.com', '54567879', 'Henton', 'Support', 1, 1, '2023-11-22 01:08:51', '2023-11-22 01:08:51'),
(21, '', 'Christopher&#39;s', 'Apartments', 'booking@example.com', '54567879', 'Janeyton', 'Sales Lead', 1, 1, '2023-11-22 01:09:08', '2023-12-09 15:01:03'),
(22, '', 'Christopher&#39;s', 'olkm', 'kok@hotmail.com', '345-676-7687', 'Lowes', 'Support', 1, 1, '2023-11-22 01:40:33', '2023-11-22 01:40:33'),
(23, '', 'Christopher&#39;s', 'Smith', 'dlouetta@gmail.com', '345-676-7687', 'Lowes', 'Sales Lead', 1, 1, '2023-11-22 17:26:49', '2023-12-09 15:05:24'),
(24, '', 'Christopher&#039;s', 'Apartments', '500004@my.fiveislands.uwi.edu', '345-676-7687', 'Janeyton', 'Support', 1, 1, '2023-11-22 17:51:38', '2023-12-09 15:05:44'),
(25, '', 'Amelia', 'James', 'aj@mail.com', '652-856-8595', 'James Con', 'Support', 1, 1, '2023-11-24 22:30:23', '2023-12-09 15:00:57'),
(28, '', 'Halle', 'Berry', 'hberry@mail.com', '5682715625', 'BerryCompay', 'Sales Lead', 2, 1, '2023-12-09 20:22:08', '2023-12-09 20:22:08'),
(29, '', 'Rain', 'Smith', 'rsmith@email.gov', '345-676-7687', 'Henton', 'Sales Lead', 2, 1, '2023-12-09 20:31:11', '2023-12-09 20:31:11'),
(30, '', 'Mitch', 'Mercer', 'mmercer@mail.com', '345-676-7687', 'MMCorp', 'Support', 2, 1, '2023-12-09 20:35:12', '2023-12-09 20:35:12'),
(31, '', 'Percy', 'Smith', 'psmith@mail.com', '345-676-7687', 'Smith&amp;Co', 'Sales Lead', 2, 1, '2023-12-09 20:37:03', '2023-12-09 20:37:03'),
(32, '', 'Jam', 'Jim', 'jj@mail.com', '844664638463', 'Hoser', 'Support', 1, 1, '2023-12-09 21:21:41', '2023-12-09 21:21:41'),
(33, '', 'Amel', 'James', 'ajames@mail.com', '345794', 'Hoser', 'Support', 1, 1, '2023-12-09 21:23:53', '2023-12-09 21:23:53'),
(34, '', 'Harry', 'Bello', 'hbello@mail.com', '345-676-7687', 'Lowes', 'Support', 2, 1, '2023-12-09 22:00:08', '2023-12-09 22:00:08'),
(35, '', 'Amelia', 'Hart', 'ahart@mail.com', '54567879', 'Henton', 'Sales Lead', 2, 1, '2023-12-09 22:03:39', '2023-12-09 22:03:39'),
(36, '', 'Jenny', 'Carrie', 'jcarrie@mail.com', '54567879', 'Lowes', 'Sales Lead', 2, 1, '2023-12-09 22:17:26', '2023-12-09 22:17:26'),
(37, '', 'Yolanda', 'Smith', 'ysmith@mail.com', '54567879', 'SmithCo', 'Support', 2, 1, '2023-12-09 22:18:52', '2023-12-09 22:18:52'),
(38, '', 'Jasmine', 'Felix', 'jfelix@mail.com', '345-676-7687', 'Lowes', 'Sales Lead', 2, 1, '2023-12-09 22:20:07', '2023-12-09 22:20:07'),
(39, '', 'Michelle', 'Adams', 'madams@mail.com', '564646', 'Lowes', 'Sales Lead', 2, 1, '2023-12-09 22:25:57', '2023-12-09 22:25:57'),
(40, '', 'Sadia', 'James', 'sjames@mail.com', '54567879', 'Lowes', 'Support', 2, 1, '2023-12-09 22:28:50', '2023-12-09 22:28:50'),
(41, '', 'Ronald', 'Hughes', 'rhughes@mail.com', '54567879', 'Hughes &amp; Co', 'Support', 1, 1, '2023-12-09 22:29:49', '2023-12-09 22:29:49'),
(42, '', 'Rain', 'James', 'rjames@mail.com', '345-676-7687', 'James Con', 'Support', 2, 1, '2023-12-09 23:00:20', '2023-12-09 23:00:20'),
(43, '', 'Alaine', 'Perry', 'aperry@mail.com', '345-676-7687', 'Henton', 'Support', 2, 1, '2023-12-09 23:01:55', '2023-12-09 23:01:55'),
(44, '', 'Renee', 'Smith', 'rsmith@mail.com', '54567879', 'Smithon', 'Support', 1, 1, '2023-12-09 23:06:11', '2023-12-09 23:06:11'),
(45, '', 'Remy', 'Felix', 'rrfelix@mail.com', '345-676-7687', 'Hoser', 'Support', 1, 1, '2023-12-09 23:07:04', '2023-12-09 23:07:04'),
(46, '', '524', 'Jane', '542@hotmail.com', '856955', 'James Con', 'Support', 1, 1, '2023-12-09 23:19:15', '2023-12-09 23:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(6) NOT NULL,
  `contact_id` int(6) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_by` int(6) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(30) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'Jim', 'Francis', 'password123', 'admin@project2.com', 'IT Support', '2023-11-18 16:53:00'),
(2, 'ml', 'Apartments', '65946', 'booking@example.com', 'mlom', '2023-11-20 16:35:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `n_created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `assigned_to` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `contact_id` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`),
  ADD CONSTRAINT `n_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
