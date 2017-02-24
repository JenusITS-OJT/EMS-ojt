-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 03:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jenusits`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Branch` (IN `b_id` INT(3), IN `b_Address` VARCHAR(50), IN `b_Contact_no` VARCHAR(15), IN `b_Email` VARCHAR(20), IN `b_Date_Established` DATE)  BEGIN

DELETE FROM branch

WHERE id = b_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Department` (IN `d_id` INT(3), IN `d_Dept_Name` VARCHAR(50), IN `d_Functions` VARCHAR(50))  BEGIN

DELETE FROM department

WHERE

d_id = id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Educational_Level` (IN `el_id` INT(3), IN `el_Educational_Level_Name` VARCHAR(100))  BEGIN

DELETE FROM educational_level

WHERE

el_id = id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Employee` (IN `e_User_ID` INT, IN `e_ID` VARCHAR(20), IN `e_First_Name` VARCHAR(50), IN `e_Last_Name` VARCHAR(50), IN `e_Middle_Name` VARCHAR(50), IN `e_Extension_Name` VARCHAR(20), IN `e_Gender` BIT(1), IN `e_Birthday` DATE, IN `e_Street` VARCHAR(50), IN `e_City` VARCHAR(20), IN `e_State` VARCHAR(50), IN `e_Country` VARCHAR(20), IN `e_ZIPCode` VARCHAR(20), IN `e_Contact_No` VARCHAR(15), IN `e_Email` VARCHAR(50), IN `e_Civil_Status` VARCHAR(20), IN `e_Citizenship` VARCHAR(30), IN `e_Date_Hired` DATE, IN `e_SSS` VARCHAR(50), IN `e_GSIS` VARCHAR(50), IN `e_TIN` VARCHAR(50), IN `e_PhilHealth` VARCHAR(50), IN `e_Pagibig` VARCHAR(50), IN `e_Username` VARCHAR(20), IN `e_Password` VARCHAR(50))  BEGIN

DELETE FROM employee 
WHERE e_User_ID = User_ID &&
e_ID = ID;                             

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Emp_EducBG` (IN `eb_id` INT(3), IN `eb_School` VARCHAR(100), IN `eb_Level_ID` INT(3), IN `eb_Address` VARCHAR(200), IN `eb_From_Year` DATE, IN `eb_To_Year` DATE)  BEGIN 

DELETE FROM emp_educbg
 
WHERE
 
id = eb_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Delete_Status` (IN `s_id` INT(3), IN `s_Status_Name` VARCHAR(20))  BEGIN

DELETE FROM status

WHERE

id = s_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Branch` (IN `b_id` INT(3), IN `b_Address` VARCHAR(50), IN `b_Contact_No` VARCHAR(15), IN `b_Email` VARCHAR(20), IN `b_Date_Established` DATE, IN `Status` BIT(1))  BEGIN

insert into branch
(    
id,Address, Contact_No, Email, Date_Established, Status
) 
   
VALUES
(    
 b_id, b_Address, b_Contact_No, b_Email , b_Date_Established, Status
);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Department` (IN `d_id` INT(3), IN `d_Dept_Name` VARCHAR(50), IN `d_Functions` VARCHAR(50))  BEGIN 

insert into department ( id,Dept_Name, Functions ) 

VALUES ( d_ID,d_Dept_Name, d_Functions );


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Educational_Level` (IN `el_id` INT(3), IN `el_Educatinal_Level_Name` VARCHAR(100))  BEGIN 

insert into educational_level ( id,educational_Level_Name ) 

