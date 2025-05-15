/* ========== Enhanced Cart Page JavaScript ========== */

document.addEventListener('DOMContentLoaded', () => {
    const cartList = document.querySelector('.cart-list');
    const totalPriceElement = document.getElementById('total-price');
    const clearCartBtn = document.getElementById('clear-cart');

    // Load cart from LocalStorage
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    function updateLocalStorage() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }

    function updateCart() {
        cartList.innerHTML = '';
        let total = 0;

        if (cartItems.length === 0) {
            cartList.innerHTML = '<p>Dein Warenkorb ist leer.</p>';
        }

        cartItems.forEach(item => {
            const itemRow = document.createElement('div');
            itemRow.classList.add('cart-item');
            itemRow.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="product-image" />
                <div class="product-details">
                    <p>${item.name}</p>
                    <p>${item.price.toFixed(2)} € x ${item.quantity}</p>
                </div>
                <div class="product-controls">
                    <button onclick="decreaseQuantity(${item.id})">-</button>
                    <button onclick="increaseQuantity(${item.id})">+</button>
                    <button onclick="removeItem(${item.id})">❌</button>
                </div>
            `;
            cartList.appendChild(itemRow);
            total += item.price * item.quantity;
        });

        totalPriceElement.textContent = `${total.toFixed(2)} €`;
        updateLocalStorage();
    }

    window.removeItem = (id) => {
        cartItems = cartItems.filter(item => item.id !== id);
        updateCart();
    };

    window.increaseQuantity = (id) => {
        const item = cartItems.find(item => item.id === id);
        if (item) {
            item.quantity += 1;
            updateCart();
        }
    };

    window.decreaseQuantity = (id) => {
        const item = cartItems.find(item => item.id === id);
        if (item && item.quantity > 1) {
            item.quantity -= 1;
            updateCart();
        }
    };

    clearCartBtn.addEventListener('click', () => {
        cartItems = [];
        updateCart();
    });

    updateCart();
}   );
