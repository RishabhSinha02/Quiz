-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2022 at 05:23 AM
-- Server version: 8.0.29-0ubuntu0.22.04.2
-- PHP Version: 8.1.2

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int NOT NULL,
  `sid` int NOT NULL,
  `qno` int NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(79, 22, 11, ' Where is A?', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557A.jpeg', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557B.png', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557C.png', 'opt_images/8e9a4f5cb33f16d4cd52d42099df5557D.png', 'option1'),
(80, 29, 19, ' What is the best practice to do in your code to improve performance?', 'Using Gzip Compression', 'Dont use synchronous functions', 'Do logging correctly', 'Handle exceptions', 'option1'),
(81, 29, 20, 'Is Nodejs multithreaded?', 'Yes', 'No', '.', '.', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `quiz_questions_id` int NOT NULL,
  `quiz_subject_id` int NOT NULL,
  `qid` int NOT NULL,
  `sid` int NOT NULL,
  `qno` int NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`quiz_questions_id`, `quiz_subject_id`, `qid`, `sid`, `qno`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(1, 1, 25, 22, 1, 'What is the average of first 150 natural numbers?', '70', '70.5', '75', '75.5', 'option4'),
(2, 1, 26, 22, 2, '0.003 × 0.02 = ?', '0.06', '0.006', '0.0006', '0.00006', 'option4'),
(3, 1, 27, 22, 3, 'What is the average of the numbers: 0, 0, 4, 10, 5, and 5 ?', '2', '3', '4', '5', 'option3'),
(4, 1, 28, 22, 4, 'What is the rate of discount if a toy which price was Rs 4,000 was sold for Rs 3,200 ?', '14%', '16%', '18%', '20%', 'option4'),
(5, 1, 29, 22, 5, '|–4| + |4| – 4 + 4 = ?', '0', '2', '4', '8', 'option4'),
(6, 1, 30, 22, 6, 'What is the value of x in the equation 3x – 15 – 6 = 0 ?', '7', '8', '9', '–9', 'option1'),
(7, 1, 31, 22, 7, 'If A completes a particular work in 8 days and B completes the same work in 24 days. How many days will it take if they work together?', '4', '5', '6', '7', 'option3'),
(8, 1, 32, 22, 8, 'What comes next in the sequence: 1, 3, 11, 43, ____ ?', '161', '171', '181', '191', 'option2'),
(9, 1, 33, 22, 9, 'What is the distance traveled by a car which traveled at a speed of 80 km/hr for 3 hours and 30 minutes?', '275 km', '280 km', '285 km', '290 km', 'option2'),
(10, 1, 48, 22, 10, 'Which is Correct?\n1) 2+5 = 7\n2) 5+7 = 20\n3) 5+6 = 11\n4) 1+9 = 25', 'Option 1 and Option 4 ', 'Option 1 and Option 3', 'Option 4 ', 'None of the Above', 'option2'),
(11, 2, 36, 21, 1, 'Which type of Programming does Python support?', 'object-oriented programming', 'structured programming', 'functional programming', 'all of the mentioned', 'option4'),
(12, 2, 37, 21, 2, 'Is Python case sensitive when dealing with identifiers?', 'no', 'yes', 'machine dependent', 'none of the mentioned', 'option1'),
(13, 2, 39, 21, 3, 'Is Python code compiled or interpreted?', 'Python code is both compiled and interpreted', 'Python code is neither compiled nor interpreted', 'Python code is only compiled', 'Python code is only interpreted', 'option2'),
(14, 2, 40, 21, 4, 'All keywords in Python are in _________', 'Capitalized', 'lower case', 'UPPER CASE', 'None of the mentioned', 'option4'),
(15, 2, 41, 21, 5, 'Which of the following is used to define a block of code in Python language?', 'Indentation', 'Key', 'Brackets', 'All of the mentioned', 'option1'),
(34, 4, 55, 29, 1, 'Which of the following statement is correct?', 'js is Server Side Language.', 'js is the Client Side Language.', 'js is both Server Side and Client Side Language.', 'None of the above.', 'option1'),
(35, 4, 56, 29, 2, ' In which language is Node.js written?', 'JavaScript', 'C', 'C++', 'All of the above', 'option4'),
(36, 4, 57, 29, 3, ' Which of the following command is used to install the Node.js express module?', '$ npm install express', '$ node install express', '$ install express', 'None of the above', 'option1'),
(37, 4, 58, 29, 4, 'What is Callback? ', 'The callback is a technique in which a method calls back the caller method.', 'The callback is an asynchronous equivalent for a function.', 'Both of the above.', 'None of the above.', 'option2'),
(38, 4, 59, 29, 5, ' Which of the following extension is used to save the Node.js files?', '.js', '.node', '.java', '.txt', 'option1'),
(39, 4, 60, 29, 6, ' Which of the following method of fs module is used to get file information?', 'fs.open(path, flags[, mode], callback)', 'fs.stat(path, callback)', 'fs.readFile(path, flags[, mode], callback)', 'None of the above.', 'option2'),
(40, 4, 62, 29, 7, ' What does the fs module stand for?', 'File Service', 'File System', 'File Store', 'File Sharing', 'option2'),
(41, 4, 64, 29, 8, 'What is the default scope in the Node.js application?', 'Global', 'Local', 'Global Function', 'Local to object', 'option2'),
(42, 4, 65, 29, 9, ' Which of the following statement is used to execute the code of the sample.js file?', 'sample.js', 'node sample.js', 'nodejs sample.js', 'None of the above.', 'option2'),
(43, 4, 66, 29, 10, ' Which of the following is not a valid language for Node.js?', 'JavaScript', 'Java', 'C', 'C++', 'option1'),
(44, 4, 67, 29, 11, ' Which of the following shortcut command is used to kill a process in Node.js?', 'Ctrl+B', 'Ctrl + K', 'Ctrl+T', 'Ctrl + C', 'option4'),
(45, 4, 68, 29, 12, ' Which of the following types of applications can be built using Node.js?', 'Web Application', 'Chat Application', 'RESTful Service', 'All of the above', 'option4'),
(46, 4, 69, 29, 13, 'Which of the following platforms does Node.js support?', 'Windows', 'Macintosh', 'Unix/Linux', 'All of the above.', 'option4'),
(47, 4, 70, 29, 14, 'Which function is used to include modules in Node Js.\r\n', 'include();', 'require();', 'attach();', '.', 'option2'),
(48, 4, 71, 29, 15, ' NodeJs is ___________ Language.', 'Server Side', 'Client Side', 'Both', 'None of the above', 'option1'),
(49, 4, 72, 29, 16, ' Node.js application can access which of the following databases?', 'NoSQL databases', 'relational databases', 'All of the above', 'None of the above.', 'option3'),
(50, 4, 73, 29, 17, ' What does the fs module stand for?', 'File Store', 'File Service', 'File System', 'None of these', 'option3'),
(51, 4, 74, 29, 18, ' Which module is used to serve static resources in Node.js?', 'static', 'node-resource', 'http', 'node-static', 'option4'),
(52, 4, 80, 29, 19, ' What is the best practice to do in your code to improve performance?', 'Using Gzip Compression', 'Dont use synchronous functions', 'Do logging correctly', 'Handle exceptions', 'option1'),
(53, 4, 81, 29, 20, 'Is Nodejs multithreaded?', 'Yes', 'No', '.', '.', 'option1');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_subjects`
--

CREATE TABLE `quiz_subjects` (
  `quiz_subject_id` int NOT NULL,
  `sid` int NOT NULL,
  `quiz_subject` text NOT NULL,
  `quiz_total_questions` int NOT NULL,
  `quiz_total_marks` int NOT NULL,
  `quiz_exam_time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_subjects`
--

INSERT INTO `quiz_subjects` (`quiz_subject_id`, `sid`, `quiz_subject`, `quiz_total_questions`, `quiz_total_marks`, `quiz_exam_time`) VALUES
(1, 22, 'Maths', 10, 50, 1),
(2, 21, 'Python', 5, 10, 2),
(4, 29, 'Node JS', 20, 20, 999);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `rid` int NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sid` varchar(10) NOT NULL,
  `quiz_subject_id` int NOT NULL,
  `subject` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `subject_marks` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`rid`, `student_name`, `email`, `sid`, `quiz_subject_id`, `subject`, `total_question`, `correct_answer`, `wrong_answer`, `subject_marks`) VALUES
(1, 'Keshabh Sinha', 'keshabhsinha2000@gmail.com', '21', 2, 'Python', '5', '1', '4', 10),
(2, 'Rishabh Sinha', 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '10', '2', '8', 50);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sid` int NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sid`, `subject`, `description`) VALUES
(10, 'Programming in C', 'Test for Programmimg in C'),
(21, 'Python', 'Test for Python'),
(22, 'Maths', 'Quiz for Maths '),
(29, 'Node JS', 'Node.js');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `test` varchar(20) NOT NULL,
  `quiz_subject_id` int NOT NULL,
  `testStatus` varchar(20) NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `email`, `password`, `test`, `quiz_subject_id`, `testStatus`, `role`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '', 0, '', 1),
