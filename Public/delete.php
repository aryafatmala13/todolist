<?php
// Koneksi database
require_once __DIR__ . '/../config.php';
// Repository Todo
require_once __DIR__ . '/../src/TodoRepository.php';

// Mengambil ID todo dari form (POST) dan memastikan tipe integer
$id = (int) $_POST['id'];

// Membuat object repository
$repo = new TodoRepository($pdo);
// Menghapus data todo berdasarkan ID
$repo->delete($id);


// Kembali ke halaman utama
header("Location: index.php");
exit;