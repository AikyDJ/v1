<?php
//include "../fn/base.php";
include_once "fn.php";

session_start();


$user = $_POST["user"];
$mdp = $_POST["mdp"];

echo "<br>#user = $user<br>#password = $mdp<br> ";
echo "<br> request = $request <br>";

if (login($user,$mdp)){
    $_SESSION["id"] = getUserId($user,$mdp);
    echo "id user".$_SESSION["id"];
    $_SESSION["error"] = 0;
    header("location:../page/index.php?page=home");
}else{
    $count = $_SESSION["error"]++;
    header("location:../page/login.php?error=$count");
}
    

