-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 03:29 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foot`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `a_id` int(11) NOT NULL,
  `a_title` varchar(255) NOT NULL,
  `a_desciption` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`a_id`, `a_title`, `a_desciption`, `posted_by`, `date`) VALUES
(1, 'Heading', '<p>Testing</p>\r\n', 'admin', '2018-Dec-30 06:37:33pm');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aID` int(11) NOT NULL,
  `aName` varchar(100) NOT NULL,
  `aDate` datetime NOT NULL,
  `aEmail` varchar(100) NOT NULL,
  `aPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aID`, `aName`, `aDate`, `aEmail`, `aPassword`) VALUES
(2, 'Ashish', '2018-12-24 00:00:00', 'shahi2ashish@gmail.com', 'ashish9295'),
(3, 'admin', '2018-12-25 00:00:00', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `bStatus` int(11) NOT NULL DEFAULT '1',
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`, `b_image`, `bStatus`, `posted_by`, `date`) VALUES
(1, 'Adidas', 'adidas2.png', 1, 'admin', '2018-Dec-31 02:07:19pm'),
(2, 'Local', 'Favicon.png', 1, 'admin', '2019-Jan-02 07:18:45pm');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(11) NOT NULL,
  `pr_id` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `r_id` varchar(255) NOT NULL,
  `m_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `pr_price` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cateogrie`
--

CREATE TABLE `cateogrie` (
  `cId` int(11) NOT NULL,
  `cName` varchar(100) NOT NULL,
  `cStatus` int(11) NOT NULL DEFAULT '1',
  `cDate` varchar(255) NOT NULL,
  `cDp` varchar(100) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cateogrie`
--

INSERT INTO `cateogrie` (`cId`, `cName`, `cStatus`, `cDate`, `cDp`, `adminId`) VALUES
(1, 'Running Shoes', 1, '2018-Dec-29 02:41:31pm', 'running_shows.jpg', 3),
(2, 'Sports Shoe', 1, '2018-Dec-29 02:41:46pm', 'sports.jpg', 3),
(3, 'Boot', 1, '2018-Dec-29 02:41:57pm', 'boot.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `banner`, `title`, `address`, `phone`, `mobile`, `email`, `web`, `posted_by`, `date`) VALUES
(1, 'Avtar_Profile_pic.png', 'Title', 'B47 om vihar uttam nagar, Near some Bazar road', '9507169295', '9507169295', 'ashish', 'B47 om vihar uttam nagar', 'admin', '2018-Dec-31 04:35:50am');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `home_id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `slider1` varchar(255) NOT NULL,
  `slider2` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_email` varchar(255) NOT NULL,
  `m_password` varchar(255) NOT NULL,
  `m_phone` varchar(255) NOT NULL,
  `m_address` varchar(255) NOT NULL,
  `m_city` varchar(255) NOT NULL,
  `m_state` varchar(255) NOT NULL,
  `m_pincode` varchar(255) NOT NULL,
  `m_img` varchar(255) NOT NULL,
  `m_product_id` varchar(255) NOT NULL,
  `m_product_qty` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `mStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`m_id`, `m_name`, `m_email`, `m_password`, `m_phone`, `m_address`, `m_city`, `m_state`, `m_pincode`, `m_img`, `m_product_id`, `m_product_qty`, `posted_by`, `date`, `mStatus`) VALUES
(1, 'Zap12', 'zap12@zap12.com', 'admin', '9507169295', 'Delhi', 'Delhi', 'Delhi', '110059', 'Avtar_Profile_pic.png', '1', '13', 'admin', '2019-Jan-05 09:45:53am', 1),
(2, 'Sohan', 'admin@admin.com', 'admin', '9984531211', 'Arya samaj Road', 'Uttam Nagar', 'New Delhi', '110059', 'Avtar_Profile_pic1.png', '1', '1000', 'Ashish', '2019-Jan-05 09:45:53am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `cart_id` varchar(255) NOT NULL,
  `cart_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `t_amount` varchar(255) NOT NULL,
  `shipping_charge` varchar(255) NOT NULL,
  `biiling_name` varchar(255) NOT NULL,
  `biiling_phone` varchar(255) NOT NULL,
  `biiling_address` varchar(255) NOT NULL,
  `biiling_city` varchar(255) NOT NULL,
  `biiling_state` varchar(255) NOT NULL,
  `biiling_pincode` varchar(255) NOT NULL,
  `biiling_email` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_size` varchar(255) NOT NULL,
  `p_brand` varchar(255) NOT NULL,
  `p_qty` varchar(255) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `p_image_id` varchar(255) NOT NULL,
  `p_cat` varchar(255) NOT NULL,
  `p_subcat` varchar(255) NOT NULL,
  `p_manuf` varchar(255) NOT NULL,
  `p_retailer` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `pStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_size`, `p_brand`, `p_qty`, `p_description`, `p_image_id`, `p_cat`, `p_subcat`, `p_manuf`, `p_retailer`, `posted_by`, `date`, `pStatus`) VALUES
(1, 'xyz', '9', 'Adidas', '10', '<p>Best</p>', '', 'Running Shoes', 'Woodland', 'Zap12', 'Ashish', 'admin', '2019-Jan-05 05:41:59am', 1),
(2, 'Zap1', '9', 'Local', '10', '<p><b>Best Worth Product</b></p>', '', 'Boot', 'Woodland', 'Sohan', 'Ashish', 'admin', '2019-Jan-05 10:06:47am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_img`
--

CREATE TABLE `product_img` (
  `p_img_id` int(11) NOT NULL,
  `p_img_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_email` varchar(255) NOT NULL,
  `r_password` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_city` varchar(255) NOT NULL,
  `r_state` varchar(255) NOT NULL,
  `r_pincode` varchar(255) NOT NULL,
  `r_img` varchar(255) NOT NULL,
  `r_product_id` varchar(255) NOT NULL,
  `r_product_qty` varchar(255) NOT NULL,
  `r_manufacturer_id` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `rStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`r_id`, `r_name`, `r_email`, `r_password`, `r_phone`, `r_address`, `r_city`, `r_state`, `r_pincode`, `r_img`, `r_product_id`, `r_product_qty`, `r_manufacturer_id`, `posted_by`, `date`, `rStatus`) VALUES
(1, 'Ashish', 'best@best.com', 'admin', '9507169295', 'RZ F26A, West Sagarpur', 'NEW DELHI', 'Manglam Properties', '110046', 'Ashish.jpg', '1', '12', '1', 'admin', '2019-Jan-03 06:25:31am', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `scStatus` int(11) NOT NULL DEFAULT '1',
  `cat_name` varchar(255) NOT NULL,
  `subcat_img` varchar(255) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`subcat_id`, `subcat_name`, `scStatus`, `cat_name`, `subcat_img`, `posted_by`, `date`) VALUES
(1, 'Woodland', 1, 'Boot', 'boot.jpg', 'admin', '2018-Dec-29 03:04:56pm'),
(2, 'Nicky', 1, 'Sports Shoes', 'sports.jpg', 'admin', '2018-Dec-29 03:05:17pm'),
(3, 'Adidasss', 1, 'Running Shoes', 'running_shows.jpg', 'admin', '2018-Dec-30 06:29:07am');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uId` int(11) NOT NULL,
  `uFirstName` varchar(100) NOT NULL,
  `uLastName` varchar(100) NOT NULL,
  `uEmail` varchar(200) NOT NULL,
  `uPassword` varchar(200) NOT NULL,
  `uLink` varchar(200) NOT NULL,
  `uDate` varchar(100) NOT NULL,
  `uPosted` varchar(100) NOT NULL,
  `uStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uId`, `uFirstName`, `uLastName`, `uEmail`, `uPassword`, `uLink`, `uDate`, `uPosted`, `uStatus`) VALUES
(3, 'Ashish', 'Kumar', 'best@best.com', 'best', 'http://ashishshahi.com', '2019-Jan-03 06:32:58pm', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `w_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `w_amount` varchar(255) NOT NULL,
  `cashback_perc` varchar(255) NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `cateogrie`
--
ALTER TABLE `cateogrie`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_img`
--
ALTER TABLE `product_img`
  ADD PRIMARY KEY (`p_img_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uId`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cateogrie`
--
ALTER TABLE `cateogrie`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
