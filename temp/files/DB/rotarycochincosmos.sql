-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2013 at 05:55 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rotarycochincosmos`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `emailid` text,
  `registrationdate` datetime DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `image` text,
  `securityquestion_id` int(11) DEFAULT NULL,
  `answer` text,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `securityquestion_id` (`securityquestion_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`, `emailid`, `registrationdate`, `lastlogin`, `image`, `securityquestion_id`, `answer`, `created`, `updated`, `record_user_id`) VALUES
(1, 'webmaster', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, '2013-05-09 17:20:15', NULL, NULL, NULL, '2013-04-22 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulletins`
--

CREATE TABLE IF NOT EXISTS `bulletins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `frequency` text NOT NULL,
  `url` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bulletins`
--

INSERT INTO `bulletins` (`id`, `name`, `frequency`, `url`, `user_id`, `created`, `updated`, `record_user_id`) VALUES
(1, 'Meeting 1', 'Monthly1', 'http://google.co.in', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE IF NOT EXISTS `classifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `name`) VALUES
(1, ' Academic Administrator'),
(2, ' Academic Professor'),
(3, ' Accountancy'),
(4, ' Accountant'),
(5, ' Acquisition-Lands '),
(6, ' Actor,Builder'),
(7, ' Administration - Hospital'),
(8, ' Adovacate'),
(9, ' Advagate'),
(10, ' Advertisement '),
(11, ' Advertising & Designing'),
(12, ' Advertising - Electronic Media'),
(13, 'Advertising Services - National Media'),
(14, 'Agriculture'),
(15, 'Agro chemicals'),
(16, 'Agro Chemicals and Machinery'),
(17, 'Agro Equipment & pesticide distribution'),
(18, ' Agro Processing'),
(19, 'Air transportation'),
(20, ' Air Travel Agency'),
(21, 'Airconditioning'),
(22, 'Auto Engineering ');

-- --------------------------------------------------------

--
-- Table structure for table `clubpositions`
--

CREATE TABLE IF NOT EXISTS `clubpositions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `roll_id` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `roll_id` (`roll_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `clubpositions`
--

INSERT INTO `clubpositions` (`id`, `name`, `roll_id`) VALUES
(1, 'President', 1),
(2, 'Immediate Past President', 2),
(3, 'Charter President', 2),
(4, 'Vice President', 2),
(5, 'President Elect 2013-14', 2),
(6, 'Secretary', 1),
(7, 'Jt. Secretary', 2),
(8, 'Secretary Elect 2013-14', 2),
(9, 'Treasurer', 2),
(10, 'Sr. Sergeant At Arms', 2),
(11, 'Sergeant At Arms', 2),
(12, 'Bulletin Editor', 2),
(13, 'Director, Club Service', 2),
(14, 'Director, Community Service', 2),
(15, 'Director, International Service', 2),
(16, 'Director, New Generation', 2),
(17, 'Director, Vocational Service', 2),
(18, 'Club Internet Communication Officer', 1),
(19, 'Club Advisor', 2),
(20, 'Club Trainer', 2),
(21, 'Club Historian', 2),
(22, 'Club PRO', 2),
(23, 'Club Correspondent', 2),
(24, 'Chairman, Career Guidance', 2),
(25, 'Chairman, Club Administration', 2),
(26, 'Chairman, DistrictProjects', 2),
(27, 'Chairman, Family Health Care', 2),
(28, 'Chairman, Friendship & Fellowship', 2),
(29, 'Chairman, Fund Raising', 2),
(30, 'Chairman, Interact', 2),
(31, 'Chairman, Kinderact', 2),
(32, 'Chairman, Leadership Plan', 2),
(33, 'Chairman, Membership Development', 2),
(34, 'Chairman, Polio Plus', 2),
(35, 'Chairman, Public Relations', 2),
(36, 'Chairman, RCC', 2),
(37, 'Chairman, Rotaract', 2),
(38, 'Chairman, Service Projects', 2),
(39, 'Chairman, TRF', 2),
(40, 'Chairman, Youth Service', 2),
(41, 'Chairman, Family of Rotary', 2),
(42, 'Chairman, Fellowship', 2),
(43, 'Chairman, Club Website', 2),
(64, 'Member', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `language_id` int(11) NOT NULL,
  `contenttype_id` int(11) NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`,`language_id`),
  KEY `contenttype_id` (`contenttype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contenttypes`
--

CREATE TABLE IF NOT EXISTS `contenttypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contenttypes`
--

INSERT INTO `contenttypes` (`id`, `name`, `description`) VALUES
(1, 'HTML', 'Html Editor'),
(2, 'TEXT', 'No Html Editor');

-- --------------------------------------------------------

--
-- Table structure for table `districtpositions`
--

CREATE TABLE IF NOT EXISTS `districtpositions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=370 ;

--
-- Dumping data for table `districtpositions`
--

INSERT INTO `districtpositions` (`id`, `name`) VALUES
(1, 'Advisor, Youth Exchange'),
(2, 'Advisor,  Rotary Peace & Fellowship'),
(3, 'Advisor, Club Administration'),
(4, 'Advisor, Club Extension'),
(5, 'Advisor, Community Service'),
(6, 'Advisor, Community Service (Health)'),
(7, 'Advisor, Convention Promotion'),
(8, 'Advisor, District Awards'),
(9, 'Advisor, District Conference'),
(10, 'Advisor, District Finance Committee'),
(11, 'Advisor, District Friendship Exchange'),
(12, 'Advisor, District Leadership Development'),
(13, 'Advisor, District Priorities'),
(14, 'Advisor, District Rotary Fellowship'),
(15, 'Advisor, District Secretariat'),
(16, 'Advisor, Group Study Exchange'),
(17, 'Advisor, Internet Communication'),
(18, 'Advisor, Membership Development & Retention'),
(19, 'Advisor, New Member Orientation'),
(20, 'Advisor, Public Relations'),
(21, 'Advisor, RI Priorities'),
(22, 'Advisor, Rotaract'),
(23, 'Advisor, Rotary Protocol'),
(24, 'Advisor, RYLA'),
(25, 'Advisor, Strategic Planning & Future Vision'),
(26, 'Advisor, Vocational Service'),
(27, 'Advisor, World Community Service'),
(28, 'ALUMNI Sub Committee Chair'),
(29, 'Annual Giving Sub Committee Chair'),
(30, 'Asst. Governor, Calicut Region - Area 10 '),
(31, 'Asst. Governor, Calicut Region - Area 11 '),
(32, 'Asst. Governor, Calicut Region - Area 12 '),
(33, 'Asst. Governor, Calicut Region - Area 7 '),
(34, 'Asst. Governor, Calicut Region - Area 8 '),
(35, 'Asst. Governor, Calicut Region - Area 9 '),
(36, 'Asst. Governor, Erode Region - Area 19 '),
(37, 'Asst. Governor, Erode Region - Area 20 '),
(38, 'Asst. Governor, Erode Region - Area 21 '),
(39, 'Asst. Governor, Erode Region - Area 22 '),
(40, 'Asst. Governor, Erode Region - Area 23 '),
(41, 'Asst. Governor, Erode Region - Area 24 '),
(42, 'Asst. Governor, Kannur Region - Area 1'),
(43, 'Asst. Governor, Kannur Region - Area 2'),
(44, 'Asst. Governor, Kannur Region - Area 3'),
(45, 'Asst. Governor, Kannur Region - Area 4 '),
(46, 'Asst. Governor, Kannur Region - Area 5 '),
(47, 'Asst. Governor, Kannur Region - Area 6 '),
(48, 'Asst. Governor, Tirupur Region - Area 13 '),
(49, 'Asst. Governor, Tirupur Region - Area 14 '),
(50, 'Asst. Governor, Tirupur Region - Area 15 '),
(51, 'Asst. Governor, Tirupur Region - Area 16 '),
(52, 'Asst. Governor, Tirupur Region - Area 17 '),
(53, 'Asst. Governor, Tirupur Region - Area 18 '),
(54, 'Chairman, AG’s Training Seminar'),
(55, 'Chairman, District Assembly'),
(56, 'Chairman, PETS'),
(57, 'Chairman, District Conference'),
(58, 'Chairman, District Governor''s Installation '),
(59, 'Co- Chair, District Leadership Development'),
(60, 'Co- Chair, Youth Exchange'),
(61, 'Co- Chair,  Rotary Peace & Fellowship'),
(62, 'Co- Chair, Club Administration'),
(63, 'Co- Chair, Club Extension'),
(64, 'Co- Chair, Community Service'),
(65, 'Co- Chair, Community Service (Health)'),
(66, 'Co- Chair, Convention Promotion'),
(67, 'Co- Chair, District Awards'),
(68, 'Co- Chair, District Conference'),
(69, 'Co- Chair, District Friendship Exchange'),
(70, 'Co- Chair, District Governor''s Installation '),
(71, 'Co- Chair, District Priorities'),
(72, 'Co- Chair, District Rotary Fellowship'),
(73, 'Co- Chair, Group Study Exchange'),
(74, 'Co- Chair, Interact'),
(75, 'Co- Chair, Internet Communication'),
(76, 'Co- Chair, Membership Development & Retention'),
(77, 'Co- Chair, New Member Orientation'),
(78, 'Co- Chair, Polio Plus'),
(79, 'Co- Chair, Public Relations'),
(80, 'Co- Chair, RI Priorities'),
(81, 'Co- Chair, Rotaract'),
(82, 'Co- Chair, Rotary Protocol'),
(83, 'Co- Chair, RYLA'),
(84, 'Co- Chair, Strategic Planning & Future Vision'),
(85, 'Co- Chair, Vocational Service  '),
(86, 'Co- Chair, World Community Service'),
(87, 'Co- Editor, District Directory'),
(88, 'Co- Editor, GML'),
(89, 'Convener District Assembly'),
(90, 'Co-Ordinator,   Cultivation of Herbal Plants'),
(91, 'Co-Ordinator,   Disaster Management'),
(92, 'Co-Ordinator,   Energy Conservation'),
(93, 'Co-Ordinator,   Free Legal Aid'),
(94, 'Co-Ordinator,   Green Earth'),
(95, 'Co-Ordinator,   Human Rights & Protection'),
(96, 'Co-Ordinator,   Low Cost Shelters'),
(97, 'Co-Ordinator,   National Integration'),
(98, 'Co-Ordinator,   NGO Co- ordination'),
(99, 'Co-Ordinator,   People below Poverty line'),
(100, 'Co-Ordinator,   Population Control'),
(101, 'Co-Ordinator,   Preservation of Heritage & Culture'),
(102, 'Co-Ordinator,   Prisoner’s  Welfare'),
(103, 'Co-Ordinator,   Rain Water Harvesting'),
(104, 'Co-Ordinator,   Renewable Energy'),
(105, 'Co-Ordinator,   Rights to Information'),
(106, 'Co-Ordinator,   Rotary Community Corps'),
(107, 'Co-Ordinator,   School Care'),
(108, 'Co-Ordinator,   Science & Technological Development'),
(109, 'Co-Ordinator,   Self Help Group'),
(110, 'Co-Ordinator,   Senior Citizen Care'),
(111, 'Co-Ordinator,   Tree Planting'),
(112, 'Co-Ordinator,   Tribal Welfare'),
(113, 'Co-Ordinator,   Veterinary Care'),
(114, 'Co-Ordinator, Adolescent Care'),
(115, 'Co-Ordinator, AIDS Awareness'),
(116, 'Co-Ordinator, Alternative Medicine'),
(117, 'Co-Ordinator, Arbitration & Councelling'),
(118, 'Co-Ordinator, Artificial Limbs'),
(119, 'Co-Ordinator, Attendance Promotion'),
(120, 'Co-Ordinator, Books for Library'),
(121, 'Co-Ordinator, Budget'),
(122, 'Co-Ordinator, Bulletin & Magazine '),
(123, 'Co-Ordinator, Business Ethics Promotion '),
(124, 'Co-Ordinator, Buyer / seller Meet- Consumer Fair'),
(125, 'Co-Ordinator, Cardiac Surgery'),
(126, 'Co-Ordinator, Care of the Destitute'),
(127, 'Co-Ordinator, Career Guidance'),
(128, 'Co-Ordinator, Charter Day Celebration'),
(129, 'Co-Ordinator, Child Abuse Prevention'),
(130, 'Co-Ordinator, Child Labour Prevention & Awareness'),
(131, 'Co-Ordinator, Children at Risk'),
(132, 'Co-Ordinator, Citizen Responsibilities'),
(133, 'Co-Ordinator, Civic Amenities'),
(134, 'Co-Ordinator, Civil Rights & Responsibilities'),
(135, 'Co-Ordinator, Classification Roster '),
(136, 'Co-Ordinator, Clean City'),
(137, 'Co-Ordinator, Cleft Lip & Palliative Care'),
(138, 'Co-Ordinator, Club Consolidation'),
(139, 'Co-Ordinator, Club Constitution & Byelaws'),
(140, 'Co-Ordinator, Club History'),
(141, 'Co-Ordinator, Club Leadership Development'),
(142, 'Co-Ordinator, Club Trust & FCRA'),
(143, 'Co-Ordinator, Club Website'),
(144, 'Co-Ordinator, Communal Harmony'),
(145, 'Co-Ordinator, Consumer Awareness & Protection '),
(146, 'Co-Ordinator, Council on Legislation'),
(147, 'Co-Ordinator, Declaration for Rtns. in Business & Profession'),
(148, 'Co-Ordinator, Dental Care'),
(149, 'Co-Ordinator, Designated Months Celebration   '),
(150, 'Co-Ordinator, District Events Promotion'),
(151, 'Co-Ordinator, District Goals'),
(152, 'Co-Ordinator, District Governor’s Citation'),
(153, 'Co-Ordinator, District History'),
(154, 'Co-Ordinator, Drug Abuse'),
(155, 'Co-Ordinator, Employer Cell – Self Employment'),
(156, 'Co-Ordinator, Employer/ Employee Relation'),
(157, 'Co-Ordinator, Entrepreneur Development'),
(158, 'Co-Ordinator, Environment Protection'),
(159, 'Co-Ordinator, Eye Care'),
(160, 'Co-Ordinator, Family Participation'),
(161, 'Co-Ordinator, Festivals'),
(162, 'Co-Ordinator, Four Way Test Promotion'),
(163, 'Co-Ordinator, Fund Raising'),
(164, 'Co-Ordinator, Geriatric Care'),
(165, 'Co-Ordinator, Greetings'),
(166, 'Co-Ordinator, Health Insurance'),
(167, 'Co-Ordinator, Hearing Impaired   & ENT Care'),
(168, 'Co-Ordinator, Hepatitis Awareness'),
(169, 'Co-Ordinator, Honouring Past Presidents'),
(170, 'Co-Ordinator, Human Resource'),
(171, 'Co-Ordinator, Industrial Safety'),
(172, 'Co-Ordinator, Inter District Fellowship Promotion'),
(173, 'Co-Ordinator, Kidney Care'),
(174, 'Co-Ordinator, Leprosy Eradication'),
(175, 'Co-Ordinator, Life Style Diseases'),
(176, 'Co-Ordinator, Magazine Month Celebration'),
(177, 'Co-Ordinator, Medical Camps'),
(178, 'Co-Ordinator, Mother & Child Care'),
(179, 'Co-Ordinator, Neuro Care'),
(180, 'Co-Ordinator, Occupational Health'),
(181, 'Co-Ordinator, Polio Corrective Surgery'),
(182, 'Co-Ordinator, Pre Natal & Post Natal Care'),
(183, 'Co-Ordinator, Prevention of Water Born Disease'),
(184, 'Co-Ordinator, Promotion of Anns Participation'),
(185, 'Co-Ordinator, Promotion of High Ethical Standards'),
(186, 'Co-Ordinator, Promotion of Past Presidents Council'),
(187, 'Co-Ordinator, Promotion of Younger Rotarians'),
(188, 'Co-Ordinator, Psychological Care & Councelling'),
(189, 'Co-Ordinator, Respiratory Care'),
(190, 'Co-Ordinator, Responsible Citizenship'),
(191, 'Co-Ordinator, RI Theme Promotion'),
(192, 'Co-Ordinator, Rotary Awarness Month Celebration'),
(193, 'Co-Ordinator, Rotary Cares Rotarian'),
(194, 'Co-Ordinator, Rotary News & Information'),
(195, 'Co-Ordinator, Rotary Quiz'),
(196, 'Co-Ordinator, Rotary Volunteers (Vocational)'),
(197, 'Co-Ordinator, Rotary/ Govt. Interface'),
(198, 'Co-Ordinator, Rotary/ Inner Wheel Interface'),
(199, 'Co-Ordinator, Routine Immunisation'),
(200, 'Co-Ordinator, Self Help Schemes'),
(201, 'Co-Ordinator, Service to New Clubs'),
(202, 'Co-Ordinator, Speakers Bank'),
(203, 'Co-Ordinator, Strengthening of Clubs'),
(204, 'Co-Ordinator, Traffic Safety'),
(205, 'Co-Ordinator, Trauma Care'),
(206, 'Co-Ordinator, Vocational Awards'),
(207, 'Co-Ordinator, Vocational Councelling'),
(208, 'Co-Ordinator, Vocational Group Insurance'),
(209, 'Co-Ordinator, Vocational Service Month Celebration'),
(210, 'Co-Ordinator, Vocational Tour'),
(211, 'Co-Ordinator, Women in Rotary Promotion'),
(212, 'Co-Ordinator, Yoga & Health'),
(213, 'Dist Chief Sergeant at Arms'),
(214, 'Dist Governor Elect '),
(215, 'Dist Sergeant at Arms'),
(216, 'District  Chair, Polio Plus'),
(217, 'District Advisor'),
(218, 'District Chair, Youth Exchange'),
(219, 'District Chair,  Rotary Peace & Fellowship'),
(220, 'District Chair, Club Administration'),
(221, 'District Chair, Club Extension'),
(222, 'District Chair, Community Service'),
(223, 'District Chair, Community Service (Health)'),
(224, 'District Chair, Convention Promotion'),
(225, 'District Chair, District Awards'),
(226, 'District Chair, District Finance Committee'),
(227, 'District Chair, District Friendship Exchange'),
(228, 'District Chair, District Leadership Development'),
(229, 'District Chair, District Priorities'),
(230, 'District Chair, District Rotary Fellowship'),
(231, 'District Chair, Group Study Exchange'),
(232, 'District Chair, Interact'),
(233, 'District Chair, Internet Communication'),
(234, 'District Chair, Membership Development & Retention'),
(235, 'District Chair, New Member Orientation'),
(236, 'District Chair, Public Relations'),
(237, 'District Chair, RI Priorities'),
(238, 'District Chair, Rotaract'),
(239, 'District Chair, Rotary Protocol'),
(240, 'District Chair, RYLA'),
(241, 'District Chair, Strategic Planning & Future Vision'),
(242, 'District Chair, Vocational Service '),
(243, 'District Chair, World Community Service'),
(244, 'District Co- Trainer'),
(245, 'District General Secretary'),
(246, 'District Governor'),
(247, 'District Governor Nominee'),
(248, 'District Jt. Trainer'),
(249, 'District Rotary Foundation Chair'),
(250, 'District Secretary'),
(251, 'District Trainer'),
(252, 'District Treasurer'),
(253, 'Editor, District Directory'),
(254, 'Editor, GML'),
(255, 'Endowment & Major Gifts Sub Committee Chair'),
(256, 'Grants Subcommittee Chair'),
(257, 'Grants Supervision & Audit Sub Committee Chair'),
(258, 'Immediate Past District Governor '),
(259, 'Jt. Secretary, District Conference'),
(260, 'Jt. Secretary, District Governor''s Installation '),
(261, 'Matching Grants Sub Committee Chair'),
(262, 'Member, District Finance Committee'),
(263, 'Permanent Fund Sub Committee Chair'),
(264, 'Regional Chair , Youth Exchange (Calicut Region)'),
(265, 'Regional Chair, Club Extension (Calicut Region)'),
(266, 'Regional Chair, Club Extension(Erode Region)'),
(267, 'Regional Chair, District Awards  (Calicut Region)'),
(268, 'Regional Chair, District Awards  (Erode Region)'),
(269, 'Regional Chair, District Awards  (Tirupur Region)'),
(270, 'Regional Chair, District Awards (Kannur Region)'),
(271, 'Regional Chair, District Leadership Development (Calicut region)'),
(272, 'Regional Chair, District Leadership Development (Erode Region)'),
(273, 'Regional Chair, District Leadership Development (Kannur Region)'),
(274, 'Regional Chair, District Leadership Development (Tirupur Region)'),
(275, 'Regional Chair, Membership Development & Retention (Calicut Region)'),
(276, 'Regional Chair, Membership Development & Retention (Erode Region)'),
(277, 'Regional Chair, Membership Development & Retention (Kannur Region)'),
(278, 'Regional Chair, Membership Development & Retention (Tirupur Region)'),
(279, 'Regional Chair, New Member Orientation (Calicut Region)'),
(280, 'Regional Chair, New Member Orientation (Erode Region)'),
(281, 'Regional Chair, New Member Orientation (Kannur Region)'),
(282, 'Regional Chair, New Member Orientation (Tirupur Region)'),
(283, 'Regional Chair, Youth Exchange (Erode Region)'),
(284, 'Regional Chair, Youth Exchange (Kannur Region)'),
(285, 'Regional Chair, Youth Exchange (Tirupur Region)'),
(286, 'Regional Chair,  Rotary Peace & Fellowship (Calicut Region)'),
(287, 'Regional Chair,  Rotary Peace & Fellowship (Erode Region)'),
(288, 'Regional Chair,  Rotary Peace & Fellowship (Kannur Region)'),
(289, 'Regional Chair,  Rotary Peace & Fellowship (Tirupur Region)'),
(290, 'Regional Chair, Club Extension  (Kannur Region)'),
(291, 'Regional Chair, Club Extension  (Tirupur Region)'),
(292, 'Regional Chair, Convention Promotion (Calicut Region)'),
(293, 'Regional Chair, Convention Promotion (Erode Region)'),
(294, 'Regional Chair, Convention Promotion (Kannur Region)'),
(295, 'Regional Chair, Convention Promotion (Tirupur Region)'),
(296, 'Regional Chair, District Friendship Exchange (Calicut Region)'),
(297, 'Regional Chair, District Friendship Exchange (Erode Region)'),
(298, 'Regional Chair, District Friendship Exchange (Kannur Region)'),
(299, 'Regional Chair, District Friendship Exchange (Tirupur Region)'),
(300, 'Regional Chair, District Rotary Fellowship (Calicut Region)'),
(301, 'Regional Chair, District Rotary Fellowship (Erode Region)'),
(302, 'Regional Chair, District Rotary Fellowship (Kannur Region)'),
(303, 'Regional Chair, District Rotary Fellowship (Tirupur Region)'),
(304, 'Regional Chair, Group Study Exchange (Calicut Region)'),
(305, 'Regional Chair, Group Study Exchange (Erode Region)'),
(306, 'Regional Chair, Group Study Exchange (Kannur Region)'),
(307, 'Regional Chair, Group Study Exchange (Tirupur Region)'),
(308, 'Regional Chair, Interact (Calicut Region)'),
(309, 'Regional Chair, Interact (Erode Region)'),
(310, 'Regional Chair, Interact (Kannur Region)'),
(311, 'Regional Chair, Interact (Tiupur Region)'),
(312, 'Regional Chair, Internet Communication (Calicut Region)'),
(313, 'Regional Chair, Internet Communication (Erode Region)'),
(314, 'Regional Chair, Internet Communication (Kannur Region)'),
(315, 'Regional Chair, Internet Communication (Tirupur Region) '),
(316, 'Regional Chair, Public Relations (Calicut Region)'),
(317, 'Regional Chair, Public Relations (Erode Region)'),
(318, 'Regional Chair, Public Relations (Kannur Region)'),
(319, 'Regional Chair, Public Relations (Tirupur Region) '),
(320, 'Regional Chair, RI Priorities (Calicut Region)'),
(321, 'Regional Chair, RI Priorities (Erode)'),
(322, 'Regional Chair, RI Priorities (Kannur Region)'),
(323, 'Regional Chair, RI Priorities (Tirupur Region)'),
(324, 'Regional Chair, Rotaract (Calicut Region)'),
(325, 'Regional Chair, Rotaract (Erode Region)'),
(326, 'Regional Chair, Rotaract (Kannur Region)'),
(327, 'Regional Chair, Rotaract (Tirupur Region)'),
(328, 'Regional Chair, Rotary Protocol (Calicut Region)'),
(329, 'Regional Chair, Rotary Protocol (Erode Region)'),
(330, 'Regional Chair, Rotary Protocol (Kannur Region)'),
(331, 'Regional Chair, Rotary Protocol (Tirupur Region)'),
(332, 'Regional Chair, RYLA (Calicut Region)'),
(333, 'Regional Chair, RYLA (Erode Region)'),
(334, 'Regional Chair, RYLA (Kannur Region)'),
(335, 'Regional Chair, RYLA (Tirupur Region)'),
(336, 'Regional Chair, Strategic Planning & Future Vision (Calicut Region)'),
(337, 'Regional Chair, Strategic Planning & Future Vision (Erode Region)'),
(338, 'Regional Chair, Strategic Planning & Future Vision (Kannur Region)'),
(339, 'Regional Chair, Strategic Planning & Future Vision (Tirupur Region)'),
(340, 'Regional Chair, World Community Service (Calicut Region)'),
(341, 'Regional Chair, World Community Service (Erode Region)'),
(342, 'Regional Chair, World Community Service (Kannur Region)'),
(343, 'Regional Chair, World Community Service (Tirupur Region)'),
(344, 'Regional Co-Ordinator, Calicut Region '),
(345, 'Regional Co-Ordinator, Erode Region'),
(346, 'Regional Co-Ordinator, Kannur Region'),
(347, 'Regional Co-Ordinator, Tirupur Region'),
(348, 'Revenue District Co-Ordinator, Calicut'),
(349, 'Revenue District Co-Ordinator, Coimbatore Rural'),
(350, 'Revenue District Co-Ordinator, Erode'),
(351, 'Revenue District Co-Ordinator, Kannur'),
(352, 'Revenue District Co-Ordinator, Kasaragod'),
(353, 'Revenue District Co-Ordinator, Malappuram'),
(354, 'Revenue District Co-Ordinator, Ootty'),
(355, 'Revenue District Co-Ordinator, Tirupur'),
(356, 'Revenue District Co-Ordinator, Wynad'),
(357, 'Scholarship Sub Committee Chair'),
(358, 'Secretary AG''s Training Seminar'),
(359, 'Secretary District Assembly'),
(360, 'Secretary PETS'),
(361, 'Secretary, District Conference'),
(362, 'Secretary, District Governor''s Installation '),
(363, 'Simplified Grants Sub Committee Chair'),
(364, 'Treasurer, District Conference'),
(365, 'Select'),
(366, 'District Community Service Co-Ordinator (Heart to Heart)'),
(367, 'District Governor Elect 2013-14'),
(368, 'Member Resource Group'),
(369, 'District Governor Elect 2014-15');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE IF NOT EXISTS `downloads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `file` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `gallery_id` (`gallery_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `status_id` (`status_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_id` (`gallery_id`),
  KEY `status_id` (`status_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `publish`) VALUES
(1, 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE IF NOT EXISTS `meetings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` text NOT NULL,
  `description` text NOT NULL,
  `chief_guest` text NOT NULL,
  `sponsor` text NOT NULL,
  `image` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `gallery_id` (`gallery_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `memberdetails`
--

CREATE TABLE IF NOT EXISTS `memberdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `past_clubposition_id` int(11) NOT NULL,
  `phf_id` int(11) NOT NULL,
  `classification_id` int(11) NOT NULL,
  `districtposition_id` int(11) NOT NULL,
  `dob` date NOT NULL,
  `dow` date NOT NULL,
  `blood_group` text NOT NULL,
  `phone` text NOT NULL,
  `mobile` text NOT NULL,
  `website` text NOT NULL,
  `office_address1` text NOT NULL,
  `office_address2` text NOT NULL,
  `office_address3` text NOT NULL,
  `office_city` text NOT NULL,
  `office_pin` text NOT NULL,
  `office_phone` text NOT NULL,
  `residence_address1` text NOT NULL,
  `residence_address2` text NOT NULL,
  `residence_address3` text NOT NULL,
  `residence_city` text NOT NULL,
  `residence_pin` text NOT NULL,
  `image` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `past_clubposition_id` (`past_clubposition_id`),
  KEY `phf_id` (`phf_id`),
  KEY `classification_id` (`classification_id`),
  KEY `districtposition_id` (`districtposition_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `memberrelationdetails`
--

CREATE TABLE IF NOT EXISTS `memberrelationdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `memberrelation_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `dob` date NOT NULL,
  `blood_group` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `memberrelation_id` (`memberrelation_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `memberrelations`
--

CREATE TABLE IF NOT EXISTS `memberrelations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_banlists`
--

CREATE TABLE IF NOT EXISTS `mlf2_banlists` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_banlists`
--

INSERT INTO `mlf2_banlists` (`name`, `list`) VALUES
('user_agents', ''),
('ips', ''),
('words', '');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_categories`
--

CREATE TABLE IF NOT EXISTS `mlf2_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `category` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `accession` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_entries`
--

CREATE TABLE IF NOT EXISTS `mlf2_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tid` int(11) NOT NULL DEFAULT '0',
  `uniqid` varchar(255) NOT NULL DEFAULT '',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_reply` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edited` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edited_by` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `hp` varchar(255) NOT NULL DEFAULT '',
  `location` varchar(255) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `tags` varchar(255) NOT NULL DEFAULT '',
  `show_signature` tinyint(4) DEFAULT '0',
  `email_notification` tinyint(4) DEFAULT '0',
  `marked` tinyint(4) DEFAULT '0',
  `locked` tinyint(4) DEFAULT '0',
  `sticky` tinyint(4) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `spam` tinyint(4) DEFAULT '0',
  `spam_check_status` tinyint(4) DEFAULT '0',
  `edit_key` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `tid` (`tid`),
  KEY `category` (`category`),
  KEY `pid` (`pid`),
  KEY `sticky` (`sticky`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_entries_cache`
--

CREATE TABLE IF NOT EXISTS `mlf2_entries_cache` (
  `cache_id` int(11) NOT NULL,
  `cache_text` mediumtext NOT NULL,
  PRIMARY KEY (`cache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_logincontrol`
--

CREATE TABLE IF NOT EXISTS `mlf2_logincontrol` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL DEFAULT '',
  `logins` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_pages`
--

CREATE TABLE IF NOT EXISTS `mlf2_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `menu_linkname` varchar(255) NOT NULL DEFAULT '',
  `access` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_settings`
--

CREATE TABLE IF NOT EXISTS `mlf2_settings` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_settings`
--

INSERT INTO `mlf2_settings` (`name`, `value`) VALUES
('forum_name', 'Rotary Cochin Cosmos'),
('forum_description', 'yet another little forum'),
('forum_email', 'forum@rotarycochincosmos.local'),
('forum_address', 'http://rotarycochincosmos.local/forum/'),
('home_linkaddress', '../'),
('home_linkname', ''),
('language_file', 'english.lang'),
('theme', 'default'),
('access_for_users_only', '1'),
('entries_by_users_only', '1'),
('register_mode', '2'),
('default_email_contact', '0'),
('user_area_public', '0'),
('rss_feed', '1'),
('rss_feed_max_items', '20'),
('session_prefix', 'mlf2_'),
('default_view', '0'),
('remember_userdata', '1'),
('remember_last_visit', '1'),
('empty_postings_possible', '0'),
('email_notification_unregistered', '0'),
('user_edit', '1'),
('user_edit_if_no_replies', '0'),
('show_if_edited', '1'),
('dont_reg_edit_by_admin', '0'),
('dont_reg_edit_by_mod', '0'),
('edit_min_time_period', '5'),
('edit_max_time_period', '60'),
('edit_delay', '3'),
('bbcode', '1'),
('bbcode_img', '1'),
('bbcode_color', '1'),
('bbcode_size', '1'),
('bbcode_code', '0'),
('bbcode_tex', '0'),
('bbcode_flash', '0'),
('flash_default_width', '425'),
('flash_default_height', '344'),
('upload_images', '0'),
('smilies', '1'),
('autolink', '1'),
('count_views', '1'),
('autologin', '1'),
('threads_per_page', '30'),
('search_results_per_page', '20'),
('name_maxlength', '70'),
('name_word_maxlength', '30'),
('email_maxlength', '70'),
('hp_maxlength', '70'),
('location_maxlength', '40'),
('location_word_maxlength', '30'),
('subject_maxlength', '60'),
('subject_word_maxlength', '30'),
('text_maxlength', '5000'),
('profile_maxlength', '5000'),
('signature_maxlength', '255'),
('text_word_maxlength', '90'),
('email_subject_maxlength', '100'),
('email_text_maxlength', '10000'),
('quote_symbol', '>'),
('count_users_online', '10'),
('last_reply_link', '0'),
('time_difference', '0'),
('time_zone', ''),
('auto_lock_old_threads', '0'),
('upload_max_img_size', '60'),
('upload_max_img_width', '600'),
('upload_max_img_height', '600'),
('mail_parameter', ''),
('forum_enabled', '1'),
('forum_readonly', '0'),
('forum_disabled_message', ''),
('page_browse_range', '10'),
('page_browse_show_last', '0'),
('deep_reply', '15'),
('very_deep_reply', '30'),
('users_per_page', '20'),
('username_maxlength', '40'),
('bad_behavior', '0'),
('akismet_entry_check', '0'),
('akismet_mail_check', '0'),
('akismet_key', ''),
('akismet_check_registered', '0'),
('stop_forum_spam', '0'),
('tags', '1'),
('tag_cloud', '0'),
('tag_cloud_day_period', '30'),
('tag_cloud_scale_min', '0'),
('tag_cloud_scale_max', '6'),
('latest_postings', '0'),
('terms_of_use_agreement', '0'),
('terms_of_use_url', ''),
('syntax_highlighter', '0'),
('save_spam', '1'),
('auto_delete_spam', '168'),
('auto_lock', '0'),
('temp_block_ip_after_repeated_failed_logins', '1'),
('flood_prevention_minutes', '2'),
('fold_threads', '0'),
('avatars', '0'),
('avatar_max_filesize', '20'),
('avatar_max_width', '80'),
('avatar_max_height', '80'),
('captcha_posting', '0'),
('captcha_email', '0'),
('captcha_register', '0'),
('min_pw_length', '8'),
('cookie_validity_days', '30'),
('access_permission_checks', '0'),
('daily_actions_time', '3:30'),
('next_daily_actions', '1367983800'),
('auto_lock_old_threads', '0'),
('max_read_items', '200'),
('delete_ips', '0'),
('last_changes', '1367816340'),
('ajax_preview', '1'),
('version', '2.3.1');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_smilies`
--

CREATE TABLE IF NOT EXISTS `mlf2_smilies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `file` varchar(100) NOT NULL DEFAULT '',
  `code_1` varchar(50) NOT NULL DEFAULT '',
  `code_2` varchar(50) NOT NULL DEFAULT '',
  `code_3` varchar(50) NOT NULL DEFAULT '',
  `code_4` varchar(50) NOT NULL DEFAULT '',
  `code_5` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mlf2_smilies`
--

INSERT INTO `mlf2_smilies` (`id`, `order_id`, `file`, `code_1`, `code_2`, `code_3`, `code_4`, `code_5`, `title`) VALUES
(1, 1, 'smile.png', ':-)', '', '', '', '', ''),
(2, 2, 'wink.png', ';-)', '', '', '', '', ''),
(3, 3, 'tongue.png', ':-P', '', '', '', '', ''),
(4, 4, 'biggrin.png', ':-D', '', '', '', '', ''),
(5, 5, 'neutral.png', ':-|', '', '', '', '', ''),
(6, 6, 'frown.png', ':-(', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_userdata`
--

CREATE TABLE IF NOT EXISTS `mlf2_userdata` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(4) NOT NULL DEFAULT '0',
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `user_real_name` varchar(255) NOT NULL DEFAULT '',
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `user_pw` varchar(255) NOT NULL DEFAULT '',
  `user_email` varchar(255) NOT NULL DEFAULT '',
  `email_contact` tinyint(4) DEFAULT '0',
  `user_hp` varchar(255) NOT NULL DEFAULT '',
  `user_location` varchar(255) NOT NULL DEFAULT '',
  `signature` varchar(255) NOT NULL DEFAULT '',
  `profile` text NOT NULL,
  `logins` int(11) NOT NULL DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_ip` varchar(128) NOT NULL DEFAULT '',
  `registered` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_selection` varchar(255) DEFAULT NULL,
  `thread_order` tinyint(4) NOT NULL DEFAULT '0',
  `user_view` tinyint(4) NOT NULL DEFAULT '0',
  `sidebar` tinyint(4) NOT NULL DEFAULT '1',
  `fold_threads` tinyint(4) NOT NULL DEFAULT '0',
  `thread_display` tinyint(4) NOT NULL DEFAULT '0',
  `new_posting_notification` tinyint(4) DEFAULT '0',
  `new_user_notification` tinyint(4) DEFAULT '0',
  `user_lock` tinyint(4) DEFAULT '0',
  `auto_login_code` varchar(50) NOT NULL DEFAULT '',
  `pwf_code` varchar(50) NOT NULL,
  `activate_code` varchar(50) NOT NULL DEFAULT '',
  `language` varchar(255) NOT NULL DEFAULT '',
  `time_zone` varchar(255) NOT NULL DEFAULT '',
  `time_difference` smallint(4) DEFAULT '0',
  `theme` varchar(255) NOT NULL DEFAULT '',
  `entries_read` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mlf2_userdata`
--

INSERT INTO `mlf2_userdata` (`user_id`, `user_type`, `user_name`, `user_real_name`, `gender`, `birthday`, `user_pw`, `user_email`, `email_contact`, `user_hp`, `user_location`, `signature`, `profile`, `logins`, `last_login`, `last_logout`, `user_ip`, `registered`, `category_selection`, `thread_order`, `user_view`, `sidebar`, `fold_threads`, `thread_display`, `new_posting_notification`, `new_user_notification`, `user_lock`, `auto_login_code`, `pwf_code`, `activate_code`, `language`, `time_zone`, `time_difference`, `theme`, `entries_read`) VALUES
(1, 2, 'webmaster', '', 0, '0000-00-00', 'ca9bddcb3cbc5be4ce77edaad7750e9f0eb36e2cf161ead0bf', 'forum@rotarycochincosmos.local', 1, '', '', '', '', 1, '2013-05-06 04:46:50', '2013-05-06 05:29:41', '127.0.0.1', '2013-05-06 04:30:22', NULL, 0, 0, 1, 0, 0, 0, 0, 0, '', '', '', '', '', 0, '', ''),
(2, 0, 'pramod@acube.co', '', 0, '0000-00-00', '5cd8e0e33a8112f8aa42ebce1c38703d851101b9c6aedbc867', '', 1, '', '', '', '', 8, '2013-03-13 02:56:40', '2013-03-13 02:58:17', '127.0.0.1', '2013-03-12 18:55:19', NULL, 0, 0, 1, 0, 0, 0, 0, 0, '', '', '', '', '', 0, '', '1'),
(3, 0, 'hari@acube.co', '', 0, '0000-00-00', 'f46cb43cb1a89287d6fba1d54f6563c15a8e718b5dd2fdc8ff', '', 1, '', '', '', '', 8, '2013-03-13 02:56:40', '2013-03-13 02:58:17', '127.0.0.1', '2013-03-12 18:55:19', NULL, 0, 0, 1, 0, 0, 0, 0, 0, '', '', '', '', '', 0, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_userdata_cache`
--

CREATE TABLE IF NOT EXISTS `mlf2_userdata_cache` (
  `cache_id` int(11) NOT NULL,
  `cache_signature` text NOT NULL,
  `cache_profile` text NOT NULL,
  PRIMARY KEY (`cache_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mlf2_useronline`
--

CREATE TABLE IF NOT EXISTS `mlf2_useronline` (
  `ip` char(15) NOT NULL DEFAULT '',
  `time` int(14) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mlf2_useronline`
--

INSERT INTO `mlf2_useronline` (`ip`, `time`, `user_id`) VALUES
('127.0.0.1', 1367927217, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `gallery_id` (`gallery_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rolls`
--

CREATE TABLE IF NOT EXISTS `rolls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rolls`
--

INSERT INTO `rolls` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `securityquestions`
--

CREATE TABLE IF NOT EXISTS `securityquestions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `securityquestions`
--

INSERT INTO `securityquestions` (`id`, `question`) VALUES
(1, 'What is your pet''s name?'),
(2, 'What is your favourite food? '),
(3, 'who is your favourite celebrity?'),
(4, 'I hate ?');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `userloggedindetails`
--

CREATE TABLE IF NOT EXISTS `userloggedindetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userstatus_id` int(11) NOT NULL,
  `clubposition_id` int(11) NOT NULL,
  `emailid` text NOT NULL,
  `registrationdate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `parent_user_id` int(11) DEFAULT NULL,
  `securityquestion_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `record_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `userstatus_id` (`userstatus_id`),
  KEY `clubposition_id` (`clubposition_id`),
  KEY `parent_user_id` (`parent_user_id`),
  KEY `securityquestion_id` (`securityquestion_id`),
  KEY `record_user_id` (`record_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `userstatuses`
--

CREATE TABLE IF NOT EXISTS `userstatuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userstatuses`
--

INSERT INTO `userstatuses` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
