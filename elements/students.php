<?php
echo
'
<h3>Entrez le pénom de chaque élève </h3>
<span id="placeCount"></span>
<label for="placeCount">Nombre de places disponibles : </label>

<div id="eleve">
    <input id="ajouter" type="button" value="Ajouter" onclick="checkchamp()">
    <input id="champ" type="text" placeholder="Prenom">

    <input id="submit" type="submit" value="Envoyer" >
</div>
'
?>