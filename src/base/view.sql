CREATE OR REPLACE VIEW view_db_s2_ETU003936_indrana361_publication AS
SELECT 
    membre.id_membre,
    membre.nom AS membre_nom,
    membre.email AS membre_email,
    objet.id_objet,
    objet.nom_objet,
    categorie_objet.id_categorie,
    categorie_objet.nom_categorie AS objet_categorie,
    emprunt.id_emprunt,
    emprunt.date_emprunt,
    emprunt.date_retour
FROM 
   db_s2_ETU003936_indrana361_membre membre
JOIN 
    db_s2_ETU003936_indrana361_emprunt emprunt ON membre.id_membre = emprunt.id_membre
JOIN 
    db_s2_ETU003936_indrana361_objet objet ON emprunt.id_objet = objet.id_objet
JOIN 
   db_s2_ETU003936_indrana361_categorie_objet categorie_objet ON objet.id_categorie = categorie_objet.id_categorie;