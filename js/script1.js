const btnHam = document.querySelector(".ham-btn");
const btnTimes = document.querySelector(".times-btn");
const navBar = document.getElementById("nav-bar");

btnHam.addEventListener("click", function () {
  if (btnHam.className !== "") {
    btnHam.style.display = "none";
    btnTimes.style.display = "block";
    navBar.classList.add("show-nav");
  }
});

btnTimes.addEventListener("click", function () {
  if (btnHam.className !== "") {
    this.style.display = "none";
    btnHam.style.display = "block";
    navBar.classList.remove("show-nav");
  }
});
// Add the JavaScript functions to show and hide the .hidden-content on hover

function showHiddenContent(element) {
  const hiddenContent = element.querySelector(".hidden-content");
  hiddenContent.style.display = "block";
}

function hideHiddenContent(element) {
  const hiddenContent = element.querySelector(".hidden-content");
  hiddenContent.style.display = "none";
}
