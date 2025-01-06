// usando Form
document
  .getElementById("form-placeholder")
  .addEventListener("keypress", function (event) {
    if (event.key === "Enter" && event.shiftKey) {
      event.preventDefault(); // Impede o envio do formulário (comportamento padrão)
      send(); // Chama a função para enviar
    }
  });

function send() {
  let message = document.getElementById("form-placeholder").value;

  let formData = new FormData();
  formData.append("form-placeholder", message);

  fetch("/Assets/Write.php", {
    method: "POST",
    body: formData, //Envia o FormData diretamente
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      // exibe mensagem de sucesso ou erro
      alert(data.message);

      // redireciona somente se a operação for um sucesso
      if (data.status === "success") {
        window.location.href = "/index.html";
      }
    })
    .catch((error) => {
      console.error("Erro ao enviar dados.", error);
    });
}
