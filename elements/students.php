<?php

include '../elements/db.php';

// Vérification si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = ($_POST['nom'] ?? ''); // Si nul alors rien sinon valeur
    $prenom = ($_POST['prenom']);

    // Vérification des champs
    if (empty($prenom)) {
        echo "<p style='color:red;'>Veuillez remplir le prénom.</p>"; //Vérification valeur prénom
    } else { //Si prénom pas vide alors
        try {
            // Préparation de la requête sécurisée
            $stmt = $conn->prepare("INSERT INTO eleves (nom, prenom) VALUES (:nom, :prenom)"); //Requete SQL + sécurisation grace a des marqueurs (préparer sans données)
            $stmt->execute(['nom' => $nom, 'prenom' => $prenom]); //Sécurisé les valeurs car remplacement des marqueurs par les valeurs en interne
            echo "<p style='color:green;'>Élève ajouté avec succès.</p>";
        } catch (Exception $e) { //Gestion erreurs
            echo "<p style='color:red;'>Erreur lors de l'ajout de l'élève : " . $e->getMessage() . "</p>";
        }
    }
}

// Affichage de la liste des élèves
echo "<h2>Liste des élèves</h2>";
//Récupération des éleves
$eleves = $conn->query("SELECT prenom, nom FROM eleves ORDER BY Id_eleve DESC")->fetchAll(PDO::FETCH_ASSOC); //Récupérer sous forme d'un tableau associatif, chaque ligne du résultat est un tableau avec les noms des colonnes (prenom et nom) comme clé

if (count($eleves) > 0) {
    echo "<ul>";
    foreach ($eleves as $eleve) { //Bouche pour executer le code pour chaque eleve du tableau
        echo "<li>" . htmlspecialchars($eleve['prenom']) . " " . htmlspecialchars($eleve['nom']) . "</li>"; //Protection contre insertion de htlm ou js
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




/*
echo '
<h3>Entrez le pénom de chaque élève </h3>
<span id="placeCount"></span>
<label for="placeCount">Nombre de places disponibles : </label>

<div id="eleve">


<form id="eleveForm" method="POST" action="">
    <table>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
        <tr>
            <td><input type="text" id="champ" name="prenom" placeholder="Prénom"></td>
            <td><input type="text" id="champ" name="nom" placeholder="Nom"></td>
        </tr>
<!--
Input pour entrer le nom et prenom des eleves
En dessous juste un select pour afficher les eleves deja dans la base de donnee
Et ajouter un bouton pour delete
-->
        <!-- <input id="ajouter" type="button" value="Ajouter" onclick="checkchamp()"> -->
    <button id="ajouter" value="Ajouter" onclick="checkchamp()"type="submit" >Envoyer</button>
    </table>
</form> 
</div>
'

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
// Avant tout, il te faut définir dans quelle classe tu ajoutes les élèves :
            $sql = "INSERT INTO eleves (prenom,nom) VALUES (:prenom,:nom)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
        ]);
        */
?>
