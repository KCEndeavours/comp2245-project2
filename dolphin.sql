-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 04:54 PM
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
(16, 'Mrs', 'Hellen', 'Smith', 'ioi@helen.com', '54567879', 'Henton', 'Sales Lead', 1, 1, '2023-11-21 23:58:59', '2023-12-09 15:05:53'),
(25, 'Ms', 'Amelia', 'James', 'aj@mail.com', '652-856-8595', 'James Con', 'Support', 1, 1, '2023-11-24 22:30:23', '2023-12-09 15:00:57'),
(29, 'Ms', 'Rain', 'Smith', 'rsmith@email.gov', '345-676-7687', 'Henton', 'Sales Lead', 2, 1, '2023-12-09 20:31:11', '2023-12-09 20:31:11'),
(31, 'Mr', 'Percy', 'Smith', 'psmith@mail.com', '345-676-7687', 'Smith&amp;Co', 'Sales Lead', 1, 1, '2023-12-09 20:37:03', '2023-12-11 05:05:45'),
(35, 'Mrs', 'Amelia', 'Hart', 'ahart@mail.com', '54567879', 'Henton', 'Sales Lead', 1, 1, '2023-12-09 22:03:39', '2023-12-09 18:31:24'),
(36, 'Miss', 'Jenny', 'Carrie', 'jcarrie@mail.com', '54567879', 'Lowes', 'Sales Lead', 2, 1, '2023-12-09 22:17:26', '2023-12-09 22:17:26'),
(37, 'Ms', 'Yolanda', 'Smith', 'ysmith@mail.com', '54567879', 'SmithCo', 'Support', 2, 1, '2023-12-09 22:18:52', '2023-12-09 22:18:52'),
(38, 'Mrs', 'Jasmine', 'Felix', 'jfelix@mail.com', '345-676-7687', 'Lowes', 'Sales Lead', 2, 1, '2023-12-09 22:20:07', '2023-12-09 22:20:07'),
(39, 'Miss', 'Michelle', 'Adams', 'madams@mail.com', '564646', 'Lowes', 'Sales Lead', 2, 1, '2023-12-09 22:25:57', '2023-12-09 22:25:57'),
(41, 'Mr', 'Ronald', 'Hughes', 'rhughes@mail.com', '54567879', 'Hughes &amp; Co', 'Support', 1, 1, '2023-12-09 22:29:49', '2023-12-09 22:29:49'),
(42, 'Mrs', 'Rain', 'James', 'rjames@mail.com', '345-676-7687', 'James Con', 'Support', 2, 1, '2023-12-09 23:00:20', '2023-12-09 23:00:20'),
(43, 'Mrs', 'Alaine', 'Perry', 'aperry@mail.com', '345-676-7687', 'Henton', 'Support', 2, 1, '2023-12-09 23:01:55', '2023-12-09 23:01:55'),
(48, 'Ms', 'Rain', 'James', 'rrjames@mail.com', '345-676-7687', 'James Con', 'Support', 1, 1, '2023-12-09 23:32:53', '2023-12-09 23:32:53');

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
(1, 'Jim', 'Francis', 'password123', 'admin@project2.com', 'Admin', '2023-11-18 16:53:00'),
(2, 'Jamie', 'Smith', '65946', 'booking@example.com', 'Member', '2023-11-20 16:35:52'),
(8, 'Alita', 'Martin', '$2y$10$f9YjBOWB', 'amartin@mail.com', 'Admin', '2023-12-11 14:58:23'),
(9, 'Kali', 'Linux', '$2y$10$GvXX7MHD', 'klinux@mail.com', 'Admin', '2023-12-11 15:01:12'),
(10, 'March', 'Thomas', '$2y$10$CfbK26JC', 'mthomas@maill.com', 'Member', '2023-12-11 15:02:05'),
(12, 'Jane', 'Smith', '$2y$10$nxokuSo0', 'jsmith@mail.com', 'Member', '2023-12-11 15:07:47'),
(13, 'Paul', 'Marvin', '$2y$10$d1tnW9ln', 'pmartin@mail.com', 'Member', '2023-12-11 15:09:33'),
(14, 'Manny', 'Handy', '$2y$10$I0NQwK5w', 'mhanny@mail.com', 'Member', '2023-12-11 15:16:00'),
(15, 'Renee', 'Parker', '$2y$10$Ov29pFF2', 'rparker@mail.com', 'Member', '2023-12-11 15:16:46');

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
