<?php
include_once "../base/baselocal.php";

function login($email, $password)
{

    $request = sprintf("SELECT * FROM db_s2_ETU003936_indrana361_membre WHERE email='%s' AND mdp='%s'", $email, $password);
    $data = mysqli_query($_SERVER["base"], $request);
    return mysqli_num_rows($data) > 0;
}

function signin($nom, $email, $password, $date_naissance, $genre, $ville)
{
    echo "Debug:<br> Name: $nom <br> Email: $email <br> Birthday: $date_naissance <br> Password: $password <br> Genre: $genre <br> City: $ville <br><br>";
    $insert = sprintf(
        "INSERT INTO db_s2_ETU003936_indrana361_membre (nom, email, mdp, date_naissance, genre, ville, image_profil) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', 'default.jpg')",
        $nom,
        $email,
        $password,
        $date_naissance,
        $genre,
        $ville
    );
    echo $insert . "<br>";

    $sql_user = mysqli_query($_SERVER["base"], $insert);
    if ($sql_user) {
        echo "<p>Account created successfully</p>";
        login($email, $password);
    } else {
        echo "<p>Server error</p>";
    }
}

function getUserId($email, $password): int
{
    $request = sprintf("SELECT * FROM db_s2_ETU003936_indrana361_membre WHERE email='%s' AND mdp='%s'", $email, $password);
    $data = mysqli_query($_SERVER["base"], $request);
    if (mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_assoc($data);
        return $row["id_membre"];
    }
    return -1;
}




function getPublication()
{
    $request = "SELECT *
                FROM view_db_s2_ETU003936_indrana361_publication
                ORDER BY id_objet DESC";
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : null;
}

function getCategories()
{
    $request = "SELECT * FROM db_s2_ETU003936_indrana361_categorie_objet";
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : null;
}
function getPublicationByCategory($categoryId)
{
    $request = sprintf(
        "SELECT *
         FROM view_db_s2_ETU003936_indrana361_publication
         WHERE id_categorie = %d",
        $categoryId
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : null;
}
function getPublicationById($id)
{
    $request = sprintf(
        "SELECT *
         FROM view_db_s2_ETU003936_indrana361_publication
         WHERE id_objet = %d",
        $id
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : null;
}

function getMemberById($id)
{
    $request = sprintf(
        "SELECT nom, date_naissance, email, ville, genre, image_profil
         FROM db_s2_ETU003936_indrana361_membre
         WHERE id_membre = %d",
        $id
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC)[0] : null;
}

function getinfo($id)
{
    $request = sprintf(
        "SELECT *
         FROM db_s2_ETU003936_indrana361_membre
         WHERE id_membre = %d",
        $id
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC)[0] : null;
}

function publier($id_membre, $titre,  $id_categorie, $files)
{
    // Préparation de la requête d'insertion
    $insert = sprintf(
        "INSERT INTO db_s2_ETU003936_indrana361_objet (id_membre, titre, id_categorie) VALUES (%d, '%s',  %d)",
        $id_membre,
        $titre,
        $id_categorie
    );

    // Exécution de la requête
    if (mysqli_query($_SERVER["base"], $insert)) {
        // Récupération de l'ID de l'objet inséré
        $id_objet = mysqli_insert_id($_SERVER["base"]);

        uploadFiles($files, "../base/img/", "objet_" . $id_objet, $id_membre);
    } else {
        echo "Erreur lors de la publication : " . mysqli_error($_SERVER["base"]);
    }
}

function insertObjImg($image, $id_objet)
{
    $insert = sprintf(
        "INSERT INTO db_s2_ETU003936_indrana361_images_objet (id_objet, nom_image) VALUES (%d, '%s')",
        $id_objet,
        $image
    );
    if (mysqli_query($_SERVER["base"], $insert)) {
        return true;
    } else {
        echo "Erreur lors de l'insertion de l'image : " . mysqli_error($_SERVER["base"]);
        return false;
    }
}
function returnobj($id_objet, $id_membre)
{
    $date_retour = date('Y-m-d');
    $sql = "UPDATE db_s2_ETU003936_indrana361_emprun SET date_retour = '$date_retour' WHERE id_objet = '$id_objet' AND id_membre = '$id_membre'";
    
    if (mysqli_query($_SERVER["base"], $sql)) {
        echo "L'objet a été retourné avec succès.";
        return true;
    } else {
        echo "Erreur lors du retour de l'objet : " . mysqli_error($_SERVER["base"]);
        return false;
    }
}
function uploadFiles($files, $path, $outputnamePrefix, $id_user)
{
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp'];

    if (isset($files) && is_array($files['tmp_name'])) {
        foreach ($files['tmp_name'] as $index => $tmpName) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmpName);
            finfo_close($finfo);

            if (!in_array($mime, $allowedMimeTypes)) {
                echo 'Type de fichier non autorisé : ' . $mime . '<br>';
                continue;
            }

            $extension = pathinfo($files['name'][$index], PATHINFO_EXTENSION);
            $uniqueId = time() . '_' . mt_rand(1000, 9999);
            $newName = $outputnamePrefix . '_' . $uniqueId . '.' . $extension;

            if (move_uploaded_file($tmpName, $path . $newName)) {
                echo "Fichier uploadé avec succès : " . $newName . '<br>';
                insertObjImg($newName, $id_user);
            } else {
                echo "Échec du déplacement du fichier : " . $files['name'][$index] . '<br>';
            }
        }
    } else {
        echo "Aucun fichier reçu.";
    }
}
function getMyEmprun($id_membre)
{
    $request = sprintf(
        "SELECT e.*, o.* AS proprietaire_id
         FROM db_s2_ETU003936_indrana361_emprun e
         JOIN db_s2_ETU003936_indrana361_objet o ON e.id_objet = o.id_objet
         WHERE e.id_membre = %d
         ORDER BY e.date_emprun DESC",
        $id_membre
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : null;
}