<?php
// Lepas "gelang" (hapus session), lalu kembali ke login
session_start();
session_destroy();
header('Location: login.php');
exit;