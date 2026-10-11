<?php
// Cek "gelang" (session). Kalau tidak punya, kembali ke login.
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INKA</title>
  <!-- style.css dan script.js belum ada, jadi link-nya dihapus dulu -->
</head>
<body>

  <header>
    <h1>INKA Dashboard</h1>
    <nav>
      <ul>
        <li><a href="#dashboard">Dashboard</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="logout.php">Keluar</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="dashboard">
      <h2>Halo, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
      <p>Ini deskripsi inka isinya nanti dulu.</p>
    </section>
  </main>

  <footer>
    <p>&copy; 2026 Kelompok 03 PEMWEB. All rights reserved.</p>
  </footer>

</body>
</html>