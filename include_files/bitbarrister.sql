-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 01:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitbarrister`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demo_user_address`
--

CREATE TABLE `demo_user_address` (
  `uadd_id` int(11) NOT NULL,
  `uadd_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `uadd_alias` varchar(50) NOT NULL DEFAULT '',
  `uadd_recipient` varchar(100) NOT NULL DEFAULT '',
  `uadd_phone` varchar(25) NOT NULL DEFAULT '',
  `uadd_company` varchar(75) NOT NULL DEFAULT '',
  `uadd_address_01` varchar(100) NOT NULL DEFAULT '',
  `uadd_address_02` varchar(100) NOT NULL DEFAULT '',
  `uadd_city` varchar(50) NOT NULL DEFAULT '',
  `uadd_county` varchar(50) NOT NULL DEFAULT '',
  `uadd_post_code` varchar(25) NOT NULL DEFAULT '',
  `uadd_country` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_user_address`
--

INSERT INTO `demo_user_address` (`uadd_id`, `uadd_uacc_fk`, `uadd_alias`, `uadd_recipient`, `uadd_phone`, `uadd_company`, `uadd_address_01`, `uadd_address_02`, `uadd_city`, `uadd_county`, `uadd_post_code`, `uadd_country`) VALUES
(1, 4, 'Home', 'Joe Public', '0123456789', '', '123', '', 'My City', 'My County', 'My Post Code', 'My Country'),
(2, 4, 'Work', 'Joe Public', '0123456789', 'Flexi', '321', '', 'My Work City', 'My Work County', 'My Work Post Code', 'My Work Country');

-- --------------------------------------------------------

--
-- Table structure for table `demo_user_profiles`
--

CREATE TABLE `demo_user_profiles` (
  `upro_id` int(11) NOT NULL,
  `upro_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upro_company` varchar(50) NOT NULL DEFAULT '',
  `upro_first_name` varchar(50) NOT NULL DEFAULT '',
  `upro_last_name` varchar(50) NOT NULL DEFAULT '',
  `upro_phone` varchar(25) NOT NULL DEFAULT '',
  `uadd_country_code` varchar(255) DEFAULT NULL,
  `upro_newsletter` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_user_profiles`
--

INSERT INTO `demo_user_profiles` (`upro_id`, `upro_uacc_fk`, `upro_company`, `upro_first_name`, `upro_last_name`, `upro_phone`, `uadd_country_code`, `upro_newsletter`) VALUES
(1, 1, '', 'John', 'Admin', '0123456789', NULL, 0),
(2, 2, '', 'Jim', 'Moderator', '0123465798', NULL, 0),
(3, 3, '', 'Joe', 'Public', '0123456789', NULL, 0),
(4, 5, '', 'gbajsdjhb', 'asjhasvbjhavjh', '7894864654', NULL, 0),
(10, 11, '', 'sfafsafwr2fsf', 'sfafsafwr2fsf', '7567076216', '93', 0),
(30, 31, '', 'wesssr325edxd', 'wesssr325edxd', '87874864', '93', 0),
(31, 32, '', 'testnewacciount', 'testnewacciount', '987797897897', '93', 0),
(47, 82, '', 'emnam1234', 'emnam1234', '98789798', '93', 0),
(51, 91, '', 'asaf', 'asfasf', '', '93', 0),
(52, 92, '', 'asfsaf', 'asfasf', '', '93', 0),
(53, 93, '', 'saf', 'asfas', '', '93', 0),
(54, 94, '', 'asa', 'asfaf', '', '93', 0),
(55, 95, '', 'asfasf', 'asfasf', '987779', '93', 0),
(56, 96, '', 'sadfaf', 'asfasfaf', '', '93', 0),
(57, 97, '', 'asfa', 'asfasfasf', '', '93', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` decimal(10,6) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `confirms_needed` int(11) NOT NULL DEFAULT '0',
  `confirms_received` int(11) DEFAULT '0',
  `deposit_status` int(11) DEFAULT NULL,
  `deposit_status_text` varchar(255) DEFAULT NULL,
  `status_url` varchar(255) DEFAULT NULL,
  `qrcode_url` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `record_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `earnings`
--

CREATE TABLE `earnings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `deposit_id` int(11) DEFAULT NULL,
  `profit` decimal(10,6) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `return_count` int(11) DEFAULT NULL,
  `old_balance` decimal(10,6) DEFAULT NULL,
  `balance_after_profit` decimal(10,6) NOT NULL,
  `is_added_deposit` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `error_logs`
--

CREATE TABLE `error_logs` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `error_message` varchar(255) DEFAULT NULL,
  `error_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `error_logs`
--

INSERT INTO `error_logs` (`id`, `table_name`, `error_message`, `error_date`) VALUES
(1, 'principle_back', 'no deposits for principle back for the date of 2017-04-06', '2017-04-06 08:14:37'),
(2, 'principle_back', 'no deposits for principle back for the date of 2017-08-02', '2017-08-02 11:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `minimum_amount` decimal(5,2) DEFAULT NULL,
  `profit_margin` int(11) NOT NULL,
  `plan_duration` varchar(255) NOT NULL COMMENT 'Plan Duration(30 Days etc)',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `minimum_amount`, `profit_margin`, `plan_duration`, `status`) VALUES
(1, 'Plan 1', '1% Daily (Forever)', '100.00', 1, '', 1),
(2, 'Plan 2', '3% Daily (For 100 Days)', '250.00', 3, '100', 1),
(3, 'Plan 3', '5% Daily (For 50 Days) 	', '500.00', 5, '50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `uacc_id` int(11) UNSIGNED NOT NULL,
  `uacc_group_fk` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `bitcoin_account_no` varchar(255) DEFAULT NULL,
  `reffrence_link` varchar(255) DEFAULT NULL,
  `balance` decimal(10,6) NOT NULL,
  `earnings` decimal(10,6) DEFAULT NULL,
  `reffrence_registration` varchar(50) DEFAULT NULL,
  `reffered_by` int(11) DEFAULT NULL,
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uacc_date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`uacc_id`, `uacc_group_fk`, `uacc_email`, `uacc_username`, `uacc_password`, `bitcoin_account_no`, `reffrence_link`, `balance`, `earnings`, `reffrence_registration`, `reffered_by`, `uacc_ip_address`, `uacc_salt`, `uacc_activation_token`, `uacc_forgotten_password_token`, `uacc_forgotten_password_expire`, `uacc_update_email_token`, `uacc_update_email`, `uacc_active`, `uacc_suspend`, `uacc_fail_login_attempts`, `uacc_fail_login_ip_address`, `uacc_date_fail_login_ban`, `uacc_date_last_login`, `uacc_date_added`) VALUES
(1, 3, 'admin@admin.com', 'admin', '$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq', NULL, NULL, '0.000000', NULL, NULL, NULL, '::1', 'XKVT29q2Jr', '', '9b830247e7900e957a169a40bc9eeefe5ae45f4c', '2017-08-02 09:37:29', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2017-08-09 10:01:12', '2011-01-01 00:00:00'),
(3, 1, 'public@public.com', 'public', '$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq', NULL, NULL, '1.000000', NULL, NULL, NULL, '::1', 'XKVT29q2Jr', '', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2017-03-27 14:02:26', '2011-09-15 12:24:45'),
(4, 1, 'mehul@aspireq.com', 'Rahul ', '$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq', '7848465456a4sas4654654', 'http://localhost/bitbarrister/register?ref=mehul', '0.000000', '0.000000', '9', NULL, '::1', 'XKVT29q2Jr', '637963bd1a71ee367ac39433fb88d352701bd952', '1659337ae81dcc00650f260dd45eb868c55d73ad', '2017-04-01 13:30:31', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2017-04-04 14:14:49', '2017-03-23 12:42:48'),
(5, 1, 'mehultally001@gmail.com', 'MehulParmar', '$2a$08$lSOQGNqwBFUEDTxm2Y.hb.mfPEAt/iiGY9kJsZsd4ekLJXLD.tCrq', '87874987987', 'http://localhost/bitbarrister/register?ref=MehulParmar', '3.206900', '3.206900', '1', 4, '::1', 'XKVT29q2Jr', '52812e321630df20ad5bfc034d6745fa024e9201', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2017-06-26 10:20:01', '2017-03-29 07:08:52'),
(11, 1, 'sfafsafwr2fsf@gmail.com', 'sfafsafwr2fsf', '$2a$08$DPk6a/zRgwjPKdaewrFL4u3jvz7hEWovRZE1QjQSR2aYwKFnRd3mm', '', '', '9999.999999', NULL, '6', NULL, '::1', 'Wz6sbwRJpb', '1ac4c16b941293ed55039b2c43e02a281a80213c', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-03-31 13:30:21', '2017-03-31 13:30:21'),
(31, 1, 'wesssr325edxd@gmail.cm', 'wesssr325edxd', '$2a$08$8b.wP25L0QBZ8e/5zVVNeeFOL8vcVTnvUqUroikD1j5YPiBccH1qG', 'adminadmin', '', '0.000000', NULL, NULL, NULL, '::1', 'YyJsTDzbPG', '6fef2a64e983f06c5c2ae205cd546aa4edcfe0b5', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-03-31 13:43:11', '2017-03-31 13:43:11'),
(32, 1, 'testnewacciount@gmail.com', 'testnewacciount', '$2a$08$D1SJHyu.toE5NgQrYpTQUOvKMcqltiV0ARG/JhWXamhuy5daxZRsC', '7897987987', '', '0.000000', NULL, NULL, NULL, '::1', 'rDp7pb5gcj', '0add48158d473097eae9ddbddb5cf6b5c46ddcf9', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 07:02:44', '2017-04-03 07:02:44'),
(41, 1, 'asfsafsafsfsg12@gmail.com', 'asfsafsafsfsg12', '$2a$08$kvMeGKqgrKZERDNdRxEIVOEpaR.Ytm8IpZNFjh3SMTo7vwZRPLgIe', '878978977', 'http://localhost/bitbarrister/register?ref=asfsafsafsfsg12', '0.000000', NULL, NULL, NULL, '::1', 'Dc2mQ3jHwj', 'f8fe3b704fb3b3bc300ff9c5c9a3fc1ded3d9e09', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 07:45:44', '2017-04-03 07:45:44'),
(65, 1, 'asfsafsafsfsg123@gmail.com', 'asfsafsafsfsg12', '$2a$08$9y7VtHdXjIecSQfeJNpn/OIGZM/6y7M84ANlHjq5vcLJV7VPRGBMG', '878978977', 'http://localhost/bitbarrister/register?ref=asfsafsafsfsg122', '0.000000', NULL, NULL, NULL, '::1', 'HbSbktmVhJ', '7a8ed41bb7b8d60f1cf49410635fe6c02ce9b947', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:08:59', '2017-04-03 08:08:59'),
(67, 1, 'asfsafasfnew@gmail.com', 'asfsafasfnew', '$2a$08$gmsMODjEvGOzIh6iiwnse.H7Fubr0hbXfeCUDNIWWZikm3HYVxHLO', 'a', 'http://localhost/bitbarrister/register?ref=asfsafasfnew', '0.000000', NULL, NULL, NULL, '::1', 'GDgdw3rSqC', '6f1ca19cc7fdb5605499872c6f70f7bdb72309a9', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:11:31', '2017-04-03 08:11:31'),
(69, 1, 'checknew8520@gmail.com', 'checknew8520', '$2a$08$EWjXgvY9E0RvJd/xtWwGWedS.HZKhcepNyO7TOGE2cVJc3BNj0Toq', '8978978', 'http://localhost/bitbarrister/register?ref=checknew8520', '0.000000', NULL, NULL, NULL, '::1', 'HZkgv95v48', 'a15c316f0f72f4958b107dcd7f2e93c43025cf09', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:12:31', '2017-04-03 08:12:31'),
(71, 1, 'rakeshmehul123@gmail.com', 'rakeshmehul123', '$2a$08$phdZRheKuKxXsRi2B3ydR.YbjgrbA1fr8xRwCFf1jYavpCSh2WQae', '', 'http://localhost/bitbarrister/register?ref=rakeshmehul123', '0.000000', NULL, NULL, NULL, '::1', '9xmpfYmr5J', '0aff4f87cbcc7a6fb13ec3d5726e87aac071019e', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:21:54', '2017-04-03 08:21:54'),
(73, 1, 'rakeshmehul1234@gmail.com', 'rakeshmehul1234', '$2a$08$oADWLo5tut3E/P.2d3.zY.WId5DJ8ACLiyTg4T2pjW.lIn2l82UXG', '', 'http://localhost/bitbarrister/register?ref=rakeshmehul1234', '0.000000', NULL, NULL, NULL, '::1', 'RQCw4fM2ck', '05fd795182c199638ce6d45fb6ca1a5b00f9d242', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:46:26', '2017-04-03 08:22:26'),
(75, 1, 'finaltest@gmail.com', 'finaltest', '$2a$08$2VXmuZ0J.WTQXaeF5.ZNReHGrz3dOPfpa5B66iGA0Igjz/T5fda7G', '787887', 'http://localhost/bitbarrister/register?ref=finaltest', '0.000000', NULL, NULL, NULL, '::1', 'JynxsvdTwb', '1066453ebc4c92cc11bab80761534d73ce03bbec', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:23:17', '2017-04-03 08:23:17'),
(77, 1, 'sdgsdgsdgsdgsdg@gmail.com', 'dsgsdff', '$2a$08$92s.PMVSwUN2pzkBv8pShOZ90Aopktf7Q3UcDci3lXvE3AOMVK3yW', '74874887', '', '0.000000', NULL, NULL, NULL, '::1', 'PW6ykZSRv3', 'dfc015ff53287d05f185d2d67382f1acd7f0bb71', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:23:56', '2017-04-03 08:23:56'),
(79, 1, 'newuserabc@gmail.com', 'newuserabc', '$2a$08$U6eouMyNBjCtXxHktNshnOQCpFohKCt8NdUwh6Mqwx2M3hEIeE4My', 'adminadmin', '', '0.000000', NULL, NULL, NULL, '::1', 'BS8NB67Bk2', '9afbee4511967b141f677a3d41f77f6bf0768d6c', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:26:41', '2017-04-03 08:26:41'),
(81, 1, 'finalabnc111@gmail.com', 'finalabnc111', '$2a$08$WoxklTror2qVaQGm44dQxOZU0WsVE.U2LwRxpE373l2OKVe.Em9oG', '9879879797', '', '0.000000', NULL, NULL, NULL, '::1', '7mnHBxFVdj', '6935fb8a845dc05ca29940358227b8e9275ef07f', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:30:32', '2017-04-03 08:30:32'),
(82, 1, 'emnam1234@gmail.com', 'emnam1234', '$2a$08$iHWTcymFX9/wZ3aMlsHljOzaMyX.WWmRf/rtJPByVJnjpZHryOcDy', '98789797', '', '0.000000', NULL, NULL, NULL, '::1', 'zbr6Wj7Qfx', '8ddad5fb462b490f22e0c17e6967177b8b797e3a', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 08:31:11', '2017-04-03 08:31:11'),
(84, 1, 'commuser12@gmail.com', 'commuser12', '$2a$08$z7mQ3SWuaZg.gdSMIFK7PeVy.MY6ojNrId1sLVyDImbrA9aE4owmu', '4887898', 'http://localhost/bitbarrister/register?ref=commuser12', '0.000000', NULL, NULL, 4, '::1', 'pKkb4wd3VZ', '8a259a915c881eaac65db5dde5ae5c40c3fff849', '', '0000-00-00 00:00:00', '', '', 1, 0, 0, '', '0000-00-00 00:00:00', '2017-04-03 09:02:27', '2017-04-03 09:01:59'),
(86, 1, 'sasf@gmail.com', 'sasf', '$2a$08$rDy4WrwCHdhNstsyuPIlUefO/iOLT3lXgix3rv8Ar9vywQ7Gytxn6', '', 'http://localhost/bitbarrister/register?ref=sasf', '0.000000', NULL, NULL, 4, '::1', 'VxXVd9HwjS', 'eef5f11605f95ea3154cf8e56f467fe32058ccf6', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-04 14:15:13', '2017-04-04 14:15:13'),
(88, 1, 'sampleuser@gmail.com', 'sampleuser', '$2a$08$gNvXJmzpBt01.ySuKFAU3O7ENo593KDhHXUkMejLxN6u8hcenVEj6', '', 'http://localhost/bitbarrister/register?ref=sampleuser', '0.000000', NULL, NULL, 4, '::1', 'wWMWDpvqyr', '8ea6c74696718eb2b55be3200dad46d88919841b', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-04 14:17:14', '2017-04-04 14:17:14'),
(90, 1, 'asfasf@gmail.com', 'safasf', '$2a$08$hX15wxzFIYk7qsVNtXtSy.5JLEv5SSXU9wpxIvQxfC5jOKufAqGYi', '', 'http://localhost/bitbarrister/register?ref=safasf', '0.000000', NULL, NULL, 4, '::1', 'VCGPGQqwKF', 'b732784b753ee80ae98c21b3e4f9a9660a00c7b5', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-04 14:18:17', '2017-04-04 14:18:17'),
(91, 1, 'sasfassa@gmail.com', 'asasf', '$2a$08$jwbtpUeWVPNe9bu6yFwP8urULm6Js0cIzYmW/awK0gxXYfNDgLpiO', '848787', 'http://localhost/bitbarrister/register?ref=asasf', '0.000000', NULL, NULL, 5, '::1', 'X8Crd3rC2G', '1979ac0c23e87da21b7ddbf330f1916abcc3f2ff', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-04 14:19:46', '2017-04-04 14:19:46'),
(92, 1, 'asfasfas@gmail.com', 'asfafa', '$2a$08$eda4ThAIy5JrPLivcI./0usKSEH4Wx6vmq5cqFlyH21wmdmbstWgy', '874987897', 'http://localhost/bitbarrister/register?ref=asfafa', '0.000000', NULL, NULL, NULL, '::1', 'zSsgyFBn3S', 'b397fc578d6b99a0b8e2834edb3fcbf718ee130e', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-05 13:26:43', '2017-04-05 13:26:43'),
(93, 1, 'sfaf21fsdf@gmail.com', 'safaf', '$2a$08$hfqlyjua3RjNHMe0FYp6yOvB.OtsClEfwS/d.KJJwHZ5Qz3PRfTPO', '', 'http://localhost/bitbarrister/register?ref=safaf', '0.000000', NULL, NULL, NULL, '::1', 'kF2gn2zRmX', '34eddf6cc95cb782f80b1ec82ec1f416952a9bd4', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-05 13:29:14', '2017-04-05 13:29:14'),
(94, 1, 'asfsafasf@gmail.com', 'asfasf', '$2a$08$eIG.GDwM5JynhDEhlx6tGOWdatKGun/9Uncj2D3b/vTxaul9xDw5e', '98789797', 'http://localhost/bitbarrister/register?ref=asfasf', '0.000000', NULL, NULL, NULL, '::1', 'BzwSyq4GJT', 'a7faedbd50cc2f1905a8ce985cf5b21af025d124', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-05 13:38:25', '2017-04-05 13:38:25'),
(95, 1, 'sASFASFASSAF@GMAIL.COM', 'asfasfasf', '$2a$08$XQEwI7FgY2OO8vN9MVUgkOg5lsL1zR0lnzrRy1j7Jbx2EwU/uPkJ2', '8798787', 'http://localhost/bitbarrister/register?ref=asfasfasf', '0.000000', NULL, NULL, NULL, '::1', 'b3DP6Mtfh5', '11e9de430b1b832bf3f04451bc7e1df34353196d', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-05 13:40:09', '2017-04-05 13:40:09'),
(96, 1, 'asfasfasfasfsa@gmail.com', 'sfasfafas', '$2a$08$2nEfpZs5ai2SEr0Ftc42.udk9aQ1AUq7mQCXO2YNNOH9Q/2vs3ohu', '8979897', 'http://localhost/bitbarrister/register?ref=sfasfafas', '0.000000', NULL, NULL, NULL, '::1', 'qV8P6CJGDK', 'd13c159af63d67bbcf4a13a89ea2ed8628339ac1', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-05 13:41:50', '2017-04-05 13:41:50'),
(97, 1, 'safetegdvsdfsf@gmail.com', 'asfsarf3sd', '$2a$08$fQZ.C/opZyTFguYj4QFVUOX45RZLGZn5lgJL26qjOfWe3SkNIwms.', '98798787', 'http://localhost/bitbarrister/register?ref=asfsarf3sd', '0.000000', NULL, NULL, NULL, '::1', 'q8Xs8WFjVT', '1162b83ff12da74952f0abb4dee12310540c49fb', '', '0000-00-00 00:00:00', '', '', 0, 0, 0, '', '0000-00-00 00:00:00', '2017-04-05 13:42:37', '2017-04-05 13:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `ugrp_id` smallint(5) NOT NULL,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`ugrp_id`, `ugrp_name`, `ugrp_desc`, `ugrp_admin`) VALUES
(1, 'Public', 'Public User : has no admin access rights.', 0),
(2, 'Moderator', 'Admin Moderator : has partial admin access rights.', 1),
(3, 'Master Admin', 'Master Admin : has full admin access rights.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_sessions`
--

CREATE TABLE `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_sessions`
--

INSERT INTO `user_login_sessions` (`usess_uacc_fk`, `usess_series`, `usess_token`, `usess_login_date`) VALUES
(1, '', '1aebde165495dc7bcc61531f54ed98144dc99ca2', '2017-08-02 14:34:19'),
(1, '', '59c3b681f2f1bafd9b98a3b485d522bf43ef907f', '2017-08-02 14:34:29'),
(1, '', 'b0f36658a3aa7107b8f6ff7b0a98d165ab4aabe0', '2017-08-02 12:23:29'),
(1, '', 'e835a403afcd588f06b3c6364a5504017f14d836', '2017-08-09 10:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `upriv_id` smallint(5) NOT NULL,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`upriv_id`, `upriv_name`, `upriv_desc`) VALUES
(1, 'View Users', 'User can view user account details.'),
(2, 'View User Groups', 'User can view user groups.'),
(3, 'View Privileges', 'User can view privileges.'),
(4, 'Insert User Groups', 'User can insert new user groups.'),
(5, 'Insert Privileges', 'User can insert privileges.'),
(6, 'Update Users', 'User can update user account details.'),
(7, 'Update User Groups', 'User can update user groups.'),
(8, 'Update Privileges', 'User can update user privileges.'),
(9, 'Delete Users', 'User can delete user accounts.'),
(10, 'Delete User Groups', 'User can delete user groups.'),
(11, 'Delete Privileges', 'User can delete user privileges.');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_groups`
--

CREATE TABLE `user_privilege_groups` (
  `upriv_groups_id` smallint(5) UNSIGNED NOT NULL,
  `upriv_groups_ugrp_fk` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_privilege_groups`
--

INSERT INTO `user_privilege_groups` (`upriv_groups_id`, `upriv_groups_ugrp_fk`, `upriv_groups_upriv_fk`) VALUES
(1, 3, 1),
(3, 3, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 3, 10),
(11, 3, 11),
(12, 2, 2),
(13, 2, 4),
(14, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege_users`
--

CREATE TABLE `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_privilege_users`
--

INSERT INTO `user_privilege_users` (`upriv_users_id`, `upriv_users_uacc_fk`, `upriv_users_upriv_fk`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 2, 1),
(13, 2, 2),
(14, 2, 3),
(15, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `webisite_settings`
--

CREATE TABLE `webisite_settings` (
  `id` int(11) NOT NULL,
  `running_days` varchar(255) NOT NULL,
  `total_accounts` varchar(255) NOT NULL,
  `total_deposited` varchar(255) NOT NULL,
  `total_withdraw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webisite_settings`
--

INSERT INTO `webisite_settings` (`id`, `running_days`, `total_accounts`, `total_deposited`, `total_withdraw`) VALUES
(1, '30', '48', '5.123165487', '10.65465456');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `withdrawal_id` varchar(255) NOT NULL,
  `amount` decimal(10,6) NOT NULL,
  `withdrawal_status` int(1) DEFAULT NULL,
  `withdrawal_status_text` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `record_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indexes for table `demo_user_address`
--
ALTER TABLE `demo_user_address`
  ADD PRIMARY KEY (`uadd_id`),
  ADD UNIQUE KEY `uadd_id` (`uadd_id`),
  ADD KEY `uadd_uacc_fk` (`uadd_uacc_fk`);

--
-- Indexes for table `demo_user_profiles`
--
ALTER TABLE `demo_user_profiles`
  ADD PRIMARY KEY (`upro_id`),
  ADD UNIQUE KEY `upro_id` (`upro_id`),
  ADD KEY `upro_uacc_fk` (`upro_uacc_fk`) USING BTREE;

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earnings`
--
ALTER TABLE `earnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_logs`
--
ALTER TABLE `error_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`uacc_id`),
  ADD UNIQUE KEY `uacc_id` (`uacc_id`),
  ADD KEY `uacc_group_fk` (`uacc_group_fk`),
  ADD KEY `uacc_email` (`uacc_email`),
  ADD KEY `uacc_username` (`uacc_username`),
  ADD KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`ugrp_id`),
  ADD UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE;

--
-- Indexes for table `user_login_sessions`
--
ALTER TABLE `user_login_sessions`
  ADD PRIMARY KEY (`usess_token`),
  ADD UNIQUE KEY `usess_token` (`usess_token`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`upriv_id`),
  ADD UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE;

--
-- Indexes for table `user_privilege_groups`
--
ALTER TABLE `user_privilege_groups`
  ADD PRIMARY KEY (`upriv_groups_id`),
  ADD UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  ADD KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  ADD KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`);

--
-- Indexes for table `user_privilege_users`
--
ALTER TABLE `user_privilege_users`
  ADD PRIMARY KEY (`upriv_users_id`),
  ADD UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  ADD KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  ADD KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`);

--
-- Indexes for table `webisite_settings`
--
ALTER TABLE `webisite_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo_user_address`
--
ALTER TABLE `demo_user_address`
  MODIFY `uadd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `demo_user_profiles`
--
ALTER TABLE `demo_user_profiles`
  MODIFY `upro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `earnings`
--
ALTER TABLE `earnings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `error_logs`
--
ALTER TABLE `error_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `uacc_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_privilege_groups`
--
ALTER TABLE `user_privilege_groups`
  MODIFY `upriv_groups_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_privilege_users`
--
ALTER TABLE `user_privilege_users`
  MODIFY `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `webisite_settings`
--
ALTER TABLE `webisite_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
