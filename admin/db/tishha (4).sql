-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tishha`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `status`, `created_at`) VALUES
(19, 'Economics', 'Economics is the study of how people, businesses, and governments make choices about using limited resources to satisfy their needs and wants. It examines how goods and services are produced, distributed, and consumed, and how these decisions affect individuals, markets, and entire economies.', 1, '2025-01-30 05:57:45'),
(20, 'Technology Innovations', 'Technology innovations refer to the development of new or improved technologies that significantly enhance the way we live, work, and interact. These innovations can include breakthroughs in fields like computing, communication, healthcare, and energy, often leading to more efficient solutions, increased productivity, and new possibilities for solving problems.', 1, '2025-01-30 05:58:30'),
(21, 'Global Healthcare', 'Global healthcare refers to the efforts and systems aimed at improving health and providing medical services to people worldwide, with a focus on reducing health disparities between countries and regions. It encompasses public health initiatives, medical research, disease prevention, access to healthcare services, and the development of policies that promote health equity and well-being for all populations, regardless of geographic location or socioeconomic status.', 1, '2025-01-30 05:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `designation_description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `designation_description`, `status`, `created_at`) VALUES
(38, 'ADMIN', 'FOR ALL WORK', 1, '2025-01-30 12:06:15'),
(39, 'EDITOR', '', 1, '2025-01-30 12:06:22'),
(40, 'USER', '', 1, '2025-01-30 12:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category` varchar(225) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `long_description` text DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `facebook_image` varchar(255) DEFAULT NULL,
  `instagram_image` varchar(255) DEFAULT NULL,
  `whatsapp_image` varchar(255) DEFAULT NULL,
  `status_visibility` enum('Draft','Pending','Private','Scheduled','Published') DEFAULT 'Draft',
  `sticky` enum('Yes','No') DEFAULT 'Yes',
  `publish` enum('Immediately','Scheduled') DEFAULT 'Immediately',
  `datepicker` date DEFAULT NULL,
  `timepicker` time DEFAULT NULL,
  `amp` enum('Enable','Disable') DEFAULT 'Disable',
  `tag` text DEFAULT NULL,
  `tagby` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `description`, `short_description`, `long_description`, `post_image`, `facebook_image`, `instagram_image`, `whatsapp_image`, `status_visibility`, `sticky`, `publish`, `datepicker`, `timepicker`, `amp`, `tag`, `tagby`, `author`, `created_at`, `updated_at`) VALUES
