<?php
include 'php/datenbank.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkte - Towelies Welt</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php';  ?>
    <div class="container">
        <h1 class="page-title">Unsere Produkte</h1>
        
        <div class="product-grid">
            <?php
            $query = "SELECT * FROM produkt";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="Bilder/<?php echo strtolower(str_replace(' ', '-', htmlspecialchars($row['Name']))) . '.jpg'; ?>"
                                alt="<?php echo htmlspecialchars($row['Name']); ?>">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><?php echo htmlspecialchars($row['Name']); ?></h3>
                            <span class="product-type"><?php echo htmlspecialchars($row['Typ']); ?></span>
                            <div class="product-price">€<?php echo number_format($row['Preis'], 2, ',', '.'); ?></div>
                            <div class="product-stock <?php echo $row['GesamtBestand'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                            <?php echo $row['GesamtBestand'] > 10 ? 'Niederig Auf lager'   : 'Nicht verfügbar'; ?>
                            </div>
                            <?php if ($row['GesamtBestand'] > 0) : ?>
                                <form action="php/warenkorb.php" method="post" class="add-to-cart-form">
                                    <input type="hidden" name="action" value="add">
                                    <input type="hidden" name="product_id" value="<?php echo $row['Produkt_ID']; ?>">
                                    <button type="submit" class="add-to-cart">In den Warenkorb</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="no-products">Keine Produkte verfügbar.</div>';
            }
            ?>
        </div>
    </div>
    <script src="scripts/skripte.js"></script>
</body>
</html>
