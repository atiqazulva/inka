<?php
/**
 * Inka - Platform Media Pembelajaran UMKM Indonesia
 * Single-file PHP application controller
 */
$page = isset($_GET['page']) ? trim($_GET['page']) : 'home';

// Subpage content definitions
$subpages = [
    'hpp' => [
        'badge' => 'Fitur Finansial',
        'title' => 'Hitung HPP (Harga Pokok Penjualan)',
        'desc'  => 'Kalkulator interaktif untuk menghitung modal produksi, biaya operasional, dan menentukan margin profit ideal untuk produk UMKM Anda.'
    ],
    'ai-mentor' => [
        'badge' => 'Konsultasi Cerdas',
        'title' => 'AI Mentor Bisnis',
        'desc'  => 'Dapatkan saran, strategi pemasaran, dan bimbingan bisnis langsung dari asisten kecerdasan buatan terlatih khusus untuk UMKM Indonesia.'
    ],
    'haki' => [
        'badge' => 'Perlindungan Hukum',
        'title' => 'Pelajari Hak Kekayaan Intelektual (HAKI)',
        'desc'  => 'Panduan langkah demi langkah untuk mendaftarkan merek, hak cipta, desain industri, dan paten guna mengamankan aset bisnis Anda.'
    ],
    'rate-card' => [
        'badge' => 'Standarisasi Harga',
        'title' => 'Cek Rate Card Jasa & Layanan',
        'desc'  => 'Bandingkan standar tarif pasar untuk berbagai jasa industri kreatif, fotografi, desain grafis, dan jasa profesional lainnya.'
    ],
    'pembelajaran' => [
        'badge' => 'Kurikulum UMKM',
        'title' => 'Modul Kewirausahaan Terpadu',
        'desc'  => 'Akses seluruh materi pembelajaran bisnis, mulai dari fondasi perlindungan bisnis, manajemen operasional, hingga strategi ekspansi pasar digital.'
    ],
    'berita' => [
        'badge' => 'Informasi Terkini',
        'title' => 'Berita & Jadwal Webinar',
        'desc'  => 'Temukan jadwal seminar, masterclass, dan berita terbaru seputar ekosistem usaha mikro, kecil, dan menengah di Indonesia.'
    ]
];

