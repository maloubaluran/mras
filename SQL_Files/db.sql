-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2011 at 01:22 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sampledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `assessmentID` int(11) NOT NULL AUTO_INCREMENT,
  `intensity` int(11) DEFAULT NULL,
  `always` tinyint(1) DEFAULT NULL,
  `come_and_go` tinyint(1) DEFAULT NULL,
  `make_better` varchar(50) DEFAULT NULL,
  `make_worse` varchar(50) DEFAULT NULL,
  `symptoms` varchar(100) DEFAULT NULL,
  `sleep` tinyint(1) DEFAULT NULL,
  `energy` tinyint(1) DEFAULT NULL,
  `mood` tinyint(1) DEFAULT NULL,
  `concentration` tinyint(1) DEFAULT NULL,
  `testID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  PRIMARY KEY (`assessmentID`,`testID`,`patientID`),
  KEY `testID` (`testID`,`patientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assessment`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctorID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `contactNo` int(11) DEFAULT NULL,
  `specialization` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`doctorID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `name`, `address`, `contactNo`, `specialization`, `username`, `password`) VALUES
(1, 'Rose Mae Razon', 'Iligan City', 12345, 'Cervical Cancer', 'ming', 'ming');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecord`
--

CREATE TABLE IF NOT EXISTS `medicalrecord` (
  `recordID` int(11) NOT NULL AUTO_INCREMENT,
  `patientID` int(11) DEFAULT NULL,
  `doctorID` int(11) DEFAULT NULL,
  PRIMARY KEY (`recordID`),
  KEY `Patient_MedicalRecord` (`patientID`),
  KEY `Doctor_MedicalRecord` (`doctorID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `medicalrecord`
--


-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patientID` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) DEFAULT NULL,
  `m_name` varchar(20) DEFAULT NULL,
  `l_name` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `month` varchar(5) DEFAULT NULL,
  `date` varchar(5) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `civilstatus` varchar(10) DEFAULT NULL,
  `homeadd` varchar(30) DEFAULT NULL,
  `telno` varchar(10) DEFAULT NULL,
  `officeadd` varchar(30) DEFAULT NULL,
  `telno2` varchar(10) DEFAULT NULL,
  `occupation` varchar(15) DEFAULT NULL,
  `referredby` varchar(15) DEFAULT NULL,
  `history` varchar(100) DEFAULT NULL,
  `pertinentPE` varchar(100) DEFAULT NULL,
  `findings` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`patientID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `f_name`, `m_name`, `l_name`, `age`, `month`, `date`, `year`, `height`, `weight`, `civilstatus`, `homeadd`, `telno`, `officeadd`, `telno2`, `occupation`, `referredby`, `history`, `pertinentPE`, `findings`) VALUES
(1, 'Malou', 'Pepania', 'Baluran', 61, '1', '1', '1950', '5''2"', '42', 'Married', 'Iligan City', '12345', 'Iligan City', '12345678', 'Teacher', 'None', 'Wala.', 'Wala pa.', 'Wala jud!'),
(2, '', '', '', 0, '1', '1', '1950', '', '', 'single', '', '', '', '', '', '', '', '', ''),
(3, '', '', '', 0, '1', '1', '1950', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testresult`
--

CREATE TABLE IF NOT EXISTS `testresult` (
  `date` date DEFAULT NULL,
  `diagnosis` varchar(50) DEFAULT NULL,
  `progressNotes` varchar(100) DEFAULT NULL,
  `treatment` varchar(50) DEFAULT NULL,
  `testID` int(11) NOT NULL AUTO_INCREMENT,
  `patientID` int(11) NOT NULL,
  PRIMARY KEY (`testID`,`patientID`),
  KEY `Patient_TestResult` (`patientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `testresult`
--

