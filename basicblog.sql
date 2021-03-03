-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 09:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basicblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `publication_status`, `deletion_status`) VALUES
(1, 'PHP', 'PHP tutorial for beginners and professionals provides in-depth knowledge of PHP scripting language. Our PHP tutorial will help you to learn PHP scripting language easily.', 1, 1),
(2, 'MySQL', 'MySQL tutorial provides basic and advanced concepts of MySQL. ', 1, 1),
(3, 'C', 'C language Tutorial with programming approach for beginners and professionals', 0, 1),
(4, 'HTML', 'HTML tutorial or HTML 5 tutorial provides basic and advanced concepts of HTML', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(3) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `category_id` int(3) NOT NULL,
  `tag_id` int(3) NOT NULL,
  `post_description` text NOT NULL,
  `post_image` text NOT NULL,
  `admin_id` int(3) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `deletion_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `category_id`, `tag_id`, `post_description`, `post_image`, `admin_id`, `publication_status`, `post_date`, `deletion_status`) VALUES
(1, 'What is HTML', 4, 1, '<p>HTML is an acronym which stands for&nbsp;<strong>Hyper Text Markup Language</strong>&nbsp;which is used for creating web pages and web applications. Let&#39;s see what is meant by Hypertext Markup Language, and Web page.</p>\r\n\r\n<p><strong>Hyper Text:</strong>&nbsp;HyperText simply means &quot;Text within Text.&quot; A text has a link within it, is a hypertext. Whenever you click on a link which brings you to a new webpage, you have clicked on a hypertext. HyperText is a way to link two or more web pages (HTML documents) with each other.</p>\r\n\r\n<p><strong>Markup language:</strong>&nbsp;A markup language is a computer language that is used to apply layout and formatting conventions to a text document. Markup language makes text more interactive and dynamic. It can turn text into images, tables, links, etc.</p>\r\n', '../assets/post_images/html_image.png', 1, 1, '2021-02-27 16:14:11', 1),
(2, 'HTML text Editors', 4, 1, '<ul>\r\n	<li>An HTML file is a text file, so to create an HTML file we can use any text editors.</li>\r\n	<li>Text editors are the programs which allow editing in a written text, hence to create a web page we need to write our code in some text editor.</li>\r\n	<li>There are various types of text editors available which you can directly download, but for a beginner, the best text editor is Notepad (Windows) or TextEdit (Mac).</li>\r\n	<li>After learning the basics, you can easily use other professional text editors which are,&nbsp;<strong>Notepad++, Sublime Text, Vim, etc</strong>.</li>\r\n	<li>In our tutorial, we will use Notepad and sublime text editor. Following are some easy ways to create your first web page with Notepad, and sublime text.</li>\r\n</ul>\r\n', '../assets/post_images/editor.jpg', 1, 1, '2021-02-27 16:19:29', 1),
(3, 'Building blocks of HTML', 4, 1, '<ul>\r\n	<li><strong>Tags:</strong>&nbsp;An HTML tag surrounds the content and apply meaning to it. It is written between &lt; and &gt; brackets.</li>\r\n	<li><strong>Attribute:</strong>&nbsp;An attribute in HTML provides extra information about the element, and it is applied within the start tag. An HTML attribute contains two fields: name &amp; value.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<ul>\r\n	<li><img alt=\"heart\" src=\"http://localhost/basicblog/assets/back-end/ckeditor/plugins/smiley/images/heart.png\" style=\"height:23px; width:23px\" title=\"heart\" /></li>\r\n</ul>\r\n</blockquote>\r\n', '../assets/post_images/html_image2.png', 1, 1, '2021-02-27 16:23:16', 1),
(4, 'What is PHP', 1, 2, '<p>PHP is an open-source, interpreted, and object-oriented scripting language that can be executed at the server-side. PHP is well suited for web development. Therefore, it is used to develop web applications (an application that executes on the server and generates the dynamic page</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><a href=\"https://www.javatpoint.com/install-php\">Next &rarr;</a></p>\r\n\r\n			<h1>PHP Tutorial</h1>\r\n			<a href=\"http://training.javatpoint.com/php-training.jsp\" target=\"_blank\"><img alt=\"PHP tutorial\" src=\"https://static.javatpoint.com/phppages/images/php-tutorial.png\" /></a>\r\n\r\n			<p>PHP tutorial for beginners and professionals provides in-depth knowledge of PHP scripting language. Our PHP tutorial will help you to learn PHP scripting language easily.</p>\r\n\r\n			<p>This PHP tutorial covers all the topics of PHP such as introduction, control statements, functions, array, string, file handling, form handling, regular expression, date and time, object-oriented programming in PHP, math, PHP MySQL, PHP with Ajax, PHP with jQuery and PHP with XML.</p>\r\n\r\n			<h2>What is PHP</h2>\r\n\r\n			<p>PHP is an open-source, interpreted, and object-oriented scripting language that can be executed at the server-side. PHP is well suited for web development. Therefore, it is used to develop web applications (an application that executes on the server and generates the dynamic page.).</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p>PHP was created by&nbsp;<strong>Rasmus Lerdorf in 1994</strong>&nbsp;but appeared in the market in 1995.&nbsp;<strong>PHP 7.4.0</strong>&nbsp;is the latest version of PHP, which was released on&nbsp;<strong>28 November</strong>. Some important points need to be noticed about PHP are as followed:</p>\r\n\r\n			<ul>\r\n				<li>PHP stands for Hypertext Preprocessor.</li>\r\n				<li>PHP is an interpreted language, i.e., there is no need for compilation.</li>\r\n				<li>PHP is faster than other scripting languages, for example, ASP and JSP.</li>\r\n				<li>PHP is a server-side scripting language, which is used to manage the dynamic content of the website.</li>\r\n				<li>PHP can be embedded into HTML.</li>\r\n				<li>PHP is an object-oriented language.</li>\r\n				<li>PHP is an open-source scripting language.</li>\r\n				<li>PHP is simple and easy to learn language.</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '../assets/post_images/php-tutorial.png', 1, 1, '2021-03-03 08:05:13', 1),
(5, 'Install PHP', 1, 2, '<p>To install PHP, we will suggest you to install AMP (Apache, MySQL, PHP) software stack. It is available for all operating systems. There are many AMP options available in the market that are given below:</p>\r\n\r\n<ul>\r\n	<li><strong>WAMP</strong>&nbsp;for Windows</li>\r\n	<li><strong>LAMP</strong>&nbsp;for Linux</li>\r\n	<li><strong>MAMP</strong>&nbsp;for Mac</li>\r\n	<li><strong>SAMP</strong>&nbsp;for Solaris</li>\r\n	<li><strong>FAMP</strong>&nbsp;for FreeBSD</li>\r\n	<li><strong>XAMPP</strong>&nbsp;(Cross, Apache, MySQL, PHP, Perl) for Cross Platform: It includes some other components too such as FileZilla, OpenSSL, Webalizer, Mercury Mail, etc.</li>\r\n</ul>\r\n\r\n<p>If you are on Windows and don&#39;t want Perl and other features of XAMPP, you should go for WAMP. In a similar way, you may use LAMP for Linux and MAMP for Macintosh.</p>\r\n', '../assets/post_images/what-is-php.png', 1, 1, '2021-03-03 08:07:04', 1),
(6, 'How to run PHP code in XAMPP', 1, 2, '<p>Generally, a PHP file contains HTML tags and some PHP scripting code. It is very easy to create a simple PHP example. To do so, create a file and write HTML tags + PHP code and save this file with .php extension.</p>\r\n\r\n<blockquote>\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol start=\"1\">\r\n	<li>&lt;?php&nbsp;&nbsp;&nbsp;</li>\r\n	<li>//your&nbsp;code&nbsp;here&nbsp;&nbsp;</li>\r\n	<li>?&gt;&nbsp;&nbsp;</li>\r\n</ol>\r\n</blockquote>\r\n\r\n<hr />', '../assets/post_images/run-php-code-in-xampp.png', 1, 1, '2021-03-03 08:39:31', 1),
(7, 'What is Database?', 2, 4, '<p>It is very important to understand the database before learning MySQL. A database is an application that stores the organized collection of records. It can be accessed and manage by the user very easily. It allows us to organize data into tables, rows, columns, and indexes to find the relevant information very quickly. Each database contains distinct&nbsp;<a href=\"https://www.javatpoint.com/api-full-form\">API</a>&nbsp;for performing database operations such as creating, managing, accessing, and searching the data it stores. Today, many databases available like MySQL, Sybase,&nbsp;<a href=\"https://www.javatpoint.com/what-is-oracle\">Oracle</a>,&nbsp;<a href=\"https://www.javatpoint.com/mongodb-tutorial\">MongoDB</a>,&nbsp;<a href=\"https://www.javatpoint.com/postgresql-tutorial\">PostgreSQL</a>,&nbsp;<a href=\"https://www.javatpoint.com/sql-server-tutorial\">SQL Server</a>, etc. In this section, we are going to focus on MySQL mainly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>What is MySQL?</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>MySQL is currently the most popular database management system software used for managing the relational database. It is open-source database software, which is supported by Oracle Company. It is fast, scalable, and easy to use database management system in comparison with Microsoft SQL Server and Oracle Database. It is commonly used in conjunction with&nbsp;<a href=\"https://www.javatpoint.com/php-tutorial\">PHP</a>&nbsp;scripts for creating powerful and dynamic server-side or web-based enterprise applications.</p>\r\n\r\n<p>It is developed, marketed, and supported by&nbsp;<strong>MySQL AB, a Swedish company</strong>, and written in&nbsp;<a href=\"https://www.javatpoint.com/c-programming-language-tutorial\">C programming language</a>&nbsp;and&nbsp;<a href=\"https://www.javatpoint.com/cpp-tutorial\">C++ programming language</a>. The official pronunciation of MySQL is not the My Sequel; it is&nbsp;<em><strong>My Ess Que Ell</strong>. However, you can pronounce it in your way.</em>&nbsp;Many small and big companies use MySQL. MySQL supports many Operating Systems like&nbsp;<a href=\"https://www.javatpoint.com/windows\">Windows</a>,&nbsp;<a href=\"https://www.javatpoint.com/linux-tutorial\">Linux</a>, MacOS, etc. with C, C++, and&nbsp;<a href=\"https://www.javatpoint.com/java-tutorial\">Java languages</a>.</p>\r\n\r\n<p>MySQL is a&nbsp;<a href=\"https://www.javatpoint.com/what-is-rdbms\">Relational Database Management System</a>&nbsp;(RDBMS) software that provides many things, which are as follows:</p>\r\n\r\n<ul>\r\n	<li>It allows us to implement database operations on tables, rows, columns, and indexes.</li>\r\n	<li>It defines the database relationship in the form of tables (collection of rows and columns), also known as relations.</li>\r\n	<li>It provides the Referential Integrity between rows or columns of various tables.</li>\r\n	<li>It allows us to updates the table indexes automatically.</li>\r\n	<li>It uses many SQL queries and combines useful information from multiple tables for the end-users.</li>\r\n</ul>\r\n', '../assets/post_images/mysql-tutorial2.png', 1, 1, '2021-03-03 08:44:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(3) NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `deletion_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`, `publication_status`, `deletion_status`) VALUES
(1, 'Web Design', 1, 1),
(2, 'Web App Development', 1, 1),
(3, 'What is HTML', 0, 1),
(4, 'SQL', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `deletion_status`) VALUES
(1, 'Super Admin', 'maung@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
