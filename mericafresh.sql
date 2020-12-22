

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `admin_image` varchar(200) DEFAULT NULL,
  `admin_status` enum('0','1') DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL
) 

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_status`, `created_at`, `updated_at`) VALUES
(1, 'Merica', 'mericafresh1@gmail.com', 'fa84deb7c900b6fa6ba47f24237f4a31', 'admin.jpg', '1', '2020-10-22', '2020-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `category_status` enum('0','1') DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
)

--
-- Dumping data for table `category`
--
-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `f_id` int(11) NOT NULL,
  `farmer_id` varchar(200) DEFAULT NULL,
  `farmer_name` varchar(200) DEFAULT NULL,
  `farmer_email` varchar(200) DEFAULT NULL,
  `farmer_phone` varchar(200) DEFAULT NULL,
  `farmer_website` varchar(200) DEFAULT NULL,
  `farmer_owner` varchar(200) DEFAULT NULL,
  `farmer_mobile` varchar(20) DEFAULT NULL,
  `farmer_status` enum('0','1') DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `farmer_bussiness_type` varchar(200) DEFAULT NULL,
  `fb_url` varchar(200) DEFAULT NULL,
  `instagram_url` varchar(200) DEFAULT NULL,
  `cultivable_land` int(11) DEFAULT NULL
) 



CREATE TABLE `farmer_address` (
  `address_id` int(11) NOT NULL,
  `farmer_country` varchar(200) DEFAULT NULL,
  `farmer_state` varchar(200) DEFAULT NULL,
  `farmer_city` varchar(200) DEFAULT NULL,
  `farmer_address` varchar(200) DEFAULT NULL,
  `farmer_zip` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `update_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL
) 


CREATE TABLE `farmer_product` (
  `fp_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL
) 

-- --------------------------------------------------------

--
-- Table structure for table `produce_image`
--

CREATE TABLE `produce_image` (
  `image_id` int(11) NOT NULL,
  `produce_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image_name` varchar(200) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL
) 

--
-- Dumping data for table `produce_image`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_category` int(11) DEFAULT NULL,
  `product_status` enum('0','1') DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `product_image1` varchar(200) DEFAULT NULL
) 

--
-- Dumping data for table `product`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produce_id` int(11) NOT NULL,
  `price` int(200) DEFAULT NULL,
  `unit_metrics` varchar(200) DEFAULT NULL,
  `packaging` varchar(200) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `type` enum('0','1') DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `created_at` varchar(200) DEFAULT NULL
) 

--
-- Dumping data for table `user_product`
--


-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `farmer_address`
--
ALTER TABLE `farmer_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `farmer_product`
--
ALTER TABLE `farmer_product`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indexes for table `produce_image`
--
ALTER TABLE `produce_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `farmer_address`
--
ALTER TABLE `farmer_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer_product`
--
ALTER TABLE `farmer_product`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produce_image`
--
ALTER TABLE `produce_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `farmer_address`
--
ALTER TABLE `farmer_address`
  ADD CONSTRAINT `farmer_address_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `farmer` (`f_id`);
COMMIT;
