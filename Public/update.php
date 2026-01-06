<?php
// Koneksi database
require_once __DIR__ . '/../config.php';
//Repository Todo
require_once __DIR__ . '/../src/TodoRepository.php';

// Mengambil data dari form
$id = (int) $_POST['id'];
$judul = trim($_POST['judul']);
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];

// Validasi judul tidak boleh kosong
if ($judul === '') {
    die("Judul tidak boleh kosong");
}

// Membuat object repository
$repo = new TodoRepository($pdo);
// Update data todo
$repo->update($id, $judul, $deskripsi, $status);

// Kembali ke halaman utama index.php
header("Location: index.php");
exit;