"use strict";

const form = document.getElementById("loginForm");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");
const googleBtn = document.getElementById("googleBtn");
const forgotLink = document.getElementById("forgotLink");
const signupLink = document.getElementById("signupLink");

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

form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const emailOk = validateEmail();
  const passwordOk = validatePassword();
  if (!emailOk || !passwordOk) {
    (emailOk ? passwordInput : emailInput).focus();
    return;
  }

  const submitBtn = form.querySelector('button[type="submit"]');
  submitBtn.disabled = true;
  submitBtn.textContent = "Memproses...";

  try {
    // TODO: ganti dengan request ke backend, misalnya:
    // const res = await fetch("/api/login", {
    //   method: "POST",
    //   headers: { "Content-Type": "application/json" },
    //   body: JSON.stringify({ email: emailInput.value.trim(), password: passwordInput.value }),
    // });
    // if (!res.ok) throw new Error("Email atau kata sandi salah.");
    await new Promise((resolve) => setTimeout(resolve, 800)); // simulasi
    console.log("Login berhasil untuk:", emailInput.value.trim());
    // window.location.href = "dashboard.html";
  } catch (err) {
    setError(passwordInput, passwordError, err.message || "Terjadi kesalahan, coba lagi.");
  } finally {
    submitBtn.disabled = false;
    submitBtn.textContent = "Masuk";
  }
});

// Tombol Google berupa link: isi href di index.html dengan URL tujuan.
// Selama href masih "#", klik diabaikan.
googleBtn.addEventListener("click", (event) => {
  if (googleBtn.getAttribute("href") === "#") {
    event.preventDefault();
  }
});

forgotLink.addEventListener("click", (event) => {
  event.preventDefault();
  // window.location.href = "lupa-sandi.html";
});

signupLink.addEventListener("click", (event) => {
  event.preventDefault();
  // window.location.href = "daftar.html";
});