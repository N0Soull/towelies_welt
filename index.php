<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towelies Welt</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #EDE9DD;">
    <?php include 'header.php'; ?>

    <main style="position: relative; width: 100%; height: 50%; background-color: ; " >
        <div id="Willkommen">
            <h1 style="color = #3A5A40">Willkommen bei Towelies Welt</h1>
        </div>

        <h1 class="about">Über uns</h1>
        <div class="about-content Willkomen-box">
            <p>Willkommen bei Towelis Welt, deinem Spezialisten für hochwertige Cannabisprodukte!
                Wir bieten dir eine sorgfältig ausgewählte Vielfalt an Cannabis-Samen, Ölen und mehr. Qualität und
                Nachhaltigkeit stehen bei uns an erster Stelle, damit du immer das Beste aus der Natur genießen kannst.
                Erlebe die Welt von Cannabis neu – vertrauensvoll, legal und mit Herz.</p>
        </div>

    
            <div style="position: absolute; height: 100 %; width: 100%; top: 0; z-index: -1; background-color:; " >
                hello
            </div>

        <div id="Warum-uns"> 
            <h1>
                Warum uns? 
            </h1>
            <div class="warum-uns-box">
                <p>Wir stehen für Qualität, Vertrauen und Nachhaltigkeit. 
                Bei Towelies Welt erhältst du ausschließlich sorgfältig ausgewählte Produkte, 
                die höchsten Standards entsprechen. Unser engagiertes Team berät dich kompetent und persönlich, 
                damit du genau das findest, was zu dir passt. Wir legen Wert auf Transparenz, 
                faire Preise und einen verantwortungsvollen Umgang mit der Natur – 
                für ein sicheres und angenehmes Einkaufserlebnis.</p>
            </div>

            <h2 class="Best-of-all">Best off all</h2>
            <div class="product-grid">
                <div class="product-item-1">
                    <img src="images/cannabis-seeds.jpg" alt="Cannabis Seeds" class="best-of-all-img">
                    <h3>white widow</h3>
                    <p></p>
                </div>
                  
            
        
        
                   
                   

    
       
    </main>




    <!-- Login Popup -->
    <div id="loginPopup" class="popup">
        <div class="popup-box">
            <span class="close-btn" id="closeLoginBtn">&times;</span>
            <h2>Log in</h2>
            <p>Du hast noch kein Konto? <a href="#" id="toRegister">Registrieren</a></p>
            <form action="php/EinLogin.php" method="post">
                <label for="loginEmail">Email</label>
                <input type="email" id="loginEmail" name="loginEmail" placeholder="eg. example@email.com" required>

                <label for="loginPassword">Passwort</label>
                <div class="password-wrapper">
                    <input type="password" id="loginPassword" name="loginPassword" placeholder="Passwort" required>
                    <span id="toggleLoginPassword">👁️</span>
                </div>

                <button type="submit" class="login-button">Log in</button>
            </form>
        </div>
    </div>

    <!-- Register Popup -->
    <div id="registerPopup" class="popup">
        <div class="popup-box">
            <span class="close-btn" id="closeRegisterBtn">&times;</span>
            <h2>Registrieren</h2>
            <p>Hast Du bereits ein Konto? <a href="#" id="toLogin">Log in</a></p>

            <form action="php/EinLogin.php" method="post">
                <div class="form-row">
                    <div>
                        <label for="vorname">Vorname</label>
                        <input type="text" name="vorname" placeholder="eg. Monica" required>
                    </div>
                    <div>
                        <label for="nachname">Nachname</label>
                        <input type="text" name="nachname" placeholder="eg. Geller" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="regEmail">Email</label>
                    <input type="email" name="regEmail" placeholder="eg. monicageller@gmail.com" required>
                </div>

                <div class="form-row">
                    <div>
                        <label for="geburtstag">Geburtstag</label>
                        <input type="date" name="geburtstag" required>
                    </div>
                    <div>
                        <label for="handy">Handynummer</label>
                        <div class="tel-wrapper">
                            <input type="tel" name="handy" placeholder="+495123456789" required>
                        </div>
                    </div>
                </div>

                <div class="checkbox-group">
                    <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a
                            href="#">Datenschutzrichtlinie</a></label>
                    <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a
                            href="#">Geschäftsbedingungen</a></label>
                </div>

                <button type="submit" class="login-button">Registrieren</button>
            </form>
        </div>
    </div>

    <script src="scripts/btn.js"></script>
</body>

</html>