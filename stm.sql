-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 03 déc. 2018 à 13:00
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stm`
--

-- --------------------------------------------------------

--
-- Structure de la table `stm_events`
--

CREATE TABLE `stm_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `om_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_days` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stm_events`
--

INSERT INTO `stm_events` (`id`, `user_id`, `om_id`, `country`, `locator`, `title`, `customer`, `start_date`, `end_date`, `location`, `hotel_contact`, `delivery_days`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(79, 27, '46f1e4f5', 'Tunisia', 'Tunis', 'ISO 9002', 'Nokia', '2018-09-25', '2018-09-28', 'Paris', NULL, 3, '2018-09-27 12:13:40', '2018-10-02 14:42:38', NULL, 'planned'),
(80, 9, '46f1e4f5', 'Tunisia', 'Tunis', 'ISO 27001', 'Tac-Tic', '2018-10-01', '2018-10-06', 'Ghazella', NULL, 5, '2018-09-27 12:13:40', '2018-10-03 07:30:58', NULL, 'valide'),
(81, 9, 'e0e903f9', 'Tunisia', 'El gahazella', 'CEH V10', 'Tac-Tic', '2018-10-01', '2018-10-03', 'Tunis', NULL, 3, '2018-10-01 07:51:27', '2018-10-02 15:03:53', NULL, 'valide'),
(85, 9, '7e79cf12', 'Tunisia', 'Tunis', 'S.A107189 LCW 444 H/ AAA R10', 'UPK', '2018-01-30', '2018-02-07', 'GREECE', NULL, 7, '2018-10-09 07:48:23', '2018-10-09 07:48:23', NULL, 'planned'),
(86, 6, '7ade74f7', 'belgium', 'SLOVAKIA', 'BNG', 'NOKIA', '2018-10-08', '2018-10-13', 'BRATASLAVA', 'HolidayInn Barataslava', 5, '2018-10-20 17:23:00', '2018-10-20 17:23:00', NULL, 'planned'),
(87, 6, '7ade74f7', 'belgium', 'SLOVAKIA', 'BNG', 'NOKIA', '2018-10-08', '2018-10-13', 'BRATASLAVA', 'HolidayInn Barataslava', 5, '2018-10-20 17:23:21', '2018-10-20 17:23:21', NULL, 'planned'),
(88, 14, '09a142b9', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:44', '2018-10-22 17:14:44', NULL, 'planned'),
(89, 14, '09a142b9', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:45', '2018-10-22 17:14:45', NULL, 'planned'),
(90, 14, '09a142b9', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:50', '2018-10-22 17:14:50', NULL, 'planned'),
(91, 14, '09a142b9', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:51', '2018-10-22 17:14:51', NULL, 'planned'),
(92, 14, 'befa8736', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:18:29', '2018-10-22 17:18:29', NULL, 'planned'),
(93, 14, '5ee31e97', 'French', 'Paris', 'BNG', 'SFR', '2018-10-22', '2018-10-26', 'Paris', NULL, 5, '2018-10-23 06:34:53', '2018-10-23 06:34:53', NULL, 'planned'),
(94, 14, '5ee31e97', 'French', 'Paris', 'BNG', 'SFR', '2018-10-22', '2018-10-26', 'Paris', NULL, 5, '2018-10-23 06:36:53', '2018-10-23 06:36:53', NULL, 'planned'),
(95, 14, '18b73bb5', 'belgium', 'Anwerpen', 'BNG', 'Nokia', '2018-11-05', '2018-11-08', '10, Antwerpen', 'ibis antwerpen', 4, '2018-10-23 06:50:10', '2018-10-23 06:50:10', NULL, 'planned'),
(96, 14, '18b73bb5', 'French', 'Paris', 'CEHv10', 'Qualcomm', '2018-11-12', '2018-11-16', '10 rue charle degaule', 'HolidayInn Paris CDG', 4, '2018-10-23 06:50:10', '2018-10-23 06:50:10', NULL, 'planned'),
(97, 14, '18b73bb5', 'belgium', 'Bruxels', 'ECSA', 'Thales', '2018-11-19', '2018-11-23', '20, bruxels tower', 'Bruxel hotel', 5, '2018-10-23 06:50:10', '2018-10-23 06:50:10', NULL, 'planned'),
(98, 14, '18b73bb5', 'belgium', 'Anwerpen', 'BNG', 'Nokia', '2018-11-05', '2018-11-08', '10, Antwerpen', 'ibis antwerpen', 4, '2018-10-23 06:50:39', '2018-10-23 06:50:39', NULL, 'planned'),
(99, 14, '18b73bb5', 'French', 'Paris', 'CEHv10', 'Qualcomm', '2018-11-12', '2018-11-16', '10 rue charle degaule', 'HolidayInn Paris CDG', 4, '2018-10-23 06:50:39', '2018-10-23 06:50:39', NULL, 'planned'),
(100, 14, '18b73bb5', 'belgium', 'Bruxels', 'ECSA', 'Thales', '2018-11-19', '2018-11-23', '20, bruxels tower', 'Bruxel hotel', 5, '2018-10-23 06:50:39', '2018-10-23 06:50:39', NULL, 'planned'),
(101, 6, '897d0577', 'French', 'Lannion', 'CEHv10', 'AirFrance', '2018-11-02', '2018-11-08', 'Lannion', 'Ibis', 5, '2018-11-16 10:35:20', '2018-11-16 10:35:20', NULL, 'planned'),
(102, 6, '897d0577', 'belgium', 'Antwerp', 'ECSA', 'x', '2018-11-12', '2018-11-16', 'Antwerp', 'antwerp hotel', 4, '2018-11-16 10:35:20', '2018-11-16 10:35:20', NULL, 'planned'),
(103, 6, '897d0577', 'French', 'Paris', 'iso27001', 'TY', '2018-11-19', '2018-11-23', 'Paris', 'Ibis', 3, '2018-11-16 10:35:20', '2018-11-16 10:35:20', NULL, 'planned'),
(104, 6, '897d0577', 'French', 'Lannion', 'CEHv10', 'AirFrance', '2018-11-02', '2018-11-08', 'Lannion', 'Ibis', 5, '2018-11-16 10:35:31', '2018-11-16 10:35:31', NULL, 'planned'),
(105, 6, '897d0577', 'belgium', 'Antwerp', 'ECSA', 'x', '2018-11-12', '2018-11-16', 'Antwerp', 'antwerp hotel', 4, '2018-11-16 10:35:31', '2018-11-16 10:35:31', NULL, 'planned'),
(106, 6, '897d0577', 'French', 'Paris', 'iso27001', 'TY', '2018-11-19', '2018-11-23', 'Paris', 'Ibis', 3, '2018-11-16 10:35:31', '2018-11-16 10:35:31', NULL, 'planned'),
(107, 29, 'c9c6ca69', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-21 09:32:33', '2018-11-21 09:32:33', NULL, 'planned'),
(108, 29, 'c9c6ca69', 'Tunisia', 'qsdqd', 'dsd', 'qsdqsd', '2018-11-22', '2018-11-25', 'qsdqdq', 'qsdqdsqsfqsfq', 1, '2018-11-21 09:33:13', '2018-11-21 09:33:13', NULL, 'planned'),
(109, 29, 'c9c6ca69', 'Tunisia', 'qsdqd', 'dsd', 'qsdqsd', '2018-11-22', '2018-11-25', 'qsdqdq', 'qsdqdsqsfqsfq', 1, '2018-11-21 09:33:20', '2018-11-21 09:33:20', NULL, 'planned'),
(110, 29, 'c9c6ca69', 'Tunisia', 'qsdqd', 'dsd', 'qsdqsd', '2018-11-22', '2018-11-25', 'qsdqdq', 'qsdqdsqsfqsfq', 1, '2018-11-21 09:33:26', '2018-11-21 09:33:26', NULL, 'planned'),
(111, 33, '60b76729', 'Tunisia', 'tunis', 'ceh1', 'ibm', '2018-11-21', '2018-11-27', 'tunis', 'fsfdfsfsdf', 2, '2018-11-21 11:31:59', '2018-11-21 11:31:59', NULL, 'planned'),
(112, 33, '60b76729', 'Tunisia', 'tunis', 'ceh1', 'ibm', '2018-11-21', '2018-11-27', 'tunis', 'fsfdfsfsdf', 2, '2018-11-21 11:32:59', '2018-11-21 11:32:59', NULL, 'planned'),
(113, 33, '60b76729', 'Tunisia', 'tunis', 'ceh1', 'ibm', '2018-11-21', '2018-11-27', 'tunis', 'fsfdfsfsdf', 2, '2018-11-21 11:33:39', '2018-11-21 11:33:39', NULL, 'planned'),
(114, 33, '60b76729', 'Tunisia', 'tunis', 'ceh1', 'ibm', '2018-11-21', '2018-11-27', 'tunis', 'fsfdfsfsdf', 2, '2018-11-21 11:33:43', '2018-11-21 11:33:43', NULL, 'planned'),
(115, 33, '60b76729', 'Tunisia', 'tunis', 'ceh1', 'ibm', '2018-11-21', '2018-11-27', 'tunis', 'fsfdfsfsdf', 2, '2018-11-21 11:34:31', '2018-11-21 11:34:31', NULL, 'planned'),
(116, 27, '0bcb747e', 'Tunisia', 'qsqsq', 's', 'sqsq', '2018-11-23', '2018-11-25', 'qsqs', 'sqssd', 2, '2018-11-22 20:07:58', '2018-11-22 20:07:58', NULL, 'planned'),
(117, 27, '0bcb747e', 'Tunisia', 'qsqsq', 's', 'sqsq', '2018-11-23', '2018-11-25', 'qsqs', 'sqssd', 2, '2018-11-22 20:08:07', '2018-11-22 20:08:07', NULL, 'planned'),
(118, 27, '897d0577', 'belgium', 'Antwerp', 'ECSA', 'x', '2018-11-12', '2018-11-16', 'Antwerp', 'antwerp hotel', 4, '2018-11-16 10:35:31', '2018-11-16 10:35:31', NULL, 'planned'),
(119, 27, '39f93e7f', 'French', 'tunis', 'ceh', 'cc', '2018-11-30', '2018-12-01', 'tunis', 'ggggggggg', 2, '2018-11-29 12:06:00', '2018-11-29 12:06:00', NULL, 'planned'),
(120, 27, '39f93e7f', 'French', 'Paris', 'ceh', 'Orange', '2018-12-03', '2018-12-07', 'Paris', 'Hotel IBIS, Champs ellysée', 4, '2018-11-29 12:09:32', '2018-11-29 12:09:32', NULL, 'planned'),
(121, 27, '39f93e7f', 'belgium', 'Antwerp', 'ECSA', 'Belgium Telecom', '2018-12-10', '2018-12-14', 'Antwerp', 'B&B hotel Anwerp old city', 5, '2018-11-29 12:09:32', '2018-11-29 12:09:32', NULL, 'planned'),
(122, 27, '39f93e7f', 'French', 'Paris', 'ceh', 'Orange', '2018-12-03', '2018-12-07', 'Paris', 'Hotel IBIS, Champs ellysée', 4, '2018-11-29 12:19:23', '2018-11-29 12:19:23', NULL, 'planned'),
(123, 27, '39f93e7f', 'belgium', 'Antwerp', 'ECSA', 'Belgium Telecom', '2018-12-10', '2018-12-14', 'Antwerp', 'B&B hotel Anwerp old city', 5, '2018-11-29 12:19:23', '2018-11-29 12:19:23', NULL, 'planned'),
(124, 33, 'a29c6bd1', 'French', 'paris', 'ceh', 'ibm', '2018-12-01', '2018-12-01', 'paris', 'hotel paris 1203', 2, '2018-11-30 09:42:27', '2018-11-30 09:42:27', NULL, 'planned'),
(125, 33, 'b5054472', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-30 10:40:45', '2018-11-30 10:40:45', NULL, 'planned'),
(126, 33, 'b5054472', 'Tunisia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-30 10:40:58', '2018-11-30 10:40:58', NULL, 'planned'),
(127, 33, 'b5054472', 'Tunisia', 'qsdqd', 'xsqd', 'qsdq', '2018-11-16', '2018-11-24', 'qsdqd', 'sqdqd', 5, '2018-11-30 10:41:21', '2018-11-30 10:41:21', NULL, 'planned'),
(128, 33, 'b5054472', 'Tunisia', 'qsdqd', 'xsqd', 'qsdq', '2018-11-16', '2018-11-24', 'qsdqd', 'sqdqd', 5, '2018-11-30 10:41:24', '2018-11-30 10:41:24', NULL, 'planned'),
(129, 33, 'b5054472', 'Tunisia', 'qsdqd', 'xsqd', 'qsdq', '2018-11-16', '2018-11-24', 'qsdqd', 'sqdqd', 5, '2018-11-30 10:41:26', '2018-11-30 10:41:26', NULL, 'planned');

-- --------------------------------------------------------

--
-- Structure de la table `stm_instructors`
--

CREATE TABLE `stm_instructors` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_validity` date DEFAULT NULL,
  `passport_number` tinyint(4) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stm_instructors`
--

INSERT INTO `stm_instructors` (`id`, `first_name`, `last_name`, `email`, `password`, `company`, `passport_validity`, `passport_number`, `title`, `grade`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'saif', 'edinne', 'saif@gmail.com', '$2y$10$2yam9lMkWqxa8XElTtGIw.BOXrBcw1QzRiE09LTjrIvuaJc4V016C', 'tactic', NULL, 12, 'DAF', 0, NULL, '2018-11-21 09:27:17', '2018-11-21 09:27:17'),
(4, 'saif', 'edinne', 'saif@gmail.com', '$2y$10$su5WVRA19mV/X3j80PNio.JrvgTKXOA9EY/0KoFU2WlWRMw8wXABy', 'tactic', NULL, 12, 'DAF', 0, NULL, '2018-11-21 09:31:08', '2018-11-21 09:31:08'),
(5, 'saif', 'edinne', 'saif@gmail.com', '$2y$10$Xqt1FDds/G58cikimq2YRO028A7TcmKJr5ec4rRqe9alFg7ALzStW', 'tactic', NULL, 12, 'DAF', 0, NULL, '2018-11-21 09:31:16', '2018-11-21 09:31:16');

-- --------------------------------------------------------

--
-- Structure de la table `stm_migrations`
--

CREATE TABLE `stm_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stm_migrations`
--

INSERT INTO `stm_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_03_081619_create_instructor_table', 1),
(4, '2018_07_18_062925_create_om_table', 2),
(5, '2018_07_18_110843_add_column_deleted_at_om', 3),
(6, '2018_07_18_195248_add_column_user_id', 4),
(7, '2018_07_19_080759_create_sessions_table', 5),
(8, '2018_07_20_073635_create_events_table', 6),
(9, '2018_07_20_080746_add_column_user_id_events', 7),
(10, '2018_07_20_100048_add_column_events_deleted_at', 8),
(11, '2018_07_23_074623_create_pdcs_table', 9),
(12, '2018_07_30_101011_add_column_user_id_pdc', 10),
(13, '2018_08_06_103404_add_column_event_id', 10),
(14, '2018_08_06_112955_add_reason_pdc', 11),
(15, '2018_08_06_123323_add_pdc_type', 12),
(16, '2018_08_07_110237_add_events_id_om', 13),
(17, '2018_08_15_074555_create_trip_table', 14),
(18, '2018_08_15_091033_add_column_user_id_trip', 15),
(19, '2018_08_15_101602_add_event_id', 16);

