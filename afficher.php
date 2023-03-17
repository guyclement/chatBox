<script>
    function fillChat(){
        document.getElementById("chatContainer").innerHTML = "";
        var xhr = new XMLHttpRequest();
        xhr.open("GET","recuperer.php",true);
        xhr.onreadystatechange = function(){
            //Traitement seulement si on a tout reçu et que la réponse est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                let objJson = JSON.parse(xhr.responseText);
                for (let i = 0; i<10 ; i++){

                    var time_diff = Math.floor(Date.now() / 1000) - objJson[9-i].dateEnvoi;
                    var minutes_Diff = Math.round(time_diff / 60);
                    let timeText = "Il y a ";
                    if (minutes_Diff > 10080){
                        timeText +=  Math.round(((minutes_Diff/60)/24)/7)+"sm"
                    }else if (minutes_Diff>1440){
                        timeText +=  Math.round((minutes_Diff/60)/24)+"j"
                    }else if (minutes_Diff > 60){
                        timeText +=  Math.round(minutes_Diff/60)+"h"
                    }else{
                        timeText += minutes_Diff+"min"
                    }

                    let message = '<div class="messageContainer"><div class="messageInfo"><p class="time">'+timeText+'</p><p class="name">'+ objJson[9-i].auteur+'</p></div><p class="message">'+ objJson[9-i].contenu +'</p></div>';
                    document.getElementById("chatContainer").innerHTML += message;
                    var objDiv = document.getElementById("chatContainer");
                    objDiv.scrollTop = objDiv.scrollHeight;
                }
            }
        }
        xhr.send(null);
    }

    function sendMessage(username){
        let value = document.getElementById('messageInput').value;
        document.getElementById('messageInput').value = "";

        var xhr = new XMLHttpRequest();
        xhr.open("GET","enregistrer.php?auteur="+username+"&contenu=" + value,true);

        xhr.onreadystatechange = function(){
            //Traitement seulement si on a tout reçu et que la réponse est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                fillChat()
            }
        } 
        xhr.send(null);
        
    }

    function logout() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open('GET','logout.php', true);
        document.location.href="loginPage.php";
        xmlhttp.send(null);
    }

    window.onload = (event) => {
        fillChat();
        let truc = setInterval(fillChat, 2000);
    };
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChatBox</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        session_start();
        if (isset($_SESSION['name'])) {
            $userName = $_SESSION['name'];
        }else {
            header("loginPage.php");
        }
    ?>
    <div id="box">
        <div id="nameContainer">
            <p><?php echo $userName;?></p>
        </div>
        <div id="chatContainer">
        </div>
        <div id="inputContainer">
            <input type="text" maxlength="100" placeholder="Entrer un message" name="message" id="messageInput"></input>
            <input type='button' value='Envoyer' onclick='sendMessage("<?php echo $userName?>")' />
            <input type="button" value="Déconnexion" onclick="logout()">
        </div>
    </div>

    <p id="zone" ></p>
</body>
</html>