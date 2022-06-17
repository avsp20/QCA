-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2022 at 06:10 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcacosts_devqca`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us_settings`
--

CREATE TABLE `about_us_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `section2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci,
  `section2_image` text COLLATE utf8mb4_unicode_ci,
  `section3_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3` longtext COLLATE utf8mb4_unicode_ci,
  `section4_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section4_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section4` longtext COLLATE utf8mb4_unicode_ci,
  `section4_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_settings`
--

INSERT INTO `about_us_settings` (`id`, `section1_heading`, `section1_sub_heading`, `section1`, `section2_heading`, `section2_sub_heading`, `section2`, `section2_image`, `section3_heading`, `section3_sub_heading`, `section3`, `section4_heading`, `section4_sub_heading`, `section4`, `section4_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ABOUT THE QCA GROUP™', NULL, '<p>The QCA Group is recognised as a leader in its field and is the only Australia-wide legal costs consulting firm. We provide legal costs drafting, costs management and costs consulting. Our presence in all major centres has enabled us to provide a personalised service to clients that span the insurance sector, professional services, government and corporate clients. The QCA Group, was also the first, and remains the only costing firm with experienced legal Costs Lawyers in Australia, capable of managing all aspects of legal costs in all jurisdictions, States and Territories.</p>\r\n\r\n<p>When you engage our group you benefit by leveraging from in-depth specialist expertise in process management, people and technology. This has been gained across multiple business sectors and working with leading global organisations. We also help our clients with process improvement, within a framework that increases productivity and significantly reduces expenditure.</p>\r\n\r\n<p>Our clients also benefit from having access to a team of &#39;virtual&#39; in-house Costs Lawyers. This provides them with an end to end solution for all legal costs related matters. They are always in control of what aspects of the service they select, whether it be a &#39;Comprehensive QCA Costs Management Services&#39; or part service. What remains constant is the flexibility of our rates which always assures a high return on their investment.</p>\r\n\r\n<p><em>&#39;Your partner for all Legal Costing&#39;</em></p>', 'LEGAL COSTS CONSULTANTS', NULL, '<p>Our legal team has unequalled experience in providing legal costs advice and consulting. We offer comprehensive legal advice for all aspects of legal costs issues within all jurisdictions, States and Territories.</p>\r\n\r\n<p>Our team of Costs Lawyers are selected for their specialist expertise in what is a complex area of law. Collectively, our team includes: solicitors with in excess of 20 years&#39; experience with expertise working within various jurisdictions in large and small firms both within the city and provincial areas</p>\r\n\r\n<p>We are always looking for experienced Costs Lawyers who are able to work to deadlines and are committed to providing high quality work, click here for more details.</p>', 'legal-cost-consultants.png', 'WHY USE QCA?', NULL, '<p>QCA is a value added service that compliments your current legal case load. This is because we are the leading Australia-wide legal costs consulting firm, operating in a highly specialist area. Our work is backed by case studies that demonstrate significant savings for our clients. We also enable our clients to release their resources for more pressing matters and revenue based activity.</p>\r\n\r\n<p><em>&#39;The QCA Group adds weight to any costing dispute. This is why 7 of the top 10 Insurance Companies and leading law firms have used our service for over a decade.&#39;</em></p>', 'BEST PRACTICE', NULL, '<p>We invest in our staff to make sure that our organisation is at the forefront of costing management best practices. In addition to our in-house training our group regularly attends seminars relating to Law of Costs and we are recognised as a contributor to this sector by providing CLE Accredited Costs Seminars and in-house presentations to our clients.</p>\r\n\r\n<p>Our knowledge management centre houses an extensive resource which spans case law, Costs Assessors&#39; Determinations and Taxation outcomes and legislation relating to the Law of Costs. This unique collection provides your organisation with access to unequalled depth and weight when costs issues arise.</p>\r\n\r\n<p><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter</p>', 'best-practise.png', '2022-04-22 07:36:11', '2022-05-09 12:09:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `alternative_costs_resolution`
--

CREATE TABLE `alternative_costs_resolution` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `section2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci,
  `section2_image` text COLLATE utf8mb4_unicode_ci,
  `section3` longtext COLLATE utf8mb4_unicode_ci,
  `text1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternative_costs_resolution`
--

INSERT INTO `alternative_costs_resolution` (`id`, `section1_heading`, `section1_sub_heading`, `section1`, `section2_heading`, `section2_sub_heading`, `section2`, `section2_image`, `section3`, `text1`, `text1_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ALTERNATIVE COSTS RESOLUTION®', NULL, '<p>Alternative Costs Resolution&reg; (ACR) is an alternative solution to expensive and time consuming Court Costs Assessments and Taxation process.</p>\r\n\r\n<p>ACR is an Australia-wide, independent and impartial assessment process, conducted strictly in accordance with the principles of the Law of Costs, where party/party (or standard) costs are sought to be recovered. Decisions are made by experienced and impartial Costs Lawyers.</p>\r\n\r\n<p>Drafting Bills of Costs, Notices of Objections, Responses and Replies to Responses (NSW) or attendances at Taxation are no longer required. There is no requirement for any special inclusion clauses in Costs Orders or Deeds or Release, other than the standard &#39;costs to be agreed, or assessed&#39;.</p>\r\n\r\n<p>A willingness and a simple agreement between the parties to participate in the ACR* process, will ensure both parties obtain the maximum benefit. To apply, the parties simply submit an ACR Application Form this will provide QCA an Authority* to participate. An Authority number will then be issued and the party recovering costs then opts to submit their file to the ACR process.</p>', 'WHY USE ALTERNATIVE COSTS RESOLUTION®', NULL, '<p>You only need one good reason to select the ACR process, but here are three:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Time wasted in costs disputes are reduced by up to 12 months or more when compared to the average Court Costs Assessments or Taxation process.<code><small>1</small></code></p>\r\n	</li>\r\n	<li>\r\n	<p>Fees for the Costs Dispute Process can be reduced by in excess of 50%. This usually equates to tens of thousands of dollars when compared to average Court Costs Assessment or Taxation process.<code><small>2</small></code></p>\r\n	</li>\r\n	<li>\r\n	<p>Consistency of Decisions by Costs Lawyers, this is because they have had many years of experience in legal costing and managing Court Costs Assessments and Taxations.</p>\r\n	</li>\r\n</ul>', 'legal-cost-consultants.png', '<p><code><small>1</small></code>comparison is an average time from the first instruction to issuing a Certificate of Determination.</p>\r\n\r\n<p><em><code><small>2</small></code>comparison are average costs associated with drafting work including Bills of Costs, Notices of Objections, Responses, Replies to Responses (NSW), filing fees, costs of the Court Assessment, attendances at Taxation etc.</em></p>', 'ACR Application Form', 'https://www.qcacosts.com/acr_application.htm', '2022-04-22 06:24:39', '2022-05-09 15:05:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `page_id`, `banner_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '1649754243.png', '2022-04-12 03:34:03', '2022-04-12 03:35:00', '2022-04-12 03:35:00'),
(2, 1, '1649754243.png', '2022-04-12 03:34:03', '2022-04-12 03:35:02', '2022-04-12 03:35:02'),
(3, 1, 'aboutUs-banner.png', '2022-04-12 03:35:07', '2022-05-09 07:50:43', '2022-05-09 07:50:43'),
(4, 1, 'about-us-banner.png', '2022-04-12 03:35:07', '2022-05-09 07:50:45', '2022-05-09 07:50:45'),
(5, 2, 'aboutUs-banner.png', '2022-04-12 04:06:16', '2022-04-12 04:06:16', NULL),
(6, 3, 'about-us-banner.png', '2022-04-12 04:06:22', '2022-04-12 04:06:22', NULL),
(7, 4, 'cost-drafting-banner.png', '2022-04-12 04:06:32', '2022-04-12 04:06:32', NULL),
(8, 5, 'cost-management-banner.png', '2022-04-12 04:06:41', '2022-04-12 04:06:41', NULL),
(9, 6, 'settlement-conference-banner.png', '2022-04-12 04:06:52', '2022-04-12 04:06:52', NULL),
(10, 7, 'alternative-banner.png', '2022-04-12 04:07:03', '2022-04-12 04:07:03', NULL),
(11, 8, 'cost-management-banner.png', '2022-04-12 06:45:23', '2022-04-12 06:45:23', NULL),
(12, 9, 'cost-drafting-banner.png', '2022-04-20 07:55:19', '2022-04-20 07:55:19', NULL),
(13, 10, 'settlement-conference-banner.png', '2022-04-21 07:44:23', '2022-04-21 07:44:23', NULL),
(14, 11, 'alternative-banner.png', '2022-04-22 06:21:33', '2022-04-22 06:21:33', NULL),
(15, 12, 'about-us-banner.png', '2022-04-22 07:33:58', '2022-04-22 07:33:58', NULL),
(16, 13, 'contact-us-banner.png', '2022-04-25 06:39:07', '2022-04-25 06:41:12', '2022-04-25 06:41:12'),
(17, 13, 'contact-us-banner.png', '2022-04-25 06:41:28', '2022-04-25 06:48:25', '2022-04-25 06:48:25'),
(18, 13, 'contact-us-banner.png', '2022-04-25 06:48:36', '2022-04-25 06:48:36', NULL),
(19, 1, 'homepage-slider-2.png', '2022-05-09 07:51:32', '2022-05-09 07:51:32', NULL),
(20, 1, 'homepage-slider-3.png', '2022-05-09 07:51:56', '2022-05-09 07:51:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `name`, `slug`, `content`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Terms & Conditions', 'terms-and-conditions', '<p>In any matter where an Alternative Costs Resolution&reg; process is to be agreed, an&nbsp;<a target=\"_blank\" href=\"https://qcacosts.com/acr_application.htm\">Authority and Registration</a>&nbsp;Number MUST be obtained from QCA.</p><p>Where QCA and the ACR have been nominated in a Deed of Release QCA reserves the right not to participate where an Authority had not been obtained.</p>', 1, '2022-03-25 05:34:44', '2022-05-10 17:42:00', NULL),
(2, 'Security Policy', 'security-policy', '<p>At the QCA Group we take security seriously and use many of the most advanced technologies for internet security. Our security measures are also continually reviewed to make sure that the system remains at the forefront of advances in technology and that the system is available when you need it 24/7.</p><p>When you use an online QCA Group product you are using industry standard Secure Socket Layer (SSL) and private key encryption technology. Your information is also protected by server authentication and data encryption, ensuring that your data is safe and secure. The data is only available to registered users in your organisation and is completely inaccessible to your competitors or other unauthorised users.</p><p>The QCA Group also provides each authorised user with a unique user name and password that must be entered each time a user logs into the system. Users also are required to provide an answer to a question which is unique to them, to further safeguard password access.</p><p>The All corporate registrations have a unique identifier which provides a further level of security for companies, this prevents unauthorised access to valuable information. Anyone within your company wanting to use the system will be required to use this unique identifier to register and use the service.</p><p>The QCA Group may issues a session &quot;cookie&quot; to record encrypted authentication information for the duration of a specific session. These session &quot;cookie&quot; do not include the username or password of the user. The QCA Group does not use these &quot;cookies&quot; to store any other confidential information about the user or what has been accessed during that session. However session patterns are monitored to enable the QCA Group to enhance systems, provide a better user experience and to develop more advanced security methods from analysis of data flow.</p><p>In addition to the security already outlined the QCA Group&#39;s products are hosted in a world class secure server environment that uses a firewall and other advanced technology to prevent interference or access from outside intruders.</p><p>Further information is available for clients by emailing&nbsp;<a href=\"mailto:security@qcacosts.com\">security@qcacosts.com</a></p><p><strong>REPORTING A POTENTIAL SECURITY VULNERABILITY</strong></p><p>The protection of our customers data is pivotal to our business and as such, we encourage responsible reporting of any vulnerabilities that may be found in our site or system. As part of our commitment the QCA Group will not instigate legal action against security researchers that access or attempt to access our system on the basis they strictly observe the following conditions:</p><ol><li>Confidentially provide details of the suspected vulnerability to settleITnow.com&trade; by emailing the details to&nbsp;<a href=\"mailto:security@qcacosts.com\">security@qcacosts.com</a></li><li>The full details of the suspected vulnerability so that our team can investigate and rectify the vulnerability<br />&nbsp;</li></ol><p><strong>The QCA Group does not permit the following types of security research:</strong></p><ol><li>Attempting to or causing Denial of Service (DoS)</li><li>Accessing, or attempting to access our clients data</li><li>All types of malicious damage including either attempting to, or destroying or corrupting either our or our clients data<br />&nbsp;</li></ol><p>Our commitment to all researchers who abide by our policy is to provide a receipt of their report in a reasonable time frame and details of how we will overcome the vulnerability and the expected timeframe to resolve the vulnerability.</p><p><strong>NO COMPENSATION</strong></p><p>The QCA Group will not compensate researchers for reporting a security vulnerability. Any request will be considered a breach of our conditions and as such the QCA Group reserves all of its legal rights.</p>', 1, '2022-03-25 05:35:12', '2022-05-10 17:47:19', NULL),
(3, 'Privacy Policy', 'privacy-policy', '<p>Quantum Cost Assessors Pty Ltd hereafter referred to as QCA respects the privacy of all of its stakeholders, which include shareholders, customers, suppliers and all business contacts. QCA also understands and respects the fact that the privacy of your information is important to you.</p><p>This policy outlines the types of personal information which QCA collects and how QCA handles that information. The policy also outlines how you may access and seek correction of personal information which QCA holds about you. This policy reflects QCA&#39;s obligations under the National Privacy Principles (NPPs) which are contained in the Privacy Act 1988.</p><p>Personal information is any information that can be used to identify an individual and includes such personal details as name, address, telephone numbers, date of birth; email address and IP address.</p><p>Information recorded about our clients is securely stored on the web site in strict confidence and is only used to:</p><ol><li>Authenticate clients access to the web site</li><li>Allow clients to enter new cases and place sealed offers on related cases</li><li>Inform registered clients of settlement details</li><li>Invoice and communicate with client about services provide through QCA</li><li>Client information will not be used for any other purpose or passed on to any other party</li></ol><ul><li><strong>1. Cases</strong><br />Information recorded about cases including related parties and sealed offers are securely stored on the web site in strict confidence and only used to identify the case and assist in the settlement of the dispute. Information recorded about cases will not be used for any other purpose or passed on to any other party.</li><li><strong>2. QCA is a leading Legal Costing and Consulting firm</strong><br />QCA is a leading Legal Costing and Consulting firm.<br />For the purposes of this policy, the products and services described in this section will be referred to as &quot;our products and services&quot;.</li><li><strong>3. What personal information does QCA collect?</strong><br />QCA collects personal information about its customers and other business contacts and stakeholders in the course of doing business, examples of which include:<ul><li><strong>(a) Existing Customers</strong><br />If you are an existing QCA customer (who has asked to be provided with our products and services), QCA may collect certain types of personal information about you, this information may include your name, address and contact information (including email address). QCA collects this information so that we can develop and manage our relationships with our stakeholders and clients whilst assuring that we can provide a high service level. QCA may ask for additional information which will help us provide future products and services may be of interest to you.</li><li><strong>(b) Potential Customers</strong><br />Sometimes QCA identifies the contact details of potential customers and business contacts through the normal course of business development. If you are a potential customer, information about you may be collected for the purpose of advising you about products and services which may be of interest to you, either now or in the future. If we do collect personal information about you in this way, we will provide you with the opportunity to control how that information is used by QCA. This is discussed further in this Policy at 3(b) below.</li><li><strong>(c) Business Contacts &amp; Suppliers</strong><br />If you or your organisation enters into or is likely to enter into any business dealings with QCA, we will collect the personal information necessary for the relevant business transaction with you and/or your organisation. This will include all personal information contained in all correspondence and any agreement between you and QCA.</li><li><strong>(d) Online Collection</strong><br />For anyone who deals with QCA or any one of our group companies we will also collect additional information as a result of your use of our websites. This additional information may or may not identify you.<br /><br />Information collected through the websites of QCA or one of our group companies will include the information which you voluntarily provide. This may include information provided as part of a customer service enquiry or a registration form. Some pages may require you to provide your username and login.<br /><br />The additional information collected online may also include the type of your Internet browser, operating system, address of the referring site, your IP address and clickstream information. QCA may also collect information about the use which is made of QCA&#39;s websites using your username and password.</li><li><strong>(d) Cookies</strong><br />QCA may use cookies on its website. Cookies are pieces of information that a website transfers to your computer&#39;s hard disk for record-keeping purposes. Cookies in and of themselves do not personally identify users, although they do identify a user&#39;s browser. Most Web browsers are set to accept cookies. However, if you do not wish to receive any cookies you may set your browser to refuse cookies.</li></ul></li><li><strong>4. How does QCA use your personal information?</strong><ul><li><strong>(a) Provision of our products and services</strong><br />If you are a QCA customer or potential customer, QCA uses the personal information we collect to provide you with our products and services and with information about our products and services. This includes administering your account with us, customer service and providing any information which you have requested.</li><li><strong>(b) Information about our products and services</strong><br />If you are an existing or potential customer, QCA may use personal information about you to advise you about our products and services from time to time.<br /><br />When QCA uses personal information in this way, QCA will give you the option to decide whether or not you wish to receive information about our products and services and related information. Please let us know if you do not want personal information about you to be used for these purposes</li><li><strong>(c) Business Contacts</strong><br />QCA&#39;s policy is to use business contact information (collected in relation to its suppliers and other business contacts) for the business purpose for which it was collected.</li><li><strong>(d) Online Information</strong><br />If you use the QCA website to access our products and services, QCA may use information about the use you have made of our websites for the purpose of monitoring your compliance with applicable terms for the use of the website, your actual use of the website, and billing. Your login name and password will identify you online.</li><li><strong>(e) Statistical Information</strong><br />QCA may use information, including that collected through our website, for statistical purposes to improve the range of our products and services. If it does so, aggregated (i.e. de-identified) information will generally be used.</li></ul></li><li><strong>5. Does QCA give your personal information to anyone else?</strong><ul><li><strong>(a) Third Party Suppliers &amp; Contractors</strong><br />The nature of our business means that QCA will not disclose any of your personal information to a third party with the exception clause 4b. Disclosures Required for Legal Reasons. All staff will undergo in-house training on the Privacy Policy and our obligations, and all new staff will complete this training as an element of induction training. Staff training will be updated and completed by staff on an annual basis.</li><li><strong>(b) Disclosures Required for Legal Reasons</strong><br />For legal reasons, other disclosures may need to be made to law enforcement agencies, government agencies, courts or external advisors. QCA&#39;s policy is to only make such disclosures in accordance with the Privacy Act.</li></ul></li><li><strong>6. How secure is your info and how can you opt out?</strong><p>Under the Privacy Act, you have a right to seek access to information which QCA holds about you (although there are some exceptions to this). You also have the right to ask us to correct information about you which is inaccurate, incomplete or out of date.</p><p>If you wish to exercise your right under the Privacy Act to seek access to or correct the personal information that QCA holds about you, we ask that you contact QCA Privacy Officer by e-mail at&nbsp;<a href=\"mailto:privacy@qcacosts.com\">privacy@qcacosts.com</a>, or by mail to QCA, Level 6, 189 Kent Street, Sydney, NSW, 2000. When contacting QCA Privacy Officer, please provide as much detail as possible to assist us to follow-up your request.</p><p>In the first instance, we will generally provide you with a summary of the information we hold about you. We will assume (unless you tell us otherwise) that your request relates to our current records about you. These current records will include personal information about you which is included in our computers, databases and in paper files, and which may be used by QCA on a day to day basis.</p><p>To provide you with access to this personal information, QCA will ordinarily provide you with a print-out of the relevant personal information from our databases, or with photocopies of records which are held only on paper files. If personal information about you (for example, your name &amp; address details) is duplicated across different databases, we will generally provide you with one print-out of this information, rather than multiple print-outs. Ordinarily, QCA will not charge you for the cost of providing this type of access to these records.</p><p>For legal and administrative reasons, QCA may also store records containing personal information in its archives. You may seek access to the records held by QCA which are not current records, but if you do so, we may charge you for the cost of providing access.</p><p>Also, please be aware that if the relevant personal information was collected before 21 December 2001, QCA will only provide you with access in accordance with section 16C of the Privacy Act 1988. This states that access must only be provided to personal information collected before 21 December 2001 if we use and disclose that information after that date, and that providing access would not cause an unreasonable administrative burden or unreasonable expense.</p><p>If you are of the view that personal information about you is not accurate, complete or up to date, please provide QCA&#39;s Privacy Officer with your request for correction. QCA policy is to consider any requests for correction in a timely way.</p></li><li><strong>7. Is your personal information stored safely?</strong><p>QCA takes reasonable steps to ensure the security of personal information held by it from such risks as loss or unauthorised access, destruction, use, modification or disclosure. Our IT systems are password protected, protected by firewalls and satisfy other industry standard security measures, and if personal information is held on paper files, it is only accessed by authorised personnel.</p></li><li><strong>8. Contacting QCA</strong><p>If you have any questions or comments about this privacy policy, or if you have a complaint about the handling of personal information relating to you, please contact QCA &#39;s Privacy Officer by one of the following methods:</p><p>Email:<br /><a href=\"mailto:privacy@qcacosts.com\">privacy@qcacosts.com</a></p><p>Mail:<br />Level 6<br />189 Kent Street<br />Sydney, NSW - 2000</p></li><li><strong>9. Is your personal information stored safely?</strong><p>This privacy policy may change from time to time. This policy was last updated on 15th February 2011.</p></li><li><strong>10. Australian Privacy Commissioner</strong><p>If you are not satisfied with the way in which we handle your enquiry or complaint, you can contact the Office of the Australian Privacy Commissioner by any of the following methods: Tel: 1300 363 992 (for the cost of a local call anywhere in Australia); TTY: 1800 620 241 (this number is dedicated for the hearing impaired only, no voice calls); mail: GPO Box 5218, Sydney NSW 2001; Fax: +61 2 9284 9666; or email:&nbsp;<a href=\"mailto:privacy@privacy.gov.au\">privacy@privacy.gov.au</a></p></li></ul>', 1, '2022-03-25 05:35:50', '2022-03-25 06:06:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_settings`
--

CREATE TABLE `common_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_settings`
--

INSERT INTO `common_settings` (`id`, `page_id`, `section1_heading`, `section1_sub_heading`, `section1`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'ADVICES', NULL, '<p>QCA Legal, a member of the QCA Group of companies, may be instructed in costs matters where a change of solicitor on the record is required in costs related matters.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-12 00:52:58', '2022-05-09 12:23:23', NULL),
(2, 3, 'COURT APPEARANCES', NULL, '<p>QCA Legal, a member of the QCA Group of companies, may be instructed in costs matters where a change of solicitor on the record is required in costs related matters.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-12 01:06:43', '2022-05-09 12:35:47', NULL),
(3, 4, 'EXPERT REPORTS', NULL, '<p>QCA Legal, a member of the QCA Group of companies, may be instructed in costs matters where a change of solicitor on the record is required in costs related matters.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-12 01:30:36', '2022-05-09 12:35:38', NULL),
(4, 5, 'CLE SEMINARS', NULL, '<p>QCA Legal, a member of the QCA Group of companies, may be instructed in costs matters where a change of solicitor on the record is required in costs related matters.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-12 01:52:24', '2022-05-09 12:35:13', NULL),
(5, 6, 'WELCOME TO THE QCA GROUP™', NULL, '<p>A leader in legal costs management, legal costs drafting, consulting and claim settlement solutions.</p>\r\n\r\n<p><a href=\"http://www.qcacosts.com/new_instns.php\" target=\"_new\">Insurer</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"http://www.qcacosts.com/new_drafting.php\" target=\"_new2\">All Other</a></p>\r\n\r\n<p>We work with our clients to achieve extraordinary results&nbsp;<em><a href=\"mailto:info@qcacosts.com\">Find out more</a></em></p>', '2022-04-12 01:56:57', '2022-04-12 01:56:57', NULL),
(6, 7, 'QCA LEGAL', NULL, '<p>QCA Legal, a member of the QCA Group of companies, may be instructed in costs matters where a change of solicitor on the record is required in costs related matters.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-12 02:00:42', '2022-05-09 12:35:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enquiries_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_information_and_administration_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `it_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_details` text COLLATE utf8mb4_unicode_ci,
  `map` longtext COLLATE utf8mb4_unicode_ci,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `enquiries_email`, `general_information_and_administration_email`, `privacy_email`, `it_email`, `legal_email`, `address`, `contact`, `email`, `website`, `other_details`, `map`, `phone`, `registered_company`, `acn`, `abn`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'info@qcacosts.com', 'info@qcacosts.com', 'privacy@qcacosts.com', 'webmaster@qcacosts.com', 'generalcounsel@qcacosts.com', 'Quantum Cost Assessors Pty Ltd Level 23, 52 Martin Place Sydney NSW 2000, Australia', '+ 61 2 9241 4166', 'info@qcacosts.com', 'www.qcacosts.com', 'QUANTUM COST ASSESSORS PTY LTD\r\nABN 29 100 873 229\r\nACN 100 873 229', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.865353224807!2d151.20890601521015!3d-33.867360780656675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae6a9024ef3f%3A0x64c577c14baa827e!2sQuantum%20Cost%20Assessors%20PTY%20Ltd.2C%20%2F52%20Martin%20Pl%2C%20Sydney%20NSW%202000!5e0!3m2!1sen!2sau!4v1652185263018!5m2!1sen!2sau', '+ 61 2 9241 4166', 'Quantum Cost Assessors PTY Limited', '100 873 229', '29 100 873 229', '2022-04-06 03:46:19', '2022-05-10 17:27:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cost_drafting`
--

CREATE TABLE `cost_drafting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `section2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci,
  `section2_image` text COLLATE utf8mb4_unicode_ci,
  `section3_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_drafting`
--

INSERT INTO `cost_drafting` (`id`, `section1_heading`, `section1_sub_heading`, `section1`, `section2_heading`, `section2_sub_heading`, `section2`, `section2_image`, `section3_heading`, `section3_sub_heading`, `section3`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'COSTS DRAFTING', NULL, '<p><em>&#39;This is really terrific!!! I can&#39;t thank you enough&#39; A Partner within a leading national legal firm</em></p>\r\n\r\n<p>Our aim is to provide a fast and efficient professional Australia-wide Costs Drafting Service at very competitive rates. Our services includes:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Advice and recommendations on all cost related issues.</p>\r\n	</li>\r\n	<li>\r\n	<p>Security for Costs Applications.</p>\r\n	</li>\r\n	<li>\r\n	<p>Expert Evidence.</p>\r\n	</li>\r\n	<li>\r\n	<p>Settlement negotiations on costs for all jurisdictions.</p>\r\n	</li>\r\n	<li>\r\n	<p>On-site service where required in any State or Territory.</p>\r\n	</li>\r\n	<li>\r\n	<p>Drafting Bills of Costs - solicitor/client &amp; party/party.</p>\r\n	</li>\r\n	<li>\r\n	<p>Submissions in Response to the Notices of Objections (NSW).</p>\r\n	</li>\r\n	<li>\r\n	<p>Submissions in Reply to the Responses (NSW).</p>\r\n	</li>\r\n	<li>\r\n	<p>Submissions in Response to Costs Assessors&#39; Requisitions (NSW).</p>\r\n	</li>\r\n	<li>\r\n	<p>Applications for Review (NSW).</p>\r\n	</li>\r\n	<li>\r\n	<p>Attendances at Taxations / Assessments (where applicable).</p>\r\n	</li>\r\n	<li>\r\n	<p>Appeals.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', 'NEED MORE HELP?', NULL, '<p>Many of our clients often seek further help and in doing so experience greater value from our service. Examples where we help include; where our client is required to pay costs, entitled to recover costs or where an amicable settlement cannot be reached. Further details on how we assist in these areas can be obtained from our Legal Costs Management service or by speaking to one of our specialists.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', 'best-practise-left-image.png', 'BEST PRACTICE', NULL, '<p>We invest in our staff to make sure that our organisation is at the forefront of costing management best practices. In addition to our in-house training our group regularly attends seminars relating to Law of Costs and we are recognised as a contributor to this sector by providing CLE Accredited Costs Seminars and in-house presentations to our clients.</p>\r\n\r\n<p>Our knowledge management centre houses an extensive resource which spans case law, Costs Assessors&#39; Determinations and Taxation outcomes and legislation relating to the Law of Costs. This unique collection provides your organisation with access to unequalled depth and weight when costs issues arise.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-20 08:01:49', '2022-05-09 12:36:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cost_management_settings`
--

CREATE TABLE `cost_management_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `section1_text1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_text2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_text3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_text4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci,
  `section2_image` text COLLATE utf8mb4_unicode_ci,
  `section3_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3` longtext COLLATE utf8mb4_unicode_ci,
  `section4_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section4_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section4` longtext COLLATE utf8mb4_unicode_ci,
  `section4_image` text COLLATE utf8mb4_unicode_ci,
  `section5_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section5_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section5` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_management_settings`
--

INSERT INTO `cost_management_settings` (`id`, `section1_heading`, `section1_sub_heading`, `section1`, `section1_text1`, `section1_text2`, `section1_text3`, `section1_text4`, `section2_heading`, `section2_sub_heading`, `section2`, `section2_image`, `section3_heading`, `section3_sub_heading`, `section3`, `section4_heading`, `section4_sub_heading`, `section4`, `section4_image`, `section5_heading`, `section5_sub_heading`, `section5`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'COSTS MANAGEMENT', NULL, '<p>At the QCA Group we have a unique approach towards the management of legal costs. We are dedicated to achieving a maximum reduction of the high level of costs when costs are awarded against you or your client, or maximising your recovery when you or your client have the benefit of a Costs Order. Either way, our team (please see&nbsp;<a href=\"/about-us\">About Us</a>) will pursue your costs matter vigorously to secure the best possible outcome each and every time (please see&nbsp;<a href=\"/terms-and-conditions\">Terms &amp; Conditions</a>).</p>', 'Required to Pay Costs?', 'Entitled to Recover Costs?', 'Assessments / Taxations?', 'Best Practice', 'REQUIRED TO PAY COSTS?', NULL, '<p>When you or your client is required to pay the other party&#39;s costs (party/party, standard or indemnity) we can significantly reduce your liability. For example our all-inclusive comprehensive service includes:</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Obtaining initial advice of costs from the other party&#39;s solicitors.</p>\r\n	</li>\r\n	<li>\r\n	<p>Requesting further particulars from other party&#39;s solicitors.</p>\r\n	</li>\r\n	<li>\r\n	<p>Examination of costs by our Costs Management Team.</p>\r\n	</li>\r\n	<li>\r\n	<p>Making recommendations to you for your further instructions.</p>\r\n	</li>\r\n	<li>\r\n	<p>Attending to negotiations directly with the other party&#39;s solicitors.</p>\r\n	</li>\r\n</ul>', 'pay-cost.png', 'ENTITLED TO RECOVER COSTS?', NULL, '<p>Our aim is to maximise your clients&#39; entitlement in the recovery of their party/party costs. For example our all-inclusive comprehensive service includes:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Drawing Bills of Costs.</p>\r\n	</li>\r\n	<li>\r\n	<p>Making recommendations to you, seeking your further instructions.</p>\r\n	</li>\r\n	<li>\r\n	<p>Serving the Bill of Costs.</p>\r\n	</li>\r\n	<li>\r\n	<p>Attending to negotiations directly with the paying party&#39;s solicitors.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', 'ASSESSMENTS / TAXATIONS?', NULL, '<p>When costs cannot be settled amicably our Cost Lawyers will attend to drafting all necessary documents as well as conducting Assessments and/or appearing at Taxations.</p>\r\n\r\n<p><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter</p>', 'assessments.png', 'BEST PRACTICE', NULL, '<p>We invest in our staff to make sure that our organisation is at the forefront of costing management best practices. In addition to our in-house training our group regularly attends seminars relating to Law of Costs and we are recognised as a contributor to this sector by providing CLE Accredited Costs Seminars and in-house presentations to our clients.</p>\r\n\r\n<p>Our knowledge management centre houses an extensive resource which spans case law, Costs Assessors&#39; Determinations and Taxation outcomes and legislation relating to the Law of Costs. This unique collection provides your organisation with access to unequalled depth and weight when costs issues arise.</p>\r\n\r\n<p><em><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter.</em></p>', '2022-04-12 06:39:31', '2022-05-09 15:02:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `suburb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_solicitor` tinyint(4) DEFAULT '0',
  `year_admitted` year(4) DEFAULT NULL,
  `having_cost_draft_experience` tinyint(4) DEFAULT '0',
  `cost_draft_experience` tinyint(4) DEFAULT '0',
  `jurisdiction` text COLLATE utf8mb4_unicode_ci,
  `upload_file` text COLLATE utf8mb4_unicode_ci,
  `additional_comments` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `first_name`, `last_name`, `address`, `suburb`, `state`, `postcode`, `contact_no`, `email`, `is_solicitor`, `year_admitted`, `having_cost_draft_experience`, `cost_draft_experience`, `jurisdiction`, `upload_file`, `additional_comments`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Avni', 'Patel', 'Surat', 'hghd', 'SA', '395009', '7896541230', 'avp@narola.email', 2, 2022, 2, 3, '2,6', '9adf7bd0819143f5a916a5adc5ab36d6.pdf', 'At Moray & Agnew we have a proven ability to provide exceptional legal strategies and solutions forour clients.', '2022-03-22 17:38:27', '2022-03-22 17:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_page_settings`
--

CREATE TABLE `front_page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_page_settings`
--

INSERT INTO `front_page_settings` (`id`, `page`, `title`, `short_description`, `banner_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'home', NULL, 'QCA is an innovative firm that practices exclusively in legal costs Australia-wide and Internationally.', 'homepage-slider-3.png', '2022-03-01 18:30:32', '2022-03-01 18:30:32', NULL),
(2, 'home', NULL, 'QCA is an innovative firm that practices exclusively in legal costs Australia-wide and Internationally.', 'homepage-slider-3.png', '2022-03-01 18:31:10', '2022-03-01 18:31:10', NULL),
(3, 'advices', 'Advices', 'An Incorporated Legal Practice', 'qca-legal.png', '2022-03-01 18:32:23', '2022-03-01 18:32:23', NULL),
(4, 'cost-management', 'Costs Management', 'A unique approach towards costing management with a proven track record of reducing liability and vigorously representing your position', 'cost-management.png', '2022-03-01 18:33:27', '2022-03-01 19:13:52', NULL),
(5, 'costs-drafting', 'Costs Drafting', 'All Australian jurisdictions, our national clients benefit from one provider for any cost matter', 'costs-drafting.png', '2022-03-01 19:14:56', '2022-03-01 19:14:56', NULL),
(6, 'settlement-conference-team', 'Settlement Conference Team', 'A highly specialised team dedicated to successfully resolving high value and complex costs matters at settlement conferences on costs', 'settlement-conference.png', '2022-03-01 19:16:45', '2022-04-05 18:35:14', NULL),
(7, 'court-appearances', 'Court Appearances', 'An Incorporated Legal Practice', 'qca-legal.png', '2022-03-01 19:17:34', '2022-03-21 09:44:24', NULL),
(8, 'expert-reports', 'Expert Reports', 'An Incorporated Legal Practice', 'about-us-banner.png', '2022-03-01 19:17:53', '2022-04-05 18:34:54', NULL),
(9, 'alternative-costs-resolution', 'Alternative Costs Resolution', 'ACR is an Australia-wide, independent and impartial assessment process of costs.', 'alternative-banner.png', '2022-03-01 19:19:20', '2022-03-01 19:19:20', NULL),
(10, 'cle-seminars', 'CLE Seminars', 'An Incorporated Legal Practice', 'legal-cost-consultants.png', '2022-03-01 19:19:56', '2022-04-08 02:22:26', NULL),
(11, 'instruction-forms', 'Instruction Forms', 'An Incorporated Legal Practice', 'cost-management.png', '2022-03-01 19:20:38', '2022-04-05 18:34:16', NULL),
(12, 'contact-us', 'Contact Us', 'Contact Us', 'contact-us.png', '2022-03-01 19:24:57', '2022-03-01 19:24:57', NULL),
(13, 'about-us', 'About Us', 'About Us', 'about-us.png', '2022-03-01 19:25:28', '2022-03-01 19:25:28', NULL),
(14, 'qca-legal', 'QCA Legal', 'An Incorporated Legal Practice', 'qca-legal.png', '2022-03-01 19:26:03', '2022-03-01 19:26:03', NULL),
(15, 'rates', 'Rates', NULL, 'about-us.png', '2022-03-07 02:42:19', '2022-03-07 02:42:19', NULL),
(16, 'terms-and-conditions', 'Terms & Conditions', NULL, 'about-us.png', '2022-03-07 02:42:38', '2022-03-07 02:42:38', NULL),
(17, 'security-policy', 'Security Policy', NULL, 'about-us.png', '2022-03-07 02:42:59', '2022-03-07 02:42:59', NULL),
(18, 'privacy-policy', 'Privacy Policy', NULL, 'about-us.png', '2022-03-07 02:43:18', '2022-03-07 02:43:18', NULL),
(19, 'employment', 'Employment', NULL, 'alternative-banner.png', '2022-03-22 17:42:36', '2022-04-05 18:33:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_page_settings`
--

CREATE TABLE `home_page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `advice_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advice_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drafting_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drafting_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settlement_conference_team_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settlement_conference_team_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_appearances_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `court_appearances_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expert_report_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expert_reports_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_costs_resolution_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_costs_resolution_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cle_seminars_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cle_seminars_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions_forms_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instruction_forms_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci,
  `section2_button_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3` longtext COLLATE utf8mb4_unicode_ci,
  `section3_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_settings`
--

INSERT INTO `home_page_settings` (`id`, `section1_heading`, `section1_sub_heading`, `section1`, `advice_image`, `advice_link`, `drafting_image`, `drafting_link`, `settlement_conference_team_image`, `settlement_conference_team_link`, `court_appearances_image`, `court_appearances_link`, `expert_report_image`, `expert_reports_link`, `alternative_costs_resolution_image`, `alternative_costs_resolution_link`, `cle_seminars_image`, `cle_seminars_link`, `instructions_forms_image`, `instruction_forms_link`, `section2_heading`, `section2_sub_heading`, `section2`, `section2_button_name`, `section2_button_link`, `section3_heading`, `section3_sub_heading`, `section3`, `section3_image`, `text1`, `text2`, `text3`, `text4`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SMART DELIVERY', 'Smart Delivery', '<p>Legal firms and insurance companies instruct QCA because we are the leading specialists in all aspects of legal costs consulting from Costs Drafting to Costs Management</p>', 'QCA - boxes on the main page - Advices.png', '/advices', 'QCA - boxes on the main page - Drafting.png', '/costs-drafting', 'QCA - boxes on the main page - Sttl Conf Team.png', '/settlement-conference-team', 'QCA - boxes on the main page - Court Appearances.png', '/court-appearances', 'QCA - boxes on the main page - Expert Reports.png', '/expert-reports', 'QCA - boxes on the main page - alt cost.png', '/alternative-costs-resolution', 'QCA - boxes on the main page - cle.png', '/cle-seminars', 'QCA - boxes on the main page - Instruction forms.png', '/instruction-forms', 'MyQnA', NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'See More', '/', 'OUR OFFICE', NULL, '<p>QCA Sydney Office</p>', 'office-bg-image.png', 'SYDNEY', 'Quantum Cost Assessors Pty Ltd Level 23, 52 Martin Place Sydney NSW 2000, Australia', '+ 61 2 9241 4166', 'info@qcacosts.com', '2022-04-11 04:36:13', '2022-05-09 12:13:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_02_24_114923_create_roles_table', 1),
(19, '2022_02_24_115216_create_user_roles_table', 1),
(20, '2022_02_25_072329_add_user_image_field_in_users_table', 1),
(21, '2022_02_28_070240_create_front_page_settings_table', 1),
(22, '2022_03_02_123310_create_jobs_table', 1),
(23, '2022_03_04_094726_create_qna_table', 1),
(24, '2022_03_04_122020_create_qna_favorites_table', 1),
(25, '2022_03_09_102956_add_is_email_verified_column_in_users_table', 2),
(26, '2022_03_21_123933_create_employment_table', 3),
(27, '2022_03_24_124453_create_cms_table', 4),
(28, '2022_04_06_045628_create_contact_us_table', 5),
(30, '2022_04_07_112335_create_notifications_table', 6),
(31, '2022_04_11_072601_create_pages_table', 7),
(32, '2022_04_11_072633_create_banners_table', 7),
(33, '2022_04_11_072645_create_home_page_settings_table', 7),
(34, '2022_04_11_131649_add_heading_subheading_columns_in_home_page_settings_table', 7),
(35, '2022_04_12_054019_create_common_settings_table', 7),
(36, '2022_04_12_094245_create_cost_management_settings_table', 7),
(37, '2022_04_12_094843_add_image_links_in_home_page_settings_table', 7),
(38, '2022_04_12_110146_add_columns_in_cost_management_settings_table', 7),
(39, '2022_04_20_131816_create_cost_drafting_table', 8),
(40, '2022_04_21_094724_create_settlement_conference_team_settings_table', 9),
(41, '2022_04_22_111940_create_alternative_costs_resolution_table', 10),
(42, '2022_04_22_122905_create_about_us_settings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qna_id` bigint(20) UNSIGNED DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `short_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'home', 'Home', 'QCA is an innovative firm that practices exclusively in legal costs Australia-wide and Internationally.', '2022-04-11 04:27:28', '2022-05-09 07:25:04', NULL),
(2, 'advices', 'ADVICES', 'An Incorporated Legal Practice', '2022-04-12 00:49:19', '2022-04-12 01:08:51', NULL),
(3, 'court-appearances', 'COURT APPEARANCES', 'An Incorporated Legal Practice', '2022-04-12 01:06:43', '2022-04-12 01:07:47', NULL),
(4, 'expert-reports', 'EXPERT REPORTS', 'An Incorporated Legal Practice', '2022-04-12 01:30:36', '2022-04-12 01:30:36', NULL),
(5, 'cle-seminars', 'CLE SEMINARS', 'An Incorporated Legal Practice', '2022-04-12 01:52:24', '2022-04-12 01:52:24', NULL),
(6, 'instruction-forms', 'INSTRUCTION FORMS', 'An Incorporated Legal Practice', '2022-04-12 01:56:57', '2022-04-12 01:56:57', NULL),
(7, 'qca-legal', 'QCA LEGAL', 'An Incorporated Legal Practice', '2022-04-12 02:00:42', '2022-04-12 02:00:42', NULL),
(8, 'cost-management', 'Costs Management', 'A unique approach towards costing management with a proven track record of reducing liability and vigorously representing your position.', '2022-04-12 06:38:15', '2022-04-12 06:42:10', NULL),
(9, 'costs-drafting', 'Costs Drafting', 'All Australian jurisdictions, our national clients benefit from one provider for any cost matter', '2022-04-20 18:57:49', '2022-04-21 18:43:35', NULL),
(10, 'settlement-conference-team', 'Settlement Conference Team', NULL, '2022-04-21 18:40:21', '2022-04-21 18:40:21', NULL),
(11, 'about-us', 'About Us', NULL, '2022-04-22 18:33:51', '2022-04-22 18:33:51', NULL),
(12, 'alternative-costs-resolution', 'Alternative Costs Resolution', NULL, '2022-04-22 18:35:35', '2022-04-22 18:35:35', NULL),
(13, 'contact-us', 'Contact Us', NULL, '2022-04-25 18:54:54', '2022-04-25 18:54:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qna_is_active` tinyint(4) NOT NULL DEFAULT '1',
  `qna_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qna_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qna_jurisdiction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qna_question_date` timestamp NULL DEFAULT NULL,
  `qna_question` text COLLATE utf8mb4_unicode_ci,
  `qna_answer_date` timestamp NULL DEFAULT NULL,
  `qna_answer` longtext COLLATE utf8mb4_unicode_ci,
  `qna_can_discuss_further` tinyint(4) NOT NULL DEFAULT '0',
  `qna_available_to_others` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qna`
--

INSERT INTO `qna` (`id`, `qna_is_active`, `qna_user_id`, `qna_subject`, `qna_jurisdiction`, `qna_question_date`, `qna_question`, `qna_answer_date`, `qna_answer`, `qna_can_discuss_further`, `qna_available_to_others`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 'Personal', 'QLD', '2022-03-04 02:34:37', '<p>Hi,<br />What do I do when I have bla bla bla bla<br /><br />Also what about bla bla bla bla<br />and because of this and that, so this and that<br />bla bla bla bla</p>', NULL, NULL, 0, 0, '2022-03-04 02:34:37', '2022-03-04 02:34:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qna_favorites`
--

CREATE TABLE `qna_favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qna_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-03-04 02:31:43', '2022-03-04 02:31:43'),
(2, 'User', '2022-03-04 02:31:43', '2022-03-04 02:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `settlement_conference_team_settings`
--

CREATE TABLE `settlement_conference_team_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci,
  `section2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2_sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci,
  `section2_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settlement_conference_team_settings`
--

INSERT INTO `settlement_conference_team_settings` (`id`, `section1_heading`, `section1_sub_heading`, `section1`, `section2_heading`, `section2_sub_heading`, `section2`, `section2_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SETTLEMENT CONFERENCE TEAM', NULL, '<p><em>&quot;Thank you. Great work and an excellent outcome&quot;</em><em>Partner, Leading Insurance Law Firm</em></p>\r\n\r\n<p>Settlement Conferences on costs are conducted by the QCA Settlement Conference Team (&quot;SCT&quot;) a highly regarded team of experts on costs negotiations and costs settlement conferences. The SCT has successfully conducted many court Case Conferences and Mediations on Costs and informal Costs Settlement Conferences on behalf of its clients.</p>\r\n\r\n<p>QCA&#39;s SCT has proven to be an invaluable asset to its clients in successfully resolving high value and complex costs matters and thereby avoiding the need to proceed to time consuming and costly court Assessments or Taxations.</p>\r\n\r\n<p>The SCT consists of:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>An of IAMA Accredited Mediator with advocacy skills in the Federal Court, Federal Magistrates Court and the Family Court of Australia with successful outcomes against Senior and Junior Counsel. A former insurance claims professional and a highly skilled negotiator with many years of legal costing experience, and</p>\r\n	</li>\r\n	<li>\r\n	<p>A Senior Solicitor admitted to the Supreme Court of NSW and the High Court of Australia with many years of litigation experience prior to specialising in legal costing. A leading expert in the law of costs with experience in over 37 jurisdictions in Australia as well as costs in New Zealand and the US. A highly skilled advocate at taxation hearings in the various jurisdictions throughout Australia.</p>\r\n	</li>\r\n</ul>', 'BEST PRACTICE', NULL, '<p>We invest in our staff to make sure that our organisation is at the forefront of costing management best practices. In addition to our in-house training our group regularly attends seminars relating to Law of Costs and we are recognised as a contributor to this sector by providing CLE Accredited Costs Seminars and in-house presentations to our clients.</p>\r\n\r\n<p>Our knowledge management centre houses an extensive resource which spans case law, Costs Assessors&#39; Determinations and Taxation outcomes and legislation relating to the Law of Costs. This unique collection provides your organisation with access to unequalled depth and weight when costs issues arise.</p>\r\n\r\n<p><a href=\"/contact-us\">Contact Us</a>&nbsp;for a confidential, obligation free appraisal about your costing matter</p>', 'best-practise.png', '2022-04-21 07:46:58', '2022-05-09 12:36:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_is_active` tinyint(4) NOT NULL DEFAULT '0',
  `user_is_approved` tinyint(4) NOT NULL DEFAULT '0',
  `user_fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_contact_main` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_contact_mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_initial_notes` longtext COLLATE utf8mb4_unicode_ci,
  `user_image` text COLLATE utf8mb4_unicode_ci,
  `user_datetime_registered` timestamp NULL DEFAULT NULL,
  `user_datetime_lastlogin` longtext COLLATE utf8mb4_unicode_ci,
  `user_ip_address` longtext COLLATE utf8mb4_unicode_ci,
  `user_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_password_last_reset_changed` timestamp NULL DEFAULT NULL,
  `is_email_verified` tinyint(4) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_is_active`, `user_is_approved`, `user_fname`, `user_lname`, `user_company`, `user_location`, `user_email`, `user_contact_main`, `user_contact_mobile`, `user_initial_notes`, `user_image`, `user_datetime_registered`, `user_datetime_lastlogin`, `user_ip_address`, `user_password`, `user_password_last_reset_changed`, `is_email_verified`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Admin', 'Admin', NULL, 'NSW', 'mr_phillipus@yahoo.com', '4785961235', NULL, NULL, '1646400812.jpg', NULL, NULL, NULL, '$2y$10$tsqc3dgvoPu3s01bGoc1ie8RwgwJ7gHmpZcbfMTzz1tlVtNzQQGw2', NULL, 0, NULL, NULL, '2022-03-04 02:31:44', '2022-03-04 02:33:32', NULL),
(2, 0, 0, 'User', 'Test', NULL, NULL, 'user@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$tsqc3dgvoPu3s01bGoc1ie8RwgwJ7gHmpZcbfMTzz1tlVtNzQQGw2', NULL, 0, NULL, NULL, '2022-03-04 02:31:44', '2022-03-04 02:31:44', NULL),
(3, 0, 0, 'avni', 'patel', 'narola', 'QLD', 'demoavni@yopmail.com', '01478523690', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-03-04 02:44:03', '2022-03-04 02:44:03', NULL),
(5, 1, 1, 'fcgf', 'dfgdf', 'dfgdf', 'NT', 'avnipatel@yopmail.com', '4585135363', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2022-03-09 02:34:43', '48ec1ccda294b21d7a9a17d14829deadfd9c09cf', '2022-03-09 02:34:10', '2022-03-10 02:29:11', NULL),
(6, 1, 1, 'Dev', 'Admin', NULL, 'NSW', 'devadmin@yopmail.com', '4785961235', NULL, NULL, '1646400812.jpg', NULL, NULL, NULL, '$2y$10$3w5ab36IR5lbXrpj5YkCbubDdP/FsxGtUVW03eoVEG4XQPqnaBeHC', NULL, 0, NULL, NULL, '2022-03-04 02:31:44', '2022-04-05 18:05:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-03-04 02:31:44', '2022-03-04 02:31:44'),
(2, 2, 2, '2022-03-04 02:31:44', '2022-03-04 02:31:44'),
(3, 3, 2, '2022-03-04 02:44:03', '2022-03-04 02:44:03'),
(5, 5, 2, '2022-03-09 02:34:10', '2022-03-09 02:34:10'),
(6, 6, 1, '2022-03-09 02:34:10', '2022-03-09 02:34:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_settings`
--
ALTER TABLE `about_us_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternative_costs_resolution`
--
ALTER TABLE `alternative_costs_resolution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_page_id_foreign` (`page_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_settings`
--
ALTER TABLE `common_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_settings_page_id_foreign` (`page_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_drafting`
--
ALTER TABLE `cost_drafting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cost_management_settings`
--
ALTER TABLE `cost_management_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `front_page_settings`
--
ALTER TABLE `front_page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qna_qna_user_id_foreign` (`qna_user_id`);

--
-- Indexes for table `qna_favorites`
--
ALTER TABLE `qna_favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qna_favorites_qna_id_foreign` (`qna_id`),
  ADD KEY `qna_favorites_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settlement_conference_team_settings`
--
ALTER TABLE `settlement_conference_team_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us_settings`
--
ALTER TABLE `about_us_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alternative_costs_resolution`
--
ALTER TABLE `alternative_costs_resolution`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `common_settings`
--
ALTER TABLE `common_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cost_drafting`
--
ALTER TABLE `cost_drafting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cost_management_settings`
--
ALTER TABLE `cost_management_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_page_settings`
--
ALTER TABLE `front_page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `home_page_settings`
--
ALTER TABLE `home_page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qna_favorites`
--
ALTER TABLE `qna_favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settlement_conference_team_settings`
--
ALTER TABLE `settlement_conference_team_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `common_settings`
--
ALTER TABLE `common_settings`
  ADD CONSTRAINT `common_settings_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
