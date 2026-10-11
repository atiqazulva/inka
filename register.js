"use strict";

const form = document.getElementById("registerForm");

const fields = {
  name: {
    input: document.getElementById("name"),
    error: document.getElementById("nameError"),
    validate(value) {
      if (!value.trim()) return "Nama lengkap wajib diisi.";
      if (value.trim().length < 3) return "Nama minimal 3 karakter.";
      return "";
    },
  },
  email: {
    input: document.getElementById("email"),
    error: document.getElementById("emailError"),
    validate(value) {
      if (!value.trim()) return "E-mail wajib diisi.";
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value.trim())) {
        return "Format e-mail belum benar, contoh: nama@email.com.";
      }
      return "";
    },
  },
  password: {
    input: document.getElementById("password"),
    error: document.getElementById("passwordError"),
    validate(value) {
      if (!value) return "Kata sandi wajib diisi.";
      if (value.length < 8) return "Kata sandi minimal 8 karakter.";
      return "";
    },
  },
  sector: {
    input: document.getElementById("sector"),
    error: document.getElementById("sectorError"),
    validate(value) {
      return value ? "" : "Pilih salah satu industri kreatif.";
    },
  },
};

function check(field) {
  const message = field.validate(field.input.value);
  field.error.textContent = message;
  if (message) {
    field.input.setAttribute("aria-invalid", "true");
  } else {
    field.input.removeAttribute("aria-invalid");
  }
  return !message;
}

Object.values(fields).forEach((field) => {
  field.input.addEventListener("blur", () => check(field));
  const live = () => field.input.hasAttribute("aria-invalid") && check(field);
  field.input.addEventListener("input", live);
  field.input.addEventListener("change", live);
});

form.addEventListener("submit", (event) => {
  let firstInvalid = null;
  Object.values(fields).forEach((field) => {
    if (!check(field) && !firstInvalid) firstInvalid = field.input;
  });

  // Kalau ada isian yang salah, batalkan pengiriman ke PHP
  if (firstInvalid) {
    event.preventDefault();
    firstInvalid.focus();
    return;
  }

  // Isian benar: biarkan form terkirim ke register.php
  const submitBtn = form.querySelector('button[type="submit"]');
  submitBtn.querySelector("span").textContent = "Memproses...";
  submitBtn.disabled = true;
});