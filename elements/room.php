<?php
echo
'
<h3>Entrez les dimensions de votre classe</h3>
<span id="placeCount"></span>
<label for="placeCount">Nombre de places disponibles : </label>

<form id="saveRoom" method="POST">
    <input id="tableExport" type="hidden">
    <input type="submit" value="Envoyer">
</form>


<div id="classe">
    <div id="classeInput">
        <input id="rangex" type="range" min="1" max="10" oninput="tableau_x.value=rangex.value ; updatetableau();" />
        <input id="tableau_x" type="number" value="10" min="1" max="100" oninput="rangex.value=tableau_x.value ; updatetableau();" />
        <input id="rangey" type="range" min="1" max="10" oninput="tableau_y.value=rangey.value ; updatetableau();" />
        <input id="tableau_y" type="number" value="10" min="1" max="100" oninput="rangey.value=tableau_y.value ; updatetableau();" />
    </div>
    <table id="tableau_classe"></table>
</div>'
?>