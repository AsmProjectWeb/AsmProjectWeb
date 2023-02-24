-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2023 lúc 07:26 AM
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
('DoctrineMigrations\\Version20230223205551', '2023-02-23 21:56:07', 806);

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
(1, 1, 2);

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
  `type_group` varchar(255) NOT NULL,
  `group_avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `description`, `created_at`, `createtor_id`, `type_group`, `group_avatar`) VALUES
(1, 'ARK', 'As a man or woman stranded, naked, freezing, and starving on the unforgiving shores of a mysterious island called ARK, use your skill and cunning to kill or tame and ride the plethora of leviathan dinosaurs and other primeval creatures roaming the land. H', '2003-11-03', 2, 'game', 'ark-poster-63f29897b0ac2.jpg');

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
(2, 0, 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_post`
--

CREATE TABLE `group_post` (
  `id` int(11) NOT NULL,
  `post_id_id` int(11) DEFAULT NULL,
  `group_id_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `group_post`
--

INSERT INTO `group_post` (`id`, `post_id_id`, `group_id_id`) VALUES
(1, 4, 1),
(2, 7, 1);

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
  `status` int(11) NOT NULL,
  `post_user_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `userberforeshare_id`, `content`, `image`, `date`, `status`, `post_user_id_id`) VALUES
(3, NULL, 'First Post with picture', 'Screenshot-2-63f6bda251600.png', '2023-02-23 02:13:06', 2, 1),
(4, NULL, 'As a man or woman stranded, naked, freezing, and starving on the unforgiving shores of a mysterious island called ARK, use your skill and cunning to kill or tame and ride the plethora of leviathan dinosaurs and other primeval creatures roaming the land. Hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements and store valuables, all while teaming up with (or preying upon) hundreds of other players to survive, dominate... and escape!', 'ark-poster-63f29897b0ac2.jpg', '2023-02-23 15:48:11', 0, 1),
(6, NULL, 'Lost Island is a free DLC Expansion Map available on Steam, Xbox One, PS4 and PS5, Epic Games, and Stadia.\r\nThis DLC boasts 150 square kilometers of new biomes, new challenges, and mysterious ruins. Discover jungle valleys fed by giant waterfalls, build a treehouse high in the forest canopies, get down and dirty in vast mangrove swamps, dive deep underwater, brave treacherous snowy peaks, or spelunk uncharted cave systems in search of treasure…', 'Khoa-63f71f9dd862f.jpg', '2023-02-23 15:52:40', 0, 2),
(7, 3, 'Hello wORL', NULL, '2023-02-21 22:27:24', 0, 3);

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
(3, 'Losky@gmail.com', '', 'loc', '0258963147', 'LocNguyen', '2023-02-01', NULL, 0, NULL, '', NULL);

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
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F06D3970DCF2EE20` (`createtor_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `group_post`
--
ALTER TABLE `group_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `mess`
--
ALTER TABLE `mess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `post_liked`
--
ALTER TABLE `post_liked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Các ràng buộc cho bảng `groups`
--
ALTER TABLE `groups`
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
