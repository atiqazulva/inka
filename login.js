"use strict";

const form = document.getElementById("loginForm");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");
const googleBtn = document.getElementById("googleBtn");
const forgotLink = document.getElementById("forgotLink");

const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function setError(input, errorEl, message) {
  errorEl.textContent = message;
  if (message) {
    input.setAttribute("aria-invalid", "true");
  } else {
    input.removeAttribute("aria-invalid");
  }
}

function validateEmail() {
  const value = emailInput.value.trim();
  if (!value) {
    setError(emailInput, emailError, "Email wajib diisi.");
    return false;
  }
  if (!EMAIL_PATTERN.test(value)) {
    setError(emailInput, emailError, "Format email belum benar, contoh: nama@email.com.");
    return false;
  }
  setError(emailInput, emailError, "");
  return true;
}

function validatePassword() {
  const value = passwordInput.value;
  if (!value) {
    setError(passwordInput, passwordError, "Kata sandi wajib diisi.");
    return false;
  }
  if (value.length < 8) {
    setError(passwordInput, passwordError, "Kata sandi minimal 8 karakter.");
    return false;
  }
  setError(passwordInput, passwordError, "");
  return true;
}

emailInput.addEventListener("blur", validateEmail);
passwordInput.addEventListener("blur", validatePassword);
emailInput.addEventListener("input", () => emailInput.hasAttribute("aria-invalid") && validateEmail());
passwordInput.addEventListener("input", () => passwordInput.hasAttribute("aria-invalid") && validatePassword());

form.addEventListener("submit", (event) => {
  const emailOk = validateEmail();
  const passwordOk = validatePassword();

  // Kalau isian belum benar, batalkan pengiriman ke PHP
  if (!emailOk || !passwordOk) {
    event.preventDefault();
    (emailOk ? passwordInput : emailInput).focus();
    return;
  }

  // Isian benar: biarkan form terkirim ke login.php.
  // Tombol dinonaktifkan supaya tidak diklik dua kali.
  const submitBtn = form.querySelector('button[type="submit"]');
  submitBtn.disabled = true;
  submitBtn.textContent = "Memproses...";
});

// Tombol Google berupa link: isi href dengan URL tujuan.
// Selama href masih "#", klik diabaikan.
googleBtn.addEventListener("click", (event) => {
  if (googleBtn.getAttribute("href") === "#") {
    event.preventDefault();
  }
});

forgotLink.addEventListener("click", (event) => {
  event.preventDefault();
  // window.location.href = "lupa-sandi.php";
});