# Installation Guide - Pajaken

Panduan ini menjelaskan langkah-langkah instalasi dan konfigurasi project Pajaken dari awal hingga aplikasi dapat dijalankan di lingkungan lokal.

## Teknologi yang Digunakan

- PHP 8.3+
- Laravel 13
- MySQL / SQLite
- Blade
- Alpine.js
- Tailwind CSS
- Vite
- Simple Software QR Code
- Composer
- Node.js & NPM

## Struktur Singkat Project

```bash
Pajaken-Tax/
├── app/                 # Backend application
├── bootstrap/           # Framework bootstrap
├── config/              # Application configuration
├── database/
│   ├── migrations/      # Database migrations
│   ├── factories/       # Model factories
│   └── seeders/         # Initial database data
├── docker/              # Docker configuration
├── public/              # Public assets
├── resources/
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript files
│   └── views/           # Blade templates
├── routes/              # Application routes
├── storage/             # Application storage
├── tests/               # Automated tests
├── .env.example         # Environment configuration example
├── artisan              # Laravel command-line interface
├── composer.json        # PHP dependencies
├── package.json         # JavaScript dependencies
└── vite.config.js       # Vite configuration
```

> **Catatan:** Folder `vendor/` dan `node_modules/` tidak perlu di-upload ke GitHub karena dapat dibuat ulang melalui Composer dan NPM.

---

## 1. Persiapan Instalasi

Pastikan perangkat sudah memiliki software berikut:

- PHP 8.3 atau versi yang sesuai dengan kebutuhan project.
- Composer.
- Node.js dan NPM.
- MySQL Server (XAMPP, Laragon, atau MySQL standalone), jika menggunakan MySQL.
- Git.

Pastikan seluruh software tersebut sudah terpasang dan dapat diakses melalui terminal.

Untuk memeriksa instalasi, jalankan:

```bash
php -v
composer -V
node -v
npm -v
git --version
```

## 2. Clone Repository

Buka terminal, kemudian clone repository Pajaken:

```bash
git clone https://github.com/kvinn-dev/Pajaken-Tax.git
```

Masuk ke direktori project:

```bash
cd Pajaken-Tax
```

Pastikan terminal berada di direktori root project yang memiliki file `artisan` dan `composer.json`.

## 3. Install PHP Dependencies

Install seluruh dependency Laravel menggunakan Composer:

```bash
composer install
```

Perintah ini akan mengunduh seluruh package PHP yang dibutuhkan oleh aplikasi ke dalam folder `vendor/`.

## 4. Install Frontend Dependencies

Install dependency frontend menggunakan NPM:

```bash
npm install
```

Perintah ini akan mengunduh package frontend seperti Vite, Tailwind CSS, Alpine.js, dan dependency lainnya ke dalam folder `node_modules/`.

## 5. Konfigurasi Environment

Buat file `.env` berdasarkan file `.env.example`.

### macOS / Linux

```bash
cp .env.example .env
```

### Windows

```bash
copy .env.example .env
```

Kemudian generate application key:

```bash
php artisan key:generate
```

Perintah ini akan menghasilkan `APP_KEY` yang digunakan Laravel untuk kebutuhan enkripsi aplikasi.

## 6. Konfigurasi Database

Pajaken dapat menggunakan database SQLite maupun MySQL. File `.env.example` menyediakan konfigurasi SQLite sebagai pengaturan awal.

### Opsi A – Menggunakan MySQL

Pastikan MySQL Server sudah berjalan.

Buat database baru melalui phpMyAdmin, MySQL Workbench, atau terminal.

Contoh menggunakan SQL:

```sql
CREATE DATABASE pajaken;
```

Kemudian buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pajaken
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL di perangkat masing-masing.

### Opsi B – Menggunakan SQLite

Jika ingin menggunakan SQLite, kamu dapat mempertahankan konfigurasi default dari `.env.example`:

