const pricePerItem = 270.00; // Preço fixo por item
let quantity = 1;

function updatePrice() {
  const totalPrice = pricePerItem * quantity;
  document.getElementById('item-price').textContent = `R$ ${totalPrice.toFixed(2).replace('.', ',')}`;
}

function updateQuantityFill() {
  const fillPercentage = Math.min(100, (quantity / 5) * 100); // Limita o preenchimento até 100%
  document.getElementById('quantity-fill').style.width = `${fillPercentage}%`;
}

function increaseQuantity() {
  quantity++;
  document.getElementById('quantity').textContent = quantity;
  updatePrice();
  updateQuantityFill();
}

function decreaseQuantity() {
  if (quantity > 1) {
    quantity--;
    document.getElementById('quantity').textContent = quantity;
    updatePrice();
    updateQuantityFill();
  }
}

updatePrice(); // Inicializa o preço ao carregar a página