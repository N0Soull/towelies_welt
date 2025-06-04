<?php
session_start();
include 'php/datenbank.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb - Towelies Welt</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="container-custom">
        <section id="cart-items">
            <h2>Dein Warenkorb</h2>
            <div class="cart-list">
                <?php
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $productId => $item) {
                        $imagePath = 'Bilder/' . strtolower(str_replace(' ', '-', $item['name'])) . '.jpg';
                        ?>
                        <div class="cart-item">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>" 
                                 alt="<?php echo htmlspecialchars($item['name']); ?>" 
                                 class="product-image">
                            <div class="product-details">
                                <p class="item-name"><?php echo htmlspecialchars($item['name']); ?></p>
                                <p class="item-price">
                                    <?php echo number_format($item['price'], 2, ',', '.'); ?> € x <?php echo $item['quantity']; ?>
                                </p>
                                <p class="item-total">
                                    Gesamt: <?php echo number_format($item['price'] * $item['quantity'], 2, ',', '.'); ?> €
                                </p>
                            </div>
                            <div class="quantity-controls">
                                <form action="php/warenkorb.php" method="post" class="quantity-form">
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" 
                                           min="1" max="99" class="quantity-input">
                                    <button type="submit" class="update-btn">Aktualisieren</button>
                                </form>
                                <form action="php/warenkorb.php" method="post" class="remove-form">
                                    <input type="hidden" name="action" value="remove">
                                    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                    <button type="submit" class="remove-btn">🗑️</button>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="empty-cart">Ihr Warenkorb ist leer.</p>';
                }
                ?>
            </div>
            <div class="cart-summary">
                <h3>Gesamtbetrag: 
                    <span id="total-price">
                        <?php 
                        $total = isset($_SESSION['cart']) ? array_sum(array_map(function($item) {
                            return $item['price'] * $item['quantity'];
                        }, $_SESSION['cart'])) : 0;
                        echo number_format($total, 2, ',', '.') . ' €';
                        ?>
                    </span>
                </h3>
                <div class="cart-buttons">
                    <form action="php/warenkorb.php" method="post" class="clear-cart-form">
                        <input type="hidden" name="action" value="clear">
                        <button type="submit" class="btn clear-btn">Warenkorb leeren</button>
                    </form>
                    <?php if (!empty($_SESSION['cart'])) : ?>
                        <form action="bestellabschluss.php" method="post" class="checkout-form">
                            <button type="submit" class="btn checkout-btn">Zur Kasse</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    <br></br>
    <script src="scripts/cart.js"></script>
</body>
</html>
 