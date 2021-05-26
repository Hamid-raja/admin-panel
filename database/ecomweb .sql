-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2021 at 02:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`) VALUES
(1, 'hamid', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Samsung'),
(2, 'Nokia'),
(3, 'Iphone'),
(4, 'Canon'),
(5, 'Accer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `ID` int(11) NOT NULL,
  `catName` text NOT NULL,
  `Description` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` int(2) NOT NULL,
  `inc_menu` text NOT NULL,
  `parentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`ID`, `catName`, `Description`, `image`, `status`, `inc_menu`, `parentid`) VALUES
(2, 'cat2', 'ssssss', 'catimg/e52a5e1f26.png', 1, 'Yes', 0),
(3, 'Mobile', 'mobile pgones', 'catimg/d4c882cf7d.png', 1, 'No', 0),
(4, 'Laptop', 'laptop', 'catimg/bf11d331b1.jpg', 0, 'No', 0),
(5, 'Desktop', 'Desktop', 'catimg/762e0b85b2.jpg', 0, 'No', 0),
(6, 'cat11', 'asdas', 'catimg/13a64fc792.jpg', 1, 'Yes', 13),
(7, 'abc', 'asdas', 'catimg/9eeb8dc494.jpg', 1, 'Yes', 7),
(8, 'Accessories', 'Accessories', 'catimg/8286f2a458.png', 0, 'Yes', 0),
(9, 'Home', 'home decore', 'catimg/6d21836b44.jpg', 0, 'No', 0),
(11, 'Jewellery', 'jewellery', 'catimg/fe0c8e6ee6.png', 0, 'No', 0),
(12, 'cat111', 'cat111', 'catimg/071e1be50a.png', 1, 'Yes', 0),
(13, 'main', 'main', 'catimg/3e8b34cf46.png', 0, 'No', 3),
(17, 'Sony', 'Sony Products', 'catimg/d002a21463.jpg', 1, 'No', 3),
(38, 'tenisball', 'simple ball is here simple ball is here  catteasimple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here', 'catimg/04ab69f6c2.png', 1, 'Yes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'ahi', 'abc', 'ahemedabad', 'india', '380001', '7894561230', 'ahi43432@gmail.com', 'e0cd3a3af85face0652d2b65297d54a2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(2) NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `isActive` int(1) NOT NULL,
  `parentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`, `link`, `isActive`, `parentid`) VALUES
(1, 'Home', 'index.php', 1, 0),
(2, 'cat2', 'cat2.php', 1, 0),
(3, 'Mobile', '', 1, 0),
(4, 'Laptop', 'contact.php', 0, 0),
(5, 'Desktop', 'Desktop.php', 1, 0),
(6, 'cat11', 'cat11.php', 1, 2),
(7, 'abc', 'abc.php', 1, 0),
(8, 'Accessories', 'Accessories', 0, 0),
(9, 'Decor', 'Home.php', 0, 0),
(11, 'Jewellery', 'Jewellery.php', 0, 0),
(12, 'cat111', 'cat111.php', 1, 0),
(13, 'main', 'main.php', 1, 3),
(15, 'cat2', 'cat2.php', 1, 2),
(16, 'cat2', 'cat2.php', 1, 15),
(17, 'Sony', 'Sony.php', 1, 3),
(20, 'tenisball', 'tenisball.php', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `catids` text NOT NULL,
  `brandId` int(11) NOT NULL,
  `Description` text NOT NULL,
  `sku` text NOT NULL,
  `weight` text NOT NULL,
  `price` float NOT NULL,
  `qty` int(3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `new_from_date` date DEFAULT NULL,
  `new_to_date` date DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `catids`, `brandId`, `Description`, `sku`, `weight`, `price`, `qty`, `image`, `new_from_date`, `new_to_date`, `status`) VALUES
(1, 'Lorem Ipsum is simply', 2, '', 3, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos&lt;/p&gt;', 'hit789', '0.5 KG', 505.22, 3, 'upload/bbd000cf43.jpeg', '2021-03-01', '2021-03-08', 2),
(2, 'Lorem Ipsum is simply', 9, '', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;br /&gt;&amp;nbsp;&amp;nbsp; &amp;nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos', 'dsf457', '1.8 kg', 620.87, 0, 'upload/ea836cb393.jpg', '2021-03-01', '2021-03-09', 1),
(3, 'Lorem Ipsum is simply', 2, '', 2, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;br /&gt;&amp;nbsp;&amp;nbsp; &amp;nbsp;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos.&lt;/p&gt;', 'prd1', '0.2kg', 220.97, 0, 'upload/1367244342.jpg', '2021-03-01', '2021-03-04', 0),
(4, 'simply', 7, '8,6', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos.&lt;/p&gt;', 'prd2', '1.2 kg', 600, 5, 'upload/5b7b9305f1.png', '2021-03-01', '2021-03-11', 0),
(5, 'Iron Machine', 12, '6', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos.&lt;/p&gt;', 'prd3', '2kg', 550, 0, 'upload/4af42022d4.png', '0000-00-00', '0000-00-00', 1),
(6, 'Sound Box', 8, '7', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos.&lt;/p&gt;', 'prd4', '1,5kg', 660, 0, 'upload/d5bf825e2d.jpg', '0000-00-00', '0000-00-00', 0),
(7, 'Fan', 6, '8', 4, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos.&lt;/p&gt;', 'prd5', '1.2kg', 880, 0, 'upload/8f9f7b4ade.jpg', '0000-00-00', '0000-00-00', 2),
(8, 'Juice Machine', 8, '', 1, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;/p&gt;\r\n&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus vel facilis asperiores consequuntur minus excepturi quas, voluptatibus atque aut vitae! Non omnis, consectetur? Ex eligendi, fuga aspernatur velit assumenda ad unde dicta harum. Ab dolorem voluptate rerum natus voluptas ex repudiandae, sint sapiente cupiditate tempore necessitatibus dignissimos, quam exercitationem consequuntur officia placeat, eaque est a praesentium laboriosam provident minima obcaecati. Sunt ipsa cumque nobis sint aliquam non magnam incidunt inventore quia quod, iste repellat ducimus, ratione delectus maiores accusantium, eos.&lt;/p&gt;', 'prd6', '0.6kg', 550, 0, 'upload/a3957721a0.png', '2021-03-01', '2021-03-02', 1),
(9, 'Monitor', 5, '4,5', 5, '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati labore voluptas neque doloremque? Illum voluptates, illo inventore qui fuga, harum dignissimos dolore earum sint. Hic mollitia consectetur, quis voluptatibus quae placeat, aliquid, in facilis, id doloribus cumque modi nemo maxime. Fugiat eum adipisci et quam dicta, nam quidem sapiente, nobis, doloremque magnam reprehenderit voluptatibus repudiandae praesentium. Minus consequuntur maxime, nostrum eos, molestias velit officiis alias incidunt enim reiciendis, pariatur repudiandae consectetur fugit! Suscipit sunt atque commodi repudiandae adipisci, dolore quaerat eveniet minima, repellat sint quas impedit velit quidem necessitatibus excepturi qui veniam maiores quibusdam animi neque consequuntur consectetur. Velit deleniti repellat vitae at, aut nulla, perspiciatis cupiditate non ipsum animi dolores, voluptatem est ea, minima dignissimos. Doloribus minima magnam perspiciatis.&lt;/p&gt;', 'prd6', '1.2 kg', 5000, 0, 'upload/ae748749b8.jpg', '2021-03-01', '2021-03-10', 1),
(10, 'Camera', 3, '9,23', 4, '&lt;p&gt;Product description goes here. There is a same sample here. The month of is the&lt;/p&gt;', 'ahi123', '0.76kg', 550, 0, 'upload/c769967566.jpg', '2021-03-05', '2021-03-04', 2),
(11, 'abc', 4, '11,3', 5, '&lt;p&gt;asd fghjasd fghjasdfghj asdfghjasdf ghjasdfghjas dfghjasdfghjasdfgh jasdfghja sdfghjasdfghja&amp;nbsp; &amp;nbsp; &amp;nbsp;sdfghjasdfghj&lt;/p&gt;', 'ahi1234', '0.3kg', 20000, 2, 'upload/74e4ec7628.jpg', '2021-03-01', '2021-03-04', 1),
(12, 'Nokia lumia 1320', 3, '3,1,8', 2, '&lt;p&gt;Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320Nokia mobile lumia 1320&amp;nbsp;Nokia mobile lumia 1320&lt;/p&gt;', 'pronok02', '0.66kg', 899, 10, 'upload/aa0926018a.jpg', '2021-03-01', '2021-03-26', 2),
(13, 'tenisball', 38, '38,1', 3, '&lt;p&gt;&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&amp;nbsp;simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here simple ball is here&lt;/p&gt;', 'bll', '3', 30, 22, 'upload/c39d8fd334.png', '2021-03-04', '2021-03-04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
