<?php

// Konfigurasi koneksi database
$host = "localhost";
$dbname = "todo_list";
$user = "root";

// 1. DAFTAR PASSWORD UNTUK DICOBA (Tambahkan di sini jika ada password lain)
$daftar_password = ["", "root", "admin","dika910700"]; 
$pdo = null;

// 2. PROSES PENCARIAN PASSWORD YANG COCOK
foreach ($daftar_password as $pass_coba) {
    try {
        // Coba koneksi ke MySQL (Tanpa pilih dbname dulu supaya bisa buat DB otomatis)
        $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass_coba);

        // Jika berhasil sampai sini, berarti password $pass_coba adalah yang benar
        break; 
    } catch (PDOException $e) {
        // Jika gagal, lanjut ke password berikutnya dalam daftar
        continue;
    }
}

// Jika setelah mencoba semua password tetap tidak bisa konek
if (!$pdo) {
    die("Koneksi database gagal: Semua password salah atau MySQL tidak aktif.");
}

// 3. JALANKAN LOGIKA PEMBUATAN DATABASE & TABEL (Sama seperti kodinganmu sebelumnya)
try {
    // Mengatur mode error PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // OTOMATIS: Buat Database jika belum ada
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_general_ci;");

    // Masuk/Gunakan database tersebut
    $pdo->exec("USE $dbname;");

    // OTOMATIS: Buat Tabel 'todolist' jika belum ada
    $sqlTabel = "CREATE TABLE IF NOT EXISTS todolist (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Judul VARCHAR(150) NOT NULL,
        deskripsi TEXT,
        status ENUM('pending','selesai') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    $pdo->exec($sqlTabel);

} catch (PDOException $e) {
    die("Gagal memproses database: " . $e->getMessage());
}