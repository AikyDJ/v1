<?php
ini_set("display_errors",1);

if (mysqli_connect('localhost','root',null,'indrana361')) {
    $sql_data =mysqli_connect('localhost','root',null,'indrana361');
    //echo "<h1>connected to <i>$server</i> </h1> <p>User: $user_server</p><p>Base: $database </p>" ;
    $_SERVER["base"] = $sql_data;
} else {
    echo "<h1>No connexion at all</h1>";
}
