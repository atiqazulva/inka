<?php
// ===== BAGIAN PHP (penjaga) =====
session_start();
require 'config/db.php';

// Kalau sudah punya "gelang" (session), langsung ke dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Cari email di buku daftar
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cocokkan sandi (yang tersimpan sudah diacak)
    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Email atau kata sandi salah.';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Masuk – Platform Media Pembelajaran</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <main class="page">
    <!-- Brand Identity -->
    <header class="brand">
      <img class="brand__lamp" src="public/logo-inka.png" alt="" width="65" height="85" />
      <h1 class="brand__title">Selamat Datang Kembali</h1>
      <p class="brand__tagline">Platform Media Pembelajaran lengkap, UMKM Sejahtera.</p>
    </header>

    <!-- Login Form Card -->
    <section class="card" aria-labelledby="form-title">
      <h2 id="form-title" class="visually-hidden">Form masuk</h2>

      <form id="loginForm" class="form" method="POST" action="login.php" novalidate>
        <!-- Email -->
        <div class="field">
          <label class="field__label" for="email">Email</label>
          <div class="field__control">
            <img class="field__icon" src="public/email.png" alt="" width="20" height="16" />
            <input
              class="field__input"
              type="email"
              id="email"
              name="email"
              value="<?= htmlspecialchars($email) ?>"
              placeholder="nama@email.com"
              autocomplete="email"
              required
            />
          </div>
          <p class="field__error" id="emailError" role="alert"></p>
        </div>

        <!-- Kata Sandi -->
        <div class="field">
          <div class="field__row">
            <label class="field__label" for="password">Kata Sandi</label>
            <a class="field__link" href="#" id="forgotLink">Lupa Kata Sandi?</a>
          </div>
          <div class="field__control">
            <img class="field__icon field__icon--lock" src="public/kunci.png" alt="" width="16" height="21" />
            <input
              class="field__input"
              type="password"
              id="password"
              name="password"
              placeholder="••••••••"
              autocomplete="current-password"
              <?= $error ? 'aria-invalid="true"' : '' ?>
              required
            />
          </div>
          <!-- Pesan error dari PHP muncul di sini -->
          <p class="field__error" id="passwordError" role="alert"><?= htmlspecialchars($error) ?></p>
        </div>

        <!-- Button - Sign In CTA -->
        <button class="btn btn--primary" type="submit">Masuk</button>

        <!-- Divider -->
        <div class="divider"><span>Atau</span></div>

        <!-- Button - Social Login -->
        <a class="btn btn--social" href="#" id="googleBtn">
          <img src="public/google1.png" alt="logo-google" width="20" height="20" />
          <span>Lanjutkan dengan Google</span>
        </a>
      </form>
    </section>

    <!-- Footer -->
    <p class="signup">
      Belum punya akun?
      <a href="register.php" id="signupLink">Daftar</a>
    </p>
  </main>

  <div class="bottom-bar" aria-hidden="true"></div>

  <script src="login.js"></script>
</body>
</html>