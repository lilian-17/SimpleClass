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
    include '../elements/connexion.php';
    ?>

    <?php
    include '../elements/nav.php';
    ?>

    <div class="content">

        <h1>Qui sommes-nous ?</h1>


        <div class="profile">
            <img alt="Ethan Ménoury" class="pp" src="../img/pp_ethan.png">
            <h4>Ethan Ménoury</h4>
        </div>

        <p class="situation">Etudiant à l'<a href="https://www.esgi.fr/" class="highlight" target="_blank">ESGI</a> en
            première année</p>
        <p class="quote">"Chaque ligne de code que j’écris est une brique de plus dans ma compréhension du web."</p>


        <div class="profile">
            <img alt="Lilian Martineau" class="pp" src="../img/pp_lilian.png">
            <h4>Lilian Martineau</h4>
        </div>

        <p class="situation">Etudiant à l'<a href="https://www.esgi.fr/" class="highlight" target="_blank">ESGI</a> en
            première année</p>
        <p class="quote">"Rien de plus satisfaisant que de voir un projet passer de l’idée à une application
            fonctionnelle."</p>

    </div>

    <?php
    include '../elements/footer.php';
    ?>
<!-- teste linux -->
 <p> gros caca qui pue </p>
 <div>
    transliterator_get_error_message
</div>
</body>

</html>