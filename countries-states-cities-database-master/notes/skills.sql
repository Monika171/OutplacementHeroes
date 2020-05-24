-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 05:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_lar`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skills` varchar(40) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skills`, `created_at`, `updated_at`) VALUES
(4, 'Active Listening', '0000-00-00', '0000-00-00'),
(5, 'Accounting', '0000-00-00', '0000-00-00'),
(6, 'Tally', '0000-00-00', '0000-00-00'),
(7, 'Adaptability', '0000-00-00', '0000-00-00'),
(8, 'Communication', '0000-00-00', '0000-00-00'),
(9, 'Creativity', '0000-00-00', '0000-00-00'),
(10, 'Critical Thinking', '0000-00-00', '0000-00-00'),
(11, 'Customer Service', '0000-00-00', '0000-00-00'),
(12, 'Decision Making', '0000-00-00', '0000-00-00'),
(13, 'Interpersonal Communication', '0000-00-00', '0000-00-00'),
(14, 'Management', '0000-00-00', '0000-00-00'),
(15, 'Leadership', '0000-00-00', '0000-00-00'),
(16, 'Organization', '0000-00-00', '0000-00-00'),
(17, 'Public Speaking', '0000-00-00', '0000-00-00'),
(18, 'Problem-solving', '0000-00-00', '0000-00-00'),
(19, 'Teamwork', '0000-00-00', '0000-00-00'),
(20, 'Data Entry', '0000-00-00', '0000-00-00'),
(21, 'Answering Phones', '0000-00-00', '0000-00-00'),
(22, 'Billing', '0000-00-00', '0000-00-00'),
(23, 'Scheduling', '0000-00-00', '0000-00-00'),
(24, 'MS Office', '0000-00-00', '0000-00-00'),
(25, 'Office Equipment', '0000-00-00', '0000-00-00'),
(26, 'QuickBooks', '0000-00-00', '0000-00-00'),
(27, 'Shipping', '0000-00-00', '0000-00-00'),
(28, 'Welcoming Visitors', '0000-00-00', '0000-00-00'),
(29, 'Salesforce', '0000-00-00', '0000-00-00'),
(30, 'Calendar Management', '0000-00-00', '0000-00-00'),
(31, 'Product Knowledge', '0000-00-00', '0000-00-00'),
(32, 'Lead Qualification', '0000-00-00', '0000-00-00'),
(33, 'Lead Prospecting', '0000-00-00', '0000-00-00'),
(34, 'Customer Needs Analysis', '0000-00-00', '0000-00-00'),
(35, 'Referral Marketing', '0000-00-00', '0000-00-00'),
(36, 'Contract Negotiation', '0000-00-00', '0000-00-00'),
(37, 'Self Motivation', '0000-00-00', '0000-00-00'),
(38, 'Increasing Customer Lifetime Value (CLV)', '0000-00-00', '0000-00-00'),
(39, 'Reducing Customer Acquisition Cost (CAC)', '0000-00-00', '0000-00-00'),
(40, 'CRM Software (Salesforce, Hubspot, Zoho,', '0000-00-00', '0000-00-00'),
(41, 'POS Skills', '0000-00-00', '0000-00-00'),
(42, 'Cashier Skills', '0000-00-00', '0000-00-00'),
(43, 'Patient Assessment', '0000-00-00', '0000-00-00'),
(44, 'Taking Vital Signs', '0000-00-00', '0000-00-00'),
(45, 'Patient Care', '0000-00-00', '0000-00-00'),
(46, 'Recording Patient Medical History', '0000-00-00', '0000-00-00'),
(47, 'Wound Dressing and Care', '0000-00-00', '0000-00-00'),
(48, 'Urgent and Emergency Care', '0000-00-00', '0000-00-00'),
(49, 'Record-Keeping', '0000-00-00', '0000-00-00'),
(50, 'Patient Education', '0000-00-00', '0000-00-00'),
(51, 'NIH Stroke Scale Patient Assessment', '0000-00-00', '0000-00-00'),
(52, 'Electronic Medical Record (EMR)', '0000-00-00', '0000-00-00'),
(53, 'Medicine Administration', '0000-00-00', '0000-00-00'),
(54, 'Blood Pressure Monitoring', '0000-00-00', '0000-00-00'),
(55, 'Phlebotomy', '0000-00-00', '0000-00-00'),
(56, 'Rehabilitation Therapy', '0000-00-00', '0000-00-00'),
(57, 'Hygiene Assistance', '0000-00-00', '0000-00-00'),
(58, 'Use of X-Ray, MRI, CAT Scans', '0000-00-00', '0000-00-00'),
(59, 'Meditech', '0000-00-00', '0000-00-00'),
(60, 'Glucose Checks', '0000-00-00', '0000-00-00'),
(61, 'Electronic Heart Record (EHR)', '0000-00-00', '0000-00-00'),
(62, 'Programming Languages', '0000-00-00', '0000-00-00'),
(63, 'Web Development', '0000-00-00', '0000-00-00'),
(64, 'Data Structures', '0000-00-00', '0000-00-00'),
(65, 'Open Source Experience', '0000-00-00', '0000-00-00'),
(66, 'Java Script', '0000-00-00', '0000-00-00'),
(67, 'Machine Learning', '0000-00-00', '0000-00-00'),
(68, 'Debugging', '0000-00-00', '0000-00-00'),
(69, 'UX/UI', '0000-00-00', '0000-00-00'),
(70, 'Front-End & Back-End Development', '0000-00-00', '0000-00-00'),
(71, 'Cloud Management', '0000-00-00', '0000-00-00'),
(72, 'Agile Development', '0000-00-00', '0000-00-00'),
(73, 'STEM Skills', '0000-00-00', '0000-00-00'),
(74, 'CAD', '0000-00-00', '0000-00-00'),
(75, 'Design', '0000-00-00', '0000-00-00'),
(76, 'Prototyping', '0000-00-00', '0000-00-00'),
(77, 'Testing', '0000-00-00', '0000-00-00'),
(78, 'Troubleshooting', '0000-00-00', '0000-00-00'),
(79, 'Project Launch', '0000-00-00', '0000-00-00'),
(80, 'Lean Manufacturing', '0000-00-00', '0000-00-00'),
(81, 'Workflow Development', '0000-00-00', '0000-00-00'),
(82, 'Computer Skills', '0000-00-00', '0000-00-00'),
(83, 'SolidWorks', '0000-00-00', '0000-00-00'),
(84, 'Budgeting', '0000-00-00', '0000-00-00'),
(85, 'Technical Report Writing', '0000-00-00', '0000-00-00'),
(86, 'SEO/SEM', '0000-00-00', '0000-00-00'),
(87, 'PPC', '0000-00-00', '0000-00-00'),
(88, 'CRO', '0000-00-00', '0000-00-00'),
(89, 'A/B Testing', '0000-00-00', '0000-00-00'),
(90, 'Social Media Marketing and Paid Social M', '0000-00-00', '0000-00-00'),
(91, 'Sales Funnel Management', '0000-00-00', '0000-00-00'),
(92, 'CMS Tools', '0000-00-00', '0000-00-00'),
(93, 'Graphic Design Skills', '0000-00-00', '0000-00-00'),
(94, 'Email Marketing', '0000-00-00', '0000-00-00'),
(95, 'Email Automation', '0000-00-00', '0000-00-00'),
(96, 'Data Visualization', '0000-00-00', '0000-00-00'),
(97, 'CPC', '0000-00-00', '0000-00-00'),
(98, 'Typography', '0000-00-00', '0000-00-00'),
(99, 'Print Design', '0000-00-00', '0000-00-00'),
(100, 'Photography and Branding', '0000-00-00', '0000-00-00'),
(101, 'Agile', '0000-00-00', '0000-00-00'),
(102, 'Managing Cross-Functional Teams', '0000-00-00', '0000-00-00'),
(103, 'Scrum', '0000-00-00', '0000-00-00'),
(104, 'Performance Tracking', '0000-00-00', '0000-00-00'),
(105, 'Financial Modelling', '0000-00-00', '0000-00-00'),
(106, 'Ideation Leadership', '0000-00-00', '0000-00-00'),
(107, 'Feature Definition', '0000-00-00', '0000-00-00'),
(108, 'Forecasting', '0000-00-00', '0000-00-00'),
(109, 'Profit and Loss', '0000-00-00', '0000-00-00'),
(110, 'Scope Management', '0000-00-00', '0000-00-00'),
(111, 'Project Lifecycle Management', '0000-00-00', '0000-00-00'),
(112, 'Meeting Facilitation', '0000-00-00', '0000-00-00'),
(113, 'SQL', '0000-00-00', '0000-00-00'),
(114, 'Java', '0000-00-00', '0000-00-00'),
(115, 'Coding', '0000-00-00', '0000-00-00'),
(116, 'C#', '0000-00-00', '0000-00-00'),
(117, 'Python', '0000-00-00', '0000-00-00'),
(118, 'Security', '0000-00-00', '0000-00-00'),
(119, 'C++', '0000-00-00', '0000-00-00'),
(120, 'Math', '0000-00-00', '0000-00-00'),
(121, 'PHP', '0000-00-00', '0000-00-00'),
(122, 'Logic', '0000-00-00', '0000-00-00'),
(123, 'IOS', '0000-00-00', '0000-00-00'),
(124, 'Networks', '0000-00-00', '0000-00-00'),
(125, 'Ruby/Rails', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
