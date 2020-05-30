-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 04:25 PM
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
  `skill` varchar(40) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`, `created_at`, `updated_at`) VALUES
(5, 'Accounting', '0000-00-00', '0000-00-00'),
(6, 'Tally', '0000-00-00', '0000-00-00'),
(7, 'Adaptability', '0000-00-00', '0000-00-00'),
(8, 'Communication', '0000-00-00', '0000-00-00'),
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
(66, 'Java Script', '0000-00-00', '0000-00-00'),
(113, 'SQL', '0000-00-00', '0000-00-00'),
(114, 'Java', '0000-00-00', '0000-00-00'),
(115, 'Coding', '0000-00-00', '0000-00-00'),
(116, 'C#', '0000-00-00', '0000-00-00'),
(117, 'Python', '0000-00-00', '0000-00-00'),
(119, 'C++', '0000-00-00', '0000-00-00'),
(120, 'Math', '0000-00-00', '0000-00-00'),
(121, 'PHP', '0000-00-00', '0000-00-00'),
(122, 'Logic', '0000-00-00', '0000-00-00'),
(123, 'IOS', '0000-00-00', '0000-00-00'),
(124, 'Networks', '0000-00-00', '0000-00-00'),
(125, 'Ruby/Rails', '0000-00-00', '0000-00-00'),
(126, 'Office and Administrative Jobs', '0000-00-00', '0000-00-00'),
(127, 'Data Entry', '0000-00-00', '0000-00-00'),
(128, 'Answering Phones', '0000-00-00', '0000-00-00'),
(129, 'Billing', '0000-00-00', '0000-00-00'),
(130, 'Scheduling', '0000-00-00', '0000-00-00'),
(131, 'MS Office', '0000-00-00', '0000-00-00'),
(132, 'Office Equipment', '0000-00-00', '0000-00-00'),
(133, 'QuickBooks', '0000-00-00', '0000-00-00'),
(134, 'Shipping', '0000-00-00', '0000-00-00'),
(135, 'Welcoming Visitors', '0000-00-00', '0000-00-00'),
(136, 'Salesforce', '0000-00-00', '0000-00-00'),
(137, 'Calendar Management', '0000-00-00', '0000-00-00'),
(138, 'Sales, Retail, and Customer Service Jobs', '0000-00-00', '0000-00-00'),
(139, 'Product Knowledge', '0000-00-00', '0000-00-00'),
(140, 'Lead Qualification', '0000-00-00', '0000-00-00'),
(141, 'Lead Prospecting', '0000-00-00', '0000-00-00'),
(142, 'Customer Needs Analysis', '0000-00-00', '0000-00-00'),
(143, 'Referral Marketing', '0000-00-00', '0000-00-00'),
(144, 'Contract Negotiation', '0000-00-00', '0000-00-00'),
(145, 'Self Motivation', '0000-00-00', '0000-00-00'),
(146, 'Increasing Customer Lifetime Value (CLV)', '0000-00-00', '0000-00-00'),
(147, 'Reducing Customer Acquisition Cost (CAC)', '0000-00-00', '0000-00-00'),
(148, 'CRM Software (Salesforce, Hubspot, Zoho,', '0000-00-00', '0000-00-00'),
(149, 'POS Skills', '0000-00-00', '0000-00-00'),
(150, 'Cashier Skills', '0000-00-00', '0000-00-00'),
(151, 'Nursing and Healthcare', '0000-00-00', '0000-00-00'),
(152, 'Patient Assessment', '0000-00-00', '0000-00-00'),
(153, 'Taking Vital Signs', '0000-00-00', '0000-00-00'),
(154, 'Patient Care', '0000-00-00', '0000-00-00'),
(155, 'Recording Patient Medical History', '0000-00-00', '0000-00-00'),
(156, 'Wound Dressing and Care', '0000-00-00', '0000-00-00'),
(157, 'Urgent and Emergency Care', '0000-00-00', '0000-00-00'),
(158, 'Record-Keeping', '0000-00-00', '0000-00-00'),
(159, 'Patient Education', '0000-00-00', '0000-00-00'),
(160, 'NIH Stroke Scale Patient Assessment', '0000-00-00', '0000-00-00'),
(161, 'Electronic Medical Record (EMR)', '0000-00-00', '0000-00-00'),
(162, 'Medicine Administration', '0000-00-00', '0000-00-00'),
(163, 'Blood Pressure Monitoring', '0000-00-00', '0000-00-00'),
(164, 'Phlebotomy', '0000-00-00', '0000-00-00'),
(165, 'Rehabilitation Therapy', '0000-00-00', '0000-00-00'),
(166, 'Hygiene Assistance', '0000-00-00', '0000-00-00'),
(167, 'Use of X-Ray, MRI, CAT Scans', '0000-00-00', '0000-00-00'),
(168, 'Meditech', '0000-00-00', '0000-00-00'),
(169, 'Glucose Checks', '0000-00-00', '0000-00-00'),
(170, 'Electronic Heart Record (EHR)', '0000-00-00', '0000-00-00'),
(171, 'IT Jobs', '0000-00-00', '0000-00-00'),
(172, 'Programming Languages', '0000-00-00', '0000-00-00'),
(173, 'Web Development', '0000-00-00', '0000-00-00'),
(174, 'Data Structures', '0000-00-00', '0000-00-00'),
(175, 'Open Source Experience', '0000-00-00', '0000-00-00'),
(176, 'CodingJava Script', '0000-00-00', '0000-00-00'),
(177, 'Security', '0000-00-00', '0000-00-00'),
(178, 'Machine Learning', '0000-00-00', '0000-00-00'),
(179, 'Debugging', '0000-00-00', '0000-00-00'),
(180, 'UX/UI', '0000-00-00', '0000-00-00'),
(181, 'Front-End & Back-End Development', '0000-00-00', '0000-00-00'),
(182, 'Cloud Management', '0000-00-00', '0000-00-00'),
(183, 'Agile Development', '0000-00-00', '0000-00-00'),
(184, 'Engineering & Technical Jobs', '0000-00-00', '0000-00-00'),
(185, 'STEM Skills', '0000-00-00', '0000-00-00'),
(186, 'CAD', '0000-00-00', '0000-00-00'),
(187, 'Design', '0000-00-00', '0000-00-00'),
(188, 'Prototyping', '0000-00-00', '0000-00-00'),
(189, 'Testing', '0000-00-00', '0000-00-00'),
(190, 'Troubleshooting', '0000-00-00', '0000-00-00'),
(191, 'Project Launch', '0000-00-00', '0000-00-00'),
(192, 'Lean Manufacturing', '0000-00-00', '0000-00-00'),
(193, 'Workflow Development', '0000-00-00', '0000-00-00'),
(194, 'Computer Skills', '0000-00-00', '0000-00-00'),
(195, 'SolidWorks', '0000-00-00', '0000-00-00'),
(196, 'Budgeting', '0000-00-00', '0000-00-00'),
(197, 'Technical Report Writing', '0000-00-00', '0000-00-00'),
(198, 'Advertising and Marketing', '0000-00-00', '0000-00-00'),
(199, 'SEO/SEM', '0000-00-00', '0000-00-00'),
(200, 'PPC', '0000-00-00', '0000-00-00'),
(201, 'CRO', '0000-00-00', '0000-00-00'),
(202, 'A/B Testing', '0000-00-00', '0000-00-00'),
(203, 'Social Media Marketing and Paid Social M', '0000-00-00', '0000-00-00'),
(204, 'Sales Funnel Management', '0000-00-00', '0000-00-00'),
(205, 'CMS Tools', '0000-00-00', '0000-00-00'),
(206, 'Graphic Design Skills', '0000-00-00', '0000-00-00'),
(207, 'Email Marketing', '0000-00-00', '0000-00-00'),
(208, 'Email Automation', '0000-00-00', '0000-00-00'),
(209, 'Data Visualization', '0000-00-00', '0000-00-00'),
(210, 'CPC', '0000-00-00', '0000-00-00'),
(211, 'Typography', '0000-00-00', '0000-00-00'),
(212, 'Print Design', '0000-00-00', '0000-00-00'),
(213, 'Photography and Branding', '0000-00-00', '0000-00-00'),
(214, 'General Management and Project Managemen', '0000-00-00', '0000-00-00'),
(215, 'Agile', '0000-00-00', '0000-00-00'),
(216, 'Managing Cross-Functional Teams', '0000-00-00', '0000-00-00'),
(217, 'Scrum', '0000-00-00', '0000-00-00'),
(218, 'Performance Tracking', '0000-00-00', '0000-00-00'),
(219, 'Financial Modelling', '0000-00-00', '0000-00-00'),
(220, 'Ideation Leadership', '0000-00-00', '0000-00-00'),
(221, 'Feature Definition', '0000-00-00', '0000-00-00'),
(222, 'Forecasting', '0000-00-00', '0000-00-00'),
(223, 'Profit and Loss', '0000-00-00', '0000-00-00'),
(224, 'Scope Management', '0000-00-00', '0000-00-00'),
(225, 'Project Lifecycle Management', '0000-00-00', '0000-00-00'),
(226, 'Meeting Facilitation', '0000-00-00', '0000-00-00'),
(227, 'Adobe Creative Suite: Illustrator, InDes', '0000-00-00', '0000-00-00'),
(228, 'Dreamweaver', '0000-00-00', '0000-00-00'),
(229, 'Infographics', '0000-00-00', '0000-00-00'),
(230, 'HTML & CSS', '0000-00-00', '0000-00-00'),
(231, 'Photo editing', '0000-00-00', '0000-00-00'),
(232, 'Typography: spacing, line height, layout', '0000-00-00', '0000-00-00'),
(233, 'Storyboarding', '0000-00-00', '0000-00-00'),
(234, 'Targeting and marketing through visual c', '0000-00-00', '0000-00-00'),
(235, 'Logo creation', '0000-00-00', '0000-00-00'),
(236, 'Digital printing', '0000-00-00', '0000-00-00'),
(237, 'Integration of visual communication in s', '0000-00-00', '0000-00-00'),
(238, 'Creativity', '0000-00-00', '0000-00-00'),
(239, 'Attention to detail & aesthetics', '0000-00-00', '0000-00-00'),
(240, 'Interactive media design', '0000-00-00', '0000-00-00'),
(241, 'Color sense & theory', '0000-00-00', '0000-00-00'),
(242, 'Ad design', '0000-00-00', '0000-00-00'),
(243, 'Active listening', '0000-00-00', '0000-00-00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
