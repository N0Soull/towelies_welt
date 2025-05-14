<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb - Towelies Welt</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <header>
        <h1>Warenkorb</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="produkt.php">Products</a></li>
                <li><a href="warenkorb.php" class="active">Cart</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="cart-items">
            <h2>Dein Warenkorb</h2>
            <div class="cart-list">
                <!-- Items will be dynamically injected here -->
            </div>
            <div class="cart-summary">
                <h3>Gesamtbetrag: <span id="total-price">0,00 €</span></h3>
                <button id="clear-cart" class="btn">Warenkorb leeren</button>
                <button id="checkout" class="btn">Zur Kasse</button>
            </div>
        </section>
    </main>
    <br></br>
    <footer>
        <p>&copy; 2025 Towelies Welt. Alle Rechte vorbehalten.</p>
    </footer>

    <script src="scripts/cart.js"></script>
</body>
</html>
 