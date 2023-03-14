<?php
    if (isset($_GET['name'])) {
        session_start();
        $_SESSION['name'] = $_GET['name'];
        header("Location: afficher.php");
    }
?>