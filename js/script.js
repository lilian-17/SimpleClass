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