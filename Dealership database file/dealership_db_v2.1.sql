-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: dealership_db
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `EmployeeID` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `VIN` varchar(32) NOT NULL,
  `Manufacturer` varchar(255) DEFAULT NULL,
  `Make` varchar(255) DEFAULT NULL,
  `Year` year(4) DEFAULT NULL,
  `Engine` varchar(255) DEFAULT NULL,
  `Output` varchar(255) DEFAULT NULL,
  `No_of_doors` int(11) DEFAULT NULL,
  `Fuel_tank_cap` int(11) DEFAULT NULL,
  `Transmission` varchar(32) DEFAULT NULL,
  `Terrain` varchar(32) DEFAULT NULL,
  `Seating_capacity` int(11) DEFAULT NULL,
  `Torque` varchar(32) DEFAULT NULL,
  `Region` varchar(32) DEFAULT NULL,
  `DRL` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`VIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_owner`
--

DROP TABLE IF EXISTS `car_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_owner` (
  `CustomerID` int(11) NOT NULL,
  `RegistrationInfo` varchar(255) DEFAULT NULL,
  `LPlateNumber` varchar(32) DEFAULT NULL,
  `VIN` varchar(32) NOT NULL,
  PRIMARY KEY (`CustomerID`),
  CONSTRAINT `car_owner_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_owner`
--

LOCK TABLES `car_owner` WRITE;
/*!40000 ALTER TABLE `car_owner` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_rental`
--

DROP TABLE IF EXISTS `car_rental`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_rental` (
  `EmployeeID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `VIN` varchar(32) NOT NULL,
  `RentalID` int(11) NOT NULL,
  `RentalDetails` varchar(255) DEFAULT NULL,
  `LPlateNo` varchar(32) DEFAULT NULL,
  `PaymentMethod` varchar(255) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`,`CustomerID`,`VIN`),
  KEY `CustomerID` (`CustomerID`),
  KEY `car_rental_ibfk_1_idx` (`EmployeeID`),
  KEY `car_rental_ibfk_3_idx` (`VIN`),
  CONSTRAINT `car_rental_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `salesperson` (`EmployeeID`),
  CONSTRAINT `car_rental_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  CONSTRAINT `car_rental_ibfk_3` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_rental`
--

LOCK TABLES `car_rental` WRITE;
/*!40000 ALTER TABLE `car_rental` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_rental` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_sale`
--

DROP TABLE IF EXISTS `car_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_sale` (
  `EmployeeID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `VIN` varchar(32) NOT NULL,
  `SaleID` int(11) NOT NULL,
  `SaleDate` date DEFAULT NULL,
  `LPlateNo` varchar(32) DEFAULT NULL,
  `RegistrationDetails` varchar(255) DEFAULT NULL,
  `Method_of_Payment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`,`CustomerID`,`VIN`),
  KEY `CustomerID` (`CustomerID`),
  KEY `car_sale_ibfk_1_idx` (`EmployeeID`),
  KEY `car_sale_ibfk_3_idx` (`VIN`),
  CONSTRAINT `car_sale_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `salesperson` (`EmployeeID`),
  CONSTRAINT `car_sale_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  CONSTRAINT `car_sale_ibfk_3` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_sale`
--

LOCK TABLES `car_sale` WRITE;
/*!40000 ALTER TABLE `car_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CName` varchar(255) NOT NULL,
  `C_DOB` date DEFAULT NULL,
  `Credit_Score` int(11) DEFAULT NULL,
  `Drivers_License` varchar(255) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drivers`
--

DROP TABLE IF EXISTS `drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drivers` (
  `VIN` varchar(32) NOT NULL,
  `PlanNumber` int(11) NOT NULL,
  `DriverName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`VIN`,`PlanNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drivers`
--

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;
/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Super_EID` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `handle_req`
--

DROP TABLE IF EXISTS `handle_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `handle_req` (
  `EmployeeID` int(11) NOT NULL,
  `WorkOrderID` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`,`WorkOrderID`),
  KEY `WorkOrderID` (`WorkOrderID`),
  CONSTRAINT `handle_req_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`),
  CONSTRAINT `handle_req_ibfk_2` FOREIGN KEY (`WorkOrderID`) REFERENCES `maintenance_req` (`WorkOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handle_req`
--

LOCK TABLES `handle_req` WRITE;
/*!40000 ALTER TABLE `handle_req` DISABLE KEYS */;
/*!40000 ALTER TABLE `handle_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurance_plan`
--

DROP TABLE IF EXISTS `insurance_plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurance_plan` (
  `VIN` varchar(32) NOT NULL,
  `PlanNumber` int(11) NOT NULL,
  `CoverageType` varchar(32) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `ExpirationDate` date DEFAULT NULL,
  PRIMARY KEY (`VIN`,`PlanNumber`),
  KEY `insurance_plan_ibfk_3_idx` (`PlanNumber`),
  CONSTRAINT `insurance_plan_ibfk_1` FOREIGN KEY (`VIN`, `PlanNumber`) REFERENCES `drivers` (`VIN`, `PlanNumber`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `insurance_plan_ibfk_2` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurance_plan`
--

LOCK TABLES `insurance_plan` WRITE;
/*!40000 ALTER TABLE `insurance_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `insurance_plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `EmployeeID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Passwrd` varchar(255) NOT NULL,
  PRIMARY KEY (`EmployeeID`,`Username`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_req`
--

DROP TABLE IF EXISTS `maintenance_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maintenance_req` (
  `WorkOrderID` int(11) NOT NULL,
  `WorkCost` int(11) DEFAULT NULL,
  `Request_Date` date DEFAULT NULL,
  PRIMARY KEY (`WorkOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_req`
--

LOCK TABLES `maintenance_req` WRITE;
/*!40000 ALTER TABLE `maintenance_req` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `make_req`
--

DROP TABLE IF EXISTS `make_req`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `make_req` (
  `WorkOrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  PRIMARY KEY (`WorkOrderID`,`CustomerID`),
  KEY `CustomerID` (`CustomerID`),
  CONSTRAINT `make_req_ibfk_1` FOREIGN KEY (`WorkOrderID`) REFERENCES `maintenance_req` (`WorkOrderID`),
  CONSTRAINT `make_req_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `make_req`
--

LOCK TABLES `make_req` WRITE;
/*!40000 ALTER TABLE `make_req` DISABLE KEYS */;
/*!40000 ALTER TABLE `make_req` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_car`
--

DROP TABLE IF EXISTS `new_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `new_car` (
  `VIN` varchar(32) NOT NULL,
  PRIMARY KEY (`VIN`),
  KEY `new_car_ibfk_1_idx` (`VIN`),
  CONSTRAINT `new_car_ibfk_1` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `new_car`
--

LOCK TABLES `new_car` WRITE;
/*!40000 ALTER TABLE `new_car` DISABLE KEYS */;
/*!40000 ALTER TABLE `new_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_used`
--

DROP TABLE IF EXISTS `part_used`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `part_used` (
  `PartID` int(11) NOT NULL,
  `WorkOrderID` int(11) NOT NULL,
  PRIMARY KEY (`PartID`),
  KEY `WorkOrderID` (`WorkOrderID`),
  CONSTRAINT `part_used_ibfk_1` FOREIGN KEY (`PartID`) REFERENCES `parts` (`PartID`),
  CONSTRAINT `part_used_ibfk_2` FOREIGN KEY (`WorkOrderID`) REFERENCES `maintenance_req` (`WorkOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_used`
--

LOCK TABLES `part_used` WRITE;
/*!40000 ALTER TABLE `part_used` DISABLE KEYS */;
/*!40000 ALTER TABLE `part_used` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parts` (
  `PartID` int(11) NOT NULL,
  `Part_Desc` varchar(255) DEFAULT NULL,
  `PartName` varchar(255) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  PRIMARY KEY (`PartID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts`
--

LOCK TABLES `parts` WRITE;
/*!40000 ALTER TABLE `parts` DISABLE KEYS */;
/*!40000 ALTER TABLE `parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rental_car`
--

DROP TABLE IF EXISTS `rental_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rental_car` (
  `VIN` varchar(32) NOT NULL,
  `LPlateNo` varchar(32) NOT NULL,
  PRIMARY KEY (`VIN`,`LPlateNo`),
  CONSTRAINT `rental_car_ibfk_1` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rental_car`
--

LOCK TABLES `rental_car` WRITE;
/*!40000 ALTER TABLE `rental_car` DISABLE KEYS */;
/*!40000 ALTER TABLE `rental_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salesperson`
--

DROP TABLE IF EXISTS `salesperson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salesperson` (
  `EmployeeID` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  CONSTRAINT `salesperson_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salesperson`
--

LOCK TABLES `salesperson` WRITE;
/*!40000 ALTER TABLE `salesperson` DISABLE KEYS */;
/*!40000 ALTER TABLE `salesperson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technician`
--

DROP TABLE IF EXISTS `technician`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `technician` (
  `EmployeeID` int(11) NOT NULL,
  `T_grade` int(11) NOT NULL,
  PRIMARY KEY (`EmployeeID`),
  CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`EmployeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `technician`
--

LOCK TABLES `technician` WRITE;
/*!40000 ALTER TABLE `technician` DISABLE KEYS */;
/*!40000 ALTER TABLE `technician` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `used_car`
--

DROP TABLE IF EXISTS `used_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `used_car` (
  `VIN` varchar(32) NOT NULL,
  `DistanceTravelled` int(11) DEFAULT NULL,
  PRIMARY KEY (`VIN`),
  CONSTRAINT `used_car_ibfk_1` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_car`
--

LOCK TABLES `used_car` WRITE;
/*!40000 ALTER TABLE `used_car` DISABLE KEYS */;
/*!40000 ALTER TABLE `used_car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `used_car_sale`
--

DROP TABLE IF EXISTS `used_car_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `used_car_sale` (
  `EmployeeID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `VIN` varchar(32) NOT NULL,
  `USaleID` int(11) NOT NULL,
  `USaleDate` date DEFAULT NULL,
  `LPlateNo` varchar(32) DEFAULT NULL,
  `PaymentMethod` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EmployeeID`,`CustomerID`,`VIN`),
  KEY `CustomerID` (`CustomerID`),
  KEY `VIN` (`VIN`),
  KEY `used_car_sale_ibfk_1_idx` (`EmployeeID`),
  CONSTRAINT `used_car_sale_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `salesperson` (`EmployeeID`),
  CONSTRAINT `used_car_sale_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  CONSTRAINT `used_car_sale_ibfk_3` FOREIGN KEY (`VIN`) REFERENCES `car` (`VIN`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `used_car_sale`
--

LOCK TABLES `used_car_sale` WRITE;
/*!40000 ALTER TABLE `used_car_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `used_car_sale` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-08 20:30:49
