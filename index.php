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
            header("afficher.php");
            exit();
        }else {
            header("loginPage.php");
            exit();
        }
    ?>
</body>
</html>