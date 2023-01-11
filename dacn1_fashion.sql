-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2022 lúc 05:15 PM
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
-- Cơ sở dữ liệu: `dacn1_fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `idAccount` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`idAccount`, `idUser`, `email`, `password`) VALUES
(1, 1, 'tin@gmail.com', '12345'),
(2, 2, 'mailinh@gmail.com', '12345'),
(3, 3, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `idBanner` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`idBanner`, `image`, `active`) VALUES
(16, 'banner1.jpg', 1),
(17, 'image1.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `idBrand` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `brandDesc` text NOT NULL,
  `brandLogo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`idBrand`, `brandName`, `brandDesc`, `brandLogo`) VALUES
(1, 'Gucci', 'Thương hiệu nổi tiếng thế giới', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKy6uko-_sWcKWBDbGKjqBUurXks2NeVduSS2kuwOW&s'),
(8, 'Chanel', 'Thương hiệu nổi tiếng thế giới', 'https://cdn.elly.vn/uploads/2021/01/06205934/y-nghia-logo-thuong-hieu-chanel.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categoryproduct`
--

CREATE TABLE `categoryproduct` (
  `idCategoryProduct` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryImage` varchar(255) NOT NULL,
  `categoryDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categoryproduct`
--

INSERT INTO `categoryproduct` (`idCategoryProduct`, `categoryName`, `categoryImage`, `categoryDesc`) VALUES
(50, 'Đồ nam', 'SanPham_Nam.jpg', 'Thời trang cho nam'),
(51, 'Đồ nữ', 'SanPham_Nu.jpg', 'Thời trang cho nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`idcolor`, `color`) VALUES
(1, 'red'),
(2, 'green'),
(3, 'yellow'),
(13, 'white');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`idComment`, `idProduct`, `idUser`, `content`) VALUES
(15, 1, 2, 'l');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `divisionuser`
--

CREATE TABLE `divisionuser` (
  `idDivision` int(11) NOT NULL,
  `divisionName` varchar(255) NOT NULL,
  `divisionDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `divisionuser`
--

INSERT INTO `divisionuser` (`idDivision`, `divisionName`, `divisionDescription`) VALUES
(1, 'Customer', 'quyền truy cập của khách hàng'),
(2, 'Admin', 'Quyền truy cập của quản trị viên - có thể truy cập trang quản lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `idImg` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isMain` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`idImg`, `idProduct`, `image`, `isMain`) VALUES
(58, 95, 'Áo Len - Cardigan - V Neck - Cài Khuy - Dài Tay.jpg', 1),
(59, 94, 'Áo thun nam nữ cao cấp Gucci Like Auth.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `layout`
--

CREATE TABLE `layout` (
  `id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `mail_1` varchar(255) NOT NULL,
  `mail_2` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `donvi` varchar(255) NOT NULL,
  `phone_1` double NOT NULL,
  `phone_2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `layout`
--

INSERT INTO `layout` (`id`, `time`, `mail_1`, `mail_2`, `diachi`, `donvi`, `phone_1`, `phone_2`) VALUES
(1, '24/7', '19it4@gmail.com', 'vku@vku.udn.vn', 'Làng Đại học, Đà Nẵng', 'Khoa Công Nghệ Thông Tin & Truyền Thông - Đại Học Đà Nẵng VKU', 787700624, 123456789);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `idOrderDetails` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `quantityOrder` int(11) NOT NULL,
  `discount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`idOrderDetails`, `idProduct`, `idOrder`, `quantityOrder`, `discount`) VALUES
(38, 95, 38, 3, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateDelivery` varchar(50) NOT NULL,
  `dateOrder` varchar(50) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`idOrder`, `idUser`, `dateDelivery`, `dateOrder`, `status`) VALUES
(38, 3, '03/12/2022', '03/12/2022', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `idCategoryProduct` int(11) NOT NULL,
  `idBrand` int(11) NOT NULL,
  `idQuantity` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productUnitPrice` varchar(255) NOT NULL,
  `dateIn` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productSold` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idProduct`, `idCategoryProduct`, `idBrand`, `idQuantity`, `productName`, `productUnitPrice`, `dateIn`, `productDescription`, `productSold`) VALUES
(94, 51, 1, 22, 'Áo sơ mi Thả vai Uốn nếp Eo Không có thắt lưng', '150000', '2022/11/9', 'Giày da bò đẹp bền', 10),
(95, 50, 1, 23, 'Áo Len - Cardigan - V Neck - Cài Khuy - Dài Tay', '600000', '2022/11/8', 'Áo Len - Cardigan - V Neck - Cài Khuy - Dài Tay', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantity`
--

CREATE TABLE `quantity` (
  `idQuantity` int(11) NOT NULL,
  `idColor` int(11) NOT NULL,
  `idSize` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quantity`
--

INSERT INTO `quantity` (`idQuantity`, `idColor`, `idSize`, `quantity`) VALUES
(22, 13, 2, 20000),
(23, 13, 2, 20000),
(25, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `idsize` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`idsize`, `size`) VALUES
(1, 30),
(2, 32),
(3, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `idDivision` int(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `idDivision`, `lastName`, `firstName`, `address`, `sex`, `phone`) VALUES
(1, 1, 'Ngô', 'Tin', 'Đà Nẵng', 'male', '0787700624'),
(2, 1, 'Linh', 'Mai', 'Đà Nẵng', 'male', '0787700624'),
(3, 2, 'admin', 'admin ', 'Đà Nẵng', 'male', '1234567890');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idAccount`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idBrand`);

--
-- Chỉ mục cho bảng `categoryproduct`
--
ALTER TABLE `categoryproduct`
  ADD PRIMARY KEY (`idCategoryProduct`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`);

--
-- Chỉ mục cho bảng `divisionuser`
--
ALTER TABLE `divisionuser`
  ADD PRIMARY KEY (`idDivision`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImg`);

--
-- Chỉ mục cho bảng `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`idOrderDetails`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`);

--
-- Chỉ mục cho bảng `quantity`
--
ALTER TABLE `quantity`
  ADD PRIMARY KEY (`idQuantity`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idsize`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `idAccount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `idBrand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categoryproduct`
--
ALTER TABLE `categoryproduct`
  MODIFY `idCategoryProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `divisionuser`
--
ALTER TABLE `divisionuser`
  MODIFY `idDivision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `idImg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `idOrderDetails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `quantity`
--
ALTER TABLE `quantity`
  MODIFY `idQuantity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `idsize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `division_user` FOREIGN KEY (`idDivision`) REFERENCES `divisionuser` (`idDivision`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
