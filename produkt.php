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
<body class="bg-color">
    <?php include 'header.php';  ?>
    <div class="container">
        <h1 class="page-title">Unsere Produkte</h1>
        
        <div class="product-grid">
            <?php
            $query = "SELECT * FROM produkt";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $imagePath = "Bilder/" . strtolower(str_replace(' ', '-', htmlspecialchars($row['Name']))) . '.jpg';
                    ?>
                    <div class="product-card" 
                         data-product-id="<?php echo $row['Produkt_ID']; ?>"
                         data-product-name="<?php echo htmlspecialchars($row['Name']); ?>"
                         data-product-type="<?php echo htmlspecialchars($row['Typ']); ?>"
                         data-product-price="<?php echo $row['Preis']; ?>"
                         data-product-stock="<?php echo $row['GesamtBestand']; ?>"
                         data-product-image="<?php echo $imagePath; ?>">
                        
                        <div class="product-image">
                            <img src="<?php echo $imagePath; ?>"
                                alt="<?php echo htmlspecialchars($row['Name']); ?>">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><?php echo htmlspecialchars($row['Name']); ?></h3>
                            <span class="product-type"><?php echo htmlspecialchars($row['Typ']); ?></span>
                            <div class="product-price">€<?php echo number_format($row['Preis'], 2, ',', '.'); ?></div>
                            <div class="product-stock <?php echo $row['GesamtBestand'] > 0 ? 'in-stock' : 'out-of-stock'; ?>">
                            <?php echo $row['GesamtBestand'] > 10 ? 'Niederig Auf lager'  : 'Nicht verfügbar'; ?>
                            </div>
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

    <!-- Product Popup Modal -->
    <div id="productPopup" class="popup-overlay">
        <div class="popup-content">
            <span class="popup-close">&times;</span>
            <div class="popup-body">
                <div class="popup-image">
                    <img id="popupImage" src="" alt="">
                </div>
                <div class="popup-info">
                    <h2 id="popupTitle"></h2>
                    <span id="popupType" class="popup-type"></span>
                    <div id="popupPrice" class="popup-price"></div>
                    <div id="popupStock" class="popup-stock"></div>
                    
                    <!-- Placeholder for product description -->
                    <div class="popup-description">
                        <h3>Produktbeschreibung</h3>
                        <p id="popupDescription">
                            <!-- Your product description will go here -->
                        </p>
                    </div>
                    
                    <form id="popupCartForm" action="php/warenkorb.php" method="post" class="popup-cart-form">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" id="popupProductId" name="product_id" value="">
                        <button type="submit" id="popupAddToCart" class="popup-add-to-cart">In den Warenkorb</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts/skripte.js"></script>
</body>
</html>