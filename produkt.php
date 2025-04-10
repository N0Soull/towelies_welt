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
    <div class="container">
        <h1 class="page-title">Unsere Produkte</h1>
        
        <div class="product-grid">
            <?php
            $query = "SELECT * FROM Produkt";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="bilder/<?php echo htmlspecialchars($row['BildURL'] ?? 'default.jpg'); ?>" 
                                 alt="<?php echo htmlspecialchars($row['Name']); ?>">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><?php echo htmlspecialchars($row['Name']); ?></h3>
                            <span class="product-type"><?php echo htmlspecialchars($row['Typ']); ?></span>
                            <div class="product-price">€<?php echo number_format($row['Preis'], 2, ',', '.'); ?></div>
                            <div class="product-stock <?php echo $row['Bestand'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                                <?php echo $row['Bestand'] > 0 ? 'Auf Lager: ' . $row['Bestand'] : 'Nicht verfügbar'; ?>
                            </div>
                            <?php if ($row['Bestand'] > 0) : ?>
                                <button class="add-to-cart" onclick="addToCart(<?php echo $row['ProduktID']; ?>)">
                                    In den Warenkorb
                                </button>
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