(43, 'Economics', 'Second meeting of the International Health Regulations (2005) Emergency Committee regarding the upsurge of mpox 2024', 'Emergency Committee (Committee) regarding the upsurge of mpox 2024, held on Friday 22 November 2024, from 12:00 to 17:00 CET.', '<p><strong>Session open to representatives of States Parties invited to present their views</strong></p>\r\n<p>The WHO Secretariat presented an overview of the global epidemiological situation of mpox, all MPXV clades included, highlighting that, since the Committee last met in August 2024, MPXV transmission has been reported in all six WHO Regions.</p>\r\n<h2 class=\"mb-2\"><a href=\"../../tishha_view/view/blog-details.html\">5 Great Startup Tips for Female Founders</a></h2>', '<h2 align=\"center\"><strong>Temporary recommendations</strong></h2>\r\n<p><strong>These temporary recommendations</strong>&nbsp;are issued to&nbsp;<strong>States Parties</strong>&nbsp;experiencing the transmission of monkeypox virus (MPXV),&nbsp;<strong>including</strong>, but not limited to, those where there is&nbsp;<strong>sustained community transmission, and where there are clusters of cases or sporadic travel-related cases of MPXV clade Ib</strong><sup>.</sup><a title=\"\" href=\"https://worldhealthorg-my.sharepoint.com/personal/serraor_who_int/Documents/ALL%20SITES%20MIGRATION%20SITEFINITY/Web%20box/28%20November%202024/Changes%20with%20respect%20to%20Michel%20version.docx#_ftn1\" name=\"_ftnref1\" data-sf-ec-immutable=\"\"><sup>[1]</sup></a></p>\r\n<div>\r\n<div id=\"ftn1\">\r\n<p>They are intended to be implemented by those States Parties in addition to the current&nbsp;&nbsp;<a href=\"https://www.who.int/publications/m/item/extension-of-the-standing-recommendations-for-mpox-issued-by-the-DG-of-the-WHO-in-accordance-with-the-IHR-2005-21082024\">standing recommendations for mpox</a>, which will be extended until 20 August 2025.&nbsp;</p>\r\n</div>\r\n</div>\r\n<p>In the context of the global efforts to prevent and control the spread of mpox disease outlined in the&nbsp;&nbsp;<a href=\"https://www.who.int/publications/i/item/9789240092907\">WHO Strategic framework for enhancing prevention and control of mpox- 2024-2027</a>, the aforementioned&nbsp;&nbsp;<a href=\"https://www.who.int/publications/m/item/extension-of-the-standing-recommendations-for-mpox-issued-by-the-DG-of-the-WHO-in-accordance-with-the-IHR-2005-21082024\">standing recommendations</a>&nbsp;apply to&nbsp;<strong>all States Parties</strong>.&nbsp;</p>', '679b320d7f927.jpg', '679b320d7fc7a.jpg', '679b320d80008.jpg', '679b320d80377.jpg', 'Draft', 'Yes', 'Scheduled', '2025-01-30', '19:38:00', 'Enable', '', 'sdasdsa', 'asdasd', '2025-01-30 08:02:21', '2025-01-31 10:31:50'),
(44, 'Economics', 'hds osahd asdo ', ' jsdoiha odjaos djo', '<p>ojs foijsdfo sdofjsd ojfdso jfsod i</p>', '<p>iajoasjdo adjas dojasodj aoijdo ajsdoj&nbsp;</p>', '679c834733af2.jpg', '679c834733fc5.jpg', '679c8347343f6.jpg', '679c83473480c.jpg', 'Draft', 'Yes', 'Immediately', '0000-00-00', '00:00:00', 'Enable', 'APP,IT,DESIGN,BUSINESS,MAC', 'by admin', 'by admin', '2025-01-31 08:01:11', '2025-01-31 08:01:11'),
(45, 'Global', 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.', '<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>', '<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>', '679ca25baa3af.jpg', '679ca25baa74b.jpg', '679ca25baab90.jpg', '679ca25bab0a2.jpg', 'Draft', 'Yes', 'Immediately', '0000-00-00', '00:00:00', 'Enable', '', 'by admin', 'By admin', '2025-01-31 10:13:47', '2025-01-31 10:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `	author_description` text NOT NULL,
  `	author_image` varchar(255) NOT NULL,
  `whatsapp_url` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  `instagram_ulr` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_icon` varchar(255) NOT NULL,
  `browser_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `gst_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `website_url` varchar(255) NOT NULL,
  `whatsapp_url` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  `instagram_ulr` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `owner_name`, `company_name`, `company_logo`, `company_icon`, `browser_title`, `meta_description`, `meta_keywords`, `gst_number`, `address`, `email`, `contact_number`, `website_url`, `whatsapp_url`, `facebook_url`, `linkedin_url`, `instagram_ulr`, `twitter_url`, `created_at`, `updated_at`) VALUES
(26, 'dljf s', ' jsdofi ', '679df91bd78bf.jpg', '679df91bd7c45.jpg', 'sad asdlhsadklhsadk h', 'sadasd shad asdhas dh ', 'sd ashd akshd ashdaskhl ', 'asdk as78632', 'a dad gasjd asjgd ', 'rudransh@gmail.com', '2342342342', 'https://www.linkedin.com/in/username', 'https://wa.me/1234567890', 'https://www.linkedin.com/in/username', 'https://www.linkedin.com/in/username', 'https://www.linkedin.com/in/username', 'https://www.linkedin.com/in/username', '2025-02-01 10:36:11', '2025-02-01 10:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_field_limits`
--

CREATE TABLE `tbl_post_field_limits` (
  `id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `word_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_post_field_limits`
--

INSERT INTO `tbl_post_field_limits` (`id`, `field_name`, `word_limit`) VALUES
(65, 'Title', 100),
(66, 'Description', 100),
(67, 'Short Description', 200),
(68, 'Long Description', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tag`
--

CREATE TABLE `tbl_tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `tag_name`, `tag_description`, `status`, `created_at`) VALUES
(32, 'APP', 'FOR APPLICATION', 1, '2025-01-30 08:10:08'),
(33, 'IT', 'FOR INFORMATION TECHONOLOGY', 1, '2025-01-30 08:10:26'),
(34, 'DESIGN', '', 1, '2025-01-30 08:10:53'),
(35, 'BUSINESS', '', 1, '2025-01-30 08:11:01'),
(36, 'MAC', '', 1, '2025-01-30 08:11:06'),
(37, 'CREATIVE', '', 1, '2025-01-30 08:11:12'),
(38, 'OFFICE', '', 1, '2025-01-30 08:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','editor','viewer') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `first_name`, `last_name`, `gender`, `dob`, `email`, `phone`, `address_line1`, `address_line2`, `city`, `state`, `zip_code`, `country`, `profile_picture`, `username`, `password`, `role`, `created_at`, `updated_at`, `status`) VALUES
(42, 'AMAN KUMAR', 'KUMAR', 'male', '2222-02-04', 'asdassdasdd@gmail.com', '4564564564', '', '', '', '', '', '', '679c7b61ec365.jpg', 'sdasd', '1234', 'admin', '2025-01-22 05:39:32', '2025-01-31 07:27:29', 1),
(45, 'SFDS', 'DSFSDF', 'male', '0000-00-00', 'rudsaransh@gmail.com', '4564564565', '', '', '', '', '', '', '6790871a838bf.jpg', 'qqqq', '1234', 'admin', '2025-01-22 05:50:18', '2025-01-22 05:50:18', 1),
(50, 'ASD ASDIH', 'SDHADAD', 'male', '2024-11-29', 'rudransh@gmail.com', '4565456586', '', '', '', '', '', '', '', 'uiyiuy', '0987', 'admin', '2025-01-31 07:13:38', '2025-01-31 07:14:01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post_field_limits`
--
ALTER TABLE `tbl_post_field_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_post_field_limits`
--
ALTER TABLE `tbl_post_field_limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_tag`
--
ALTER TABLE `tbl_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
