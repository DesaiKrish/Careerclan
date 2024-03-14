-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 12:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careerclan`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `age` int(100) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `phone_number` varchar(60) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `vacancy_company` varchar(60) NOT NULL,
  `jobtitle` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `username`, `name`, `email`, `city`, `age`, `profession`, `phone_number`, `date`, `vacancy_company`, `jobtitle`) VALUES
(41, 'ddu', 'ddu', 'ddu@gmail.com', 'sdfgs', 56, 'xyz', '23456788', '2023-06-04', 'apple', 'data scientist'),
(45, 'krish', 'krish desai', 'krish@gmail.com', 'nadiad', 19, 'web developer', '9876543210', '2023-06-04', 'apple', 'data scientist'),
(52, 'hitarth', 'hitarth', 'hitarth@gmail.com', 'rajkot', 90, 'Data analysis', '12345678', '2023-06-10', 'amazon', 'web developer'),
(53, 'hitarth', 'hitarth', 'hitarth@gmail.com', 'ahmedabad', 20, 'data analysis', '12345678', '2023-06-26', 'microsoft', 'machine learning'),
(58, 'dhruvil', 'dhruvil dhamsaniya', 'dhruvil@gmail.com', 'rajkot', 21, 'machine learning', '1234567890', '2023-06-27', 'microsoft', 'machine learning'),
(61, 'dhruvil', 'dhruvil dhamsaniya', 'dhruvil@gmail.com', 'rajkot', 21, 'machine learning', '1234567890', '2023-07-01', 'apple', 'Artificial intelligence'),
(62, 'jaimin', 'jaimin dhamsaniya', 'jaiminpatel18371@gmail.com', 'karamsad', 23, 'cyber security', '08320099514', '2023-07-01', 'amazon', 'cyber security'),
(63, 'dhruvil', 'dhruvil dhamsaniya', 'dhruvil@gmail.com', 'rajkot', 21, 'machine learning', '8160989390', '2023-07-15', 'amazon', 'web developer');

-- --------------------------------------------------------

--
-- Table structure for table `compsignin`
--

CREATE TABLE `compsignin` (
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compsignin`
--

INSERT INTO `compsignin` (`email`, `password`, `companyname`) VALUES
('amazon@gmail.com', 'amazon', 'amazon'),
('apple@gmail.com', 'apple', 'apple'),
('22ceuos004@ddu.ac.in', 'dhruvil', 'Dhruvil D.'),
('microsoft@gmail.com', 'microsoft', 'microsoft');

-- --------------------------------------------------------

--
-- Table structure for table `employee_profile`
--

