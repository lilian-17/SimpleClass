<?php

if (!isset($_GET['class'])){
    header('Location: main.php?page=class');
}

include '../elements/db.php';

echo'
<h3>Entrez les paramètres de génération</h3>
<div id="plan">
    <form id="generationConditions">
        <input id="e" type="checkbox" value="e">
        <label for="e">check</label>
        <input type="submit" value="Générer">
    </form>'

?>