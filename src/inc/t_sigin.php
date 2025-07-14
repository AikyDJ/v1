<?php
//include "../fn/base.php";
include_once "./fn.php";

session_start();

$user = $_POST["nom"];
$pwrd = $_POST["password"];
$brth = $_POST["birthday"];
$mail = $_POST["email"];
$genre = $_POST["genre"];
signin($user, $mail,$pwrd, $brth, $genre, null);

header("location:../page/index.php?page=home");
