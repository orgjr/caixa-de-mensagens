const container = document.getElementById("container-body");
// next
const RightArrowButton = document.getElementById("right-arrow-button");
RightArrowButton.addEventListener("click", () => {
  container.style.transform = "translateX(-100vw)"; // Move para a esquerda, mostrando a div .right
});

// previous
const leftArrowButton = document.getElementById("left-arrow-button");
leftArrowButton.addEventListener("click", () => {
  container.style.transform = "translateX(0vw)"; // Move para a direita, mostrando a div .left
});
