<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/TodoRepository.php';

$id = (int) $_GET['id'];

$repo = new TodoRepository($pdo);
$todo = $repo->getById($id);

if (!$todo) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
</head>
<body>