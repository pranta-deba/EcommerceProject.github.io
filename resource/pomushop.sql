-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 07:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pomushop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`) VALUES
(11, 'Mens Fashion', 'We’ve said it time and time again, menswear is ruled by history and tradition. Every person in menswear (designer, stylist, editor, etc) has taken inspiration from the past at one time or another. And no era has been overlooked', '63d967567335f.png', '2023-01-31 19:09:10'),
(12, 'Womens Fashion', 'The corset continued to be a major staple of womens fashion in the early 20th century. The style of corset altered slightly, giving rise to the S-bend corset which, like earlier traditional corsets, gave women a shrunken waist and accentuated hips. The supposed benefit of the S-bend was health, seeing as the straight-front allowed for less pressure to be placed on the front of the abdomen.', '63d9687227275.png', '2023-01-31 19:13:54'),
(13, 'Babies & Toys', 'Things they can reach for, hold, suck on, shake, make noise with - rattles, large rings, squeeze toys, teething toys, soft dolls, textured balls, and vinyl and board books. Things to listen to—books with nursery rhymes and poems, and recordings of lullabies and simple songs.', '63d96a29a6f02.png', '2023-01-31 19:21:13'),
(14, 'Watches, Bags, Jewellery', 'Watches were developed in the 17th century from spring-powered clocks, which appeared as early as the 14th century.. \r\nPurse Stories is a collection of remembrances told by women about the handbags that played significant parts in their lives.\r\nThe earliest traces of jewelry can be traced to the civilizations that bloomed in the Mediterranean and what is now called Iran around 3,000 to 400 BC', '63d96b6fd9d43.png', '2023-01-31 19:26:39'),
(15, 'Electronic Devices', 'Electronic devices—such as computers, mobile phones, remotes, and cameras-use electric current to encode, analyze, or transmit information. A computer contains millions of tiny electronic components. Parts of a computer that transmit, process, or store information include the CPU, hard drive, ROM, and RAM.', '63d96cede6d60.png', '2023-01-31 19:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT 1,
  `op` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `price`, `quantity`, `op`, `created_at`) VALUES
(13, 81, 47, 1120.00, 1, '', '2023-02-01 06:28:37'),
(14, 81, 30, 9691.00, 1, '', '2023-02-01 06:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `discount` float(6,2) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `payment` set('cash','bkash','nagad','cod') NOT NULL,
  `trxid` varchar(72) NOT NULL,
  `status` set('pe','pro','shi','com') DEFAULT 'pe' COMMENT '"pending","processing","shipped","completed"',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `discount`, `comment`, `payment`, `trxid`, `status`, `created_at`) VALUES
(81, 17, 11300.00, 51.55, 'product gulo jeno valo pai,man sommoto jeno hoy.', 'bkash', 'jshdbg3dgslkf6', 'com', '2023-02-01 06:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(512) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `letest_item` set('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `category_id`, `subcategory_id`, `name`, `description`, `price`, `quantity`, `image`, `discount`, `letest_item`, `created_at`) VALUES
(15, 'FGH65ERD', 13, 13, 'Smile Baby Diaper', 'Smile Baby Diaper Belt System S Size 3-6 kg 28 pcs', 399.00, 10, '63d9e7fa28bf0.png', 20, '1', '2023-02-01 04:18:02'),
(22, 'SV4HNJ7', 13, 13, 'Standard Diaper', 'MamyPoko Pants Standard Diaper - Large 9-14 kg - 30 Pcs', 955.00, 5, '63d9ea4143443.png', 10, '1', '2023-02-01 04:27:45'),
(24, 'WE34FG6N', 13, 13, 'Baby Cloth Daiper', 'Washable Baby Cloth Daiper - 3 kg to 15 kg -Multi-Color 3 PCs Daipers with 3 Daiper nappy', 580.00, 5, '63d9eac611978.png', 5, '0', '2023-02-01 04:29:58'),
(26, 'SD33FTR', 13, 13, 'Fresh Pant Diaper', 'Fresh Happy Nappy Pant Diaper 7-12 KG M Size 40 Pcs', 617.00, 10, '63d9ec1f0b70d.png', 10, '0', '2023-02-01 04:35:43'),
(27, 'CD4G6H', 13, 13, 'Molfix Pant Diaper', 'Molfix Pant Diaper Large 9-14 Kg - 24 pcs', 887.00, 20, '63d9ec63d882a.png', 20, '0', '2023-02-01 04:36:51'),
(28, 'SS3FFGH6', 13, 13, 'Pant Diaper Pant', 'Kidz pant diaper pant L 9-14 kg 58 pcs', 2440.00, 10, '63d9eced00a37.png', 4, '1', '2023-02-01 04:39:09'),
(30, 'DFGHH4F', 15, 18, 'Redmi A1', 'Redmi A1 2GB/32GB', 9691.00, 5, '63d9ee25d01fb.png', 5, '1', '2023-02-01 04:44:21'),
(31, '2DFRG5R', 15, 18, 'Infinix Note12', 'Infinix Note12 8GB/128GB', 19999.00, 5, '63d9ee8206f1a.png', 5, '1', '2023-02-01 04:45:54'),
(32, 'DFRGT6YH', 15, 18, 'Motorola Moto G31', 'Motorola Moto G31 6GB/128GB Mobile', 23999.00, 10, '63d9eecaf324e.png', 5, '0', '2023-02-01 04:47:06'),
(33, 'DF4GPO2D', 15, 18, 'IPhone 14 Pro Max', 'iPhone 14 pro max 256 GB HK Active', 219990.00, 3, '63d9ef6e8d27f.png', 1, '1', '2023-02-01 04:49:50'),
(34, 'VB54JK1', 15, 18, 'HUAWEI P50 Pro', 'Display 6.6 OLED,\r\nCpu Snapdragon 888,\r\nStorage 8GB+256GB,\r\nCamera 50MP  64MP 40MP  13MP Back Cam, 13 MP Selfie', 124990.00, 2, '63d9f0562ed6e.png', 5, '1', '2023-02-01 04:53:42'),
(35, 'VG5HYJD', 11, 23, 'Cotton Polo T- Shirt', '2022 New Blue Cotton Polo T- Shirt For Man', 201.00, 10, '63d9f112472bd.png', 2, '1', '2023-02-01 04:56:50'),
(36, 'CVFG4HJQ', 11, 23, ' Winter Jacket', 'Stylish Premium Winter Jacket For Men - White and Navy', 333.00, 20, '63d9f14d27a94.png', 2, '1', '2023-02-01 04:57:49'),
(37, 'VG6YH1FT', 11, 23, 'Hodi Set', 'Winter Stylish Full Seleve Hodi Set Play Boy For Man', 650.00, 7, '63d9f199864a9.png', 10, '1', '2023-02-01 04:59:05'),
(38, 'VGHJYRD32', 11, 23, 'Gabardine Pant', 'Mens Narrow Formal Official Gabardine Pant', 690.00, 8, '63d9f242caa51.png', 10, '1', '2023-02-01 05:01:54'),
(39, 'VG5HJ34RF', 11, 23, 'Denim Jeans', 'Stylish Slim-Fit Stretchable Denim Jeans for Men', 350.00, 14, '63d9f2e48d0c0.png', 0, '1', '2023-02-01 05:04:36'),
(41, 'VGB45KOA1', 11, 23, 'Smart & Stylish Pant', 'Smart & Stylish Denim Jeans Pant For Men', 270.00, 25, '63d9f35cb18a2.png', 0, '1', '2023-02-01 05:06:36'),
(42, 'KJH6FV3', 14, 28, 'kids bag toddler', 'kids bag toddler backpack with leash messenger bag kids kids cartoon backpack cartoon school backpack', 235.00, 16, '63d9f4404741c.png', 0, '1', '2023-02-01 05:10:24'),
(43, 'JHBV6FD3', 14, 28, 'School Bags', 'Kids Cartoon Nylon Dinosaur Backpacks Children Animal Mini Kindergarten Schoolbag Girls Boys Backpack School Bags', 359.00, 22, '63d9f4e8b65a3.png', 0, '0', '2023-02-01 05:13:12'),
(44, 'FGH2DV1', 14, 28, 'Preschool Bags', 'Nylon Animal Children Backpacks Kids Preschool Bags Cartoon Panda Book Bags for Baby Girl Boy Anti Lost Backpack for Kids', 225.00, 5, '63d9f5771d57c.png', 0, '0', '2023-02-01 05:15:35'),
(45, 'BNV42DSL', 14, 28, 'Kids Bag', 'Fashionable kids bag toddler backpack with leash messenger bag kids kids cartoon backpack cartoon school backpack', 360.00, 24, '63d9f847f351d.png', 0, '0', '2023-02-01 05:27:35'),
(46, 'DFG5BX1W', 12, 33, 'Stylish ladys hoodie', 'Stylish ladys hoodie', 1050.00, 13, '63da0212303b6.png', 0, '1', '2023-02-01 06:09:22'),
(47, 'VBG5YJ1SE', 12, 33, 'V-Neck Versatile Short', 'IELGY Womens clothes long sleeve simple casual cardigan fashion jacket V-neck versatile short', 1120.00, 17, '63da02e4ea4ef.png', 1, '1', '2023-02-01 06:12:52'),
(49, 'KJH7JGTR3', 12, 33, 'Blouse Loose-Fitting Casual', 'IELGY Womens clothes fashion jacket cardigan all-match long-sleeved round neck blouse loose-fitting casual', 1120.00, 3, '63da03fac3681.png', 0, '1', '2023-02-01 06:17:30'),
(50, 'BVH4FN1L3', 13, 14, 'Baby Hooded Towel', 'Baby Hooded Towel - 28/32 inch', 135.00, 3, '63da0508a25eb.png', 0, '0', '2023-02-01 06:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(512) NOT NULL,
  `post` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `post`, `created_at`) VALUES
(6, 'Pranto Deb Nath', '63d978dc148a2.png', 'Yep, to showcase your products.\n\nBut heres the plot twist...\n\nCustomer reviews can showcase your products without promoting them yourself.\n\nIt means the customers will do the talking for you.\n\nThey will be the ones to highlight the features and share their experiences with your eCommerce brand.\n\nAnd the best part is you can even turn these reviews into digital content for your platforms!\n\nSounds good, right?\n\nLets talk about the next one...', '2023-01-31 20:23:56'),
(7, 'Nishat Shubah Joy', '63d97e602977d.png', 'Once more people share positive feedback about your products, you can gain new customers.\r\n\r\nDont believe me yet?\r\n\r\nWhat if I tell you that 93persen of customers consider online reviews before purchasing a product?\r\n\r\nThis means you need to show your online reviews because most customers want to see what others say about your eCommerce store before making a transaction.\r\n\r\nAnd , am sure you want to increase your customer acquisition.\r\n\r\nSo, take advantage of online business reviews to keep growing your bus', '2023-01-31 20:47:28'),
(8, 'Didarul Didat', '63d97fafbe6b9.png', 'Did you know that 90parsen of consumers say that online reviews impact their purchasing decisions,\r\n\r\nIt just proves that by displaying customer reviews, you can affect the purchasing decision of a prospective customer.\r\n\r\nHow so, Because you are easing their hesitations when making a decision.\r\n\r\nAnd who doesnt want that, right,\r\n\r\nI am sure you do,\r\n\r\nSo now, lets talk about...', '2023-01-31 20:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `description`, `image`, `created_at`) VALUES
(13, 13, 'Diapering & Potty', 'Diapering & Potty', '63d96e6b1b5fd.png', '2023-01-31 19:39:23'),
(14, 13, 'Baby Personal Care', 'Baby Personal Care', '63d96f017d6a8.png', '2023-01-31 19:41:53'),
(15, 13, 'Toys & Games', 'Toys & Games', '63d96f3a0b192.png', '2023-01-31 19:42:50'),
(17, 13, 'Remote Control & Vehicles', 'Remote Control & Vehicles', '63d96fca9c958.png', '2023-01-31 19:45:14'),
(18, 15, 'Smartphones', 'Smartphones', '63d970921c2e4.png', '2023-01-31 19:48:34'),
(19, 15, 'Laptops', 'Laptops', '63d970c501049.png', '2023-01-31 19:49:25'),
(20, 15, 'Feature Phone', 'Feature Phone', '63d97120e8d39.png', '2023-01-31 19:50:56'),
(21, 15, 'Cameras', 'Cameras', '63d971d801bee.png', '2023-01-31 19:54:00'),
(22, 15, 'Latest Mobile Accessories', 'Latest Mobile Accessories', '63d9721e5da0f.png', '2023-01-31 19:55:10'),
(23, 11, 'Clothing', 'Clothing', '63d97285f17fd.png', '2023-01-31 19:56:53'),
(24, 11, 'Winter Special', 'Winter Special', '63d972d5f3946.png', '2023-01-31 19:58:13'),
(25, 11, 'Shoes', 'Shoes', '63d972fbe76dc.png', '2023-01-31 19:58:51'),
(26, 11, 'Muslim Wear', 'Muslim Wear', '63d9733a62791.png', '2023-01-31 19:59:54'),
(27, 11, 'Bags', 'Bags', '63d97371c986b.png', '2023-01-31 20:00:49'),
(28, 14, 'Kids Bags', 'Kids Bags', '63d973bbe6f1e.png', '2023-01-31 20:02:03'),
(29, 14, 'Travel Bags', 'Travel Bags', '63d9740f41db3.png', '2023-01-31 20:03:27'),
(30, 14, 'Womens Jewellery', 'Womens Jewellery', '63d9746cd9f9c.png', '2023-01-31 20:05:00'),
(31, 14, 'Mens Jewellery', 'Mens Jewellery', '63d9749c424fb.png', '2023-01-31 20:05:48'),
(32, 14, 'Mens, Womens,Kids Watches', 'Mens, Womens,Kids Watches', '63d9758b359ca.png', '2023-01-31 20:09:47'),
(33, 12, 'Clothing', 'Clothing', '63d9761d75fc2.png', '2023-01-31 20:12:13'),
(34, 12, 'Winter Special', 'Winter Special', '63d97669819ed.png', '2023-01-31 20:13:29'),
(35, 12, 'Muslim Wear', 'Muslim Wear', '63d97699b6c61.png', '2023-01-31 20:14:17'),
(36, 12, 'Shoes', 'Shoes', '63d976d817098.png', '2023-01-31 20:15:20'),
(37, 12, 'Bags', 'Bags', '63d9770ea271e.png', '2023-01-31 20:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` set('1','2','3') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(3, 'abc', 'abc@gmail.com', '$2y$10$3WNPHe1Uj3izLqrrNj1fQuKwnthyN.iO4UlHYmQ5cwC5y9qhXQwQq', '2', '2023-01-15 15:19:27'),
(17, 'ABCD', 'ABCD@GMAIL.COM', '$2y$10$bl85JW5TS6sHQNlNDfnS6uYsmn6DjdWWEAoyrXNkRX7z0hvVNaZmS', '1', '2023-02-01 06:26:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
