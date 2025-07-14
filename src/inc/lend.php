<?php
include_once "../base/baselocal.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_objet = intval($_POST['id_objet']);
    $jours = intval($_POST['jours']);
    $id_membre = $_SESSION['id']; 
    $date_emprunt = date('Y-m-d');
    $date_retour = date('Y-m-d', strtotime("+$jours days"));

    $sql = "INSERT INTO db_s2_ETU003936_indrana361_emprun (id_objet, id_membre, date_emprunt, date_retour) VALUES ('$id_objet', '$id_membre', '$date_emprunt', '$date_retour')";
    mysqli_query($_SERVER["base"], $sql);

    header("Location: ../page/index.php?page=home");
    exit;
}
?>