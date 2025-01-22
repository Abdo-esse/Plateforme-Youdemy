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

CREATE Table cours (
   id INT PRIMARY KEY AUTO_INCREMENT,
   titre VARCHAR(150),
   photoCouverture TEXT,
   contenu TEXT,
   description TEXT,
   idEnseignant int ,
   idCategorie int,
   nomberChapitre int,
   duree int,
   prix int,
   dateCreation date DEFAULT current_timestamp(), 
   dateDelete date ,
   Foreign Key (idEnseignant) REFERENCES users(id)
);

CREATE Table cours_tags(
   id INT PRIMARY KEY AUTO_INCREMENT,
   idCours INT ,
   idTags INT,
   Foreign Key (idCours) REFERENCES cours(id),
   Foreign Key (idTags) REFERENCES tags(id)
);
drop table cours_tags;
CREATE Table inscription(
     idEtudiant int ,
      idCours int ,
      dateInscrire DATETIME DEFAULT CURRENT_TIMESTAMP,
      Foreign Key ( idEtudiant) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
        Foreign Key (idCours) REFERENCES cours(id) ON DELETE CASCADE ON UPDATE CASCADE,
           PRIMARY KEY(idEtudiant,idCours)


   );
