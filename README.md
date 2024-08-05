# Website Kehadiran Siswa
Website Kehadiran untuk  membantu pengelolaan data kehadiran siswa dan data siswa

### ADMIN
- Mengecek Status kehadiran siswa (Hadir, Sakit, Izin, Alpha)
- Mengecek Kehadiran berdasarkan status, tanggal, bulan, dan tahun
- Melakukan pencarian
- Menambah Siswa
- Menghapus Siswa
- Mengaktifkan dan Menonaktifkan Siswa
- Melihat identitas dan foto profil Siswa
- Mengubah profil Admin
- Mengubah foto profil Admin
- Mengubah Password

### SISWA
- Melakukan Absensi 
- Mengubah identitas di profil
- Mengubah Foto Profil 
- Mengubah Password

## Persyaratan Sistem
- Laravel 11
- PHP 8.2
- bootstrap 5.3.3
- composer
- npm
- Membutuhkan ekstensi php GD untuk intervention image

Install package melalui Composer
```bash
    composer install
```
Update package Composer
```bash
    composer update
```
Install package melalui NPM
```bash
    npm install
```
Update package NPM
```bash
    npm update
```
Jalankan key generate Aplikasi
```bash
    php artisan key:generate
```
Ubah nama file .env.example menjadi .env dan ubah bagian dibawah ini sesuai kebutuhan
```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=kehadiran_db
    DB_USERNAME=root
    DB_PASSWORD=
```
(jika tidak memiliki database jalankan perintah di bawah ini) <br>
Jalankan migration 
```bash
    php artisan migrate
```
Jalankan database seeders untuk mengisi database table user 
```bash
    php artisan db:seed --class=DatabaseSeeder
```
Jalankan laravel server lokal (jika ingin menjalankan server lokal)
```bash
    php artisan serve
```

