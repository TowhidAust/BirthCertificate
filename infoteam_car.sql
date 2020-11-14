-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2020 at 01:37 PM
-- Server version: 10.1.46-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoteam_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `api_settings`
--

CREATE TABLE `api_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_settings`
--

INSERT INTO `api_settings` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'api', '1', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'anyone_register', '0', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'region_availability', 'region one, region two, region three', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'driver_review', '0', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'booking', '3', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'cancel', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'max_trip', '1', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(8, 'api_key', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(9, 'db_url', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(10, 'db_secret', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(11, 'server_key', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(12, 'google_api', '0', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup` timestamp NULL DEFAULT NULL,
  `dropoff` timestamp NULL DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `pickup_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `travellers` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `user_id`, `vehicle_id`, `driver_id`, `pickup`, `dropoff`, `duration`, `pickup_addr`, `dest_addr`, `note`, `travellers`, `status`, `payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 1, 1, 7, '2020-09-03 20:50:50', '2020-09-04 17:59:28', 2880, '70981 Blanda Loaf Apt. 417\nCarolynemouth, TN 04442', '8625 Sauer Stream\nJackelinehaven, ID 82387-5496', 'sample note', 3, 1, 1, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 5, 1, 1, 7, '2020-09-11 12:14:12', '2020-09-12 10:11:38', 2880, '794 Gislason Pine\nStammmouth, MT 73980-6575', '27423 Breitenberg Union\nGiannishire, OR 24540', 'sample note', 4, 0, 0, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_meta`
--

CREATE TABLE `bookings_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings_meta`
--

INSERT INTO `bookings_meta` (`id`, `booking_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'integer', 'tax_total', '500', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(2, 1, 'integer', 'total_tax_percent', '0', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(3, 1, 'integer', 'total_tax_charge_rs', '0', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(4, 1, 'string', 'ride_status', 'Completed', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(5, 1, 'string', 'journey_date', '04-09-2020', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(6, 1, 'string', 'journey_time', '06:50:50', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(7, 1, 'integer', 'customerid', '4', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(8, 1, 'integer', 'vehicleid', '1', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(9, 1, 'integer', 'day', '1', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(10, 1, 'integer', 'mileage', '10', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(11, 1, 'integer', 'waiting_time', '0', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(12, 1, 'string', 'date', '2020-09-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(13, 1, 'integer', 'total', '500', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(14, 1, 'integer', 'receipt', '1', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(15, 2, 'string', 'ride_status', 'Upcoming', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(16, 2, 'string', 'journey_date', '11-09-2020', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(17, 2, 'string', 'journey_time', '22:14:12', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `booking_income`
--

CREATE TABLE `booking_income` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_income`
--

INSERT INTO `booking_income` (`id`, `booking_id`, `income_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_payments`
--

CREATE TABLE `booking_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_quotation`
--

CREATE TABLE `booking_quotation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `pickup` timestamp NULL DEFAULT NULL,
  `dropoff` timestamp NULL DEFAULT NULL,
  `pickup_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dest_addr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `travellers` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `day` int(11) DEFAULT NULL,
  `mileage` double DEFAULT NULL,
  `waiting_time` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tax_total` double(10,2) DEFAULT NULL,
  `total_tax_percent` double(10,2) DEFAULT NULL,
  `total_tax_charge_rs` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_services`
--

CREATE TABLE `company_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_services`
--

INSERT INTO `company_services` (`id`, `title`, `image`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Best price guranteed', 'fleet-bestprice.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(2, '24/7 Customer care', 'fleet-care.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(3, 'Home pickups', 'fleet-homepickup.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(4, 'Easy Bookings', 'fleet-easybooking.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Neque at, nobis repudiandae dolores.', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `driver_logs`
--

CREATE TABLE `driver_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver_logs`
--

INSERT INTO `driver_logs` (`id`, `vehicle_id`, `driver_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2020-09-19 03:22:43', '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `driver_vehicle`
--

CREATE TABLE `driver_vehicle` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `driver_vehicle`
--

INSERT INTO `driver_vehicle` (`id`, `vehicle_id`, `driver_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `email_content`
--

CREATE TABLE `email_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_content`
--

INSERT INTO `email_content` (`id`, `key`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'insurance', 'vehicle insurance email content', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'vehicle_licence', 'vehicle licence email content', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'driving_licence', 'driving licence email content', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'registration', 'vehicle registration email content', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'service_reminder', 'service reminder email content', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'users', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'options', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(8, 'email', '0', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `exp_id` int(11) DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'e',
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `user_id` int(11) DEFAULT NULL,
  `expense_type` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `vehicle_id`, `exp_id`, `type`, `amount`, `user_id`, `expense_type`, `comment`, `date`, `created_at`, `updated_at`, `deleted_at`, `vendor_id`) VALUES
(1, 1, NULL, 'e', 3844.00, 2, 1, 'Sample Comment', '2020-09-18', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, NULL),
(2, 2, NULL, 'e', 2244.00, 3, 4, 'Sample Comment', '2020-09-14', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, NULL),
(3, 1, 1, 'e', 500.00, 2, 8, 'Sample Comment', '2020-09-17', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, NULL),
(4, 1, 2, 'e', 500.00, 2, 8, 'Sample Comment', '2020-09-29', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense_cat`
--

CREATE TABLE `expense_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expense_cat`
--

INSERT INTO `expense_cat` (`id`, `name`, `user_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Insurance', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'Patente', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'Mechanics', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'Car wash', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'Vignette', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'Maintenance', 14, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'Parking', 14, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(8, 'Fuel', 15, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(9, 'Car Services', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fare_settings`
--

CREATE TABLE `fare_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fare_settings`
--

INSERT INTO `fare_settings` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`, `type_id`) VALUES
(1, 'hatchback_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(2, 'hatchback_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(3, 'hatchback_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(4, 'hatchback_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(5, 'hatchback_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(6, 'hatchback_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(7, 'hatchback_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(8, 'hatchback_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(9, 'hatchback_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(10, 'hatchback_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(11, 'hatchback_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(12, 'hatchback_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 1),
(13, 'sedan_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(14, 'sedan_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(15, 'sedan_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(16, 'sedan_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(17, 'sedan_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(18, 'sedan_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(19, 'sedan_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(20, 'sedan_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(21, 'sedan_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(22, 'sedan_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(23, 'sedan_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(24, 'sedan_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 2),
(25, 'minivan_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(26, 'minivan_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(27, 'minivan_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(28, 'minivan_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(29, 'minivan_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(30, 'minivan_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(31, 'minivan_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(32, 'minivan_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(33, 'minivan_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(34, 'minivan_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(35, 'minivan_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(36, 'minivan_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 3),
(37, 'saloon_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(38, 'saloon_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(39, 'saloon_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(40, 'saloon_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(41, 'saloon_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(42, 'saloon_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(43, 'saloon_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(44, 'saloon_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(45, 'saloon_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(46, 'saloon_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(47, 'saloon_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(48, 'saloon_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 4),
(49, 'suv_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(50, 'suv_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(51, 'suv_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(52, 'suv_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(53, 'suv_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(54, 'suv_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(55, 'suv_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(56, 'suv_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(57, 'suv_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(58, 'suv_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(59, 'suv_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(60, 'suv_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 5),
(61, 'bus_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(62, 'bus_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(63, 'bus_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(64, 'bus_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(65, 'bus_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(66, 'bus_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(67, 'bus_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(68, 'bus_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(69, 'bus_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(70, 'bus_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(71, 'bus_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(72, 'bus_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 6),
(73, 'truck_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(74, 'truck_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(75, 'truck_base_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(76, 'truck_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(77, 'truck_weekend_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(78, 'truck_weekend_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(79, 'truck_weekend_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(80, 'truck_weekend_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(81, 'truck_night_base_fare', '500', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(82, 'truck_night_base_km', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(83, 'truck_night_wait_time', '2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7),
(84, 'truck_night_std_fare', '20', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `frontend`
--

CREATE TABLE `frontend` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key_value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frontend`
--

INSERT INTO `frontend` (`id`, `key_name`, `key_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'about_us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'contact_email', 'master@admin.com', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'contact_phone', '0123456789', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'customer_support', '0999988888', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'about_description', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'about_title', 'Proudly serving you', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'facebook', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(8, 'twitter', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(9, 'instagram', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(10, 'linkedin', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(11, 'faq_link', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(12, 'cities', '5', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(13, 'vehicles', '10', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(14, 'cancellation', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(15, 'terms', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(16, 'privacy_policy', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(17, 'enable', '1', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(18, 'language', 'en', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `vendor_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `fuel_from` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost_per_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `consumption` int(11) DEFAULT NULL,
  `complete` int(11) DEFAULT '0',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `vehicle_id`, `user_id`, `start_meter`, `end_meter`, `reference`, `province`, `note`, `vendor_name`, `qty`, `fuel_from`, `cost_per_unit`, `consumption`, `complete`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '1000', '2000', NULL, 'Gujarat', 'sample note', NULL, 10, 'Fuel Tank', '50', 100, 0, '2020-09-17', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 1, 2, '2000', '0', NULL, 'Gujarat', 'sample note', NULL, 10, 'Fuel Tank', '50', 0, 0, '2020-09-29', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `income_id` int(11) DEFAULT NULL,
  `amount` double(10,2) NOT NULL DEFAULT '0.00',
  `user_id` int(11) DEFAULT NULL,
  `income_cat` int(11) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tax_percent` double(10,2) DEFAULT NULL,
  `tax_charge_rs` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `vehicle_id`, `income_id`, `amount`, `user_id`, `income_cat`, `mileage`, `date`, `created_at`, `updated_at`, `deleted_at`, `tax_percent`, `tax_charge_rs`) VALUES
(1, 1, NULL, 4067.00, 2, 1, NULL, '2020-09-14', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 0.00, 0.00),
(2, 2, NULL, 4265.00, 3, 1, NULL, '2020-09-18', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 0.00, 0.00),
(3, 1, 1, 500.00, 1, 1, 10, '2020-09-19', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `income_cat`
--

CREATE TABLE `income_cat` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `income_cat`
--

INSERT INTO `income_cat` (`id`, `name`, `user_id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Booking', 1, 'd', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `fcm_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_06_03_134331_create_expense_table', 1),
(2, '2017_06_03_134332_create_expense_cat_table', 1),
(3, '2017_06_03_134332_create_income_table', 1),
(4, '2017_06_03_134333_create_income_cat_table', 1),
(5, '2017_06_03_134336_create_password_resets_table', 1),
(6, '2017_06_03_134337_create_users_table', 1),
(7, '2017_06_03_134338_create_vehicles_table', 1),
(8, '2017_07_24_080537_create_booking_table', 1),
(9, '2017_07_24_080643_create_settings_table', 1),
(10, '2017_08_01_073926_create_booking_income_table', 1),
(11, '2017_10_30_064357_create_notifications_table', 1),
(12, '2017_10_30_094858_create_fuel_table', 1),
(13, '2017_11_09_105729_create_vendors_table', 1),
(14, '2017_11_10_062609_create_work_orders_table', 1),
(15, '2017_11_10_095438_create_notes_table', 1),
(16, '2017_11_22_093559_create_vehicle_group_table', 1),
(17, '2017_12_28_091600_create_service_items_table', 1),
(18, '2017_12_28_122952_create_service_reminder_table', 1),
(19, '2017_12_28_174333_create_api_settings_table', 1),
(20, '2018_01_08_062105_create_driver_vehicle_table', 1),
(21, '2018_01_10_130517_users_meta', 1),
(22, '2018_01_13_050018_bookings_meta', 1),
(23, '2018_01_16_095657_fare_settings', 1),
(24, '2018_01_25_050939_create_vehicles_meta_table', 1),
(25, '2018_02_06_052302_create_message_table', 1),
(26, '2018_02_06_125252_create_reviews_table', 1),
(27, '2018_03_13_124424_create_addresses_table', 1),
(28, '2018_03_28_085735_create_reasons_table', 1),
(29, '2018_04_28_073004_create_email_content_table', 1),
(30, '2018_08_14_061757_create_vehicle_review_table', 1),
(31, '2019_01_18_063916_add_vendor_id_to_expense', 1),
(32, '2019_01_19_080738_add_udf_to_vendors', 1),
(33, '2019_01_19_103826_create_parts_table', 1),
(34, '2019_01_19_110823_create_vehicle_types_table', 1),
(35, '2019_01_22_101948_create_driver_logs_table', 1),
(36, '2019_01_23_113852_add_type_id_to_vehicles_table', 1),
(37, '2019_01_24_095115_add_type_id_to_fare_settings_table', 1),
(38, '2019_04_12_092111_create_parts_category_table', 1),
(39, '2019_04_19_053314_create_work_order_logs_table', 1),
(40, '2019_05_13_062039_create_push_notification_table', 1),
(41, '2019_07_18_110031_add_column_to_vendors', 1),
(42, '2019_07_31_082514_create_testimonials_table', 1),
(43, '2019_07_31_102801_create_frontend_table', 1),
(44, '2019_08_01_045837_add_columns_to_message_table', 1),
(45, '2019_08_19_101509_create_booking_quotation_table', 1),
(46, '2019_08_22_052138_create_parts_used_table', 1),
(47, '2019_08_22_113138_add_parts_price_to_work_order_logs_table', 1),
(48, '2019_08_29_104613_create_company_services_table', 1),
(49, '2019_09_16_085700_create_teams_table', 1),
(50, '2019_12_10_083547_add_columns_to_booking_quotation_table', 1),
(51, '2019_12_16_064152_add_indexes_to_users_table', 1),
(52, '2019_12_16_064951_add_indexes_to_addresses_table', 1),
(53, '2019_12_16_065511_add_indexes_to_bookings_table', 1),
(54, '2019_12_16_083315_add_indexes_to_booking_income_table', 1),
(55, '2019_12_16_084539_add_indexes_to_booking_quotation_table', 1),
(56, '2019_12_16_085312_add_indexes_to_driver_logs_table', 1),
(57, '2019_12_16_085505_add_indexes_to_driver_vehicle_table', 1),
(58, '2019_12_16_091010_add_indexes_to_email_content_table', 1),
(59, '2019_12_16_091713_add_indexes_to_expense_table', 1),
(60, '2019_12_16_094305_add_indexes_to_expense_cat_table', 1),
(61, '2019_12_16_094651_add_indexes_to_fare_settings_table', 1),
(62, '2019_12_16_095024_add_indexes_to_frontend_table', 1),
(63, '2019_12_16_095339_add_indexes_to_fuel_table', 1),
(64, '2019_12_16_095634_add_indexes_to_income_table', 1),
(65, '2019_12_16_095953_add_indexes_to_income_cat_table', 1),
(66, '2019_12_16_100221_add_indexes_to_notes_table', 1),
(67, '2019_12_16_100437_add_indexes_to_notifications_table', 1),
(68, '2019_12_16_100545_add_indexes_to_parts_table', 1),
(69, '2019_12_16_101113_add_indexes_to_parts_used_table', 1),
(70, '2019_12_16_101540_add_indexes_to_push_notification_table', 1),
(71, '2019_12_16_101851_add_indexes_to_reviews_table', 1),
(72, '2019_12_16_102259_add_indexes_to_service_reminder_table', 1),
(73, '2019_12_16_102555_add_indexes_to_vehicles_table', 1),
(74, '2019_12_16_104209_add_indexes_to_vehicle_review_table', 1),
(75, '2019_12_16_104440_add_indexes_to_vendors_table', 1),
(76, '2019_12_16_104704_add_indexes_to_work_orders_table', 1),
(77, '2019_12_16_105013_add_indexes_to_work_order_logs_table', 1),
(78, '2019_12_16_115309_add_indexes_to_api_settings_table', 1),
(79, '2019_12_17_080649_add_taxes_to_income_table', 1),
(80, '2019_12_19_052248_create_payment_settings_table', 1),
(81, '2019_12_19_063520_create_booking_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `submitted_on` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_cost` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `stock` int(11) DEFAULT NULL,
  `udf` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parts_category`
--

CREATE TABLE `parts_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parts_category`
--

INSERT INTO `parts_category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Engine Parts', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'Electricals', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parts_used`
--

CREATE TABLE `parts_used` (
  `id` int(10) UNSIGNED NOT NULL,
  `part_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'method', '[\"cash\"]', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'currency_code', 'INR', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'stripe_publishable_key', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'stripe_secret_key', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'razorpay_key', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'razorpay_secret', '', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `push_notification`
--

CREATE TABLE `push_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authtoken` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contentencoding` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endpoint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publickey` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reasons`
--

CREATE TABLE `reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reasons`
--

INSERT INTO `reasons` (`id`, `reason`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'No fuel', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(2, 'Tire punctured', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `ratings` double(8,2) DEFAULT NULL,
  `review_text` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `time_interval` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `overdue_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overdue_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter_interval` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `overdue_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `duesoon_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duesoon_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'off',
  `duesoon_meter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `description`, `time_interval`, `overdue_time`, `overdue_unit`, `meter_interval`, `overdue_meter`, `show_time`, `duesoon_time`, `duesoon_unit`, `show_meter`, `duesoon_meter`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Change oil', 'on', '60', 'day(s)', 'off', NULL, 'on', '2', 'day(s)', 'off', NULL, NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_reminder`
--

CREATE TABLE `service_reminder` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `last_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_meter` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `name`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Website Name', 'app_name', 'Fleet Manager', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'Business Address 1', 'badd1', 'Company Address 1', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'Business Address 2', 'badd2', 'Company Address 2', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'Email Address', 'email', 'master@admin.com', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'City', 'city', 'Bhavnagar', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'State', 'state', 'Gujarat', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'Country', 'country', 'India', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(8, 'Distence Format', 'dis_format', 'km', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(9, 'Language', 'language', 'English-en', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(10, 'Currency', 'currency', '₹', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(11, 'Tax No', 'tax_no', 'ABCD8735XXX', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(12, 'Invoice Text', 'invoice_text', 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(13, 'Small Logo', 'icon_img', 'logo-40.png', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(14, 'Main Logo', 'logo_img', 'logo.png', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(15, 'Time Interval', 'time_interval', '30', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(16, 'Tax Charge', 'tax_charge', 'null', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(17, 'Fuel Unit', 'fuel_unit', 'gallon', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(18, 'Date Format', 'date_format', 'd-m-Y', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `details`, `designation`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cole Wilkinson', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'Stephen Towne', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'Griffin Corkery', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'Savannah Gutmann Sr.', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'Mr. Brycen Lockman IV', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus neque est nemo et ipsum fugiat, ab facere adipisci. Aliquam quibusdam molestias quisquam distinctio? Culpa, voluptatem voluptates exercitationem sequi velit quaerat.', 'Owner', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Grover Jacobi II', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'Dr. Margot Koepp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'Wilburn Lowe Jr.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'Keyon Okuneva', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'Lolita Kirlin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi doloribus, repudiandae iusto magnam soluta voluptates, expedita aspernatur consectetur! Ex fugit ducimus itaque, quibusdam nemo in animi quae libero repellendus!', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `group_id`, `api_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Administrator', 'master@admin.com', '$2y$10$yPMLyPHUZ.tHEXvOkc4Rpu3jjXcFABaTJAtlIgm2oHRJeg7.w7o/.', 'S', NULL, 'eeMiPz8xtdAd9St3dbBnlo3SCCbPdr8V6HbZ043OXA9GhqW1b6XB94KQm7XZ', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'User One', 'user1@admin.com', '$2y$10$hZQKQIwylDw.ge2estWLTelMiv9tR2zKoLu5boqQj1FsMqJ6nJhxm', 'O', 1, '4E2Nc6NU4ho9Zvl1srrKHmukLhfqcF7CwQxmcgCXDxKYd2tUuVjA8g3UvzfI', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'User Two', 'user2@admin.com', '$2y$10$u76nPcXS10XVFUQQlC6n2O7AAgxynNZrwDmxCcl.w15IquSeDqhbu', 'O', 1, 'lyYMRNePzF6GxBGcpHe14eyJM4DLosYpDMwuxB0nHAHbPJZeUcuguB00aDwx', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'Customer One', 'customer1@gmail.com', '$2y$10$bixCHzPs4PCaA37GuVtJEegTE.guT/oyzTRXGFM5SkVy9WDb7NaNy', 'C', NULL, 'soolv73qJetJUkA3DTHt4DOjiUimjOHWGxQzs3mWLqhwZhZFm8qlFU4dwFEz', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'Customer Two', 'customer2@gmail.com', '$2y$10$029QXienn6BHJrwUhLGFe.K5CfX3QJjNl1e1ft1I7JnDV.r9kc1y6', 'C', NULL, 'M7ws4yUL1WacbAP75yAsed1SFo9qJjsEMbQVawn0xujihSbzOvHSWM8fS1Z1', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'Ms. Dora Weimann Sr.', 'clay05@example.com', '$2y$10$rC7sOjE1IagfayEQ1hG7qOSWdB6CeIthvJzZ2AJ4EncbY5clM.JnS', 'D', NULL, 'lYjDVsBromNBAOGblipgW7L3xMoxPvfY375JdaEFL9EU9tTs34eQ0Z6Ll8bF', 'wymEwNgEUP', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'Myrl Dooley', 'qjacobs@example.org', '$2y$10$s8T14r16dzIcf8Ap1v4DMe0sIQ6HuaUT1n5gKD1lSP0mLhsaCb4tu', 'D', NULL, 'mAm5XNMy54EwnlJ1jDlveOAjiuwqYUPRZG16DsSacDJ1rhMphPQG09OjkS8U', 'opc70dQn19', '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_meta`
--

CREATE TABLE `users_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_meta`
--

INSERT INTO `users_meta` (`id`, `user_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'string', 'profile_image', 'no-user.jpg', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(2, 1, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(3, 2, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(4, 3, 'string', 'module', 'a:15:{i:0;i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;}', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(5, 4, 'string', 'first_name', 'Customer', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(6, 4, 'string', 'last_name', 'One', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(7, 4, 'string', 'address', '728 Evalyn Knolls Apt. 119 Lake Jaydenville, MD 74979-3406', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(8, 4, 'string', 'mobno', '8639379915669', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(9, 4, 'integer', 'gender', '0', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(10, 5, 'string', 'first_name', 'Customer', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(11, 5, 'string', 'last_name', 'Two', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(12, 5, 'string', 'address', '91158 Luigi Cliffs Lake Darby, MA 39627-1727', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(13, 5, 'string', 'mobno', '9773607007903', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(14, 5, 'integer', 'gender', '1', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(15, 6, 'string', 'first_name', 'Ms.', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(16, 6, 'string', 'last_name', 'Dora', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(17, 6, 'string', 'address', '1000 Steuber Mills Apt. 374\nLake Rocio, TX 36329', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(18, 6, 'string', 'phone', '01420920567574', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(19, 6, 'string', 'issue_date', '2020-09-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(20, 6, 'string', 'exp_date', '2020-11-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(21, 6, 'string', 'start_date', '2020-09-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(22, 6, 'string', 'end_date', '2020-10-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(23, 6, 'integer', 'license_number', '490140', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(24, 6, 'integer', 'contract_number', '7540', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(25, 6, 'integer', 'emp_id', '3', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(26, 7, 'string', 'first_name', 'Myrl', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(27, 7, 'string', 'last_name', 'Dooley', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(28, 7, 'string', 'address', '8666 Benton Spring Suite 662\nBahringerland, RI 59761', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(29, 7, 'string', 'phone', '05285920015510', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(30, 7, 'string', 'issue_date', '2020-09-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(31, 7, 'string', 'exp_date', '2020-11-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(32, 7, 'string', 'start_date', '2020-09-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(33, 7, 'string', 'end_date', '2020-10-19', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(34, 7, 'integer', 'license_number', '438648', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(35, 7, 'integer', 'contract_number', '7772', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(36, 7, 'integer', 'emp_id', '8', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(37, 6, 'integer', 'vehicle_id', '1', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(38, 1, 'integer', 'login_status', '1', NULL, '2020-09-19 03:27:27', '2020-09-19 03:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `lic_exp_date` date DEFAULT NULL,
  `reg_exp_date` date DEFAULT NULL,
  `vehicle_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engine_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horse_power` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `license_plate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mileage` int(11) DEFAULT NULL,
  `in_service` tinyint(4) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `int_mileage` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `make`, `model`, `type`, `year`, `group_id`, `lic_exp_date`, `reg_exp_date`, `vehicle_image`, `engine_type`, `horse_power`, `color`, `vin`, `license_plate`, `mileage`, `in_service`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `int_mileage`, `type_id`) VALUES
(1, 'Honda', 'Jazz', NULL, '2015', 1, '2021-05-27', '2021-02-16', 'car1.jpeg', 'Petrol', '190', 'red', '2342342', '9191bh', 45464, 1, 1, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 50, 3),
(2, 'Tata', 'NANO', NULL, '2012', 1, '2021-09-19', '2020-12-18', 'car2.jpeg', 'Petrol', '150', 'white', '124578', '1245ab', 45464, 1, 1, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles_meta`
--

CREATE TABLE `vehicles_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicles_meta`
--

INSERT INTO `vehicles_meta` (`id`, `vehicle_id`, `type`, `key`, `value`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'integer', 'driver_id', '6', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(2, 1, 'double', 'average', '35.45', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(3, 1, 'string', 'ins_number', '70651', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(4, 1, 'string', 'ins_exp_date', '2021-03-28', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(5, 2, 'double', 'average', '42.5', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(6, 2, 'string', 'ins_number', '36945', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(7, 2, 'string', 'ins_exp_date', '2021-03-28', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_group`
--

CREATE TABLE `vehicle_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `note` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle_group`
--

INSERT INTO `vehicle_group` (`id`, `name`, `description`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Default', 'Default vehicle group', 'Default vehicle group', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_review`
--

CREATE TABLE `vehicle_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kms_outgoing` int(11) DEFAULT NULL,
  `kms_incoming` int(11) DEFAULT NULL,
  `fuel_level_out` int(11) DEFAULT NULL,
  `fuel_level_in` int(11) DEFAULT NULL,
  `datetime_outgoing` datetime DEFAULT NULL,
  `datetime_incoming` datetime DEFAULT NULL,
  `petrol_card` text COLLATE utf8_unicode_ci,
  `lights` text COLLATE utf8_unicode_ci,
  `invertor` text COLLATE utf8_unicode_ci,
  `car_mats` text COLLATE utf8_unicode_ci,
  `int_damage` text COLLATE utf8_unicode_ci,
  `int_lights` text COLLATE utf8_unicode_ci,
  `ext_car` text COLLATE utf8_unicode_ci,
  `tyre` text COLLATE utf8_unicode_ci,
  `ladder` text COLLATE utf8_unicode_ci,
  `leed` text COLLATE utf8_unicode_ci,
  `power_tool` text COLLATE utf8_unicode_ci,
  `ac` text COLLATE utf8_unicode_ci,
  `head_light` text COLLATE utf8_unicode_ci,
  `lock` text COLLATE utf8_unicode_ci,
  `windows` text COLLATE utf8_unicode_ci,
  `condition` text COLLATE utf8_unicode_ci,
  `oil_chk` text COLLATE utf8_unicode_ci,
  `suspension` text COLLATE utf8_unicode_ci,
  `tool_box` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `vehicletype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isenable` int(11) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `vehicletype`, `displayname`, `icon`, `isenable`, `seats`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hatchback', 'Hatchback', NULL, 1, 4, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(2, 'Sedan', 'Sedan', NULL, 1, 4, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(3, 'Mini van', 'Mini van', NULL, 1, 7, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(4, 'Saloon', 'Saloon', NULL, 1, 4, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(5, 'SUV', 'SUV', NULL, 1, 4, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(6, 'Bus', 'Bus', NULL, 1, 40, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL),
(7, 'Truck', 'Truck', NULL, 1, 3, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `udf` text COLLATE utf8_unicode_ci,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `photo`, `type`, `website`, `custom_type`, `note`, `phone`, `address1`, `address2`, `city`, `province`, `email`, `deleted_at`, `created_at`, `updated_at`, `udf`, `country`, `postal_code`) VALUES
(1, 'Benny Stokes', NULL, 'Parts', 'http://www.example.com', NULL, 'default vendor', '03942979981995', '70847 O\'Kon Meadow Suite 835\nNorth Royce, IN 01010', NULL, 'Port Timothytown', NULL, 'alta.vonrueden@example.org', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, NULL, NULL),
(2, 'Joanie Cartwright', NULL, 'Machinaries', 'http://www.example.com', NULL, 'default vendor', '05810954491319', '49931 Brandyn Stravenue Suite 520\nSkyeborough, PA 08525-2334', NULL, 'Runolfssonchester', NULL, 'cbahringer@example.org', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `created_on`, `required_by`, `vehicle_id`, `vendor_id`, `price`, `status`, `description`, `meter`, `note`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2020-09-19', '2020-09-24', 2, 1, 3000.00, 'Processing', 'Sample work order', 1522, 'sample work order', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43'),
(2, '2020-09-19', '2020-09-24', 1, 2, 1000.00, 'Pending', 'Sample work order', 1023, 'sample work order', NULL, '2020-09-19 03:22:43', '2020-09-19 03:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `work_order_logs`
--

CREATE TABLE `work_order_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_on` date DEFAULT NULL,
  `required_by` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `meter` int(11) DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parts_price` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_order_logs`
--

INSERT INTO `work_order_logs` (`id`, `created_on`, `required_by`, `vehicle_id`, `vendor_id`, `price`, `status`, `type`, `description`, `meter`, `note`, `created_at`, `updated_at`, `parts_price`) VALUES
(1, '2020-09-19', '2020-09-24', 2, 1, 3000.00, 'Processing', 'Created', 'Sample work order', 1522, 'sample work order', '2020-09-19 03:22:43', '2020-09-19 03:22:43', 0),
(2, '2020-09-19', '2020-09-24', 1, 2, 1000.00, 'Pending', 'Created', 'Sample work order', 1023, 'sample work order', '2020-09-19 03:22:43', '2020-09-19 03:22:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_index` (`customer_id`);

--
-- Indexes for table `api_settings`
--
ALTER TABLE `api_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_settings_key_name_index` (`key_name`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_customer_id_driver_id_vehicle_id_user_id_index` (`customer_id`,`driver_id`,`vehicle_id`,`user_id`),
  ADD KEY `bookings_payment_status_index` (`payment`,`status`);

--
-- Indexes for table `bookings_meta`
--
ALTER TABLE `bookings_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_meta_booking_id_index` (`booking_id`),
  ADD KEY `bookings_meta_key_index` (`key`);

--
-- Indexes for table `booking_income`
--
ALTER TABLE `booking_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_income_booking_id_income_id_index` (`booking_id`,`income_id`);

--
-- Indexes for table `booking_payments`
--
ALTER TABLE `booking_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_quotation`
--
ALTER TABLE `booking_quotation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_quotation_customer_id_user_id_vehicle_id_driver_id_index` (`customer_id`,`user_id`,`vehicle_id`,`driver_id`),
  ADD KEY `booking_quotation_status_payment_index` (`status`,`payment`);

--
-- Indexes for table `company_services`
--
ALTER TABLE `company_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_logs`
--
ALTER TABLE `driver_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_logs_driver_id_vehicle_id_index` (`driver_id`,`vehicle_id`);

--
-- Indexes for table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_vehicle_driver_id_vehicle_id_index` (`driver_id`,`vehicle_id`);

--
-- Indexes for table `email_content`
--
ALTER TABLE `email_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_content_key_index` (`key`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_vehicle_id_exp_id_user_id_expense_type_index` (`vehicle_id`,`exp_id`,`user_id`,`expense_type`),
  ADD KEY `expense_type_index` (`type`),
  ADD KEY `expense_date_index` (`date`);

--
-- Indexes for table `expense_cat`
--
ALTER TABLE `expense_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_cat_name_type_index` (`name`,`type`);

--
-- Indexes for table `fare_settings`
--
ALTER TABLE `fare_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fare_settings_key_name_index` (`key_name`),
  ADD KEY `fare_settings_type_id_index` (`type_id`);

--
-- Indexes for table `frontend`
--
ALTER TABLE `frontend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frontend_key_name_index` (`key_name`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_vehicle_id_user_id_index` (`vehicle_id`,`user_id`),
  ADD KEY `fuel_date_index` (`date`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_vehicle_id_income_id_user_id_income_cat_index` (`vehicle_id`,`income_id`,`user_id`,`income_cat`),
  ADD KEY `income_date_index` (`date`);

--
-- Indexes for table `income_cat`
--
ALTER TABLE `income_cat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `income_cat_name_type_index` (`name`,`type`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_vehicle_id_customer_id_index` (`vehicle_id`,`customer_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`),
  ADD KEY `notifications_type_index` (`type`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_category_id_user_id_availability_index` (`category_id`,`user_id`,`availability`);

--
-- Indexes for table `parts_category`
--
ALTER TABLE `parts_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts_used`
--
ALTER TABLE `parts_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parts_used_part_id_work_id_index` (`part_id`,`work_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_settings_name_unique` (`name`);

--
-- Indexes for table `push_notification`
--
ALTER TABLE `push_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `push_notification_user_id_index` (`user_id`),
  ADD KEY `push_notification_user_type_index` (`user_type`);

--
-- Indexes for table `reasons`
--
ALTER TABLE `reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_booking_id_driver_id_index` (`user_id`,`booking_id`,`driver_id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_reminder`
--
ALTER TABLE `service_reminder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_reminder_vehicle_id_service_id_index` (`vehicle_id`,`service_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_index` (`user_type`);

--
-- Indexes for table `users_meta`
--
ALTER TABLE `users_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_meta_user_id_index` (`user_id`),
  ADD KEY `users_meta_key_index` (`key`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_group_id_type_id_user_id_in_service_index` (`group_id`,`type_id`,`user_id`,`in_service`),
  ADD KEY `vehicles_lic_exp_date_reg_exp_date_index` (`lic_exp_date`,`reg_exp_date`),
  ADD KEY `vehicles_license_plate_index` (`license_plate`);

--
-- Indexes for table `vehicles_meta`
--
ALTER TABLE `vehicles_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicles_meta_vehicle_id_index` (`vehicle_id`),
  ADD KEY `vehicles_meta_key_index` (`key`);

--
-- Indexes for table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_review`
--
ALTER TABLE `vehicle_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_review_vehicle_id_user_id_index` (`vehicle_id`,`user_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_type_index` (`type`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_orders_vehicle_id_vendor_id_index` (`vehicle_id`,`vendor_id`),
  ADD KEY `work_orders_status_index` (`status`);

--
-- Indexes for table `work_order_logs`
--
ALTER TABLE `work_order_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_order_logs_vehicle_id_vendor_id_index` (`vehicle_id`,`vendor_id`),
  ADD KEY `work_order_logs_status_index` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_settings`
--
ALTER TABLE `api_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings_meta`
--
ALTER TABLE `bookings_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `booking_income`
--
ALTER TABLE `booking_income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_payments`
--
ALTER TABLE `booking_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_quotation`
--
ALTER TABLE `booking_quotation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_services`
--
ALTER TABLE `company_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `driver_logs`
--
ALTER TABLE `driver_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_content`
--
ALTER TABLE `email_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_cat`
--
ALTER TABLE `expense_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fare_settings`
--
ALTER TABLE `fare_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `frontend`
--
ALTER TABLE `frontend`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income_cat`
--
ALTER TABLE `income_cat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parts_category`
--
ALTER TABLE `parts_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parts_used`
--
ALTER TABLE `parts_used`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `push_notification`
--
ALTER TABLE `push_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reasons`
--
ALTER TABLE `reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_reminder`
--
ALTER TABLE `service_reminder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_meta`
--
ALTER TABLE `users_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles_meta`
--
ALTER TABLE `vehicles_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_group`
--
ALTER TABLE `vehicle_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_review`
--
ALTER TABLE `vehicle_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_order_logs`
--
ALTER TABLE `work_order_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
