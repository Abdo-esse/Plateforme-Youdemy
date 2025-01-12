CREATE DATABASE  Youdemy;
use  Youdemy;

 CREATE Table roles(
    id int  PRIMARY KEY,
    `name` VARCHAR(50)
 );

 CREATE table users(
    id int AUTO_INCREMENT PRIMARY KEY,
    `name`  VARCHAR(250),
    email  VARCHAR(250),
    `password`  VARCHAR(250),
    idRole int ,
    dateCreation date DEFAULT current_timestamp(),
    isActive BOOLEAN DEFAULT false,
    photo VARCHAR(250),
    FOREIGN KEY (idRole) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
 );
 