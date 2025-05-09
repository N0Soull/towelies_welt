// Popups
const loginPopup = document.getElementById('loginPopup');
const registerPopup = document.getElementById('registerPopup');

// Buttons
document.getElementById('loginBtn').onclick = () => loginPopup.style.display = 'block';
document.getElementById('closeLoginBtn').onclick = () => loginPopup.style.display = 'none';
document.getElementById('closeRegisterBtn').onclick = () => registerPopup.style.display = 'none';

// Wechsel Login <-> Registrierung
document.getElementById('toRegister').onclick = (e) => {
  e.preventDefault();
  loginPopup.style.display = 'none';
  registerPopup.style.display = 'block';
};

document.getElementById('toLogin').onclick = (e) => {
  e.preventDefault();
  registerPopup.style.display = 'none';
  loginPopup.style.display = 'block';
};

// Passwort zeigen/ausblenden
function togglePasswordVisibility(inputId, toggleId) {
  const input = document.getElementById(inputId);
  const toggle = document.getElementById(toggleId);
  toggle.addEventListener('click', () => {
    input.type = input.type === 'password' ? 'text' : 'password';
  });
}

togglePasswordVisibility('loginPassword', 'toggleLoginPassword');
togglePasswordVisibility('regPass', 'toggleRegisterPassword');

// Klick außerhalb schließt Popup
window.onclick = (e) => {
  if (e.target === loginPopup) loginPopup.style.display = 'none';
  if (e.target === registerPopup) registerPopup.style.display = 'none';
};
