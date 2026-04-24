<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Pemweb Laravel

Aplikasi web dengan sistem autentikasi (login & register) berbasis Laravel.

## Teknologi
- PHP 8.5
- Laravel
- MySQL
- Vanilla JavaScript

## Fitur
- Register akun
- Login & logout
- Proteksi halaman dengan middleware
- Session management

## Instalasi

1. Clone repository
   git clone https://github.com/username/nama-repo.git

2. Install dependencies
   composer install

3. Salin file environment
   cp .env.example .env

4. Generate app key
   php artisan key:generate

5. Sesuaikan konfigurasi database di .env
   DB_DATABASE=pemweb
   DB_USERNAME=root
   DB_PASSWORD=

6. Jalankan migrasi
   php artisan migrate

7. Jalankan server
   php artisan serve

## Lisensi
[MIT license](https://opensource.org/licenses/MIT).
