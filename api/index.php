<?php

// 1. Setup Error Reporting (Biar kalau error kelihatan di layar)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. KONFIGURASI KHUSUS VERCEL (SOLUSI ERROR KAMU)
// Kita pindahkan semua lokasi penulisan cache ke folder /tmp
$tmpDir = '/tmp';

// Pastikan folder storage di /tmp ada
if (!is_dir($tmpDir . '/storage')) {
    mkdir($tmpDir . '/storage', 0777, true);
    mkdir($tmpDir . '/storage/app', 0777, true);
    mkdir($tmpDir . '/storage/framework', 0777, true);
    mkdir($tmpDir . '/storage/framework/cache', 0777, true);
    mkdir($tmpDir . '/storage/framework/views', 0777, true);
    mkdir($tmpDir . '/storage/framework/sessions', 0777, true);
    mkdir($tmpDir . '/storage/logs', 0777, true);
}

// Override lokasi cache Laravel via Environment Variable
// Ini memberitahu Laravel: "Jangan tulis di bootstrap/cache project, tapi tulis di /tmp saja"
$_ENV['APP_PACKAGES_CACHE'] = $tmpDir . '/packages.php';
$_ENV['APP_SERVICES_CACHE'] = $tmpDir . '/services.php';
$_ENV['APP_ROUTES_CACHE']   = $tmpDir . '/routes-v7.php';
$_ENV['APP_EVENTS_CACHE']   = $tmpDir . '/events-v7.php';
$_ENV['APP_CONFIG_CACHE']   = $tmpDir . '/config.php';

// Override Storage Path (Backup untuk bootstrap/app.php)
$_ENV['APP_STORAGE_PATH'] = $tmpDir . '/storage';

// 3. Jalankan Laravel
require __DIR__ . '/../public/index.php';