-- --------------------------------------------------------

--
-- Structure de la table `stm_oms`
--

CREATE TABLE `stm_oms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `events_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `invoice_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modif_ex_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stm_password_resets`
--

CREATE TABLE `stm_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `stm_pdcs`
--

CREATE TABLE `stm_pdcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `events_id` int(10) UNSIGNED NOT NULL,
  `locator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Colonne 15` int(11) DEFAULT NULL,
  `attach_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `om_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validated_DAF` tinyint(1) NOT NULL DEFAULT '0',
  `validated_instructor` tinyint(1) NOT NULL DEFAULT '0',
  `validated_manager` int(10) NOT NULL DEFAULT '0',
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stm_pdcs`
--

INSERT INTO `stm_pdcs` (`id`, `user_id`, `events_id`, `locator`, `date`, `currency`, `amount`, `title`, `payement`, `Colonne 15`, `attach_file`, `reason`, `type`, `created_at`, `updated_at`, `status`, `om_id`, `validated_DAF`, `validated_instructor`, `validated_manager`, `pay`) VALUES
(28, 9, 79, NULL, NULL, 'EUR', 20, 'Taxi', NULL, NULL, '', NULL, '2', '2018-10-08 13:00:35', '2018-10-08 13:00:35', 'unpaied', '46f1e4f5', 0, 0, 0, 'cb'),
(29, 9, 79, NULL, NULL, 'EUR', 320, 'Assurance', NULL, NULL, '', NULL, '4', '2018-10-08 13:00:35', '2018-10-08 13:00:35', 'unpaied', '46f1e4f5', 0, 0, 0, 'cheque'),
(30, 9, 79, NULL, NULL, 'TND', 60, 'Timbre', NULL, NULL, '', NULL, '3', '2018-10-08 13:00:35', '2018-10-08 13:00:35', 'unpaied', '46f1e4f5', 0, 0, 0, 'cb'),
(33, 9, 85, NULL, NULL, 'EUR', 126.47, 'Taxi', NULL, NULL, '', NULL, '2', '2018-10-09 07:51:01', '2018-10-09 07:52:02', 'unpaied', '7e79cf12', 1, 1, 0, 'cash'),
(34, 9, 85, NULL, NULL, 'TND', 60, 'Stamp', NULL, NULL, '', NULL, '3', '2018-10-09 07:51:01', '2018-10-09 07:52:02', 'unpaied', '7e79cf12', 1, 1, 0, 'cash'),
(35, 10, 85, NULL, NULL, 'sdfsdf', 111, 'xcvx', NULL, NULL, '', NULL, '1', '2018-10-16 12:47:47', '2018-10-16 12:47:47', 'unpaied', '7e79cf12', 0, 0, 0, 'cb'),
(36, 10, 85, NULL, NULL, 'sdf', 111, 'sdf', NULL, NULL, '', NULL, '1', '2018-10-16 12:47:47', '2018-10-16 12:47:47', 'unpaied', '7e79cf12', 0, 0, 0, 'cb'),
(37, 10, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-10-17 12:53:42', '2018-10-17 12:53:42', 'unpaied', '46f1e4f5', 0, 0, 0, 'cb'),
(38, 10, 80, NULL, NULL, 'sdfsdf', 111, 'sdsdff', NULL, NULL, '', NULL, '1', '2018-10-17 12:53:56', '2018-10-17 12:53:56', 'unpaied', '46f1e4f5', 0, 0, 0, 'cb'),
(39, 10, 80, NULL, NULL, 'sdfsdf', 111, 'sdsdff', NULL, NULL, '', NULL, '1', '2018-10-17 12:54:16', '2018-10-17 12:54:16', 'unpaied', '46f1e4f5', 0, 0, 0, 'cb'),
(40, 10, 80, NULL, NULL, 'fgdf', 111, 'trhfgh', NULL, NULL, '', NULL, '1', '2018-10-17 12:54:16', '2018-10-17 12:54:16', 'unpaied', '46f1e4f5', 1, 1, 0, 'cb'),
(41, 6, 86, NULL, NULL, 'Euro', 180, 'Taxi', NULL, NULL, '', NULL, '2', '2018-10-20 17:26:13', '2018-10-20 17:26:13', 'unpaied', '7ade74f7', 1, 1, 0, 'cash'),
(42, 6, 86, NULL, NULL, 'TND', 60, 'Timbre voyage', NULL, NULL, '', NULL, '3', '2018-10-20 17:26:13', '2018-10-20 17:26:13', 'unpaied', '7ade74f7', 1, 1, 0, 'cheque'),
(43, 14, 95, NULL, NULL, 'TND', 60, 'Timbre voyage', NULL, NULL, '', NULL, '3', '2018-10-23 07:44:47', '2018-10-23 07:44:47', 'unpaied', '18b73bb5', 1, 1, 0, 'cash'),
(44, 14, 95, NULL, NULL, 'Euro', 12, 'taxe de sejour', NULL, NULL, '', NULL, '1', '2018-10-23 07:44:47', '2018-10-23 07:44:47', 'unpaied', '18b73bb5', 1, 1, 1, 'cash'),
(45, 14, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-10-23 07:46:32', '2018-10-23 07:46:32', 'unpaied', '18b73bb5', 0, 0, 0, 'cb'),
(46, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-14 09:14:38', '2018-11-14 09:14:38', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(47, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '5', '2018-11-14 09:18:28', '2018-11-14 09:18:28', 'unpaied', '09a142b9', 0, 0, 0, 'cash'),
(48, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(49, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(50, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(51, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(52, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(53, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(54, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(55, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(56, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(57, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(58, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(59, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(60, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(61, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:32:22', '2018-11-16 10:32:22', 'unpaied', '09a142b9', 0, 0, 0, 'cb'),
(62, 6, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:43:06', '2018-11-16 10:43:06', 'unpaied', '18b73bb5', 0, 0, 0, 'cb'),
(63, 6, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:43:06', '2018-11-16 10:43:06', 'unpaied', '18b73bb5', 0, 0, 0, 'cb'),
(64, 6, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:43:06', '2018-11-16 10:43:06', 'unpaied', '18b73bb5', 0, 0, 0, 'cb'),
(65, 6, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:43:06', '2018-11-16 10:43:06', 'unpaied', '18b73bb5', 0, 0, 0, 'cb'),
(66, 6, 95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '1', '2018-11-16 10:43:06', '2018-11-16 10:43:06', 'unpaied', '18b73bb5', 0, 0, 0, 'cb'),
(67, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '3', '2018-11-16 11:57:34', '2018-11-16 11:57:34', 'unpaied', '09a142b9', 1, 0, 0, 'cheque');

-- --------------------------------------------------------

--
-- Structure de la table `stm_trips`
--

CREATE TABLE `stm_trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `events_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prime_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `om_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stm_trips`
--

INSERT INTO `stm_trips` (`id`, `user_id`, `events_id`, `name`, `prime_amount`, `formule`, `deposit`, `total`, `ticket`, `created_at`, `updated_at`, `om_id`, `start_date`, `end_date`, `status`, `comment`) VALUES
(48, 9, 80, NULL, '840.000', '(20*20)+3*55+5*55', NULL, NULL, NULL, '2018-09-27 12:13:40', '2018-10-02 14:07:23', '46f1e4f5', '2018-09-25', '2018-10-14', 'Invalide by Manager ', ''),
(49, 9, 81, NULL, '265.000', '(5*20)+3*55', NULL, NULL, NULL, '2018-10-01 07:51:27', '2018-10-01 12:18:21', 'e0e903f9', '2018-10-01', '2018-10-06', 'planned', ''),
(52, 9, 85, NULL, '485.000', '(5*20)+7*55', NULL, NULL, NULL, '2018-10-09 07:48:23', '2018-10-09 07:49:13', '7e79cf12', '2018-01-30', '2018-02-07', 'Valide by Manager', ''),
(53, 6, 86, NULL, '415.000', '(7*20)+5*55', NULL, NULL, NULL, '2018-10-20 17:23:00', '2018-10-20 17:23:00', '7ade74f7', '2018-10-07', '2018-10-14', 'Valide by DAF', ''),
(54, 6, 87, NULL, '415.000', '(7*20)+5*55', NULL, NULL, NULL, '2018-10-20 17:23:21', '2018-10-20 17:23:21', '7ade74f7', '2018-10-07', '2018-10-14', 'Valide by DAF', ''),
(70, 14, 88, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:44', '2018-10-22 17:14:44', '09a142b9', '2018-10-22', '2018-10-22', 'Valide by DAF', ''),
(71, 14, 89, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:45', '2018-10-22 17:14:45', '09a142b9', '2018-10-22', '2018-10-22', 'Invalide by DAF', ''),
(72, 14, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:50', '2018-10-22 17:14:50', '09a142b9', '2018-10-22', '2018-10-22', 'Valide by DAF', ''),
(73, 14, 91, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:14:51', '2018-10-22 17:14:51', '', '2018-10-22', '2018-10-22', 'Invalide by DAF', ''),
(75, 14, 92, NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 17:18:29', '2018-10-22 17:18:29', 'befa8736', '2018-10-24', '2018-10-24', 'Invalide by DAF', ''),
(77, 14, 93, NULL, '395.000', '(6*20)+5*55', NULL, NULL, NULL, '2018-10-23 06:34:53', '2018-10-23 06:34:53', '5ee31e97', '2018-10-21', '2018-10-27', 'Valide by DAF', ''),
(78, 14, 94, NULL, '395.000', '(6*20)+5*55', NULL, NULL, NULL, '2018-10-23 06:36:53', '2018-10-23 06:36:53', '5ee31e97', '2018-10-21', '2018-10-27', 'Valide by DAF', ''),
(79, 14, 97, NULL, '1135.000', '(21*20)+4*55+4*55+5*55', NULL, NULL, NULL, '2018-10-23 06:50:10', '2018-10-23 06:50:10', '18b73bb5', '2018-11-03', '2018-11-24', 'Valide by DAF', ''),
(80, 14, 100, NULL, '1135.000', '(21*20)+4*55+4*55+5*55', NULL, NULL, NULL, '2018-10-23 06:50:39', '2018-10-23 06:50:39', '18b73bb5', '2018-11-03', '2018-11-24', 'Valide by DAF', ''),
(85, 6, 103, NULL, '1140.000', '(24*20)+5*55+4*55+3*55', NULL, NULL, NULL, '2018-11-16 10:35:20', '2018-11-16 10:35:20', '897d0577', '2018-11-01', '2018-11-25', 'Valide by DAF', ''),
(86, 6, 106, NULL, '1140.000', '(24*20)+5*55+4*55+3*55', NULL, NULL, NULL, '2018-11-16 10:35:31', '2018-11-16 10:35:31', '897d0577', '2018-11-01', '2018-11-25', 'Valide by DAF', ''),
(87, 29, 107, NULL, NULL, NULL, NULL, NULL, NULL, '2018-11-21 09:32:33', '2018-11-21 09:32:33', 'c9c6ca69', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(88, 29, 108, NULL, '195.000', '(7*20)+1*55', NULL, NULL, NULL, '2018-11-21 09:33:13', '2018-11-21 09:33:13', 'c9c6ca69', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(89, 29, 109, NULL, '195.000', '(7*20)+1*55', NULL, NULL, NULL, '2018-11-21 09:33:20', '2018-11-21 09:33:20', 'c9c6ca69', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(90, 29, 110, NULL, '195.000', '(7*20)+1*55', NULL, NULL, NULL, '2018-11-21 09:33:26', '2018-11-21 09:33:26', 'c9c6ca69', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(91, 33, 111, NULL, '250.000', '(7*20)+2*55', NULL, NULL, NULL, '2018-11-21 11:31:59', '2018-11-27 09:56:56', '60b76729', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(92, 33, 112, NULL, '250.000', '(7*20)+2*55', NULL, NULL, NULL, '2018-11-21 11:32:59', '2018-11-27 09:56:41', '60b76729', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(93, 33, 113, NULL, '250.000', '(7*20)+2*55', NULL, NULL, NULL, '2018-11-21 11:33:39', '2018-11-27 09:56:28', '60b76729', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(94, 33, 114, NULL, '250.000', '(7*20)+2*55', NULL, NULL, NULL, '2018-11-21 11:33:43', '2018-11-27 09:56:22', '60b76729', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(95, 33, 115, NULL, '250.000', '(7*20)+2*55', NULL, NULL, NULL, '2018-11-21 11:34:31', '2018-11-21 11:34:31', '60b76729', '2018-11-21', '2018-11-28', 'Valide by DAF', ''),
(98, 27, 116, NULL, '190.000', '(4*20)+2*55', NULL, NULL, NULL, '2018-11-22 20:07:58', '2018-11-22 20:07:58', '0bcb747e', '2018-11-23', '2018-11-27', 'Valide by DAF', ''),
(99, 27, 117, NULL, '190.000', '(4*20)+2*55', NULL, NULL, NULL, '2018-11-22 20:08:07', '2018-11-22 20:08:07', '0bcb747e', '2018-11-23', '2018-11-27', 'Valide by DAF', ''),
(100, 27, 119, NULL, '250.000', '(7*20)+2*55', NULL, NULL, NULL, '2018-11-29 12:06:00', '2018-11-29 12:06:00', '39f93e7f', '2018-11-29', '2018-12-05', 'Valide by DAF', ''),
(101, 27, 121, NULL, '755.000', '(13*20)+4*55+5*55', NULL, NULL, NULL, '2018-11-29 12:09:32', '2018-11-29 12:09:32', '39f93e7f', '2018-12-02', '2018-12-15', 'Valide by DAF', ''),
(102, 27, 123, NULL, '755.000', '(13*20)+4*55+5*55', NULL, NULL, NULL, '2018-11-29 12:19:23', '2018-11-29 12:19:23', '39f93e7f', '2018-12-02', '2018-12-15', 'Valide by DAF', ''),
(103, 33, 124, NULL, '210.000', '(5*20)+2*55', NULL, NULL, NULL, '2018-11-30 09:42:27', '2018-11-30 09:42:27', 'a29c6bd1', '2018-12-01', '2018-12-06', 'Valide by DAF', '');

-- --------------------------------------------------------

--
-- Structure de la table `stm_users`
--

CREATE TABLE `stm_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Instructor',
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_validation` date DEFAULT NULL,
  `passport_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stm_users`
--

INSERT INTO `stm_users` (`id`, `name`, `last_name`, `email`, `password`, `admin`, `company`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`, `title`, `grade`, `passport_validation`, `passport_number`) VALUES
(4, 'MOHAMED BADIS', 'GUESMI', 'badis.guesmi@tac-tic.net', '$2y$10$U9aoIkcC8oAYoWpAQqCkp.CDZrDJwAaeFEKAxqUhM6RolhFmhAZHe', 1, 'SmartSkills', '6XH1h3PyftM5FAvQiJhJh10kiUkmEbq6lXFBIirCgNN5NSq7shRqR8cNb8Fm', '2018-08-03 09:17:48', '2018-08-09 10:16:41', 'GOOGLE', '104815251632688048763', 'Instructor', 'first level', '2018-08-09', '12354531'),
(5, 'bedis guesmi', NULL, 'guesmibedis@gmail.com', NULL, 0, NULL, 'qmLfBPJOgFfy3TRTw6u42OKUrNP0iPvV5AG6QkVauYoLg1On0tOB7X40ZIuU', '2018-08-03 09:24:30', '2018-08-03 09:24:30', 'GOOGLE', '103233195847890959743', NULL, NULL, NULL, NULL),
(6, 'Ayed AKROUT', NULL, 'ayed.akrout@tac-tic.net', NULL, 1, NULL, 'sSzo6jMHSRhCMKAA4BmyTzYkMINiUexq8vkU0BUP5jxnIcZjnP6AZzMWAKi2', '2018-08-27 15:19:31', '2018-08-27 15:19:31', 'GOOGLE', '109462120230204099857', 'DAF', NULL, NULL, NULL),
(9, 'Mohamed Karim Bchini', NULL, 'medkarim.bchini@tac-tic.net', NULL, 1, NULL, 'rk3ZLOHok28YPwoEc6G2DfQvMsLQiHu5CZmDan8P7UrfxDVhvbCWADo3u6sB', '2018-09-27 09:07:41', '2018-09-28 12:29:27', 'GOOGLE', '100485595959069984108', 'Instructor', NULL, NULL, 'Y254125 délivrée le 12/12/2016'),
(10, 'Abdelmonam KOUKA', NULL, 'abdelmonam.kouka@tac-tic.net', NULL, 1, NULL, 'lgDAZwEgV2IlooZYXu4JqfFVbZ08xDc51QYCnYZ9qxfj5O837xyY9cLZZpse', '2018-10-16 12:45:30', '2018-10-16 12:45:30', 'GOOGLE', '112105788366813192435', NULL, NULL, NULL, NULL),
(11, 'Wajih LETAIEF', NULL, 'wajih.letaief@tac-tic.net', NULL, 0, NULL, 'ERosryO28zfKAFGV4LoTXHcavJNCXsElxjPC8b12sfBhmvW8Z21Fx5FQCD2W', '2018-10-16 17:29:59', '2018-10-16 17:29:59', 'GOOGLE', '105051658224294273434', 'Instructor', NULL, NULL, NULL),
(12, 'smart skills', NULL, 'stm.tactic.smartskills@gmail.com', NULL, 0, NULL, 'JlL5zsBp5Qib52rdXOQOGyDPLozodaxASK6zjoD0dFaYsVGY5VugB1G8ZmAt', '2018-10-17 12:34:11', '2018-10-17 12:34:11', 'GOOGLE', '114755514340660428310', 'Instructor', NULL, NULL, NULL),
(13, 'ayed akrout', NULL, 'ayed.akrout@gmail.com', NULL, 0, NULL, 'KxFZ7qrWJtCjZkeBGwXsrKAJcShWuKCTmvGuQFrUqndKfVZSd4Gh1j8NX3Tr', '2018-10-20 17:27:56', '2018-10-20 17:27:56', 'GOOGLE', '115210969639702315322', 'Instructor', NULL, NULL, NULL),
(14, 'Soua Bassem', NULL, 'souabassem@gmail.com', NULL, 0, NULL, 'VPSRM544WUBYytprcz72skGXIGxoCTDcuBiGQlo2VIwkxCyS8kJ4R8yAuHHg', '2018-10-21 18:23:51', '2018-10-21 18:23:51', 'GOOGLE', '111454427411975790644', 'Instructor', NULL, NULL, NULL),
(15, 'Abdelmonam Kouka', NULL, 'abdelmonam.kouka@gmail.com', NULL, 0, NULL, '5uHjVPVNLzA7LihBzWTN2wKZkiiQsiTFlbpuTS1tC9RlkuU58X6DvVOkeZYM', '2018-10-22 16:00:14', '2018-10-22 16:00:14', 'GOOGLE', '106274665365551676229', 'Instructor', NULL, NULL, NULL),
(16, 'Tac Tic', NULL, 'examtactic@gmail.com', NULL, 0, NULL, '7tN9Q9ozxWujagZ4367KjuGHVbaCok6A1K33gGu8IJGcJiD6EOCyYkD378pH', '2018-10-23 07:09:36', '2018-10-23 07:09:36', 'GOOGLE', '111847083258927751843', 'DAF', NULL, NULL, NULL),
(27, 'admin', 'admin', 'admin@stm.com', '$2y$10$knNvS1UNHAILzqEj3KtKDe9FA1XnW4wmBVrs9zvvHgEAjZpc6yGSm', 1, 'Tactic', NULL, '2018-11-21 09:27:17', '2018-11-21 09:27:17', NULL, NULL, 'DAF', NULL, NULL, NULL),
(29, 'saif', 'admin', 'saif@gmail.com', '$2y$10$n.WFoVIOo9yrJMPF7sdtOuh65x1OAPiO3zB87g370IxGK5lsj16ba', 0, 'Tactic', NULL, '2018-11-21 09:31:08', '2018-11-21 09:31:08', NULL, NULL, 'DAF', NULL, NULL, NULL),
(32, 'admin', 'admin', 'admin@stm.com', '$2y$10$I71JJN0K08HvA.tCRIzPH.abnA2pPKWJKyzYnpx1WExca1YyBsF.K', 1, 'Tactic', NULL, '2018-11-21 09:52:11', '2018-11-21 09:52:11', NULL, NULL, 'DAF', NULL, NULL, NULL),
(33, 'saif', 'admin', 'saifarmyrej@gmail.com', '$2y$10$2oYjwMu2UnRWgQatp1UPduH6lIEjmNM6u50U6sxwzPwu9pKAGQynW', 0, 'Tactic', NULL, '2018-11-21 09:52:11', '2018-11-21 09:52:11', NULL, NULL, 'Instructor', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `stm_events`
--
ALTER TABLE `stm_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Index pour la table `stm_instructors`
--
ALTER TABLE `stm_instructors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stm_migrations`
--
ALTER TABLE `stm_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stm_oms`
--
ALTER TABLE `stm_oms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oms_user_id_foreign` (`user_id`),
  ADD KEY `oms_event_id_foreign` (`events_id`);

--
-- Index pour la table `stm_pdcs`
--
ALTER TABLE `stm_pdcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdcs_user_id_foreign` (`user_id`),
  ADD KEY `pdcs_event_id_foreign` (`events_id`);

--
-- Index pour la table `stm_trips`
--
ALTER TABLE `stm_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_user_id_foreign` (`user_id`),
  ADD KEY `trips_event_id_foreign` (`events_id`);

--
-- Index pour la table `stm_users`
--
ALTER TABLE `stm_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stm_events`
--
ALTER TABLE `stm_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `stm_instructors`
--
ALTER TABLE `stm_instructors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `stm_migrations`
--
ALTER TABLE `stm_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `stm_oms`
--
ALTER TABLE `stm_oms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `stm_pdcs`
--
ALTER TABLE `stm_pdcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `stm_trips`
--
ALTER TABLE `stm_trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT pour la table `stm_users`
--
ALTER TABLE `stm_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `stm_pdcs`
--
ALTER TABLE `stm_pdcs`
  ADD CONSTRAINT `pdcs_event_id_foreign` FOREIGN KEY (`events_id`) REFERENCES `stm_events` (`id`),
  ADD CONSTRAINT `pdcs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `stm_users` (`id`);

--
-- Contraintes pour la table `stm_trips`
--
ALTER TABLE `stm_trips`
  ADD CONSTRAINT `trips_event_id_foreign` FOREIGN KEY (`events_id`) REFERENCES `stm_events` (`id`),
  ADD CONSTRAINT `trips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `stm_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
