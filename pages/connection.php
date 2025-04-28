<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>SimpleClass - Accueil</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <link rel="stylesheet" href="../main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Funnel+Display&family=Lexend+Deca:wght@100..900&display=swap"
        rel="stylesheet">

    <script src="../main.js"></script>

</head>

<body>

    <?php
    include '../elements/nav.php';
    ?>

    <div class="content">

        <div class="mainTitleContainer">

            <div onclick="window.location.replace('connection.php?page=login');">
                Connexion
            </div>

            <div onclick="window.location.replace('connection.php?page=register');">
                Inscription
            </div>

        </div>
        

        <?php

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            
            include '../elements/' . $page . '.php';
            
        } else {
            header("Location: connection.php?page=login");
        }
        ?>

    </div>

    <?php
    include '../elements/footer.php';
    ?>

</body>

</html>