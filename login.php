<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Login & Registrierung</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>

  <button id="loginBtn">Login</button>
  
   <!-- Login Popup -->
   <div id="loginPopup" class="popup">
    <div class="popup-box">
      <span class="close-btn" id="closeLoginBtn">&times;</span>
      <h2>Log in</h2>
      <p>Du hast noch kein Konto? <a href="#" id="toRegister">Registrieren</a></p>
      <form>
        <label for="loginEmail">Email</label>
        <input type="email" id="loginEmail" placeholder="eg. example@email.com" required>

      <!-- <label for="loginPassword">Passwort</label>
        <div class="password-wrapper">
          <input type="password" id="loginPassword" placeholder="Passwort" required>
          <span id="toggleLoginPassword"></span>
        </div>
        -->
        <button type="submit" class="login-button">Log in</button>
      </form>
      
    </div>
  </div>
