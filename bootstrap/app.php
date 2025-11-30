<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// 1. Konfigurasi Awal
$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // [WAJIB UNTUK VERCEL]
        // Memberitahu Laravel untuk mempercayai load balancer Vercel.
        // Jika ini tidak ada, aset (CSS/JS) akan dimuat via HTTP (bukan HTTPS) dan error "Mixed Content".
        $middleware->trustProxies(at: ['*']);
        $middleware->trustHosts(at: ['*']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create(); // Kita panggil create() di sini dulu agar menjadi Object Application

// 2. Konfigurasi Storage Khusus Vercel
// Vercel serverless bersifat Read-Only (tidak bisa tulis file), kecuali di folder /tmp
if (isset($_ENV['VERCEL'])) {
    // Arahkan storage path ke direktori sementara (/tmp)
    $app->useStoragePath('/tmp/storage');
}

// 3. Return instance aplikasi
return $app;