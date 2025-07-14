-- Active: 1745847165775@@127.0.0.1@3306@db_s2_ETU003936
CREATE DATABASE indrana361;
CREATE TABLE db_s2_ETU003936_indrana361_membre (
    id_membre INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    genre VARCHAR(50),
    email VARCHAR(255) UNIQUE NOT NULL,
    ville VARCHAR(255),
    mdp VARCHAR(255) NOT NULL,
    image_profil VARCHAR(255)
);

CREATE TABLE db_s2_ETU003936_indrana361_categorie_objet (
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom_categorie VARCHAR(255) NOT NULL
);

CREATE TABLE db_s2_ETU003936_indrana361_objet (
    id_objet INT AUTO_INCREMENT PRIMARY KEY,
    nom_objet VARCHAR(255) NOT NULL,
    id_categorie INT NOT NULL,
    id_membre INT NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES db_s2_ETU003936_indrana361_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES db_s2_ETU003936_indrana361_membre(id_membre)
);

CREATE TABLE db_s2_ETU003936_indrana361_images_objet (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    nom_image VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_objet) REFERENCES db_s2_ETU003936_indrana361_objet(id_objet)
);

CREATE TABLE db_s2_ETU003936_indrana361_emprunt (
    id_emprunt INT AUTO_INCREMENT PRIMARY KEY,
    id_objet INT NOT NULL,
    id_membre INT NOT NULL,
    date_emprunt DATE NOT NULL,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES db_s2_ETU003936_indrana361_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES db_s2_ETU003936_indrana361_membre(id_membre)
);
