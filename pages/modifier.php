<?php
// Inclure la connexion à la base de données
include '../elements/db.php';

// Vérifier que l'identifiant est bien passé en paramètre
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sécuriser l'entrée

    // Préparer et exécuter la requête de suppression
    $stmt = $conn->prepare("DELETE FROM classes WHERE Id_classe = :id");
    $stmt->execute(['id' => $id]);
}

// Rediriger vers main.php
header("Location: main.php");
exit();
?>