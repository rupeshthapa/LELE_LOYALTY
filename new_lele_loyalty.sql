-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 12:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_lele_loyalty`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'About Lele Ventures', 'Lele Ventures Pvt. Ltd., established in 2016, is a leading IT company dedicated to providing innovative and high-quality solutions in software development, mobile application development, web development, social media marketing, and content creation. With over 8 years of experience, we have successfully catered to over 500 multi-category businesses across Nepal and India. Our team of skilled IT professionals is continuously evolving, enhancing our technical expertise to deliver the best possible solutions to our clients. We take pride in offering cost-effective, cutting-edge technology that helps businesses improve their performance and achieve their goals. Our commitment to customer satisfaction, technical excellence, and corporate values is what drives our success, making Lele Ventures a trusted partner for businesses aiming to thrive in the digital age. The diversity and impact of our projects showcase our ability to combine technology with strategy, delivering remarkable results that set our clients apart in the market.', 'about_images/1750415147_6855372b5d5a2.jpg', 'about-lele-ventures', '2025-06-09 05:52:03', '2025-06-22 01:13:07'),
(3, 'About Lele Loyalty', 'At Lele Ventures, we understand the power of customer loyalty in driving business success. That\'s why we developed Lele Loyalty – an innovative platform designed to help businesses increase customer engagement, build stronger relationships, and drive repeat business. By offering access to cutting-edge tools and insights, Lele Loyalty enables businesses to better understand their customers, develop personalized strategies, and stay ahead of industry trends. Our platform is designed to seamlessly integrate with your existing systems, ensuring that every customer interaction strengthens your bond with them. With a focus on long-term growth and increased profitability, Lele Loyalty is a valuable asset that will help your business exceed expectations, foster loyalty, and create lasting value. The program is built to be scalable and flexible, allowing businesses to thrive in a competitive marketplace while enjoying ongoing customer retention.', 'about_images/1750415171_685537433a6fc.jpg', 'about-lele-loyalty', '2025-06-09 05:52:56', '2025-06-20 04:41:11'),
(4, 'Lele Reward & Loyalty App', 'At Lele Ventures, we understand the power of customer loyalty in driving business success. That\'s why we developed Lele Loyalty – an innovative platform designed to help businesses increase customer engagement, build stronger relationships, and drive repeat business. By offering access to cutting-edge tools and insights, Lele Loyalty enables businesses to better understand their customers, develop personalized strategies, and stay ahead of industry trends. Our platform is designed to seamlessly integrate with your existing systems, ensuring that every customer interaction strengthens your bond with them. With a focus on long-term growth and increased profitability, Lele Loyalty is a valuable asset that will help your business exceed expectations, foster loyalty, and create lasting value. The program is built to be scalable and flexible, allowing businesses to thrive in a competitive marketplace while enjoying ongoing customer retention.', 'about_images/1750415256_6855379845841.webp', 'lele-reward-loyalty-app', '2025-06-09 05:54:08', '2025-06-20 04:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_read` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `organization_name`, `email`, `phone_number`, `address`, `country`, `message`, `slug`, `created_at`, `updated_at`, `is_read`) VALUES
(1, 'Chanauli Branch (6th Showroom))asdf', 'Ecommerce Website', 'saugatkumal452@gmail.com', '9814000000', 'asd', 'Nepal', 'sfsfdgsfgsdfg', 'chanauli-branch-6th-showroomasdf', '2025-06-13 05:25:32', '2025-06-19 02:02:29', 'read'),
(2, 'Nero Kaufman', 'Kirby and Macdonald Associates', 'kavifipuw@mailinator.com', '418', 'Eaque a quas sit par', 'In ad delectus face', 'Qui enim velit aspe', 'nero-kaufman', '2025-06-13 05:26:28', '2025-06-19 02:02:39', 'read'),
(3, 'Valentine Herring', 'Jones and Decker Co', 'bovagulu@mailinator.com', '909', 'Magnam vitae error r', 'Ut nostrum et nostru', 'Sint ipsum enim cons', 'valentine-herring', '2025-06-13 05:30:53', '2025-06-19 04:49:26', 'read'),
(4, 'Zachery Gonzalez', 'Whitley and Stafford Inc', 'tazocuba@mailinator.com', '523', 'Proident qui et qui', 'Eum consectetur adi', 'Repudiandae incididu', 'zachery-gonzalez', '2025-06-13 05:32:45', '2025-06-20 04:56:58', 'read'),
(5, 'Kaden Grant', 'Hernandez and Gallegos LLC', 'vivipixub@mailinator.com', '293', 'Hic anim reprehender', 'Dolores nulla laboru', 'Sunt enim et aut nes', 'kaden-grant', '2025-06-13 05:33:46', '2025-06-20 04:57:05', 'read'),
(6, 'Rajah Nelson', 'Mccarthy Gilmore Trading', 'pigilikuco@mailinator.com', '934', 'Cupidatat magni elig', 'Ut ipsa quas ut aut', 'Iste aliqua Aliquid', 'rajah-nelson', '2025-06-13 05:35:55', '2025-06-22 00:06:04', 'read'),
(7, 'Macaulay Hughes', 'Fox and Rush LLC', 'tukimimad@mailinator.com', '807', 'Ullamco voluptatum c', 'Sunt facilis facili', 'Facere dolore aliqua', 'macaulay-hughes', '2025-06-13 05:36:31', '2025-06-22 00:06:04', 'read'),
(8, 'Regan Jackson', 'Maddox Mcguire Co', 'xuwevugoze@mailinator.com', '18', 'Proident nulla amet', 'Id fugit voluptatib', 'Sunt mollitia fugit', 'regan-jackson', '2025-06-13 05:36:45', '2025-06-22 00:06:04', 'read'),
(9, 'Abbot Haynes', 'Gallegos and Short Associates', 'xirujyr@mailinator.com', '41', 'Porro totam nesciunt', 'Tempora repellendus', 'Dolores in voluptas', 'abbot-haynes', '2025-06-13 05:37:16', '2025-06-22 00:06:04', 'read'),
(10, 'Desirae Haley', 'Crosby and Finley Trading', 'zawygoka@mailinator.com', '749', 'Corrupti obcaecati', 'Et in id molestiae', 'Tempor rerum sunt i', 'desirae-haley', '2025-06-18 03:31:56', '2025-06-22 00:06:04', 'read'),
(11, 'Jonas Bartlett', 'Graham Calderon Traders', 'xerevihuh@mailinator.com', '265', 'Nihil amet cumque e', 'Consequatur odio pr', 'Ut itaque perspiciat', 'jonas-bartlett', '2025-06-18 23:32:50', '2025-06-22 00:06:04', 'read'),
(12, 'Drew Cooke', 'Mcknight Carroll LLC', 'refi@mailinator.com', '503', 'Et explicabo Eiusmo', 'Natus minim tempora', 'Et veritatis et cons', 'drew-cooke', '2025-06-19 01:33:36', '2025-06-22 00:06:04', 'read'),
(13, 'Norman Richardson', 'Tucker and Good LLC', 'jizaty@mailinator.com', '331', 'Velit culpa blandit', 'Modi sunt adipisicin', 'Culpa architecto fa', 'norman-richardson', '2025-06-19 01:55:50', '2025-06-22 00:06:04', 'read'),
(14, 'Myles Francis', 'Fletcher Stephenson Trading', 'lonew@mailinator.com', '966', 'Ea at quia neque nob', 'Non nihil similique', 'Officia aut ad paria', 'myles-francis', '2025-06-19 04:13:01', '2025-06-22 00:06:04', 'read'),
(15, 'Amos Nixon', 'Edwards and Skinner Plc', 'hohibo@mailinator.com', '101', 'Animi consectetur', 'Nulla ad rerum facer', 'Est voluptate quod', 'amos-nixon', '2025-06-19 04:32:17', '2025-06-22 00:06:04', 'read'),
(16, 'Nicholas Mccoy', 'Robles and Cox LLC', 'posiqagaqy@mailinator.com', '872', 'Sit a tenetur volupt', 'Nobis sed natus ut p', 'Culpa consequat Do', 'nicholas-mccoy', '2025-06-19 04:49:07', '2025-06-22 00:06:04', 'read'),
(17, 'Grady Riggs', 'Roman Trujillo Associates', 'tygewura@mailinator.com', '110', 'Enim culpa reprehend', 'Nihil qui autem quae', 'Aliquid expedita ut', 'grady-riggs', '2025-06-21 23:49:47', '2025-06-22 00:06:04', 'read'),
(18, 'Karleigh Barber', 'Hinton Buck Plc', 'carocah@mailinator.com', '562', 'Ea quaerat quis nost', 'Molestias doloribus', 'Sunt quae debitis si', 'karleigh-barber', '2025-06-22 00:10:03', '2025-06-22 00:19:39', 'read'),
(19, 'Bree Torres', 'Chen and Bennett Plc', 'tyzumelo@mailinator.com', '135', 'Provident ex deseru', 'Quo veritatis rerum', 'Excepturi praesentiu', 'bree-torres', '2025-06-22 00:13:18', '2025-06-22 00:19:39', 'read'),
(20, 'Jaden Hurst', 'Mann and Dorsey Traders', 'qimexyzyb@mailinator.com', '621', 'Dolores eaque tempor', 'Sint saepe enim et', 'Et aspernatur necess', 'jaden-hurst', '2025-06-22 00:19:20', '2025-06-22 00:19:39', 'read'),
(22, 'Grant Houston', 'Banks Alvarado Traders', 'zosasep@mailinator.com', '746', 'Minima et voluptate', 'Earum voluptas sequi', 'Dolorem nemo id rep', 'grant-houston', '2025-06-22 00:31:45', '2025-06-22 00:41:11', 'read'),
(23, 'Aaron Park', 'Obrien Brennan Co', 'xelijixe@mailinator.com', '695', 'Qui lorem iure in di', 'Alias anim voluptate', 'Amet esse culpa ni', 'aaron-park', '2025-06-22 00:43:34', '2025-06-22 01:04:42', 'read'),
(24, 'Amos Hunt', 'Caldwell Parker Associates', 'nibizycip@mailinator.com', '241', 'Id nemo laborum Fu', 'Ipsum eum ratione s', 'Suscipit sed omnis n', 'amos-hunt', '2025-06-22 01:03:26', '2025-06-22 01:04:42', 'read'),
(25, 'Erica Kinney', 'Allen and Page Traders', 'qibejiveno@mailinator.com', '573', 'Ut natus itaque volu', 'Rerum eos reprehende', 'Est sint unde id p', 'erica-kinney', '2025-06-22 01:06:12', '2025-06-22 01:10:06', 'read'),
(26, 'Levi Glover', 'Washington and Peterson Plc', 'mehu@mailinator.com', '716', 'Cumque ad quo Nam cu', 'Tenetur veniam mini', 'Cupidatat minima omn', 'levi-glover', '2025-06-22 01:52:37', '2025-06-22 03:24:34', 'read'),
(27, 'Chase Powers', 'Downs and Berg Inc', 'dogugero@mailinator.com', '673', 'In animi vel evenie', 'Voluptas molestiae l', 'Autem et et assumend', 'chase-powers', '2025-06-22 01:52:47', '2025-06-22 03:24:34', 'read'),
(28, 'Lavinia Murray', 'Bonner Stanton Co', 'roxazugyqu@mailinator.com', '951', 'Ratione ipsa eaque', 'Rerum minus quae et', 'Eos proident rerum', 'lavinia-murray', '2025-06-22 02:02:44', '2025-06-22 03:24:34', 'read'),
(29, 'Rana Short', 'Bruce and West Associates', 'hifox@mailinator.com', '70', 'Nulla ut aut vel pro', 'Cumque dolores commo', 'Velit deleniti id m', 'rana-short', '2025-06-22 03:32:51', '2025-06-22 03:36:25', 'read'),
(30, 'Faith Gates', 'Blankenship Fleming Associates', 'mujedaxaxu@mailinator.com', '935', 'Sit laborum aut veri', 'Rerum maxime iusto v', 'Perferendis proident', 'faith-gates', '2025-06-22 03:33:14', '2025-06-22 03:50:31', 'read'),
(31, 'Nyssa Noel', 'Acosta Pennington Plc', 'cymiwah@mailinator.com', '396', 'Commodo sed mollit s', 'Molestias qui do nis', 'Est expedita fuga E', 'nyssa-noel', '2025-06-22 03:34:45', '2025-06-22 03:50:31', 'read'),
(32, 'Herrod Goodman', 'Bryan Frederick LLC', 'texenito@mailinator.com', '220', 'Elit earum temporib', 'Autem irure rem vel', 'Dolorem excepteur eu', 'herrod-goodman', '2025-06-22 03:35:36', '2025-06-22 03:50:31', 'read'),
(33, 'Kuame Park', 'Patton and Tillman LLC', 'kofumy@mailinator.com', '578', 'Esse eum est provid', 'Quidem duis beatae l', 'Tempora ut et adipis', 'kuame-park', '2025-06-22 03:36:00', '2025-06-22 03:50:31', 'read'),
(34, 'Melyssa Bradshaw', 'Gray and Cooley Inc', 'besysit@mailinator.com', '678', 'Delectus laborum qu', 'Deserunt eum aut vol', 'Modi voluptas aperia', 'melyssa-bradshaw', '2025-06-22 03:36:12', '2025-06-22 03:50:31', 'read'),
(35, 'Arthur Mccullough', 'Meyer and Lawrence Plc', 'zyjo@mailinator.com', '108', 'Omnis rerum consequa', 'Deserunt aut id dele', 'Hic cillum aut et mi', 'arthur-mccullough', '2025-06-22 03:36:43', '2025-06-22 03:50:31', 'read'),
(36, 'Hermione Rosa', 'Sargent Reyes Trading', 'tebokivow@mailinator.com', '659', 'Sit laboriosam vol', 'Placeat aut fugit', 'aaaaaaaaaaaaaaaaaaaaa', 'hermione-rosa', '2025-06-22 03:50:03', '2025-06-22 03:50:19', 'read');

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `image_class` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `description`, `class`, `image_class`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Powerful System Backend', 'Advanced backend and app support for Android & iOS, ensuring smooth operations and customer engagement.', 'rotate-class', 'rotate', 'feature_images/1750415976_68553a68d0479.jpg', 'powerful-system-backend', '2025-06-12 04:42:18', '2025-06-20 04:54:36'),
(7, 'Daily Reward Point Analysis', 'Track daily reward points and gain insights into customer activity and program effectiveness.', 'shake-class', 'shake', 'feature_images/1750415987_68553a73186ac.jpg', 'daily-reward-point-analysis', '2025-06-12 04:42:54', '2025-06-20 04:54:47'),
(8, 'Data Export Facility', 'Easily export your data to MS Excel for detailed reporting and analysis.', 'scale-class', 'scale', 'feature_images/1750415997_68553a7d95502.jpg', 'data-export-facility', '2025-06-12 04:43:36', '2025-06-20 04:54:57'),
(9, 'SMS & Push Notifications', 'Engage customers with SMS and push notifications for promotions, events, and rewards updates.', 'scale-class', 'scale', 'feature_images/1750416007_68553a87de48e.jpg', 'sms-push-notifications', '2025-06-12 04:44:15', '2025-06-20 04:55:07'),
(10, 'Product Details & Catalog', 'Display detailed product information and allow customers to add items to their cart with ease.', 'shake-class', 'shake', 'feature_images/1750416019_68553a9336f8b.jpg', 'product-details-catalog', '2025-06-12 04:45:13', '2025-06-20 04:55:19'),
(11, 'API Integration', 'Seamlessly integrate with your existing systems for a unified experience.', 'scale-class', 'scale', 'feature_images/1750416029_68553a9da25cf.jpg', 'api-integration', '2025-06-12 04:45:43', '2025-06-20 04:55:29'),
(12, 'Admin User Role', 'Define custom admin roles with specific access controls for efficient management.', 'scale-class', 'scale', 'feature_images/1750416039_68553aa7dd8bd.jpg', 'admin-user-role', '2025-06-12 04:46:16', '2025-06-20 04:55:39'),
(13, 'Customer Feedback', 'Collect valuable feedback from customers to improve the loyalty experience.', 'shake-class', 'shake', 'feature_images/1750416049_68553ab123cf8.jpg', 'customer-feedback', '2025-06-12 04:46:46', '2025-06-20 04:55:49'),
(14, 'User Database Management', 'Streamlining user data management for seamless access, security, and scalability to meet business needs.', 'scale-class', 'scale', 'feature_images/1750416061_68553abdb85ce.jpg', 'user-database-management', '2025-06-12 04:47:17', '2025-06-20 04:56:01'),
(15, 'User Rank (Tier) Interface', 'Our custom user rank interfaces motivate users to reach higher levels, unlocking new features and rewards.', 'scale-class', 'scale', 'feature_images/1750416080_68553ad00c24e.jpg', 'user-rank-tier-interface', '2025-06-12 04:47:49', '2025-06-20 04:56:20'),
(16, 'Event Notifications', 'Keep customers updated with event notifications and important program updates.', 'shakehorizontal-class', 'scale', 'feature_images/1750416093_68553add29082.jpg', 'event-notifications', '2025-06-12 04:48:40', '2025-06-20 04:56:33'),
(17, 'Banners', 'Special offers, Exclusive products, Special Announcements.', 'scale-class', 'scale', 'feature_images/1750416102_68553ae644a42.jpg', 'banners', '2025-06-12 04:49:11', '2025-06-20 04:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loyalties`
--

CREATE TABLE `loyalties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyalties`
--

INSERT INTO `loyalties` (`id`, `title`, `description`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Value Programs', 'Earn points and rewards through referrals, social media engagement, and attending events.', 'loyalty_images/1750415401_6855382938166.avif', 'value-programs', '2025-06-10 03:36:57', '2025-06-20 04:45:01'),
(4, 'Paid Programs', 'Get more rewards with our paid programs, including premium and VIP memberships with exclusive perks.', 'loyalty_images/1750415411_68553833b91fa.webp', 'paid-programs', '2025-06-10 03:38:30', '2025-06-20 04:45:11'),
(5, 'Tiered System (Levels)', 'The more you engage, the higher your level and the better the rewards. Unlock new benefits as you level up!', 'loyalty_images/1750415421_6855383d95d0b.png', 'tiered-system-levels', '2025-06-10 03:39:03', '2025-06-20 04:45:21'),
(6, 'Points System', 'Earn points for every purchase, referral, and social interaction. Redeem them for discounts and rewards.', 'loyalty_images/1750415444_68553854338d3.jpg', 'points-system', '2025-06-10 03:39:35', '2025-06-20 04:45:44');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_08_041709_create_projects_table', 1),
(6, '2025_06_08_105704_create_abouts_table', 2),
(8, '2025_06_10_053729_create_loyalities_table', 3),
(9, '2025_06_10_100401_create_sectors_table', 4),
(10, '2025_06_11_053142_create_reasons_table', 5),
(11, '2025_06_11_100216_create_workflows_table', 6),
(13, '2025_06_12_051852_create_features_table', 7),
(15, '2025_06_13_055610_create_offices_table', 8),
(17, '2025_06_13_105753_create_contacts_table', 9),
(18, '2025_06_16_102756_add_is_read_to_contacts_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `title`, `description`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Phone', '+977 9802802822 /n+977 9802802825', 'fas fa-phone-alt', 'phone', '2025-06-13 03:33:49', '2025-06-13 03:48:50'),
(7, 'Email', 'sales@leleventures.com', 'fas fa-envelope', 'email', '2025-06-13 03:34:17', '2025-06-13 03:34:17'),
(8, 'Branch office', 'Sirjanchowk-8, Pokhara (Laxmi Complex, 2nd Floor)', 'fas fa-map-marker-alt', 'branch-office', '2025-06-13 03:34:43', '2025-06-13 03:34:43'),
(9, 'Corporate Office', 'Lalitpur-01, Kopundole, Kumari Marg', 'fas fa-building', 'corporate-office', '2025-06-13 03:35:04', '2025-06-13 03:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `logo`, `url`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Hand POS Billing System', 'Hand POS Billing System', 'projects_logo/1750414577_685534f104b73.jpg', NULL, 'hand-pos-billing-system', '2025-06-08 02:23:17', '2025-06-20 04:31:17'),
(2, 'Spin the wheel (Random Picker)', 'Spin the wheel (Random Picker)', 'projects_logo/1750414669_6855354d6d355.jpg', NULL, 'spin-the-wheel-random-picker', '2025-06-08 02:23:53', '2025-06-20 04:32:49'),
(3, 'ProfitX ERP', 'ProfitX ERP', 'projects_logo/1750414690_685535626cef2.jpg', NULL, 'profitx-erp', '2025-06-08 02:24:25', '2025-06-20 04:33:10'),
(4, 'Tech Finance', 'Tech Finance (cooperative software)', 'projects_logo/1750414706_68553572c8321.jpg', NULL, 'tech-finance', '2025-06-08 02:25:09', '2025-06-20 04:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reasons`
--

INSERT INTO `reasons` (`id`, `title`, `description`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Boost Customer Retention and Repeat Purchases', 'Loyalty programs encourage repeat business by offering rewards, making customers more likely to return. This strengthens the relationship and reduces the chance of competitors attracting them.', 'reason_images/1750415669_685539350db45.jpg', 'boost-customer-retention-and-repeat-purchases', '2025-06-11 03:34:43', '2025-06-20 04:49:29'),
(5, 'Increase Brand Advocacy', 'Satisfied customers become brand advocates, sharing positive experiences and recommending your business. This word-of-mouth marketing brings new customers at a lower cost.', 'reason_images/1750415679_6855393f9764e.png', 'increase-brand-advocacy', '2025-06-11 03:35:11', '2025-06-20 04:49:39'),
(6, 'Gather Valuable Customer Data', 'Loyalty programs help track customer behaviors and preferences, allowing for personalized offers. This data enhances satisfaction by tailoring experiences to individual needs.', 'reason_images/1750415687_68553947b3c65.jpg', 'gather-valuable-customer-data', '2025-06-11 03:35:31', '2025-06-20 04:49:47'),
(7, 'Stand Out in a Competitive Market', 'A loyalty program differentiates your brand by offering unique rewards, helping you build strong, long-lasting customer relationships that outlast competitors.', 'reason_images/1750415708_6855395c5021f.avif', 'stand-out-in-a-competitive-market', '2025-06-11 03:35:57', '2025-06-20 04:50:08'),
(8, 'Encourage Larger Purchases', 'By rewarding larger purchases, customers are incentivized to spend more. This increases your average order value and boosts overall sales in the long run.', 'reason_images/1750415719_6855396797713.jpg', 'encourage-larger-purchases', '2025-06-11 03:36:28', '2025-06-20 04:50:19'),
(9, 'Cost-Effective Marketing', 'Rather than focusing on acquiring new customers, loyalty programs focus on retaining existing ones, reducing marketing costs while maintaining steady revenue.', 'reason_images/1750415729_68553971d2b16.jpg', 'cost-effective-marketing', '2025-06-11 03:36:48', '2025-06-20 04:50:29'),
(10, 'Create Emotional Connections', 'Loyalty programs help forge emotional bonds with customers by recognizing their value. This connection enhances loyalty and encourages long-term patronage.', 'reason_images/1750415740_6855397c6f24f.avif', 'create-emotional-connections', '2025-06-11 03:37:08', '2025-06-20 04:50:40'),
(11, 'Drive Consistent Revenue', 'Repeat customers provide consistent revenue, reducing seasonal fluctuations. This stability allows for better cash flow and reliable business growth.', 'reason_images/1750415752_685539882c0d9.png', 'drive-consistent-revenue', '2025-06-11 03:37:29', '2025-06-20 04:50:52'),
(12, 'Enhance Customer Satisfaction', 'Rewarding customers boosts satisfaction, making them feel appreciated and valued. Happy customers are more likely to remain loyal and recommend your brand.', 'reason_images/1750415761_68553991a932d.jpg', 'enhance-customer-satisfaction', '2025-06-11 03:37:49', '2025-06-20 04:51:01'),
(13, 'Incentivize Engagement Beyond Purchases', 'Loyalty programs encourage customers to engage through social media, referrals, and reviews, expanding your brand reach and fostering deeper connections with your community.', 'reason_images/1750415771_6855399b6d13b.jpg', 'incentivize-engagement-beyond-purchases', '2025-06-11 03:38:10', '2025-06-20 04:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `title`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(4, 'Retail Stores', 'sector_images/1750415519_6855389f0c386.jpg', 'retail-stores', '2025-06-10 22:29:23', '2025-06-20 04:46:59'),
(5, 'E-commerce', 'sector_images/1750415532_685538acc5553.jpg', 'e-commerce', '2025-06-10 22:32:20', '2025-06-20 04:47:12'),
(6, 'Education and Learning', 'sector_images/1750415546_685538bacaf09.jpg', 'education-and-learning', '2025-06-10 22:32:37', '2025-06-20 04:47:26'),
(7, 'Hospitality', 'sector_images/1750415560_685538c80acbf.jpg', 'hospitality', '2025-06-10 22:32:55', '2025-06-20 04:47:40'),
(8, 'Beauty Business', 'sector_images/1750415573_685538d51866f.jpg', 'beauty-business', '2025-06-10 22:33:12', '2025-06-20 04:47:53'),
(9, 'Automotive', 'sector_images/1750415585_685538e125aed.jpg', 'automotive', '2025-06-10 22:33:37', '2025-06-20 04:48:05'),
(10, 'Travel and Tourism', 'sector_images/1750415602_685538f229319.jpg', 'travel-and-tourism', '2025-06-10 22:34:00', '2025-06-20 04:48:22'),
(11, 'Fitness Business', 'sector_images/1750415618_68553902b62e0.avif', 'fitness-business', '2025-06-10 22:35:05', '2025-06-20 04:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('I1XP875Q03jNhPgyaNswFgf62KJC6gogHSZx5pNg', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieFN5VkxMZG1ZcmwyUms1alVzcmJqNUR6Tm1jQTJvb25XNmNuRDVBQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1750586451);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$0OUWBV24BsFsT97iZ6ePtetVDlYnYs8Bs3f9PVVXkfnMzHuGFc/TS', NULL, '2025-06-08 02:19:08', '2025-06-08 02:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `workflows`
--

CREATE TABLE `workflows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflows`
--

INSERT INTO `workflows` (`id`, `title`, `description`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'User Sign Ups & Fills Form', '\"The customer registers in your loyalty system with just a single click, effortlessly becoming a part of the program. With this simple action, they instantly gain access to exclusive benefits and rewards, streamlining their experience from the very beginning.\"', 'workflow_image/1750415858_685539f284c39.jpg', 'user-sign-ups-fills-form', '2025-06-11 06:18:17', '2025-06-20 04:52:38'),
(7, 'Making Purchase', '\"Customer makes a purchase and starts earning valuable loyalty points with every transaction. Each time the customer shops, they accumulate points that bring them closer to exciting rewards, discounts, and exclusive offers, enhancing their shopping experience with every purchase.\"', 'workflow_image/1750415878_68553a06da908.jpg', 'making-purchase', '2025-06-11 06:18:45', '2025-06-20 04:52:58'),
(8, 'Accumulate Loyalty Points', '\"Customer earns points for every purchase they make, as well as for other actions such as referring friends, writing reviews, or engaging with special promotions. These points accumulate quickly, allowing them to unlock a range of exclusive rewards, discounts, and special offers designed to enhance their loyalty experience.\"', 'workflow_image/1750415898_68553a1a8271c.avif', 'accumulate-loyalty-points', '2025-06-11 06:19:15', '2025-06-20 04:53:18'),
(9, 'Redeem Rewards', '\"Customer can redeem the points they\'ve earned for exciting rewards, exclusive discounts, and special offers. The more points they accumulate, the greater the rewards they can unlock, making their loyalty even more rewarding with every redemption.\"', 'workflow_image/1750415910_68553a26261d3.avif', 'redeem-rewards', '2025-06-11 06:19:39', '2025-06-20 04:53:30'),
(10, 'Exclusive Offers', '\"As a valued loyalty member, customer will receive exclusive offers, special promotions, and personalized discounts. These members-only perks are designed to reward customer\'s continued loyalty and enhance customer\'s shopping experience with you.\"', 'workflow_image/1750415919_68553a2f6648c.png', 'exclusive-offers', '2025-06-11 06:20:00', '2025-06-20 04:53:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abouts_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`),
  ADD UNIQUE KEY `contacts_phone_number_unique` (`phone_number`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `features_slug_unique` (`slug`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loyalties`
--
ALTER TABLE `loyalties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loyalties_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reasons_slug_unique` (`slug`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sectors_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workflows`
--
ALTER TABLE `workflows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workflows_slug_unique` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loyalties`
--
ALTER TABLE `loyalties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workflows`
--
ALTER TABLE `workflows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
