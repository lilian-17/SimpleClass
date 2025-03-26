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