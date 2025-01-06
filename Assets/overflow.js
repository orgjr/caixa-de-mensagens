const superior = document.getElementById("right");
const scrollableDiv = document.getElementById("messages");

// Sincronizar rolagem da .scrollable-div com a .superior
superior.addEventListener("scroll", () => {
  scrollableDiv.scrollTop = superior.scrollTop;
});
