-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 06:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welfare`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `action_id` bigint(20) NOT NULL,
  `action_details` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action_id`, `action_details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'New Welfare service Registered', '2023-02-05 10:43:55', '2023-02-05 10:43:55'),
(2, 1, 6, 'Welfare service Updated', '2023-02-05 10:48:36', '2023-02-05 10:48:36'),
(3, 1, 1, 'New khairat member added', '2023-02-07 09:50:25', '2023-02-07 09:50:25'),
(4, 1, 1, 'Member Death Registered', '2023-02-07 10:45:18', '2023-02-07 10:45:18'),
(5, 1, 3, 'New Member Added', '2023-02-08 05:15:25', '2023-02-08 05:15:25'),
(6, 1, 4, 'New Member Added', '2023-02-08 05:41:54', '2023-02-08 05:41:54'),
(7, 1, 5, 'New Member Added', '2023-02-08 07:18:07', '2023-02-08 07:18:07'),
(8, 1, 6, 'New Member Added', '2023-02-08 07:22:53', '2023-02-08 07:22:53'),
(9, 1, 7, 'New Member Added', '2023-02-08 07:37:32', '2023-02-08 07:37:32'),
(10, 1, 8, 'New Member Added', '2023-02-08 07:47:17', '2023-02-08 07:47:17'),
(11, 1, 9, 'New Member Added', '2023-02-08 22:52:20', '2023-02-08 22:52:20'),
(12, 1, 2, 'New khairat member added', '2023-02-08 23:35:55', '2023-02-08 23:35:55'),
(13, 1, 3, 'New khairat member added', '2023-02-08 23:37:35', '2023-02-08 23:37:35'),
(14, 1, 1, 'New relationship added', '2023-02-13 05:44:25', '2023-02-13 05:44:25'),
(15, 1, 2, 'New relationship added', '2023-02-13 20:50:28', '2023-02-13 20:50:28'),
(16, 1, 3, 'New relationship added', '2023-02-13 21:13:46', '2023-02-13 21:13:46'),
(17, 1, 2, 'Member Death Registered', '2023-02-13 21:22:06', '2023-02-13 21:22:06'),
(18, 1, 1, 'Burial payment added', '2023-02-13 21:22:57', '2023-02-13 21:22:57'),
(19, 1, 7, 'Welfare service Updated', '2023-02-14 03:17:48', '2023-02-14 03:17:48'),
(20, 1, 7, 'Welfare service Updated', '2023-02-14 03:18:36', '2023-02-14 03:18:36'),
(21, 1, 7, 'Welfare service Updated', '2023-02-14 03:19:22', '2023-02-14 03:19:22'),
(22, 1, 7, 'Welfare service Updated', '2023-02-14 03:20:12', '2023-02-14 03:20:12'),
(23, 1, 7, 'Welfare service Updated', '2023-02-14 03:22:52', '2023-02-14 03:22:52'),
(24, 1, 7, 'Welfare service Updated', '2023-02-14 03:23:17', '2023-02-14 03:23:17'),
(25, 1, 8, 'Welfare service Updated', '2023-02-14 03:25:41', '2023-02-14 03:25:41'),
(26, 1, 5, 'Member info Updated', '2023-02-19 13:27:49', '2023-02-19 13:27:49'),
(27, 1, 3, 'One khairat member deleted', '2023-02-19 14:02:56', '2023-02-19 14:02:56'),
(28, 1, 2, 'One khairat member updated', '2023-02-19 14:05:14', '2023-02-19 14:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `all_members`
--

CREATE TABLE `all_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `home_address1` varchar(255) DEFAULT NULL,
  `home_address2` varchar(255) DEFAULT NULL,
  `home_address3` varchar(255) DEFAULT NULL,
  `home_city` varchar(255) DEFAULT NULL,
  `home_postcode` varchar(255) DEFAULT NULL,
  `home_district` varchar(255) DEFAULT NULL,
  `home_section` varchar(255) DEFAULT NULL,
  `home_state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `home_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ic_address1` varchar(255) DEFAULT NULL,
  `ic_address2` varchar(255) DEFAULT NULL,
  `ic_address3` varchar(255) DEFAULT NULL,
  `ic_city` varchar(255) DEFAULT NULL,
  `ic_postcode` varchar(255) DEFAULT NULL,
  `ic_district` varchar(255) DEFAULT NULL,
  `ic_section` varchar(255) DEFAULT NULL,
  `ic_state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `family_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `citizenship_id` bigint(20) UNSIGNED DEFAULT NULL,
  `telephone_one` varchar(255) DEFAULT NULL,
  `telephone2` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name2` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `ic_no` varchar(255) NOT NULL,
  `race_id` bigint(20) UNSIGNED DEFAULT NULL,
  `religion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marital_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_of_stay` date DEFAULT NULL,
  `end_of_stay` date DEFAULT NULL,
  `active_status` varchar(55) DEFAULT NULL,
  `active_status_note` text DEFAULT NULL,
  `job` varchar(55) DEFAULT NULL,
  `gender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attache_file1` varchar(255) DEFAULT NULL,
  `attache_file2` varchar(255) DEFAULT NULL,
  `attache_file3` varchar(255) DEFAULT NULL,
  `attache_file4` varchar(255) DEFAULT NULL,
  `last_edited_date` date DEFAULT NULL,
  `current_job` varchar(55) DEFAULT NULL,
  `current_job_sector_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unemployed_reason` text DEFAULT NULL,
  `member_status_ids` varchar(255) DEFAULT NULL,
  `beneficiary_ic` varchar(255) DEFAULT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_members`
--

INSERT INTO `all_members` (`id`, `name`, `home_address1`, `home_address2`, `home_address3`, `home_city`, `home_postcode`, `home_district`, `home_section`, `home_state_id`, `home_status_id`, `ic_address1`, `ic_address2`, `ic_address3`, `ic_city`, `ic_postcode`, `ic_district`, `ic_section`, `ic_state_id`, `family_status_id`, `citizenship_id`, `telephone_one`, `telephone2`, `mobile_phone`, `email`, `name2`, `birth_date`, `ic_no`, `race_id`, `religion_id`, `marital_status_id`, `start_of_stay`, `end_of_stay`, `active_status`, `active_status_note`, `job`, `gender_id`, `attache_file1`, `attache_file2`, `attache_file3`, `attache_file4`, `last_edited_date`, `current_job`, `current_job_sector_id`, `unemployed_reason`, `member_status_ids`, `beneficiary_ic`, `beneficiary_name`, `created_at`, `updated_at`) VALUES
(1, 'developer', 'Rajshahi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '0122222222', NULL, NULL, '2023-01-12', '5243543523455', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-21', 'Job', 2, NULL, '[\"1\",\"3\"]', NULL, NULL, '2023-01-21 02:55:08', '2023-02-05 10:48:36'),
(3, 'developer sr', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '3432', 'Rajshahi', NULL, NULL, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', NULL, NULL, NULL, NULL, NULL, NULL, 3, '87987987', NULL, '0122222222', NULL, NULL, '2023-02-08', '524354352345', NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-02-08', NULL, NULL, NULL, '[\"1\",\"2\"]', NULL, NULL, '2023-02-08 05:15:25', '2023-02-08 05:15:25'),
(4, 'developer jr', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '6400', 'Rajshahi', 'SDFasfs', 2, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', 'Notre', '231232', 'Natoer', 'SDFasf', NULL, NULL, 6, '87987987', NULL, '0122222222', NULL, NULL, '2023-02-16', '5243543523457', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-02-08', NULL, NULL, NULL, '[\"1\",\"3\"]', '934543', 'a;fdasf', '2023-02-08 05:41:54', '2023-02-08 05:41:54'),
(5, 'AZADUL ISLAM', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '3432', 'Rajshahi', NULL, 2, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', 'Notre', '231232', 'Natoer', NULL, NULL, NULL, 3, '87987987', NULL, '0122222222', 'user@gmail.com', NULL, '2023-02-17', '5243543523455fdsvhb', 4, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-02-19', NULL, NULL, NULL, '[\"1\",\"3\"]', NULL, NULL, '2023-02-08 07:18:07', '2023-02-19 13:27:49'),
(6, 'developer', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '3432', 'Rajshahi', NULL, NULL, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', NULL, NULL, NULL, NULL, NULL, NULL, 3, '87987987', NULL, '0122222222', 'user@gmail.com2', NULL, '2023-02-10', '52435435234552', 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2023-02-08', NULL, NULL, NULL, '[\"1\",\"2\"]', 'afdasf', 'a;fdasf', '2023-02-08 07:22:53', '2023-02-08 07:22:53'),
(7, 'developer', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '3432', 'Rajshahi', 'SDFasfs', 2, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', 'Notre', '231232', 'Natoer', 'SDFasf', 1, NULL, 1, '87987987', NULL, '0122222222', 'user@gmail.com', NULL, '2023-02-08', '52435435234556', 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-02-08', NULL, NULL, NULL, '[\"1\",\"2\"]', '934543', 'a;fdasf', '2023-02-08 07:37:32', '2023-02-08 07:37:32'),
(8, 'developer 34', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '3432', 'Rajshahi', 'SDFasfs', 1, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', 'Notre', '231232', 'Natoer', 'SDFasf', 2, NULL, 2, '87987987', NULL, '0122222222', 'user@gmail.com', NULL, '2023-02-03', '524354352345566', 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-02-08', NULL, NULL, NULL, '[\"1\",\"2\"]', '934543', 'a;fdasf', '2023-02-08 07:47:17', '2023-02-08 07:47:17'),
(9, 'developer 55', 'Rajshahi', 'Rajshahi', 'Rajshahi', 'Rajshahi', '5555', 'Rajshahi', 'SDFasf', 2, NULL, 'Natore Sador', 'Natore Sador', 'Natore Sador', 'Notre', '231232', 'Natoer', 'SDFasf', 2, NULL, 2, '87987987', NULL, '0122222222', 'user@gmail.com', NULL, '2023-02-04', '5243543523455f', 1, 2, 2, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, '2023-02-09', NULL, NULL, NULL, '[\"1\",\"3\"]', '934543', 'a;fdasf', '2023-02-08 22:52:20', '2023-02-08 22:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `asnafs`
--

CREATE TABLE `asnafs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'All Authorities', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `citizenship_countries`
--

