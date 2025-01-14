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
    compteStatut ENUM('actif', 'suspendu', 'supprimé') DEFAULT 'actif',
    photo VARCHAR(250),
    FOREIGN KEY (idRole) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
 );
 drop TABLE users;
 CREATE TABLE gestionEnseignants (
    idEnseignant INT ,
    etatCompte ENUM('en cours', 'accepter', 'refuser') NOT NULL DEFAULT 'en cours',
    dateDecision date ,
    Foreign Key (idEnseignant) REFERENCES users(id)
); 
 CREATE TABLE categories (
    id INT PRIMARY key AUTO_INCREMENT ,
    name VARCHAR(50),
    idAdmin int  ,
    dateCreation date DEFAULT current_timestamp(), 
    dateDelete date , 
    Foreign Key (idAdmin) REFERENCES users(id)
);  
 CREATE TABLE tags (
    id INT PRIMARY key AUTO_INCREMENT ,
    name VARCHAR(50),
    idAdmin int  ,
    dateCreation date DEFAULT current_timestamp(), 
    dateDelete date , 
    Foreign Key (idAdmin) REFERENCES users(id)
); 
