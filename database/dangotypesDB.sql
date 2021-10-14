/*
  db_name: dangotypesDB
  created_on: 12.10.2021 @ 14:02
  sign: The Actual Daniel
*/

DROP DATABASE IF EXISTS dangotypesDB;
CREATE DATABASE dangotypesDB;
USE dangotypesDB;

CREATE TABLE `address`  (
  `addrID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phoneNum` varchar(255) NOT NULL,
  `streetName` varchar(255) NOT NULL,
  `streetNum` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postalForeign` int NOT NULL,
  PRIMARY KEY (`addrID`)
);
INSERT INTO `address` VALUES (1,'Daniel', 'Radosa', '55444433', 'Solvej', '9', 'Denmark', 9999);

CREATE TABLE `postalCode`  (
  `code` int NOT NULL,
  `city` varchar(255) NULL,
  PRIMARY KEY (`code`)
);
INSERT INTO `postalCode` VALUES (9999, 'Olympus');

CREATE TABLE `product`  (
  `productID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `caseMaterial` varchar(255) NULL,
  `plateMaterial` varchar(255) NULL,
  `color` varchar(255) NULL,
  `switches` varchar(255) NULL,
  `type` varchar(255) NOT NULL,
  `accesories` varchar(255) NULL,
  `productImage` blob NOT NULL,
  PRIMARY KEY (`productID`)
);
INSERT INTO `product` VALUES (1, 'PCMK TKL ISO 80%', 'A TKL ISO kit from pulsar.gg', 'Polycarbonate & Plastic', 'No plate', 'black & white & transparent', 'Gateron Milky Yellow', 'diy kit', 'usb cable & dust bag', 'product-images/pcmk.png');

CREATE TABLE `user`  (
  `userID` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userAddress` int NULL,
  PRIMARY KEY (`userID`)
);
INSERT INTO `user` VALUES (1, 'someone@something.com', 'daniel123', 1);

ALTER TABLE `address` ADD CONSTRAINT `fk_address_postalCode_1` FOREIGN KEY (`postalForeign`) REFERENCES `postalCode`(`code`);
ALTER TABLE `user` ADD CONSTRAINT `fk_user_address_1` FOREIGN KEY (`userAddress`) REFERENCES `address`(`addrID`);