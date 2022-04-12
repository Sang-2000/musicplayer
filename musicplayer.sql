-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2022 lúc 02:40 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `musicplayer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id_acc` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `display_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `url_avatar` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id_acc`, `username`, `password`, `display_name`, `email`, `position`, `status`, `date_created`, `description`, `url_avatar`) VALUES
(1, 'sangdo', '950659d0225a11004a61417c91572b2', 'Sáng Đỗ', 'dovansang2536@gmail.com', 1, 0, '2022-03-18 08:24:04', '', ''),
(2, 'admin', 'admin', 'Admin', 'admin1234@gmail.com', 1, 0, '2022-03-18 08:46:21', '', 'http://localhost/musicplayer/upload/2022/03/25/user_admin.jpg'),
(3, 'rose', 'rose', 'Rose BlackPink', '', 0, 0, '2022-03-19 08:11:32', '', 'https://cuoifly.tuoitre.vn/820/0/ttc/r/2021/01/07/thoi-diem-hien-tai-rose-da-so-huu-visual-dinh-cao-cua-kpop-1610033705.jpg'),
(4, 'jenie', 'jenie', 'Jenie Kim', '', 0, 1, '2022-04-10 05:59:53', '', 'http://localhost/musicplayer/upload/2022/04/06/singer_jennie_blackpink.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `audio`
--

CREATE TABLE `audio` (
  `id_audio` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `audio`
--

INSERT INTO `audio` (`id_audio`, `name`, `url`, `type`, `size`, `date_uploaded`) VALUES
(1, 'Chuyen-Di-Cua-Thanh-Xuan-Chuyen-Di-Cua-Thanh-Xuan-OST-Suni-Ha-Linh.mp3', 'audio/2022/03/31/Chuyen-Di-Cua-Thanh-Xuan-Chuyen-Di-Cua-Thanh-Xuan-OST-Suni-Ha-Linh.mp3', 'mp3', 3654206, '2022-03-31 14:05:12'),
(2, 'De-Vuong-Dinh-Dung.mp3', 'audio/2022/03/31/De-Vuong-Dinh-Dung.mp3', 'mp3', 4283240, '2022-03-31 14:18:16'),
(3, 'Hong-Chieu-Nguyen-Cuc-Tinh-Y-JuJingYi.mp3', 'audio/2022/03/31/Hong-Chieu-Nguyen-Cuc-Tinh-Y-JuJingYi.mp3', 'mp3', 2994952, '2022-03-31 14:18:16'),
(4, 'Nhu_Ngay_Hom_Qua_Son_Tung_MTP.mp3', 'audio/2022/04/05/Nhu_Ngay_Hom_Qua_Son_Tung_MTP.mp3', 'mp3', 3896183, '2022-04-05 09:56:41'),
(5, 'Tren_Tinh_Ban_Duoi_Tinh_Yeu_Min.mp3', 'audio/2022/04/05/Tren_Tinh_Ban_Duoi_Tinh_Yeu_Min.mp3', 'mp3', 3301567, '2022-04-05 10:15:40'),
(6, 'Than-Van-He_Cuc-Tinh-Y_JuJingYi.mp3', 'audio/2022/04/05/Than-Van-He_Cuc-Tinh-Y_JuJingYi.mp3', 'mp3', 4669147, '2022-04-05 20:38:10'),
(7, 'HayTraoChoAnh-SonTungMTP-SnoopDogg.mp3', 'audio/2022/04/05/HayTraoChoAnh-SonTungMTP-SnoopDogg.mp3', 'mp3', 4007776, '2022-04-05 20:48:45'),
(8, 'Solo-Jennie-BlackPink.mp3', 'audio/2022/04/06/Solo-Jennie-BlackPink.mp3', 'mp3', 2803132, '2022-04-06 08:43:38'),
(9, 'Cho-Nhau-Nhe-SuniHaLinh-ERIK.mp3', 'audio/2022/04/06/Cho-Nhau-Nhe-SuniHaLinh-ERIK.mp3', 'mp3', 3504653, '2022-04-06 09:01:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cate` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url_avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cate`, `label`, `url`, `url_avatar`, `date_created`) VALUES
(1, 'Nhạc Việt', 'nhac_viet', 'http://localhost/musicplayer/upload/2022/03/25/the_loai_nhac_viet.jfif', '2022-03-25 05:14:24'),
(2, 'Nhạc Trung', 'nhac_trung', '0', '2022-03-25 05:14:24'),
(3, 'Nhạc Hàn', 'nhac_han', '0', '2022-03-25 05:17:02'),
(4, 'Top', 'top', '0', '2022-03-25 05:18:15'),
(5, 'Nghệ sĩ', 'nghe_si', 'http://localhost/musicplayer/upload/2022/03/25/the_loai_ca_si.jpg', '2022-03-25 05:18:15'),
(6, 'Khám Phá', 'kham_pha', 'http://localhost/musicplayer/upload/2022/03/25/the_loai_kham_pha.jpg', '2022-03-25 15:15:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id_img` int(11) NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `date_uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id_img`, `url`, `type`, `size`, `date_uploaded`) VALUES
(2, 'upload/2022/03/25/the_loai_nhac_viet.jfif', 'jfif', 8010, '2022-03-25 14:30:04'),
(3, 'upload/2022/03/25/the_loai_kham_pha.jpg', 'jpg', 185291, '2022-03-25 14:56:23'),
(4, 'upload/2022/03/25/the_loai_ca_si.jpg', 'jpg', 115745, '2022-03-25 15:34:09'),
(5, 'upload/2022/03/25/singer_son-tung-mtp.jpg', 'jpg', 30448, '2022-03-25 17:13:44'),
(6, 'upload/2022/03/25/user_admin.jpg', 'jpg', 64831, '2022-03-25 19:51:41'),
(7, 'upload/2022/03/25/song_hay_trao_cho_anh.jpg', 'jpg', 176857, '2022-03-25 20:10:15'),
(8, 'upload/2022/03/25/singer_cuc_tinh_y.jpg', 'jpg', 44570, '2022-03-25 20:44:48'),
(9, 'upload/2022/03/25/singer_min.png', 'png', 100147, '2022-03-25 20:44:48'),
(10, 'upload/2022/04/01/singer-suni-ha-linh.jpg', 'jpg', 125163, '2022-04-01 14:02:24'),
(11, 'upload/2022/04/01/song-chuyen-di-cua-thanh-xuan.jpg', 'jpg', 142824, '2022-04-01 14:02:24'),
(12, 'upload/2022/04/04/songs_hong_chieu_nguyen_cuc_tinh_y.jpg', 'jpg', 41570, '2022-04-04 20:23:53'),
(13, 'upload/2022/04/05/singer_dinh_dung.jpg', 'jpg', 78506, '2022-04-05 09:14:06'),
(14, 'upload/2022/04/05/songs_de_vương_hoang_dung.jpg', 'jpg', 41355, '2022-04-05 09:19:53'),
(15, 'upload/2022/04/05/nhu_ngay_hom_qua_Son_Tung_MTP.jpg', 'jpg', 54213, '2022-04-05 10:05:54'),
(16, 'upload/2022/04/05/tren_tinh_ban_duoi_tinh_yeu_Min.jfif', 'jfif', 6728, '2022-04-05 10:15:28'),
(17, 'upload/2022/04/05/songs_hong_chieu_nguyen_cuc_tinh_y.jpg', 'jpg', 41570, '2022-04-05 20:37:46'),
(18, 'upload/2022/04/05/song_Than_Van_He_Cuc_Tinh_Y.jpg', 'jpg', 99885, '2022-04-05 20:42:34'),
(19, 'upload/2022/04/06/singer_jennie_blackpink.jpg', 'jpg', 47504, '2022-04-06 08:36:32'),
(20, 'upload/2022/04/06/song_ChoNhauNhe_SuniHaLinh_ERIK.jpg', 'jpg', 51120, '2022-04-06 09:00:39'),
(21, 'upload/2022/04/08/singer_Son_Tung_M-TP.png', 'png', 1564656, '2022-04-08 09:30:40'),
(22, 'upload/2022/04/08/singer_jisoo_blackpink.jpg', 'jpg', 69875, '2022-04-08 09:58:56'),
(23, 'upload/2022/04/10/account_user_default.jpg', 'jpg', 12087, '2022-04-10 16:19:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `singer`
--

CREATE TABLE `singer` (
  `id_singer` int(11) NOT NULL,
  `name_singer` varchar(32) CHARACTER SET utf8 NOT NULL,
  `description` longtext CHARACTER SET utf8 NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `url_avatar` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `singer`
--

INSERT INTO `singer` (`id_singer`, `name_singer`, `description`, `slug`, `url_avatar`) VALUES
(1, 'Sơn Tùng M-TP', 'Sơn Tùng M-TP (tên thật là Nguyễn Thanh Tùng) sinh ra và lớn lên tại một vùng quê của tỉnh Thái Bình. Vốn sở hữu “gen di truyền” từ người mẹ của mình, một nghệ sĩ biểu diễn hát chèo tại Nhà hát Thái Bình nên Tùng đã bộc lộ khả năng âm nhạc của mình ngay từ khi còn là một cậu bé mới chập chững những bước đi đầu tiên.\r\n\r\nNăm 2009, anh cùng với các bạn cùng lớp đã thành lập một nhóm nhạc lấy tên là Over Band, bắt đầu sáng tác và đăng tải các bài hát của mình lên một trang web độc lập chuyên về lĩnh vực âm nhạc.\r\n\r\nNăm 2011, Tùng cũng tham gia một nhóm nhạc có tên là Young Pilots biểu diễn khắp các sân khấu của tỉnh nhà và gặp hái được không ít những thành công. Trong khoảng thời gian này, Tùng đã lấy nghệ danh là M-TP, có nghĩa là “music” (âm nhạc), “tài năng” và “phong cách”, một sự đan xen khá thú vị giữa tiếng Việt và tiếng Anh.\r\n</br>\r\nTháng 8-2011, Sơn Tùng thu âm bài hát “Cơn mưa ngang qua” và nhận được những thành công ngoài mong đợi, bài hát sau đó liên tiếp “đại náo” các bảng xếp hạng lớn nhỏ tại Việt Nam và đứng ngang hàng với các tên tuổi nổi tiếng lúc bấy giờ.\r\n</br>\r\nCũng chính từ đó, cái tên Sơn Tùng M-TP bắt đầu được nhắc đến nhiều hơn trong làng giải trí Việt. Không chỉ thành công trên con đường âm nhạc, Sơn Tùng còn “lấn sân” sang cả lĩnh vực điện ảnh với vai diễn nam chính trong bộ phim điện ảnh “Chàng trai năm ấy” của đạo diễn Nguyễn Quang Dũng.\r\n</br>\r\nNăm 2012, Sơn Tùng quyết định thi tuyển vào Nhạc viện TPHCM, một trong những ngôi trường có tỉ lệ chọi vô cùng “khốc liệt”.Mặc dù giọng hát của Sơn Tùng không có một chút kỹ thuật nào nhưng chỉ với một tháng luyện thi chăm chỉ, quên cả việc ăn ngủ, Sơn Tùng đã đỗ thủ khoa Nhạc viện TPHCM chuyên ngành Thanh nhạc với số điểm 25,5.\r\n</br>\r\nÍt năm sau, những sản phẩm âm nhạc liên tiếp được chàng trai gốc Thái Bình tung ra thị trường như “Em của ngày hôm qua”, “Chạy ngay đi”, “Lạc trôi”,… đã trở thành những sản phẩm đình đám nhất của thị trường âm nhạc Việt Nam, ngoài ra những sản phẩm này cũng lan tỏa sang cả một số quốc gia khác trên thế giới.\r\n</br>\r\nMV “Hãy trao cho anh” của Sơn Tùng M-TP đã phá vỡ mọi kỷ lục trên bảng xếp hạng Youtube tại Việt Nam cũng như châu lục và toàn thế giới. “Hãy trao cho anh” đã tự thiết lập nên những kỷ lục lịch sử của làng nhạc Việt: đạt 1 triệu views chỉ trong 8 phút, 2 triệu views trong 14 phút, 5 triệu views trong 1 giờ, 10 triệu views trong 3 giờ và tính đến thời điểm hiện tại, MV “Hãy trao cho anh” đã cán mốc 12 triệu lượt xem trong vòng chưa đến 18 giờ. MV được xem nhiều nhất thế giới trong ngày 1/7, đồng thời đứng thứ 14 trên top trending YouTube toàn cầu. Tính riêng ở khu vực châu lục, Sơn Tùng nghiễm nhiên sở hữu MV được xem nhiều nhất Châu Á trong ngày 1/7.', 'son-tung-mtp', 'http://localhost/musicplayer/upload/2022/04/08/singer_Son_Tung_M-TP.png'),
(2, 'Cúc Tịnh Y ( 鞠婧祎)', 'Thông tin, tiểu sử Cúc Tịnh Y\r\n<br/><br/>\r\nTên tiếng Trung: Giản thể: 鞠婧祎; Phồn thể: 鞠婧禕;\r\n<br/><br/>\r\nNăm sinh: 18-06-1993\r\n<br/><br/>\r\nCung hoàng đạo: Song tử\r\n<br/><br/>\r\nQuê quán: Toại Ninh, Tứ Xuyên, Trung Quốc\r\n<br/><br/>\r\nNghề Nghiệp: Ca sĩ, diễn viên\r\n<br/><br/>\r\nBộ phim nổi bật: Thư sinh xinh đẹp, Tiên sinh bơi lội, Nhiệt Huyết Trường An, Tân Bạch Nương Tử truyền kỳ 2019, Như Ý Phương Phi, Nghịch thiên cải mệnh...\r\n<br/><br/>\r\nBài hát nổi bật: \r\n  -  Thán Vân Hề (叹云兮), Hoa rơi thành bùn (落花成泥) phim Vân Tịch truyện\r\n<br/>\r\n  -  Độ tình (渡情), Ngàn năm chờ đợi một lần (千年等一回), Bạch Tố Trinh dưới núi Thanh Thành (青城山下白素贞) phim Tân Bạch Nương Tử Truyền Kỳ\r\n<br/>\r\n  -  Cổ Họa (古画), Phù Dung (芙蓉), Mộng Độ (梦渡) phim Như Ý Phương Phi\r\n<br/>\r\n  -  Hoa tư mộng phim Hiên viên kiếm :Hán chi vân\r\n<br/>\r\n  -  ...', 'cuc-tinh-y', 'http://localhost/musicplayer/upload/2022/03/25/singer_cuc_tinh_y.jpg'),
(7, 'Jisoo (Blackpink)', '&lt;h2&gt;&lt;strong&gt;Thông tin&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;&lt;strong&gt;Họ tên:&lt;/strong&gt;&amp;nbsp;Kim Ji Soo&lt;/li&gt;\n	&lt;li&gt;&lt;strong&gt;Tên tiếng Hàn&lt;/strong&gt;:&amp;nbsp;김지수&lt;/li&gt;\n	&lt;li&gt;&lt;strong&gt;Nghệ danh:&lt;/strong&gt;&amp;nbsp;Jisoo&lt;/li&gt;\n	&lt;li&gt;&lt;strong&gt;Vị trí:&lt;/strong&gt;&amp;nbsp;Lead Vocalist, Visual&lt;/li&gt;\n	&lt;li&gt;&lt;strong&gt;Sinh nhật:&lt;/strong&gt;&amp;nbsp;3 -1 -1995&lt;/li&gt;\n	&lt;li&gt;&lt;strong&gt;Cung hoàng đạo:&amp;nbsp;&lt;/strong&gt;Ma Kết&lt;/li&gt;\n	&lt;li&gt;&lt;strong&gt;Nơi sinh:&lt;/strong&gt;&amp;nbsp;thành phố Gunpo, tỉnh Gyeonggi,&amp;nbsp;Hàn Quốc&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;h2&gt;&lt;strong&gt;Sự nghiệp&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;\n	&lt;p&gt;2016&amp;ndash;2017: Ra mắt cùng Blackpink&lt;/p&gt;\n	&lt;/li&gt;\n	&lt;li&gt;\n	&lt;p&gt;2018&amp;ndash;2019: Đột phá cùng nhóm&lt;/p&gt;\n	&lt;/li&gt;\n	&lt;li&gt;\n	&lt;p&gt;2020&amp;ndash;nay: Khẳng định tên tuổi và vai diễn chính đầu tiên trong sự nghiệp&lt;/p&gt;\n	&lt;/li&gt;\n&lt;/ul&gt;\n\n&lt;h2&gt;&lt;strong&gt;Bài hát nổi tiếng&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;Nhóm Blackpink\n	&lt;ul&gt;\n		&lt;li&gt;DDu-Du DDu-Du&amp;nbsp;&lt;/li&gt;\n		&lt;li&gt;Kill This Love&amp;nbsp;&lt;/li&gt;\n		&lt;li&gt;BoomBayAh&lt;/li&gt;\n		&lt;li&gt;How You Likr That&lt;/li&gt;\n		&lt;li&gt;Ice Cream&lt;/li&gt;\n		&lt;li&gt;Lovesick Girls&lt;/li&gt;\n		&lt;li&gt;...&lt;/li&gt;\n	&lt;/ul&gt;\n	&lt;/li&gt;\n	&lt;li&gt;Solo\n	&lt;ul&gt;\n		&lt;li&gt;Love Yourself Cover&lt;/li&gt;\n		&lt;li&gt;Solo&lt;/li&gt;\n		&lt;li&gt;Clarity (Live Cover)&lt;/li&gt;\n		&lt;li&gt;...&lt;/li&gt;\n	&lt;/ul&gt;\n	&lt;/li&gt;\n&lt;/ul&gt;', 'jisoo_blackpink', 'http://localhost/musicplayer/upload/2022/04/08/singer_jisoo_blackpink.jpg'),
(3, 'Min', '&lt;p&gt;&lt;strong&gt;Nguyễn Minh Hằng&lt;/strong&gt;&amp;nbsp;(sinh ngày 7 tháng 12 năm 1988), thường được biết đến với nghệ danh&amp;nbsp;&lt;strong&gt;Min&lt;/strong&gt;&amp;nbsp;(cách điệu là&amp;nbsp;&lt;strong&gt;MIN&lt;/strong&gt;) là một nữ&amp;nbsp;&lt;a href=&quot;https://vi.wikipedia.org/wiki/Ca_s%C4%A9&quot;&gt;ca sĩ&lt;/a&gt;&amp;nbsp;và&amp;nbsp;&lt;a href=&quot;https://vi.wikipedia.org/wiki/V%C5%A9_c%C3%B4ng&quot;&gt;vũ công&lt;/a&gt;&amp;nbsp;&lt;a href=&quot;https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_Vi%E1%BB%87t_Nam&quot;&gt;người Việt Nam&lt;/a&gt;. Khởi đầu là thành viên của nhóm nhảy St.319 (tiền thân của công ty giải trí&amp;nbsp;&lt;a href=&quot;https://vi.wikipedia.org/wiki/St.319_Entertainment&quot;&gt;St.319 Entertainment&lt;/a&gt;), cô ra mắt với tư cách ca sĩ solo vào năm 2013 với đĩa đơn đầu tay &amp;quot;Tìm&amp;quot;.&lt;/p&gt;', 'min', 'http://localhost/musicplayer/upload/2022/03/25/singer_min.png'),
(4, 'Suni Hạ Linh', '&lt;p&gt;Ca sĩ Suni Hạ Linh sinh ngày 6-9-1993 tại Thành phố Hồ Chí Minh,Suni Hạ Linh tên thật là Ngô Đặng Thu Giang, là một ca sĩ trẻ và là một hot girl đang được nhiều người yêu mến. Gần đây cô ca sĩ trẻ này đã gây bão với ca khúc hit &amp;quot;Em đã biết&amp;quot;, một ca khúc đang được nhiều khán giả yêu thích.&lt;/p&gt;\n\n&lt;p&gt;Suni Hạ Linh là một cô gái có ngoại hình xinh xắn và đáng yêu. Với giọng hát hay, và đặc biệt là biết nắm bắt xu hướng âm nhạc của giới trẻ hiện nay nên cô ca sĩ trẻ này đang rất được lòng khán giả Việt. Mặc dù mới phát hành một sản phẩm âm nhạc nhưng Suni Hạ Linh đã ngay lập tức trở thành một cơn lốc của VPop.&lt;/p&gt;\n\n&lt;p&gt;Trước khi nổi tiếng với bản hit &amp;quot;Em đã biết&amp;quot; Suni Hạ Linh từng cover một số ca khúc và đăng tải lên kênh Youtube của mình. Cô còn được khán giả chú ý đến khi được nam ca sĩ Isaac hôn trên sân khấu của chương trình &amp;quot;The Remix&amp;quot;. Suni Hạ Linh từng tham gia hai cuộc thi đào tạo thần tượng do Việt Nam hợp tác với Hàn Quốc. Suni Hạ Linh cũng đã từng cho ra 2 MC song ca, nhưng cho tới khi ca khúc &amp;quot;Em đã biết&amp;quot; ra mắt thì cô mới thật sự nổi tiếng.&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;Suni Hạ Linh còn có khả năng sử dụng thông thạo ba thứ ngoại ngữ là tiếng Anh, Hàn và Trung. Năm 2008 cô đã đoạt giải nhất của cuộc thi Cleverlearn Superstar. Năm 2012 cô giành giải nhì của Kpop star hunt Season2 được tổ chức tại Việt Nam và giành tấm vé sang Hàn Quốc. Năm 2014 cô giành giải ba cuộc thi Ngôi sao Việt. Suni Hạ Linh còn là đại diện thí sinh của Việt Nam tham gia cuộc thi &amp;quot;Chinh phục ước mơ&amp;quot;.&lt;/p&gt;\n\n&lt;p&gt;Ngoài bản hit &amp;quot;Em đã biết&amp;quot;, Suni Hạ Linh còn song ca trong 2 MV khác, đó là MV &amp;quot;Cảm ơn người đã rời xa tôi&amp;quot; cùng nam ca sỹ Phạm Hồng Phước, MV &amp;quot;Chẳng thể là ai khác&amp;quot; cùng Juun Đăng Dũng. Suni Hạ Linh theo học tại trường Đại học Victoria ở Wellington - New Zeland, cô tốt nghiệp với tấm bằng cử nhân tài chính tiền tệ. Hạ Minh còn từng là thành viên của vũ đoàn Oh.&amp;nbsp;&lt;/p&gt;\n\n&lt;ul&gt;\n	&lt;li&gt;2008 Giải nhất Cleverlearn Superstar&amp;nbsp;&lt;/li&gt;\n	&lt;li&gt;2011 Top 10 Apollo English Idol&amp;nbsp;&lt;/li&gt;\n	&lt;li&gt;2012 Giải Nhì Kpop Starhunt Season 2 tại VN đại diện sang Hàn Quốc&amp;nbsp;&lt;/li&gt;\n	&lt;li&gt;2014 Giải Ba Ngôi Sao Việt&lt;/li&gt;\n&lt;/ul&gt;', 'suni-ha-linh', 'http://localhost/musicplayer/upload/2022/04/01/singer-suni-ha-linh.jpg'),
(5, 'Đình Dũng', '&lt;p&gt;&lt;var&gt;ên thật: Nguyễn Đình Dũng&amp;nbsp;&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;Năm sinh: 1992&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;Quê: Lào Cai&amp;nbsp;&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;Đình Dũng tên đầy đủ là Nguyễn Đình Dũng, nam ca sĩ, nhạc sĩ tài năng đang hoạt động tại Hà Nội. Sở hữu giọng hát hay, ngoại hình ưa nhìn giúp anh nhận được sự ủng hộ nhiệt tình từ khán giả.&amp;nbsp;&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;Niềm đam mê ca nhạc của Đình Dũng bắt đầu từ khi còn rất nhỏ. Khi còn đi học anh rất tích cực tham gia các hoạt động văn hóa, nghệ thuật tại trường. Bằng tài năng và tinh thần ham học hỏi Đình Dũng luôn nhận được sự quan tâm, yêu mến từ bạn bè và thầy cô.&amp;nbsp;&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;Tốt nghiệp lớp 12, Đình Dũng quyết định theo học 7 năm ngành sư phạm âm nhạc và tiếp tục thi vào khoa thanh nhạc tại Cao đẳng nghệ thuật Hà Nội. Niềm đam mê đã thôi thúc anh theo đuổi con đường nghệ thuật với mong muốn trở thành một ca sĩ, nhạc sĩ nổi tiếng trong tương lai.&amp;nbsp;&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;7 năm rèn rủa trong môi trường đào tạo chuyên nghiệp giúp Đình Dũng hoàn thiện và có những bước đi chắc chắn hơn. Anh luôn dành nhiều tâm tư tình cảm cho những sáng tác của mình với mong muốn đem đến cho khán giả những ca khúc độc đáo và ấn tượng.&amp;nbsp;&lt;/var&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;var&gt;Định hướng nghề nghiệp mà Đình Dũng đang theo đuổi là các sáng tác có màu sắc Á Đông cổ trang. Hàng loạt bản hit anh tung ra thị trường luôn mang một sắc thái riêng thu hút phần lớn khán giả. Điểm qua một số ca khúc thành công của ca nhạc sĩ Đình Dũng để chúng ta thấy rõ hơn.&amp;nbsp;&lt;/var&gt;&lt;/p&gt;', 'dinh-dung', 'http://localhost/musicplayer/upload/2022/04/05/singer_dinh_dung.jpg'),
(6, 'Jennie (Blackpink)', 'Tên: Jennie Kim\r\n<br/><br/>\r\nTên tiếng Hàn: 김제니\r\n<br/><br/>\r\nSinh ngày: 16 - 1 - 1996\r\n<br/><br/>\r\nNghệ danh: Jennie\r\n<br/><br/>\r\nNghề nghiệp: ca sĩ, rapper\r\n<br/><br/>\r\nQuê quán:  Cheongdam-dong, Gangnam, Seoul, Hàn Quốc\r\n<br/><br/>\r\nQuốc tịch: Hàn Quốc\r\n<br/><br/>\r\nNhóm nhạc: thành viên của nhóm nhạc nữ Blackpink\r\n<br/><br/>\r\nBài hát nổi bật:\r\n<br/><br/>\r\n- Nhóm: Kill This Love (2021), How You Like That (2020), Ice Cream (2020), Lovesick Girls (2020), Pretty Savage (2020), DDu-Du DDu-Du (2018), BoomBayAh (2016), ...\r\n<br/>\r\n- Đơn: Solo (2018)\r\n<br/><br/>\r\nSự nghiệp:\r\n<br/><br/>\r\n     - 2012 - 2017: Ra mắt với Blackpink và trở nên nổi tiếng.\r\n<br/>\r\n     - 2018 - nay: Gia tăng độ phổ biến và ra mắt solo', 'jennie-blackpink', 'http://localhost/musicplayer/upload/2022/04/06/singer_jennie_blackpink.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `id_song` int(11) NOT NULL,
  `audio_id` int(11) NOT NULL,
  `singer_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name_song` text COLLATE utf8_unicode_ci NOT NULL,
  `url_thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `slug_song` text COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `lyric` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`id_song`, `audio_id`, `singer_id`, `cate_id`, `name_song`, `url_thumb`, `slug_song`, `keywords`, `lyric`, `status`, `view`, `date_posted`) VALUES
(4, 1, 4, 1, 'Chuyến Đi Của Thanh Xuân', 'http://localhost/musicplayer/upload/2022/04/01/song-chuyen-di-cua-thanh-xuan.jpg', 'Chuyen-Di-Cua-Thanh-Xuan', '', 'Xách balo lên và đi thật xa khỏi chốn này\r\n<br/>\r\nNhấc chiếc phone lên gọi cho 500 anh em đến đây\r\n<br/>\r\nMình cùng nhau khám phá những miền đất mới\r\n<br/>\r\nMình cùng nhau rẽ lối đi khắp phương trời\r\n<br/><br/>\r\nCòn chờ gì nữa thời thanh xuân có bao lâu\r\n<br/>\r\nTuổi trẻ phải đi trải nghiệm thế giới muôn màu\r\n<br/>\r\nCùng bạn cùng tôi cùng nhau đi khắp muôn nơi\r\n<br/>\r\nLòng còn phơi phới và đam mê từng điều mới\r\n<br/><br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThanh xuân vẫy chào ta cứ đi\r\n<br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThầm mơ thầm mơ thầm mơ thầm mơ nè\r\n<br/><br/>\r\nĐi đi đi và đừng nghĩ suy<br/>\r\nThanh xuân vẫy chào ta cứ đi\r\n<br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nMột chuyến đi của thanh xuân\r\n<br/><br/>\r\nChuyến đi của thanh xuân\r\n<br/>\r\nTừng khoảnh khắc mà ta có\r\n<br/>\r\nĐể ta mang theo suốt đời\r\n<br/>\r\nTuổi trẻ với lòng phơi phới\r\n<br/>\r\nCùng nhau vi vu khắp nơi và\r\n<br/>\r\nMỗi phút giây trôi đều quý giá trong cuộc đời\r\n<br/>\r\nTận hưởng những điều tuyệt vời\r\n<br/>\r\nCùng xõa đi bạn ơi\r\n<br/><br/>\r\nCòn chờ gì nữa thời thanh xuân có bao lâu\r\n<br/>\r\nTuổi trẻ phải đi trải nghiệm thế giới muôn màu\r\n<br/>\r\nCùng bạn cùng tôi cùng nhau đi khắp muôn nơi\r\n<br/>\r\nLòng còn phơi phới và đam mê từng điều mới\r\n<br/><br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThanh xuân vẫy chào ta cứ đi\r\n<br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThầm mơ thầm mơ thầm mơ thầm mơ nè\r\n<br/><br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThanh xuân vẫy chào ta cứ đi\r\n<br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nMột chuyến đi của thanh xuân\r\n<br/>\r\nMột chuyến đi của thanh xuân\r\n<br/><br/>\r\nBao nhiêu chân trời ta đắm say, bao nhiêu nơi mà ta muốn thấy\r\n<br/>\r\nLỡ mai sau ngày tháng phôi phai vẫn nhớ về giây phút này\r\n<br/>\r\nNơi xa xôi nào ta cũng đi, thanh xuân ta đừng nên hoang phí\r\n<br/>\r\nTuổi trẻ chỉ có một lần thôi, cho nên ta hãy\r\n<br/><br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThanh xuân vẫy chào ta cứ đi\r\n<br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThầm mơ thầm mơ thầm mơ thầm mơ nè\r\n<br/><br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nThanh xuân vẫy chào ta cứ đi\r\n<br/>\r\nĐi đi đi và đừng nghĩ suy\r\n<br/>\r\nMột chuyến đi của thanh xuân\r\n<br/>\r\nMột chuyến đi của thanh xuân\r\n<br/><br/>\r\nMột chuyến đi của thanh xuân\r\n<br/>', 0, 0, '2022-04-04 20:13:11'),
(5, 3, 2, 2, 'Hồng Chiêu Nguyện (红昭愿)', 'http://localhost/musicplayer/upload/2022/04/04/songs_hong_chieu_nguyen_cuc_tinh_y.jpg', 'Hong_Chieu_Nguyen', '', '手中雕刻生花刀锋千转蜿蜒成画\r\n<br/>\r\nTay cầm bông hoa chạm trổ, ngàn vết khắc uốn lượn thành tranh\r\n<br/><br/>\r\n盛名功德塔是桥畔某处人家\r\n<br/>  \r\ntháp công đức lừng danh nằm bên cầu cạnh nhà ai đó\r\n<br/><br/>\r\n春风绕过发梢红纱刺绣赠他\r\n<br/>\r\ngió xuân thổi bay ngọn tóc với khăn hồng thêu dành tặng người\r\n<br/><br/>\r\n眉目刚烈拟作妆嫁\r\n<br/>\r\nmắt phượng mày ngài tựa điểm trang\r\n<br/><br/>\r\n轰烈流沙枕上白发杯中酒比划\r\n<br/>\r\nCát chảy cuồn cuộn, tóc trắng gối vương, chén rượu họa từng đường\r\n<br/><br/>\r\n年少风雅鲜衣怒马也不过一刹那\r\n<br/>\r\nThiếu niên xiêm y phong nhã bên tuấn mã cũng trôi qua trong nháy mắt thôi\r\n<br/><br/>\r\n难免疏漏儿时簷下莫测变化\r\n<br/>\r\nTránh sao được mái dột sương rơi, khó lường trước vật đổi sao dời\r\n<br/><br/>\r\n隔却山海转身从容煎茶\r\n<br/>\r\nNúi sông cách trở, xoay người ung dung sao trà\r\n<br/><br/>\r\n一生长\r\n<br/>\r\nĐời người dài đằng đẵng\r\n<br/><br/>\r\n重寄一段过往\r\n<br/>\r\nký thác lại một góc dĩ vãng đã qua\r\n<br/><br/>\r\n将希冀都流放可曾添些荒唐\r\n<br/>\r\nthả trôi hết cả bao hy vọng thêm vào đó là sự hoang đường\r\n<br/><br/>\r\n才记得你的模样\r\n<br/>\r\nmới nhớ được hình bóng người thương\r\n<br/><br/>\r\n一身霜\r\n<br/>\r\nToàn thân sương pha\r\n<br/><br/>\r\n谁提笔只两行\r\n<br/>\r\nAi nhấc bút viết đôi hàng\r\n<br/><br/>\r\n换一隅你安康便销得这沧桑\r\n<br/>\r\nđổi lại cho chàng một góc an khang, tiêu tan đi bao nỗi thăng trầm\r\n <br/><br/>\r\n你还在我的心上\r\n<br/>\r\nChàng vẫn mãi ở trong lòng ta\r\n<b/><br/><br/>\r\n手中雕刻生花刀锋千转蜿蜒成画\r\n<br/>\r\nTay cầm bông hoa chạm trổ, ngàn vết khắc uốn lượn thành tranh\r\n<br/><br/>\r\n盛名功德塔是桥畔某处人家\r\n<br/>   \r\ntháp công đức lừng danh nằm bên cầu cạnh nhà ai đó\r\n<br/><br/>\r\n春风绕过发梢红纱刺绣赠他\r\n<br/>\r\ngió xuân thổi bay ngọn tóc với khăn hồng thêu dành tặng người\r\n<br/><br/>\r\n眉目刚烈拟作妆嫁\r\n<br/>\r\nmắt phượng mày ngài tựa điểm trang\r\n<br/><br/>\r\n轰烈流沙枕上白发杯中酒比划\r\n<br/>\r\nCát chảy cuồn cuộn, tóc trắng gối vương, chén rượu họa từng đường\r\n<br/><br/>\r\n年少风雅鲜衣怒马也不过一刹那\r\n<br/>\r\nThiếu niên xiêm y phong nhã bên tuấn mã cũng trôi qua trong nháy mắt thôi\r\n<br/><br/>\r\n难免疏漏儿时簷下莫测变化\r\n<br/>\r\nTránh sao được mái dột sương rơi, khó lường trước vật đổi sao dời\r\n<br/><br/>\r\n隔却山海转身从容煎茶\r\n<br/>\r\nNúi sông cách trở, xoay người ung dung sao trà\r\n<br/><br/>\r\n一生长\r\n<br/>\r\nĐời người dài đằng đẵng\r\n<br/><br/>\r\n重寄一段过往\r\n<br/>\r\nký thác lại một góc dĩ vãng đã qua\r\n<br/><br/>\r\n将希冀都流放可曾添些荒唐\r\n<br/>\r\nthả trôi hết cả bao hy vọng thêm vào đó là sự hoang đường\r\n<br/><br/>\r\n才记得你的模样\r\n<br/>\r\nmới nhớ được hình bóng người thương\r\n<br/><br/>\r\n一身霜\r\n<br/>\r\nToàn thân sương pha\r\n<br/><br/>\r\n谁提笔只两行\r\n<br/>\r\nAi nhấc bút viết đôi hàng\r\n<br/><br/>\r\n换一隅你安康便销得这沧桑\r\n<br/>\r\nđổi lại cho chàng một góc an khang, tiêu tan đi bao nỗi thăng trầm\r\n<br/><br/>\r\n你还在我的心上\r\n<br/>\r\nChàng vẫn mãi ở trong lòng ta\r\n<br/><br/>\r\n一生长\r\n<br/>\r\nĐời người dài đằng đẵng\r\n<br/><br/>\r\n重寄一段过往\r\n<br/>\r\nký thác lại một góc dĩ vãng đã qua\r\n<br/><br/>\r\n将希冀都流放可曾添些荒唐\r\n<br/>\r\nthả trôi hết cả bao hy vọng thêm vào đó là sự hoang đường\r\n<br/><br/>\r\n才记得你的模样\r\n<br/>\r\nmới nhớ được hình bóng người thương\r\n<br/><br/>\r\n一身霜\r\n<br/>\r\nToàn thân sương pha\r\n<br/><br/>\r\n谁提笔只两行\r\n<br/>\r\nAi nhấc bút viết đôi hàng\r\n<br/><br/>\r\n换一隅你安康便销得这沧桑\r\n<br/>\r\nđổi lại cho chàng một góc an khang, tiêu tan đi bao nỗi thăng trầm\r\n<br/><br/>\r\n你还在我的心上\r\n<br/>\r\nChàng vẫn mãi ở trong lòng ta', 0, 0, '2022-04-04 20:25:15'),
(6, 2, 5, 1, 'Đế Vương', 'http://localhost/musicplayer/upload/2022/04/05/songs_de_v%C6%B0%C6%A1ng_hoang_dung.jpg', 'De_Vuong', '', 'Một bậc quân vương mang trong con tim hình hài đất nước\r\n<br/>\r\nNgỡ như dân an ta sẽ chẳng bao giờ buồn\r\n<br/>\r\nNào ngờ một hôm ngao du nhân gian chạm một ánh mắt\r\n<br/>\r\nKhiến cho ta say ta mê như chốn thiên đường\r\n<br/><br/>\r\nTrời cao như đang trêu ngươi thân ta khi bông hoa ấy\r\n<br/>\r\nTrót mang con tim trao cho một nam nhân thường\r\n<br/>\r\nGiận lòng ta ban cho bông hoa thơm hồi về cung cấm\r\n<br/>\r\nKhiến em luôn luôn bên ta mãi mãi không buông\r\n<br/><br/>\r\nMà nào ngờ đâu thân em nơi đây tâm trí nơi nào\r\n<br/>\r\nNhìn về quê hương em ôm tương tư nặng lòng biết bao\r\n<br/>\r\nMột người nam nhân không vinh không hoa mà có lẽ nào\r\n<br/>\r\nNgười lại yêu thương quan tâm hơn ta một đế vương sao\r\n<br/><br/>\r\nGiọt lệ quân vương không khi nào rơi khi nước chưa tàn\r\n<br/>\r\nMà tình chưa yên nên vương trên mi giọt buồn chứa chan\r\n<br/>\r\nĐành lòng buông tay cho em ra đi với mối tình vàng\r\n<br/>\r\nMột bậc quân vương uy nghiêm oai phong nhưng tim nát tan\r\n<br/><br/>\r\nMột bậc quân vương mang trong con tim hình hài đất nước\r\n<br/>\r\nNgỡ như dân an ta sẽ chẳng bao giờ buồn\r\n<br/>\r\nNào ngờ một hôm ngao du nhân gian chạm một ánh mắt\r\n<br/>\r\nKhiến cho ta say ta mê như chốn thiên đường\r\n<br/><br/>\r\nTrời cao như đang trêu ngươi thân ta khi bông hoa ấy\r\n<br/>\r\nTrót mang con tim trao cho một nam nhân thường\r\n<br/>\r\nGiận lòng ta ban cho bông hoa thơm hồi về cung cấm\r\n<br/>\r\nKhiến em luôn luôn bên ta mãi mãi không buông\r\n<br/><br/>\r\nMà nào ngờ đâu thân em nơi đây tâm trí nơi nào\r\n<br/>\r\nNhìn về quê hương em ôm tương tư nặng lòng biết bao\r\n<br/>\r\nMột người nam nhân không vinh không hoa mà có lẽ nào\r\n<br/>\r\nNgười lại yêu thương quan tâm hơn ta một đế vương sao\r\n<br/><br/>\r\nGiọt lệ quân vương không khi nào rơi khi nước chưa tàn\r\n<br/>\r\nMà tình chưa yên nên vương trên mi giọt buồn chứa chan\r\n<br/>\r\nĐành lòng buông tay cho em ra đi với mối tình vàng\r\n<br/>\r\nMột bậc quân vương uy nghiêm oai phong nhưng tim nát tan\r\n<br/><br/>\r\nMà nào ngờ đâu thân em nơi đây tâm trí nơi nào\r\n<br/>\r\nNhìn về quê hương em ôm tương tư nặng lòng biết bao\r\n<br/>\r\nMột người nam nhân không vinh không hoa mà có lẽ nào\r\n<br/>\r\nNgười lại yêu thương quan tâm hơn ta một đế vương sao\r\n<br/><br/>\r\nGiọt lệ quân vương không khi nào rơi khi nước chưa tàn\r\n<br/>\r\nMà tình chưa yên nên vương trên mi giọt buồn chứa chan\r\n<br/>\r\nĐành lòng buông tay cho em ra đi với mối tình vàng\r\n<br/>\r\nMột bậc quân vương uy nghiêm oai phong nhưng tim nát tan\r\n<br/><br/>\r\nMột bậc quân vương mang trong con tim hình hài đất nước\r\n<br/>\r\nNgỡ như dân an ta sẽ chẳng bao giờ buồn\r\n<br/>\r\nNào ngờ một hôm ngao du nhân gian chạm một ánh mắt\r\n<br/>\r\nKhiến cho ta say ta mê như chốn thiên đường\r\n<br/>', 0, 0, '2022-04-05 09:20:26'),
(7, 4, 1, 1, 'Như Ngày Hôm Qua', 'http://localhost/musicplayer/upload/2022/04/05/nhu_ngay_hom_qua_Son_Tung_MTP.jpg', 'Nhu_Ngay_Hom_Qua', '', '', 0, 0, '2022-04-05 10:06:30'),
(8, 5, 3, 1, 'Trên Tình Bạn Dưới Tình Yêu', 'http://localhost/musicplayer/upload/2022/04/05/tren_tinh_ban_duoi_tinh_yeu_Min.jfif', 'Tren_Tinh_Ban_Duoi_Tinh_Yeu', '', '', 0, 0, '2022-04-05 10:16:23'),
(9, 6, 2, 2, 'Thán Vân Hề ( 叹云兮 )', 'http://localhost/musicplayer/upload/2022/04/05/song_Than_Van_He_Cuc_Tinh_Y.jpg', 'Than_Van_He', '', '若这个世界凋谢\r\nruò zhè·ge shìjiè diāoxiè\r\nrua chưa cưa sư chia teo xia\r\nNếu thế gới này lụi tàn\r\n\r\n我会守在你身边\r\nwǒ huì shǒu zài nǐ shēnbiān\r\nủa huây sẩu chai nỉ sân pen\r\nta vẫn sẽ ở bên cạnh người\r\n\r\n用沉默坚决\r\nyòng chénmò jiānjué\r\ndung trấn mua chen chuế\r\ndùng sự yên lặng và kiên quyết\r\n\r\n\r\n \r\n对抗万语千言\r\nduìkàng wàn yǔ qiān yán\r\ntuây khang oan ủy tren dén\r\nchống lại mọi lời lẽ\r\n\r\n\r\n \r\n倘若这世间\r\ntǎngruò zhè shìjiān\r\nthảng rua chưa sư chen\r\nnếu như thế gian này\r\n\r\n\r\n \r\n一切都在无情的崩裂\r\nyīqiè dōu zài wúqíng de bēngliè\r\ni tria tâu chai ú trính tơ pâng liê\r\ntất cả đều rách toác một cách vô tình\r\n\r\n\r\n \r\n我会用手中的线为你缝原\r\nwǒ huì yòng shǒu zhōng de xiàn wèi nǐ féng yuán\r\nủa huây dung sẩu chung tơ xen uây nỉ phấng doén\r\nta sẽ dùng sợi chỉ trong tay khâu lại nguyên vẹn cho người\r\n\r\n陪你看日升月潜\r\npéi nǐ kàn rì shēng yuè qián\r\np\'ấy nỉ khan rư sâng duê trén\r\ncùng người ngắm nhìn mặt trời lên mặt trăng lặn xuống\r\n\r\n\r\n \r\n陪你看沧海变迁\r\npéi nǐ kàn cānghǎi biànqiān\r\np\'ấy nỉ khan trang hải pen tren\r\ncùng người ngắm biển cả đổi thay\r\n\r\n陪你一字又一言谱下回忆的诗篇\r\npéi nǐ yī zì yòu yī yán pǔ xià huíyì de shīpiān\r\np\'ấy nỉ i chư dâu i dén p\'ủ xe huấy i tơ sư p\'en\r\ncùng người viết từng chữ nói từng lời, viết vào áng thơ từng dòng hồi ức\r\n\r\n\r\n \r\n陪你将情节改写\r\npéi nǐ jiāng qíngjié gǎixiě\r\np\'ấy nỉ cheng trính chía cải xỉa\r\ncùng người sửa lại từng tình tiết\r\n\r\n陪你将八荒走遍\r\npéi nǐ jiāng bāhuāng zǒu biàn\r\np\'ấy nỉ cheng pa hoang chẩu pen\r\ncùng người đi khắp tám hướng xa xăm\r\n\r\n只因你读得懂我而你注定\r\nzhǐ yīn nǐ dú dé dǒng wǒ ér nǐ zhùdìng\r\nchử in nỉ tú tứa tủng ủa ớ nỉ chu ting\r\nbởi lẽ hiểu ta chỉ có người mà người đã định trước\r\n\r\n\r\n \r\n是我的心头血\r\nshì wǒ de xīntóu xiě\r\nsư ủa tơ xin thấu xỉa\r\nlà máu chảy trong tim ta\r\n\r\n这是缘\r\nzhè shì yuán\r\nchưa sư doén\r\nđây là duyên\r\n\r\n亦是命中最美的相见\r\nyì shì mìngzhòng zuì měi de xiāng jiàn\r\ni sư ming chung chuây mẩy tơ xeng chen\r\ncũng là cuộc gặp gỡ tốt đẹp nhất trong số mệnh\r\n\r\n别恨天\r\nbié hèn tiān\r\npía hân then\r\nđừng hận trời\r\n\r\n笑容更适合你的脸\r\nxiàoróng gèng shìhé nǐ de liǎn\r\nxeo rúng câng sư hứa nỉ tơ lẻn\r\nkhuôn mặt người thích hợp với nụ cười hơn\r\n\r\n再一遍\r\nzài yī biàn\r\nchai i pen\r\nlại một lần nữa\r\n\r\n记起从前的一滴一点\r\njì qǐ cóngqián de yī dī yī diǎn\r\nchi trỉ trúng trén tơ i ti i tẻn\r\nnhớ lại từng chuyện trải qua trước kia\r\n\r\n别怨我不在身边\r\nbié yuàn wǒ bùzài shēnbiān\r\npía doen ủa pu chai sân pen\r\nchớ oán hận khi ta không bên người\r\n\r\n\r\n \r\n记住我会在你的心里面\r\njìzhù wǒ huì zài nǐ de xīn·li miàn\r\nchi chu ủa huây chai nỉ tơ xin lỉ men\r\nnhớ rằng ta luôn hiện diện trong tim người\r\n\r\n\r\n当我们命运重叠\r\ndāng wǒ·men mìngyùn chóngdié\r\ntang ủa mân ming uyn trúng tía\r\nkhi vận mệnh của chúng ta chồng lên nhau\r\n\r\n恍然大悟才发现\r\nhuǎngrán dàwù cái fāxiàn\r\nhoảng rán ta u trái pha xen\r\nbỗng nhiên hiểu ra mới phát hiện \r\n\r\n原来这世间\r\nyuánlái zhè shìjiān\r\ndoén lái chưa sư chen\r\nhóa ra thế gian này\r\n\r\n完美可以残缺\r\nwánměi kěyǐ cánquē\r\noán mẩy khửa ỉ trán true\r\nhoàn mỹ cũng có thể khiếm khuyết\r\n\r\n时间不停歇\r\nshíjiān bùtíng xiē\r\nsứ chen pu thính xia\r\nthời gian trôi không ngừng nghỉ\r\n\r\n仿佛落叶飞花般无解\r\nfǎngfú luò yè fēihuā bān wú xiè\r\nphảng phú lua dê phây hoa pan ú xia\r\ntựa như lá rụng hoa bay không thể giải thích\r\n\r\n而你在这里就温柔了一切\r\nér nǐ zài zhèlǐ jiù wēnróu le yīqiè\r\nớ nỉ chai chưa lỉ chiêu uân rấu lơ i tria\r\nmà khi người ở đây tất cả mọi thứ đều hóa dịu dàng\r\n\r\n<br/><br/>\r\n陪你看梅海的月<br/>\r\npéi nǐ kàn méi hǎi de yuè<br/>\r\np\'ấy nỉ khan mấy hải tơ duê<br/>\r\ncùng người ngắm trăng sáng ở Mai Hải\r\n<br/><br/>\r\n陪你踱天宁的街<br/>\r\npéi nǐ duó tiān nìng de jiē<br/>\r\np\'ấy nỉ túa then ninh tơ chia<br/>\r\ncùng người dạo chơi trên đường phố Thiên Ninh\r\n<br/><br/>\r\n陪你把我的所念写成最后的药笺<br/>\r\npéi nǐ bǎ wǒ de suǒ niàn xiě chéng zuìhòu de yào jiān<br/>\r\np\'ấy nỉ pả ủa tơ xủa nen xỉa trấng chuây hâu tơ dao chen<br/>\r\ncùng người đem nỗi nhớ nhung của ta viết lên những chú giải thuốc cuối cùng\r\n<br/><br/>\r\n陪你过的那些年<br/>\r\npéi nǐ guò de nàxiē nián<br/>\r\np\'ấy nỉ cua tơ na xia nén<br/>\r\ncùng người trải qua những năm tháng kia\r\n<br/><br/>\r\n终究会化作永远<br/>\r\nzhōngjiū huì huà zuò yǒngyuǎn<br/>\r\nchung chiêu huây hoa chua dủng doẻn<br/>\r\ncuối cùng sẽ hóa thành vĩnh viễn<br/>\r\n<br/>\r\n记得我不曾后退在你心上<br/>\r\njìdé wǒ bùcéng hòutuì zài nǐ xīn shàng<br/>\r\nchi tứa ủa pu trấng hâu thuây chai nỉ xin sang<br/>\r\nnhớ rằng ta chưa từng lùi bước, ở trong tim người<br/>\r\n<br/>\r\n陪你每个黑夜<br/>\r\npéi nǐ měi gè hēiyè<br/>\r\np\'ấy nỉ mẩy cưa hây dê<br/>\r\nbên cạnh người mỗi đêm tối<br/>\r\n<br/>\r\n唇齿间<br/>\r\nchúnchǐ jiàn<br/>\r\ntruấn trử chen<br/>\r\ngắn bó mãi\r\n<br/><br/>\r\n不舍的是对你的留恋<br/>\r\nbù shě de shì duì nǐ de liúliàn<br/>\r\npu sửa tơ sư tuây nỉ tơ liếu len<br/>\r\nlưu luyến người mãi không thôi\r\n<br/><br/>\r\n叹离别<br/>\r\ntàn líbié<br/>\r\nthan lí pía<br/>    \r\nthan ôi li biệt\r\n<br/><br/>\r\n总是在该圆满之前<br/>\r\nzǒngshì zài gāi yuánmǎn zhīqián<br/>\r\nchủng sư chai cai doén mản chư trén<br/>\r\nvẫn luôn xảy ra trước thời khắc viên mãn nhất\r\n<br/><br/>\r\n我的愿<br/>\r\nwǒ de yuàn<br/>\r\nủa tơ doen<br/>\r\nước nguyện của ta\r\n<br/><br/>\r\n并非执手相看泪满眼<br/>\r\nbìng fēi zhíshǒu xiāng kàn lèi mǎnyǎn<br/>\r\npinh phây chứ sẩu xeng khan lây mản dẻn<br/>\r\ncũng không phải chắp tay nhìn mắt người ứ lệ\r\n<br/><br/>\r\n而是你一往无前<br/>\r\nér shì nǐ yīwǎngwúqián<br/>\r\nớ sư nỉ i oảng ú trén<br/>\r\nmà là một điều trước nay chưa từng có từ người\r\n<br/><br/>\r\n拾起曾因我而有的笑脸<br/>\r\nshí qǐ céng yīn wǒ ér yǒu·de xiàoliǎn<br/>\r\nsứ trỉ trấng in ủa ớ dẩu tơ xeo lẻn<br/>\r\nlà nụ cười vun trên khóe môi từng vì ta mà vui vẻ\r\n<br/><br/>\r\n若故事重演<br/>\r\nruò gùshì chóngyǎn<br/>\r\nrua cu sư trúng dẻn<br/>\r\nnếu chuyện xưa tái diễn\r\n<br/><br/>\r\n我想我依然会用我的一切<br/>\r\nwǒ xiǎng wǒ yīrán huì yòng wǒ de yīqiè<br/>\r\nủa xẻng ủa i rán huây dung ủa tơ i <br/>tria<br/>\r\nta mong mình vẫn sẽ dùng mọi thứ của mình\r\n<br/><br/>\r\n换明天就算我不在里面<br/>\r\nhuàn míngtiān jiùsuàn wǒ bùzài lǐmiàn<br/>\r\nhoan mính then chiêu xoan ủa pu chai lỉ men<br/>\r\nđối lấy ngày mai cho dù ta không còn ở đó<br/>\r\n<br/><br/>\r\n可你会明白我对你的永世不变<br/>\r\nkě nǐ huì míng·bai wǒ duì nǐ de yǒngshì bùbiàn<br/>\r\nkhửa nỉ huây mính pái ủa tuây nỉ tơ dủng sư pu pen<br/>\r\nnhưng người sẽ hiểu ta đối với người trọn đời không đổi<br/>\r\n\r\n<br/><br/>\r\n这是缘<br/>\r\nzhè shì yuán<br/>\r\nchưa sư doén<br/>\r\nđây là duyên<br/>\r\n<br/><br/>\r\n亦是命中最美的相见<br/>\r\nyì shì mìngzhòng zuì měi de xiāng jiàn<br/>\r\ni sư ming chung chuây mẩy tơ xeng chen<br/>\r\ncũng là cuộc gặp gỡ tốt đẹp nhất trong số mệnh<br/>\r\n<br/><br/>\r\n别恨天<br/>\r\nbié hèn tiān<br/>\r\npía hân then<br/>\r\nđừng hận trời<br/>\r\n\r\n<br/><br/>\r\n笑容更适合你的脸<br/>\r\nxiàoróng gèng shìhé nǐ de liǎn<br/>\r\nxeo rúng câng sư hứa nỉ tơ lẻn<br/>\r\nkhuôn mặt người thích hợp với nụ cười hơn<br/>\r\n\r\n<br/><br/>\r\n再一遍<br/>\r\nzài yī biàn<br/>\r\nchai i pen<br/>\r\nlại một lần nữa<br/>\r\n\r\n<br/><br/>\r\n记起从前的一滴一点<br/>\r\njì qǐ cóngqián de yī dī yī diǎn<br/>\r\nchi trỉ trúng trén tơ i ti i tẻn<br/>\r\nnhớ lại từng chuyện trải qua trước kia<br/>\r\n\r\n<br/><br/>\r\n别怨我不在身边<br/>\r\nbié yuàn wǒ bùzài shēnbiān<br/>\r\npía doen ủa pu chai sân pen<br/>\r\nchớ oán hận khi ta không bên người<br/>\r\n\r\n<br/><br/>\r\n记住我会在你的心里面<br/>\r\njìzhù wǒ huì zài nǐ de xīn·li miàn<br/>\r\nchi chu ủa huây chai nỉ tơ xin lỉ men<br/>\r\nnhớ rằng ta luôn hiện diện trong tim người<br/>\r\n\r\n<br/><br/>\r\n我会在你心间<br/>\r\nwǒ huì zài nǐ xīn jiàn<br/>\r\nủa huây chai nỉ xin che<br/>\r\nta sẽ ở trong tim người<br/>\r\n\r\n<br/><br/>\r\n做你心头血<br/>\r\nzuò nǐ xīntóu xiě<br/>\r\nchua nỉ xin thấu xỉa<br/>\r\nlàm máu chảy trong tim người<br/>', 0, 0, '2022-04-05 20:43:42'),
(10, 7, 1, 1, 'Hãy Trao Cho Anh', 'http://localhost/musicplayer/upload/2022/03/25/song_hay_trao_cho_anh.jpg', 'Hay_Trao_Cho_Anh', '', '', 0, 0, '2022-04-05 20:49:26'),
(11, 8, 6, 3, 'Solo', 'http://localhost/musicplayer/upload/2022/04/06/singer_jennie_blackpink.jpg', 'Solo-Jennie', '', '', 0, 0, '2022-04-06 08:44:18'),
(12, 9, 4, 1, 'Chờ Nhau Nhé', 'http://localhost/musicplayer/upload/2022/04/06/song_ChoNhauNhe_SuniHaLinh_ERIK.jpg', 'Cho-Nhau-Nhe', '', '', 0, 0, '2022-04-06 09:01:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `website`
--

CREATE TABLE `website` (
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `descr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `website`
--

INSERT INTO `website` (`title`, `descr`, `keywords`, `status`) VALUES
('musicplayer', '', '', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_acc`);

--
-- Chỉ mục cho bảng `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id_audio`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- Chỉ mục cho bảng `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`id_singer`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id_song`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `audio`
--
ALTER TABLE `audio`
  MODIFY `id_audio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `singer`
--
ALTER TABLE `singer`
  MODIFY `id_singer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
