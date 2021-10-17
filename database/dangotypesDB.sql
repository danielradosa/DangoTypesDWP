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

CREATE TABLE `postalCode`  (
  `code` int NOT NULL,
  `city` varchar(255) NULL,
  PRIMARY KEY (`code`)
);

CREATE TABLE `product`  (
  `productID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `description` text NOT NULL,
  `caseMaterial` varchar(255) NULL,
  `plateMaterial` varchar(255) NULL,
  `color` varchar(255) NULL,
  `switches` varchar(255) NULL,
  `type` varchar(255) NOT NULL,
  `accessories` varchar(255) NULL,
  `productImage` blob NULL,
  `dateCreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`productID`)
);

CREATE TABLE `user`  (
  `userID` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userAddress` int NULL,
  PRIMARY KEY (`userID`)
);

ALTER TABLE `address` ADD CONSTRAINT `fk_address_postalCode_1` FOREIGN KEY (`postalForeign`) REFERENCES `postalCode`(`code`);
ALTER TABLE `user` ADD CONSTRAINT `fk_user_address_1` FOREIGN KEY (`userAddress`) REFERENCES `address`(`addrID`);