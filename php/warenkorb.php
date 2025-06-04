<?php
session_start();

// Warenkorb initialisieren wenn noch nicht vorhanden
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Funktion zum Hinzufügen eines Produkts
function addToCart($productId, $conn) {
    $stmt = $conn->prepare("SELECT Produkt_ID, Name, Preis, GesamtBestand FROM produkt WHERE Produkt_ID = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($product = $result->fetch_assoc()) {
        if ($product['GesamtBestand'] > 0) {
            // Prüfen ob Produkt bereits im Warenkorb
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity']++;
            } else {
                $_SESSION['cart'][$productId] = array(
                    'id' => $product['Produkt_ID'],
                    'name' => $product['Name'],
                    'price' => $product['Preis'],
                    'quantity' => 1
                );
            }
            return true;
        }
    }
    return false;
}

// Funktion zum Entfernen eines Produkts
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
        return true;
    }
    return false;
}

// Funktion zum Aktualisieren der Menge
function updateQuantity($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        if ($quantity > 0) {
            $_SESSION['cart'][$productId]['quantity'] = $quantity;
        } else {
            unset($_SESSION['cart'][$productId]);
        }
        return true;
    }
    return false;
}

// Funktion zum Leeren des Warenkorbs
function clearCart() {
    $_SESSION['cart'] = array();
}

// Funktion zum Berechnen der Gesamtsumme
function getCartTotal() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    return $total;
}

// Handler für POST Requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'datenbank.php';
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                if (isset($_POST['product_id'])) {
                    if (addToCart($_POST['product_id'], $conn)) {
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    }
                }
                break;
                
            case 'remove':
                if (isset($_POST['product_id'])) {
                    removeFromCart($_POST['product_id']);
                }
                break;
                
            case 'update':
                if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
                    updateQuantity($_POST['product_id'], $_POST['quantity']);
                }
                break;
                
            case 'clear':
                clearCart();
                break;
        }
    }
    
    // Zurück zur vorherigen Seite
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>