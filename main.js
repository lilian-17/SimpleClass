function togglemode() {

  console.log('Thème changé')
  var body = document.body;
  body.classList.toggle("dark-mode");

  var button = document.getElementById("toggleButton");

  console.log(button.value)
  if (button.value === "Thème clair") {
    button.value = "Thème sombre";
    localStorage.setItem("theme", "dark-mode");
  }

  else {
    button.value = "Thème clair";
    localStorage.setItem("theme", "");
  }

}

window.onload = function () {
  var savedTheme = localStorage.getItem("theme");
  var body = document.body;
  var button = document.getElementById("toggleButton");

  if (savedTheme === "dark-mode") {
    body.classList.add("dark-mode");
    button.value = "Thème sombre";
  } else {
    body.classList.remove("dark-mode");
    button.value = "Thème clair";
  }
};

document.addEventListener("DOMContentLoaded", function() {
  document.body.classList.add("no-transition");

  document.head.insertAdjacentHTML("beforeend", `
      <style>
          * :not(body){
              -webkit-transition: background-color 300ms ease-in-out, color 200ms ease-in-out;
              -ms-transition: background-color 300ms ease-in-out, color 200ms ease-in-out;
              transition: background-color 300ms ease-in-out, color 200ms ease-in-out;
          }
          .no-transition * {
              transition: none !important;
          }

      </style>
  `);

  setTimeout(() => {
    document.body.classList.remove("no-transition");
}, 10);

});

document.addEventListener("mousemove", (e) => {
  const x = (e.clientX / window.innerWidth) * 100;
  const y = (e.clientY / window.innerHeight) * 100;
  
  document.documentElement.style.setProperty("--x", `${x}%`);
  document.documentElement.style.setProperty("--y", `${y}%`);

  
});

function updatetableau() {

  let classe = document.getElementById('classe');

  let existingTable = document.querySelector("table");
    if (existingTable) {
        existingTable.remove();
    }
  
  var tbl = document.createElement('table');

  var nmb_colonne_prenom = parseInt(document.getElementById('tableau_x').value);
  var nmb_colonne = parseInt(document.getElementById('tableau_y').value);

  for (var i = 0; i < nmb_colonne_prenom; i++) {

    var tr = tbl.insertRow();

    for (var j = 0; j < nmb_colonne; j++) {

      let td = tr.insertCell();
      td.setAttribute("data-x", j);
      td.setAttribute("data-y", i);
      td.setAttribute("value",'')

    }

  }

  tbl.setAttribute("id",'classPlan')
  classe.appendChild(tbl);

  // Sauvegarde dans l'input 

  const array = [];

  const rows = tbl.rows;
  for (let i = 0; i<row.length;i++){
    const row = [];
    const cells = rows[i].cells;
    for(let j = 0;j<cells.length;j++){
      row.push(cells[j].innerText);
    }
    array.push(row);
  }


  let td_ele = document.querySelectorAll("td");
  td_ele.forEach(td => {
    td.addEventListener('click', () => {
      
      console.log(td.getAttribute("value"))
      if (td.getAttribute("value") == '#null'){
        td.setAttribute("value",'')
      }
      else{
        td.setAttribute("value",'#null')
      }
      
    });
  });

  tableExport = document.getElementById(tableExport);
  tableExport.value = array;
  console.log(array);

}

function agencement() {

  console.log('Agencement')

  document.getElementById('classe').style.display = "block"
  document.getElementById('eleve').style.display = "none"
  document.getElementById('plan').style.display = "none"

}

function liste() {
  console.log('Liste')

  document.getElementById('classe').style.display = "none";
  document.getElementById('eleve').style.display = "block";
  document.getElementById('plan').style.display = "none";

}

let compteur = 0; // Compteur pour différencier les élèves
/*Creation de la liste d'eleves */
function createchamp() {

  var champ = document.getElementById("champ");

  for (var i = 0; i < champ.length; i++) {
    console.log(champ[i])
  }

  console.log("Test")
  console.log(champ)

  var pointeur = document.getElementById("eleve");
  var ligne = document.createElement("tr");
  var colonne_prenom = document.createElement("td");
  var colonne_nom = document.createElement("td");
  var input_prenom = document.createElement("input");
  var input_nom = document.createElement("input");

  input_prenom.type = "text";
  input_prenom.placeholder = "Prenom";
  input_prenom.id = "champ";
  input_prenom.name = `eleves[${compteur}][prenom]`; // array de PHP

  input_nom.type = "text";
  input_nom.placeholder = "Nom";
  input_nom.id = "champ";
  input_nom.name = `eleves[${compteur}][nom]`;

  ligne.appendChild(colonne_prenom);
  ligne.appendChild(colonne_nom);
  colonne_prenom.appendChild(input_prenom);
  colonne_nom.appendChild(input_nom);
  pointeur.appendChild(ligne);

}

let compteur = 0; // Compteur pour différencier les élèves
//Creation de la liste d'eleves/
function createchamp() {

  var champ = document.getElementById("champ");

  for (var i = 0; i < champ.length; i++) {
    console.log(champ[i])
  }

  console.log("Test")
  console.log(champ)

  var pointeur = document.getElementById("eleve");
  var ligne = document.createElement("tr");
  var colonne_prenom = document.createElement("td");
  var colonne_nom = document.createElement("td");
  var input_prenom = document.createElement("input");
  var input_nom = document.createElement("input");

  input_prenom.type = "text";
  input_prenom.placeholder = "Prenom";
  input_prenom.id = "champ";
  input_prenom.name = eleves[$compteur][prenom]; // array de PHP

  input_nom.type = "text";
  input_nom.placeholder = "Nom";
  input_nom.id = "champ";
  input_nom.name = eleves[$compteur][nom];

  ligne.appendChild(colonne_prenom);
  ligne.appendChild(colonne_nom);
  colonne_prenom.appendChild(input_prenom);
  colonne_nom.appendChild(input_nom);
  pointeur.appendChild(ligne);

}

//Mainteant il faudrait faire en sorte de les ajoutés a une liste peut être pour qu'on puisse les récupérer



function plan() {

  console.log('Plan')

  document.getElementById('classe').style.display = "none";
  document.getElementById('eleve').style.display = "none";
  document.getElementById('plan').style.display = "block";
}

function updatetableau() {

  let classe = document.getElementById('classe');

  let existingTable = document.querySelector("table");
    if (existingTable) {
        existingTable.remove();
    }
  
  var tbl = document.createElement('table');

  var nmb_colonne_prenom = parseInt(document.getElementById('tableau_x').value);
  var nmb_colonne = parseInt(document.getElementById('tableau_y').value);

  for (var i = 0; i < nmb_colonne_prenom; i++) {

    var tr = tbl.insertRow();

    for (var j = 0; j < nmb_colonne; j++) {

      let td = tr.insertCell();
      td.setAttribute("data-x", j);
      td.setAttribute("data-y", i);
      td.setAttribute("value",'')

    }

  }

  classe.appendChild(tbl);

  let td_ele = document.querySelectorAll("td");
  td_ele.forEach(td => {
    td.addEventListener('click', () => {
      
      console.log(td.getAttribute("value"))
      if (td.getAttribute("value") == '#null'){
        td.setAttribute("value",'')
      }
      else{
        td.setAttribute("value",'#null')
      }
      
      
      

    });
  });

}


