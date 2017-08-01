-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 04:59 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `prahamy_merdu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cohorts`
--

CREATE TABLE `cohorts` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cohorts`
--

INSERT INTO `cohorts` (`id`, `year`) VALUES
(1, 2016),
(2, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Surgery'),
(2, 'Medicine'),
(3, 'Acute care'),
(4, 'Computer Science'),
(5, 'Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(200) NOT NULL,
  `designation` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `department_id`, `name`, `email`, `designation`, `status`, `user_id`) VALUES
(5, 2, 'lect1', 'lect1@yahoo.com', NULL, NULL, 66),
(6, 1, 'lect2', 'lect2@yahoo.com', NULL, NULL, 70);

-- --------------------------------------------------------

--
-- Table structure for table `mentee_evals`
--

CREATE TABLE `mentee_evals` (
  `id` int(11) NOT NULL,
  `mm_eval_id` int(11) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `ratings` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mentor_evals`
--

CREATE TABLE `mentor_evals` (
  `id` int(11) NOT NULL,
  `mm_eval_id` int(11) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `rating` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mm_assignments`
--

CREATE TABLE `mm_assignments` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `mentee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mm_assignments`
--

INSERT INTO `mm_assignments` (`id`, `mentor_id`, `mentee_id`) VALUES
(5, 5, 6),
(6, NULL, 9),
(7, NULL, 7),
(8, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mm_evals`
--

CREATE TABLE `mm_evals` (
  `id` int(11) NOT NULL,
  `mm_assignment_id` int(11) NOT NULL,
  `meet_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `cohort_id` int(11) DEFAULT NULL,
  `name` varchar(300) NOT NULL,
  `metrix` varchar(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `cohort_id`, `name`, `metrix`, `email`, `user_id`) VALUES
(6, 1, 'stud1', NULL, 'stud@yahoo.com', 69),
(7, 2, 'stud2', NULL, 'stud2@yahoo.com', 71),
(8, 1, 'stud3', NULL, 'stud3@yahoo.com', 72),
(9, 2, 'stud4', NULL, 'stud4@yahoo.com', 73);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@yahoo.com', '$2y$10$atikM2L3Pl5s2gjP1OQFT.a6poyJyk8Sto8SoAEmyKJONz9Jz0HwS', 'admin', 'sLVnRzhZcotvRRE9354nR0Yi8xkzCjadyX2BTrH3VZrIljqPM28IdRreNIKr', '2017-07-12 03:15:17', '2017-07-12 03:15:17'),
(66, 'lect1', 'lect1@yahoo.com', '$2y$10$AGDtDRdL9t2vMbE1kuS6WOLGdINI08LF.Gu5f/VtUad/omT6zzKmS', 'lecturer', 'gAO9IpzGfuFwFub92G34cZhOtaSFS8XmXA1NSJFIF0TbXFdlHig2YZLK6AcX', '2017-07-16 21:58:36', '2017-07-16 21:58:36'),
(69, 'stud1', 'stud1@yahoo.com', '$2y$10$7gCe3gYVfqWgpz0AKxOwQujCagrSyFTt6YjbZZL0k63vhKvDbCcDS', 'student', 'jrDZHVotkevswh0afU5URhWZDvFxsxEJ35iBOsFBxiG4yuteQMiNHrCPI9x5', '2017-07-16 22:10:05', '2017-07-16 22:10:05'),
(70, 'lect2', 'lect2@yahoo.com', '$2y$10$GP.eX4AYLV9rE9aqlPmPCeL6ppx0MI0.Bp8Wgpw.Mrd0N8Jab2DvG', 'lecturer', 'Z4epp3LEt4mfPqIIW0DYT8hSKAc0MK2KJ771WHfAJllDRDwnQuutW8XWXXFh', '2017-07-17 03:42:34', '2017-07-17 03:42:34'),
(71, 'stud2', 'stud2@yahoo.com', '$2y$10$tIOveQQLgMyRaj5AllZk4Ox6Q.UuCaWnGb92qjDNAWQ4BZ1Jb.0qO', 'student', NULL, '2017-07-17 03:42:49', '2017-07-17 03:42:49'),
(72, 'stud3', 'stud3@yahoo.com', '$2y$10$41zFweNnZWBgVjvfTDsHNONRmGqGuWD.oV2IfVhA33.7u21Hisohu', 'student', NULL, '2017-07-30 02:38:53', '2017-07-30 02:38:53'),
(73, 'stud4', 'stud4@yahoo.com', '$2y$10$t6NJYp555Fp5grAoJlmXHuU9W9WBMJ1qAhoFeo7hLrCz17xRLk8P.', 'student', NULL, '2017-07-30 02:40:37', '2017-07-30 02:40:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cohorts`
--
ALTER TABLE `cohorts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Department` (`department_id`);

--
-- Indexes for table `mentee_evals`
--
ALTER TABLE `mentee_evals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mm_Eval` (`mm_eval_id`);

--
-- Indexes for table `mentor_evals`
--
ALTER TABLE `mentor_evals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mm_evals` (`mm_eval_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mm_assignments`
--
ALTER TABLE `mm_assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mentee_id` (`mentee_id`),
  ADD KEY `FK_Lecturer` (`mentor_id`);

--
-- Indexes for table `mm_evals`
--
ALTER TABLE `mm_evals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_mm_Assignment` (`mm_assignment_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cohort` (`cohort_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cohorts`
--
ALTER TABLE `cohorts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mentee_evals`
--
ALTER TABLE `mentee_evals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mentor_evals`
--
ALTER TABLE `mentor_evals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mm_assignments`
--
ALTER TABLE `mm_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mm_evals`
--
ALTER TABLE `mm_evals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `FK_Department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `mentee_evals`
--
ALTER TABLE `mentee_evals`
  ADD CONSTRAINT `FK_mm_Eval` FOREIGN KEY (`mm_eval_id`) REFERENCES `mm_evals` (`id`);

--
-- Constraints for table `mentor_evals`
--
ALTER TABLE `mentor_evals`
  ADD CONSTRAINT `FK_mm_evals` FOREIGN KEY (`mm_eval_id`) REFERENCES `mm_evals` (`id`);

--
-- Constraints for table `mm_assignments`
--
ALTER TABLE `mm_assignments`
  ADD CONSTRAINT `FK_Lecturer` FOREIGN KEY (`mentor_id`) REFERENCES `lecturers` (`id`),
  ADD CONSTRAINT `FK_Student` FOREIGN KEY (`mentee_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `mm_evals`
--
ALTER TABLE `mm_evals`
  ADD CONSTRAINT `FK_mm_Assignment` FOREIGN KEY (`mm_assignment_id`) REFERENCES `mm_assignments` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `FK_Cohort` FOREIGN KEY (`cohort_id`) REFERENCES `cohorts` (`id`);
