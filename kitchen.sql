-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 10:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '9ae2be73b58b565bce3e47493a56e26a', '2018-05-25 05:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `bnimg` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `bnimg`) VALUES
(1, 'banner1.jpg'),
(2, 'banner2.jpg'),
(3, 'banner3.jpg'),
(4, 'banner4.jpg'),
(5, 'banner5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categry` varchar(100) NOT NULL,
  `cateimg` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categry`, `cateimg`) VALUES
(9, 'Fruits', 'fruits.png'),
(10, 'Juice', 'juice.png'),
(11, 'Vegetables', 'vegetables.png'),
(12, 'Oils', 'oils.png'),
(13, 'Masala', 'masala.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fmsg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fmsg`) VALUES
(3, 'Ryhbcxx'),
(2, 'Product Outdated.. ');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `quantitytype` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `homepage` varchar(10) NOT NULL DEFAULT 'NO',
  `offer` varchar(50) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `description`, `price`, `quantity`, `quantitytype`, `image`, `homepage`, `offer`) VALUES
(4, 'Apple', 'Fruits', 'Apples are loaded with vitamin C. Almost half of an apple\'s vitamin C content is just under the skin, so it\'s a good idea to eat apples with their skins. Flores said that this is also where apples\' fiber is found. Apples contain insoluble fiber, which provides bulk in the intestinal tract. The bulk holds water that cleanses and moves food quickly through the digestive system.                                                                                                                                                                                    ', '100', '1', 'Kg', 'apple.png', 'YES', 'YES'),
(5, 'Bananas', 'Fruits', 'it.\n\nA wide variety of health benefits are associated with the curvy yellow fruit. Bananas are high in potassium and pectin, a form of fiber, said Laura Flores, a San Diego-based nutritionist. They can also be a good way to get magnesium and vitamins C and B6. ', '65', '1', 'Dozon', 'bananas.png', 'YES', 'NO'),
(6, 'Kivy', 'Fruits', 'Martha Stewart is of the view that the fruit can be consumed in its entirety. The skin of the fruit contains flavonoids, antioxidants and fibre, however, it may also carry a large percentage of the pesticides used while farming the fruit. Some people tend to eat the kiwi fruit without peeling the skin off.', '220', '1', 'Kg', 'kivy.png', 'YES', 'NO'),
(7, 'Orange', 'Fruits', 'The orange is the fruit of the citrus species Citrus × sinensis in the family Rutaceae. It is also called sweet orange, to distinguish it from the related Citrus × aurantium, referred to as bitter orange. The sweet orange reproduces asexually; varieties of sweet orange arise through mutations.', '60', '1', 'Kg', 'orange.png', 'YES', 'NO'),
(8, 'Grapes', 'Fruits', 'A grape is a fruit, botanically a berry, of the deciduous woody vines of the flowering plant genus Vitis. Grapes can be eaten fresh as table grapes or they can be used for making wine, jam, juice, jelly, grape seed extract, raisins, vinegar, and grape seed oil.', '60', '1', 'Kg', 'grapes.png', 'YES', 'NO'),
(9, 'Pineapple', 'Fruits', 'The pineapple is a tropical plant with an edible multiple fruit consisting of coalesced berries, also called pineapples, and the most economically significant plant in the family Bromeliaceae.', '30', '1', 'Unit', 'pineapple.png', 'YES', 'NO'),
(10, 'Strawberry', 'Fruits', 'The garden strawberry is a widely grown hybrid species of the genus Fragaria, collectively known as the strawberries. It is cultivated worldwide for its fruit. The fruit is widely appreciated for its characteristic aroma, bright red color, juicy texture, and sweetness.', '99', '1', 'Kg', 'strwberry.png', 'YES', 'YES'),
(11, 'Garlic', 'Vegetables', 'Garlic is a species in the onion genus, Allium. Its close relatives include the onion, shallot, leek, chive, and Chinese onion. Garlic is native to Central Asia and northeastern Iran, and has long been a common seasoning worldwide, with a history of several thousand years of human consumption and use.', '100', '1', 'Kg', 'garlic.png', 'YES', 'NO'),
(12, 'Potato', 'Vegetables', 'The potato is a starchy, tuberous crop from the perennial nightshade Solanum tuberosum. In many contexts, potato refers to the edible tuber, but it can also refer to the plant itself. Common or slang terms include tater and spud. Potatoes were introduced to Europe in the second half of the 16th century by the Spanish.', '35', '1', 'Kg', 'patatos.png', 'YES', 'NO'),
(13, 'Onions', 'Vegetables', 'The onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium. Its close relatives include the garlic, leek, chive, and Chinese onion.', '18', '1', 'Kg', 'onion.png', 'YES', 'NO'),
(14, 'Carrot', 'Vegetables', 'The carrot is a root vegetable, usually orange in colour, though purple, black, red, white, and yellow cultivars exist. Carrots are a domesticated form of the wild carrot, Daucus carota, native to Europe and southwestern Asia', '30', '1', 'Kg', 'carrot.png', 'YES', 'NO'),
(15, 'Cabbage', 'Vegetables', 'Cabbage or headed cabbage is a leafy green, red, or white biennial plant grown as an annual vegetable crop for its dense-leaved heads.  ', '25', '1', 'Kg', 'bgobi.png', 'YES', 'NO'),
(16, 'Cucumbers', 'Vegetables', 'Cucumber is a widely cultivated plant in the gourd family, Cucurbitaceae. It is a creeping vine that bears cucumiform fruits that are used as vegetables. There are three main varieties of cucumber: slicing, pickling, and seedless. Within these varieties, several cultivars have been created.', '15', '250', 'Grams', 'khera.png', 'YES', 'NO'),
(17, 'Red Chilli', 'Vegetables', 'Capsicum, the peppers, is a genus of flowering plants in the nightshade family Solanaceae. Its species are native to the Americas, where they have been cultivated for thousands of years. Following the Columbian Exchange, it has become cultivated worldwide, and it has also become a key element in many cuisines.', '30', '250', 'Grams', 'redcilli.png', 'YES', 'NO'),
(18, 'Red Peppers', 'Vegetables', 'Capsicum, the peppers, is a genus of flowering plants in the nightshade family Solanaceae. Its species are native to the Americas, where they have been cultivated for thousands of years. Following the Columbian Exchange, it has become cultivated worldwide, and it has also become a key element in many cuisines.', '50', '500', 'Grams', 'simlared.png', 'YES', 'NO'),
(19, 'Strawberry Banana', 'Juice', 'A good feeling is just a glass away! Tropicana Essentials Probiotics® Strawberry Banana is a 100% juice blend with no added sugar* or artificial flavors. With a billion live and active cultures in every eight-ounce serving, it\'s an easy and delicious way to get some good into your routine.', '125', '1', 'Unit', 'juice2.png', 'YES', 'YES'),
(20, 'Orchard Green', 'Juice', 'A good feeling is just a glass away! Tropicana Essentials Probiotics® Orchard Green is a 100% juice blend with no added sugar* or artificial flavors. With a billion live and active cultures in every eight-ounce serving, it\'s an easy and delicious way to get some good into your routine.', '600', '1', 'Unit', 'juice3.png', 'YES', 'NO'),
(21, 'Orange Strawberry Banana Mango Apple', 'Juice', 'Tropicana Tropics® Orange Strawberry Banana 100% juice blend will remind you of the pure and relaxing pleasures of the islands. You can also enjoy your favorite Tropicana Tropics juice blend in convenient, single serve packs. They’re the perfect choice when you’re on the go!', '299', '1', 'Unit', 'juice4.png', 'YES', 'NO'),
(22, 'Chicken Masala', 'Masala', 'Recipe : Wash, trim and cut 1 Kg. Chicken into 8 pieces and set aside. Heat 100g.oil/ghee in a pan & fry 3 chopped onions till golden. Add 3 chopped tomatoes, 1/2 tspn. Deggi Mirch & stir well. Add 15g. Chicken Masala & salt to taste. Stir fry for 2-3 min. Add Chicken pieces and fry them for 10  min. Add 100g. beaten natural yoghurt, 60ml. water & mix. Reduce to low heat, cover & simmer for 20 min. Prevent it from sticking at bottom. Add 15ml. lemon juice & 2g. Kasoori Methi leaves, stir & serve.', '65', '100', 'Grams', 'masala1.png', 'YES', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cmobile` varchar(50) NOT NULL,
  `cmsg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `cname`, `cmobile`, `cmsg`) VALUES
