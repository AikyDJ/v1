<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <?php include_once "./navbar.php" ?>

    <?php if (isset($_GET["page"]) && $_GET["page"] === "home") {
        include_once "./home.php";
        } ?>
</body>

</html>