$current_subpage = isset($subpages[$page]) ? $subpages[$page] : null;
$page_title = $current_subpage ? $current_subpage['title'] . ' - Inka' : 'Inka - Media Pembelajaran UMKM Indonesia';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <!-- ================= HEADER / NAVBAR ================= -->
  <header class="site-header">
    <div class="container navbar-container">
      <a href="index.php" class="brand-logo">
        <div class="brand-icon">
          <!-- Inka Bulb Logo SVG -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 38" fill="none">
            <path d="M16 2C9.37 2 4 7.37 4 14C4 18.2 6.16 21.9 9.5 24.1V27C9.5 27.8 10.2 28.5 11 28.5H21C21.8 28.5 22.5 27.8 22.5 27V24.1C25.84 21.9 28 18.2 28 14C28 7.37 22.63 2 16 2Z" stroke="#B8D055" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 6.5C12.4 6.5 9.5 9.4 9.5 13C9.5 15.6 11 17.8 13.2 19V24H18.8V19C21 17.8 22.5 15.6 22.5 13C22.5 9.4 19.6 6.5 16 6.5Z" stroke="#E5B232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 9V17" stroke="#E5B232" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M13 13H19" stroke="#E5B232" stroke-width="1.8" stroke-linecap="round"/>
            <path d="M12 31.5H20" stroke="#B8D055" stroke-width="2" stroke-linecap="round"/>
            <path d="M13.5 34.5H18.5" stroke="#B8D055" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </div>
        <span class="brand-text">Inka</span>
      </a>

      <div class="navbar-actions">
        <a href="index.php?page=pembelajaran" class="btn-nav-daftar">Daftar</a>
        <a href="index.php?page=pembelajaran" class="btn-nav-masuk">Masuk</a>
      </div>
    </div>
  </header>

  <!-- ================= MAIN CONTENT ================= -->
  <main class="main-wrapper">
    <div class="container">

    <?php if ($current_subpage): ?>
      <!-- SUBPAGE VIEW -->
      <section class="subpage-card">
        <span class="subpage-badge"><?php echo htmlspecialchars($current_subpage['badge']); ?></span>
        <h1 class="subpage-title"><?php echo htmlspecialchars($current_subpage['title']); ?></h1>
        <p class="subpage-desc"><?php echo htmlspecialchars($current_subpage['desc']); ?></p>
        <a href="index.php" class="btn-back-home">&larr; Kembali ke Beranda</a>
      </section>

    <?php else: ?>
      <!-- HOMEPAGE (EXACT SCREENSHOT LAYOUT) -->

      <!-- 1. HERO BANNER -->
      <section class="hero-card">
        <div class="hero-overlay"></div>
        <div class="hero-content">
          <h1 class="hero-title">
            Platform Media Pembelajaran lengkap,<br>
            UMKM Sejahtera.
          </h1>
          <a href="index.php?page=pembelajaran" class="btn-hero">
            Jelajahi Inka &rarr;
          </a>
        </div>
      </section>

      <!-- 2. MENU FITUR 2x2 -->
      <section class="feature-grid">
        <!-- Row 1: Hitung HPP (Brown) -->
        <a href="index.php?page=hpp" class="feature-card feature-card-brown">
          <div class="feature-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
              <line x1="3" y1="9" x2="21" y2="9"/>
              <line x1="9" y1="21" x2="9" y2="9"/>
            </svg>
          </div>
          <div class="feature-card-body">
            Hitung HPP
          </div>
        </a>

        <!-- Row 1: AI Mentor (Yellow) -->
        <a href="index.php?page=ai-mentor" class="feature-card feature-card-yellow">
          <div class="feature-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
              <path d="M6 12v5c3 3 9 3 12 0v-5"/>
            </svg>
          </div>
          <div class="feature-card-body">
            AI Mentor
          </div>
        </a>

        <!-- Row 2: Pelajari HAKI (Yellow) -->
        <a href="index.php?page=haki" class="feature-card feature-card-yellow">
          <div class="feature-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
              <polyline points="14 2 14 8 20 8"/>
              <line x1="16" y1="13" x2="8" y2="13"/>
              <line x1="16" y1="17" x2="8" y2="17"/>
            </svg>
          </div>
          <div class="feature-card-body">
            Pelajari HAKI
          </div>
        </a>

        <!-- Row 2: Cek Rate Card (Brown) -->
        <a href="index.php?page=rate-card" class="feature-card feature-card-brown">
          <div class="feature-card-header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              <polyline points="9 12 11 14 15 10"/>
            </svg>
          </div>
          <div class="feature-card-body">
            Cek Rate Card
          </div>
        </a>
      </section>

      <!-- 3. MODUL KEWIRAUSAHAAN -->
      <section class="modul-card">
        <div class="modul-header">
          <div class="modul-title-group">
            <span class="modul-main-title">Modul Kewirausahaan</span>
            <span class="modul-sub-title">Fondasi Perlindungan Bisnis</span>
          </div>
          <div class="modul-percentage">65%</div>
        </div>
        <div class="modul-progress-bar">
          <div class="modul-progress-fill"></div>
        </div>
        <a href="index.php?page=pembelajaran" class="btn-modul">
          Lanjutkan Pelajaran
        </a>
      </section>

      <!-- 4. ANALISIS TERBARU -->
      <section class="analisis-card">
        <div class="analisis-header">
          <span class="analisis-title">Analisis Terbaru</span>
          <a href="index.php?page=hpp" class="link-riwayat">Riwayat</a>
        </div>
        <div class="analisis-list">
          <!-- Item 1 -->
          <div class="analisis-item">
            <div class="analisis-icon-box">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006A42" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="5" width="20" height="14" rx="2"/>
                <line x1="2" y1="10" x2="22" y2="10"/>
                <circle cx="16" cy="14.5" r="1" fill="#006A42"/>
              </svg>
            </div>
            <div class="analisis-info">
              <span class="analisis-item-title">HPP Dihitung: Kit Desain Grafis</span>
              <span class="analisis-item-status">Status: <span class="status-green">Menguntungkan</span></span>
            </div>
          </div>

          <!-- Item 2 -->
          <div class="analisis-item">
            <div class="analisis-icon-box">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006A42" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                <path d="M15.54 8.46a5 5 0 0 1 0 7.07"/>
              </svg>
            </div>
            <div class="analisis-info">
              <span class="analisis-item-title">Perlunya Perlindungan Brand: &ldquo;Zulva Photobooth&rdquo;</span>
              <span class="analisis-item-status">Status: <span class="status-tan">Menunggu Tinjauan</span></span>
            </div>
          </div>
        </div>
      </section>

      <!-- 5. BERITA TERKINI -->
      <section class="berita-section">
        <div class="berita-header">
          <h2 class="berita-title">Berita Terkini</h2>
          <a href="index.php?page=berita" class="link-lihat-semua">Lihat Semua</a>
        </div>
        <div class="berita-list">
          <!-- News 1 -->
          <a href="index.php?page=berita" class="news-card">
            <div class="news-left">
              <div class="news-date-badge">
                <span class="badge-month">NOV</span>
                <span class="badge-day">24</span>
              </div>
              <div class="news-content">
                <span class="news-title">Masterclass Penentuan Harga Produk</span>
                <span class="news-meta">bersama Satria Utama &bull; 14.00 WIB</span>
              </div>
            </div>
            <button type="button" class="news-action" aria-label="Bookmark">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#776B55" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
              </svg>
            </button>
          </a>

          <!-- News 2 -->
          <a href="index.php?page=berita" class="news-card">
            <div class="news-left">
              <div class="news-date-badge">
                <span class="badge-month">DES</span>
                <span class="badge-day">02</span>
              </div>
              <div class="news-content">
                <span class="news-title">Strategi Kluntung Agensi Kreatif Modern</span>
                <span class="news-meta">Webinar &bull; 10:00 WIB</span>
              </div>
            </div>
            <button type="button" class="news-action" aria-label="Bookmark">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#776B55" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
              </svg>
            </button>
          </a>
        </div>
      </section>

    <?php endif; ?>

    </div>
  </main>

  <!-- ================= FOOTER ================= -->
  <footer class="site-footer">
    <div class="footer-green-section">
      <div class="container">
        <div class="footer-top-grid">
          <!-- Col 1: Brand & Socials -->
          <div class="footer-col-brand">
            <div class="footer-logo">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 38" fill="none">
                <path d="M16 2C9.37 2 4 7.37 4 14C4 18.2 6.16 21.9 9.5 24.1V27C9.5 27.8 10.2 28.5 11 28.5H21C21.8 28.5 22.5 27.8 22.5 27V24.1C25.84 21.9 28 18.2 28 14C28 7.37 22.63 2 16 2Z" stroke="#B8D055" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 6.5C12.4 6.5 9.5 9.4 9.5 13C9.5 15.6 11 17.8 13.2 19V24H18.8V19C21 17.8 22.5 15.6 22.5 13C22.5 9.4 19.6 6.5 16 6.5Z" stroke="#E5B232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 9V17" stroke="#E5B232" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M13 13H19" stroke="#E5B232" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M12 31.5H20" stroke="#B8D055" stroke-width="2" stroke-linecap="round"/>
                <path d="M13.5 34.5H18.5" stroke="#B8D055" stroke-width="2" stroke-linecap="round"/>
              </svg>
            </div>
            <div class="footer-follow-title">Follow us!</div>
            <div class="footer-social-links">
              <a href="https://x.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="X">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 4l16 16m0-16L4 20"/>
                </svg>
              </a>
              <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                </svg>
              </a>
              <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="YouTube">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
                  <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/>
                </svg>
              </a>
              <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="LinkedIn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                  <rect x="2" y="9" width="4" height="12"/>
                  <circle cx="4" cy="4" r="2"/>
                </svg>
              </a>
            </div>
          </div>

          <!-- Col 2: Tentang Kami -->
          <div class="footer-col">
            <div class="footer-heading">Tentang Kami</div>
            <ul class="footer-links-list">
              <li><a href="index.php?page=pembelajaran">Profil Inka</a></li>
              <li><a href="index.php?page=pembelajaran">Keamanan</a></li>
              <li><a href="index.php?page=pembelajaran">Hubungi kami</a></li>
            </ul>
          </div>

          <!-- Col 3: Tautan Lainnya -->
          <div class="footer-col">
            <div class="footer-heading">Tautan Lainnya</div>
            <ul class="footer-links-list">
              <li><a href="index.php?page=ai-mentor">Mentor AI</a></li>
              <li><a href="index.php?page=pembelajaran">Belajar Kewirausahaan</a></li>
              <li><a href="index.php?page=hpp">Hitung HPP Produk</a></li>
            </ul>
          </div>
        </div>

        <div class="footer-copyright">
          &copy; 2026 Inka. All rights reserved. Media Pembelajaran UMKM Indonesia.
        </div>
      </div>
    </div>

    <!-- Bottom Dark Brown Strip -->
    <div class="footer-brown-bar"></div>
  </footer>

  <script src="script.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
