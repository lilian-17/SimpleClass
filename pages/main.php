<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: connection.php?page=login");
    exit();
}
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

            <h1 id="mainTitle">Commencer</h1>

            <div onclick="updatePage('class');">
                Classe
            </div>


            <div onclick="updatePage('students');">
                Élève
            </div>


            <div onclick="updatePage('generate');">
                Plan
            </div>

        </div>

        <?php


         
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            include '../elements/' . $page . '.php';
        }
        else {
            header("Location: main.php?page=room");
            exit();
        }        

        ?>

    </div>

    <?php
    include '../elements/footer.php';
    ?>

    <script>
        function updatePage(pageValue) {
            const url = new URL(window.location.href);
            url.searchParams.set('page', pageValue); // Change seulement "page"
            window.location.replace(url.toString()); // Recharge avec la nouvelle URL
        }
    </script>

</body>

</html>