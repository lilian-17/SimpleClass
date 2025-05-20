<?php

include '../elements/db.php';

if (!isset($_GET['class']) || !isset($_GET['plan'])) {
    die("Classe ou plan non spécifié.");
}

$class = intval($_GET['class']);
$plan = intval($_GET['plan']);

$eleves = $conn->query("SELECT e.prenom, e.nom 
                        FROM eleves e 
                        WHERE e.Id_classe = $class 
                        ORDER BY e.Id_eleve DESC")->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="plan_classe.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, ['Prénom', 'Nom']);

foreach ($eleves as $eleve) {
    fputcsv($output, [
        $eleve['prenom'],
        $eleve['nom']
    ]);
}

fclose($output);
exit;
