-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 11:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'kush', '$2y$10$K5lNGa8oTHut/WueKy/usOWaB2Af/bh/UAqPoOXkBM3vnwanCR3mC', 'juthanikush@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `road_name` varchar(255) NOT NULL,
  `rasident_Name` varchar(255) NOT NULL,
  `payment_type` enum('cod','online') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `bill_no`, `mid`, `qty`, `uid`, `road_name`, `rasident_Name`, `payment_type`) VALUES
(1, 671284364, 4, 12, 5, 'test', 'test', 'cod'),
(2, 671284364, 9, 5, 5, 'test', 'test', 'cod'),
(3, 671284364, 10, 4, 5, 'test', 'test', 'cod'),
(4, 671284364, 11, 2, 5, 'test', 'test', 'cod'),
(5, 671284364, 12, 3, 5, 'test', 'test', 'cod'),
(6, 671284364, 13, 4, 5, 'test', 'test', 'cod'),
(7, 671284364, 14, 6, 5, 'test', 'test', 'cod'),
(8, 644020168, 4, 12, 5, 'test1', 'test2', 'cod'),
(9, 644020168, 9, 5, 5, 'test1', 'test2', 'cod'),
(10, 644020168, 10, 4, 5, 'test1', 'test2', 'cod'),
(11, 644020168, 11, 2, 5, 'test1', 'test2', 'cod'),
(12, 644020168, 12, 3, 5, 'test1', 'test2', 'cod'),
(13, 644020168, 13, 4, 5, 'test1', 'test2', 'cod'),
(14, 644020168, 14, 6, 5, 'test1', 'test2', 'cod'),
(15, 111788376, 18, 1, 5, 'test', 'test', 'cod'),
(16, 111788376, 15, 1, 5, 'test', 'test', 'cod'),
(17, 111788376, 16, 1, 5, 'test', 'test', 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `rid`, `uid`) VALUES
(1, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `mid`, `name`, `short_desc`, `price`, `image`, `status`) VALUES
(1, 18, 'McAloo Tikki + Veg Pizza McPuff + Coke', 'McAloo Tikki + Veg Pizza McPuff + Coke', 130, '775011067.png', 1),
(2, 18, 'McVeggie + Fries (M)', 'McVeggie + Fries (M)', 155, '876608716.png', 1),
(3, 18, 'McAloo Tikki + Fries (M)', 'McAloo Tikki + Fries (M)', 105, '199838550.png', 1),
(4, 18, 'Masala Wedges (M) + Fries (M)', 'Masala Wedges (M) + Fries (M)', 140, '810137931.png', 1),
(9, 2, 'McAloo Tikki + Veg Pizza McPuff + Coke', 'McAloo Tikki + Veg Pizza McPuff + Coke', 129, '199681790.png', 1),
(10, 2, 'McVeggie + Fries (M)', 'McVeggie + Fries (M)', 155, '824857427.png', 1),
(11, 3, 'Cheese Lava American Veg Burger', 'A sinfully oozing cheesy Veg patty, loaded with Roasted Chipotle sauce, shredded Onions, Jalapenos & a relishing salad, layered between freshly toasted Buns.', 230, '428091043.png', 1),
(12, 3, 'McSaver Cheese Lava American Veg Meal', 'A deliciously filling meal of Cheese Lava American Veg Burger + Fries (M) + Drink of your choice', 305, '614647961.png', 1),
(13, 4, 'McAloo Tikki + Fries (M)', 'McAloo Tikki + Fries (M)', 105, '967357798.png', 1),
(14, 4, 'Pizza Mc Puff + Mcspicy Chicken', 'Pizza Mc Puff + Mcspicy Chicken', 162, '905339391.png', 1),
(15, 19, 'Gujarati Thali (Fix)', 'Roti (5 Pcs) + 2 Sabji + Dal + Rice + Gulab Jamun(1 Pcs) + Salad (Jain variant not available)(Serves 1)', 121, '782405455.jpg', 1),
(16, 19, 'Punjabi Lunch Thali', 'Paneer sabji + veg sabji + phulka roti (5 pcs) + dal fry + jeera rice + gulab jamun(1 pcs) + Chaas + aachar + salad (Jain variant not available)(Serves 1)', 198, '958495561.jpg', 1),
(17, 20, '1 Manchurian Dry + 1 Chinese Bhel + 1 Hakka Noodles', '1 Manchurian Dry + 1 Chinese Bhel + 1 Hakka Noodles', 385, '751695487.jpg', 1),
(18, 20, '1 Dal Tadka + 1 Jeera Rice + 2 Sweet Lassi + 2 Papad', '1 Dal Tadka + 1 Jeera Rice + 2 Sweet Lassi + 2 Papad', 363, '362769823.jpg', 1),
(19, 21, 'Gujarati Thali (Fix)', 'Roti (5 Pcs) + 2 Sabji + Dal + Rice + Gulab Jamun(1 Pcs) + Salad (Jain variant not available)(Serves 1)', 121, '910109916.jpg', 1),
(20, 21, 'Punjabi Lunch Thali', 'Paneer sabji + veg sabji + phulka roti (5 pcs) + dal fry + jeera rice + gulab jamun(1 pcs) + Chaas + aachar + salad (Jain variant not available)(Serves 1)', 198, '172114524.jpg', 1),
(21, 22, 'Paneer sabji + veg sabji + phulka roti', 'Paneer sabji + veg sabji + phulka roti (5 pcs) + dal fry + jeera rice + gulab jamun(1 pcs) + Chaas + aachar + salad (Jain variant not available)(Serves 1)', 11, '216004445.jpg', 1),
(22, 22, 'Tawa Parotha (1pc)', 'Tawa Parotha (1pc)', 17, '296220818.jpg', 1),
(23, 24, 'Handi Biryani + Coke 250 mlPepsi (200 ml)', 'Handi Biryani + Coke 250 mlPepsi (200 ml)', 210, '385699898.jpg', 1),
(24, 24, 'Chinese Combo 1 (Serves 2)', 'Chinese Combo 1 (Serves 2)', 200, '481163809.jpg', 1),
(25, 25, 'Handi Biryani + Coke 250 mlPepsi (200 ml)', 'Handi Biryani + Coke 250 mlPepsi (200 ml)', 210, '126366478.jpg', 1),
(26, 26, 'Chinese Combo 1 (Serves 2)', 'Chinese Combo 1 (Serves 2)', 200, '468620682.jpg', 1),
(27, 26, 'Dal Fry Jeera Rice Combo', 'Dal Fry Jeera Rice Combo', 150, '312441595.jpg', 1),
(28, 27, 'Sargam Sp. Lunch Thali', 'Sargam Sp. Lunch Thali', 220, '439545977.jpg', 1),
(29, 27, 'Chole Bhatoore', 'Chole Bhatoore', 185, '865721140.jpg', 1),
(30, 28, 'Sargam Sp. Lunch Thali', 'Sargam Sp. Lunch Thali', 220, '308638856.jpg', 1),
(31, 29, '8\" Margherita Pizza (250ml Cold Drink Free)', '8\" Margherita Pizza (250ml Cold Drink Free)', 190, '833387453.jpg', 1),
(32, 30, 'Veg Kolhapuri (300 Gm)', 'Veg Kolhapuri (300 Gm)', 200, '618298685.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_title`
--

CREATE TABLE `menu_title` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_title`
--

INSERT INTO `menu_title` (`id`, `rid`, `title`, `status`) VALUES
(2, 3, 'Match Day Mania Combos', 1),
(3, 3, 'Gourmet Burgers and Meals', 1),
(4, 3, 'Combos for One: Up to 60% Off', 1),
(5, 3, 'McSaver Meals: FLAT Rs. 50 Off', 1),
(6, 3, 'Party Pack Combos', 1),
(7, 3, 'Best Value Meals with Drinks', 1),
(8, 3, 'Happy Meals', 1),
(9, 3, 'Everyday Combos', 1),
(10, 3, 'McSavers', 1),
(11, 3, 'Burgers & Wraps', 1),
(12, 3, 'McCafe', 1),
(13, 3, 'Beverages', 1),
(14, 3, 'Sides', 1),
(15, 3, 'Desserts', 1),
(16, 3, 'Breakfast Sides', 1),
(18, 3, 'Recommended', 1),
(19, 2, 'Recommended', 1),
(20, 2, 'Family Binge Combos', 1),
(21, 2, 'Thali', 1),
(22, 2, 'Roti / Parotha', 1),
(23, 2, 'Beverage Combos', 0),
(24, 4, 'Recommended', 1),
(25, 4, 'Beverage Combos', 1),
(26, 4, 'Swiggy Exclusive Combos', 1),
(27, 5, 'Recommended', 1),
(28, 5, 'Thali', 1),
(29, 5, 'Pizzas', 1),
(30, 5, 'Main Course', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status_title` varchar(22) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status_title`, `status`) VALUES
(2, 'Panding', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pure_veg` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `email`, `name`, `img`, `password`, `address`, `pure_veg`, `city`, `status`, `time`, `created_at`) VALUES
(2, 'juthanikush@gmail.com', 'Anjali Restaurant - Nirmala Road', '442388433.jpg', '$2y$10$mFHbkiX3/bOpJXCLYAJDXOshXZPsL.msflxs/Uphi52hppUek3acK', 'test', 'on', 'rajkot', 1, '30 min', '2022-02-13'),
(3, 'juthanikush18@gmail.com', 'McDonalod', '831073794.jpg', '$2y$10$/Cduu160AKmy5VaofPoiN.usq6YPOoKm5ENZOoId975ce4yf00Eg6', 'kalavad road', 'on', 'Rajkot', 1, '50 min', '2022-02-13'),
(4, 'juthanikush18@gmail.com', 'Royal punjabi & Chinese', '804039168.jpg', '$2y$10$mihwecLA1cneQtEyp342p.xjhkPY8F/xRsAq7UlQuKjSH4jroz5De', 'test', 'on', 'surat', 1, '45 min', '2022-02-13'),
(5, 'kushjuthani2000@gmail.com', 'sargam food', '489118704.jpg', '$2y$10$usU5qBzGz8oBgzzgVoOdCOouV/OTlC7/V2M.6Zs3VPRkZetssEdyS', 'jamanger roads', 'off', 'rajkot', 1, '45 min', '2022-02-13'),
(6, 'kushjuthani2000@gmail.com', 'Sunny Paji da Dhaba', '804406262.jpg', '$2y$10$otX2TwZOeDJ2w2TJD.DjL.LyO0yRe.c647JcDLDzt1yHSGmfpea/2', 'gondal road', 'off', 'Rajkot', 0, '45 min', '2022-02-13'),
(7, 'juthanikush2000@gmail.com', 'The Grand thakar', '131208222.jpg', '$2y$10$fcBBCvLDP.LZaR4YfKxyQOxJavRcPJr80NEHxYY9UBgdDFZfBM.MK', 'test', 'on', 'Rajkot', 0, '45 min', '2022-02-13'),
(8, 'juthanikush2000@gmail.com', 'YOR- Punjabi Food Parcel & Restaurant', '779835085.jpg', '$2y$10$j0q7A93wnlNj92aH/9uuLe96e6BcF4gR3oZliPrw/SHLTcbjc58Zu', '150 ring road', 'off', 'Rajkot', 0, '45 min', '2022-02-13'),
(9, 'juthanikush@gmail.com', 'Amrut Restaurant', '634946064.jpg', '$2y$10$fbm6vQAlO51hy1P4N/l8.ORA8ztACvXNXNgr0YrTe87MJZ/hEaijC', 'Place Road', 'on', 'Rajkot', 0, '30 min', '2022-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_number`, `password`, `status`) VALUES
(3, 'kush', '7894561236', '1234567896', 1),
(4, 'alok', '1231234563', '12345678', 1),
(5, 'KU', '9427368831', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_title`
--
ALTER TABLE `menu_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `menu_title`
--
ALTER TABLE `menu_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
