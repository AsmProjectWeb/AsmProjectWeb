-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2023 lúc 11:01 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `koky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `content` longtext NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `last_message_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `conversation`
--

INSERT INTO `conversation` (`id`, `last_message_id`) VALUES
(1, NULL),
(2, NULL),
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(25, NULL),
(26, NULL),
(27, NULL),
(28, NULL),
(29, NULL),
(30, NULL),
(31, NULL),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, NULL),
(37, NULL),
(38, NULL),
(39, NULL),
(40, NULL),
(41, NULL),
(42, NULL),
(43, NULL),
(44, NULL),
(45, NULL),
(46, NULL),
(47, NULL),
(48, NULL),
(49, NULL),
(50, NULL),
(51, NULL),
(52, NULL),
(53, NULL),
(54, NULL),
(55, NULL),
(56, NULL),
(57, NULL),
(58, NULL),
(59, NULL),
(60, NULL),
(61, NULL),
(62, NULL),
(63, NULL),
(64, NULL),
(65, NULL),
(66, NULL),
(67, NULL),
(68, NULL),
(69, NULL),
(70, NULL),
(71, NULL),
(72, NULL),
(73, NULL),
(74, NULL),
(75, NULL),
(76, NULL),
(77, NULL),
(78, NULL),
(79, NULL),
(80, NULL),
(81, NULL),
(82, NULL),
(83, NULL),
(84, NULL),
(85, NULL),
(86, NULL),
(87, NULL),
(88, NULL),
(89, NULL),
(90, NULL),
(91, NULL),
(92, NULL),
(93, NULL),
(94, NULL),
(95, NULL),
(96, NULL),
(97, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230216071248', '2023-02-16 08:13:01', 101),
('DoctrineMigrations\\Version20230216071657', '2023-02-16 08:17:05', 49),
('DoctrineMigrations\\Version20230216071752', '2023-02-16 08:17:57', 48),
('DoctrineMigrations\\Version20230216072032', '2023-02-16 08:20:37', 51),
('DoctrineMigrations\\Version20230216073658', '2023-02-16 08:37:07', 51),
('DoctrineMigrations\\Version20230216080000', '2023-02-16 09:00:11', 63),
('DoctrineMigrations\\Version20230216080257', '2023-02-16 09:07:01', 787),
('DoctrineMigrations\\Version20230216080752', '2023-02-16 09:07:58', 49),
('DoctrineMigrations\\Version20230217175816', '2023-02-17 18:58:32', 652),
('DoctrineMigrations\\Version20230218213635', '2023-02-18 22:36:43', 615),
('DoctrineMigrations\\Version20230219203956', '2023-02-19 21:40:03', 63),
('DoctrineMigrations\\Version20230220092023', '2023-02-20 10:20:34', 652),
('DoctrineMigrations\\Version20230222020333', '2023-02-22 03:03:42', 43),
('DoctrineMigrations\\Version20230222020618', '2023-02-22 03:06:24', 39),
('DoctrineMigrations\\Version20230222020649', '2023-02-22 03:06:53', 41),
('DoctrineMigrations\\Version20230222020816', '2023-02-22 03:08:21', 43),
('DoctrineMigrations\\Version20230222021108', '2023-02-22 03:11:11', 42),
('DoctrineMigrations\\Version20230222021848', '2023-02-22 03:18:54', 147),
('DoctrineMigrations\\Version20230222022256', '2023-02-22 03:23:00', 100),
('DoctrineMigrations\\Version20230222022645', '2023-02-22 03:26:48', 88),
('DoctrineMigrations\\Version20230222023146', '2023-02-22 03:31:49', 102),
('DoctrineMigrations\\Version20230222023509', '2023-02-22 03:35:13', 155),
('DoctrineMigrations\\Version20230222023926', '2023-02-22 03:39:29', 112),
('DoctrineMigrations\\Version20230222024049', '2023-02-22 03:40:52', 100),
('DoctrineMigrations\\Version20230222024303', '2023-02-22 03:43:07', 53),
('DoctrineMigrations\\Version20230222024531', '2023-02-22 03:45:34', 94),
('DoctrineMigrations\\Version20230222025209', '2023-02-22 03:52:13', 39),
('DoctrineMigrations\\Version20230222030155', '2023-02-22 04:02:04', 43),
('DoctrineMigrations\\Version20230222030428', '2023-02-22 04:04:32', 42),
('DoctrineMigrations\\Version20230222030621', '2023-02-22 04:06:26', 44),
('DoctrineMigrations\\Version20230222082253', '2023-02-22 09:23:01', 836),
('DoctrineMigrations\\Version20230222083347', '2023-02-22 09:33:55', 102),
('DoctrineMigrations\\Version20230222083743', '2023-02-22 09:37:46', 93),
('DoctrineMigrations\\Version20230222084009', '2023-02-22 09:40:13', 99),
('DoctrineMigrations\\Version20230222084243', '2023-02-22 09:42:46', 38),
('DoctrineMigrations\\Version20230223020855', '2023-02-23 03:13:25', 238),
('DoctrineMigrations\\Version20230223023909', '2023-02-23 03:39:15', 142),
('DoctrineMigrations\\Version20230223035841', '2023-02-23 04:59:09', 72),
('DoctrineMigrations\\Version20230223205551', '2023-02-23 21:56:07', 806),
('DoctrineMigrations\\Version20230225163342', '2023-02-25 17:33:49', 860),
('DoctrineMigrations\\Version20230225164827', '2023-02-25 17:48:37', 161),
('DoctrineMigrations\\Version20230225183412', '2023-02-25 19:34:21', 762),
('DoctrineMigrations\\Version20230225193620', '2023-02-25 20:36:28', 138);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) DEFAULT NULL,
  `friend_user_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `friend`
--

INSERT INTO `friend` (`id`, `user_id_id`, `friend_user_id_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 4, 1),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `friend_request`
--

