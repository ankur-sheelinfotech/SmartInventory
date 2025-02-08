-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 11:10 AM
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
-- Table structure for table `category_duration`
--

CREATE TABLE `category_duration` (
  `id` int(11) NOT NULL,
  `category` enum('hot','trending','breaking','normal') NOT NULL,
  `duration_type` enum('minute','hour','day','week','month') NOT NULL,
  `duration_limit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_duration`
--

INSERT INTO `category_duration` (`id`, `category`, `duration_type`, `duration_limit`, `created_at`, `updated_at`) VALUES
(17, 'hot', 'day', 1, '2025-02-04 09:06:33', '2025-02-04 09:06:33'),
(18, 'trending', 'hour', 3, '2025-02-04 09:06:50', '2025-02-04 09:06:50'),
(20, 'breaking', 'hour', 2, '2025-02-04 09:12:11', '2025-02-04 09:12:11');

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
(43, 'Select Category', 'Second meeting of the International Health Regulations (2005) Emergency Committee regarding the upsurge of mpox 2024', 'Emergency Committee (Committee) regarding the upsurge of mpox 2024, held on Friday 22 November 2024, from 12:00 to 17:00 CET.', '<p><strong>Session open to representatives of States Parties invited to present their views</strong></p>\r\n<p>The WHO Secretariat presented an overview of the global epidemiological situation of mpox, all MPXV clades included, highlighting that, since the Committee last met in August 2024, MPXV transmission has been reported in all six WHO Regions.</p>\r\n<h2 class=\"mb-2\"><a href=\"../../tishha_view/view/blog-details.html\">5 Great Startup Tips for Female Founders</a></h2>', '<h2 align=\"center\"><strong>Temporary recommendations</strong></h2>\r\n<p><strong>These temporary recommendations</strong>&nbsp;are issued to&nbsp;<strong>States Parties</strong>&nbsp;experiencing the transmission of monkeypox virus (MPXV),&nbsp;<strong>including</strong>, but not limited to, those where there is&nbsp;<strong>sustained community transmission, and where there are clusters of cases or sporadic travel-related cases of MPXV clade Ib</strong><sup>.</sup><a title=\"\" href=\"https://worldhealthorg-my.sharepoint.com/personal/serraor_who_int/Documents/ALL%20SITES%20MIGRATION%20SITEFINITY/Web%20box/28%20November%202024/Changes%20with%20respect%20to%20Michel%20version.docx#_ftn1\" name=\"_ftnref1\" data-sf-ec-immutable=\"\"><sup>[1]</sup></a></p>\r\n<div>\r\n<div id=\"ftn1\">\r\n<p>They are intended to be implemented by those States Parties in addition to the current&nbsp;&nbsp;<a href=\"https://www.who.int/publications/m/item/extension-of-the-standing-recommendations-for-mpox-issued-by-the-DG-of-the-WHO-in-accordance-with-the-IHR-2005-21082024\">standing recommendations for mpox</a>, which will be extended until 20 August 2025.&nbsp;</p>\r\n</div>\r\n</div>\r\n<p>In the context of the global efforts to prevent and control the spread of mpox disease outlined in the&nbsp;&nbsp;<a href=\"https://www.who.int/publications/i/item/9789240092907\">WHO Strategic framework for enhancing prevention and control of mpox- 2024-2027</a>, the aforementioned&nbsp;&nbsp;<a href=\"https://www.who.int/publications/m/item/extension-of-the-standing-recommendations-for-mpox-issued-by-the-DG-of-the-WHO-in-accordance-with-the-IHR-2005-21082024\">standing recommendations</a>&nbsp;apply to&nbsp;<strong>all States Parties</strong>.&nbsp;</p>\r\n<p><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QMuRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAExAAIAAAAfAAABVgEyAAIAAAAUAAABdodpAAQAAAABAAABiuocAAcAAAEMAAAASgAAAAAc6gAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQWRvYmUgUGhvdG9zaG9wIDIzLjQgKFdpbmRvd3MpAAAyMDIyOjA3OjE1IDE0OjMwOjM5AAAIkAMAAgAAABQAAAL8kAQAAgAAABQAAAMQkpEAAgAAAAMwMAAAkpIAAgAAAAMwMAAAoAEAAwAAAAH//wAAoAIABAAAAAEAAA8AoAMABAAAAAEAAAhw6hwABwAAAQwAAAHwAAAAABzqAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAyMDIyOjA0OjE5IDE0OjMwOjI3ADIwMjI6MDQ6MTkgMTQ6MzA6MjcAAAD/4QLdaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyI+PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj48cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0idXVpZDpmYWY1YmRkNS1iYTNkLTExZGEtYWQzMS1kMzNkNzUxODJmMWIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyI+PHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgMjMuNCAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD48eG1wOkNyZWF0ZURhdGU+MjAyMi0wNC0xOVQxNDozMDoyNzwveG1wOkNyZWF0ZURhdGU+PC9yZGY6RGVzY3JpcHRpb24+PC9yZGY6UkRGPjwveDp4bXBtZXRhPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9J3cnPz7/2wBDAAMCAgMCAgMDAgMDAwMDBAcFBAQEBAkGBwUHCgkLCwoJCgoMDREODAwQDAoKDhQPEBESExMTCw4UFhQSFhESExL/2wBDAQMDAwQEBAgFBQgSDAoMEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhL/wAARCAA4AGQDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwDz4ftQePbBl/4nN4MjJEUcRI9OiVz/AIo/aR8f+IGie91jW1cJtjdJzHhevRMD8a8Vi8aaVG4E+ullGAqRKT+Wa3LXxvoKK8M11qkhlTauy1Jz36E1r/aaW0Wcn1KPkdtF+0H8StOLG18XeIrUhfncahLyDnoCeasW/wC1D8W0cjT/AIg+KwFKyOG1ORcgHrjPb9a8x1DxnocQjktJdVYoDtSWCMIwBx65Hf8Awqjb/FXQLqZ7U6VelF+85lUbjjPGAc96bzBSV+VjjhrPSx7g37WfxjhjV7z4oeImZztCR3WMk/QfpTLj9sH4vtFJbn4jeJsMw5ju/mypHcDcB9MZ714Hq/jLQxq1h9ijvbdHmXzk+0jaRnB428fWule701Y7hrMurR8nZcFst2HCCop4lT1UTSVNrQ9m0T9uL4oeGb8/afiJ4ivTG6tLBfQR3UQyTwdwJA45welepeFP+CjXi63mY+KfD3h/xVbGQN5toDazRg5OMAEE4I7V8L6xqlidVk3hvK437yCN+Pm/GhNS0sxTvHLrCEMo+QZB68H9a29tKKujP6vBu2v3/wCdz9DP+HnXgm4nZNW8Ba9axDO8wXMMjZHXgha3P+G/PgZPEWu7rxTp8xRWFvJo+4nJwQGViOOpz6cV+Y2kHwzqN9cvqer30V1kDF5Z7lB3DlQH64GPoa6mDw74Uvozt8XaLDE5Uf6Vp8/BwSD+taxrSvo7fNGUqK2evyP0jP7XvwEu5mjh8SouWZVlu4Ht1ZgQPvFcc7sj6H0q/dXOg+NbP7f4Qe31ezdmUTWNwsyAg4IyPQ8V+Yx+H/huc+Xb+P8AwRhn3bJUu0XIHXGwjNdT4R+GWtaTGzeBfiJ4IsVc8i31WeDPfn5ATXdTxNRb6/M5KmEptaafI+6p/CMnmHGmyge4or5GHgj4on/VfEXwxMvZ18RTYP5iiuxYufb8v8zgeBV91+P+RQ8Bf8E6fjZ4x8uK6htdCilb5hfXccJVfXaMmvY1/wCCWGtaFaSXHinxZod5dmHcU+1OkYx23sAB+dfbvxz+OXhz4YWko8Npp1xqJJQzTchWHZVOASPU5FfO/hvUPEHx9v7u51nWLqLS7Jg17cFy0aIT8oQcAHGeAMdK+Lp1ITipWd/X/I+pampbq3p/mfPD/sh6Vp1ykY1jw8ZY3wPssz3bE+mI1x3/AL1dNB+yaSivJeX0CqoHmJYxW4IbuDI5P6Z9q+ovA/hDSn1KTTfA0EGkWdhEXu9Ui+a5aMZJywHUgE4A9q7+w8DR3aSX9lG8NrHII47mVBJf3kh52hnyqDByWxx74rpTUd7L+u4uZ27nxNL+xLpWtzxy6hrF84jZHgjSYbHI9ZEhx65Ge1XF/Y08MXI3XV5erKsrCSAXDED3zkV9aeJNKFkAJ445mYBo5SRMQemfMkyTn1UJnsK4668WraTK8k+xwwErPlw4x91cEbT7kU7xS0/r7gvI+crn9iDwvcytLIbpg7Ah1uGG5RnBI3GoR+xlp2nyrJCLu6t2yxt1upYg+BgZKocH8fWvqmx8URXtoIo5BumKhWDkKAW7qDn9a9E0LQE8QTAiBpMBVyUV8KARnnJwe+CPrXJVxPJq0bwi5aHwfo/7L3gDSr2Vde+Hur6soddw0/xOruPbYyA+9bVv8Df2Z7m6MWseFfF+hTQF1kjvDK6hiMZ+U847cV99aj8I7G8ijTULRLl2ysaSRCWEdwCpJZDjoQxB9q8u8a+B7uytbyHRYreQ2MJmOh6i32mG6iHUxEjdGwORtDemDTpYzn2f3/8AACVCMd19x4n4c/ZQ/ZquWSXTbX+1JIlIWKbUmJVSMfcyCO5+pNerW2n+CfCenCw8M6PpVjZoSViSzQgZ68kZNeHaj8O7Px1plxq3woa7sdct0ea50WZmK3C45NvIwzkD+BuvQHtXAw/E/WbOWKGcie3BCGTYcbum0jqDnv0NethswpxnyVY2ffoefXwM5xcqcr+XU+j7y88OvOSdM0lvc2Sf4UV4qfFc7AGaGZWIyRjNFe4p0Wrpo8h0aidmmYn7QnjDxHdeIbi+YvBaQTyW8ltHmdkbOdwzg4P+0AfWu/8A2X/ifp9vbap4W1q7uLGTXGSXT7q+iWFZywCmPghQ2QCM9ckdcV6Z8WvgZbfFnUZPFXwS1yx0Hxe0Oy80nUR/oWooBwmVGY2zjDgH6CvmnxJZaj4R1aTSfivot54R1ZjtgnljH2O5bAG2G4YAEZ+p71+cQxcXZWtJdOq/zR9d7CT63R9O6Rq/iD4PeK5b6+igudLu1MN3bodpkQEjKk9GGT1/+vXu/gD4r+GtYswtjeLdxIfMEb5juUPIwUIGeOMjOa+UPB/xM1TwxYNFGJPFUEcaqH1e4ibyuM/utiM+PdnPGOBWpcfFPwnrrQHXNKutKuhjfLGv2lVOOSu3BHPtxXS8dRk9XqEcJUS2PqDx74VsPGNlcP4Ru7a41CROLSaUJIvHbOPbrXxd8UPCnj/wxeEX/hnXILcvxJFZPMjknsygjPBr0Ww8Y6ZF5cukfEuPSrVm2k3lzsVVH3ciQYwD2GfQVyfjP4qeKP8AhIV0rwn4s07U2yieYLlVMgGSSNsgAPPTrXXRrxn8LTMKlFw3OG8Gah4oe7hiXR9cMhOWH9nSkgZ/3a+2fgrp9xYafHd+LkXTUOGZr8+VuPbCtg5H6V852nxC+I8GnQwJqaiR2xcQy+cWyeFP+szjiotbvfF0tsX1zW9Ljit3VQ+6EHJ7K7EkkE4P1+tKvGnL4mreqHSUr6H2Vr/xY8NWlvNFo11FePF/rjAfudefzyeSBXzL8Qfj1p1rqN6vhi7t7/xE8JtrVRM3kWYJ5aRxlXbnOF79cCvNtQg0a92trniz7bIgG+ISPOF7DKqNuMnFT2uo2WhMp8NaTLfSBf3b6gRBGp9lALEVl9ZwlLWTXyNfq1eeiRvfC/wuvg3TZvFPjK+isdM05PPe6F9uQenuWJyAvUngV8heMtXtvFXiDXdVTdaxahezXdtawbonVXkJVT8voeRnrnmvcPHa+J/F1szeM45IDBIXtF0+dDZRMBypt+CCR0c8j3rBj0JtQsLYajaR2UcLBgZZiDu/vbeh49qwq472s7xt6I2pYZwXvbmN4Ru57Hw9ZxXcM5kCZ/es7tjtziirOqa5p1jdeQHBESgbixYt7/8A1qK9KEZcq0OOTfM9TqX+KY0+4aW0nZWzkSByCPoAa6rT/wBp6+uLD7D4ltrTWtNIw1vfQrMrD6NmiiuypgcPXXvxucdLE1afws5++1D4W+ILyO6sYNX8E3Wfn/sicG2k4P3rdvl646AHipItJhnjb+z/ABr4Z1dOsMV9bNp7D2YrvH9KKK+czDLqNL4bnvYPEzqLUcPh5rPihE2adZ389u4YRadq8EyKuQAz7sfKD6gVzp+HWg6Z8Q7xIrUahf6BdQzXzCOOVPMYBwoIYE5Gc8djRRXh06lSEJ8smrf5o7qsYynG6udBqFzZT3iXmpWt8tzbSvsuZIAjOny+WDzztx369afN4wsNMe9uEsJIrG/njWWwhsVnVgWJBweVHHLDBAPWiisKTnWlecnqzWajTjaK2RUfXvD0bBJomETg4H2gERL/AHSccn6Vm3fxE0jTEWJdShSFOfKRg5P0JJx+VFFdWGwVOU7Sb+8mpXmo3Rzmo/HbQbN2ZHNxOPuvI/mFT7Z6fhiuF8RfG2fWA6wylEfqT1NFFfeYDKcLTipKN/U+XxWPrSk1exxb+J1mcvJKSSepNFFFe+noeW43dz//2Q==\" alt=\"133688938552404807.jpg\" width=\"100\" height=\"56\"> sdf sdojf sdfsdfsdhdsj fisdhf sdhfuihsd fiuhsdfioh dsuiofhsd iofhsdiof hsiodhf</p>\r\n<p>dfo sjdf iopdsjf opisdjf piosdjfiopsdj fiopjsd fopijsopfjsd o</p>\r\n<p><img src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/4QMuRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAExAAIAAAAfAAABVgEyAAIAAAAUAAABdodpAAQAAAABAAABiuocAAcAAAEMAAAASgAAAAAc6gAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQWRvYmUgUGhvdG9zaG9wIDIxLjEgKFdpbmRvd3MpAAAyMDIyOjA1OjI3IDE1OjA0OjMxAAAIkAMAAgAAABQAAAL8kAQAAgAAABQAAAMQkpEAAgAAAAMwMAAAkpIAAgAAAAMwMAAAoAEAAwAAAAH//wAAoAIABAAAAAEAAA8AoAMABAAAAAEAAAhw6hwABwAAAQwAAAHwAAAAABzqAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAyMDIyOjA0OjE5IDE0OjMwOjI3ADIwMjI6MDQ6MTkgMTQ6MzA6MjcAAAD/4QLdaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49J++7vycgaWQ9J1c1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCc/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyI+PHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj48cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0idXVpZDpmYWY1YmRkNS1iYTNkLTExZGEtYWQzMS1kMzNkNzUxODJmMWIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyI+PHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgMjEuMSAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD48eG1wOkNyZWF0ZURhdGU+MjAyMi0wNC0xOVQxNDozMDoyNzwveG1wOkNyZWF0ZURhdGU+PC9yZGY6RGVzY3JpcHRpb24+PC9yZGY6UkRGPjwveDp4bXBtZXRhPg0KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9J3cnPz7/2wBDAAMCAgMCAgMDAgMDAwMDBAcFBAQEBAkGBwUHCgkLCwoJCgoMDREODAwQDAoKDhQPEBESExMTCw4UFhQSFhESExL/2wBDAQMDAwQEBAgFBQgSDAoMEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhISEhL/wAARCAA4AGQDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJx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\" alt=\"133707846669266452.jpg\" width=\"100\" height=\"56\"></p>', '679b320d7f927.jpg', '679b320d7fc7a.jpg', '679b320d80008.jpg', '679b320d80377.jpg', 'Draft', 'Yes', 'Scheduled', '2025-01-30', '19:38:00', 'Enable', '', 'sdasdsa', 'asdasd', '2025-01-30 08:02:21', '2025-02-03 12:35:00'),
(44, 'Economics', 'hds osahd asdo ', ' jsdoiha odjaos djo', '<p>ojs foijsdfo sdofjsd ojfdso jfsod i</p>', '<p>iajoasjdo adjas dojasodj aoijdo ajsdoj&nbsp;</p>', '679c834733af2.jpg', '679c834733fc5.jpg', '679c8347343f6.jpg', '679c83473480c.jpg', 'Draft', 'Yes', 'Immediately', '0000-00-00', '00:00:00', 'Enable', 'APP,IT,DESIGN,BUSINESS,MAC', 'by admin', 'by admin', '2025-01-31 08:01:11', '2025-01-31 08:01:11'),
(45, 'Global', 'Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia', 'Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.', '<p>Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.</p>', '<h3>Et quae iure vel ut odit alias.</h3>\r\n<p>Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui. Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea. Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.</p>', '679ca25baa3af.jpg', '679ca25baa74b.jpg', '679ca25baab90.jpg', '679ca25bab0a2.jpg', 'Draft', 'Yes', 'Immediately', '0000-00-00', '00:00:00', 'Enable', '', 'by admin', 'By admin', '2025-01-31 10:13:47', '2025-01-31 10:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_description` text NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `whatsapp_url` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  `instagram_ulr` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id`, `author_name`, `author_description`, `author_image`, `whatsapp_url`, `facebook_url`, `linkedin_url`, `instagram_ulr`, `twitter_url`, `status`, `created_at`, `updated_at`) VALUES
(3, 'krishna', 'prajapati', '67a08ae1d4e53.jpg', 'https://wa.me/1111111', 'https://www.facebook.com/testuser2222', 'https://www.facebook.com/testuser333', 'https://www.facebook.com/testuser4444', 'https://www.facebook.com/testuser5555', 1, '2025-02-03 05:42:01', '2025-02-03 05:42:01'),
(4, 'rudransh', 'dfdsf sdfsf sdfdsf', '67a057292c85c.jpg', 'https://wa.me/1234567890', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 1, '2025-02-03 05:42:01', '2025-02-03 05:42:01'),
(5, 'rudransh', 'sadasd asdho h', '67a058f3ead0c.jpg', 'https://wa.me/1234567890', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 1, '2025-02-03 05:49:39', '2025-02-03 05:49:39'),
(6, 'rudransh', 'sadasd asdho h', '67a058f3ead0c.jpg', 'https://wa.me/1234567890', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 1, '2025-02-03 05:49:40', '2025-02-03 05:49:40'),
(7, 'rudransh', 'sadasd asdho h', '67a058fec4261.jpg', 'https://wa.me/1234567890', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 1, '2025-02-03 05:49:50', '2025-02-03 05:49:50'),
(8, 'rudransh ', 'description', '67a058fec4261.jpg', 'https://wa.me/1234567890', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 'https://www.facebook.com/testuser123', 1, '2025-02-03 05:49:50', '2025-02-03 05:49:50');

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
(42, 'AMAN KUMAR', 'KUMAR', 'male', '2222-02-04', 'asdassdasdd@gmail.com', '4564564564', '', '', '', '', '', '', '679c7b61ec365.jpg', 'sdasd', '1234', 'admin', '2025-01-22 05:39:32', '2025-02-03 06:07:34', 1),
(45, 'SFDS', 'DSFSDF', 'male', '0000-00-00', 'rudsaransh@gmail.com', '4564564565', '', '', '', '', '', '', '6790871a838bf.jpg', 'qqqq', '1234', 'admin', '2025-01-22 05:50:18', '2025-02-03 06:07:33', 1),
(50, 'ASD ASDIH', 'SDHADAD', 'male', '2024-11-29', 'rudransh@gmail.com', '4565456586', '', '', '', '', '', '', '', 'uiyiuy', '0987', 'admin', '2025-01-31 07:13:38', '2025-02-03 06:07:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_duration`
--
ALTER TABLE `category_duration`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category_duration`
--
ALTER TABLE `category_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
