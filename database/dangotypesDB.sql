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
  `city` varchar(255) NOT NULL,
  `postalCode` int NOT NULL,
  `customerForeign` int NOT NULL,
  PRIMARY KEY (`addrID`)
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
  `userType` boolean NOT NULL,
  `addressForeign` int NULL,
  PRIMARY KEY (`userID`)
);

CREATE TABLE `order` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `orderMail` varchar(255) NOT NULL,
  `orderName` varchar(255) NOT NULL,
  `orderLastName` varchar(255) NOT NULL,
  `orderPhoneNum` varchar(255) NOT NULL,
  `orderStreetName` varchar(255) NOT NULL,
  `orderStreetNum` varchar(255) NOT NULL,
  `orderCountry` varchar(255) NOT NULL,
  `orderCity` varchar(255) NOT NULL,
  `orderPostalCode` int NOT NULL,
  `orderNumber` varchar(255) NULL,
  `orderPrice` varchar(255) NULL,
  `placedAt` datetime NOT NULL,
  PRIMARY KEY (`orderID`)
);

CREATE TABLE `orderDetails` (
  `orderDetailsID` int NOT NULL AUTO_INCREMENT,
  `orderMail` varchar(255) NOT NULL,
  `itemsOrdered` varchar(255) NOT NULL,
  PRIMARY KEY (`orderDetailsID`)
);

ALTER TABLE `address` ADD CONSTRAINT `fk_user_foreign_1` FOREIGN KEY (`customerForeign`) REFERENCES `user`(`userID`);
ALTER TABLE `user` ADD CONSTRAINT `fk_user_address_1` FOREIGN KEY (`addressForeign`) REFERENCES `address`(`addrID`);
ALTER TABLE `orderDetails` ADD CONSTRAINT `fk_user_order_1` FOREIGN KEY (`orderMail`) REFERENCES `order`(`orderMail`);
ALTER TABLE `user` ADD CONSTRAINT UQ_userEmail UNIQUE (userEmail);