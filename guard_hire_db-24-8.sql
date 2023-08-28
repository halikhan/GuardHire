-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 08:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guard_hire`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_vendors`
--

CREATE TABLE `about_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutvendor` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reviews` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stoplight` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_vendors`
--

INSERT INTO `about_vendors` (`id`, `user_id`, `aboutvendor`, `slug`, `reviews`, `stoplight`, `image`, `image2`, `status`, `created_at`, `updated_at`) VALUES
(8, '23', '<p>n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availablen publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availablen publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availablen publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>', 'rishik', 'Lorem ipsum !', NULL, NULL, '', '1', '2022-10-28 16:17:26', '2022-11-01 16:57:28'),
(9, '13', '<p>n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availab</p>', NULL, 'point of  view', NULL, NULL, '', '1', '2022-10-31 16:29:32', '2022-10-31 16:29:32'),
(10, '11', '<p>n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availabn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availab</p>', NULL, 'Ut aperiam deserunt', NULL, NULL, '', '1', '2022-10-31 16:30:24', '2022-10-31 16:30:24'),
(11, '57', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', NULL, 'Testing', NULL, NULL, '', '1', '2022-11-02 12:00:13', '2022-11-03 13:48:23'),
(12, '56', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', NULL, 'Ab dolorum veniam a', NULL, NULL, '', '1', '2022-11-02 12:12:05', '2022-11-02 12:21:28'),
(13, '61', '<p>sadsa</p>', NULL, 'wsedsae', NULL, NULL, '', '1', '2022-11-03 14:19:36', '2022-11-03 14:19:36'),
(15, '66', '<p>wewqadwe</p>', NULL, 'sads', NULL, NULL, '', '1', '2022-11-03 15:07:28', '2022-11-03 15:07:28'),
(16, '65', '<p>dsadsa</p>', NULL, 'dsa', NULL, NULL, '', '1', '2022-11-03 17:23:18', '2022-11-03 17:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_two` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `groom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_two` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `groom`, `bride`, `slug`, `content`, `content_two`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Who Else Wants To Be Successful With Business', 'Julie Williams', 'Who Else-Wants To Be', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'groupSecurityFive.png', '1', '2022-06-09 01:09:54', '2023-03-13 17:49:14'),
(2, 'Neighborhood Service Center Director', 'Julie Williams', 'Neighborhood-Service ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'groupSecurityFive.png', '1', '2022-06-09 01:11:32', '2023-03-10 10:25:04'),
(3, 'Certified Abuse and Drug Addiction Counselor', 'Hellen', 'Certified-Abuse ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'guardNine.jpg', '1', '2022-06-09 01:12:21', '2023-03-10 10:25:22'),
(4, 'Excepteur sint occaecat', 'Seriena Taylor', 'Excepteur-sint occaecat', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'guardFour.jpg', '1', '2022-06-10 01:38:41', '2023-03-10 10:25:35'),
(5, 'Service Center Director', 'Sophia.', 'Service-Center', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'groupSecurityFive.png', '1', '2022-06-10 01:40:03', '2023-03-07 11:08:02'),
(6, 'Drug Addiction Counselor Alex Carry', 'Emma watson', 'Drug-Addiction ', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'guardThree.jfif', '1', '2022-06-10 01:40:48', '2023-03-10 10:25:44'),
(12, 'Successful With Business', 'Edward Hernandez', 'Successful-With', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'guardSix.jpg', '1', '2022-07-15 10:24:13', '2023-03-10 10:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `book_vendors`
--

CREATE TABLE `book_vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `wedding_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_vendors`
--

INSERT INTO `book_vendors` (`id`, `user_id`, `wedding_id`, `vendor_id`, `service`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 5, '1', '2022-10-19 18:41:58', '2022-10-25 19:24:33'),
(2, 4, 2, 5, '1', '2022-10-19 18:46:10', '2022-10-25 19:08:30'),
(3, 4, 3, 5, '1', '2022-10-24 13:29:28', '2022-10-25 19:25:20'),
(4, 4, 4, 5, '1', '2022-10-24 15:58:49', '2022-10-24 15:58:49'),
(5, 4, 5, 9, '1', '2022-10-24 15:59:35', '2022-10-25 19:06:36'),
(6, 4, 11, 9, '1', '2022-10-25 19:05:42', '2022-10-25 19:05:42'),
(7, 4, 12, 11, '1', '2022-10-25 19:07:43', '2022-10-25 19:07:43'),
(8, 4, 32, 11, '1', '2022-10-26 16:55:16', '2022-10-26 17:34:59'),
(9, 4, 33, 5, '1', '2022-10-26 17:36:06', '2022-10-26 17:43:15'),
(10, 14, 36, 11, NULL, '2022-10-28 18:06:20', '2022-10-28 18:06:45'),
(11, 21, 37, 11, NULL, '2022-10-28 18:07:39', '2022-10-28 18:07:39'),
(12, 4, 39, 11, NULL, '2022-10-28 18:15:44', '2022-10-28 18:15:44'),
(13, 15, 45, 57, NULL, '2022-11-02 13:49:12', '2022-11-02 13:49:12'),
(14, 21, 46, 11, NULL, '2022-11-02 13:50:37', '2022-11-02 13:50:37'),
(15, 21, 47, 57, NULL, '2022-11-02 15:39:08', '2022-11-02 15:39:08'),
(16, 15, 48, 57, NULL, '2022-11-02 15:49:00', '2022-11-02 15:49:00'),
(17, 24, 49, 11, NULL, '2022-11-02 16:00:46', '2022-11-02 16:00:46'),
(18, 36, 50, 11, NULL, '2022-11-02 16:14:16', '2022-11-02 16:14:16'),
(19, 16, 51, 57, NULL, '2022-11-02 16:33:26', '2022-11-02 16:33:26'),
(20, 58, 52, 57, NULL, '2022-11-02 16:34:07', '2022-11-02 16:34:07'),
(21, 22, 53, 11, NULL, '2022-11-02 16:34:27', '2022-11-02 16:34:27'),
(22, 4, 54, 11, NULL, '2022-11-03 14:03:49', '2022-11-03 14:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
('0530b7b9-6051-4c30-8c96-93b5581e6d57', 3, 2, '2023-06-01 13:18:05', '2023-06-01 13:18:05'),
('0f092c2a-5ced-4b3f-8b71-719e04223ea8', 4, 3, '2023-03-17 17:24:48', '2023-03-17 17:24:48'),
('5433faa9-d62d-493f-8ee7-d6482c9504a2', 3, 4, '2023-03-17 17:21:21', '2023-03-17 17:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('28c5992c-f3c5-4add-a9fe-c1c6b157fe29', 3, 4, 'heloo', NULL, 1, '2023-03-17 17:21:13', '2023-03-17 17:22:08'),
('53a60c83-3643-4927-ba66-5b7d1b583f3f', 4, 3, 'hi', NULL, 1, '2023-08-22 05:56:51', '2023-08-23 07:15:16'),
('7936a4fe-884d-4ed6-8457-05c7aee089cf', 4, 3, 'whats going on?&gt;', NULL, 1, '2023-06-02 06:11:36', '2023-06-02 06:11:37'),
('831a5555-970c-498c-9752-f539e2c97c8b', 3, 4, 'hiu\\', NULL, 1, '2023-04-10 16:59:43', '2023-06-01 13:35:53'),
('8826e268-16ba-44f6-ace5-53d8896807cc', 3, 4, 'hi', NULL, 1, '2023-08-23 07:15:20', '2023-08-23 07:15:55'),
('947297ab-770c-4a97-b4f1-3be12dc53d4b', 3, 4, 'Hello', NULL, 1, '2023-08-23 07:15:27', '2023-08-23 07:15:55'),
('9c51f352-204e-4cca-8299-2a800dee07fa', 4, 3, '😝', NULL, 1, '2023-03-17 17:24:16', '2023-03-17 17:24:17'),
('a47a15a1-3d82-4c6a-9d9f-cd47f22ead13', 3, 2, 'Hi', NULL, 1, '2023-06-02 07:04:12', '2023-07-31 14:25:40'),
('b144dde5-d369-4528-ac7b-7fd4ebc1f866', 4, 3, 'Hello!', NULL, 1, '2023-06-02 07:03:41', '2023-06-02 12:10:56'),
('b9735975-2ff5-4f7e-ba31-e9e9bff6fe87', 4, 3, 'hi', NULL, 1, '2023-03-21 18:13:12', '2023-03-27 14:16:01'),
('ca879a57-8e29-4675-8855-8b41000ab699', 3, 4, 'khamosh cheh\r\nra', NULL, 1, '2023-06-02 06:12:57', '2023-06-02 06:12:58'),
('d19fcce3-1694-41fe-b477-2ff033ec5a96', 4, 3, 'Hi', NULL, 1, '2023-06-02 06:11:28', '2023-06-02 06:11:29'),
('dbe10981-51a4-4c46-ae7b-e7ffc8482804', 3, 4, 'hello', NULL, 1, '2023-03-17 17:29:22', '2023-03-17 17:29:37'),
('e39a37bb-3b16-4354-8b3c-d33bc3c962cd', 4, 3, 'whats goin on!', NULL, 1, '2023-06-05 15:09:03', '2023-08-22 05:55:08'),
('e6f64884-5451-4fe7-9aac-2909500c93ee', 3, 4, 'Hello', NULL, 1, '2023-08-22 05:55:30', '2023-08-22 05:56:42'),
('ee2f69d5-2196-4759-8cc4-c3ac05fdc591', 4, 3, 'thanks', NULL, 1, '2023-06-05 15:09:20', '2023-08-22 05:55:08'),
('eecd27ca-acfc-4f4b-92b3-5fe94ed1e029', 3, 4, 'Hi]', NULL, 1, '2023-06-02 06:11:18', '2023-06-02 06:11:19'),
('fd14e52a-d6ed-46a0-89c5-e3ef71407248', 4, 3, '?', NULL, 1, '2023-03-17 17:20:27', '2023-03-17 17:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `client_hired_companies`
--

CREATE TABLE `client_hired_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_hired_companies`
--

INSERT INTO `client_hired_companies` (`id`, `client_id`, `company_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 4, 3, 1, '2023-07-31 06:43:15', '2023-07-31 06:43:15'),
(12, 4, 28, 1, '2023-07-31 06:43:37', '2023-07-31 06:43:37'),
(13, 4, 31, 1, '2023-07-31 07:14:05', '2023-07-31 07:14:05'),
(16, 4, 6, 1, '2023-07-31 07:56:28', '2023-07-31 07:56:28'),
(17, 2, 3, 1, '2023-07-31 11:08:45', '2023-07-31 11:08:45'),
(18, 2, 6, 1, '2023-07-31 13:47:04', '2023-07-31 13:47:04'),
(19, 2, 32, 1, '2023-07-31 13:47:43', '2023-07-31 13:47:43'),
(20, 2, 5, 1, '2023-07-31 13:54:45', '2023-07-31 13:54:45'),
(21, 2, 20, 1, '2023-07-31 13:55:34', '2023-07-31 13:55:34'),
(22, 2, 21, 1, '2023-07-31 14:00:45', '2023-07-31 14:00:45'),
(23, 4, 5, 1, '2023-08-01 05:41:24', '2023-08-01 05:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `client_hired_listing_services`
--

CREATE TABLE `client_hired_listing_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `guard_id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_hired_listing_services`
--

INSERT INTO `client_hired_listing_services` (`id`, `client_id`, `guard_id`, `listing_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 3, 24, 1, '2023-07-07 10:49:45', '2023-07-07 10:49:45'),
(7, 4, 3, 25, 1, '2023-07-27 07:23:05', '2023-07-27 07:23:05'),
(8, 4, 3, 23, 1, '2023-07-27 07:41:31', '2023-07-27 07:41:31'),
(21, 4, 3, 12, 1, '2023-07-27 12:22:02', '2023-07-27 12:22:02'),
(22, 4, 3, 22, 1, '2023-07-27 12:31:29', '2023-07-27 12:31:29'),
(24, 4, 3, 26, 1, '2023-07-27 12:39:47', '2023-07-27 12:39:47'),
(30, 4, 3, 25, 1, '2023-07-27 13:10:02', '2023-07-27 13:10:02'),
(31, 4, 3, 27, 1, '2023-07-27 13:15:52', '2023-07-27 13:15:52'),
(32, 4, 3, 22, 1, '2023-07-31 10:03:54', '2023-07-31 10:03:54'),
(33, 4, 3, 22, 1, '2023-07-31 10:04:08', '2023-07-31 10:04:08'),
(34, 4, 3, 22, 1, '2023-07-31 10:09:05', '2023-07-31 10:09:05'),
(35, 4, 3, 12, 1, '2023-07-31 10:09:41', '2023-07-31 10:09:41'),
(36, 4, 3, 20, 1, '2023-07-31 10:12:00', '2023-07-31 10:12:00'),
(37, 2, 3, 27, 1, '2023-07-31 11:45:00', '2023-07-31 11:45:00'),
(38, 2, 3, 25, 1, '2023-07-31 11:45:04', '2023-07-31 11:45:04'),
(39, 2, 3, 26, 1, '2023-07-31 11:47:10', '2023-07-31 11:47:10'),
(40, 2, 3, 12, 1, '2023-07-31 12:35:44', '2023-07-31 12:35:44'),
(41, 2, 3, 10, 1, '2023-07-31 13:09:32', '2023-07-31 13:09:32'),
(42, 2, 3, 12, 1, '2023-07-31 13:09:47', '2023-07-31 13:09:47'),
(43, 2, 3, 24, 1, '2023-07-31 13:37:38', '2023-07-31 13:37:38'),
(44, 2, 3, 24, 1, '2023-07-31 13:37:47', '2023-07-31 13:37:47'),
(45, 2, 3, 23, 1, '2023-07-31 13:43:49', '2023-07-31 13:43:49'),
(46, 2, 3, 23, 1, '2023-07-31 13:43:57', '2023-07-31 13:43:57'),
(47, 2, 3, 12, 1, '2023-07-31 13:44:48', '2023-07-31 13:44:48'),
(48, 2, 3, 22, 1, '2023-07-31 13:45:40', '2023-07-31 13:45:40'),
(49, 2, 3, 20, 1, '2023-07-31 14:02:21', '2023-07-31 14:02:21'),
(50, 2, 3, 1, 1, '2023-07-31 14:03:45', '2023-07-31 14:03:45'),
(51, 2, 3, 4, 1, '2023-07-31 14:25:29', '2023-07-31 14:25:29'),
(52, 2, 3, 8, 1, '2023-07-31 14:34:47', '2023-07-31 14:34:47'),
(53, 2, 7, 7, 1, '2023-07-31 14:35:26', '2023-07-31 14:35:26'),
(54, 2, 3, 12, 1, '2023-08-01 09:58:57', '2023-08-01 09:58:57'),
(55, 2, 3, 12, 1, '2023-08-01 10:02:01', '2023-08-01 10:02:01'),
(56, 2, 3, 12, 1, '2023-08-01 10:04:14', '2023-08-01 10:04:14'),
(57, 2, 3, 12, 1, '2023-08-01 10:05:53', '2023-08-01 10:05:53'),
(58, 3, 3, 1, 1, '2023-08-21 10:28:49', '2023-08-21 10:28:49'),
(59, 4, 3, 29, 1, '2023-08-23 13:28:59', '2023-08-23 13:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `client_post_jobs`
--

CREATE TABLE `client_post_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(119) DEFAULT NULL,
  `tags` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_hour_rate` decimal(8,2) DEFAULT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `featured_status` int(119) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_post_jobs`
--

INSERT INTO `client_post_jobs` (`id`, `user_id`, `tags`, `languages`, `services`, `job_type`, `job_duration`, `location`, `per_hour_rate`, `starting_date`, `ending_date`, `description`, `status`, `featured_status`, `created_at`, `updated_at`) VALUES
(1, 2, '[\"2\"]', NULL, '2', '1', '1 Month', '1', '21.00', '2023-04-11', '2023-04-21', 'Omnis labore delectu', '1', 0, '2023-04-10 16:09:21', '2023-07-27 08:53:36'),
(2, 4, '[\"4\",\"3\"]', '[\"5\"]', '1', '2', '1 Month', '3', '20.00', '2023-04-13', '2023-04-15', 'One In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may!', '1', 0, '2023-04-12 18:06:47', '2023-07-27 10:34:17'),
(3, 4, '[\"3\",\"5\"]', '[\"1\"]', '10', '2', '2 Month', '3', '3.00', '2023-04-13', '2023-04-22', 'Two In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may!', '1', 0, '2023-04-12 18:14:42', '2023-07-27 10:34:05'),
(4, 4, '[\"4\",\"3\"]', '[\"2\"]', '13', '1', '3 Month', '1', '20.00', '2023-04-13', '2023-04-29', 'Latest One In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may!', '1', 0, '2023-04-12 18:25:44', '2023-07-27 10:33:50'),
(5, 4, '[\"3\"]', '[\"1\"]', '8', '3', '12 Month', '2', '23.00', '2023-05-29', '2023-05-29', 'Hello World!', '1', 0, '2023-05-29 10:09:23', '2023-07-27 12:38:50'),
(6, 4, '[\"3\"]', '[\"5\"]', '1', '3', 'onetime', '13', '42.00', '2023-07-10', NULL, 'Hallll', '1', 0, '2023-07-10 13:57:01', '2023-08-22 10:37:07'),
(7, 4, '[\"3\"]', '[\"2\"]', '2', '2', NULL, '14', NULL, '2023-08-22', NULL, 'hi', '1', 0, '2023-08-22 10:42:14', '2023-08-22 10:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `client_rating_by_guards`
--

CREATE TABLE `client_rating_by_guards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `guard_id` int(11) DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_rating_by_guards`
--

INSERT INTO `client_rating_by_guards` (`id`, `client_id`, `guard_id`, `rate`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2', 'Hello', 1, '2023-08-23 09:54:33', '2023-08-23 09:54:33'),
(2, 4, 3, '5', 'Nice', 1, '2023-08-23 09:56:41', '2023-08-23 09:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `page`, `section_name`, `title`, `slug`, `title1`, `title2`, `title3`, `title4`, `content`, `description2`, `description3`, `image2`, `image`, `pdf`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'section-one', 'Need a', 'section-one', 'Security Guard', 'for your event,', 'business or Residential Complex', 'Consider your security by giving our guard’s a call in the, Guard Hire. We provide the best personal to make sure you and your belongings stay safe', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:20:57', '2023-03-13 13:08:07'),
(2, '1', 'section-two', 'Categories', 'section-two', 'Categories', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:24:56', '2023-03-06 13:24:56'),
(3, '1', 'section-three', 'How It Works', 'section-three', 'How It Works', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:25:17', '2023-03-06 13:25:17'),
(4, '1', 'section-four', 'Hire Guards Fast', 'section-four', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:25:41', '2023-03-06 13:25:41'),
(5, '1', 'section-five', 'Our Pricing and Packages', 'section-five', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:26:13', '2023-06-21 08:14:19'),
(6, '1', 'section-six', 'Featured Security Requests', 'section-six', 'Featured Security Requests', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:26:40', '2023-03-06 13:26:40'),
(7, '1', 'section-seven', 'Join Now & Start Working', 'section-seven', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:29:47', '2023-03-10 17:06:32'),
(8, '1', 'section-eight', 'Featured Security Companies', 'section-eight', 'Featured Security Companies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:30:42', '2023-03-06 13:30:42'),
(9, '1', 'section-nine', 'Blog', 'section-nine', 'Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 13:31:01', '2023-06-21 08:10:09'),
(10, '2', 'section-howitworks', 'How It Works', 'section-howitworks', 'Welcome to GuardHire', 'General', NULL, NULL, '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 14:11:58', '2023-08-23 08:19:50'),
(11, '3', 'section-BrowseServices', 'Browse Services', 'section-BrowseServices', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 14:15:43', '2023-03-06 14:15:43'),
(12, '4', 'section-BrowseQuotes', 'Browse Requests', 'section-BrowseQuotes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 14:17:37', '2023-07-10 08:25:30'),
(13, '5', 'section-BrowseCompanies', 'Browse Companies', 'section-BrowseCompanies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 14:19:49', '2023-03-06 14:19:49'),
(14, '6', 'section-blogs', 'Blog', 'section-blogs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 14:23:07', '2023-07-10 08:27:30'),
(15, '1', 'section-howitworks-quotes', 'Post Quotes Now', 'section-howitworks-quotes', 'Request Quotes Quickly from  Vetted Security Companies', 'Hire Guards Now', 'Search and Hire Guards On Deman and Online', 'Get Hired Now', '<p>Get Hired Quickly as Guard and Get Paid</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, NULL, NULL, NULL, NULL, '1', '2023-03-06 18:28:41', '2023-03-06 18:28:41'),
(16, '7', 'bodyguard', 'Body Guard Event', 'body-guard-event', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-13 10:59:31', '2023-03-13 13:17:25'),
(17, '8', 'company', 'Company 01', 'Company 01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-13 10:59:59', '2023-03-13 10:59:59'),
(18, '9', 'Group-security', 'Group Security', 'Group-security', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-03-13 11:00:29', '2023-03-13 11:00:29'),
(19, '2', 'Names of Faqs', 'General', 'client', 'Client', 'Guard', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2023-07-25 10:00:36', '2023-07-25 10:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `company_ratings`
--

CREATE TABLE `company_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `guard_id` int(11) DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_ratings`
--

INSERT INTO `company_ratings` (`id`, `client_id`, `guard_id`, `rate`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '5', 'This is for admin!', 1, '2023-07-31 10:31:44', '2023-07-31 10:31:44'),
(2, 2, 3, '3', 'Very Impressive!', 1, '2023-07-31 11:09:26', '2023-07-31 11:09:26'),
(3, 2, 32, '5', 'Besst', 1, '2023-07-31 13:48:14', '2023-07-31 13:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `company_wishlists`
--

CREATE TABLE `company_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `guard_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_wishlists`
--

INSERT INTO `company_wishlists` (`id`, `user_id`, `guard_id`, `status`, `created_at`, `updated_at`) VALUES
(12, 4, 31, 0, '2023-07-31 06:45:51', '2023-07-31 06:45:51'),
(13, 4, 6, 0, '2023-07-31 07:44:00', '2023-07-31 07:56:28'),
(14, 2, 3, 0, '2023-07-31 11:06:06', '2023-07-31 11:08:45'),
(15, 2, 32, 0, '2023-07-31 13:47:30', '2023-07-31 13:47:43'),
(16, 4, 3, 0, '2023-08-01 05:43:21', '2023-08-01 05:43:33'),
(17, 4, 5, 0, '2023-08-01 05:45:20', '2023-08-23 11:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `configuration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `configuration`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'COPYRIGHTS ALL RIGHTS RESERVED 2023 BY GUARD HIRE', 'copyrights', '2022-06-09 00:05:29', '2023-03-06 15:03:34'),
(2, 'Lorem Ipsum is simply dummy text of the printing.', 'lorem-ipsu', '2023-03-10 18:45:16', '2023-03-10 18:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact_management`
--

CREATE TABLE `contact_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_management`
--

INSERT INTO `contact_management` (`id`, `title`, `slug`, `description`, `phone_number`, `email`, `location`, `created_at`, `updated_at`) VALUES
(2, 'Contact Us', 'contact-us', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit fugiat ipsa corrupti illo quaerat, sit totam mollitia eaqu</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '(121) 212-1221', 'example@Xyz.com', 'street 01, South Dakota, United state', '2022-06-10 01:24:34', '2023-03-27 16:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `engagements`
--

CREATE TABLE `engagements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ceremony` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_management`
--

CREATE TABLE `event_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_management`
--

INSERT INTO `event_management` (`id`, `title`, `slug`, `image`, `description`, `description2`, `location`, `event_date`, `event_time`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Party', 'wedding-party', 'event-img2.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque.</p>', NULL, 'XYZ Street, New York City, United States', '2022-06-10', '10:48:59 PM', '2022-06-10 03:28:20', '2022-07-07 02:16:49'),
(2, 'Engagement Party', 'engagement-party', 'event-img1.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque.</p>', NULL, '123 street, new york city, United state', '2022-06-13', '11:28:54 PM', '2022-06-10 03:29:38', '2022-07-07 02:17:08'),
(3, 'Party Venue', 'party-venue', 'event-img3.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque, laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. laudantium ad, minus minima, nesciunt fuga saepe consectetur dolore quas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis sequi impedit deleniti. Cum consequuntur quisquam placeat est libero quos eaque.</p>', NULL, '123 street, new york city, Unity state', '2022-06-16', '11:30:27 PM', '2022-06-10 03:31:15', '2022-07-07 02:18:52'),
(6, 'Lovers togheter', 'lovers-togheter', '1.jpg', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>\r\n\r\n<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', NULL, '19-Sep-1982', '2015-11-06', '13-Aug-1995', '2022-07-09 07:05:56', '2022-07-09 07:06:55'),
(7, 'Test Event', 'test-event', '7.jpg', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final</p>', NULL, 'Washington DC', '2022-11-12', '12:19', '2022-07-15 10:21:19', '2022-07-15 14:09:46');

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
-- Table structure for table `featured_clients`
--

CREATE TABLE `featured_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration` int(11) NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_hour_rate` decimal(10,2) NOT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_clients`
--

INSERT INTO `featured_clients` (`id`, `user_id`, `job_type`, `companyname`, `job_duration`, `location_id`, `per_hour_rate`, `services`, `tags`, `language`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 19, '2', 'Whitley and Ortiz Trading', 21, '4', '85.00', '15', '[\"4\"]', '[\"1\"]', 'Sint est aut volupta', '1', '2023-06-01 06:58:51', '2023-06-01 08:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `featured_guards`
--

CREATE TABLE `featured_guards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration` varchar(119) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_hour_rate` decimal(10,2) NOT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_guards`
--

INSERT INTO `featured_guards` (`id`, `user_id`, `job_type`, `companyname`, `job_duration`, `location_id`, `per_hour_rate`, `services`, `tags`, `language`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, '1', 'Adkins and Dillon Co', 'Laboris ut labore au', '16', '43.00', '8', '[\"2\"]', '[\"2\"]', 'Perspiciatis dolore', '1', '2023-05-31 14:20:09', '2023-06-01 08:10:30'),
(2, 18, '2', 'Saunders and Dodson Traders', '12', '26', '82.00', '4', '[\"3\",\"4\"]', '[\"1\",\"2\"]', 'Qui natus sed quasi', '1', '2023-06-01 06:57:24', '2023-06-01 06:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(119) DEFAULT NULL COMMENT '1=General, 2=Client, 3=Guard',
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `type`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(2, 1, 'A Place to Hire Guard for Event', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '2023-03-10 11:48:00', '2023-03-13 16:17:21'),
(3, 2, 'A Place to Hire Guard for Event school', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '2023-03-10 11:48:09', '2023-03-13 16:17:49'),
(4, 3, 'A Place to Hire Guard for Club', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '2023-03-10 11:50:07', '2023-03-13 16:18:38'),
(5, 1, 'A Place to Hire Guard for Security', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '2023-03-10 11:55:35', '2023-03-13 16:18:52'),
(6, 3, 'This is latest Questions?', '<p>Consider your security by giving our guard&rsquo;s a call in the, Guard Hire. We provide the best personal to make sure you and your belongings stay safe</p>', '2023-03-13 18:55:56', '2023-07-25 08:59:39'),
(8, 2, 'Client Question!', '<p>Testing&nbsp;</p>', '2023-07-25 09:00:37', '2023-07-25 09:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `guard_credit_points`
--

CREATE TABLE `guard_credit_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guard_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `client_job_id` int(11) DEFAULT NULL,
  `credit_points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guard_credit_points`
--

INSERT INTO `guard_credit_points` (`id`, `guard_id`, `client_id`, `client_job_id`, `credit_points`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 13, 5, '2023-05-26 11:38:55', '2023-05-26 11:38:55'),
(2, 3, 10, 5, 5, '2023-05-26 16:48:36', '2023-05-26 16:48:58'),
(22, 5, 4, 17, 5, '2023-05-30 06:53:25', '2023-05-30 06:53:25'),
(30, 3, 4, 14, 5, '2023-06-02 10:37:52', '2023-06-02 10:37:52'),
(32, 6, 2, 5, 5, '2023-06-02 13:06:49', '2023-06-02 13:06:49'),
(33, 6, 4, 13, 5, '2023-06-02 13:59:00', '2023-06-02 13:59:00'),
(34, 26, 4, 13, 5, '2023-06-05 08:29:42', '2023-06-05 08:29:42'),
(36, 3, 4, 6, 5, '2023-07-31 05:58:19', '2023-07-31 05:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `guard_jobs`
--

CREATE TABLE `guard_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(119) NOT NULL,
  `listing_points` int(119) NOT NULL DEFAULT 2,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(255) NOT NULL,
  `per_hour_rate` decimal(10,2) DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `featured_status` int(119) NOT NULL DEFAULT 0,
  `rating_status` int(119) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guard_jobs`
--

INSERT INTO `guard_jobs` (`id`, `user_id`, `listing_points`, `companyname`, `job_type`, `job_duration`, `location_id`, `per_hour_rate`, `services`, `description`, `image`, `tags`, `languages`, `status`, `featured_status`, `rating_status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'FC Region', '3', '15', 4, '60.00', '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"2\"]', '[\"2\"]', '1', 0, 1, '2023-03-15 18:31:01', '2023-06-21 08:24:51'),
(4, 3, 2, 'Kaufman Castaneda Co', '1', '2', 13, '22.00', '11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"3\",\"1\"]', '[\"4\",\"2\"]', '1', 0, 1, '2023-03-23 18:36:54', '2023-04-19 18:24:49'),
(6, 6, 2, 'FC Region', '2', '2', 1, '20.00', '7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"1\",\"2\"]', '[\"4\",\"2\"]', '1', 0, 0, '2023-03-28 17:25:28', '2023-05-30 08:40:05'),
(7, 7, 2, 'john smith', '1', '2', 1, '34.00', '11', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"4\",\"3\"]', '[\"4\",\"2\"]', '1', 0, 0, '2023-03-28 17:30:49', '2023-03-28 17:30:49'),
(8, 3, 2, 'Proofpoint', '1', '15', 3, '20.00', '4', 'lremLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.ipd=sum', NULL, '[\"1\",\"4\",\"2\"]', '[\"5\"]', '1', 0, 1, '2023-04-04 17:59:01', '2023-04-20 13:25:05'),
(9, 3, 2, 'secure', '1', '4', 6, '20.00', '1', 'ipsum', NULL, '[\"2\",\"4\"]', '[\"2\",\"5\"]', '1', 0, 1, '2023-04-05 14:47:20', '2023-04-19 17:38:12'),
(10, 3, 2, 'Proof hub', '1', '4', 2, '20.00', '10', 'our pics', NULL, '[\"3\"]', '[\"4\"]', '1', 0, 1, '2023-04-05 14:49:04', '2023-07-31 13:36:19'),
(11, 3, 2, 'Norman Plc', '1', '4', 12, '42.00', '13', 'Esse quidem duis sed', NULL, '[\"2\"]', '[\"4\"]', '1', 0, 0, '2023-04-05 15:36:10', '2023-04-05 15:36:10'),
(12, 3, 2, 'FC Region', '2', '2', 5, '20.00', '12', 'aaaa', NULL, '[\"3\"]', '[\"4\"]', '1', 0, 0, '2023-04-05 15:39:32', '2023-08-01 09:58:57'),
(13, 3, 2, 'FC Region', '1', '2', 2, '3.00', '13', 'aaa', NULL, '[\"3\"]', '[\"4\"]', '1', 0, 0, '2023-04-05 15:41:24', '2023-04-05 15:41:24'),
(15, 3, 2, 'Buck Reeves Trading', '1', '32', 26, '3.00', '4', 'Architecto fuga Con', NULL, '[\"2\"]', '[\"4\"]', '1', 0, 0, '2023-04-05 15:44:39', '2023-07-31 05:57:21'),
(16, 3, 2, 'Class Region', '1', '18', 1, '20.00', '1', 'fdsf', NULL, '[\"3\"]', '[\"2\"]', '1', 0, 0, '2023-04-10 15:25:30', '2023-05-30 09:42:18'),
(17, 3, 2, 'Proo', '2', '29', 1, '3.00', '2', 'my', NULL, '[\"2\"]', '[\"2\"]', '1', 0, 0, '2023-04-10 15:34:12', '2023-06-02 06:02:36'),
(18, 5, 2, 'DExD9', '1', '12', 15, '23.00', '15', 'Work in loss angless', NULL, '[\"2\",\"4\"]', '[\"4\",\"2\"]', '1', 0, 0, '2023-05-23 06:15:56', '2023-06-21 08:49:53'),
(19, 3, 2, 'Kidd Brennan Plc', '1', '12', 2, '23.00', '16', 'aaaa', NULL, '[\"3\"]', '[\"4\"]', '1', 0, 0, '2023-05-30 11:44:45', '2023-06-02 06:02:42'),
(20, 3, 2, 'NewJob', '1', '12', 5, '21.00', '16', 'Hello', NULL, '[\"2\"]', '[\"2\"]', '1', 0, 0, '2023-05-30 13:05:14', '2023-05-30 13:05:14'),
(21, 6, 2, 'TesterMon', '1', '12', 14, '23.00', '13', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, '[\"3\"]', '[\"5\"]', '1', 0, 0, '2023-05-30 13:46:36', '2023-05-30 13:52:26'),
(22, 3, 2, 'TesterMoniA', '2', '12', 6, '21.00', '13', 'Hello!', NULL, '[\"3\"]', '[\"4\"]', '1', 0, 0, '2023-06-01 05:24:07', '2023-06-01 05:24:07'),
(23, 3, 2, 'NewJob', '1', '12 months', 11, '23.00', '1', 'sss', NULL, '[\"3\"]', '[\"4\"]', '1', 0, 0, '2023-06-06 07:02:05', '2023-06-06 07:02:05'),
(24, 3, 2, 'MY NEW LISTING', '1', '12 months', 11, '12.00', '1', 'MY NEW LISTING', NULL, '[\"3\"]', '[\"2\"]', '1', 0, 1, '2023-06-06 13:31:45', '2023-07-07 09:41:46'),
(25, 3, 2, 'Just Latest', '2', '12 months', 11, '21.00', '6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"3\"]', '[\"2\"]', '1', 0, 1, '2023-06-06 14:15:28', '2023-07-10 12:00:42'),
(26, 3, 2, 'Proofpoint', '2', '2 Month', 23, '1.00', '3', 'Iusto numquam amet', NULL, '[\"2\",\"4\"]', '[\"1\",\"4\"]', '1', 0, 1, '2023-07-13 06:16:57', '2023-07-27 11:04:54'),
(27, 3, 2, 'Proofpoint', '2', '4 Month', 14, '96.00', '7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '[\"3\",\"5\"]', '[\"2\"]', '1', 0, 1, '2023-07-13 06:35:43', '2023-07-31 13:09:09'),
(29, 3, 2, 'Proofpoint', '1', '1 Month', 11, NULL, '1', 'Testing', NULL, '[\"2\"]', '[\"4\"]', '1', 0, 0, '2023-08-22 07:23:30', '2023-08-22 07:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `guard_types`
--

CREATE TABLE `guard_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guard_types`
--

INSERT INTO `guard_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Group Security', '0', '2023-03-15 15:23:43', '2023-03-15 15:23:43'),
(2, 'Armed Security', '0', '2023-03-15 15:23:54', '2023-03-15 15:23:54'),
(3, 'Unarmed Security', '0', '2023-06-21 08:22:58', '2023-06-21 08:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guard_job_id` int(11) DEFAULT NULL,
  `client_job_id` int(119) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `ceremony` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `guard_job_id`, `client_job_id`, `user_id`, `ceremony`, `image`, `created_at`, `updated_at`) VALUES
(1, 15, NULL, 3, '1', 'Asset4.png', '2023-04-05 15:44:39', '2023-04-05 15:44:39'),
(2, 15, NULL, 3, '1', 'Asset8.png', '2023-04-05 15:44:39', '2023-04-05 15:44:39'),
(5, 16, NULL, 3, '1', '2023-03-08__1678304706__blogs-mic.png', '2023-04-10 15:25:30', '2023-04-10 15:25:30'),
(6, 16, NULL, 3, '1', 'Best-4K-Wallpapers-scaled.jpg', '2023-04-10 15:25:30', '2023-04-10 15:25:30'),
(9, 16, NULL, 3, '1', 'night-sydney-theater-wallpaper-preview.jpg', '2023-04-10 15:31:01', '2023-04-10 15:31:01'),
(10, 16, NULL, 3, '1', 'Sites-to-Stream-Live-Sports.jpg', '2023-04-10 15:31:01', '2023-04-10 15:31:01'),
(11, 17, NULL, 3, '1', 'LP_Tower_Bridge (1).jpg', '2023-04-10 15:34:12', '2023-04-10 15:34:12'),
(12, 17, NULL, 3, '1', 'night-sydney-theater-wallpaper-preview.jpg', '2023-04-10 15:34:12', '2023-04-10 15:34:12'),
(13, NULL, 9, 3, '1', 'Sites-to-Stream-Live-Sports.jpg', '2023-04-10 15:34:12', '2023-04-10 15:34:12'),
(14, NULL, 12, 4, '1', 'Best-4K-Wallpapers-scaled.jpg', '2023-04-12 17:57:37', '2023-04-12 17:57:37'),
(16, NULL, 15, 4, '1', 'Best-4K-Wallpapers-scaled.jpg', '2023-04-12 18:25:45', '2023-04-12 18:25:45'),
(17, NULL, 15, 4, '1', 'cities-sydney-australia-boat-wallpaper-preview.jpg', '2023-04-12 18:25:45', '2023-04-12 18:25:45'),
(18, NULL, 13, 4, '1', '2023-03-08__1678304706__blogs-mic.png', '2023-04-13 12:45:44', '2023-04-13 12:45:44'),
(19, NULL, 13, 4, '1', 'Best-4K-Wallpapers-scaled.jpg', '2023-04-13 12:45:44', '2023-04-13 12:45:44'),
(20, NULL, 13, 4, '1', 'cities-sydney-australia-boat-wallpaper-preview.jpg', '2023-04-13 12:45:44', '2023-04-13 12:45:44'),
(21, NULL, 14, 4, '1', 'LP_Tower_Bridge (1).jpg', '2023-04-13 12:46:05', '2023-04-13 12:46:05'),
(22, NULL, 14, 4, '1', 'night-sydney-theater-wallpaper-preview.jpg', '2023-04-13 12:46:05', '2023-04-13 12:46:05'),
(23, NULL, 14, 4, '1', 'Sites-to-Stream-Live-Sports.jpg', '2023-04-13 12:46:05', '2023-04-13 12:46:05'),
(24, 18, NULL, 5, '1', 'President Lincoln.jpg', '2023-05-23 06:15:56', '2023-05-23 06:15:56'),
(25, NULL, 16, 4, '1', 'Asset7.png', '2023-05-29 05:43:57', '2023-05-29 05:43:57'),
(26, NULL, 17, 4, '1', 'Asset14.png', '2023-05-29 10:09:23', '2023-05-29 10:09:23'),
(27, 19, NULL, 3, '1', 'GettyImages-1077456220_thumb.webp', '2023-05-30 11:44:45', '2023-05-30 11:44:45'),
(28, 20, NULL, 3, '1', 'Baharat-1.jpg', '2023-05-30 13:05:14', '2023-05-30 13:05:14'),
(29, 21, NULL, 6, '1', 'tumeric_cayenne_pepper_spices.width-800.jpg', '2023-05-30 13:46:36', '2023-05-30 13:46:36'),
(30, 22, NULL, 3, '1', 'tumeric_cayenne_pepper_spices.width-800.jpg', '2023-06-01 05:24:07', '2023-06-01 05:24:07'),
(31, 24, NULL, 3, '1', 'Different-types-of-spices-of-the-table-apr18.jpg', '2023-06-06 13:31:45', '2023-06-06 13:31:45'),
(32, 25, NULL, 3, '1', 'pexels-cmonphotography-1809616.jpg', '2023-06-06 14:15:28', '2023-06-06 14:15:28'),
(33, NULL, 18, 4, '1', 'Asset11.png', '2023-07-10 13:57:01', '2023-07-10 13:57:01'),
(34, NULL, 18, 4, '1', 'Asset14.png', '2023-07-10 13:57:01', '2023-07-10 13:57:01'),
(35, 26, NULL, 3, '1', 'Asset11.png', '2023-07-13 06:31:25', '2023-07-13 06:31:25'),
(36, 26, NULL, 3, '1', 'Asset14.png', '2023-07-13 06:31:25', '2023-07-13 06:31:25'),
(37, 26, NULL, 3, '1', 'Asset15.png', '2023-07-13 06:31:25', '2023-07-13 06:31:25'),
(38, 27, NULL, 3, '1', 'Asset12.png', '2023-07-13 06:35:43', '2023-07-13 06:35:43'),
(39, 27, NULL, 3, '1', 'Asset13.png', '2023-07-13 06:35:43', '2023-07-13 06:35:43'),
(40, 27, NULL, 3, '1', 'Asset24.png', '2023-07-13 06:35:43', '2023-07-13 06:35:43'),
(41, 28, NULL, 3, '1', '2ygv7ssy2k0lxlzu.jpg', '2023-07-14 11:52:10', '2023-07-14 11:52:10'),
(42, NULL, 5, 2, '1', 'HNT.jpg', '2023-07-27 08:53:36', '2023-07-27 08:53:36'),
(43, NULL, 6, 4, '1', '2ygv7ssy2k0lxlzu.jpg', '2023-07-27 09:05:34', '2023-07-27 09:05:34'),
(44, NULL, 5, 4, '1', 'Bash_history.jpg', '2023-07-27 09:05:52', '2023-07-27 09:05:52'),
(45, NULL, 4, 4, '1', '1651889756.jpg', '2023-07-27 09:06:10', '2023-07-27 09:06:10'),
(46, NULL, 3, 4, '1', 'Bash_history.jpg', '2023-07-27 09:06:21', '2023-07-27 09:06:21'),
(47, NULL, 2, 4, '1', 'amazon.jpg', '2023-07-27 09:06:40', '2023-07-27 09:06:40'),
(48, NULL, 2, 4, '1', 'Bash_history.jpg', '2023-07-27 10:12:46', '2023-07-27 10:12:46'),
(49, 29, NULL, 3, '1', 'pic 350px.png', '2023-08-22 07:23:30', '2023-08-22 07:23:30'),
(50, NULL, 7, 4, '1', 'New pic 350px.png', '2023-08-22 10:42:14', '2023-08-22 10:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `user_id`, `name`, `slug`, `email`, `contact`, `message`, `created_at`, `updated_at`) VALUES
(5, 3, 'Fritz Henry', NULL, 'xagob@mailinator.com', '(185) 440-1123', 'Est animi incidunt', '2023-03-16 18:56:40', '2023-03-16 18:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'English', NULL, '2023-03-15 14:17:57', '2023-03-15 14:17:57'),
(2, 'Arabic', NULL, '2023-03-15 14:29:58', '2023-03-15 14:50:14'),
(4, 'French', NULL, '2023-03-15 14:48:09', '2023-03-15 14:48:09'),
(5, 'Chinese', NULL, '2023-03-15 14:49:53', '2023-03-15 14:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `location`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sioux Falls', 'sioux-falls', '1', '2022-06-09 08:54:38', '2022-07-07 04:47:16'),
(2, NULL, 'Rapid City', 'rapid-city', '1', '2022-06-09 09:00:38', '2022-07-07 04:47:24'),
(3, NULL, 'Aberdeen', 'aberdeen', '1', '2022-06-09 09:00:47', '2022-07-07 04:47:27'),
(4, NULL, 'Brookings', 'brookings', '1', '2022-06-09 09:00:55', '2022-07-07 04:47:31'),
(5, NULL, 'Watertown', 'watertown', '1', '2022-06-09 09:01:03', '2022-07-07 04:47:35'),
(6, NULL, 'Mitchell', 'mitchell', '1', '2022-06-09 09:01:14', '2022-07-07 04:47:38'),
(7, NULL, 'Yankton', 'yankton', '1', '2022-06-09 09:01:22', '2022-07-07 04:47:43'),
(8, NULL, 'Pierre', 'pierre', '1', '2022-06-09 09:01:29', '2022-07-07 04:47:46'),
(9, NULL, 'Chamberlain', 'chamberlain', '1', '2022-06-09 09:01:37', '2022-07-07 04:47:50'),
(10, NULL, 'Vermillion', 'vermillion', '1', '2022-06-09 09:01:52', '2022-07-07 04:47:53'),
(11, NULL, 'Huron', 'huron', '1', '2022-06-09 09:02:14', '2022-07-07 04:47:58'),
(12, NULL, 'Brandon', 'brandon', '1', '2022-06-09 09:02:28', '2022-07-07 04:48:02'),
(13, NULL, 'Tea', 'tea', '1', '2022-06-09 09:02:37', '2022-07-07 04:48:07'),
(14, NULL, 'Harrisburg', 'harrisburg', '1', '2022-06-09 09:02:49', '2022-07-07 04:48:12'),
(15, NULL, 'Dell Rapids', 'dell-rapids', '1', '2022-06-09 09:03:03', '2022-07-07 04:48:19'),
(16, NULL, 'Sioux City, IA', 'sioux-city-ia', '1', '2022-06-09 09:03:22', '2022-07-07 04:48:25'),
(17, NULL, 'Brandon SD', 'brandon-sd', '1', '2022-06-09 09:04:48', '2022-07-07 04:48:29'),
(18, NULL, 'Madison SD', 'madison-sd', '1', '2022-06-09 09:04:58', '2022-07-07 04:48:34'),
(19, NULL, 'Brookings, SD', 'brookings-sd', '1', '2022-06-09 09:05:34', '2022-07-07 04:48:49'),
(20, NULL, 'Vermillion, SD', 'vermillion-sd', '1', '2022-06-09 09:05:46', '2022-07-07 04:48:52'),
(21, NULL, 'Worthington, MN', 'worthington-mn', '1', '2022-06-09 09:05:57', '2022-07-07 04:48:57'),
(22, NULL, 'Yankton, SD', 'yankton-sd', '1', '2022-06-09 09:06:07', '2022-07-07 04:49:02'),
(23, NULL, 'Le Mars, IA', 'le-mars-ia', '1', '2022-06-09 09:06:16', '2022-07-07 04:49:07'),
(24, NULL, 'Mitchell, SD', 'mitchell-sd', '1', '2022-06-09 09:06:26', '2022-07-07 04:49:12'),
(25, NULL, 'Sioux City, IA', 'sioux-city-ia', '1', '2022-06-09 09:06:36', '2022-07-07 04:49:18'),
(26, NULL, 'South Sioux City, NE', 'south-sioux-city-ne', '1', '2022-06-09 09:06:45', '2022-07-07 04:49:30'),
(27, NULL, 'Marshall, MN', 'marshall-mn', '1', '2022-06-09 09:06:54', '2022-07-07 04:49:35'),
(28, NULL, 'Spencer, IA', 'spencer-ia', '1', '2022-06-09 09:07:03', '2022-07-07 04:49:39'),
(29, NULL, 'Huron, SD', 'huron-sd', '1', '2022-06-09 09:07:15', '2022-07-07 04:49:43'),
(30, NULL, 'Watertown, SD', 'watertown-sd', '1', '2022-06-09 09:07:25', '2022-07-07 04:49:46'),
(31, NULL, 'Storm Lake, IA', 'storm-lake-ia', '1', '2022-06-09 09:07:36', '2022-07-07 04:49:51'),
(32, NULL, 'Okoboji, IA', 'okoboji-ia', '1', '2022-06-09 09:07:47', '2022-07-07 04:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `logo_managers`
--

CREATE TABLE `logo_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_managers`
--

INSERT INTO `logo_managers` (`id`, `image`, `image_name`, `image_type`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, '2023-03-03__1677859591__Guard-hired-logo.png', NULL, NULL, 'logo', 'logo', '2022-06-08 06:21:33', '2023-03-03 11:06:31'),
(2, '2023-03-13__1678750488__Guard-hired-logo.png', NULL, NULL, 'favicon', 'favicon', '2022-06-08 06:22:29', '2023-03-13 18:34:48');

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
(1, '', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_30_184922_create_logo_managers_table', 1),
(6, '2022_03_30_185503_create_cms_table', 1),
(7, '2022_03_31_231228_create_sociallinks_table', 1),
(8, '2022_04_01_165242_create_blogs_table', 1),
(9, '2022_04_01_214720_create_configs_table', 1),
(10, '2022_04_04_222236_create_f_a_q_s_table', 1),
(11, '2022_04_05_181654_create_packages_table', 1),
(12, '2022_04_05_184749_create_subcriptions_table', 1),
(13, '2022_04_12_172819_create_frontends_table', 1),
(14, '2022_04_12_173216_create_pages_table', 1),
(15, '2022_04_13_214717_create_videos_table', 1),
(16, '2022_04_14_173454_create_audio_table', 1),
(17, '2022_04_15_175836_create_background_audio_table', 1),
(18, '2022_05_09_193945_create_checkouts_table', 1),
(19, '2022_05_15_014713_create_appoinments_table', 1),
(20, '2022_05_16_235531_create_book__coaches_table', 1),
(21, '2022_05_17_221414_create_messages_table', 1),
(22, '2022_05_18_194619_create_re_scheduleds_table', 1),
(23, '2022_05_18_194813_create_disputes_table', 1),
(24, '2022_05_18_222755_create_rateings_table', 1),
(25, '2022_05_24_152416_create_book_evaluators_table', 1),
(26, '2022_05_24_230336_create_challenges_table', 1),
(27, '2022_05_25_153119_create_evaluator_assesments_table', 1),
(28, '2022_05_31_195841_create_coach_ratings_table', 1),
(29, '2022_05_31_214932_create_evaluator_rateings_table', 1),
(30, '2022_06_03_163321_create_ratin_by_evaluators_table', 1),
(31, '2022_06_07_223747_create_privacy_policies_table', 2),
(32, '2022_06_07_231633_create_terms_conditions_table', 3),
(33, '2022_06_08_192801_create_weddings_table', 4),
(34, '2022_06_08_215836_create_services_table', 4),
(35, '2022_06_08_234513_create_locations_table', 5),
(36, '2022_06_09_164352_create_engagements_table', 6),
(37, '2022_06_09_174148_create_user_locations_table', 7),
(38, '2022_06_09_204601_create_testimonials_table', 8),
(39, '2022_06_09_225842_create_inquiries_table', 9),
(40, '2014_10_12_000000_create_users_table', 10),
(41, '2022_06_10_192559_create_user_services_table', 11),
(42, '2022_06_15_211028_create_payment_details_table', 12),
(43, '2022_06_16_152837_create_vendor_management_table', 13),
(44, '2022_06_16_232434_create_image_galleries_table', 14),
(45, '2022_06_23_030405_create_book_vendors_table', 15),
(46, '2022_06_28_153614_create_ratings_table', 16),
(47, '2022_06_28_190806_create_vendor_contacts_table', 17),
(48, '2022_06_28_223316_create_about_vendors_table', 18),
(49, '2022_07_04_165959_create_vendor_socials_table', 19),
(50, '2022_06_09_193927_create_inquires_table', 20),
(51, '2023_02_24_225325_create_paypal_products_table', 21),
(52, '2023_02_27_161644_create_paypal_plans_table', 22),
(53, '2023_03_01_224407_create_paypalpayments_table', 23),
(54, '2023_03_06_213701_create_tags_table', 24),
(55, '2023_03_06_222501_create_banners_table', 25),
(56, '2023_03_06_225045_create_guard_types_table', 26),
(57, '2023_03_15_190137_create_languages_table', 27),
(58, '2023_03_15_205938_create_guard_jobs_table', 28),
(59, '2023_03_15_212034_create_user_languages_table', 29),
(60, '2023_03_15_212055_create_user_tags_table', 29),
(61, '2023_03_16_201600_create_portfolio_images_table', 30),
(62, '2023_03_17_999999_add_active_status_to_users', 31),
(63, '2023_03_17_999999_add_avatar_to_users', 31),
(64, '2023_03_17_999999_add_dark_mode_to_users', 31),
(65, '2023_03_17_999999_add_messenger_color_to_users', 31),
(66, '2023_03_17_999999_create_chatify_favorites_table', 31),
(67, '2023_03_17_999999_create_chatify_messages_table', 31),
(68, '2023_03_17_225142_create_client_post_jobs_table', 32),
(69, '2019_05_03_000001_create_customer_columns', 33),
(70, '2019_05_03_000002_create_subscriptions_table', 33),
(71, '2019_05_03_000003_create_subscription_items_table', 33),
(72, '2023_04_20_193439_create_stripe_packages_table', 34),
(73, '2023_05_26_161735_create_guard_credit_points_table', 35),
(74, '2023_05_31_190540_create_featured_guards_table', 36),
(75, '2023_06_01_114933_create_featured_clients_table', 37),
(76, '2023_07_07_113756_create_client_hired_companies_table', 38),
(77, '2023_07_07_120648_create_client_hired_listing_services_table', 39),
(78, '2023_07_25_182143_create_company_ratings_table', 40),
(79, '2023_07_26_160805_create_company_wishlists_table', 41),
(80, '2023_08_23_133354_create_client_rating_by_guards_table', 42);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deatails` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mid_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `type`, `title`, `slug`, `amount`, `deatails`, `mid_details`, `sale_tax`, `created_at`, `updated_at`) VALUES
(1, '20', 'Guard Basic', 'guard-basic', '20.00', '5', '2', '37', '2022-06-09 08:09:33', '2023-05-29 08:45:56'),
(2, '50', 'Guard Pro', 'guard-pro', '35.00', '5', '2', NULL, '2022-06-09 08:17:34', '2023-05-29 08:46:16'),
(3, '100', 'Guard Premium', 'guard-premium', '50.00', '5', '2', NULL, '2022-06-09 08:18:22', '2023-05-29 08:46:29'),
(4, '(sponsored)', 'Featured Service Listing', 'featured-service-listing', '01.00', 'Paid Offline', 'Paid Offline', NULL, '2022-06-09 08:19:05', '2023-05-12 02:18:07'),
(5, '(sponsored)', 'Featured Guard Profile', 'featured-guard-profile', '01.00', 'Paid Offilne', 'Paid Offline', NULL, NULL, '2023-05-12 02:18:14');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `created_at`, `updated_at`) VALUES
(1, 'Home', '2022-06-09 01:45:32', '2022-06-09 01:45:32'),
(2, 'how it works', '2022-06-09 02:33:38', '2023-03-06 13:03:54'),
(3, 'Browse Services', '2022-06-09 02:33:49', '2023-03-06 13:04:11'),
(4, 'Browse Quotes', '2022-06-09 02:33:59', '2023-03-06 13:04:26'),
(5, 'Browse Companies', '2022-06-09 02:34:17', '2023-03-06 13:04:43'),
(6, 'Blogs', '2022-06-09 04:37:58', '2023-03-06 13:06:22'),
(7, 'body guard event', '2023-03-13 10:57:09', '2023-03-13 10:57:09'),
(8, 'company', '2023-03-13 10:57:31', '2023-03-13 10:57:31'),
(9, 'group security', '2023-03-13 10:57:59', '2023-03-13 10:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vendor@gmail.com', 'SrIJBhkVWYT0qW1FH3lT1QIKUU8dPK2VZzvmJksOmMP0xeNHSrXmWo5EZXrRs95G', '2022-07-14 06:48:33'),
('vendor@gmail.com', 'ibxhkUMrvMgNLXv0M9WEUQ43Z2MMea3jpBc36Mbzubc2t9EuwswDR23NnRbTBzzD', '2022-07-14 06:48:50'),
('guard@gmail.com', '$2y$10$TQZV1Gz1bLk/Tsx025N/Ge6xBSjq9dR96I2uCFX0GSx3VPDkg9JqK', '2023-03-29 18:45:28'),
('iamjamesalbertt@gmail.com', 'LzveNfEDKj6GOWgcuLehUt1heRXvmmTrPb61veNwvl4r8ALegKDstOKmQrN38uAE', '2023-04-11 14:33:47'),
('iamjamesalbertt@gmail.com', 'RCbnROo6ON35jQGR0JFBKMW0Q5CqPS4foufS5cdgrKPUamj4tacUU54zTsXYtF13', '2023-04-11 14:38:10'),
('iamjamesalbertt@gmail.com', 'yirVNQZYTZuvVKYv11lPAqY1FPbbANi3n46vEeEhJK4FTRsjl2VsECbUvyJlGpbd', '2023-04-11 14:40:18'),
('iamjamesalbertt@gmail.com', 'PMypWQJ8U3WrGMOFgW6dnFG2QixUdPhXCcBHjAxltOSxxLgaspWGJqmo162iftOf', '2023-04-11 14:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_response` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg_points` int(255) DEFAULT NULL,
  `listing_points` int(255) DEFAULT NULL,
  `total_credit_points` int(119) NOT NULL DEFAULT 0,
  `package_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `user_id`, `stripe_response`, `package_title`, `package_amount`, `msg_points`, `listing_points`, `total_credit_points`, `package_type`, `created_at`, `updated_at`) VALUES
(1, '3', '{\"id\":\"cs_test_a1y7sVorWbtUz6VYbB9sjI1FWcUXkOzwroEHZ4f0TcNm49dXkeJit353Sy\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685033137,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685119537,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NBhIDJ5CNuTNvMY0h4o6mag\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1y7sVorWbtUz6VYbB9sjI1FWcUXkOzwroEHZ4f0TcNm49dXkeJit353Sy#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 50, '50', '2023-05-25 11:53:56', '2023-05-25 11:53:56'),
(2, '3', '{\"id\":\"cs_test_a1a0xpWlmVWVRViHoNEwSaQHZuZoSbwRvF5g4tE7d84Ni0Dx6aHH0owCEK\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685119046,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685205446,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NC3dqJ5CNuTNvMY1nrLSDY4\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1a0xpWlmVWVRViHoNEwSaQHZuZoSbwRvF5g4tE7d84Ni0Dx6aHH0owCEK#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 0, '20', '2023-05-26 11:38:55', '2023-05-26 11:38:55'),
(3, '3', '{\"id\":\"cs_test_a1iOrStGxZvBiWFbj53bjHkEFeGiFmbeLqnPlSkUcE4WSsrNALMilTYmfo\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685376622,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685463022,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3ND8eIJ5CNuTNvMY0QP4PfKC\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1iOrStGxZvBiWFbj53bjHkEFeGiFmbeLqnPlSkUcE4WSsrNALMilTYmfo#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 0, '20', '2023-05-29 11:14:57', '2023-05-29 11:14:57'),
(4, '3', '{\"id\":\"cs_test_a1FpOf4O3X7wFlyGrYDa1m24P819YXrZaPk4aOC80vMnbNpn6NxUwTzKEB\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685377374,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685463774,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3ND8qQJ5CNuTNvMY0o2sOZNV\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1FpOf4O3X7wFlyGrYDa1m24P819YXrZaPk4aOC80vMnbNpn6NxUwTzKEB#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 0, '20', '2023-05-29 11:23:10', '2023-05-29 11:23:10'),
(5, '3', '{\"id\":\"cs_test_a1BUAyFENZIJijJiMOEDyq6LgNCdyoB1vhlxV8vTLw8xLEI8zRMzABfv4o\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685377765,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685464164,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3ND8wjJ5CNuTNvMY1OEV2CKK\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1BUAyFENZIJijJiMOEDyq6LgNCdyoB1vhlxV8vTLw8xLEI8zRMzABfv4o#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 0, '20', '2023-05-29 11:29:42', '2023-05-29 11:29:42'),
(6, '3', '{\"id\":\"cs_test_a1bvUttw4JqtebXaHx98ftRDPJkSKSZAuiDZpuQhEtBPk9rDYHtA8mbra8\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685378051,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685464451,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3ND91LJ5CNuTNvMY0UBGgJTD\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1bvUttw4JqtebXaHx98ftRDPJkSKSZAuiDZpuQhEtBPk9rDYHtA8mbra8#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 0, '50', '2023-05-29 11:34:23', '2023-05-29 11:34:23'),
(7, '5', '{\"id\":\"cs_test_a1aieuSc4WttFecRpunpYL3dLaLUH5L9bq6mzcQuOoF7tX1EYV3wUllNYa\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685443006,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685529406,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NDPv0J5CNuTNvMY07Dek4qT\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1aieuSc4WttFecRpunpYL3dLaLUH5L9bq6mzcQuOoF7tX1EYV3wUllNYa#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 50, '50', '2023-05-30 05:37:17', '2023-05-30 05:37:17'),
(8, '6', '{\"id\":\"cs_test_a15WAup5LtdELBRAb5CEwJWHzKfTVu8IgD6LNWVf3Ffzj4bHvesAGD2zYg\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685472142,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685558542,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NDXUwJ5CNuTNvMY0woPs3TZ\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a15WAup5LtdELBRAb5CEwJWHzKfTVu8IgD6LNWVf3Ffzj4bHvesAGD2zYg#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-05-30 13:42:43', '2023-05-30 13:42:43'),
(9, '6', '{\"id\":\"cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685731569,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685817969,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NEczFJ5CNuTNvMY1moCovw2\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:46:36', '2023-06-02 13:46:36'),
(10, '6', '{\"id\":\"cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685731569,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685817969,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NEczFJ5CNuTNvMY1moCovw2\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:50:14', '2023-06-02 13:50:14'),
(11, '6', '{\"id\":\"cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685731569,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685817969,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NEczFJ5CNuTNvMY1moCovw2\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:51:06', '2023-06-02 13:51:06'),
(12, '6', '{\"id\":\"cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685731569,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685817969,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NEczFJ5CNuTNvMY1moCovw2\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1SGalVisJyeWDHx2enA3dHjmtwU7Loo9BkBLkvd34HO1qbCutMZLoamKu#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:51:38', '2023-06-02 13:51:38'),
(13, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:10', '2023-06-02 13:54:10'),
(14, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:11', '2023-06-02 13:54:11'),
(15, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:11', '2023-06-02 13:54:11'),
(16, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:11', '2023-06-02 13:54:11'),
(17, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:11', '2023-06-02 13:54:11'),
(18, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:12', '2023-06-02 13:54:12'),
(19, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:12', '2023-06-02 13:54:12'),
(20, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:12', '2023-06-02 13:54:12'),
(21, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:12', '2023-06-02 13:54:12'),
(22, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:12', '2023-06-02 13:54:12'),
(23, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:13', '2023-06-02 13:54:13'),
(24, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:13', '2023-06-02 13:54:13'),
(25, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:13', '2023-06-02 13:54:13'),
(26, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:13', '2023-06-02 13:54:13'),
(27, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:14', '2023-06-02 13:54:14'),
(28, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:14', '2023-06-02 13:54:14'),
(29, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:14', '2023-06-02 13:54:14'),
(30, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:14', '2023-06-02 13:54:14'),
(31, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:15', '2023-06-02 13:54:15'),
(32, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:15', '2023-06-02 13:54:15'),
(33, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:16', '2023-06-02 13:54:16'),
(34, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:16', '2023-06-02 13:54:16'),
(35, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:17', '2023-06-02 13:54:17'),
(36, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:17', '2023-06-02 13:54:17'),
(37, '6', NULL, 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-02 13:54:17', '2023-06-02 13:54:17'),
(38, '6', '{\"id\":\"cs_test_a1FVhYIF0OoY8tfGsEyZYni2LTZB7G0DkX9QUybnFsjQyVEtWsgvezZ5Z6\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685732080,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685818479,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NEd7UJ5CNuTNvMY0Mn9dRVx\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1FVhYIF0OoY8tfGsEyZYni2LTZB7G0DkX9QUybnFsjQyVEtWsgvezZ5Z6#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 50, '50', '2023-06-02 13:54:48', '2023-06-02 13:54:48'),
(39, '6', '{\"id\":\"cs_test_a1jfY6HChKtwatowiTjzki69ALtByC4ICZ8WWKEc9qII2F6p25KKCuYn7Q\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685732239,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1685818638,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NEdA3J5CNuTNvMY1jlTeGcX\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1jfY6HChKtwatowiTjzki69ALtByC4ICZ8WWKEc9qII2F6p25KKCuYn7Q#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 50, '50', '2023-06-02 13:57:31', '2023-06-02 13:57:31'),
(40, '24', '{\"id\":\"cs_test_a1OvShh4opr0MvlmeKeBCqHnuoIsmgPbNf6JgtmS5SHoru1sAUwIXoivmp\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685966761,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1686053161,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NFcAfJ5CNuTNvMY0E3RvLyV\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1OvShh4opr0MvlmeKeBCqHnuoIsmgPbNf6JgtmS5SHoru1sAUwIXoivmp#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 20, '20', '2023-06-05 07:06:18', '2023-06-05 07:06:18'),
(41, '25', '{\"id\":\"cs_test_a18P4vJQvQgwojwP6L5a0Z2YbVc7YiMt1sfSXPNIDNhNtZnl3crfTiHM0d\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":5000,\"amount_total\":5000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685966908,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1686053308,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NFcD2J5CNuTNvMY0Oujpemc\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a18P4vJQvQgwojwP6L5a0Z2YbVc7YiMt1sfSXPNIDNhNtZnl3crfTiHM0d#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Premium', '50.00', 5, 2, 100, '100', '2023-06-05 07:08:45', '2023-06-05 07:08:45'),
(42, '26', '{\"id\":\"cs_test_a1IIq0U1cidgcKOlf3xlgTD8Y9knzhcbL5WhweyHkgaAbWO1kUHUxU4LFg\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":3500,\"amount_total\":3500,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1685971770,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1686058170,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NFdTSJ5CNuTNvMY1FXsl2YS\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1IIq0U1cidgcKOlf3xlgTD8Y9knzhcbL5WhweyHkgaAbWO1kUHUxU4LFg#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Pro', '35.00', 5, 2, 50, '50', '2023-06-05 08:29:42', '2023-06-05 08:29:42'),
(43, '3', '{\"id\":\"cs_test_a1cuuLqkBuggGy30vsTD4z2ii1gaAv1534tVgWAhfXZ27JVFBWaNR0YpjW\",\"object\":\"checkout.session\",\"after_expiration\":null,\"allow_promotion_codes\":null,\"amount_subtotal\":2000,\"amount_total\":2000,\"automatic_tax\":{\"enabled\":false,\"status\":null},\"billing_address_collection\":null,\"cancel_url\":\"http:\\/\\/localhost\\/guard_hire\",\"client_reference_id\":null,\"consent\":null,\"consent_collection\":null,\"created\":1686078833,\"currency\":\"usd\",\"currency_conversion\":null,\"custom_fields\":[],\"custom_text\":{\"shipping_address\":null,\"submit\":null},\"customer\":null,\"customer_creation\":\"always\",\"customer_details\":null,\"customer_email\":null,\"expires_at\":1686165232,\"invoice\":null,\"invoice_creation\":{\"enabled\":false,\"invoice_data\":{\"account_tax_ids\":null,\"custom_fields\":null,\"description\":null,\"footer\":null,\"metadata\":[],\"rendering_options\":null}},\"livemode\":false,\"locale\":null,\"metadata\":[],\"mode\":\"payment\",\"payment_intent\":\"pi_3NG5KHJ5CNuTNvMY0Gcdlsde\",\"payment_link\":null,\"payment_method_collection\":\"always\",\"payment_method_options\":[],\"payment_method_types\":[\"card\"],\"payment_status\":\"unpaid\",\"phone_number_collection\":{\"enabled\":false},\"recovered_from\":null,\"setup_intent\":null,\"shipping\":null,\"shipping_address_collection\":null,\"shipping_options\":[],\"shipping_rate\":null,\"status\":\"open\",\"submit_type\":null,\"subscription\":null,\"success_url\":\"http:\\/\\/localhost\\/guard_hire\\/store-user-payment\",\"total_details\":{\"amount_discount\":0,\"amount_shipping\":0,\"amount_tax\":0},\"url\":\"https:\\/\\/checkout.stripe.com\\/c\\/pay\\/cs_test_a1cuuLqkBuggGy30vsTD4z2ii1gaAv1534tVgWAhfXZ27JVFBWaNR0YpjW#fidkdWxOYHwnPyd1blpxYHZxWjA0Tm1JQzJPMEZLcFFLc0hcV1xvQG98MFRCZFE3UlNhf180V2dxM3dVd3d2PVFGb2J8VWdvVzM8YTYyQjJ2M0lrU3FgNUpRaX1hcHw0Y0BWYTU8NU51Um53NTVXbz1USWRuVScpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl\"}', 'Guard Basic', '20.00', 5, 2, 24, '20', '2023-06-06 14:14:06', '2023-07-26 13:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `paypalpayments`
--

CREATE TABLE `paypalpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_response` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypalpayments`
--

INSERT INTO `paypalpayments` (`id`, `user_id`, `package_id`, `name`, `package_amount`, `package_response`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'admin', '40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_plans`
--

CREATE TABLE `paypal_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interval_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_cycles_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_response` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_plans`
--

INSERT INTO `paypal_plans` (`id`, `user_id`, `product_id`, `plan_id`, `name`, `description`, `plan_price`, `Currency`, `interval_count`, `billing_cycles_period`, `plan_response`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'PROD-83J15127EB3281802', 'P-652172318U852844LMP6OEFY', 'Dakota Gold', 'Dakota Gold Plan', '40', NULL, NULL, NULL, NULL, 0, '2023-02-27 12:02:19', '2023-03-01 15:09:14'),
(5, 1, 'PROD-4GX083226R348213T', 'P-89050836K41832840MP6PLPA', 'Double Product', 'Double Product plan', '50', NULL, NULL, NULL, NULL, 0, '2023-02-27 13:26:07', '2023-03-01 12:21:41'),
(6, 1, 'PROD-8EF68720KG2593439', 'P-8XD02398V8425262SMP6PNSY', 'Triple Plan', 'Triple Plan', '9', NULL, NULL, NULL, NULL, 0, '2023-02-27 13:30:39', '2023-02-27 13:46:16'),
(7, 1, 'PROD-1SA71243WW9856459', 'P-88513738E3541583PMP6PV5A', 'Dakota Silver', 'Dakota south silver', '33', NULL, NULL, 'MONTH', NULL, 0, '2023-02-27 13:48:24', '2023-02-27 13:48:24'),
(8, 1, 'PROD-2VT17952DS661244H', 'P-6A8419059P248780FMP6PZPI', 'Watch Free', 'Watch videos plan', '12', 'usd', NULL, 'MONTH', NULL, 0, '2023-02-27 13:56:01', '2023-02-27 13:56:01'),
(9, 1, 'PROD-05Y93081T78664011', 'P-4G541175NT001033DMP6P3WA', 'Dakota Premium', 'Dakota Premium Plan', '33', 'usd', NULL, 'YEAR', '{\"id\":\"P-4G541175NT001033DMP6P3WA\",\"product_id\":\"PROD-05Y93081T78664011\",\"name\":\"Dakota Premium\",\"status\":\"ACTIVE\",\"description\":\"Dakota Premium Plan\",\"usage_type\":\"LICENSED\",\"create_time\":\"2023-02-27T19:00:40Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/billing\\/plans\\/P-4G541175NT001033DMP6P3WA\",\"rel\":\"self\",\"method\":\"GET\",\"encType\":\"application\\/json\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/billing\\/plans\\/P-4G541175NT001033DMP6P3WA\",\"rel\":\"edit\",\"method\":\"PATCH\",\"encType\":\"application\\/json\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/billing\\/plans\\/P-4G541175NT001033DMP6P3WA\\/deactivate\",\"rel\":\"self\",\"method\":\"POST\",\"encType\":\"application\\/json\"}]}', 0, '2023-02-27 14:00:44', '2023-02-27 14:00:44'),
(10, 1, 'PROD-0NA97923F7039921L', 'P-9N17702606037122JMP73BTI', 'Basic', 'Basic Plan', '50', 'usd', NULL, 'YEAR', '{\"id\":\"P-9N17702606037122JMP73BTI\",\"product_id\":\"PROD-0NA97923F7039921L\",\"name\":\"Basic\",\"status\":\"ACTIVE\",\"description\":\"Basic Plan\",\"usage_type\":\"LICENSED\",\"create_time\":\"2023-03-01T20:08:45Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/billing\\/plans\\/P-9N17702606037122JMP73BTI\",\"rel\":\"self\",\"method\":\"GET\",\"encType\":\"application\\/json\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/billing\\/plans\\/P-9N17702606037122JMP73BTI\",\"rel\":\"edit\",\"method\":\"PATCH\",\"encType\":\"application\\/json\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/billing\\/plans\\/P-9N17702606037122JMP73BTI\\/deactivate\",\"rel\":\"self\",\"method\":\"POST\",\"encType\":\"application\\/json\"}]}', 0, '2023-03-01 15:08:51', '2023-03-01 15:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_products`
--

CREATE TABLE `paypal_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `product_response` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paypal_products`
--

INSERT INTO `paypal_products` (`id`, `user_id`, `product_id`, `name`, `description`, `type`, `category`, `status`, `product_response`, `created_at`, `updated_at`) VALUES
(1, 1, 'PROD-1SA71243WW9856459', 'Dakota Silver', 'Dakota south silver', NULL, NULL, 0, '{\"id\":\"PROD-1SA71243WW9856459\",\"name\":\"Dakota Silver\",\"description\":\"Dakota south silver\",\"create_time\":\"2023-02-27T16:05:07Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-1SA71243WW9856459\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-1SA71243WW9856459\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 11:05:10', '2023-02-27 11:05:10'),
(2, 1, 'PROD-83J15127EB3281802', 'Dakota Gold', 'Dakota Gold Plan', NULL, NULL, 0, '{\"id\":\"PROD-83J15127EB3281802\",\"name\":\"Dakota Gold\",\"description\":\"Dakota Gold Plan\",\"create_time\":\"2023-02-27T17:01:31Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-83J15127EB3281802\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-83J15127EB3281802\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 12:01:35', '2023-02-27 12:01:35'),
(3, 1, 'PROD-05Y93081T78664011', 'Dakota Premium', 'Dakota Premium Plan', NULL, NULL, 0, '{\"id\":\"PROD-05Y93081T78664011\",\"name\":\"Dakota Premium\",\"description\":\"Dakota Premium Plan\",\"create_time\":\"2023-02-27T17:47:19Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-05Y93081T78664011\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-05Y93081T78664011\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 12:47:23', '2023-02-27 12:47:23'),
(4, 1, 'PROD-7B162933UR208260D', 'Single Product', 'single product plan', NULL, NULL, 0, '{\"id\":\"PROD-7B162933UR208260D\",\"name\":\"Single Product\",\"description\":\"single product plan\",\"create_time\":\"2023-02-27T18:17:04Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-7B162933UR208260D\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-7B162933UR208260D\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 13:17:08', '2023-02-27 13:17:08'),
(5, 1, 'PROD-4GX083226R348213T', 'Double Product', 'Double Product plan', NULL, NULL, 0, '{\"id\":\"PROD-4GX083226R348213T\",\"name\":\"Double Product\",\"description\":\"Double Product plan\",\"create_time\":\"2023-02-27T18:24:13Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-4GX083226R348213T\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-4GX083226R348213T\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 13:24:17', '2023-02-27 13:24:17'),
(6, 1, 'PROD-8EF68720KG2593439', 'Triple Plan', 'Triple Plan', NULL, NULL, 0, '{\"id\":\"PROD-8EF68720KG2593439\",\"name\":\"Triple Plan\",\"description\":\"Triple Plan\",\"create_time\":\"2023-02-27T18:25:41Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-8EF68720KG2593439\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-8EF68720KG2593439\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 13:25:45', '2023-02-27 13:25:45'),
(7, 1, 'PROD-2VT17952DS661244H', 'Watch Free', 'Free  videos products', NULL, NULL, 0, '{\"id\":\"PROD-2VT17952DS661244H\",\"name\":\"Watch Free\",\"description\":\"Watch videos plan\",\"create_time\":\"2023-02-27T18:36:12Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-2VT17952DS661244H\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-2VT17952DS661244H\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-02-27 13:36:16', '2023-03-01 10:59:47'),
(8, 1, 'PROD-0NA97923F7039921L', 'Basic', 'Basic Plan', NULL, NULL, 0, '{\"id\":\"PROD-0NA97923F7039921L\",\"name\":\"Basic\",\"description\":\"Basic Plan\",\"create_time\":\"2023-03-01T20:08:05Z\",\"links\":[{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-0NA97923F7039921L\",\"rel\":\"self\",\"method\":\"GET\"},{\"href\":\"https:\\/\\/api.sandbox.paypal.com\\/v1\\/catalogs\\/products\\/PROD-0NA97923F7039921L\",\"rel\":\"edit\",\"method\":\"PATCH\"}]}', '2023-03-01 15:08:10', '2023-03-01 15:08:10');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(9, 7, 'Asset13.png', '2023-03-28 18:11:35', '2023-03-28 18:11:35'),
(10, 7, 'Asset14.png', '2023-03-28 18:11:35', '2023-03-28 18:11:35'),
(12, 11, 'Best-4K-Wallpapers-scaled.jpg', '2023-04-10 16:14:29', '2023-04-10 16:14:29'),
(13, 11, 'cities-sydney-australia-boat-wallpaper-preview.jpg', '2023-04-10 16:14:29', '2023-04-10 16:14:29'),
(14, 11, 'Football-soccer-sports-live-streaming-video.jpg', '2023-04-10 16:14:29', '2023-04-10 16:14:29'),
(21, 5, '2ygv7ssy2k0lxlzu.jpg', '2023-06-21 10:10:11', '2023-06-21 10:10:11'),
(22, 34, 'images (1).jpg', '2023-07-05 07:45:30', '2023-07-05 07:45:30'),
(23, 34, 'NCERT-Solutions-For-Class-8-History.jpg', '2023-07-05 07:45:30', '2023-07-05 07:45:30'),
(24, 34, 'rnpjrqialw.jpg', '2023-07-05 07:45:30', '2023-07-05 07:45:30'),
(25, 34, 'the-death-of-general-mercer-at-the-battle-of-princeton-john-trumbull-war-is-hell-store.jpg', '2023-07-05 07:45:30', '2023-07-05 07:45:30'),
(28, 3, 'the-death-of-general-mercer-at-the-battle-of-princeton-john-trumbull-war-is-hell-store.jpg', '2023-07-05 13:12:33', '2023-07-05 13:12:33'),
(29, 3, '1651889756.jpg', '2023-07-05 13:13:07', '2023-07-05 13:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy-policy', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availableIn publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful&nbsp;</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '2022-06-08 08:02:59', '2023-03-13 14:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guard_job_id` int(11) DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` int(255) DEFAULT NULL,
  `guard_id` int(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `guard_job_id`, `message`, `rate`, `guard_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 12, 'In publishing and graphic design', 1, 3, 0, '2023-04-19 17:31:38', '2023-04-19 17:31:38'),
(2, 4, 8, 'graphic design, Lorem ipsum', 4, 3, 0, '2023-04-19 17:32:07', '2023-04-19 17:32:07'),
(3, 4, 9, 'In publishing and graphic design', 2, 3, 0, '2023-04-19 17:38:12', '2023-04-19 17:38:12'),
(4, 4, 7, 'In publishing and graphic design', 5, 3, 0, '2023-04-19 17:41:12', '2023-04-19 17:41:12'),
(5, 4, 1, 'dasdad', 3, 3, 0, '2023-04-19 18:11:51', '2023-04-19 18:11:51'),
(6, 4, 4, 'Heloo', 4, 3, 0, '2023-04-19 18:24:49', '2023-04-19 18:24:49'),
(7, 4, 8, 'thats aweosme!', 4, 3, 0, '2023-04-20 13:25:05', '2023-04-20 13:25:05'),
(8, 4, 25, 'i love it', 5, 3, 0, '2023-06-06 14:25:42', '2023-06-06 14:25:42'),
(9, 4, 24, 'Awesome!', 5, 3, 0, '2023-07-07 09:41:46', '2023-07-07 09:41:46'),
(10, 4, 26, 'A ti he..!', 1, 3, 0, '2023-07-27 07:44:13', '2023-07-27 07:44:13'),
(11, 2, 27, 'Nixe', 4, 3, 0, '2023-07-31 13:09:09', '2023-07-31 13:09:09'),
(12, 2, 10, 'its was!', 5, 3, 0, '2023-07-31 13:36:19', '2023-07-31 13:36:19'),
(13, 2, 12, 'not well!', 1, 3, 0, '2023-07-31 13:46:07', '2023-07-31 13:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Residential Security', 'residential-security', '1', '2022-06-09 07:17:30', '2023-03-13 13:22:10'),
(2, 'Bank Security', 'bank-security', '1', '2022-06-09 07:24:50', '2023-03-13 13:22:32'),
(3, 'Concert Event', 'concert-event', '1', '2022-06-09 07:33:37', '2023-03-13 13:22:53'),
(4, 'Churches', 'churches', '1', '2022-06-09 07:33:48', '2022-07-07 04:26:26'),
(5, 'Church / House Of Worship', 'church-house-of-worship', '1', '2022-06-09 07:33:57', '2023-03-13 13:23:10'),
(6, 'Data Center', 'data-center', '1', '2022-06-09 07:33:57', '2023-03-13 13:23:42'),
(7, 'Medical Facility', 'medical-facility', '1', '2022-06-09 07:34:08', '2023-03-13 13:23:56'),
(8, 'Personal / Executive', 'personal-executive', '1', '2022-06-09 07:34:17', '2023-03-13 13:24:38'),
(9, 'Location', 'location', '1', '2022-06-09 07:34:27', '2023-03-13 13:24:26'),
(10, 'Movie Set And Film', 'movie-set-and-film', '1', '2022-06-09 07:34:36', '2023-03-13 13:24:14'),
(11, 'Security', 'security', '1', '2023-03-13 13:25:00', '2023-03-13 13:25:00'),
(12, 'Night Club And Night Lounge', 'night-club-and-night-lounge', '1', '2023-03-13 13:26:10', '2023-03-13 13:26:10'),
(13, 'Political Event', 'political-event', '1', '2023-03-13 13:26:20', '2023-03-13 13:26:20'),
(14, 'School And Campus', 'school-and-campus', '1', '2023-03-13 13:26:28', '2023-03-13 13:26:28'),
(15, 'Stadium And Sporting Event', 'stadium-and-sporting-event', '1', '2023-03-13 13:26:35', '2023-03-13 13:26:35'),
(16, 'Residential Security', 'residential-security', '1', '2023-03-13 13:26:44', '2023-03-13 13:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `type`, `social_media`, `slug`, `facebook`, `twitter`, `instagram`, `created_at`, `updated_at`) VALUES
(1, '1', 'https://www.facebook.com/', 'facebook', NULL, NULL, NULL, '2022-06-08 07:15:38', '2022-07-20 08:14:20'),
(2, '2', 'https://www.instagram.com/', 'instagram', NULL, NULL, NULL, '2022-06-08 07:16:14', '2022-07-08 04:43:54'),
(3, '3', 'https://www.twitter.com/', 'twitter', NULL, NULL, NULL, '2022-06-08 07:17:12', '2022-07-08 04:44:46'),
(4, '4', 'https://www.youtube.com/', 'youtube', NULL, NULL, NULL, '2022-06-08 07:17:29', '2022-07-08 04:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_packages`
--

CREATE TABLE `stripe_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` varchar(119) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_payment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interval_count` tinyint(4) NOT NULL DEFAULT 1,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_packages`
--

INSERT INTO `stripe_packages` (`id`, `plan_id`, `name`, `slug`, `billing_payment`, `interval_count`, `price`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'plan_NkaESf4kTebCae', 'Guard Silver', 'guard-silverby3w', 'week', 1, '40', 'usd', '2023-04-20 16:30:54', '2023-05-05 04:21:14'),
(2, 'plan_NmnalZL7U6nb8c', 'Rugular Guard', 'rugular-guarddjln', 'month', 1, '500', 'usd', '2023-04-26 14:26:45', '2023-04-26 14:26:45'),
(3, 'plan_Nmna7LBT03cEqa', 'Guard VIP', 'guard-vipmnns', 'month', 2, '1000', 'usd', '2023-04-26 14:27:16', '2023-04-26 14:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `subcriptions`
--

CREATE TABLE `subcriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcriptions`
--

INSERT INTO `subcriptions` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(5, NULL, 1, '2023-03-14 17:41:18', '2023-03-14 17:41:18'),
(6, NULL, 1, '2023-03-14 17:48:15', '2023-03-14 17:48:15'),
(7, NULL, 1, '2023-03-14 17:51:48', '2023-03-14 17:51:48'),
(8, NULL, 1, '2023-03-15 10:54:51', '2023-03-15 10:54:51'),
(9, NULL, 1, '2023-03-28 16:47:46', '2023-03-28 16:47:46'),
(10, NULL, 1, '2023-03-28 17:30:16', '2023-03-28 17:30:16'),
(11, NULL, 1, '2023-03-29 19:17:35', '2023-03-29 19:17:35'),
(12, NULL, 1, '2023-04-10 15:37:29', '2023-04-10 15:37:29'),
(13, NULL, 1, '2023-04-10 16:08:35', '2023-04-10 16:08:35'),
(14, NULL, 1, '2023-04-10 16:11:23', '2023-04-10 16:11:23'),
(15, NULL, 1, '2023-04-10 16:25:56', '2023-04-10 16:25:56'),
(16, NULL, 1, '2023-04-12 19:12:22', '2023-04-12 19:12:22'),
(17, NULL, 1, '2023-06-02 13:59:38', '2023-06-02 13:59:38'),
(18, NULL, 1, '2023-06-02 14:04:32', '2023-06-02 14:04:32'),
(19, NULL, 1, '2023-06-05 05:34:41', '2023-06-05 05:34:41'),
(20, NULL, 1, '2023-06-05 06:48:36', '2023-06-05 06:48:36'),
(21, NULL, 1, '2023-06-05 06:52:20', '2023-06-05 06:52:20'),
(22, NULL, 1, '2023-06-05 07:08:00', '2023-06-05 07:08:00'),
(23, NULL, 1, '2023-06-05 08:28:11', '2023-06-05 08:28:11'),
(24, NULL, 1, '2023-07-04 03:27:36', '2023-07-04 03:27:36'),
(25, NULL, 1, '2023-07-04 03:30:16', '2023-07-04 03:30:16'),
(26, NULL, 1, '2023-07-04 03:33:02', '2023-07-04 03:33:02'),
(27, NULL, 1, '2023-07-04 03:35:58', '2023-07-04 03:35:58'),
(28, 'erich@mailinator.com', 1, '2023-07-05 07:00:16', '2023-07-05 07:00:16'),
(29, 'cire@mailinator.com', 1, '2023-07-05 07:06:38', '2023-07-05 07:06:38'),
(30, 'Ainsley@gmail.com', 1, '2023-07-05 07:42:26', '2023-07-05 07:42:26'),
(31, NULL, 1, '2023-07-05 07:44:04', '2023-07-05 07:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Security Guards', '2023-03-06 16:52:47', '2023-03-06 17:06:50'),
(2, 'Armed Securities', '2023-03-15 14:52:09', '2023-03-15 14:52:09'),
(3, 'Event', '2023-03-15 14:52:17', '2023-03-15 14:52:17'),
(4, 'Orginization', '2023-03-15 14:52:29', '2023-03-15 14:52:29'),
(5, 'School', '2023-03-15 14:52:35', '2023-03-15 14:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', 'terms-conditions', '<p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', '2022-06-08 08:25:04', '2023-03-13 14:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_two` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `slug`, `content`, `content_two`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Need a Security Guard', 'need-a-security-guard', NULL, NULL, 'securityOne.png', '1', '2022-06-10 05:58:16', '2023-07-14 11:58:02'),
(2, 'How It Works', 'how-it-works', '<h2>How It Works</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'howItWorkImage.png', '1', '2022-06-10 07:03:52', '2023-03-10 16:56:09'),
(3, 'Browse Services', 'browse-services', '<p>Browse Services</p>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'guardTwo.jpg', '1', '2022-06-10 07:04:37', '2023-03-10 16:56:45'),
(6, 'Browse Quotes', 'browse-quotes', NULL, NULL, 'guardSix.jpg', '1', '2022-07-16 12:09:25', '2023-03-13 17:41:35'),
(7, 'Browse Companies', 'browse-companies', '<h2>Browse Companies</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'howItWorkImage.png', '1', '2023-03-10 16:58:15', '2023-03-10 16:58:15'),
(8, 'Blogs', 'blogs', '<h2>Blogs</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'joinNow.png', '1', '2023-03-10 17:00:25', '2023-03-10 17:00:25'),
(9, 'Successful With Business', 'successful-with-business', '<h2>Successful With Business</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'groupSecurityHeaderImage.png', '1', '2023-03-13 10:47:03', '2023-03-13 10:47:03'),
(10, 'Company', 'company', '<h2>Company&nbsp;</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'securityImageOne.png', '1', '2023-03-13 10:48:17', '2023-03-13 10:48:17'),
(11, 'Body Guard For Any Event', 'body-guard-for-any-event', '<h2>Body Guard For Any Event</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'securityCompanyThree.png', '1', '2023-03-13 10:49:00', '2023-03-13 10:49:00'),
(12, 'Group Security', 'group-security', '<h2>Group Security</h2>\r\n<quillbot-extension-portal></quillbot-extension-portal>', NULL, 'securityImageThree.png', '1', '2023-03-13 10:49:34', '2023-03-13 10:49:34'),
(13, 'faqs', 'faqs-banner', 'bannr', NULL, 'securityImageThree.png', '1', NULL, NULL),
(14, 'faqs', 'faqs-banner', 'bannr', NULL, 'securityImageThree.png', '1', NULL, NULL),
(15, 'Armed Security', 'armed-security', NULL, NULL, 'categoryCardThree.png', '1', '2023-07-18 12:26:47', '2023-07-18 12:26:47'),
(16, 'Group Security', 'group-security', NULL, NULL, 'categoryCardOne.png', '1', '2023-07-18 12:31:28', '2023-07-18 12:32:08'),
(17, 'Unarmed Security', 'unarmed-security', NULL, NULL, 'categoryCardFour.png', '1', '2023-07-18 12:33:13', '2023-07-18 12:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(119) DEFAULT NULL COMMENT '2=Guard, 3=client ',
  `total_credit_points` int(11) NOT NULL DEFAULT 0,
  `license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companyname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_rate` int(119) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `featured_status` int(11) NOT NULL DEFAULT 0,
  `show_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_password` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userlocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `username`, `slug`, `email`, `type`, `total_credit_points`, `license_no`, `slogan`, `companyname`, `starting_rate`, `description`, `language_id`, `tag_id`, `status`, `featured_status`, `show_status`, `email_verified_at`, `password`, `show_password`, `userlocation`, `image`, `contact`, `services`, `remember_token`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Admin', NULL, NULL, '', 'admin@guardhire.com', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$Hitc7Xlx09d3rROXvwVQ.e8nsnsVmsw8UPgeIvStKW6KNHYwtMTE.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(2, 'client 2', 'Lambert', 'dujawenuj', 'rhea-yn8j', 'client-2@mailinator.com', 3, 0, NULL, NULL, NULL, 45, NULL, NULL, NULL, '1', 0, 'OFF', NULL, '$2y$10$qeLnC7YxPDNcH1URrqVtVOSugWpu//Qp8DkZ7OxH3vHa2izn9ng7O', '123456', '2', 'Baharat-1.jpg', '(198) 361-2647', NULL, NULL, '2023-03-14 17:41:18', '2023-06-21 08:36:11', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'Guard', 'Vaughn', 'tumoliw', 'guard-sw8k', 'guard@gmail.com', 2, 17, '#kh67-1200', 'You Can if you think!', 'Proofpoint', 450, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', NULL, '[\"3\",\"5\"]', '1', 1, 'ON', NULL, '$2y$10$cL8e9O3JeNXeJ9tAGfvqROGIGq3Auv2387QMY7l0rv.mcaz5dF2OK', '123456', '11', 'nature.jpg', '(432) 432-3423', NULL, NULL, '2023-03-14 17:48:15', '2023-08-24 11:21:32', 0, 'avatar.png', 0, '#2180f3', NULL, NULL, NULL, NULL),
(4, 'Client', 'Washington', 'DerekMullins', 'client-0c5q', 'client@gmail.com', 3, 0, NULL, NULL, NULL, NULL, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '[\"2\"]', '[\"3\"]', '1', 1, 'OFF', NULL, '$2y$10$JKpgPja/M/kgm3JSOadqP.5zIV07aoLk1Ru4FWbZRUInQGbxN2AyG', '123456', '20', NULL, '(152) 965-6854', '13', NULL, '2023-03-14 17:51:48', '2023-07-27 10:29:25', 0, '5505c3b2-b197-4c86-b889-66ba141fb9eb.png', 0, '#2180f3', NULL, NULL, NULL, NULL),
(5, 'james', 'albert', 'jamesalbertt', 'james-wb5w', 'iamjamesalbertt@gmail.com', 2, 5, '#kh67-1200', 'come to feel comfort', 'feel comfort', 55, 'come to feel comfort', '[\"4\"]', '[\"3\"]', '1', 1, 'ON', NULL, '$2y$10$HfxCRzSqd3T50GoXFUiEnOgqlE.6XxGKZfaA2GLoimRglCwcbannS', '123456', '19', NULL, '(154) 197-4777', NULL, NULL, '2023-03-15 10:54:51', '2023-06-27 04:32:12', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'Jam', 'Oneal', 'Anastasia', 'jam-ojsp', 'test@gmail.com', 2, 5, '#98Ka-1', 'You Can if you think!', 'TesterMoniA', 78, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '[\"4\"]', '[\"2\"]', '1', 0, 'ON', NULL, '$2y$10$LKqOEK6eogzKj.MUHbgKreVqILPNNlrVbkml.BFdRPtKfx8F4bo1.', '123456', '5', NULL, '(899) 333-4653', NULL, NULL, '2023-03-28 16:47:46', '2023-06-21 08:35:14', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(20, 'Troy Hooper', 'Hart', 'sezovano', 'sezovano-vibl', 'test1@mailinator.com', 2, 0, NULL, NULL, NULL, 56, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$tNclMENmL9txmn9XNf49kucHfQ.gMCe7WS.Nb8CJaMNnolvZ7Ib0y', 'Pa$$w0rd!', '12', NULL, '+1 (256) 401-6672', NULL, NULL, '2023-06-02 13:59:38', '2023-06-02 13:59:38', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(21, 'Jolene Maxwell', 'Lynch', 'culilehif', 'culilehif-lhwt', 'user@mailinator.com', 2, 0, NULL, NULL, NULL, 300, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$CIlqS0m4gVqpLdDcAEVPxOrZHYT4dtcbPYUGkifZ9qHSl3wXQj15a', '123456', '27', NULL, '+1 (586) 963-2181', NULL, NULL, '2023-06-02 14:04:32', '2023-06-02 14:04:32', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(22, 'Ashton Shepard', 'Hill', 'nudyduduxa', 'nudyduduxa-0qng', 'hobs@gmail.com', 3, 0, NULL, NULL, NULL, NULL, 'Praesentium providen', '[\"2\"]', '[\"3\"]', '1', 0, NULL, NULL, '$2y$10$p1DAq1qB4ODOm8mEGTBddOoJYNUCvfpmpU/oE8pdgHQfnV1MPOFNq', 'Pa$$w0rd!', '5', NULL, '9316333111', '1', NULL, '2023-06-05 05:34:41', '2023-06-05 06:02:09', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(23, 'Colette', 'Hayden', 'teruxuna', 'teruxuna-vm4j', 'colette@gmail.com', 3, 0, NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '[\"2\"]', NULL, '1', 0, NULL, NULL, '$2y$10$N7ooRILBToxlUgHx0nbhreRKtV1hurpjNdAr5pBIf2ov583NmovGO', 'Pa$$w0rd!', '10', '1651889756.jpg', '+1 (116) 604-7117', '1', NULL, '2023-06-05 06:48:36', '2023-07-27 08:57:43', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(24, 'Ariana', 'Duffy', 'guxifal', 'guxifal-60ce', 'Ariana@gmail.com', 2, 0, NULL, NULL, NULL, 500, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$f/ymR4DgP8UcT0v/n.DM4uWv.o7hMOggcHcjqqEbBFTQykuAclsY6', 'Pa$$w0rd!', '21', NULL, '+1 (618) 123-1541', NULL, NULL, '2023-06-05 06:52:20', '2023-06-05 06:52:20', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(25, 'Bethany Bentley', 'Orr', 'budyda', 'budyda-d6jg', 'sydafepofe@mailinator.com', 2, 0, NULL, NULL, NULL, 250, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$uEh2p/nMD383mR/BEj70Wu2D5YX9T7CoqKud5LCbpR.8TXPadjxvC', 'Pa$$w0rd!', '31', NULL, '+1 (629) 943-2159', NULL, NULL, '2023-06-05 07:08:00', '2023-06-05 07:08:00', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(26, 'Ignacia', 'Holland', 'mivymafeqo', 'mivymafeqo-4o2z', 'holland@gmail.com', 2, 0, NULL, NULL, NULL, 150, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$eSapybuGxx9sCKnUBLVMF.Ec4Z1AtKImaIohn1exWtMZiSOVB1eKW', 'Pa$$w0rd!', '29', NULL, '+1 (462) 768-7442', NULL, NULL, '2023-06-05 08:28:11', '2023-06-05 08:28:11', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(27, 'Angela Bond', 'Ortiz', 'hykykuhyk', 'hykykuhyk-ncfi', 'maza@mailinator.com', 2, 0, NULL, NULL, NULL, 100, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$yPC1bzznrLAFA5JOOB03T.bueE8A9DxCR5dfBNo74gMf1Oy/zNU7i', 'Pa$$w0rd!', '15', NULL, '+1 (359) 746-7683', NULL, NULL, '2023-07-04 03:27:36', '2023-07-04 03:27:36', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(28, 'Nora', 'Mcclure', 'danopu', 'danopu-kljf', 'nora@gmail.com', 2, 0, '#98Ka-1', 'Ratione in ex cillum', 'AIRPORT SECURITY', 79, 'Voluptas officia rep', '[\"2\"]', '[\"2\"]', '1', 0, NULL, NULL, '$2y$10$XN5y.Oe4ajRLQaG5.UTThuKwGjY9RhC6HoXOA6f2x2h4q1E87iTKS', 'Pa$$w0rd!', '12', NULL, '(178) 683-9414', NULL, NULL, '2023-07-04 03:30:16', '2023-07-04 03:31:23', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(29, 'Finn Mathis', 'Whitley', 'xotuzinuhe', 'xotuzinuhe-bymy', 'moky@mailinator.com', 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$LeiSb9N8DWeZLOmn/7WBzOEYilHLjm1fHEzKxntxajL2b9kUYQBPu', 'Pa$$w0rd!', '31', NULL, '+1 (442) 601-1064', NULL, NULL, '2023-07-04 03:33:02', '2023-07-04 03:33:02', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(30, 'Honorato', 'Harper', 'relybykuwi', 'relybykuwi-ofpa', 'honorato@mailinator.com', 2, 0, NULL, NULL, 'Save Trading', 400, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$OjpUpoDSUq1.99R9/ESGOusfgSHeLhe4DzSItCps/ODGSaRBx1ij2', 'Pa$$w0rd!', '30', NULL, '+1 (659) 503-1232', NULL, NULL, '2023-07-04 03:35:58', '2023-07-04 03:35:58', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(31, 'Erich', 'Gilliam', 'qepiqax', 'qepiqax-nwfw', 'erich@mailinator.com', 2, 0, '#98Ka-1', 'You Can if you think!', 'Erich-Secuirity', 23, 'n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is availablen publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', '[\"2\"]', '[\"2\"]', '1', 0, NULL, NULL, '$2y$10$Tzn3tHH7MAC33uOnSdU07uj0aCzfheMH6l5NZP9fEkf2JOajpPC7C', 'Pa$$w0rd!', '17', 'Asset13.png', '+1 (365) 928-4461', NULL, NULL, '2023-07-05 07:00:16', '2023-07-05 07:05:59', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(32, 'Uriah Rollins', 'Ewing', 'zonolidu', 'zonolidu-ncyu', 'cire@mailinator.com', 2, 0, '#98Ka-1', 'You Can if you think!', 'NewJob-Secure', 21, 'hello', NULL, NULL, '1', 0, NULL, NULL, '$2y$10$Y3Vh1K5eBFRjWO5SJ0psweb/R.g2Pmm0oER4J/iIEP/nH8GTbiv06', 'Pa$$w0rd!', '28', 'Asset14.png', '+1 (257) 811-1876', NULL, NULL, '2023-07-05 07:06:38', '2023-07-05 07:15:58', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(33, 'Ainsley Fulton', 'Gilliam', 'AinsleyFulton', 'ainsleyfulton-rnpl', 'Ainsley@gmail.com', 2, 0, NULL, NULL, 'Mountain Security', 450, NULL, NULL, NULL, '1', 0, NULL, NULL, '$2y$10$xpbZgsHE9a4B0PqlZyMMdOdkx/WbP4OXepcWdZLaXUi8EdKqdHm2i', '@Admin!23#', '16', 'Bash_history.jpg', '(021) 321-3312', NULL, NULL, '2023-07-05 07:42:26', '2023-07-05 07:42:26', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL),
(34, 'William Curtis', 'Warren', 'nedyra', 'nedyra-ci4h', 'hyliw@mailinator.com', 2, 0, '#98Ka-1', 'You fly if you think!', 'Orr Garner Co', 23, 'n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', NULL, NULL, '1', 0, NULL, NULL, '$2y$10$GEbN/tAtLRdWPC76N8IRq.UfgQErrwWzWvs1mi4oU61KkzVgfftNi', 'Pa$$w0rd!', '7', '2ygv7ssy2k0lxlzu.jpg', '+1 (428) 261-8796', NULL, NULL, '2023-07-05 07:44:04', '2023-07-05 07:44:49', 0, 'avatar.png', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

CREATE TABLE `user_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `guard_job_id` int(119) DEFAULT NULL,
  `client_job_id` int(119) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`id`, `user_id`, `language_id`, `guard_job_id`, `client_job_id`, `created_at`, `updated_at`) VALUES
(2, 4, 5, NULL, 6, '2023-07-27 10:30:45', '2023-07-27 10:30:45'),
(5, 4, 2, NULL, 4, '2023-07-27 10:33:50', '2023-07-27 10:33:50'),
(6, 4, 1, NULL, 3, '2023-07-27 10:34:05', '2023-07-27 10:34:05'),
(7, 4, 5, NULL, 2, '2023-07-27 10:34:17', '2023-07-27 10:34:17'),
(10, 3, 2, 27, NULL, '2023-07-27 11:02:10', '2023-07-27 11:02:10'),
(11, 3, 1, 26, NULL, '2023-07-27 11:04:54', '2023-07-27 11:04:54'),
(12, 3, 4, 26, NULL, '2023-07-27 11:04:54', '2023-07-27 11:04:54'),
(13, 4, 1, NULL, 5, '2023-07-27 12:38:50', '2023-07-27 12:38:50'),
(14, 3, 4, 29, NULL, '2023-08-22 07:23:30', '2023-08-22 07:23:30'),
(15, 4, 2, NULL, 7, '2023-08-22 10:42:14', '2023-08-22 10:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `locations` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_job_id` int(119) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `locations`, `guard_job_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '11', NULL, '1', '2022-10-18 18:47:59', '2023-06-02 09:45:10'),
(2, 5, '19', NULL, '1', '2022-10-19 18:38:41', '2023-06-02 09:45:24'),
(3, 9, '21', NULL, '1', '2022-10-20 17:16:58', '2023-04-10 15:37:29'),
(4, 10, '9', NULL, '1', '2022-10-20 17:58:10', '2023-04-10 16:08:35'),
(5, 11, '7', NULL, '1', '2022-10-20 17:58:37', '2023-04-10 16:11:23'),
(6, 12, '25', NULL, '1', '2022-10-20 18:05:12', '2023-04-10 16:25:56'),
(7, 13, '15', NULL, '1', '2022-10-20 20:13:56', '2023-04-12 19:12:22'),
(8, 18, '[\"12\",\"17\",\"15\"]', NULL, '1', '2022-10-21 13:49:17', '2022-10-21 14:36:40'),
(9, 19, '[\"12\"]', NULL, '1', '2022-10-21 13:50:39', '2022-10-21 14:07:43'),
(10, 20, '12', NULL, '1', '2022-10-21 14:07:23', '2023-06-02 13:59:38'),
(11, 23, '10', NULL, '1', '2022-10-25 16:45:16', '2023-06-05 06:48:36'),
(12, 26, '29', NULL, '1', '2022-10-28 10:42:17', '2023-06-05 08:28:11'),
(13, 27, '15', NULL, '1', '2022-10-28 10:44:38', '2023-07-04 03:27:36'),
(14, 28, '14', NULL, '1', '2022-10-28 11:36:22', '2023-07-04 03:30:16'),
(15, 29, '31', NULL, '1', '2022-10-28 11:39:36', '2023-07-04 03:33:02'),
(16, 30, '30', NULL, '1', '2022-10-28 11:44:41', '2023-07-04 03:35:58'),
(17, 31, '17', NULL, '1', '2022-10-28 12:02:56', '2023-07-05 07:00:16'),
(18, 32, '28', NULL, '1', '2022-10-28 12:05:16', '2023-07-05 07:06:38'),
(19, 33, '16', NULL, '1', '2022-10-28 12:14:46', '2023-07-05 07:42:26'),
(20, 34, '7', NULL, '1', '2022-10-28 13:06:00', '2023-07-05 07:44:04'),
(21, 35, '[\"19\"]', NULL, '1', '2022-10-28 14:08:37', '2022-10-28 14:08:37'),
(22, 56, '[\"3\",\"12\",\"4\"]', NULL, '1', '2022-11-01 17:24:44', '2022-11-02 12:12:05'),
(23, 57, '[\"4\",\"9\"]', NULL, '1', '2022-11-02 10:06:55', '2022-11-02 12:00:13'),
(24, 60, '[\"17\",\"19\"]', NULL, '1', '2022-11-03 14:04:40', '2022-11-03 14:04:40'),
(25, 61, '[\"4\"]', NULL, '1', '2022-11-03 14:05:21', '2022-11-03 14:05:21'),
(26, 62, '[\"19\"]', NULL, '1', '2022-11-03 14:21:38', '2022-11-03 14:21:38'),
(27, 65, '[\"4\",\"9\"]', NULL, '1', '2022-11-03 14:55:47', '2022-11-03 17:23:18'),
(28, 66, '[\"17\",\"4\"]', NULL, '1', '2022-11-03 15:07:01', '2022-11-03 15:07:28'),
(29, 67, '[\"4\",\"15\"]', NULL, '1', '2022-11-03 16:56:23', '2022-11-03 16:56:23'),
(30, 69, 'Nevada', NULL, '1', '2023-03-02 18:40:42', '2023-03-02 18:40:42'),
(31, 70, '2', NULL, '1', '2023-03-14 17:41:18', '2023-03-14 17:41:18'),
(32, 4, '20', NULL, '1', '2023-03-14 17:51:48', '2023-06-02 09:45:17'),
(33, 2, '2', NULL, '1', '2023-03-27 15:22:18', '2023-06-06 13:38:52'),
(34, 6, '5', NULL, '1', '2023-03-28 16:47:46', '2023-06-02 09:44:43'),
(35, 7, '28', NULL, '1', '2023-03-28 17:30:16', '2023-03-28 17:30:16'),
(36, 8, '32', NULL, '1', '2023-03-29 19:17:35', '2023-03-29 19:17:35'),
(37, 21, '27', NULL, '1', '2023-06-02 14:04:32', '2023-06-02 14:04:32'),
(38, 22, '1', NULL, '1', '2023-06-05 05:34:41', '2023-06-05 05:34:41'),
(39, 24, '21', NULL, '1', '2023-06-05 06:52:20', '2023-06-05 06:52:20'),
(40, 25, '31', NULL, '1', '2023-06-05 07:08:00', '2023-06-05 07:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `services`, `created_at`, `updated_at`) VALUES
(1, '5', '[\"2\",\"6\",\"10\",\"13\",\"14\",\"16\",\"21\",\"23\",\"24\",\"26\",\"28\",\"29\",\"32\"]', '2022-10-19 12:33:26', '2022-10-19 12:33:26'),
(2, '6', '[\"1\",\"4\"]', '2022-10-20 14:29:53', '2022-10-20 19:42:01'),
(3, '4', '[\"1\",\"2\",\"6\",\"7\",\"8\",\"10\",\"11\",\"16\",\"17\",\"19\",\"20\",\"21\",\"22\",\"23\",\"25\",\"30\"]', '2022-10-21 11:17:16', '2022-10-21 15:35:37'),
(4, '14', '[\"1\",\"2\",\"5\",\"9\",\"11\",\"15\",\"16\",\"17\",\"23\",\"24\",\"26\",\"27\",\"29\",\"30\",\"31\"]', '2022-10-21 11:26:12', '2022-10-21 11:49:44'),
(5, '15', '[\"4\",\"6\",\"8\",\"10\",\"13\",\"15\",\"16\",\"17\",\"19\",\"20\",\"21\",\"22\",\"23\",\"25\",\"26\",\"30\",\"31\",\"32\"]', '2022-10-21 11:40:56', '2022-10-21 11:46:57'),
(6, '16', '[\"1\",\"4\",\"5\",\"8\",\"9\",\"10\",\"11\",\"16\",\"17\",\"19\",\"22\",\"26\",\"28\",\"29\",\"32\"]', '2022-10-21 11:43:52', '2022-10-21 11:43:52'),
(7, '17', '[\"6\",\"10\",\"11\",\"14\",\"15\",\"19\",\"20\",\"21\",\"24\",\"27\",\"29\",\"30\",\"31\",\"32\"]', '2022-10-21 12:28:02', '2022-10-21 12:28:02'),
(8, '21', '[\"3\",\"8\",\"9\",\"10\",\"15\",\"19\",\"28\",\"30\",\"31\"]', '2022-10-24 17:44:28', '2022-10-24 17:44:28'),
(9, '22', '[\"1\",\"4\",\"8\",\"9\",\"10\",\"11\",\"14\",\"19\",\"20\",\"22\",\"23\",\"24\",\"27\",\"28\"]', '2022-10-24 17:46:21', '2022-10-24 17:46:21'),
(10, '24', '[\"1\",\"2\",\"5\",\"9\",\"11\",\"12\",\"14\",\"16\",\"18\",\"19\",\"24\",\"26\",\"27\",\"30\"]', '2022-10-25 16:45:53', '2022-10-25 16:45:53'),
(11, '25', '[\"3\",\"7\",\"8\",\"9\",\"10\",\"13\",\"14\",\"16\",\"17\",\"18\",\"20\",\"22\",\"23\",\"24\",\"25\",\"29\",\"30\",\"31\",\"32\"]', '2022-10-25 16:46:03', '2022-10-25 16:46:03'),
(12, '36', '[\"2\",\"4\",\"5\",\"6\",\"7\",\"12\",\"15\",\"18\",\"19\",\"21\",\"23\",\"24\",\"25\",\"31\"]', '2022-10-28 18:39:03', '2022-10-28 18:39:03'),
(13, '58', '[\"2\",\"3\",\"6\",\"8\",\"10\",\"11\",\"14\",\"15\",\"17\",\"18\",\"21\",\"23\",\"25\",\"26\",\"28\",\"30\",\"31\"]', '2022-11-02 13:54:57', '2022-11-02 13:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_tags`
--

CREATE TABLE `user_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `guard_job_id` int(11) DEFAULT NULL,
  `client_job_id` int(119) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_tags`
--

INSERT INTO `user_tags` (`id`, `user_id`, `tag_id`, `guard_job_id`, `client_job_id`, `created_at`, `updated_at`) VALUES
(2, 4, 3, NULL, 6, '2023-07-27 10:30:45', '2023-07-27 10:30:45'),
(5, 4, 4, NULL, 4, '2023-07-27 10:33:50', '2023-07-27 10:33:50'),
(6, 4, 3, NULL, 4, '2023-07-27 10:33:50', '2023-07-27 10:33:50'),
(7, 4, 3, NULL, 3, '2023-07-27 10:34:05', '2023-07-27 10:34:05'),
(8, 4, 5, NULL, 3, '2023-07-27 10:34:05', '2023-07-27 10:34:05'),
(9, 4, 4, NULL, 2, '2023-07-27 10:34:17', '2023-07-27 10:34:17'),
(10, 4, 3, NULL, 2, '2023-07-27 10:34:17', '2023-07-27 10:34:17'),
(12, 3, 5, 27, NULL, '2023-07-27 11:02:10', '2023-07-27 11:02:10'),
(13, 3, 3, 27, NULL, '2023-07-27 11:02:10', '2023-07-27 11:02:10'),
(14, 3, 2, 26, NULL, '2023-07-27 11:04:54', '2023-07-27 11:04:54'),
(15, 3, 4, 26, NULL, '2023-07-27 11:04:54', '2023-07-27 11:04:54'),
(16, 4, 3, NULL, 5, '2023-07-27 12:38:50', '2023-07-27 12:38:50'),
(17, 3, 2, 29, NULL, '2023-08-22 07:23:30', '2023-08-22 07:23:30'),
(18, 4, 3, NULL, 7, '2023-08-22 10:42:14', '2023-08-22 10:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_management`
--

CREATE TABLE `vendor_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bussinessCategory` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faeture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_socials`
--

CREATE TABLE `vendor_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_socials`
--

INSERT INTO `vendor_socials` (`id`, `user_id`, `type`, `social_media`, `slug`, `created_at`, `updated_at`) VALUES
(1, 3, '1', 'https://www.facebook.com/', 'httpswwwfacebookcom', '2022-10-19 17:23:32', '2022-10-19 17:23:32'),
(2, 3, '2', 'https://Instagram.com/', 'httpsinstagramcom', '2022-10-19 17:23:45', '2022-10-19 17:23:45'),
(3, 3, '3', 'https://twitter.com/', 'httpstwittercom', '2022-10-19 17:23:57', '2022-10-19 17:23:57'),
(4, 3, '4', 'https://www.youtube.com/', 'httpswwwyoutubecom', '2022-10-19 17:24:12', '2022-10-19 17:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `weddings`
--

CREATE TABLE `weddings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(119) DEFAULT NULL,
  `ceremony` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bride_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `groom_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weddings`
--

INSERT INTO `weddings` (`id`, `user_id`, `ceremony`, `service`, `vendor`, `title`, `title2`, `bride`, `bride_last_name`, `groom`, `groom_last_name`, `slug`, `content`, `content2`, `content3`, `image`, `image2`, `status`, `created_at`, `updated_at`, `location`, `date`) VALUES
(51, 16, '1', '[\"3\"]', '[\"57\"]', NULL, NULL, 'Kylynn', 'Leila', 'Kendall', 'Hadley', 'kendall-8v4c', '<p>aa</p>', NULL, NULL, NULL, NULL, '1', '2022-11-02 16:33:26', '2022-11-02 16:33:26', 'Maite', '2022-11-03'),
(53, 22, '1', '[\"4\"]', '[\"11\"]', NULL, NULL, 'Casey', 'Kimberley', 'Todd', 'Murphy', 'todd-imrq', '<p>adads</p>', NULL, NULL, '2022-11-02__1667424867__3973219e6e53cd380577a67f1e487422.jpg', NULL, '1', '2022-11-02 16:34:27', '2022-11-02 16:34:27', 'Kirsten', '2022-11-03'),
(54, 4, '1', '[\"4\"]', '[\"11\"]', NULL, NULL, 'Xaviera', 'Dara', 'Karly', 'Jessamine', 'karly-dbpt', '<p>adadsads</p>', NULL, NULL, NULL, NULL, '1', '2022-11-03 14:03:49', '2022-11-03 14:03:49', 'Ima', '2022-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `guard_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `guard_id`, `job_id`, `status`, `created_at`, `updated_at`) VALUES
(17, 4, 3, 12, 0, '2023-07-27 12:22:02', '2023-07-31 10:09:41'),
(29, 4, 3, 20, 0, '2023-07-31 10:11:38', '2023-07-31 10:12:00'),
(30, 2, 3, 25, 0, '2023-07-31 11:44:08', '2023-07-31 11:45:04'),
(31, 2, 3, 27, 0, '2023-07-31 11:44:32', '2023-07-31 11:45:00'),
(32, 2, 3, 26, 0, '2023-07-31 11:46:55', '2023-07-31 11:47:10'),
(34, 2, 3, 10, 0, '2023-07-31 13:09:24', '2023-07-31 13:09:32'),
(35, 2, 3, 24, 0, '2023-07-31 13:36:59', '2023-07-31 13:37:38'),
(36, 2, 3, 23, 0, '2023-07-31 13:43:39', '2023-07-31 13:43:49'),
(39, 2, 3, 12, 1, '2023-08-01 10:04:54', '2023-08-01 10:04:54'),
(40, 4, 3, 27, 1, '2023-08-22 11:57:15', '2023-08-22 11:57:15'),
(41, 4, 3, 29, 0, '2023-08-22 11:57:21', '2023-08-23 13:28:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_vendors`
--
ALTER TABLE `about_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_vendors`
--
ALTER TABLE `book_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_hired_companies`
--
ALTER TABLE `client_hired_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_hired_listing_services`
--
ALTER TABLE `client_hired_listing_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_post_jobs`
--
ALTER TABLE `client_post_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_rating_by_guards`
--
ALTER TABLE `client_rating_by_guards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_ratings`
--
ALTER TABLE `company_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_wishlists`
--
ALTER TABLE `company_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_management`
--
ALTER TABLE `contact_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engagements`
--
ALTER TABLE `engagements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_management`
--
ALTER TABLE `event_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `featured_clients`
--
ALTER TABLE `featured_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_guards`
--
ALTER TABLE `featured_guards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard_credit_points`
--
ALTER TABLE `guard_credit_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard_jobs`
--
ALTER TABLE `guard_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard_types`
--
ALTER TABLE `guard_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_managers`
--
ALTER TABLE `logo_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypalpayments`
--
ALTER TABLE `paypalpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_plans`
--
ALTER TABLE `paypal_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_products`
--
ALTER TABLE `paypal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stripe_packages`
--
ALTER TABLE `stripe_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcriptions`
--
ALTER TABLE `subcriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `user_languages`
--
ALTER TABLE `user_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tags`
--
ALTER TABLE `user_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_management`
--
ALTER TABLE `vendor_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_socials`
--
ALTER TABLE `vendor_socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weddings`
--
ALTER TABLE `weddings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_vendors`
--
ALTER TABLE `about_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_vendors`
--
ALTER TABLE `book_vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `client_hired_companies`
--
ALTER TABLE `client_hired_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_hired_listing_services`
--
ALTER TABLE `client_hired_listing_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `client_post_jobs`
--
ALTER TABLE `client_post_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_rating_by_guards`
--
ALTER TABLE `client_rating_by_guards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `company_ratings`
--
ALTER TABLE `company_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_wishlists`
--
ALTER TABLE `company_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_management`
--
ALTER TABLE `contact_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `engagements`
--
ALTER TABLE `engagements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_management`
--
ALTER TABLE `event_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `featured_clients`
--
ALTER TABLE `featured_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `featured_guards`
--
ALTER TABLE `featured_guards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guard_credit_points`
--
ALTER TABLE `guard_credit_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `guard_jobs`
--
ALTER TABLE `guard_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `guard_types`
--
ALTER TABLE `guard_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `logo_managers`
--
ALTER TABLE `logo_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `paypalpayments`
--
ALTER TABLE `paypalpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paypal_plans`
--
ALTER TABLE `paypal_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paypal_products`
--
ALTER TABLE `paypal_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stripe_packages`
--
ALTER TABLE `stripe_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcriptions`
--
ALTER TABLE `subcriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_languages`
--
ALTER TABLE `user_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_tags`
--
ALTER TABLE `user_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `vendor_management`
--
ALTER TABLE `vendor_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor_socials`
--
ALTER TABLE `vendor_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `weddings`
--
ALTER TABLE `weddings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
