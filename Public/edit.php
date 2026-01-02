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

<h2>Edit Todo</h2>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $todo['id'] ?>">

    <label>Judul</label><br>
    <input type="text" name="judul" value="<?= htmlspecialchars($todo['Judul']) ?>" required>
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi"><?= htmlspecialchars($todo['deskripsi']) ?></textarea>
    <br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="pending" <?= $todo['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="selesai" <?= $todo['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>