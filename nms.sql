-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 06:59 PM
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
-- Database: `nms`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '2022-2023', '2022-01-10', '2022-01-10', '2023-12-27 14:41:01', '2023-12-27 14:41:01'),
(2, '2023-2024', '2023-01-10', '2023-01-10', '2023-12-28 14:03:23', '2023-12-28 14:03:23'),
(6, '2024-2025', '2024-08-01', '2025-07-31', '2024-08-02 15:48:51', '2024-08-02 15:48:51'),
(7, '2021-2022', '0000-00-00', '0000-00-00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_points` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `cost_per_hour` decimal(8,2) NOT NULL,
  `course_nature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ue_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `credit_points`, `description`, `duration`, `cost_per_hour`, `course_nature`, `level_id`, `semester_id`, `created_at`, `updated_at`, `ue_id`) VALUES
(11, 'Mathématiques générales I', 'CGE1111', 1, 'lkjkkkj', 45, '445.00', '', 11, 1, '2023-12-01 07:24:35', '2024-07-30 16:21:53', 1),
(12, 'Informatique générale I', 'CGE1112', 2, 'Nice course', 40, '400.00', 'Matiere Fondamental', 11, 1, '2023-12-01 07:25:31', '2023-12-01 07:25:31', 1),
(13, 'Mathématiques financières I', 'CGE1121', 2, 'Nice course', 20, '1222.00', 'Matiere Fondamental', 11, 1, '2023-12-01 07:26:32', '2023-12-01 07:26:32', 2),
(14, 'Statistiques I', 'CGE1122', 2, 'Nice course', 52, '1200.00', 'Matiere Fondamental', 11, 1, '2023-12-01 07:44:42', '2023-12-01 07:44:42', 2),
(15, 'Analyse Mathématiques I', 'IGL1111', 2, 'jkjk', 5, '45.00', '', 11, 1, '2023-12-01 07:47:42', '2024-07-30 15:54:38', 4),
(16, 'Algèbre Linéaire', 'IGL1112', 3, 'hjh', 45, '45.00', '', 11, 1, '2023-12-01 07:48:35', '2024-07-30 15:55:22', 4),
(20, 'English', 'SWE1171', 2, 'NICE COURS', 35, '500.00', 'Matiere Transversal', 11, 1, '2023-12-15 07:57:07', '2023-12-15 07:57:07', 7),
(21, 'General Accounting', 'SWE1172', 1, 'nice course', 45, '5000.00', 'Matiere Transversal', 11, 1, '2023-12-15 10:35:13', '2023-12-15 10:35:13', 7),
(22, 'Introduction to Custom Operations and Procedures', 'LTM2431', 3, '', 40, '1000.00', 'Matiere de Specialité', 12, 4, '2023-12-15 10:37:00', '2023-12-15 10:37:00', 8),
(23, 'Maritime Law II', 'LTM2432', 2, '', 70, '500.00', 'Matiere Transversal', 12, 4, '2023-12-15 10:37:39', '2023-12-15 10:37:39', 8),
(24, 'Analysis I', 'SWE1111', 3, 'NICE COURSE', 50, '1000.00', 'Matiere Transversal', 11, 1, '2023-12-15 10:46:05', '2023-12-15 10:46:05', 6),
(25, 'Linear algebra I', 'SWE1112', 2, 'NICE COURSE', 24, '1000.00', 'Matiere Transversal', 11, 1, '2023-12-15 10:47:29', '2023-12-15 10:47:29', 6),
(30, 'Analysis II', 'SWE1211', 2, '', 20, '1000.00', 'Matiere de Specialité', 11, 4, '2023-12-16 08:12:30', '2023-12-16 08:12:30', 12),
(31, 'Probability', 'SWE1212', 2, '', 20, '500.00', 'Matiere de Specialité', 11, 4, '2023-12-16 08:14:14', '2023-12-16 08:14:14', 12),
(32, 'Analysis III', 'SWE2312', 2, '', 50, '500.00', 'Matiere de Specialité', 12, 1, '2023-12-16 08:31:06', '2023-12-16 08:31:06', 13),
(33, 'Probability 3', 'SWE2313', 2, 'kjkj', 7, '5.00', '', 12, 1, '2023-12-16 08:38:49', '2024-04-08 07:55:09', 13),
(34, 'Statistique descriptive', 'IGL1211', 2, '', 50, '500.00', 'Matiere Fondamental', 11, 4, '2024-01-10 08:57:18', '2024-01-10 08:57:18', 32),
(35, 'Algèbre de BOOLE et des circuits', 'IGL1212', 2, '', 50, '500.00', 'Matiere Fondamental', 11, 4, '2024-01-10 08:59:17', '2024-01-10 08:59:17', 32),
(36, 'Environnement Micro-ordinateur', 'IGL1121', 2, '', 50, '400.00', 'Matiere Fondamental', 11, 1, '2024-01-10 09:01:44', '2024-01-10 09:01:44', 27),
(37, 'Outils bureautiques', 'IGL1122', 2, '', 50, '500.00', 'Matiere Fondamental', 11, 1, '2024-01-10 09:06:48', '2024-01-10 09:06:48', 27),
(38, 'Système d’Exploitation I', 'IGL1221', 2, '', 2, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 09:08:15', '2024-01-10 09:08:15', 33),
(39, 'Programmation web 1', 'IGL1222', 3, '', 3, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 09:09:40', '2024-01-10 09:09:40', 33),
(40, 'Architecture des ordinateurs', 'IGL1131', 3, 'jkjk', 45, '45.00', '', 11, 1, '2024-01-10 09:23:01', '2024-07-30 15:55:59', 28),
(42, 'Algorithmique de Base', 'IGL1141', 4, 'jkjk', 45, '45.00', '', 11, 1, '2024-01-10 09:26:27', '2024-07-30 15:58:48', 29),
(43, 'Introduction aux Bases de Données', 'IGL1241', 3, '', 2, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 09:27:37', '2024-01-10 09:27:37', 35),
(44, 'Système d’Information II (MERISE)', 'IGL1242', 2, '', 5, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-10 09:28:28', '2024-01-10 09:28:28', 35),
(45, 'Introduction au Système d’information', 'IGL1151', 3, 'jkjk', 8, '8.00', '', 11, 1, '2024-01-10 09:29:13', '2024-08-05 13:47:04', 30),
(46, 'Introduction au Génie Logiciel', 'IGL1152', 3, 'jkjk', 45, '45.00', '', 11, 1, '2024-01-10 09:30:45', '2024-07-30 15:59:48', 30),
(47, 'Programmation Evènementielle I', 'IGL1251', 3, '', 2, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 09:33:53', '2024-01-10 09:33:53', 36),
(48, 'Mini Projet Informatique', 'IGL1252', 2, '', 2, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 17:24:33', '2024-01-10 17:24:33', 36),
(49, 'Infographie', 'IGL1161', 2, 'jkj', 54, '445.00', '', 11, 1, '2024-01-10 17:25:50', '2024-07-30 15:49:50', 31),
(50, 'Installation et Maintenance Matériels et Logiciel', 'IGL1261', 2, '', 1, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 17:26:53', '2024-01-10 17:26:53', 37),
(51, 'Négociations Informatiques', 'IGL1262', 2, '', 6, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-10 17:27:53', '2024-01-10 17:27:53', 37),
(52, 'Techniques d’expression française', 'IGL1171', 1, '', 4, '5.00', 'Matiere Fondamental', 11, 1, '2024-01-10 17:29:27', '2024-01-10 17:29:27', 9),
(53, 'Techniques d’expression anglaise', 'IGL1172', 1, 'jkjkj', 5, '4545.00', '', 11, 1, '2024-01-10 17:30:26', '2024-07-30 15:54:01', 9),
(54, 'Economie et Gestion des entreprises', 'IGL1271', 1, '', 5, '4.00', 'Matiere Fondamental', 11, 4, '2024-01-10 17:31:57', '2024-01-10 17:31:57', 38),
(55, 'Analyse Mathématiques II', 'IGL2311', 3, '', 5, '5.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:38:04', '2024-01-10 17:38:04', 81),
(56, 'Analyse Numérique', 'IGL2312', 2, '', 4, '5.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:42:59', '2024-01-10 17:42:59', 81),
(57, 'Programmation pour terminaux mobiles', 'IGL2411', 5, '', 4, '4.00', 'Matiere Fondamental', 12, 4, '2024-01-10 17:43:59', '2024-01-10 17:43:59', 88),
(59, 'Recherche opérationnelle', 'IGL2322', 2, '', 2, '2.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:48:50', '2024-01-10 17:48:50', 82),
(60, 'Gestion des projets informatique', 'IGL2421', 4, '', 5, '5.00', 'Matiere Fondamental', 12, 4, '2024-01-10 17:49:29', '2024-01-10 17:49:29', 89),
(61, 'Introduction à la modélisation objet', 'IGL2331', 4, '', 4, '5.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:50:22', '2024-01-10 17:50:22', 83),
(62, 'Réseaux Informatiques et Téléinformatique II', 'IGL2431', 2, '', 2, '1.00', 'Matiere Fondamental', 12, 4, '2024-01-10 17:51:10', '2024-01-10 17:51:10', 90),
(63, 'Administration des systèmes et réseaux Linux', 'IGL2432', 2, '', 4, '1.00', 'Matiere Fondamental', 12, 4, '2024-01-10 17:52:07', '2024-01-10 17:52:07', 90),
(64, 'Base de données et SQL', 'IGL2341', 2, '', 1, '44.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:52:50', '2024-01-10 17:52:50', 84),
(65, 'Structure de données avancées', 'IGL2342', 3, '', 1, '1.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:53:32', '2024-01-10 17:53:32', 84),
(66, 'Programmation orientée objet', 'IGL2441', 2, '', 2, '2.00', 'Matiere Fondamental', 12, 4, '2024-01-10 17:54:34', '2024-01-10 17:54:34', 91),
(67, 'Administration des bases de données', 'IGL2442', 2, '', 5, '5.00', 'Matiere Fondamental', 12, 4, '2024-01-10 17:55:18', '2024-01-10 17:55:18', 91),
(68, 'Programmation web II', 'IGL2351', 3, '', 4, '4.00', 'Matiere Fondamental', 12, 1, '2024-01-10 17:56:08', '2024-01-10 17:56:08', 85),
(69, 'Programmation évènementielle et IHM II', 'IGL2352', 2, 'JKKLK', 45, '45.00', '', 12, 1, '2024-01-10 17:56:46', '2024-04-05 13:20:04', 85),
(70, 'Structure de données avancées II', 'IGL2451', 4, 'KJKJ', 44, '656.00', 'Matiere de Specialité', 12, 4, '2024-01-10 17:59:03', '2024-06-11 15:22:54', 92),
(71, 'Base de données et IHM', 'IGL2452', 3, 'JKJK', 5, '556.00', 'Matiere de Specialité', 12, 4, '2024-01-10 17:59:53', '2024-06-11 15:25:06', 92),
(72, 'Réseaux informatique et Téléinformatique I', 'IGL2361', 2, '', 5, '9.00', 'Matiere Fondamental', 12, 1, '2024-01-10 18:00:33', '2024-01-10 18:00:33', 86),
(73, 'Système d’Exploitation II', 'IGL2362', 2, '', 9, '5.00', 'Matiere Fondamental', 12, 1, '2024-01-10 18:01:40', '2024-01-10 18:01:40', 86),
(75, 'Comptablité Analytiques I', 'IGL2371', 1, 'KJJ', 86, '45.00', '', 12, 1, '2024-01-10 18:03:22', '2024-06-10 14:43:52', 87),
(81, 'Comptabilité générale', 'IGL1272', 1, '', 3, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-11 17:37:44', '2024-01-11 17:37:44', 38),
(82, 'Mathématiques générales I', 'GLT1111', 3, '', 3, '3.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:37:43', '2024-01-11 18:37:43', 95),
(83, 'Informatique générale I', 'GLT1112', 2, '', 3, '2.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:43:28', '2024-01-11 18:43:28', 95),
(84, 'Mathématiques générales II', 'GLT1211', 3, '', 3, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:45:06', '2024-01-11 18:45:06', 102),
(85, 'Informatique générale II', 'GLT1212', 2, '', 3, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:45:55', '2024-01-11 18:45:55', 102),
(86, 'Mathématiques financières I', 'GLT1121', 2, '', 5, '5.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:46:48', '2024-01-11 18:46:48', 96),
(87, 'Statistiques', 'GLT1122', 2, '', 3, '4.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:48:07', '2024-01-11 18:48:07', 96),
(88, 'Mathématiques financières II', 'GLT1221', 2, '', 32, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:48:52', '2024-01-11 18:48:52', 103),
(89, 'Statistiques II', 'GLT1222', 2, '', 3, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:49:37', '2024-01-11 18:49:37', 103),
(90, 'Comptabilité générale I', 'GLT1131', 2, '', 3, '3.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:50:21', '2024-01-11 18:50:21', 97),
(91, 'Géographie des flux et transport des voyageurs I', 'GLT1132', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:50:59', '2024-01-11 18:50:59', 97),
(92, 'Elément de Base de la Logistique I', 'GLT1133', 3, '', 32, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:51:58', '2024-01-11 18:51:58', 97),
(93, 'Comptabilité générale II', 'GLT1231', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:52:39', '2024-01-11 18:52:39', 104),
(94, 'Géographie des flux et transport des voyageurs II', 'GLT1232', 2, '', 34, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:53:29', '2024-01-11 18:53:29', 104),
(95, 'Elément de base de la logistique II', 'GLT1233', 3, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:54:39', '2024-01-11 18:54:39', 104),
(96, 'Marketing appliqué au transport I', 'GLT1141', 2, '', 3, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:55:20', '2024-01-11 18:55:20', 98),
(97, 'Négociation achat vente I', 'GLT1142', 3, '', 23, '5.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:56:34', '2024-01-11 18:56:34', 98),
(98, 'Marketing appliqué au transport II', 'GLT1241', 1, '', 34, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:57:17', '2024-01-11 18:57:17', 105),
(99, 'Méthodologie de rédaction du rapport de stage', 'GLT1242', 1, '', 23, '343.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:57:51', '2024-01-11 18:57:51', 105),
(100, 'Négociation achat vente II', 'GLT1243', 3, '', 23, '2.00', 'Matiere Fondamental', 11, 4, '2024-01-11 18:58:42', '2024-01-11 18:58:42', 105),
(101, 'Transport aérien I', 'GLT1151', 2, '', 23, '2323.00', 'Matiere Fondamental', 11, 1, '2024-01-11 18:59:50', '2024-01-11 18:59:50', 99),
(102, 'Transport maritime et fluvial I', 'GLT1152', 2, '', 23, '3.00', 'Matiere Fondamental', 11, 1, '2024-01-11 19:00:23', '2024-01-11 19:00:23', 99),
(103, 'Transport aérien II', 'GLT1251', 2, '', 34, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-11 19:01:38', '2024-01-11 19:01:38', 106),
(104, 'Transport maritime et fluvial II', 'GLT1252', 2, '', 34, '13.00', 'Matiere Fondamental', 11, 4, '2024-01-11 19:02:15', '2024-01-11 19:02:15', 106),
(105, 'Transport ferroviaire I', 'GLT1161', 1, '', 34, '5.00', 'Matiere Fondamental', 11, 1, '2024-01-11 19:03:06', '2024-01-11 19:03:06', 100),
(106, 'Transport routier I', 'GLT1162', 1, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-11 19:03:56', '2024-01-11 19:03:56', 100),
(107, 'Transport ferroviaire II', 'GLT1261', 1, '', 4, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-11 19:04:35', '2024-01-11 19:04:35', 107),
(108, 'Transport routier II', 'GLT1262', 1, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-11 19:05:12', '2024-01-11 19:05:12', 107),
(109, 'Techniques d’expression française', 'GLT1171', 1, '', 25, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-11 19:06:10', '2024-01-11 19:06:10', 101),
(110, 'Techniques d’expression anglaise', 'GLT1172', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-11 19:07:03', '2024-01-11 19:07:03', 101),
(111, 'Economie générale', 'GLT1271', 1, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-11 19:07:42', '2024-01-11 19:07:42', 108),
(112, 'Economie et organisation des entreprises', 'GLT1272', 2, '', 33, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-11 19:08:31', '2024-01-11 19:08:31', 108),
(113, 'Probabilités I', 'GLT2311', 2, 'JKL', 533, '535.00', '', 12, 1, '2024-01-11 19:11:11', '2024-03-26 14:15:32', 109),
(114, 'Informatique appliquée I', 'GLT2312', 1, 'KLK', 555, '335.00', '', 12, 1, '2024-01-11 19:12:07', '2024-03-26 14:16:15', 109),
(115, 'Probabilités II', 'GLT2411', 2, 'KLKLK', 45, '54.00', '', 12, 4, '2024-01-11 19:12:41', '2024-03-26 14:42:39', 116),
(116, 'Informatique appliquée II', 'GLT2412', 1, 'KLKL', 355, '365.00', '', 12, 4, '2024-01-11 19:13:42', '2024-03-26 14:37:57', 116),
(117, 'Système d’Information', 'GLT2321', 2, '', 23, '2.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:14:38', '2024-01-11 19:14:38', 110),
(118, 'Comptabilité analytique et gestion budgétaire I', 'GLT2322', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:15:46', '2024-01-11 19:15:46', 110),
(119, 'Système d’information II', 'GLT2421', 2, '', 23, '34.00', 'Matiere Fondamental', 12, 4, '2024-01-11 19:16:37', '2024-01-11 19:16:37', 117),
(120, 'Comptabilité analytique et gestion budgétaire II', 'GLT2422', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-11 19:18:14', '2024-01-11 19:18:14', 117),
(121, 'Système Logistique I', 'GLT2331', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:20:28', '2024-01-11 19:20:28', 111),
(122, 'Logistique Internationale I', 'GLT2332', 2, '', 33, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:21:24', '2024-01-11 19:21:24', 111),
(123, 'Système Logistique II', 'GLT2431', 3, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-11 19:22:02', '2024-01-11 19:22:02', 118),
(124, 'Logistique Internationale II', 'GLT2432', 2, 'GHHJ', 54, '65.00', 'Matiere de Specialité', 12, 4, '2024-01-11 19:22:58', '2024-06-11 15:06:39', 118),
(125, 'Production et productique I', 'GLT2341', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:25:27', '2024-01-11 19:25:27', 112),
(126, 'Initiation à l’optimisation I', 'GLT2342', 2, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:26:02', '2024-01-11 19:26:02', 112),
(127, 'Gestion des approvisionnements et des stocks I', 'GLT2351', 2, '', 23, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:26:44', '2024-01-11 19:26:44', 113),
(128, 'Gestion des entrepôts I', 'GLT2352', 1, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:28:07', '2024-01-11 19:28:07', 113),
(129, 'Gestion des approvisionnements et des stocks II', 'GLT2353', 1, '', 23, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:29:16', '2024-01-11 19:29:16', 113),
(130, 'Gestion des entrepôts II', 'GLT2354', 2, '', 2, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:30:30', '2024-01-11 19:30:30', 113),
(131, 'Travaux de synthèse II', 'GLT2451', 1, 'jyfhj', 56, '2465.00', '', 12, 4, '2024-01-11 19:31:12', '2024-04-08 08:43:14', 120),
(132, 'Conditionnement et manutention II', 'GLT2452', 2, 'JHJH', 54, '65.00', 'Matiere de Specialité', 12, 4, '2024-01-11 19:32:05', '2024-06-11 15:03:43', 120),
(133, 'Tableau de bord et mesure de performance logistique II', 'GLT2453', 2, '', 23, '233.00', 'Matiere Fondamental', 12, 4, '2024-01-11 19:33:00', '2024-01-11 19:33:00', 120),
(134, 'Travaux de synthèse I', 'GLT2361', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:34:31', '2024-01-11 19:34:31', 114),
(135, 'Conditionnement et manutention I', 'GLT2362', 1, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:35:11', '2024-01-11 19:35:11', 114),
(136, 'Tableau de bord et mesure de performance logistique I', 'GLT2363', 1, '', 23, '434.00', 'Matiere Fondamental', 12, 1, '2024-01-11 19:40:19', '2024-01-11 19:40:19', 114),
(138, 'Mathematiques Financier IV', 'GLT2371', 3, 'oijli', 256, '244.00', '', 12, 1, '2024-01-11 19:41:55', '2024-04-05 15:22:23', 115),
(141, 'Mathématiques générales I', 'AMA1111', 3, '', 3, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-12 07:57:10', '2024-01-12 07:57:10', 123),
(142, 'Informatique générale I', 'AMA1112', 2, '', 23, '4.00', 'Matiere Fondamental', 11, 1, '2024-01-12 07:58:12', '2024-01-12 07:58:12', 123),
(143, 'Mathématiques générales II', 'AMA1211', 2, '', 234, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 07:59:52', '2024-01-12 07:59:52', 130),
(144, 'Informatique générale II', 'AMA1212', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:00:32', '2024-01-12 08:00:32', 130),
(145, 'Mathématiques financières I', 'AMA1121', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:01:32', '2024-01-12 08:01:32', 124),
(146, 'Statistiques I', 'AMA1122', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:02:42', '2024-01-12 08:02:42', 124),
(147, 'Mathématiques Financières II', 'AMA1221', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:03:42', '2024-01-12 08:03:42', 131),
(148, 'Comptabilité generale', 'AMA1222', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:04:39', '2024-01-12 08:04:39', 131),
(149, 'Outils de techniques de communication I', 'AMA1131', 2, '', 23, '3.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:05:35', '2024-01-12 08:05:35', 125),
(150, 'Information I', 'AMA1132', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:06:08', '2024-01-12 08:06:08', 125),
(151, 'Outils de techniques de communication II', 'AMA1231', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:07:21', '2024-01-12 08:07:21', 132),
(152, 'Information II', 'AMA1232', 3, '', 34, '234.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:08:57', '2024-01-12 08:08:57', 132),
(155, 'Commerce II', 'AMA1241', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:12:11', '2024-01-12 08:12:11', 133),
(156, 'Méthodologie de rédaction du rapport de stage', 'AMA1242', 1, '', 3, '232.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:13:00', '2024-01-12 08:13:00', 133),
(157, 'Classement II', 'AMA1243', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:13:40', '2024-01-12 08:13:40', 133),
(158, 'Organisation et méthodes administratives I', 'AMA2331', 2, '', 4, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:14:40', '2024-01-12 08:14:40', 139),
(159, 'Classement et matériel de bureau I', 'AMA2332', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:15:50', '2024-01-12 08:15:50', 139),
(160, 'Organisation et méthodes administratives II', 'AMA2431', 3, 'JHJH', 54, '54.00', 'Matiere de Specialité', 12, 4, '2024-01-12 08:16:37', '2024-06-11 14:45:06', 146),
(161, 'Classement et matériel de bureau II', 'AMA2432', 3, 'JHJH', 54, '545.00', 'Matiere de Specialité', 12, 4, '2024-01-12 08:17:36', '2024-06-11 14:47:38', 146),
(162, 'Relations professionnelles internes I', 'AMA1151', 2, '', 2, '3.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:18:14', '2024-01-12 08:18:14', 127),
(163, 'Relations professionnelles externes I', 'AMA1152', 2, '', 23, '3.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:19:07', '2024-01-12 08:19:07', 127),
(164, 'Relations Professionnelles Internes II', 'AMA1251', 2, '', 234, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:19:58', '2024-01-12 08:19:58', 134),
(165, 'Relations professionnelles externes II', 'AMA1252', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:20:41', '2024-01-12 08:20:41', 134),
(166, 'Rédaction professionnelle I', 'AMA2341', 2, '', 23, '32.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:21:31', '2024-01-12 08:21:31', 140),
(167, 'Relations professionnelles internes et externes I', 'AMA2342', 2, '', 23, '232.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:22:26', '2024-01-12 08:22:26', 140),
(168, 'Rédaction professionnelle II', 'AMA2441', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 08:23:08', '2024-01-12 08:23:08', 147),
(169, 'Relations professionnelles internes et externes II', 'AMA2442', 2, '', 23, '324.00', 'Matiere Fondamental', 12, 4, '2024-01-12 08:24:17', '2024-01-12 08:24:17', 147),
(170, 'Organisation de l’action I', 'AMA1161', 2, '', 23, '34.00', '', 11, 1, '2024-01-12 08:25:02', '2024-01-12 08:25:02', 128),
(171, 'Travaux d’application et de synthèse I ', 'AMA1162', 3, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:26:56', '2024-01-12 08:26:56', 128),
(172, 'Organisation de l’action II', 'AMA1261', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:27:41', '2024-01-12 08:27:41', 135),
(173, 'Travaux d’application et de synthèse II', 'AMA1262', 2, '', 23, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:28:50', '2024-01-12 08:28:50', 135),
(174, 'Organisation de l’action III', 'AMA2351', 2, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:29:48', '2024-01-12 08:29:48', 141),
(175, 'Travaux d’application et de synthèse III', 'AMA2352', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:30:40', '2024-01-12 08:30:40', 141),
(176, 'Organisation de l’action IV', 'AMA2451', 2, 'KJHHJ', 54, '45.00', 'Matiere de Specialité', 12, 4, '2024-01-12 08:31:55', '2024-06-11 14:43:53', 148),
(177, 'Travaux d’application et de synthèse IV', 'AMA2452', 3, 'JHJ', 54, '54.00', 'Matiere de Specialité', 12, 4, '2024-01-12 08:33:59', '2024-06-11 14:46:18', 148),
(178, 'Techniques d’expression française', 'AMA1171', 1, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:34:40', '2024-01-12 08:34:40', 129),
(179, 'Techniques d’expression anglaise', 'AMA1172', 2, '', 334, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 08:35:48', '2024-01-12 08:35:48', 129),
(180, 'Economie générale', 'AMA1271', 1, '', 34, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:38:59', '2024-01-12 08:38:59', 136),
(181, 'Economie et organisation des entreprises', 'AMA1272', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 08:39:59', '2024-01-12 08:39:59', 136),
(182, 'Probabilités', 'AMA2311', 2, 'lklk', 656, '4545.00', '', 12, 1, '2024-01-12 08:41:33', '2024-03-26 13:12:07', 137),
(183, 'Informatique appliquée I', 'AMA2313', 1, 'klkjkjk', 455, '2323.00', '', 12, 1, '2024-01-12 08:42:13', '2024-03-26 13:10:17', 137),
(184, 'Probabilités II', 'AMA2411', 2, 'KKLKLK', 25, '555.00', '', 12, 4, '2024-01-12 08:43:26', '2024-03-26 13:23:33', 144),
(185, 'Informatique appliquée II', 'AMA2412', 1, 'KLKL', 5535, '5353.00', '', 12, 4, '2024-01-12 08:44:03', '2024-03-26 13:21:19', 144),
(186, 'Système d’information I', 'AMA2321', 2, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:44:50', '2024-01-12 08:44:50', 138),
(187, 'Comptabilité analytique et gestion budgétaire I', 'AMA2322', 2, '', 3, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:46:52', '2024-01-12 08:46:52', 138),
(188, 'Système d’information II', 'AMA2421', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 08:47:35', '2024-01-12 08:47:35', 145),
(189, 'Comptabilité analytique et gestion budgétaire II', 'AMA2422', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 08:48:32', '2024-01-12 08:48:32', 145),
(190, 'Introduction à la gestion des ressources humaines I', 'AMA2361', 2, '', 23, '1.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:49:24', '2024-01-12 08:49:24', 142),
(191, 'Organisation d’un Evènement I', 'AMA2362', 1, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:50:12', '2024-01-12 08:50:12', 142),
(192, 'Introduction à la gestion des ressources humaines II', 'AMA2363', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:51:34', '2024-01-12 08:51:34', 142),
(193, 'Organisation d’un évènement II', 'AMA2364', 1, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 08:52:40', '2024-01-12 08:52:40', 142),
(197, 'Mathématiques générales II', 'CGE1211', 1, 'klkl', 45, '45.00', '', 11, 4, '2024-01-12 13:36:07', '2024-07-30 16:06:02', 152),
(198, 'Informatique générale II', 'CGE1212', 1, 'jkjkj', 45, '45.00', '', 11, 4, '2024-01-12 13:36:59', '2024-07-30 16:07:20', 152),
(199, 'Mathématiques financières II', 'CGE1221', 2, '', 3, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 13:42:30', '2024-01-12 13:42:30', 153),
(200, 'Statistiques II', 'CGE1222', 2, '', 23, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-12 13:44:01', '2024-01-12 13:44:01', 153),
(201, 'Les opérations courantes', 'CGE1231', 3, 'jkjkjk', 45, '45.00', '', 11, 4, '2024-01-12 13:49:03', '2024-07-30 16:17:06', 22),
(202, 'Coûts complets I', 'CGE1141', 4, 'jkjkj', 45, '45.00', '', 11, 1, '2024-01-12 13:50:07', '2024-07-30 16:22:38', 16),
(203, 'Coûts complets II', 'CGE1142', 4, 'jkjkl', 45, '45.00', '', 11, 1, '2024-01-12 13:50:52', '2024-07-30 16:24:05', 16),
(204, 'Coûts partiels et SR I', 'CGE1241', 2, '', 34, '24.00', 'Matiere Fondamental', 11, 4, '2024-01-12 13:52:29', '2024-01-12 13:52:29', 154),
(205, 'Coûts partiels et SR II', 'CGE1242', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-12 13:55:35', '2024-01-12 13:55:35', 154),
(206, 'Introduction à la fiscalité', 'CGE1151', 4, 'jkjkjkjk', 45, '45.00', '', 11, 1, '2024-01-12 13:56:20', '2024-07-30 16:37:25', 17),
(207, 'TVA et IRPP', 'CGE1251', 3, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 13:58:54', '2024-01-12 13:58:54', 155),
(208, 'Introduction à l’analyse financière I', 'CGE1161', 3, 'jkjkjk', 45, '445.00', '', 11, 1, '2024-01-12 13:59:40', '2024-07-30 16:32:56', 18),
(209, 'Comptabilité assistée par l’ordinateur I', 'CGE1162', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 14:00:48', '2024-01-12 14:00:48', 18),
(210, 'Introduction à l’analyse financière II', 'CGE1261', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 14:04:34', '2024-01-12 14:04:34', 156),
(211, 'Comptabilité assistée par ordinateur II', 'CGE1262', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-12 14:05:12', '2024-01-12 14:05:12', 156),
(212, 'Techniques d’expression française', 'CGE1171', 1, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 14:06:42', '2024-01-12 14:06:42', 151),
(213, 'Techniques d’expression anglaise', 'CGE1172', 2, '', 1, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-12 14:07:16', '2024-01-12 14:07:16', 151),
(214, 'Economie générale', 'CGE1271', 1, '', 2, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-12 14:08:10', '2024-01-12 14:08:10', 157),
(215, 'Economie et organisation des entreprises', 'CGE1272', 2, '', 3, '33.00', 'Matiere Fondamental', 11, 4, '2024-01-12 14:08:54', '2024-01-12 14:08:54', 157),
(216, 'Recherche opérationnelle I', 'CGE2311', 3, '', 1, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:10:14', '2024-01-12 14:10:14', 158),
(217, 'Probabilités I', 'CGE2312', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:12:31', '2024-01-12 14:12:31', 158),
(218, 'Recherche opérationnelle II', 'CGE2411', 3, '', 12, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 14:13:37', '2024-01-12 14:13:37', 165),
(219, 'Probabilités II', 'CGE2412', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 14:16:38', '2024-01-12 14:16:38', 165),
(220, 'Mathématiques financières III', 'CGE2321', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:17:38', '2024-01-12 14:17:38', 159),
(221, 'Informatique appliquée I', 'CGE2322', 2, '', 3, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:21:41', '2024-01-12 14:21:41', 159),
(222, 'Mathématiques financières IV', 'CGE2421', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 14:23:08', '2024-01-12 14:23:08', 166),
(223, 'Informatique appliquée II', 'CGE2422', 2, '', 23, '23.00', '', 12, 4, '2024-01-12 14:23:57', '2024-01-12 14:23:57', 166),
(224, 'Constitution des sociétés I', 'CGE2331', 2, 'JKJH', 55, '45.00', 'Matiere de Specialité', 12, 1, '2024-01-12 14:24:48', '2024-06-11 14:21:22', 160),
(225, 'Constitution des sociétés II', 'CGE2431', 3, 'JHJH', 54, '45.00', 'Matiere de Specialité', 12, 4, '2024-01-12 14:25:38', '2024-06-11 14:27:58', 167),
(226, 'Analyse du compte de résultat I', 'CGE2341', 2, '', 12, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:26:50', '2024-01-12 14:26:50', 161),
(227, 'Analyse du bilan I', 'CGE2342', 1, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:27:51', '2024-01-12 14:27:51', 161),
(228, 'Analyse du compte de résultat II', 'CGE2441', 2, 'KLKL', 45, '45.00', '', 12, 4, '2024-01-12 14:30:27', '2024-04-05 12:32:32', 168),
(229, 'Gestion Budgetaire I', 'CGE2351', 3, 'kklkjl', 65, '565.00', '', 12, 1, '2024-01-12 14:32:24', '2024-04-04 09:46:49', 162),
(230, 'Gestion Budgetaire II', 'CGE2352', 3, 'kjkj', 24, '124.00', '', 12, 4, '2024-01-12 14:34:18', '2024-06-10 15:14:44', 162),
(231, 'CAO IV SAGE immobilisations', 'CGE2451', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-12 14:35:30', '2024-01-12 14:35:30', 169),
(232, 'Calcul du résultat fiscal et impôts', 'CGE2452', 3, 'KJKJ', 456, '65.00', 'Matiere de Specialité', 12, 4, '2024-01-12 14:36:23', '2024-06-11 13:12:02', 169),
(233, 'CAO III', 'CGE2361', 2, '', 23, '234.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:37:35', '2024-01-12 14:37:35', 163),
(234, 'Impôt sur les sociétés', 'CGE2362', 3, '', 23, '12.00', 'Matiere Fondamental', 12, 1, '2024-01-12 14:38:32', '2024-01-12 14:38:32', 163),
(235, 'Mathematiques Generales II', 'CGE2371', 1, 'jkklk', 45, '45.00', '', 12, 1, '2024-01-12 14:39:25', '2024-04-05 12:56:17', 164),
(239, 'Economie générale I', 'DOT1112', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-15 19:41:39', '2024-01-15 19:41:39', 53),
(240, 'Droit des sociétés', 'DOT1211', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-15 19:43:21', '2024-01-15 19:43:21', 59),
(241, 'Economie et organisation des entreprises I', 'DOT1212', 2, '', 23, '22.00', 'Matiere Fondamental', 11, 4, '2024-01-15 19:43:57', '2024-01-15 19:43:57', 59),
(242, 'Comptabilité générale I', 'DOT1121', 2, 'kLDKS', 45, '45.00', '', 11, 1, '2024-01-15 19:48:04', '2024-07-30 16:42:50', 54),
(243, 'Statistiques', 'DOT1122', 2, '', 34, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-15 19:51:15', '2024-01-15 19:51:15', 54),
(244, 'Comptabilité générale II', 'DOT1221', 4, 'JKJ', 545, '256.00', '', 11, 4, '2024-01-15 19:52:00', '2024-04-03 12:24:16', 60),
(245, 'Introduction au droit douanier', 'DOT1131', 3, 'jklkl', 45, '45.00', '', 11, 1, '2024-01-15 19:53:04', '2024-07-30 16:46:51', 55),
(246, 'Procédure de dédouanement', 'DOT1231', 3, '', 32, '2.00', 'Matiere Fondamental', 11, 4, '2024-01-15 19:54:39', '2024-01-15 19:54:39', 61),
(247, 'Les régimes douaniers', 'DOT1141', 4, '', 24, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-15 19:55:32', '2024-01-15 19:55:32', 56),
(248, 'Fiscalité douanière', 'DOT1241', 2, '', 23, '4.00', 'Matiere Fondamental', 11, 4, '2024-01-15 19:56:23', '2024-01-15 19:56:23', 62),
(250, 'Assurance transport', 'DOT1251', 4, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-15 20:16:40', '2024-01-15 20:16:40', 63),
(251, 'Droit des transports', 'DOT1251', 4, '', 34, '3445.00', 'Matiere Fondamental', 11, 4, '2024-01-15 20:17:32', '2024-01-15 20:17:32', 63),
(252, 'Technologie et classement tarifaire I', 'DOT1161', 3, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-15 20:18:49', '2024-01-15 20:18:49', 58),
(254, 'Valeur en douane I', 'DOT1162', 3, '', 34, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-15 20:29:55', '2024-01-15 20:29:55', 58),
(256, 'Techniques d’expression française', 'DOT1171', 1, '', 54, '55.00', 'Matiere Fondamental', 11, 1, '2024-01-15 20:31:54', '2024-01-15 20:31:54', 172),
(257, 'Techniques d’expression anglaise', 'DOT1172', 2, '', 45, '56.00', 'Matiere Fondamental', 11, 1, '2024-01-15 20:32:56', '2024-01-15 20:32:56', 172),
(258, 'Informatique Générale I', 'DOT1271', 1, '', 45, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-15 20:33:47', '2024-01-15 20:33:47', 65),
(259, 'Informatique générale II', 'DOT1272', 2, '', 45, '566.00', 'Matiere Fondamental', 11, 4, '2024-01-15 20:35:59', '2024-01-15 20:35:59', 65),
(260, 'Droit commercial', 'DOT2311', 2, '', 12, '123.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:36:59', '2024-01-15 20:36:59', 173),
(261, 'Droit du travail', 'DOT2312', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:37:43', '2024-01-15 20:37:43', 173),
(262, 'Economie et organisation des entreprises II', 'DOT2411', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:38:24', '2024-01-15 20:38:24', 180),
(263, 'Economie générale II', 'DOT2412', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:39:37', '2024-01-15 20:39:37', 180),
(264, 'Comptabilité analytique', 'DOT2321', 3, '', 32, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:41:21', '2024-01-15 20:41:21', 174),
(265, 'Statistiques et probabilité', 'DOT2322', 2, '', 23, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:42:05', '2024-01-15 20:42:05', 174),
(266, 'Mathématiques financières', 'DOT2421', 4, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:43:06', '2024-01-15 20:43:06', 181),
(267, 'Eléments du commerce international', 'DOT2422', 4, '', 34, '322.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:44:13', '2024-01-15 20:44:13', 181),
(268, 'Gestion des litiges douaniers', 'DOT2331', 4, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:45:06', '2024-01-15 20:45:06', 175),
(269, 'Pratique douanière', 'DOT2431', 4, '', 23, '32.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:46:04', '2024-01-15 20:46:04', 182),
(270, 'Origine des marchandises', 'DOT2341', 3, '', 2, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:49:05', '2024-01-15 20:49:05', 176),
(271, 'Technologie et classement tarifaire II', 'DOT2342', 3, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:49:42', '2024-01-15 20:49:42', 176),
(272, 'Valeur en douane II', 'DOT2441', 4, '', 23, '32.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:50:21', '2024-01-15 20:50:21', 183),
(273, 'Cas pratique', 'DOT2351', 4, '', 23, '2.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:51:07', '2024-01-15 20:51:07', 177),
(274, 'Pratique de transit', 'DOT2451', 4, '', 323, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:51:52', '2024-01-15 20:51:52', 184),
(275, 'Système informatique de la douane', 'DOT2361', 2, '', 3, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:52:34', '2024-01-15 20:52:34', 178),
(276, 'Stage professionnel', 'DOT2461', 6, '', 32, '32.00', 'Matiere Fondamental', 12, 4, '2024-01-15 20:53:37', '2024-01-15 20:53:37', 185),
(277, 'Education citoyenne et déontologie professionnelle', 'DOT2371', 3, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-15 20:54:38', '2024-01-15 20:54:38', 179),
(278, 'Mathématiques générales I', 'BQF1111', 3, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:37:46', '2024-01-16 10:37:46', 186),
(279, 'Informatique générale I', 'BQF1112', 1, 'jkkj', 45, '45.00', '', 11, 1, '2024-01-16 10:38:54', '2024-07-30 16:00:56', 186),
(280, 'Mathématiques générales II', 'BQF1211', 2, 'klnik', 34, '356.00', '', 11, 4, '2024-01-16 10:40:47', '2024-04-05 15:44:40', 193),
(281, 'Informatique générale II', 'BQF1212', 1, 'jkjk', 45, '45.00', '', 11, 4, '2024-01-16 10:41:56', '2024-07-30 16:02:57', 193),
(282, 'Mathématiques financières I', 'BQF1121', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:43:03', '2024-01-16 10:43:03', 187),
(283, 'Statistiques I', 'BQF1122', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:43:48', '2024-01-16 10:43:48', 187),
(284, 'Mathématiques financières II', 'BQF1221', 2, '', 34, '323.00', 'Matiere Fondamental', 11, 4, '2024-01-16 10:45:26', '2024-01-16 10:45:26', 194),
(285, 'Statistiques II', 'BQF1222', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 10:46:15', '2024-01-16 10:46:15', 194),
(286, 'Comptabilité générale I', 'BQF1131', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:47:02', '2024-01-16 10:47:02', 188),
(287, 'Ethique et déontologie bancaires', 'BQF1132', 1, '', 34, '32.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:47:50', '2024-01-16 10:47:50', 188),
(288, 'Règlementation bancaire', 'BQF1133', 2, '', 334, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:49:34', '2024-01-16 10:49:34', 188),
(289, 'Comptabilité générale II', 'BQF1231', 2, 'jkjl', 54, '5242.00', '', 11, 4, '2024-01-16 10:50:36', '2024-04-05 15:45:24', 195),
(290, 'Méthodologie de rédaction de rapport de stage', 'BQF1232', 1, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 10:51:36', '2024-01-16 10:51:36', 195),
(292, 'Techniques bancaires et marché des particuliers', 'BQF1141', 2, '', 332, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:55:41', '2024-01-16 10:55:41', 189),
(293, 'Opérations bancaires transfrontières I', 'BQF1142', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:56:35', '2024-01-16 10:56:35', 189),
(294, 'Stratégie et marketing bancaires', 'BQF1143', 1, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 10:58:18', '2024-01-16 10:58:18', 189),
(295, 'Techniques bancaires marché des entreprises I', 'BQF1241', 2, '', 23, '12.00', 'Matiere Fondamental', 11, 4, '2024-01-16 10:59:19', '2024-01-16 10:59:19', 196),
(296, 'Opérations bancaires transfrontières II', 'BQF1242', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:00:01', '2024-01-16 11:00:01', 196),
(297, 'Systèmes financiers décentralisés I', 'BQF1151', 1, '', 12, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:00:57', '2024-01-16 11:00:57', 190),
(298, 'Finance islamique I', 'BQF1152', 1, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:01:38', '2024-01-16 11:01:38', 190),
(299, 'Marchés des capitaux I', 'BQF1153', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:02:12', '2024-01-16 11:02:12', 190),
(300, 'Systèmes financiers décentralisés II', 'BQF1251', 1, 'jkjk', 45, '45.00', '', 11, 4, '2024-01-16 11:03:10', '2024-07-30 16:02:11', 197),
(301, 'Finance islamique II', 'BQF1252', 1, '', 23, '13.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:04:06', '2024-01-16 11:04:06', 197),
(302, 'Marchés des capitaux II', 'BQF1253', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:05:16', '2024-01-16 11:05:16', 197),
(303, 'Economie Monétaire I', 'BQF1161', 2, '', 12, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:10:53', '2024-01-16 11:10:53', 191),
(304, 'Economie bancaire I', 'BQF1162', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:11:28', '2024-01-16 11:11:28', 191),
(305, 'Economie Monétaire II', 'BQF1261', 2, '', 23, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:12:09', '2024-01-16 11:12:09', 198),
(306, 'Economie bancaire II', 'BQF1262', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:12:42', '2024-01-16 11:12:42', 198),
(307, 'Techniques d’expression française', 'BQF1171', 1, '', 12, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:13:33', '2024-01-16 11:13:33', 192),
(308, 'Techniques d’expression anglaise', 'BQF1172', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 11:14:11', '2024-01-16 11:14:11', 192),
(309, 'Economie générale', 'BQF1271', 1, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:14:54', '2024-01-16 11:14:54', 199),
(310, 'Economie et organisation des entreprises', 'BQF1272', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-16 11:15:28', '2024-01-16 11:15:28', 199),
(311, 'Recherche opérationnelle I', 'BQF2311', 3, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:16:22', '2024-01-16 11:16:22', 200),
(312, 'Probabilités I', 'BQF2312', 2, '', 23, '34.00', '', 12, 1, '2024-01-16 11:17:02', '2024-01-16 11:17:02', 200),
(313, 'Recherche opérationnelle II', 'BQF2411', 3, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:18:11', '2024-01-16 11:18:11', 207),
(314, 'Probabilités II', 'BQF2412', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:18:43', '2024-01-16 11:18:43', 207),
(315, 'Mathématiques financières III', 'BQF2321', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:19:17', '2024-01-16 11:19:17', 201),
(316, 'Informatique appliquée I', 'BQF2322', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:19:48', '2024-01-16 11:19:48', 201),
(317, 'Mathématiques financières IV', 'BQF2421', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:20:53', '2024-01-16 11:20:53', 208),
(318, 'Informatique appliquée II', 'BQF2422', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:21:48', '2024-01-16 11:21:48', 208),
(319, 'Comptabilité des opérations de banque I', 'BQF2331', 2, '', 23, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:22:27', '2024-01-16 11:22:27', 202),
(320, 'Analyse financière I', 'BQF2332', 2, '', 34, '233.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:23:00', '2024-01-16 11:23:00', 202),
(321, 'Comptabilité des opérations de banque II', 'BQF2431', 3, '', 23, '34.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:23:46', '2024-01-16 11:23:46', 209),
(322, 'Analyse financière II', 'BQF2432', 1, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:24:22', '2024-01-16 11:24:22', 209),
(323, 'Techniques bancaires marché des entreprises II', 'BQF2341', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:25:08', '2024-01-16 11:25:08', 203),
(324, 'Opérations bancaires transfrontières III', 'BQF2342', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:25:43', '2024-01-16 11:25:43', 203),
(325, 'Techniques bancaires marché des entreprises III', 'BQF2441', 2, '', 2, '3.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:26:18', '2024-01-16 11:26:18', 210),
(326, 'Opérations bancaires transfrontières IV', 'BQF2442', 2, '', 23, '34.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:27:59', '2024-01-16 11:27:59', 210),
(327, 'Systèmes financiers décentralisés III', 'BQF2351', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:28:33', '2024-01-16 11:28:33', 204),
(328, 'Travaux de synthèse I', 'BQF2352', 2, '', 3, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:29:15', '2024-01-16 11:29:15', 204),
(329, 'Marchés des capitaux III', 'BQF2353', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:29:46', '2024-01-16 11:29:46', 204),
(330, 'Systèmes financiers décentralisés IV', 'BQF2451', 2, '', 3, '33.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:30:27', '2024-01-16 11:30:27', 211),
(331, 'Travaux de synthèse II', 'BQF2452', 2, '', 34, '23.00', '', 12, 4, '2024-01-16 11:31:13', '2024-01-16 11:31:13', 211),
(332, 'Marchés des capitaux IV', 'BQF2453', 2, '', 4, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-16 11:31:48', '2024-01-16 11:31:48', 211),
(333, 'Economie Monétaire III', 'BQF2361', 1, '', 3, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:33:05', '2024-01-16 11:33:05', 205),
(334, 'Economie bancaire III', 'BQF2362', 1, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:33:38', '2024-01-16 11:33:38', 205),
(335, 'Economie Monétaire IV', 'BQF2363', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:34:14', '2024-01-16 11:34:14', 205),
(336, 'Economie bancaire IV', 'BQF2364', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:34:45', '2024-01-16 11:34:45', 205),
(338, 'Education citoyenne et déontologie professionnelle', 'BQF2371', 3, '', 45, '12.00', 'Matiere Fondamental', 12, 1, '2024-01-16 11:37:32', '2024-01-16 11:37:32', 206),
(340, 'Digital literacy', 'SWE1121', 4, 'jhjh', 4, '4545.00', 'Matiere Fondamental', 11, 1, '2024-01-16 15:16:16', '2024-06-19 07:35:16', 67),
(341, 'Digital electronics', 'SWE1131', 3, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-16 15:17:35', '2024-01-16 15:17:35', 68),
(342, 'Fundamentals of algorithms', 'SWE1141', 5, 'kkjkj', 54, '6654.00', 'Matiere de Specialité', 11, 1, '2024-01-16 15:21:42', '2024-06-19 07:34:08', 69),
(343, 'Introduction to information systems', 'SWE1151', 5, '', 12, '12.00', 'Matiere Fondamental', 11, 1, '2024-01-16 15:22:37', '2024-01-16 15:22:37', 214),
(344, 'Introduction to software engineering', 'SWE1152', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-16 15:23:31', '2024-01-16 15:23:31', 214),
(345, 'Computer graphics', 'SWE1161', 3, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-16 15:25:20', '2024-01-16 15:25:20', 70),
(346, 'Operating system I', 'SWE1221', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-16 15:38:06', '2024-01-16 15:38:06', 74),
(347, 'Web programming I', 'SWE1222', 2, 'mjk', 45, '45.00', '', 11, 4, '2024-01-16 15:39:11', '2024-07-30 15:13:31', 74),
(348, 'Computer architecture', 'SWE1231', 3, 'ghgh', 78, '78.00', '', 11, 4, '2024-01-16 15:40:07', '2024-07-30 15:16:22', 72),
(349, 'Introduction to database', 'SWE1241', 2, 'klkl', 45, '78.00', '', 11, 4, '2024-01-16 15:44:17', '2024-07-30 15:21:45', 75),
(350, 'Information system II(MERISE)', 'SWE1242', 2, 'hhjhjhj', 67, '78.00', '', 11, 4, '2024-01-16 15:44:59', '2024-07-30 15:30:44', 75),
(351, 'Structured programming', 'SWE1251', 2, '', 23, '32.00', 'Matiere Fondamental', 11, 4, '2024-01-16 15:46:10', '2024-01-16 15:46:10', 76),
(352, 'Factual programming', 'SWE1252', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 15:46:47', '2024-01-16 15:46:47', 76),
(353, 'Installation and maintenance of hardware and software', 'SWE1261', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 15:50:35', '2024-01-16 15:50:35', 77),
(354, 'Legal regulations', 'SWE1262', 1, 'klkjl', 45, '45.00', '', 11, 4, '2024-01-16 15:51:19', '2024-07-30 15:48:30', 77),
(355, 'Economics and Enterprise Organization(EEO)', 'SWE1271', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-16 15:52:25', '2024-01-16 15:52:25', 78),
(356, 'French', 'SWE1272', 1, '', 34, '234.00', 'Matiere Fondamental', 11, 4, '2024-01-16 15:53:43', '2024-01-16 15:53:43', 78),
(357, 'Statistics', 'SWE2311', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 15:54:27', '2024-01-16 15:54:27', 13),
(358, 'Operating system II', 'SWE2321', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 15:57:42', '2024-01-16 15:57:42', 215),
(359, 'Web programming II', 'SWE2322', 2, '', 34, '2343.00', 'Matiere Fondamental', 12, 1, '2024-01-16 15:58:31', '2024-01-16 15:58:31', 215),
(360, 'Introduction to object modeling', 'SWE2331', 4, '', 34, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 15:59:05', '2024-01-16 15:59:05', 216),
(361, 'Database and SQL', 'SWE2341', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 16:00:26', '2024-01-16 16:00:26', 217),
(363, 'Advanced data structure I', 'SWE2342', 5, 'hjyi', 56, '54.00', '', 12, 1, '2024-01-16 16:04:30', '2024-04-08 07:55:56', 217),
(364, 'Factual programming and Human Computer Interface', 'SWE2351', 3, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-16 16:05:52', '2024-01-16 16:05:52', 218),
(367, 'Programming of mobile terminals', 'SWE2411', 3, 'jhthjhgh', 542, '22.00', '', 12, 4, '2024-01-17 07:34:19', '2024-04-08 08:30:41', 221),
(368, 'Application security', 'SWE2412', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:35:06', '2024-01-17 07:35:06', 221),
(369, 'Management of computer projects', 'SWE2421', 4, '', 13, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:36:01', '2024-01-17 07:36:01', 222),
(370, 'Computer networks II', 'SWE2431', 3, '', 32, '2334.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:37:08', '2024-01-17 07:37:08', 223),
(372, 'Linux network administration', 'SWE2433', 1, '', 23, '34.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:40:18', '2024-01-17 07:40:18', 223),
(373, 'Object oriented programming', 'SWE2441', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:40:59', '2024-01-17 07:40:59', 224),
(374, 'Database administration', 'SWE2442', 2, '', 23, '2334.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:41:39', '2024-01-17 07:41:39', 224),
(375, 'Advanced data structure II', 'SWE2451', 5, 'dfgsf', 4, '5.00', 'Matiere de Specialité', 12, 4, '2024-01-17 07:42:39', '2024-06-12 08:42:22', 225),
(376, 'Database and human Computer Interface(HCI)', 'SWE2452', 2, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 07:43:53', '2024-01-17 07:43:53', 225),
(380, 'Principles of Management', 'LTM1111', 1, '', 23, '43.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:41:10', '2024-01-17 08:41:10', 228),
(381, 'Principles of business Law I', 'LTM1112', 1, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:41:59', '2024-01-17 08:41:59', 228),
(382, 'General Mathematics', 'LTM1121', 4, '', 45, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:50:04', '2024-01-17 08:50:04', 229),
(383, 'Quantitative technics', 'LTM1122', 3, '', 234, '233.00', '', 11, 1, '2024-01-17 08:51:06', '2024-01-17 08:51:06', 229),
(384, 'Introduction to Logistics Management', 'LTM1131', 3, '', 234, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:52:26', '2024-01-17 08:52:26', 230),
(385, 'ICT for Logistics', 'LTM1132', 1, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:53:20', '2024-01-17 08:53:20', 230),
(386, 'Ship representation', 'LTM1141', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:53:52', '2024-01-17 08:53:52', 231),
(387, 'Freight Forwarding (cargo representation)', 'LTM1142', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:54:26', '2024-01-17 08:54:26', 231),
(388, 'Cargo Handling', 'LTM1143', 2, '', 12, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:55:05', '2024-01-17 08:55:05', 231),
(389, 'Shipping and International Trade', 'LTM1151', 2, '', 34, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:56:01', '2024-01-17 08:56:01', 232),
(390, 'Maritime Transport', 'LTM1152', 2, '', 23, '234.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:56:33', '2024-01-17 08:56:33', 232);
INSERT INTO `courses` (`id`, `name`, `code`, `credit_points`, `description`, `duration`, `cost_per_hour`, `course_nature`, `level_id`, `semester_id`, `created_at`, `updated_at`, `ue_id`) VALUES
(391, 'Transport Law', 'LTM1161', 2, '', 1, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:57:24', '2024-01-17 08:57:24', 233),
(392, 'Carriage Law', 'LTM1162', 2, '', 23, '23.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:58:45', '2024-01-17 08:58:45', 233),
(393, 'French expression', 'LTM1171', 1, '', 23, '34.00', 'Matiere Fondamental', 11, 1, '2024-01-17 08:59:32', '2024-01-17 08:59:32', 234),
(394, 'General Economics', 'LTM1172', 2, '', 23, '456.00', 'Matiere Fondamental', 11, 1, '2024-01-17 09:00:48', '2024-01-17 09:00:48', 234),
(395, 'Government Politics', 'LTM1211', 4, '', 34, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:02:17', '2024-01-17 09:02:17', 235),
(396, 'Methodology for drafting the report of internship', 'LTM1221', 5, '', 23, '345.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:02:55', '2024-01-17 09:02:55', 236),
(397, 'International Transport Management', 'LTM1231', 2, '', 12, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:04:09', '2024-01-17 09:04:09', 237),
(398, 'Safe Transport of Dangerous Goods', 'LTM1232', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:04:40', '2024-01-17 09:04:40', 237),
(399, 'Warehouse Management', 'LTM1241', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:05:23', '2024-01-17 09:05:23', 238),
(400, 'Procurement and Inventory Management', 'LTM1242', 34, '', 14, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:06:17', '2024-01-17 09:06:17', 238),
(401, 'Total Quality Management', 'LTM1251', 2, '', 45, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:07:00', '2024-01-17 09:07:00', 239),
(402, 'Maritime Administration I', 'LTM1252', 1, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:09:15', '2024-01-17 09:09:15', 239),
(403, 'Maritime Administration II', 'LTM1253', 2, '', 12, '23.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:10:27', '2024-01-17 09:10:27', 239),
(404, 'Marine Insurance', 'LTM1261', 3, '', 34, '5.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:12:38', '2024-01-17 09:12:38', 240),
(405, 'Fundamentals of Cargo Insurance', 'LTM1262', 1, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:13:39', '2024-01-17 09:13:39', 240),
(406, 'English Expression', 'LTM1271', 1, '', 23, '3.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:14:19', '2024-01-17 09:14:19', 241),
(407, 'Economy and organization of enterprises', 'LTM1272', 2, '', 23, '34.00', 'Matiere Fondamental', 11, 4, '2024-01-17 09:15:14', '2024-01-17 09:15:14', 241),
(408, 'Project Management', 'LTM2311', 5, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:16:05', '2024-01-17 09:16:05', 242),
(409, 'Computer for Business I', 'LTM2321', 4, '', 23, '45.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:17:25', '2024-01-17 09:17:25', 243),
(410, 'Land and Inland Waterway Transport', 'LTM2331', 3, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:18:49', '2024-01-17 09:18:49', 244),
(411, 'Air Transport', 'LTM2332', 3, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:19:32', '2024-01-17 09:19:32', 244),
(412, 'Carriage of goods by sea', 'LTM2341', 2, '', 3, '3.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:20:35', '2024-01-17 09:20:35', 245),
(413, 'Port Management operation', 'LTM2342', 2, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:21:09', '2024-01-17 09:21:09', 245),
(414, 'Environmental Management', 'LTM2351', 3, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:21:56', '2024-01-17 09:21:56', 246),
(415, 'Ship Finance', 'LTM2361', 3, '', 23, '45.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:23:10', '2024-01-17 09:23:10', 247),
(416, 'Ship chartering', 'LTM2362', 2, '', 233, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:24:18', '2024-01-17 09:24:18', 247),
(417, 'Civics and Ethics', 'LTM2371', 1, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:24:59', '2024-01-17 09:24:59', 248),
(418, 'Law on Commercial Companies I', 'LTM2372', 1, '', 23, '34.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:26:31', '2024-01-17 09:26:31', 248),
(419, 'Common law', 'LTM2373', 1, '', 23, '23.00', 'Matiere Fondamental', 12, 1, '2024-01-17 09:27:04', '2024-01-17 09:27:04', 248),
(421, 'Computer for Business II', 'LTM2411', 4, '', 32, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 09:29:28', '2024-01-17 09:29:28', 249),
(423, 'Introduction to Oil and Gas', 'LTM2451', 3, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 09:34:19', '2024-01-17 09:34:19', 252),
(424, 'Safety and Security in Shipping', 'LTM2452', 3, 'JKJ', 45, '45.00', 'Matiere de Specialité', 12, 4, '2024-01-17 09:34:58', '2024-06-10 14:21:32', 252),
(425, 'International Commercial Law', 'LTM2421', 3, '', 34, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-17 09:36:05', '2024-01-17 09:36:05', 250),
(426, 'Strategic management', 'LTM2422', 2, '', 56, '45.00', 'Matiere Fondamental', 12, 4, '2024-01-17 09:36:39', '2024-01-17 09:36:39', 250),
(428, 'Business Communication', 'LTM2471', 3, 'kkjkj', 54, '65.00', 'Matiere de Specialité', 12, 4, '2024-01-17 09:37:57', '2024-06-12 08:20:07', 254),
(429, 'Computer networks I', 'SWE2361', 6, 'kjlkl', 44, '55.00', '', 12, 1, '2024-01-17 10:26:51', '2024-04-08 07:44:14', 219),
(430, 'Production et Productique II', 'GLT2441', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-18 13:15:41', '2024-01-18 13:15:41', 119),
(431, 'Initiation à l’Optimisation II', 'GLT2442', 2, '', 23, '23.00', 'Matiere Fondamental', 12, 4, '2024-01-18 13:16:22', '2024-01-18 13:16:22', 119),
(436, 'Recherche opérationnelle I', 'AMA2313', 2, 'KLKL', 545, '5353.00', 'Matiere Fondamental', 12, 1, '2024-03-26 13:15:30', '2024-03-26 13:15:30', 137),
(437, 'Recherche opérationnelle II', 'AMA2413', 2, 'KLKJ', 5353, '556.00', 'Matiere Fondamental', 12, 4, '2024-03-26 13:25:56', '2024-03-26 13:25:56', 144),
(438, 'Recherche opérationnelle I', 'GLT2313', 2, 'KLKL', 565, '32.00', 'Matiere Fondamental', 12, 1, '2024-03-26 14:18:58', '2024-03-26 14:18:58', 109),
(439, 'Recherche opérationnelle II', 'GLT2413', 2, 'JKJ', 255, '235.00', 'Matiere Fondamental', 12, 4, '2024-03-26 14:41:25', '2024-03-26 14:41:25', 116),
(440, 'Mathematiques Generales I', 'DOT1163', 1, 'jkjkj', 454, '545.00', 'Matiere Fondamental', 11, 1, '2024-04-03 12:12:31', '2024-04-03 12:12:31', 58),
(441, 'Droit Civil', 'DOT1164', 1, 'JKLK', 55, '574.00', 'Matiere Fondamental', 11, 1, '2024-04-03 12:17:04', '2024-04-03 12:17:04', 58),
(442, 'Mathematiques Generales II', 'DOT1222', 1, 'klk', 454, '268.00', 'Matiere Fondamental', 11, 4, '2024-04-03 12:26:15', '2024-04-03 12:26:15', 60),
(443, 'Droit du travail', 'DOT1232', 1, 'lkl', 55, '545.00', 'Matiere Fondamental', 11, 4, '2024-04-03 12:29:03', '2024-04-03 12:29:03', 61),
(444, 'Mathematiques Financier II', 'AMA2371', 2, 'JGHGH', 545, '54.00', '', 12, 1, '2024-04-05 09:08:38', '2024-04-05 11:05:32', 143),
(445, 'Mathematiques Generales II', 'AMA2372', 1, 'LKL', 45, '45.00', '', 12, 1, '2024-04-05 09:11:11', '2024-04-05 11:07:11', 143),
(446, 'Analyse du Bilan II', 'CGE2442', 2, 'KJH', 54, '54.00', 'Matiere de Specialité', 12, 4, '2024-04-05 12:35:48', '2024-06-11 14:29:24', 168),
(447, 'Travaux de synthése I', 'CGE2372', 2, 'KLKL', 65, '45.00', 'Matiere Transversal', 12, 1, '2024-04-05 12:57:59', '2024-04-05 12:57:59', 164),
(448, 'Droit Civil', 'CGE1181', 2, 'JJKKLK', 25, '25.00', 'Matiere Transversal', 11, 1, '2024-04-05 13:10:07', '2024-04-05 13:10:07', 274),
(449, 'Droit du travail', 'CGE1182', 1, 'JLK', 23, '45.00', 'Matiere Transversal', 11, 1, '2024-04-05 13:11:10', '2024-04-05 13:11:10', 274),
(452, 'Mathematiques Financier I', 'IGL1154', 1, 'jkjk', 45, '45.00', '', 11, 1, '2024-04-05 13:56:22', '2024-07-30 15:57:11', 30),
(454, 'Droit du travail', 'IGL1142', 1, 'kkhi', 88, '365.00', 'Matiere Transversal', 11, 1, '2024-04-05 14:03:33', '2024-04-05 14:03:33', 29),
(455, 'Droit Civil', 'IGL1143', 1, 'uhhuhui', 77, '56.00', 'Matiere Transversal', 11, 1, '2024-04-05 14:04:15', '2024-04-05 14:04:15', 29),
(456, 'Economie Génerale', 'IGL1144', 1, 'gujku', 18, '35.00', 'Matiere Transversal', 11, 1, '2024-04-05 14:05:19', '2024-04-05 14:05:19', 29),
(457, 'Droit du travail', 'BQF1213', 1, 'klkl', 242, '21.00', 'Matiere Transversal', 11, 4, '2024-04-05 15:48:55', '2024-04-05 15:48:55', 193),
(458, 'Droit Civil', 'BQF1234', 1, 'adfk', 58, '54.00', 'Matiere Transversal', 11, 4, '2024-04-05 15:50:37', '2024-04-05 15:50:37', 195),
(459, 'Dissolution des sociétés II', 'CGE2432', 3, 'JHJH', 54, '45.00', 'Matiere de Specialité', 12, 4, '2024-05-03 09:30:53', '2024-06-11 14:28:38', 167),
(460, 'Travaux de synthése II', 'CGE2373', 2, 'kjkj', 45, '45.00', '', 12, 4, '2024-05-03 12:38:49', '2024-06-10 15:16:21', 164),
(462, 'Douane Assurance', 'GLT2454', 1, 'JHJH', 54, '54.00', 'Matiere de Specialité', 12, 4, '2024-05-03 12:53:36', '2024-06-11 15:04:44', 120),
(463, 'Probabilité', 'IGL2323', 2, 'JKJ', 45, '56545.00', '', 12, 1, '2024-05-03 13:23:47', '2024-06-10 14:43:00', 82),
(464, 'System D\'information', 'IGL2363', 2, 'jkjl', 45, '256.00', 'Matiere de Specialité', 12, 1, '2024-05-03 13:36:03', '2024-05-03 13:36:03', 86),
(471, 'Economie des Transport', 'TLO3511', 2, 'ADKFJK', 65, '45.00', 'Matiere de Specialité', 19, 1, '2024-05-27 07:50:05', '2024-05-27 07:50:05', 278),
(472, 'Vente des Services de Transport', 'TLO3512', 2, 'ADFIL', 23, '33.00', 'Matiere de Specialité', 19, 1, '2024-05-27 07:53:50', '2024-05-27 07:53:50', 278),
(473, 'Droit des Transport', 'TLO3513', 2, 'ALDFKL', 35, '23.00', 'Matiere de Specialité', 19, 1, '2024-05-27 07:54:46', '2024-05-27 07:54:46', 278),
(474, 'Assurance Transport des Marchandises', 'TLO3521', 2, 'ADFLI', 35, '145.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:25:03', '2024-05-27 08:25:03', 279),
(475, 'Gestion des Operations de Douane et de transit', 'TLO3522', 2, 'HJHJ', 50, '45.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:26:48', '2024-05-27 08:26:48', 279),
(476, 'Gestion de la Plateforme Terreste', 'TLO3531', 2, 'ghgh', 56, '45.00', '', 19, 1, '2024-05-27 08:39:10', '2024-09-03 08:28:15', 281),
(477, 'Gestion de la Plateforme Maritime', 'TLO3532', 3, 'wjek', 23, '23.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:43:03', '2024-05-27 08:43:03', 281),
(478, 'Gestion de la Platforme Aerienne', 'TLO3541', 3, 'HJHJ', 234, '98.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:48:31', '2024-05-27 08:48:31', 282),
(479, 'Gestion des Entrepots, Conditionnement et Manutation', 'TLO3551', 2, 'asdfil', 23, '23.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:51:21', '2024-05-27 08:51:21', 283),
(480, 'Comptabilite Appliquee et Gestion des stocks, approvisionnement', 'TLO3552', 2, 'LAKDFKL', 78, '89.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:56:17', '2024-05-27 08:56:17', 283),
(481, 'Organisation de la Chaine Logistique', 'TLO3561', 2, 'kkjk', 55, '55.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:57:53', '2024-05-27 08:57:53', 284),
(482, 'Systeme d\'information et de la Communication Logistique', 'TLO3562', 2, 'JKJK', 23, '234.00', 'Matiere de Specialité', 19, 1, '2024-05-27 08:59:09', '2024-05-27 08:59:09', 284),
(483, 'Gestion de la Logistique Internationale', 'TLO3571', 2, 'jijh', 45, '56.00', '', 19, 1, '2024-05-27 09:00:55', '2024-09-03 08:26:33', 285),
(484, 'Consolidation des comptes', 'FIC3511', 3, 'DSIILAIFA', 78, '89.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:16:09', '2024-05-28 10:16:09', 286),
(485, 'Techniques comptables approfondies', 'FIC3512', 3, 'aidflaid', 78, '98.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:16:48', '2024-05-28 10:16:48', 286),
(486, 'Gestion budgetaire', 'FIC3521', 2, 'aldkfajld', 9, '89.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:17:44', '2024-05-28 10:17:44', 287),
(487, 'Controle de gestion', 'FIC3522', 3, 'ghgh', 55, '455.00', '', 19, 1, '2024-05-28 10:18:44', '2024-09-03 08:32:01', 287),
(488, 'Diagnostic Economique et Financier', 'FIC3531', 2, 'adfadhakjdl', 23, '34.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:20:00', '2024-05-28 10:20:00', 288),
(489, 'Informatique applique a la gestion', 'FIC3532', 2, 'adlfkadj', 87, '89.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:20:49', '2024-05-28 10:20:49', 288),
(490, 'Introduction a la finance', 'FIC3541', 2, 'adfkjk', 47, '89.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:23:01', '2024-05-28 10:23:01', 289),
(491, 'Evaluation de L\'entreprise', 'FIC3542', 2, 'oaifdaldi', 23, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:23:53', '2024-05-28 10:23:53', 289),
(492, 'Gestion de la Tresorerie', 'FIC3543', 2, 'aldfkajd', 67, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:24:58', '2024-05-28 10:24:58', 289),
(493, 'Expression et Communication Francaise', 'FIC3551', 2, 'askdfadkad', 37, '23.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:26:00', '2024-05-28 10:26:00', 290),
(494, 'Anglais applique a la Finance et a la Comptabilite', 'FIC3552', 2, 'alskdfj', 98, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:27:03', '2024-05-28 10:27:03', 290),
(495, 'Strategie de L\'entreprise', 'FIC3561', 2, 'kkjk', 78, '98.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:28:28', '2024-05-31 07:35:30', 291),
(496, 'Droit Fiscal', 'FIC3562', 2, 'alsdkfj', 434, '34.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:29:22', '2024-05-28 10:29:22', 291),
(497, 'Economie du Travial et Politique RH', 'GRH3511', 3, 'ADFAKLJKL', 98, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:39:19', '2024-05-28 10:39:19', 292),
(498, 'Relations Humaines et Sociales', 'GRH3512', 2, 'adfkljl', 78, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:40:51', '2024-05-28 10:40:51', 292),
(499, 'Droit du Travail et de la Prevoyance Sociale', 'GRH3513', 3, 'adlfkllk', 78, '45.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:42:43', '2024-05-28 10:45:19', 292),
(500, 'Psychologie du Travail et des Organisations', 'GRH3521', 2, 'ASLJKO', 98, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:47:19', '2024-05-28 10:47:19', 293),
(501, 'Recrutement et Gestion Administrative', 'GRH3522', 2, 'alsdfkalskd', 67, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:48:20', '2024-05-28 10:48:20', 293),
(502, 'Statistiques appliquees aux RH', 'GRH3523', 2, 'akjkajdhk', 131, '34.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:49:34', '2024-05-28 10:49:34', 293),
(503, 'Systeme D\'evaluation RH', 'GRH3531', 2, 'asldfkajl', 98, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:50:56', '2024-05-28 10:50:56', 294),
(504, 'Politique de Renumeration et Gestion de la Paie', 'GRH3532', 4, 'aldfkaldkasljkf', 24, '45.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:53:11', '2024-05-28 10:53:11', 294),
(505, 'Gestion de la Formation et Gestion Previsionnelle des Emplois', 'GRH3533', 3, 'asldfkal', 344, '234.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:54:17', '2024-05-28 10:54:17', 294),
(506, 'Informatique appliquee aux GRH', 'GRH3541', 2, 'askdjfhuil', 98, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:55:54', '2024-05-28 10:55:54', 295),
(507, 'Audit Social et Controle de Gestion RH', 'GRH3542', 2, 'ALDKFLAI', 34, '34.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:56:46', '2024-05-28 10:56:46', 295),
(508, 'Structure Organisationnel et Fonctionnement de L\'entreprise', 'GRH3543', 3, 'alsdkfalkiop', 89, '78.00', 'Matiere de Specialité', 19, 1, '2024-05-28 10:57:54', '2024-05-28 10:57:54', 295),
(509, 'Statistique Appliquees', 'FIC3523', 1, 'gfhfh', 59, '45.00', '', 19, 1, '2024-06-04 10:02:10', '2024-09-03 08:30:48', 287),
(510, 'Technique de Gestion des EMF', 'FIC3621', 2, 'kjkhhkj', 25, '31.00', 'Matiere de Specialité', 19, 4, '2024-06-04 10:07:31', '2024-06-04 10:07:31', 297),
(511, 'Decision D\'investissement', 'FIC3611', 2, 'kkjlk', 35, '52.00', 'Matiere de Specialité', 19, 4, '2024-06-04 10:08:41', '2024-06-04 10:08:41', 296),
(512, 'Anglais applique aux RH', 'GRH3621', 2, 'KJKJK', 24, '24.00', 'Matiere de Specialité', 19, 4, '2024-06-04 10:14:50', '2024-06-04 10:14:50', 298),
(513, 'Expression et Communication Francaise', 'GRH3622', 2, 'nkkjk', 24, '2.00', 'Matiere de Specialité', 19, 4, '2024-06-04 10:15:36', '2024-06-04 10:15:36', 298),
(514, 'Expression et Communication Francaise', 'TLO3641', 2, 'KJKJ', 24, '4.00', 'Matiere de Specialité', 19, 4, '2024-06-04 10:23:53', '2024-06-04 10:23:53', 299),
(515, 'Anglais Appliquee au Transport', 'TLO3642', 2, 'kjk', 25, '35.00', 'Matiere de Specialité', 19, 4, '2024-06-04 10:24:40', '2024-06-04 10:24:40', 299),
(516, 'Statistique Appliquees', 'TLO3533', 1, 'lll', 56, '45.00', '', 19, 1, '2024-06-04 10:26:13', '2024-09-03 08:24:34', 281),
(526, 'Stage Professionnelle', 'IGL2461', 6, 'KJK', 45, '56.00', 'Matiere de Specialité', 12, 4, '2024-06-11 16:09:03', '2024-06-11 16:09:03', 309),
(527, 'Stage Professionnelle', 'AMA2461', 6, 'kjkj', 45, '65.00', 'Matiere de Specialité', 12, 4, '2024-06-11 16:19:39', '2024-06-11 16:19:39', 310),
(528, 'Stage Professionnelle', 'BQF2461', 6, 'JHJH', 54, '56.00', 'Matiere de Specialité', 12, 4, '2024-06-11 16:24:51', '2024-06-11 16:24:51', 311),
(529, 'Stage Professionnelle', 'CGE2461', 6, 'HJ', 54, '45.00', 'Matiere de Specialité', 12, 4, '2024-06-11 16:32:50', '2024-06-11 16:32:50', 312),
(530, 'Stage Professionnelle', 'GLT2461', 6, 'JHJH', 45, '56.00', 'Matiere de Specialité', 12, 4, '2024-06-11 16:40:40', '2024-06-11 16:40:40', 313),
(531, 'Ship Representation', 'LTM2481', 2, 'kjkj', 5, '545.00', 'Matiere de Specialité', 12, 4, '2024-06-12 08:05:05', '2024-06-12 08:05:05', 314),
(533, 'Intership', 'SWE246', 6, 'kjk', 5, '5.00', 'Matiere de Specialité', 12, 4, '2024-06-12 08:44:59', '2024-06-12 08:44:59', 316),
(534, 'Internship/Thesis Defense', 'LTM246', 5, 'JKJKJ', 45, '5.00', 'Matiere de Specialité', 12, 4, '2024-06-12 10:10:31', '2024-06-12 10:10:31', 315),
(535, 'Informatique Appliquée', 'TLO3563', 1, 'yyui', 45, '565.00', '', 19, 1, '2024-06-20 08:13:03', '2024-09-03 08:25:32', 284),
(536, 'Création d\'entreprise', 'TLO3651', 2, 'ALKLJ', 55, '54.00', 'Matiere de Specialité', 19, 4, '2024-06-20 09:40:10', '2024-06-20 09:40:10', 319),
(537, 'Création d\'entreprise', 'FIC3631', 2, 'ALDFKKL', 52, '45.00', 'Matiere de Specialité', 19, 4, '2024-06-20 09:41:31', '2024-06-20 09:41:31', 317),
(538, 'Création d\'entreprise', 'GRH3631', 2, 'ASLDFKJLK', 25, '56.00', 'Matiere de Specialité', 19, 4, '2024-06-20 09:42:31', '2024-06-20 09:42:31', 318),
(539, 'Gestion de la Production', 'TLO3621', 2, 'ALKJDF', 45, '56.00', 'Matiere de Specialité', 19, 4, '2024-06-20 10:18:28', '2024-06-20 10:18:28', 320),
(540, 'Decision de Financement', 'FIC3612', 2, 'kjkj', 54, '45.00', 'Matiere de Specialité', 19, 4, '2024-06-20 10:22:17', '2024-06-20 10:22:17', 296),
(541, 'Management d\'équipe', 'GRH3611', 4, 'dlkfjakdl', 54, '45.00', 'Matiere de Specialité', 19, 4, '2024-06-20 10:26:59', '2024-06-20 10:26:59', 321),
(542, 'Communication d\'entreprise', 'GRH3613', 2, 'ALDKFJ', 45, '45.00', 'Matiere de Specialité', 19, 4, '2024-06-26 08:10:40', '2024-06-26 08:10:40', 321),
(543, 'Opération Spécifique', 'CGE1232', 3, 'jkjk', 45, '112.00', '', 11, 4, '2024-06-26 17:19:21', '2024-07-30 16:18:03', 22),
(544, 'Introduction to Fundamental Rights', 'SWE1281', 1, 'KLKLK', 45, '45.00', '', 11, 4, '2024-07-01 08:37:14', '2024-07-30 16:49:58', 322),
(545, 'Civics, Ethics and Citizenship', 'SWE1282', 1, 'OKLDKJAL', 98, '45.00', 'Matiere Transversal', 11, 4, '2024-07-01 08:38:25', '2024-07-01 08:38:25', 322),
(546, 'Business Law', 'SWE1283', 1, 'ALKDFLKDFJL', 98, '8.00', 'Matiere Transversal', 11, 4, '2024-07-01 08:39:18', '2024-07-01 08:39:18', 322),
(547, 'Labour law', 'SWE1284', 1, 'ALDKFKJL', 9, '8.00', 'Matiere Transversal', 11, 4, '2024-07-01 08:40:13', '2024-07-01 08:40:13', 322),
(548, 'Company law', 'SWE1285', 1, 'ALSDKFJII', 9, '898.00', 'Matiere Transversal', 11, 4, '2024-07-01 08:41:10', '2024-07-01 08:41:10', 322),
(549, 'Statistiques II', 'IGL1213', 1, 'ALSKDFJKAL', 55, '5.00', 'Matiere Fondamental', 11, 4, '2024-07-01 09:13:14', '2024-07-01 09:13:14', 32),
(550, 'Education Civique et Ethique', 'IGL1281', 1, 'ALDKF', 45, '5.00', 'Matiere Transversal', 11, 4, '2024-07-01 09:53:52', '2024-07-01 09:53:52', 323),
(551, 'Création d\'entreprise et Droit Commerciale', 'IGL1282', 2, 'jkjkj', 45, '45.00', '', 11, 4, '2024-07-01 09:58:41', '2024-08-05 14:10:30', 323),
(553, 'Methodologie de Redaction du Rapport de Stage', 'IGL1284', 1, 'KLKLK', 45, '12.00', 'Matiere Transversal', 11, 4, '2024-07-01 11:45:28', '2024-07-01 11:45:28', 323),
(554, 'Education Civique et Ethique', 'CGE1281', 1, 'ALDKFKL', 45, '5.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:03:53', '2024-07-01 12:03:53', 324),
(555, 'Droit Commercial', 'CGE1282', 1, 'ADKFJKJ', 45, '45.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:14:23', '2024-07-01 12:14:23', 324),
(556, 'Création d\'entreprise', 'CGE1283', 1, 'ADFLIL', 45, '45.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:16:06', '2024-07-01 12:16:06', 324),
(557, 'Methodologie de Redaction du Rapport de Stage', 'CGE1284', 1, 'ADSFKKLK', 14, '45.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:17:49', '2024-07-01 12:17:49', 324),
(558, 'Création d\'entreprise', 'DOT1281', 1, 'ASDFLJI', 75, '45.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:39:09', '2024-07-01 12:39:09', 325),
(559, 'Education Civique et Ethique', 'DOT1282', 1, 'ADFKJKL', 9, '7.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:40:19', '2024-07-01 12:40:19', 325),
(560, 'Methodologie de Redaction du Rapport de Stage', 'DOT1283', 1, 'ALDFKJLK', 23, '23.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:41:19', '2024-07-01 12:41:19', 325),
(561, 'Droit Commercial', 'DOT1284', 1, 'ADLFILLK', 87, '89.00', 'Matiere Transversal', 11, 4, '2024-07-01 12:41:59', '2024-07-01 12:41:59', 325),
(562, 'Analyse Financière', 'DOT1123', 2, 'KLIJLI', 45, '45.00', '', 11, 1, '2024-07-01 12:53:41', '2024-07-30 16:43:37', 54),
(563, 'Mathématiques Financières', 'DOT1124', 2, 'ljlkasdf', 45, '45.00', '', 11, 1, '2024-07-01 12:54:58', '2024-07-30 16:45:25', 54),
(564, 'Statistiques II', 'DOT1125', 2, 'kjkjk', 45, '4.00', '', 11, 1, '2024-07-01 12:56:26', '2024-07-30 16:46:13', 54),
(565, 'Analyse Financière', 'BQF1123', 1, 'AFILIL', 9, '90.00', 'Matiere Transversal', 11, 1, '2024-07-01 13:13:01', '2024-07-01 13:13:01', 187),
(567, 'Droit Commercial', 'BQF1282', 1, 'AFKLKL', 89, '90.00', 'Matiere Transversal', 11, 4, '2024-07-01 13:18:55', '2024-07-01 13:18:55', 326),
(568, 'Education Civique et Ethique', 'BQF1283', 1, 'ASLFKL', 90, '90.00', 'Matiere Transversal', 11, 4, '2024-07-01 13:19:40', '2024-07-01 13:19:40', 326),
(569, 'Création d\'entreprise', 'BQF1284', 1, 'ALSDFJLI', 80, '90.00', 'Matiere Transversal', 11, 4, '2024-07-01 13:20:54', '2024-07-01 13:20:54', 326),
(570, 'Techniques d\'optimisation et outils de pilotage des flux', 'TLO3611', 3, 'jkjkj', 89, '45.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:06:50', '2024-08-06 10:06:50', 327),
(571, 'Gestion de Projets Logistique', 'TLO3622', 2, 'LKLKL', 90, '90.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:08:23', '2024-08-06 10:08:23', 320),
(572, 'Gestion des Resources Humaines', 'TLO3631', 3, 'jkjkj', 56, '56.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:10:59', '2024-08-06 10:10:59', 328),
(573, 'Contantieux Sociale et Droit de Sécurité  Sociale', 'GRH3612', 2, 'klklk', 45, '45.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:25:11', '2024-08-06 10:25:11', 321),
(574, 'Gestion de Projet', 'GRH3632', 2, 'jkllk', 11, '4.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:26:53', '2024-08-06 10:26:53', 318),
(575, 'Projet Tutore', 'TLO3652', 4, 'ALDFL', 5, '4.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:33:02', '2024-08-06 10:33:02', 319),
(576, 'Projet Tutore', 'GRH3641', 7, 'sdsds', 23, '23.00', '', 19, 4, '2024-08-06 10:34:52', '2024-09-03 08:40:14', 329),
(577, 'Travaux Comptables et Financiers de Synthèse', 'FIC3613', 2, 'adfii', 44, '34.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:43:58', '2024-08-06 10:43:58', 296),
(578, 'Techniques Bancaires', 'FIC3622', 2, 'ladflksl', 89, '89.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:46:47', '2024-08-06 10:46:47', 297),
(579, 'Introduction à L\'ingénierie  Financière', 'FIC3623', 2, '', 89, '89.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:48:29', '2024-08-06 10:48:29', 297),
(580, 'Gestion de Projet', 'FIC3632', 2, 'alidflasi', 89, '89.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:49:56', '2024-08-06 10:49:56', 317),
(581, 'Projet Tutore', 'FIC3641', 4, 'laifli', 89, '89.00', 'Matiere de Specialité', 19, 4, '2024-08-06 10:52:06', '2024-08-06 10:52:06', 330),
(582, 'Gestion des Établissements de Microfinance', 'FIC3633', 2, 'HHKK', 78, '78.00', 'Matiere de Specialité', 19, 4, '2024-08-06 11:18:30', '2024-08-06 11:18:30', 317),
(583, 'Méthodologie de Rédaction du Rapport', 'FIC3642', 8, 'dfdf', 34, '34.00', '', 19, 4, '2024-08-06 11:28:03', '2024-09-03 08:41:27', 330),
(584, 'Méthodologie de Rédaction du Rapport', 'GRH3642', 7, 'sdsd', 333, '33.00', '', 19, 4, '2024-08-06 11:29:41', '2024-09-03 08:39:45', 329),
(585, 'Méthodologie de Rédaction du Rapport', 'TLO3653', 10, 'asodi', 89, '89.00', 'Matiere de Specialité', 19, 4, '2024-08-06 11:31:24', '2024-08-06 11:31:24', 319);

-- --------------------------------------------------------

--
-- Table structure for table `course_natures`
--

CREATE TABLE `course_natures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_natures`
--

INSERT INTO `course_natures` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fondamentales', '2023-12-30 18:35:40', '2023-12-30 18:36:40'),
(2, 'Professionnelles', '2023-12-30 19:36:41', '2023-12-30 19:36:41'),
(3, 'Transversales', '2023-12-30 19:36:41', '2023-12-30 19:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

CREATE TABLE `course_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ca_marks` decimal(5,2) NOT NULL DEFAULT 0.00,
  `exam_marks` decimal(5,2) NOT NULL DEFAULT 0.00,
  `average` decimal(5,2) NOT NULL DEFAULT 0.00,
  `earned_credit` int(11) NOT NULL DEFAULT 0,
  `reseat_mark` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`, `ca_marks`, `exam_marks`, `average`, `earned_credit`, `reseat_mark`) VALUES
(152, 114, 55, '2024-01-11 07:12:58', '2024-06-10 14:36:31', '10.00', '5.00', '0.00', 0, '10.00'),
(153, 114, 56, '2024-01-11 07:12:58', '2024-06-10 14:36:31', '10.00', '5.00', '0.00', 0, '10.00'),
(155, 114, 59, '2024-01-11 07:12:58', '2024-04-04 11:37:23', '14.00', '10.00', '0.00', 0, '0.00'),
(156, 114, 61, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '14.00', '14.00', '0.00', 0, '0.00'),
(157, 114, 64, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '13.50', '13.00', '0.00', 0, '0.00'),
(158, 114, 65, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '19.25', '19.00', '0.00', 0, '0.00'),
(159, 114, 68, '2024-01-11 07:12:58', '2024-04-04 11:37:23', '12.00', '12.00', '0.00', 0, '0.00'),
(160, 114, 69, '2024-01-11 07:12:58', '2024-04-04 11:37:23', '8.00', '11.00', '0.00', 0, '0.00'),
(161, 114, 72, '2024-01-11 07:12:58', '2024-04-04 11:37:23', '13.00', '19.00', '0.00', 0, '0.00'),
(162, 114, 73, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '19.25', '17.00', '0.00', 0, '0.00'),
(163, 114, 75, '2024-01-11 07:12:58', '2024-04-05 13:32:11', '14.00', '14.00', '0.00', 0, '0.00'),
(164, 114, 57, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '10.00', '12.00', '0.00', 0, '0.00'),
(165, 114, 60, '2024-01-11 07:12:58', '2024-04-04 11:49:19', '10.00', '10.00', '0.00', 0, '0.00'),
(166, 114, 62, '2024-01-11 07:12:58', '2024-06-10 15:01:33', '13.00', '19.00', '0.00', 0, '0.00'),
(167, 114, 63, '2024-01-11 07:12:58', '2024-06-06 11:54:50', '15.00', '18.50', '0.00', 0, '0.00'),
(168, 114, 66, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '10.50', '13.50', '0.00', 0, '0.00'),
(169, 114, 67, '2024-01-11 07:12:58', '2024-04-04 11:49:19', '13.50', '8.50', '0.00', 0, '0.00'),
(170, 114, 70, '2024-01-11 07:12:58', '2024-04-02 09:46:13', '19.00', '15.00', '0.00', 0, '0.00'),
(171, 114, 71, '2024-01-11 07:12:58', '2024-05-02 13:45:06', '14.00', '12.00', '0.00', 0, '0.00'),
(174, 115, 55, '2024-01-11 07:59:56', '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(175, 115, 56, '2024-01-11 07:59:56', '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(177, 115, 59, '2024-01-11 07:59:56', '2024-04-04 11:37:23', '10.00', '10.00', '0.00', 0, '0.00'),
(178, 115, 61, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '13.00', '11.00', '0.00', 0, '0.00'),
(179, 115, 64, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '18.00', '12.00', '0.00', 0, '0.00'),
(180, 115, 65, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '19.00', '14.00', '0.00', 0, '0.00'),
(181, 115, 68, '2024-01-11 07:59:56', '2024-04-04 11:37:23', '12.00', '15.50', '0.00', 0, '0.00'),
(182, 115, 69, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '17.50', '16.00', '0.00', 0, '0.00'),
(183, 115, 72, '2024-01-11 07:59:56', '2024-04-04 11:37:23', '13.00', '16.00', '0.00', 0, '0.00'),
(184, 115, 73, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '17.25', '16.00', '0.00', 0, '0.00'),
(185, 115, 75, '2024-01-11 07:59:56', '2024-04-05 13:32:11', '17.00', '17.00', '0.00', 0, '0.00'),
(186, 115, 57, '2024-01-11 07:59:56', '2024-06-10 14:48:15', '13.50', '0.00', '0.00', 0, '9.00'),
(187, 115, 60, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '16.50', '13.50', '0.00', 0, '0.00'),
(188, 115, 62, '2024-01-11 07:59:56', '2024-06-10 15:01:33', '13.00', '16.00', '0.00', 0, '0.00'),
(189, 115, 63, '2024-01-11 07:59:56', '2024-06-06 11:54:50', '20.00', '17.50', '0.00', 0, '0.00'),
(190, 115, 66, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '14.00', '16.00', '0.00', 0, '0.00'),
(191, 115, 67, '2024-01-11 07:59:56', '2024-04-02 11:46:12', '18.00', '8.00', '0.00', 0, '0.00'),
(192, 115, 70, '2024-01-11 07:59:56', '2024-04-02 09:46:13', '17.00', '15.00', '0.00', 0, '0.00'),
(193, 115, 71, '2024-01-11 07:59:56', '2024-06-10 14:48:15', '15.00', '0.00', '0.00', 0, '9.00'),
(196, 116, 55, '2024-01-11 08:02:45', '2024-06-10 14:36:31', '10.00', '6.50', '0.00', 0, '10.00'),
(197, 116, 56, '2024-01-11 08:02:45', '2024-06-10 14:36:31', '10.00', '5.00', '0.00', 0, '10.00'),
(199, 116, 59, '2024-01-11 08:02:45', '2024-04-04 11:37:23', '12.00', '13.00', '0.00', 0, '0.00'),
(200, 116, 61, '2024-01-11 08:02:45', '2024-02-02 17:47:52', '18.00', '17.15', '0.00', 0, '0.00'),
(201, 116, 64, '2024-01-11 08:02:45', '2024-02-02 17:43:58', '17.00', '14.15', '0.00', 0, '0.00'),
(202, 116, 65, '2024-01-11 08:02:45', '2024-04-02 09:46:13', '19.50', '16.00', '0.00', 0, '0.00'),
(203, 116, 68, '2024-01-11 08:02:45', '2024-04-04 11:37:23', '12.00', '18.00', '0.00', 0, '0.00'),
(204, 116, 69, '2024-01-11 08:02:45', '2024-04-02 09:46:13', '16.50', '18.00', '0.00', 0, '0.00'),
(205, 116, 72, '2024-01-11 08:02:45', '2024-04-04 11:37:23', '13.00', '14.00', '0.00', 0, '0.00'),
(206, 116, 73, '2024-01-11 08:02:45', '2024-04-02 09:46:13', '0.00', '18.00', '0.00', 0, '0.00'),
(207, 116, 75, '2024-01-11 08:02:45', '2024-04-05 13:32:11', '10.00', '10.00', '0.00', 0, '0.00'),
(208, 116, 57, '2024-01-11 08:02:45', '2024-04-02 09:46:13', '15.50', '15.00', '0.00', 0, '0.00'),
(209, 116, 60, '2024-01-11 08:02:45', '2024-02-02 17:46:14', '19.00', '16.15', '0.00', 0, '0.00'),
(210, 116, 62, '2024-01-11 08:02:45', '2024-06-10 15:01:33', '13.00', '14.00', '0.00', 0, '0.00'),
(211, 116, 63, '2024-01-11 08:02:45', '2024-06-06 11:54:50', '20.00', '18.00', '0.00', 0, '0.00'),
(212, 116, 66, '2024-01-11 08:02:45', '2024-04-02 09:46:13', '18.00', '18.00', '0.00', 0, '0.00'),
(213, 116, 67, '2024-01-11 08:02:45', '2024-04-02 11:46:12', '17.00', '16.00', '0.00', 0, '0.00'),
(214, 116, 70, '2024-01-11 08:02:45', '2024-04-02 09:46:13', '18.00', '18.00', '0.00', 0, '0.00'),
(215, 116, 71, '2024-01-11 08:02:45', '2024-05-02 13:45:06', '16.00', '17.00', '0.00', 0, '0.00'),
(218, 117, 55, '2024-01-11 08:07:52', '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(219, 117, 56, '2024-01-11 08:07:52', '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(221, 117, 59, '2024-01-11 08:07:52', '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(222, 117, 61, '2024-01-11 08:07:52', '2024-04-04 11:37:23', '13.50', '9.00', '0.00', 0, '0.00'),
(223, 117, 64, '2024-01-11 08:07:52', '2024-04-04 11:37:23', '12.00', '9.50', '0.00', 0, '0.00'),
(224, 117, 65, '2024-01-11 08:07:52', '2024-04-02 09:46:13', '16.50', '15.00', '0.00', 0, '0.00'),
(225, 117, 68, '2024-01-11 08:07:52', '2024-04-04 11:37:23', '12.00', '12.00', '0.00', 0, '0.00'),
(226, 117, 69, '2024-01-11 08:07:52', '2024-04-02 09:46:13', '7.50', '12.00', '0.00', 0, '0.00'),
(227, 117, 72, '2024-01-11 08:07:52', '2024-04-04 11:37:23', '13.00', '13.00', '0.00', 0, '0.00'),
(228, 117, 73, '2024-01-11 08:07:52', '2024-06-10 14:36:31', '10.00', '10.00', '0.00', 0, '0.00'),
(229, 117, 75, '2024-01-11 08:07:52', '2024-04-05 13:32:11', '12.00', '12.00', '0.00', 0, '0.00'),
(230, 117, 57, '2024-01-11 08:07:52', '2024-06-10 14:48:15', '10.00', '5.00', '0.00', 0, '10.00'),
(231, 117, 60, '2024-01-11 08:07:52', '2024-04-02 09:46:13', '12.00', '13.00', '0.00', 0, '0.00'),
(232, 117, 62, '2024-01-11 08:07:52', '2024-06-10 15:01:33', '13.00', '13.00', '0.00', 0, '0.00'),
(233, 117, 63, '2024-01-11 08:07:52', '2024-06-06 11:54:50', '15.00', '13.75', '0.00', 0, '0.00'),
(234, 117, 66, '2024-01-11 08:07:52', '2024-06-10 14:48:15', '7.00', '3.50', '0.00', 0, '11.50'),
(235, 117, 67, '2024-01-11 08:07:52', '2024-04-04 11:49:19', '12.00', '9.50', '0.00', 0, '0.00'),
(236, 117, 70, '2024-01-11 08:07:52', '2024-04-02 09:46:13', '17.00', '14.00', '0.00', 0, '0.00'),
(237, 117, 71, '2024-01-11 08:07:52', '2024-06-10 14:48:15', '8.00', '0.00', '0.00', 0, '11.00'),
(240, 118, 113, '2024-01-11 19:59:01', '2024-04-04 11:37:23', '7.00', '13.00', '0.00', 0, '0.00'),
(241, 118, 114, '2024-01-11 19:59:01', '2024-04-02 09:46:13', '16.50', '11.00', '0.00', 0, '0.00'),
(242, 118, 117, '2024-01-11 19:59:01', '2024-05-03 08:18:56', '13.00', '13.25', '0.00', 0, '0.00'),
(243, 118, 118, '2024-01-11 19:59:01', '2024-04-02 09:46:13', '12.00', '17.00', '0.00', 0, '0.00'),
(244, 118, 121, '2024-01-11 19:59:01', '2024-04-02 09:46:13', '13.50', '14.00', '0.00', 0, '0.00'),
(245, 118, 122, '2024-01-11 19:59:01', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(246, 118, 125, '2024-01-11 19:59:01', '2024-06-11 15:16:06', '14.50', '4.00', '0.00', 0, '10.00'),
(247, 118, 126, '2024-01-11 19:59:01', '2024-04-02 11:25:13', '16.00', '14.00', '0.00', 0, '0.00'),
(248, 118, 127, '2024-01-11 19:59:01', '2024-04-02 09:46:13', '14.00', '16.00', '0.00', 0, '0.00'),
(249, 118, 128, '2024-01-11 19:59:01', '2024-06-11 15:16:06', '12.00', '7.00', '0.00', 0, '11.00'),
(250, 118, 129, '2024-01-11 19:59:01', '2024-04-04 11:37:23', '14.00', '16.00', '0.00', 0, '0.00'),
(251, 118, 130, '2024-01-11 19:59:01', '2024-06-11 15:16:06', '12.00', '7.00', '0.00', 0, '11.00'),
(252, 118, 134, '2024-01-11 19:59:01', '2024-04-02 11:20:53', '13.00', '12.00', '0.00', 0, '0.00'),
(253, 118, 135, '2024-01-11 19:59:01', '2024-04-04 11:37:23', '10.00', '13.50', '0.00', 0, '0.00'),
(254, 118, 136, '2024-01-11 19:59:01', '2024-06-11 15:16:06', '16.00', '0.00', '0.00', 0, '10.00'),
(255, 118, 138, '2024-01-11 19:59:01', '2024-04-05 15:24:19', '10.00', '10.00', '0.00', 0, '0.00'),
(256, 118, 115, '2024-01-11 19:59:01', '2024-06-11 15:11:19', '7.00', '7.00', '0.00', 0, '11.50'),
(257, 118, 116, '2024-01-11 19:59:01', '2024-04-02 09:46:13', '0.00', '15.00', '0.00', 0, '0.00'),
(258, 118, 119, '2024-01-11 19:59:01', '2024-05-07 15:52:53', '13.00', '13.25', '0.00', 0, '0.00'),
(259, 118, 120, '2024-01-11 19:59:01', '2024-05-03 16:54:23', '15.00', '16.00', '0.00', 0, '0.00'),
(260, 118, 123, '2024-01-11 19:59:01', '2024-05-03 16:42:20', '13.50', '15.00', '0.00', 0, '0.00'),
(261, 118, 124, '2024-01-11 19:59:01', '2024-04-05 14:20:44', '10.00', '13.00', '0.00', 0, '0.00'),
(262, 118, 131, '2024-01-11 19:59:01', '2024-04-04 11:20:57', '13.00', '12.00', '0.00', 0, '0.00'),
(263, 118, 132, '2024-01-11 19:59:01', '2024-04-08 08:40:26', '12.00', '13.50', '0.00', 0, '0.00'),
(264, 118, 133, '2024-01-11 19:59:01', '2024-06-11 15:11:19', '16.00', '0.00', '0.00', 0, '10.00'),
(268, 119, 113, '2024-01-11 20:00:45', '2024-04-04 11:37:23', '9.00', '11.00', '0.00', 0, '0.00'),
(269, 119, 114, '2024-01-11 20:00:45', '2024-04-02 09:46:13', '16.25', '13.00', '0.00', 0, '0.00'),
(270, 119, 117, '2024-01-11 20:00:45', '2024-05-03 08:18:56', '11.00', '13.25', '0.00', 0, '0.00'),
(271, 119, 118, '2024-01-11 20:00:45', '2024-04-02 09:46:13', '12.00', '17.00', '0.00', 0, '0.00'),
(272, 119, 121, '2024-01-11 20:00:45', '2024-04-04 11:37:23', '10.00', '10.00', '0.00', 0, '0.00'),
(273, 119, 122, '2024-01-11 20:00:45', '2024-04-02 09:46:13', '15.00', '16.00', '0.00', 0, '0.00'),
(274, 119, 125, '2024-01-11 20:00:45', '2024-06-11 15:16:06', '10.00', '4.00', '0.00', 0, '10.00'),
(275, 119, 126, '2024-01-11 20:00:45', '2024-04-02 11:25:13', '15.50', '16.00', '0.00', 0, '0.00'),
(276, 119, 127, '2024-01-11 20:00:45', '2024-04-02 09:46:13', '11.00', '12.00', '0.00', 0, '0.00'),
(277, 119, 128, '2024-01-11 20:00:45', '2024-06-11 15:16:06', '13.00', '7.00', '0.00', 0, '11.00'),
(278, 119, 129, '2024-01-11 20:00:45', '2024-04-04 11:37:23', '11.00', '12.00', '0.00', 0, '0.00'),
(279, 119, 130, '2024-01-11 20:00:45', '2024-06-11 15:16:06', '13.00', '7.00', '0.00', 0, '11.00'),
(280, 119, 134, '2024-01-11 20:00:45', '2024-04-02 11:20:53', '10.00', '12.00', '0.00', 0, '0.00'),
(281, 119, 135, '2024-01-11 20:00:45', '2024-04-04 11:37:23', '10.00', '13.50', '0.00', 0, '0.00'),
(282, 119, 136, '2024-01-11 20:00:45', '2024-06-11 15:16:06', '14.00', '0.00', '0.00', 0, '10.00'),
(283, 119, 138, '2024-01-11 20:00:45', '2024-06-11 15:16:06', '10.00', '6.00', '0.00', 0, '10.00'),
(284, 119, 115, '2024-01-11 20:00:45', '2024-06-11 15:11:19', '9.00', '10.00', '0.00', 0, '11.00'),
(285, 119, 116, '2024-01-11 20:00:45', '2024-04-02 09:46:13', '0.00', '15.00', '0.00', 0, '0.00'),
(286, 119, 119, '2024-01-11 20:00:45', '2024-05-07 15:52:53', '11.00', '13.25', '0.00', 0, '0.00'),
(287, 119, 120, '2024-01-11 20:00:45', '2024-05-03 16:23:33', '12.00', '16.00', '0.00', 0, '0.00'),
(288, 119, 123, '2024-01-11 20:00:45', '2024-06-11 15:11:19', '10.00', '7.00', '0.00', 0, '10.00'),
(289, 119, 124, '2024-01-11 20:00:45', '2024-04-05 14:20:44', '10.00', '12.00', '0.00', 0, '0.00'),
(290, 119, 131, '2024-01-11 20:00:45', '2024-04-04 11:20:57', '10.00', '12.00', '0.00', 0, '0.00'),
(291, 119, 132, '2024-01-11 20:00:45', '2024-04-08 08:40:26', '12.00', '13.50', '0.00', 0, '0.00'),
(292, 119, 133, '2024-01-11 20:00:45', '2024-06-11 15:11:19', '14.00', '0.00', '0.00', 0, '10.00'),
(296, 120, 113, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '0.00', '16.00', '0.00', 0, '0.00'),
(297, 120, 114, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '17.00', '16.50', '0.00', 0, '0.00'),
(298, 120, 117, '2024-01-11 20:01:41', '2024-05-03 08:18:56', '12.50', '11.00', '0.00', 0, '0.00'),
(299, 120, 118, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '4.50', '19.00', '0.00', 0, '0.00'),
(300, 120, 121, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '5.00', '17.00', '0.00', 0, '0.00'),
(301, 120, 122, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '10.00', '14.00', '0.00', 0, '0.00'),
(302, 120, 125, '2024-01-11 20:01:41', '2024-06-11 15:16:06', '11.00', '3.00', '0.00', 0, '10.00'),
(303, 120, 126, '2024-01-11 20:01:41', '2024-04-02 11:25:13', '15.00', '11.50', '0.00', 0, '0.00'),
(304, 120, 127, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '15.00', '10.00', '0.00', 0, '0.00'),
(305, 120, 128, '2024-01-11 20:01:41', '2024-06-11 15:16:06', '8.00', '10.00', '0.00', 0, '11.00'),
(306, 120, 129, '2024-01-11 20:01:41', '2024-04-04 11:37:23', '15.00', '10.00', '0.00', 0, '0.00'),
(307, 120, 130, '2024-01-11 20:01:41', '2024-06-11 15:16:06', '8.00', '10.00', '0.00', 0, '11.00'),
(308, 120, 134, '2024-01-11 20:01:41', '2024-04-02 11:20:53', '10.00', '15.00', '0.00', 0, '0.00'),
(309, 120, 135, '2024-01-11 20:01:41', '2024-04-04 11:37:23', '10.00', '12.50', '0.00', 0, '0.00'),
(310, 120, 136, '2024-01-11 20:01:41', '2024-06-11 15:16:06', '14.50', '0.00', '0.00', 0, '10.00'),
(311, 120, 138, '2024-01-11 20:01:41', '2024-06-11 15:16:06', '14.00', '8.00', '0.00', 0, '10.00'),
(312, 120, 115, '2024-01-11 20:01:41', '2024-06-11 15:11:19', '7.00', '0.00', '0.00', 0, '11.50'),
(313, 120, 116, '2024-01-11 20:01:41', '2024-04-02 09:46:13', '13.50', '15.00', '0.00', 0, '0.00'),
(314, 120, 119, '2024-01-11 20:01:41', '2024-05-07 15:52:53', '12.50', '11.00', '0.00', 0, '0.00'),
(315, 120, 120, '2024-01-11 20:01:41', '2024-06-11 15:11:19', '11.50', '7.00', '0.00', 0, '9.50'),
(316, 120, 123, '2024-01-11 20:01:41', '2024-05-03 16:42:20', '5.00', '15.00', '0.00', 0, '0.00'),
(317, 120, 124, '2024-01-11 20:01:41', '2024-04-05 14:20:44', '10.00', '10.00', '0.00', 0, '0.00'),
(318, 120, 131, '2024-01-11 20:01:41', '2024-04-04 11:20:57', '10.00', '15.00', '0.00', 0, '0.00'),
(319, 120, 132, '2024-01-11 20:01:41', '2024-04-08 08:40:26', '12.00', '12.50', '0.00', 0, '0.00'),
(320, 120, 133, '2024-01-11 20:01:41', '2024-06-11 15:11:19', '14.50', '0.00', '0.00', 0, '10.00'),
(324, 121, 113, '2024-01-11 20:02:24', '2024-04-02 09:46:13', '8.00', '16.00', '0.00', 0, '0.00'),
(325, 121, 114, '2024-01-11 20:02:24', '2024-04-02 09:46:13', '14.75', '15.00', '0.00', 0, '0.00'),
(326, 121, 117, '2024-01-11 20:02:24', '2024-05-03 08:18:56', '11.50', '10.25', '0.00', 0, '0.00'),
(327, 121, 118, '2024-01-11 20:02:24', '2024-04-04 11:37:23', '11.50', '9.50', '0.00', 0, '0.00'),
(328, 121, 121, '2024-01-11 20:02:24', '2024-04-02 09:46:13', '10.00', '10.00', '0.00', 0, '0.00'),
(329, 121, 122, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '16.00', '0.00', '0.00', 0, '8.00'),
(330, 121, 125, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '11.00', '0.00', '0.00', 0, '10.00'),
(331, 121, 126, '2024-01-11 20:02:24', '2024-04-02 11:25:13', '15.50', '12.50', '0.00', 0, '0.00'),
(332, 121, 127, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '10.00', '0.00', '0.00', 0, '10.00'),
(333, 121, 128, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '12.50', '6.00', '0.00', 0, '11.00'),
(334, 121, 129, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '10.00', '0.00', '0.00', 0, '10.00'),
(335, 121, 130, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '12.50', '6.00', '0.00', 0, '11.00'),
(336, 121, 134, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '11.50', '0.00', '0.00', 0, '9.50'),
(337, 121, 135, '2024-01-11 20:02:24', '2024-04-04 11:37:23', '10.00', '14.00', '0.00', 0, '0.00'),
(338, 121, 136, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '15.00', '0.00', '0.00', 0, '10.00'),
(339, 121, 138, '2024-01-11 20:02:24', '2024-06-11 15:16:06', '10.00', '0.00', '0.00', 0, '10.00'),
(340, 121, 115, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '8.00', '10.00', '0.00', 0, '11.00'),
(341, 121, 116, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '13.50', '0.00', '0.00', 0, '9.00'),
(342, 121, 119, '2024-01-11 20:02:24', '2024-05-07 15:52:53', '11.50', '10.25', '0.00', 0, '0.00'),
(343, 121, 120, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '8.00', '10.00', '0.00', 0, '11.00'),
(344, 121, 123, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '10.00', '0.00', '0.00', 0, '10.00'),
(345, 121, 124, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '10.00', '0.00', '0.00', 0, '10.00'),
(346, 121, 131, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '11.50', '0.00', '0.00', 0, '9.50'),
(347, 121, 132, '2024-01-11 20:02:24', '2024-04-08 08:40:26', '12.00', '14.00', '0.00', 0, '0.00'),
(348, 121, 133, '2024-01-11 20:02:24', '2024-06-11 15:11:19', '15.00', '0.00', '0.00', 0, '10.00'),
(352, 122, 182, '2024-01-12 09:04:10', '2024-06-11 14:57:33', '19.00', '0.00', '0.00', 0, '7.00'),
(353, 122, 183, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '15.50', '14.00', '0.00', 0, '0.00'),
(354, 122, 186, '2024-01-12 09:04:10', '2024-06-11 14:57:33', '13.00', '0.00', '0.00', 0, '9.00'),
(355, 122, 187, '2024-01-12 09:04:10', '2024-04-04 11:11:05', '13.00', '9.00', '0.00', 0, '0.00'),
(356, 122, 158, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '11.00', '14.00', '0.00', 0, '0.00'),
(357, 122, 159, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '17.00', '14.00', '0.00', 0, '0.00'),
(358, 122, 166, '2024-01-12 09:04:10', '2024-06-11 14:57:33', '10.00', '10.00', '0.00', 0, '0.00'),
(359, 122, 167, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '15.00', '18.00', '0.00', 0, '0.00'),
(360, 122, 174, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '14.00', '15.00', '0.00', 0, '0.00'),
(361, 122, 175, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '18.50', '16.00', '0.00', 0, '0.00'),
(362, 122, 190, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '15.00', '12.50', '0.00', 0, '0.00'),
(363, 122, 191, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '20.00', '6.00', '0.00', 0, '0.00'),
(364, 122, 192, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '15.00', '12.50', '0.00', 0, '0.00'),
(365, 122, 193, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '16.00', '18.00', '0.00', 0, '0.00'),
(367, 122, 184, '2024-01-12 09:04:10', '2024-06-11 14:41:27', '19.00', '0.00', '0.00', 0, '6.50'),
(368, 122, 185, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '16.00', '11.00', '0.00', 0, '0.00'),
(369, 122, 188, '2024-01-12 09:04:10', '2024-06-11 14:41:27', '13.00', '0.00', '0.00', 0, '9.00'),
(370, 122, 189, '2024-01-12 09:04:10', '2024-06-11 14:41:27', '16.00', '2.00', '0.00', 0, '9.00'),
(371, 122, 160, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '14.00', '19.00', '0.00', 0, '0.00'),
(372, 122, 161, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '16.00', '13.00', '0.00', 0, '0.00'),
(373, 122, 168, '2024-01-12 09:04:10', '2024-06-11 14:50:52', '10.00', '10.00', '0.00', 0, '0.00'),
(374, 122, 169, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '15.00', '18.00', '0.00', 0, '0.00'),
(375, 122, 176, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '18.00', '19.00', '0.00', 0, '0.00'),
(376, 122, 177, '2024-01-12 09:04:10', '2024-04-02 09:46:13', '18.50', '16.00', '0.00', 0, '0.00'),
(379, 123, 182, '2024-01-12 09:05:30', '2024-04-04 11:11:05', '18.00', '13.00', '0.00', 0, '0.00'),
(380, 123, 183, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '16.75', '17.00', '0.00', 0, '0.00'),
(381, 123, 186, '2024-01-12 09:05:30', '2024-06-11 14:57:33', '12.00', '0.00', '0.00', 0, '9.20'),
(382, 123, 187, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '10.00', '19.00', '0.00', 0, '0.00'),
(383, 123, 158, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '20.00', '20.00', '0.00', 0, '0.00'),
(384, 123, 159, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '17.00', '17.00', '0.00', 0, '0.00'),
(385, 123, 166, '2024-01-12 09:05:30', '2024-06-11 14:57:33', '10.00', '10.00', '0.00', 0, '0.00'),
(386, 123, 167, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '16.00', '18.00', '0.00', 0, '0.00'),
(387, 123, 174, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '16.00', '14.00', '0.00', 0, '0.00'),
(388, 123, 175, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '18.00', '18.00', '0.00', 0, '0.00'),
(389, 123, 190, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '15.00', '10.00', '0.00', 0, '0.00'),
(390, 123, 191, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '18.00', '12.00', '0.00', 0, '0.00'),
(391, 123, 192, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '15.00', '10.00', '0.00', 0, '0.00'),
(392, 123, 193, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '16.00', '16.00', '0.00', 0, '0.00'),
(394, 123, 184, '2024-01-12 09:05:30', '2024-06-11 14:38:01', '18.00', '0.00', '0.00', 0, '6.75'),
(395, 123, 185, '2024-01-12 09:05:30', '2024-03-21 09:34:41', '14.00', '15.25', '0.00', 0, '0.00'),
(396, 123, 188, '2024-01-12 09:05:30', '2024-06-11 14:41:27', '12.00', '0.00', '0.00', 0, '9.50'),
(397, 123, 189, '2024-01-12 09:05:30', '2024-06-11 14:41:27', '13.00', '0.00', '0.00', 0, '9.00'),
(398, 123, 160, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '19.00', '19.00', '0.00', 0, '0.00'),
(399, 123, 161, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '17.00', '15.00', '0.00', 0, '0.00'),
(400, 123, 168, '2024-01-12 09:05:30', '2024-06-11 14:50:52', '10.00', '10.00', '0.00', 0, '0.00'),
(401, 123, 169, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '16.00', '19.00', '0.00', 0, '0.00'),
(402, 123, 176, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '19.00', '19.00', '0.00', 0, '0.00'),
(403, 123, 177, '2024-01-12 09:05:30', '2024-04-02 09:46:13', '18.00', '18.00', '0.00', 0, '0.00'),
(406, 124, 182, '2024-01-12 09:07:32', '2024-04-04 11:11:05', '12.00', '10.00', '0.00', 0, '0.00'),
(407, 124, 183, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '15.75', '17.00', '0.00', 0, '0.00'),
(408, 124, 186, '2024-01-12 09:07:32', '2024-05-03 08:18:56', '11.00', '11.75', '0.00', 0, '0.00'),
(409, 124, 187, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '10.00', '17.00', '0.00', 0, '0.00'),
(410, 124, 158, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '16.00', '16.00', '0.00', 0, '0.00'),
(411, 124, 159, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '16.00', '16.00', '0.00', 0, '0.00'),
(412, 124, 166, '2024-01-12 09:07:32', '2024-06-11 14:57:33', '10.00', '10.00', '0.00', 0, '0.00'),
(413, 124, 167, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '15.00', '19.00', '0.00', 0, '0.00'),
(414, 124, 174, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '14.00', '14.00', '0.00', 0, '0.00'),
(415, 124, 175, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '18.50', '16.00', '0.00', 0, '0.00'),
(416, 124, 190, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '16.00', '10.50', '0.00', 0, '0.00'),
(417, 124, 191, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '18.00', '14.00', '0.00', 0, '0.00'),
(418, 124, 192, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '16.50', '10.50', '0.00', 0, '0.00'),
(419, 124, 193, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '16.00', '20.00', '0.00', 0, '0.00'),
(421, 124, 184, '2024-01-12 09:07:32', '2024-05-03 16:37:34', '12.00', '17.00', '0.00', 0, '0.00'),
(422, 124, 185, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '15.00', '11.50', '0.00', 0, '0.00'),
(423, 124, 188, '2024-01-12 09:07:32', '2024-05-03 12:28:07', '11.00', '11.75', '0.00', 0, '0.00'),
(424, 124, 189, '2024-01-12 09:07:32', '2024-06-11 14:41:27', '13.00', '8.00', '0.00', 0, '9.00'),
(425, 124, 160, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '16.00', '20.00', '0.00', 0, '0.00'),
(426, 124, 161, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '17.00', '12.00', '0.00', 0, '0.00'),
(427, 124, 168, '2024-01-12 09:07:32', '2024-06-11 14:50:52', '10.00', '10.00', '0.00', 0, '0.00'),
(428, 124, 169, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '15.00', '18.00', '0.00', 0, '0.00'),
(429, 124, 176, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '18.00', '20.00', '0.00', 0, '0.00'),
(430, 124, 177, '2024-01-12 09:07:32', '2024-04-02 09:46:13', '18.50', '16.00', '0.00', 0, '0.00'),
(433, 125, 182, '2024-01-12 09:08:45', '2024-04-04 11:11:05', '10.00', '10.00', '0.00', 0, '0.00'),
(434, 125, 183, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '16.25', '17.00', '0.00', 0, '0.00'),
(435, 125, 186, '2024-01-12 09:08:45', '2024-06-11 14:57:33', '12.00', '8.50', '0.00', 0, '9.20'),
(436, 125, 187, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '10.50', '15.00', '0.00', 0, '0.00'),
(437, 125, 158, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '16.00', '20.00', '0.00', 0, '0.00'),
(438, 125, 159, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '18.00', '14.00', '0.00', 0, '0.00'),
(439, 125, 166, '2024-01-12 09:08:45', '2024-06-11 14:57:33', '10.00', '10.00', '0.00', 0, '0.00'),
(440, 125, 167, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '17.00', '18.00', '0.00', 0, '0.00'),
(441, 125, 174, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '12.00', '14.00', '0.00', 0, '0.00'),
(442, 125, 175, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '18.00', '17.00', '0.00', 0, '0.00'),
(443, 125, 190, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '17.00', '11.50', '0.00', 0, '0.00'),
(444, 125, 191, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '16.00', '14.00', '0.00', 0, '0.00'),
(445, 125, 192, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '17.00', '11.50', '0.00', 0, '0.00'),
(446, 125, 193, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '16.00', '19.00', '0.00', 0, '0.00'),
(448, 125, 184, '2024-01-12 09:08:45', '2024-05-03 16:37:34', '8.00', '14.50', '0.00', 0, '0.00'),
(449, 125, 185, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '14.00', '12.50', '0.00', 0, '0.00'),
(450, 125, 188, '2024-01-12 09:08:45', '2024-06-11 14:41:27', '12.00', '8.50', '0.00', 0, '9.50'),
(451, 125, 189, '2024-01-12 09:08:45', '2024-06-11 14:41:27', '10.50', '7.00', '0.00', 0, '10.00'),
(452, 125, 160, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '17.00', '16.00', '0.00', 0, '0.00'),
(453, 125, 161, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '18.00', '17.00', '0.00', 0, '0.00'),
(454, 125, 168, '2024-01-12 09:08:45', '2024-06-11 14:50:52', '10.00', '10.00', '0.00', 0, '0.00'),
(455, 125, 169, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '17.00', '17.00', '0.00', 0, '0.00'),
(456, 125, 176, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '16.00', '16.00', '0.00', 0, '0.00'),
(457, 125, 177, '2024-01-12 09:08:45', '2024-04-02 09:46:13', '18.00', '17.00', '0.00', 0, '0.00'),
(460, 126, 216, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '12.00', '11.50', '0.00', 0, '0.00'),
(461, 126, 217, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '10.00', '16.00', '0.00', 0, '0.00'),
(462, 126, 220, '2024-01-15 08:15:30', '2024-04-04 09:43:36', '15.50', '10.00', '0.00', 0, '0.00'),
(463, 126, 221, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '17.00', '18.00', '0.00', 0, '0.00'),
(464, 126, 224, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '15.50', '8.50', '0.00', 0, '12.00'),
(465, 126, 226, '2024-01-15 08:15:30', '2024-04-04 09:43:36', '10.00', '14.00', '0.00', 0, '0.00'),
(466, 126, 227, '2024-01-15 08:15:30', '2024-04-04 09:43:36', '13.00', '10.00', '0.00', 0, '0.00'),
(467, 126, 229, '2024-01-15 08:15:30', '2024-06-11 14:25:28', '15.00', '1.00', '0.00', 0, '9.00'),
(468, 126, 230, '2024-01-15 08:15:30', '2024-06-11 14:25:28', '13.75', '2.00', '0.00', 0, '9.00'),
(469, 126, 233, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '18.00', '15.00', '0.00', 0, '0.00'),
(470, 126, 234, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '16.00', '13.00', '0.00', 0, '0.00'),
(471, 126, 235, '2024-01-15 08:15:30', '2024-06-11 14:25:28', '8.00', '4.50', '0.00', 0, '11.00'),
(472, 126, 218, '2024-01-15 08:15:30', '2024-05-03 16:37:34', '12.00', '13.00', '0.00', 0, '0.00'),
(473, 126, 219, '2024-01-15 08:15:30', '2024-05-03 16:37:33', '10.00', '20.00', '0.00', 0, '0.00'),
(474, 126, 222, '2024-01-15 08:15:30', '2024-04-04 10:09:55', '15.50', '8.50', '0.00', 0, '0.00'),
(475, 126, 223, '2024-01-15 08:15:30', '2024-04-02 09:46:13', '16.50', '15.00', '0.00', 0, '0.00'),
(476, 126, 225, '2024-01-15 08:15:30', '2024-06-11 14:33:36', '15.50', '12.00', '0.00', 0, '0.00'),
(477, 126, 228, '2024-01-15 08:15:30', '2024-06-10 15:01:33', '10.00', '6.50', '0.00', 0, '10.00'),
(478, 126, 231, '2024-01-15 08:15:30', '2024-06-11 14:41:27', '18.00', '15.00', '0.00', 0, '0.00'),
(479, 126, 232, '2024-01-15 08:15:30', '2024-04-04 10:50:40', '16.00', '11.00', '0.00', 0, '0.00'),
(482, 127, 216, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '12.00', '10.00', '0.00', 0, '0.00'),
(483, 127, 217, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '13.00', '16.00', '0.00', 0, '0.00'),
(484, 127, 220, '2024-01-15 08:18:06', '2024-04-04 09:43:36', '14.50', '10.00', '0.00', 0, '0.00'),
(485, 127, 221, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '17.00', '17.00', '0.00', 0, '0.00'),
(486, 127, 224, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '14.50', '8.50', '0.00', 0, '11.50'),
(487, 127, 226, '2024-01-15 08:18:06', '2024-04-04 09:43:36', '9.00', '14.00', '0.00', 0, '0.00'),
(488, 127, 227, '2024-01-15 08:18:06', '2024-04-04 09:43:36', '12.00', '12.00', '0.00', 0, '0.00'),
(489, 127, 229, '2024-01-15 08:18:06', '2024-06-11 14:25:28', '15.00', '2.00', '0.00', 0, '9.00'),
(490, 127, 230, '2024-01-15 08:18:06', '2024-06-11 14:25:28', '13.75', '2.75', '0.00', 0, '9.00'),
(491, 127, 233, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '18.00', '15.00', '0.00', 0, '0.00'),
(492, 127, 234, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '15.00', '12.00', '0.00', 0, '0.00'),
(493, 127, 235, '2024-01-15 08:18:06', '2024-06-11 14:25:28', '9.00', '4.50', '0.00', 0, '11.00'),
(494, 127, 218, '2024-01-15 08:18:06', '2024-05-03 16:37:34', '12.00', '11.00', '0.00', 0, '0.00'),
(495, 127, 219, '2024-01-15 08:18:06', '2024-05-03 16:37:33', '13.00', '12.00', '0.00', 0, '0.00'),
(496, 127, 222, '2024-01-15 08:18:06', '2024-04-04 10:09:55', '14.50', '11.00', '0.00', 0, '0.00'),
(497, 127, 223, '2024-01-15 08:18:06', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(498, 127, 225, '2024-01-15 08:18:06', '2024-06-11 14:33:36', '14.50', '11.50', '0.00', 0, '0.00'),
(499, 127, 228, '2024-01-15 08:18:06', '2024-06-10 15:01:33', '10.00', '7.00', '0.00', 0, '10.00'),
(500, 127, 231, '2024-01-15 08:18:06', '2024-06-11 14:41:27', '18.00', '15.00', '0.00', 0, '0.00'),
(501, 127, 232, '2024-01-15 08:18:06', '2024-04-04 10:50:40', '14.00', '10.00', '0.00', 0, '0.00'),
(504, 128, 216, '2024-01-15 08:19:36', '2024-04-02 09:46:13', '13.00', '10.00', '0.00', 0, '0.00'),
(505, 128, 217, '2024-01-15 08:19:36', '2024-04-02 09:46:13', '8.00', '17.00', '0.00', 0, '0.00'),
(506, 128, 220, '2024-01-15 08:19:36', '2024-04-04 09:43:36', '13.50', '10.00', '0.00', 0, '0.00'),
(507, 128, 221, '2024-01-15 08:19:36', '2024-04-02 09:46:13', '17.00', '17.50', '0.00', 0, '0.00'),
(508, 128, 224, '2024-01-15 08:19:36', '2024-04-02 09:46:13', '15.00', '9.00', '0.00', 0, '12.00'),
(509, 128, 226, '2024-01-15 08:19:36', '2024-04-04 09:43:36', '8.00', '11.00', '0.00', 0, '0.00'),
(510, 128, 227, '2024-01-15 08:19:36', '2024-04-04 09:43:36', '8.00', '11.00', '0.00', 0, '0.00'),
(511, 128, 229, '2024-01-15 08:19:36', '2024-06-11 14:25:28', '12.00', '3.00', '0.00', 0, '9.50'),
(512, 128, 230, '2024-01-15 08:19:36', '2024-06-11 14:25:28', '16.50', '2.50', '0.00', 0, '9.00'),
(513, 128, 233, '2024-01-15 08:19:36', '2024-04-02 09:46:13', '18.00', '10.00', '0.00', 0, '0.00'),
(514, 128, 234, '2024-01-15 08:19:36', '2024-04-02 09:46:13', '15.00', '10.00', '0.00', 0, '0.00'),
(515, 128, 235, '2024-01-15 08:19:36', '2024-06-11 14:25:28', '8.00', '2.00', '0.00', 0, '11.00'),
(516, 128, 218, '2024-01-15 08:19:36', '2024-05-03 16:37:34', '13.00', '9.00', '0.00', 0, '0.00'),
(517, 128, 219, '2024-01-15 08:19:36', '2024-05-03 16:37:33', '8.00', '11.00', '0.00', 0, '0.00'),
(518, 128, 222, '2024-01-15 08:19:36', '2024-04-04 10:09:55', '13.50', '11.00', '0.00', 0, '0.00'),
(519, 128, 223, '2024-01-15 08:19:36', '2024-03-21 09:35:47', '15.50', '12.75', '0.00', 0, '0.00'),
(520, 128, 225, '2024-01-15 08:19:36', '2024-06-11 14:33:36', '15.00', '12.00', '0.00', 0, '0.00'),
(521, 128, 228, '2024-01-15 08:19:36', '2024-06-10 15:01:33', '10.00', '6.00', '0.00', 0, '10.00'),
(522, 128, 231, '2024-01-15 08:19:36', '2024-06-11 14:41:27', '18.00', '10.00', '0.00', 0, '0.00'),
(523, 128, 232, '2024-01-15 08:19:36', '2024-04-04 10:50:40', '15.00', '15.00', '0.00', 0, '0.00'),
(526, 129, 216, '2024-01-15 08:22:35', '2024-06-13 11:30:41', '10.00', '2.00', '0.00', 0, '10.00'),
(527, 129, 217, '2024-01-15 08:22:35', '2024-04-02 09:46:13', '12.00', '15.00', '0.00', 0, '0.00'),
(528, 129, 220, '2024-01-15 08:22:35', '2024-04-04 09:43:36', '13.50', '10.00', '0.00', 0, '0.00'),
(529, 129, 221, '2024-01-15 08:22:35', '2024-04-02 09:46:13', '16.50', '17.50', '0.00', 0, '0.00'),
(530, 129, 224, '2024-01-15 08:22:35', '2024-04-04 09:43:36', '12.50', '2.50', '0.00', 0, '9.00'),
(531, 129, 226, '2024-01-15 08:22:35', '2024-04-04 09:43:36', '9.00', '12.00', '0.00', 0, '0.00'),
(532, 129, 227, '2024-01-15 08:22:35', '2024-04-04 09:43:36', '9.00', '13.00', '0.00', 0, '0.00'),
(533, 129, 229, '2024-01-15 08:22:35', '2024-06-11 14:25:28', '19.00', '0.00', '0.00', 0, '9.00'),
(534, 129, 230, '2024-01-15 08:22:35', '2024-06-11 14:25:28', '17.75', '0.00', '0.00', 0, '9.00'),
(535, 129, 233, '2024-01-15 08:22:35', '2024-04-02 09:46:13', '12.00', '15.00', '0.00', 0, '0.00'),
(536, 129, 234, '2024-01-15 08:22:35', '2024-04-02 09:46:13', '14.00', '11.50', '0.00', 0, '0.00'),
(537, 129, 235, '2024-01-15 08:22:35', '2024-04-05 13:00:32', '5.50', '12.00', '0.00', 0, '0.00'),
(538, 129, 218, '2024-01-15 08:22:35', '2024-05-03 16:37:34', '10.00', '11.00', '0.00', 0, '0.00'),
(539, 129, 219, '2024-01-15 08:22:35', '2024-05-03 16:37:33', '12.00', '11.00', '0.00', 0, '0.00'),
(540, 129, 222, '2024-01-15 08:22:35', '2024-04-04 10:09:55', '13.50', '11.00', '0.00', 0, '0.00'),
(541, 129, 223, '2024-01-15 08:22:35', '2024-04-02 09:46:13', '16.00', '13.50', '0.00', 0, '0.00'),
(542, 129, 225, '2024-01-15 08:22:35', '2024-06-11 14:33:36', '12.50', '9.00', '0.00', 0, '0.00'),
(543, 129, 228, '2024-01-15 08:22:35', '2024-06-10 15:01:33', '10.00', '6.00', '0.00', 0, '10.00'),
(544, 129, 231, '2024-01-15 08:22:35', '2024-06-11 14:41:27', '12.00', '15.00', '0.00', 0, '0.00'),
(545, 129, 232, '2024-01-15 08:22:35', '2024-04-04 10:50:40', '14.00', '11.00', '0.00', 0, '0.00'),
(548, 130, 216, '2024-01-15 08:25:26', '2024-04-04 09:43:36', '10.00', '10.00', '0.00', 0, '0.00'),
(549, 130, 217, '2024-01-15 08:25:26', '2024-04-02 09:46:13', '8.00', '20.00', '0.00', 0, '0.00'),
(550, 130, 220, '2024-01-15 08:25:26', '2024-04-04 09:43:36', '13.50', '10.00', '0.00', 0, '0.00'),
(551, 130, 221, '2024-01-15 08:25:26', '2024-04-02 09:46:13', '16.50', '16.00', '0.00', 0, '0.00'),
(552, 130, 224, '2024-01-15 08:25:26', '2024-04-02 09:46:13', '14.00', '8.00', '0.00', 0, '11.00'),
(553, 130, 226, '2024-01-15 08:25:26', '2024-04-04 09:43:36', '10.00', '11.00', '0.00', 0, '0.00'),
(554, 130, 227, '2024-01-15 08:25:26', '2024-04-04 09:43:36', '11.00', '12.00', '0.00', 0, '0.00'),
(555, 130, 229, '2024-01-15 08:25:26', '2024-06-11 14:25:28', '15.00', '0.00', '0.00', 0, '9.00'),
(556, 130, 230, '2024-01-15 08:25:26', '2024-06-11 14:23:46', '4.00', '0.00', '0.00', 0, '12.75'),
(557, 130, 233, '2024-01-15 08:25:26', '2024-04-02 09:46:13', '12.00', '10.00', '0.00', 0, '0.00'),
(558, 130, 234, '2024-01-15 08:25:26', '2024-04-02 09:46:13', '13.00', '14.00', '0.00', 0, '0.00'),
(559, 130, 235, '2024-01-15 08:25:26', '2024-04-05 13:00:32', '8.00', '12.00', '0.00', 0, '0.00'),
(560, 130, 218, '2024-01-15 08:25:26', '2024-06-10 15:01:33', '10.00', '7.00', '0.00', 0, '10.00'),
(561, 130, 219, '2024-01-15 08:25:26', '2024-05-03 16:37:33', '8.00', '15.50', '0.00', 0, '0.00'),
(562, 130, 222, '2024-01-15 08:25:26', '2024-04-04 10:09:55', '13.50', '10.00', '0.00', 0, '0.00'),
(563, 130, 223, '2024-01-15 08:25:26', '2024-04-04 10:09:55', '2.50', '13.25', '0.00', 0, '0.00'),
(564, 130, 225, '2024-01-15 08:25:26', '2024-06-11 14:33:36', '14.00', '11.00', '0.00', 0, '0.00'),
(565, 130, 228, '2024-01-15 08:25:26', '2024-06-10 15:01:33', '10.00', '7.00', '0.00', 0, '10.00'),
(566, 130, 231, '2024-01-15 08:25:26', '2024-06-11 14:41:27', '15.00', '10.00', '0.00', 0, '0.00'),
(567, 130, 232, '2024-01-15 08:25:26', '2024-04-04 10:50:40', '14.00', '9.00', '0.00', 0, '0.00'),
(570, 131, 32, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '12.00', '12.00', '0.00', 0, '0.00'),
(571, 131, 33, '2024-01-17 10:15:18', '2024-04-04 11:54:27', '10.00', '10.00', '0.00', 0, '0.00'),
(572, 131, 357, '2024-01-17 10:15:18', '2024-06-10 14:11:00', '10.00', '3.00', '0.00', 0, '10.00'),
(573, 131, 358, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '13.00', '14.00', '0.00', 0, '0.00'),
(574, 131, 359, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '8.00', '13.00', '0.00', 0, '0.00'),
(575, 131, 360, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '20.00', '15.00', '0.00', 0, '0.00'),
(576, 131, 361, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '12.75', '14.00', '0.00', 0, '0.00'),
(577, 131, 363, '2024-01-17 10:15:18', '2024-04-04 11:54:27', '17.00', '8.00', '0.00', 0, '0.00'),
(578, 131, 364, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '14.00', '10.00', '0.00', 0, '0.00'),
(581, 131, 367, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '14.00', '16.00', '0.00', 0, '0.00'),
(582, 131, 368, '2024-01-17 10:15:18', '2024-06-10 14:13:30', '10.00', '10.00', '0.00', 0, '0.00'),
(583, 131, 369, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '11.00', '11.00', '0.00', 0, '0.00'),
(584, 131, 370, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '12.50', '18.00', '0.00', 0, '0.00'),
(586, 131, 372, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '12.00', '16.00', '0.00', 0, '0.00'),
(587, 131, 373, '2024-01-17 10:15:18', '2024-06-10 14:13:30', '10.00', '2.00', '0.00', 0, '10.00'),
(588, 131, 374, '2024-01-17 10:15:18', '2024-04-04 11:49:19', '11.00', '12.00', '0.00', 0, '0.00'),
(589, 131, 375, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '17.00', '20.00', '0.00', 0, '0.00'),
(590, 131, 376, '2024-01-17 10:15:18', '2024-04-02 09:46:13', '12.00', '14.00', '0.00', 0, '0.00'),
(594, 132, 32, '2024-01-17 10:16:23', '2024-06-10 14:11:00', '5.00', '10.00', '0.00', 0, '13.00'),
(595, 132, 33, '2024-01-17 10:16:23', '2024-06-10 14:11:00', '4.00', '6.00', '0.00', 0, '13.00'),
(596, 132, 357, '2024-01-17 10:16:23', '2024-06-10 14:11:00', '4.00', '4.00', '0.00', 0, '13.00'),
(597, 132, 358, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(598, 132, 359, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '13.00', '15.00', '0.00', 0, '0.00'),
(599, 132, 360, '2024-01-17 10:16:23', '2024-04-04 11:54:27', '10.00', '10.00', '0.00', 0, '0.00'),
(600, 132, 361, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '11.50', '11.00', '0.00', 0, '0.00'),
(601, 132, 363, '2024-01-17 10:16:23', '2024-04-04 11:54:27', '18.00', '7.00', '0.00', 0, '0.00'),
(602, 132, 364, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '16.00', '10.00', '0.00', 0, '0.00'),
(605, 132, 367, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '16.00', '17.00', '0.00', 0, '0.00'),
(606, 132, 368, '2024-01-17 10:16:23', '2024-06-10 14:13:30', '10.00', '10.00', '0.00', 0, '0.00'),
(607, 132, 369, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '15.00', '10.00', '0.00', 0, '0.00'),
(608, 132, 370, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '12.00', '17.00', '0.00', 0, '0.00'),
(610, 132, 372, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(611, 132, 373, '2024-01-17 10:16:23', '2024-06-10 14:13:30', '10.00', '0.00', '0.00', 0, '10.00'),
(612, 132, 374, '2024-01-17 10:16:23', '2024-04-04 11:49:19', '11.00', '11.00', '0.00', 0, '0.00'),
(613, 132, 375, '2024-01-17 10:16:23', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(614, 132, 376, '2024-01-17 10:16:23', '2024-06-10 14:13:30', '14.00', '0.00', '0.00', 0, '9.00'),
(618, 133, 32, '2024-01-17 10:17:04', '2024-06-10 14:11:00', '9.00', '10.00', '0.00', 0, '12.00'),
(619, 133, 33, '2024-01-17 10:17:04', '2024-06-10 14:11:00', '8.00', '6.00', '0.00', 0, '11.50'),
(620, 133, 357, '2024-01-17 10:17:04', '2024-06-10 14:11:00', '8.00', '0.00', '0.00', 0, '11.50'),
(621, 133, 358, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '16.00', '15.00', '0.00', 0, '0.00'),
(622, 133, 359, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '16.00', '19.00', '0.00', 0, '0.00'),
(623, 133, 360, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '14.00', '10.00', '0.00', 0, '0.00'),
(624, 133, 361, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '14.75', '13.50', '0.00', 0, '0.00'),
(625, 133, 363, '2024-01-17 10:17:04', '2024-04-04 11:54:27', '19.00', '7.00', '0.00', 0, '0.00'),
(626, 133, 364, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '15.00', '10.00', '0.00', 0, '0.00'),
(629, 133, 367, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '15.00', '8.00', '0.00', 0, '0.00'),
(630, 133, 368, '2024-01-17 10:17:04', '2024-06-10 14:13:30', '10.00', '10.00', '0.00', 0, '0.00'),
(631, 133, 369, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '19.00', '12.00', '0.00', 0, '0.00'),
(632, 133, 370, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '12.00', '15.00', '0.00', 0, '0.00'),
(634, 133, 372, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '14.00', '20.00', '0.00', 0, '0.00'),
(635, 133, 373, '2024-01-17 10:17:04', '2024-06-10 14:13:30', '10.00', '0.00', '0.00', 0, '10.00'),
(636, 133, 374, '2024-01-17 10:17:04', '2024-04-04 11:49:19', '11.00', '14.00', '0.00', 0, '0.00'),
(637, 133, 375, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '16.00', '12.00', '0.00', 0, '0.00'),
(638, 133, 376, '2024-01-17 10:17:04', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(642, 134, 32, '2024-01-17 10:18:24', '2024-06-10 14:11:00', '4.00', '10.00', '0.00', 0, '12.75'),
(643, 134, 33, '2024-01-17 10:18:24', '2024-04-04 11:54:27', '9.00', '11.00', '0.00', 0, '0.00'),
(644, 134, 357, '2024-01-17 10:18:24', '2024-04-04 11:54:27', '9.00', '11.00', '0.00', 0, '0.00'),
(645, 134, 358, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '12.00', '10.00', '0.00', 0, '0.00'),
(646, 134, 359, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '20.00', '17.00', '0.00', 0, '0.00'),
(647, 134, 360, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '20.00', '20.00', '0.00', 0, '0.00'),
(648, 134, 361, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '13.50', '15.50', '0.00', 0, '0.00'),
(649, 134, 363, '2024-01-17 10:18:24', '2024-04-04 11:54:27', '18.00', '9.00', '0.00', 0, '0.00'),
(650, 134, 364, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '16.00', '20.00', '0.00', 0, '0.00'),
(653, 134, 367, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '14.00', '20.00', '0.00', 0, '0.00'),
(654, 134, 368, '2024-01-17 10:18:24', '2024-06-10 14:13:30', '10.00', '10.00', '0.00', 0, '0.00'),
(655, 134, 369, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '10.00', '14.00', '0.00', 0, '0.00'),
(656, 134, 370, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '12.00', '15.00', '0.00', 0, '0.00'),
(658, 134, 372, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '13.00', '20.00', '0.00', 0, '0.00'),
(659, 134, 373, '2024-01-17 10:18:24', '2024-06-10 14:13:30', '10.00', '11.00', '0.00', 0, '0.00'),
(660, 134, 374, '2024-01-17 10:18:24', '2024-04-04 11:49:19', '11.00', '13.00', '0.00', 0, '0.00'),
(661, 134, 375, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '18.00', '20.00', '0.00', 0, '0.00'),
(662, 134, 376, '2024-01-17 10:18:24', '2024-04-02 09:46:13', '11.00', '20.00', '0.00', 0, '0.00'),
(666, 135, 32, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '1.00', '0.00', 0, '0.00'),
(667, 135, 33, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(668, 135, 357, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(669, 135, 358, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(670, 135, 359, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(671, 135, 360, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '12.00', '1.00', '0.00', 0, '0.00'),
(672, 135, 361, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '11.75', '0.00', '0.00', 0, '0.00'),
(673, 135, 363, '2024-01-17 10:19:05', '2024-04-04 11:54:27', '18.00', '2.00', '0.00', 0, '0.00'),
(674, 135, 364, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '15.00', '14.00', '0.00', 0, '0.00'),
(677, 135, 367, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(678, 135, 368, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(679, 135, 369, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(680, 135, 370, '2024-01-17 10:19:05', '2024-02-05 14:50:41', '10.50', '14.15', '0.00', 0, '0.00'),
(682, 135, 372, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(683, 135, 373, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(684, 135, 374, '2024-01-17 10:19:05', '2024-04-04 11:49:19', '11.00', '11.00', '0.00', 0, '0.00'),
(685, 135, 375, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(686, 135, 376, '2024-01-17 10:19:05', '2024-04-02 09:46:13', '0.00', '0.00', '0.00', 0, '0.00'),
(690, 131, 429, NULL, '2024-02-05 14:54:20', '16.50', '16.15', '0.00', 0, '0.00'),
(691, 132, 429, NULL, '2024-02-05 14:54:20', '16.00', '17.15', '0.00', 0, '0.00'),
(692, 133, 429, NULL, '2024-04-02 09:46:13', '16.00', '15.00', '0.00', 0, '0.00'),
(693, 134, 429, NULL, '2024-04-02 09:46:13', '16.00', '10.00', '0.00', 0, '0.00'),
(694, 135, 429, NULL, '2024-04-02 09:46:13', '11.00', '14.00', '0.00', 0, '0.00'),
(695, 136, 22, '2024-01-17 11:02:03', '2024-06-10 14:17:36', '10.00', '14.00', '0.00', 0, '0.00'),
(696, 136, 23, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '12.00', '17.00', '0.00', 0, '0.00'),
(697, 136, 408, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '14.00', '12.00', '0.00', 0, '0.00'),
(698, 136, 409, '2024-01-17 11:02:03', '2024-06-10 14:36:31', '10.00', '10.00', '0.00', 0, '0.00'),
(699, 136, 410, '2024-01-17 11:02:03', '2024-06-12 07:47:56', '16.00', '17.00', '0.00', 0, '0.00'),
(700, 136, 411, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '16.50', '15.50', '0.00', 0, '0.00'),
(701, 136, 412, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '16.00', '16.00', '0.00', 0, '0.00'),
(702, 136, 413, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '14.00', '18.00', '0.00', 0, '0.00'),
(703, 136, 414, '2024-01-17 11:02:03', '2024-06-12 07:47:56', '11.00', '13.00', '0.00', 0, '0.00'),
(704, 136, 415, '2024-01-17 11:02:03', '2024-06-12 07:47:56', '9.50', '10.50', '0.00', 0, '0.00'),
(705, 136, 416, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '17.50', '18.00', '0.00', 0, '0.00'),
(706, 136, 417, '2024-01-17 11:02:03', '2024-06-12 07:47:56', '9.50', '11.00', '0.00', 0, '0.00'),
(707, 136, 418, '2024-01-17 11:02:03', '2024-06-12 08:36:20', '10.00', '12.00', '0.00', 0, '0.00'),
(708, 136, 419, '2024-01-17 11:02:03', '2024-06-12 08:36:20', '12.50', '12.00', '0.00', 0, '0.00'),
(710, 136, 421, '2024-01-17 11:02:03', '2024-06-10 14:17:36', '10.00', '10.00', '0.00', 0, '0.00'),
(711, 136, 425, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '13.00', '15.00', '0.00', 0, '0.00'),
(712, 136, 426, '2024-01-17 11:02:03', '2024-06-10 14:24:15', '10.00', '10.00', '0.00', 0, '0.00'),
(714, 136, 423, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '18.00', '18.50', '0.00', 0, '0.00'),
(715, 136, 424, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '13.00', '18.50', '0.00', 0, '0.00'),
(717, 136, 428, '2024-01-17 11:02:03', '2024-04-02 09:46:13', '17.00', '15.00', '0.00', 0, '0.00'),
(718, 137, 22, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '20.00', '19.00', '0.00', 0, '0.00'),
(719, 137, 23, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '18.00', '17.00', '0.00', 0, '0.00'),
(720, 137, 408, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '16.00', '16.00', '0.00', 0, '0.00'),
(721, 137, 409, '2024-01-17 11:02:47', '2024-06-10 14:36:31', '10.00', '10.00', '0.00', 0, '0.00'),
(722, 137, 410, '2024-01-17 11:02:47', '2024-06-12 07:47:56', '17.00', '18.00', '0.00', 0, '0.00'),
(723, 137, 411, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '19.00', '17.50', '0.00', 0, '0.00'),
(724, 137, 412, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '15.50', '19.00', '0.00', 0, '0.00'),
(725, 137, 413, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '18.00', '18.50', '0.00', 0, '0.00'),
(726, 137, 414, '2024-01-17 11:02:47', '2024-06-12 07:47:56', '17.50', '18.70', '0.00', 0, '0.00'),
(727, 137, 415, '2024-01-17 11:02:47', '2024-06-12 07:47:56', '16.50', '17.40', '0.00', 0, '0.00'),
(728, 137, 416, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '18.50', '17.00', '0.00', 0, '0.00'),
(729, 137, 417, '2024-01-17 11:02:47', '2024-06-12 07:47:56', '9.00', '11.00', '0.00', 0, '0.00'),
(730, 137, 418, '2024-01-17 11:02:47', '2024-06-12 08:36:20', '10.50', '11.50', '0.00', 0, '0.00'),
(731, 137, 419, '2024-01-17 11:02:47', '2024-06-12 08:36:20', '11.00', '10.50', '0.00', 0, '0.00'),
(733, 137, 421, '2024-01-17 11:02:47', '2024-06-10 14:17:36', '10.00', '10.00', '0.00', 0, '0.00'),
(734, 137, 425, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '18.00', '17.00', '0.00', 0, '0.00'),
(735, 137, 426, '2024-01-17 11:02:47', '2024-06-10 14:24:15', '10.00', '10.00', '0.00', 0, '0.00'),
(737, 137, 423, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '18.50', '18.00', '0.00', 0, '0.00'),
(738, 137, 424, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '17.00', '15.00', '0.00', 0, '0.00'),
(740, 137, 428, '2024-01-17 11:02:47', '2024-04-02 09:46:13', '16.00', '13.50', '0.00', 0, '0.00'),
(741, 138, 22, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '20.00', '19.00', '0.00', 0, '0.00'),
(742, 138, 23, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '18.00', '18.00', '0.00', 0, '0.00'),
(743, 138, 408, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '16.00', '15.00', '0.00', 0, '0.00'),
(744, 138, 409, '2024-01-17 11:03:24', '2024-06-10 14:36:31', '10.00', '10.00', '0.00', 0, '0.00');
INSERT INTO `course_students` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`, `ca_marks`, `exam_marks`, `average`, `earned_credit`, `reseat_mark`) VALUES
(745, 138, 410, '2024-01-17 11:03:24', '2024-06-12 07:47:56', '16.50', '19.50', '0.00', 0, '0.00'),
(746, 138, 411, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '19.00', '17.00', '0.00', 0, '0.00'),
(747, 138, 412, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '18.00', '19.00', '0.00', 0, '0.00'),
(748, 138, 413, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '14.00', '18.50', '0.00', 0, '0.00'),
(749, 138, 414, '2024-01-17 11:03:24', '2024-06-12 07:47:56', '16.00', '18.50', '0.00', 0, '0.00'),
(750, 138, 415, '2024-01-17 11:03:24', '2024-06-12 07:47:56', '15.50', '17.50', '0.00', 0, '0.00'),
(751, 138, 416, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '19.00', '18.50', '0.00', 0, '0.00'),
(752, 138, 417, '2024-01-17 11:03:24', '2024-06-12 07:47:56', '12.00', '13.00', '0.00', 0, '0.00'),
(753, 138, 418, '2024-01-17 11:03:24', '2024-06-12 08:36:20', '11.00', '10.50', '0.00', 0, '0.00'),
(754, 138, 419, '2024-01-17 11:03:24', '2024-06-12 08:36:20', '12.00', '10.00', '0.00', 0, '0.00'),
(756, 138, 421, '2024-01-17 11:03:24', '2024-06-10 14:17:36', '10.00', '10.00', '0.00', 0, '0.00'),
(757, 138, 425, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '17.50', '14.00', '0.00', 0, '0.00'),
(758, 138, 426, '2024-01-17 11:03:24', '2024-06-10 14:24:15', '10.00', '10.00', '0.00', 0, '0.00'),
(760, 138, 423, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '18.50', '18.50', '0.00', 0, '0.00'),
(761, 138, 424, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '16.50', '17.00', '0.00', 0, '0.00'),
(763, 138, 428, '2024-01-17 11:03:24', '2024-04-02 09:46:13', '14.50', '13.00', '0.00', 0, '0.00'),
(764, 139, 24, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '11.00', '14.00', '0.00', 0, '0.00'),
(765, 139, 25, '2024-01-17 11:26:40', '2024-06-19 11:20:19', '10.00', '10.00', '0.00', 0, '0.00'),
(766, 139, 20, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '18.50', '11.50', '0.00', 0, '0.00'),
(767, 139, 21, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '19.00', '19.00', '0.00', 0, '0.00'),
(768, 139, 30, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '11.00', '10.00', '0.00', 0, '0.00'),
(769, 139, 31, '2024-01-17 11:26:40', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(770, 139, 340, '2024-01-17 11:26:40', '2024-06-19 11:20:19', '15.00', '15.00', '0.00', 0, '0.00'),
(771, 139, 341, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '18.00', '14.00', '0.00', 0, '0.00'),
(772, 139, 342, '2024-01-17 11:26:40', '2024-07-24 14:26:23', '10.00', '0.00', '0.00', 0, '10.00'),
(773, 139, 345, '2024-01-17 11:26:40', '2024-06-07 07:56:46', '17.00', '15.00', '0.00', 0, '0.00'),
(774, 139, 348, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '19.00', '19.00', '0.00', 0, '0.00'),
(775, 139, 346, '2024-01-17 11:26:40', '2024-06-13 06:44:12', '12.00', '14.50', '0.00', 0, '0.00'),
(776, 139, 347, '2024-01-17 11:26:40', '2024-06-19 12:06:56', '16.00', '16.00', '0.00', 0, '0.00'),
(777, 139, 349, '2024-01-17 11:26:40', '2024-04-02 09:46:13', '19.00', '14.00', '0.00', 0, '0.00'),
(778, 139, 350, '2024-01-17 11:26:40', '2024-06-19 12:06:56', '10.00', '10.00', '0.00', 0, '0.00'),
(779, 139, 351, '2024-01-17 11:26:40', '2024-06-19 12:06:56', '10.00', '10.00', '0.00', 0, '0.00'),
(780, 139, 352, '2024-01-17 11:26:40', '2024-05-03 16:44:29', '13.00', '16.00', '0.00', 0, '0.00'),
(781, 139, 353, '2024-01-17 11:26:40', '2024-07-24 14:11:27', '16.00', '2.00', '0.00', 0, '10.00'),
(782, 139, 354, '2024-01-17 11:26:40', '2024-06-13 06:44:12', '15.00', '14.00', '0.00', 0, '0.00'),
(783, 139, 355, '2024-01-17 11:26:40', '2024-04-02 09:46:14', '16.00', '14.00', '0.00', 0, '0.00'),
(784, 139, 356, '2024-01-17 11:26:40', '2024-04-02 09:46:14', '15.00', '14.00', '0.00', 0, '0.00'),
(785, 139, 343, '2024-01-17 11:26:40', '2024-06-19 11:32:51', '15.00', '15.00', '0.00', 0, '0.00'),
(786, 139, 344, '2024-01-17 11:26:40', '2024-07-02 11:48:36', '18.00', '18.00', '0.00', 0, '0.00'),
(787, 140, 24, '2024-01-17 11:27:45', '2024-04-08 13:46:19', '5.00', '13.00', '0.00', 0, '0.00'),
(788, 140, 25, '2024-01-17 11:27:45', '2024-06-19 11:20:19', '10.00', '10.00', '0.00', 0, '0.00'),
(789, 140, 20, '2024-01-17 11:27:45', '2024-07-01 08:07:21', '0.00', '14.29', '0.00', 0, '0.00'),
(790, 140, 21, '2024-01-17 11:27:45', '2024-04-02 09:46:14', '19.00', '15.00', '0.00', 0, '0.00'),
(791, 140, 30, '2024-01-17 11:27:45', '2024-09-13 13:39:39', '5.00', '13.00', '0.00', 0, '0.00'),
(792, 140, 31, '2024-01-17 11:27:45', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(793, 140, 340, '2024-01-17 11:27:45', '2024-06-19 11:20:19', '14.00', '14.00', '0.00', 0, '0.00'),
(794, 140, 341, '2024-01-17 11:27:45', '2024-04-02 09:46:14', '15.00', '12.00', '0.00', 0, '0.00'),
(795, 140, 342, '2024-01-17 11:27:45', '2024-07-24 14:26:23', '10.00', '5.00', '0.00', 0, '10.00'),
(796, 140, 345, '2024-01-17 11:27:45', '2024-06-19 11:32:51', '11.00', '9.75', '0.00', 0, '0.00'),
(797, 140, 348, '2024-01-17 11:27:45', '2024-04-02 09:46:14', '18.00', '16.00', '0.00', 0, '0.00'),
(798, 140, 346, '2024-01-17 11:27:45', '2024-06-13 06:44:12', '11.00', '12.00', '0.00', 0, '0.00'),
(799, 140, 347, '2024-01-17 11:27:45', '2024-06-19 12:06:56', '15.00', '15.00', '0.00', 0, '0.00'),
(800, 140, 349, '2024-01-17 11:27:45', '2024-04-02 09:46:14', '18.00', '11.00', '0.00', 0, '0.00'),
(801, 140, 350, '2024-01-17 11:27:45', '2024-06-19 12:06:56', '10.00', '10.00', '0.00', 0, '0.00'),
(802, 140, 351, '2024-01-17 11:27:45', '2024-09-13 13:39:39', '10.00', '10.00', '0.00', 0, '0.00'),
(803, 140, 352, '2024-01-17 11:27:45', '2024-06-19 12:06:56', '13.00', '9.00', '0.00', 0, '0.00'),
(804, 140, 353, '2024-01-17 11:27:45', '2024-07-24 14:11:27', '14.00', '1.00', '0.00', 0, '10.00'),
(805, 140, 354, '2024-01-17 11:27:45', '2024-06-13 06:44:12', '13.00', '13.00', '0.00', 0, '0.00'),
(806, 140, 355, '2024-01-17 11:27:45', '2024-04-02 09:46:14', '14.00', '10.00', '0.00', 0, '0.00'),
(807, 140, 356, '2024-01-17 11:27:45', '2024-04-02 09:46:14', '12.50', '11.00', '0.00', 0, '0.00'),
(808, 140, 343, '2024-01-17 11:27:45', '2024-06-19 11:32:51', '15.00', '15.00', '0.00', 0, '0.00'),
(809, 140, 344, '2024-01-17 11:27:45', '2024-07-02 11:48:36', '13.00', '13.00', '0.00', 0, '0.00'),
(810, 141, 24, '2024-01-17 11:28:36', '2024-04-08 13:46:19', '8.00', '11.00', '0.00', 0, '0.00'),
(811, 141, 25, '2024-01-17 11:28:36', '2024-06-19 11:20:19', '10.00', '10.00', '0.00', 0, '0.00'),
(812, 141, 20, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '14.50', '12.50', '0.00', 0, '0.00'),
(813, 141, 21, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '15.00', '20.00', '0.00', 0, '0.00'),
(814, 141, 30, '2024-01-17 11:28:36', '2024-12-09 09:12:13', '8.00', '10.86', '0.00', 0, '0.00'),
(815, 141, 31, '2024-01-17 11:28:36', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(816, 141, 340, '2024-01-17 11:28:36', '2024-06-19 11:20:19', '16.00', '16.00', '0.00', 0, '0.00'),
(817, 141, 341, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '12.00', '11.00', '0.00', 0, '0.00'),
(818, 141, 342, '2024-01-17 11:28:36', '2024-12-09 09:12:13', '10.00', '10.00', '0.00', 0, '0.00'),
(819, 141, 345, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(820, 141, 348, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '17.00', '14.00', '0.00', 0, '0.00'),
(821, 141, 346, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(822, 141, 347, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(823, 141, 349, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '18.50', '11.00', '0.00', 0, '0.00'),
(824, 141, 350, '2024-01-17 11:28:36', '2024-06-19 12:06:56', '10.00', '10.00', '0.00', 0, '0.00'),
(825, 141, 351, '2024-01-17 11:28:36', '2024-06-19 12:06:56', '10.00', '0.00', '0.00', 0, '0.00'),
(826, 141, 352, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(827, 141, 353, '2024-01-17 11:28:36', '2024-12-09 09:12:13', '13.00', '8.72', '0.00', 0, '0.00'),
(828, 141, 354, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(829, 141, 355, '2024-01-17 11:28:36', '2024-04-08 13:59:12', '14.00', '9.00', '0.00', 0, '0.00'),
(830, 141, 356, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '18.00', '15.00', '0.00', 0, '0.00'),
(831, 141, 343, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(832, 141, 344, '2024-01-17 11:28:36', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(833, 142, 24, '2024-01-17 11:29:30', '2024-12-09 14:31:27', '3.00', '13.00', '0.00', 0, '0.00'),
(834, 142, 25, '2024-01-17 11:29:30', '2024-06-19 11:20:19', '10.00', '10.00', '0.00', 0, '0.00'),
(835, 142, 20, '2024-01-17 11:29:30', '2024-06-19 11:20:19', '6.50', '11.50', '0.00', 0, '0.00'),
(836, 142, 21, '2024-01-17 11:29:30', '2024-04-02 09:46:14', '15.00', '16.00', '0.00', 0, '0.00'),
(837, 142, 30, '2024-01-17 11:29:30', '2024-09-13 13:51:18', '3.00', '14.00', '0.00', 0, '0.00'),
(838, 142, 31, '2024-01-17 11:29:30', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(839, 142, 340, '2024-01-17 11:29:30', '2024-06-19 11:20:19', '13.00', '13.00', '0.00', 0, '0.00'),
(840, 142, 341, '2024-01-17 11:29:30', '2024-04-08 13:46:19', '12.00', '10.00', '0.00', 0, '0.00'),
(841, 142, 342, '2024-01-17 11:29:30', '2024-09-13 13:42:19', '10.00', '10.00', '0.00', 0, '0.00'),
(842, 142, 345, '2024-01-17 11:29:30', '2024-06-07 07:56:46', '16.00', '11.50', '0.00', 0, '0.00'),
(843, 142, 348, '2024-01-17 11:29:30', '2024-04-02 09:46:14', '15.00', '13.00', '0.00', 0, '0.00'),
(844, 142, 346, '2024-01-17 11:29:30', '2024-06-13 06:44:12', '10.00', '10.00', '0.00', 0, '0.00'),
(845, 142, 347, '2024-01-17 11:29:30', '2024-06-19 12:06:56', '14.00', '14.00', '0.00', 0, '0.00'),
(846, 142, 349, '2024-01-17 11:29:30', '2024-04-02 09:46:14', '15.00', '12.00', '0.00', 0, '0.00'),
(847, 142, 350, '2024-01-17 11:29:30', '2024-06-19 12:06:56', '10.00', '10.00', '0.00', 0, '0.00'),
(848, 142, 351, '2024-01-17 11:29:30', '2024-09-13 13:51:18', '10.00', '3.00', '0.00', 0, '10.00'),
(849, 142, 352, '2024-01-17 11:29:30', '2024-09-13 13:51:18', '10.00', '0.00', '0.00', 0, '10.00'),
(850, 142, 353, '2024-01-17 11:29:30', '2024-09-13 13:51:18', '12.00', '1.00', '0.00', 0, '9.50'),
(851, 142, 354, '2024-01-17 11:29:30', '2024-06-13 06:44:12', '13.00', '13.50', '0.00', 0, '0.00'),
(852, 142, 355, '2024-01-17 11:29:30', '2024-04-02 09:46:14', '12.00', '16.00', '0.00', 0, '0.00'),
(853, 142, 356, '2024-01-17 11:29:30', '2024-04-02 09:46:14', '0.00', '14.50', '0.00', 0, '0.00'),
(854, 142, 343, '2024-01-17 11:29:30', '2024-06-19 11:32:51', '14.00', '14.00', '0.00', 0, '0.00'),
(855, 142, 344, '2024-01-17 11:29:30', '2024-07-02 11:48:36', '16.00', '16.00', '0.00', 0, '0.00'),
(856, 143, 278, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '10.50', '10.00', '0.00', 0, '0.00'),
(857, 143, 279, '2024-01-17 12:11:07', '2024-07-25 09:08:47', '13.00', '4.00', '0.00', 0, '10.50'),
(858, 143, 282, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '18.00', '19.00', '0.00', 0, '0.00'),
(859, 143, 283, '2024-01-17 12:11:07', '2024-04-08 14:18:31', '16.00', '9.00', '0.00', 0, '0.00'),
(860, 143, 286, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '14.00', '10.50', '0.00', 0, '0.00'),
(861, 143, 287, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '14.00', '14.00', '0.00', 0, '0.00'),
(862, 143, 288, '2024-01-17 12:11:07', '2024-06-07 08:40:18', '11.50', '12.00', '0.00', 0, '0.00'),
(863, 143, 292, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '15.00', '14.00', '0.00', 0, '0.00'),
(864, 143, 293, '2024-01-17 12:11:07', '2024-07-01 13:04:18', '14.00', '15.00', '0.00', 0, '0.00'),
(865, 143, 294, '2024-01-17 12:11:07', '2024-04-08 14:18:31', '12.00', '9.50', '0.00', 0, '0.00'),
(866, 143, 297, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '15.00', '17.00', '0.00', 0, '0.00'),
(867, 143, 298, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '17.00', '15.00', '0.00', 0, '0.00'),
(868, 143, 299, '2024-01-17 12:11:07', '2024-06-07 08:40:18', '13.00', '13.50', '0.00', 0, '0.00'),
(869, 143, 303, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '14.00', '14.00', '0.00', 0, '0.00'),
(870, 143, 304, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '11.50', '15.00', '0.00', 0, '0.00'),
(871, 143, 307, '2024-01-17 12:11:07', '2024-04-08 14:18:31', '7.00', '12.00', '0.00', 0, '0.00'),
(872, 143, 308, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '10.00', '11.00', '0.00', 0, '0.00'),
(873, 143, 280, '2024-01-17 12:11:07', '2024-06-28 17:59:20', '17.00', '7.00', '0.00', 0, '0.00'),
(874, 143, 281, '2024-01-17 12:11:07', '2024-04-08 14:13:58', '10.00', '13.00', '0.00', 0, '0.00'),
(875, 143, 284, '2024-01-17 12:11:07', '2024-06-07 08:34:51', '20.00', '18.00', '0.00', 0, '0.00'),
(876, 143, 285, '2024-01-17 12:11:07', '2024-07-02 11:37:49', '10.00', '10.00', '0.00', 0, '0.00'),
(877, 143, 289, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '16.50', '17.00', '0.00', 0, '0.00'),
(878, 143, 290, '2024-01-17 12:11:07', '2024-07-02 11:37:49', '13.50', '13.50', '0.00', 0, '0.00'),
(880, 143, 295, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '15.00', '12.00', '0.00', 0, '0.00'),
(881, 143, 296, '2024-01-17 12:11:07', '2024-07-01 13:08:38', '10.00', '17.50', '0.00', 0, '0.00'),
(882, 143, 300, '2024-01-17 12:11:07', '2024-04-08 14:22:24', '15.00', '17.00', '0.00', 0, '0.00'),
(883, 143, 301, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '17.00', '15.00', '0.00', 0, '0.00'),
(884, 143, 302, '2024-01-17 12:11:07', '2024-06-07 08:34:51', '14.50', '13.50', '0.00', 0, '0.00'),
(885, 143, 305, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '13.00', '13.00', '0.00', 0, '0.00'),
(886, 143, 306, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '18.00', '15.00', '0.00', 0, '0.00'),
(887, 143, 309, '2024-01-17 12:11:07', '2024-04-02 09:46:14', '13.50', '17.50', '0.00', 0, '0.00'),
(888, 143, 310, '2024-01-17 12:11:07', '2024-06-07 08:34:51', '17.00', '13.50', '0.00', 0, '0.00'),
(889, 144, 278, '2024-01-17 12:12:53', '2024-07-25 09:31:35', '3.50', '12.79', '0.00', 0, '10.00'),
(890, 144, 279, '2024-01-17 12:12:53', '2024-07-25 09:08:47', '10.00', '2.00', '0.00', 0, '10.00'),
(891, 144, 282, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '12.50', '17.00', '0.00', 0, '0.00'),
(892, 144, 283, '2024-01-17 12:12:53', '2024-04-08 14:18:31', '18.00', '6.80', '0.00', 0, '0.00'),
(893, 144, 286, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '17.50', '14.00', '0.00', 0, '0.00'),
(894, 144, 287, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '15.00', '15.00', '0.00', 0, '0.00'),
(895, 144, 288, '2024-01-17 12:12:53', '2024-07-25 09:31:35', '11.50', '9.36', '0.00', 0, '6.50'),
(896, 144, 292, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '17.00', '13.00', '0.00', 0, '0.00'),
(897, 144, 293, '2024-01-17 12:12:53', '2024-07-01 13:04:18', '12.00', '11.00', '0.00', 0, '0.00'),
(898, 144, 294, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '15.00', '10.00', '0.00', 0, '0.00'),
(899, 144, 297, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '15.00', '16.50', '0.00', 0, '0.00'),
(900, 144, 298, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '17.00', '12.00', '0.00', 0, '0.00'),
(901, 144, 299, '2024-01-17 12:12:53', '2024-06-07 08:40:18', '15.50', '10.00', '0.00', 0, '0.00'),
(902, 144, 303, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '13.50', '13.50', '0.00', 0, '0.00'),
(903, 144, 304, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '14.00', '10.50', '0.00', 0, '0.00'),
(904, 144, 307, '2024-01-17 12:12:53', '2024-04-08 14:18:31', '10.00', '11.00', '0.00', 0, '0.00'),
(905, 144, 308, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '12.00', '14.00', '0.00', 0, '0.00'),
(906, 144, 280, '2024-01-17 12:12:53', '2024-06-28 17:59:20', '18.00', '6.58', '0.00', 0, '0.00'),
(907, 144, 281, '2024-01-17 12:12:53', '2024-04-08 14:13:58', '13.00', '9.00', '0.00', 0, '0.00'),
(908, 144, 284, '2024-01-17 12:12:53', '2024-06-28 17:59:20', '16.00', '7.43', '0.00', 0, '0.00'),
(909, 144, 285, '2024-01-17 12:12:53', '2024-07-02 11:37:49', '10.00', '10.00', '0.00', 0, '0.00'),
(910, 144, 289, '2024-01-17 12:12:53', '2024-04-08 14:13:58', '10.00', '10.00', '0.00', 0, '0.00'),
(911, 144, 290, '2024-01-17 12:12:53', '2024-07-02 11:37:49', '12.50', '12.50', '0.00', 0, '0.00'),
(913, 144, 295, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '17.00', '10.00', '0.00', 0, '0.00'),
(914, 144, 296, '2024-01-17 12:12:53', '2024-06-07 08:34:51', '10.00', '10.00', '0.00', 0, '0.00'),
(915, 144, 300, '2024-01-17 12:12:53', '2024-04-08 14:22:24', '15.00', '16.50', '0.00', 0, '0.00'),
(916, 144, 301, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '17.00', '12.00', '0.00', 0, '0.00'),
(917, 144, 302, '2024-01-17 12:12:53', '2024-06-07 08:34:51', '17.00', '10.00', '0.00', 0, '0.00'),
(918, 144, 305, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '14.00', '14.00', '0.00', 0, '0.00'),
(919, 144, 306, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '14.00', '10.50', '0.00', 0, '0.00'),
(920, 144, 309, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '15.50', '18.00', '0.00', 0, '0.00'),
(921, 144, 310, '2024-01-17 12:12:53', '2024-04-02 09:46:14', '17.00', '13.00', '0.00', 0, '0.00'),
(922, 145, 278, '2024-01-17 12:14:19', '2024-07-25 09:05:53', '11.00', '5.00', '0.00', 0, '13.00'),
(923, 145, 279, '2024-01-17 12:14:19', '2024-06-28 17:59:20', '11.00', '9.58', '0.00', 0, '0.00'),
(924, 145, 282, '2024-01-17 12:14:19', '2024-02-06 08:34:06', '12.50', '10.25', '0.00', 0, '0.00'),
(925, 145, 283, '2024-01-17 12:14:19', '2024-04-08 14:18:31', '20.00', '7.50', '0.00', 0, '0.00'),
(926, 145, 286, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '15.50', '17.00', '0.00', 0, '0.00'),
(927, 145, 287, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '18.00', '18.00', '0.00', 0, '0.00'),
(928, 145, 288, '2024-01-17 12:14:19', '2024-07-25 09:05:53', '15.00', '3.50', '0.00', 0, '10.25'),
(929, 145, 292, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '14.00', '11.00', '0.00', 0, '0.00'),
(930, 145, 293, '2024-01-17 12:14:19', '2024-07-01 15:31:55', '13.00', '8.72', '0.00', 0, '0.00'),
(931, 145, 294, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '14.00', '11.00', '0.00', 0, '0.00'),
(932, 145, 297, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '15.00', '17.00', '0.00', 0, '0.00'),
(933, 145, 298, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '16.00', '13.50', '0.00', 0, '0.00'),
(934, 145, 299, '2024-01-17 12:14:19', '2024-06-07 08:40:18', '16.50', '14.50', '0.00', 0, '0.00'),
(935, 145, 303, '2024-01-17 12:14:19', '2024-07-25 09:05:53', '0.00', '0.00', '0.00', 0, '16.00'),
(936, 145, 304, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '13.00', '11.00', '0.00', 0, '0.00'),
(937, 145, 307, '2024-01-17 12:14:19', '2024-04-08 14:18:31', '9.00', '11.00', '0.00', 0, '0.00'),
(938, 145, 308, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '11.00', '14.00', '0.00', 0, '0.00'),
(939, 145, 280, '2024-01-17 12:14:19', '2024-07-25 09:15:00', '9.00', '5.00', '0.00', 0, '13.00'),
(940, 145, 281, '2024-01-17 12:14:19', '2024-04-08 14:13:58', '3.00', '13.00', '0.00', 0, '0.00'),
(941, 145, 284, '2024-01-17 12:14:19', '2024-06-28 17:59:20', '14.00', '8.29', '0.00', 0, '0.00'),
(942, 145, 285, '2024-01-17 12:14:19', '2024-06-28 17:59:20', '10.00', '10.00', '0.00', 0, '0.00'),
(943, 145, 289, '2024-01-17 12:14:19', '2024-04-08 14:13:58', '11.00', '9.80', '0.00', 0, '0.00'),
(944, 145, 290, '2024-01-17 12:14:19', '2024-07-02 11:37:49', '10.00', '10.00', '0.00', 0, '0.00'),
(946, 145, 295, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '14.00', '11.00', '0.00', 0, '0.00'),
(947, 145, 296, '2024-01-17 12:14:19', '2024-06-07 08:34:51', '18.00', '18.00', '0.00', 0, '0.00'),
(948, 145, 300, '2024-01-17 12:14:19', '2024-04-08 14:22:24', '15.00', '17.00', '0.00', 0, '0.00'),
(949, 145, 301, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '16.00', '13.50', '0.00', 0, '0.00'),
(950, 145, 302, '2024-01-17 12:14:19', '2024-06-07 08:34:51', '18.00', '14.50', '0.00', 0, '0.00'),
(951, 145, 305, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '11.00', '11.00', '0.00', 0, '0.00'),
(952, 145, 306, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '16.00', '11.00', '0.00', 0, '0.00'),
(953, 145, 309, '2024-01-17 12:14:19', '2024-04-02 09:46:14', '16.00', '14.00', '0.00', 0, '0.00'),
(954, 145, 310, '2024-01-17 12:14:19', '2024-06-07 08:34:51', '14.00', '12.00', '0.00', 0, '0.00'),
(956, 146, 239, '2024-01-17 12:25:51', '2024-04-02 09:46:14', '7.00', '15.00', '0.00', 0, '0.00'),
(957, 146, 242, '2024-01-17 12:25:51', '2024-04-02 09:46:14', '19.00', '18.50', '0.00', 0, '0.00'),
(958, 146, 243, '2024-01-17 12:25:51', '2024-04-08 14:33:38', '14.00', '9.00', '0.00', 0, '0.00'),
(959, 146, 245, '2024-01-17 12:25:51', '2024-06-07 08:18:55', '13.00', '11.00', '0.00', 0, '0.00'),
(960, 146, 247, '2024-01-17 12:25:51', '2024-07-25 08:54:05', '10.00', '0.00', '0.00', 0, '12.00'),
(962, 146, 252, '2024-01-17 12:25:51', '2024-06-07 08:18:55', '14.00', '14.00', '0.00', 0, '0.00'),
(963, 146, 254, '2024-01-17 12:25:51', '2024-07-25 08:54:05', '10.00', '0.00', '0.00', 0, '11.00'),
(964, 146, 240, '2024-01-17 12:25:51', '2024-07-25 08:55:23', '10.00', '0.00', '0.00', 0, '12.00'),
(965, 146, 241, '2024-01-17 12:25:51', '2024-06-07 08:34:51', '16.00', '10.50', '0.00', 0, '0.00'),
(966, 146, 244, '2024-01-17 12:25:51', '2024-07-25 08:51:24', '14.00', '0.00', '0.00', 0, '10.50'),
(967, 146, 246, '2024-01-17 12:25:51', '2024-06-07 08:34:51', '15.00', '15.00', '0.00', 0, '0.00'),
(968, 146, 248, '2024-01-17 12:25:51', '2024-07-02 12:02:02', '14.00', '14.00', '0.00', 0, '0.00'),
(969, 146, 250, '2024-01-17 12:25:51', '2024-07-01 12:31:14', '15.00', '18.00', '0.00', 0, '0.00'),
(970, 146, 251, '2024-01-17 12:25:51', '2024-07-25 08:51:24', '10.00', '0.00', '0.00', 0, '10.00'),
(972, 146, 258, '2024-01-17 12:25:51', '2024-07-01 13:02:44', '14.00', '8.29', '0.00', 0, '0.00'),
(973, 146, 259, '2024-01-17 12:25:51', '2024-07-25 08:51:24', '10.00', '0.00', '0.00', 0, '14.00'),
(974, 146, 256, '2024-01-17 12:25:51', '2024-04-08 14:33:38', '10.00', '12.00', '0.00', 0, '0.00'),
(975, 146, 257, '2024-01-17 12:25:51', '2024-07-25 08:54:05', '10.00', '0.00', '0.00', 0, '13.00'),
(977, 147, 239, '2024-01-17 12:26:39', '2024-04-02 09:46:14', '12.50', '13.00', '0.00', 0, '0.00'),
(978, 147, 242, '2024-01-17 12:26:39', '2024-04-02 09:46:14', '12.50', '9.00', '0.00', 0, '0.00'),
(979, 147, 243, '2024-01-17 12:26:39', '2024-07-01 13:02:45', '10.00', '10.00', '0.00', 0, '0.00'),
(980, 147, 245, '2024-01-17 12:26:39', '2024-06-07 08:18:55', '14.00', '15.00', '0.00', 0, '0.00'),
(981, 147, 247, '2024-01-17 12:26:39', '2024-07-25 08:54:05', '10.00', '14.29', '0.00', 0, '0.00'),
(983, 147, 252, '2024-01-17 12:26:39', '2024-07-01 12:33:23', '13.00', '16.00', '0.00', 0, '0.00'),
(984, 147, 254, '2024-01-17 12:26:39', '2024-07-25 08:54:05', '10.00', '16.25', '0.00', 0, '0.00'),
(985, 147, 240, '2024-01-17 12:26:39', '2024-07-25 08:55:23', '10.00', '0.00', '0.00', 0, '13.50'),
(986, 147, 241, '2024-01-17 12:26:39', '2024-06-07 08:34:51', '16.00', '11.00', '0.00', 0, '0.00'),
(987, 147, 244, '2024-01-17 12:26:39', '2024-04-02 09:46:14', '9.00', '16.00', '0.00', 0, '0.00'),
(988, 147, 246, '2024-01-17 12:26:39', '2024-06-07 08:34:51', '16.00', '16.00', '0.00', 0, '0.00'),
(989, 147, 248, '2024-01-17 12:26:39', '2024-07-02 12:02:02', '10.00', '10.00', '0.00', 0, '0.00'),
(990, 147, 250, '2024-01-17 12:26:39', '2024-04-02 09:46:14', '12.00', '16.00', '0.00', 0, '0.00'),
(991, 147, 251, '2024-01-17 12:26:39', '2024-04-02 09:46:14', '11.00', '16.50', '0.00', 0, '0.00'),
(993, 147, 258, '2024-01-17 12:26:39', '2024-04-08 14:36:16', '13.00', '9.00', '0.00', 0, '0.00'),
(994, 147, 259, '2024-01-17 12:26:39', '2024-04-02 09:46:14', '10.00', '11.00', '0.00', 0, '0.00'),
(995, 147, 256, '2024-01-17 12:26:39', '2024-04-08 14:33:38', '7.00', '12.00', '0.00', 0, '0.00'),
(996, 147, 257, '2024-01-17 12:26:39', '2024-04-08 14:33:38', '10.00', '10.00', '0.00', 0, '0.00'),
(997, 148, 15, '2024-01-17 12:43:47', '2024-06-19 12:16:46', '10.00', '10.00', '0.00', 0, '0.00'),
(998, 148, 16, '2024-01-17 12:43:47', '2024-04-08 14:05:28', '14.75', '11.00', '0.00', 0, '0.00'),
(999, 148, 52, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '11.00', '10.00', '0.00', 0, '0.00'),
(1000, 148, 53, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '15.00', '11.00', '0.00', 0, '0.00'),
(1001, 148, 36, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '13.00', '12.00', '0.00', 0, '0.00'),
(1002, 148, 37, '2024-01-17 12:43:47', '2024-04-08 14:05:28', '13.00', '13.00', '0.00', 0, '0.00'),
(1003, 148, 40, '2024-01-17 12:43:47', '2024-06-06 12:08:23', '20.00', '20.00', '0.00', 0, '0.00'),
(1004, 148, 42, '2024-01-17 12:43:47', '2024-07-24 15:55:23', '16.00', '0.00', '0.00', 0, '13.50'),
(1005, 148, 45, '2024-01-17 12:43:47', '2024-06-19 12:16:46', '17.00', '12.00', '0.00', 0, '0.00'),
(1006, 148, 46, '2024-01-17 12:43:47', '2024-06-06 12:56:10', '14.00', '13.00', '0.00', 0, '0.00'),
(1007, 148, 49, '2024-01-17 12:43:47', '2024-04-09 10:08:41', '18.50', '18.50', '0.00', 0, '0.00'),
(1008, 148, 34, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '10.00', '10.00', '0.00', 0, '0.00'),
(1009, 148, 35, '2024-01-17 12:43:47', '2024-07-24 15:51:49', '12.00', '2.00', '0.00', 0, '10.00'),
(1010, 148, 38, '2024-01-17 12:43:47', '2024-06-06 14:49:07', '19.00', '19.00', '0.00', 0, '0.00'),
(1011, 148, 39, '2024-01-17 12:43:47', '2024-06-19 12:06:56', '13.00', '11.00', '0.00', 0, '0.00'),
(1013, 148, 43, '2024-01-17 12:43:47', '2024-06-26 07:53:22', '14.00', '11.50', '0.00', 0, '0.00'),
(1014, 148, 44, '2024-01-17 12:43:47', '2024-06-06 14:49:07', '17.00', '12.00', '0.00', 0, '0.00'),
(1015, 148, 47, '2024-01-17 12:43:47', '2024-06-06 14:50:58', '14.00', '13.00', '0.00', 0, '0.00'),
(1016, 148, 48, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '18.00', '13.00', '0.00', 0, '0.00'),
(1017, 148, 50, '2024-01-17 12:43:47', '2024-06-19 12:19:10', '10.00', '10.00', '0.00', 0, '0.00'),
(1018, 148, 51, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '16.00', '9.00', '0.00', 0, '0.00'),
(1019, 148, 54, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '16.00', '11.50', '0.00', 0, '0.00'),
(1020, 148, 81, '2024-01-17 12:43:47', '2024-04-02 09:46:14', '13.50', '18.00', '0.00', 0, '0.00'),
(1021, 149, 15, '2024-01-17 12:44:47', '2024-06-19 12:16:46', '10.00', '10.00', '0.00', 0, '0.00'),
(1022, 149, 16, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '17.25', '8.00', '0.00', 0, '0.00'),
(1023, 149, 52, '2024-01-17 12:44:47', '2024-04-08 14:05:28', '7.00', '11.50', '0.00', 0, '0.00'),
(1024, 149, 53, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '11.00', '12.00', '0.00', 0, '0.00'),
(1025, 149, 36, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '19.00', '16.00', '0.00', 0, '0.00'),
(1026, 149, 37, '2024-01-17 12:44:47', '2024-04-08 14:05:28', '14.00', '14.00', '0.00', 0, '0.00'),
(1027, 149, 40, '2024-01-17 12:44:47', '2024-06-06 12:08:23', '20.00', '20.00', '0.00', 0, '0.00'),
(1028, 149, 42, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '15.00', '15.00', '0.00', 0, '0.00'),
(1029, 149, 45, '2024-01-17 12:44:47', '2024-06-19 12:16:46', '13.00', '14.50', '0.00', 0, '0.00'),
(1030, 149, 46, '2024-01-17 12:44:47', '2024-06-06 12:56:10', '15.00', '14.00', '0.00', 0, '0.00'),
(1031, 149, 49, '2024-01-17 12:44:47', '2024-04-09 10:08:41', '16.50', '16.50', '0.00', 0, '0.00'),
(1032, 149, 34, '2024-01-17 12:44:47', '2024-07-01 11:52:00', '10.00', '10.00', '0.00', 0, '0.00'),
(1033, 149, 35, '2024-01-17 12:44:47', '2024-07-01 11:52:00', '16.00', '7.43', '0.00', 0, '0.00'),
(1034, 149, 38, '2024-01-17 12:44:47', '2024-06-06 14:49:07', '20.00', '20.00', '0.00', 0, '0.00'),
(1035, 149, 39, '2024-01-17 12:44:47', '2024-06-19 12:06:56', '13.00', '11.00', '0.00', 0, '0.00'),
(1037, 149, 43, '2024-01-17 12:44:47', '2024-06-26 07:53:22', '16.00', '14.00', '0.00', 0, '0.00'),
(1038, 149, 44, '2024-01-17 12:44:47', '2024-06-06 14:49:07', '13.00', '14.50', '0.00', 0, '0.00'),
(1039, 149, 47, '2024-01-17 12:44:47', '2024-06-19 12:06:56', '15.00', '8.00', '0.00', 0, '0.00'),
(1040, 149, 48, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '17.00', '15.00', '0.00', 0, '0.00'),
(1041, 149, 50, '2024-01-17 12:44:47', '2024-06-19 12:19:10', '10.00', '10.00', '0.00', 0, '0.00'),
(1042, 149, 51, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '17.50', '14.50', '0.00', 0, '0.00'),
(1043, 149, 54, '2024-01-17 12:44:47', '2024-06-19 12:19:10', '16.00', '8.00', '0.00', 0, '0.00'),
(1044, 149, 81, '2024-01-17 12:44:47', '2024-04-02 09:46:14', '17.00', '18.00', '0.00', 0, '0.00'),
(1045, 150, 15, '2024-01-17 12:45:29', '2024-06-19 12:16:46', '10.00', '10.00', '0.00', 0, '0.00'),
(1046, 150, 16, '2024-01-17 12:45:29', '2024-04-08 14:05:28', '10.00', '10.00', '0.00', 0, '0.00'),
(1047, 150, 52, '2024-01-17 12:45:29', '2024-04-02 09:46:14', '13.00', '13.00', '0.00', 0, '0.00'),
(1048, 150, 53, '2024-01-17 12:45:29', '2024-04-08 14:05:28', '15.00', '10.00', '0.00', 0, '0.00'),
(1049, 150, 36, '2024-01-17 12:45:29', '2024-04-02 09:46:14', '17.00', '8.00', '0.00', 0, '0.00'),
(1050, 150, 37, '2024-01-17 12:45:29', '2024-04-08 14:05:28', '12.00', '12.00', '0.00', 0, '0.00'),
(1051, 150, 40, '2024-01-17 12:45:29', '2024-06-06 12:08:23', '20.00', '20.00', '0.00', 0, '0.00'),
(1052, 150, 42, '2024-01-17 12:45:29', '2024-04-02 09:46:14', '15.00', '14.50', '0.00', 0, '0.00'),
(1053, 150, 45, '2024-01-17 12:45:29', '2024-06-19 12:16:46', '11.00', '15.00', '0.00', 0, '0.00'),
(1054, 150, 46, '2024-01-17 12:45:29', '2024-06-06 12:56:10', '16.00', '15.50', '0.00', 0, '0.00'),
(1055, 150, 49, '2024-01-17 12:45:29', '2024-04-09 10:08:41', '17.75', '17.75', '0.00', 0, '0.00'),
(1056, 150, 34, '2024-01-17 12:45:29', '2024-04-02 09:46:14', '10.00', '12.00', '0.00', 0, '0.00'),
(1057, 150, 35, '2024-01-17 12:45:29', '2024-07-24 15:51:49', '10.00', '1.00', '0.00', 0, '10.00'),
(1058, 150, 38, '2024-01-17 12:45:29', '2024-06-06 14:49:07', '19.50', '19.50', '0.00', 0, '0.00'),
(1059, 150, 39, '2024-01-17 12:45:29', '2024-06-19 12:06:56', '14.00', '15.00', '0.00', 0, '0.00'),
(1061, 150, 43, '2024-01-17 12:45:29', '2024-06-26 07:53:22', '12.00', '10.00', '0.00', 0, '0.00'),
(1062, 150, 44, '2024-01-17 12:45:29', '2024-06-06 14:49:07', '11.00', '15.00', '0.00', 0, '0.00'),
(1063, 150, 47, '2024-01-17 12:45:29', '2024-06-06 14:50:58', '16.00', '12.00', '0.00', 0, '0.00'),
(1064, 150, 48, '2024-01-17 12:45:29', '2024-04-08 13:59:12', '14.00', '8.50', '0.00', 0, '0.00'),
(1065, 150, 50, '2024-01-17 12:45:29', '2024-06-19 12:19:10', '10.00', '10.00', '0.00', 0, '0.00'),
(1066, 150, 51, '2024-01-17 12:45:29', '2024-04-02 09:46:14', '19.00', '10.50', '0.00', 0, '0.00'),
(1067, 150, 54, '2024-01-17 12:45:29', '2024-07-24 16:15:19', '0.00', '14.29', '0.00', 0, '10.00'),
(1068, 150, 81, '2024-01-17 12:45:29', '2024-07-24 15:51:49', '3.00', '13.00', '0.00', 0, '7.00'),
(1069, 151, 15, '2024-01-17 12:46:19', '2024-06-19 12:16:46', '10.00', '10.00', '0.00', 0, '0.00'),
(1070, 151, 16, '2024-01-17 12:46:19', '2024-04-08 14:05:28', '17.00', '14.00', '0.00', 0, '0.00'),
(1071, 151, 52, '2024-01-17 12:46:19', '2024-04-02 09:46:14', '12.00', '10.00', '0.00', 0, '0.00'),
(1072, 151, 53, '2024-01-17 12:46:19', '2024-04-08 14:05:28', '10.00', '10.00', '0.00', 0, '0.00'),
(1073, 151, 36, '2024-01-17 12:46:19', '2024-04-02 09:46:14', '10.00', '19.00', '0.00', 0, '0.00'),
(1074, 151, 37, '2024-01-17 12:46:19', '2024-04-08 14:05:28', '14.00', '14.00', '0.00', 0, '0.00'),
(1075, 151, 40, '2024-01-17 12:46:19', '2024-06-06 12:08:23', '17.00', '17.00', '0.00', 0, '0.00'),
(1076, 151, 42, '2024-01-17 12:46:19', '2024-04-02 09:46:14', '17.00', '15.00', '0.00', 0, '0.00'),
(1077, 151, 45, '2024-01-17 12:46:19', '2024-06-19 12:16:46', '14.00', '16.00', '0.00', 0, '0.00'),
(1078, 151, 46, '2024-01-17 12:46:19', '2024-06-06 12:56:10', '14.00', '13.50', '0.00', 0, '0.00'),
(1079, 151, 49, '2024-01-17 12:46:19', '2024-09-13 13:54:49', '10.00', '0.00', '0.00', 0, '10.00'),
(1080, 151, 34, '2024-01-17 12:46:19', '2024-04-02 09:46:14', '20.00', '12.50', '0.00', 0, '0.00'),
(1081, 151, 35, '2024-01-17 12:46:19', '2024-07-01 11:52:01', '16.00', '7.43', '0.00', 0, '0.00'),
(1082, 151, 38, '2024-01-17 12:46:19', '2024-06-06 14:49:07', '18.50', '18.50', '0.00', 0, '0.00'),
(1083, 151, 39, '2024-01-17 12:46:19', '2024-07-24 15:51:49', '9.00', '0.00', '0.00', 0, '11.00'),
(1085, 151, 43, '2024-01-17 12:46:19', '2024-07-01 11:52:01', '11.00', '9.58', '0.00', 0, '0.00'),
(1086, 151, 44, '2024-01-17 12:46:19', '2024-06-06 14:49:07', '14.00', '16.00', '0.00', 0, '0.00'),
(1087, 151, 47, '2024-01-17 12:46:19', '2024-06-06 14:50:58', '15.00', '12.00', '0.00', 0, '0.00'),
(1088, 151, 48, '2024-01-17 12:46:19', '2024-04-02 09:46:14', '18.50', '11.00', '0.00', 0, '0.00'),
(1089, 151, 50, '2024-01-17 12:46:19', '2024-06-19 12:19:10', '10.00', '10.00', '0.00', 0, '0.00'),
(1090, 151, 51, '2024-01-17 12:46:19', '2024-04-02 09:46:14', '15.00', '11.00', '0.00', 0, '0.00'),
(1091, 151, 54, '2024-01-17 12:46:19', '2024-07-24 16:15:19', '16.00', '0.00', '0.00', 0, '10.00'),
(1092, 151, 81, '2024-01-17 12:46:19', '2024-04-08 13:59:12', '3.00', '13.00', '0.00', 0, '0.00'),
(1093, 153, 15, '2024-01-17 12:47:42', '2024-06-19 12:16:46', '0.00', '0.00', '0.00', 0, '0.00'),
(1094, 153, 16, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1095, 153, 52, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1096, 153, 53, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1097, 153, 36, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1098, 153, 37, '2024-01-17 12:47:42', '2024-04-08 14:05:28', '10.00', '10.00', '0.00', 0, '0.00'),
(1099, 153, 40, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1100, 153, 42, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1101, 153, 45, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1102, 153, 46, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1103, 153, 49, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1104, 153, 34, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '20.00', '0.00', '0.00', 0, '0.00'),
(1105, 153, 35, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1106, 153, 38, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1107, 153, 39, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1109, 153, 43, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1110, 153, 44, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1111, 153, 47, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1112, 153, 48, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1113, 153, 50, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1114, 153, 51, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '14.00', '0.00', '0.00', 0, '0.00'),
(1115, 153, 54, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1116, 153, 81, '2024-01-17 12:47:42', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1117, 154, 15, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1118, 154, 16, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1119, 154, 52, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '3.00', '5.00', '0.00', 0, '0.00'),
(1120, 154, 53, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1121, 154, 36, '2024-01-17 12:48:30', '2024-04-08 14:05:28', '10.00', '10.00', '0.00', 0, '0.00'),
(1122, 154, 37, '2024-01-17 12:48:30', '2024-04-08 14:05:28', '10.00', '10.00', '0.00', 0, '0.00'),
(1123, 154, 40, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1124, 154, 42, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1125, 154, 45, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1126, 154, 46, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1127, 154, 49, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1128, 154, 34, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '10.00', '2.50', '0.00', 0, '0.00'),
(1129, 154, 35, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1130, 154, 38, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1131, 154, 39, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1133, 154, 43, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1134, 154, 44, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1135, 154, 47, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1136, 154, 48, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1137, 154, 50, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1138, 154, 51, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '11.00', '11.00', '0.00', 0, '0.00'),
(1139, 154, 54, '2024-01-17 12:48:30', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1140, 154, 81, '2024-01-17 12:48:30', '2024-04-08 13:59:12', '12.00', '9.50', '0.00', 0, '0.00'),
(1141, 155, 15, '2024-01-17 12:49:10', '2024-06-19 12:16:46', '10.00', '10.00', '0.00', 0, '0.00'),
(1142, 155, 16, '2024-01-17 12:49:10', '2024-04-08 14:05:28', '17.00', '15.00', '0.00', 0, '0.00'),
(1143, 155, 52, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '16.00', '17.00', '0.00', 0, '0.00'),
(1144, 155, 53, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '14.00', '14.00', '0.00', 0, '0.00'),
(1145, 155, 36, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '18.00', '20.00', '0.00', 0, '0.00'),
(1146, 155, 37, '2024-01-17 12:49:10', '2024-04-08 14:05:28', '15.00', '15.00', '0.00', 0, '0.00'),
(1147, 155, 40, '2024-01-17 12:49:10', '2024-06-19 12:16:46', '12.00', '17.00', '0.00', 0, '0.00'),
(1148, 155, 42, '2024-01-17 12:49:10', '2024-07-24 15:55:23', '15.00', '0.00', '0.00', 0, '14.00'),
(1149, 155, 45, '2024-01-17 12:49:10', '2024-06-19 12:16:46', '10.00', '14.00', '0.00', 0, '0.00'),
(1150, 155, 46, '2024-01-17 12:49:10', '2024-06-06 12:56:10', '15.00', '16.50', '0.00', 0, '0.00'),
(1151, 155, 49, '2024-01-17 12:49:10', '2024-04-09 10:08:41', '17.00', '17.00', '0.00', 0, '0.00'),
(1152, 155, 34, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '20.00', '18.00', '0.00', 0, '0.00'),
(1153, 155, 35, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '16.00', '10.00', '0.00', 0, '0.00'),
(1154, 155, 38, '2024-01-17 12:49:10', '2024-06-19 12:06:56', '19.00', '20.00', '0.00', 0, '0.00'),
(1155, 155, 39, '2024-01-17 12:49:10', '2024-06-19 12:06:56', '10.00', '12.00', '0.00', 0, '0.00'),
(1157, 155, 43, '2024-01-17 12:49:10', '2024-06-26 07:53:23', '13.00', '11.00', '0.00', 0, '0.00'),
(1158, 155, 44, '2024-01-17 12:49:10', '2024-06-06 14:49:07', '10.00', '14.00', '0.00', 0, '0.00'),
(1159, 155, 47, '2024-01-17 12:49:10', '2024-06-06 14:50:58', '18.00', '17.00', '0.00', 0, '0.00'),
(1160, 155, 48, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '15.50', '16.00', '0.00', 0, '0.00'),
(1161, 155, 50, '2024-01-17 12:49:10', '2024-06-19 12:19:10', '10.00', '10.00', '0.00', 0, '0.00'),
(1162, 155, 51, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '12.00', '19.00', '0.00', 0, '0.00'),
(1163, 155, 54, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '16.00', '13.00', '0.00', 0, '0.00'),
(1164, 155, 81, '2024-01-17 12:49:10', '2024-04-02 09:46:14', '14.00', '16.50', '0.00', 0, '0.00'),
(1165, 156, 11, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '12.00', '11.00', '0.00', 0, '0.00'),
(1166, 156, 12, '2024-01-17 13:05:17', '2024-06-28 17:43:22', '13.00', '8.72', '0.00', 0, '0.00'),
(1167, 156, 13, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '13.50', '9.00', '0.00', 0, '0.00'),
(1168, 156, 14, '2024-01-17 13:05:17', '2024-06-28 17:05:35', '10.00', '10.00', '0.00', 0, '0.00'),
(1170, 156, 202, '2024-01-17 13:05:17', '2024-07-24 14:26:23', '10.00', '7.00', '0.00', 0, '10.50'),
(1171, 156, 203, '2024-01-17 13:05:17', '2024-04-08 14:33:38', '10.50', '10.00', '0.00', 0, '0.00'),
(1172, 156, 206, '2024-01-17 13:05:17', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(1173, 156, 208, '2024-01-17 13:05:17', '2024-07-24 14:34:39', '12.35', '9.00', '0.00', 0, '12.50'),
(1174, 156, 209, '2024-01-17 13:05:17', '2024-07-02 11:24:51', '12.00', '9.50', '0.00', 0, '0.00'),
(1175, 156, 201, '2024-01-17 13:05:17', '2024-07-02 11:28:22', '15.00', '7.95', '0.00', 0, '0.00'),
(1176, 156, 212, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '12.00', '11.00', '0.00', 0, '0.00'),
(1177, 156, 213, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '9.00', '12.00', '0.00', 0, '0.00'),
(1178, 156, 197, '2024-01-17 13:05:17', '2024-06-28 17:05:35', '8.00', '10.86', '0.00', 0, '0.00'),
(1179, 156, 198, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '13.00', '13.00', '0.00', 0, '0.00'),
(1180, 156, 199, '2024-01-17 13:05:17', '2024-06-28 17:43:22', '11.00', '9.58', '0.00', 0, '0.00'),
(1181, 156, 200, '2024-01-17 13:05:17', '2024-06-28 17:43:22', '11.00', '9.58', '0.00', 0, '0.00'),
(1182, 156, 204, '2024-01-17 13:05:17', '2024-09-13 13:51:18', '10.50', '2.00', '0.00', 0, '10.00'),
(1183, 156, 205, '2024-01-17 13:05:17', '2024-06-28 17:05:35', '10.50', '9.79', '0.00', 0, '0.00'),
(1184, 156, 207, '2024-01-17 13:05:17', '2024-07-24 14:32:55', '10.00', '2.00', '0.00', 0, '10.00'),
(1185, 156, 210, '2024-01-17 13:05:17', '2024-07-24 14:40:32', '8.00', '4.75', '0.00', 0, '12.50'),
(1186, 156, 211, '2024-01-17 13:05:17', '2024-07-02 11:37:49', '12.00', '9.50', '0.00', 0, '0.00'),
(1187, 156, 214, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '8.00', '14.00', '0.00', 0, '0.00'),
(1188, 156, 215, '2024-01-17 13:05:17', '2024-04-02 09:46:14', '16.00', '8.50', '0.00', 0, '0.00'),
(1189, 157, 11, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '8.00', '10.86', '0.00', 0, '0.00'),
(1190, 157, 12, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '12.00', '9.15', '0.00', 0, '0.00'),
(1191, 157, 13, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '13.00', '16.50', '0.00', 0, '0.00'),
(1192, 157, 14, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '10.00', '10.00', '0.00', 0, '0.00'),
(1194, 157, 202, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '14.00', '9.50', '0.00', 0, '0.00'),
(1195, 157, 203, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '8.50', '12.00', '0.00', 0, '0.00'),
(1196, 157, 206, '2024-01-17 13:06:03', '2024-07-02 13:15:52', '16.50', '16.50', '0.00', 0, '0.00'),
(1197, 157, 208, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '15.25', '7.76', '0.00', 0, '0.00'),
(1198, 157, 209, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '18.00', '10.00', '0.00', 0, '0.00'),
(1199, 157, 201, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '14.00', '8.29', '0.00', 0, '0.00'),
(1200, 157, 212, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '11.00', '10.00', '0.00', 0, '0.00'),
(1201, 157, 213, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '10.00', '14.00', '0.00', 0, '0.00'),
(1202, 157, 197, '2024-01-17 13:06:03', '2024-07-24 14:32:55', '4.00', '1.00', '0.00', 0, '15.00'),
(1203, 157, 198, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '15.00', '13.00', '0.00', 0, '0.00'),
(1204, 157, 199, '2024-01-17 13:06:03', '2024-06-07 08:05:40', '13.00', '13.00', '0.00', 0, '0.00'),
(1205, 157, 200, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '14.00', '8.29', '0.00', 0, '0.00'),
(1206, 157, 204, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '8.50', '10.65', '0.00', 0, '0.00'),
(1207, 157, 205, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '8.50', '12.00', '0.00', 0, '0.00'),
(1208, 157, 207, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '0.00', '14.29', '0.00', 0, '0.00'),
(1209, 157, 210, '2024-01-17 13:06:03', '2024-06-28 17:46:22', '15.25', '7.76', '0.00', 0, '0.00'),
(1210, 157, 211, '2024-01-17 13:06:03', '2024-07-01 12:22:45', '18.00', '10.00', '0.00', 0, '0.00'),
(1211, 157, 214, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '13.00', '18.50', '0.00', 0, '0.00'),
(1212, 157, 215, '2024-01-17 13:06:03', '2024-04-02 09:46:14', '16.00', '13.50', '0.00', 0, '0.00'),
(1213, 158, 11, '2024-01-17 13:06:45', '2024-06-28 17:46:22', '10.50', '9.79', '0.00', 0, '0.00'),
(1214, 158, 12, '2024-01-17 13:06:45', '2024-06-28 17:46:22', '13.00', '8.72', '0.00', 0, '0.00'),
(1215, 158, 13, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '19.50', '20.00', '0.00', 0, '0.00'),
(1216, 158, 14, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '15.00', '11.00', '0.00', 0, '0.00'),
(1218, 158, 202, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '13.00', '12.50', '0.00', 0, '0.00'),
(1219, 158, 203, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '17.50', '15.00', '0.00', 0, '0.00'),
(1220, 158, 206, '2024-01-17 13:06:45', '2024-07-02 13:15:52', '14.50', '14.50', '0.00', 0, '0.00'),
(1221, 158, 208, '2024-01-17 13:06:45', '2024-06-28 17:46:22', '15.60', '7.60', '0.00', 0, '0.00'),
(1222, 158, 209, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '18.00', '15.00', '0.00', 0, '0.00'),
(1223, 158, 201, '2024-01-17 13:06:45', '2024-06-26 17:14:38', '17.00', '12.00', '0.00', 0, '0.00'),
(1224, 158, 212, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '8.00', '12.00', '0.00', 0, '0.00'),
(1225, 158, 213, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '11.00', '12.00', '0.00', 0, '0.00'),
(1226, 158, 197, '2024-01-17 13:06:45', '2024-06-28 17:46:22', '0.00', '14.29', '0.00', 0, '0.00'),
(1227, 158, 198, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '11.00', '12.00', '0.00', 0, '0.00'),
(1228, 158, 199, '2024-01-17 13:06:45', '2024-06-07 08:05:40', '20.00', '20.00', '0.00', 0, '0.00'),
(1229, 158, 200, '2024-01-17 13:06:45', '2024-06-28 17:46:22', '16.00', '7.43', '0.00', 0, '0.00'),
(1230, 158, 204, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '17.50', '15.50', '0.00', 0, '0.00'),
(1231, 158, 205, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '17.50', '15.00', '0.00', 0, '0.00'),
(1232, 158, 207, '2024-01-17 13:06:45', '2024-06-28 17:46:22', '0.00', '14.29', '0.00', 0, '0.00'),
(1233, 158, 210, '2024-01-17 13:06:45', '2024-06-07 08:14:03', '16.50', '10.75', '0.00', 0, '0.00'),
(1234, 158, 211, '2024-01-17 13:06:45', '2024-07-01 12:22:45', '18.00', '15.00', '0.00', 0, '0.00'),
(1235, 158, 214, '2024-01-17 13:06:45', '2024-04-02 09:46:14', '17.50', '16.00', '0.00', 0, '0.00'),
(1236, 158, 215, '2024-01-17 13:06:45', '2024-04-08 14:22:24', '13.50', '9.00', '0.00', 0, '0.00'),
(1237, 159, 11, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '9.00', '10.50', '0.00', 0, '0.00'),
(1238, 159, 12, '2024-01-17 13:07:13', '2024-06-28 17:46:22', '13.00', '8.72', '0.00', 0, '0.00'),
(1239, 159, 13, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '19.50', '20.00', '0.00', 0, '0.00'),
(1240, 159, 14, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '16.00', '12.00', '0.00', 0, '0.00'),
(1242, 159, 202, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '14.00', '15.50', '0.00', 0, '0.00'),
(1243, 159, 203, '2024-01-17 13:07:13', '2024-06-07 08:12:13', '18.00', '14.00', '0.00', 0, '0.00'),
(1244, 159, 206, '2024-01-17 13:07:13', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(1245, 159, 208, '2024-01-17 13:07:13', '2024-06-07 08:12:13', '16.30', '11.25', '0.00', 0, '0.00'),
(1246, 159, 209, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '18.00', '15.00', '0.00', 0, '0.00'),
(1247, 159, 201, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '19.00', '15.00', '0.00', 0, '0.00'),
(1248, 159, 212, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '11.00', '12.00', '0.00', 0, '0.00'),
(1249, 159, 213, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '15.00', '12.00', '0.00', 0, '0.00'),
(1250, 159, 197, '2024-01-17 13:07:13', '2024-04-02 11:46:12', '8.50', '14.00', '0.00', 0, '0.00'),
(1251, 159, 198, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '13.00', '16.00', '0.00', 0, '0.00'),
(1252, 159, 199, '2024-01-17 13:07:13', '2024-06-07 08:05:40', '19.00', '10.00', '0.00', 0, '0.00'),
(1253, 159, 200, '2024-01-17 13:07:13', '2024-06-28 17:46:22', '14.00', '8.29', '0.00', 0, '0.00'),
(1254, 159, 204, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '18.00', '16.50', '0.00', 0, '0.00'),
(1255, 159, 205, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '18.00', '11.00', '0.00', 0, '0.00'),
(1256, 159, 207, '2024-01-17 13:07:13', '2024-06-21 09:12:14', '0.00', '17.00', '0.00', 0, '0.00'),
(1257, 159, 210, '2024-01-17 13:07:13', '2024-06-28 17:46:23', '15.50', '7.65', '0.00', 0, '0.00'),
(1258, 159, 211, '2024-01-17 13:07:13', '2024-07-01 12:22:45', '18.00', '15.00', '0.00', 0, '0.00'),
(1259, 159, 214, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '17.50', '19.00', '0.00', 0, '0.00'),
(1260, 159, 215, '2024-01-17 13:07:13', '2024-04-02 09:46:14', '14.50', '14.50', '0.00', 0, '0.00'),
(1261, 160, 11, '2024-01-17 13:07:45', '2024-06-28 17:46:23', '3.00', '13.00', '0.00', 0, '0.00'),
(1262, 160, 12, '2024-01-17 13:07:45', '2024-07-24 14:26:23', '8.00', '6.00', '0.00', 0, '11.50'),
(1263, 160, 13, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '13.00', '14.50', '0.00', 0, '0.00'),
(1264, 160, 14, '2024-01-17 13:07:45', '2024-06-28 17:46:23', '16.00', '7.43', '0.00', 0, '0.00'),
(1266, 160, 202, '2024-01-17 13:07:45', '2024-07-24 14:26:23', '10.00', '6.00', '0.00', 0, '10.00'),
(1267, 160, 203, '2024-01-17 13:07:45', '2024-07-30 13:48:09', '10.00', '0.00', '0.00', 0, '10.00'),
(1268, 160, 206, '2024-01-17 13:07:45', '2024-07-02 13:15:52', '15.00', '15.00', '0.00', 0, '0.00'),
(1269, 160, 208, '2024-01-17 13:07:45', '2024-06-28 17:46:23', '13.60', '8.46', '0.00', 0, '0.00'),
(1270, 160, 209, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '10.00', '10.00', '0.00', 0, '0.00'),
(1271, 160, 201, '2024-01-17 13:07:45', '2024-07-02 11:37:49', '10.00', '10.00', '0.00', 0, '0.00'),
(1272, 160, 212, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '10.00', '11.00', '0.00', 0, '1.00'),
(1273, 160, 213, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '9.00', '12.00', '0.00', 0, '0.00'),
(1274, 160, 197, '2024-01-17 13:07:45', '2024-07-24 14:32:55', '4.50', '5.00', '0.00', 0, '15.00'),
(1275, 160, 198, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '9.00', '12.00', '0.00', 0, '0.00'),
(1276, 160, 199, '2024-01-17 13:07:45', '2024-07-02 11:32:02', '11.00', '9.75', '0.00', 0, '0.00'),
(1277, 160, 200, '2024-01-17 13:07:45', '2024-07-24 14:40:32', '11.00', '2.00', '0.00', 0, '15.00');
INSERT INTO `course_students` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`, `ca_marks`, `exam_marks`, `average`, `earned_credit`, `reseat_mark`) VALUES
(1278, 160, 204, '2024-01-17 13:07:45', '2024-07-24 14:40:32', '6.50', '5.00', '0.00', 0, '12.50'),
(1279, 160, 205, '2024-01-17 13:07:45', '2024-07-24 14:40:32', '6.50', '3.00', '0.00', 0, '11.50'),
(1280, 160, 207, '2024-01-17 13:07:45', '2024-06-28 17:46:23', '0.00', '14.29', '0.00', 0, '0.00'),
(1281, 160, 210, '2024-01-17 13:07:45', '2024-06-28 17:46:23', '12.00', '9.15', '0.00', 0, '0.00'),
(1282, 160, 211, '2024-01-17 13:07:45', '2024-07-01 12:22:45', '10.00', '10.00', '0.00', 0, '0.00'),
(1283, 160, 214, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '7.50', '14.00', '0.00', 0, '0.00'),
(1284, 160, 215, '2024-01-17 13:07:45', '2024-04-02 09:46:14', '12.00', '10.00', '0.00', 0, '0.00'),
(1285, 161, 11, '2024-01-17 13:08:15', '2024-07-24 14:26:23', '10.00', '7.50', '0.00', 0, '10.00'),
(1286, 161, 12, '2024-01-17 13:08:15', '2024-07-24 14:26:23', '8.00', '6.00', '0.00', 0, '13.00'),
(1287, 161, 13, '2024-01-17 13:08:15', '2024-04-02 09:46:14', '13.75', '13.50', '0.00', 0, '0.00'),
(1288, 161, 14, '2024-01-17 13:08:15', '2024-06-28 17:46:23', '12.00', '9.15', '0.00', 0, '0.00'),
(1290, 161, 202, '2024-01-17 13:08:15', '2024-04-08 14:33:37', '12.00', '9.50', '0.00', 0, '0.00'),
(1291, 161, 203, '2024-01-17 13:08:15', '2024-06-28 17:46:23', '16.00', '7.43', '0.00', 0, '0.00'),
(1292, 161, 206, '2024-01-17 13:08:15', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(1293, 161, 208, '2024-01-17 13:08:15', '2024-07-24 14:34:39', '10.30', '4.76', '0.00', 0, '11.00'),
(1294, 161, 209, '2024-01-17 13:08:15', '2024-04-02 09:46:14', '12.00', '10.00', '0.00', 0, '0.00'),
(1295, 161, 201, '2024-01-17 13:08:15', '2024-07-02 11:30:27', '11.00', '9.75', '0.00', 0, '0.00'),
(1296, 161, 212, '2024-01-17 13:08:15', '2024-04-08 14:33:38', '9.00', '11.00', '0.00', 0, '0.00'),
(1297, 161, 213, '2024-01-17 13:08:15', '2024-04-02 09:46:14', '10.00', '12.00', '0.00', 0, '0.00'),
(1298, 161, 197, '2024-01-17 13:08:15', '2024-06-28 17:46:23', '8.00', '10.86', '0.00', 0, '0.00'),
(1299, 161, 198, '2024-01-17 13:08:15', '2024-04-02 09:46:14', '11.00', '12.00', '0.00', 0, '0.00'),
(1300, 161, 199, '2024-01-17 13:08:15', '2024-07-02 11:32:02', '11.00', '9.75', '0.00', 0, '0.00'),
(1301, 161, 200, '2024-01-17 13:08:15', '2024-07-24 14:40:32', '10.00', '0.00', '0.00', 0, '10.00'),
(1302, 161, 204, '2024-01-17 13:08:15', '2024-07-24 14:40:32', '16.00', '2.00', '0.00', 0, '9.00'),
(1303, 161, 205, '2024-01-17 13:08:15', '2024-07-24 14:40:32', '16.00', '3.00', '0.00', 0, '15.00'),
(1304, 161, 207, '2024-01-17 13:08:15', '2024-07-24 14:32:55', '10.00', '5.00', '0.00', 0, '10.00'),
(1305, 161, 210, '2024-01-17 13:08:15', '2024-07-24 14:40:32', '10.00', '0.00', '0.00', 0, '11.00'),
(1306, 161, 211, '2024-01-17 13:08:15', '2024-07-01 12:22:45', '12.00', '10.00', '0.00', 0, '0.00'),
(1307, 161, 214, '2024-01-17 13:08:15', '2024-04-02 09:46:14', '11.50', '12.50', '0.00', 0, '0.00'),
(1308, 161, 215, '2024-01-17 13:08:15', '2024-04-02 09:46:14', '14.50', '13.50', '0.00', 0, '0.00'),
(1309, 162, 11, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1310, 162, 12, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1311, 162, 13, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1312, 162, 14, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1314, 162, 202, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1315, 162, 203, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1316, 162, 206, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1317, 162, 208, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1318, 162, 209, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1319, 162, 201, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1320, 162, 212, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1321, 162, 213, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1322, 162, 197, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1323, 162, 198, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1324, 162, 199, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1325, 162, 200, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1326, 162, 204, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1327, 162, 205, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1328, 162, 207, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1329, 162, 210, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1330, 162, 211, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1331, 162, 214, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1332, 162, 215, '2024-01-17 13:09:04', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1333, 118, 430, NULL, '2024-04-02 11:23:25', '14.50', '15.00', '0.00', 0, '0.00'),
(1334, 119, 430, NULL, '2024-04-02 11:23:25', '10.00', '11.50', '0.00', 0, '0.00'),
(1335, 120, 430, NULL, '2024-04-02 11:23:25', '11.00', '12.50', '0.00', 0, '0.00'),
(1336, 121, 430, NULL, '2024-06-11 15:10:05', '11.00', '0.00', '0.00', 0, '9.75'),
(1337, 118, 431, NULL, '2024-04-04 11:20:57', '16.00', '11.00', '0.00', 0, '0.00'),
(1338, 119, 431, NULL, '2024-04-04 11:20:57', '15.50', '14.00', '0.00', 0, '0.00'),
(1339, 120, 431, NULL, '2024-04-04 11:20:57', '15.00', '8.00', '0.00', 0, '0.00'),
(1340, 121, 431, NULL, '2024-04-04 11:20:57', '15.50', '8.00', '0.00', 0, '0.00'),
(1928, 175, 24, '2024-03-20 09:43:47', '2024-11-23 02:44:06', '0.00', '0.00', '0.00', 0, '0.00'),
(1929, 175, 25, '2024-03-20 09:43:47', '2024-06-19 11:20:19', '10.00', '10.00', '0.00', 0, '0.00'),
(1930, 175, 20, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1931, 175, 21, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '13.00', '10.00', '0.00', 0, '0.00'),
(1932, 175, 30, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1933, 175, 31, '2024-03-20 09:43:47', '2024-07-02 13:15:52', '10.00', '10.00', '0.00', 0, '0.00'),
(1934, 175, 340, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1935, 175, 341, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1936, 175, 342, '2024-03-20 09:43:47', '2024-06-19 11:32:51', '10.00', '0.00', '0.00', 0, '0.00'),
(1937, 175, 345, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1938, 175, 348, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1939, 175, 346, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1940, 175, 347, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1941, 175, 349, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1942, 175, 350, '2024-03-20 09:43:47', '2024-06-19 12:06:56', '10.00', '10.00', '0.00', 0, '0.00'),
(1943, 175, 351, '2024-03-20 09:43:47', '2024-06-19 12:06:56', '0.00', '0.00', '0.00', 0, '0.00'),
(1944, 175, 352, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1945, 175, 353, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1946, 175, 354, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1947, 175, 355, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '14.00', '14.00', '0.00', 0, '0.00'),
(1948, 175, 356, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1949, 175, 343, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(1950, 175, 344, '2024-03-20 09:43:47', '2024-04-02 09:46:14', '0.00', '0.00', '0.00', 0, '0.00'),
(2043, 122, 436, NULL, '2024-04-04 11:11:05', '10.00', '10.00', '0.00', 0, '0.00'),
(2044, 123, 436, NULL, '2024-04-04 11:11:05', '16.00', '16.00', '0.00', 0, '0.00'),
(2045, 124, 436, NULL, '2024-04-04 11:11:05', '12.00', '13.00', '0.00', 0, '0.00'),
(2046, 125, 436, NULL, '2024-04-04 11:11:05', '14.00', '11.00', '0.00', 0, '0.00'),
(2047, 122, 437, NULL, '2024-06-11 14:41:27', '16.00', '0.00', '0.00', 0, '8.50'),
(2048, 123, 437, NULL, '2024-06-11 14:41:27', '12.00', '0.00', '0.00', 0, '9.50'),
(2049, 124, 437, NULL, '2024-06-11 14:41:27', '12.00', '9.00', '0.00', 0, '9.50'),
(2050, 125, 437, NULL, '2024-05-03 16:37:34', '14.00', '10.00', '0.00', 0, '0.00'),
(2051, 118, 438, NULL, '2024-04-04 11:37:23', '10.00', '13.00', '0.00', 0, '0.00'),
(2052, 119, 438, NULL, '2024-04-04 11:37:23', '14.00', '10.00', '0.00', 0, '0.00'),
(2053, 120, 438, NULL, '2024-04-04 11:37:23', '10.00', '10.00', '0.00', 0, '0.00'),
(2054, 121, 438, NULL, '2024-06-11 15:16:06', '14.00', '0.00', '0.00', 0, '9.00'),
(2055, 118, 439, NULL, '2024-05-03 16:37:34', '10.00', '10.80', '0.00', 0, '0.00'),
(2056, 119, 439, NULL, '2024-05-03 16:37:34', '14.00', '13.00', '0.00', 0, '0.00'),
(2057, 120, 439, NULL, '2024-06-11 15:11:19', '10.00', '0.00', '0.00', 0, '10.00'),
(2058, 121, 439, NULL, '2024-05-03 16:37:34', '14.00', '11.50', '0.00', 0, '0.00'),
(2059, 146, 440, NULL, '2024-07-25 08:54:05', '10.00', '0.00', '0.00', 0, '10.50'),
(2060, 147, 440, NULL, '2024-07-01 13:02:45', '9.00', '10.43', '0.00', 0, '0.00'),
(2061, 146, 441, NULL, '2024-07-25 08:54:05', '10.00', '0.00', '0.00', 0, '11.00'),
(2062, 147, 441, NULL, '2024-04-03 12:18:53', '13.00', '10.00', '0.00', 0, '0.00'),
(2063, 146, 442, NULL, '2024-07-25 08:51:24', '10.00', '0.00', '0.00', 0, '10.50'),
(2064, 147, 442, NULL, '2024-07-25 08:51:24', '10.00', '2.00', '0.00', 0, '10.75'),
(2065, 146, 443, NULL, '2024-06-07 08:34:51', '10.00', '13.00', '0.00', 0, '0.00'),
(2066, 147, 443, NULL, '2024-07-25 08:51:24', '9.00', '6.00', '0.00', 0, '12.00'),
(2067, 122, 444, NULL, '2024-06-11 14:57:33', '14.00', '2.00', '0.00', 0, '10.00'),
(2068, 123, 444, NULL, '2024-06-11 14:57:33', '13.50', '1.00', '0.00', 0, '10.00'),
(2069, 124, 444, NULL, '2024-06-11 14:57:33', '10.00', '2.50', '0.00', 0, '10.00'),
(2070, 125, 444, NULL, '2024-06-11 14:57:33', '14.00', '8.50', '0.00', 0, '10.00'),
(2071, 122, 445, NULL, '2024-06-11 14:57:33', '5.00', '1.00', '0.00', 0, '13.00'),
(2072, 123, 445, NULL, '2024-06-11 14:57:33', '8.00', '8.00', '0.00', 0, '11.00'),
(2073, 124, 445, NULL, '2024-06-11 14:57:33', '7.00', '6.00', '0.00', 0, '11.50'),
(2074, 125, 445, NULL, '2024-04-05 09:18:20', '8.00', '11.00', '0.00', 0, '0.00'),
(2075, 126, 446, NULL, '2024-04-05 13:00:32', '10.00', '10.00', '0.00', 0, '0.00'),
(2076, 127, 446, NULL, '2024-04-05 13:00:32', '10.00', '10.00', '0.00', 0, '0.00'),
(2077, 128, 446, NULL, '2024-04-05 13:00:32', '10.00', '10.00', '0.00', 0, '0.00'),
(2078, 129, 446, NULL, '2024-04-05 13:00:32', '10.00', '13.00', '0.00', 0, '0.00'),
(2079, 130, 446, NULL, '2024-04-05 13:00:32', '10.00', '12.00', '0.00', 0, '0.00'),
(2080, 126, 447, NULL, '2024-04-05 13:00:32', '16.00', '13.00', '0.00', 0, '0.00'),
(2081, 127, 447, NULL, '2024-04-05 13:00:32', '15.00', '10.00', '0.00', 0, '0.00'),
(2082, 128, 447, NULL, '2024-04-05 13:00:32', '16.00', '8.00', '0.00', 0, '0.00'),
(2083, 129, 447, NULL, '2024-04-05 13:00:32', '15.00', '12.00', '0.00', 0, '0.00'),
(2084, 130, 447, NULL, '2024-04-05 13:00:32', '15.00', '11.00', '0.00', 0, '0.00'),
(2085, 156, 448, NULL, '2024-04-05 13:32:11', '10.00', '10.00', '0.00', 0, '0.00'),
(2086, 157, 448, NULL, '2024-04-05 13:32:11', '13.00', '15.50', '0.00', 0, '0.00'),
(2087, 158, 448, NULL, '2024-04-05 13:32:11', '12.00', '19.00', '0.00', 0, '0.00'),
(2088, 159, 448, NULL, '2024-04-05 13:32:11', '18.00', '18.50', '0.00', 0, '0.00'),
(2089, 160, 448, NULL, '2024-04-05 13:32:11', '7.00', '11.50', '0.00', 0, '0.00'),
(2090, 161, 448, NULL, '2024-04-05 13:32:11', '11.00', '15.50', '0.00', 0, '0.00'),
(2091, 162, 448, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2092, 156, 449, NULL, '2024-06-07 08:18:55', '10.50', '10.00', '0.00', 0, '0.00'),
(2093, 157, 449, NULL, '2024-06-07 08:18:55', '12.00', '14.00', '0.00', 0, '0.00'),
(2094, 158, 449, NULL, '2024-06-07 08:18:55', '12.00', '16.50', '0.00', 0, '0.00'),
(2095, 159, 449, NULL, '2024-06-07 08:18:55', '15.50', '17.50', '0.00', 0, '0.00'),
(2096, 160, 449, NULL, '2024-06-07 08:18:55', '10.00', '12.50', '0.00', 0, '0.00'),
(2097, 161, 449, NULL, '2024-06-07 08:18:55', '10.00', '13.50', '0.00', 0, '0.00'),
(2098, 162, 449, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2110, 148, 452, NULL, '2024-04-05 14:13:17', '10.00', '12.50', '0.00', 0, '0.00'),
(2111, 149, 452, NULL, '2024-04-05 14:13:17', '10.00', '19.00', '0.00', 0, '0.00'),
(2112, 150, 452, NULL, '2024-04-05 14:13:17', '10.00', '13.50', '0.00', 0, '0.00'),
(2113, 151, 452, NULL, '2024-04-05 14:13:17', '10.00', '16.50', '0.00', 0, '0.00'),
(2114, 153, 452, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2115, 154, 452, NULL, '2024-04-05 14:13:17', '10.00', '10.50', '0.00', 0, '0.00'),
(2116, 155, 452, NULL, '2024-04-05 14:13:17', '10.00', '19.00', '0.00', 0, '0.00'),
(2124, 148, 454, NULL, '2024-06-06 12:56:10', '13.50', '10.00', '0.00', 0, '0.00'),
(2125, 149, 454, NULL, '2024-06-06 12:56:10', '15.00', '12.00', '0.00', 0, '0.00'),
(2126, 150, 454, NULL, '2024-06-06 12:56:10', '10.00', '14.50', '0.00', 0, '0.00'),
(2127, 151, 454, NULL, '2024-06-06 12:56:10', '9.00', '14.50', '0.00', 0, '0.00'),
(2128, 153, 454, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2129, 154, 454, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2130, 155, 454, NULL, '2024-06-06 12:56:10', '0.00', '16.00', '0.00', 0, '0.00'),
(2131, 148, 455, NULL, '2024-04-05 14:13:17', '10.00', '10.00', '0.00', 0, '0.00'),
(2132, 149, 455, NULL, '2024-04-05 14:13:17', '13.00', '10.50', '0.00', 0, '0.00'),
(2133, 150, 455, NULL, '2024-04-05 14:13:17', '14.00', '15.00', '0.00', 0, '0.00'),
(2134, 151, 455, NULL, '2024-04-05 14:13:17', '10.00', '10.00', '0.00', 0, '0.00'),
(2135, 153, 455, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2136, 154, 455, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2137, 155, 455, NULL, '2024-07-25 09:18:07', '10.00', '0.00', '0.00', 0, '11.00'),
(2138, 148, 456, NULL, '2024-04-05 14:13:17', '10.00', '12.50', '0.00', 0, '0.00'),
(2139, 149, 456, NULL, '2024-04-05 14:13:17', '10.00', '10.00', '0.00', 0, '0.00'),
(2140, 150, 456, NULL, '2024-04-05 14:13:17', '10.00', '15.00', '0.00', 0, '0.00'),
(2141, 151, 456, NULL, '2024-04-05 14:13:17', '10.00', '14.50', '0.00', 0, '0.00'),
(2142, 153, 456, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2143, 154, 456, NULL, '2024-04-05 14:13:17', '10.00', '10.50', '0.00', 0, '0.00'),
(2144, 155, 456, NULL, '2024-04-05 14:13:17', '10.00', '19.00', '0.00', 0, '0.00'),
(2145, 143, 457, NULL, '2024-06-07 08:34:51', '10.00', '15.00', '0.00', 0, '0.00'),
(2146, 144, 457, NULL, '2024-04-05 15:55:24', '10.00', '15.50', '0.00', 0, '0.00'),
(2147, 145, 457, NULL, '2024-06-07 08:34:51', '10.00', '14.00', '0.00', 0, '0.00'),
(2148, 143, 458, NULL, '2024-04-05 15:55:24', '10.00', '14.00', '0.00', 0, '0.00'),
(2149, 144, 458, NULL, '2024-04-05 15:55:24', '14.00', '17.50', '0.00', 0, '0.00'),
(2150, 145, 458, NULL, '2024-07-02 11:37:49', '10.00', '10.00', '0.00', 0, '0.00'),
(2151, 126, 459, NULL, '2024-06-10 15:01:33', '15.50', '6.00', '0.00', 0, '9.00'),
(2152, 127, 459, NULL, '2024-06-10 15:01:33', '14.50', '7.50', '0.00', 0, '9.00'),
(2153, 128, 459, NULL, '2024-05-03 16:25:59', '15.00', '8.00', '0.00', 0, '0.00'),
(2154, 129, 459, NULL, '2024-06-10 15:01:33', '12.50', '8.00', '0.00', 0, '9.50'),
(2155, 130, 459, NULL, '2024-05-03 16:25:59', '14.00', '12.00', '0.00', 0, '0.00'),
(2156, 126, 460, NULL, '2024-06-11 14:25:28', '10.00', '10.00', '0.00', 0, '0.00'),
(2157, 127, 460, NULL, '2024-06-11 14:25:28', '10.00', '7.00', '0.00', 0, '10.00'),
(2158, 128, 460, NULL, '2024-06-11 14:25:28', '10.00', '8.00', '0.00', 0, '10.00'),
(2159, 129, 460, NULL, '2024-06-11 14:25:28', '10.00', '12.00', '0.00', 0, '0.00'),
(2160, 130, 460, NULL, '2024-06-11 14:25:28', '10.00', '8.00', '0.00', 0, '10.00'),
(2166, 118, 462, NULL, '2024-05-03 12:56:19', '17.00', '7.00', '0.00', 0, '12.00'),
(2167, 119, 462, NULL, '2024-05-03 12:56:19', '17.00', '9.00', '0.00', 0, '14.00'),
(2168, 120, 462, NULL, '2024-05-03 12:56:19', '14.00', '10.00', '0.00', 0, '15.00'),
(2169, 121, 462, NULL, '2024-05-03 12:56:19', '18.00', '6.00', '0.00', 0, '15.00'),
(2170, 114, 463, NULL, '2024-05-03 16:28:39', '19.00', '18.50', '0.00', 0, '0.00'),
(2171, 115, 463, NULL, '2024-06-10 14:36:31', '15.00', '0.00', '0.00', 0, '9.00'),
(2172, 116, 463, NULL, '2024-05-03 16:28:39', '16.00', '11.00', '0.00', 0, '0.00'),
(2173, 117, 463, NULL, '2024-06-10 14:36:31', '7.00', '0.00', '0.00', 0, '12.00'),
(2174, 114, 464, NULL, '2024-06-06 12:08:23', '10.00', '10.00', '0.00', 0, '0.00'),
(2175, 115, 464, NULL, '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(2176, 116, 464, NULL, '2024-06-06 12:08:23', '14.00', '14.00', '0.00', 0, '0.00'),
(2177, 117, 464, NULL, '2024-06-10 14:36:31', '10.00', '0.00', '0.00', 0, '10.00'),
(2206, 196, 471, '2024-05-27 08:16:15', '2024-05-29 07:26:10', '16.00', '12.00', '0.00', 0, '0.00'),
(2207, 196, 472, '2024-05-27 08:16:15', '2024-08-06 09:52:56', '18.00', '14.00', '0.00', 0, '0.00'),
(2208, 196, 473, '2024-05-27 08:16:15', '2024-05-29 07:26:10', '13.50', '17.00', '0.00', 0, '0.00'),
(2209, 197, 471, '2024-05-27 08:17:59', '2024-05-29 07:26:10', '14.50', '14.00', '0.00', 0, '0.00'),
(2210, 197, 472, '2024-05-27 08:17:59', '2024-08-06 09:52:56', '14.00', '13.50', '0.00', 0, '0.00'),
(2211, 197, 473, '2024-05-27 08:17:59', '2024-05-29 07:26:10', '15.00', '17.00', '0.00', 0, '0.00'),
(2212, 196, 474, NULL, '2024-08-06 09:52:56', '17.00', '18.50', '0.00', 0, '0.00'),
(2213, 197, 474, NULL, '2024-08-06 09:52:56', '19.00', '17.50', '0.00', 0, '0.00'),
(2214, 196, 475, NULL, '2024-08-06 09:52:56', '11.00', '10.00', '0.00', 0, '0.00'),
(2215, 197, 475, NULL, '2024-08-06 09:52:56', '16.00', '13.00', '0.00', 0, '0.00'),
(2216, 196, 476, NULL, '2024-05-29 07:26:10', '17.50', '17.00', '0.00', 0, '0.00'),
(2217, 197, 476, NULL, '2024-05-29 07:26:10', '18.50', '16.00', '0.00', 0, '0.00'),
(2218, 196, 477, NULL, '2024-05-29 07:26:10', '18.00', '15.00', '0.00', 0, '0.00'),
(2219, 197, 477, NULL, '2024-05-29 07:26:10', '16.00', '14.00', '0.00', 0, '0.00'),
(2220, 196, 478, NULL, '2024-05-29 07:26:10', '18.00', '16.00', '0.00', 0, '0.00'),
(2221, 197, 478, NULL, '2024-05-29 07:26:10', '18.00', '18.50', '0.00', 0, '0.00'),
(2222, 196, 479, NULL, '2024-05-29 07:26:10', '17.50', '8.50', '0.00', 0, '0.00'),
(2223, 197, 479, NULL, '2024-05-29 07:26:10', '17.00', '12.00', '0.00', 0, '0.00'),
(2224, 196, 480, NULL, '2024-06-26 15:35:50', '16.50', '17.00', '0.00', 0, '0.00'),
(2225, 197, 480, NULL, '2024-06-26 15:35:50', '19.00', '17.75', '0.00', 0, '0.00'),
(2226, 196, 481, NULL, '2024-08-06 09:52:56', '18.00', '17.00', '0.00', 0, '0.00'),
(2227, 197, 481, NULL, '2024-09-02 10:20:14', '15.00', '19.00', '0.00', 0, '0.00'),
(2228, 196, 482, NULL, '2024-08-06 09:52:56', '15.00', '12.50', '0.00', 0, '0.00'),
(2229, 197, 482, NULL, '2024-08-06 09:52:56', '16.00', '14.00', '0.00', 0, '0.00'),
(2230, 196, 483, NULL, '2024-05-29 07:26:10', '17.00', '18.00', '0.00', 0, '0.00'),
(2231, 197, 483, NULL, '2024-09-02 10:20:14', '15.00', '16.50', '0.00', 0, '0.00'),
(2232, 190, 484, NULL, '2024-11-06 14:36:44', '8.00', '7.00', '0.00', 0, '11.00'),
(2233, 191, 484, NULL, '2024-05-31 07:44:20', '16.00', '17.00', '0.00', 0, '0.00'),
(2234, 195, 484, NULL, '2024-09-02 10:10:09', '16.00', '7.50', '0.00', 0, '0.00'),
(2235, 190, 485, NULL, '2024-11-06 14:36:44', '10.50', '6.00', '0.00', 0, '10.00'),
(2236, 191, 485, NULL, '2024-05-31 07:44:20', '13.50', '15.00', '0.00', 0, '0.00'),
(2237, 195, 485, NULL, '2024-09-07 13:00:24', '13.00', '9.00', '0.00', 0, '0.00'),
(2238, 190, 486, NULL, '2024-11-06 14:36:44', '13.00', '10.00', '0.00', 0, '12.00'),
(2239, 191, 486, NULL, '2024-05-31 07:44:20', '14.00', '18.50', '0.00', 0, '0.00'),
(2240, 195, 486, NULL, '2024-05-31 07:44:20', '13.00', '11.00', '0.00', 0, '0.00'),
(2241, 190, 487, NULL, '2024-09-03 08:46:39', '12.00', '9.15', '0.00', 0, '0.00'),
(2242, 191, 487, NULL, '2024-05-31 07:44:20', '13.50', '13.00', '0.00', 0, '0.00'),
(2243, 195, 487, NULL, '2024-05-31 07:44:20', '14.00', '15.00', '0.00', 0, '0.00'),
(2244, 190, 488, NULL, '2024-11-06 14:36:44', '10.00', '6.00', '0.00', 0, '10.00'),
(2245, 191, 488, NULL, '2024-08-06 09:52:56', '17.00', '18.00', '0.00', 0, '0.00'),
(2246, 195, 488, NULL, '2024-09-02 10:10:09', '12.00', '9.50', '0.00', 0, '0.00'),
(2247, 190, 489, NULL, '2024-08-06 09:52:56', '15.50', '16.50', '0.00', 0, '0.00'),
(2248, 191, 489, NULL, '2024-08-06 09:52:56', '14.00', '16.50', '0.00', 0, '0.00'),
(2249, 195, 489, NULL, '2024-08-06 09:52:56', '15.00', '17.50', '0.00', 0, '0.00'),
(2250, 190, 490, NULL, '2024-11-06 14:36:44', '10.00', '9.00', '0.00', 0, '10.00'),
(2251, 191, 490, NULL, '2024-08-06 09:52:56', '14.00', '17.00', '0.00', 0, '0.00'),
(2252, 195, 490, NULL, '2024-09-02 10:10:09', '12.00', '9.50', '0.00', 0, '0.00'),
(2253, 190, 491, NULL, '2024-09-03 08:46:10', '14.00', '8.50', '0.00', 0, '0.00'),
(2254, 191, 491, NULL, '2024-05-31 07:44:20', '15.00', '15.00', '0.00', 0, '0.00'),
(2255, 195, 491, NULL, '2024-05-31 07:44:20', '14.50', '11.00', '0.00', 0, '0.00'),
(2256, 190, 492, NULL, '2024-09-03 08:46:39', '14.00', '8.29', '0.00', 0, '0.00'),
(2257, 191, 492, NULL, '2024-05-31 07:44:20', '14.00', '14.00', '0.00', 0, '0.00'),
(2258, 195, 492, NULL, '2024-05-31 07:44:20', '14.00', '16.00', '0.00', 0, '0.00'),
(2259, 190, 493, NULL, '2024-08-30 13:03:59', '11.00', '10.00', '0.00', 0, '0.00'),
(2260, 191, 493, NULL, '2024-08-30 13:03:59', '13.50', '14.50', '0.00', 0, '0.00'),
(2261, 195, 493, NULL, '2024-08-30 13:03:59', '11.50', '15.00', '0.00', 0, '0.00'),
(2262, 190, 494, NULL, '2024-08-30 13:03:59', '15.00', '9.00', '0.00', 0, '0.00'),
(2263, 191, 494, NULL, '2024-06-26 07:59:53', '18.00', '11.00', '0.00', 0, '0.00'),
(2264, 195, 494, NULL, '2024-06-26 07:59:53', '16.00', '11.00', '0.00', 0, '0.00'),
(2265, 190, 495, NULL, '2024-05-31 07:44:20', '14.00', '11.00', '0.00', 0, '0.00'),
(2266, 191, 495, NULL, '2024-05-31 07:44:20', '18.00', '15.00', '0.00', 0, '0.00'),
(2267, 195, 495, NULL, '2024-05-31 07:44:20', '16.00', '16.00', '0.00', 0, '0.00'),
(2268, 190, 496, NULL, '2024-08-30 13:03:59', '10.00', '10.00', '0.00', 0, '0.00'),
(2269, 191, 496, NULL, '2024-05-31 07:44:20', '17.00', '16.00', '0.00', 0, '0.00'),
(2270, 195, 496, NULL, '2024-05-31 07:44:20', '15.00', '14.00', '0.00', 0, '0.00'),
(2271, 188, 497, NULL, '2024-05-30 07:10:27', '17.00', '17.00', '0.00', 0, '0.00'),
(2272, 189, 497, NULL, '2024-05-30 07:10:27', '16.50', '13.50', '0.00', 0, '0.00'),
(2273, 193, 497, NULL, '2024-05-30 07:10:27', '16.50', '16.00', '0.00', 0, '0.00'),
(2274, 188, 498, NULL, '2024-08-30 13:03:59', '17.00', '17.00', '0.00', 0, '0.00'),
(2275, 189, 498, NULL, '2024-08-30 13:03:59', '17.50', '17.50', '0.00', 0, '0.00'),
(2276, 193, 498, NULL, '2024-08-30 13:03:59', '15.00', '15.00', '0.00', 0, '0.00'),
(2277, 188, 499, NULL, '2024-05-30 07:10:27', '17.00', '17.50', '0.00', 0, '0.00'),
(2278, 189, 499, NULL, '2024-05-30 07:10:27', '17.50', '17.00', '0.00', 0, '0.00'),
(2279, 193, 499, NULL, '2024-05-30 07:10:27', '16.50', '17.00', '0.00', 0, '0.00'),
(2280, 188, 500, NULL, '2024-08-06 09:52:56', '17.50', '17.50', '0.00', 0, '0.00'),
(2281, 189, 500, NULL, '2024-08-06 09:52:56', '16.00', '16.00', '0.00', 0, '0.00'),
(2282, 193, 500, NULL, '2024-08-06 09:52:56', '15.50', '15.50', '0.00', 0, '0.00'),
(2283, 188, 501, NULL, '2024-05-30 07:22:43', '17.00', '14.00', '0.00', 0, '0.00'),
(2284, 189, 501, NULL, '2024-05-30 07:22:43', '18.00', '17.00', '0.00', 0, '0.00'),
(2285, 193, 501, NULL, '2024-05-30 07:22:43', '16.00', '15.00', '0.00', 0, '0.00'),
(2286, 188, 502, NULL, '2024-05-30 07:22:43', '15.00', '13.00', '0.00', 0, '0.00'),
(2287, 189, 502, NULL, '2024-05-30 07:22:43', '15.50', '13.00', '0.00', 0, '0.00'),
(2288, 193, 502, NULL, '2024-05-30 07:22:43', '14.00', '9.00', '0.00', 0, '0.00'),
(2289, 188, 503, NULL, '2024-08-30 13:03:59', '17.50', '17.50', '0.00', 0, '0.00'),
(2290, 189, 503, NULL, '2024-08-30 13:03:59', '16.00', '16.00', '0.00', 0, '0.00'),
(2291, 193, 503, NULL, '2024-08-30 13:03:59', '15.50', '15.50', '0.00', 0, '0.00'),
(2292, 188, 504, NULL, '2024-05-30 07:10:27', '18.00', '16.00', '0.00', 0, '0.00'),
(2293, 189, 504, NULL, '2024-05-30 07:10:27', '19.50', '17.00', '0.00', 0, '0.00'),
(2294, 193, 504, NULL, '2024-05-30 07:10:27', '19.00', '12.00', '0.00', 0, '0.00'),
(2295, 188, 505, NULL, '2024-05-30 07:10:27', '17.00', '13.00', '0.00', 0, '0.00'),
(2296, 189, 505, NULL, '2024-05-30 07:10:27', '17.00', '13.00', '0.00', 0, '0.00'),
(2297, 193, 505, NULL, '2024-05-30 07:10:27', '15.00', '12.00', '0.00', 0, '0.00'),
(2298, 188, 506, NULL, '2024-08-06 09:52:56', '16.00', '17.50', '0.00', 0, '0.00'),
(2299, 189, 506, NULL, '2024-08-06 09:52:56', '17.00', '18.00', '0.00', 0, '0.00'),
(2300, 193, 506, NULL, '2024-08-06 09:52:56', '17.00', '18.00', '0.00', 0, '0.00'),
(2301, 188, 507, NULL, '2024-05-30 07:22:43', '18.00', '15.00', '0.00', 0, '0.00'),
(2302, 189, 507, NULL, '2024-05-30 07:22:43', '17.00', '13.00', '0.00', 0, '0.00'),
(2303, 193, 507, NULL, '2024-05-30 07:22:43', '17.00', '12.00', '0.00', 0, '0.00'),
(2304, 188, 508, NULL, '2024-05-30 07:22:43', '18.00', '15.50', '0.00', 0, '0.00'),
(2305, 189, 508, NULL, '2024-05-30 07:22:43', '18.00', '16.50', '0.00', 0, '0.00'),
(2306, 193, 508, NULL, '2024-05-30 07:22:43', '12.00', '12.50', '0.00', 0, '0.00'),
(2307, 190, 509, NULL, '2024-11-06 14:36:44', '8.00', '8.00', '0.00', 0, '11.50'),
(2308, 191, 509, NULL, '2024-06-04 10:03:00', '18.00', '18.00', '0.00', 0, '0.00'),
(2309, 195, 509, NULL, '2024-06-04 10:03:00', '15.00', '11.50', '0.00', 0, '0.00'),
(2310, 190, 510, NULL, '2024-08-30 13:17:48', '13.00', '13.00', '0.00', 0, '0.00'),
(2311, 191, 510, NULL, '2024-08-30 13:17:48', '16.50', '16.50', '0.00', 0, '0.00'),
(2312, 195, 510, NULL, '2024-08-30 13:17:48', '15.00', '15.00', '0.00', 0, '0.00'),
(2313, 190, 511, NULL, '2024-09-03 08:43:55', '13.50', '9.00', '0.00', 0, '0.00'),
(2314, 191, 511, NULL, '2024-08-06 10:59:49', '18.00', '19.00', '0.00', 0, '0.00'),
(2315, 195, 511, NULL, '2024-08-06 10:59:49', '16.00', '8.00', '0.00', 0, '0.00'),
(2316, 188, 512, NULL, '2024-08-06 11:23:40', '18.00', '12.00', '0.00', 0, '0.00'),
(2317, 189, 512, NULL, '2024-08-06 11:23:40', '18.00', '11.50', '0.00', 0, '0.00'),
(2318, 193, 512, NULL, '2024-08-06 11:23:40', '10.00', '15.00', '0.00', 0, '0.00'),
(2319, 188, 513, NULL, '2024-08-30 12:45:38', '17.00', '16.00', '0.00', 0, '0.00'),
(2320, 189, 513, NULL, '2024-08-30 12:45:38', '15.00', '17.00', '0.00', 0, '0.00'),
(2321, 193, 513, NULL, '2024-08-30 12:45:38', '12.00', '15.50', '0.00', 0, '0.00'),
(2322, 196, 514, NULL, '2024-08-30 12:45:38', '12.00', '11.50', '0.00', 0, '0.00'),
(2323, 197, 514, NULL, '2024-08-30 12:45:38', '14.00', '17.00', '0.00', 0, '0.00'),
(2324, 196, 515, NULL, '2024-08-30 13:17:48', '18.00', '18.00', '0.00', 0, '0.00'),
(2325, 197, 515, NULL, '2024-08-30 13:17:48', '18.00', '18.00', '0.00', 0, '0.00'),
(2326, 196, 516, NULL, '2024-06-04 10:26:48', '13.00', '11.00', '0.00', 0, '0.00'),
(2327, 197, 516, NULL, '2024-06-04 10:26:48', '14.00', '10.00', '0.00', 0, '0.00'),
(2358, 114, 526, NULL, '2024-06-11 16:41:46', '16.00', '16.00', '0.00', 0, '0.00'),
(2359, 115, 526, NULL, '2024-06-11 16:41:46', '17.00', '17.00', '0.00', 0, '0.00'),
(2360, 116, 526, NULL, '2024-06-11 16:41:46', '17.50', '17.50', '0.00', 0, '0.00'),
(2361, 117, 526, NULL, '2024-06-11 16:41:46', '16.50', '16.50', '0.00', 0, '0.00'),
(2362, 122, 527, NULL, '2024-06-11 16:41:46', '17.00', '17.00', '0.00', 0, '0.00'),
(2363, 123, 527, NULL, '2024-06-11 16:41:46', '16.50', '16.50', '0.00', 0, '0.00'),
(2364, 124, 527, NULL, '2024-06-11 16:41:46', '17.50', '17.50', '0.00', 0, '0.00'),
(2365, 125, 527, NULL, '2024-06-11 16:41:46', '17.00', '17.00', '0.00', 0, '0.00'),
(2366, 126, 529, NULL, '2024-06-11 16:41:46', '17.00', '17.00', '0.00', 0, '0.00'),
(2367, 127, 529, NULL, '2024-06-11 16:41:46', '16.50', '16.50', '0.00', 0, '0.00'),
(2368, 128, 529, NULL, '2024-06-11 16:41:46', '16.00', '16.00', '0.00', 0, '0.00'),
(2369, 129, 529, NULL, '2024-06-11 16:41:46', '16.50', '16.50', '0.00', 0, '0.00'),
(2370, 130, 529, NULL, '2024-06-11 16:41:46', '16.00', '16.00', '0.00', 0, '0.00'),
(2371, 118, 530, NULL, '2024-06-11 16:41:46', '16.00', '16.00', '0.00', 0, '0.00'),
(2372, 119, 530, NULL, '2024-06-11 16:41:46', '17.00', '17.00', '0.00', 0, '0.00'),
(2373, 120, 530, NULL, '2024-06-11 16:41:46', '17.00', '17.00', '0.00', 0, '0.00'),
(2374, 121, 530, NULL, '2024-06-11 16:41:46', '17.50', '17.50', '0.00', 0, '0.00'),
(2375, 136, 531, NULL, '2024-06-12 08:06:31', '18.00', '19.00', '0.00', 0, '0.00'),
(2376, 137, 531, NULL, '2024-06-12 08:06:31', '18.50', '18.50', '0.00', 0, '0.00'),
(2377, 138, 531, NULL, '2024-06-12 08:06:31', '18.50', '19.00', '0.00', 0, '0.00'),
(2381, 131, 533, NULL, '2024-06-12 08:47:10', '17.00', '17.00', '0.00', 0, '0.00'),
(2382, 132, 533, NULL, '2024-06-12 08:45:50', '17.00', '17.00', '0.00', 0, '0.00'),
(2383, 133, 533, NULL, '2024-06-12 08:45:50', '17.00', '17.00', '0.00', 0, '0.00'),
(2384, 134, 533, NULL, '2024-06-12 08:45:50', '17.00', '17.00', '0.00', 0, '0.00'),
(2385, 135, 533, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2386, 136, 534, NULL, '2024-06-12 10:11:14', '17.00', '17.00', '0.00', 0, '0.00'),
(2387, 137, 534, NULL, '2024-06-12 10:11:14', '17.00', '17.00', '0.00', 0, '0.00'),
(2388, 138, 534, NULL, '2024-06-12 10:11:14', '17.50', '17.50', '0.00', 0, '0.00'),
(2389, 196, 535, NULL, '2024-08-06 09:52:56', '16.00', '14.00', '0.00', 0, '0.00'),
(2390, 197, 535, NULL, '2024-08-06 09:52:56', '13.00', '16.50', '0.00', 0, '0.00'),
(2391, 196, 536, NULL, '2024-08-06 10:59:49', '17.00', '13.50', '0.00', 0, '0.00'),
(2392, 197, 536, NULL, '2024-08-06 10:59:49', '14.50', '14.50', '0.00', 0, '0.00'),
(2393, 190, 537, NULL, '2024-08-06 10:59:49', '13.50', '12.50', '0.00', 0, '0.00'),
(2394, 191, 537, NULL, '2024-08-06 10:59:49', '18.50', '17.00', '0.00', 0, '0.00'),
(2395, 195, 537, NULL, '2024-08-06 10:59:49', '15.50', '13.00', '0.00', 0, '0.00'),
(2396, 188, 538, NULL, '2024-08-06 10:59:49', '18.50', '17.50', '0.00', 0, '0.00'),
(2397, 189, 538, NULL, '2024-08-06 10:59:49', '17.50', '15.50', '0.00', 0, '0.00'),
(2398, 193, 538, NULL, '2024-08-06 10:59:49', '14.50', '13.50', '0.00', 0, '0.00'),
(2399, 196, 539, NULL, '2024-08-06 09:56:28', '17.50', '17.00', '0.00', 0, '0.00'),
(2400, 197, 539, NULL, '2024-08-06 09:56:28', '17.00', '16.50', '0.00', 0, '0.00'),
(2401, 190, 540, NULL, '2024-08-30 13:17:48', '10.00', '10.00', '0.00', 0, '0.00'),
(2402, 191, 540, NULL, '2024-08-06 10:59:49', '17.00', '15.50', '0.00', 0, '0.00'),
(2403, 195, 540, NULL, '2024-08-06 10:59:49', '13.00', '10.00', '0.00', 0, '0.00'),
(2404, 188, 541, NULL, '2024-08-06 10:59:49', '16.00', '18.00', '0.00', 0, '0.00'),
(2405, 189, 541, NULL, '2024-08-06 10:59:49', '18.00', '15.00', '0.00', 0, '0.00'),
(2406, 193, 541, NULL, '2024-08-06 10:59:49', '14.00', '16.00', '0.00', 0, '0.00'),
(2407, 188, 542, NULL, '2024-08-06 10:59:49', '14.00', '14.00', '0.00', 0, '0.00'),
(2408, 189, 542, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2409, 193, 542, NULL, '2024-08-06 10:59:49', '10.00', '10.00', '0.00', 0, '0.00'),
(2410, 156, 543, NULL, '2024-06-28 17:01:14', '0.00', '14.29', '0.00', 0, '0.00'),
(2411, 157, 543, NULL, '2024-06-28 17:01:14', '0.00', '15.79', '0.00', 0, '0.00'),
(2412, 158, 543, NULL, '2024-06-28 17:01:14', '0.00', '14.87', '0.00', 0, '0.00'),
(2413, 159, 543, NULL, '2024-06-28 17:01:14', '0.00', '14.57', '0.00', 0, '0.00'),
(2414, 160, 543, NULL, '2024-06-28 17:01:14', '0.00', '18.43', '0.00', 0, '0.00'),
(2415, 161, 543, NULL, '2024-06-28 17:46:23', '0.00', '14.29', '0.00', 0, '0.00'),
(2416, 162, 543, NULL, '2024-06-28 17:46:23', '0.00', '14.29', '0.00', 0, '0.00'),
(2417, 139, 544, NULL, '2024-07-01 08:48:59', '16.00', '14.00', '0.00', 0, '0.00'),
(2418, 140, 544, NULL, '2024-07-01 08:48:59', '18.00', '19.00', '0.00', 0, '0.00'),
(2419, 141, 544, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2420, 142, 544, NULL, '2024-09-13 13:51:18', '10.00', '9.00', '0.00', 0, '10.00'),
(2421, 175, 544, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2422, 139, 545, NULL, '2024-07-01 08:48:59', '14.00', '15.00', '0.00', 0, '0.00'),
(2423, 140, 545, NULL, '2024-07-01 08:48:59', '17.00', '19.00', '0.00', 0, '0.00'),
(2424, 141, 545, NULL, '2024-12-09 14:31:27', '14.00', '8.29', '0.00', 0, '0.00'),
(2425, 142, 545, NULL, '2024-07-01 08:48:59', '16.00', '11.00', '0.00', 0, '0.00'),
(2426, 175, 545, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2427, 139, 546, NULL, '2024-07-01 08:48:59', '17.50', '16.00', '0.00', 0, '0.00'),
(2428, 140, 546, NULL, '2024-07-01 08:48:59', '13.50', '18.00', '0.00', 0, '0.00'),
(2429, 141, 546, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2430, 142, 546, NULL, '2024-07-01 08:48:59', '12.50', '14.00', '0.00', 0, '0.00'),
(2431, 175, 546, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2432, 139, 547, NULL, '2024-07-01 08:49:59', '0.00', '14.29', '0.00', 0, '0.00'),
(2433, 140, 547, NULL, '2024-07-01 08:48:59', '15.00', '11.00', '0.00', 0, '0.00'),
(2434, 141, 547, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2435, 142, 547, NULL, '2024-07-01 08:48:59', '13.00', '11.00', '0.00', 0, '0.00'),
(2436, 175, 547, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2437, 139, 548, NULL, '2024-07-01 08:48:59', '15.00', '13.00', '0.00', 0, '0.00'),
(2438, 140, 548, NULL, '2024-07-01 08:48:59', '15.00', '17.00', '0.00', 0, '0.00'),
(2439, 141, 548, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2440, 142, 548, NULL, '2024-07-01 08:48:59', '14.00', '12.00', '0.00', 0, '0.00'),
(2441, 175, 548, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2442, 148, 549, NULL, '2024-07-01 11:52:00', '10.00', '10.00', '0.00', 0, '0.00'),
(2443, 149, 549, NULL, '2024-07-01 09:15:33', '20.00', '10.00', '0.00', 0, '0.00'),
(2444, 150, 549, NULL, '2024-07-02 11:42:09', '10.00', '10.00', '0.00', 0, '0.00'),
(2445, 151, 549, NULL, '2024-07-01 09:15:33', '10.00', '10.00', '0.00', 0, '0.00'),
(2446, 153, 549, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2447, 154, 549, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2448, 155, 549, NULL, '2024-07-24 15:51:49', '10.00', '0.00', '0.00', 0, '13.00'),
(2449, 148, 550, NULL, '2024-07-01 11:51:40', '10.50', '10.50', '0.00', 0, '0.00'),
(2450, 149, 550, NULL, '2024-07-01 11:51:40', '16.75', '10.00', '0.00', 0, '0.00'),
(2451, 150, 550, NULL, '2024-07-01 11:51:40', '14.00', '13.00', '0.00', 0, '0.00'),
(2452, 151, 550, NULL, '2024-07-01 11:51:40', '7.50', '14.50', '0.00', 0, '0.00'),
(2453, 153, 550, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2454, 154, 550, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2455, 155, 550, NULL, '2024-07-24 15:51:49', '10.00', '0.00', '0.00', 0, '15.00'),
(2456, 148, 551, NULL, '2024-08-05 14:14:06', '15.50', '13.00', '0.00', 0, '0.00'),
(2457, 149, 551, NULL, '2024-08-05 14:14:06', '14.50', '15.50', '0.00', 0, '0.00'),
(2458, 150, 551, NULL, '2024-08-05 14:14:06', '16.00', '13.00', '0.00', 0, '0.00'),
(2459, 151, 551, NULL, '2024-08-05 14:14:06', '14.50', '14.00', '0.00', 0, '0.00'),
(2460, 153, 551, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2461, 154, 551, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2462, 155, 551, NULL, '2024-07-01 11:51:40', '18.00', '14.00', '0.00', 0, '0.00'),
(2470, 148, 553, NULL, '2024-07-01 11:51:40', '11.50', '11.50', '0.00', 0, '0.00'),
(2471, 149, 553, NULL, '2024-07-01 11:51:40', '14.00', '14.00', '0.00', 0, '0.00'),
(2472, 150, 553, NULL, '2024-07-01 11:51:40', '10.50', '10.50', '0.00', 0, '0.00'),
(2473, 151, 553, NULL, '2024-07-01 11:51:40', '10.00', '10.00', '0.00', 0, '0.00'),
(2474, 153, 553, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2475, 154, 553, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2476, 155, 553, NULL, '2024-07-01 11:51:40', '18.50', '18.50', '0.00', 0, '0.00'),
(2477, 156, 554, NULL, '2024-07-01 12:23:29', '9.00', '10.43', '0.00', 0, '0.00'),
(2478, 157, 554, NULL, '2024-07-01 12:22:45', '14.50', '18.50', '0.00', 0, '0.00'),
(2479, 158, 554, NULL, '2024-07-01 12:22:45', '4.00', '13.50', '0.00', 0, '0.00'),
(2480, 159, 554, NULL, '2024-07-01 12:22:45', '14.00', '13.50', '0.00', 0, '0.00'),
(2481, 160, 554, NULL, '2024-07-01 12:22:45', '15.00', '10.00', '0.00', 0, '0.00'),
(2482, 161, 554, NULL, '2024-07-01 12:23:29', '0.00', '14.29', '0.00', 0, '0.00'),
(2483, 162, 554, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2484, 156, 555, NULL, '2024-07-01 12:23:29', '8.50', '10.65', '0.00', 0, '0.00'),
(2485, 157, 555, NULL, '2024-07-01 12:22:45', '13.00', '12.50', '0.00', 0, '0.00'),
(2486, 158, 555, NULL, '2024-07-01 12:22:45', '17.50', '18.00', '0.00', 0, '0.00'),
(2487, 159, 555, NULL, '2024-07-01 12:22:45', '12.00', '19.00', '0.00', 0, '0.00'),
(2488, 160, 555, NULL, '2024-07-01 12:23:29', '7.00', '11.29', '0.00', 0, '0.00'),
(2489, 161, 555, NULL, '2024-07-01 12:22:45', '12.00', '17.50', '0.00', 0, '0.00'),
(2490, 162, 555, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2491, 156, 556, NULL, '2024-07-01 12:22:45', '12.50', '13.50', '0.00', 0, '0.00'),
(2492, 157, 556, NULL, '2024-07-01 12:22:45', '14.50', '13.50', '0.00', 0, '0.00'),
(2493, 158, 556, NULL, '2024-07-01 12:22:45', '15.50', '11.00', '0.00', 0, '0.00'),
(2494, 159, 556, NULL, '2024-07-01 12:22:45', '17.50', '13.00', '0.00', 0, '0.00'),
(2495, 160, 556, NULL, '2024-07-01 12:22:45', '11.50', '10.50', '0.00', 0, '0.00'),
(2496, 161, 556, NULL, '2024-07-01 12:22:45', '10.50', '10.50', '0.00', 0, '0.00'),
(2497, 162, 556, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2498, 156, 557, NULL, '2024-07-01 12:22:45', '14.50', '14.50', '0.00', 0, '0.00'),
(2499, 157, 557, NULL, '2024-07-01 12:22:45', '19.00', '19.00', '0.00', 0, '0.00'),
(2500, 158, 557, NULL, '2024-07-01 12:22:45', '18.00', '18.00', '0.00', 0, '0.00'),
(2501, 159, 557, NULL, '2024-07-01 12:22:45', '15.00', '15.00', '0.00', 0, '0.00'),
(2502, 160, 557, NULL, '2024-07-01 12:23:29', '7.50', '11.08', '0.00', 0, '0.00'),
(2503, 161, 557, NULL, '2024-07-01 12:23:29', '7.50', '11.08', '0.00', 0, '0.00'),
(2504, 162, 557, NULL, NULL, '0.00', '0.00', '0.00', 0, '0.00'),
(2505, 146, 558, NULL, '2024-07-01 12:45:37', '16.00', '11.00', '0.00', 0, '0.00'),
(2506, 147, 558, NULL, '2024-07-01 12:45:37', '10.00', '10.50', '0.00', 0, '0.00'),
(2507, 146, 559, NULL, '2024-07-01 12:45:37', '17.00', '12.50', '0.00', 0, '0.00'),
(2508, 147, 559, NULL, '2024-07-01 12:45:37', '10.00', '10.00', '0.00', 0, '0.00'),
(2509, 146, 560, NULL, '2024-07-01 12:45:37', '12.50', '12.50', '0.00', 0, '0.00'),
(2510, 147, 560, NULL, '2024-07-01 12:45:37', '15.00', '15.00', '0.00', 0, '0.00'),
(2511, 146, 561, NULL, '2024-07-01 12:45:37', '10.00', '14.00', '0.00', 0, '0.00'),
(2512, 147, 561, NULL, '2024-07-01 13:02:45', '4.50', '12.36', '0.00', 0, '0.00'),
(2513, 146, 562, NULL, '2024-07-01 15:32:41', '13.85', '8.36', '0.00', 0, '0.00'),
(2514, 147, 562, NULL, '2024-07-01 15:32:41', '11.50', '9.36', '0.00', 0, '0.00'),
(2515, 146, 563, NULL, '2024-07-01 15:32:41', '13.00', '8.72', '0.00', 0, '0.00'),
(2516, 147, 563, NULL, '2024-07-01 15:32:41', '10.00', '10.00', '0.00', 0, '0.00'),
(2517, 146, 564, NULL, '2024-07-01 13:04:18', '10.00', '10.00', '0.00', 0, '0.00'),
(2518, 147, 564, NULL, '2024-07-01 13:04:18', '10.00', '10.00', '0.00', 0, '0.00'),
(2519, 143, 565, NULL, '2024-07-01 15:31:55', '12.75', '8.83', '0.00', 0, '0.00'),
(2520, 144, 565, NULL, '2024-07-01 15:31:55', '16.00', '7.43', '0.00', 0, '0.00'),
(2521, 145, 565, NULL, '2024-07-01 15:31:55', '13.35', '8.57', '0.00', 0, '0.00'),
(2525, 143, 567, NULL, '2024-07-01 13:25:00', '11.50', '17.00', '0.00', 0, '0.00'),
(2526, 144, 567, NULL, '2024-07-01 13:25:00', '10.00', '13.50', '0.00', 0, '0.00'),
(2527, 145, 567, NULL, '2024-07-01 13:25:00', '11.00', '17.00', '0.00', 0, '0.00'),
(2528, 143, 568, NULL, '2024-07-01 15:31:55', '7.50', '11.08', '0.00', 0, '0.00'),
(2529, 144, 568, NULL, '2024-07-01 13:25:00', '10.00', '10.00', '0.00', 0, '0.00'),
(2530, 145, 568, NULL, '2024-07-01 13:25:00', '8.00', '12.50', '0.00', 0, '0.00'),
(2531, 143, 569, NULL, '2024-07-01 13:25:00', '17.00', '13.50', '0.00', 0, '0.00'),
(2532, 144, 569, NULL, '2024-07-01 13:25:00', '15.00', '11.00', '0.00', 0, '0.00'),
(2533, 145, 569, NULL, '2024-07-01 13:25:00', '16.00', '12.00', '0.00', 0, '0.00'),
(2590, 196, 570, NULL, '2024-08-06 10:59:49', '16.00', '17.50', '0.00', 0, '0.00'),
(2591, 197, 570, NULL, '2024-09-02 10:22:09', '14.00', '17.00', '0.00', 0, '0.00'),
(2592, 196, 571, NULL, '2024-08-06 10:59:49', '16.00', '17.50', '0.00', 0, '0.00'),
(2593, 197, 571, NULL, '2024-09-02 10:22:09', '14.00', '16.50', '0.00', 0, '0.00'),
(2594, 196, 572, NULL, '2024-08-06 10:59:49', '17.50', '17.50', '0.00', 0, '0.00'),
(2595, 197, 572, NULL, '2024-08-06 10:59:49', '16.50', '16.50', '0.00', 0, '0.00'),
(2596, 188, 573, NULL, '2024-08-06 10:59:49', '17.50', '17.00', '0.00', 0, '0.00'),
(2597, 189, 573, NULL, '2024-08-06 10:59:49', '18.00', '18.00', '0.00', 0, '0.00'),
(2598, 193, 573, NULL, '2024-08-06 10:59:49', '16.50', '18.00', '0.00', 0, '0.00'),
(2599, 188, 574, NULL, '2024-08-06 10:59:49', '15.50', '15.50', '0.00', 0, '0.00'),
(2600, 189, 574, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2601, 193, 574, NULL, '2024-08-06 10:59:49', '14.50', '14.50', '0.00', 0, '0.00'),
(2602, 196, 575, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2603, 197, 575, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2604, 188, 576, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2605, 189, 576, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2606, 193, 576, NULL, '2024-08-06 10:59:49', '15.00', '15.00', '0.00', 0, '0.00'),
(2607, 190, 577, NULL, '2024-08-30 13:17:48', '7.00', '12.00', '0.00', 0, '0.00'),
(2608, 191, 577, NULL, '2024-08-06 10:59:49', '14.00', '14.00', '0.00', 0, '0.00'),
(2609, 195, 577, NULL, '2024-08-06 10:59:49', '17.00', '12.00', '0.00', 0, '0.00'),
(2610, 190, 578, NULL, '2024-08-30 13:17:48', '15.00', '15.00', '0.00', 0, '0.00'),
(2611, 191, 578, NULL, '2024-08-06 11:23:40', '18.00', '13.00', '0.00', 0, '0.00'),
(2612, 195, 578, NULL, '2024-08-06 11:23:40', '14.00', '11.00', '0.00', 0, '0.00'),
(2613, 190, 579, NULL, '2024-08-30 13:17:48', '8.00', '12.00', '0.00', 0, '0.00'),
(2614, 191, 579, NULL, '2024-08-06 10:59:49', '18.00', '17.00', '0.00', 0, '0.00'),
(2615, 195, 579, NULL, '2024-08-06 10:59:49', '8.00', '16.50', '0.00', 0, '0.00'),
(2616, 190, 580, NULL, '2024-08-06 10:59:49', '14.00', '12.00', '0.00', 0, '0.00'),
(2617, 191, 580, NULL, '2024-08-06 10:59:49', '16.00', '18.50', '0.00', 0, '0.00'),
(2618, 195, 580, NULL, '2024-08-06 10:59:49', '16.50', '17.00', '0.00', 0, '0.00'),
(2619, 190, 581, NULL, '2024-08-06 10:59:49', '15.50', '15.50', '0.00', 0, '0.00'),
(2620, 191, 581, NULL, '2024-08-06 10:59:49', '15.50', '15.50', '0.00', 0, '0.00'),
(2621, 195, 581, NULL, '2024-08-06 10:59:49', '15.50', '15.50', '0.00', 0, '0.00'),
(2622, 190, 582, NULL, '2024-09-07 13:01:37', '13.00', '9.00', '0.00', 0, '0.00'),
(2623, 191, 582, NULL, '2024-08-06 11:23:40', '12.00', '12.00', '0.00', 0, '0.00'),
(2624, 195, 582, NULL, '2024-08-06 11:23:40', '10.50', '10.50', '0.00', 0, '0.00'),
(2625, 190, 583, NULL, '2024-09-07 12:09:25', '12.00', '17.00', '0.00', 0, '0.00'),
(2626, 191, 583, NULL, '2024-09-07 12:09:25', '16.50', '15.00', '0.00', 0, '0.00'),
(2627, 195, 583, NULL, '2024-09-07 12:09:25', '10.00', '14.00', '0.00', 0, '0.00'),
(2628, 188, 584, NULL, '2024-09-07 09:33:20', '15.50', '16.00', '0.00', 0, '0.00'),
(2629, 189, 584, NULL, '2024-09-07 09:33:20', '17.00', '15.00', '0.00', 0, '0.00'),
(2630, 193, 584, NULL, '2024-09-07 09:33:20', '11.50', '14.50', '0.00', 0, '0.00'),
(2631, 196, 585, NULL, '2024-09-07 10:37:13', '11.50', '15.00', '0.00', 0, '0.00'),
(2632, 197, 585, NULL, '2024-09-07 10:37:13', '12.00', '14.00', '0.00', 0, '0.00'),
(2633, 200, 11, '2024-12-16 11:22:14', '2024-12-16 11:46:49', '10.00', '12.00', '0.00', 0, '0.00'),
(2634, 200, 12, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '11.00', '13.00', '0.00', 0, '0.00'),
(2635, 200, 13, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '10.00', '15.00', '0.00', 0, '0.00'),
(2636, 200, 14, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '14.00', '15.00', '0.00', 0, '0.00'),
(2637, 200, 202, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '13.00', '14.00', '0.00', 0, '0.00'),
(2638, 200, 203, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '12.00', '14.00', '0.00', 0, '0.00'),
(2639, 200, 206, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '11.00', '14.00', '0.00', 0, '0.00'),
(2640, 200, 208, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '10.00', '16.00', '0.00', 0, '0.00'),
(2641, 200, 209, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '13.00', '13.00', '0.00', 0, '0.00'),
(2642, 200, 201, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '12.00', '14.00', '0.00', 0, '0.00'),
(2643, 200, 543, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '12.00', '13.00', '0.00', 0, '0.00'),
(2644, 200, 212, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '14.00', '15.00', '0.00', 0, '0.00'),
(2645, 200, 213, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '13.00', '14.00', '0.00', 0, '0.00'),
(2646, 200, 197, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '10.00', '15.00', '0.00', 0, '0.00'),
(2647, 200, 198, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '11.00', '13.00', '0.00', 0, '0.00'),
(2648, 200, 199, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '10.00', '15.00', '0.00', 0, '0.00'),
(2649, 200, 200, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '14.00', '15.00', '0.00', 0, '0.00'),
(2650, 200, 204, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '13.00', '13.00', '0.00', 0, '0.00'),
(2651, 200, 205, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '12.00', '14.00', '0.00', 0, '0.00'),
(2652, 200, 207, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '10.00', '11.00', '0.00', 0, '0.00'),
(2653, 200, 210, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '12.00', '14.00', '0.00', 0, '0.00'),
(2654, 200, 211, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '9.00', '13.00', '0.00', 0, '0.00'),
(2655, 200, 214, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '12.00', '12.00', '0.00', 0, '0.00'),
(2656, 200, 215, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '15.00', '10.00', '0.00', 0, '0.00'),
(2657, 200, 448, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '11.00', '14.00', '0.00', 0, '0.00'),
(2658, 200, 449, '2024-12-16 11:22:14', '2024-12-16 11:55:22', '12.00', '15.00', '0.00', 0, '0.00'),
(2659, 200, 554, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '14.00', '12.00', '0.00', 0, '0.00'),
(2660, 200, 555, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '10.00', '10.00', '0.00', 0, '0.00'),
(2661, 200, 556, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '14.00', '15.00', '0.00', 0, '0.00'),
(2662, 200, 557, '2024-12-16 11:22:14', '2024-12-16 11:59:04', '10.00', '11.00', '0.00', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `cycles`
--

CREATE TABLE `cycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cycles`
--

INSERT INTO `cycles` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'HIGHER NATIONAL DIPLOMAT', 'HND', NULL, NULL),
(2, 'BREVET DE TECHNICIEN SUPERIEUR', 'BTS', NULL, NULL),
(4, 'LICENCE PROFESSIONNELLE', 'LIPRO', '2024-05-23 11:47:50', '2024-05-23 11:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `cycle_levels`
--

CREATE TABLE `cycle_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cycle_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cycle_levels`
--

INSERT INTO `cycle_levels` (`id`, `cycle_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 1, 11, NULL, NULL),
(2, 1, 12, NULL, NULL),
(3, 2, 11, NULL, NULL),
(4, 2, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facturations`
--

CREATE TABLE `facturations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `tranche1` int(11) NOT NULL DEFAULT 0,
  `tranche2` int(11) NOT NULL DEFAULT 0,
  `tranche3` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pdf_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inscription` int(11) NOT NULL DEFAULT 0,
  `tdv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facturations`
--

INSERT INTO `facturations` (`id`, `student_id`, `tranche1`, `tranche2`, `tranche3`, `created_at`, `updated_at`, `pdf_name`, `reference_id`, `inscription`, `tdv`, `academic_year`, `level_id`) VALUES
(325, 142, 10000, 0, 0, '2024-04-24 15:44:19', '2024-04-24 15:44:19', '24ISIG1028-24FF0001.pdf', '24FF0001', 40000, 'Paie', '2023-2024', 11),
(326, 142, 50000, 0, 0, '2024-04-24 15:55:03', '2024-04-24 15:55:05', '24ISIG1028-24FF0002.pdf', '24FF0002', 0, 'Bourse', '2023-2024', 11),
(327, 140, 10000, 0, 0, '2024-04-25 09:28:16', '2024-04-25 09:28:19', '24ISIG1026-24FF0003.pdf', '24FF0003', 40000, 'Paie', '2023-2024', 11),
(328, 139, 70000, 0, 0, '2024-04-25 09:38:20', '2024-04-25 09:38:21', '24ISIG1025-24FF0004.pdf', '24FF0004', 40000, 'Paie', '2023-2024', 11),
(329, 139, 50000, 0, 0, '2024-04-25 10:57:17', '2024-04-25 10:57:20', '24ISIG1025-24FF0005.pdf', '24FF0005', 0, 'Paie', '2023-2024', 11),
(330, 140, 50000, 0, 0, '2024-04-26 08:22:27', '2024-04-26 08:22:33', '24ISIG1026-24FF0006.pdf', '24FF0006', 0, 'Paie', '2023-2024', 11),
(331, 140, 46000, 0, 0, '2024-05-02 08:12:22', '2024-05-02 08:12:25', '24ISIG1026-24FF0007.pdf', '24FF0007', 0, 'Paie', '2023-2024', 11),
(332, 140, 23000, 0, 0, '2024-05-02 08:24:33', '2024-05-02 08:24:40', '24ISIG1026-24FF0008.pdf', '24FF0008', 0, 'Paie', '2023-2024', 11),
(333, 140, 50000, 0, 0, '2024-05-03 12:08:53', '2024-05-03 12:08:54', '24ISIG1026-24FF0009.pdf', '24FF0009', 0, 'Paie', '2023-2024', 11),
(335, 140, 45000, 0, 0, '2024-05-24 12:39:56', '2024-05-24 12:39:59', '24ISIG1026-24FF0010.pdf', '24FF0010', 0, 'Paie', '2023-2024', 11);

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
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(11, '1', 'This is the first year of HND program', '2023-11-25 06:35:19', '2023-11-25 06:35:19'),
(12, '2', 'This is the second level of HND program', '2023-11-25 06:43:01', '2023-11-25 06:43:01'),
(19, '3', 'This is the degree level', '2024-05-15 13:00:10', '2024-05-15 13:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `level_semesters`
--

CREATE TABLE `level_semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_semesters`
--

INSERT INTO `level_semesters` (`id`, `level_id`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, NULL, NULL),
(2, 11, 4, NULL, NULL),
(3, 12, 1, NULL, NULL),
(4, 12, 4, NULL, NULL),
(5, 19, 1, '2024-11-06 09:39:25', '2024-11-06 09:39:25'),
(6, 19, 4, '2024-11-06 09:39:25', '2024-11-06 09:39:25');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 3),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(6, '2023_11_19_134712_create_academic_years_table', 6),
(8, '2023_11_19_141410_create_specialties_table', 8),
(12, '2023_11_19_131407_create_levels_table', 11),
(13, '2023_11_19_140804_create_semesters_table', 12),
(14, '2023_11_19_142517_create_unite_enseignements_table', 13),
(15, '2023_11_19_153250_create_courses_table', 14),
(16, '2023_11_22_075106_create_specialty_ues_table', 15),
(17, '2023_11_22_075415_create_ue_courses_table', 16),
(18, '2023_11_28_160029_create_students_table', 17),
(19, '2023_11_29_111328_create_course_students_table', 18),
(20, '2023_11_28_163603_create_lecturers_table', 19),
(21, '2023_11_30_144526_add_ue_id_column_to_courses_table', 20),
(26, '2023_12_02_152700_add_columns_to_course_students_table', 21),
(27, '2023_12_12_225200_add_reseat_mark_column_to_course_students_table', 22),
(28, '2023_12_12_234241_update_course_students_table', 22),
(29, '2023_12_14_192545_create_cycles_table', 23),
(30, '2023_12_14_193755_add_cycle_id_column_to_specialties_table.php\r\n', 24),
(31, '2023_12_15_135333_create_cycle_levels_table', 25),
(32, '2023_12_15_135413_create_specialty_levels_table', 26),
(33, '2023_12_15_165244_create_level_semesters_table', 27),
(34, '2023_12_25_220846_add_columns_to_students_table', 28),
(35, '2023_12_29_131930_create_student_levels_table', 29),
(36, '2023_12_30_190851_create_course_natures_table', 30),
(37, '2023_12_30_192448_add_course_nature_id_column_to_unite_enseignements_table', 31),
(38, '2024_01_02_191831_create_student_ues_table', 32),
(39, '2024_03_25_092433_create_tranches_table', 33),
(41, '2024_03_25_173244_create_specialty_tranches_table', 34),
(42, '2024_03_27_100528_create_facturations_table', 35),
(43, '2024_04_05_185723_create_factures_table', 36),
(46, '2024_04_05_203838_add_columns_to_facturations_table--table=facturations', 37),
(47, '2024_04_15_161824_add_composite_keys_to_specialty_tranches_table', 38),
(48, '2024_04_15_162731_add_inscription_column_to_facturations_table', 39),
(49, '2024_04_15_163419_add_period_column_to_students_table', 40),
(50, '2024_04_23_163431_create_permission_tables', 41),
(51, '2024_05_16_124622_create_papers_table', 42),
(52, '2024_05_16_124652_create_student_papers_table', 43),
(54, '2024_06_20_175707_create_user_has_roles_table', 44);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_points` int(10) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `name`, `credit_points`, `level_id`, `semester_id`, `specialty_id`, `created_at`, `updated_at`) VALUES
(10, 'EPREUVE PROFESSIONNELLE DE SYNTHESE', 14, 12, 4, 20, '2024-05-17 10:49:41', '2024-05-17 10:49:41'),
(11, 'TECHNIQUES QUANTITATIVES DE GESTION', 3, 12, 4, 20, '2024-05-21 14:46:23', '2024-05-21 14:46:23'),
(12, 'DROIT ET ETHIQUE', 2, 12, 4, 20, '2024-05-21 14:46:49', '2024-05-21 14:46:49'),
(13, 'FISCALITE', 3, 12, 4, 20, '2024-05-21 14:47:17', '2024-05-21 14:47:17'),
(14, 'TECHNIQUE D\'EXPRESSION FRANCAISE', 2, 12, 4, 20, '2024-05-21 14:48:07', '2024-05-21 14:48:07'),
(15, 'ECONOMIE GENERALE', 3, 12, 4, 20, '2024-05-21 14:48:45', '2024-05-21 14:48:45'),
(16, 'INFORMATIQUE GENERALE', 2, 12, 4, 20, '2024-05-21 14:49:44', '2024-05-21 14:49:44'),
(17, 'TECHNIQUE D\'EXPRESSION ANGLAISE', 3, 12, 4, 20, '2024-05-21 14:50:21', '2024-05-21 14:50:21'),
(18, 'CREATION ET ORGANISATION DE L\'ENTREPRISE', 3, 12, 4, 20, '2024-05-21 14:51:16', '2024-05-21 14:51:16'),
(19, 'EPREUVE PROFESSIONNELLE DE SYNTHESE', 14, 12, 4, 27, '2024-05-21 16:34:21', '2024-05-21 16:34:21'),
(20, 'DROIT ET ETHIQUE', 2, 12, 4, 27, '2024-05-21 16:34:50', '2024-05-21 16:34:50'),
(21, 'GESTION DES PRESTATIONS LOGISTIQUE', 6, 12, 4, 27, '2024-05-21 16:35:32', '2024-05-21 16:35:32'),
(22, 'ORGANISATION ET EXPLOITATION DES TRANSPORTS', 6, 12, 4, 27, '2024-05-21 16:38:01', '2024-05-21 16:38:01'),
(23, 'MERCATIQUE ET ASPECTS JURIDIQUES APPLIQUES AU TRANSPORT', 5, 12, 4, 27, '2024-05-21 16:38:56', '2024-05-21 16:38:56'),
(24, 'TECHNIQUE D\'EXPRESSION FRANCAISE', 2, 12, 4, 27, '2024-05-21 16:39:22', '2024-05-21 16:39:22'),
(25, 'ECONOMIE GENERALE', 3, 12, 4, 27, '2024-05-21 16:40:17', '2024-05-21 16:40:17'),
(26, 'INFORMATIQUE ET MULTIMEDIA', 2, 12, 4, 27, '2024-05-21 16:40:59', '2024-05-21 16:40:59'),
(27, 'TECHNIQUE D\'EXPRESSION ANGLAISE', 3, 12, 4, 27, '2024-05-21 16:42:31', '2024-05-21 16:42:31'),
(28, 'CREATION ET ORGANISATION DE L\'ENTREPRISE', 3, 12, 4, 27, '2024-05-21 16:43:02', '2024-05-21 16:43:02'),
(29, 'GESTION COMPTABLE', 3, 12, 4, 27, '2024-05-21 16:43:29', '2024-05-21 16:43:29'),
(30, 'GESTION DES OPERATIONS DE LOGISTIQUE INDUSTRIELLE', 6, 12, 4, 27, '2024-05-21 16:44:11', '2024-05-21 16:44:11'),
(31, 'GEOGRAPHY DES FLUX ET TRANSPORT DES VOYAGEURS', 2, 12, 4, 27, '2024-05-21 16:44:52', '2024-05-21 16:44:52'),
(32, 'EPREUVE PROFESSIONNELLE DE SYNTHESE', 75, 12, 4, 24, '2024-05-22 08:46:22', '2024-05-22 08:46:22'),
(33, 'DROIT ET ETHIQUE', 2, 12, 4, 24, '2024-05-22 08:47:13', '2024-05-22 08:47:13'),
(34, 'TECHNIQUES DE BASE DE L\'ASSISTANT', 4, 12, 4, 24, '2024-05-22 08:47:57', '2024-05-22 08:47:57'),
(35, 'TECHNIQUES PROFESSIONNELLES', 10, 12, 4, 24, '2024-05-22 08:48:42', '2024-05-22 08:48:42'),
(36, 'MATHEMATIQUES COMMERCIALES', 3, 12, 4, 24, '2024-05-22 08:49:08', '2024-05-22 08:49:08'),
(37, 'TECHNIQUE D\'EXPRESSION FRANCAISE', 2, 12, 4, 24, '2024-05-22 08:49:25', '2024-05-22 08:49:25'),
(38, 'ECONOMIE GENERALE', 3, 12, 4, 24, '2024-05-22 08:49:50', '2024-05-22 08:49:50'),
(39, 'INFORMATIQUE GENERALE', 2, 12, 4, 24, '2024-05-22 08:50:20', '2024-05-22 08:50:20'),
(40, 'TECHNIQUE D\'EXPRESSION ANGLAISE', 3, 12, 4, 24, '2024-05-22 08:50:43', '2024-05-22 08:50:43'),
(41, 'CREATION ET ORGANISATION DE L\'ENTREPRISE', 3, 12, 4, 24, '2024-05-22 08:51:03', '2024-05-22 08:51:03'),
(42, 'EPREUVE PROFESSIONNELLE DE SYNTHESE', 14, 12, 4, 18, '2024-05-22 08:51:32', '2024-05-22 08:51:32'),
(43, 'DROIT ET ETHIQUE', 1, 12, 4, 18, '2024-05-22 08:51:53', '2024-05-22 08:51:53'),
(45, 'ALGORITHMIQUE ET STRUCTURE DE DONNEES', 7, 12, 4, 18, '2024-05-22 08:53:13', '2024-05-22 08:53:13'),
(46, 'MATHEMATIQUES GENERALES', 5, 12, 4, 18, '2024-05-22 08:54:18', '2024-05-22 08:54:18'),
(47, 'TECHNIQUE D\'EXPRESSION FRANCAISE', 1, 12, 4, 18, '2024-05-22 08:55:14', '2024-05-22 08:55:14'),
(48, 'ECONOMIE GENERALE, CREATION ET ORGANISATION DES ENTREPRISE', 1, 12, 4, 18, '2024-05-22 08:55:50', '2024-05-22 08:55:50'),
(49, 'COMPTABILITE GENERALE ET COMPTABILITE ANALYTIQUE D\'EXPLOITATION', 1, 12, 4, 18, '2024-05-22 08:57:35', '2024-05-22 08:57:35'),
(50, 'TECHNIQUE D\'EXPRESSION ANGLAISE', 3, 12, 4, 18, '2024-05-22 08:58:14', '2024-05-22 08:58:14'),
(51, 'SYSTEME INFORMATIQUE', 3, 12, 4, 18, '2024-05-22 08:58:46', '2024-05-22 08:58:46'),
(52, 'RESEAUX ET ADMINISTRATION SYSTEME', 3, 12, 4, 18, '2024-05-22 09:01:03', '2024-05-22 09:01:03'),
(53, 'CASE STUDY', 14, 12, 4, 31, '2024-05-22 09:07:38', '2024-05-22 09:07:38'),
(54, 'LAW AND CITIZENSHIP EDUCATION', 2, 12, 4, 31, '2024-05-22 09:08:20', '2024-05-22 09:08:20'),
(55, 'MANAGEMENT', 10, 12, 4, 31, '2024-05-22 09:08:55', '2024-05-22 09:08:55'),
(57, 'INTERNATIONAL FREIGHT FORWARDING', 7, 12, 4, 31, '2024-05-22 09:10:28', '2024-05-22 09:10:28'),
(58, 'COMPUTER STUDIES', 1, 12, 4, 31, '2024-05-22 09:11:00', '2024-05-22 09:11:00'),
(59, 'INTERNATIONAL TRADE AND TRANSPORT MANAGEMENT', 7, 12, 4, 31, '2024-05-22 09:11:35', '2024-05-22 09:11:35'),
(60, 'TRANSPORT SAFETY AND ENVIRONMENTAL MANAGEMENT', 6, 12, 4, 31, '2024-05-22 09:12:15', '2024-05-22 09:12:15'),
(61, 'ENTERPRISE CREATION AND ENTREPRENEURSHIP', 1, 12, 4, 31, '2024-05-22 09:12:50', '2024-05-22 09:12:50'),
(62, 'FRENCH', 1, 12, 4, 31, '2024-05-22 09:13:15', '2024-05-22 09:13:15'),
(63, 'ENGLISH', 1, 12, 4, 31, '2024-05-22 09:13:56', '2024-05-22 09:13:56'),
(64, 'CASE STUDY', 14, 12, 4, 21, '2024-05-22 09:14:37', '2024-05-22 09:14:37'),
(65, 'LAW AND CITIZENSHIP EDUCATION', 2, 12, 4, 21, '2024-05-22 09:15:04', '2024-05-22 09:15:04'),
(66, 'INFORMATION SYSTEMS', 6, 12, 4, 21, '2024-05-22 09:15:26', '2024-05-22 09:15:26'),
(67, 'COMPUTER TECHNOLOGY', 4, 12, 4, 21, '2024-05-22 09:16:33', '2024-05-22 09:16:33'),
(68, 'DIGITAL ELECTRONICS', 7, 12, 4, 21, '2024-05-22 09:17:03', '2024-05-22 09:17:03'),
(69, 'SYSTEM ANALYSIS AND DESIGN', 7, 12, 4, 21, '2024-05-22 09:17:34', '2024-05-22 09:17:34'),
(70, 'DIGITAL LITERACY', 2, 12, 4, 21, '2024-05-22 09:17:59', '2024-05-22 09:17:59'),
(71, 'DISCRETE MATHEMATICS', 4, 12, 4, 21, '2024-05-22 09:18:27', '2024-05-22 09:18:27'),
(72, 'ENTERPRISE CREATION AND ENTREPRENEURSHIP', 1, 12, 4, 21, '2024-05-22 09:20:16', '2024-05-22 09:20:16'),
(73, 'FRENCH', 1, 12, 4, 21, '2024-05-22 09:20:39', '2024-05-22 09:20:39'),
(74, 'ENGLISH', 1, 12, 4, 21, '2024-05-22 09:21:46', '2024-05-22 09:21:46'),
(75, 'PROGRAMMATION', 4, 12, 4, 18, '2024-05-22 11:21:23', '2024-05-22 11:21:23'),
(76, 'PRESESNTATION DE RAPPORT DE STAGE', 2, 12, 4, 18, '2024-05-22 11:38:14', '2024-05-22 11:38:14'),
(77, 'PRESESNTATION DE RAPPORT DE STAGE', 2, 12, 4, 20, '2024-05-22 11:38:36', '2024-05-22 11:38:36'),
(78, 'PRESESNTATION DE RAPPORT DE STAGE', 2, 12, 4, 24, '2024-05-22 11:39:22', '2024-05-22 11:39:22'),
(79, 'PRESESNTATION DE RAPPORT DE STAGE', 2, 12, 4, 27, '2024-05-22 11:39:41', '2024-05-22 11:39:41'),
(80, 'DEFENSE OF INTERNSHIP REPORT', 2, 12, 4, 31, '2024-05-22 11:40:10', '2024-05-22 11:40:10'),
(81, 'DEFENSE OF INTERNSHIP REPORT', 2, 12, 4, 21, '2024-05-22 11:40:24', '2024-05-22 11:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('wisknowltabi123@gmail.com', '$2y$12$f043qMjIr0gkcrCxuHKTtOi3wK0Aj9bAq/C4ozLsSOvoBjA/3L4MK', '2024-04-30 15:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-06-20 17:41:38', '2024-06-20 17:41:38'),
(2, 'cashier', 'web', '2024-06-21 20:57:20', '2024-06-21 20:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '1', '1970-01-01', '1970-01-01', '2023-11-24 15:53:31', '2023-11-24 15:53:31'),
(4, '2', '1970-01-01', '1970-01-01', '2023-12-15 16:02:01', '2023-12-15 16:02:01');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cycle_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `code`, `description`, `created_at`, `updated_at`, `cycle_id`) VALUES
(18, 'GENIE LOGICIEL', 'GL', 'Nice Specialty', '2023-12-14 19:22:32', '2023-12-14 19:22:32', 2),
(19, 'BANQUE ET FINANCE', 'BF', 'Nice specialty', '2023-12-14 19:23:28', '2023-12-14 19:23:28', 2),
(20, 'COMPTABILITE ET GESTION DES ENTREPRISES', 'CGE', 'COMPTABILITE ET GESTION DES ENTREPRISES', '2023-12-14 19:24:26', '2023-12-14 19:24:26', 2),
(21, 'SOFTWARE ENGINEERING', 'SWE', 'Nice Field', '2023-12-14 19:35:59', '2023-12-14 19:35:59', 1),
(24, 'ASSISTANT MANAGER', 'AMA', 'NICE SPEC', '2023-12-15 10:56:14', '2023-12-15 10:56:14', 2),
(26, 'DOUANE ET TRANSIT', 'DOT', 'OKAY', '2024-01-05 06:56:32', '2024-01-05 06:56:32', 2),
(27, 'GESTION LOGISTIQUE ET TRANSPORT', 'GLT', 'OKAY', '2024-01-05 06:57:45', '2024-01-05 06:57:45', 2),
(31, 'LOGISTICS AND TRANSPORT MANAGEMENT', 'LTM', 'New specialty', '2024-01-17 08:04:09', '2024-01-17 08:04:09', 1),
(44, 'TELECOMMUNICATION', 'TEL', 'Whatever', '2024-05-02 14:10:58', '2024-05-02 14:10:58', 1),
(45, 'NETWORK AND SECURITY', 'NWS', 'Whatever', '2024-05-02 14:13:03', '2024-05-02 14:13:03', 1),
(46, 'COMPTABILITE ET FINANCE', 'FIC', 'OKAY', '2024-05-23 11:49:02', '2024-05-23 11:49:02', 4),
(47, 'GESTION DES RESSOURCES HUMAINES', 'GRH', 'OKAY', '2024-05-24 10:46:56', '2024-05-24 10:46:56', 4),
(48, 'LOGISTIQUE ET TRANSPORT', 'TLO', 'OKAY', '2024-05-24 10:48:41', '2024-05-24 10:48:41', 4);

-- --------------------------------------------------------

--
-- Table structure for table `specialty_levels`
--

CREATE TABLE `specialty_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialty_levels`
--

INSERT INTO `specialty_levels` (`id`, `specialty_id`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 18, 11, NULL, NULL),
(2, 18, 12, NULL, NULL),
(3, 19, 11, NULL, NULL),
(4, 19, 12, NULL, NULL),
(5, 20, 11, NULL, NULL),
(6, 20, 12, NULL, NULL),
(7, 21, 11, NULL, NULL),
(8, 21, 12, NULL, NULL),
(13, 24, 11, NULL, NULL),
(14, 24, 12, NULL, NULL),
(16, 27, 11, NULL, NULL),
(17, 27, 12, NULL, NULL),
(18, 31, 11, NULL, NULL),
(19, 31, 12, NULL, NULL),
(20, 26, 11, NULL, NULL),
(21, 26, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialty_tranches`
--

CREATE TABLE `specialty_tranches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `tranche_id` bigint(20) UNSIGNED NOT NULL,
  `tranche_amount` int(11) NOT NULL DEFAULT 0,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialty_tranches`
--

INSERT INTO `specialty_tranches` (`id`, `specialty_id`, `tranche_id`, `tranche_amount`, `period`, `created_at`, `updated_at`, `level_id`) VALUES
(16, 18, 5, 40000, 'jour', '2024-04-16 16:21:29', '2024-04-16 16:21:29', 11),
(30, 18, 1, 300000, 'jour', '2024-04-16 16:58:21', '2024-04-16 16:58:21', 11),
(31, 18, 2, 200000, 'jour', '2024-04-16 16:58:39', '2024-04-16 16:58:39', 11),
(32, 18, 3, 100000, 'jour', '2024-04-16 16:58:57', '2024-04-16 16:58:57', 11),
(33, 19, 5, 40000, 'jour', '2024-04-16 17:28:32', '2024-04-16 17:28:32', 11),
(34, 21, 5, 40000, 'jour', '2024-04-17 09:40:26', '2024-04-17 09:40:26', 11),
(36, 21, 2, 85000, 'jour', '2024-04-17 09:43:02', '2024-04-17 09:43:02', 11),
(37, 21, 3, 35000, 'jour', '2024-04-17 09:43:24', '2024-04-17 09:43:24', 11),
(40, 21, 1, 230000, 'jour', '2024-04-17 10:34:39', '2024-04-17 10:34:39', 11),
(41, 18, 5, 40000, 'jour', '2024-04-25 08:06:46', '2024-04-25 08:06:46', 12),
(42, 21, 5, 40000, 'jour', '2024-04-25 08:09:45', '2024-04-25 08:09:45', 12),
(43, 21, 1, 230000, 'jour', '2024-04-25 08:10:04', '2024-04-25 08:10:04', 12),
(44, 21, 2, 85000, 'jour', '2024-04-25 08:10:23', '2024-04-25 08:10:23', 12),
(47, 21, 3, 35000, 'jour', '2024-04-25 08:24:52', '2024-04-25 08:24:52', 12),
(48, 21, 5, 40000, 'soir', '2024-04-25 08:30:07', '2024-04-25 08:30:07', 11);

-- --------------------------------------------------------

--
-- Table structure for table `specialty_ues`
--

CREATE TABLE `specialty_ues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `ue_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialty_ues`
--

INSERT INTO `specialty_ues` (`id`, `specialty_id`, `ue_id`, `created_at`, `updated_at`) VALUES
(10, 18, 4, '2023-12-15 09:59:51', '2023-12-15 09:59:51'),
(11, 18, 9, '2023-12-15 09:59:51', '2023-12-15 09:59:51'),
(12, 19, 1, '2023-12-15 10:30:06', '2023-12-15 10:30:06'),
(13, 19, 2, '2023-12-15 10:30:06', '2023-12-15 10:30:06'),
(14, 20, 1, '2023-12-15 10:40:18', '2023-12-15 10:40:18'),
(15, 20, 2, '2023-12-15 10:40:18', '2023-12-15 10:40:18'),
(17, 21, 6, '2023-12-15 10:45:04', '2023-12-15 10:45:04'),
(18, 21, 7, '2023-12-15 10:45:04', '2023-12-15 10:45:04'),
(23, 21, 12, '2023-12-16 08:10:55', '2023-12-16 08:10:55'),
(24, 21, 13, '2023-12-16 08:24:01', '2023-12-16 08:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cycle_id` bigint(20) UNSIGNED NOT NULL,
  `period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'jour'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `gender`, `dob`, `mobile`, `matricule`, `specialty_id`, `created_at`, `updated_at`, `pob`, `domain`, `field`, `cycle_id`, `period`) VALUES
(114, 'ADJEULEFACK MIAFFO MIRLANDE', 'wisknowltabi123@gmail.com', 'Female', '2004-02-13', '679867072', '24ISIG00095', 18, '2024-01-11 07:12:57', '2024-06-12 11:19:55', 'FOKOUE', NULL, NULL, 2, 'jour'),
(115, 'BUKAM NGUEPNJOP DARLAIN NATHAN', 'wisknowltabi1231@gmail.com', 'Female', '2005-05-08', '679867072', '22ISIG00101', 18, '2024-01-11 07:59:56', '2024-06-12 11:22:08', 'BONABERI', NULL, NULL, 2, 'jour'),
(116, 'TAKOUDJOU STEVE DIEGO', 'wisknowltabi1233@gmail.com', 'Female', '2004-06-26', '679867072', '22ISIG00125', 18, '2024-01-11 08:02:45', '2024-06-12 11:22:45', 'BONABERI', NULL, NULL, 2, 'jour'),
(117, 'ANANDA YVAN RYAN', 'wisknowltabi12341@gmail.com', 'Male', '2002-01-11', '679867072', '22ISIG00133', 18, '2024-01-11 08:07:52', '2024-06-12 11:18:11', 'DOUALA', NULL, NULL, 2, 'jour'),
(118, 'AYIAGNIGNI TETAN CYRIL', 'wisknowltabi120013@gmail.com', 'Female', '2001-07-27', '679867072', '22ISIG00090', 27, '2024-01-11 19:59:00', '2024-06-12 11:07:30', 'BAIGOM', NULL, NULL, 2, 'jour'),
(119, 'EBANG NGOLE CHRISTIAN', 'wisknowltabi123389@gmail.com', 'Female', '2006-01-05', '679867072', '22ISIG00138', 27, '2024-01-11 20:00:44', '2024-06-12 11:05:22', 'MBAREMBEN', NULL, NULL, 2, 'jour'),
(120, 'MOUSSAMBE ZODOM CELIA', 'wisknowltabi1233337@gmail.com', 'Female', '2000-02-16', '679867072', '22ISIG00122', 27, '2024-01-11 20:01:40', '2024-06-12 11:03:58', 'MBANGA', NULL, NULL, 2, 'jour'),
(121, 'NKOUE MASSO PEGUY', 'wisknowltabi1222453@gmail.com', 'Female', '2004-09-12', '679867072', '22ISIG00117', 27, '2024-01-11 20:02:24', '2024-06-12 11:01:58', 'KOUTABA', NULL, NULL, 2, 'jour'),
(122, 'KOUAZONG ANDONG ANGE LESLIE', 'wisknowltabi145823@gmail.com', 'Female', '2005-11-10', '679867072', '22ISIG00131', 24, '2024-01-12 09:04:10', '2024-06-12 11:42:41', 'DOUALA', NULL, NULL, 2, 'jour'),
(123, 'NGUIMFACK FOFACK GERINA', 'wisknowltabi123567@gmail.com', 'Female', '2002-05-25', '679867072', '22ISIG00094', 24, '2024-01-12 09:05:30', '2024-06-12 11:44:13', 'BONABERI', NULL, NULL, 2, 'jour'),
(124, 'TIOFACK NJELOH TATIANA PAULINE', 'wisknowltabi10001223@gmail.com', 'Female', '2005-05-20', '679867072', '22ISIG00123', 24, '2024-01-12 09:07:31', '2024-06-12 11:45:39', 'BONABERI', NULL, NULL, 2, 'jour'),
(125, 'TSAMO ARIELLE MAEVA', 'wisknowltabi1147823@gmail.com', 'Female', '2003-01-30', '679867072', '22ISIG00112', 24, '2024-01-12 09:08:45', '2024-06-12 11:46:48', 'BALEVENG', NULL, NULL, 2, 'jour'),
(126, 'DONGMO MAFO BELDOUCE MIREILLE', 'wisknowltabi1287953@gmail.com', 'Female', '2004-01-07', '679867072', '22ISIG00116', 20, '2024-01-15 08:15:30', '2024-06-12 11:39:42', 'BONABERI', NULL, NULL, 2, 'jour'),
(127, 'KENGNI NGAMENI JOELLE', 'wisknowltabi0001123@gmail.com', 'Female', '2000-01-07', '679867072', '22ISIG00119', 20, '2024-01-15 08:18:06', '2024-06-12 11:38:29', 'FOYOUNI', NULL, NULL, 2, 'jour'),
(128, 'MAFOPA ADRIENNE FLORE', 'wisknowltabi12300023@gmail.com', 'Female', '2003-12-21', '679867072', '22ISIG00115', 20, '2024-01-15 08:19:35', '2024-06-12 11:36:46', 'MBOUDA', NULL, NULL, 2, 'jour'),
(129, 'MANTHO KAMTA LOVELINE NISETTE', 'wisknowltabi12223363@gmail.com', 'Female', '1997-08-22', '679867072', '22ISIG00092', 20, '2024-01-15 08:22:35', '2024-06-12 11:34:39', 'BALEPO', NULL, NULL, 2, 'jour'),
(130, 'TELIMETA MALEKEUKENG GUYLENE JORDANE', 'wisknowltabi12312345@gmail.com', 'Female', '1997-07-22', '679867072', '22ISIG00124', 20, '2024-01-15 08:25:26', '2024-06-12 11:31:57', 'BONABERI', NULL, NULL, 2, 'jour'),
(131, 'DJOUMO NKENGUE BLANCHE', 'wisknowltabi1231321@gmail.com', 'Female', '2004-06-12', '679867072', '22ISIG00118', 21, '2024-01-17 10:15:18', '2024-06-12 10:58:20', 'BONABERI', NULL, NULL, 1, 'jour'),
(132, 'NKEZI EDISON CHEFOR', 'wisknowltabi11235323@gmail.com', 'Male', '2004-03-26', '679867072', '22ISIG00141', 21, '2024-01-17 10:16:22', '2024-06-12 10:56:05', 'NKWEN-BAM', NULL, NULL, 1, 'jour'),
(133, 'TANYI RONICE NYONGAPSEN', 'wisknowltabi12312344@gmail.com', 'Female', '2001-05-05', '679867072', '22ISIG00130', 21, '2024-01-17 10:17:04', '2024-06-12 10:54:23', 'NYONGA', NULL, NULL, 1, 'jour'),
(134, 'TOUKAM NGAMENI AUDREY', 'wisknowltabi121235683@gmail.com', 'Female', '2000-08-20', '679867072', '22ISIG00128', 21, '2024-01-17 10:18:24', '2024-06-12 10:50:59', 'NJOMBE', NULL, NULL, 1, 'jour'),
(135, 'VIGBANSI FLORIDA', 'wisknowltabi1123523@gmail.com', 'Female', '2000-01-01', '67987070', '24ISIG1021', 21, '2024-01-17 10:19:05', '2024-01-17 10:19:05', 'DOUALA', NULL, NULL, 1, 'jour'),
(136, 'WAMBA KENFACK ROY CLARA', 'wisknowltabi12312584@gmail.com', 'Female', '2005-03-08', '679867072', '22ISIG00108', 31, '2024-01-17 11:02:03', '2024-06-12 10:38:59', 'BONABERI-DOUALA', NULL, NULL, 1, 'jour'),
(137, 'WAINDIM MEEKNESS NAYAH', 'wisknowltabi0023123@gmail.com', 'Female', '2004-07-03', '679867072', '22ISIG00104', 31, '2024-01-17 11:02:46', '2024-06-12 10:42:46', 'MAKENE', NULL, NULL, 1, 'jour'),
(138, 'YAM ELISTIANA AKUNGHA', 'wisknowltabi1232365@gmail.com', 'Female', '2005-04-21', '679867070', '22ISIG00107', 31, '2024-01-17 11:03:24', '2024-06-12 10:46:42', 'MBANGA', NULL, NULL, 1, 'jour'),
(139, 'MBOUMO BARACHEL', 'wisknowltabi123123698@gmail.com', 'Male', '2004-04-01', '67987070', '24ISIG1025', 21, '2024-01-17 11:26:40', '2024-08-05 10:23:24', 'BONABERI-DOUALA', NULL, NULL, 1, 'jour'),
(140, 'KOUEDEM NZENGOUM I LOPEZ', 'wisknowltab45i123@gmail.com', 'Male', '2008-01-23', '67987070', '24ISIG1026', 21, '2024-01-17 11:27:45', '2024-08-05 10:21:48', 'DOUALA', NULL, NULL, 1, 'jour'),
(141, 'TALLA NTCHUINDJANG FRANC JUNIOR', 'wisknowltabi1238963@gmail.com', 'Male', '2004-05-25', '67987070', '24ISIG1027', 21, '2024-01-17 11:28:36', '2024-08-05 10:27:03', 'BAFANG', NULL, NULL, 1, 'jour'),
(142, 'NZAPGUE MEKUEKO CABREL MANUEL', 'alternate@gmail.com', 'Female', '2006-02-04', '67987070', '24ISIG1028', 21, '2024-01-17 11:29:30', '2024-08-05 10:25:10', 'DOUNA', NULL, NULL, 1, 'jour'),
(143, 'MELI YOUSSI ARNAULD', 'wisknowltabi122583@gmail.com', 'Male', '2004-04-18', '67987070', '24ISIG0404', 19, '2024-01-17 12:11:07', '2024-08-05 08:35:16', 'MBATCHAM', NULL, NULL, 2, 'jour'),
(144, 'ZEUFACK KENDRA SORAIDA SANDRA', 'wisknowltabi1233698@gmail.com', 'Female', '2005-11-22', '67987070', '24ISIG1105', 19, '2024-01-17 12:12:53', '2024-08-05 09:41:10', 'BONABERI-DOUALA', NULL, NULL, 2, 'jour'),
(145, 'YAPMENI NGANDEU YVANA PATRICIA', 'wisknowltabi1023589@gmail.com', 'Female', '2005-09-29', '67987070', '24ISIG0905', 19, '2024-01-17 12:14:18', '2024-08-05 09:43:09', 'DOUALA', NULL, NULL, 2, 'jour'),
(146, 'AZOMBOU TEUFACK SAMURA', 'wisknowltabi10025823@gmail.com', 'Female', '2002-09-15', '67987070', '24ISIG1502', 26, '2024-01-17 12:25:51', '2024-08-05 10:03:30', 'DOUALA', NULL, NULL, 2, 'jour'),
(147, 'MEYONG MEYONG JOSUE', 'wisknowltabi12302834@gmail.com', 'Male', '2006-04-25', '67987070', '24ISIG2506', 26, '2024-01-17 12:26:38', '2024-08-05 10:05:00', 'DOUALA', NULL, NULL, 2, 'jour'),
(148, 'KENGNE TADIE ELSA C', 'wisknowlt5abi123@gmail.com', 'Female', '2005-10-17', '67987070', '24ISIG1034', 18, '2024-01-17 12:43:47', '2024-08-05 10:12:02', 'DOUALA', NULL, NULL, 2, 'jour'),
(149, 'MADAHA KOUONGMAZOU RAISSA', 'wisknow2ltabi123@gmail.com', 'Female', '2004-07-30', '67987070', '24ISIG0704', 18, '2024-01-17 12:44:46', '2024-08-05 10:13:36', 'BAMEDJIGHA', NULL, NULL, 2, 'jour'),
(150, 'NOUMSI MICHELE LAFORTUNE', 'wisknow2lta3bi123@gmail.com', 'Female', '2006-01-10', '67987070', '24ISIG1036', 18, '2024-01-17 12:45:29', '2024-08-05 10:16:29', 'MANENGOLE', NULL, NULL, 2, 'jour'),
(151, 'TEDJOU MAUREL MAXIME', 'wisk3nowltabi12025834@gmail.com', 'Male', '2000-03-23', '67987070', '24ISIG1037', 18, '2024-01-17 12:46:19', '2024-08-05 10:20:21', 'MBANGA', NULL, NULL, 2, 'jour'),
(153, 'KOUEDY SKIPPEN MARVRYS J R', 'wisknowlt3abi122583@gmail.com', 'Male', '2000-01-01', '67987070', '24ISIG1038', 18, '2024-01-17 12:47:42', '2024-01-17 12:47:42', 'DOUALA', NULL, NULL, 2, 'jour'),
(154, 'DJIM-HOUINE BEOSSO YVES', 'wisknowltabi12258934@gmail.com', 'Male', '1997-05-19', '67987070', '24ISIG0597', 18, '2024-01-17 12:48:30', '2024-08-05 10:07:23', 'MOUNDOU', NULL, NULL, 2, 'jour'),
(155, 'SANDJONG PAUL FORTUNATUS', 'wisknowltabi122597413@gmail.com', 'Male', '2002-04-17', '67987070', '24ISIG1040', 18, '2024-01-17 12:49:10', '2024-08-05 10:17:46', 'CSI DE DJELENG', NULL, NULL, 2, 'jour'),
(156, 'CHEIK KPOUMIE ABOU NIDAL', 'wisknowlta34bi1234@gmail.com', 'Male', '2004-02-29', '67987070', '24ISIG0204', 20, '2024-01-17 13:05:17', '2024-08-05 09:50:22', 'FOUMBAN', NULL, NULL, 2, 'jour'),
(157, 'KENFACK PEIKEU LIDIVINE DAREL', 'wiskno23wltabi123@gmail.com', 'Female', '2005-10-11', '67987070', '24ISIG1005', 20, '2024-01-17 13:06:03', '2024-08-05 09:55:54', 'ESEKA', NULL, NULL, 2, 'jour'),
(158, 'MADJOUA ORLINE RINELLE', 'wisknow234ltabi123@gmail.com', 'Female', '2004-10-07', '67987070', '24ISIG1004', 20, '2024-01-17 13:06:45', '2024-08-05 09:57:54', 'NJOMBE', NULL, NULL, 2, 'jour'),
(159, 'NJOUMO ANGE IVANA', 'wiskn23owltabi1234@gmail.com', 'Female', '2006-09-23', '67987070', '24ISIG0906', 20, '2024-01-17 13:07:13', '2024-08-05 09:59:54', 'FOKOUE', NULL, NULL, 2, 'jour'),
(160, 'AYIWOVO MOUAFON WILLIAM SMITH JUNIOR', 'wi23sknow23ltabi1234@gmail.com', 'Male', '2004-09-16', '67987070', '24ISIG0904', 20, '2024-01-17 13:07:44', '2024-08-05 09:45:58', 'DOUALA', NULL, NULL, 2, 'jour'),
(161, 'KAMGUIA TEYOU DOMINIQUE', 'wisknowltabi1234@gmail.com', 'Male', '2000-02-14', '67987070', '24ISIG0200', 20, '2024-01-17 13:08:15', '2024-08-05 09:52:58', 'BAFOUSSAM', NULL, NULL, 2, 'jour'),
(162, 'FOFACK DJOUMESSI DOLL C', 'wisk23nowlta23bi123@gmail.com', 'Female', '2000-01-01', '67987070', '24ISIG1047', 20, '2024-01-17 13:09:04', '2024-01-17 13:09:04', 'DOUALA', NULL, NULL, 2, 'jour'),
(175, 'TEDJOUTEU NJEUMANI IDRISS PAKER', 'wisknowltaEWE12bi123@gmail.com', 'Male', '2004-03-20', '679867071', '24ISIG1048', 21, '2024-03-20 09:43:47', '2024-08-05 10:28:59', 'DOUALA', NULL, NULL, 1, 'jour'),
(188, 'BEUMEN CARELLE CLEMENCE', 'wisknowltabi123123123@gmail.com', 'Female', '1993-10-02', '679867072', '24ISIG1093', 47, '2024-05-24 10:54:17', '2024-05-24 10:54:17', 'Makenene', NULL, NULL, 4, 'jour'),
(189, 'MOUDJONGUE EPONGO MADELENE', 'wisknowltabi09823123@gmail.com', 'Female', '2003-06-12', '679867072', '24ISIG0603', 47, '2024-05-24 10:56:04', '2024-05-24 10:56:04', 'EBONE', NULL, NULL, 4, 'jour'),
(190, 'GOUONGUEU SANDEU EZECHIEL', 'wisWISKknowltabi123@gmail', 'Male', '1992-09-16', '679867072', '24ISIG0992', 46, '2024-05-24 10:58:04', '2024-05-24 10:58:04', 'TCHOLLIRE', NULL, NULL, 4, 'jour'),
(191, 'TCHOUANGUEM PEKWONGNE DAVID', 'wisknowltabi123DI123123@gmail.com', 'Male', '2004-04-27', '679867072', '24ISIG0404', 46, '2024-05-24 11:00:43', '2024-05-24 11:00:43', 'BAFOUSSAM', NULL, NULL, 4, 'jour'),
(193, 'ADEBODA ZE NICOLAS HONORE', 'wisknowltabi1231DF23123@gmail.com', 'Male', '1987-01-01', '679867072', '24ISIG0187', 47, '2024-05-24 11:06:03', '2024-05-24 11:06:03', 'METET', NULL, NULL, 4, 'jour'),
(195, 'ESSAPO SOPPO OLIVE MARIE', 'ikomendemWH014@gmail.com', 'Female', '1996-05-16', '679867072', '24ISIG0596', 46, '2024-05-24 11:10:05', '2024-05-24 11:10:05', 'NKONGSAMBA', NULL, NULL, 4, 'jour'),
(196, 'KENNE MALASTAP NTUBAN DORCAS', 'wiwiskekesknowltabi123@gmail.com', 'Female', '2004-07-01', '679867072', '24ISIG0704', 48, '2024-05-27 08:16:15', '2024-05-27 08:16:15', 'MGANGA', NULL, NULL, 4, 'jour'),
(197, 'NDJEE JOSEPH KEVIN', 'wisknowltabisiks123123@gmail.com', 'Female', '2001-07-01', '679867072', '24ISIG0701', 48, '2024-05-27 08:17:59', '2024-05-27 08:17:59', 'NKONGSAMBA', NULL, NULL, 4, 'jour'),
(200, 'SONA DJEUKING EMELDA CARINE', 'adminDDK@example.com', 'Female', '2001-03-30', '679867072', '21ISIG00014', 20, '2024-12-16 11:22:14', '2024-12-16 11:22:14', 'MTE NDOH DJUTTITSA', NULL, NULL, 2, 'jour');

-- --------------------------------------------------------

--
-- Table structure for table `student_levels`
--

CREATE TABLE `student_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_mark` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_levels`
--

INSERT INTO `student_levels` (`id`, `student_id`, `level_id`, `academic_year`, `pass_mark`, `created_at`, `updated_at`) VALUES
(25, 114, 12, '2023-2024', 50, '2024-01-11 07:12:58', '2024-01-11 07:12:58'),
(26, 115, 12, '2023-2024', 50, '2024-01-11 07:59:56', '2024-01-11 07:59:56'),
(27, 116, 12, '2023-2024', 50, '2024-01-11 08:02:45', '2024-01-11 08:02:45'),
(28, 117, 12, '2023-2024', 50, '2024-01-11 08:07:52', '2024-01-11 08:07:52'),
(29, 118, 12, '2023-2024', 50, '2024-01-11 19:59:02', '2024-01-11 19:59:02'),
(30, 119, 12, '2023-2024', 50, '2024-01-11 20:00:45', '2024-01-11 20:00:45'),
(31, 120, 12, '2023-2024', 50, '2024-01-11 20:01:41', '2024-01-11 20:01:41'),
(32, 121, 12, '2023-2024', 50, '2024-01-11 20:02:25', '2024-01-11 20:02:25'),
(33, 122, 12, '2023-2024', 50, '2024-01-12 09:04:10', '2024-01-12 09:04:10'),
(34, 123, 12, '2023-2024', 50, '2024-01-12 09:05:30', '2024-01-12 09:05:30'),
(35, 124, 12, '2023-2024', 50, '2024-01-12 09:07:32', '2024-01-12 09:07:32'),
(36, 125, 12, '2023-2024', 50, '2024-01-12 09:08:45', '2024-01-12 09:08:45'),
(37, 126, 12, '2023-2024', 50, '2024-01-15 08:15:31', '2024-01-15 08:15:31'),
(38, 127, 12, '2023-2024', 50, '2024-01-15 08:18:06', '2024-01-15 08:18:06'),
(39, 128, 12, '2023-2024', 50, '2024-01-15 08:19:36', '2024-01-15 08:19:36'),
(40, 129, 12, '2023-2024', 50, '2024-01-15 08:22:36', '2024-01-15 08:22:36'),
(41, 130, 12, '2023-2024', 50, '2024-01-15 08:25:26', '2024-01-15 08:25:26'),
(42, 131, 12, '2023-2024', 50, '2024-01-17 10:15:19', '2024-01-17 10:15:19'),
(43, 132, 12, '2023-2024', 50, '2024-01-17 10:16:23', '2024-01-17 10:16:23'),
(44, 133, 12, '2023-2024', 50, '2024-01-17 10:17:04', '2024-01-17 10:17:04'),
(45, 134, 12, '2023-2024', 50, '2024-01-17 10:18:24', '2024-01-17 10:18:24'),
(46, 135, 12, '2023-2024', 50, '2024-01-17 10:19:05', '2024-01-17 10:19:05'),
(47, 136, 12, '2023-2024', 50, '2024-01-17 11:02:03', '2024-01-17 11:02:03'),
(48, 137, 12, '2023-2024', 50, '2024-01-17 11:02:47', '2024-01-17 11:02:47'),
(49, 138, 12, '2023-2024', 50, '2024-01-17 11:03:24', '2024-01-17 11:03:24'),
(50, 139, 11, '2023-2024', 50, '2024-01-17 11:26:40', '2024-01-17 11:26:40'),
(51, 140, 11, '2023-2024', 50, '2024-01-17 11:27:46', '2024-01-17 11:27:46'),
(52, 141, 11, '2023-2024', 50, '2024-01-17 11:28:36', '2024-01-17 11:28:36'),
(53, 142, 11, '2023-2024', 50, '2024-01-17 11:29:30', '2024-01-17 11:29:30'),
(54, 143, 11, '2023-2024', 50, '2024-01-17 12:11:07', '2024-01-17 12:11:07'),
(55, 144, 11, '2023-2024', 50, '2024-01-17 12:12:53', '2024-01-17 12:12:53'),
(56, 145, 11, '2023-2024', 50, '2024-01-17 12:14:19', '2024-01-17 12:14:19'),
(57, 146, 11, '2023-2024', 50, '2024-01-17 12:25:51', '2024-01-17 12:25:51'),
(58, 147, 11, '2023-2024', 50, '2024-01-17 12:26:39', '2024-01-17 12:26:39'),
(59, 148, 11, '2023-2024', 50, '2024-01-17 12:43:47', '2024-01-17 12:43:47'),
(60, 149, 11, '2023-2024', 50, '2024-01-17 12:44:47', '2024-01-17 12:44:47'),
(61, 150, 11, '2023-2024', 50, '2024-01-17 12:45:29', '2024-01-17 12:45:29'),
(62, 151, 11, '2023-2024', 50, '2024-01-17 12:46:19', '2024-01-17 12:46:19'),
(63, 153, 11, '2023-2024', 50, '2024-01-17 12:47:42', '2024-01-17 12:47:42'),
(64, 154, 11, '2023-2024', 50, '2024-01-17 12:48:30', '2024-01-17 12:48:30'),
(65, 155, 11, '2023-2024', 50, '2024-01-17 12:49:10', '2024-01-17 12:49:10'),
(66, 156, 11, '2023-2024', 50, '2024-01-17 13:05:17', '2024-01-17 13:05:17'),
(67, 157, 11, '2023-2024', 50, '2024-01-17 13:06:03', '2024-01-17 13:06:03'),
(68, 158, 11, '2023-2024', 50, '2024-01-17 13:06:45', '2024-01-17 13:06:45'),
(69, 159, 11, '2023-2024', 50, '2024-01-17 13:07:13', '2024-01-17 13:07:13'),
(70, 160, 11, '2023-2024', 50, '2024-01-17 13:07:45', '2024-01-17 13:07:45'),
(71, 161, 11, '2023-2024', 50, '2024-01-17 13:08:16', '2024-01-17 13:08:16'),
(72, 162, 11, '2023-2024', 50, '2024-01-17 13:09:04', '2024-01-17 13:09:04'),
(82, 175, 11, '2023-2024', 50, '2024-03-20 09:43:47', '2024-03-20 09:43:47'),
(87, 188, 19, '2023-2024', 50, '2024-05-24 10:54:17', '2024-05-24 10:54:17'),
(88, 189, 19, '2023-2024', 50, '2024-05-24 10:56:04', '2024-05-24 10:56:04'),
(89, 190, 19, '2023-2024', 50, '2024-05-24 10:58:04', '2024-05-24 10:58:04'),
(90, 191, 19, '2023-2024', 50, '2024-05-24 11:00:44', '2024-05-24 11:00:44'),
(92, 193, 19, '2023-2024', 50, '2024-05-24 11:06:03', '2024-05-24 11:06:03'),
(94, 195, 19, '2023-2024', 50, '2024-05-24 11:10:05', '2024-05-24 11:10:05'),
(95, 196, 19, '2023-2024', 50, '2024-05-27 08:16:16', '2024-05-27 08:16:16'),
(96, 197, 19, '2023-2024', 50, '2024-05-27 08:17:59', '2024-05-27 08:17:59'),
(99, 200, 11, '2021-2022', 50, '2024-12-16 11:22:14', '2024-12-16 11:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `student_papers`
--

CREATE TABLE `student_papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `paper_id` bigint(20) UNSIGNED NOT NULL,
  `mark` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_papers`
--

INSERT INTO `student_papers` (`id`, `student_id`, `paper_id`, `mark`, `created_at`, `updated_at`) VALUES
(1, 126, 10, '2.50', NULL, '2024-05-21 16:25:56'),
(2, 127, 10, '5.50', NULL, '2024-05-21 16:25:56'),
(3, 128, 10, '4.00', NULL, '2024-05-21 16:25:56'),
(4, 129, 10, '3.50', NULL, '2024-05-21 16:25:56'),
(5, 130, 10, '4.50', NULL, '2024-05-21 16:25:56'),
(6, 126, 11, '4.00', NULL, '2024-05-21 16:25:55'),
(7, 127, 11, '4.00', NULL, '2024-05-21 16:25:55'),
(8, 128, 11, '5.00', NULL, '2024-05-21 16:25:55'),
(9, 129, 11, '5.00', NULL, '2024-05-21 16:25:55'),
(10, 130, 11, '5.00', NULL, '2024-05-21 16:25:55'),
(11, 126, 12, '6.00', NULL, '2024-05-21 16:25:56'),
(12, 127, 12, '10.00', NULL, '2024-05-21 16:25:56'),
(13, 128, 12, '7.50', NULL, '2024-05-21 16:25:56'),
(14, 129, 12, '8.00', NULL, '2024-05-21 16:25:56'),
(15, 130, 12, '7.50', NULL, '2024-05-21 16:25:56'),
(16, 126, 13, '14.00', NULL, '2024-05-21 15:38:27'),
(17, 127, 13, '13.00', NULL, '2024-05-21 16:25:56'),
(18, 128, 13, '9.00', NULL, '2024-05-21 16:25:56'),
(19, 129, 13, '5.00', NULL, '2024-05-21 16:25:56'),
(20, 130, 13, '8.00', NULL, '2024-05-21 16:25:56'),
(21, 126, 14, '10.00', NULL, '2024-05-21 16:25:55'),
(22, 127, 14, '13.00', NULL, '2024-05-21 16:25:55'),
(23, 128, 14, '7.00', NULL, '2024-05-21 16:25:55'),
(24, 129, 14, '11.50', NULL, '2024-05-21 16:17:41'),
(25, 130, 14, '8.50', NULL, '2024-05-21 16:17:41'),
(26, 126, 15, '13.00', NULL, '2024-05-21 15:41:20'),
(27, 127, 15, '12.00', NULL, '2024-05-21 15:41:20'),
(28, 128, 15, '7.00', NULL, '2024-05-21 15:41:20'),
(29, 129, 15, '14.00', NULL, '2024-05-21 15:41:20'),
(30, 130, 15, '11.00', NULL, '2024-05-21 15:41:20'),
(31, 126, 16, '11.00', NULL, '2024-05-21 16:25:55'),
(32, 127, 16, '11.00', NULL, '2024-05-21 16:25:55'),
(33, 128, 16, '9.50', NULL, '2024-05-21 16:25:55'),
(34, 129, 16, '10.00', NULL, '2024-05-21 16:25:56'),
(35, 130, 16, '6.00', NULL, '2024-05-21 16:25:56'),
(36, 126, 17, '4.00', NULL, '2024-05-21 16:25:55'),
(37, 127, 17, '5.50', NULL, '2024-05-21 16:25:55'),
(38, 128, 17, '3.50', NULL, '2024-05-21 16:25:55'),
(39, 129, 17, '4.00', NULL, '2024-05-21 16:25:55'),
(40, 130, 17, '3.50', NULL, '2024-05-21 16:25:55'),
(41, 126, 18, '13.50', NULL, '2024-05-21 16:25:56'),
(42, 127, 18, '13.50', NULL, '2024-05-21 16:25:56'),
(43, 128, 18, '15.00', NULL, '2024-05-21 16:25:56'),
(44, 129, 18, '14.00', NULL, '2024-05-21 16:25:56'),
(45, 130, 18, '12.00', NULL, '2024-05-21 16:25:56'),
(46, 118, 19, '5.00', NULL, '2024-05-21 16:58:24'),
(47, 119, 19, '4.50', NULL, '2024-05-21 16:58:24'),
(48, 120, 19, '2.50', NULL, '2024-05-21 16:58:24'),
(49, 121, 19, '3.50', NULL, '2024-05-21 16:58:24'),
(50, 118, 20, '10.00', NULL, '2024-05-21 16:54:29'),
(51, 119, 20, '4.50', NULL, '2024-05-21 16:54:29'),
(52, 120, 20, '7.00', NULL, '2024-05-21 16:54:29'),
(53, 121, 20, '11.00', NULL, '2024-05-21 16:54:29'),
(54, 118, 21, '7.00', NULL, '2024-05-21 16:58:25'),
(55, 119, 21, '7.00', NULL, '2024-05-21 16:58:25'),
(56, 120, 21, '6.00', NULL, '2024-05-21 16:58:25'),
(57, 121, 21, '6.50', NULL, '2024-05-21 16:58:25'),
(58, 118, 22, '6.50', NULL, '2024-05-21 16:58:25'),
(59, 119, 22, '7.00', NULL, '2024-05-21 16:58:25'),
(60, 120, 22, '5.00', NULL, '2024-05-21 16:58:25'),
(61, 121, 22, '7.50', NULL, '2024-05-21 16:58:25'),
(62, 118, 23, '14.50', NULL, '2024-05-21 16:54:29'),
(63, 119, 23, '14.50', NULL, '2024-05-21 16:54:29'),
(64, 120, 23, '13.50', NULL, '2024-05-21 16:54:29'),
(65, 121, 23, '12.50', NULL, '2024-05-21 16:54:29'),
(66, 118, 24, '11.00', NULL, '2024-05-21 16:58:25'),
(67, 119, 24, '13.50', NULL, '2024-05-21 16:58:25'),
(68, 120, 24, '11.50', NULL, '2024-05-21 16:58:25'),
(69, 121, 24, '15.00', NULL, '2024-05-21 16:58:25'),
(70, 118, 25, '7.50', NULL, '2024-05-21 16:54:29'),
(71, 119, 25, '3.00', NULL, '2024-05-21 16:54:29'),
(72, 120, 25, '8.50', NULL, '2024-05-21 16:54:29'),
(73, 121, 25, '6.00', NULL, '2024-05-21 16:54:29'),
(74, 118, 26, '11.00', NULL, '2024-05-21 16:54:30'),
(75, 119, 26, '10.00', NULL, '2024-05-21 16:54:30'),
(76, 120, 26, '10.50', NULL, '2024-05-21 16:54:30'),
(77, 121, 26, '7.00', NULL, '2024-05-21 16:54:30'),
(78, 118, 27, '3.00', NULL, '2024-05-21 16:58:24'),
(79, 119, 27, '4.00', NULL, '2024-05-21 16:58:24'),
(80, 120, 27, '5.00', NULL, '2024-05-21 16:58:25'),
(81, 121, 27, '1.50', NULL, '2024-05-21 16:58:25'),
(82, 118, 28, '14.50', NULL, '2024-05-21 16:54:29'),
(83, 119, 28, '13.00', NULL, '2024-05-21 16:54:29'),
(84, 120, 28, '14.50', NULL, '2024-05-21 16:54:29'),
(85, 121, 28, '11.50', NULL, '2024-05-21 16:54:30'),
(86, 118, 29, '15.50', NULL, '2024-05-21 16:58:25'),
(87, 119, 29, '11.00', NULL, '2024-05-21 16:58:25'),
(88, 120, 29, '6.00', NULL, '2024-05-21 16:58:25'),
(89, 121, 29, '9.50', NULL, '2024-05-21 16:58:25'),
(90, 118, 30, '7.50', NULL, '2024-05-21 16:54:30'),
(91, 119, 30, '10.50', NULL, '2024-05-21 16:54:30'),
(92, 120, 30, '2.50', NULL, '2024-05-21 16:54:30'),
(93, 121, 30, '4.00', NULL, '2024-05-21 16:54:30'),
(94, 118, 31, '5.00', NULL, '2024-05-21 16:58:24'),
(95, 119, 31, '8.00', NULL, '2024-05-21 16:58:24'),
(96, 120, 31, '10.00', NULL, '2024-05-21 16:58:24'),
(97, 121, 31, '11.00', NULL, '2024-05-21 16:58:24'),
(98, 122, 32, '9.00', NULL, '2024-05-22 11:47:04'),
(99, 123, 32, '8.00', NULL, '2024-05-22 11:47:04'),
(100, 124, 32, '6.00', NULL, '2024-05-22 11:47:04'),
(101, 125, 32, '9.00', NULL, '2024-05-22 11:47:04'),
(102, 122, 33, '5.50', NULL, '2024-05-22 11:47:03'),
(103, 123, 33, '6.50', NULL, '2024-05-22 11:47:03'),
(104, 124, 33, '7.50', NULL, '2024-05-22 11:47:04'),
(105, 125, 33, '10.00', NULL, '2024-05-22 11:47:04'),
(106, 122, 34, '16.00', NULL, '2024-05-22 11:47:04'),
(107, 123, 34, '14.00', NULL, '2024-05-22 11:47:04'),
(108, 124, 34, '16.00', NULL, '2024-05-22 11:47:04'),
(109, 125, 34, '16.00', NULL, '2024-05-22 11:47:04'),
(110, 122, 35, '12.00', NULL, '2024-05-22 11:47:04'),
(111, 123, 35, '14.00', NULL, '2024-05-22 11:47:04'),
(112, 124, 35, '15.00', NULL, '2024-05-22 11:47:04'),
(113, 125, 35, '13.00', NULL, '2024-05-22 11:47:04'),
(114, 122, 36, '3.00', NULL, '2024-05-22 11:47:04'),
(115, 123, 36, '2.00', NULL, '2024-05-22 11:47:04'),
(116, 124, 36, '1.00', NULL, '2024-05-22 11:47:04'),
(117, 125, 36, '3.00', NULL, '2024-05-22 11:47:04'),
(118, 122, 37, '10.00', NULL, '2024-05-22 11:47:03'),
(119, 123, 37, '8.50', NULL, '2024-05-22 11:47:03'),
(120, 124, 37, '13.00', NULL, '2024-05-22 11:47:03'),
(121, 125, 37, '10.50', NULL, '2024-05-22 11:47:03'),
(122, 122, 38, '7.00', NULL, '2024-05-22 11:47:04'),
(123, 123, 38, '13.00', NULL, '2024-05-22 11:47:04'),
(124, 124, 38, '8.00', NULL, '2024-05-22 11:47:04'),
(125, 125, 38, '8.00', NULL, '2024-05-22 11:47:04'),
(126, 122, 39, '6.50', NULL, '2024-05-22 11:47:03'),
(127, 123, 39, '10.00', NULL, '2024-05-22 11:47:03'),
(128, 124, 39, '8.00', NULL, '2024-05-22 11:47:03'),
(129, 125, 39, '5.50', NULL, '2024-05-22 11:47:03'),
(130, 122, 40, '2.50', NULL, '2024-05-22 11:47:03'),
(131, 123, 40, '3.00', NULL, '2024-05-22 11:47:03'),
(132, 124, 40, '5.00', NULL, '2024-05-22 11:47:03'),
(133, 125, 40, '4.00', NULL, '2024-05-22 11:47:03'),
(134, 122, 41, '8.50', NULL, '2024-05-22 11:47:03'),
(135, 123, 41, '13.50', NULL, '2024-05-22 11:47:03'),
(136, 124, 41, '13.50', NULL, '2024-05-22 11:47:03'),
(137, 125, 41, '14.50', NULL, '2024-05-22 11:47:03'),
(138, 114, 42, '6.00', NULL, '2024-05-22 11:47:02'),
(139, 115, 42, '0.00', NULL, NULL),
(140, 116, 42, '9.00', NULL, '2024-05-22 11:47:02'),
(141, 117, 42, '3.00', NULL, '2024-05-22 11:47:02'),
(142, 114, 43, '6.00', NULL, '2024-05-22 11:47:01'),
(143, 115, 43, '0.00', NULL, NULL),
(144, 116, 43, '12.50', NULL, '2024-05-22 11:47:01'),
(145, 117, 43, '5.00', NULL, '2024-05-22 11:47:01'),
(150, 114, 45, '3.00', NULL, '2024-05-22 11:47:02'),
(151, 115, 45, '0.00', NULL, NULL),
(152, 116, 45, '7.00', NULL, '2024-05-22 11:47:02'),
(153, 117, 45, '4.00', NULL, '2024-05-22 11:47:02'),
(154, 114, 46, '0.00', NULL, NULL),
(155, 115, 46, '0.00', NULL, NULL),
(156, 116, 46, '10.00', NULL, '2024-05-22 11:47:01'),
(157, 117, 46, '5.00', NULL, '2024-05-22 11:47:01'),
(158, 114, 47, '0.00', NULL, NULL),
(159, 115, 47, '0.00', NULL, NULL),
(160, 116, 47, '12.00', NULL, '2024-05-22 11:47:01'),
(161, 117, 47, '10.50', NULL, '2024-05-22 11:47:02'),
(162, 114, 48, '0.00', NULL, NULL),
(163, 115, 48, '0.00', NULL, NULL),
(164, 116, 48, '14.00', NULL, '2024-05-22 11:47:02'),
(165, 117, 48, '8.00', NULL, '2024-05-22 11:47:02'),
(166, 114, 49, '10.50', NULL, '2024-05-22 11:47:02'),
(167, 115, 49, '0.00', NULL, NULL),
(168, 116, 49, '16.50', NULL, '2024-05-22 11:47:02'),
(169, 117, 49, '5.00', NULL, '2024-05-22 11:47:02'),
(170, 114, 50, '6.00', NULL, '2024-05-22 11:47:01'),
(171, 115, 50, '0.00', NULL, NULL),
(172, 116, 50, '8.00', NULL, '2024-05-22 11:47:01'),
(173, 117, 50, '3.00', NULL, '2024-05-22 11:47:01'),
(174, 114, 51, '12.00', NULL, '2024-05-22 11:47:02'),
(175, 115, 51, '0.00', NULL, NULL),
(176, 116, 51, '18.00', NULL, '2024-05-22 11:47:02'),
(177, 117, 51, '11.00', NULL, '2024-05-22 11:47:02'),
(178, 114, 52, '10.00', NULL, '2024-05-22 11:47:02'),
(179, 115, 52, '0.00', NULL, NULL),
(180, 116, 52, '11.00', NULL, '2024-05-22 11:47:02'),
(181, 117, 52, '8.00', NULL, '2024-05-22 11:47:02'),
(182, 136, 53, '10.40', NULL, '2024-05-22 10:21:19'),
(183, 137, 53, '12.20', NULL, '2024-05-22 10:21:19'),
(184, 138, 53, '11.40', NULL, '2024-05-22 10:21:19'),
(185, 136, 54, '6.00', NULL, '2024-05-22 10:21:18'),
(186, 137, 54, '10.00', NULL, '2024-05-22 10:21:19'),
(187, 138, 54, '8.00', NULL, '2024-05-22 10:21:19'),
(188, 136, 55, '11.50', NULL, '2024-05-22 10:21:19'),
(189, 137, 55, '13.00', NULL, '2024-05-22 10:21:19'),
(190, 138, 55, '12.00', NULL, '2024-05-22 10:21:19'),
(195, 136, 57, '10.50', NULL, '2024-05-22 10:21:18'),
(196, 137, 57, '12.50', NULL, '2024-05-22 10:21:18'),
(197, 138, 57, '11.00', NULL, '2024-05-22 10:21:18'),
(198, 136, 58, '6.00', NULL, '2024-05-22 10:21:19'),
(199, 137, 58, '11.00', NULL, '2024-05-22 10:21:19'),
(200, 138, 58, '10.00', NULL, '2024-05-22 10:21:19'),
(201, 136, 59, '15.50', NULL, '2024-05-22 10:21:19'),
(202, 137, 59, '16.00', NULL, '2024-05-24 14:57:09'),
(203, 138, 59, '16.50', NULL, '2024-05-22 10:21:19'),
(204, 136, 60, '14.50', NULL, '2024-05-22 10:21:19'),
(205, 137, 60, '14.00', NULL, '2024-05-22 10:21:19'),
(206, 138, 60, '16.00', NULL, '2024-05-22 10:21:19'),
(207, 136, 61, '4.00', NULL, '2024-05-22 10:21:19'),
(208, 137, 61, '10.00', NULL, '2024-05-22 10:21:19'),
(209, 138, 61, '8.00', NULL, '2024-05-22 10:21:19'),
(210, 136, 62, '11.00', NULL, '2024-05-22 10:21:18'),
(211, 137, 62, '9.00', NULL, '2024-05-22 10:21:18'),
(212, 138, 62, '10.00', NULL, '2024-05-22 10:21:18'),
(213, 136, 63, '9.50', NULL, '2024-05-22 10:21:18'),
(214, 137, 63, '14.00', NULL, '2024-05-22 10:21:18'),
(215, 138, 63, '13.00', NULL, '2024-05-22 10:21:18'),
(216, 131, 64, '4.00', NULL, '2024-05-22 09:33:48'),
(217, 132, 64, '3.00', NULL, '2024-05-22 09:33:48'),
(218, 133, 64, '3.00', NULL, '2024-05-22 09:33:48'),
(219, 134, 64, '2.00', NULL, '2024-05-22 09:33:48'),
(220, 135, 64, '0.00', NULL, NULL),
(221, 131, 65, '6.00', NULL, '2024-05-22 09:33:49'),
(222, 132, 65, '6.50', NULL, '2024-05-22 09:33:49'),
(223, 133, 65, '5.00', NULL, '2024-05-22 09:33:49'),
(224, 134, 65, '2.00', NULL, '2024-05-22 09:33:49'),
(225, 135, 65, '0.00', NULL, NULL),
(226, 131, 66, '3.00', NULL, '2024-05-22 09:33:48'),
(227, 132, 66, '10.00', NULL, '2024-05-22 09:33:48'),
(228, 133, 66, '2.00', NULL, '2024-05-22 09:33:48'),
(229, 134, 66, '2.00', NULL, '2024-05-22 09:33:48'),
(230, 135, 66, '0.00', NULL, NULL),
(231, 131, 67, '6.00', NULL, '2024-05-22 09:33:49'),
(232, 132, 67, '4.00', NULL, '2024-05-22 09:33:49'),
(233, 133, 67, '15.00', NULL, '2024-05-22 09:33:49'),
(234, 134, 67, '6.00', NULL, '2024-05-22 09:33:49'),
(235, 135, 67, '0.00', NULL, NULL),
(236, 131, 68, '8.00', NULL, '2024-05-22 09:33:48'),
(237, 132, 68, '9.00', NULL, '2024-05-22 09:33:48'),
(238, 133, 68, '12.00', NULL, '2024-05-22 09:33:48'),
(239, 134, 68, '13.00', NULL, '2024-05-22 09:33:48'),
(240, 135, 68, '0.00', NULL, NULL),
(241, 131, 69, '2.00', NULL, '2024-05-22 09:33:49'),
(242, 132, 69, '8.00', NULL, '2024-05-22 09:33:49'),
(243, 133, 69, '3.00', NULL, '2024-05-22 09:33:49'),
(244, 134, 69, '1.00', NULL, '2024-05-22 09:33:49'),
(245, 135, 69, '0.00', NULL, NULL),
(246, 131, 70, '8.00', NULL, '2024-05-22 09:33:49'),
(247, 132, 70, '10.00', NULL, '2024-05-22 09:33:49'),
(248, 133, 70, '11.00', NULL, '2024-05-22 09:33:49'),
(249, 134, 70, '7.00', NULL, '2024-05-22 09:33:49'),
(250, 135, 70, '0.00', NULL, NULL),
(251, 131, 71, '8.00', NULL, '2024-05-23 13:57:23'),
(252, 132, 71, '0.00', NULL, NULL),
(253, 133, 71, '5.00', NULL, '2024-05-23 13:57:23'),
(254, 134, 71, '5.00', NULL, '2024-05-23 13:57:23'),
(255, 135, 71, '0.00', NULL, NULL),
(256, 131, 72, '0.00', NULL, NULL),
(257, 132, 72, '4.00', NULL, '2024-05-22 09:33:49'),
(258, 133, 72, '5.00', NULL, '2024-05-22 09:33:49'),
(259, 134, 72, '1.00', NULL, '2024-05-22 09:33:49'),
(260, 135, 72, '0.00', NULL, NULL),
(261, 131, 73, '12.50', NULL, '2024-05-22 09:33:48'),
(262, 132, 73, '8.50', NULL, '2024-05-22 09:33:48'),
(263, 133, 73, '5.50', NULL, '2024-05-22 09:33:48'),
(264, 134, 73, '10.00', NULL, '2024-05-22 09:33:48'),
(265, 135, 73, '0.00', NULL, NULL),
(266, 131, 74, '8.00', NULL, '2024-05-22 09:33:48'),
(267, 132, 74, '8.00', NULL, '2024-05-22 09:33:48'),
(268, 133, 74, '11.50', NULL, '2024-05-22 09:33:48'),
(269, 134, 74, '6.00', NULL, '2024-05-22 09:33:48'),
(270, 135, 74, '0.00', NULL, NULL),
(271, 114, 75, '13.00', NULL, '2024-05-22 11:47:03'),
(272, 115, 75, '0.00', NULL, NULL),
(273, 116, 75, '17.00', NULL, '2024-05-22 11:47:03'),
(274, 117, 75, '8.00', NULL, '2024-05-22 11:47:03'),
(275, 114, 76, '16.00', NULL, '2024-05-22 11:47:05'),
(276, 115, 76, '17.00', NULL, '2024-05-22 11:47:05'),
(277, 116, 76, '17.50', NULL, '2024-05-22 11:47:05'),
(278, 117, 76, '16.50', NULL, '2024-05-22 11:47:05'),
(279, 126, 77, '17.00', NULL, '2024-05-22 11:47:05'),
(280, 127, 77, '16.50', NULL, '2024-05-22 11:47:05'),
(281, 128, 77, '16.00', NULL, '2024-05-22 11:47:05'),
(282, 129, 77, '16.50', NULL, '2024-05-22 11:47:05'),
(283, 130, 77, '16.00', NULL, '2024-05-22 11:47:05'),
(284, 122, 78, '17.00', NULL, '2024-05-22 11:47:04'),
(285, 123, 78, '16.50', NULL, '2024-05-22 11:47:04'),
(286, 124, 78, '17.50', NULL, '2024-05-22 11:47:04'),
(287, 125, 78, '17.00', NULL, '2024-05-22 11:47:05'),
(288, 118, 79, '16.00', NULL, '2024-05-22 11:47:05'),
(289, 119, 79, '17.00', NULL, '2024-05-22 11:47:05'),
(290, 120, 79, '17.00', NULL, '2024-05-22 11:47:05'),
(291, 121, 79, '17.50', NULL, '2024-05-22 11:47:05'),
(292, 136, 80, '17.00', NULL, '2024-05-22 11:47:05'),
(293, 137, 80, '17.00', NULL, '2024-05-22 11:47:06'),
(294, 138, 80, '17.50', NULL, '2024-05-22 11:47:06'),
(295, 131, 81, '17.00', NULL, '2024-05-22 11:47:05'),
(296, 132, 81, '17.00', NULL, '2024-05-22 11:47:05'),
(297, 133, 81, '17.00', NULL, '2024-05-22 11:47:05'),
(298, 134, 81, '17.00', NULL, '2024-05-22 11:47:05'),
(299, 135, 81, '0.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_ues`
--

CREATE TABLE `student_ues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `ue_id` bigint(20) UNSIGNED NOT NULL,
  `average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_ues`
--

INSERT INTO `student_ues` (`id`, `student_id`, `ue_id`, `average`, `credit`, `created_at`, `updated_at`) VALUES
(62, 114, 81, '10', 5, '2024-01-11 07:12:58', '2024-06-10 14:49:14'),
(63, 114, 82, '14.925', 4, '2024-01-11 07:12:58', '2024-06-10 14:49:14'),
(64, 114, 83, '14', 4, '2024-01-11 07:12:58', '2024-04-26 16:24:56'),
(65, 114, 84, '16.708', 5, '2024-01-11 07:12:58', '2024-04-29 09:50:21'),
(66, 114, 85, '11.24', 5, '2024-01-11 07:12:58', '2024-04-29 08:05:55'),
(67, 114, 86, '14.96', 6, '2024-01-11 07:12:58', '2024-06-10 14:49:14'),
(68, 114, 87, '14', 1, '2024-01-11 07:12:58', '2024-06-10 14:49:14'),
(69, 114, 88, '11.4', 5, '2024-01-11 07:12:58', '2024-04-26 16:24:57'),
(70, 114, 89, '10', 4, '2024-01-11 07:12:58', '2024-04-26 16:24:57'),
(71, 114, 90, '17.33', 4, '2024-01-11 07:12:58', '2024-06-10 14:51:39'),
(72, 114, 91, '11.3', 4, '2024-01-11 07:12:58', '2024-04-26 16:24:57'),
(73, 114, 92, '14.662857142857', 7, '2024-01-11 07:12:58', '2024-06-11 15:25:41'),
(76, 115, 81, '10', 5, '2024-01-11 07:59:56', '2024-06-10 14:49:14'),
(77, 115, 82, '10.4', 4, '2024-01-11 07:59:56', '2024-06-10 14:49:14'),
(78, 115, 83, '11.6', 4, '2024-01-11 07:59:56', '2024-06-06 10:54:04'),
(79, 115, 84, '14.82', 5, '2024-01-11 07:59:56', '2024-06-06 10:54:04'),
(80, 115, 85, '15.25', 5, '2024-01-11 07:59:56', '2024-06-06 10:54:04'),
(81, 115, 86, '13.826666666667', 6, '2024-01-11 07:59:56', '2024-06-10 14:49:14'),
(82, 115, 87, '17', 1, '2024-01-11 07:59:56', '2024-06-10 14:49:15'),
(83, 115, 88, '10.35', 5, '2024-01-11 07:59:56', '2024-06-10 14:49:15'),
(84, 115, 89, '14.4', 4, '2024-01-11 07:59:56', '2024-06-06 10:54:04'),
(85, 115, 90, '16.675', 4, '2024-01-11 07:59:56', '2024-06-10 14:52:34'),
(86, 115, 91, '13.2', 4, '2024-01-11 07:59:56', '2024-06-06 10:54:04'),
(87, 115, 92, '13.548571428571', 7, '2024-01-11 07:59:56', '2024-06-11 15:25:41'),
(90, 116, 81, '10', 5, '2024-01-11 08:02:45', '2024-06-10 14:49:15'),
(91, 116, 82, '12.6', 4, '2024-01-11 08:02:45', '2024-06-10 14:49:15'),
(92, 116, 83, '17.41', 4, '2024-01-11 08:02:45', '2024-06-06 10:54:04'),
(93, 116, 84, '16.234', 5, '2024-01-11 08:02:45', '2024-06-06 10:54:04'),
(94, 116, 85, '16.746', 5, '2024-01-11 08:02:45', '2024-06-06 10:54:04'),
(95, 116, 86, '13.433333333333', 6, '2024-01-11 08:02:45', '2024-06-10 14:49:15'),
(96, 116, 87, '10', 1, '2024-01-11 08:02:45', '2024-06-10 14:49:15'),
(97, 116, 88, '15.15', 5, '2024-01-11 08:02:45', '2024-04-26 16:28:22'),
(98, 116, 89, '17.01', 4, '2024-01-11 08:02:45', '2024-06-06 10:54:05'),
(99, 116, 90, '16.155', 4, '2024-01-11 08:02:45', '2024-06-10 15:51:52'),
(100, 116, 91, '17.15', 4, '2024-01-11 08:02:45', '2024-04-26 16:28:22'),
(101, 116, 92, '17.442857142857', 7, '2024-01-11 08:02:45', '2024-06-11 15:25:41'),
(104, 117, 81, '10', 5, '2024-01-11 08:07:52', '2024-06-10 14:49:15'),
(105, 117, 82, '10.25', 4, '2024-01-11 08:07:52', '2024-06-10 14:49:15'),
(106, 117, 83, '10.35', 4, '2024-01-11 08:07:52', '2024-06-06 10:54:05'),
(107, 117, 84, '13.37', 5, '2024-01-11 08:07:52', '2024-06-06 10:54:05'),
(108, 117, 85, '11.46', 5, '2024-01-11 08:07:52', '2024-06-06 10:54:05'),
(109, 117, 86, '11', 6, '2024-01-11 08:07:52', '2024-06-10 14:49:15'),
(110, 117, 87, '12', 1, '2024-01-11 08:07:52', '2024-06-10 14:49:15'),
(111, 117, 88, '10', 5, '2024-01-11 08:07:52', '2024-06-10 14:49:15'),
(112, 117, 89, '12.7', 4, '2024-01-11 08:07:52', '2024-06-06 10:54:05'),
(113, 117, 90, '13.565', 4, '2024-01-11 08:07:52', '2024-06-10 15:51:52'),
(114, 117, 91, '10.2', 4, '2024-01-11 08:07:52', '2024-06-10 14:49:15'),
(115, 117, 92, '12.842857142857', 7, '2024-01-11 08:07:52', '2024-06-11 15:25:41'),
(118, 118, 109, '11.85', 5, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(119, 118, 110, '14.34', 4, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(120, 118, 111, '14.075', 4, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(121, 118, 112, '12.975', 4, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(122, 118, 113, '13.35', 6, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(123, 118, 114, '12.2125', 4, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(124, 118, 115, '10', 3, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(125, 118, 116, '10.384', 5, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(126, 118, 117, '14.44', 4, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(127, 118, 118, '13.57', 5, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(128, 118, 119, '13.68', 4, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(129, 118, 120, '12.583333333333', 6, '2024-01-11 19:59:01', '2024-06-11 15:16:22'),
(132, 119, 109, '11.436', 5, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(133, 119, 110, '14.04', 4, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(134, 119, 111, '12.85', 4, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(135, 119, 112, '12.925', 4, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(136, 119, 113, '11.65', 6, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(137, 119, 114, '11.6125', 4, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(138, 119, 115, '10', 3, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(139, 119, 116, '11.58', 5, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(140, 119, 117, '13.69', 4, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(141, 119, 118, '10.56', 5, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(142, 119, 119, '12.75', 4, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(143, 119, 120, '12.466666666667', 6, '2024-01-11 20:00:45', '2024-06-11 15:16:23'),
(146, 120, 109, '11.81', 5, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(147, 120, 110, '13.05', 4, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(148, 120, 111, '13.1', 4, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(149, 120, 112, '11.425', 4, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(150, 120, 113, '10.8', 6, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(151, 120, 114, '12.525', 4, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(152, 120, 115, '11.2', 3, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(153, 120, 116, '10.97', 5, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(154, 120, 117, '10.775', 4, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(155, 120, 118, '11.2', 5, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(156, 120, 119, '11.075', 4, '2024-01-11 20:01:41', '2024-06-11 15:16:23'),
(157, 120, 120, '12.603333333333', 6, '2024-01-11 20:01:41', '2024-06-11 15:16:24'),
(160, 121, 109, '12.63', 5, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(161, 121, 110, '10.365', 4, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(162, 121, 111, '10.2', 4, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(163, 121, 112, '11.85', 4, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(164, 121, 113, '10.725', 6, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(165, 121, 114, '11.125', 4, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(166, 121, 115, '10', 3, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(167, 121, 116, '11.01', 5, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(168, 121, 117, '10.365', 4, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(169, 121, 118, '10', 5, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(170, 121, 119, '10.19', 4, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(171, 121, 120, '12.633333333333', 6, '2024-01-11 20:02:24', '2024-06-11 15:16:24'),
(174, 122, 137, '11.134', 5, '2024-01-12 09:04:10', '2024-06-11 14:57:36'),
(175, 122, 138, '10.2', 4, '2024-01-12 09:04:10', '2024-06-11 14:57:36'),
(176, 122, 139, '14.005', 4, '2024-01-12 09:04:10', '2024-06-06 10:56:45'),
(177, 122, 140, '13.555', 4, '2024-01-12 09:04:10', '2024-06-11 14:51:36'),
(178, 122, 141, '15.725', 4, '2024-01-12 09:04:10', '2024-06-06 10:56:45'),
(179, 122, 142, '13.433333333333', 6, '2024-01-12 09:04:10', '2024-06-06 10:56:45'),
(180, 122, 143, '11.003333333333', 3, '2024-01-12 09:04:10', '2024-06-11 14:55:04'),
(181, 122, 144, '10.9', 5, '2024-01-12 09:04:10', '2024-06-11 14:51:36'),
(182, 122, 145, '10.655', 4, '2024-01-12 09:04:10', '2024-06-11 14:51:37'),
(183, 122, 146, '15.7', 6, '2024-01-12 09:04:10', '2024-06-11 14:51:37'),
(184, 122, 147, '13.555', 4, '2024-01-12 09:04:10', '2024-06-11 14:51:37'),
(185, 122, 148, '17.534', 5, '2024-01-12 09:04:10', '2024-06-11 14:51:37'),
(188, 123, 137, '15.586', 5, '2024-01-12 09:05:30', '2024-06-06 10:56:46'),
(189, 123, 138, '13.17', 4, '2024-01-12 09:05:30', '2024-06-11 14:57:36'),
(190, 123, 139, '18.5', 4, '2024-01-12 09:05:30', '2024-06-06 10:56:46'),
(191, 123, 140, '13.7', 4, '2024-01-12 09:05:30', '2024-06-11 14:51:37'),
(192, 123, 141, '16.3', 4, '2024-01-12 09:05:30', '2024-06-06 10:56:46'),
(193, 123, 142, '12.633333333333', 6, '2024-01-12 09:05:30', '2024-06-06 10:56:46'),
(194, 123, 143, '10.733333333333', 3, '2024-01-12 09:05:30', '2024-06-11 14:55:04'),
(195, 123, 144, '11.128', 5, '2024-01-12 09:05:30', '2024-06-11 14:51:37'),
(196, 123, 145, '10.225', 4, '2024-01-12 09:05:30', '2024-06-11 14:51:37'),
(197, 123, 146, '17.305', 6, '2024-01-12 09:05:30', '2024-06-11 14:51:37'),
(198, 123, 147, '14.055', 4, '2024-01-12 09:05:30', '2024-06-11 14:51:37'),
(199, 123, 148, '18.4', 5, '2024-01-12 09:05:30', '2024-06-11 14:51:37'),
(202, 124, 137, '12.65', 5, '2024-01-12 09:07:32', '2024-06-06 10:56:46'),
(203, 124, 138, '13.215', 4, '2024-01-12 09:07:32', '2024-06-06 10:56:46'),
(204, 124, 139, '16', 4, '2024-01-12 09:07:32', '2024-06-06 10:56:46'),
(205, 124, 140, '13.9', 4, '2024-01-12 09:07:32', '2024-06-11 14:51:37'),
(206, 124, 141, '15.375', 4, '2024-01-12 09:07:32', '2024-06-06 10:56:46'),
(207, 124, 142, '13.816666666667', 6, '2024-01-12 09:07:32', '2024-06-06 10:56:46'),
(208, 124, 143, '10.05', 3, '2024-01-12 09:07:32', '2024-06-11 14:55:04'),
(209, 124, 144, '12.81', 5, '2024-01-12 09:07:32', '2024-06-11 14:51:37'),
(210, 124, 145, '10.865', 4, '2024-01-12 09:07:32', '2024-06-11 14:51:37'),
(211, 124, 146, '16.15', 6, '2024-01-12 09:07:32', '2024-06-11 14:51:37'),
(212, 124, 147, '13.555', 4, '2024-01-12 09:07:32', '2024-06-11 14:51:37'),
(213, 124, 148, '17.81', 5, '2024-01-12 09:07:32', '2024-06-11 14:51:37'),
(216, 125, 137, '12.116', 5, '2024-01-12 09:08:45', '2024-06-06 10:56:47'),
(217, 125, 138, '11.845', 4, '2024-01-12 09:08:45', '2024-06-11 14:57:36'),
(218, 125, 139, '17', 4, '2024-01-12 09:08:45', '2024-06-06 10:56:47'),
(219, 125, 140, '13.85', 4, '2024-01-12 09:08:45', '2024-06-11 14:51:37'),
(220, 125, 141, '15.35', 4, '2024-01-12 09:08:45', '2024-06-06 10:56:47'),
(221, 125, 142, '14.218333333333', 6, '2024-01-12 09:08:45', '2024-06-06 10:56:47'),
(222, 125, 143, '10.833333333333', 3, '2024-01-12 09:08:45', '2024-06-11 14:53:59'),
(223, 125, 144, '12.09', 5, '2024-01-12 09:08:45', '2024-06-06 10:56:47'),
(224, 125, 145, '10.2', 4, '2024-01-12 09:08:45', '2024-06-11 14:51:37'),
(225, 125, 146, '16.8', 6, '2024-01-12 09:08:45', '2024-06-11 14:51:37'),
(226, 125, 147, '13.5', 4, '2024-01-12 09:08:45', '2024-06-11 14:51:37'),
(227, 125, 148, '16.78', 5, '2024-01-12 09:08:45', '2024-06-11 14:51:37'),
(230, 126, 158, '12.67', 5, '2024-01-15 08:15:30', '2024-06-11 14:10:16'),
(231, 126, 159, '14.675', 4, '2024-01-15 08:15:30', '2024-06-11 14:10:16'),
(232, 126, 160, '13.05', 2, '2024-01-15 08:15:30', '2024-06-11 14:35:19'),
(233, 126, 161, '12.166666666667', 3, '2024-01-15 08:15:30', '2024-06-11 14:10:16'),
(234, 126, 162, '10.615', 6, '2024-01-15 08:15:30', '2024-06-11 14:35:19'),
(235, 126, 163, '14.7', 5, '2024-01-15 08:15:30', '2024-06-11 14:10:16'),
(236, 126, 164, '11.58', 5, '2024-01-15 08:15:30', '2024-06-11 14:35:19'),
(237, 126, 165, '14.42', 5, '2024-01-15 08:15:30', '2024-06-11 14:10:17'),
(238, 126, 166, '13.03', 4, '2024-01-15 08:15:30', '2024-06-11 14:10:17'),
(239, 126, 167, '12', 6, '2024-01-15 08:15:30', '2024-06-11 14:35:19'),
(240, 126, 168, '10', 4, '2024-01-15 08:15:30', '2024-06-11 14:35:19'),
(241, 126, 169, '13.86', 5, '2024-01-15 08:15:30', '2024-06-11 14:35:19'),
(244, 127, 158, '12.406', 5, '2024-01-15 08:18:06', '2024-06-10 14:54:51'),
(245, 127, 159, '14.175', 4, '2024-01-15 08:18:06', '2024-06-10 14:54:51'),
(246, 127, 160, '12.4', 2, '2024-01-15 08:18:06', '2024-06-11 14:35:19'),
(247, 127, 161, '12.333333333333', 3, '2024-01-15 08:18:06', '2024-06-10 14:54:51'),
(248, 127, 162, '10.615', 6, '2024-01-15 08:18:06', '2024-06-11 14:35:19'),
(249, 127, 163, '14.1', 5, '2024-01-15 08:18:06', '2024-06-10 14:54:51'),
(250, 127, 164, '10.68', 5, '2024-01-15 08:18:06', '2024-06-11 14:35:19'),
(251, 127, 165, '11.7', 5, '2024-01-15 08:18:06', '2024-06-10 14:54:51'),
(252, 127, 166, '13.175', 4, '2024-01-15 08:18:06', '2024-06-10 14:54:51'),
(253, 127, 167, '11.525', 6, '2024-01-15 08:18:06', '2024-06-11 14:35:19'),
(254, 127, 168, '10', 4, '2024-01-15 08:18:06', '2024-06-11 14:35:19'),
(255, 127, 169, '13.08', 5, '2024-01-15 08:18:06', '2024-06-11 14:35:20'),
(258, 128, 158, '12.26', 5, '2024-01-15 08:19:36', '2024-06-11 14:10:17'),
(259, 128, 159, '14.205', 4, '2024-01-15 08:19:36', '2024-06-11 14:10:17'),
(260, 128, 160, '12.9', 2, '2024-01-15 08:19:36', '2024-06-11 14:35:20'),
(261, 128, 161, '10.1', 3, '2024-01-15 08:19:36', '2024-06-11 14:10:17'),
(262, 128, 162, '10.75', 6, '2024-01-15 08:19:36', '2024-06-11 14:35:20'),
(263, 128, 163, '11.86', 5, '2024-01-15 08:19:36', '2024-06-11 14:10:17'),
(264, 128, 164, '10.18', 5, '2024-01-15 08:19:36', '2024-06-11 14:35:20'),
(265, 128, 165, '10.16', 5, '2024-01-15 08:19:36', '2024-06-11 14:10:18'),
(266, 128, 166, '12.665', 4, '2024-01-15 08:19:36', '2024-06-11 14:10:18'),
(267, 128, 167, '11.5', 6, '2024-01-15 08:19:36', '2024-06-11 14:35:20'),
(268, 128, 168, '10', 4, '2024-01-15 08:19:36', '2024-06-11 14:35:20'),
(269, 128, 169, '13.96', 5, '2024-01-15 08:19:36', '2024-06-11 14:35:20'),
(272, 129, 158, '11.64', 5, '2024-01-15 08:22:35', '2024-06-13 11:30:46'),
(273, 129, 159, '14.125', 4, '2024-01-15 08:22:35', '2024-06-11 14:10:18'),
(274, 129, 160, '10.05', 2, '2024-01-15 08:22:35', '2024-06-11 14:35:20'),
(275, 129, 161, '11.34', 3, '2024-01-15 08:22:35', '2024-06-11 14:10:18'),
(276, 129, 162, '11.815', 6, '2024-01-15 08:22:35', '2024-06-11 14:35:20'),
(277, 129, 163, '12.99', 5, '2024-01-15 08:22:35', '2024-06-11 14:10:18'),
(278, 129, 164, '11.73', 5, '2024-01-15 08:22:35', '2024-06-11 14:35:20'),
(279, 129, 165, '10.94', 5, '2024-01-15 08:22:35', '2024-06-11 14:10:18'),
(280, 129, 166, '13', 4, '2024-01-15 08:22:35', '2024-06-11 14:10:18'),
(281, 129, 167, '10.225', 6, '2024-01-15 08:22:35', '2024-06-11 14:35:20'),
(282, 129, 168, '11.05', 4, '2024-01-15 08:22:35', '2024-06-11 14:35:20'),
(283, 129, 169, '12.78', 5, '2024-01-15 08:22:35', '2024-06-11 14:35:20'),
(286, 130, 158, '12.56', 5, '2024-01-15 08:25:26', '2024-06-11 14:10:18'),
(287, 130, 159, '13.6', 4, '2024-01-15 08:25:26', '2024-06-11 14:10:18'),
(288, 130, 160, '11.9', 2, '2024-01-15 08:25:26', '2024-06-11 14:35:20'),
(289, 130, 161, '11.033333333333', 3, '2024-01-15 08:25:26', '2024-06-11 14:10:19'),
(290, 130, 162, '10.465', 6, '2024-01-15 08:25:26', '2024-06-11 14:35:20'),
(291, 130, 163, '12.464', 5, '2024-01-15 08:25:26', '2024-06-11 14:10:19'),
(292, 130, 164, '11.04', 5, '2024-01-15 08:25:26', '2024-06-11 14:35:20'),
(293, 130, 165, '11.3', 5, '2024-01-15 08:25:26', '2024-06-11 14:10:19'),
(294, 130, 166, '10.54', 4, '2024-01-15 08:25:26', '2024-06-11 14:10:19'),
(295, 130, 167, '12.25', 6, '2024-01-15 08:25:26', '2024-06-11 14:35:20'),
(296, 130, 168, '10.7', 4, '2024-01-15 08:25:26', '2024-06-11 14:35:20'),
(297, 130, 169, '10.9', 5, '2024-01-15 08:25:26', '2024-06-11 14:35:20'),
(300, 131, 13, '10.666666666667', 6, '2024-01-17 10:15:18', '2024-06-10 14:13:58'),
(302, 131, 215, '12.6', 4, '2024-01-17 10:15:18', '2024-04-27 18:36:53'),
(303, 131, 216, '16.5', 4, '2024-01-17 10:15:18', '2024-04-27 18:36:53'),
(304, 131, 217, '11.537142857143', 7, '2024-01-17 10:15:18', '2024-04-30 09:22:41'),
(305, 131, 218, '11.2', 3, '2024-01-17 10:15:18', '2024-04-27 18:36:53'),
(306, 131, 219, '16.26', 6, '2024-01-17 10:15:18', '2024-04-30 09:22:41'),
(308, 131, 221, '13.24', 5, '2024-01-17 10:15:18', '2024-06-10 14:13:58'),
(309, 131, 222, '11', 4, '2024-01-17 10:15:18', '2024-04-27 18:36:54'),
(310, 131, 223, '15.97', 4, '2024-01-17 10:15:18', '2024-04-30 09:22:41'),
(311, 131, 224, '10.85', 4, '2024-01-17 10:15:18', '2024-06-10 14:13:58'),
(312, 131, 225, '17.471428571429', 7, '2024-01-17 10:15:18', '2024-06-12 08:46:25'),
(315, 132, 13, '10.403333333333', 6, '2024-01-17 10:16:23', '2024-06-10 14:13:58'),
(317, 132, 215, '14.35', 4, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(318, 132, 216, '10', 4, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(319, 132, 217, '10.542857142857', 7, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(320, 132, 218, '11.8', 3, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(321, 132, 219, '16.81', 6, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(323, 132, 221, '14.02', 5, '2024-01-17 10:16:23', '2024-06-10 14:13:58'),
(324, 132, 222, '11.5', 4, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(325, 132, 223, '15.2', 4, '2024-01-17 10:16:23', '2024-04-30 09:22:41'),
(326, 132, 224, '10.5', 4, '2024-01-17 10:16:23', '2024-06-10 14:13:58'),
(327, 132, 225, '13.214285714286', 7, '2024-01-17 10:16:23', '2024-06-12 08:47:43'),
(330, 133, 13, '10.67', 6, '2024-01-17 10:17:04', '2024-06-10 14:13:58'),
(332, 133, 215, '16.705', 4, '2024-01-17 10:17:04', '2024-04-30 09:22:41'),
(333, 133, 216, '11.2', 4, '2024-01-17 10:17:04', '2024-04-30 09:22:41'),
(334, 133, 217, '11.544285714286', 7, '2024-01-17 10:17:04', '2024-04-30 09:22:42'),
(335, 133, 218, '11.5', 3, '2024-01-17 10:17:04', '2024-04-30 09:22:42'),
(336, 133, 219, '15.3', 6, '2024-01-17 10:17:04', '2024-04-30 09:22:42'),
(338, 133, 221, '10.06', 5, '2024-01-17 10:17:04', '2024-06-10 14:13:59'),
(339, 133, 222, '14.1', 4, '2024-01-17 10:17:04', '2024-04-30 09:22:42'),
(340, 133, 223, '15.125', 4, '2024-01-17 10:17:04', '2024-04-30 09:22:42'),
(341, 133, 224, '11.555', 4, '2024-01-17 10:17:04', '2024-06-10 14:13:59'),
(342, 133, 225, '13.514285714286', 7, '2024-01-17 10:17:04', '2024-06-12 08:47:43'),
(345, 134, 13, '10.31', 6, '2024-01-17 10:18:24', '2024-06-10 14:13:59'),
(347, 134, 215, '14.255', 4, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(348, 134, 216, '20', 4, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(349, 134, 217, '12.614285714286', 7, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(350, 134, 218, '18.8', 3, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(351, 134, 219, '11.8', 6, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(353, 134, 221, '14.92', 5, '2024-01-17 10:18:24', '2024-06-10 14:13:59'),
(354, 134, 222, '12.8', 4, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(355, 134, 223, '15.05', 4, '2024-01-17 10:18:24', '2024-04-30 09:22:42'),
(356, 134, 224, '11.55', 4, '2024-01-17 10:18:24', '2024-06-10 14:13:59'),
(357, 134, 225, '18.8', 7, '2024-01-17 10:18:24', '2024-06-12 08:47:43'),
(360, 135, 13, '0.23333333333333', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(362, 135, 215, '0', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(363, 135, 216, '4.3', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(364, 135, 217, '5.8728571428571', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(365, 135, 218, '14.3', 3, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(366, 135, 219, '13.11', 6, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(368, 135, 221, '0', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(369, 135, 222, '0', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(370, 135, 223, '9.795', 3, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(371, 135, 224, '5.5', 2, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(372, 135, 225, '0', 0, '2024-01-17 10:19:05', '2024-04-30 09:22:43'),
(375, 136, 8, '13.88', 5, '2024-01-17 11:02:03', '2024-06-10 15:17:57'),
(376, 136, 242, '12.6', 5, '2024-01-17 11:02:03', '2024-06-04 13:42:26'),
(377, 136, 243, '10', 4, '2024-01-17 11:02:03', '2024-06-10 15:17:57'),
(378, 136, 244, '16.25', 6, '2024-01-17 11:02:03', '2024-06-12 07:49:22'),
(379, 136, 245, '16.4', 4, '2024-01-17 11:02:03', '2024-06-04 13:42:26'),
(380, 136, 246, '12.4', 3, '2024-01-17 11:02:03', '2024-06-12 07:49:22'),
(381, 136, 247, '13.26', 5, '2024-01-17 11:02:03', '2024-06-12 07:49:22'),
(382, 136, 248, '11.366666666667', 3, '2024-01-17 11:02:03', '2024-06-12 08:36:44'),
(383, 136, 249, '10', 4, '2024-01-17 11:02:03', '2024-06-10 15:17:57'),
(384, 136, 250, '12.64', 5, '2024-01-17 11:02:03', '2024-06-10 15:17:57'),
(386, 136, 252, '17.61', 6, '2024-01-17 11:02:03', '2024-06-10 15:41:51'),
(388, 136, 254, '15.61', 3, '2024-01-17 11:02:03', '2024-06-12 08:20:16'),
(389, 137, 8, '18.5', 5, '2024-01-17 11:02:47', '2024-06-04 13:44:28'),
(390, 137, 242, '16', 5, '2024-01-17 11:02:47', '2024-06-04 13:44:28'),
(391, 137, 243, '10', 4, '2024-01-17 11:02:47', '2024-06-10 15:42:58'),
(392, 137, 244, '17.825', 6, '2024-01-17 11:02:47', '2024-06-12 07:49:22'),
(393, 137, 245, '18.155', 4, '2024-01-17 11:02:47', '2024-06-04 13:44:28'),
(394, 137, 246, '18.34', 3, '2024-01-17 11:02:47', '2024-06-12 07:49:22'),
(395, 137, 247, '17.262', 5, '2024-01-17 11:02:47', '2024-06-12 07:49:22'),
(396, 137, 248, '10.75', 3, '2024-01-17 11:02:47', '2024-06-12 08:36:44'),
(397, 137, 249, '10', 4, '2024-01-17 11:02:47', '2024-06-10 15:42:58'),
(398, 137, 250, '14.38', 5, '2024-01-17 11:02:47', '2024-06-10 15:42:58'),
(400, 137, 252, '16.88', 6, '2024-01-17 11:02:47', '2024-06-10 15:42:58'),
(402, 137, 254, '14.25', 3, '2024-01-17 11:02:47', '2024-06-12 08:20:16'),
(403, 138, 8, '18.78', 5, '2024-01-17 11:03:24', '2024-06-06 10:52:44'),
(404, 138, 242, '15.3', 5, '2024-01-17 11:03:24', '2024-06-06 10:52:44'),
(405, 138, 243, '10', 4, '2024-01-17 11:03:24', '2024-06-10 15:42:58'),
(406, 138, 244, '18.11', 6, '2024-01-17 11:03:24', '2024-06-12 07:49:22'),
(407, 138, 245, '17.935', 4, '2024-01-17 11:03:24', '2024-06-06 10:52:45'),
(408, 138, 246, '17.75', 3, '2024-01-17 11:03:24', '2024-06-12 07:49:22'),
(409, 138, 247, '17.6', 5, '2024-01-17 11:03:24', '2024-06-12 07:49:22'),
(410, 138, 248, '11.32', 3, '2024-01-17 11:03:24', '2024-06-12 08:36:44'),
(411, 138, 249, '10', 4, '2024-01-17 11:03:24', '2024-06-10 15:42:59'),
(412, 138, 250, '13.03', 5, '2024-01-17 11:03:24', '2024-06-10 15:42:59'),
(414, 138, 252, '17.68', 6, '2024-01-17 11:03:24', '2024-06-10 15:42:59'),
(416, 138, 254, '13.45', 3, '2024-01-17 11:03:24', '2024-06-12 08:20:16'),
(417, 139, 6, '11.866', 5, '2024-01-17 11:26:40', '2024-06-28 14:40:17'),
(418, 139, 7, '15.406666666667', 3, '2024-01-17 11:26:40', '2024-04-29 15:01:13'),
(419, 139, 12, '10.15', 4, '2024-01-17 11:26:40', '2024-07-30 13:32:42'),
(420, 139, 67, '15', 4, '2024-01-17 11:26:40', '2024-06-28 14:40:18'),
(421, 139, 68, '15.2', 3, '2024-01-17 11:26:40', '2024-02-10 09:48:30'),
(422, 139, 69, '10', 5, '2024-01-17 11:26:40', '2024-07-30 13:32:42'),
(423, 139, 70, '15.61', 3, '2024-01-17 11:26:40', '2024-06-07 17:16:29'),
(424, 139, 72, '19', 3, '2024-01-17 11:26:40', '2024-07-30 16:47:46'),
(425, 139, 74, '14.875', 4, '2024-01-17 11:26:40', '2024-07-30 16:47:46'),
(426, 139, 75, '12.75', 4, '2024-01-17 11:26:40', '2024-07-30 16:47:47'),
(427, 139, 76, '12.55', 4, '2024-01-17 11:26:40', '2024-06-28 14:40:18'),
(428, 139, 77, '12.633333333333', 3, '2024-01-17 11:26:40', '2024-07-30 16:47:47'),
(429, 139, 78, '14.5', 3, '2024-01-17 11:26:40', '2024-04-29 15:01:13'),
(430, 139, 214, '15.857142857143', 7, '2024-01-17 11:26:40', '2024-07-30 13:32:42'),
(431, 140, 6, '10.366', 5, '2024-01-17 11:27:45', '2024-07-30 13:32:42'),
(432, 140, 7, '12.076666666667', 3, '2024-01-17 11:27:45', '2024-07-30 13:32:42'),
(433, 140, 12, '10.305', 4, '2024-01-17 11:27:45', '2024-09-13 13:40:01'),
(434, 140, 67, '14', 4, '2024-01-17 11:27:45', '2024-07-30 13:32:42'),
(435, 140, 68, '12.9', 3, '2024-01-17 11:27:45', '2024-04-27 14:40:36'),
(436, 140, 69, '10', 5, '2024-01-17 11:27:45', '2024-07-30 13:32:42'),
(437, 140, 70, '10.13', 3, '2024-01-17 11:27:45', '2024-07-30 13:32:42'),
(438, 140, 72, '16.6', 3, '2024-01-17 11:27:45', '2024-07-30 16:47:47'),
(439, 140, 74, '13.35', 4, '2024-01-17 11:27:45', '2024-07-30 16:47:47'),
(440, 140, 75, '11.555', 4, '2024-01-17 11:27:45', '2024-07-30 16:47:47'),
(441, 140, 76, '10.1', 4, '2024-01-17 11:27:45', '2024-09-13 13:40:01'),
(442, 140, 77, '11.8', 3, '2024-01-17 11:27:45', '2024-07-30 16:47:47'),
(443, 140, 78, '11.283333333333', 3, '2024-01-17 11:27:45', '2024-04-29 15:02:58'),
(444, 140, 214, '14.428571428571', 7, '2024-01-17 11:27:45', '2024-07-30 13:32:43'),
(445, 141, 6, '10.06', 5, '2024-01-17 11:28:36', '2024-07-30 13:32:43'),
(446, 141, 7, '14.906666666667', 3, '2024-01-17 11:28:36', '2024-04-29 15:02:58'),
(447, 141, 12, '10.005', 4, '2024-01-17 11:28:36', '2024-12-09 10:20:50'),
(448, 141, 67, '16', 4, '2024-01-17 11:28:36', '2024-07-30 13:32:43'),
(449, 141, 68, '11.3', 3, '2024-01-17 11:28:36', '2024-04-27 20:44:50'),
(450, 141, 69, '10', 5, '2024-01-17 11:28:36', '2024-12-09 10:20:50'),
(451, 141, 70, '0', 0, '2024-01-17 11:28:36', '2024-04-27 20:44:50'),
(452, 141, 72, '14.9', 3, '2024-01-17 11:28:36', '2024-07-30 16:47:47'),
(453, 141, 74, '0', 0, '2024-01-17 11:28:36', '2024-04-27 20:44:50'),
(454, 141, 75, '11.625', 4, '2024-01-17 11:28:36', '2024-07-30 16:47:47'),
(455, 141, 76, '1.5', 0, '2024-01-17 11:28:36', '2024-07-30 13:32:43'),
(456, 141, 77, '6.6733333333333', 2, '2024-01-17 11:28:36', '2024-12-09 10:20:50'),
(457, 141, 78, '12.3', 3, '2024-01-17 11:28:36', '2024-04-29 15:02:58'),
(458, 141, 214, '0', 0, '2024-01-17 11:28:36', '2024-04-27 20:44:50'),
(459, 142, 6, '10', 5, '2024-01-17 11:29:30', '2024-12-09 10:20:50'),
(460, 142, 7, '11.9', 3, '2024-01-17 11:29:30', '2024-07-30 13:32:44'),
(461, 142, 12, '10.35', 4, '2024-01-17 11:29:30', '2024-09-13 13:45:05'),
(462, 142, 67, '13', 4, '2024-01-17 11:29:30', '2024-07-30 13:32:44'),
(463, 142, 68, '10.61', 3, '2024-01-17 11:29:30', '2024-04-29 15:02:58'),
(464, 142, 69, '10', 5, '2024-01-17 11:29:30', '2024-09-13 13:45:05'),
(465, 142, 70, '12.85', 3, '2024-01-17 11:29:30', '2024-06-07 17:16:36'),
(466, 142, 72, '13.61', 3, '2024-01-17 11:29:30', '2024-07-30 16:47:47'),
(467, 142, 74, '12', 4, '2024-01-17 11:29:30', '2024-07-30 16:47:47'),
(468, 142, 75, '11.45', 4, '2024-01-17 11:29:30', '2024-07-30 16:47:47'),
(469, 142, 76, '10', 4, '2024-01-17 11:29:30', '2024-09-13 13:45:05'),
(470, 142, 77, '11.283333333333', 3, '2024-01-17 11:29:30', '2024-09-13 13:45:05'),
(471, 142, 78, '13.25', 3, '2024-01-17 11:29:30', '2024-04-29 15:02:58'),
(472, 142, 214, '14.571428571429', 7, '2024-01-17 11:29:30', '2024-07-30 13:32:44'),
(474, 143, 186, '10.425', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(475, 143, 187, '13.93', 5, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(476, 143, 188, '12.164', 5, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(477, 143, 189, '13.65', 5, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(478, 143, 190, '14.6775', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(479, 143, 191, '13.975', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(480, 143, 192, '10.633333333333', 3, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(481, 143, 193, '11.4', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(482, 143, 194, '14.305', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(483, 143, 195, '15.005', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(484, 143, 196, '14.075', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(485, 143, 197, '14.9025', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(486, 143, 198, '14.45', 4, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(487, 143, 199, '15.133333333333', 3, '2024-01-17 12:11:07', '2024-07-30 16:54:21'),
(489, 144, 186, '10.0075', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(490, 144, 187, '12.326', 5, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(491, 144, 188, '13.024', 5, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(492, 144, 189, '12.5', 5, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(493, 144, 190, '13.2125', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(494, 144, 191, '12.525', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(495, 144, 192, '12.5', 3, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(496, 144, 193, '11.0175', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:21'),
(497, 144, 194, '10.005', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:22'),
(498, 144, 195, '12.2375', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:22'),
(499, 144, 196, '11.05', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:22'),
(500, 144, 197, '13.4375', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:22'),
(501, 144, 198, '12.775', 4, '2024-01-17 12:12:53', '2024-07-30 16:54:22'),
(502, 144, 199, '15.216666666667', 3, '2024-01-17 12:12:53', '2024-07-30 16:54:22'),
(504, 145, 186, '11.8025', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(505, 145, 187, '10.874', 5, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(506, 145, 188, '14.892', 5, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(507, 145, 189, '11.144', 5, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(508, 145, 190, '15.2125', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(509, 145, 191, '11.4', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(510, 145, 192, '12.206666666667', 3, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(511, 145, 193, '11.6', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(512, 145, 194, '10.005', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(513, 145, 195, '10.08', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(514, 145, 196, '14.95', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(515, 145, 197, '15.4375', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(516, 145, 198, '11.75', 4, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(517, 145, 199, '13.266666666667', 3, '2024-01-17 12:14:19', '2024-07-30 16:54:22'),
(518, 146, 53, '12.6', 2, '2024-01-17 12:25:51', '2024-07-30 16:55:46'),
(519, 146, 54, '11.834', 10, '2024-01-17 12:25:51', '2024-07-30 16:55:46'),
(520, 146, 55, '11.6', 3, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(521, 146, 56, '11.4', 4, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(523, 146, 58, '11.89375', 8, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(524, 146, 59, '11.775', 4, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(525, 146, 60, '11.31', 5, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(526, 146, 61, '14.275', 4, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(527, 146, 62, '14', 2, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(528, 146, 63, '13.555', 8, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(530, 146, 65, '11.87', 3, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(531, 146, 172, '11.866666666667', 3, '2024-01-17 12:25:51', '2024-07-30 16:55:47'),
(532, 147, 53, '12.85', 2, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(533, 147, 54, '10.012', 10, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(534, 147, 55, '14.7', 3, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(535, 147, 56, '13.01', 4, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(537, 147, 58, '13.66875', 8, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(538, 147, 59, '12.475', 4, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(539, 147, 60, '13.226', 5, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(540, 147, 61, '14.7775', 4, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(541, 147, 62, '10', 2, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(542, 147, 63, '14.83', 8, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(544, 147, 65, '10.533333333333', 3, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(545, 147, 172, '10.166666666667', 3, '2024-01-17 12:26:39', '2024-07-30 16:55:47'),
(546, 148, 4, '11.278', 5, '2024-01-17 12:43:47', '2024-07-30 16:52:32'),
(547, 148, 9, '11.25', 2, '2024-01-17 12:43:47', '2024-07-30 16:52:32'),
(548, 148, 27, '12.65', 4, '2024-01-17 12:43:47', '2024-04-27 21:57:24'),
(549, 148, 28, '20', 3, '2024-01-17 12:43:47', '2024-07-30 16:52:32'),
(550, 148, 29, '12.828571428571', 7, '2024-01-17 12:43:47', '2024-07-30 16:52:32'),
(551, 148, 30, '13.164285714286', 7, '2024-01-17 12:43:47', '2024-08-05 13:47:08'),
(552, 148, 31, '18.5', 2, '2024-01-17 12:43:47', '2024-07-30 16:52:33'),
(553, 148, 32, '10.244', 5, '2024-01-17 12:43:47', '2024-07-30 16:52:33'),
(554, 148, 33, '14.56', 5, '2024-01-17 12:43:47', '2024-07-24 11:47:10'),
(556, 148, 35, '12.75', 5, '2024-01-17 12:43:47', '2024-07-24 11:47:10'),
(557, 148, 36, '13.78', 5, '2024-01-17 12:43:47', '2024-07-24 11:47:10'),
(558, 148, 37, '10.555', 4, '2024-01-17 12:43:47', '2024-07-24 11:47:10'),
(559, 148, 38, '14.75', 2, '2024-01-17 12:43:47', '2024-04-27 21:57:25'),
(560, 149, 4, '10.468', 5, '2024-01-17 12:44:47', '2024-07-30 16:52:33'),
(561, 149, 9, '10.925', 2, '2024-01-17 12:44:47', '2024-07-30 16:52:33'),
(562, 149, 27, '15.45', 4, '2024-01-17 12:44:47', '2024-04-27 21:57:25'),
(563, 149, 28, '20', 3, '2024-01-17 12:44:47', '2024-07-30 16:52:33'),
(564, 149, 29, '13.45', 7, '2024-01-17 12:44:47', '2024-07-30 16:52:33'),
(565, 149, 30, '14.478571428571', 7, '2024-01-17 12:44:47', '2024-08-05 13:47:08'),
(566, 149, 31, '16.5', 2, '2024-01-17 12:44:47', '2024-07-30 16:52:33'),
(567, 149, 32, '10.604', 5, '2024-01-17 12:44:47', '2024-07-24 11:47:11'),
(568, 149, 33, '14.96', 5, '2024-01-17 12:44:47', '2024-07-24 11:47:11'),
(570, 149, 35, '14.38', 5, '2024-01-17 12:44:47', '2024-07-24 11:47:11'),
(571, 149, 36, '12.304', 5, '2024-01-17 12:44:47', '2024-07-24 11:47:11'),
(572, 149, 37, '12.7', 4, '2024-01-17 12:44:47', '2024-07-24 11:47:11'),
(573, 149, 38, '14.05', 2, '2024-01-17 12:44:47', '2024-07-24 11:47:11'),
(574, 150, 4, '10', 5, '2024-01-17 12:45:29', '2024-07-24 11:47:11'),
(575, 150, 9, '12.25', 2, '2024-01-17 12:45:29', '2024-07-30 16:52:33'),
(576, 150, 27, '11.35', 4, '2024-01-17 12:45:29', '2024-04-27 21:57:26'),
(577, 150, 28, '20', 3, '2024-01-17 12:45:29', '2024-07-30 16:52:33'),
(578, 150, 29, '14.278571428571', 7, '2024-01-17 12:45:29', '2024-07-30 16:52:33'),
(579, 150, 30, '14.4', 7, '2024-01-17 12:45:29', '2024-08-05 13:47:09'),
(580, 150, 31, '17.75', 2, '2024-01-17 12:45:29', '2024-07-30 16:52:33'),
(581, 150, 32, '10.56', 5, '2024-01-17 12:45:29', '2024-07-30 16:52:33'),
(582, 150, 33, '16.62', 5, '2024-01-17 12:45:29', '2024-07-24 11:47:11'),
(584, 150, 35, '11.886', 5, '2024-01-17 12:45:29', '2024-07-24 11:47:11'),
(585, 150, 36, '11.98', 5, '2024-01-17 12:45:29', '2024-07-24 11:47:11'),
(586, 150, 37, '11.525', 4, '2024-01-17 12:45:29', '2024-07-24 11:47:11'),
(587, 150, 38, '10.005', 2, '2024-01-17 12:45:29', '2024-07-30 16:52:33'),
(588, 151, 4, '12.94', 5, '2024-01-17 12:46:19', '2024-07-30 16:52:33'),
(589, 151, 9, '10.305', 2, '2024-01-17 12:46:19', '2024-07-30 16:52:33'),
(590, 151, 27, '15.15', 4, '2024-01-17 12:46:19', '2024-04-27 21:57:27'),
(591, 151, 28, '17', 3, '2024-01-17 12:46:19', '2024-07-30 16:52:33'),
(592, 151, 29, '14.062857142857', 7, '2024-01-17 12:46:19', '2024-07-30 16:52:33'),
(593, 151, 30, '14.528571428571', 7, '2024-01-17 12:46:19', '2024-08-05 13:47:09'),
(594, 151, 31, '10', 2, '2024-01-17 12:46:19', '2024-09-13 13:55:17'),
(595, 151, 32, '11.904', 5, '2024-01-17 12:46:19', '2024-07-24 11:47:12'),
(596, 151, 33, '13.64', 5, '2024-01-17 12:46:19', '2024-07-30 16:52:34'),
(598, 151, 35, '12.166', 5, '2024-01-17 12:46:19', '2024-07-24 11:47:12'),
(599, 151, 36, '13.04', 5, '2024-01-17 12:46:19', '2024-07-24 11:47:12'),
(600, 151, 37, '11.1', 4, '2024-01-17 12:46:19', '2024-07-24 11:47:12'),
(601, 151, 38, '10.9', 2, '2024-01-17 12:46:19', '2024-07-30 16:52:34'),
(602, 153, 4, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:27'),
(603, 153, 9, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:27'),
(604, 153, 27, '5', 2, '2024-01-17 12:47:42', '2024-04-27 21:57:27'),
(605, 153, 28, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:27'),
(606, 153, 29, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:27'),
(607, 153, 30, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:27'),
(608, 153, 31, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:28'),
(609, 153, 32, '2.4', 0, '2024-01-17 12:47:42', '2024-07-24 11:47:12'),
(610, 153, 33, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:28'),
(612, 153, 35, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:28'),
(613, 153, 36, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:28'),
(614, 153, 37, '2.1', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:28'),
(615, 153, 38, '0', 0, '2024-01-17 12:47:42', '2024-04-27 21:57:29'),
(616, 154, 4, '0', 0, '2024-01-17 12:48:30', '2024-04-27 21:57:29'),
(617, 154, 9, '2.205', 0, '2024-01-17 12:48:30', '2024-07-30 16:52:34'),
(618, 154, 27, '10', 4, '2024-01-17 12:48:30', '2024-04-27 21:57:29'),
(619, 154, 28, '0', 0, '2024-01-17 12:48:30', '2024-04-27 21:57:29'),
(620, 154, 29, '1.4785714285714', 1, '2024-01-17 12:48:30', '2024-07-30 16:52:34'),
(621, 154, 30, '1.4785714285714', 1, '2024-01-17 12:48:30', '2024-08-05 13:47:09'),
(622, 154, 31, '0', 0, '2024-01-17 12:48:30', '2024-04-27 21:57:29'),
(623, 154, 32, '1.9', 0, '2024-01-17 12:48:30', '2024-07-24 11:47:12'),
(624, 154, 33, '0', 0, '2024-01-17 12:48:30', '2024-04-27 21:57:29'),
(626, 154, 35, '0', 0, '2024-01-17 12:48:30', '2024-04-27 21:57:29'),
(627, 154, 36, '0', 0, '2024-01-17 12:48:30', '2024-04-27 21:57:30'),
(628, 154, 37, '5.5', 2, '2024-01-17 12:48:30', '2024-04-27 21:57:30'),
(629, 154, 38, '5.125', 1, '2024-01-17 12:48:30', '2024-04-27 21:57:30'),
(630, 155, 4, '13.366', 5, '2024-01-17 12:49:10', '2024-07-30 16:52:34'),
(631, 155, 9, '15.35', 2, '2024-01-17 12:49:10', '2024-07-30 16:52:34'),
(632, 155, 27, '17.2', 4, '2024-01-17 12:49:10', '2024-04-27 21:57:30'),
(633, 155, 28, '15.5', 3, '2024-01-17 12:49:10', '2024-07-30 16:52:34'),
(634, 155, 29, '13.628571428571', 7, '2024-01-17 12:49:10', '2024-07-30 16:52:34'),
(635, 155, 30, '14.692857142857', 7, '2024-01-17 12:49:10', '2024-08-05 13:47:09'),
(636, 155, 31, '17', 2, '2024-01-17 12:49:10', '2024-07-30 16:52:34'),
(637, 155, 32, '14.584', 5, '2024-01-17 12:49:10', '2024-07-30 16:52:34'),
(638, 155, 33, '14.72', 5, '2024-01-17 12:49:10', '2024-07-24 11:47:13'),
(640, 155, 35, '12.08', 5, '2024-01-17 12:49:10', '2024-07-24 11:47:13'),
(641, 155, 36, '16.72', 5, '2024-01-17 12:49:10', '2024-07-24 11:47:13'),
(642, 155, 37, '13.45', 4, '2024-01-17 12:49:10', '2024-07-24 11:47:13'),
(643, 155, 38, '14.825', 2, '2024-01-17 12:49:10', '2024-04-27 21:57:30'),
(644, 156, 1, '10.44', 3, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(645, 156, 2, '10.175', 4, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(647, 156, 16, '10.25', 8, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(648, 156, 17, '10', 4, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(649, 156, 18, '11.576', 5, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(650, 156, 22, '10.04', 6, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(651, 156, 151, '11.173333333333', 3, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(652, 156, 152, '11.505', 2, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(653, 156, 153, '10.01', 4, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(654, 156, 154, '10.08', 4, '2024-01-17 13:05:17', '2024-09-13 13:53:21'),
(655, 156, 155, '10', 3, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(656, 156, 156, '10.7', 4, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(657, 156, 157, '11.233333333333', 3, '2024-01-17 13:05:17', '2024-08-05 11:24:48'),
(658, 157, 1, '10.01', 3, '2024-01-17 13:06:03', '2024-08-05 11:24:48'),
(659, 157, 2, '12.725', 4, '2024-01-17 13:06:03', '2024-08-05 11:24:48'),
(661, 157, 16, '10.9', 8, '2024-01-17 13:06:03', '2024-08-05 11:24:48'),
(662, 157, 17, '16.5', 4, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(663, 157, 18, '10.966', 5, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(664, 157, 22, '10.535', 6, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(665, 157, 151, '11.966666666667', 3, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(666, 157, 152, '12.655', 2, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(667, 157, 153, '11.505', 4, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(668, 157, 154, '10.48', 4, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(669, 157, 155, '10.01', 3, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(670, 157, 156, '11.205', 4, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(671, 157, 157, '15.12', 3, '2024-01-17 13:06:03', '2024-08-05 11:24:49'),
(672, 158, 1, '10.01', 3, '2024-01-17 13:06:45', '2024-08-05 11:24:49'),
(673, 158, 2, '16.03', 4, '2024-01-17 13:06:45', '2024-08-05 11:24:49'),
(675, 158, 16, '14.2', 8, '2024-01-17 13:06:45', '2024-08-05 11:24:49'),
(676, 158, 17, '14.5', 4, '2024-01-17 13:06:45', '2024-08-05 11:24:49'),
(677, 158, 18, '12.36', 5, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(678, 158, 22, '11.955', 6, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(679, 158, 151, '11.4', 3, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(680, 158, 152, '10.855', 2, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(681, 158, 153, '15.005', 4, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(682, 158, 154, '15.93', 4, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(683, 158, 155, '10.01', 3, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(684, 158, 156, '14.19', 4, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(685, 158, 157, '12.383333333333', 3, '2024-01-17 13:06:45', '2024-08-05 11:24:50'),
(686, 159, 1, '10.023333333333', 3, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(687, 159, 2, '16.53', 4, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(689, 159, 16, '15.125', 8, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(690, 159, 17, '10', 4, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(691, 159, 18, '14.022', 5, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(692, 159, 22, '13.205', 6, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(693, 159, 151, '12.5', 3, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(694, 159, 152, '13.73', 2, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(695, 159, 153, '11.355', 4, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(696, 159, 154, '15.03', 4, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(697, 159, 155, '11.9', 3, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(698, 159, 156, '12.955', 4, '2024-01-17 13:07:13', '2024-08-05 11:24:50'),
(699, 159, 157, '15.85', 3, '2024-01-17 13:07:13', '2024-08-05 11:24:51'),
(700, 160, 1, '10.3', 3, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(701, 160, 2, '12.03', 4, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(703, 160, 16, '10', 8, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(704, 160, 17, '15', 4, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(705, 160, 18, '10.006', 5, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(706, 160, 22, '11.455', 6, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(707, 160, 151, '10.973333333333', 3, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(708, 160, 152, '11.485', 2, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(709, 160, 153, '11.965', 4, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(710, 160, 154, '10.35', 4, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(711, 160, 155, '10.01', 3, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(712, 160, 156, '10.005', 4, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(713, 160, 157, '11.09', 3, '2024-01-17 13:07:45', '2024-08-05 11:24:51'),
(714, 161, 1, '11', 3, '2024-01-17 13:08:15', '2024-08-05 11:24:51'),
(715, 161, 2, '11.795', 4, '2024-01-17 13:08:15', '2024-08-05 11:24:51'),
(717, 161, 16, '10.13', 8, '2024-01-17 13:08:15', '2024-08-05 11:24:51'),
(718, 161, 17, '10', 4, '2024-01-17 13:08:15', '2024-08-05 11:24:51'),
(719, 161, 18, '10.718', 5, '2024-01-17 13:08:15', '2024-08-05 11:24:51'),
(720, 161, 22, '10.07', 6, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(721, 161, 151, '11.066666666667', 3, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(722, 161, 152, '10.855', 2, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(723, 161, 153, '10.065', 4, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(724, 161, 154, '13.205', 4, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(725, 161, 155, '10', 3, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(726, 161, 156, '10.655', 4, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(727, 161, 157, '13.266666666667', 3, '2024-01-17 13:08:15', '2024-08-05 11:24:52'),
(728, 162, 1, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(729, 162, 2, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(731, 162, 16, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(732, 162, 17, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(733, 162, 18, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(734, 162, 22, '5.005', 3, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(735, 162, 151, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:52'),
(736, 162, 152, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:53'),
(737, 162, 153, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:53'),
(738, 162, 154, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:53'),
(739, 162, 155, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:53'),
(740, 162, 156, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:53'),
(741, 162, 157, '0', 0, '2024-01-17 13:09:04', '2024-08-05 11:24:53'),
(1078, 175, 6, '4', 2, '2024-03-20 09:43:47', '2024-07-30 13:32:44'),
(1079, 175, 7, '3.6333333333333', 1, '2024-03-20 09:43:47', '2024-04-29 15:02:58'),
(1080, 175, 12, '5', 2, '2024-03-20 09:43:47', '2024-07-30 13:32:44'),
(1081, 175, 67, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1082, 175, 68, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1083, 175, 69, '3', 0, '2024-03-20 09:43:47', '2024-07-30 13:32:44'),
(1084, 175, 70, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1085, 175, 72, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1086, 175, 74, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1087, 175, 75, '5', 2, '2024-03-20 09:43:47', '2024-07-30 16:47:47'),
(1088, 175, 76, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1089, 175, 77, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1090, 175, 78, '9.3333333333333', 2, '2024-03-20 09:43:47', '2024-04-29 15:02:59'),
(1091, 175, 214, '0', 0, '2024-03-20 09:43:47', '2024-04-26 16:23:49'),
(1148, 196, 278, '14.783333333333', 6, '2024-05-27 08:16:15', '2024-08-07 11:38:10'),
(1149, 196, 279, '14.175', 4, '2024-05-27 08:16:15', '2024-08-07 11:38:10'),
(1150, 196, 281, '15.603333333333', 6, '2024-05-27 08:16:15', '2024-11-06 11:12:44'),
(1151, 196, 282, '16.6', 3, '2024-05-27 08:16:15', '2024-08-07 11:38:10'),
(1152, 196, 283, '14.03', 4, '2024-05-27 08:16:15', '2024-08-07 11:38:10'),
(1153, 196, 284, '15.14', 5, '2024-05-27 08:16:15', '2024-11-06 11:12:44'),
(1154, 196, 285, '17.7', 2, '2024-05-27 08:16:15', '2024-11-06 11:12:44'),
(1155, 197, 278, '14.733333333333', 6, '2024-05-27 08:17:59', '2024-08-07 11:38:11'),
(1156, 197, 279, '15.925', 4, '2024-05-27 08:17:59', '2024-08-07 11:38:11'),
(1157, 197, 281, '14.75', 6, '2024-05-27 08:17:59', '2024-11-06 11:12:45'),
(1158, 197, 282, '18.36', 3, '2024-05-27 08:17:59', '2024-08-07 11:38:11'),
(1159, 197, 283, '15.815', 4, '2024-05-27 08:17:59', '2024-08-07 11:38:11'),
(1160, 197, 284, '16.05', 5, '2024-05-27 08:17:59', '2024-11-06 11:12:45'),
(1161, 197, 285, '16.05', 2, '2024-05-27 08:17:59', '2024-11-06 11:12:45'),
(1166, 114, 309, '16', 6, '2024-06-11 16:04:50', '2024-06-11 16:10:25'),
(1167, 115, 309, '17', 6, '2024-06-11 16:04:50', '2024-06-11 16:11:08'),
(1168, 116, 309, '17.5', 6, '2024-06-11 16:04:50', '2024-06-11 16:11:08'),
(1169, 117, 309, '16.5', 6, '2024-06-11 16:04:50', '2024-06-11 16:11:08'),
(1170, 122, 310, '17', 6, '2024-06-11 16:15:59', '2024-06-11 16:22:12'),
(1171, 123, 310, '16.5', 6, '2024-06-11 16:15:59', '2024-06-11 16:22:12'),
(1172, 124, 310, '17.5', 6, '2024-06-11 16:15:59', '2024-06-11 16:22:12'),
(1173, 125, 310, '17', 6, '2024-06-11 16:15:59', '2024-06-11 16:22:13'),
(1174, 126, 312, '17', 6, '2024-06-11 16:32:08', '2024-06-11 16:34:37'),
(1175, 127, 312, '16.5', 6, '2024-06-11 16:32:08', '2024-06-11 16:34:37'),
(1176, 128, 312, '16', 6, '2024-06-11 16:32:08', '2024-06-11 16:34:37'),
(1177, 129, 312, '16.5', 6, '2024-06-11 16:32:08', '2024-06-11 16:34:37'),
(1178, 130, 312, '16', 6, '2024-06-11 16:32:08', '2024-06-11 16:34:37'),
(1179, 118, 313, '16', 6, '2024-06-11 16:39:28', '2024-06-11 16:41:59'),
(1180, 119, 313, '17', 6, '2024-06-11 16:39:28', '2024-06-11 16:41:59'),
(1181, 120, 313, '17', 6, '2024-06-11 16:39:28', '2024-06-11 16:41:59'),
(1182, 121, 313, '17.5', 6, '2024-06-11 16:39:28', '2024-06-11 16:41:59'),
(1183, 136, 314, '18.71', 2, '2024-06-12 08:04:19', '2024-06-12 08:06:49'),
(1184, 137, 314, '18.5', 2, '2024-06-12 08:04:19', '2024-06-12 08:06:49'),
(1185, 138, 314, '18.86', 2, '2024-06-12 08:04:19', '2024-06-12 08:06:49'),
(1186, 136, 315, '17', 5, '2024-06-12 08:10:08', '2024-06-12 08:14:07'),
(1187, 137, 315, '17', 5, '2024-06-12 08:10:08', '2024-06-12 08:14:08'),
(1188, 138, 315, '17.5', 5, '2024-06-12 08:10:08', '2024-06-12 08:14:08'),
(1189, 131, 316, '17', 6, '2024-06-12 08:44:12', '2024-06-12 08:47:14'),
(1190, 132, 316, '17', 6, '2024-06-12 08:44:12', '2024-06-12 08:47:43'),
(1191, 133, 316, '17', 6, '2024-06-12 08:44:12', '2024-06-12 08:47:43'),
(1192, 134, 316, '17', 6, '2024-06-12 08:44:12', '2024-06-12 08:47:43'),
(1193, 135, 316, '0', 0, '2024-06-12 08:44:12', '2024-06-12 08:47:43'),
(1194, 190, 317, '11.866666666667', 6, '2024-06-20 09:36:14', '2024-11-06 07:48:57'),
(1195, 191, 317, '15.736666666667', 6, '2024-06-20 09:36:14', '2024-08-06 11:37:42'),
(1196, 195, 317, '13.703333333333', 6, '2024-06-20 09:36:14', '2024-08-06 11:37:42'),
(1197, 188, 318, '16.65', 4, '2024-06-20 09:37:10', '2024-09-02 10:03:59'),
(1198, 189, 318, '15.555', 4, '2024-06-20 09:37:10', '2024-09-02 10:03:59'),
(1199, 193, 318, '14.15', 4, '2024-06-20 09:37:10', '2024-09-02 10:03:59'),
(1200, 196, 319, '14.2875', 16, '2024-06-20 09:38:19', '2024-11-06 11:12:44'),
(1201, 197, 319, '13.9375', 16, '2024-06-20 09:38:19', '2024-11-06 11:12:45'),
(1202, 196, 320, '17.105', 4, '2024-06-20 10:15:39', '2024-08-07 11:38:11'),
(1203, 197, 320, '16.2', 4, '2024-06-20 10:15:39', '2024-11-06 11:12:45'),
(1204, 188, 321, '16.49', 8, '2024-06-20 10:25:10', '2024-09-02 10:03:59'),
(1205, 189, 321, '16.2', 8, '2024-06-20 10:25:10', '2024-09-02 10:03:59'),
(1206, 193, 321, '14.5875', 8, '2024-06-20 10:25:10', '2024-09-02 10:03:59'),
(1207, 139, 322, '13.874', 5, '2024-07-01 08:35:01', '2024-07-01 08:50:40'),
(1208, 140, 322, '16.474', 5, '2024-07-01 08:35:01', '2024-07-30 13:32:43'),
(1209, 141, 322, '0.84', 0, '2024-07-01 08:35:01', '2024-07-30 13:32:43'),
(1210, 142, 322, '12.05', 5, '2024-07-01 08:35:01', '2024-09-13 13:45:05'),
(1211, 175, 322, '0', 0, '2024-07-01 08:35:01', '2024-07-30 13:32:45'),
(1212, 148, 323, '12.375', 4, '2024-07-01 09:25:25', '2024-08-05 14:15:03'),
(1213, 149, 323, '14.1075', 4, '2024-07-01 09:25:25', '2024-08-05 14:15:03'),
(1214, 150, 323, '12.9', 4, '2024-07-01 09:25:25', '2024-08-05 14:15:03'),
(1215, 151, 323, '12.675', 4, '2024-07-01 09:25:25', '2024-08-05 14:15:03'),
(1216, 153, 323, '0', 0, '2024-07-01 09:25:25', '2024-07-24 11:47:12'),
(1217, 154, 323, '0', 0, '2024-07-01 09:25:25', '2024-07-24 11:47:12'),
(1218, 155, 323, '15.6', 4, '2024-07-01 09:25:25', '2024-08-05 14:15:04'),
(1219, 156, 324, '11.93', 4, '2024-07-01 12:02:37', '2024-08-05 11:24:48');
INSERT INTO `student_ues` (`id`, `student_id`, `ue_id`, `average`, `credit`, `created_at`, `updated_at`) VALUES
(1220, 157, 324, '15.6875', 4, '2024-07-01 12:02:37', '2024-08-05 11:24:49'),
(1221, 158, 324, '14.715', 4, '2024-07-01 12:02:37', '2024-08-05 11:24:50'),
(1222, 159, 324, '14.9775', 4, '2024-07-01 12:02:37', '2024-08-05 11:24:51'),
(1223, 160, 324, '10.58', 4, '2024-07-01 12:02:37', '2024-08-05 11:24:51'),
(1224, 161, 324, '11.5925', 4, '2024-07-01 12:02:37', '2024-08-05 11:24:52'),
(1225, 162, 324, '0', 0, '2024-07-01 12:02:37', '2024-08-05 11:24:53'),
(1226, 146, 325, '12.9125', 4, '2024-07-01 12:38:17', '2024-07-30 16:55:47'),
(1227, 147, 325, '11.34', 4, '2024-07-01 12:38:17', '2024-07-30 16:55:47'),
(1228, 143, 326, '13.303333333333', 3, '2024-07-01 13:15:45', '2024-07-30 16:54:21'),
(1229, 144, 326, '11.55', 3, '2024-07-01 13:15:45', '2024-07-30 16:54:22'),
(1230, 145, 326, '13.183333333333', 3, '2024-07-01 13:15:45', '2024-07-30 16:54:22'),
(1268, 156, 274, '10.05', 3, '2024-08-05 13:14:41', '2024-08-05 13:15:42'),
(1269, 157, 274, '14.3', 3, '2024-08-05 13:14:41', '2024-08-05 13:15:42'),
(1270, 158, 274, '16.316666666667', 3, '2024-08-05 13:14:41', '2024-08-05 13:15:43'),
(1271, 159, 274, '17.873333333333', 3, '2024-08-05 13:14:41', '2024-08-05 13:15:43'),
(1272, 160, 274, '10.683333333333', 3, '2024-08-05 13:14:41', '2024-08-05 13:15:43'),
(1273, 161, 274, '13.583333333333', 3, '2024-08-05 13:14:41', '2024-08-05 13:15:43'),
(1274, 162, 274, '0', 0, '2024-08-05 13:14:42', '2024-08-05 13:15:43'),
(1275, 196, 327, '17.05', 3, '2024-08-06 10:00:27', '2024-08-07 11:38:11'),
(1276, 197, 327, '16.11', 3, '2024-08-06 10:00:27', '2024-11-06 11:12:45'),
(1277, 196, 328, '17.5', 3, '2024-08-06 10:02:24', '2024-08-07 11:38:11'),
(1278, 197, 328, '16.5', 3, '2024-08-06 10:02:24', '2024-08-07 11:38:11'),
(1279, 188, 329, '15.425', 14, '2024-08-06 10:29:16', '2024-11-06 07:09:52'),
(1280, 189, 329, '15.305', 14, '2024-08-06 10:29:16', '2024-11-06 07:09:53'),
(1281, 193, 329, '14.305', 14, '2024-08-06 10:29:16', '2024-11-06 07:09:53'),
(1282, 190, 330, '15.5', 12, '2024-08-06 10:51:20', '2024-11-06 07:48:58'),
(1283, 191, 330, '15.466666666667', 12, '2024-08-06 10:51:20', '2024-11-06 07:48:58'),
(1284, 195, 330, '13.7', 12, '2024-08-06 10:51:20', '2024-11-06 07:48:58'),
(1285, 188, 298, '15.05', 4, NULL, '2024-11-06 10:10:08'),
(1286, 189, 298, '14.925', 4, NULL, '2024-11-06 10:10:08'),
(1287, 193, 298, '13.975', 4, NULL, '2024-11-06 10:10:08'),
(1288, 188, 292, '17.135', 8, NULL, '2024-11-06 10:14:05'),
(1289, 188, 293, '15.336666666667', 6, NULL, '2024-11-06 10:14:05'),
(1290, 188, 294, '16', 9, NULL, '2024-11-06 10:14:05'),
(1291, 188, 295, '16.378571428571', 7, NULL, '2024-11-06 10:14:05'),
(1292, 189, 292, '16.21', 8, NULL, '2024-11-06 10:18:28'),
(1293, 189, 293, '15.683333333333', 6, NULL, '2024-11-06 10:18:28'),
(1294, 189, 294, '16.177777777778', 9, NULL, '2024-11-06 10:18:28'),
(1295, 189, 295, '16.378571428571', 7, NULL, '2024-11-06 10:18:28'),
(1296, 193, 292, '16.12875', 8, NULL, '2024-11-06 10:18:28'),
(1297, 193, 293, '13.766666666667', 6, NULL, '2024-11-06 10:18:28'),
(1298, 193, 294, '14.011111111111', 9, NULL, '2024-11-06 10:18:28'),
(1299, 193, 295, '14.211428571429', 7, NULL, '2024-11-06 10:18:28'),
(1300, 190, 296, '10.283333333333', 6, NULL, '2024-11-06 10:56:23'),
(1301, 190, 297, '12.933333333333', 6, NULL, '2024-11-06 10:56:23'),
(1302, 191, 296, '16.22', 6, NULL, '2024-11-06 10:56:23'),
(1303, 191, 297, '16.1', 6, NULL, '2024-11-06 10:56:23'),
(1304, 195, 296, '11.6', 6, NULL, '2024-11-06 10:56:24'),
(1305, 195, 297, '13.616666666667', 6, NULL, '2024-11-06 10:56:24'),
(1306, 190, 286, '10.125', 6, NULL, '2024-11-06 14:35:12'),
(1307, 190, 287, '10.846666666667', 6, NULL, '2024-11-06 14:36:47'),
(1308, 190, 288, '13.105', 4, NULL, '2024-11-06 14:36:47'),
(1309, 190, 289, '10.053333333333', 6, NULL, '2024-11-06 14:35:12'),
(1310, 190, 290, '10.55', 4, NULL, '2024-11-06 10:56:23'),
(1311, 190, 291, '10.95', 4, NULL, '2024-11-06 10:56:23'),
(1312, 191, 286, '15.625', 6, NULL, '2024-11-06 10:56:23'),
(1313, 191, 287, '15.295', 6, NULL, '2024-11-06 10:56:23'),
(1314, 191, 288, '16.725', 4, NULL, '2024-11-06 10:56:23'),
(1315, 191, 289, '15.036666666667', 6, NULL, '2024-11-06 10:56:23'),
(1316, 191, 290, '13.655', 4, NULL, '2024-11-06 10:56:23'),
(1317, 191, 291, '16.1', 4, NULL, '2024-11-06 10:56:24'),
(1318, 195, 286, '10.125', 6, NULL, '2024-11-06 10:56:24'),
(1319, 195, 287, '13.308333333333', 6, NULL, '2024-11-06 10:56:24'),
(1320, 195, 288, '13.5', 4, NULL, '2024-11-06 10:56:24'),
(1321, 195, 289, '12.566666666667', 6, NULL, '2024-11-06 10:56:24'),
(1322, 195, 290, '13.225', 4, NULL, '2024-11-06 10:56:24'),
(1323, 195, 291, '15.15', 4, NULL, '2024-11-06 10:56:24'),
(1324, 196, 299, '14.825', 4, NULL, '2024-11-06 11:12:44'),
(1325, 197, 299, '17.055', 4, NULL, '2024-11-06 11:12:45'),
(1326, 200, 1, '12.066666666667', 3, '2024-12-16 11:22:14', '2024-12-16 11:55:42'),
(1327, 200, 2, '14.1', 4, '2024-12-16 11:22:14', '2024-12-16 11:55:42'),
(1328, 200, 16, '13.55', 8, '2024-12-16 11:22:14', '2024-12-16 11:55:42'),
(1329, 200, 17, '13.11', 4, '2024-12-16 11:22:14', '2024-12-16 11:55:42'),
(1330, 200, 18, '13.72', 5, '2024-12-16 11:22:14', '2024-12-16 11:55:42'),
(1331, 200, 22, '13.05', 6, '2024-12-16 11:22:14', '2024-12-16 11:59:19'),
(1332, 200, 151, '14.033333333333', 3, '2024-12-16 11:22:14', '2024-12-16 11:55:42'),
(1333, 200, 152, '12.95', 2, '2024-12-16 11:22:14', '2024-12-16 11:59:20'),
(1334, 200, 153, '14.1', 4, '2024-12-16 11:22:14', '2024-12-16 11:59:20'),
(1335, 200, 154, '13.2', 4, '2024-12-16 11:22:14', '2024-12-16 11:59:20'),
(1336, 200, 155, '10.7', 3, '2024-12-16 11:22:14', '2024-12-16 11:59:20'),
(1337, 200, 156, '12.6', 4, '2024-12-16 11:22:14', '2024-12-16 11:59:20'),
(1338, 200, 157, '11.666666666667', 3, '2024-12-16 11:22:14', '2024-12-16 11:59:20'),
(1339, 200, 274, '13.44', 3, '2024-12-16 11:22:14', '2024-12-16 11:55:43'),
(1340, 200, 324, '12', 4, '2024-12-16 11:22:14', '2024-12-16 11:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `tranches`
--

CREATE TABLE `tranches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tranches`
--

INSERT INTO `tranches` (`id`, `name`, `due_date`, `created_at`, `updated_at`) VALUES
(1, 'first', '2023-10-31', '2024-03-25 16:57:53', '2024-03-25 16:57:53'),
(2, 'second', '2023-12-31', '2024-03-25 16:57:53', '2024-03-25 16:57:53'),
(3, 'third', '2023-10-31', '2024-03-25 16:57:53', '2024-03-25 16:57:53'),
(5, 'inscription', '2024-04-18', '2024-04-07 15:51:40', '2024-04-07 15:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `ue_courses`
--

CREATE TABLE `ue_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `ue_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unite_enseignements`
--

CREATE TABLE `unite_enseignements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_points` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_nature_id` bigint(20) UNSIGNED NOT NULL,
  `specialty_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unite_enseignements`
--

INSERT INTO `unite_enseignements` (`id`, `name`, `description`, `credit_points`, `code`, `level_id`, `semester_id`, `created_at`, `updated_at`, `course_nature_id`, `specialty_id`) VALUES
(1, 'Mathématique et informatique I', 'Nice unit', 5, 'CGE111', 11, 1, '2023-11-26 15:51:56', '2023-11-26 15:51:56', 1, 20),
(2, 'Techniques quantitatives de gestion I', 'Nice one', 4, 'CGE112', 11, 1, '2023-11-26 15:54:34', '2023-11-26 15:54:34', 1, 20),
(4, 'Outils Mathématiques I', 'Nice ue', 5, 'IGL111', 11, 1, '2023-12-01 07:45:57', '2023-12-01 07:45:57', 1, 18),
(6, 'Engineering Maths I', 'Nice unit', 5, 'SWE111', 11, 1, '2023-12-15 07:47:10', '2023-12-15 07:47:10', 1, 21),
(7, 'English and general accounting', 'NICE', 3, 'SWE117', 11, 1, '2023-12-15 07:48:46', '2023-12-15 07:48:46', 3, 21),
(8, 'Introduction to Custom Operations and Procedures/ Maritime Law', 'NICE', 5, 'LTM243', 12, 4, '2023-12-15 07:52:07', '2023-12-15 07:52:07', 2, 31),
(9, 'Formation bilingue', 'NICE UNIT', 3, 'IGL117', 11, 1, '2023-12-15 09:59:00', '2023-12-15 09:59:00', 3, 18),
(12, 'Engineering Mathematics II', 'okay', 4, 'SWE121', 11, 4, '2023-12-16 08:10:29', '2023-12-16 08:10:29', 1, 21),
(13, 'Engineering Maths III', 'ghioilji', 6, 'SWE231', 12, 1, '2023-12-16 08:23:37', '2024-04-08 08:04:24', 1, 21),
(16, 'Comptabilité analytique I', '', 4, 'CGE114', 11, 1, '2024-01-05 07:06:06', '2024-01-05 07:06:06', 2, 20),
(17, 'Fiscalité I', 'OKAY', 3, 'CGE115', 11, 1, '2024-01-05 07:07:45', '2024-01-05 07:07:45', 2, 20),
(18, 'Introduction à l’analyse Financière et\nComptabilité à l’ordinateur CAO I', 'DFGEEFE', 4, 'CGE116', 11, 1, '2024-01-05 07:09:15', '2024-01-05 07:09:15', 2, 20),
(22, 'Comptabilité générale II', '', 6, 'CGE123', 11, 4, '2024-01-05 08:14:07', '2024-01-05 08:14:07', 2, 20),
(27, 'Environnement de base I', '', 4, 'IGL112', 11, 1, '2024-01-05 08:36:58', '2024-01-05 08:36:58', 1, 18),
(28, 'Architecture', '', 3, 'IGL113', 11, 1, '2024-01-05 08:37:44', '2024-01-05 08:37:44', 2, 18),
(29, 'Initiation à l\'Algorithmique', '', 5, 'IGL114', 11, 1, '2024-01-05 08:38:16', '2024-01-05 08:38:16', 2, 18),
(30, 'Initiation au Génie logiciel', '', 7, 'IGL115', 11, 1, '2024-01-05 08:38:43', '2024-01-05 08:38:43', 2, 18),
(31, 'Traitement des données multimédia', '', 3, 'IGL116', 11, 1, '2024-01-05 08:39:14', '2024-01-05 08:39:14', 2, 18),
(32, 'Outils mathématiques II', '', 4, 'IGL121', 11, 4, '2024-01-05 08:41:57', '2024-01-05 08:41:57', 1, 18),
(33, 'Environnement de base II', '', 5, 'IGL122', 11, 4, '2024-01-05 08:46:22', '2024-01-05 08:46:22', 1, 18),
(35, 'Base de données et MERISE I', '', 5, 'IGL124', 11, 4, '2024-01-05 08:48:26', '2024-01-05 08:48:26', 2, 18),
(36, 'Programmation II', '', 5, 'IGL125', 11, 4, '2024-01-05 08:48:56', '2024-01-05 08:48:56', 2, 18),
(37, 'Maintenance et Négociation informatique', '', 4, 'IGL126', 11, 4, '2024-01-05 08:49:48', '2024-01-05 08:49:48', 2, 18),
(38, 'Economie et Gestion des entreprises', '', 3, 'IGL127', 11, 4, '2024-01-05 08:50:44', '2024-01-05 08:50:44', 3, 18),
(53, 'Environnement économique et juridique I', '', 4, 'DOT111', 11, 1, '2024-01-05 09:40:03', '2024-01-05 09:40:03', 1, 26),
(54, 'Enseignement scientifique de base I', '', 5, 'DOT112', 11, 1, '2024-01-05 09:41:24', '2024-01-05 09:41:24', 1, 26),
(55, 'Introduction au droit douanier', '', 2, 'DOT113', 11, 1, '2024-01-05 09:41:59', '2024-01-05 09:41:59', 2, 26),
(56, 'Régimes douaniers', '', 4, 'DOT114', 11, 1, '2024-01-05 09:42:46', '2024-01-05 09:42:46', 2, 26),
(58, 'Éléments de taxation I', '', 8, 'DOT116', 11, 1, '2024-01-05 09:45:28', '2024-01-05 09:45:28', 2, 26),
(59, 'Environnement économique et juridique II', '', 4, 'DOT121', 11, 4, '2024-01-05 09:46:01', '2024-01-05 09:46:01', 1, 26),
(60, 'Enseignement scientifique de base II', '', 5, 'DOT122', 11, 4, '2024-01-05 09:46:53', '2024-01-05 09:46:53', 1, 26),
(61, 'Procédure de dédouanement', '', 4, 'DOT123', 11, 4, '2024-01-05 09:47:36', '2024-01-05 09:47:36', 2, 26),
(62, 'Impôt douanier', '', 2, 'DOT124', 11, 4, '2024-01-05 09:49:17', '2024-01-05 09:49:17', 2, 26),
(63, 'Transport', '', 8, 'DOT125', 11, 4, '2024-01-05 09:49:55', '2024-01-05 09:49:55', 2, 26),
(65, 'Informatique', '', 3, 'DOT127', 11, 4, '2024-01-05 09:51:22', '2024-01-05 09:51:22', 3, 26),
(66, 'Entrepreneuriat et marketing', '', 3, 'DOT247', 12, 4, '2024-01-05 09:52:52', '2024-01-05 09:52:52', 3, 26),
(67, 'Basic environment I', '', 4, 'SWE112', 11, 1, '2024-01-05 10:13:55', '2024-01-05 10:13:55', 1, 21),
(68, 'Digital electronics', '', 3, 'SWE113', 11, 1, '2024-01-05 10:16:56', '2024-01-05 10:16:56', 2, 21),
(69, 'Introduction to algorithms', '', 5, 'SWE114', 11, 1, '2024-01-05 10:17:32', '2024-01-05 10:17:32', 2, 21),
(70, 'Multi-media data processing', '', 3, 'SWE116', 11, 1, '2024-01-05 10:18:33', '2024-01-05 10:18:33', 2, 21),
(72, 'Architecture', '', 4, 'SWE123', 11, 4, '2024-01-05 10:21:11', '2024-01-05 10:21:11', 2, 21),
(74, 'Basic Environment II', '', 5, 'SWE122', 11, 4, '2024-01-05 10:34:36', '2024-01-05 10:34:36', 1, 21),
(75, 'Database and MERISE I', '', 5, 'SWE124', 11, 4, '2024-01-05 10:36:09', '2024-01-05 10:36:09', 2, 21),
(76, 'Programming I', '', 5, 'SWE125', 11, 4, '2024-01-05 10:36:45', '2024-01-05 10:36:45', 2, 21),
(77, 'Maintenance and legal regulations', '', 4, 'SWE126', 11, 4, '2024-01-05 10:37:19', '2024-01-05 10:37:19', 2, 21),
(78, 'Economics and enterprise Organization (EEO) and French', '', 3, 'SWE127', 11, 4, '2024-01-05 10:38:35', '2024-01-05 10:38:35', 3, 21),
(81, 'Outils mathématiques III', '', 5, 'IGL231', 12, 1, '2024-01-09 14:27:48', '2024-01-09 14:27:48', 1, 18),
(82, 'Outils mathématiques IV et TIC', '', 4, 'IGL232', 12, 1, '2024-01-09 14:29:28', '2024-01-09 14:29:28', 1, 18),
(83, 'MOO UML', '', 4, 'IGL233', 12, 1, '2024-01-09 14:30:17', '2024-01-09 14:30:17', 2, 18),
(84, 'Structure de données et langage SQL', '', 5, 'IGL234', 12, 1, '2024-01-09 14:31:08', '2024-01-09 14:31:08', 2, 18),
(85, 'Programmation III', '', 5, 'IGL235', 12, 1, '2024-01-09 14:32:34', '2024-01-09 14:32:34', 2, 18),
(86, 'Système et Réseaux', '', 4, 'IGL236', 12, 1, '2024-01-09 14:33:18', '2024-01-09 14:33:18', 2, 18),
(87, 'Comptablité Analytiques et Mathematiques Generales II', 'JKLK', 3, 'IGL237', 12, 1, '2024-01-09 14:33:55', '2024-04-05 13:22:38', 3, 18),
(88, 'Terminaux mobiles', '', 5, 'IGL241', 12, 4, '2024-01-10 07:20:11', '2024-01-10 07:20:11', 1, 18),
(89, 'Gestion des projets', '', 4, 'IGL242', 12, 4, '2024-01-10 07:20:55', '2024-01-10 07:20:55', 1, 18),
(90, 'Réseaux et Administration Système', '', 4, 'IGL243', 12, 4, '2024-01-10 07:21:43', '2024-01-10 07:21:43', 2, 18),
(91, 'POO et Bases de données Avancées', '', 4, 'IGL244', 12, 4, '2024-01-10 07:22:19', '2024-01-10 07:22:19', 2, 18),
(92, 'Structure de données et IHM', 'ljkhhjhj', 13, 'IGL245', 12, 4, '2024-01-10 07:23:38', '2024-04-08 08:09:23', 2, 18),
(95, 'Mathématiques et informatique I', '', 5, 'GLT111', 11, 1, '2024-01-11 18:14:08', '2024-01-11 18:14:08', 1, 27),
(96, 'Techniques quantitatives de gestion I', '', 4, 'GLT112', 11, 1, '2024-01-11 18:14:45', '2024-01-11 18:14:45', 1, 27),
(97, 'Initiation à la logistique et comptabilité I', '', 7, 'GLT113', 11, 1, '2024-01-11 18:15:26', '2024-01-11 18:15:26', 2, 27),
(98, 'Marketing I', '', 5, 'GLT114', 11, 1, '2024-01-11 18:16:21', '2024-01-11 18:16:21', 2, 27),
(99, 'Chaînes de transport aérien, maritime et fluvial I', '', 4, 'GLT115', 11, 1, '2024-01-11 18:17:29', '2024-01-11 18:17:29', 2, 27),
(100, 'Chaînes de transport ferroviaire et routier I', '', 2, 'GLT116', 11, 1, '2024-01-11 18:18:00', '2024-01-11 18:18:00', 2, 27),
(101, 'Formation bilingue', '', 3, 'GLT117', 11, 1, '2024-01-11 18:18:37', '2024-01-11 18:18:37', 2, 27),
(102, 'Mathématiques et informatique II', '', 5, 'GLT121', 11, 4, '2024-01-11 18:19:35', '2024-01-11 18:19:35', 1, 27),
(103, 'Techniques quantitatives de gestion II', '', 4, 'GLT122', 11, 4, '2024-01-11 18:20:17', '2024-01-11 18:20:17', 1, 27),
(104, 'Initiation à la logistique et comptabilité II', '', 7, 'GLT123', 11, 4, '2024-01-11 18:21:07', '2024-01-11 18:21:07', 2, 27),
(105, 'Méthodologie et Marketing II', '', 5, 'GLT124', 11, 4, '2024-01-11 18:21:43', '2024-01-11 18:21:43', 2, 27),
(106, 'Chaînes de transport aérien, maritime et fluvial II', '', 4, 'GLT125', 11, 4, '2024-01-11 18:22:16', '2024-01-11 18:22:16', 2, 27),
(107, 'Chaînes de transport ferroviaire et routier II', '', 2, 'GLT126', 11, 4, '2024-01-11 18:23:04', '2024-01-11 18:23:04', 2, 27),
(108, 'Economie et Gestion des entreprises', '', 3, 'GLT127', 11, 4, '2024-01-11 18:23:48', '2024-01-11 18:23:48', 3, 27),
(109, 'Techniques quantitatives et Informatique appliquée I', '', 5, 'GLT231', 12, 1, '2024-01-11 18:26:08', '2024-01-11 18:26:08', 1, 27),
(110, 'Comptabilité et TIC I', '', 4, 'GLT232', 12, 1, '2024-01-11 18:27:00', '2024-01-11 18:27:00', 1, 27),
(111, 'Gestion de la chaîne logistique I', '', 4, 'GLT233', 12, 1, '2024-01-11 18:27:59', '2024-01-11 18:27:59', 2, 27),
(112, 'Gestion des flux logistiques I', '', 4, 'GLT234', 12, 1, '2024-01-11 18:28:36', '2024-01-11 18:28:36', 2, 27),
(113, 'Logistique industrielle I et II', '', 6, 'GLT235', 12, 1, '2024-01-11 18:29:13', '2024-01-11 18:29:13', 2, 27),
(114, 'Travaux de synthèse et Opérations logistiques I', '', 4, 'GLT236', 12, 1, '2024-01-11 18:29:47', '2024-01-11 18:29:47', 2, 27),
(115, 'Mathematiques Financier IV', 'YUIUIGU', 3, 'GLT237', 12, 1, '2024-01-11 18:30:41', '2024-04-05 15:21:11', 3, 27),
(116, 'Techniques quantitatives et Informatique appliquée II', '', 5, 'GLT241', 12, 4, '2024-01-11 18:31:22', '2024-01-11 18:31:22', 1, 27),
(117, 'Comptabilité et TIC II', '', 4, 'GLT242', 12, 4, '2024-01-11 18:31:53', '2024-01-11 18:31:53', 1, 27),
(118, 'Gestion de la chaîne logistique II', '', 4, 'GLT243', 12, 4, '2024-01-11 18:32:34', '2024-01-11 18:32:34', 2, 27),
(119, 'Gestion des flux logistiques II', '', 4, 'GLT244', 12, 4, '2024-01-11 18:34:04', '2024-01-11 18:34:04', 2, 27),
(120, 'Travaux de synthèse et Opérations logistiques II', 'jukhil', 13, 'GLT245', 12, 4, '2024-01-11 18:34:34', '2024-04-08 08:42:08', 2, 27),
(123, 'Mathématiques et informatique I', '', 5, 'AMA111', 11, 1, '2024-01-12 07:32:50', '2024-01-12 07:32:50', 1, 24),
(124, 'Techniques quantitatives de gestion I', '', 4, 'AMA112', 11, 1, '2024-01-12 07:33:55', '2024-01-12 07:33:55', 1, 24),
(125, 'Outils de communication I', '', 4, 'AMA113', 11, 1, '2024-01-12 07:35:05', '2024-01-12 07:35:05', 2, 24),
(127, 'Relations professionnelles I', '', 4, 'AMA115', 11, 1, '2024-01-12 07:39:29', '2024-01-12 07:39:29', 2, 24),
(128, 'Organisation et gestion I', '', 5, 'AMA116', 11, 1, '2024-01-12 07:40:03', '2024-01-12 07:40:03', 2, 24),
(129, 'Formation bilingue', '', 3, 'AMA117', 11, 1, '2024-01-12 07:40:35', '2024-01-12 07:40:35', 3, 24),
(130, 'Mathématiques et informatique II', '', 5, 'AMA121', 11, 4, '2024-01-12 07:41:18', '2024-01-12 07:41:18', 1, 24),
(131, 'Techniques quantitatives de gestion II', '', 4, 'AMA122', 11, 4, '2024-01-12 07:41:51', '2024-01-12 07:41:51', 1, 24),
(132, 'Outils de communication II', '', 5, 'AMA123', 11, 4, '2024-01-12 07:42:20', '2024-01-12 07:42:20', 2, 24),
(133, 'Méthodologie et Techniques professionnelles II', '', 5, 'AMA124', 11, 4, '2024-01-12 07:42:57', '2024-01-12 07:42:57', 2, 24),
(134, 'Relations professionnelles II', '', 4, 'AMA125', 11, 4, '2024-01-12 07:43:40', '2024-01-12 07:43:40', 2, 24),
(135, 'Organisation et gestion II', '', 4, 'AMA126', 11, 4, '2024-01-12 07:44:05', '2024-01-12 07:44:05', 2, 24),
(136, 'Economie et Gestion des entreprises', '', 3, 'AMA127', 11, 4, '2024-01-12 07:44:39', '2024-01-12 07:44:39', 3, 24),
(137, 'Techniques quantitatives et informatique I', '', 5, 'AMA231', 12, 1, '2024-01-12 07:45:12', '2024-01-12 07:45:12', 1, 24),
(138, 'Comptabilité et TIC I', '', 4, 'AMA232', 12, 1, '2024-01-12 07:45:52', '2024-01-12 07:45:52', 1, 24),
(139, 'Techniques professionnelles III', '', 4, 'AMA233', 12, 1, '2024-01-12 07:46:31', '2024-01-12 07:46:31', 2, 24),
(140, 'Relations professionnelles III', '', 4, 'AMA234', 12, 1, '2024-01-12 07:47:51', '2024-01-12 07:47:51', 2, 24),
(141, 'Organisation et gestion III', '', 4, 'AMA235', 12, 1, '2024-01-12 07:48:34', '2024-01-12 07:48:34', 2, 24),
(142, 'Gestion des ressources humaines et des évènements I et II', '', 6, 'AMA236', 12, 1, '2024-01-12 07:49:46', '2024-01-12 07:49:46', 2, 24),
(143, 'Mathematiques Generales et Mathematiques Financier', 'ioioi', 3, 'AMA237', 12, 1, '2024-01-12 07:50:16', '2024-04-05 09:06:26', 3, 24),
(144, 'Techniques quantitatives et informatique II', '', 5, 'AMA241', 12, 4, '2024-01-12 07:50:58', '2024-01-12 07:50:58', 1, 24),
(145, 'Comptabilité et TIC II', '', 4, 'AMA242', 12, 4, '2024-01-12 07:51:39', '2024-01-12 07:51:39', 1, 24),
(146, 'Techniques professionnelles IV', '', 4, 'AMA243', 12, 4, '2024-01-12 07:52:17', '2024-01-12 07:52:17', 2, 24),
(147, 'Relations professionnelles IV', '', 4, 'AMA244', 12, 4, '2024-01-12 07:53:00', '2024-01-12 07:53:00', 2, 24),
(148, 'Organisation et gestion IV', 'hjguk', 13, 'AMA245', 12, 4, '2024-01-12 07:53:29', '2024-04-08 08:34:55', 2, 24),
(151, 'Formation bilingue', '', 3, 'CGE117', 11, 1, '2024-01-12 10:13:43', '2024-01-12 10:13:43', 3, 20),
(152, 'Mathématiques et informatique II', '', 5, 'CGE121', 11, 4, '2024-01-12 12:18:34', '2024-01-12 12:18:34', 1, 20),
(153, 'Techniques quantitatives de gestion II', '', 4, 'CGE122', 11, 4, '2024-01-12 12:21:02', '2024-01-12 12:21:02', 1, 20),
(154, 'Comptabilité analytique II', '', 4, 'CGE124', 11, 4, '2024-01-12 12:25:42', '2024-01-12 12:25:42', 2, 20),
(155, 'Méthodologie et Fiscalité II', '', 4, 'CGE125', 11, 4, '2024-01-12 12:27:11', '2024-01-12 12:27:11', 2, 20),
(156, 'Introduction à l’analyse Financière et Comptabilité à l’ordinateur CAOII', '', 4, 'CGE126', 11, 4, '2024-01-12 12:31:15', '2024-01-12 12:31:15', 2, 20),
(157, 'Economie et Gestion des entreprises', '', 3, 'CGE127', 11, 4, '2024-01-12 12:32:50', '2024-01-12 12:32:50', 3, 20),
(158, 'Techniques quantitatives de gestion III', '', 5, 'CGE231', 12, 1, '2024-01-12 12:33:53', '2024-01-12 12:33:53', 1, 20),
(159, 'Mathématiques et Informatique III', '', 4, 'CGE232', 12, 1, '2024-01-12 13:08:29', '2024-01-12 13:08:29', 1, 20),
(160, 'Constitution des sociétés et Dissolution des sociétés I', 'kjkj', 4, 'CGE233', 12, 1, '2024-01-12 13:09:31', '2024-06-10 15:08:55', 2, 20),
(161, 'Analyse financière I', '', 3, 'CGE234', 12, 1, '2024-01-12 13:11:43', '2024-01-12 13:11:43', 2, 20),
(162, 'Gestion prévisionnelle I et II', '', 6, 'CGE235', 12, 1, '2024-01-12 13:13:17', '2024-01-12 13:13:17', 2, 20),
(163, 'Fiscalité et CAO III', '', 5, 'CGE236', 12, 1, '2024-01-12 13:14:18', '2024-01-12 13:14:18', 2, 20),
(164, 'Mathematiques Generales II', 'klkj', 3, 'CGE237', 12, 1, '2024-01-12 13:15:33', '2024-04-05 12:43:20', 3, 20),
(165, 'Techniques quantitatives IV', '', 5, 'CGE241', 12, 4, '2024-01-12 13:16:48', '2024-01-12 13:16:48', 1, 20),
(166, 'Mathématiques et Informatique IV', '', 4, 'CGE242', 12, 4, '2024-01-12 13:18:01', '2024-01-12 13:18:01', 1, 20),
(167, 'Comptabilité des sociétés et Dissolution des sociétés II', '', 4, 'CGE243', 12, 4, '2024-01-12 13:18:44', '2024-01-12 13:18:44', 2, 20),
(168, 'Analyse financière II', '', 3, 'CGE244', 12, 4, '2024-01-12 13:21:28', '2024-01-12 13:21:28', 2, 20),
(169, 'Fiscalité et CAO IV', 'KJKJK', 5, 'CGE245', 12, 4, '2024-01-12 13:22:42', '2024-06-11 13:10:25', 2, 20),
(172, 'Formation bilingue', '', 3, 'DOT117', 11, 1, '2024-01-15 18:39:37', '2024-01-15 18:39:37', 3, 26),
(173, 'Environnement économique et juridique III', '', 4, 'DOT231', 12, 1, '2024-01-15 19:03:35', '2024-01-15 19:03:35', 1, 26),
(174, 'Enseignements scientifiques de base III', '', 5, 'DOT232', 12, 1, '2024-01-15 19:04:34', '2024-01-15 19:04:34', 1, 26),
(175, 'Gestion des litiges douaniers', '', 4, 'DOT233', 12, 1, '2024-01-15 19:05:46', '2024-01-15 19:05:46', 2, 26),
(176, 'Eléments de taxation II', '', 8, 'DOT234', 12, 1, '2024-01-15 19:06:40', '2024-01-15 19:06:40', 2, 26),
(177, 'Transit III', '', 4, 'DOT235', 12, 1, '2024-01-15 19:11:44', '2024-01-15 19:11:44', 2, 26),
(178, 'Informatique appliquée', '', 2, 'DOT236', 12, 1, '2024-01-15 19:14:54', '2024-01-15 19:14:54', 2, 26),
(179, 'Education citoyenne et déontologie professionnelle', '', 3, 'DOT237', 12, 1, '2024-01-15 19:16:41', '2024-01-15 19:16:41', 3, 26),
(180, 'Environnement économique et juridique IV', '', 4, 'DOT241', 12, 4, '2024-01-15 19:18:46', '2024-01-15 19:18:46', 1, 26),
(181, 'Enseignements scientifiques de base IV', '', 5, 'DOT242', 12, 4, '2024-01-15 19:20:22', '2024-01-15 19:20:22', 1, 26),
(182, 'Pratique douanière', '', 4, 'DOT243', 12, 4, '2024-01-15 19:22:07', '2024-01-15 19:22:07', 2, 26),
(183, 'Eléments de taxation III', '', 4, 'DOT244', 12, 4, '2024-01-15 19:23:06', '2024-01-15 19:23:06', 2, 26),
(184, 'Pratique de transit', '', 4, 'DOT245', 12, 4, '2024-01-15 19:32:06', '2024-01-15 19:32:06', 2, 26),
(185, 'Stage professionnel', '', 6, 'DOT246', 12, 4, '2024-01-15 19:34:57', '2024-01-15 19:34:57', 2, 26),
(186, 'Mathématiques et informatique I', '', 5, 'BQF111', 11, 1, '2024-01-16 10:09:49', '2024-01-16 10:09:49', 1, 19),
(187, 'Techniques quantitatives I', '', 4, 'BQF112', 11, 1, '2024-01-16 10:10:39', '2024-01-16 10:10:39', 1, 19),
(188, 'Comptabilité I, éthique, déontologie et règlementation', '', 5, 'BQF113', 11, 1, '2024-01-16 10:11:27', '2024-01-16 10:11:27', 2, 19),
(189, 'Opérations et Techniques bancaires I', '', 5, 'BQF114', 11, 1, '2024-01-16 10:12:19', '2024-01-16 10:12:19', 2, 19),
(190, 'Finances I', '', 4, 'BQF115', 11, 1, '2024-01-16 10:13:32', '2024-01-16 10:13:32', 2, 19),
(191, 'Economie monétaire et bancaire I', '', 4, 'BQF116', 11, 1, '2024-01-16 10:14:38', '2024-01-16 10:14:38', 2, 19),
(192, 'Formation bilingue', '', 3, 'BQF117', 11, 1, '2024-01-16 10:15:32', '2024-01-16 10:15:32', 3, 19),
(193, 'Mathématiques et informatique II', '', 5, 'BQF121', 11, 4, '2024-01-16 10:17:22', '2024-01-16 10:17:22', 1, 19),
(194, 'Techniques quantitatives II', '', 4, 'BQF122', 11, 4, '2024-01-16 10:18:50', '2024-01-16 10:18:50', 1, 19),
(195, 'Comptabilité II et Méthodologie', '', 5, 'BQF123', 11, 4, '2024-01-16 10:19:28', '2024-01-16 10:19:28', 2, 19),
(196, 'Opérations et Techniques bancaires II', '', 4, 'BQF124', 11, 4, '2024-01-16 10:20:02', '2024-01-16 10:20:02', 2, 19),
(197, 'Finances II', '', 5, 'BQF125', 11, 4, '2024-01-16 10:20:52', '2024-01-16 10:20:52', 2, 19),
(198, 'Economie monétaire et bancaire II', '', 4, 'BQF126', 11, 4, '2024-01-16 10:22:28', '2024-01-16 10:22:28', 2, 19),
(199, 'Economie et Gestion des Entreprises', '', 3, 'BQF127', 11, 4, '2024-01-16 10:23:14', '2024-01-16 10:23:14', 3, 19),
(200, 'Techniques quantitatives III', '', 5, 'BQF231', 12, 1, '2024-01-16 10:24:03', '2024-01-16 10:24:03', 1, 19),
(201, 'Mathématiques et Informatique III', '', 4, 'BQF232', 12, 1, '2024-01-16 10:24:43', '2024-01-16 10:24:43', 1, 19),
(202, 'Comptabilité III', '', 4, 'BQF233', 12, 1, '2024-01-16 10:25:38', '2024-01-16 10:25:38', 2, 19),
(203, 'Opérations et Techniques bancaires III', '', 4, 'BQF234', 12, 1, '2024-01-16 10:26:22', '2024-01-16 10:26:22', 2, 19),
(204, 'Finances et Travaux de synthèse I', '', 4, 'BQF235', 12, 1, '2024-01-16 10:27:26', '2024-01-16 10:27:26', 2, 19),
(205, 'Economie monétaire et bancaire III et IV', '', 6, 'BQF236', 12, 1, '2024-01-16 10:28:18', '2024-01-16 10:28:18', 2, 19),
(206, 'Education Citoyenne et Déontologie Professionnelle', '', 3, 'BQF237', 12, 1, '2024-01-16 10:29:02', '2024-01-16 10:29:02', 3, 19),
(207, 'Techniques quantitatives IV', '', 5, 'BQF241', 12, 4, '2024-01-16 10:29:49', '2024-01-16 10:29:49', 1, 19),
(208, 'Mathématiques et Informatique IV', '', 4, 'BQF242', 12, 4, '2024-01-16 10:31:34', '2024-01-16 10:31:34', 1, 19),
(209, 'Comptabilité IV', '', 4, 'BQF243', 12, 4, '2024-01-16 10:32:20', '2024-01-16 10:32:20', 2, 19),
(210, 'Opérations et Techniques bancaires IV', '', 4, 'BQF244', 12, 4, '2024-01-16 10:33:47', '2024-01-16 10:33:47', 2, 19),
(211, 'Finances et Travaux de synthèse II', '', 4, 'BQF245', 12, 4, '2024-01-16 10:34:31', '2024-01-16 10:34:31', 2, 19),
(214, 'Introduction to software engineering', '', 7, 'SWE115', 11, 1, '2024-01-16 13:48:38', '2024-01-16 13:48:38', 2, 21),
(215, 'Basic environment III', '', 4, 'SWE232', 12, 1, '2024-01-16 13:56:15', '2024-01-16 13:56:15', 1, 21),
(216, 'OOM UML', '', 4, 'SWE233', 12, 1, '2024-01-16 13:57:19', '2024-01-16 13:57:19', 2, 21),
(217, 'Data structure and SQL language', '', 5, 'SWE234', 12, 1, '2024-01-16 13:58:00', '2024-01-16 13:58:00', 2, 21),
(218, 'Programming II', '', 5, 'SWE235', 12, 1, '2024-01-16 13:58:38', '2024-01-16 13:58:38', 2, 21),
(219, 'Systems and Networks', 'klklk', 6, 'SWE236', 12, 1, '2024-01-16 13:59:13', '2024-04-08 07:48:17', 2, 21),
(221, 'Mobile terminals and application security', '', 5, 'SWE241', 12, 4, '2024-01-16 14:00:39', '2024-01-16 14:00:39', 1, 21),
(222, 'Project management', '', 4, 'SWE242', 12, 4, '2024-01-16 14:01:32', '2024-01-16 14:01:32', 1, 21),
(223, 'Network and system administration', '', 4, 'SWE243', 12, 4, '2024-01-16 14:02:15', '2024-01-16 14:02:15', 2, 21),
(224, 'OOP and advanced database', '', 4, 'SWE244', 12, 4, '2024-01-16 14:02:56', '2024-01-16 14:02:56', 2, 21),
(225, 'Data structure and HCI', 'ghjy', 13, 'SWE245', 12, 4, '2024-01-16 14:03:32', '2024-04-08 08:26:32', 2, 21),
(228, 'Principles of Management/ Principles of business Law', '', 2, 'LTM111', 11, 1, '2024-01-17 08:05:54', '2024-01-17 08:05:54', 1, 31),
(229, 'Mathematics and Quantitative technics', '', 7, 'LTM112', 11, 1, '2024-01-17 08:06:28', '2024-01-17 08:06:28', 1, 31),
(230, 'Introduction to Logistics Management / ICT for Logistics', '', 4, 'LTM113', 11, 1, '2024-01-17 08:08:02', '2024-01-17 08:08:02', 2, 31),
(231, 'Ancillary Professions', '', 6, 'LTM114', 11, 1, '2024-01-17 08:08:37', '2024-01-17 08:08:37', 2, 31),
(232, 'Shipping and International Trade/ Maritime Transport', '', 4, 'LTM115', 11, 1, '2024-01-17 08:09:10', '2024-01-17 08:09:10', 2, 31),
(233, 'Transport Law/ Carriage Law', '', 4, 'LTM116', 11, 1, '2024-01-17 08:09:50', '2024-01-17 08:09:50', 2, 31),
(234, 'Bilingual training I and economic environment I', '', 3, 'LTM117', 11, 1, '2024-01-17 08:10:27', '2024-01-17 08:10:27', 2, 31),
(235, 'Government Politics', '', 4, 'LTM121', 11, 4, '2024-01-17 08:11:21', '2024-01-17 08:11:21', 1, 31),
(236, 'Research Methodology', '', 5, 'LTM122', 11, 4, '2024-01-17 08:11:50', '2024-01-17 08:11:50', 1, 31),
(237, 'International Transport Management/ Safe Transport of Dangerous Goods', '', 4, 'LTM123', 11, 4, '2024-01-17 08:12:22', '2024-01-17 08:12:22', 2, 31),
(238, 'Warehouse Management/ Procurement and Inventory Management', '', 5, 'LTM124', 11, 4, '2024-01-17 08:13:01', '2024-01-17 08:13:01', 2, 31),
(239, 'Total Quality Management/ Maritime Administration I and II', '', 5, 'LTM125', 11, 4, '2024-01-17 08:13:47', '2024-01-17 08:13:47', 2, 31),
(240, 'Marine Insurance /Fundamentals of Cargo Insurance', '', 4, 'LTM126', 11, 4, '2024-01-17 08:14:18', '2024-01-17 08:14:18', 2, 31),
(241, 'Bilingual Training II and Economic Environment II', '', 3, 'LTM127', 11, 4, '2024-01-17 08:14:57', '2024-01-17 08:14:57', 3, 31),
(242, 'Project Management', '', 5, 'LTM231', 12, 1, '2024-01-17 08:17:25', '2024-01-17 08:17:25', 1, 31),
(243, 'Computer for Business I', '', 4, 'LTM232', 12, 1, '2024-01-17 08:19:46', '2024-01-17 08:19:46', 1, 31),
(244, 'Land and Inland Waterway Transport/ Air Transport', '', 6, 'LTM233', 12, 1, '2024-01-17 08:20:15', '2024-01-17 08:20:15', 2, 31),
(245, 'Carriage of goods by sea / Port Management operation', '', 4, 'LTM234', 12, 1, '2024-01-17 08:24:19', '2024-01-17 08:24:19', 2, 31),
(246, 'Environmental Management', '', 3, 'LTM235', 12, 1, '2024-01-17 08:24:56', '2024-01-17 08:24:56', 2, 31),
(247, 'Ship Finance/ Ship Chartering', '', 5, 'LTM236', 12, 1, '2024-01-17 08:26:39', '2024-01-17 08:26:39', 2, 31),
(248, 'Civics and Ethics/The legal environment and the creation of business', '', 3, 'LTM237', 12, 1, '2024-01-17 08:27:25', '2024-01-17 08:27:25', 3, 31),
(249, 'Computer for Business II', '', 4, 'LTM241', 12, 4, '2024-01-17 08:28:09', '2024-01-17 08:28:09', 1, 31),
(250, 'International Commercial Law/ Strategic Management', '', 5, 'LTM242', 12, 4, '2024-01-17 08:28:49', '2024-01-17 08:28:49', 1, 31),
(252, 'Introduction to Oil and Gas/ Safety and Security in Shipping', '', 5, 'LTM245', 12, 4, '2024-01-17 08:35:18', '2024-01-17 08:35:18', 2, 31),
(254, 'Business Communication', 'klkn', 8, 'LTM247', 12, 4, '2024-01-17 08:36:28', '2024-04-08 08:45:54', 3, 31),
(274, 'Droit Civil et Droit du Travail', 'klklk', 3, 'CGE118', 11, 1, '2024-04-05 13:08:17', '2024-04-05 13:08:17', 3, 20),
(278, 'Environement Economique et Juridque I', 'oui', 6, 'TLO351', 19, 1, '2024-05-27 07:35:12', '2024-05-27 07:35:12', 2, 48),
(279, 'Environement Economique et Juridique II', 'jkl', 4, 'TLO352', 19, 1, '2024-05-27 07:37:14', '2024-05-27 07:37:14', 1, 48),
(281, 'Chaine de Transport et Developpement Durable I', 'KLKLK', 6, 'TLO353', 19, 1, '2024-05-27 07:42:14', '2024-05-27 07:42:14', 2, 48),
(282, 'Chaine de Transport et Developpement Durable II', 'adkl', 3, 'TLO354', 19, 1, '2024-05-27 07:43:44', '2024-05-27 07:43:44', 2, 48),
(283, 'Logistique Industrielle', 'adflkj', 4, 'TLO355', 19, 1, '2024-05-27 07:44:44', '2024-05-27 07:47:41', 2, 48),
(284, 'Gestion de la chaine Logistique Globale I', 'ALDKF', 4, 'TLO356', 19, 1, '2024-05-27 07:45:51', '2024-05-27 07:45:51', 2, 48),
(285, 'Gestion de la chaine Logistique Globale II', 'ajdfa', 3, 'TLO357', 19, 1, '2024-05-27 07:46:40', '2024-05-27 07:46:40', 2, 48),
(286, 'Comptabilite', 'ALDFJS;FK', 6, 'FIC351', 19, 1, '2024-05-28 08:19:26', '2024-05-28 08:19:26', 2, 46),
(287, 'Controle de Gestion I', 'asdfalklklllkjj', 6, 'FIC352', 19, 1, '2024-05-28 08:20:32', '2024-05-28 08:20:32', 2, 46),
(288, 'Controle de Gestion II', 'adfilijk', 4, 'FIC353', 19, 1, '2024-05-28 08:21:28', '2024-05-28 08:21:28', 2, 46),
(289, 'Finance I', 'afjliu', 6, 'FIC354', 19, 1, '2024-05-28 08:22:05', '2024-05-28 08:22:05', 2, 46),
(290, 'Communication', 'ALDFAIIL', 4, 'FIC355', 19, 1, '2024-05-28 08:22:43', '2024-05-28 08:22:43', 2, 46),
(291, 'Environnement de L\'entreprise', 'ASDFJIOUI', 4, 'FIC356', 19, 1, '2024-05-28 08:23:47', '2024-05-28 08:23:47', 2, 46),
(292, 'Environnement Economique et Social', 'asdfkkl', 8, 'GRH351', 19, 1, '2024-05-28 10:33:43', '2024-05-28 10:33:43', 2, 47),
(293, 'Gestion des Emplois et Valorisation des RH', 'adfjakdjfk', 6, 'GRH352', 19, 1, '2024-05-28 10:35:46', '2024-05-28 10:35:46', 2, 47),
(294, 'Techniques de Gestion des RH', 'ALSDKFAK', 9, 'GRH353', 19, 1, '2024-05-28 10:36:36', '2024-05-28 10:36:36', 2, 47),
(295, 'Outils de Gestion des Ressources Humaines', 'ADFLAKJK', 7, 'GRH354', 19, 1, '2024-05-28 10:38:07', '2024-05-28 10:38:07', 2, 47),
(296, 'Finance II', 'LKJLK', 6, 'FIC361', 19, 4, '2024-06-04 10:05:42', '2024-06-04 10:05:42', 2, 46),
(297, 'Finance III', 'KJKJ', 6, 'FIC362', 19, 4, '2024-06-04 10:06:24', '2024-06-04 10:06:24', 2, 46),
(298, 'Communication', 'KJK', 4, 'GRH362', 19, 4, '2024-06-04 10:13:45', '2024-06-04 10:13:45', 2, 47),
(299, 'Management et Communication II', 'KJKJK', 4, 'TLO364', 19, 4, '2024-06-04 10:23:06', '2024-06-04 10:23:06', 2, 48),
(309, 'Stage Professionnelle', 'KJKJ', 6, 'IGL246', 12, 4, '2024-06-11 16:04:50', '2024-06-11 16:04:50', 2, 18),
(310, 'Stage Professionnelle', 'koo', 6, 'AMA246', 12, 4, '2024-06-11 16:15:59', '2024-06-11 16:15:59', 2, 24),
(311, 'Stage Professionnelle', 'JHJH', 6, 'BQF246', 12, 4, '2024-06-11 16:24:11', '2024-06-11 16:24:11', 2, 19),
(312, 'Stage Professionnelle', 'KJJKJ', 6, 'CGE246', 12, 4, '2024-06-11 16:32:08', '2024-06-11 16:32:08', 2, 20),
(313, 'Stage Professionnelle', 'JHJ', 6, 'GLT246', 12, 4, '2024-06-11 16:39:28', '2024-06-11 16:39:28', 2, 27),
(314, 'Ship Representation', 'kjjkj', 2, 'LTM248', 12, 4, '2024-06-12 08:04:19', '2024-06-12 08:11:07', 3, 31),
(315, 'Internship/Thesis Defense', 'klk', 5, 'LTM246', 12, 4, '2024-06-12 08:10:08', '2024-06-12 08:10:08', 2, 31),
(316, 'Internship', 'jhjh', 6, 'SWE246', 12, 4, '2024-06-12 08:44:12', '2024-06-12 08:44:12', 2, 21),
(317, 'Entreprenariat', 'ALSDFKJ', 4, 'FIC363', 19, 4, '2024-06-20 09:36:14', '2024-06-20 09:36:14', 2, 46),
(318, 'Entreprenariat', 'ALDFKJ', 4, 'GRH363', 19, 4, '2024-06-20 09:37:09', '2024-06-20 09:37:09', 2, 47),
(319, 'Pratique Professionnelle I', 'LAKDFJ', 6, 'TLO365', 19, 4, '2024-06-20 09:38:19', '2024-06-20 09:38:19', 2, 48),
(320, 'Les Outils de Gestion de la Logistique II', 'ALKDFJ', 4, 'TLO362', 19, 4, '2024-06-20 10:15:39', '2024-06-20 10:15:39', 2, 48),
(321, 'Management Environnement Juridique', 'adlfkl', 8, 'GRH361', 19, 4, '2024-06-20 10:25:10', '2024-06-20 10:25:10', 2, 47),
(322, 'Enterprise creation and Civics & Moral Education', 'JKJKJ', 6, 'SWE128', 11, 4, '2024-07-01 08:35:01', '2024-07-01 09:21:24', 3, 21),
(323, 'Création d\'entreprise et Education Civque et Ethique', 'KLKL', 6, 'IGL128', 11, 4, '2024-07-01 09:25:25', '2024-07-01 09:25:25', 3, 18),
(324, 'Création d\'entreprise et Education Civque et Ethique', 'KLKLK', 5, 'CGE128', 11, 4, '2024-07-01 12:02:37', '2024-07-01 12:02:37', 3, 20),
(325, 'Création d\'entreprise et Education Civque et Ethique', 'KLKALD', 5, 'DOT128', 11, 4, '2024-07-01 12:38:17', '2024-07-01 12:38:17', 3, 26),
(326, 'Création d\'entreprise et Education Civque et Ethique', 'ASDFKJLK', 5, 'BQF128', 11, 4, '2024-07-01 13:15:45', '2024-07-01 13:15:45', 3, 19),
(327, 'Les Outils de Gestion de la Logistique I', 'JKJKJ', 3, 'TLO361', 19, 4, '2024-08-06 10:00:27', '2024-08-06 10:00:27', 2, 48),
(328, 'Management et Communication I', 'jkjkj', 3, 'TLO363', 19, 4, '2024-08-06 10:02:24', '2024-08-06 10:02:24', 2, 48),
(329, 'Pratique Professionnelle', 'lklilji', 14, 'GRH364', 19, 4, '2024-08-06 10:29:16', '2024-08-06 10:29:16', 2, 47),
(330, 'Projet de Synthèse Professionnelle', 'ALDIFL', 6, 'FIC364', 19, 4, '2024-08-06 10:51:20', '2024-08-06 10:51:20', 2, 46);

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
(1, 'Wisknowl Tabi', 'wisknowltabi123@gmail.com', NULL, '$2y$12$3mIHrYrZwRDHPozEwk2jV.fdF1Sbe858dElz2TovMiCeLa08B2KOq', 'Ux9EapPPiarUGDz0r4pcWGHu3yQMV3QKrVV9V90reaDNDYC3wUfhR9elZz7G', '2023-11-22 17:38:28', '2023-11-22 17:38:28'),
(2, 'Vector', 'wisknowltabi1234@gmail.com', NULL, '$2y$12$KbH2w2M/hTCyWi2DE85hEO23RMBhf6ZVH4XDW9h7Ti/AsOPx2uT0W', NULL, '2024-02-14 20:36:01', '2024-02-14 20:36:01'),
(8, 'Administrateur', 'admin@example.com', NULL, '$2y$12$WUkwcDJ3ttRyhXIaUKsz1OAUYv1aEd8BtO.1i4Poxa1u0pcSYWl16', NULL, '2024-06-21 20:09:18', '2024-06-21 20:09:18'),
(10, 'Zunita', 'zunita@example.com', NULL, '$2y$12$8vkx9gBN8rEa5qPbMcilwu3TSrBv5Ne7oHOFY4Aw.4jVzFZvQ5Gdu', NULL, '2024-06-21 21:10:25', '2024-06-21 21:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_level_id_foreign` (`level_id`),
  ADD KEY `courses_semester_id_foreign` (`semester_id`),
  ADD KEY `courses_ue_id_foreign` (`ue_id`);

--
-- Indexes for table `course_natures`
--
ALTER TABLE `course_natures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_students_student_id_foreign` (`student_id`),
  ADD KEY `course_students_course_id_foreign` (`course_id`);

--
-- Indexes for table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cycle_levels`
--
ALTER TABLE `cycle_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cycle_levels_cycle_id_foreign` (`cycle_id`),
  ADD KEY `cycle_levels_level_id_foreign` (`level_id`);

--
-- Indexes for table `facturations`
--
ALTER TABLE `facturations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facturations_reference_id_unique` (`reference_id`),
  ADD KEY `facturations_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_semesters`
--
ALTER TABLE `level_semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_semesters_level_id_foreign` (`level_id`),
  ADD KEY `level_semesters_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `papers_level_id_foreign` (`level_id`),
  ADD KEY `papers_semester_id_foreign` (`semester_id`),
  ADD KEY `papers_specialty_id_foreign` (`specialty_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialties_code_unique` (`code`);

--
-- Indexes for table `specialty_levels`
--
ALTER TABLE `specialty_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialty_levels_specialty_id_foreign` (`specialty_id`),
  ADD KEY `specialty_levels_level_id_foreign` (`level_id`);

--
-- Indexes for table `specialty_tranches`
--
ALTER TABLE `specialty_tranches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `composite_unique_key` (`specialty_id`,`tranche_id`,`period`,`level_id`),
  ADD KEY `specialty_tranches_tranche_id_foreign` (`tranche_id`);

--
-- Indexes for table `specialty_ues`
--
ALTER TABLE `specialty_ues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialty_ues_specialty_id_foreign` (`specialty_id`),
  ADD KEY `specialty_ues_ue_id_foreign` (`ue_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_specialty_id_foreign` (`specialty_id`);

--
-- Indexes for table `student_levels`
--
ALTER TABLE `student_levels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_levels_student_id_foreign` (`student_id`),
  ADD KEY `student_levels_level_id_foreign` (`level_id`);

--
-- Indexes for table `student_papers`
--
ALTER TABLE `student_papers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_papers_student_id_foreign` (`student_id`),
  ADD KEY `student_papers_paper_id_foreign` (`paper_id`);

--
-- Indexes for table `student_ues`
--
ALTER TABLE `student_ues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_ues_student_id_foreign` (`student_id`),
  ADD KEY `student_ues_ue_id_foreign` (`ue_id`);

--
-- Indexes for table `tranches`
--
ALTER TABLE `tranches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ue_courses`
--
ALTER TABLE `ue_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ue_courses_course_id_foreign` (`course_id`),
  ADD KEY `ue_courses_ue_id_foreign` (`ue_id`);

--
-- Indexes for table `unite_enseignements`
--
ALTER TABLE `unite_enseignements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unite_enseignements_level_id_foreign` (`level_id`),
  ADD KEY `unite_enseignements_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_has_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=586;

--
-- AUTO_INCREMENT for table `course_natures`
--
ALTER TABLE `course_natures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_students`
--
ALTER TABLE `course_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2663;

--
-- AUTO_INCREMENT for table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cycle_levels`
--
ALTER TABLE `cycle_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facturations`
--
ALTER TABLE `facturations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `level_semesters`
--
ALTER TABLE `level_semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `specialty_levels`
--
ALTER TABLE `specialty_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `specialty_tranches`
--
ALTER TABLE `specialty_tranches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `specialty_ues`
--
ALTER TABLE `specialty_ues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `student_levels`
--
ALTER TABLE `student_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `student_papers`
--
ALTER TABLE `student_papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `student_ues`
--
ALTER TABLE `student_ues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1341;

--
-- AUTO_INCREMENT for table `tranches`
--
ALTER TABLE `tranches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ue_courses`
--
ALTER TABLE `ue_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unite_enseignements`
--
ALTER TABLE `unite_enseignements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_ue_id_foreign` FOREIGN KEY (`ue_id`) REFERENCES `unite_enseignements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `course_students_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cycle_levels`
--
ALTER TABLE `cycle_levels`
  ADD CONSTRAINT `cycle_levels_cycle_id_foreign` FOREIGN KEY (`cycle_id`) REFERENCES `cycles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cycle_levels_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `facturations`
--
ALTER TABLE `facturations`
  ADD CONSTRAINT `facturations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `level_semesters`
--
ALTER TABLE `level_semesters`
  ADD CONSTRAINT `level_semesters_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `level_semesters_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `papers_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `papers_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialty_levels`
--
ALTER TABLE `specialty_levels`
  ADD CONSTRAINT `specialty_levels_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialty_levels_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialty_tranches`
--
ALTER TABLE `specialty_tranches`
  ADD CONSTRAINT `specialty_tranches_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialty_tranches_tranche_id_foreign` FOREIGN KEY (`tranche_id`) REFERENCES `tranches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialty_ues`
--
ALTER TABLE `specialty_ues`
  ADD CONSTRAINT `specialty_ues_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialty_ues_ue_id_foreign` FOREIGN KEY (`ue_id`) REFERENCES `unite_enseignements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_specialty_id_foreign` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`);

--
-- Constraints for table `student_levels`
--
ALTER TABLE `student_levels`
  ADD CONSTRAINT `student_levels_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_levels_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_papers`
--
ALTER TABLE `student_papers`
  ADD CONSTRAINT `student_papers_paper_id_foreign` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_papers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_ues`
--
ALTER TABLE `student_ues`
  ADD CONSTRAINT `student_ues_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_ues_ue_id_foreign` FOREIGN KEY (`ue_id`) REFERENCES `unite_enseignements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ue_courses`
--
ALTER TABLE `ue_courses`
  ADD CONSTRAINT `ue_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ue_courses_ue_id_foreign` FOREIGN KEY (`ue_id`) REFERENCES `unite_enseignements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unite_enseignements`
--
ALTER TABLE `unite_enseignements`
  ADD CONSTRAINT `unite_enseignements_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `unite_enseignements_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
