require("./bootstrap");
require("./taskModal");
require("./calendar");

const dropdown = document.querySelector(".dropdown");
const dropdownMenu = document.querySelector(".dropdown-menu");

let hovered = false;
dropdown.addEventListener("mouseover", function(event) {
    event.stopPropagation();
    dropdown.classList.add("is-active");
    hovered = true;
});

dropdownMenu.addEventListener("mouseleave", function(event) {
    event.stopPropagation();
    if (hovered === true) {
        dropdown.classList.remove("is-active");
        hovered = false;
    }
});