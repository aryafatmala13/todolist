Todolist
Aplikasi Todo List sederhana menggunakan PHP native, MySQL, dan PDO

1. Deskripsi Aplikasi

Aplikasi Todo List adalah aplikasi web sederhana untuk mencatat daftar tugas.  
Aplikasi ini menyediakan fitur:
- Menambah tugas (todo)
- Menampilkan daftar tugas
- Mengedit tugas
- Menghapus tugas

Entitas yang Dipilih

    Entitas: Todo
        Atribut:
            - id — integer, primary key, auto increment
            - Judul — teks
            - deskripsi — teks
            - status — pilihan (pending / selesai)
            - created_at — timestamp

Penjelasan Singkat Fungsi Aplikasi

    - Create: Menambah data todo melalui form
    - Read: Menampilkan daftar todo di halaman utama
    - Update: Mengubah judul, deskripsi, dan status todo
    - Delete: Menghapus todo berdasarkan ID

2. Lingkungan Pengembangan

Bahasa dan Tools:
- PHP: 8.x
- Database: MySQL / MariaDB
- Server: PHP Built-in Server
- Front-End: HTML dan CSS
- Koneksi Database: PDO (PHP Data Objects)

3. Hasil Pengembangan

Fitur yang berhasil diimplementasikan:
- CRUD Todo List
- Validasi input sederhana (judul tidak boleh kosong)
- Pemisahan logika database menggunakan Repository
- Tampilan HTML sederhana

4. Struktur Folder
```
    todolist
    │
    ├── public/
    │   ├── assets/
    │   │   └── style.css
    │   ├── index.php
    │   ├── create.php
    │   ├── edit.php
    │   ├── update.php
    │   └── delete.php
    │
    ├── src/
    │   ├── Todo.php
    │   └── TodoRepository.php
    │
    ├── config.php
    ├── todolist.sql
    └── README.md
```
5. Penjelasan File Utama

    1. config.php
        - Mengatur koneksi database menggunakan PDO

    2. Todo.php
        - Class entity untuk merepresentasikan data todo

    3. TodoRepository.php
        - Class untuk operasi database (CRUD):
            - getAll()
            - getById(id)
            - create(judul, deskripsi)
            - update(id, judul, deskripsi, status)
            - delete(id)

6. Cara Instalasi dan Menjalankan Aplikasi

Import Database

Gunakan file `todolist.sql` atau jalankan query berikut:

```
    CREATE DATABASE todo_list;
    USE todo_list;

    CREATE TABLE todolist (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Judul VARCHAR(150) NOT NULL,
        deskripsi TEXT,
        status ENUM('pending','selesai') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
```
Pengaturan Koneksi Database
```
Edit file `config.php`:

    $host = "localhost";
    $dbname = "todo_list";
    $user = "root";
    $pass = "";
```
Menjalankan Aplikasi

Jalankan perintah berikut di folder project:
```
    php -S localhost:8000 -t public
```
Buka browser dan akses:
```
    http://localhost:8000
```
7. Contoh Skenario Uji Singkat

Tambah Data
- Isi judul dan deskripsi
- Klik tombol Tambah
- Data tampil di daftar todo

Tampilkan Daftar Data
- Buka halaman utama
- Semua todo tampil di layar

Ubah Data
- Klik Edit
- Ubah data
- Klik Update
- Data berhasil diubah

Hapus Data
- Klik Hapus
- Data terhapus dari daftar