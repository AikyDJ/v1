<?php
include_once "../inc/fn.php";
$id_objet = isset($_GET['id_objet']) ? intval($_GET['id_objet']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunter</title>
</head>
<body>
    <div class="container">
        <form action="../inc/lend.php" method="post">
            <input type="hidden" name="id_objet" value="<?= $id_objet ?>">
            <label>Nombre de jours :</label>
            <input type="number" name="jours" min="1" required>
            <input type="submit" value="Emprunter">
        </form>
    </div>
</body>
</html>