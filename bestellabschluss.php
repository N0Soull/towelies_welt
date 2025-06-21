<?php
session_start();
// Prüfen, ob der Warenkorb leer ist
if (empty($_SESSION['cart'])) {
    header('Location: warenkorb.php');
    exit();
}

// Fehler- und Erfolgsnachrichten
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $city = trim($_POST['city'] ?? '');
    $zip = trim($_POST['zip'] ?? '');
    $payment = $_POST['payment'] ?? '';

    if ($name && $address && $city && $zip && $payment) {
        // Hier könnte die Bestellung gespeichert werden
        $success = 'Vielen Dank für Ihre Bestellung!';
        unset($_SESSION['cart']);
    } else {
        $error = 'Bitte füllen Sie alle Felder aus.';
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zur Kasse - Towelies Welt</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <style>
        body { min-height: 100vh; display: flex; flex-direction: column; }
        main.container-custom { flex: 1; min-height: unset; display: block; }
        .checkout-form { max-width: 500px; margin: 2rem auto 3rem auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        .checkout-form label { display: block; margin-top: 1rem; }
        .checkout-form input, .checkout-form select { width: 100%; padding: 0.5rem; margin-top: 0.3rem; border-radius: 4px; border: 1px solid #ccc; }
        .checkout-form .btn { margin-top: 1.5rem; width: 100%; }
        .checkout-summary { margin-bottom: 2rem; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="container-custom">
        <h2>Zur Kasse</h2>
        <div class="checkout-summary">
            <h3>Bestellübersicht</h3>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <li><?php echo htmlspecialchars($item['name']); ?> x <?php echo $item['quantity']; ?> - <?php echo number_format($item['price'] * $item['quantity'], 2, ',', '.'); ?> €</li>
                <?php endforeach; ?>
            </ul>
            <strong>Gesamtbetrag: <?php 
                $total = array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $_SESSION['cart']));
                echo number_format($total, 2, ',', '.');
            ?> €</strong>
        </div>
        <?php if ($error): ?><p class="error"><?php echo $error; ?></p><?php endif; ?>
        <?php if ($success): ?><p class="success"><?php echo $success; ?></p><?php endif; ?>
        <?php if (!$success): ?>
        <form class="checkout-form" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" required>

            <label for="city">Stadt</label>
            <input type="text" id="city" name="city" required>

            <label for="zip">PLZ</label>
            <input type="text" id="zip" name="zip" required pattern="[0-9]{5}">

            <label for="payment">Zahlungsmethode</label>
            <select id="payment" name="payment" required>
                <option value="">Bitte wählen</option>
                <option value="paypal">PayPal</option>
                <option value="kreditkarte">Kreditkarte</option>
                <option value="rechnung">Rechnung</option>
            </select>

            <button type="submit" class="btn checkout-btn">Jetzt bezahlen</button>
        </form>
        <?php endif; ?>
    </main>
    <?php include 'Footer.php'; ?>
</body>
</html>
