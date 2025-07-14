<?php
include_once './fn.php';
$files = $_FILES['files'];
$id_user = isset($_POST['id_user']) ? intval($_POST['id_user']) : null;
$id_user = 1;
var_dump($files);
if ($id_user && !empty($files['name'][0])) {
    echo "<h3>Uploaded Files:</h3>";
    foreach ($files['name'] as $index => $fileName) {
        $fileTmpName = $files['tmp_name'][$index];
        $fileType = $files['type'][$index];
        $fileError = $files['error'][$index];
        $fileSize = $files['size'][$index];

        echo "<p>File #$index:</p>";
        echo "Name: $fileName<br>";
        echo "Temporary Path: $fileTmpName<br>";
        echo "Type: $fileType<br>";
        echo "Error Code: $fileError<br>";
        echo "Size: $fileSize bytes<br><br>";
    }
} else {
    echo "Erreur : ID utilisateur ou fichiers manquants.";
}
if ($id_user && !empty($files)) {
    uploadFiles($files, "../base/img/", "user_" . $id_user, $id_user);
} else {
    echo "Erreur : ID utilisateur ou fichiers manquants.";
}