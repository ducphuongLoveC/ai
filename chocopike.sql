-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2025 lúc 05:37 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chocopike`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(150) DEFAULT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'customer',
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hoạt động, 0 bị khóa',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `remember_token`, `province`, `address`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pham', 'Dinh', 'duiga2611@gmail.com', '0987654325', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Hồ Chí Minh', NULL, 'customer', 1, '2025-05-17 15:04:48', '2025-05-18 00:00:00'),
(2, 'Tuấn Nguyên', 'Đậu', 'admin2@gmail.com', '0987654321', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Hồ Chí Minh', NULL, 'admin', 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(3, 'Quốc Trọng', 'Lê', 'admin@gmail.com', '0987654322', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Hồ Chí Minh', NULL, 'admin', 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(4, 'Duong', 'Dinh', 'nvh@example.com', '0987654323', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Hồ Chí Minh', NULL, 'customer', 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(5, 'Duiga', 'duiga', 'duigax2@example.com', '0987654324', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 'Hồ Chí Minh', NULL, 'customer', 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(6, 'Nam', 'Trương', 'namtruong123@gmail.com', '0123456753', '081ff96e278c7f241f1e94eac7886f78', '', 'Hồ Chí Minh', 'Nam Từ Liêm, Hà Nội', 'staff', 1, '2025-05-18 14:37:53', '2025-05-18 14:39:53'),
(7, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', '06dc67758e6bd6f8b089aee4a915441e', '', 'Hồ Chí Minh', 'Hồ Chí Minh', 'staff', 1, '2025-05-18 16:04:02', '2025-05-20 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 ẩn',
  `priority` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mì', 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(2, 'Bánh ngọt', 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(3, 'Bánh pudding', 1, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(4, 'Nguyên liệu làm bánh', 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(5, 'Bánh bông lan', 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `content` text DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `message`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Tôi muốn đặt trước dịch vụ tiệc của bạn.', 'Đậu Tuấn Nguyên', 'admin@gmail.com', '0123456598', '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(2, 'Tôi muốn đặt một chiếc bánh sinh nhật cho con gái của tôi.', 'Lê Quốc Trọng', 'admin1@gmail.com', '0987654321', '2025-05-17 15:04:48', '2025-05-17 15:04:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` varchar(100) NOT NULL,
  `coupon_value` decimal(5,3) NOT NULL DEFAULT 0.000,
  `used_times` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active, 0=expired',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_value`, `used_times`, `status`, `created_at`, `updated_at`) VALUES
