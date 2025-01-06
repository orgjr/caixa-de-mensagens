document.addEventListener("DOMContentLoaded", function () {
  showMessage();
});

function showMessage() {
  const url = "/Assets/Display.php";

  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("messages").innerHTML = data;
    })
    .catch((error) => {
      console.error("Erro ao carregar a mensagem:", error);
    });
}
