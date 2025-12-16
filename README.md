# 🚨 SiagaRT - Sistem Pelaporan Darurat Warga

**SiagaRT** adalah platform berbasis web yang dirancang khusus untuk warga **RT 04 Kenali Besar**. Aplikasi ini berfungsi sebagai jembatan komunikasi cepat antara warga dan perangkat RT/Keamanan saat terjadi situasi darurat seperti kebakaran, bencana alam, pencurian, atau kebutuhan medis mendesak.

![Project Status](https://img.shields.io/badge/status-development-orange)
![Laravel](https://img.shields.io/badge/Laravel-10.x-red)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-3.0-blue)
![Supabase](https://img.shields.io/badge/Supabase-PostgreSQL-green)

## 📋 Daftar Isi
- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Prasyarat Sistem](#-prasyarat-sistem)
- [Instalasi & Konfigurasi](#-instalasi--konfigurasi)
- [Konfigurasi Supabase](#-konfigurasi-supabase-db)
- [Tim Pengembang](#-tim-pengembang)
- [Lisensi](#-lisensi)

## 🚀 Fitur Utama

* **Pelaporan Cepat:** Form pelaporan darurat yang simpel dan responsif.
* **Kategori Kejadian:** Klasifikasi jenis laporan (Kebakaran, Bencana, Kriminalitas, Medis).
* **Bukti Laporan:** Dukungan upload foto kejadian di lokasi.
* **Dashboard Admin:** Panel khusus untuk Ketua RT/Keamanan memantau laporan masuk.
* **Status Tracking:** Warga dapat melihat status laporan (Terkirim, Sedang Ditangani, Selesai).
* **Autentikasi Warga:** Login aman untuk memastikan pelapor adalah warga terverifikasi.

## 🛠 Teknologi yang Digunakan

Project ini dibangun menggunakan stack modern untuk performa dan skalabilitas:

* **Backend Framework:** [Laravel](https://laravel.com/) (PHP)
* **Styling:** [Tailwind CSS](https://tailwindcss.com/)
* **Database:** [PostgreSQL](https://www.postgresql.org/) via [Supabase](https://supabase.com/)
* **Templating:** Laravel Blade
* **Icons:** Heroicons / FontAwesome

## 💻 Prasyarat Sistem

Sebelum menjalankan project ini, pastikan local machine kamu sudah terinstal:

* PHP >= 8.1
* Composer
* Node.js & NPM
* Akun Supabase (untuk database)

## 🔧 Instalasi & Konfigurasi

Ikuti langkah-langkah berikut untuk menjalankan project di local:

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/username-kalian/siagart.git](https://github.com/username-kalian/siagart.git)
    cd siagart
    ```

2.  **Install Dependencies (Backend & Frontend)**
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment Variable**
    Duplikat file `.env.example` menjadi `.env`:
    ```bash
    cp .env.example .env
    ```

4.  **Generate App Key**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database (Supabase)**
    Buka file `.env` dan sesuaikan konfigurasi database dengan credentials dari Supabase (lihat bagian [Konfigurasi Supabase](#-konfigurasi-supabase-db) di bawah).

6.  **Migrasi Database**
    ```bash
    php artisan migrate
    ```

7.  **Jalankan Project**
    Buka dua terminal berbeda:
    ```bash
    # Terminal 1 (Server Laravel)
    php artisan serve

    # Terminal 2 (Compile Tailwind)
    npm run dev
    ```

    Akses aplikasi di: `http://localhost:8000`

## 🗄 Konfigurasi Supabase DB

Pastikan di file `.env` kamu menggunakan driver `pgsql`. Ambil *Connection String* dari dashboard Supabase (Settings -> Database -> Connection parameters).

```env
DB_CONNECTION=pgsql
DB_HOST=aws-0-ap-southeast-1.pooler.supabase.com (Contoh)
DB_PORT=5432 (Atau 6543 untuk Transaction Mode)
DB_DATABASE=postgres
DB_USERNAME=postgres.namaappkalian
DB_PASSWORD=password-database-kalian

## 👥 Tim Pengembang

Project **SiagaRT** ini dikembangkan dan dipelihara oleh tim yang berdedikasi untuk memberikan solusi digital bagi warga RT 04.

| Foto | Nama & Identitas | Peran (Role) | Tanggung Jawab Utama |
| :---: | :--- | :--- | :--- |
| <img src="https://github.com/Arflifie.png" width="40" height="40"> | **Arfun Ali Yafie**<br>*(Ketua Tim)*<br>NIM: `F1E123070` | **Fullstack Developer** | • Manajemen Proyek<br>• Backend Logic (Laravel)<br>• Integrasi Database Supabase |
| <img src="https://github.com/agtfie.png" width="40" height="40"> | **Fitri Agustina**<br>*(Anggota)*<br>NIM: `xxxxxxxx` | **Frontend Engineer** | • Slicing UI dengan Tailwind<br>• Responsivitas Layout<br>• Desain Antarmuka |
| <img src="https://github.com/destiamanda.png" width="40" height="40"> | **Desti Amanda**<br>*(Anggota)*<br>NIM: `xxxxxxxx` | **System Analyst / QA** | • Perancangan Flow Sistem<br>• Testing Aplikasi<br>• Dokumentasi & Laporan |

> **Catatan:** Klik nama atau foto untuk mengunjungi profil GitHub pengembang.