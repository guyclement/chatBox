<?php
    include("connectDB.php");
    $sql ="SELECT * FROM chat order by dateEnvoi desc limit 10";
    $stmt = $linkpdo->prepare($sql);
    $stmt->execute();

    $all =  $stmt->fetchall();
    echo json_encode($all);
?>