

let mybutton = document.getElementById("btn-back-to-top");

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

//Active link
let activeLink = document.querySelectorAll(".nav-link");

activeLink.forEach((link) => {
  link.addEventListener("click", function () {
    activeLink.forEach((item) => {
      item.classList.remove("active-link");
    });
    this.classList.add("active-link");
  });
}

aos.init({
  duration: 1200,
  once: true,
  mirror: false,
  easing: "ease-in-out",
  offset: 100,
});