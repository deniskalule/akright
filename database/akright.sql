-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 11:53 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akright`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `booking_fee` double NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `property_id`, `client_id`, `booking_fee`, `booking_date`, `balance`) VALUES
(11, 4, 2, 5000000, '2023-06-09 12:01:17', 5000000),
(15, 6, 2, 3000000, '2023-06-09 12:22:37', 0),
(16, 5, 2, 3000000, '2023-06-09 12:23:58', 3000000),
(17, 2, 1, 3000000, '2023-06-15 18:16:22', 3000000),
(18, 6, 1, 3000000, '2023-06-15 18:36:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Bungalow'),
(3, 'Apartment'),
(4, 'rental');

-- --------------------------------------------------------

--
-- Table structure for table `client_table`
--

CREATE TABLE `client_table` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_table`
--

INSERT INTO `client_table` (`id`, `fname`, `lname`, `email`, `contact`, `address`, `password`, `image_url`, `creation_date`) VALUES
(1, 'Precious', 'Nalukenge', 'nalukengeprecious@gmail.com', '0758490918', 'Entebbe', '123', 'IMG-64833492256c38.48984705.jpeg', '2023-06-09 14:19:21'),
(2, 'Denis Jotham ', 'Kalule', 'denisjotham@gmail.com', '0756529118', 'Mukono', '234', 'IMG-64563f36d8f2a0.20463188.jpg', '2023-06-09 14:11:53'),
(3, 'Denis Jotham ', 'Kalule', 'denisjotham@gmail.com', '0756529118', 'Mukono', '123', 'IMG-645f7f326c8000.12444656.jpg', '2023-06-09 14:11:53'),
(4, 'Denis Jotham ', 'Kalule', 'denisjotham@gmail.com', '0756529118', 'Mukono', '123', 'IMG-6469d61e28eb15.63777436.jpg', '2023-06-09 14:11:53'),
(5, 'Denis Jotham ', 'Kalule', 'denisjotham@gmail.com', '0756529118', 'Mukono', '123456', 'IMG-6469d94eafdda5.12223963.jpg', '2023-06-09 14:11:53'),
(6, 'Denis Jotham ', 'Kalule', 'denisjotham@gmail.com', '0756529118', 'Mukono', '123456', 'IMG-6469da1e828005.24083133.jpg', '2023-06-09 14:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `property_table`
--

CREATE TABLE `property_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `no_of_rooms` int(255) NOT NULL,
  `no_of_garages` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `date_of_addition` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_table`
--

INSERT INTO `property_table` (`id`, `name`, `category_id`, `image_url`, `address`, `status`, `no_of_rooms`, `no_of_garages`, `description`, `type`, `price`, `date_of_addition`) VALUES
(1, 'Residential', 1, 'IMG-646a00fd9237f0.14435367.jpg', 'akright', '', 4, 2, 'pool', 'rent', 3000000, '2023-05-21 11:31:09'),
(2, 'rental', 1, 'IMG-646a06380d1357.39107450.jpg', 'Entebbe', '', 5, 2, 'bar', 'rent', 6000000, '2023-05-21 11:53:28'),
(3, 'apartment', 1, 'IMG-646dcdcc11dfc4.04375082.jpg', 'Entebbe', '', 6, 7, 'conference room', 'sale', 6000000, '2023-05-24 08:41:48'),
(4, 'hut', 1, 'IMG-646dceeb8be054.11836288.jpg', 'gayaza', '', 6, 3, 'boys quarters', 'rent', 10000000, '2023-05-24 08:46:35'),
(5, 'residence', 0, 'IMG-646dcfb25dfae9.46647341.jpg', 'Mukono', '', 6, 2, 'pools', 'sale', 6000000, '2023-05-24 08:49:54'),
(6, 'Hostel', 3, 'IMG-6471e075994053.24449502.jpg', 'Mukono', '', 8, 3, 'pool', 'sale', 3000000, '2023-05-27 10:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `email`, `image_url`, `password`, `creation_date`) VALUES
(1, 'Taremwa Danison', 'admin', 'admin@gmail.com', '', 'admin123', '2023-05-13 12:43:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_table`
--
ALTER TABLE `client_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_table`
--
ALTER TABLE `property_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `property_table`
--
ALTER TABLE `property_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
