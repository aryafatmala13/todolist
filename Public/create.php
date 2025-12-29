<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/TodoRepository.php';

$judul = trim($_POST['judul']);
$deskripsi = $_POST['deskripsi'];

if ($judul !== '') {
    $repo = new TodoRepository($pdo);
    $repo->create($judul, $deskripsi);
}