```env
DB_CONNECTION=sqlite
```

Pastikan file database SQLite tersedia. Jika belum ada, buat file `database.sqlite` di dalam folder `database/`.

> **Catatan:** Gunakan salah satu konfigurasi database di atas. Pastikan database yang digunakan sesuai dengan pengaturan pada file `.env` sebelum menjalankan migration.

## 7. Jalankan Migrasi Database

Setelah konfigurasi database selesai, jalankan:

```bash
php artisan migrate
```

Perintah ini akan membuat tabel-tabel database berdasarkan file migration yang tersedia di dalam folder `database/migrations/`.

Pastikan proses migrasi berhasil sebelum melanjutkan ke tahap berikutnya.

Jika project menyediakan seeder untuk data awal yang diperlukan aplikasi, jalankan:

```bash
php artisan db:seed
```

> **Catatan:** Jalankan seeder hanya jika tersedia dan memang diperlukan oleh aplikasi. Periksa terlebih dahulu isi folder `database/seeders/`.

## 8. Konfigurasi Storage

Jika aplikasi menggunakan Laravel Storage untuk menyimpan atau menampilkan file yang diunggah, jalankan:

```bash
php artisan storage:link
```

Perintah ini membuat symbolic link dari `public/storage` ke `storage/app/public` sehingga file dapat diakses melalui public directory.

## 9. Jalankan Project Pajaken

Setelah seluruh proses instalasi dan konfigurasi selesai, aplikasi dapat dijalankan menggunakan dua perintah yang dijalankan secara bersamaan melalui dua terminal berbeda.

### Terminal 1 – Laravel Development Server

Buka terminal pertama, pastikan berada di direktori root project, kemudian jalankan:

```bash
php artisan serve
```

Perintah ini akan menjalankan server aplikasi Laravel.

Secara default, aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

### Terminal 2 – Vite Development Server

Buka terminal kedua, masuk ke direktori root project yang sama, kemudian jalankan:

```bash
npm run dev
```

Perintah ini akan menjalankan Vite untuk memproses dan menyajikan asset frontend selama proses development.

Biarkan kedua terminal tetap berjalan selama aplikasi digunakan.

Setelah kedua server berhasil dijalankan, buka browser dan akses:

```text
http://127.0.0.1:8000
```

---

## Alur Instalasi Lengkap untuk Developer Baru

Berikut ringkasan perintah instalasi dari awal hingga aplikasi siap dijalankan di lingkungan lokal.

### macOS / Linux

```bash
git clone https://github.com/kvinn-dev/Pajaken-Tax.git

cd Pajaken-Tax

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan storage:link
```

### Windows

```bash
git clone https://github.com/kvinn-dev/Pajaken-Tax.git

cd Pajaken-Tax

composer install

npm install

copy .env.example .env

php artisan key:generate

php artisan migrate

php artisan storage:link
```

**Penting:** Sebelum menjalankan `php artisan migrate`, pastikan konfigurasi database pada `.env` sudah benar. Jika menggunakan MySQL, pastikan database `pajaken` sudah dibuat terlebih dahulu.

Jika project menyediakan seeder yang diperlukan, jalankan juga:

```bash
php artisan db:seed
```

Setelah proses instalasi selesai, jalankan aplikasi menggunakan dua terminal berbeda.

**Terminal 1:**

```bash
php artisan serve
```

**Terminal 2:**

```bash
npm run dev
```

## Alur Menjalankan Project Setelah Instalasi

Untuk menjalankan kembali project yang sudah pernah di-setup sebelumnya, cukup masuk ke direktori root project dan jalankan kedua perintah berikut melalui terminal yang berbeda.

**Terminal 1:**

```bash
cd Pajaken-Tax

php artisan serve
```

**Terminal 2:**

```bash
cd Pajaken-Tax

npm run dev
```

