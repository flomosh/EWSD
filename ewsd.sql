-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE `contributions` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contributions`
--

INSERT INTO `contributions` (`id`, `file`, `submitted_by`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(10, '1617312795.doc', 1, 'Not bad, good content.', 3, '2021-04-01 13:33:15', '2021-04-07 07:38:03'),
(11, '1617318883.doc', 15, 'Love the images', 3, '2021-04-01 15:14:43', '2021-04-01 15:50:47'),
(12, '1617318954.doc', 17, 'Could be better', 2, '2021-04-01 15:15:54', '2021-04-01 15:51:27'),
(13, '1617318968.doc', 18, NULL, 0, '2021-04-01 15:16:08', '2021-04-01 15:16:08'),
(14, '1617319590.doc', 18, 'Not bad, good content.', 3, '2021-04-01 15:26:30', '2021-04-01 15:51:43'),
(15, '1617809691.doc', 1, NULL, 0, '2021-04-07 07:34:51', '2021-04-07 07:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `faculty_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `faculty_name`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', NULL, NULL),
(2, 'Health Sciences', NULL, NULL),
(3, 'Culinary Arts', NULL, NULL),
(4, 'Information Technology', '2021-04-01 15:10:27', '2021-04-01 15:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_04_01_074209_create_faculties_table', 1),
(4, '2021_04_01_074240_create_contributions_table', 1),
(5, '2021_04_01_205321_create_years_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `faculty` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `faculty`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'johndoe@gre.ac.uk', NULL, '$2y$10$vF0HoWenhF2btOoX/LUi6u1GVWjz9RBrcyWJ6OfK6YV2PgHKljRfK', 'default', 1, 'BUGQtc4kEbUOFri6TpHhOU0XWUUE8IUTcEad6KLcUTnrCYs6PYWg1jqrj2oR', '2021-04-01 00:32:00', '2021-04-01 14:41:46'),
(2, 'Sarah Deswald', 'sarah@gre.ac.uk', NULL, '$2y$10$OS3oDyGhJIe4FfjLL/Hpd.OuzeSXwc7yX1TWoxkBL0imGtzESM9Oa', 'admin', 1, 'SfxoFzdHzCSLR3WQw4m0hzRVSYvUFLOUBmPoZgUHwzetOcwMFg8NO8MRiyYm', '2021-04-01 00:34:11', '2021-04-01 15:48:51'),
(3, 'David Bombal', 'david@gre.ac.uk', NULL, '$2y$10$5K.0ad4y5kTHMtskkLIzTOcVD0IhfimSpBKKYwHA8EvrB0SzPZK7O', 'default', 1, NULL, '2021-04-01 00:38:47', '2021-04-01 00:38:47'),
(4, 'Marketing Manager', 'superadmin@gre.ac.uk', NULL, '$2y$10$0nNlnu3kBvHXDB6C0wcuPeeFvI9ZKyMn5GTdAlpEsvssomS0Ynip2', 'superadmin', 0, 'gDzHdQsTXqZOx1Q9Mi5PyD9ZksjF7xn3KdvMFs7ZXS5gh2XFPxrHVOPhKUER', '2021-04-01 11:46:30', '2021-04-01 11:46:30'),
(5, 'Ari Ahmed', 'ariahmed@gre.ac.uk', NULL, '$2y$10$DqoqewR0Ej7G82pIr5D2quqGWUP3fG6y3AlTgitYW6/p2IcoD2PBm', 'default', 2, 'j8w78VtXY5z7t4TsVmO3se4IKvpz8OJJPjAJ1KXahxLajuAVUmbprbY3duBw', '2021-04-01 14:43:39', '2021-04-01 14:43:39'),
(6, 'Noku Sana', 'noku@gre.ac.uk', NULL, '$2y$10$EIYdMIayOovOOP9BsWEO5Ogzsfv1ALBkE8Ak9sv8uSzLW1hQbkiDq', 'default', 2, 'aZ44jhFbcnaxy4O7aRD3DAEYgGSG5F2uxqzu1dVpKFEemxk6GYOaIK7oGCvK', '2021-04-01 14:44:05', '2021-04-01 14:44:05'),
(7, 'Rachel Wibasana', 'rachelw@gre.ac.uk', NULL, '$2y$10$YNb5aEcCU3QLAjLU5kJ/s.PF7Q59eF7L1je6lLKjZ12UusnVyivBq', 'admin', 2, '42nmy60BllNAZmsRVc9jqGoxrE3bIA7GKNzKTMFBOrHKID936FmnyW282KYj', '2021-04-01 14:44:29', '2021-04-01 14:48:33'),
(8, 'James Lee', 'jameslee@gre.ac.uk', NULL, '$2y$10$W1iLZbYdAy6HpKUzUDPD.ej0rRasALljcIpEaKYkT4eBWuuiNq0xK', 'default', 2, 'OgPHIO2A7AVtxRlb5Q4p2Yv6TLfaeGIB5fERDr5WCRHcIHCrun7bgsGWP3N6', '2021-04-01 14:45:04', '2021-04-01 14:45:04'),
(9, 'Lim Chin Hai', 'limchinhai@gre.ac.uk', NULL, '$2y$10$h4byu6uLXfIJnMSkA6u7xOZp3mq4eCgEguktFy.gPqovXX6GN07cu', 'default', 2, 'ByG96vrVnbdkdupvvY4D6GUkCvbIIAJ3L81dYpnJWeJC7xcNX6KmzHkTWUxb', '2021-04-01 14:45:45', '2021-04-01 14:45:45'),
(10, 'Samuel Singh Gill', 'samuel@gre.ac.uk', NULL, '$2y$10$qzREYxQ.dA.fucApUN8i7uXmOGKiHVvtFR7FZqrIgsr7pvw7K63ae', 'default', 3, 'oNRmztA3A03G32eaESERGlFbcOrk9J5MS1dY1agLQyYpNreBHcihzvbN3Ysv', '2021-04-01 14:46:14', '2021-04-01 14:46:14'),
(11, 'Michael Oswald', 'michaeloswald@gre.ac.uk', NULL, '$2y$10$mSrwUQs58N4fbaR8/Z3lt.lONB/.3bISfBAh54MdGujDdtzgMjWRu', 'default', 3, 'pVaD0PKK1q5GueguFknwvFVVSyXfWwqo9Vwjihz3wXJkL992WNWMU84TZosq', '2021-04-01 14:46:56', '2021-04-01 14:46:56'),
(12, 'Darren Tan', 'darrentan@gre.ac.uk', NULL, '$2y$10$a70NL8bV43.41diAWgHvteJk5EuDYLiC10gNYz4P/1JRtCb8TY2Fe', 'admin', 3, 'a7yUo4x66jozFHZ1ft6NU7pUsp6JdsrVy5EuQF2eqsNeVf6hXLSLAL9j0gQU', '2021-04-01 14:47:18', '2021-04-01 14:48:39'),
(13, 'James Arthur', 'jamesarthur@gre.ac.uk', NULL, '$2y$10$lDYx0OFP..P9GaQAmIG6xOJxuBMbMZopgE1FtzVf.ovTIpV0btUgy', 'default', 3, 'oaTO0djlmjSNGcH1P1t0IbfRlEieWd6yh9vEGXRO6UqFyzjT4hHCXHVZnp0s', '2021-04-01 14:47:43', '2021-04-01 14:47:43'),
(14, 'Adam Azlan', 'adamazlan@gre.ac.uk', NULL, '$2y$10$fg07Xs8NwdZomVJiAbHXEOPL6LfZdlx7VuT6Lk18tzbZEnTrR3WkG', 'default', 4, 'nHFpXLX98fIIPYdJnXXuFOj24mSHocWP4wZONo169wbWg38QXzQRyPtvjq59', '2021-04-01 15:10:55', '2021-04-01 15:10:55'),
(15, 'Rachel Ooi', 'rachelooi@gre.ac.uk', NULL, '$2y$10$w6UMjDsqN9bpAeM0iBZtQOuwwKy9PU/C36Ew.v9NwVZ.TZ3.KNMuK', 'default', 4, 'ILwlEbm0pzadzvmyzKrnG9BycMB35eYPIEItQGTMTD9zZvZ3FCsUoQHIj98n', '2021-04-01 15:11:23', '2021-04-01 15:11:23'),
(16, 'Lynette Low', 'lynettelow@gre.ac.uk', NULL, '$2y$10$WuYBki1JHthK.M.ZyuHlIuQGqmEAzwQL4TDat41WCKChSSdj5VYgW', 'admin', 4, 'Hy8TuDedmVXa0hXtDIEitTOYg2Duv2NHt2EhjnfxUmU5rrYYOqERAbIQhN7Q', '2021-04-01 15:11:49', '2021-04-01 15:13:27'),
(17, 'Ryan Lim', 'ryanlim@gre.ac.uk', NULL, '$2y$10$a5VN2FkYfdieLyPY6Oa3FuHdJus8zuVr.avdUadk9r/TAb2ncLU42', 'default', 4, '9RyoUxEmp0kpWJDNuTxYoNTKz63OHSj6T7VtngKdmaobVHnrVcFzR4mwIpx5', '2021-04-01 15:12:46', '2021-04-01 15:12:46'),
(18, 'Tan Tze Ming', 'tantzeming@gre.ac.uk', NULL, '$2y$10$rdTxdzRr/6KjDgDIau6sreF/a3dl6GON/jzzDWCJowcyPuJ9bcpJi', 'default', 4, 'sVihnOagfofyGlDXibW2WafLyg89cumIy1GmGRdKhJkfR0vmCqbnCutpGNuN', '2021-04-01 15:13:12', '2021-04-01 15:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `closure_date` date NOT NULL,
  `final_closure_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `closure_date`, `final_closure_date`, `created_at`, `updated_at`) VALUES
(1, 2021, '2021-12-12', '2021-12-30', '2021-04-01 16:53:18', '2021-04-01 16:53:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contributions`
--
ALTER TABLE `contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contributions`
--
ALTER TABLE `contributions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
