<?php
$user = [
    'nama'     => 'Atiqa Zulva',
    'usaha'    => 'Photobooth Event',
    'sapaan'   => 'Berli',
    'foto'     => 'assets/img/atiqa.jpg',
    'modul'    => 12,
    'rate_card' => 8,
    'sertifikat_total' => 3,
];

$pencapaian = [
    ['ikon' => 'bulb',   'label' => 'Master Hak Cipta',   'warna' => 'mint'],
    ['ikon' => 'cash',   'label' => 'Pro Penentuan Harga', 'warna' => 'lime'],
    ['ikon' => 'shield', 'label' => 'Brand Guru',         'warna' => 'mint'],
];

$kemajuan = [
    'judul'  => 'Dasar Merek Dagang',
    'sub'    => 'Fondasi Hukum • Modul 4',
    'persen' => 75,
    'url'    => 'belajar.php?modul=4',
];

$aktivitas = [
    ['ikon' => 'doc',    'judul' => 'Rate Card: Photobooth Event', 'ket' => 'Dikirim 2 hari yang lalu', 'url' => '#'],
    ['ikon' => 'shield', 'judul' => 'Cek Brand: Zoollfa',          'ket' => 'Disetujui oleh Mentor',    'url' => '#'],
];

$sertifikat = [
    ['nama' => 'KI Ilustrasi',   'file' => 'sertifikat/ki-ilustrasi.pdf'],
    ['nama' => 'Pajak Freelance', 'file' => 'sertifikat/pajak-freelance.pdf'],
];

$menu = [
    ['id' => 'beranda', 'label' => 'Beranda',   'ikon' => 'home', 'url' => 'index.php'],
    ['id' => 'hpp',     'label' => 'Hitung HPP', 'ikon' => 'calc', 'url' => 'hpp.php'],
    ['id' => 'belajar', 'label' => 'Belajar',   'ikon' => 'book', 'url' => 'belajar.php'],
    ['id' => 'profil',  'label' => 'Profil',    'ikon' => 'user', 'url' => 'profil.php'],
];
$aktif = 'profil';

