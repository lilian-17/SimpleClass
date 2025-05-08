<?php
//Fonction Salle

if (!isset($_GET['class'])){
    header('Location: main.php?page=class');
}

include '../elements/db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tableau_x = intval($_POST['tableau_x']);
    $tableau_y = intval($_POST['tableau_y']);
    $name = ($_POST['name_plan']);

    if ($conn) {
        $sql = "INSERT INTO plans (nom, longueur, largeur, Id_classe) VALUES (:nom, :longueur, :largeur, :classe)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':longueur' => $tableau_x,
            ':largeur' => $tableau_y,
            ':nom' => $name,
            ':classe' => $_GET['class']
        ]);

        echo "Les dimensions ont été enregistrées avec succès.";
    } else {
        echo "Erreur de connexion à la base de données.";
    }
}


echo
'
<h3>Entrez les dimensions de votre classe</h3>
<span id="placeCount"></span>
<label for="placeCount">Nombre de places disponibles : </label>

<form id="saveRoom" method="POST">
    <input required id="name_plan" name="name_plan" type="text placeholder="Nom du plan">
    <input id="tableExport" type="hidden">
    <input type="submit" value="Envoyer">



<div id="classe">
    <div id="classeInput">
        <input id="rangex" type="range" min="1" max="10" oninput="tableau_x.value=rangex.value ; updatetableau();" />
        <input id="tableau_x" name="tableau_x" type="number" value="10" min="1" max="100" oninput="rangex.value=tableau_x.value ; updatetableau();" />
        <input id="rangey" type="range" min="1" max="10" oninput="tableau_y.value=rangey.value ; updatetableau();" />
        <input id="tableau_y" name="tableau_y" type="number" value="10" min="1" max="100" oninput="rangey.value=tableau_y.value ; updatetableau();" />
    </div>
    <table id="tableau_classe"></table>
</div>
</form>
'
?>