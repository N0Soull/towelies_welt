<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towelies Welt</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Towelies Welt</h1>
        <nav>
            <ul class="nav-left">
                <li><a href="index.php">Home</a></li>
                <li><a href="produkt.php">Products</a></li>
            </ul>
            <ul class="nav-right">
                <li>
                <a rel="Warenkorb" href="warenkorb.php">
                    <img src="https://cdn-icons-png.flaticon.com/512/1170/1170678.png" alt="Cart Icon" width="22" height="22">
                </a>
                </li>
                <li>
               <li>
                    <a href="#" id="loginBtn">
                        <img src="Bilder/Profile.png" alt="Login Icon" width="22" height="22">
                        
                    </a>
                </li>
                </a>
                </li>

            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h2>Wilkomen zu Towelies welt</h2>
            <p>platzhalter für später idk</p>
            <a href="produkt.php" class="btn">artikeln anschauen</a>
        </section>
        


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
                    <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a href="#">Datenschutzrichtlinie</a></label>
                    <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a href="#">Geschäftsbedingungen</a></label>
                </div>

                <button type="submit" class="login-button">Registrieren</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Towelies Welt. Alle Rechte vorbehalten.</p>
    </footer>
    
    <script src="scripts/btn.js"></script>
</body>
</html>