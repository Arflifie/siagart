<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- Tambahkan Baris Ini

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Paksa semua aset (CSS/JS/Gambar) menggunakan HTTPS di Production (Vercel)
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}