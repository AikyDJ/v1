<?php
include_once './fn.php';
$files[] = $_FILES['files'];
$id_user = isset($_POST['id_user']) ? intval($_POST['id_user']) : null;
$id_user = 1;
var_dump($files);
if ($id_user && !empty($files)) {
    uploadFiles($files, "../base/img/", "user_" . $id_user, $id_user);
} else {
    echo "Erreur : ID utilisateur ou fichiers manquants.";
}