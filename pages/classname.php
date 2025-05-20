<?php
// Connexion à la base de données
include '../elements/db.php';

// Vérifie que l'id est bien présent dans l'URL
if (!isset($_GET['id'])) {
    header("Location: main.php");
    exit();
}

$id = intval($_GET['id']);

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new_name'])) {
        $newName = trim($_POST['new_name']);

        // Met à jour le nom dans la base de données
        $stmt = $conn->prepare("UPDATE classes SET nom = :nom WHERE Id_classe = :id");
        $stmt->execute(['nom' => $newName, 'id' => $id]);

        // Redirection vers main.php
        header("Location: main.php");
        exit();
    }
}

// Récupérer le nom actuel pour affichage dans l'input (optionnel)
$stmt = $conn->prepare("SELECT nom FROM classes WHERE Id_classe = :id");
$stmt->execute(['id' => $id]);
$classe = $stmt->fetch(PDO::FETCH_ASSOC);

// Si l'élément n'existe pas, on redirige
if (!$classe) {
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier le nom de la classe</title>
</head>
<body>
    <h1>Modifier le nom de la classe</h1>
    <form method="POST">
        <input type="text" name="new_name" value="<?= htmlspecialchars($classe['nom']) ?>" required>
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>