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

    <header>
    </header>

    <?php
    include "../elements/nav.php";
    ?>

    <div class="content">

        <h1>Organisez vos classes en un clin d'œil !</h1>

        <h3 class="highlight">Bienvenue sur SimpleClass ! </h3>


        <p>Créez et organisez vos plans de classe facilement grâce à une interface intuitive. Importez vos élèves,
            placez-les manuellement ou aléatoirement, appliquez des règles et exportez le résultat en un clic.</p>

        <h4>🚀 Commencer</h4>

        <ol>
            <li>Créez l'organisation de la salle (ajoutez et disposez les tables selon votre classe).</li>

            <li>Ajoutez vos élèves (import PDF/TXT ou manuel). </li>

            <li>Organisez votre classe (glisser-déposer, suppression, règles de placement). </li>

            <li>Exportez votre plan (PDF, PNG, JPG).</li>

            <li>Prêt à commencer ? 🎓
        </ol>
    </div>

    <?php
    include '../elements/footer.php';
    ?>

</body>

</html>