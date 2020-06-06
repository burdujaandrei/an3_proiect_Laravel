-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 09:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_home`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteArchive` (IN `var_id` INT)  BEGIN
       DELETE FROM archive WHERE id=var_id;
       END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetArchive` (IN `var_id` INT)  BEGIN
        SELECT * FROM archive WHERE id = var_id;
        END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetArchives` ()  BEGIN
            SELECT* FROM archive;
            END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertArchive` (IN `var_title` VARCHAR(255), IN `var_content` VARCHAR(255), IN `var_image` VARCHAR(50))  BEGIN
       INSERT INTO archive(title, content, image)
       VALUES(var_title, var_content, var_image);
       END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateArchive` (IN `var_id` INT, IN `var_title` VARCHAR(255), IN `var_content` VARCHAR(255), IN `var_image` VARCHAR(50))  BEGIN
       UPDATE archive SET title=var_title, content = var_content, image=var_image WHERE id=var_id;
       END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'The title on the article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor. Sed accumsan libero quis mi commodo et suscipit enim lacinia. Morbi rutrum vulputate est sed faucibus.', '5167b54fc5ff14029ea69119a4418e228.jpg', NULL, NULL),
(2, 'The title on the article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor. Sed accumsan libero quis mi commodo et suscipit enim lacinia. Morbi rutrum vulputate est sed faucibus.', '909c90463f16d1a2b4261b17d871280e9.jpg', NULL, NULL),
(3, 'The title on the article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor. Sed accumsan libero quis mi commodo et suscipit enim lacinia. Morbi rutrum vulputate est sed faucibus.', 'd2659e2b8c86331b0b3dc91523a158a310.jpg', NULL, NULL),
(6, 'Ramada', 'asscas', '0171115ea9828f5e1cf2c18db41b5a60unnamed (1).jpg', NULL, NULL);

--
-- Triggers `archive`
--
DELIMITER $$
CREATE TRIGGER `DeleteTriggerTrigger` AFTER DELETE ON `archive` FOR EACH ROW BEGIN
            INSERT INTO archive_updated(title, content, status) VALUES(OLD.title, OLD.content, "DELETED");
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `InsertTriggerTrigger` AFTER INSERT ON `archive` FOR EACH ROW BEGIN
            INSERT INTO `archive_updated` (`title`,`content`,`status`) VALUES (NEW.title,NEW.content,'INSERTED');
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateTriggerTrigger` AFTER UPDATE ON `archive` FOR EACH ROW BEGIN
            INSERT INTO archive_updated(title, content, status) VALUES(NEW.title, NEW.content, "UPDATED");
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `archive_updated`
--

CREATE TABLE `archive_updated` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive_updated`
--

INSERT INTO `archive_updated` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The title on the article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor. Sed accumsan libero quis mi commodo et suscipit enim lacinia. Morbi rutrum vulputate est sed faucibus.', 'INSERTED', NULL, NULL),
(2, 'The title on the article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor. Sed accumsan libero quis mi commodo et suscipit enim lacinia. Morbi rutrum vulputate est sed faucibus.', 'INSERTED', NULL, NULL),
(3, 'The title on the article', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra convallis auctor. Sed accumsan libero quis mi commodo et suscipit enim lacinia. Morbi rutrum vulputate est sed faucibus.', 'INSERTED', NULL, NULL),
(4, 'Ramada', 'vghyju', 'INSERTED', NULL, NULL),
(5, 'Ramada', 'vghyju', 'DELETED', NULL, NULL),
(6, 'test', 'ascdf', 'INSERTED', NULL, NULL),
(7, 'test', 'sddddddddd', 'UPDATED', NULL, NULL),
(8, 'test', 'sddddddddd', 'UPDATED', NULL, NULL),
(9, 'test', 'sddddddddd', 'DELETED', NULL, NULL),
(10, 'Ramada', 'asscas', 'INSERTED', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_05_31_182008_create_archive_table', 2),
(5, '2020_05_31_185926_create_images_table', 3),
(6, '2020_05_31_190231_create_archive_table', 4),
(20, '2020_06_06_090541_create_insert_procedure', 5),
(95, '2014_10_12_000000_create_users_table', 6),
(96, '2019_08_19_000000_create_failed_jobs_table', 6),
(97, '2020_05_31_173113_create_contact_us_table', 6),
(98, '2020_05_31_195424_create_images_table', 6),
(99, '2020_06_06_091543_create_archive_table', 6),
(100, '2020_06_06_092602_create__get_archives_procedure', 6),
(101, '2020_06_06_093342_create__insert_archive_procedure', 6),
(102, '2020_06_06_120223_create__get_archive_procedure', 6),
(103, '2020_06_06_125831_create__update_archive_procedure', 6),
(104, '2020_06_06_125851_create__delete_archive_procedure', 6),
(105, '2020_06_06_175009_create__insert_trigger_trigger', 6),
(106, '2020_06_06_175022_create__update_trigger_trigger', 6),
(107, '2020_06_06_175035_create__delete_trigger_trigger', 6),
(108, '2020_06_06_175932_create_archive_updated_table', 6);

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

-- --------------------------------------------------------

--
-- Table structure for table `_delete_archive_procedure`
--

CREATE TABLE `_delete_archive_procedure` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `_update_archive_procedure`
--

CREATE TABLE `_update_archive_procedure` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_updated`
--
ALTER TABLE `archive_updated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `_delete_archive_procedure`
--
ALTER TABLE `_delete_archive_procedure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `_update_archive_procedure`
--
ALTER TABLE `_update_archive_procedure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `archive_updated`
--
ALTER TABLE `archive_updated`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_delete_archive_procedure`
--
ALTER TABLE `_delete_archive_procedure`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `_update_archive_procedure`
--
ALTER TABLE `_update_archive_procedure`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
