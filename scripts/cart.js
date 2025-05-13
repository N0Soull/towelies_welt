/* ========== Cart Page JavaScript ========== */

document.addEventListener('DOMContentLoaded', () => {
    // Sample Data — You can replace this with server data
    const cartItems = [
        { id: 1, name: 'Cannabis Sativa', price: 15.99, quantity: 2 },
        { id: 2, name: 'Cannabis Indica', price: 12.99, quantity: 1 }
    ];

    const cartList = document.querySelector('.cart-list');
    const totalPriceElement = document.getElementById('total-price');
    const clearCartBtn = document.getElementById('clear-cart');

    // Function to update the cart list
    function updateCart() {
        cartList.innerHTML = '';
        let total = 0;

        cartItems.forEach(item => {
            const itemRow = document.createElement('div');
            itemRow.classList.add('cart-item');
            itemRow.innerHTML = `
                <p>${item.name} - ${item.price.toFixed(2)} € x ${item.quantity}</p>
                <div>
                    <button onclick="decreaseQuantity(${item.id})">-</button>
                    <button onclick="increaseQuantity(${item.id})">+</button>
                    <button onclick="removeItem(${item.id})">❌</button>
                </div>
            `;
            cartList.appendChild(itemRow);
            total += item.price * item.quantity;
        });

        totalPriceElement.textContent = `${total.toFixed(2)} €`;
    }

    // Function to remove an item
    window.removeItem = (id) => {
        const index = cartItems.findIndex(item => item.id === id);
        if (index !== -1) cartItems.splice(index, 1);
        updateCart();
    };

    // Function to increase the quantity
    window.increaseQuantity = (id) => {
        const item = cartItems.find(item => item.id === id);
        if (item) {
            item.quantity += 1;
            updateCart();
        }
    };

    // Function to decrease the quantity
    window.decreaseQuantity = (id) => {
        const item = cartItems.find(item => item.id === id);
        if (item && item.quantity > 1) {
            item.quantity -= 1;
            updateCart();
        }
    };

    // Clear the cart
    clearCartBtn.addEventListener('click', () => {
        cartItems.length = 0;
        updateCart();
    });

    // Initial load
    updateCart();
});
