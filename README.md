# UTS Pemrograman Web 2 — Sistem Manajemen Kategori Buku

* **Nama:** Naufal Setyabagas Alifian
* **NIM:** 60324033

---

## Deskripsi Aplikasi

Aplikasi ini merupakan sistem manajemen kategori buku berbasis web yang dibuat menggunakan **PHP Native** dan **MySQL**.
Fungsi utama aplikasi adalah untuk mengelola data kategori buku di perpustakaan dengan fitur CRUD (Create, Read, Update, Delete).

Fitur utama:

* Menampilkan daftar kategori buku
* Menambahkan kategori baru
* Mengedit data kategori
* Menghapus kategori
* Validasi input (server-side)

---

## Cara Instalasi & Menjalankan

### 1. Clone Repository

```bash
git clone https://github.com/username/uts-pemrograman-web-2-60324033.git
```

### 2. Pindahkan ke Folder Server

Letakkan folder project ke:

* **Laragon:** `C:\laragon\www\`
* **XAMPP:** `C:\xampp\htdocs\`

---

### 3. Buat Database

* Buka **phpMyAdmin**
* Buat database:

```
uts_perpustakaan_60324033
```

* Import file:

```
database_backup.sql
```

---

### 4. Konfigurasi Database

Edit file:

```
config/database.php
```

Sesuaikan:

```php
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '123');
```

---

### 5. Jalankan Aplikasi

Buka browser:

```
http://localhost/uts_60324033/
```

---

## Struktur Folder

```
uts_60324033/
├── config/
│   └── database.php
├── index.php
├── create.php
├── edit.php
├── delete.php
└── uts_perpustakaan_60324033.sql
```
