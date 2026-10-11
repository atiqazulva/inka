<?php
// ===== BAGIAN PHP (penjaga pencatat anggota baru) =====
session_start();
require 'config/db.php';

if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$errors = ['name' => '', 'email' => '', 'password' => '', 'sector' => ''];
$name = '';
$email = '';
$sector = '';

$sectors = [
    'kuliner'   => 'Kuliner',
    'fashion'   => 'Fashion',
    'kriya'     => 'Kriya',
    'desain'    => 'Desain',
    'fotografi' => 'Fotografi',
    'musik'     => 'Musik',
    'lainnya'   => 'Lainnya',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $sector = $_POST['sector'] ?? '';

    // Cek isian (sama seperti di JS, tapi ini versi penjaga yang tidak bisa dilewati)
    if (strlen($name) < 3) {
        $errors['name'] = 'Nama minimal 3 karakter.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Format e-mail belum benar, contoh: nama@email.com.';
    }
    if (strlen($password) < 8) {
        $errors['password'] = 'Kata sandi minimal 8 karakter.';
    }
    if (!array_key_exists($sector, $sectors)) {
        $errors['sector'] = 'Pilih salah satu industri kreatif.';
    }

    // Kalau isian sudah benar, cek apakah email sudah pernah dipakai
    if (!array_filter($errors)) {
        $cek = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $cek->execute([$email]);

        if ($cek->fetch()) {
            $errors['email'] = 'Email sudah terdaftar.';
        } else {
            // Catat anggota baru, sandi diacak dulu
            $pdo->prepare('INSERT INTO users (name, email, password, sector) VALUES (?, ?, ?, ?)')
                ->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT), $sector]);

            header('Location: login.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar – Platform Media Pembelajaran</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="register.css" />
</head>
<body>
  <main class="page">
    <!-- Brand Identity -->
    <header class="brand">
      <img class="brand__lamp" src="public/logo-inka.png" alt="" width="65" height="85" />
      <h1 class="brand__title">Selamat Datang Kembali</h1>
      <p class="brand__tagline">Platform Media Pembelajaran lengkap, UMKM Sejahtera.</p>
    </header>

    <!-- Registration Form Card -->
    <section class="card" aria-labelledby="form-title">
      <h2 id="form-title" class="visually-hidden">Form pendaftaran</h2>

      <form id="registerForm" class="form" method="POST" action="register.php" novalidate>
        <!-- Nama Lengkap -->
        <div class="field">
          <div class="field__control">
            <img class="field__icon" src="public/profil.png" alt="" width="16" height="16" />
            <label class="visually-hidden" for="name">Nama Lengkap</label>
            <input class="field__input" type="text" id="name" name="name"
                   value="<?= htmlspecialchars($name) ?>"
                   placeholder="Nama Lengkap" autocomplete="name"
                   <?= $errors['name'] ? 'aria-invalid="true"' : '' ?> required />
          </div>
          <p class="field__error" id="nameError" role="alert"><?= htmlspecialchars($errors['name']) ?></p>
        </div>

        <!-- E-mail -->
        <div class="field">
          <div class="field__control">
            <img class="field__icon" src="public/email.png" alt="" width="20" height="16" />
            <label class="visually-hidden" for="email">E-mail</label>
            <input class="field__input" type="email" id="email" name="email"
                   value="<?= htmlspecialchars($email) ?>"
                   placeholder="E-mail" autocomplete="email"
                   <?= $errors['email'] ? 'aria-invalid="true"' : '' ?> required />
          </div>
          <p class="field__error" id="emailError" role="alert"><?= htmlspecialchars($errors['email']) ?></p>
        </div>

        <!-- Kata Sandi -->
        <div class="field">
          <div class="field__control">
            <img class="field__icon" src="public/kunci.png" alt="" width="16" height="21" />
            <label class="visually-hidden" for="password">Buat Kata Sandi</label>
            <input class="field__input" type="password" id="password" name="password"
                   placeholder="Buat Kata Sandi" autocomplete="new-password"
                   <?= $errors['password'] ? 'aria-invalid="true"' : '' ?> required />
          </div>
          <p class="field__error" id="passwordError" role="alert"><?= htmlspecialchars($errors['password']) ?></p>
        </div>

        <!-- Dropdown -->
        <div class="field">
          <div class="field__control">
            <img class="field__icon" src="public/kategori.png" alt="" width="19" height="20" />
            <label class="visually-hidden" for="sector">Industri Kreatif</label>
            <select class="field__input field__select" id="sector" name="sector"
                    <?= $errors['sector'] ? 'aria-invalid="true"' : '' ?> required>
              <option value="" <?= $sector === '' ? 'selected' : '' ?>>Industri Kreatif</option>
              <?php foreach ($sectors as $value => $label): ?>
                <option value="<?= $value ?>" <?= $sector === $value ? 'selected' : '' ?>><?= $label ?></option>
              <?php endforeach; ?>
            </select>
            <img class="field__chevron" src="public/dropdown.png" alt="" width="18" height="12" />
          </div>
          <p class="field__error" id="sectorError" role="alert"><?= htmlspecialchars($errors['sector']) ?></p>
        </div>

        <!-- CTA -->
        <button class="btn-cta" type="submit">
          <span>Buat Akun</span>
          <img src="public/panah.png" alt="" width="12" height="12" />
        </button>
      </form>
    </section>

    <!-- Footer -->
    <p class="signin">
      Sudah punya akun?
      <a href="login.php" id="signinLink">Masuk</a>
    </p>
  </main>

  <div class="bottom-bar" aria-hidden="true"></div>

  <script src="register.js"></script>
</body>
</html>