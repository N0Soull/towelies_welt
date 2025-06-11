// Product Popup Functionality
document.addEventListener('DOMContentLoaded', function() {
    const productCards = document.querySelectorAll('.product-card');
    const popup = document.getElementById('productPopup');
    const popupClose = document.querySelector('.popup-close');
    const popupImage = document.getElementById('popupImage');
    const popupTitle = document.getElementById('popupTitle');
    const popupType = document.getElementById('popupType');
    const popupPrice = document.getElementById('popupPrice');
    const popupStock = document.getElementById('popupStock');
    const popupDescription = document.getElementById('popupDescription');
    const popupProductId = document.getElementById('popupProductId');
    const popupAddToCart = document.getElementById('popupAddToCart');
    const popupCartForm = document.getElementById('popupCartForm');

    // Add click event to each product card
    productCards.forEach(card => {
        card.addEventListener('click', function() {
            openProductPopup(this);
        });
        
        // Add hover effect for better UX
        card.style.cursor = 'pointer';
    });

    // Close popup events
    popupClose.addEventListener('click', closePopup);
    popup.addEventListener('click', function(e) {
        if (e.target === popup) {
            closePopup();
        }
    });

    // Close popup with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && popup.classList.contains('active')) {
            closePopup();
        }
    });

    function openProductPopup(productCard) {
        // Get product data from data attributes
        const productId = productCard.dataset.productId;
        const productName = productCard.dataset.productName;
        const productType = productCard.dataset.productType;
        const productPrice = parseFloat(productCard.dataset.productPrice);
        const productStock = parseInt(productCard.dataset.productStock);
        const productImage = productCard.dataset.productImage;

        // Populate popup with product data
        popupImage.src = productImage;
        popupImage.alt = productName;
        popupTitle.textContent = productName;
        popupType.textContent = productType;
        popupPrice.textContent = '€' + productPrice.toLocaleString('de-DE', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        
        // Set stock status
        popupStock.textContent = productStock > 10 ? 'Niederig Auf lager' : 'Nicht verfügbar';
        popupStock.className = 'popup-stock ' + (productStock > 0 ? 'in-stock' : 'out-of-stock');
        
        // Set product ID for the form
        popupProductId.value = productId;
        
        // Show/hide add to cart button based on stock
        if (productStock > 0) {
            popupAddToCart.style.display = 'block';
            popupCartForm.style.display = 'block';
        } else {
            popupAddToCart.style.display = 'none';
            popupCartForm.style.display = 'none';
        }

        // Here you can add specific product descriptions based on product ID or name
        // This is where you'll add your custom product descriptions
        setProductDescription(productId, productName);

        // Show popup
        popup.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closePopup() {
        popup.classList.remove('active');
        document.body.style.overflow = ''; // Restore scrolling
    }

    function setProductDescription(productId, productName) {
        // Placeholder function - you can customize this based on your needs
        // Example of how you could set descriptions:
        
        let description = "Hier kommt die detaillierte Produktbeschreibung. Sie können diese Funktion anpassen, um spezifische Beschreibungen für jedes Produkt hinzuzufügen.";
        
        // Example: Set different descriptions based on product ID
        switch(productId) {
            case '1':
                description = "Mit 85% Sativa und 15% Indica ist Purple haze eine sorte die die Müdigkeit lindert und glücksgefühle auslößt. Sie wird in der medizin auch gegen Chronische Schmerzen verwendet.";
                break;
            case '2':
                description = "Mit 60% Sativa und 40% Indica hat Lemon haze eine energetisierende Wirkung. Es ist ideal für kreative Aktivitäten am Tag ";

            case '3':
                description = "Mit 80% Sativa und 20% Indica ist Amnesia Haze Eine sorte dir ein Lächeln auf das Gesicht Zaubert.In der Medizin wird Amnesia Haze auch für die Behandlung von Depressionen oder posttraumatischen Belastungsstörungen benutzt.";
                            
            break;

                
        }
        
        popupDescription.textContent = description;
    }
});