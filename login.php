<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Login & Registrierung</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <button id="loginBtn">Login</button>

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

      <form action = "KundenDaten.php" method = "post">
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

        <label for="regEmail">Email</label>
        <input type="email" name="regEmail" placeholder="eg. monicageller@gmail.com" required>

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

        <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a href="#">Datenschutzrichtlinie</a></label>
        <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a href="#">Geschäftsbedingungen</a></label>

         <input type="submit" name = "Abschicken" value = "Abschicken">
      </form>
    </div>
  </div>

  <script src="scripts/btn.js"></script>
</body>
</html>
