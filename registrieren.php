<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Login & Registrierung</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

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

       <!-- <label for="regPass">Passwort</label>
        <div class="password-wrapper">
          <input type="password" name="regPass" placeholder="Passwort einrichten" required>
          <span id="toggleRegisterPassword"></span>
        </div>

        <p class="password-info">
          Das Passwort sollte mindestens: 8 Zeichen lang sein, 1 Großbuchstabe, 1 Kleinbuchstabe und 1 Sonderzeichen enthalten.
        </p>
-->
        <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a href="#">Datenschutzrichtlinie</a></label>
        <label><input type="checkbox" required> Ich habe gelesen und akzeptiere <a href="#">Geschäftsbedingungen</a></label>

         <input type="submit" name = "Abschicken" value = "Abschicken">
      </form>
    </div>
  </div>

  <script src="btn.js"></script>
</body>
</html>