(4, 'Amit', '2580963147', 'Qwerty123456');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `description`) VALUES
(2, '10% off on Flat', '10% off on Flat Price of Masala');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `area` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` varchar(50) DEFAULT 'Received',
  `ordertime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `fname`, `lname`, `mobile`, `area`, `address`, `status`, `ordertime`) VALUES
(500054, 'Ajay', 'Randhwa', '7986568931', 'Police Line', 'Tarn Taran', 'Received', '2019-02-11 18:24:12'),
(500055, 'Ajaypal Singh', 'Singh', '7696355852', 'Guru Teg bahadur Nagar', 'Tarn Taran', 'Received', '2019-02-11 19:02:00'),
(500056, 'Ajaypal Singh', 'fdfdf', '769655852', 'Ranjit Avenue', 'Tarn Taran', 'Received', '2019-07-17 10:18:50'),
(500057, 'Ajaypal Singh', 'fdfdf', '769655852', 'Ranjit Avenue', 'Tarn Taran', 'Received', '2019-07-17 10:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `orderslist`
--

CREATE TABLE `orderslist` (
  `id` int(50) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `itemname` varchar(500) NOT NULL,
  `itemquantity` varchar(100) NOT NULL,
  `itemquantitytype` varchar(50) NOT NULL,
  `Mquantity` varchar(50) NOT NULL,
  `itemprice` varchar(30) NOT NULL,
  `itemtotal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderslist`
--

INSERT INTO `orderslist` (`id`, `orderid`, `itemname`, `itemquantity`, `itemquantitytype`, `Mquantity`, `itemprice`, `itemtotal`) VALUES
(99, '500054', 'Chicken Masala', '100', 'Grams', '2', '65', '65'),
(100, '500054', 'Strawberry', '1', 'Kg', '3', '99', '99'),
(101, '500055', 'Strawberry', '1', 'Kg', '2', '99', '99'),
(102, '500056', 'Orange', '1', 'Kg', '1', '45', '45'),
(103, '500056', 'Grapes', '1', 'Kg', '1', '60', '60'),
(104, '500057', 'Strawberry', '1', 'Kg', '1', '99', '99');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `cost`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `area`, `address`, `mobile`) VALUES
(52, 'Ajay', 'Randhwa', 'Police Line', 'Tarn Taran', '7986568931'),
(53, 'Ajaypal Singh', 'Singh', 'Guru Teg bahadur Nagar', 'Tarn Taran', '7696355852'),
(54, 'Ajaypal Singh', 'fdfdf', 'Ranjit Avenue', 'Tarn Taran', '769655852'),
(55, 'Ajaypal Singh', 'fdfdf', 'Ranjit Avenue', 'Tarn Taran', '769655852');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `orderslist`
--
ALTER TABLE `orderslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500058;

--
-- AUTO_INCREMENT for table `orderslist`
--
ALTER TABLE `orderslist`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