('BEAUTIFUL', 0.100, 100, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
('HAPPYTIME', 0.250, 100, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
('PHUC', 0.200, 199, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
('WELCOME', 0.300, 96, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `province` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `delivery` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=pending, 0=delivered, 2=delivering, 3=canceled',
  `account_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `coupon` decimal(5,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `fname`, `lname`, `email`, `phone`, `province`, `address`, `note`, `delivery`, `payment`, `status`, `account_id`, `created_at`, `updated_at`, `coupon`) VALUES
(23, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 3, 7, '2025-05-18 16:38:13', '2025-05-18 00:00:00', 0.000),
(24, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 3, 7, '2025-05-18 16:59:55', '2025-05-18 00:00:00', 0.000),
(25, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 3, 7, '2025-05-18 17:21:28', '2025-05-18 00:00:00', 0.000),
(26, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 3, 7, '2025-05-18 17:28:57', '2025-05-18 00:00:00', 0.000),
(27, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 0, 7, '2025-05-18 17:54:11', '2025-05-18 00:00:00', 0.000),
(28, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 0, 7, '2025-05-18 17:55:29', '2025-05-18 00:00:00', 0.000),
(29, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 1, 7, '2025-05-18 18:14:12', '2025-05-18 18:14:12', 0.000),
(30, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 3, 7, '2025-05-18 19:42:14', '2025-05-20 00:00:00', 0.000),
(31, 'Phương', 'Phương', 'phuong@gmail.com', '0123456789', 'Hồ Chí Minh', 'Hồ Chí Minh', '', 'Giaohangtietkiem', 'Cash on delivery', 0, 7, '2025-05-20 21:14:02', '2025-05-20 00:00:00', 0.000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `product_id`, `quantity`, `price`) VALUES
(23, 7, 1, 6.00),
(24, 11, 1, 2.90),
(25, 11, 1, 2.90),
(26, 6, 1, 6.00),
(26, 11, 2, 5.80),
(27, 5, 1, 14.00),
(28, 6, 1, 6.00),
(29, 11, 1, 2.90),
(30, 11, 2, 5.80),
(31, 11, 1, 2.90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `sale_price` decimal(10,3) DEFAULT 0.000,
  `description` text DEFAULT NULL,
  `origin` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 là hiển thị, 0 ẩn',
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `sale_price`, `description`, `origin`, `quantity`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mì Pháp', 'bmphapp.png', 20.000, 15.000, 'Được nướng tươi mỗi ngày!', 'vn', 2, 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(2, 'Bánh pudding Sô cô la', 'puddingscl.png', 15.000, 15.000, 'Đậm đà hương vị với kết cấu mượt mà của sô-cô-la!', 'usa', 1, 1, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(3, 'Bánh mì nâu', 'banhminau.png', 5.000, 4.000, 'Lành mạnh cho những người đang ăn kiêng!', 'usa', 1, 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(4, 'Bánh dâu tây', 'strawberry.png', 35.000, 32.000, 'Bánh bông lan mềm mịn, thơm phức, kèm theo lớp kem vani béo ngậy và dâu tây tươi ngon.', 'vn', 5, 1, 2, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(5, 'Bánh Pavlova', 'pavlovaa.png', 15.000, 14.000, 'Bánh truyền thống của Úc với lớp meringue giòn tan.', 'vn', 2, 1, 2, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(6, 'Bột mì', 'botmi.png', 6.000, 0.000, 'Bột mì làm cho bánh của bạn trở nên mềm mịn và thơm ngon!!!', 'usa', 20, 1, 4, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(7, 'Bột lúa mạch đen', 'botluamach.png', 7.000, 6.000, 'Thỏa mãn vị giác của bạn với kết cấu và hương vị độc đáo.', 'usa', 14, 1, 4, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(8, 'Bánh mì nướng Pháp', 'bmnuong.png', 6.000, 2.000, 'Vỏ giòn tan - người bạn đồng hành tuyệt vời cho một tô súp nóng hổi.', 'vn', 87, 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(9, 'Bánh việt quất', 'vietquat.png', 20.000, 0.000, 'Nhân việt quất thơm ngon được phủ lớp kem bơ béo ngậy.', 'vn', 15, 1, 2, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(10, 'Bánh cupcake matcha', 'matcha.png', 6.000, 0.000, 'Chiếc cupcake này đầy hương vị matcha!! Sẵn sàng để thưởng thức.', 'vn', 20, 1, 5, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(11, 'Bánh mì cà phê', 'offerr.png', 8.750, 2.900, 'Kích thích vị giác của bạn với hương cà phê thơm lừng và vị đậm đà mạnh mẽ.', 'usa', 100, 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT 5,
  `content` text DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `rating`, `content`, `product_id`, `account_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'Ngon', 7, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(2, 3, 'tst', 1, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(3, 4, 'test', 6, 1, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(4, 5, 'test', 4, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(5, 3, 'test', 1, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(6, 5, 'test', 10, 5, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(7, 4, 'test', 9, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(8, 5, 'test', 10, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(9, 5, 'test', 11, 5, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(10, 5, 'test', 5, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48'),
(11, 5, 'test', 5, 3, '2025-05-17 15:04:48', '2025-05-17 15:04:48');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail` FOREIGN KEY (`id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
