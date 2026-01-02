<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/TodoRepository.php';

$id = (int) $_POST['id'];
$judul = trim($_POST['judul']);
$deskripsi = $_POST['deskripsi'];
$status = $_POST['status'];

if ($judul === '') {
    die("Judul tidak boleh kosong");
}

$repo = new TodoRepository($pdo);
$repo->update($id, $judul, $deskripsi, $status);

header("Location: index.php");
exit;