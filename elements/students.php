<?php

include '../elements/connect.php';

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
// Avant tout, il te faut définir dans quelle classe tu ajoutes les élèves :
            $sql = "INSERT INTO eleves (prenom,nom) VALUES (:prenom,:nom)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
        ]);

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
?>