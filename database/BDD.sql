DROP DATABASE IF EXISTS ticket;

CREATE DATABASE ticket;

USE ticket;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    profil_id INT,
    FOREIGN KEY (profil_id) REFERENCES profils(id)
);

CREATE TABLE profils (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomprofil VARCHAR(255) NOT NULL
);

CREATE TABLE Agences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_agence VARCHAR(255) NOT NULL,
    code_postal INT(5) NOT NULL
);

CREATE TABLE assignation (
    iduser INT,
    idtickets INT,
    FOREIGN KEY (iduser) REFERENCES users(id),
    FOREIGN KEY (idtickets) REFERENCES tickets(id)
);

CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    objet VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    iduser INT,
    idstatut INT,
    idcategorie INT,
    FOREIGN KEY (iduser) REFERENCES users(id),
    FOREIGN KEY (idstatut) REFERENCES statut(id),
    FOREIGN KEY (idcategorie) REFERENCES categories(id)
);

CREATE TABLE statut (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_statut ENUM('ouvert', 'en cours', 'fermé') DEFAULT 'ouvert'
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(255) NOT NULL
);

