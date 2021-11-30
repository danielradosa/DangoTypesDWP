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
  `wasUpdated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
  `stock` int NOT NULL,
  `productImage` blob NULL,
  `dateCreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`productID`)
);

CREATE TABLE `user`  (
  `userID` int NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userType` boolean NOT NULL,
  `addressForeign` int NOT NULL,
  PRIMARY KEY (`userID`)
);

CREATE TABLE `order` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `orderItems` text NOT NULL,
  `orderMail` varchar(255) NOT NULL,
  `orderName` varchar(255) NOT NULL,
  `orderLastName` varchar(255) NOT NULL,
  `orderPhoneNum` varchar(255) NOT NULL,
  `orderStreetName` varchar(255) NOT NULL,
  `orderStreetNum` varchar(255) NOT NULL,
  `orderCountry` varchar(255) NOT NULL,
  `orderCity` varchar(255) NOT NULL,
  `orderPostalCode` int NOT NULL,
  `orderNumber` int NOT NULL,
  `orderPrice` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `placedAt` datetime NOT NULL,
  PRIMARY KEY (`orderID`)
);

CREATE TABLE `messages` (
  `messageID` int NOT NULL AUTO_INCREMENT,
  `companyDescription` text NULL,
  `contactNumber` varchar(255) NULL,
  PRIMARY KEY (`messageID`)
);

INSERT INTO `messages` (companyDescription, contactNumber) VALUES ("Dangotypes is an online webshop focused on selling mechanical keyboards and its accessories.", "220-555-1376");

ALTER TABLE `address` ADD CONSTRAINT `fk_user_foreign_1` FOREIGN KEY (`customerForeign`) REFERENCES `user`(`userID`);
ALTER TABLE `user` ADD CONSTRAINT `fk_user_address_1` FOREIGN KEY (`addressForeign`) REFERENCES `address`(`addrID`);
ALTER TABLE `order` ADD CONSTRAINT `fk_order_user_1` FOREIGN KEY (`orderNumber`) REFERENCES `user`(`userEmail`);
ALTER TABLE `user` ADD CONSTRAINT `fk_order_usermail_1` FOREIGN KEY (`userEmail`) REFERENCES `address`(`customerForeign`);
ALTER TABLE `user` ADD CONSTRAINT UQ_userEmail UNIQUE (userEmail);

CREATE VIEW switchesCategory AS SELECT * FROM product WHERE `type` = 'switch';
CREATE VIEW diy_keyboardsCategory AS SELECT * FROM product WHERE `type` = 'diy_keyboard';

DELIMITER //
CREATE TRIGGER BeforeUpdateOnUser BEFORE UPDATE ON `address`
FOR EACH ROW BEGIN
SET new.wasUpdated = NOW();
END //

DELIMITER //
CREATE TRIGGER AfterInsertInOrder AFTER INSERT ON `order` FOR EACH ROW
BEGIN
UPDATE `product` sp
SET sp.stock = sp.stock - 1
WHERE sp.productID = sp.productID;
END //