# Chirexs 1.0 - Laravel Version

Sistem Pakar Diagnosa Penyakit Pada Ayam Menggunakan Metode Certainty Factor Berbasis Laravel.

## Requirements

- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM (optional, untuk asset compilation)

## Installation

1. Clone repository ini
```bash
git clone <repository-url>
cd chirex
```

2. Install dependencies
```bash
composer install
```

3. Copy file `.env.example` ke `.env`
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spkayam
DB_USERNAME=root
DB_PASSWORD=
```

6. Buat database
```bash
mysql -u root -p
CREATE DATABASE spkayam;
exit;
```

7. Jalankan migration dan import data
```bash
php artisan migrate
mysql -u root -p spkayam < database/spkayam.sql
```

8. Jalankan aplikasi
```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Default Login

- Username: `admin`
- Password: `admin`

## Fitur Utama

### Untuk Pengguna Umum:
- **Diagnosa**: Melakukan diagnosa penyakit ayam berdasarkan gejala
- **Riwayat**: Melihat riwayat diagnosa yang telah dilakukan
- **Keterangan**: Informasi lengkap tentang penyakit-penyakit ayam
- **Info Harga**: Informasi harga obat dan vaksin

### Untuk Administrator:
- **Admin**: Manajemen data administrator
- **Penyakit**: Manajemen data penyakit ayam
- **Gejala**: Manajemen data gejala penyakit
- **Pengetahuan**: Manajemen basis pengetahuan (rules)
- **Post Keterangan**: Manajemen artikel/informasi penyakit
- **Ubah Password**: Mengubah password admin

## Metode Certainty Factor (CF)

Sistem ini menggunakan metode Certainty Factor untuk menghitung tingkat kepastian diagnosa penyakit. Formula yang digunakan:

- **Jika CF1 dan CF2 positif**: CF = CF1 + CF2 × (1 - CF1)
- **Jika CF1 dan CF2 negatif**: CF = CF1 + CF2 × (1 + CF1)
- **Jika salah satu negatif**: CF = (CF1 + CF2) / (1 - min(|CF1|, |CF2|))

## Struktur Database

- `admin`: Data administrator
- `penyakit`: Data penyakit ayam
- `gejala`: Data gejala penyakit
- `basis_pengetahuan`: Basis pengetahuan (relasi penyakit-gejala dengan nilai MB dan MD)
- `post`: Artikel/informasi penyakit
- `hasil_diagnosa`: Riwayat hasil diagnosa
- `tmp_analisa`: Tabel temporary untuk proses diagnosa

## Technology Stack

- **Framework**: Laravel 10.x
- **Database**: MySQL
- **Frontend**: Bootstrap 3, AdminLTE
- **PHP Version**: 8.1+

## Original Developer

- **Januriawan** - Original PHP Version
- Converted to Laravel Framework

## License

Distributed under the XYZ license. See the original repository for more information.

## Disclaimer

Sistem ini hanya sebagai alat bantu diagnosa. Untuk penanganan lebih lanjut, konsultasikan dengan dokter hewan profesional.
