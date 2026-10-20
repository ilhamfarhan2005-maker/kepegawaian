# Sistem Informasi Kepegawaian (Laravel)

Aplikasi web pengelolaan data kepegawaian dan departemen berbasis Laravel yang dibuat untuk memenuhi Live Coding Case Study mata kuliah Pemrograman Web Lanjut.

## Fitur Utama
- **Autentikasi & Otorisasi:** Sistem login, hashing password, dan proteksi middleware `auth`.
- **Database Relasional & Foreign Key:** Relasi One-to-Many antara tabel `departments` dan `employees` dengan proteksi integritas data relasi (`restrictOnDelete`).
- **CRUD & Validasi:** Pengelolaan data departemen dan pegawai lengkap dengan validasi form (nama, jabatan, format tanggal, dan nominal gaji).
- **Database Seeder:** Menyiapkan 1 akun user untuk pengujian, 3 departemen, dan 5 pegawai awal.

## Cara Menjalankan Aplikasi

1. Clone repository ini:
   ```bash
   git clone <URL_REPOSITORY_ANDA>
   cd kepegawaian