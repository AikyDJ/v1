<?php
//include "../fn/base.php";
include_once "./fn.php";

session_start();

$user = $_POST["user"];
$pwrd = $_POST["pwd"];
$name = $_POST["name"];
$mail = $_POST["email"];
$date = $_POST["birthday"];

//signin($name, $user, $pwrd, $mail, $date);

header("location:../pages/index.php?page=home");
