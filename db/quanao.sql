-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 02:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Dịch covid 19', '&lt;p&gt;Hiện nạy, dịch covid 19 ng&agrave;y c&agrave;ng chuyển biến, kh&aacute;ch h&agrave;ng n&ecirc;n tu&acirc;n thủ theo luật 5k&lt;/p&gt;\r\n', 1, '2021-11-10 08:42:54', '2021-11-10 22:42:54'),
(2, 'Mừng khai trương', '&lt;p&gt;Ho&agrave;ng Hiếu giảm 15% cho c&aacute;c sản phẩm&lt;/p&gt;\r\n', 2, '2021-11-10 08:47:40', '2021-11-10 22:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(6, 'Đồ bóng đá', 1),
(8, 'Tập GYM', 1),
(9, 'Đồ tập YOGA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `total`, `status`, `created_at`, `updated_at`) VALUES
('order_2280', 6, 'Hà Nội', 1160000, 2, '2021-11-20 14:26:20', '2021-11-20 21:26:37'),
('order_4828', 6, 'TPHCM', 1110000, 1, '2021-12-13 01:55:56', '2021-12-13 08:58:10'),
('order_7072', 6, 'TPHCM', 1445000, 1, '2021-11-20 14:21:54', '2021-11-20 21:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` char(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(13, 'order_7072', 18, 2, 205000),
(14, 'order_7072', 19, 3, 280000),
(15, 'order_7072', 17, 1, 195000),
(16, 'order_2280', 16, 3, 250000),
(17, 'order_2280', 18, 2, 205000),
(18, 'order_4828', 14, 3, 240000),
(19, 'order_4828', 17, 2, 195000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_buy` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `qty`, `qty_buy`, `status`, `image`, `description`) VALUES
(14, 6, 'Áo AC Milan sân khách hàng Thái Lan', 240000, 97, 0, 1, '2021_12_13_02_18_13Ao-ac-milan-san-khach-mau-ba-1.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;Chất liệu 100% cotton, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt&lt;/li&gt;\r\n	&lt;li&gt;M&agrave;u nhuộm được xử l&yacute; nhiệt v&agrave; giặt c&ocirc;ng nghiệp n&ecirc;n c&oacute; độ bền m&agrave;u cao&lt;/li&gt;\r\n	&lt;li&gt;Form &aacute;o rộng, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; d&aacute;ng người kh&aacute;c nhau&lt;/li&gt;\r\n	&lt;li&gt;Miễn ph&iacute; vận chuyển cho đơn h&agrave;ng tr&ecirc;n 300k&lt;/li&gt;\r\n	&lt;li&gt;Được kiểm h&agrave;ng v&agrave; chấp nhận đổi trả nếu sản phẩm c&oacute; sai s&oacute;t về chất lượng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(15, 8, 'Áo thun thể thao Achilles xám', 234000, 200, 0, 1, '2021_12_13_02_30_05Ao-achilles-xam-1.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;Chất liệu 100% cotton, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt&lt;/li&gt;\r\n	&lt;li&gt;M&agrave;u nhuộm được xử l&yacute; nhiệt v&agrave; giặt c&ocirc;ng nghiệp n&ecirc;n c&oacute; độ bền m&agrave;u cao&lt;/li&gt;\r\n	&lt;li&gt;Form &aacute;o rộng, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; d&aacute;ng người kh&aacute;c nhau&lt;/li&gt;\r\n	&lt;li&gt;Miễn ph&iacute; vận chuyển cho đơn h&agrave;ng tr&ecirc;n 300k&lt;/li&gt;\r\n	&lt;li&gt;Được kiểm h&agrave;ng v&agrave; chấp nhận đổi trả nếu sản phẩm c&oacute; sai s&oacute;t về chất lượng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(16, 9, 'Bra 360s Lux màu vàng', 250000, 97, 0, 1, '2021_12_13_02_32_24Bra-lux-vang-30.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;Chất liệu 100% cotton, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt&lt;/li&gt;\r\n	&lt;li&gt;M&agrave;u nhuộm được xử l&yacute; nhiệt v&agrave; giặt c&ocirc;ng nghiệp n&ecirc;n c&oacute; độ bền m&agrave;u cao&lt;/li&gt;\r\n	&lt;li&gt;Form &aacute;o rộng, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; d&aacute;ng người kh&aacute;c nhau&lt;/li&gt;\r\n	&lt;li&gt;Miễn ph&iacute; vận chuyển cho đơn h&agrave;ng tr&ecirc;n 300k&lt;/li&gt;\r\n	&lt;li&gt;Được kiểm h&agrave;ng v&agrave; chấp nhận đổi trả nếu sản phẩm c&oacute; sai s&oacute;t về chất lượng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(17, 8, 'Quần legging nam Falcon màu đen', 195000, 197, 0, 1, '2021_12_13_02_32_56Legging-nam-falcon-den-1.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;Chất liệu 100% cotton, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt&lt;/li&gt;\r\n	&lt;li&gt;M&agrave;u nhuộm được xử l&yacute; nhiệt v&agrave; giặt c&ocirc;ng nghiệp n&ecirc;n c&oacute; độ bền m&agrave;u cao&lt;/li&gt;\r\n	&lt;li&gt;Form &aacute;o rộng, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; d&aacute;ng người kh&aacute;c nhau&lt;/li&gt;\r\n	&lt;li&gt;Miễn ph&iacute; vận chuyển cho đơn h&agrave;ng tr&ecirc;n 300k&lt;/li&gt;\r\n	&lt;li&gt;Được kiểm h&agrave;ng v&agrave; chấp nhận đổi trả nếu sản phẩm c&oacute; sai s&oacute;t về chất lượng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(18, 8, 'Quần short training tập GYM Nam', 205000, 196, 0, 1, '2021_12_13_02_33_31quan-shor-the-thao-37-xam-5.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;Chất liệu 100% cotton, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt&lt;/li&gt;\r\n	&lt;li&gt;M&agrave;u nhuộm được xử l&yacute; nhiệt v&agrave; giặt c&ocirc;ng nghiệp n&ecirc;n c&oacute; độ bền m&agrave;u cao&lt;/li&gt;\r\n	&lt;li&gt;Form &aacute;o rộng, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; d&aacute;ng người kh&aacute;c nhau&lt;/li&gt;\r\n	&lt;li&gt;Miễn ph&iacute; vận chuyển cho đơn h&agrave;ng tr&ecirc;n 300k&lt;/li&gt;\r\n	&lt;li&gt;Được kiểm h&agrave;ng v&agrave; chấp nhận đổi trả nếu sản phẩm c&oacute; sai s&oacute;t về chất lượng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(19, 6, 'Áo AC Milan sân khách 2021 – 2022', 280000, 97, 0, 1, '2021_12_13_02_35_08Ao-ac-milan-san-khach-40.jpg', '&lt;ul&gt;\r\n	&lt;li&gt;Chất liệu 100% cotton, co d&atilde;n v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt&lt;/li&gt;\r\n	&lt;li&gt;M&agrave;u nhuộm được xử l&yacute; nhiệt v&agrave; giặt c&ocirc;ng nghiệp n&ecirc;n c&oacute; độ bền m&agrave;u cao&lt;/li&gt;\r\n	&lt;li&gt;Form &aacute;o rộng, ph&ugrave; hợp với nhiều phong c&aacute;ch v&agrave; d&aacute;ng người kh&aacute;c nhau&lt;/li&gt;\r\n	&lt;li&gt;Miễn ph&iacute; vận chuyển cho đơn h&agrave;ng tr&ecirc;n 300k&lt;/li&gt;\r\n	&lt;li&gt;Được kiểm h&agrave;ng v&agrave; chấp nhận đổi trả nếu sản phẩm c&oacute; sai s&oacute;t về chất lượng&lt;/li&gt;\r\n&lt;/ul&gt;\r\n'),
(20, 9, 'Legging lửng 360s Compression xám', 160000, 100, 0, 1, '2021_12_13_02_37_08legging-compression-mau-xam-1.jpg', '&lt;p&gt;Quần legging thể thao Nữ 360s Compession lửng m&agrave;u x&aacute;m phối đen. Quần được dệt thay v&igrave; may như th&ocirc;ng thường, thiết kế kiểu d&aacute;ng đẹp, mang lại cho bạn cảm gi&aacute;c m&aacute;t mẻ v&agrave; dễ chịu khi tập c&aacute;c b&agrave;i tập thể dục.&lt;/p&gt;\r\n\r\n&lt;p&gt;Quần thể thao tập Yoga, tập GYM v&agrave; Thể dục thẩm mỹ n&agrave;y được thiết kế với chất liệu vải căng snug-fitting rất ho&agrave;n hảo để tập c&aacute;c b&agrave;i tập từ đơn giản đến phức tạp, mang đến cho bạn sự an to&agrave;n v&agrave; linh hoạt hơn trong ph&ograve;ng tập.&lt;/p&gt;\r\n\r\n&lt;p&gt;Bạn c&oacute; thể kết hợp quần legging n&agrave;y với&amp;nbsp;&lt;strong&gt;&aacute;o bras thể thao&lt;/strong&gt;&amp;nbsp;v&agrave; một chiếc &aacute;o tanktop ở b&ecirc;n ngo&agrave;i rất ph&ugrave; hợp.&lt;/p&gt;\r\n'),
(21, 9, 'Bra 360s Zipper màu đen', 150000, 100, 0, 1, '2021_12_13_02_38_38Bra-360s-zipper-mau-den-20.jpg', '&lt;p&gt;&Aacute;o ngực thể thao (bras) 360s Zipper đen tập Yoga, GYM &amp;amp; Thể dục thẩm mỹ nữ. Đ&acirc;y l&agrave; mẫu &aacute;o được thiết kế dựa tr&ecirc;n kiểu d&aacute;ng đẹp hiện đại v&agrave; được xem l&agrave; bộ trang phục thể thao ho&agrave;n hảo mang lại cho bạn cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu khi tập c&aacute;c b&agrave;i tập thể dục&amp;nbsp;từ đơn giản đến phức tạp, mang đến cho bạn sự an to&agrave;n v&agrave; linh hoạt hơn trong ph&ograve;ng tập.&lt;/p&gt;\r\n\r\n&lt;p&gt;Mẫu &aacute;o n&agrave;y thường được kết hợp với 1 chiếc &aacute;o tank top ở ngo&agrave;i v&agrave; quần th&igrave; bạn c&oacute; thể phối&amp;nbsp;&lt;strong&gt;quần legging tập Yoga&lt;/strong&gt;&amp;nbsp;hoặc&amp;nbsp;&lt;strong&gt;quần lửng&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;quần shorts&lt;/strong&gt;&amp;nbsp;đều ph&ugrave; hợp.&lt;/p&gt;\r\n\r\n&lt;p&gt;Sản phẩm c&oacute; nhiều m&agrave;u sắc để bạn c&oacute; thể dễ d&agrave;ng chọn lựa.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Size:&lt;/strong&gt;&amp;nbsp;S, M, L&lt;/p&gt;\r\n'),
(22, 8, 'Quần shorts training tập GYM E6 màu đen', 150000, 100, 0, 1, '2021_12_13_02_39_53Quan-shorts-training-tap-gym-e6-mau-den-3.jpg', '&lt;p&gt;&lt;strong&gt;Quần short training tập GYM E6 m&agrave;u đen&lt;/strong&gt;&amp;nbsp;chuy&ecirc;n hỗ trợ training v&agrave; tập GYM d&agrave;nh cho Nam. Quần được thiết kế kiểu d&aacute;ng thể thao hiện đại, mang lại cho bạn cảm gi&aacute;c thoải m&aacute;i v&agrave; dễ chịu khi bạn thực hiện c&aacute;c b&agrave;i tập thể dục v&agrave; cũng c&oacute; thể mặc nh&agrave; hoặc đi chơi.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Chất liệu:&lt;/strong&gt;&amp;nbsp;80% Polyester &amp;ndash; 20% Spandex / Thun lạnh co giản 4 chiều&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Size:&lt;/strong&gt;&amp;nbsp;M &amp;ndash; L &amp;ndash; XL &amp;ndash; 2XL &amp;ndash; 3XL&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;Quần shorts training tập gym e6 m&agrave;u đen&quot; height=&quot;91&quot; src=&quot;https://www.sporter.vn/wp-content/uploads/2021/02/Quan-shorts-training-tap-gym-e6-mau-den-0.jpg&quot; width=&quot;500&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Cam kết:&lt;/strong&gt;&lt;br /&gt;\r\n&amp;ndash; Sản phẩm chất lượng cao&lt;br /&gt;\r\n&amp;ndash; Gi&aacute; lu&ocirc;n tốt nhất so với sản phẩm c&ugrave;ng chất lượng&lt;br /&gt;\r\n&amp;ndash; Tư vấn nhiệt t&igrave;nh v&agrave; vui vẻ&lt;br /&gt;\r\n&amp;ndash; Được đổi &amp;ndash; trả h&agrave;ng&lt;/p&gt;\r\n'),
(23, 8, 'Áo thun thể thao Bacchus xám', 125000, 100, 0, 1, '2021_12_13_02_40_48Ao-bacchus-xam-1.jpg', '&lt;p&gt;&Aacute;o thun thể thao&amp;nbsp;&lt;strong&gt;Bacchus x&aacute;m&lt;/strong&gt;&amp;nbsp;l&agrave; một trong những mẫu &aacute;o thể thao &amp;ldquo;Thần Thoại Hy Lạp&amp;rdquo; của 2020 năm nay. &Aacute;o được thiết kế với phong c&aacute;ch thời trang, năng động, c&ugrave;ng với chất liệu co giản 4 chiều. Đ&acirc;y sẽ l&agrave; một trong những mẫu trang phục kh&ocirc;ng thể thiếu khi đồng h&agrave;nh c&ugrave;ng bạn đến ph&ograve;ng tập hay bất cứ m&ocirc;n thể thao n&agrave;o.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Chất liệu: 87&lt;/strong&gt;% Polyester &amp;ndash;&amp;nbsp;&lt;strong&gt;13&lt;/strong&gt;% Spandex&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;M&agrave;u sắc:&amp;nbsp;&lt;/strong&gt;Đen &amp;ndash; X&aacute;m &amp;ndash; Xanh dương &amp;ndash; Xanh r&ecirc;u&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Kiểu d&aacute;ng:&amp;nbsp;&lt;/strong&gt;&Aacute;o thun thể thao nam&lt;/p&gt;\r\n'),
(24, 6, 'Áo đội tuyển Việt Nam đỏ sân nhà', 150000, 100, 0, 1, '2021_12_13_02_41_47Ao-doi-tuyen-viet-nam-do-3.jpg', '&lt;p&gt;Mẫu quần &aacute;o b&oacute;ng đ&aacute; đội tuyển Việt Nam s&acirc;n nh&agrave; , đ&acirc;y l&agrave; mẫu quần &aacute;o b&oacute;ng đ&aacute; s&acirc;n m&ugrave;a giải mới của đội tuyển:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;NHẬN ĐẶT MAY QUẦN &Aacute;O B&Oacute;NG Đ&Aacute; THEO MẪU TỰ THIẾT KẾ&lt;/strong&gt;&lt;br /&gt;\r\n&lt;strong&gt;&lt;em&gt;Shop đồ thể thao Sporter.vn cam kết:&lt;/em&gt;&lt;/strong&gt;&lt;br /&gt;\r\n&lt;em&gt;&amp;ndash; SẢN PHẨM QUẦN &Aacute;O B&Oacute;NG Đ&Aacute; Đ&Uacute;NG CHẤT LƯỢNG&lt;/em&gt;&lt;br /&gt;\r\n&lt;em&gt;&amp;ndash; GI&Aacute; LU&Ocirc;N LU&Ocirc;N THẤP NHẤT SO VỚI SẢN PHẨM C&Ugrave;NG LOẠI&lt;/em&gt;&lt;br /&gt;\r\n&lt;em&gt;&amp;ndash; ĐƯỢC PH&Eacute;P ĐỔI TRẢ H&Agrave;NG&lt;/em&gt;&lt;br /&gt;\r\n&lt;em&gt;&amp;ndash; LU&Ocirc;N TƯ VẤN NHIỆT T&Igrave;NH V&Agrave; VUI VẺ.&lt;/em&gt;&lt;/p&gt;\r\n'),
(25, 9, '360s Flex Training Tank đen', 150000, 100, 0, 1, '2021_12_13_02_43_06flex-training-den-1.jpg', '&lt;p&gt;&Aacute;o tanktop 360s Flex Training m&agrave;u đen thường được kết hợp với 1 chiếc &aacute;o l&oacute;t thể thao nữ b&ecirc;n trong v&agrave; mặc k&egrave;m quần th&igrave; bạn c&oacute; thể phối&amp;nbsp;&lt;strong&gt;quần legging tập Yoga&lt;/strong&gt;&amp;nbsp;hoặc&amp;nbsp;&lt;strong&gt;quần lửng&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;quần shorts&lt;/strong&gt;&amp;nbsp;đều ph&ugrave; hợp.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;M&agrave;u sắc:&lt;/strong&gt;&amp;nbsp;Hồng phấn, Đen, Trắng&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Size:&lt;/strong&gt;&amp;nbsp;Freesize&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Cam kết:&lt;/strong&gt;&lt;br /&gt;\r\n&amp;ndash; Sản phẩm chất lượng cao&lt;br /&gt;\r\n&amp;ndash; Gi&aacute; lu&ocirc;n tốt nhất so với sản phẩm c&oacute; c&ugrave;ng chất lượng&lt;br /&gt;\r\n&amp;ndash; Tư vấn nhiệt t&igrave;nh v&agrave; vui vẻ&lt;br /&gt;\r\n&amp;ndash; Được đổi &amp;ndash; trả h&agrave;ng&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `sex`, `role`) VALUES
(6, 'Test', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0123456789', 0, 0),
(12, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123456789', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_OrderUser` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ProductOrderDetail` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ProductCate` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_OrderUser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_ProductOrderDetail` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_ProductCate` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
