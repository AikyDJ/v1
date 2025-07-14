-- Active: 1745847165775@@127.0.0.1@3306@indrana361
-- Insert members
INSERT INTO membre (id_membre, nom, date_naissance, genre, email, ville, mdp, image_profil) VALUES 
(1, 'Alice', '1990-01-01', 'F', 'alice@example.com', 'Paris', 'password123', 'alice.jpg'),
(2, 'Bob', '1985-05-15', 'M', 'bob@example.com', 'Lyon', 'password123', 'bob.jpg'),
(3, 'Charlie', '1992-08-20', 'M', 'charlie@example.com', 'Marseille', 'password123', 'charlie.jpg'),
(4, 'Diana', '1988-12-05', 'F', 'diana@example.com', 'Nice', 'password123', 'diana.jpg');

-- Insert categories
INSERT INTO categorie_objet (id_categorie, nom_categorie) VALUES 
(1, 'esthétique'),
(2, 'bricolage'),
(3, 'mécanique'),
(4, 'cuisine');

-- Insert objects
INSERT INTO objet (id_objet, nom_objet, id_categorie, id_membre) VALUES 
(1, 'Objet1', 1, 1),
(2, 'Objet2', 2, 1),
(3, 'Objet3', 3, 1),
(4, 'Objet4', 4, 1),
(5, 'Objet5', 1, 2),
(6, 'Objet6', 2, 2),
(7, 'Objet7', 3, 2),
(8, 'Objet8', 4, 2),
(9, 'Objet9', 1, 3),
(10, 'Objet10', 2, 3),
(11, 'Objet11', 3, 3),
(12, 'Objet12', 4, 3),
(13, 'Objet13', 1, 4),
(14, 'Objet14', 2, 4),
(15, 'Objet15', 3, 4),
(16, 'Objet16', 4, 4);

-- Insert borrowings
INSERT INTO emprunt (id_emprunt, id_objet, id_membre, date_emprunt, date_retour) VALUES 
(1, 1, 2, '2025-07-01', NULL),
(2, 2, 3, '2025-07-02', NULL),
(3, 3, 4, '2025-07-03', NULL),
(4, 4, 1, '2025-07-04', NULL),
(5, 5, 3, '2025-07-05', NULL),
(6, 6, 4, '2025-07-06', NULL),
(7, 7, 1, '2025-07-07', NULL),
(8, 8, 2, '2025-07-08', NULL),
(9, 9, 4, '2025-07-09', NULL),
(10, 10, 1, '2025-07-10', NULL);
