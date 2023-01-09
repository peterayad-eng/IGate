-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2023 at 10:32 AM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12449460_igate`
--

-- --------------------------------------------------------

--
-- Table structure for table `anonymous`
--

CREATE TABLE `anonymous` (
  `id` int(11) NOT NULL,
  `anattempt` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anonymous`
--

INSERT INTO `anonymous` (`id`, `anattempt`, `timestamp`) VALUES
(1, 5, '2020-04-02 09:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` text NOT NULL,
  `brand_ar` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `brand_ar`, `value`) VALUES
(1, 'Dell', 'ديل', 'Dell'),
(2, 'HP', 'اتش بي', 'HP'),
(3, 'Lenovo', 'لينوفو', 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `imagePath` text NOT NULL,
  `caption` text NOT NULL,
  `caption_ar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `imagePath`, `caption`, `caption_ar`) VALUES
(1, 'website.jpg', 'Deal of the day 1', 'عرض اليوم'),
(2, 'web1.png', 'Deal of the day 2', 'عرض اليوم'),
(3, 'web.jpg', 'Deal of the day 3', 'عرض اليوم');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` text NOT NULL,
  `category_ar` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `category_ar`, `value`) VALUES
(1, 'Desktop', 'كمبيوتر', 'desktop'),
(2, 'Server', 'سيرفر', 'server'),
(3, 'Laptop', 'لاب توب', 'laptop'),
(4, 'Monitor', 'شاشة', 'monitor'),
(5, 'Accessories', 'اكسسوارات', 'acc'),
(6, 'Printer', 'طابعة', 'printer'),
(7, 'Network', 'شبكات', 'network');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `processorslist`
--

CREATE TABLE `processorslist` (
  `id` int(11) NOT NULL,
  `series` text NOT NULL,
  `series_ar` text NOT NULL,
  `value` text NOT NULL,
  `type` text NOT NULL,
  `type_ar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processorslist`
--

INSERT INTO `processorslist` (`id`, `series`, `series_ar`, `value`, `type`, `type_ar`) VALUES
(1, 'Core i9', 'كور اي 9', 'corei9', 'Intel', 'انتل'),
(2, 'Core i7', 'كور اي 7', 'corei7', 'Intel', 'انتل'),
(3, 'Core i5', 'كور اي 5', 'corei5', 'Intel', 'انتل'),
(4, 'Core i3', 'كور اي 3', 'corei3', 'Intel', 'انتل'),
(5, 'Xeon', 'زيون', 'xeon', 'Intel', 'انتل'),
(6, 'Core2Quad', 'كواد كور', 'core2quad', 'Intel', 'انتل'),
(7, 'Core2Duo', 'كور تو ديو', 'core2duo', 'Intel', 'انتل'),
(8, 'Dual-Core', 'دوال كور', 'dualcore', 'Intel', 'انتل'),
(9, 'Pentium', 'بنتيوم', 'pentium', 'Intel', 'انتل'),
(10, 'Ryzen 9', 'ريزون 9', 'ryzen9', 'AMD', 'ايه ام دى'),
(11, 'Ryzen 7', 'ريزون 7', 'ryzen7', 'AMD', 'ايه ام دى'),
(12, 'Ryzen 5', 'ريزون 5', 'ryzen5', 'AMD', 'ايه ام دى'),
(13, 'Ryzen 3', 'ريزون 3', 'ryzen3', 'AMD', 'ايه ام دى'),
(14, 'Ryzen Threaddripper', 'ريزون ثريد دريبر', 'threaddripper', 'AMD', 'ايه ام دى'),
(15, 'FX', 'اف اكس', 'fx', 'AMD', 'ايه ام دى'),
(16, 'A12', 'ايه 12', 'a12', 'AMD', 'ايه ام دى'),
(17, 'A10', 'ايه 10', 'a10', 'AMD', 'ايه ام دى'),
(18, 'A9', 'ايه 9', 'a9', 'AMD', 'ايه ام دى'),
(19, 'A8', 'ايه 8', 'a8', 'AMD', 'ايه ام دى'),
(20, 'A6', 'ايه 6', 'a6', 'AMD', 'ايه ام دى'),
(21, 'A4', 'ايه 4', 'a4', 'AMD', 'ايه ام دى'),
(22, 'Athlon', 'اثلون', 'athlon', 'AMD', 'ايه ام دى'),
(23, 'E2', 'اي 2', 'e2', 'AMD', 'ايه ام دى');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `title_ar` text NOT NULL,
  `category` text NOT NULL,
  `brand` text NOT NULL,
  `primaryimage` text NOT NULL,
  `secimages` text NOT NULL,
  `pseries` text NOT NULL,
  `pmodel` text NOT NULL,
  `pcache` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `ramtype` int(11) NOT NULL,
  `hard` text NOT NULL,
  `sechard` text NOT NULL,
  `vgatype` text NOT NULL,
  `vgamodel` text NOT NULL,
  `exvgatype` text NOT NULL,
  `exvgamodel` text NOT NULL,
  `display` text NOT NULL,
  `resolution` text NOT NULL,
  `ethernet` text NOT NULL,
  `wifi` text NOT NULL,
  `usb2` int(11) NOT NULL,
  `usb3` int(11) NOT NULL,
  `usbc` int(11) NOT NULL,
  `hdmi` text NOT NULL,
  `speed` int(11) NOT NULL,
  `papersize` text NOT NULL,
  `description` text NOT NULL,
  `description_ar` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `title_ar`, `category`, `brand`, `primaryimage`, `secimages`, `pseries`, `pmodel`, `pcache`, `ram`, `ramtype`, `hard`, `sechard`, `vgatype`, `vgamodel`, `exvgatype`, `exvgamodel`, `display`, `resolution`, `ethernet`, `wifi`, `usb2`, `usb3`, `usbc`, `hdmi`, `speed`, `papersize`, `description`, `description_ar`, `price`) VALUES
