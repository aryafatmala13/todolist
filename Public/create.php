<?php

// Memanggil file konfigurasi database (PDO)
require_once __DIR__ . '/../config.php';

// Memanggil class TodoRepository
require_once __DIR__ . '/../src/TodoRepository.php';

// Mengambil data judul dari form dan menghapus spasi di awal & akhir
$judul = trim($_POST['judul']);

// Mengambil data deskripsi dari form
$deskripsi = $_POST['deskripsi'];

// Validasi sederhana: judul tidak boleh kosong
if ($judul !== '') {

    // Membuat object repository dengan koneksi PDO
    $repo = new TodoRepository($pdo);

    // Menyimpan data todo ke database
    $repo->create($judul, $deskripsi);
}

// Redirect kembali ke halaman utama
header("Location: index.php");
exit;