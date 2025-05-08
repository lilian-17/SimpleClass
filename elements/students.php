<?php

if (!isset($_GET['class'])){
    header('Location: main.php?page=class');
}

include '../elements/db.php';

if(isset($_POST['prenom']) && isset($_GET['class'])){
    $nom = ($_POST['nom'] ?? ''); // Si nul alors rien sinon valeur
    $prenom = ($_POST['prenom']);
    
    // Vérification des champs
    if (empty($prenom)) {
         echo "<p style='color:red;'>Veuillez remplir le prénom.</p>"; //Vérification valeur prénom
    } else { //Si prénom pas vide alors
        
        try {
            // Préparation de la requête sécurisée
            $stmt = $conn->prepare("INSERT INTO eleves (nom, prenom, Id_classe) VALUES (:nom, :prenom, :classe)"); //Requete SQL + sécurisation grace a des marqueurs (préparer sans données)
            $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'classe' => $_GET['class']]); //Sécurisé les valeurs car remplacement des marqueurs par les valeurs en interne
            echo "<p style='color:green;'>Élève ajouté avec succès.</p>";
        } catch (Exception $e) { //Gestion erreurs
            echo "<p style='color:red;'>Erreur lors de l'ajout de l'élève : " . $e->getMessage() . "</p>";
        }
        }
    }

    

// Affichage de la liste des élèves
echo "<h2>Liste des élèves</h2>";
//Récupération des éleves
$class = $_GET['class'];
$eleves = $conn->query("SELECT prenom, nom FROM eleves WHERE Id_classe = '$class' ORDER BY Id_eleve DESC")->fetchAll(PDO::FETCH_ASSOC); //Récupérer sous forme d'un tableau associatif, chaque ligne du résultat est un tableau avec les noms des colonnes (prenom et nom) comme clé

if (count($eleves) > 0) {
    echo "<ul>";
    foreach ($eleves as $eleve) { //Boucle pour executer le code pour chaque eleve du tableau
        echo "<li>" . htmlspecialchars($eleve['prenom']) . " " . htmlspecialchars($eleve['nom']) . "</li>"; //Protection contre insertion de html ou js
    }
    echo "</ul>";
} else {
    echo "<p>Aucun élève enregistré.</p>";
}


// Formulaire pour ajouter un élève
echo '<h2>Ajouter un élève</h2>
<form method="post">
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="text" name="nom" placeholder="Nom (facultatif)">
    <button type="submit">Ajouter</button>
</form>';





?>