VALUES ( el_ID, el_Educatinal_Level_Name);


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Employee` (IN `e_User_ID` INT(3), IN `e_ID` VARCHAR(20), IN `e_First_Name` VARCHAR(50), IN `e_Middle_Name` VARCHAR(50), IN `e_Last_Name` VARCHAR(50), IN `e_Extension_Name` VARCHAR(20), IN ` e_Gender` BIT(1), IN `e_Birthday` DATE, IN `e_Street` VARCHAR(50), IN `e_City` VARCHAR(20), IN `e_State` VARCHAR(50), IN `e_Country` VARCHAR(20), IN `e_ZIPCODE` VARCHAR(20), IN `e_Contact_No` VARCHAR(15), IN `e_Email` VARCHAR(50), IN `e_Civil_Status` VARCHAR(20), IN `e_Citizenship` VARCHAR(30), IN `e_Date_Hired` DATE, IN `e_SSS` VARCHAR(50), IN `e_GSIS` VARCHAR(50), IN `e_TIN` VARCHAR(50), IN `e_PhilHealth` VARCHAR(50), IN `e_Pagibig` VARCHAR(50), IN `e_Username` VARCHAR(20), IN `e_Password` VARCHAR(50))  BEGIN

INSERT INTO employee 
( 
User_ID,ID, First_Name, Last_Name, Middle_Name, Extension_Name, Gender, Birthday, Street, City, State, Country, ZIPCode, Contact_No, Email, Civil_Status, Citizenship, Date_Hired, SSS,GSIS,TIN, PhilHealth, Pagibig, Username,Password
)
                                
VALUES
(
e_User_ID, e_ID, e_First_Name, e_Middle_Name, e_Last_Name,  e_Extension_Name , e_Gender,  e_Birthday, e_Street, e_City, e_State, e_Country, e_ZIPCODE,  e_Contact_No,  e_Email, e_Civil_Status, e_Citizenship, e_Date_Hired, e_SSS, e_GSIS, e_TIN,  e_PhilHealth,  e_Pagibig, e_Username, e_Password
);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Emp_EducBG` (IN `eb_id` INT(3), IN `eb_School` VARCHAR(100), IN `eb_Level_ID` INT(3), IN `eb_Address` VARCHAR(200), IN `eb_From_Year` DATE, IN `eb_To_Year` DATE)  BEGIN 
insert into emp_educbg

(id, School, Level_ID, Address, From_Year, To_Year)

VALUES

(eb_id, eb_School, eb_Level_ID, eb_Address, eb_From_Year, eb_To_Year);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Insert_Status` (IN `s_id` INT(3), IN `s_Status_Name` VARCHAR(20))  BEGIN
INSERT INTO status

(id, Status_Name)

VALUES
(s_id, s_Status_Name);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Branch` (IN `b_id` INT(3), IN `b_Addres` VARCHAR(50), IN `b_Contact_No` VARCHAR(15), IN `b_Email` VARCHAR(20), IN `b_Date_Established` DATE, IN `b_Status` BIT(1))  NO SQL
BEGIN 

UPDATE branch
SET 

Address = b_Address,
Contact_No = b_Contact_No,
Email = b_Email,
Date_Established = b_Date_Established,
Status = b_Status

