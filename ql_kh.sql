-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2022 lúc 05:13 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_kh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `MaGD` varchar(60) NOT NULL,
  `MaHD` varchar(60) NOT NULL,
  `MaNV` varchar(60) NOT NULL,
  `NgayGD` date NOT NULL,
  `NoiDungGD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `MaHD` varchar(60) NOT NULL,
  `TenHD` varchar(255) NOT NULL,
  `MaKH` varchar(60) NOT NULL,
  `MaNV` varchar(60) NOT NULL,
  `NoiDungHD` varchar(255) NOT NULL,
  `TinhTrangHD` varchar(60) NOT NULL,
  `NgayKi` date NOT NULL,
  `NgayKT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hopdong`
--

INSERT INTO `hopdong` (`MaHD`, `TenHD`, `MaKH`, `MaNV`, `NoiDungHD`, `TinhTrangHD`, `NgayKi`, `NgayKT`) VALUES
('HD001', 'Hợp đồng 1', '17D190122', 'NV001', '...', 'Đã kí', '2022-12-09', '2022-12-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(50) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `QuyMoDN` varchar(50) NOT NULL,
  `LinhVucKD` varchar(50) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `QuyMoDN`, `LinhVucKD`, `DiaChi`, `SDT`, `Email`) VALUES
('17D190122', 'Le Thi Lua', 'Lớn', 'Điện tử', 'HCM', '09123456', 'a3240@yahoo.com'),
('17D190123', 'Do Tu Le', 'Lớn', 'Ngân hàng', 'Hoàng Hoa Thám', '012345678', 'a3242@yahoo.com'),
('18D190123', 'Chu Thi Hoa', 'Lớn', 'Điện tử', 'Hà Nội', '012345678', 'a1234@gmail.com'),
('18D190125', 'Nguyen Van A', 'Lớn 123', 'Điện tử', 'HCM', '09123456', 'b3248@yahoo.com'),
('18D190187', 'Nguyen Van B', 'Lớn', 'Ngân hàng', 'HCM', '012345678', 'b3249@yahoo.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(60) NOT NULL,
  `TenNV` varchar(255) NOT NULL,
  `ChucVu` varchar(60) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `ChucVu`, `DiaChi`, `SDT`) VALUES
('NV001', 'Nguyễn Quang Minh', 'Nhân Viên', 'Đông Anh', 123456789);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoandn`
--

CREATE TABLE `taikhoandn` (
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MaNV` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoandn`
--

INSERT INTO `taikhoandn` (`Username`, `Password`, `MaNV`) VALUES
('minhthoi8386', '123456', 'NV001');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`MaGD`),
  ADD KEY `FK_MaHD_GD` (`MaHD`),
  ADD KEY `FK_MaNV_GD` (`MaNV`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_MaKH_HD` (`MaKH`),
  ADD KEY `FK_MaNV_HD` (`MaNV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `taikhoandn`
--
ALTER TABLE `taikhoandn`
  ADD KEY `FK_MaNV_TKDN` (`MaNV`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD CONSTRAINT `FK_MaHD_GD` FOREIGN KEY (`MaHD`) REFERENCES `hopdong` (`MaHD`),
  ADD CONSTRAINT `FK_MaNV_GD` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `FK_MaKH_HD` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `FK_MaNV_HD` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `taikhoandn`
--
ALTER TABLE `taikhoandn`
  ADD CONSTRAINT `FK_MaNV_TKDN` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
