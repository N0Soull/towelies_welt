<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb - Towelies Welt</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


    <?php include 'header.php'; ?>


    <main class="container-custom">
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
    <script src="scripts/cart.js"></script>
</body>
</html>
 