CREATE TABLE `citizenship_countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citizenship_countries`
--

INSERT INTO `citizenship_countries` (`id`, `name`) VALUES
(1, 'Malaysia'),
(2, 'Indonesia'),
(3, 'India'),
(4, 'Mayanmar'),
(5, 'Bangladesh'),
(6, 'Rohingya'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `deaths`
--

CREATE TABLE `deaths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `all_member_id` bigint(20) UNSIGNED NOT NULL,
  `burial_contact_person` varchar(55) NOT NULL,
  `burial_contact_person_tel` varchar(55) NOT NULL,
  `date_of_death` date NOT NULL,
  `cause_of_death` text DEFAULT NULL,
  `burial_place` varchar(100) NOT NULL,
  `burial_place_district` varchar(55) DEFAULT NULL,
  `burial_place_state` varchar(55) DEFAULT NULL,
  `done_by_mosque` tinyint(1) DEFAULT NULL,
  `service_cost` decimal(9,2) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `paid_by` varchar(55) DEFAULT NULL,
  `attached_file1` varchar(100) DEFAULT NULL,
  `attached_file2` varchar(100) DEFAULT NULL,
  `attached_file3` varchar(100) DEFAULT NULL,
  `attached_file4` varchar(100) DEFAULT NULL,
  `attached_file5` varchar(100) DEFAULT NULL,
  `last_edited_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deaths`
--

INSERT INTO `deaths` (`id`, `all_member_id`, `burial_contact_person`, `burial_contact_person_tel`, `date_of_death`, `cause_of_death`, `burial_place`, `burial_place_district`, `burial_place_state`, `done_by_mosque`, `service_cost`, `pay_date`, `paid_by`, `attached_file1`, `attached_file2`, `attached_file3`, `attached_file4`, `attached_file5`, `last_edited_date`, `created_at`, `updated_at`) VALUES
(2, 4, 'Dev', '0978768768', '2023-02-09', NULL, 'Sopura gorosthan', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-13 18:00:00', '2023-02-13 21:22:06', '2023-02-13 21:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_statuses`
--

CREATE TABLE `family_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_statuses`
--

INSERT INTO `family_statuses` (`id`, `name`) VALUES
(1, 'Family head'),
(2, 'Dependant'),
(3, 'Single independent');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `help_categories`
--

CREATE TABLE `help_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help_categories`
--

INSERT INTO `help_categories` (`id`, `name`) VALUES
(1, 'Orphan'),
(2, 'Asnaf'),
(3, 'Welfare'),
(4, 'Education'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `help_categories_types`
--

CREATE TABLE `help_categories_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `help_category_id` bigint(20) UNSIGNED NOT NULL,
  `help_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help_categories_types`
--

INSERT INTO `help_categories_types` (`id`, `help_category_id`, `help_type_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 7),
(4, 1, 3),
(5, 1, 4),
(6, 2, 2),
(7, 2, 2),
(8, 2, 5),
(9, 2, 6),
(10, 2, 7),
(11, 3, 8),
(12, 3, 5),
(13, 3, 6),
(14, 3, 7),
(15, 3, 9),
(16, 3, 10),
(17, 4, 11),
(18, 4, 12),
(19, 4, 13),
(20, 4, 14),
(21, 4, 15),
(22, 5, 16);

-- --------------------------------------------------------

--
-- Table structure for table `help_provideds`
--

CREATE TABLE `help_provideds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `help_cat_id` bigint(20) UNSIGNED NOT NULL,
  `welfare_id` bigint(20) UNSIGNED NOT NULL,
  `help_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_apply` timestamp NULL DEFAULT NULL,
  `approved_date` timestamp NULL DEFAULT NULL,
  `approved_by` varchar(55) DEFAULT NULL,
  `service_cost` varchar(55) DEFAULT NULL,
  `date_payout` timestamp NULL DEFAULT NULL,
  `payout_received_by` varchar(55) DEFAULT NULL,
  `zakat_center` varchar(55) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `attached_file1` varchar(100) DEFAULT NULL,
  `attached_file2` varchar(100) DEFAULT NULL,
  `attached_file3` varchar(100) DEFAULT NULL,
  `attached_file4` varchar(100) DEFAULT NULL,
  `informer_name` varchar(100) DEFAULT NULL,
  `last_edited_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_types`
--

CREATE TABLE `help_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help_types`
--

INSERT INTO `help_types` (`id`, `name`) VALUES
(1, 'School / Tuition'),
(2, 'Financial'),
(3, 'Eidul-fitr'),
(4, 'Human development'),
(5, 'Groceries'),
(6, 'House rental'),
(7, 'Clothing'),
(8, 'Adhoc/ Musafir'),
(9, 'House rental'),
(10, 'Musibah'),
(11, 'General activities'),
(12, 'School fees'),
(13, 'Tuition'),
(14, 'Sponsorship'),
(15, 'Travel tickets'),
(16, 'Other helps');

-- --------------------------------------------------------

--
-- Table structure for table `homestatuses`
--

CREATE TABLE `homestatuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homestatuses`
--

INSERT INTO `homestatuses` (`id`, `name`) VALUES
(1, 'Rental'),
(2, 'Owned'),
(3, 'Temporary accomodation');

-- --------------------------------------------------------

--
-- Table structure for table `job_sectors`
--

CREATE TABLE `job_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_sectors`
--

INSERT INTO `job_sectors` (`id`, `name`) VALUES
(1, 'Government'),
(2, 'Private'),
(3, 'Business'),
(4, 'Self Employed'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `khairat_members`
--

CREATE TABLE `khairat_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `membership_no` varchar(55) NOT NULL,
  `member_start_date` date NOT NULL,
  `member_end_date` date DEFAULT NULL,
  `approval_date` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khairat_members`
--

INSERT INTO `khairat_members` (`id`, `member_id`, `membership_no`, `member_start_date`, `member_end_date`, `approval_date`, `remarks`, `created_at`, `updated_at`) VALUES
(2, 9, 'ee806c3eaa', '2023-02-01', NULL, '2023-02-09', NULL, '2023-02-08 23:35:55', '2023-02-08 23:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `marital_statuses`
--

CREATE TABLE `marital_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marital_statuses`
--

INSERT INTO `marital_statuses` (`id`, `name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorcee Man'),
(4, 'Divorcee Woman');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_statuses`
--

CREATE TABLE `member_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_statuses`
--

INSERT INTO `member_statuses` (`id`, `name`) VALUES
(1, 'Kariah'),
(2, 'Non Kariah'),
(3, 'Kariah Member');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_17_194158_create_relations_table', 1),
(6, '2023_01_17_194349_create_member_statuses_table', 1),
(7, '2023_01_17_194415_create_asnafs_table', 1),
(8, '2023_01_17_194455_create_help_categories_table', 1),
(9, '2023_01_17_194732_create_help_types_table', 1),
(10, '2023_01_17_194823_create_khairat_members_table', 1),
(11, '2023_01_18_123940_create_homestatuses_table', 1),
(12, '2023_01_18_124026_create_family_statuses_table', 1),
(13, '2023_01_18_124042_create_job_sectors_table', 1),
(14, '2023_01_19_161216_create_races_table', 1),
(15, '2023_01_20_024122_create_citizenship_countries_table', 1),
(16, '2023_01_20_024443_create_religions_table', 1),
(17, '2023_01_20_024501_create_genders_table', 1),
(18, '2023_01_20_154123_create_marital_statuses_table', 1),
(19, '2023_01_24_133339_create_memberships_table', 1),
(20, '2023_01_27_045041_create_states_table', 1),
(21, '2023_01_27_084558_create_deaths_table', 1),
(22, '2023_01_30_221558_create_help_categories_types_table', 1),
(23, '2024_01_17_190242_create_all_members_table', 1),
(26, '2025_01_21_084332_create_relation_ships_table', 1),
(28, '2024_03_29_215214_create_help_provideds_table', 2),
(29, '2024_02_25_134553_create_welfare_services_table', 3),
(30, '2023_02_05_153846_create_activity_logs_table', 4),
(31, '2023_02_08_093644_create_authorities_table', 5),
(32, '2023_02_08_093741_create_user_authorities_table', 5),
(33, '2023_02_08_110802_add_columns_to_allmembers', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`id`, `name`) VALUES
(1, 'Melayu'),
(2, 'Cina'),
(3, 'India'),
(4, 'Kadazan Dusun'),
(5, 'Bajau'),
(6, 'Murut'),
(7, 'Myanmar'),
(8, 'Rohingya'),
(9, 'Indonesia'),
(10, 'Thailand'),
(11, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `name`) VALUES
(1, 'Husband'),
(2, 'Wife'),
(3, 'Sons'),
(4, 'Daughter'),
(5, 'Step son'),
(6, 'Step daughter'),
(7, 'Uncle'),
(8, 'Aunty'),
(9, 'Friends'),
(10, 'Niece'),
(11, 'Cousin'),
(12, 'Brother'),
(13, 'Sister'),
(14, 'Relative'),
(15, 'Non Blood Relative'),
(16, 'Guardian');

-- --------------------------------------------------------

--
-- Table structure for table `relation_ships`
--

CREATE TABLE `relation_ships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `related_to_id` bigint(20) UNSIGNED NOT NULL,
  `relation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relation_ships`
--

INSERT INTO `relation_ships` (`id`, `member_id`, `related_to_id`, `relation_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 3, '2023-02-13 05:44:25', '2023-02-13 05:44:25'),
(2, 1, 8, 16, '2023-02-13 20:50:28', '2023-02-13 20:50:28');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`) VALUES
(1, 'Islam'),
(2, 'Christian'),
(3, 'Hindu'),
(4, 'Budha'),
(5, 'Sikh'),
(6, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Kuala Lumpur'),
(5, 'Labuan'),
(6, 'Melaka'),
(7, 'Negeri Sembilan'),
(8, 'Pahang'),
(9, 'Perak'),
(10, 'Perlis'),
(11, 'Sabah'),
(12, 'Sarawak'),
(13, 'Selangor'),
(14, 'Terengganu'),
(15, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test user updated', 'user@gmail.com', NULL, '$2y$10$cDDcddv49z0HJb0UMoMxPehE2rF.ZEmLAvWHspTJKUq9jfHaGZRae', NULL, NULL, '2023-02-12 17:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_authorities`
--

CREATE TABLE `user_authorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `authority_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_authorities`
--

INSERT INTO `user_authorities` (`id`, `user_id`, `authority_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `welfare_services`
--

CREATE TABLE `welfare_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `help_cat_id` bigint(20) UNSIGNED NOT NULL,
  `date_apply` timestamp NULL DEFAULT NULL,
  `zakat_center` varchar(55) DEFAULT NULL,
  `zakat_years` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `attached_file1` varchar(100) DEFAULT NULL,
  `attached_file2` varchar(100) DEFAULT NULL,
  `attached_file3` varchar(100) DEFAULT NULL,
  `attached_file4` varchar(100) DEFAULT NULL,
  `informer_name` varchar(100) DEFAULT NULL,
  `last_edited_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welfare_services`
--

INSERT INTO `welfare_services` (`id`, `member_id`, `help_cat_id`, `date_apply`, `zakat_center`, `zakat_years`, `remarks`, `attached_file1`, `attached_file2`, `attached_file3`, `attached_file4`, `informer_name`, `last_edited_date`, `created_at`, `updated_at`) VALUES
(4, 1, 3, NULL, NULL, '[\"2020\",\"2021\",\"2020\",\"2020\",\"2020\"]', 'fa', NULL, NULL, NULL, NULL, NULL, '2023-02-04 18:00:00', '2023-02-05 10:42:51', '2023-02-05 10:42:51'),
(5, 1, 3, NULL, NULL, '[\"2020\",\"2021\",\"2020\",\"2020\",\"2020\"]', 'fa', NULL, NULL, NULL, NULL, NULL, '2023-02-04 18:00:00', '2023-02-05 10:43:25', '2023-02-05 10:43:25'),
(6, 1, 3, '2023-02-04 18:00:00', NULL, '[\"2020\",\"2021\",\"2020\",\"2020\",\"2020\"]', 'POr', NULL, NULL, NULL, NULL, NULL, '2023-02-04 18:00:00', '2023-02-05 10:43:55', '2023-02-05 10:48:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_members`
--
ALTER TABLE `all_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `all_members_home_status_id_foreign` (`home_status_id`),
  ADD KEY `all_members_family_status_id_foreign` (`family_status_id`),
  ADD KEY `all_members_current_job_sector_id_foreign` (`current_job_sector_id`),
  ADD KEY `all_members_race_id_foreign` (`race_id`),
  ADD KEY `all_members_religion_id_foreign` (`religion_id`),
  ADD KEY `all_members_gender_id_foreign` (`gender_id`),
  ADD KEY `all_members_citizenship_id_foreign` (`citizenship_id`),
  ADD KEY `all_members_home_state_id_foreign` (`home_state_id`),
  ADD KEY `all_members_ic_state_id_foreign` (`ic_state_id`);

--
-- Indexes for table `asnafs`
--
ALTER TABLE `asnafs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizenship_countries`
--
ALTER TABLE `citizenship_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deaths`
--
ALTER TABLE `deaths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_statuses`
--
ALTER TABLE `family_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_categories`
--
ALTER TABLE `help_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_categories_types`
--
ALTER TABLE `help_categories_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_categories_types_help_category_id_foreign` (`help_category_id`),
  ADD KEY `help_categories_types_help_type_id_foreign` (`help_type_id`);

--
-- Indexes for table `help_provideds`
--
ALTER TABLE `help_provideds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help_provideds_help_cat_id_foreign` (`help_cat_id`),
  ADD KEY `help_provideds_help_type_id_foreign` (`help_type_id`),
  ADD KEY `help_provideds_member_id_foreign` (`member_id`),
  ADD KEY `help_provideds_welfare_id_foreign` (`welfare_id`);

--
-- Indexes for table `help_types`
--
ALTER TABLE `help_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homestatuses`
--
ALTER TABLE `homestatuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_sectors`
--
ALTER TABLE `job_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khairat_members`
--
ALTER TABLE `khairat_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khairat_members_membership_no_unique` (`membership_no`);

--
-- Indexes for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_statuses`
--
ALTER TABLE `member_statuses`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relation_ships`
--
ALTER TABLE `relation_ships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relation_ships_member_id_foreign` (`member_id`),
  ADD KEY `relation_ships_related_to_id_foreign` (`related_to_id`),
  ADD KEY `relation_ships_relation_id_foreign` (`relation_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_authorities`
--
ALTER TABLE `user_authorities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_authorities_user_id_foreign` (`user_id`),
  ADD KEY `user_authorities_authority_id_foreign` (`authority_id`);

--
-- Indexes for table `welfare_services`
--
ALTER TABLE `welfare_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `welfare_services_help_cat_id_foreign` (`help_cat_id`),
  ADD KEY `welfare_services_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `all_members`
--
ALTER TABLE `all_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `asnafs`
--
ALTER TABLE `asnafs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `citizenship_countries`
--
ALTER TABLE `citizenship_countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deaths`
--
ALTER TABLE `deaths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_statuses`
--
ALTER TABLE `family_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `help_categories`
--
ALTER TABLE `help_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `help_categories_types`
--
ALTER TABLE `help_categories_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `help_provideds`
--
ALTER TABLE `help_provideds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `help_types`
--
ALTER TABLE `help_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `homestatuses`
--
ALTER TABLE `homestatuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_sectors`
--
ALTER TABLE `job_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khairat_members`
--
ALTER TABLE `khairat_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_statuses`
--
ALTER TABLE `member_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `relation_ships`
--
ALTER TABLE `relation_ships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_authorities`
--
ALTER TABLE `user_authorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `welfare_services`
--
ALTER TABLE `welfare_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `all_members`
--
ALTER TABLE `all_members`
  ADD CONSTRAINT `all_members_citizenship_id_foreign` FOREIGN KEY (`citizenship_id`) REFERENCES `citizenship_countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_current_job_sector_id_foreign` FOREIGN KEY (`current_job_sector_id`) REFERENCES `job_sectors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_family_status_id_foreign` FOREIGN KEY (`family_status_id`) REFERENCES `family_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_home_state_id_foreign` FOREIGN KEY (`home_state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_home_status_id_foreign` FOREIGN KEY (`home_status_id`) REFERENCES `homestatuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_ic_state_id_foreign` FOREIGN KEY (`ic_state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `all_members_religion_id_foreign` FOREIGN KEY (`religion_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `help_categories_types`
--
ALTER TABLE `help_categories_types`
  ADD CONSTRAINT `help_categories_types_help_category_id_foreign` FOREIGN KEY (`help_category_id`) REFERENCES `help_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `help_categories_types_help_type_id_foreign` FOREIGN KEY (`help_type_id`) REFERENCES `help_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `help_provideds`
--
ALTER TABLE `help_provideds`
  ADD CONSTRAINT `help_provideds_help_cat_id_foreign` FOREIGN KEY (`help_cat_id`) REFERENCES `help_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `help_provideds_help_type_id_foreign` FOREIGN KEY (`help_type_id`) REFERENCES `help_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `help_provideds_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `all_members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `help_provideds_welfare_id_foreign` FOREIGN KEY (`welfare_id`) REFERENCES `welfare_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `relation_ships`
--
ALTER TABLE `relation_ships`
  ADD CONSTRAINT `relation_ships_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `all_members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relation_ships_related_to_id_foreign` FOREIGN KEY (`related_to_id`) REFERENCES `all_members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relation_ships_relation_id_foreign` FOREIGN KEY (`relation_id`) REFERENCES `relations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_authorities`
--
ALTER TABLE `user_authorities`
  ADD CONSTRAINT `user_authorities_authority_id_foreign` FOREIGN KEY (`authority_id`) REFERENCES `authorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_authorities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `welfare_services`
--
ALTER TABLE `welfare_services`
  ADD CONSTRAINT `welfare_services_help_cat_id_foreign` FOREIGN KEY (`help_cat_id`) REFERENCES `help_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `welfare_services_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `all_members` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
