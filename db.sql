DROP DATABASE IF EXISTS `UserDB`;
CREATE DATABASE IF NOT EXISTS `UserDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `UserDB`;

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `userDetails` (
    `userId` tinyint(1) NOT NULL AUTO_INCREMENT,
    'Name' VARCHAR(255) NOT NULL,
    `gender` varchar(20) NOT NULL,
    'DateOfBirth' DATE NOT NULL,
    'Email' VARCHAR(255) NOT NULL UNIQUE,
    'Residence' VARCHAR(255) NOT NULL,
    'RegistrationDate' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    'Password' VARCHAR(255) NOT NULL,
    PRIMARY KEY (`userId`)
);