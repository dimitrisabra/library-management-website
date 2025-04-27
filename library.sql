-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 09:09 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `borrower` varchar(255) DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `author`, `isbn`, `publication_year`, `borrower`, `due_date`) VALUES
(6, '1984', 'Dimitri', '9780451524935', 1949, 'jjkjk', '0032-02-23'),
(7, 'To Kill a Mockingbird', 'Harper Lee', '9780061120084', 1960, 'Jane Smith', '2024-05-06'),
(8, 'Pride and Prejudice', 'Jane Austen', '9781503290563', 1813, NULL, NULL),
(9, 'Moby', 'Herman Melville', '9781853260087', 1851, 'Alice Brown', '0024-06-05'),
(10, 'The Catcher in the Rye', 'J.D. Salinger', '9780316769488', 1951, NULL, NULL),
(11, 'Brave New World', 'Aldous Huxley', '9780060850524', 1932, 'Michael Lee', '2024-01-20'),
(12, 'The Hobbit', 'J.R.R. Tolkien', '9780345339683', 1937, '', '2025-07-05'),
(13, 'War and Peace', 'Leo Tolstoy', '9781400079988', 1869, 'Sarah Adams', '2024-02-10'),
(14, 'The Odyssey', 'Homer', '9780140268867', 800, NULL, NULL),
(15, 'test', 'jdjkkd', '16573763', 6167, 'wwww', '0000-00-00'),
(16, '11', '11', '1234', 1, '', '0000-00-00'),
(18, '\'lll', 'huu', '9780743', 47, '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
