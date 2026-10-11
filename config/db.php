<?php
// Kunci untuk membuka "buku daftar anggota" (database)
$pdo = new PDO('mysql:host=localhost;dbname=inka;charset=utf8mb4', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);