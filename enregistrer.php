<?php
    include("connectDB.php");

    if(isset($_GET["auteur"]) or isset($_GET["contenu"])){
        $auteur = $_GET["auteur"];
        $contenu = $_GET["contenu"];
        $timestamp = time();
        $stmt = $linkpdo->prepare("insert into chat (auteur, contenu, dateEnvoi ) values (?,?,?)");
        $stmt->execute([$auteur, $contenu, $timestamp]);
    }
?>