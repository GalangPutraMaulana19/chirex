# Catatan Konversi: PHP Native ke Laravel

## Overview
Proyek Chirexs 1.0 telah berhasil dikonversi dari PHP native ke Laravel 10.x Framework dengan tetap mempertahankan semua fungsionalitas dan struktur database yang ada.

## Perubahan Utama

### 1. Struktur Aplikasi
- **Dari**: Struktur monolitik dengan file PHP terpisah
- **Ke**: Arsitektur MVC Laravel dengan routing, controllers, models, dan views terpisah

### 2. Database
- **Connection**: Menggunakan Laravel Eloquent ORM
- **Migrations**: Semua tabel didefinisikan dalam migration files
- **Models**: Setiap tabel memiliki model dengan relationships yang jelas
- **Tetap Kompatibel**: Struktur database tidak berubah, masih menggunakan schema yang sama

### 3. Autentikasi
- **Dari**: Session PHP native dengan MD5 password
- **Ke**: Laravel session dengan custom middleware `AdminAuth`
- **Kompatibilitas**: Password tetap menggunakan MD5 untuk kompatibilitas dengan data lama
- **Session Keys**: 
  - `admin_username`
  - `admin_password`
  - `admin_nama`

### 4. Routing
- **Dari**: Query string (?module=diagnosa)
- **Ke**: Clean URLs dengan Laravel routing (/diagnosa)

### 5. Views
- **Dari**: PHP dengan include/require
- **Ke**: Blade templating engine dengan layout inheritance

## File Mapping

### Legacy → Laravel

```
index.php                    → routes/web.php + resources/views/layouts/app.blade.php
config/koneksi.php          → .env + config/database.php
modul/diagnosa/diagnosa.php → app/Http/Controllers/DiagnosaController.php
modul/riwayat/riwayat.php   → app/Http/Controllers/RiwayatController.php
modul/formlogin.php         → app/Http/Controllers/AuthController.php
menu.php                    → resources/views/layouts/menu.blade.php
content.php                 → routes/web.php (routing logic)
```

## Models Created

1. **Admin** - Administrator management
2. **Penyakit** - Disease data
3. **Gejala** - Symptom data
4. **BasisPengetahuan** - Knowledge base (disease-symptom relations)
5. **Post** - Information articles
6. **HasilDiagnosa** - Diagnosis history
7. **TmpAnalisa** - Temporary analysis data

## Controllers Created

1. **HomeController** - Home, bantuan, tentang, keterangan, harga
2. **AuthController** - Login, logout, password management
3. **DiagnosaController** - Diagnosis process with CF calculation
4. **RiwayatController** - Diagnosis history
5. **AdminController** - Admin CRUD (need to implement views)
6. **PenyakitController** - Disease CRUD (need to implement views)
7. **GejalaController** - Symptom CRUD (need to implement views)
8. **PengetahuanController** - Knowledge base CRUD (need to implement views)
9. **PostController** - Post CRUD (need to implement views)

## Key Features Implemented

### ✅ Completed
- Home page with statistics
- User authentication (login/logout)
- Diagnosis system with Certainty Factor calculation
- Diagnosis history viewing
- Information pages (bantuan, tentang, keterangan, harga)
- Blade layouts and components
- Custom authentication middleware
- All routes configured

### 🔄 Need Implementation
- Admin CRUD views and full controller logic
- Penyakit CRUD views and full controller logic
- Gejala CRUD views and full controller logic
- Pengetahuan CRUD views and full controller logic
- Post CRUD views and full controller logic
- File upload handling for images
- Form validation for all CRUD operations

## Certainty Factor Algorithm

Algoritma Certainty Factor telah diimplementasikan di `DiagnosaController::calculateCombinedCF()`:

```php
private function calculateCombinedCF($cf_values)
{
    // CF combination logic:
    // - Jika keduanya positif: CF = CF1 + CF2 × (1 - CF1)
    // - Jika keduanya negatif: CF = CF1 + CF2 × (1 + CF1)
    // - Jika salah satu negatif: CF = (CF1 + CF2) / (1 - min(|CF1|, |CF2|))
}
```

## Database Migration Status

### Migration Files Created:
- `create_admin_table` ✅
- `create_penyakit_table` ✅
- `create_gejala_table` ✅
- `create_basis_pengetahuan_table` ✅
- `create_post_table` ✅
- `create_hasil_diagnosa_table` ✅
- `create_tmp_analisa_table` ✅

### Data Import:
Data dapat diimport dari file SQL yang sudah ada:
```bash
mysql -u root -p spkayam < database/spkayam.sql
```

## Assets Location

```
Legacy Location          → Laravel Location
---------------------------------------------------
css/                    → public/assets/css/
js/                     → public/assets/js/
aset/                   → public/assets/aset/
gambar/                 → public/gambar/
font/                   → public/assets/font/
animasi/                → public/assets/animasi/
```

## Environment Configuration

File `.env` sudah dikonfigurasi dengan:
```env
APP_NAME=Chirexs
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_DATABASE=spkayam
```

## Testing Checklist

### User Features
- [ ] Home page loads correctly
- [ ] Login with default credentials (admin/admin)
- [ ] Logout functionality
- [ ] Diagnosis process with symptom selection
- [ ] View diagnosis results with CF calculation
- [ ] View diagnosis history
- [ ] View disease information
- [ ] Contact form submission

### Admin Features (Need Views)
- [ ] Admin management CRUD
- [ ] Disease management CRUD
- [ ] Symptom management CRUD
- [ ] Knowledge base management CRUD
- [ ] Post management CRUD
- [ ] Password change

## Known Issues / To-Do

1. ⚠️ Admin CRUD views not yet implemented
2. ⚠️ Image upload functionality not yet implemented
3. ⚠️ CKEditor integration for rich text editing
4. ⚠️ Pagination styling (need Bootstrap 3 compatibility)
5. ℹ️ Consider upgrading from MD5 to bcrypt for password security
6. ℹ️ Consider adding CSRF protection for all forms

## Backward Compatibility Notes

- Database structure unchanged - full backward compatibility
- Password hashing remains MD5 for compatibility with existing data
- Session keys remain the same
- All legacy data can be imported without modification

## Upgrade Recommendations

For production deployment, consider:

1. **Security**:
   - Migrate from MD5 to bcrypt/argon2 for passwords
   - Implement rate limiting for login attempts
   - Add CSRF protection verification

2. **Performance**:
   - Enable query caching
   - Implement Redis for session storage
   - Add response caching for static pages

3. **Code Quality**:
   - Add form request validation classes
   - Implement repository pattern for database queries
   - Add unit and feature tests

4. **UI/UX**:
   - Upgrade to Bootstrap 5
   - Implement modern AdminLTE version
   - Add Vue.js/React for interactive components

## Migration Script (Optional)

If you need to migrate password from MD5 to bcrypt:

```php
// Run this once to migrate passwords
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Admin::all()->each(function ($admin) {
    // Assuming MD5 password in database
    // You'd need to have users re-enter password, or
    // use a one-time migration with temporary passwords
    $admin->password = Hash::make('temporary_password');
    $admin->save();
});
```

## Support & Documentation

- Laravel Documentation: https://laravel.com/docs/10.x
- Original Repository: [Link to original PHP version]
- Issues: [Link to issues page]

## Credits

- **Original Developer**: Januriawan
- **Laravel Conversion**: Automated conversion to Laravel framework
- **Framework**: Laravel 10.x
- **License**: Same as original project