CREATE TABLE `employee_profile` (
  `id` int(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `age` int(100) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `dreamcompany` varchar(60) NOT NULL,
  `expectedsalary` varchar(60) NOT NULL,
  `phone_number` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_profile`
--

INSERT INTO `employee_profile` (`id`, `username`, `name`, `email`, `city`, `age`, `profession`, `dreamcompany`, `expectedsalary`, `phone_number`) VALUES
(1, 'aryan', 'aryan', 'aryan@gmail.com', 'rajkot', 20, 'c++', 'applee', '250000', '64843939'),
(2, 'dhruvil', 'dhruvil dhamsaniya', 'dhruvil@gmail.com', 'rajkot', 21, 'machine learning', 'amazon', '300000', '8160989390'),
(4, 'ivar', 'ragnar lothbrok', 'ragnar@gmail.com', 'rajkot', 18, 'web developer', 'microsoft', '2500000', '987654321'),
(5, 'krish', 'krish desai', 'krish@gmail.com', 'nadiad', 19, 'web developer', 'microsoft', '200000', '9876543210'),
(6, 'ddu', 'ddu', 'ddu@gmail.com', 'sdfgs', 56, 'web developer', 'amazon', '12355', '23456788'),
(7, 'hitarth', 'hitarth', 'hitarth@gmail.com', 'ahmedabad', 20, 'data analysis', 'apple', '250000', '12345678'),
(8, 'jaimin', 'jaimin dhamsaniya', 'jaiminpatel18371@gmail.com', 'karamsad', 23, 'cyber security', 'google', '300000', '08320099514');

-- --------------------------------------------------------

--
-- Table structure for table `hired_you`
--

CREATE TABLE `hired_you` (
  `id` int(11) NOT NULL,
  `companyname` varchar(60) NOT NULL,
  `hired` varchar(60) NOT NULL,
  `occupationtitle` varchar(30) NOT NULL,
  `req_no_employees` int(11) NOT NULL,
  `salary` varchar(60) NOT NULL,
  `qualification_experience` text NOT NULL,
  `jobdescribtion` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hired_you`
--

INSERT INTO `hired_you` (`id`, `companyname`, `hired`, `occupationtitle`, `req_no_employees`, `salary`, `qualification_experience`, `jobdescribtion`, `date`) VALUES
(17, 'microsoft', 'krish', 'machine learning', 1, '100000.00', '  m-tech,4 years exp', 'work with python', '2023-06-10'),
(20, 'apple', 'krish', 'Artificial intelligence', 5, '400000', ' macine learning', 'complex algorithms ', '2023-06-27'),
(21, 'apple', 'krish', 'Artificial intelligence', 5, '400000', ' macine learning', 'complex algorithms ', '2023-06-27'),
(22, 'apple', 'krish', 'Artificial intelligence', 5, '400000', ' macine learning', 'complex algorithms ', '2023-06-27'),
(23, 'apple', 'krish', 'Artificial intelligence', 5, '400000', ' macine learning', 'complex algorithms ', '2023-06-27'),
(24, 'apple', 'ivar', 'Artificial intelligence', 5, '400000', ' macine learning', 'complex algorithms ', '2023-06-27'),
(37, 'amazon', 'dhruvil', 'web developer', 7, '2500000.00', '     m-tech', 'work ethic', '2023-06-28'),
(38, 'amazon', 'dhruvil', 'cyber security', 3, '100000', ' m-tech,4 years exp', 'ethical hacking', '2023-06-28'),
(40, 'amazon', 'krish', 'web developer', 7, '2500000.00', '     m-tech', 'work ethic', '2023-06-28'),
(41, 'amazon', 'krish', 'cyber security', 3, '100000', ' m-tech,4 years exp', 'ethical hacking', '2023-06-28'),
(45, 'amazon', 'aryan', 'web developer', 7, '2500000.00', '     m-tech', 'work ethic', '2023-06-29'),
(46, 'amazon', 'aryan', 'cyber security', 3, '100000', ' m-tech,4 years exp', 'ethical hacking', '2023-06-29'),
(47, 'microsoft', 'dhruvil', 'machine learning', 1, '200000.00', '   m-tech,4 years exp', 'work with python', '2023-06-30'),
(48, 'amazon', 'hitarth', 'web developer', 7, '2500000.00', '     m-tech', 'work ethic', '2023-07-01'),
(49, 'amazon', 'hitarth', 'cyber security', 3, '100000', ' m-tech,4 years exp', 'ethical hacking', '2023-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `username`) VALUES
('aryan@gmail.com', 'aryan', 'aryan'),
('bhuva@com', '123', 'bhuva'),
('ddu@gmail.com', 'ddu', 'ddu'),
('dhruvil@gmail.com', 'dhruvil', 'dhruvil'),
('hitarth@gmail.com', 'hitarth', 'hitarth'),
('ragnar@gmail.com', 'ragnar', 'ivar'),
('jaiminpatel18371@gmail.com', 'jaimin', 'jaimin'),
('krish@gmail.com', 'krish', 'krish');

-- --------------------------------------------------------

--
-- Table structure for table `vacancyform`
--

CREATE TABLE `vacancyform` (
  `id` int(11) NOT NULL,
  `companyname` varchar(60) NOT NULL,
  `occupationtitle` varchar(30) NOT NULL,
  `req_no_employees` int(11) NOT NULL,
  `salary` varchar(60) NOT NULL,
  `qualification_experience` varchar(100) NOT NULL,
  `jobdescribtion` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancyform`
--

INSERT INTO `vacancyform` (`id`, `companyname`, `occupationtitle`, `req_no_employees`, `salary`, `qualification_experience`, `jobdescribtion`, `date`) VALUES
(19, 'amazon', 'web developer', 7, '250000.00', '     m-tech', 'work ethic', '2023-06-04'),
(24, 'microsoft', 'machine learning', 1, '200000.00', '   m-tech,4 years exp', 'work with python', '2023-06-10'),
(25, 'apple', 'Artificial intelligence', 5, '400000', ' macine learning', 'complex algorithms ', '2023-06-26'),
(26, 'amazon', 'cyber security', 3, '100000', ' m-tech,4 years exp', 'ethical hacking', '2023-06-26'),
(27, 'Dhruvil D.', 'app designer', 5, '100000', '    b-tech', 'python,css,javascript', '2023-07-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compsignin`
--
ALTER TABLE `compsignin`
  ADD PRIMARY KEY (`companyname`);

--
-- Indexes for table `employee_profile`
--
ALTER TABLE `employee_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hired_you`
--
ALTER TABLE `hired_you`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vacancyform`
--
ALTER TABLE `vacancyform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `occupationtitle` (`occupationtitle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `employee_profile`
--
ALTER TABLE `employee_profile`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hired_you`
--
ALTER TABLE `hired_you`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `vacancyform`
--
ALTER TABLE `vacancyform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