Where id = b_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Department` (IN `d_id` INT(3), IN `d_Dept_Name` VARCHAR(50), IN `d_Functions` VARCHAR(50))  NO SQL
BEGIN

UPDATE department

SET

Dept_Name = d_Dept_Name,
Functions = d_Functions

WHERE

id = d_id ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Educational_Level` (IN `el_id` INT(3), IN `el_Educational_Level_Name` VARCHAR(100))  BEGIN
 
 UPDATE educational_level
 SET
 
 Educational_Level_Name = el_Educational_Level_Name
 
 WHERE
 
 id = el_id;
 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Employee` (IN `e_User_ID` INT(3), IN `e_ID` VARCHAR(20), IN `e_First_Name` VARCHAR(50), IN `e_Middle_Name` VARCHAR(50), IN `e_Last_Name` VARCHAR(50), IN `e_Extension_Name` VARCHAR(20), IN `e_Gender` BIT(1), IN `e_Birthday` DATE, IN `e_Street` VARCHAR(50), IN `e_City` VARCHAR(20), IN `e_State` VARCHAR(50), IN `e_Country` VARCHAR(20), IN `e_ZIPCode` VARCHAR(20), IN `e_Contact_No` VARCHAR(15), IN `e_Email` VARCHAR(50), IN `e_Civil_Status` VARCHAR(20), IN `e_Citizenship` VARCHAR(30), IN `e_Date_Hired` DATE, IN `e_SSS` VARCHAR(50), IN `e_GSIS` VARCHAR(50), IN `e_TIN` VARCHAR(50), IN `e_PhilHealth` VARCHAR(50), IN `e_Pagibig` VARCHAR(50), IN `e_Username` VARCHAR(20), IN `e_Password` VARCHAR(50))  BEGIN
UPDATE employee 
SET

ID = e_ID, 
First_Name = e_First_Name, 
Middle_Name = e_Middle_Name,
Last_Name = e_Last_Name, 
Extension_Name = e_Extension_Name, 
Gender = e_Gender, 
Birthday = e_Birthday,
Street = e_Street,
City = e_City, 
State = e_State, 
Country = e_Country, 
ZIPCode = e_ZIPCODE,
Contact_No = e_Contact_No, 
Email = e_Email, 
Civil_Status = e_Civil_Status , 
Citizenship = e_Citizenship, 
Date_Hired = e_Date_Hired, 
SSS = e_SSS,
GSIS = e_GSIS, 
TIN = e_TIN, 
PhilHealth = e_PhilHealth, 
Pagibig = e_Pagibig, 
Username = e_Username, 
Password = e_Password

Where User_ID = e_User_ID;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Emp_EducBG` (IN `eb_id` INT(3), IN `eb_School` VARCHAR(100), IN `eb_Level_ID` INT(3), IN `eb_Address` VARCHAR(200), IN `eb_From_Year` DATE, IN `eb_To_Year` DATE)  BEGIN

UPDATE emp_educbg

SET

School = eb_School,
Level_ID = eb_Level_ID,
Address = eb_Address,
From_Year = eb_From_Year,
To_Year = eb_To_Year

WHERE

id = eb_id;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Update_Status` (IN `s_id` INT(3), IN `s_Status_Name` VARCHAR(20))  BEGIN

UPDATE status
SET

Status_Name = s_Status_Name

WHERE

id = s_id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(3) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Date_Established` date NOT NULL,
  `Status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `Address`, `Contact_No`, `Email`, `Date_Established`, `Status`) VALUES
(6, 'Commonwealth Quezon City', '2272827', 'jenus@yahoo.com', '2010-09-12', 1),
(7, 'Jocfer Bldg. Comm.Ave', '287-0994', 'info@jenusitsolution', '2010-05-09', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(3) NOT NULL,
  `Dept_Name` varchar(50) NOT NULL,
  `Functions` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `Dept_Name`, `Functions`, `Status`) VALUES
(1, 'Human Resource (HR) Department', 'Recruitment and selection.', 1),
(2, 'Information Technology', 'Information Technology', 1),
(3, 'Finance', 'Financing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educational_level`
--

