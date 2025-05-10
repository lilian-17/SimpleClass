<?php

if (!isset($_GET['class'])){
    header('Location: main.php?page=class');
    exit;
}

include '../elements/db.php';

// Récupérer les élèves de la classe
$class = intval($_GET['class']);
$eleves = $conn->query("SELECT Id_eleve, prenom, nom FROM eleves WHERE Id_classe = $class ORDER BY Id_eleve DESC")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer le dernier plan de la classe
$plan = $conn->query("SELECT * FROM plans WHERE Id_classe = $class ORDER BY Id_plan DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

echo '
<h3>Entrez les paramètres de génération</h3>
<div id="plan">
    <form id="generationConditions">
        <input id="e" type="checkbox" value="e">
        <label for="e">check</label>
        <input type="submit" value="Générer">
    </form>
';

if ($plan) {
    $longueur = $plan['longueur'];
    $largeur = $plan['largeur'];
    echo '<h4>Associer les élèves aux places du plan "' . ($plan['nom']) . '"</h4>';
    echo '<form method="post" action="associer.php?class=' . $class . '&plan=' . $plan['Id_Plan'] . '">';
    echo '<table border="1">';
    for ($y = 0; $y < $largeur; $y++) {
        echo '<tr>';
        for ($x = 0; $x < $longueur; $x++) {
            echo '<td>';
            echo '<select name="case[' . $y . '][' . $x . ']">';
            echo '<option value="">--</option>';
            foreach ($eleves as $eleve) {
                echo '<option value="' . $eleve['Id_eleve'] . '">' . ($eleve['prenom']) . ' ' . ($eleve['nom']) . '</option>';
            }
            echo '</select>';
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '<input type="submit" value="Associer">';
    echo '</form>';
} else {
    echo "<p style='color:red;'>Aucun plan trouvé pour cette classe.</p>";
}

echo '<h4>Liste des élèves de la classe :</h4><ul>';
foreach ($eleves as $eleve) {
    echo '<li>' . ($eleve['prenom']) . ' ' . ($eleve['nom']) . '</li>';
}
echo '</ul></div>';

?>