-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 06:10 PM
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
-- Database: `disaster preparedness - group 26`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `firstname` varchar(90) NOT NULL,
  `lastname` varchar(90) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(320) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `firstname`, `lastname`, `email`, `password`, `gender`) VALUES
('admin1', 'Admin', 'One', 'admin1@example.com', 'hashed_password1', ''),
('admin2', 'Admin', 'Two', 'admin2@example.com', 'hashed_password2', ''),
('admin3', 'Admin', 'Three', 'admin3@example.com', 'hashed_password3', '');

-- --------------------------------------------------------

--
-- Table structure for table `communication_channels`
--

CREATE TABLE `communication_channels` (
  `channel_id` varchar(20) NOT NULL,
  `region_ID` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communication_channels`
--

INSERT INTO `communication_channels` (`channel_id`, `region_ID`, `name`, `description`) VALUES
('CH000001', 'REGION000001', 'Local News Channel', 'Broadcasts news and updates relevant to the region'),
('CH000002', 'REGION000002', 'Emergency Radio', 'Provides emergency alerts and information during disasters'),
('CH000003', 'REGION000003', 'Community Bulletin Board', 'Platform for community members to share information and resources'),
('CH000004', 'REGION000004', 'Social Media Group', 'Online community for sharing updates and coordinating responses'),
('CH000005', 'REGION000005', 'Mobile Alerts Service', 'Sends SMS alerts and notifications to subscribed users'),
('CH000006', 'REGION000001', 'Community Emergency Hotline', 'Provides assistance and information during emergencies'),
('CH000007', 'REGION000002', 'Public Address System', 'Loudspeaker system used for broadcasting alerts and instructions'),
('CH000008', 'REGION000003', 'Neighborhood Watch Group', 'Community organization for reporting suspicious activities and emergencies'),
('CH000009', 'REGION000004', 'Volunteer Network', 'Platform for coordinating volunteers during disaster response'),
('CH000010', 'REGION000005', 'Online Forum', 'Virtual space for community discussions and information sharing');

-- --------------------------------------------------------

--
-- Table structure for table `decision_support_system`
--

CREATE TABLE `decision_support_system` (
  `decision_support_id` varchar(20) NOT NULL,
  `region_ID` varchar(20) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `recommended_action` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `decision_support_system`
--

INSERT INTO `decision_support_system` (`decision_support_id`, `region_ID`, `time`, `recommended_action`) VALUES
('DS000001', 'REGION000001', '2024-03-16 02:00:00', 'Evacuate to designated shelters immediately'),
('DS000002', 'REGION000002', '2024-03-17 06:00:00', 'Secure loose objects and take shelter in a safe location'),
('DS000003', 'REGION000003', '2024-03-18 09:00:00', 'Prepare emergency supplies and stay informed about evacuation orders'),
('DS000004', 'REGION000004', '2024-03-19 04:30:00', 'Follow local authorities instructions and stay indoors'),
('DS000005', 'REGION000005', '2024-03-20 08:45:00', 'Stay away from flood-prone areas and avoid driving through flooded roads'),
('DS000006', 'REGION000001', '2024-03-21 03:00:00', 'Seek higher ground if in flood-prone areas'),
('DS000007', 'REGION000002', '2024-03-22 07:30:00', 'Check emergency supplies and review evacuation plan'),
('DS000008', 'REGION000003', '2024-03-23 10:45:00', 'Stay indoors and avoid unnecessary travel during severe weather'),
('DS000009', 'REGION000004', '2024-03-24 05:15:00', 'Monitor local news for updates and instructions from authorities'),
('DS000010', 'REGION000005', '2024-03-25 08:00:00', 'Secure outdoor objects and prepare for strong winds');

-- --------------------------------------------------------

--
-- Table structure for table `disaster`
--

CREATE TABLE `disaster` (
  `disaster_ID` varchar(20) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Severity` varchar(50) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Time` datetime NOT NULL,
  `Predicted_impact` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disaster`
--

INSERT INTO `disaster` (`disaster_ID`, `Type`, `Severity`, `Location`, `Time`, `Predicted_impact`) VALUES
('DIS000001', 'Earthquake', 'High', 'San Francisco, CA', '2024-03-18 16:38:33', 'Severe damage to infrastructure expected'),
('DIS000002', 'Hurricane', 'Medium', 'Miami, FL', '2024-03-16 16:39:00', 'Moderate flooding anticipated'),
('DIS000003', 'Wildfire', 'High', 'Los Angeles, CA', '2024-04-11 16:40:15', 'Potential evacuation orders in effect'),
('DIS000004', 'Flood', 'High', 'Tokyo, Japan', '2024-03-25 16:41:45', 'Severe flooding expected in low-lying areas'),
('DIS000005', 'Tornado', 'Medium', 'Sydney, Australia', '2024-04-14 16:43:20', 'Possible damage to buildings and infrastructure'),
('DIS000006', 'Volcanic eruption', 'High', 'Reykjavik, Iceland', '2024-04-12 16:45:55', 'Lava flow may affect nearby towns'),
('DIS000007', 'Typhoon', 'High', 'Manila, Philippines', '2024-04-05 16:48:10', 'Widespread destruction anticipated'),
('DIS000008', 'Blizzard', 'Medium', 'Toronto, Canada', '2024-04-04 16:50:30', 'Heavy snowfall and reduced visibility expected'),
('DIS000009', 'Drought', 'High', 'Cape Town, South Africa', '2024-03-21 16:52:45', 'Water shortages and crop failures likely'),
('DIS000010', 'Cyclone', 'High', 'Mumbai, India', '2024-04-14 16:55:00', 'Coastal areas at risk of storm surges and heavy rainfall'),
('DIS000011', 'Landslide', 'Medium', 'Rio de Janeiro, Brazil', '2024-03-27 16:57:20', 'Potential for road closures and property damage'),
('DIS000012', 'Tsunami', 'High', 'Jakarta, Indonesia', '2024-04-14 16:59:40', 'Large waves expected to hit coastal areas'),
('DIS000013', 'Avalanche', 'Medium', 'Oslo, Norway', '2024-04-07 17:02:00', 'Risk of snowslide in mountainous regions'),
('DIS000014', 'Cyclone', 'Medium', 'Dhaka, Bangladesh', '2024-03-28 21:25:00', 'Extreme flood in Bashundhara Residential Area'),
('DIS000015', 'Cyclone', 'Medium', 'Dhaka, Bangladesh', '2024-03-31 00:49:00', 'Flooding in dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `early_warning_system`
--

CREATE TABLE `early_warning_system` (
  `weather_data_id` varchar(20) NOT NULL,
  `region_ID` varchar(20) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  `disaster_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `early_warning_system`
--

INSERT INTO `early_warning_system` (`weather_data_id`, `region_ID`, `timestamp`, `disaster_ID`) VALUES
('WD000001', 'REGION000001', '2024-04-09 16:38:33', 'DIS000001'),
('WD000002', 'REGION000002', '2024-03-25 16:39:00', 'DIS000002'),
('WD000003', 'REGION000003', '2024-03-21 16:40:15', 'DIS000003'),
('WD000004', 'REGION000004', '2024-03-16 16:41:45', 'DIS000004'),
('WD000005', 'REGION000005', '2024-03-30 16:43:20', 'DIS000005');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_responders`
--

CREATE TABLE `emergency_responders` (
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `certification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `govt_agencies`
--

CREATE TABLE `govt_agencies` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `population`
--

CREATE TABLE `population` (
  `population_ID` varchar(20) NOT NULL,
  `Age_Group` varchar(50) DEFAULT NULL,
  `Special_Needs` varchar(50) DEFAULT NULL,
  `Health_Status` varchar(50) DEFAULT NULL,
  `Socioeconomic_Status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `population`
--

INSERT INTO `population` (`population_ID`, `Age_Group`, `Special_Needs`, `Health_Status`, `Socioeconomic_Status`) VALUES
('POPUL000001', 'Children (0-14)', 'None', 'Good', 'Middle class'),
('POPUL000002', 'Adults (15-64)', 'None', 'Good', 'Middle class'),
('POPUL000003', 'Elderly (65+)', 'Mobility impairments', 'Fair', 'Low income'),
('POPUL000004', 'Children (0-14)', 'Chronic illness', 'Fair', 'Low income'),
('POPUL000005', 'Adults (15-64)', 'Physical disabilities', 'Good', 'Upper class'),
('POPUL000006', 'Elderly (65+)', 'None', 'Poor', 'Middle class'),
('POPUL000007', 'Children (0-14)', 'Developmental disabilities', 'Good', 'Middle class'),
('POPUL000008', 'Adults (15-64)', 'None', 'Excellent', 'Upper class'),
('POPUL000009', 'Elderly (65+)', 'Chronic illness', 'Poor', 'Low income'),
('POPUL000010', 'Children (0-14)', 'None', 'Excellent', 'Upper class');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_ID` varchar(20) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Population` int(11) DEFAULT NULL,
  `Vulnerability` varchar(50) DEFAULT NULL,
  `Infrastructure` varchar(100) DEFAULT NULL,
  `Historical_disaster_data` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_ID`, `Name`, `Population`, `Vulnerability`, `Infrastructure`, `Historical_disaster_data`) VALUES
('REGION000001', 'San Francisco Bay Area', 884363, 'High', 'Extensive urban infrastructure', 'Frequent earthquakes and wildfires'),
('REGION000002', 'Greater Jakarta', 34260000, 'High', 'Complex transportation networks', 'Frequent flooding and tsunamis'),
('REGION000003', 'Tokyo Metropolitan Area', 13929286, 'High', 'Highly developed transportation network', 'Frequent earthquakes and typhoons'),
('REGION000004', 'Sydney Region', 5312163, 'Medium', 'Modern urban infrastructure', 'Occasional bushfires and storms'),
('REGION000005', 'Reykjavik Capital Region', 233034, 'Low', 'Well-developed utilities', 'Rare volcanic eruptions and avalanches'),
('REGION000006', 'Metro Manila', 13345000, 'High', 'Complex road and rail networks', 'Frequent typhoons and flooding'),
('REGION000007', 'Greater Toronto Area', 6110000, 'Medium', 'Advanced transportation systems', 'Occasional blizzards and ice storms'),
('REGION000008', 'Cape Town Metropolitan Area', 4336880, 'High', 'Modern infrastructure', 'Periodic droughts and wildfires'),
('REGION000009', 'Mumbai Metropolitan Region', 23355000, 'High', 'Extensive transportation and utilities', 'Regular cyclones and flooding'),
('REGION000010', 'Rio de Janeiro Metropolitan Area', 13200000, 'Medium', 'Urban infrastructure with favelas', 'Occasional landslides and floods');

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `field_of_study` varchar(255) NOT NULL,
  `research_interests` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `resource_ID` varchar(20) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Quality` varchar(50) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Source` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resource_ID`, `Type`, `Quality`, `Location`, `Status`, `Source`) VALUES
('RES000001', 'Water', 'Potable', 'San Francisco, CA', 'Available', 'Local water utility'),
('RES000002', 'Communication Devices', 'Modern', 'Jakarta, Indonesia', 'Limited', 'Local electronics store'),
('RES000003', 'Food', 'Fresh', 'Tokyo, Japan', 'Available', 'Local market'),
('RES000004', 'Medicine', 'High quality', 'Sydney, Australia', 'Limited', 'Local pharmacy'),
('RES000005', 'Shelter', 'Temporary', 'Reykjavik, Iceland', 'Available', 'Government aid agency'),
('RES000006', 'Medical Equipment', 'Advanced', 'Manila, Philippines', 'Unavailable', 'International aid organization'),
('RES000007', 'Clothing', 'New', 'Toronto, Canada', 'Available', 'Local charity'),
('RES000008', 'Construction Materials', 'Durable', 'Cape Town, South Africa', 'Limited', 'Local hardware store'),
('RES000009', 'Fuel', 'Regular', 'Mumbai, India', 'Available', 'Local gas station'),
('RES000010', 'Power Generators', 'Industrial grade', 'Rio de Janeiro, Brazil', 'Unavailable', 'Government emergency service');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_type` enum('admin','emergency_responder','researcher','govt_agency','user') NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(90) NOT NULL,
  `lastname` varchar(90) NOT NULL,
  `email` varchar(320) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_type`, `username`, `firstname`, `lastname`, `email`, `gender`, `password`) VALUES
('admin', '1111', 'Farsi', 'Zaman', 'f.zaman@gmail.com', 'Male', 'hello'),
('admin', '1112', 'Sadman', 'Rahman', 'sadmanrahman@gmail.com', 'Male', '123123'),
('admin', '1113', 'A. S. M Borhanul', 'Islam', 'iborhan36@gmail.com', 'Male', '112233123'),
('admin', '1114', 'John', 'Doe', 'john.doe@example.com', 'Male', 'adminpass'),
('admin', '1115', 'Jane', 'Smith', 'jane.smith@example.com', 'Female', 'admin123'),
('admin', '1116', 'Michael', 'Johnson', 'michael.johnson@example.com', 'Male', 'password'),
('user', 'borhan', 'Borhan', 'Islam', 'iborhan36@gmail.com', 'male', '112233'),
('user', 'borhan_gohan', 'Borhan', 'Islam', 'iborhan36@gmail.com', 'male', '112233'),
('emergency_responder', 'borhan_islam', 'A. S. M Borhanul', 'Islam', 'iborhan36@gmail.com', 'male', '123123'),
('user', 'charlotte_martinez', 'Charlotte', 'Martinez', 'charlotte.martinez@example.com', 'Female', 'password123'),
('user', 'emma_taylor', 'Emma', 'Taylor', 'emma.taylor@example.com', 'Female', 'userpass'),
('emergency_responder', 'ER001', 'Emily', 'Williams', 'emily.williams@example.com', 'Female', 'responderpass'),
('emergency_responder', 'ER002', 'Daniel', 'Brown', 'daniel.brown@example.com', 'Male', 'responder123'),
('govt_agency', 'GA001', 'Olivia', 'Miller', 'olivia.miller@example.com', 'Female', 'govtpass'),
('govt_agency', 'GA002', 'Benjamin', 'Wilson', 'benjamin.wilson@example.com', 'Male', 'agency123'),
('researcher', 'Limon', 'Limon', 'Limon', 'limon@gmail.com', 'Male', '123123'),
('user', 'limon islam', 'limon', 'islam', 'limon@gmail.com', 'Male', '123123'),
('researcher', 'R001', 'Sophia', 'Jones', 'sophia.jones@example.com', 'Female', 'researchpass'),
('researcher', 'R002', 'James', 'Davis', 'james.davis@example.com', 'Male', 'researcher123'),
('user', 'william_anderson', 'William', 'Anderson', 'william.anderson@example.com', 'Male', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `weather_ID` varchar(20) NOT NULL,
  `Temperature` decimal(5,2) DEFAULT NULL,
  `Humidity` decimal(5,2) DEFAULT NULL,
  `Wind_Speed` decimal(5,2) DEFAULT NULL,
  `Precipitation` decimal(5,2) DEFAULT NULL,
  `Forecast_Data` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`weather_ID`, `Temperature`, `Humidity`, `Wind_Speed`, `Precipitation`, `Forecast_Data`) VALUES
('WEATHER000001', 25.50, 65.30, 12.70, 0.00, 'Sunny with clear skies'),
('WEATHER000002', 18.20, 80.10, 6.50, 3.20, 'Partly cloudy with chance of showers'),
('WEATHER000003', 30.80, 45.60, 20.30, 0.00, 'Hot and dry conditions'),
('WEATHER000004', 10.10, 70.90, 15.20, 0.00, 'Cold with moderate winds'),
('WEATHER000005', 28.50, 75.00, 8.90, 0.00, 'Warm and humid with no precipitation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `communication_channels`
--
ALTER TABLE `communication_channels`
  ADD PRIMARY KEY (`channel_id`),
  ADD KEY `region_ID` (`region_ID`);

--
-- Indexes for table `decision_support_system`
--
ALTER TABLE `decision_support_system`
  ADD PRIMARY KEY (`decision_support_id`),
  ADD KEY `region_ID` (`region_ID`);

--
-- Indexes for table `disaster`
--
ALTER TABLE `disaster`
  ADD PRIMARY KEY (`disaster_ID`);

--
-- Indexes for table `early_warning_system`
--
ALTER TABLE `early_warning_system`
  ADD PRIMARY KEY (`weather_data_id`),
  ADD KEY `region_ID` (`region_ID`),
  ADD KEY `early_warning_system_ibfk_2` (`disaster_ID`);

--
-- Indexes for table `emergency_responders`
--
ALTER TABLE `emergency_responders`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `govt_agencies`
--
ALTER TABLE `govt_agencies`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `population`
--
ALTER TABLE `population`
  ADD PRIMARY KEY (`population_ID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_ID`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `resource`
--
ALTER TABLE `resource`
  ADD PRIMARY KEY (`resource_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`weather_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communication_channels`
--
ALTER TABLE `communication_channels`
  ADD CONSTRAINT `communication_channels_ibfk_1` FOREIGN KEY (`region_ID`) REFERENCES `region` (`region_ID`);

--
-- Constraints for table `decision_support_system`
--
ALTER TABLE `decision_support_system`
  ADD CONSTRAINT `decision_support_system_ibfk_1` FOREIGN KEY (`region_ID`) REFERENCES `region` (`region_ID`);

--
-- Constraints for table `early_warning_system`
--
ALTER TABLE `early_warning_system`
  ADD CONSTRAINT `early_warning_system_ibfk_1` FOREIGN KEY (`region_ID`) REFERENCES `region` (`region_ID`),
  ADD CONSTRAINT `early_warning_system_ibfk_2` FOREIGN KEY (`disaster_ID`) REFERENCES `disaster` (`disaster_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
