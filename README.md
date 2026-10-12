# Inventory Management System P5 (Laravel)

Proyek ini adalah hasil migrasi dari PHP Native (P4) ke framework Laravel 10. Proyek ini dibangun dengan menerapkan standar industri menggunakan arsitektur MVC dan antarmuka berbasis Bootstrap 5.

## 🏗️ Penjelasan Arsitektur MVC
1. **Model (`M`)**: Bertugas merepresentasikan struktur data dan berinteraksi langsung dengan database menggunakan *Eloquent ORM*. Contoh: `Product.php` dilengkapi dengan properti `$fillable` untuk mencegah *mass assignment error* dan fungsi relasi `belongsTo` ke tabel Kategori.
2. **View (`V`)**: Bertugas menyajikan antarmuka pengguna (UI). Proyek ini memanfaatkan *Blade Templating Engine* (seperti `layouts/app.blade.php`) agar kode HTML modular, mudah dirawat, dan tidak redundan.
3. **Controller (`C`)**: Bertugas menerima HTTP *request*, memvalidasi *input*, memproses logika bisnis melalui Model, dan mengembalikan hasil ke View. Contoh: `ProductController` menangani logika CRUD, fitur *Search*, *Filter*, dan *Pagination*.

## 🚀 Instruksi Instalasi & Menjalankan Proyek

1. **Clone repository ini:**
   ```bash
   git clone <URL_REPO_GITHUB_ANDA>
   cd inventory-laravel