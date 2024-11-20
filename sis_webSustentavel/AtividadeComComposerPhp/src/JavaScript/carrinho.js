document.addEventListener("DOMContentLoaded", () => {
  updateTotal();

  document.querySelectorAll(".cart-item").forEach(item => {
    const menosBt = item.querySelector(".menos");
    const maisBt = item.querySelector(".mais");
    const removerBt = item.querySelector(".remover");
    const quantidade = item.querySelector(".quantidade");
    const precoProduto = item.querySelector(".preco").dataset.price;

    menosBt.addEventListener("click", () => {
      let count = parseInt(quantidade.textContent);
      if (count > 1) {
        count--;
        quantidade.textContent = count;
        updateTotal();
      }
    });

    maisBt.addEventListener("click", () => {
      let count = parseInt(quantidade.textContent);
      count++;
      quantidade.textContent = count;
      updateTotal();
    });

    removerBt.addEventListener("click", () => {
      item.remove();
      updateTotal();
    });
  });
});

function updateTotal() {
  let total = 0;
  document.querySelectorAll(".cart-item").forEach(item => {
    const count = parseInt(item.querySelector(".quantidade").textContent);
    const price = parseFloat(item.querySelector(".preco").dataset.price);
    total += count * price;
  });
  document.getElementById("valorTotal").textContent = total.toLocaleString("pt-BR", { style: "currency", currency: "BRL" });
}
