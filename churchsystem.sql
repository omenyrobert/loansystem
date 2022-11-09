-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 06:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `church_positions`
--

CREATE TABLE `church_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `church_positions`
--

INSERT INTO `church_positions` (`id`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Senior Pastor', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(2, 'Assistant Pastor', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(3, 'Church Elder', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(4, 'Chair Person', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(5, 'Assistant Chair Person', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(6, 'Secretary', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(7, 'Coordinator', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(8, 'Member', '2022-11-05 11:42:49', '2022-11-05 11:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_type` int(11) NOT NULL,
  `expense` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `expense_type`, `expense`, `comment`, `created_at`, `updated_at`) VALUES
(1, '2022-11-08', 2, '10000', 'The keyboard guy', '2022-11-06 15:59:27', '2022-11-06 15:59:27'),
(2, '2022-11-04', 3, '5000', 'Lunch for the admin', '2022-11-06 16:00:02', '2022-11-06 16:00:02'),
(3, '2022-11-12', 1, '30000', 'Payment for Yaka', '2022-11-06 16:00:52', '2022-11-06 16:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_types`
--

INSERT INTO `expense_types` (`id`, `expense_type`, `created_at`, `updated_at`) VALUES
(1, 'Utility', '2022-11-05 14:35:06', '2022-11-05 14:35:06'),
(2, 'Transport', '2022-11-05 14:35:27', '2022-11-05 14:35:27'),
(3, 'Lunch', '2022-11-05 14:42:43', '2022-11-05 14:42:43'),
(4, 'Machine Hiring', '2022-11-06 10:43:33', '2022-11-06 10:43:33'),
(6, 'Machine Hiring', '2022-11-06 10:56:53', '2022-11-06 10:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income_type` int(11) NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `date`, `income_type`, `income`, `comment`, `created_at`, `updated_at`) VALUES
(1, '2022-11-08', 2, '100000', 'From Omeny', '2022-11-06 15:07:28', '2022-11-06 15:07:28'),
(2, '2022-11-10', 3, '300000', 'Robert\'s Family', '2022-11-06 15:08:45', '2022-11-06 15:08:45'),
(3, '2022-11-02', 5, '5000000', 'From USA', '2022-11-06 15:11:07', '2022-11-06 15:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `income_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_types`
--

INSERT INTO `income_types` (`id`, `income_type`, `created_at`, `updated_at`) VALUES
(1, 'Offertory', '2022-11-06 13:15:51', '2022-11-06 13:15:51'),
(2, 'Tithe', '2022-11-06 13:16:08', '2022-11-06 13:16:08'),
(3, 'Gift', '2022-11-06 13:16:27', '2022-11-06 13:16:27'),
(5, 'Donations', '2022-11-06 15:09:17', '2022-11-06 15:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `type_of_bike` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_type_id` int(11) NOT NULL,
  `loan_duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_paid` bigint(20) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_residence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Fathers_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothers_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `date_of_birth`, `place_of_residence`, `contact1`, `contact2`, `job`, `spouse_name`, `spouse_contact`, `fathers_name`, `Fathers_contact`, `mothers_name`, `mothers_contact`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Omeny Robert', '2022-11-09', 'Kisaasi', '0756722722', '0756722722', 'Electronics Engineer', 'Nakange Rita', '07839053', NULL, NULL, NULL, NULL, NULL, '2022-11-05 13:08:10', '2022-11-05 13:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `member_ministries`
--

CREATE TABLE `member_ministries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `ministry_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_ministries`
--

INSERT INTO `member_ministries` (`id`, `member_id`, `ministry_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-11-05 13:08:10', '2022-11-05 13:08:10'),
(2, 1, 4, '2022-11-05 13:08:10', '2022-11-05 13:08:10'),
(3, 1, 10, '2022-11-05 13:08:10', '2022-11-05 13:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `member_positions`
--

CREATE TABLE `member_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_positions`
--

INSERT INTO `member_positions` (`id`, `member_id`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-11-05 13:08:10', '2022-11-05 13:08:10'),
(2, 1, 4, '2022-11-05 13:08:10', '2022-11-05 13:08:10'),
(3, 1, 7, '2022-11-05 13:08:10', '2022-11-05 13:08:10');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_14_074008_create_ministry_types_table', 2),
(8, '2022_10_17_063006_create_church_positions_table', 5),
(11, '2022_10_14_073147_create_payments_table', 7),
(12, '2022_10_13_060736_create_loans_table', 8),
(14, '2022_10_12_123228_create_members_table', 9),
(15, '2022_10_26_080634_add_reschedule_date_to_payments', 10),
(18, '2022_11_05_151018_create_member_positions_table', 12),
(19, '2022_11_05_155116_create_member_ministries_table', 13),
(20, '2022_11_05_164928_create_expense_types_table', 14),
(21, '2022_11_05_165053_create_income_types_table', 14),
(24, '2022_11_05_165119_create_incomes_table', 15),
(25, '2022_11_05_165133_create_expenses_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ministry_types`
--

CREATE TABLE `ministry_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ministry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ministry_types`
--

INSERT INTO `ministry_types` (`id`, `ministry`, `created_at`, `updated_at`) VALUES
(1, 'Pastoral', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(2, 'Worship Band', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(3, 'Men Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(4, 'Women Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(5, 'Children Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(6, 'Youth Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(7, 'Intercessor Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(8, 'Usher Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(9, 'Married Ministry', '2022-11-05 11:42:49', '2022-11-05 11:42:49'),
(10, 'Staff', '2022-11-05 11:42:49', '2022-11-05 11:42:49');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `reschedule_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cleared` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muramuzi', 'admin@gmail.com', NULL, '$2y$10$VS0XQVyuA2RFB/wvibN6ZujnnAiJ.Is7ZUy6B8JDe6EF4HfecDLdW', NULL, '2022-11-05 11:42:49', '2022-11-05 11:42:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `church_positions`
--
ALTER TABLE `church_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_ministries`
--
ALTER TABLE `member_ministries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_positions`
--
ALTER TABLE `member_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ministry_types`
--
ALTER TABLE `ministry_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `church_positions`
--
ALTER TABLE `church_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income_types`
--
ALTER TABLE `income_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_ministries`
--
ALTER TABLE `member_ministries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_positions`
--
ALTER TABLE `member_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ministry_types`
--
ALTER TABLE `ministry_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
