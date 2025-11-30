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
        // [FIXED] Hapus trustHosts yang menyebabkan regex error.
        // Cukup gunakan trustProxies agar HTTPS Vercel terbaca.
        $middleware->trustProxies(at: ['*']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// 2. Konfigurasi Storage Khusus Vercel
if (isset($_ENV['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');
}

// 3. Return instance
return $app;