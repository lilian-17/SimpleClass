<?php

if (!isset($_GET['class'])) {
    header('Location: main.php?page=class');
    exit;
}

include '../elements/db.php';

// Récupérer les élèves de la classe
$class = intval($_GET['class']);
$eleves = $conn->query("SELECT Id_eleve, prenom, nom FROM eleves WHERE Id_classe = $class ORDER BY Id_eleve DESC")->fetchAll(PDO::FETCH_ASSOC);

// Récupérer le dernier plan de la classe
$plan = $conn->query("SELECT * FROM plans WHERE Id_classe = $class ORDER BY Id_Plan DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Plan de classe</title>
</head>
<body>

<h3>Entrez les paramètres de génération</h3>
<div id="plan">
    <form id="generationConditions" onsubmit="event.preventDefault(); exportTableToCSV('plan.csv');">

        <input type="submit" value="Exporter cette table en CSV">
    </form>

<?php
if ($plan) {
    $longueur = $plan['longueur'];
    $largeur = $plan['largeur'];
    echo '<h4>Disposition des élèves pour le plan "' . htmlspecialchars($plan['nom']) . '"</h4>';
    echo '<table id="table-places" border="1">';
    for ($y = 0; $y < $longueur; $y++) {
        echo '<tr>';
        for ($x = 0; $x < $largeur; $x++) {
            echo '<td>';
            echo '<select>';
            echo '<option value="">--</option>';
            foreach ($eleves as $eleve) {
                echo '<option value="' . htmlspecialchars($eleve['Id_eleve']) . '">' . htmlspecialchars($eleve['prenom']) . ' ' . htmlspecialchars($eleve['nom']) . '</option>';
            }
            echo '</select>';
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "<p style='color:red;'>Aucun plan trouvé pour cette classe.</p>";
}
?>

</div>



</body>
</html>
