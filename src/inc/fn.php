<?php
include_once "../base/baselocal.php";

function login($email, $password)
{
 
    $request = sprintf("SELECT * FROM membre WHERE email='%s' AND mdp='%s'", $email, $password);
    $data = mysqli_query($_SERVER["base"], $request);
    return mysqli_num_rows($data) > 0;
}

function signin($nom, $email, $password, $date_naissance, $genre, $ville)
{
    echo "Debug:<br> Name: $nom <br> Email: $email <br> Birthday: $date_naissance <br> Password: $password <br> Genre: $genre <br> City: $ville <br><br>";
    $insert = sprintf(
        "INSERT INTO membre (nom, email, mdp, date_naissance, genre, ville, image_profil) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', 'default.jpg')",
        $nom, $email, $password, $date_naissance, $genre, $ville
    );
    echo $insert . "<br>";
    $sql_user = mysqli_query($_SERVER["base"], $insert);
    if ($sql_user) {
        echo "<p>Account created successfully</p>";
    } else {
        echo "<p>Server error</p>";
    }
}

function getUserId($email, $password): int
{
    $request = sprintf("SELECT id_membre FROM membre WHERE email='%s' AND mdp='%s'", $email, $password);
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
                FROM view_publication
                ORDER BY id_objet DESC";
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : null;
}

function getPublicationById($id)
{
    $request = sprintf(
        "SELECT id_objet, nom_objet, id_categorie, id_membre
         FROM objet
         WHERE id_objet = %d",
        $id
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC) : [];
}

function getMemberById($id)
{
    $request = sprintf(
        "SELECT nom, date_naissance, email, ville, genre, image_profil
         FROM membre
         WHERE id_membre = %d",
        $id
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC)[0] : null;
}

function getinfo($id) {
    $request = sprintf(
        "SELECT *
         FROM membre
         WHERE id_membre = %d",
        $id
    );
    $sql_request = mysqli_query($_SERVER["base"], $request);
    return $sql_request ? mysqli_fetch_all($sql_request, MYSQLI_ASSOC)[0] : null;
}