-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 11:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickfix pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

CREATE TABLE `admin_credentials` (
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`USERNAME`, `PASSWORD`) VALUES
('Shee ', 'shee254');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer ID` decimal(6,0) NOT NULL,
  `First Name` varchar(30) NOT NULL,
  `Last Name` varchar(30) NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Payment method` varchar(20) NOT NULL,
  `Phone number` int(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer ID`, `First Name`, `Last Name`, `Product`, `Payment method`, `Phone number`, `Date`) VALUES
(987102, 'James', 'Mwangi', 'Asprin', 'Card', 2147483647, '2023-11-21'),
(987103, 'Arnold', 'Nyamongo', 'Centrizine ', 'Mobile', 2147483647, '2023-11-22'),
(987104, 'Elizabeth', 'Bennet', 'Piriton', 'Cash', 2147483647, '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `INVOICE ID` int(11) NOT NULL,
  `INVOICE DATE` date NOT NULL,
  `CUSTOMER ID` int(11) NOT NULL,
  `MEDICINE NAME` text NOT NULL,
  `TOTAL AMOUNT` int(50) NOT NULL,
  `PAYMENT METHOD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE ID`, `INVOICE DATE`, `CUSTOMER ID`, `MEDICINE NAME`, `TOTAL AMOUNT`, `PAYMENT METHOD`) VALUES
(1, '2023-05-01', 101, 'Aspirin', 700, 'Cash'),
(2, '2023-05-02', 102, 'Ibuprofen', 1000, 'Credit Card'),
(3, '2023-05-03', 103, 'Paracetamol', 1500, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `meds`
--

CREATE TABLE `meds` (
  `Medicine Name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL,
  `Expiry Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meds`
--

INSERT INTO `meds` (`Medicine Name`, `Quantity`, `Category`, `Price`, `Expiry Date`) VALUES
('Dolo 650 MG', 129, 'Tablet', 100, '2023-11-20'),
('Panadol Cold & Flu', 90, 'Tablet', 300, '2023-12-15'),
('Livogen', 25, 'Capsule', 500, '2024-03-01'),
('Gelusil', 438, 'Tablet', 1000, '2024-06-30'),
('Cyclopam', 80, 'Tablet', 600, '2024-09-01'),
('Benadryl 200 ML', 35, 'Syrup', 1500, '2025-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `Medicine Name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Supplier` varchar(255) NOT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Date of Purchase` date NOT NULL,
  `Expiry Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`Medicine Name`, `Category`, `Supplier`, `Cost`, `Quantity`, `Date of Purchase`, `Expiry Date`) VALUES
('Amoxicillin', 'Antibiotics ', 'Acme Pharmaceuticals', 2000, 500, '2024-02-13', '2028-06-14'),
('Asprin', 'Pain relievers', 'Kemsa', 500, 400, '2024-11-12', '2024-11-20'),
('Brufen', 'Pain killers', 'Medica Suppliers', 59, 8, '2024-11-15', '2027-06-10'),
('Celestamine', 'Pain killers', 'Kemsa', 150, 700, '2024-11-06', '2026-10-14'),
('Ibuprofen', 'Pain Relievers', 'Medica Supplies', 7, 80, '2022-06-08', '2027-11-11'),
('mara moja', 'painkiller', 'Dawa Limited', 1400, 5, '2024-11-05', '2028-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Medicine Name` varchar(255) NOT NULL,
  `Customer ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total price` int(11) NOT NULL,
  `Payment method` varchar(50) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Medicine Name`, `Customer ID`, `Quantity`, `Total price`, `Payment method`, `Date`) VALUES
('Paracetamol', 987101, 20, 50, 'Cash', '2023-11-20'),
('Ibuprofen', 987102, 5, 25, 'Card', '2023-11-21'),
('Aspirin', 987103, 8, 40, 'Mobile Money', '2023-11-22'),
('Vitamin C', 987104, 12, 60, 'Cash', '2023-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Product` varchar(255) NOT NULL,
  `Product Quantity` int(11) NOT NULL,
  `Supplier Name` varchar(255) NOT NULL,
  `Supplier Phone` varchar(20) NOT NULL,
  `Supplier Email` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Product`, `Product Quantity`, `Supplier Name`, `Supplier Phone`, `Supplier Email`, `Location`) VALUES
('Asprin', 300, ' Kemsa', '9876543210', 'xyz@gmail.com', 'Mombasa'),
('Paracetamol ', 500, 'Acme Pharmaceuticals ', '1234567890', 'ap@gmail.com', 'Nairobi'),
('Celestamine', 700, 'Kemsa', '33567678', 'ab@gmail.com', 'Nairobi'),
('Panadol', 800, 'Dawa limited ', '55896555', 'pq@gmail.com', 'Kisumu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`Medicine Name`),
  ADD KEY `Category` (`Category`),
  ADD KEY `Supplier` (`Supplier`),
  ADD KEY `Expiry Date` (`Date of Purchase`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
