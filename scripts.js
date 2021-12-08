const btnMenu = document.getElementById("btn-menu");
const menu_bars = document.querySelector(".menu-bars");
btnMenu.addEventListener("click", (e) => {
  menu_bars.classList.toggle("toggle-menu");
});
