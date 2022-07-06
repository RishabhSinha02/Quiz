-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 07:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `description`) VALUES
(1, '1st', 'Class'),
(2, '2nd', ' Class'),
(6, 'Ellipsonic ', ' Group');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `sid`, `qno`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(2, 21, 1, 'Code for displaying the following output: Hello World.', 'echo \"Hello Wolrd\";', 'console.log(\"Hello World\");', 'print(\"Hello World\")', 'printf(\"Hello World\");', 'option3'),
(3, 10, 1, 'Who invented C Language?', 'Charles Babbage', 'Grahambel', 'Dennis Ritchie', 'Steve Jobs', 'option3'),
(23, 24, 1, 'Addition of 24 and 65.', '14', '89', '76', '96', 'option2'),
(25, 22, 1, 'What is the average of first 150 natural numbers?', '70', '70.5', '75', '75.5', 'option4'),
(26, 22, 2, '0.003 × 0.02 = ?', '0.06', '0.006', '0.0006', '0.00006', 'option4'),
(27, 22, 3, 'What is the average of the numbers: 0, 0, 4, 10, 5, and 5 ?', '2', '3', '4', '5', 'option3'),
(28, 22, 4, 'What is the rate of discount if a toy which price was Rs 4,000 was sold for Rs 3,200 ?', '14%', '16%', '18%', '20%', 'option4'),
(29, 22, 5, '|–4| + |4| – 4 + 4 = ?', '0', '2', '4', '8', 'option4'),
(30, 22, 6, 'What is the value of x in the equation 3x – 15 – 6 = 0 ?', '7', '8', '9', '–9', 'option1'),
(31, 22, 7, 'If A completes a particular work in 8 days and B completes the same work in 24 days. How many days will it take if they work together?', '4', '5', '6', '7', 'option3'),
(32, 22, 8, 'What comes next in the sequence: 1, 3, 11, 43, ____ ?', '161', '171', '181', '191', 'option2'),
(33, 22, 9, 'What is the distance traveled by a car which traveled at a speed of 80 km/hr for 3 hours and 30 minutes?', '275 km', '280 km', '285 km', '290 km', 'option2'),
(35, 21, 2, 'Who developed Python Programming Language?', 'Wick van Rossum', 'Rasmus Lerdorf', 'Guido van Rossum', 'Niene Stom', 'option3'),
(36, 21, 3, 'Which type of Programming does Python support?', 'object-oriented programming', 'structured programming', 'functional programming', 'all of the mentioned', 'option4'),
(37, 21, 4, 'Is Python case sensitive when dealing with identifiers?', 'no', 'yes', 'machine dependent', 'none of the mentioned', 'option1'),
(38, 21, 5, 'Which of the following is the correct extension of the Python file?', '.python', '.pl', '.py', '.p', 'option3'),
(39, 21, 6, 'Is Python code compiled or interpreted?', 'Python code is both compiled and interpreted', 'Python code is neither compiled nor interpreted', 'Python code is only compiled', 'Python code is only interpreted', 'option2'),
(40, 21, 7, 'All keywords in Python are in _________', 'Capitalized', 'lower case', 'UPPER CASE', 'None of the mentioned', 'option4'),
(41, 21, 8, 'Which of the following is used to define a block of code in Python language?', 'Indentation', 'Key', 'Brackets', 'All of the mentioned', 'option1'),
(43, 21, 10, 'Which of the following character is used to give single-line comments in Python?', '//', '#', '!', '/*', 'option2'),
(44, 10, 2, 'What is the 16-bit compiler allowable range for integer constants?', '-3.4e38 to 3.4e38', '-32767 to 32768', '-32668 to 32667', '-32768 to 32767', 'option4'),
(45, 10, 3, 'What is required in each C program?', 'The program must have at least one function.', 'The program does not require any function.', 'Input data', 'Output data', 'option1'),
(46, 10, 4, 'Which of the following comment is correct when a macro definition includes arguments?', 'The opening parenthesis should immediately follow the macro name.', 'There should be at least one blank between the macro name and the opening parenthesis.', 'There should be only one blank between the macro name and the opening parenthesis.', 'All the above comments are correct.', 'option1'),
(47, 10, 5, 'What is a lint?', 'C compiler', 'Interactive debugger', 'Analyzing tool', 'C interpreter', 'option3'),
(48, 22, 11, 'Which is Correct?\n1) 2+5 = 7\n2) 5+7 = 20\n3) 5+6 = 11\n4) 1+9 = 25', 'Option 1 and Option 4 ', 'Option 1 and Option 3', 'Option 4 ', 'None of the Above', 'option2'),
(49, 21, 11, 'Which is the correct code of Python.\r\n1)var a = 2; \r\n2)print(\"Hello World\")\r\n3)console.log(\"Hello World\");\r\n4)a= 2 ', 'Option 2', 'Option 1 and Option 4', 'Option 2 and Option 4', 'None of the Above', 'option3'),
(55, 29, 1, 'Which of the following statement is correct?', 'js is Server Side Language.', 'js is the Client Side Language.', 'js is both Server Side and Client Side Language.', 'None of the above.', 'option1'),
(56, 29, 2, ' In which language is Node.js written?', 'JavaScript', 'C', 'C++', 'All of the above', 'option4'),
(57, 29, 3, ' Which of the following command is used to install the Node.js express module?', '$ npm install express', '$ node install express', '$ install express', 'None of the above', 'option1'),
(58, 29, 4, 'What is Callback? ', 'The callback is a technique in which a method calls back the caller method.', 'The callback is an asynchronous equivalent for a function.', 'Both of the above.', 'None of the above.', 'option2'),
(59, 29, 5, ' Which of the following extension is used to save the Node.js files?', '.js', '.node', '.java', '.txt', 'option1'),
(60, 29, 6, ' Which of the following method of fs module is used to get file information?', 'fs.open(path, flags[, mode], callback)', 'fs.stat(path, callback)', 'fs.readFile(path, flags[, mode], callback)', 'None of the above.', 'option2'),
(62, 29, 7, ' What does the fs module stand for?', 'File Service', 'File System', 'File Store', 'File Sharing', 'option2'),
(64, 29, 8, 'What is the default scope in the Node.js application?', 'Global', 'Local', 'Global Function', 'Local to object', 'option2'),
(65, 29, 9, ' Which of the following statement is used to execute the code of the sample.js file?', 'sample.js', 'node sample.js', 'nodejs sample.js', 'None of the above.', 'option2'),
(66, 29, 10, ' Which of the following is not a valid language for Node.js?', 'JavaScript', 'Java', 'C', 'C++', 'option1'),
(67, 29, 11, ' Which of the following shortcut command is used to kill a process in Node.js?', 'Ctrl+B', 'Ctrl + K', 'Ctrl+T', 'Ctrl + C', 'option4'),
(68, 29, 12, ' Which of the following types of applications can be built using Node.js?', 'Web Application', 'Chat Application', 'RESTful Service', 'All of the above', 'option4'),
(69, 29, 13, 'Which of the following platforms does Node.js support?', 'Windows', 'Macintosh', 'Unix/Linux', 'All of the above.', 'option4'),
(70, 29, 14, 'Which function is used to include modules in Node Js.\r\n', 'include();', 'require();', 'attach();', '.', 'option2'),
(71, 29, 15, ' NodeJs is ___________ Language.', 'Server Side', 'Client Side', 'Both', 'None of the above', 'option1'),
(72, 29, 16, ' Node.js application can access which of the following databases?', 'NoSQL databases', 'relational databases', 'All of the above', 'None of the above.', 'option3'),
(73, 29, 17, ' What does the fs module stand for?', 'File Store', 'File Service', 'File System', 'None of these', 'option3'),
(74, 29, 18, ' Which module is used to serve static resources in Node.js?', 'static', 'node-resource', 'http', 'node-static', 'option4'),
(75, 29, 19, 'What is the best practice to do in your code to improve the performance of your application?', 'Using gzip compression.', 'Don\'t use synchronous functions.', 'Do logging correctly.', 'Handle exceptions properly.', 'option1'),
(76, 29, 20, 'Is Node.js multithreaded?', 'Yes', 'No', '.', '.', 'option1'),
(79, 22, 11, ' Where is A?', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557A.jpeg', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557B.png', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557C.png', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557D.png', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quiz_questions_id` int(11) NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quiz_questions_id`, `quiz_subject_id`, `qid`, `sid`, `qno`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(6, 2, 2, 21, 1, 'Code for displaying the following output: Hello World.', 'echo \"Hello Wolrd\";', 'console.log(\"Hello World\");', 'print(\"Hello World\")', 'printf(\"Hello World\");', 'option3'),
(7, 2, 35, 21, 2, 'Who developed Python Programming Language?', 'Wick van Rossum', 'Rasmus Lerdorf', 'Guido van Rossum', 'Niene Stom', 'option3'),
(8, 2, 36, 21, 3, 'Which type of Programming does Python support?', 'object-oriented programming', 'structured programming', 'functional programming', 'all of the mentioned', 'option4'),
(9, 2, 38, 21, 4, 'Which of the following is the correct extension of the Python file?', '.python', '.pl', '.py', '.p', 'option3'),
(10, 2, 40, 21, 5, 'All keywords in Python are in _________', 'Capitalized', 'lower case', 'UPPER CASE', 'None of the mentioned', 'option4'),
(11, 1, 25, 22, 1, 'What is the average of first 150 natural numbers?', '70', '70.5', '75', '75.5', 'option4'),
(12, 1, 26, 22, 2, '0.003 × 0.02 = ?', '0.06', '0.006', '0.0006', '0.00006', 'option4'),
(13, 1, 27, 22, 3, 'What is the average of the numbers: 0, 0, 4, 10, 5, and 5 ?', '2', '3', '4', '5', 'option3'),
(14, 1, 29, 22, 4, '|–4| + |4| – 4 + 4 = ?', '0', '2', '4', '8', 'option4'),
(15, 1, 48, 22, 5, 'Which is Correct?\n1) 2+5 = 7\n2) 5+7 = 20\n3) 5+6 = 11\n4) 1+9 = 25', 'Option 1 and Option 4 ', 'Option 1 and Option 3', 'Option 4 ', 'None of the Above', 'option2'),
(47, 8, 55, 29, 1, 'Which of the following statement is correct?', 'js is Server Side Language.', 'js is the Client Side Language.', 'js is both Server Side and Client Side Language.', 'None of the above.', 'option1'),
(48, 8, 56, 29, 2, ' In which language is Node.js written?', 'JavaScript', 'C', 'C++', 'All of the above', 'option4'),
(49, 8, 57, 29, 3, ' Which of the following command is used to install the Node.js express module?', '$ npm install express', '$ node install express', '$ install express', 'None of the above', 'option1'),
(50, 8, 58, 29, 4, 'What is Callback? ', 'The callback is a technique in which a method calls back the caller method.', 'The callback is an asynchronous equivalent for a function.', 'Both of the above.', 'None of the above.', 'option2'),
(51, 8, 59, 29, 5, ' Which of the following extension is used to save the Node.js files?', '.js', '.node', '.java', '.txt', 'option1'),
(52, 8, 60, 29, 6, ' Which of the following method of fs module is used to get file information?', 'fs.open(path, flags[, mode], callback)', 'fs.stat(path, callback)', 'fs.readFile(path, flags[, mode], callback)', 'None of the above.', 'option2'),
(53, 8, 62, 29, 7, ' What does the fs module stand for?', 'File Service', 'File System', 'File Store', 'File Sharing', 'option2'),
(54, 8, 64, 29, 8, 'What is the default scope in the Node.js application?', 'Global', 'Local', 'Global Function', 'Local to object', 'option2'),
(55, 8, 65, 29, 9, ' Which of the following statement is used to execute the code of the sample.js file?', 'sample.js', 'node sample.js', 'nodejs sample.js', 'None of the above.', 'option2'),
(56, 8, 66, 29, 10, ' Which of the following is not a valid language for Node.js?', 'JavaScript', 'Java', 'C', 'C++', 'option1'),
(57, 8, 67, 29, 11, ' Which of the following shortcut command is used to kill a process in Node.js?', 'Ctrl+B', 'Ctrl + K', 'Ctrl+T', 'Ctrl + C', 'option4'),
(58, 8, 68, 29, 12, ' Which of the following types of applications can be built using Node.js?', 'Web Application', 'Chat Application', 'RESTful Service', 'All of the above', 'option4'),
(59, 8, 69, 29, 13, 'Which of the following platforms does Node.js support?', 'Windows', 'Macintosh', 'Unix/Linux', 'All of the above.', 'option4'),
(60, 8, 70, 29, 14, 'Which function is used to include modules in Node Js.\r\n', 'include();', 'require();', 'attach();', '.', 'option2'),
(61, 8, 71, 29, 15, ' NodeJs is ___________ Language.', 'Server Side', 'Client Side', 'Both', 'None of the above', 'option1'),
(62, 8, 72, 29, 16, ' Node.js application can access which of the following databases?', 'NoSQL databases', 'relational databases', 'All of the above', 'None of the above.', 'option3'),
(63, 8, 73, 29, 17, ' What does the fs module stand for?', 'File Store', 'File Service', 'File System', 'None of these', 'option3'),
(64, 8, 74, 29, 18, ' Which module is used to serve static resources in Node.js?', 'static', 'node-resource', 'http', 'node-static', 'option4'),
(65, 8, 74, 29, 19, 'What is the best practice to do in your code to improve the performance of your application?', 'Using gzip compression.', 'Don\'t use synchronous functions.', 'Do logging correctly.', 'Handle exceptions properly.', 'option1'),
(66, 8, 74, 29, 20, 'Is Node.js multithreaded?', 'Yes', 'No', '.', '.', 'option1'),
(77, 13, 3, 10, 1, 'Who invented C Language?', 'Charles Babbage', 'Grahambel', 'Dennis Ritchie', 'Steve Jobs', 'option3'),
(78, 13, 45, 10, 2, 'What is required in each C program?', 'The program must have at least one function.', 'The program does not require any function.', 'Input data', 'Output data', 'option1'),
(79, 13, 46, 10, 3, 'Which of the following comment is correct when a macro definition includes arguments?', 'The opening parenthesis should immediately follow the macro name.', 'There should be at least one blank between the macro name and the opening parenthesis.', 'There should be only one blank between the macro name and the opening parenthesis.', 'All the above comments are correct.', 'option1'),
(80, 14, 46, 10, 1, 'Which of the following comment is correct when a macro definition includes arguments?', 'The opening parenthesis should immediately follow the macro name.', 'There should be at least one blank between the macro name and the opening parenthesis.', 'There should be only one blank between the macro name and the opening parenthesis.', 'All the above comments are correct.', 'option1'),
(81, 14, 47, 10, 2, 'What is a lint?', 'C compiler', 'Interactive debugger', 'Analyzing tool', 'C interpreter', 'option3'),
(82, 15, 79, 22, 1, ' Where is A?', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557A.jpeg', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557B.png', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557C.png', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557D.png', 'option1'),
(83, 16, 55, 29, 1, 'Which of the following statement is correct?', 'js is Server Side Language.', 'js is the Client Side Language.', 'js is both Server Side and Client Side Language.', 'None of the above.', 'option1'),
(84, 16, 56, 29, 2, ' In which language is Node.js written?', 'JavaScript', 'C', 'C++', 'All of the above', 'option4'),
(85, 16, 57, 29, 3, ' Which of the following command is used to install the Node.js express module?', '$ npm install express', '$ node install express', '$ install express', 'None of the above', 'option1'),
(86, 16, 58, 29, 4, 'What is Callback? ', 'The callback is a technique in which a method calls back the caller method.', 'The callback is an asynchronous equivalent for a function.', 'Both of the above.', 'None of the above.', 'option2'),
(87, 16, 59, 29, 5, ' Which of the following extension is used to save the Node.js files?', '.js', '.node', '.java', '.txt', 'option1'),
(88, 16, 60, 29, 6, ' Which of the following method of fs module is used to get file information?', 'fs.open(path, flags[, mode], callback)', 'fs.stat(path, callback)', 'fs.readFile(path, flags[, mode], callback)', 'None of the above.', 'option2'),
(89, 16, 62, 29, 7, ' What does the fs module stand for?', 'File Service', 'File System', 'File Store', 'File Sharing', 'option2'),
(93, 18, 56, 29, 1, ' In which language is Node.js written?', 'JavaScript', 'C', 'C++', 'All of the above', 'option4'),
(94, 18, 70, 29, 2, 'Which function is used to include modules in Node Js.\r\n', 'include();', 'require();', 'attach();', '.', 'option2'),
(95, 18, 72, 29, 3, ' Node.js application can access which of the following databases?', 'NoSQL databases', 'relational databases', 'All of the above', 'None of the above.', 'option3'),
(96, 18, 73, 29, 4, ' What does the fs module stand for?', 'File Store', 'File Service', 'File System', 'None of these', 'option3'),
(97, 18, 74, 29, 5, ' Which module is used to serve static resources in Node.js?', 'static', 'node-resource', 'http', 'node-static', 'option4'),
(98, 19, 55, 29, 1, 'Which of the following statement is correct?', 'js is Server Side Language.', 'js is the Client Side Language.', 'js is both Server Side and Client Side Language.', 'None of the above.', 'option1'),
(99, 19, 56, 29, 2, ' In which language is Node.js written?', 'JavaScript', 'C', 'C++', 'All of the above', 'option4'),
(100, 19, 57, 29, 3, ' Which of the following command is used to install the Node.js express module?', '$ npm install express', '$ node install express', '$ install express', 'None of the above', 'option1'),
(101, 19, 58, 29, 4, 'What is Callback? ', 'The callback is a technique in which a method calls back the caller method.', 'The callback is an asynchronous equivalent for a function.', 'Both of the above.', 'None of the above.', 'option2'),
(102, 19, 59, 29, 5, ' Which of the following extension is used to save the Node.js files?', '.js', '.node', '.java', '.txt', 'option1'),
(103, 19, 60, 29, 6, ' Which of the following method of fs module is used to get file information?', 'fs.open(path, flags[, mode], callback)', 'fs.stat(path, callback)', 'fs.readFile(path, flags[, mode], callback)', 'None of the above.', 'option2'),
(104, 19, 62, 29, 7, ' What does the fs module stand for?', 'File Service', 'File System', 'File Store', 'File Sharing', 'option2'),
(105, 19, 64, 29, 8, 'What is the default scope in the Node.js application?', 'Global', 'Local', 'Global Function', 'Local to object', 'option2'),
(106, 19, 65, 29, 9, ' Which of the following statement is used to execute the code of the sample.js file?', 'sample.js', 'node sample.js', 'nodejs sample.js', 'None of the above.', 'option2'),
(107, 19, 66, 29, 10, ' Which of the following is not a valid language for Node.js?', 'JavaScript', 'Java', 'C', 'C++', 'option1'),
(108, 19, 67, 29, 11, ' Which of the following shortcut command is used to kill a process in Node.js?', 'Ctrl+B', 'Ctrl + K', 'Ctrl+T', 'Ctrl + C', 'option4'),
(109, 19, 68, 29, 12, ' Which of the following types of applications can be built using Node.js?', 'Web Application', 'Chat Application', 'RESTful Service', 'All of the above', 'option4'),
(110, 19, 69, 29, 13, 'Which of the following platforms does Node.js support?', 'Windows', 'Macintosh', 'Unix/Linux', 'All of the above.', 'option4'),
(111, 19, 70, 29, 14, 'Which function is used to include modules in Node Js.\r\n', 'include();', 'require();', 'attach();', '.', 'option2'),
(112, 19, 71, 29, 15, ' NodeJs is ___________ Language.', 'Server Side', 'Client Side', 'Both', 'None of the above', 'option1'),
(113, 19, 72, 29, 16, ' Node.js application can access which of the following databases?', 'NoSQL databases', 'relational databases', 'All of the above', 'None of the above.', 'option3'),
(114, 19, 73, 29, 17, ' What does the fs module stand for?', 'File Store', 'File Service', 'File System', 'None of these', 'option3'),
(115, 19, 74, 29, 18, ' Which module is used to serve static resources in Node.js?', 'static', 'node-resource', 'http', 'node-static', 'option4');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_subjects`
--

CREATE TABLE `quiz_subjects` (
  `quiz_subject_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `quiz_subject` text NOT NULL,
  `quiz_total_questions` int(50) NOT NULL,
  `quiz_total_marks` int(50) NOT NULL,
  `quiz_exam_time` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_subjects`
--

INSERT INTO `quiz_subjects` (`quiz_subject_id`, `sid`, `quiz_subject`, `quiz_total_questions`, `quiz_total_marks`, `quiz_exam_time`) VALUES
(2, 21, 'Python', 5, 20, 2),
(8, 29, 'Node JS', 20, 20, 999),
(13, 10, 'Programming in C', 3, 12, 1),
(15, 22, 'Maths', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `rid` int(5) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `subject_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`rid`, `student_name`, `email`, `class_id`, `sid`, `quiz_subject_id`, `subject`, `total_question`, `correct_answer`, `wrong_answer`, `subject_marks`) VALUES
(1, 'Komal', 'captainkomal0910@gmail.com', 2, '21', 2, 'Python ', '5', '1', '4', 20),
(6, 'Rishabh', 'sinharishabh2002@gmail.com', 2, '10', 14, 'Programming in C ', '2', '2', '0', 6),
(9, 'Anirudha', 'cswqwc@fvv', 2, '10', 13, 'Programming in C ', '3', '3', '0', 12),
(10, 'Komal', 'captainkomal0910@gmail.com', 2, '10', 14, 'Programming in C ', '2', '1', '1', 6),
(12, 'Rishabh', 'sinharishabh2002@gmail.com', 2, '22', 15, 'Maths ', '1', '1', '0', 1),
(13, 'Aditya', 'pandaaditya04@gmail.com', 1, '29', 16, 'Node JS', '7', '2', '5', 7),
(14, 'Arun Sinha', 'arunsinha9661@gmail.com', 1, '29', 18, 'Node JS', '5', '1', '4', 10),
(15, 'Keshabh Sinha', 'keshabhsinha2000@gmail.com', 2, '10', 13, 'Programming in C', '3', '1', '2', 12),
(17, 'Anirudhaa', 'aniruddha@duck.com', 2, '10', 13, 'Programming in C', '3', '3', '0', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sid` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sid`, `subject`, `description`, `class_id`, `class_name`) VALUES
(10, 'Programming in C', 'Test for Programmimg in C', 2, '2nd'),
(21, 'Python', 'Test for Python', 2, '2nd'),
(22, 'Maths', 'Quiz for Maths ', 1, '1st'),
(29, 'Node JS', 'Node.js', 6, 'Ellipsonic'),
(33, 'English', ' Quiz', 1, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `test` varchar(20) NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `class_id` int(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `email`, `password`, `test`, `quiz_subject_id`, `class_id`, `role`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '', 0, 0, 1),
(11, 'Anirudhaa', 'aniruddha@duck.com', '58imurdb', 'Programming in C', 13, 2, 2),
(14, 'Komal', 'captainkomal0910@gmail.com', 'byfik#zl', 'Programming in C ', 14, 1, 2),
(34, 'Rishabh', 'sinharishabh2002@gmail.com', '5o$1kxfe', 'Programming in C', 13, 2, 2),
(36, 'Aditya', 'pandaaditya04@gmail.com', 'abcd', 'Node JS', 16, 1, 2),
(37, 'Keshabh Sinha', 'keshabhsinha2000@gmail.com', 'vuc1hw$e', 'Programming in C', 13, 2, 2),
(45, 'Rishabh Sinha', 'fs19co057.rishabh.sinha@gmail.com', 'fjwnd6s2', 'Programming in C', 13, 2, 2),
(46, 'Interns', 'anirudh.shastry@ellipsonic.com', '', '', 0, 6, 2),
(47, 'Vishruth', '199vishruth@gmail.com', '', '', 0, 6, 2),
(48, 'Usman', 'skusmanbca@gmail.com', '', '', 0, 6, 2),
(49, 'Pannaga', 'pannaga.bharadhwaj@gmail.com', '', '', 0, 6, 2),
(50, 'Apoorva', '6767apoorva@gmail.com', '', '', 0, 6, 2),
(51, 'Monica', 'monica.b.raju001@gmail.com', '', '', 0, 6, 2),
(52, 'Spurthi', 'spurthis10@gmail.com', '', '', 0, 6, 2),
(53, 'Lavanya', 'lavanya.akshu18@gmail.com', '', '', 0, 6, 2),
(54, 'Gowthami', 'greeshmanaidu802@gmail.com', '', '', 0, 6, 2),
(55, 'Vijay Kumar', 'vijaykumarynh7@gmail.com', '', '', 0, 6, 2),
(56, 'Sandeep', 'sandeeppatil2317@gmail.com', '', '', 0, 6, 2),
(58, 'Swasti', 'swastishetty6@gmail.com', '', '', 0, 6, 2),
(59, 'Sahana', 'sahanaramesh65@gmail.com', '', '', 0, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `vno` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sid` varchar(11) NOT NULL,
  `quiz_subject_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `qid` varchar(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(50) NOT NULL,
  `selected_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`vno`, `email`, `sid`, `quiz_subject_id`, `subject`, `qid`, `question`, `answer`, `selected_option`) VALUES
(1, 'captainkomal0910@gmail.com', '21', 2, 'Python ', '2', 'Code for displaying the following output: Hello World.', 'option3', 'option2'),
(2, 'captainkomal0910@gmail.com', '21', 2, 'Python ', '35', 'Who developed Python Programming Language?', 'option3', 'option1'),
(3, 'captainkomal0910@gmail.com', '21', 2, 'Python ', '36', 'Which type of Programming does Python support?', 'option4', 'option2'),
(4, 'captainkomal0910@gmail.com', '21', 2, 'Python ', '38', 'Which of the following is the correct extension of the Python file?', 'option3', 'option3'),
(5, 'captainkomal0910@gmail.com', '21', 2, 'Python ', '40', 'All keywords in Python are in _________', 'option4', 'option2'),
(24, 'sinharishabh2002@gmail.com', '10', 14, 'Programming in C ', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option1'),
(25, 'sinharishabh2002@gmail.com', '10', 14, 'Programming in C ', '47', 'What is a lint?', 'option3', 'option3'),
(31, 'cswqwc@fvv', '10', 13, 'Programming in C ', '3', 'Who invented C Language?', 'option3', 'option3'),
(32, 'cswqwc@fvv', '10', 13, 'Programming in C ', '45', 'What is required in each C program?', 'option1', 'option1'),
(33, 'cswqwc@fvv', '10', 13, 'Programming in C ', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option1'),
(34, 'captainkomal0910@gmail.com', '10', 14, 'Programming in C ', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option1'),
(35, 'captainkomal0910@gmail.com', '10', 14, 'Programming in C ', '47', 'What is a lint?', 'option3', 'option4'),
(38, 'sinharishabh2002@gmail.com', '22', 15, 'Maths ', '79', ' Where is A?', 'option1', 'option1'),
(39, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '55', 'Which of the following statement is correct?', 'option1', 'option1'),
(40, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '56', ' In which language is Node.js written?', 'option4', 'option1'),
(41, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '57', ' Which of the following command is used to install the Node.js express module?', 'option1', 'option2'),
(42, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '58', 'What is Callback? ', 'option2', 'option1'),
(43, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '59', ' Which of the following extension is used to save the Node.js files?', 'option1', 'option1'),
(44, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '60', ' Which of the following method of fs module is used to get file information?', 'option2', 'option3'),
(45, 'pandaaditya04@gmail.com', '29', 16, 'Node JS', '62', ' What does the fs module stand for?', 'option2', 'option1'),
(46, 'arunsinha9661@gmail.com', '29', 18, 'Node JS', '56', ' In which language is Node.js written?', 'option4', 'option1'),
(47, 'arunsinha9661@gmail.com', '29', 18, 'Node JS', '70', 'Which function is used to include modules in Node Js.\r\n', 'option2', 'option1'),
(48, 'arunsinha9661@gmail.com', '29', 18, 'Node JS', '72', ' Node.js application can access which of the following databases?', 'option3', 'option3'),
(49, 'arunsinha9661@gmail.com', '29', 18, 'Node JS', '73', ' What does the fs module stand for?', 'option3', 'option1'),
(50, 'arunsinha9661@gmail.com', '29', 18, 'Node JS', '74', ' Which module is used to serve static resources in Node.js?', 'option4', ''),
(51, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option2'),
(52, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(53, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option4'),
(54, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option2'),
(55, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(56, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option4'),
(57, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option1'),
(58, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(59, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option4'),
(60, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option1'),
(61, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(62, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option4'),
(63, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option1'),
(64, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(65, 'keshabhsinha2000@gmail.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option4'),
(66, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '55', 'Which of the following statement is correct?', 'option1', 'option1'),
(67, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '56', ' In which language is Node.js written?', 'option4', 'option3'),
(68, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '57', ' Which of the following command is used to install the Node.js express module?', 'option1', 'option1'),
(69, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '58', 'What is Callback? ', 'option2', 'option2'),
(70, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '59', ' Which of the following extension is used to save the Node.js files?', 'option1', 'option1'),
(71, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '60', ' Which of the following method of fs module is used to get file information?', 'option2', 'option3'),
(72, 'pandaaditya04@gmail.com', '', 16, 'Node JS', '62', ' What does the fs module stand for?', 'option2', 'option4'),
(73, 'aniruddha@duck.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option3'),
(74, 'aniruddha@duck.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(75, 'aniruddha@duck.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option1'),
(76, 'aniruddha@duck.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option3'),
(77, 'aniruddha@duck.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(78, 'aniruddha@duck.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option1'),
(79, 'aniruddha@duck.com', '10', 13, 'Programming in C', '3', 'Who invented C Language?', 'option3', 'option3'),
(80, 'aniruddha@duck.com', '10', 13, 'Programming in C', '45', 'What is required in each C program?', 'option1', 'option1'),
(81, 'aniruddha@duck.com', '10', 13, 'Programming in C', '46', 'Which of the following comment is correct when a macro definition includes arguments?', 'option1', 'option1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`),
  ADD KEY `answer` (`answer`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`quiz_questions_id`);

--
-- Indexes for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  ADD PRIMARY KEY (`quiz_subject_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`vno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `quiz_questions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  MODIFY `quiz_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `rid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `vno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