INSERT INTO `friend_request` (`id`, `sender_id`, `receiver_id`, `created`) VALUES
(1, 1, 4, '0000-00-00 00:00:00'),
(4, 4, 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` date NOT NULL,
  `createtor_id` int(11) DEFAULT NULL,
  `group_avatar` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `description`, `created_at`, `createtor_id`, `group_avatar`, `type_id`) VALUES
(1, 'ARK', 'As a man or woman stranded, naked, freezing, and starving on the unforgiving shores of a mysterious island called ARK, use your skill and cunning to kill or tame and ride the plethora of leviathan dinosaurs and other primeval creatures roaming the land. H', '2003-11-03', 2, 'ark-poster-63f29897b0ac2.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `rolemember` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `groupid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_members`
--

INSERT INTO `group_members` (`id`, `rolemember`, `user_id`, `groupid_id`) VALUES
(1, 0, 1, 1),
(2, 0, 3, 1),
(3, 1, 2, 1),
(4, 0, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_post`
--

CREATE TABLE `group_post` (
  `id` int(11) NOT NULL,
  `post_id_id` int(11) DEFAULT NULL,
  `group_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mess`
--

CREATE TABLE `mess` (
  `id` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `create_at` datetime NOT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mess`
--

INSERT INTO `mess` (`id`, `content`, `create_at`, `conversation_id`, `user_id`) VALUES
(1, 'Hello', '2023-02-28 08:48:56', 2, 1),
(2, 'HI', '2023-02-28 08:49:37', 2, 1),
(3, 'Hello', '2023-03-03 02:38:40', 1, 1),
(4, 'Hello I\'m fine', '2023-03-03 02:38:57', 1, 1),
(5, 'Lo cc', '2023-03-03 02:39:05', 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `message_read_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `iduser_id` int(11) DEFAULT NULL,
  `conversation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `participant`
--

INSERT INTO `participant` (`id`, `message_read_at`, `iduser_id`, `conversation_id`) VALUES
(1, '2023-02-26 07:13:26', 4, 1),
(2, '2023-02-26 07:13:26', 1, 1),
(3, '2023-02-27 21:34:37', 1, 2),
(4, '2023-02-27 21:34:37', 2, 2),
(5, '2023-02-27 21:34:41', 1, 3),
(6, '2023-02-27 21:34:41', 6, 3),
(7, '2023-02-27 21:34:47', 1, 4),
(8, '2023-02-27 21:34:47', 1, 4),
(9, '2023-02-27 21:34:48', 1, 5),
(10, '2023-02-27 21:34:48', 1, 5),
(11, '2023-02-27 21:34:49', 1, 6),
(12, '2023-02-27 21:34:49', 1, 6),
(13, '2023-02-27 21:34:50', 1, 7),
(14, '2023-02-27 21:34:50', 1, 7),
(15, '2023-02-27 21:34:51', 1, 8),
(16, '2023-02-27 21:34:51', 1, 8),
(17, '2023-02-27 21:34:52', 1, 9),
(18, '2023-02-27 21:34:52', 1, 9),
(19, '2023-02-27 21:34:53', 1, 10),
(20, '2023-02-27 21:34:53', 1, 10),
(21, '2023-02-27 21:34:54', 1, 11),
(22, '2023-02-27 21:34:54', 1, 11),
(23, '2023-02-27 21:34:55', 1, 12),
(24, '2023-02-27 21:34:55', 1, 12),
(25, '2023-02-27 21:34:56', 1, 13),
(26, '2023-02-27 21:34:56', 1, 13),
(27, '2023-02-27 21:34:57', 1, 14),
(28, '2023-02-27 21:34:57', 1, 14),
(29, '2023-02-27 21:34:58', 1, 15),
(30, '2023-02-27 21:34:58', 1, 15),
(31, '2023-02-27 21:34:59', 1, 16),
(32, '2023-02-27 21:34:59', 1, 16),
(33, '2023-02-27 21:35:00', 1, 17),
(34, '2023-02-27 21:35:00', 1, 17),
(35, '2023-02-27 21:35:01', 1, 18),
(36, '2023-02-27 21:35:01', 1, 18),
(37, '2023-02-27 21:35:02', 1, 19),
(38, '2023-02-27 21:35:02', 1, 19),
(39, '2023-02-27 21:35:03', 1, 20),
(40, '2023-02-27 21:35:03', 1, 20),
(41, '2023-02-27 21:35:04', 1, 21),
(42, '2023-02-27 21:35:04', 1, 21),
(43, '2023-02-27 21:35:05', 1, 22),
(44, '2023-02-27 21:35:05', 1, 22),
(45, '2023-02-27 21:35:06', 1, 23),
(46, '2023-02-27 21:35:06', 1, 23),
(47, '2023-02-27 21:35:07', 1, 24),
(48, '2023-02-27 21:35:07', 1, 24),
(49, '2023-02-27 21:35:08', 1, 25),
(50, '2023-02-27 21:35:08', 1, 25),
(51, '2023-02-27 21:35:09', 1, 26),
(52, '2023-02-27 21:35:09', 1, 26),
(53, '2023-02-27 21:35:10', 1, 27),
(54, '2023-02-27 21:35:10', 1, 27),
(55, '2023-02-27 21:35:11', 1, 28),
(56, '2023-02-27 21:35:11', 1, 28),
(57, '2023-02-27 21:35:12', 1, 29),
(58, '2023-02-27 21:35:12', 1, 29),
(59, '2023-02-27 21:35:13', 1, 30),
(60, '2023-02-27 21:35:13', 1, 30),
(61, '2023-02-27 21:35:14', 1, 31),
(62, '2023-02-27 21:35:14', 1, 31),
(63, '2023-02-27 21:35:15', 1, 32),
(64, '2023-02-27 21:35:15', 1, 32),
(65, '2023-02-27 21:35:16', 1, 33),
(66, '2023-02-27 21:35:16', 1, 33),
(67, '2023-02-27 21:35:17', 1, 34),
(68, '2023-02-27 21:35:17', 1, 34),
(69, '2023-02-27 21:35:18', 1, 35),
(70, '2023-02-27 21:35:18', 1, 35),
(71, '2023-02-27 21:35:19', 1, 36),
(72, '2023-02-27 21:35:19', 1, 36),
(73, '2023-02-27 21:35:20', 1, 37),
(74, '2023-02-27 21:35:20', 1, 37),
(75, '2023-02-27 21:35:21', 1, 38),
(76, '2023-02-27 21:35:21', 1, 38),
(77, '2023-02-27 21:35:22', 1, 39),
(78, '2023-02-27 21:35:22', 1, 39),
(79, '2023-02-27 21:35:23', 1, 40),
(80, '2023-02-27 21:35:23', 1, 40),
(81, '2023-02-27 21:35:24', 1, 41),
(82, '2023-02-27 21:35:24', 1, 41),
(83, '2023-02-27 21:35:25', 1, 42),
(84, '2023-02-27 21:35:25', 1, 42),
(85, '2023-02-27 21:35:26', 1, 43),
(86, '2023-02-27 21:35:26', 1, 43),
(87, '2023-02-27 21:35:27', 1, 44),
(88, '2023-02-27 21:35:27', 1, 44),
(89, '2023-02-27 21:35:28', 1, 45),
(90, '2023-02-27 21:35:28', 1, 45),
(91, '2023-02-27 21:35:29', 1, 46),
(92, '2023-02-27 21:35:29', 1, 46),
(93, '2023-02-27 21:35:30', 1, 47),
(94, '2023-02-27 21:35:30', 1, 47),
(95, '2023-02-27 21:35:31', 1, 48),
(96, '2023-02-27 21:35:31', 1, 48),
(97, '2023-02-27 21:35:32', 1, 49),
(98, '2023-02-27 21:35:32', 1, 49),
(99, '2023-02-27 21:35:33', 1, 50),
(100, '2023-02-27 21:35:33', 1, 50),
(101, '2023-02-27 21:35:34', 1, 51),
(102, '2023-02-27 21:35:34', 1, 51),
(103, '2023-02-27 21:35:35', 1, 52),
(104, '2023-02-27 21:35:35', 1, 52),
(105, '2023-02-27 21:35:36', 1, 53),
(106, '2023-02-27 21:35:36', 1, 53),
(107, '2023-02-27 21:35:37', 1, 54),
(108, '2023-02-27 21:35:37', 1, 54),
(109, '2023-02-27 21:35:38', 1, 55),
(110, '2023-02-27 21:35:38', 1, 55),
(111, '2023-02-27 21:35:39', 1, 56),
(112, '2023-02-27 21:35:39', 1, 56),
(113, '2023-02-27 21:35:40', 1, 57),
(114, '2023-02-27 21:35:40', 1, 57),
(115, '2023-02-27 21:35:41', 1, 58),
(116, '2023-02-27 21:35:41', 1, 58),
(117, '2023-02-27 21:35:42', 1, 59),
(118, '2023-02-27 21:35:42', 1, 59),
(119, '2023-02-27 21:35:43', 1, 60),
(120, '2023-02-27 21:35:43', 1, 60),
(121, '2023-02-27 21:35:44', 1, 61),
(122, '2023-02-27 21:35:44', 1, 61),
(123, '2023-02-27 21:35:45', 1, 62),
(124, '2023-02-27 21:35:45', 1, 62),
(125, '2023-02-27 21:35:46', 1, 63),
(126, '2023-02-27 21:35:46', 1, 63),
(127, '2023-02-27 21:35:47', 1, 64),
(128, '2023-02-27 21:35:47', 1, 64),
(129, '2023-02-27 21:35:48', 1, 65),
(130, '2023-02-27 21:35:48', 1, 65),
(131, '2023-02-27 21:35:49', 1, 66),
(132, '2023-02-27 21:35:49', 1, 66),
(133, '2023-02-27 21:35:50', 1, 67),
(134, '2023-02-27 21:35:50', 1, 67),
(135, '2023-02-27 21:35:51', 1, 68),
(136, '2023-02-27 21:35:51', 1, 68),
(137, '2023-02-27 21:35:52', 1, 69),
(138, '2023-02-27 21:35:52', 1, 69),
(139, '2023-02-27 21:35:53', 1, 70),
(140, '2023-02-27 21:35:53', 1, 70),
(141, '2023-02-27 21:35:54', 1, 71),
(142, '2023-02-27 21:35:54', 1, 71),
(143, '2023-02-27 21:35:55', 1, 72),
(144, '2023-02-27 21:35:55', 1, 72),
(145, '2023-02-27 21:35:56', 1, 73),
(146, '2023-02-27 21:35:56', 1, 73),
(147, '2023-02-27 21:35:57', 1, 74),
(148, '2023-02-27 21:35:57', 1, 74),
(149, '2023-02-27 21:35:58', 1, 75),
(150, '2023-02-27 21:35:58', 1, 75),
(151, '2023-02-27 21:35:59', 1, 76),
(152, '2023-02-27 21:35:59', 1, 76),
(153, '2023-02-27 21:36:00', 1, 77),
(154, '2023-02-27 21:36:00', 1, 77),
(155, '2023-02-27 21:36:01', 1, 78),
(156, '2023-02-27 21:36:01', 1, 78),
(157, '2023-02-27 21:36:02', 1, 79),
(158, '2023-02-27 21:36:02', 1, 79),
(159, '2023-02-27 21:36:03', 1, 80),
(160, '2023-02-27 21:36:03', 1, 80),
(161, '2023-02-27 21:36:04', 1, 81),
(162, '2023-02-27 21:36:04', 1, 81),
(163, '2023-02-27 21:36:05', 1, 82),
(164, '2023-02-27 21:36:05', 1, 82),
(165, '2023-02-27 21:36:06', 1, 83),
(166, '2023-02-27 21:36:06', 1, 83),
(167, '2023-02-27 21:36:07', 1, 84),
(168, '2023-02-27 21:36:07', 1, 84),
(169, '2023-02-27 21:36:08', 1, 85),
(170, '2023-02-27 21:36:08', 1, 85),
(171, '2023-02-27 21:36:09', 1, 86),
(172, '2023-02-27 21:36:09', 1, 86),
(173, '2023-02-27 21:36:10', 1, 87),
(174, '2023-02-27 21:36:10', 1, 87),
(175, '2023-02-27 21:36:11', 1, 88),
(176, '2023-02-27 21:36:11', 1, 88),
(177, '2023-02-27 21:36:12', 1, 89),
(178, '2023-02-27 21:36:12', 1, 89),
(179, '2023-02-27 21:36:13', 1, 90),
(180, '2023-02-27 21:36:13', 1, 90),
(181, '2023-02-27 21:36:14', 1, 91),
(182, '2023-02-27 21:36:14', 1, 91),
(183, '2023-02-27 21:36:15', 1, 92),
(184, '2023-02-27 21:36:15', 1, 92),
(185, '2023-02-27 21:36:16', 1, 93),
(186, '2023-02-27 21:36:16', 1, 93),
(187, '2023-02-27 21:36:17', 1, 94),
(188, '2023-02-27 21:36:17', 1, 94),
(189, '2023-02-27 21:36:18', 1, 95),
(190, '2023-02-27 21:36:18', 1, 95),
(191, '2023-02-27 21:36:19', 1, 96),
(192, '2023-02-27 21:36:19', 1, 96),
(193, '2023-02-27 21:36:20', 1, 97),
(194, '2023-02-27 21:36:20', 1, 97);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `userberforeshare_id` int(11) DEFAULT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `post_user_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `userberforeshare_id`, `content`, `image`, `date`, `post_user_id_id`) VALUES
(4, NULL, 'As a man or woman stranded, naked, freezing, and starving on the unforgiving shores of a mysterious island called ARK, use your skill and cunning to kill or tame and ride the plethora of leviathan dinosaurs and other primeval creatures roaming the land. Hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements and store valuables, all while teaming up with (or preying upon) hundreds of other players to survive, dominate... and escape!', 'ark-poster-63f29897b0ac2.jpg', '2023-02-23 15:48:11', 1),
(6, NULL, 'Lost Island is a free DLC Expansion Map available on Steam, Xbox One, PS4 and PS5, Epic Games, and Stadia.\r\nThis DLC boasts 150 square kilometers of new biomes, new challenges, and mysterious ruins. Discover jungle valleys fed by giant waterfalls, build a treehouse high in the forest canopies, get down and dirty in vast mangrove swamps, dive deep underwater, brave treacherous snowy peaks, or spelunk uncharted cave systems in search of treasure…', 'Khoa-63f71f9dd862f.jpg', '2023-02-23 15:52:40', 2),
(11, NULL, 'Hello Word', NULL, '2023-02-28 02:43:35', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_liked`
--

CREATE TABLE `post_liked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `isliked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_liked`
--

INSERT INTO `post_liked` (`id`, `user_id`, `post_id`, `isliked`) VALUES
(4, 1, 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `postid_id` int(11) DEFAULT NULL,
  `reporter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`id`, `postid_id`, `reporter_id`) VALUES
(4, 11, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typegoup`
--

CREATE TABLE `typegoup` (
  `id` int(11) NOT NULL,
  `type_ground` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `job` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `phone`, `username`, `birthday`, `hometown`, `gender`, `job`, `status`, `avatar`) VALUES
(1, 'k@gmail.com', '[\"R0LE_USER\"]', '$2y$13$vZVcz2le9Z6UYBiKBH3rZe1I8jFBVKwzxb909BejWBJgUhGs1h8gm', '987654321', 'Khoa', '2003-12-06', 'Updating', 1, 'Updating', 'Unknown', 'Khoa-63f71f138a300.jpg'),
(2, 'l@gmail.com', '[\"R0LE_USER\"]', '$2y$13$sHY4tprWFx0X3K7yBzKu6.FX0u6YChIsMoUvwi6JJZqhAAClH1XhK', '352145894', 'Nguyen Losky', '2003-11-03', 'Updating', 1, 'Updating', 'Unknown', NULL),
(3, 'Losky@gmail.com', '', 'loc', '0258963147', 'LocNguyen', '2023-02-01', NULL, 0, NULL, '', NULL),
(4, 'a@gmail.com', '[\"R0LE_USER\"]', '$2y$13$qJRo39hYqjVY9VtQwRlkS.xHyHXQvw2yepyPr8VapQMSgHRg1wlyq', '987654321', 'a', '2023-02-01', 'Updating', 1, 'Updating', 'Unknown', 'a-63fa851c8ad6b.png'),
(5, 'b@gmail.com', '[\"R0LE_USER\"]', '$2y$13$xGdOJuR4h2PjWtGTols0z.QXlcLNKoN57MGeQi/9yr2EBBrBqIe1u', '123456789', 'b', '2023-03-09', 'Updating', 1, 'Updating', 'Unknown', NULL),
(6, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$QLmqlf5NpE4Gw7TE3O3W8OJhGwp.3UbxrerxC4Pu5AM3Y9DdCV9ee', '9182736455', 'admin', '2023-02-26', 'Updating', 1, 'Updating', 'Unknown', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C4B89032C` (`post_id`),
  ADD KEY `IDX_9474526CA76ED395` (`user_id`);

--
-- Chỉ mục cho bảng `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8A8E26E9BA0E79C3` (`last_message_id`);

--
-- Chỉ mục cho bảng `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_55EEAC619D86650F` (`user_id_id`),
  ADD KEY `IDX_55EEAC6133C1910B` (`friend_user_id_id`);

--
-- Chỉ mục cho bảng `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F284D94F624B39D` (`sender_id`),
  ADD KEY `IDX_F284D94CD53EDB6` (`receiver_id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F06D3970DCF2EE20` (`createtor_id`),
  ADD KEY `IDX_F06D3970C54C8C93` (`type_id`);

--
-- Chỉ mục cho bảng `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C3A086F3A76ED395` (`user_id`),
  ADD KEY `IDX_C3A086F3B3BB53C` (`groupid_id`);

--
-- Chỉ mục cho bảng `group_post`
--
ALTER TABLE `group_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_73D037FDE85F12B8` (`post_id_id`),
  ADD KEY `IDX_73D037FD2F68B530` (`group_id_id`);

--
-- Chỉ mục cho bảng `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6B0AF3BA9AC0396` (`conversation_id`),
  ADD KEY `IDX_6B0AF3BAA76ED395` (`user_id`);

--
-- Chỉ mục cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Chỉ mục cho bảng `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D79F6B11786A81FB` (`iduser_id`),
  ADD KEY `IDX_D79F6B119AC0396` (`conversation_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8DBEFE6CCE` (`post_user_id_id`),
  ADD KEY `IDX_5A8A6C8DF78E8722` (`userberforeshare_id`);

--
-- Chỉ mục cho bảng `post_liked`
--
ALTER TABLE `post_liked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5D024755A76ED395` (`user_id`),
  ADD KEY `IDX_5D0247554B89032C` (`post_id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C42F7784EB348947` (`postid_id`),
  ADD KEY `IDX_C42F7784E1CFE6F5` (`reporter_id`);

--
-- Chỉ mục cho bảng `typegoup`
--
ALTER TABLE `typegoup`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `group_post`
--
ALTER TABLE `group_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `mess`
--
ALTER TABLE `mess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `post_liked`
--
ALTER TABLE `post_liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `typegoup`
--
ALTER TABLE `typegoup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `FK_9474526CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `FK_8A8E26E9BA0E79C3` FOREIGN KEY (`last_message_id`) REFERENCES `mess` (`id`);

--
-- Các ràng buộc cho bảng `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `FK_55EEAC6133C1910B` FOREIGN KEY (`friend_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_55EEAC619D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `friend_request`
--
ALTER TABLE `friend_request`
  ADD CONSTRAINT `FK_F284D94CD53EDB6` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F284D94F624B39D` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `FK_F06D3970C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `typegoup` (`id`),
  ADD CONSTRAINT `FK_F06D3970DCF2EE20` FOREIGN KEY (`createtor_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `FK_C3A086F3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C3A086F3B3BB53C` FOREIGN KEY (`groupid_id`) REFERENCES `groups` (`id`);

--
-- Các ràng buộc cho bảng `group_post`
--
ALTER TABLE `group_post`
  ADD CONSTRAINT `FK_73D037FD2F68B530` FOREIGN KEY (`group_id_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `FK_73D037FDE85F12B8` FOREIGN KEY (`post_id_id`) REFERENCES `post` (`id`);

--
-- Các ràng buộc cho bảng `mess`
--
ALTER TABLE `mess`
  ADD CONSTRAINT `FK_6B0AF3BA9AC0396` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`),
  ADD CONSTRAINT `FK_6B0AF3BAA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `FK_D79F6B11786A81FB` FOREIGN KEY (`iduser_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D79F6B119AC0396` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8DBEFE6CCE` FOREIGN KEY (`post_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5A8A6C8DF78E8722` FOREIGN KEY (`userberforeshare_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `post_liked`
--
ALTER TABLE `post_liked`
  ADD CONSTRAINT `FK_5D0247554B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `FK_5D024755A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_C42F7784E1CFE6F5` FOREIGN KEY (`reporter_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C42F7784EB348947` FOREIGN KEY (`postid_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