function e($s)
{
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

function ikon($nama)
{
    $p = [
        'home'   => '<path d="M3 11l9-8 9 8"/><path d="M5 10v10h5v-6h4v6h5V10"/>',
        'calc'   => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 7h8M8 12h.01M12 12h.01M16 12h.01M8 16h.01M12 16h.01M16 16h.01"/>',
        'book'   => '<path d="M2 5c3-1 6-1 10 1 4-2 7-2 10-1v14c-3-1-6-1-10 1-4-2-7-2-10-1z"/><path d="M12 6v14"/>',
        'user'   => '<circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"/>',
        'bulb'   => '<path d="M9 18h6M10 21h4"/><path d="M12 3a6 6 0 00-4 10.5c.8.8 1 1.5 1 2.5h6c0-1 .2-1.7 1-2.5A6 6 0 0012 3z"/>',
        'cash'   => '<rect x="3" y="6" width="18" height="12" rx="2"/><circle cx="12" cy="12" r="2.5"/><path d="M6.5 12h.01M17.5 12h.01"/>',
        'shield' => '<path d="M12 3l8 3v6c0 4.5-3.4 8-8 9-4.6-1-8-4.5-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-5"/>',
        'doc'    => '<path d="M6 3h8l4 4v14H6z"/><path d="M14 3v4h4M9 12h6M9 16h6"/>',
        'chev'   => '<path d="M9 6l6 6-6 6"/>',
        'down'   => '<path d="M12 4v12M7 11l5 5 5-5M5 20h14"/>',
        'gear'   => '<circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M4.9 19.1L7 17M17 7l2.1-2.1"/>',
        'help'   => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 015 .5c0 1.5-2.5 2-2.5 3.5M12 17h.01"/>',
        'logout' => '<path d="M9 4H5v16h4M16 8l4 4-4 4M20 12H9"/>',
        'bell'   => '<path d="M6 16V11a6 6 0 0112 0v5l2 2H4zM10 21h4"/>',
        'check'  => '<path d="M5 12l5 5 9-10"/>',
    ];
    return '<svg class="ikon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . ($p[$nama] ?? '') . '</svg>';
}

function avatar($src, $nama, $kelas = '')
{
    $inisial = strtoupper(mb_substr($nama, 0, 1));
    return '<img class="avatar ' . e($kelas) . '" src="' . e($src) . '" alt="Foto ' . e($nama) . '" data-inisial="' . e($inisial) . '">';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil – <?= e($user['nama']) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <header class="topbar">
        <div class="topbar__user">
            <?= avatar($user['foto'], $user['sapaan'], 'avatar--sm') ?>
            <div>
                <strong>Halo, <?= e($user['sapaan']) ?> 👋</strong>
                <small>Siap untuk berwirausaha hari ini?</small>
            </div>
        </div>
        <button class="bell" id="btnNotif" aria-label="Notifikasi"><?= ikon('bell') ?></button>
    </header>

    <div class="layout">
        <nav class="sidebar" aria-label="Menu utama">
            <?php foreach ($menu as $m): ?>
                <a href="<?= e($m['url']) ?>" class="sidebar__item <?= $m['id'] === $aktif ? 'is-active' : '' ?>"
                    <?= $m['id'] === $aktif ? 'aria-current="page"' : '' ?>>
                    <?= ikon($m['ikon']) ?><span><?= e($m['label']) ?></span>
                </a>
            <?php endforeach; ?>
        </nav>

        <main class="konten">
            <section class="hero">
                <div class="hero__id">
                    <div class="avatar-wrap">
                        <?= avatar($user['foto'], $user['nama'], 'avatar--lg') ?>
                        <span class="badge-ok"><?= ikon('check') ?></span>
                    </div>
                    <div>
                        <h1><?= e($user['nama']) ?></h1>
                        <p><?= e($user['usaha']) ?></p>
                    </div>
                </div>
                <div class="hero__stat">
                    <div class="stat"><b data-count="<?= (int)$user['modul'] ?>">0</b><span>MODUL</span></div>
                    <div class="stat"><b data-count="<?= (int)$user['rate_card'] ?>">0</b><span>RATE CARD</span></div>
                    <div class="stat"><b data-count="<?= (int)$user['sertifikat_total'] ?>">0</b><span>SERTIFIKAT</span></div>
                </div>
            </section>

            <div class="grid">
                <section class="card">
                    <div class="card__head">
                        <h2>Pencapaian</h2>
                        <a href="pencapaian.php" class="link">Lihat semua</a>
                    </div>
                    <div class="badges">
                        <?php foreach ($pencapaian as $p): ?>
                            <div class="badge-item">
                                <span class="chip chip--<?= e($p['warna']) ?>"><?= ikon($p['ikon']) ?></span>
                                <span><?= e($p['label']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="card">
                    <h2>Kemajuan Belajar</h2>
                    <div class="progress-box">
                        <div class="progress-box__row">
                            <span class="chip chip--mint"><?= ikon('book') ?></span>
                            <div class="progress-box__teks">
                                <strong><?= e($kemajuan['judul']) ?></strong>
                                <small><?= e($kemajuan['sub']) ?></small>
                            </div>
                            <span class="persen"><?= (int)$kemajuan['persen'] ?>%</span>
                        </div>
                        <div class="bar" role="progressbar" aria-valuenow="<?= (int)$kemajuan['persen'] ?>" aria-valuemin="0" aria-valuemax="100">
                            <div class="bar__isi" data-lebar="<?= (int)$kemajuan['persen'] ?>"></div>
                        </div>
                        <a href="<?= e($kemajuan['url']) ?>" class="btn">Lanjutkan Belajar</a>
                    </div>
                </section>

                <section class="card">
                    <h2>Aktivitas Bisnis</h2>
                    <div class="daftar">
                        <?php foreach ($aktivitas as $a): ?>
                            <a href="<?= e($a['url']) ?>" class="daftar__item">
                                <?= ikon($a['ikon']) ?>
                                <div>
                                    <strong><?= e($a['judul']) ?></strong>
                                    <small><?= e($a['ket']) ?></small>
                                </div>
                                <?= ikon('chev') ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>

                <section class="card">
                    <h2>Sertifikat</h2>
                    <div class="sertif">
                        <?php foreach ($sertifikat as $s): ?>
                            <a class="sertif__item" href="<?= e($s['file']) ?>" download>
                                <div class="sertif__thumb" aria-hidden="true"><i></i><i></i><i></i></div>
                                <span><?= e($s['nama']) ?></span>
                                <?= ikon('down') ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>

            <section class="card menu-akun">
                <a href="pengaturan.php" class="menu-akun__item"><?= ikon('gear') ?><span>Pengaturan Akun</span><?= ikon('chev') ?></a>
                <a href="dukungan.php" class="menu-akun__item"><?= ikon('help') ?><span>Dukungan &amp; Umpan Balik</span><?= ikon('chev') ?></a>
                <a href="logout.php" class="menu-akun__item menu-akun__item--keluar" id="btnKeluar"><?= ikon('logout') ?><span>Keluar</span></a>
            </section>
        </main>
    </div>

    <div class="toast" id="toast" role="status" aria-live="polite"></div>
    <script src="profile.js"></script>
</body>

</html>