CREATE TABLE `educational_level` (
  `ID` int(3) NOT NULL,
  `Educational_Level_Name` varchar(100) NOT NULL,
  `Status` int(3) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educational_level`
--

INSERT INTO `educational_level` (`ID`, `Educational_Level_Name`, `Status`) VALUES
(1, 'Elementary', 1),
(2, 'Secondary', 1),
(3, 'Tertiary', 1),
(4, 'Masteral', 1),
(5, 'Vocational', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `User_ID` int(3) NOT NULL,
  `ID` varchar(20) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Middle_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Extension_Name` varchar(5) NOT NULL,
  `Gender` bit(1) NOT NULL,
  `Birthday` date NOT NULL,
  `Street` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `ZIPCode` varchar(20) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Civil_Status` varchar(20) NOT NULL,
  `Citizenship` varchar(30) NOT NULL,
  `Date_Hired` date DEFAULT NULL,
  `SSS` varchar(50) NOT NULL,
  `GSIS` varchar(50) NOT NULL,
  `TIN` varchar(50) NOT NULL,
  `PhilHealth` varchar(50) NOT NULL,
  `Pagibig` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status_ID` int(3) DEFAULT NULL,
  `JobTitle_ID` int(3) DEFAULT '1',
  `Branch_ID` int(11) DEFAULT NULL,
  `Dept_ID` int(11) DEFAULT NULL,
  `Profile_Pic` varchar(100) DEFAULT 'Uploads\\avatar0.png',
  `Date_Acct_Created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`User_ID`, `ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Extension_Name`, `Gender`, `Birthday`, `Street`, `City`, `State`, `Country`, `ZIPCode`, `Contact_No`, `Email`, `Civil_Status`, `Citizenship`, `Date_Hired`, `SSS`, `GSIS`, `TIN`, `PhilHealth`, `Pagibig`, `Username`, `Password`, `Status_ID`, `JobTitle_ID`, `Branch_ID`, `Dept_ID`, `Profile_Pic`, `Date_Acct_Created`) VALUES
(37, '', 'First', '', 'Last', '', b'0', '0000-00-00', '', '', '', '', '', '639012345678', 'sample@y.c', '', '', NULL, '', '', '', '', '', '', 'gBdFAfIA5KqcQvX3+KeMTIHNvwxjBVgSFLJnq8a9UNI=', NULL, 1, NULL, NULL, 'Uploads\\37_First Last.png', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `emp_educbg`
--

CREATE TABLE `emp_educbg` (
  `ID` int(3) NOT NULL,
  `School` varchar(100) NOT NULL,
  `Level_ID` int(3) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `From_Year` date NOT NULL,
  `To_Year` date NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_emergency`
--

CREATE TABLE `emp_emergency` (
  `ID` int(3) NOT NULL,
  `Contact_Person` varchar(100) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_familybg`
--

CREATE TABLE `emp_familybg` (
  `ID` int(3) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Occupation` varchar(50) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_workbg`
--

CREATE TABLE `emp_workbg` (
  `ID` int(3) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Job_Title` varchar(50) NOT NULL,
  `From_Year` date NOT NULL,
  `To_Year` date NOT NULL,
  `Status` int(3) DEFAULT '1',
  `User_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(3) NOT NULL,
  `Job_Title` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Status` int(3) DEFAULT '1',
  `Dept_ID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `Job_Title`, `Code`, `Description`, `Status`, `Dept_ID`) VALUES
(1, 'Employee', '', 'Default Job Title', 1, 2),
(2, 'Web Designer', 'W', 'Web Designer', 1, 2),
(3, 'PHP Programmer', 'P', 'Programmer', 1, 2),
(4, 'Social Media Markete', 'S', 'Social Media Marketer', 1, 2),
(5, 'Graphic Designer', 'G', 'Graphic Designer', 1, 2),
(6, 'OJT', 'O', 'OJT', 1, 2),
(7, 'Admin', 'A', 'system administrator', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(3) NOT NULL,
  `Login_Time` datetime DEFAULT '0000-00-00 00:00:00',
  `Logout_Time` datetime DEFAULT '0000-00-00 00:00:00',
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID` int(3) NOT NULL,
  `Status_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `Status_Name`) VALUES
(1, 'Active'),
(2, 'Deceased'),
(3, 'On Non-Pay Leave'),
(4, 'Processing'),
(5, 'Retired'),
(6, 'Terminated'),
(7, 'On - Leave'),
(8, 'Inactive'),
(9, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `ID` int(3) NOT NULL,
  `Time_In` datetime DEFAULT '0000-00-00 00:00:00',
  `Time_Out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Break_In` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Break_Out` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_level`
--
ALTER TABLE `educational_level`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `emp_educbg`
--
ALTER TABLE `emp_educbg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_emergency`
--
ALTER TABLE `emp_emergency`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_familybg`
--
ALTER TABLE `emp_familybg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp_workbg`
--
ALTER TABLE `emp_workbg`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `educational_level`
--
ALTER TABLE `educational_level`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `User_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `emp_educbg`
--
ALTER TABLE `emp_educbg`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_emergency`
--
ALTER TABLE `emp_emergency`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_familybg`
--
ALTER TABLE `emp_familybg`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_workbg`
--
ALTER TABLE `emp_workbg`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `employee` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
