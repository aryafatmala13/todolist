<?php

// Konfigurasi koneksi database
$host = "localhost";
$dbname = "todo_list";
$user = "root";
$pass = "dika910700";

// Membuat koneksi PDO
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );

    // Mengatur mode error PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}