(19, 'Interns', 'anirudh.shastry@ellipsonic.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(20, 'Vishruth', '199vishruth@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(21, 'Usman', 'skusmanbca@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(22, 'Pannaga', 'pannaga.bharadhwaj@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(23, 'Apoorva', '6767apoorva@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(24, 'Monica', 'monica.b.raju001@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(25, 'Spurthi', 'spurthis10@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(26, 'Lavanya', 'lavanya.akshu18@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(27, 'Gowthami', 'greeshmanaidu802@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(28, 'Vijay Kumar', 'vijaykumarynh7@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(29, 'Sandeep', 'sandeeppatil2317@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(30, 'Swasti', 'swastishetty6@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(31, 'Sahana', 'sahanaramesh65@gmail.com', 'Quiz@ellipsonic', 'Node JS ', 4, 'true', 2),
(32, 'Rishabh Sinha', 'sinharishabh2002@gmail.com', 'sinha', 'Maths', 1, 'true', 2);

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `vno` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `sid` varchar(11) NOT NULL,
  `quiz_subject_id` int NOT NULL,
  `subject` varchar(100) NOT NULL,
  `qid` varchar(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(50) NOT NULL,
  `selected_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`vno`, `email`, `sid`, `quiz_subject_id`, `subject`, `qid`, `question`, `answer`, `selected_option`) VALUES
(1, 'keshabhsinha2000@gmail.com', '21', 2, 'Python', '36', 'Which type of Programming does Python support?', 'option4', 'option1'),
(2, 'keshabhsinha2000@gmail.com', '21', 2, 'Python', '37', 'Is Python case sensitive when dealing with identifiers?', 'option1', 'option3'),
(3, 'keshabhsinha2000@gmail.com', '21', 2, 'Python', '39', 'Is Python code compiled or interpreted?', 'option2', 'option4'),
(4, 'keshabhsinha2000@gmail.com', '21', 2, 'Python', '40', 'All keywords in Python are in _________', 'option4', 'option4'),
(5, 'keshabhsinha2000@gmail.com', '21', 2, 'Python', '41', 'Which of the following is used to define a block of code in Python language?', 'option1', 'option4'),
(6, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '25', 'What is the average of first 150 natural numbers?', 'option4', 'option1'),
(7, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '26', '0.003 × 0.02 = ?', 'option4', 'option3'),
(8, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '27', 'What is the average of the numbers: 0, 0, 4, 10, 5, and 5 ?', 'option3', 'option3'),
(9, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '28', 'What is the rate of discount if a toy which price was Rs 4,000 was sold for Rs 3,200 ?', 'option4', 'option1'),
(10, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '29', '|–4| + |4| – 4 + 4 = ?', 'option4', ''),
(11, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '30', 'What is the value of x in the equation 3x – 15 – 6 = 0 ?', 'option1', 'option4'),
(12, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '31', 'If A completes a particular work in 8 days and B completes the same work in 24 days. How many days will it take if they work together?', 'option3', 'option2'),
(13, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '32', 'What comes next in the sequence: 1, 3, 11, 43, ____ ?', 'option2', 'option1'),
(14, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '33', 'What is the distance traveled by a car which traveled at a speed of 80 km/hr for 3 hours and 30 minutes?', 'option2', 'option2'),
(15, 'sinharishabh2002@gmail.com', '22', 1, 'Maths', '48', 'Which is Correct?\n1) 2+5 = 7\n2) 5+7 = 20\n3) 5+6 = 11\n4) 1+9 = 25', 'option2', 'option1');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `quiz_questions_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `quiz_subjects`
--
ALTER TABLE `quiz_subjects`
  MODIFY `quiz_subject_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `rid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `vno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
