<?php

$login = "root";
$mdp = "";
$linkpdo = new PDO("mysql:host=localhost;port=3306;dbname=chatboxbd", $login, $mdp);
$linkpdo->exec("SET CHARACTER SET utf8");
    /* lorsque le site sera hébergé
    //Fichier de connexion à la base de données, il est utilisé dans toutes les pages qui utilisent des requêtes
    $sname = "sql111.byethost7.com";
    $uname = "b7_33211016";
    $db_name = "b7_33211016_project_dataBase";
    $password = "HD9ptQd8j3LijLs";
    $conn =  mysqli_connect($sname, $uname, $password, $db_name);
    $linkpdo = new PDO("mysql:host=$sname;dbname=$db_name", $uname, $password);
    $linkpdo->exec("SET CHARACTER SET utf8");
    $linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    */

?>