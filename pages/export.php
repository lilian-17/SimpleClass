<?php

include '../elements/db.php';

if (!isset($_GET['class']) || !isset($_GET['plan'])) {
    die("Classe ou plan non spécifié.");
}

$class = intval($_GET['class']);
$plan = intval($_GET['plan']);

// Récupération des élèves et de leurs positions dans le plan
$eleves = $conn->query("SELECT e.prenom, e.nom 
                        FROM eleves e 
                        WHERE e.Id_classe = $class 
                        ORDER BY e.Id_eleve DESC")->fetchAll(PDO::FETCH_ASSOC);

// Configuration du fichier CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="plan_classe.csv"');

// Ouverture du flux de sortie
$output = fopen('php://output', 'w');

// Écriture de l'entête
fputcsv($output, ['Prénom', 'Nom']);

// Écriture des données
foreach ($eleves as $eleve) {
    fputcsv($output, [
        $eleve['prenom'],
        $eleve['nom']
    ]);
}

// Fermeture
fclose($output);
exit;
