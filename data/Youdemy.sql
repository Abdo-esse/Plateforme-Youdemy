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
    id_role int ,
    photo VARCHAR(250),
    FOREIGN KEY (id_role) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
 );