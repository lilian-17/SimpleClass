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

window.onload = function() {
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

function agencement(){

  console.log('Agencement')

  document.getElementById('classe').style.display = "block"
  document.getElementById('eleve').style.display = "none"
  document.getElementById('plan').style.display = "none"
  
}

function liste(){
/*Creation de la liste d'eleves */
  console.log('Liste')
  
  document.getElementById('classe').style.display = "none";
  document.getElementById('eleve').style.display = "block";
  document.getElementById('plan').style.display = "none";
  
}

function createchamp(){

  var champ = document.getElementById("champ");

  if (champ.value !== ""){
    var pointeur = document.getElementById("eleve");
    var input = document.createElement("input");

    input.type = "text";
    input.placeholder = "Prenom";
    input.id = "champ";

    console.log(input);
    pointeur.appendChild(input);
  }

  
}

/*
function ajoutliste(){
  var eleve = [];
  var x = document.getElementById('champ').value;

  
  console.log(x);
  eleve.push(x);
  console.log(eleve);
}
  */

function plan(){
  
console.log('Plan')

document.getElementById('classe').style.display = "none";
document.getElementById('eleve').style.display = "none";
document.getElementById('plan').style.display = "block";

}

function updatetableau(){

  var nmb_ligne = document.getElementById('tableau_x').value;
  var nmb_colonne = document.getElementById('tableau_y').value;

  console.log(nmb_ligne)
  console.log(nmb_colonne)

  var tableau = document.getElementById('tableau_classe');
  var ligne = document.createElement("tr");
  var colonne = document.createElement("td");

  ligne = [""]
  tableau.appendChild(ligne);

  

}
  
  
