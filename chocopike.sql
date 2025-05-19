-- CREATE DATABASE IF NOT EXISTS `chocopike`;
-- USE `chocopike`;


-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- CREATE TABLE `account` (
--   `id` int NOT NULL,
--   `fname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `lname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `remember_token` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
--   `province` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `role` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'customer',
--   `status` tinyint(1) DEFAULT '1' COMMENT '1 là ok, 0 bị khóa',
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `account`
-- --

-- INSERT INTO `account` (`id`, `fname`, `lname`, `email`, `phone`, `password`, `remember_token`, `province`, `address`, `role`, `status`, `created_at`, `updated_at`) VALUES
-- (1, 'Pham', 'Dinh', 'duiga2611@gmail.com', '0987654325', '202cb962ac59075b964b07152d234b70', NULL, 'Hồ Chí Minh', '', 'customer', 1, '2025-05-12', '2025-05-12'),
-- (2, 'Tuấn Nguyên', 'Đậu', 'admin2@gmail.com', '0987654321', '202cb962ac59075b964b07152d234b70', NULL, 'Hồ Chí Minh', '', 'admin', 1, '2025-05-12', '2025-05-12'),
-- (3, 'Quốc Trọng', 'Lê', 'admin@gmail.com', '0987654322', '202cb962ac59075b964b07152d234b70', '', 'Hồ Chí Minh', '', 'admin', 1, '2025-05-12', '2025-05-12'),
-- (5, 'Duong', 'Dinh', 'nvh@example.com', '0987654323', '202cb962ac59075b964b07152d234b70', NULL, 'Hồ Chí Minh', '', 'customer', 1, '2025-05-12', '2025-05-12'),
-- (6, 'Duiga', 'duiga', 'duigax2@example.com', '0987654324', '202cb962ac59075b964b07152d234b70', NULL, 'Hồ Chí Minh', '', 'customer', 1, '2025-05-12', '2025-05-12');

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `banner`
-- --

-- CREATE TABLE `banner` (
--   `id` int NOT NULL,
--   `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `site` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'home',
--   `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
--   `priority` tinyint DEFAULT '1',
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `banner`
-- --

-- INSERT INTO `banner` (`id`, `name`, `image`, `site`, `description`, `status`, `priority`, `created_at`, `updated_at`) VALUES

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `blog`
-- --

-- CREATE TABLE `blog` (
--   `id` int NOT NULL,
--   `title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `summary` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
--   `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
--   `account_id` int NOT NULL,
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `category`
-- --

-- CREATE TABLE `category` (
--   `id` int NOT NULL,
--   `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
--   `priority` tinyint DEFAULT '1',
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `category`
-- --

-- INSERT INTO `category` (`id`, `name`, `status`, `priority`, `created_at`, `updated_at`) VALUES
-- (1, 'Bánh mì', 1, 1, '2025-05-12', '2025-05-12'),
-- (2, 'Bánh ngọt', 1, 1, '2025-05-12', '2025-05-12'),
-- (3, 'Bánh pudding', 1, 3, '2025-05-12', '2025-05-12'),
-- (4, 'Nguyên liệu làm bánh', 1, 1, '2025-05-12', '2025-05-12'),
-- (15, 'Bánh bông lan', 1, 1, '2025-05-12', '2025-05-12');

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `comment`
-- --

-- CREATE TABLE `comment` (
--   `id` int NOT NULL,
--   `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `email` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
--   `blog_id` int NOT NULL,
--   `account_id` int NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `contact`
-- --

-- CREATE TABLE `contact` (
--   `id` int NOT NULL,
--   `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
--   `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `email` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `contact`
-- --

-- INSERT INTO `contact` (`id`, `message`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
-- (1, 'Tôi muốn đặt trước dịch vụ tiệc của bạn.', 'Đậu Tuấn Nguyên', 'admin@gmail.com', '0123456598', '2025-05-12', '2025-05-12'),
-- (2, 'Tôi muốn đặt một chiếc bánh sinh nhật cho con gái của tôi.', 'Lê Quốc Trọng', 'admin1@gmail.com', '0987654321', '2025-05-12', '2025-05-12');

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `coupon`
-- --

-- CREATE TABLE `coupon` (
--   `id` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `coupon_value` float(9,3) NOT NULL DEFAULT '0.000',
--   `used_times` mediumint UNSIGNED NOT NULL,
--   `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 is active, 0 is expired',
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `coupon`
-- --

-- INSERT INTO `coupon` (`id`, `coupon_value`, `used_times`, `status`, `created_at`, `updated_at`) VALUES
-- ('BEAUTIFUL', 0.100, 100, 1, '2025-05-12', '2025-05-12'),
-- ('HAPPYTIME', 0.250, 100, 1, '2025-05-12', '2025-05-12'),
-- ('PHUC', 0.200, 199, 1, '2025-05-12', '2025-05-12'),
-- ('WELCOME', 0.300, 96, 1, '2025-05-12', '2025-05-12');

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `order`
-- --

-- CREATE TABLE `order` (
--   `id` int NOT NULL,
--   `fname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `lname` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `province` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
--   `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
--   `delivery` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `payment` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `status` tinyint(1) DEFAULT '1' COMMENT '1 là pending, 0 delivered,2 la delivering, 3 la canceled',
--   `account_id` int NOT NULL,
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL,
--   `coupon` float(9,3) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `order`
-- --

-- INSERT INTO `order` (`id`, `fname`, `lname`, `email`, `phone`, `province`, `address`, `note`, `delivery`, `payment`, `status`, `account_id`, `created_at`, `updated_at`, `coupon`) VALUES

-- (22, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', '', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', NULL),
-- (23, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'test', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', NULL),
-- (28, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'wsfeasgsrbsfhb', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', NULL),
-- (29, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', '', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', NULL),
-- (30, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'fhfnndgxm', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', NULL),
-- (31, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'tyuyfugvkigblhl', 'Giaohangtietkiem', 'Cash on delivery', 2, 3, '2025-05-12', '2025-05-12', NULL),
-- (35, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', '', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', 0.300),
-- (36, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', '', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', 0.300),
-- (37, 'Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'deliver soon please', 'Giaohangnhanh', 'Cash on delivery', 1, 3, '2025-05-12', '2025-05-12', 0.300);

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `order_detail`
-- --

-- CREATE TABLE `order_detail` (
--   `order_id` int NOT NULL,
--   `product_id` int NOT NULL,
--   `quantity` int NOT NULL,
--   `price` float NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `order_detail`
-- --

-- INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
-- (1, 8, 1, 6),
-- (2, 3, 1, 5),
-- (3, 3, 1, 5),
-- (4, 8, 1, 6),
-- (5, 5, 1, 15),
-- (6, 8, 2, 12),
-- (6, 7, 2, 14),
-- (7, 5, 2, 30),
-- (7, 8, 1, 6),
-- (8, 7, 1, 7),
-- (8, 5, 1, 15),
-- (9, 8, 1, 6),
-- (10, 3, 1, 5),
-- (10, 4, 15, 525),
-- (11, 8, 1, 6),
-- (11, 4, 1, 35),
-- (12, 4, 1, 35),
-- (12, 6, 1, 6),
-- (12, 7, 1, 7),
-- (12, 8, 1, 6),
-- (12, 5, 1, 15),
-- (12, 1, 1, 20),
-- (12, 2, 1, 15),
-- (12, 3, 1, 5),
-- (13, 1, 10, 200),
-- (14, 8, 22, 132),
-- (14, 5, 3, 45),
-- (14, 6, 1, 6),
-- (15, 8, 1, 6),
-- (15, 5, 1, 15),
-- (20, 4, 3, 105),
-- (21, 2, 10, 150),
-- (22, 5, 3, 45),
-- (22, 4, 2, 64),
-- (23, 5, 9, 90),
-- (12, 8, 1, 2),
-- (12, 9, 1, 20),
-- (30, 10, 1, 6),
-- (30, 7, 1, 6),
-- (31, 7, 10, 60),
-- (32, 10, 3, 18),
-- (33, 9, 1, 20),
-- (34, 11, 8, 23.2),
-- (34, 8, 3, 6),
-- (34, 10, 5, 30),
-- (34, 9, 2, 40),
-- (34, 5, 5, 70),
-- (35, 11, 1, 2.9),
-- (35, 3, 1, 4),
-- (35, 9, 2, 40),
-- (35, 5, 2, 28),
-- (36, 9, 7, 140),
-- (37, 9, 5, 100),
-- (37, 5, 4, 56),
-- (38, 11, 1, 2.9);

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `product`
-- --

-- CREATE TABLE `product` (
--   `id` int NOT NULL,
--   `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `image` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `price` float(9,3) NOT NULL,
--   `sale_price` float(9,3) DEFAULT '0.000',
--   `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
--   `origin` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
--   `quantity` int NOT NULL DEFAULT '1',
--   `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
--   `category_id` int NOT NULL,
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `product`
-- --

-- INSERT INTO `product` (`id`, `name`, `image`, `price`, `sale_price`, `description`, `origin`, `quantity`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
-- (1, 'Bánh mì Pháp', 'bmphapp.png', 20.000, 15.000, 'Được nướng tươi mỗi ngày!', 'vn', 2, 1, 1, '2025-05-12', '2025-05-12'),
-- (2, 'Bánh pudding Sô cô la', 'puddingscl.png', 15.000, 15.000, 'Đậm đà hương vị với kết cấu mượt mà của sô-cô-la!', 'usa', 1, 1, 3, '2025-05-12', '2025-05-12'),
-- (3, 'Bánh mì nâu', 'banhminau.png', 5.000, 4.000, 'Lành mạnh cho những người đang ăn kiêng!', 'usa', 1, 1, 1, '2025-05-12', '2025-05-12'),
-- (4, 'Bánh dâu tây', 'strawberry.png', 35.000, 32.000, 'Bánh bông lan mềm mịn, thơm phức, kèm theo lớp kem vani béo ngậy và dâu tây tươi ngon.', 'vn', 5, 1, 2, '2025-05-12', '2025-05-12'),
-- (5, 'Bánh Pavlova', 'pavlovaa.png', 15.000, 14.000, 'Bánh truyền thống của Úc với lớp meringue giòn tan.', 'vn', 2, 1, 2, '2025-05-12', '2025-05-12'),
-- (6, 'Bột mì', 'botmi.png', 6.000, 0.000, 'Bột mì làm cho bánh của bạn trở nên mềm mịn và thơm ngon!!!', 'usa', 20, 1, 4, '2025-05-12', '2025-05-12'),
-- (7, 'Bột lúa mạch đen', 'botluamach.png', 7.000, 6.000, 'Thỏa mãn vị giác của bạn với kết cấu và hương vị độc đáo.', 'usa', 14, 1, 4, '2025-05-12', '2025-05-12'),
-- (8, 'Bánh mì nướng Pháp', 'bmnuong.png', 6.000, 2.000, 'Vỏ giòn tan - người bạn đồng hành tuyệt vời cho một tô súp nóng hổi.', 'vn', 87, 1, 1, '2025-05-12', '2025-05-12'),
-- (9, 'Bánh việt quất', 'vietquat.png', 20.000, 0.000, 'Nhân việt quất thơm ngon được phủ lớp kem bơ béo ngậy.', 'vn', 15, 1, 2, '2025-05-12', '2025-05-12'),
-- (10, 'Bánh cupcake matcha', 'matcha.png', 6.000, 0.000, 'Chiếc cupcake này đầy hương vị matcha!! Sẵn sàng để thưởng thức.', 'vn', 20, 1, 15, '2025-05-12', '2025-05-12'),
-- (11, 'Bánh mì cà phê', 'offerr.png', 8.750, 2.900, 'Kích thích vị giác của bạn với hương cà phê thơm lừng và vị đậm đà mạnh mẽ.', 'usa', 100, 1, 1, '2025-05-12', '2025-05-12');

-- -- --------------------------------------------------------

-- --
-- -- Cấu trúc bảng cho bảng `review`
-- --

-- CREATE TABLE `review` (
--   `id` int NOT NULL,
--   `rating` tinyint DEFAULT '5',
--   `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
--   `product_id` int NOT NULL,
--   `account_id` int NOT NULL,
--   `created_at` date DEFAULT NULL,
--   `updated_at` date DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --
-- -- Đang đổ dữ liệu cho bảng `review`
-- --

-- INSERT INTO `review` (`id`, `rating`, `content`, `product_id`, `account_id`, `created_at`, `updated_at`) VALUES
-- (2, 5, 'Ngon', 7, 1, '2025-05-12', '2025-05-12'),
-- (8, 3, 'tst', 1, 1, '2025-05-12', '2025-05-12'),
-- (10, 4, 'test', 6, 1, '2025-05-12', '2025-05-12'),
-- (11, 5, 'test', 4, 8, '2025-05-12', '2025-05-12'),
-- (12, 3, 'test', 1, 8, '2025-05-12', '2025-05-12'),
-- (17, 5, 'test', 10, 9, '2025-05-12', '2025-05-12'),
-- (23, 4, 'test', 9, 3, '2025-05-12', '2025-05-12'),
-- (25, 5, 'test', 10, 3, '2025-05-12', '2025-05-12'),
-- (28, 5, 'test', 11, 9, '2025-05-12', '2025-05-12'),
-- (29, 5, 'test', 5, 3, '2025-05-12', '2025-05-12'),
-- (30, 5, 'test', 5, 3, '2025-05-12', '2025-05-12');

-- --
-- -- Chỉ mục cho các bảng đã đổ
-- --

-- --
-- -- Chỉ mục cho bảng `account`
-- --
-- ALTER TABLE `account`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `email` (`email`),
--   ADD UNIQUE KEY `phone` (`phone`);

-- --
-- -- Chỉ mục cho bảng `banner`
-- --
-- ALTER TABLE `banner`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Chỉ mục cho bảng `blog`
-- --
-- ALTER TABLE `blog`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `account_id` (`account_id`);

-- --
-- -- Chỉ mục cho bảng `category`
-- --
-- ALTER TABLE `category`
--   ADD PRIMARY KEY (`id`),
--   ADD UNIQUE KEY `name` (`name`);

-- --
-- -- Chỉ mục cho bảng `comment`
-- --
-- ALTER TABLE `comment`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `blog_id` (`blog_id`),
--   ADD KEY `account_id` (`account_id`);

-- --
-- -- Chỉ mục cho bảng `contact`
-- --
-- ALTER TABLE `contact`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Chỉ mục cho bảng `coupon`
-- --
-- ALTER TABLE `coupon`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- Chỉ mục cho bảng `order`
-- --
-- ALTER TABLE `order`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `account_id` (`account_id`);

-- --
-- -- Chỉ mục cho bảng `order_detail`
-- --
-- ALTER TABLE `order_detail`
--   ADD KEY `order_id` (`order_id`),
--   ADD KEY `product_id` (`product_id`);

-- --
-- -- Chỉ mục cho bảng `product`
-- --
-- ALTER TABLE `product`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `category_id` (`category_id`);

-- --
-- -- Chỉ mục cho bảng `review`
-- --
-- ALTER TABLE `review`
--   ADD PRIMARY KEY (`id`),
--   ADD KEY `product_id` (`product_id`),
--   ADD KEY `review_ibfk_2` (`account_id`);

-- --
-- -- AUTO_INCREMENT cho các bảng đã đổ
-- --

-- --
-- -- AUTO_INCREMENT cho bảng `account`
-- --
-- ALTER TABLE `account`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- --
-- -- AUTO_INCREMENT cho bảng `banner`
-- --
-- ALTER TABLE `banner`banner
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

-- --
-- -- AUTO_INCREMENT cho bảng `blog`
-- --
-- ALTER TABLE `blog`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT cho bảng `category`
-- --
-- ALTER TABLE `category`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

-- --
-- -- AUTO_INCREMENT cho bảng `comment`
-- --
-- ALTER TABLE `comment`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT;

-- --
-- -- AUTO_INCREMENT cho bảng `contact`
-- --
-- ALTER TABLE `contact`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- --
-- -- AUTO_INCREMENT cho bảng `order`
-- --
-- ALTER TABLE `order`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

-- --
-- -- AUTO_INCREMENT cho bảng `product`
-- --
-- ALTER TABLE `product`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

-- --
-- -- AUTO_INCREMENT cho bảng `review`
-- --
-- ALTER TABLE `review`
--   MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- banner






-- Tạo database
CREATE DATABASE IF NOT EXISTS `chocopike`;
USE `chocopike`;

-- Cấu hình SQL
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- 1. Tạo bảng account (bảng không phụ thuộc)
CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(150) DEFAULT NULL,
  `province` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'customer',
  `status` tinyint(1) DEFAULT '1' COMMENT '1 là hoạt động, 0 bị khóa',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Tạo bảng category (bảng không phụ thuộc)
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
  `priority` tinyint DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Tạo bảng banner (bảng không phụ thuộc)
CREATE TABLE `banner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `site` varchar(255) DEFAULT 'home',
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
  `priority` tinyint DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 4. Tạo bảng product (phụ thuộc vào category)
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `sale_price` decimal(10,3) DEFAULT '0.000',
  `description` text,
  `origin` varchar(100) NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
  `category_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Tạo bảng blog (phụ thuộc vào account)
CREATE TABLE `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT '1' COMMENT '1 là hiển thị, 0 ẩn',
  `account_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 6. Tạo bảng order (phụ thuộc vào account)
CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `province` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text,
  `delivery` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '1=pending, 0=delivered, 2=delivering, 3=canceled',
  `account_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `coupon` decimal(5,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 7. Tạo bảng order_detail (phụ thuộc vào order và product)
CREATE TABLE `order_detail` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Tạo bảng comment (phụ thuộc vào blog và account)
CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `content` text,
  `blog_id` int NOT NULL,
  `account_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 9. Tạo bảng contact (bảng không phụ thuộc)
CREATE TABLE `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Tạo bảng coupon (bảng không phụ thuộc)
CREATE TABLE `coupon` (
  `id` varchar(100) NOT NULL,
  `coupon_value` decimal(5,3) NOT NULL DEFAULT '0.000',
  `used_times` mediumint UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=active, 0=expired',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 11. Tạo bảng review (phụ thuộc vào product và account)
CREATE TABLE `review` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` tinyint DEFAULT '5',
  `content` text,
  `product_id` int NOT NULL,
  `account_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Thêm dữ liệu mẫu
-- 1. Thêm dữ liệu account
INSERT INTO `account` (`fname`, `lname`, `email`, `phone`, `password`, `province`, `role`) VALUES
('Pham', 'Dinh', 'duiga2611@gmail.com', '0987654325', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hồ Chí Minh', 'customer'),
('Tuấn Nguyên', 'Đậu', 'admin2@gmail.com', '0987654321', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hồ Chí Minh', 'admin'),
('Quốc Trọng', 'Lê', 'admin@gmail.com', '0987654322', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hồ Chí Minh', 'admin'),
('Duong', 'Dinh', 'nvh@example.com', '0987654323', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hồ Chí Minh', 'customer'),
('Duiga', 'duiga', 'duigax2@example.com', '0987654324', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hồ Chí Minh', 'customer');

-- 2. Thêm dữ liệu category
INSERT INTO `category` (`name`, `priority`) VALUES
('Bánh mì', 1),
('Bánh ngọt', 1),
('Bánh pudding', 3),
('Nguyên liệu làm bánh', 1),
('Bánh bông lan', 1);

-- 3. Thêm dữ liệu banner
INSERT INTO `banner` (`name`, `image`, `description`) VALUES
('Banner chính', 'banner1.jpg', 'Banner giới thiệu sản phẩm mới'),
('Banner khuyến mãi', 'banner2.jpg', 'Banner chương trình khuyến mãi');

-- 4. Thêm dữ liệu product
INSERT INTO `product` (`name`, `image`, `price`, `sale_price`, `description`, `origin`, `quantity`, `category_id`) VALUES
('Bánh mì Pháp', 'bmphapp.png', 20.000, 15.000, 'Được nướng tươi mỗi ngày!', 'vn', 2, 1),
('Bánh pudding Sô cô la', 'puddingscl.png', 15.000, 15.000, 'Đậm đà hương vị với kết cấu mượt mà của sô-cô-la!', 'usa', 1, 3),
('Bánh mì nâu', 'banhminau.png', 5.000, 4.000, 'Lành mạnh cho những người đang ăn kiêng!', 'usa', 1, 1),
('Bánh dâu tây', 'strawberry.png', 35.000, 32.000, 'Bánh bông lan mềm mịn, thơm phức, kèm theo lớp kem vani béo ngậy và dâu tây tươi ngon.', 'vn', 5, 2),
('Bánh Pavlova', 'pavlovaa.png', 15.000, 14.000, 'Bánh truyền thống của Úc với lớp meringue giòn tan.', 'vn', 2, 2),
('Bột mì', 'botmi.png', 6.000, 0.000, 'Bột mì làm cho bánh của bạn trở nên mềm mịn và thơm ngon!!!', 'usa', 20, 4),
('Bột lúa mạch đen', 'botluamach.png', 7.000, 6.000, 'Thỏa mãn vị giác của bạn với kết cấu và hương vị độc đáo.', 'usa', 14, 4),
('Bánh mì nướng Pháp', 'bmnuong.png', 6.000, 2.000, 'Vỏ giòn tan - người bạn đồng hành tuyệt vời cho một tô súp nóng hổi.', 'vn', 87, 1),
('Bánh việt quất', 'vietquat.png', 20.000, 0.000, 'Nhân việt quất thơm ngon được phủ lớp kem bơ béo ngậy.', 'vn', 15, 2),
('Bánh cupcake matcha', 'matcha.png', 6.000, 0.000, 'Chiếc cupcake này đầy hương vị matcha!! Sẵn sàng để thưởng thức.', 'vn', 20, 5),
('Bánh mì cà phê', 'offerr.png', 8.750, 2.900, 'Kích thích vị giác của bạn với hương cà phê thơm lừng và vị đậm đà mạnh mẽ.', 'usa', 100, 1);

-- 5. Thêm dữ liệu order
INSERT INTO `order` (`fname`, `lname`, `email`, `phone`, `province`, `address`, `delivery`, `payment`, `status`, `account_id`, `coupon`) VALUES
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, NULL),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, NULL),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, NULL),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, NULL),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, NULL),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 2, 3, NULL),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, 0.300),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangtietkiem', 'Cash on delivery', 1, 3, 0.300),
('Tuấn Nguyên', 'Đậu', 'admin@gmail.com', '0946532675', 'Hồ Chí Minh', 'Quận 1', 'Giaohangnhanh', 'Cash on delivery', 1, 3, 0.300);

-- 6. Thêm dữ liệu order_detail
INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 8, 1, 6.00),
(2, 3, 1, 5.00),
(3, 3, 1, 5.00),
(4, 8, 1, 6.00),
(5, 5, 1, 15.00),
(6, 8, 2, 12.00),
(6, 7, 2, 14.00),
(7, 5, 2, 30.00),
(7, 8, 1, 6.00),
(8, 7, 1, 7.00),
(8, 5, 1, 15.00),
(9, 8, 1, 6.00);

-- 7. Thêm dữ liệu coupon
INSERT INTO `coupon` (`id`, `coupon_value`, `used_times`) VALUES
('BEAUTIFUL', 0.100, 100),
('HAPPYTIME', 0.250, 100),
('PHUC', 0.200, 199),
('WELCOME', 0.300, 96);

-- 8. Thêm dữ liệu contact
INSERT INTO `contact` (`message`, `name`, `email`, `phone`) VALUES
('Tôi muốn đặt trước dịch vụ tiệc của bạn.', 'Đậu Tuấn Nguyên', 'admin@gmail.com', '0123456598'),
('Tôi muốn đặt một chiếc bánh sinh nhật cho con gái của tôi.', 'Lê Quốc Trọng', 'admin1@gmail.com', '0987654321');

-- 9. Thêm dữ liệu review
INSERT INTO `review` (`rating`, `content`, `product_id`, `account_id`) VALUES
(5, 'Ngon', 7, 1),
(3, 'tst', 1, 1),
(4, 'test', 6, 1),
(5, 'test', 4, 3),
(3, 'test', 1, 3),
(5, 'test', 10, 5),
(4, 'test', 9, 3),
(5, 'test', 10, 3),
(5, 'test', 11, 5),
(5, 'test', 5, 3),
(5, 'test', 5, 3);

-- Thêm các ràng buộc khóa ngoại
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE;

COMMIT;