(1, 'Optiplex 780', 'اوبتبلكس 780', 'desktop', 'Dell', 'item_L_490846_517595.jpg', 'item_L_490846_517595.jpg,Dell-Optiplex-780-Tower-Barebones-DVDRW-Win7-COA-Add-your-own-CPUHDDRAM-231315329722.jpg,89a31d3f47f93c44eacc0752efceb52b97f28d54.jpg', 'core2quad', 'Q9400 2.7GHZ', 6, 12, 3, '2TB HDD', 'none', 'Intel', 'GMA 4500', 'Nvidia', 'GT630 2GB', '0', 'none', '1', 'No', 8, 2, 0, 'none', 0, 'none', 'none', 'none', 2800),
(2, 'Z50 i7', 'Z50 i7', 'laptop', 'Lenovo', '1924643522_1993139774_o.png', '1924643522_1993139774_o.png', 'corei7', '4510U 2 upto 3.1GHZ', 4, 8, 3, '1TB HDD', 'none', 'Intel', 'HD4000', 'Nvidia', 'GT840 4GB', '15.6', 'Full HD', '1', 'Yes', 2, 1, 0, 'Yes', 0, 'none', 'none', 'none', 8000),
(3, 'ProLiant DL380 G7', 'برو لاينت DL380 G7', 'server', 'HP', 'download.jpg', 'download.jpg', 'xeon', 'E5640 3GHz', 24, 64, 3, '1TB SSD', 'none', 'AMD', 'ES1000', 'none', 'none', '0', 'none', '4', 'No', 4, 2, 0, 'none', 0, 'none', 'none', 'none', 3750),
(4, 'SE2717H', 'SE2717H', 'monitor', 'Dell', 'item_XL_12247104_18541045.jpg', 'item_XL_12247104_18541045.jpg', 'none', 'none', 0, 0, 0, 'none', 'none', 'none', 'none', 'none', 'none', '27', '1920x1080', 'none', 'No', 0, 0, 0, 'No', 0, 'none', 'none', 'none', 3050),
(5, 'Tiger Keyboard kb-403', 'كيبورد تايجر  kb-403', 'acc', 'Others', 'item_L_35857364_139499225.jpg', 'item_L_35857364_139499225.jpg', 'none', 'none', 0, 0, 0, 'none', 'none', 'none', 'none', 'none', 'none', '0', 'none', 'none', 'none', 0, 0, 0, 'none', 0, 'none', 'Black Keyboard with Multimedia keys', 'كيبورد ملتيمديا اسود', 60),
(6, 'TP-Link TL-WR940N Access Point', 'اكسس بوينت تى بى لينك TL-WR940N', 'network', 'Others', 'item_XL_9594861_84341586.jpg', 'item_XL_9594861_84341586.jpg', 'none', 'none', 0, 0, 0, 'none', 'none', 'none', 'none', 'none', 'none', '0', 'none', 'none', 'none', 0, 0, 0, 'none', 0, 'none', 'Access Point with three antennas to increase the wireless robustness and stability', 'اكسس بوينت بثلاث انتنة لضمان مجال تغطية اوسع و اتصال وايرليس ثابت', 235),
(7, 'Laserjet PRO M102a', 'ليزرجيت برو M102a', 'printer', 'HP', 'item_XL_11924682_17753114.jpg', 'item_XL_11924682_17753114.jpg', 'none', 'none', 0, 0, 0, 'none', 'none', 'none', 'none', 'none', 'none', '0', 'none', 'none', 'No', 1, 0, 0, 'none', 23, 'A4', 'Produce sharp text, bold blacks, and crisp graphics with precision black toner.Track toner levels with print gauge technology and produce the most prints possible.Quickly replace your cartridges, using auto seal removal and easy-open packaging.', 'تنتج نصًا حادًا ، وأسودًا جريئًا ، ورسومات واضحة مع مسحوق حبر أسود دقيق ، وتتبع مستويات مسحوق الحبر باستخدام تقنية قياس الطباعة ، وأنتج أكبر عدد ممكن من المطبوعات ، واستبدل الخراطيش بسرعة ، باستخدام إزالة الختم تلقائيًا ، والتغليف السهل الفتح.', 999),
(8, 'L340 Gaming i7', 'L340 i7 للالعاب', 'laptop', 'Lenovo', 'lenovo-ideapad-l340-768x432px.jpg', 'lenovo-ideapad-l340-768x432px.jpg', 'corei7', '9750H 4.5GHZ', 12, 16, 4, '1TB HDD', '256GB SSD', 'Intel', 'UHD Graphics P600', 'Nvidia', 'GTX 1650 4GB', '15.6', '1920x1080', '1', 'Yes', 0, 2, 1, 'Yes', 0, 'none', 'none', 'none', 14500),
(9, 'ProDesk 600 G1 Tower', 'برو ديسك 600G1 تاور', 'desktop', 'HP', '_2_.jpg', '_2_.jpg', 'corei5', '4590 3.7GHz', 4, 8, 3, '1TB HDD', 'none', 'Intel', '4600HD', 'none', 'none', '0', 'none', '1', 'No', 6, 2, 0, 'none', 0, 'none', 'none', 'none', 2199);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `attempts` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `attempts`, `timestamp`) VALUES
(0, 'admin', 'A2w4d6x8s0', 0, '2020-06-12 23:02:43'),
(1, 'peter@gmail.com', 'peter@1234', 0, '2020-08-24 11:00:03'),
(3, 'fady', 'fady@1234', 0, '2020-04-02 09:37:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
