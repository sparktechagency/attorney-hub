-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 12:50 PM
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
-- Database: `hrm_btrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence_logs`
--

CREATE TABLE `attendence_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `inTime` varchar(255) DEFAULT NULL,
  `outTime` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0 = Inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendence_logs`
--

INSERT INTO `attendence_logs` (`id`, `employee_id`, `attendance_date`, `inTime`, `outTime`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(8, 8, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(9, 7, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(10, 2, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(11, 3, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(12, 4, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(13, 5, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(14, 6, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(15, 1, '2023-06-25', '06:00', '21:00', 1, '2023-06-25 05:28:07', 1, '2023-06-25 05:28:07', NULL, NULL, NULL),
(16, 9, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(17, 8, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(18, 7, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(19, 2, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(20, 3, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(21, 4, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(22, 5, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(23, 6, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:27', 1, '2023-07-05 04:50:27', NULL, NULL, NULL),
(24, 1, '2023-07-03', '21:00', '18:00', 1, '2023-07-05 04:50:28', 1, '2023-07-05 04:50:28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(3, 'Graphics', 'graphics', 1, '2023-05-10 04:02:27', 1, NULL, NULL, NULL, NULL),
(4, 'Software', 'software', 1, '2023-05-10 04:02:32', 1, NULL, NULL, NULL, NULL),
(5, 'IPCC', 'ipcc', 1, '2023-07-05 02:12:37', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `slug`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Director', 'director', 1, '2023-05-10 04:42:04', 1, NULL, NULL, NULL, NULL),
(2, 'Hr', 'hr', 1, '2023-05-10 04:42:20', 1, NULL, NULL, NULL, NULL),
(3, 'chairman', 'chairman', 1, '2023-07-05 02:12:52', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disciplinary_actions`
--

CREATE TABLE `disciplinary_actions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disciplinary_actions`
--

INSERT INTO `disciplinary_actions` (`id`, `action_name`, `slug`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(15, 'Action 1', 'action_1', 1, '2023-06-25 04:52:37', 1, NULL, NULL, NULL, NULL),
(16, 'Action 2', 'action_2', 1, '2023-06-25 04:52:43', 1, NULL, NULL, NULL, NULL),
(17, 'action 3', 'action_3', 1, '2023-07-05 02:19:56', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_english` varchar(255) DEFAULT NULL,
  `name_bangla` varchar(255) DEFAULT NULL,
  `father_name_english` varchar(255) DEFAULT NULL,
  `father_name_bangla` varchar(255) DEFAULT NULL,
  `mother_name_english` varchar(255) DEFAULT NULL,
  `mother_name_bangla` varchar(255) DEFAULT NULL,
  `spouse_name1` varchar(255) DEFAULT NULL,
  `spouse_name2` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1=Male,2=Female,3=Others',
  `marital_status` tinyint(1) DEFAULT NULL COMMENT '1=Married,2=Unmarried',
  `blood_group` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `present_address_english` varchar(255) DEFAULT NULL,
  `present_address_bangla` varchar(255) DEFAULT NULL,
  `permanent_address_bangla` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `designation_id` bigint(20) DEFAULT NULL,
  `date_of_join` date DEFAULT NULL,
  `commission_date` date DEFAULT NULL,
  `promotion_date` date DEFAULT NULL,
  `telephone_office` varchar(255) DEFAULT NULL,
  `telephone_home` varchar(255) DEFAULT NULL,
  `pbx` varchar(255) DEFAULT NULL,
  `salary` bigint(20) DEFAULT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `emergency_relation` varchar(255) DEFAULT NULL,
  `employee_photo` varchar(255) DEFAULT NULL,
  `employee_sign` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_05_10_085555_create_departments_table', 1),
(8, '2023_05_10_101106_create_designations_table', 1),
(10, '2023_05_10_060223_create_employees_table', 2),
(11, '2023_05_22_110156_create_disciplinary_actions_table', 3),
(13, '2023_05_30_060340_create_taken_disciplinary_action_against_employees_table', 4),
(14, '2023_06_08_061050_create_set_office_times_table', 5),
(16, '2023_06_12_112241_create_attendence_logs_table', 6),
(26, '2014_10_12_000000_create_users_table', 7);

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
-- Table structure for table `set_office_times`
--

CREATE TABLE `set_office_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_office_times`
--

INSERT INTO `set_office_times` (`id`, `startTime`, `endTime`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '09:00:00', '22:00:00', 1, '2023-06-25 05:10:13', 1, '2023-06-25 05:10:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `taken_disciplinary_action_against_employees`
--

CREATE TABLE `taken_disciplinary_action_against_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `disciplinary_action` bigint(20) DEFAULT NULL,
  `punishment_start_date` date DEFAULT NULL,
  `punishment_end_date` date DEFAULT NULL,
  `action_reason` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taken_disciplinary_action_against_employees`
--

INSERT INTO `taken_disciplinary_action_against_employees` (`id`, `employee_id`, `disciplinary_action`, `punishment_start_date`, `punishment_end_date`, `action_reason`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(10, 7, 15, '2023-06-18', '2023-06-28', 'jtnehbgrvd', 1, '2023-06-25 05:31:08', 1, '2023-06-25 05:31:08', NULL, NULL, NULL),
(11, 3, 17, '2023-07-02', '2023-07-11', 'hrdehb', 1, '2023-07-05 02:20:26', 1, '2023-07-05 02:20:26', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_english` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` enum('system','hr','employee','chairman','director_general','director_admin') NOT NULL DEFAULT 'system',
  `belongs_to` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=SYSTEM 1=HR and 2=EMPLOYEE. User belongs to council except 0',
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `accesses` longtext DEFAULT NULL COMMENT 'All the named routes will be the accesses for roles',
  `permissions` varchar(255) DEFAULT NULL COMMENT 'Create,Read,Update,Delete will be the permissions',
  `remember_token` varchar(100) DEFAULT NULL,
  `name_bangla` varchar(255) DEFAULT NULL,
  `father_name_english` varchar(255) DEFAULT NULL,
  `father_name_bangla` varchar(255) DEFAULT NULL,
  `mother_name_english` varchar(255) DEFAULT NULL,
  `mother_name_bangla` varchar(255) DEFAULT NULL,
  `spouse_name1` varchar(255) DEFAULT NULL,
  `spouse_name2` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL COMMENT '1=Male,2=Female,3=Others',
  `marital_status` tinyint(1) DEFAULT NULL COMMENT '1=Married,2=Unmarried',
  `blood_group` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `present_address_english` varchar(255) DEFAULT NULL,
  `present_address_bangla` varchar(255) DEFAULT NULL,
  `permanent_address_bangla` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `designation_id` bigint(20) DEFAULT NULL,
  `date_of_join` date DEFAULT NULL,
  `commission_date` date DEFAULT NULL,
  `promotion_date` date DEFAULT NULL,
  `telephone_office` varchar(255) DEFAULT NULL,
  `telephone_home` varchar(255) DEFAULT NULL,
  `pbx` varchar(255) DEFAULT NULL,
  `salary` bigint(20) DEFAULT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `emergency_relation` varchar(255) DEFAULT NULL,
  `employee_sign` varchar(255) DEFAULT NULL,
  `employee_photo` text DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL COMMENT '0=Inactive,1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_english`, `email`, `employee_id`, `password`, `user_type`, `belongs_to`, `role_id`, `accesses`, `permissions`, `remember_token`, `name_bangla`, `father_name_english`, `father_name_bangla`, `mother_name_english`, `mother_name_bangla`, `spouse_name1`, `spouse_name2`, `date_of_birth`, `gender`, `marital_status`, `blood_group`, `nid`, `mobile`, `present_address_english`, `present_address_bangla`, `permanent_address_bangla`, `department_id`, `designation_id`, `date_of_join`, `commission_date`, `promotion_date`, `telephone_office`, `telephone_home`, `pbx`, `salary`, `emergency_contact`, `emergency_relation`, `employee_sign`, `employee_photo`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Faisal rabbani', 'farzad.edsoft@gmail.com', 1000000000001, '$2y$10$IZnOTf2vTvcZLXjghsyDC.m8KXz3/DYSBwZqFwWWgUxrpDeO9wBHK', 'system', 0, 1, NULL, 'create, read, update, delete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-25 02:22:30', 1, NULL, NULL, NULL, NULL),
(2, 'HR Admin', 'hr.admin@gmail.com', 1000000000002, '$2y$10$c5tqWurk/vhXUuyfy77AredM0sla9DylicN7pC2sNXl9E01YFNWFa', 'hr', 0, 2, NULL, 'create, read, update, delete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-25 02:22:31', 1, NULL, NULL, NULL, NULL),
(3, 'EMPLOYEE', 'employee@gmail.com', 1000000000003, '$2y$10$4KMEG.JMPXMbKcmw1lDaEOU7KSQc8DGotj7Mjs/nEuRcJdmL/Qdk.', 'employee', 0, 3, NULL, 'create, read, update', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-25 02:22:31', 1, NULL, NULL, NULL, NULL),
(4, 'CHAIRMAN', 'chairman@gmail.com', 1000000000004, '$2y$10$HjiBr31F2UA1q9iuRki8MObKg4W0xHCJJwlSoH91eNkUuoYnvWnUe', 'chairman', 0, 3, NULL, 'create, read, update', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-25 02:22:31', 1, NULL, NULL, NULL, NULL),
(5, 'DIRECTOR_GENERAL', 'director_general@gmail.com', 1000000000005, '$2y$10$m.S13ZKCgagPn7rC9hCGJeHoyeP063Lebd9RBpgv54FCmfCvWCEVa', 'director_general', 0, 3, NULL, 'create, read, update', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-25 02:22:31', 1, NULL, NULL, NULL, NULL),
(6, 'DIRECTOR_ADMIN', 'director_admin@gmail.com', 1000000000006, '$2y$10$.ZMjYo.tjuCh6LY7IPj6AeNMI6RUZjj/UTYstP1NYqGrT3rfqVpNC', 'director_admin', 0, 3, NULL, 'create, read, update', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2023-06-25 02:22:31', 1, NULL, NULL, NULL, NULL),
(7, 'btbgvreb', 'trbgvetbgt5bhgre@gmail.com', 1021512, '$2y$10$2Ag3lsYMRQ873qcFZ7.MSe73rrXCSJoMQBNcIbU6MDd4asJPqmK7e', 'employee', 2, 3, NULL, 'create,read,update,delete', NULL, 'trbvrtbtrb', 'btrbrb', 'btrbrt', 'btrgbvrt', 'btgfb', 'brgvf', 'brvef', '2023-06-04', 1, 1, 'o-', '1514654165415641', '02151561651', 'htygt4re', NULL, NULL, 3, 1, '2023-06-11', '2023-06-07', NULL, '021514141', NULL, NULL, 200000, '02102151', '420570557', NULL, NULL, 1, '2023-06-25 02:26:08', 1, NULL, NULL, NULL, NULL),
(8, 'rngdebvs', 'erjiugheiughjein@gmail.com', 10000232154102, '$2y$10$YDk26gcRPqRL15dSrhfGwurqM2SQs4HwmydsCkhB4wlQRo8zw9TuO', 'employee', 2, 3, NULL, 'create,read,update,delete', NULL, NULL, 'begvsda', NULL, 'bdsvzd', NULL, NULL, NULL, '2023-06-19', 2, 1, NULL, '1515616411', '0201541541541', 'bsavd', 'bavd', 'bsav', 3, 1, '2023-06-04', '2023-06-07', NULL, '01215151514', NULL, NULL, 300000, '020115156151', 'bshbghebg', NULL, NULL, 1, '2023-06-25 03:12:25', 1, NULL, NULL, NULL, NULL),
(9, 'hfrgbnegdn', 'kedfbgmkettttttttmgthnmsryme@gmail.com', 20000312564, '$2y$10$129FU/2TfdqoI53dBvLJ9.m/cnh.KCzEr8rNDkK3iDAFGl53Glsbe', 'employee', 2, 3, NULL, 'create,read,update,delete', NULL, NULL, 'ngedbfsad', NULL, 'bsdvavbf', NULL, NULL, NULL, '2023-07-09', 1, 1, NULL, '376543683', '2543733', 'bedfsbvefb', NULL, NULL, 5, 3, '2023-07-10', '2023-07-03', NULL, '021561561541', NULL, NULL, 21514541, '021541451', 'hiujhu', NULL, NULL, 1, '2023-07-05 02:15:54', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence_logs`
--
ALTER TABLE `attendence_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplinary_actions`
--
ALTER TABLE `disciplinary_actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `set_office_times`
--
ALTER TABLE `set_office_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taken_disciplinary_action_against_employees`
--
ALTER TABLE `taken_disciplinary_action_against_employees`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attendence_logs`
--
ALTER TABLE `attendence_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplinary_actions`
--
ALTER TABLE `disciplinary_actions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_office_times`
--
ALTER TABLE `set_office_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `taken_disciplinary_action_against_employees`
--
ALTER TABLE `taken_disciplinary_action_against_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