Tidak perlu mengulangi `composer install`, `npm install`, atau proses konfigurasi database selama dependency dan konfigurasi project tidak berubah.

## Alur Saat Mengubah Struktur Database

Jika terdapat perubahan pada struktur database, seperti menambahkan tabel, kolom, atau relasi baru, ikuti alur migration Laravel berikut.

**1. Buat file migration baru:**

```bash
php artisan make:migration add_column_to_table_name
```

**2. Terapkan perubahan migration ke database:**

```bash
php artisan migrate
```

**3. Periksa hasil perubahan database.**

Setelah migration berhasil, struktur database lokal akan diperbarui sesuai perubahan yang dibuat.

Jika project dikerjakan secara berkelompok, informasikan kepada anggota tim agar mereka juga menjalankan:

```bash
php artisan migrate
```

Dengan demikian, struktur database setiap anggota tim tetap konsisten.

---

## Troubleshooting

### 1. Error: No application encryption key has been specified

Artinya Laravel belum memiliki application key.

Jalankan:

```bash
php artisan key:generate
```

### 2. Error: SQLSTATE[HY000] [1049] Unknown database

Artinya database yang dikonfigurasi pada `.env` belum tersedia.

Buat database melalui MySQL:

```sql
CREATE DATABASE pajaken;
```

Pastikan nama database sesuai dengan konfigurasi `.env`.

### 3. Error: SQLSTATE[HY000] [1045] Access denied

Artinya username atau password MySQL tidak sesuai.

Periksa konfigurasi berikut:

```env
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan dengan kredensial MySQL yang digunakan.

### 4. Error: Vite manifest not found

Artinya file manifest frontend belum tersedia atau asset frontend belum di-build.

Jalankan:

```bash
npm install
npm run build
```

Jika sedang dalam mode development, jalankan:

```bash
npm run dev
```

### 5. Error: Class not found atau dependency tidak ditemukan

Pastikan dependency Composer sudah terpasang:

```bash
composer install
```

Jika masih bermasalah, jalankan:

```bash
composer dump-autoload
```

### 6. Error: Permission denied pada Storage

Jika aplikasi tidak dapat mengakses folder storage, periksa permission pada direktori `storage/` dan `bootstrap/cache/`.

Pada macOS / Linux, kamu dapat menggunakan:

```bash
chmod -R 775 storage bootstrap/cache
```

### 7. Perubahan konfigurasi tidak terbaca

Jika perubahan pada `.env` belum terbaca, bersihkan cache konfigurasi:

```bash
php artisan optimize:clear
```

### 8. Asset frontend tidak dapat dimuat

Pastikan Vite Development Server sudah berjalan pada terminal kedua:

```bash
npm run dev
```

Jika Vite belum berjalan, asset frontend mungkin tidak dapat dimuat dengan benar.

Pastikan juga Laravel Development Server tetap berjalan pada terminal pertama:

```bash
php artisan serve
```

---

## Catatan untuk GitHub

Pastikan file `.gitignore` memiliki konfigurasi berikut agar file hasil instalasi lokal dan konfigurasi sensitif tidak ikut ter-upload ke repository:

```gitignore
/vendor
/node_modules
.env
/public/build
/public/hot
/storage/*.key
```

> **Catatan:** Jangan mengunggah file `.env` yang berisi kredensial database, application key, atau informasi sensitif lainnya ke repository publik.

---

## Verifikasi Instalasi

Setelah seluruh langkah instalasi selesai, pastikan kedua development server berjalan tanpa error.

Kemudian buka browser dan akses aplikasi Pajaken melalui alamat berikut:

```text
http://127.0.0.1:8000
```

Jika halaman aplikasi berhasil dibuka dan fitur-fitur utama dapat digunakan, berarti proses instalasi telah berhasil.

Untuk informasi mengenai deskripsi project, fitur aplikasi, screenshot, dan informasi lainnya, silakan lihat file **README.md** pada repository Pajaken.