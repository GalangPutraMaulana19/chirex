# Chirexs Laravel - PHPStorm Setup Guide

## 📋 Daftar Isi
1. [Prerequisites](#prerequisites)
2. [Setup Langkah Demi Langkah](#setup-langkah-demi-langkah)
3. [Konfigurasi Database](#konfigurasi-database)
4. [Testing Fitur](#testing-fitur)
5. [Troubleshooting](#troubleshooting)

---

## Prerequisites

### Software yang Dibutuhkan:
- **PHPStorm** 2023.1 atau lebih baru
- **PHP** 8.1 atau lebih baru
- **Composer** 2.5 atau lebih baru
- **MySQL** 8.0 atau lebih baru (atau MariaDB 10.6+)
- **Git** (untuk clone repository)

### Cara Cek Versi:
```bash
php -v
composer -v
mysql --version
```

---

## Setup Langkah Demi Langkah

### 1. Clone Repository
```bash
# Di terminal atau Git Bash
cd C:\xampp\htdocs\  # Windows
# atau
cd ~/Sites/  # macOS/Linux

git clone https://github.com/GalangPutraMaulana19/chirex.git
cd chirex
```

### 2. Buka Project di PHPStorm
1. Buka PHPStorm
2. Klik **File > Open**
3. Pilih folder `chirex` yang baru di-clone
4. Klik **OK**

### 3. Install Dependencies

#### Via PHPStorm Terminal (recommended):
1. Buka terminal: **View > Tool Windows > Terminal** atau `Alt+F12`
2. Jalankan:
```bash
composer install
```

**Note:** Proses ini akan menginstall semua dependencies Laravel (~5-10 menit pertama kali)

### 4. Setup Environment File

#### Via PHPStorm:
1. Cari file `.env.example` di project explorer
2. Klik kanan > **Copy**
3. Klik kanan di folder root > **Paste** > Rename ke `.env`

#### Via Terminal:
```bash
# Windows
copy .env.example .env

# macOS/Linux
cp .env.example .env
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

**Expected output:**
```
INFO  Application key set successfully.
```

---

## Konfigurasi Database

### 1. Buat Database MySQL

#### Via phpMyAdmin:
1. Buka http://localhost/phpmyadmin
2. Klik **New** di sidebar kiri
3. Nama database: `spkayam`
4. Collation: `utf8mb4_unicode_ci`
5. Klik **Create**

#### Via Terminal/Command Line:
```bash
mysql -u root -p
```
Kemudian di MySQL prompt:
```sql
CREATE DATABASE spkayam CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 2. Edit File .env di PHPStorm

1. Double-click file `.env` di project explorer
2. Cari section `DB_*` dan edit:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spkayam
DB_USERNAME=root
DB_PASSWORD=        # kosongkan jika tidak ada password, atau isi password MySQL Anda
```

**Untuk XAMPP biasanya:**
```env
DB_PASSWORD=
```

**Untuk MAMP/Laragon biasanya:**
```env
DB_PASSWORD=root
```

### 3. Run Migrations

```bash
php artisan migrate
```

**Expected output:**
```
INFO  Preparing database.
...
INFO  Running migrations.
  2014_10_12_000000_create_users_table ..................... 42.3ms DONE
  2025_10_31_144240_create_admin_table ..................... 31.2ms DONE
  ...
```

### 4. Import Data Sample

```bash
# Windows
mysql -u root -p spkayam < database\spkayam.sql

# macOS/Linux
mysql -u root -p spkayam < database/spkayam.sql
```

**Masukkan password MySQL Anda saat diminta**

---

## Menjalankan Aplikasi

### 1. Start Laravel Development Server

```bash
php artisan serve
```

**Expected output:**
```
INFO  Server running on [http://127.0.0.1:8000].
Press Ctrl+C to stop the server
```

### 2. Buka di Browser

Klik link http://127.0.0.1:8000 atau buka manual di browser:
- **Chrome/Firefox/Edge:** http://localhost:8000
- **Safari:** http://127.0.0.1:8000

---

## Testing Fitur

### ✅ 1. Test Homepage (Public)
1. Buka: http://localhost:8000
2. **Expected:** Halaman home dengan menu sidebar
3. **Verify:** CSS terload dengan benar (warna ungu di header)

### ✅ 2. Test Login Admin
1. Buka: http://localhost:8000/formlogin
2. **Credentials:**
   - Username: `admin`
   - Password: `admin`
3. Klik **Login**
4. **Expected:** Redirect ke homepage dengan session aktif

### ✅ 3. Test Diagnosis System (Public/User)

#### Cara Test:
1. Buka: http://localhost:8000/diagnosa
2. Isi **Nama Anda**: `Test User`
3. **Pilih minimal 2-3 gejala** (centang checkbox), contoh:
   - ☑ G001 - Ayam terlihat lesu
   - ☑ G002 - Nafsu makan menurun
   - ☑ G003 - Ayam demam
4. Klik **Proses Diagnosa**
5. **Expected:** 
   - Hasil diagnosa muncul
   - Menampilkan penyakit dengan nilai CF tertinggi
   - Menampilkan persentase kepastian
   - Menampilkan solusi/pengobatan

#### Cara Kerja Certainty Factor:
```
CF(gabungan) = CF1 + CF2 × (1 - CF1)  [jika kedua positif]
Persentase = CF × 100%
```

### ✅ 4. Test Riwayat Diagnosis (Public)
1. Buka: http://localhost:8000/riwayat
2. **Expected:** 
   - List riwayat diagnosis
   - Pagination jika data > 10
3. Klik **Detail** pada salah satu riwayat
4. **Expected:** Detail lengkap hasil diagnosis

### ✅ 5. Test CRUD Admin - Penyakit (Admin Only)

#### A. Login dulu sebagai admin (jika belum)
- Username: `admin` | Password: `admin`

#### B. Akses halaman Penyakit
1. Buka: http://localhost:8000/penyakit
2. **Expected:** Tabel list penyakit

#### C. Create (Tambah Penyakit Baru)
1. Klik **Tambah Penyakit** atau button Add
2. Isi form:
   - Kode Penyakit: `P99`
   - Nama Penyakit: `Test Penyakit`
   - Detail: `Detail test penyakit`
   - Solusi: `Solusi test`
3. Klik **Simpan**
4. **Expected:** Data muncul di tabel

#### D. Update (Edit Penyakit)
1. Cari penyakit `P99` di tabel
2. Klik **Edit**
3. Ubah nama: `Test Penyakit Updated`
4. Klik **Update**
5. **Expected:** Data terupdate di tabel

#### E. Delete (Hapus Penyakit)
1. Cari penyakit `P99` di tabel
2. Klik **Hapus** atau **Delete**
3. Konfirmasi
4. **Expected:** Data terhapus dari tabel

### ✅ 6. Test CRUD Admin - Gejala (Admin Only)
1. Buka: http://localhost:8000/gejala
2. **Test Create/Update/Delete** sama seperti Penyakit
3. **Expected:** CRUD berfungsi normal

### ✅ 7. Test CRUD Admin - Basis Pengetahuan (Admin Only)
1. Buka: http://localhost:8000/pengetahuan
2. Isi form:
   - Kode Penyakit: Pilih dari dropdown
   - Kode Gejala: Pilih dari dropdown
   - MB (Measure Belief): 0.0 - 1.0
   - MD (Measure Disbelief): 0.0 - 1.0
3. **Expected:** CRUD berfungsi normal

### ✅ 8. Test Information Pages (Public)
- http://localhost:8000/bantuan - Halaman bantuan
- http://localhost:8000/tentang - About page dengan CF formula
- http://localhost:8000/keterangan - Keterangan penyakit
- http://localhost:8000/harga - Info harga obat/vaksin

### ✅ 9. Test Logout
1. Saat login, buka: http://localhost:8000/logout
2. **Expected:** Session cleared, redirect ke home

### ✅ 10. Test Auth Middleware
1. Logout terlebih dahulu
2. Coba akses: http://localhost:8000/penyakit
3. **Expected:** Redirect ke `/formlogin` dengan pesan error

---

## PHPStorm Configuration Tips

### 1. Enable Laravel Plugin
1. **File > Settings** (Windows) atau **PHPStorm > Preferences** (Mac)
2. **Plugins > Marketplace**
3. Search: **Laravel**
4. Install **Laravel** dan **Laravel Idea** (optional, paid)
5. Restart PHPStorm

### 2. Configure PHP Interpreter
1. **File > Settings > PHP**
2. **CLI Interpreter** > Klik **...**
3. Klik **+** > **Other Local**
4. **PHP executable:** Browse ke php.exe Anda
   - XAMPP: `C:\xampp\php\php.exe`
   - MAMP: `/Applications/MAMP/bin/php/phpX.X.X/bin/php`
5. Klik **OK**

### 3. Configure Database Connection
1. **View > Tool Windows > Database** atau `Ctrl+Shift+D`
2. Klik **+** > **Data Source** > **MySQL**
3. Isi koneksi:
   - Host: `localhost`
   - Port: `3306`
   - Database: `spkayam`
   - User: `root`
   - Password: (sesuai MySQL Anda)
4. **Test Connection**
5. Klik **OK**

### 4. Run Configuration untuk Artisan Commands
1. **Run > Edit Configurations**
2. Klik **+** > **PHP Script**
3. Name: `Artisan Serve`
4. File: `[project]/artisan`
5. Arguments: `serve`
6. Klik **OK**
7. Sekarang bisa run dengan **Shift+F10**

---

## Troubleshooting

### ❌ Error: "Class 'App\Models\...' not found"
**Solution:**
```bash
composer dump-autoload
```

### ❌ Error: "No application encryption key has been specified"
**Solution:**
```bash
php artisan key:generate
```

### ❌ Error: "SQLSTATE[HY000] [2002] Connection refused"
**Causes & Solutions:**

1. **MySQL tidak running**
   - Start XAMPP/MAMP MySQL service
   - Atau: `mysql.server start` (Mac)

2. **Kredensial salah di .env**
   - Cek `DB_USERNAME` dan `DB_PASSWORD`
   - Default XAMPP: user=`root`, pass=`(kosong)`
   - Default MAMP: user=`root`, pass=`root`

3. **Database belum dibuat**
   ```sql
   CREATE DATABASE spkayam;
   ```

### ❌ CSS tidak muncul / hanya teks
**Solution sudah fixed!**
- Commit `b0955ef` sudah memindahkan `aset/` ke lokasi yang benar
- Jika masih error: `php artisan cache:clear`

### ❌ Error: "500 Internal Server Error"
**Check logs:**
```bash
tail -f storage/logs/laravel.log
```

**Common causes:**
1. Permission issue:
   ```bash
   # macOS/Linux
   chmod -R 775 storage bootstrap/cache
   
   # Windows (run PHPStorm as Administrator)
   ```

2. Missing dependencies:
   ```bash
   composer install
   ```

### ❌ Error: "419 Page Expired" saat submit form
**Cause:** CSRF token expired
**Solution:**
1. Refresh halaman
2. Submit ulang
3. Atau clear session: `php artisan session:flush`

### ❌ Composer sangat lambat
**Solution:**
```bash
composer install --no-scripts --ignore-platform-reqs
```

---

## Checklist Audit Project ✅

### ✅ Framework & Setup
- [x] Laravel 10.49.1 installed
- [x] Composer dependencies complete
- [x] .env configured
- [x] Application key generated
- [x] Database migrations created
- [x] Sample data available

### ✅ Authentication System
- [x] Login form accessible (`/formlogin`)
- [x] Admin login working (admin/admin)
- [x] Session-based auth (MD5 compatible)
- [x] Logout working
- [x] Auth middleware protecting admin routes
- [x] Password change feature

### ✅ Diagnosis System (Core Feature)
- [x] Diagnosis form (`/diagnosa`)
- [x] Symptom selection (checkboxes)
- [x] Certainty Factor calculation
- [x] Disease ranking by CF score
- [x] Results display with solutions
- [x] Diagnosis history saved

### ✅ CRUD Operations (Admin)
- [x] **Penyakit (Diseases):** Create, Read, Update, Delete
- [x] **Gejala (Symptoms):** Create, Read, Update, Delete
- [x] **Basis Pengetahuan (Knowledge Base):** Create, Read, Update, Delete
- [x] **Post (Articles):** Create, Read, Update, Delete
- [x] **Admin Users:** Create, Read, Update, Delete

### ✅ Public Pages
- [x] Homepage with stats
- [x] Bantuan (Help)
- [x] Tentang (About)
- [x] Keterangan (Disease Info)
- [x] Harga (Price Info)

### ✅ Data & Models
- [x] 7 Models with relationships
- [x] Eloquent ORM working
- [x] Database seeded with sample data
- [x] Migrations match legacy schema

### ✅ Views & UI
- [x] Blade templating
- [x] AdminLTE styling
- [x] Bootstrap CSS loaded
- [x] Responsive layout
- [x] Menu system working

### ✅ Routing
- [x] Public routes accessible
- [x] Protected routes require auth
- [x] RESTful URL structure
- [x] All routes registered

---

## Contact & Support

**Original Developer:** Januriawan  
**Laravel Conversion:** GitHub Copilot  
**Framework:** Laravel 10.49.1  
**License:** Open Source

---

## Quick Reference Commands

```bash
# Start server
php artisan serve

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Database
php artisan migrate
php artisan migrate:fresh --seed

# Composer
composer install
composer dump-autoload

# Check routes
php artisan route:list

# Check Laravel info
php artisan about
```

---

**🎉 Setup Complete! Project siap digunakan untuk development lokal.**
