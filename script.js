let mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

function toggle_light_mode() {
  var app = document.getElementsByTagName("BODY")[0];
  if (localStorage.lightMode == "dark") {
localStorage.lightMode = "light";
app.setAttribute("light-mode", "light");
  } else {
localStorage.lightMode = "dark";
app.setAttribute("light-mode", "dark");
  }		
}

var app = document.getElementsByTagName("BODY")[0];
    if (localStorage.lightMode == "dark") {
        app.setAttribute("light-mode", "dark");
    }

    window.addEventListener("storage", function () {
      if (localStorage.lightMode == "dark") {
          app.setAttribute("light-mode", "dark");
    } else {
        app.setAttribute("light-mode", "light");
    }
  }, false);