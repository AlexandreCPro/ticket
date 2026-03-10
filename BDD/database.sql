CREATE DATABASE ticket;

USE ticket;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_prenom VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    profil_id INT,
    FOREIGN KEY (profil_id) REFERENCES profil(id)
);

CREATE TABLE profils (
    id INT AUTO_INCREMENT PRIMARY KEY,
    technicien VARCHAR(255) NOT NULL,
    utilisateur VARCHAR(255) NOT NULL,
    administrateur VARCHAR(255) NOT NULL
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
    statut ENUM('ouvert', 'en cours', 'fermé') DEFAULT 'ouvert',
    iduser INT,
    idstatut INT,
    idcategorie INT,
    FOREIGN KEY (iduser) REFERENCES users(id),
    FOREIGN KEY (idstatut) REFERENCES statut(id),
    FOREIGN KEY (idcategorie) REFERENCES categories(id)
);

CREATE TABLE statut (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_statut VARCHAR(255) NOT NULL
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(255) NOT NULL
);

