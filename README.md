# Pajaken

Pajaken merupakan aplikasi manajemen perpajakan berbasis web yang dirancang untuk mempermudah dan menyederhanakan berbagai proses terkait perpajakan melalui platform digital yang terintegrasi. Aplikasi ini menyediakan fitur untuk mendukung pengelolaan data perpajakan, perhitungan pajak, serta berbagai aktivitas administrasi perpajakan lainnya agar dapat dilakukan dengan lebih praktis dan efisien.

Dikembangkan sebagai proyek akademik, Pajaken bertujuan menghadirkan solusi digital yang praktis melalui antarmuka yang mudah digunakan dan sistem aplikasi yang terstruktur.

---

## Panduan Penggunaan Aplikasi (Alur Pengguna)

### 1. Halaman Utama (Homepage) - Sebelum Login
Saat pertama kali membuka aplikasi, pengguna akan disambut dengan halaman beranda. Pada tahap ini, *navbar* hanya menampilkan menu **Beranda** dan **Tentang**. Pengguna belum bisa menggunakan fitur utama seperti cek pajak atau pengingat sebelum melakukan login.
> **Gambar Homepage (Belum Login):**
> ![Homepage Guest](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj01.avif)

### 2. Registrasi Akun
Pengguna baru harus mendaftar melalui halaman **Buat Akun** dengan mengisi Nama Lengkap, Email, NIK (16 Digit), dan Password untuk dapat mengakses fitur perpajakan secara penuh.
> **Gambar Halaman Register:**
> ![Register Page](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj02.avif)

### 3. Login ke Aplikasi
Pengguna yang sudah memiliki akun dapat masuk melalui halaman **Selamat Datang** dengan mengisi Email dan Password. Tersedia juga opsi masuk menggunakan akun Google atau GitHub.
> **Gambar Halaman Login:**
> ![Login Page](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj03.avif)

### 4. Halaman Utama (Homepage) - Setelah Login
Setelah berhasil login, antarmuka *homepage* akan menyesuaikan. *Navbar* akan menampilkan menu tambahan seperti **Cek Pajak** dan **Pengingat**, serta ikon profil dan notifikasi di pojok kanan atas. Sapaan personal (misalnya: "Halo, Andi Wijaya!") juga akan muncul.
> **Gambar Homepage (Sudah Login):**
> ![Homepage User](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj04.avif)

### 5. Halaman Tentang (About)
Halaman ini berisi informasi mengenai latar belakang, visi, misi, serta penjelasan lengkap tentang apa itu platform Pajaken dan bagaimana cara kerjanya.
> **Gambar Halaman About:**
> ![About Page](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj05.avif)

### 6. Halaman Cek Pajak & Pembayaran
Halaman **Cek Pajak** menampilkan daftar kendaraan yang sudah didaftarkan dan terhubung dengan NIK pengguna. 
- Pengguna dapat melihat status kendaraan (Aktif / Jatuh Tempo).
- Pengguna dapat memperbarui NIK, mengambil data kendaraan baru, atau mereset daftar kendaraan.
> **Gambar Halaman Cek Pajak (Daftar Kendaraan):**
> ![Cek Pajak List](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj06.avif)

Saat mengklik **Detail** pada salah satu kendaraan, akan muncul modal berisi informasi lengkap kendaraan (Nama Pemilik, Nomor Polisi, Nomor Mesin, Nomor Rangka, Warna, Bahan Bakar, dll). 
> **Gambar Modal Detail Kendaraan:**
> ![Cek Pajak Detail Modal](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj07.avif)

Jika kendaraan sudah jatuh tempo, pengguna dapat menekan tombol **Bayar Pajak** yang akan mengarahkan ke halaman **Selesaikan Pembayaran**. Di sini pengguna dapat melihat rincian tagihan (Pajak Pokok + Denda) dan memilih metode pembayaran (Virtual Account bank, Gerai Retail, atau QRIS).
> **Gambar Halaman Pembayaran:**
> ![Payment Page](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj08.avif)

### 7. Halaman Pengingat (Reminder)
Fitur ini memungkinkan pengguna untuk mengatur pengingat otomatis (3 hari, 7 hari, atau 30 hari) sebelum tanggal jatuh tempo pajak kendaraan. Halaman ini dilengkapi dengan antarmuka **Kalender** yang terintegrasi dengan jadwal jatuh tempo kendaraan pengguna.
> **Gambar Halaman Pengingat:**
> ![Reminder Page](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj09.avif)

### 8. Halaman Profil Pengguna
Pada halaman ini, pengguna dapat melihat informasi profil mereka (Nama Depan, Nama Belakang, Email, No. Handphone). Pengguna juga dapat mengedit data profil dan memperbarui kata sandi (password) mereka.
> **Gambar Halaman Profil:**
> ![Profile Page](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj10.avif)

---

## Fitur Panel Admin

Admin bertugas mengelola data pengguna, kendaraan, notifikasi, serta memverifikasi pembayaran pajak.

### 1. Dashboard Overview
Halaman utama admin menampilkan ringkasan metrik secara *live* seperti Total Pengguna, Total Kendaraan, Jumlah Pajak Terlambat, Tren Bulanan, Status Pajak (Aktif/Mendekati/Terlambat), dan Distribusi Tipe Kendaraan.
> **Gambar Dashboard Admin:**
> ![Admin Dashboard](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj11.avif)

### 2. Manajemen Data Kendaraan
Admin dapat melihat seluruh daftar kendaraan yang terdaftar di sistem. Pada halaman ini, admin memiliki akses untuk menambahkan data kendaraan baru ke dalam sistem.
> **Gambar Manage Data Kendaraan:**
> ![Admin Manage Vehicles](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj12.avif)
> **Gambar Manage Data Kendaraan:**
> ![Admin Manage Vehicles](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj13.avif)

### 3. Push Notifikasi (Broadcast)
Admin dapat mengirimkan notifikasi (siaran/pengumuman) kepada seluruh pengguna aplikasi. Notifikasi dapat dikategorikan berdasarkan jenis pemberitahuan tertentu.
> **Gambar Push Notifikasi:**
> ![Admin Push Notifications](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj14.avif)

### 4. Manajemen Pembayaran
Halaman ini menampilkan daftar transaksi pembayaran pajak. Admin dapat memantau status pembayaran (Pending, Disetujui, Ditolak) dan memproses permintaan persetujuan pembayaran dari pengguna.
> **Gambar Manage Pembayaran:**
> ![Admin Manage Payments](https://hdaphuncqwjfxysgmcew.supabase.co/storage/v1/object/public/images/pj15.avif)

---

## Struktur Project & Instalasi

Untuk informasi lebih lanjut mengenai cara mengunduh project, konfigurasi database, migrasi, dan cara menjalankannya di komputer lokal, silakan baca panduan lengkapnya di file:

**[INSTALLATION.md](INSTALLATION.md)**

## Kontribusi
Jika Anda ingin berkontribusi pada project ini, silakan lakukan *fork* pada repository ini, buat *branch* baru untuk fitur Anda, dan ajukan *Pull Request*.

---
*Copyright © 2026 Pajaken. All rights reserved.*