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

  var nmb_ligne = parseInt(document.getElementById('tableau_x').value);
  var nmb_colonne = parseInt(document.getElementById('tableau_y').value);

  for (var i = 0; i < nmb_ligne; i++) {

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


/*Creation de la liste d'eleves */
function createchamp() {

  var champ = document.getElementById("champ");

  for (var i = 0; i < champ.length; i++) {
    console.log(champ[i])
  }

  console.log("Test")
  console.log(champ)

  var pointeur = document.getElementById("eleve");
  var input = document.createElement("input");

  input.type = "text";
  input.placeholder = "Prenom";
  input.id = "champ";

  console.log(input);
  pointeur.appendChild(input);



}

function checkchamp() {
  const inputs = document.querySelectorAll('input'); // Récupère tous les champs
  let allFilled = true; // Suppose que tout est rempli

  // Vérifie chaque champ
  for (let input of inputs) {
    if (input.value.trim() === "") { // Si un champ est vide
      allFilled = false;
      break; // Pas besoin de vérifier les autres champs
    }
  }

  // Affiche le résultat
  if (allFilled) {
    createchamp();
  } else {
    alert("Veuillez remplir tous les champs.");
  }
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

  var nmb_ligne = parseInt(document.getElementById('tableau_x').value);
  var nmb_colonne = parseInt(document.getElementById('tableau_y').value);

  for (var i = 0; i < nmb_ligne; i++) {

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
