<?php

// Konfigurasi koneksi database
$host = "localhost";            //Nama Host Database biasanya menggunakan localhost
$dbname = "todo_list";          //Nama Database yang digunakan 
$user = "root";                 //Nama username Database
$pass = "";        //Password database diisi sesuai password MySQL

// Inisialisasi koneksi PDO ke MySQL
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );

    // Mengatur mode error PDO agar menampilkan exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Jika koneksi gagal program akan berhenti dan menaampilkan pesan error
    die("Koneksi database gagal: " . $e->getMessage());
}