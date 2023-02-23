-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 23, 2023 lúc 09:15 PM
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
(2, NULL, 'Hello', NULL, '2023-02-20 11:06:50', 1, 1),
(3, NULL, 'First Post with picture', 'Screenshot-2-63f6bda251600.png', '2023-02-23 02:13:06', 2, 1),
(4, NULL, 'As a man or woman stranded, naked, freezing, and starving on the unforgiving shores of a mysterious island called ARK, use your skill and cunning to kill or tame and ride the plethora of leviathan dinosaurs and other primeval creatures roaming the land. Hunt, harvest resources, craft items, grow crops, research technologies, and build shelters to withstand the elements and store valuables, all while teaming up with (or preying upon) hundreds of other players to survive, dominate... and escape!', 'ark-poster-63f29897b0ac2.jpg', '2023-02-23 15:48:11', 0, 1),
(6, NULL, 'Lost Island is a free DLC Expansion Map available on Steam, Xbox One, PS4 and PS5, Epic Games, and Stadia.\r\nThis DLC boasts 150 square kilometers of new biomes, new challenges, and mysterious ruins. Discover jungle valleys fed by giant waterfalls, build a treehouse high in the forest canopies, get down and dirty in vast mangrove swamps, dive deep underwater, brave treacherous snowy peaks, or spelunk uncharted cave systems in search of treasure…', 'Khoa-63f71f9dd862f.jpg', '2023-02-23 15:52:40', 0, 2),
(7, 3, 'Hello wORL', NULL, '2023-02-21 22:27:24', 0, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8DBEFE6CCE` (`post_user_id_id`),
  ADD KEY `IDX_5A8A6C8DF78E8722` (`userberforeshare_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8DBEFE6CCE` FOREIGN KEY (`post_user_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5A8A6C8DF78E8722` FOREIGN KEY (`userberforeshare_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
