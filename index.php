<script>
    function accessPHP(){
        var xhr = new XMLHttpRequest();
        xhr.open("GET","recuperer.php?",true);

        xhr.onreadystatechange = function(){
            //Traitement seulement si on a tout reçu et que la réponse est ok
            if(xhr.readyState == 4 && xhr.status == 200){
            //alert(xhr.responseText);
            document.getElementById("zone").innerHTML = xhr.responseText;
            }
        } 
        xhr.send(null);
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatBox</title>
</head>
<body>
    <h1>Ceci est une future chatbox</h1>
    <?php
        session_start();
        if (isset($_SESSION['name'])) {
            echo $_SESSION['name']." est connecté";
        }else {
            header("loginPage.php");
        }
    ?>
</body>
</html>