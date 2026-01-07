<?php

// Koneksi database
require_once __DIR__ . '/../config.php';

// Repository Todo
require_once __DIR__ . '/../src/TodoRepository.php';

// Mengambil ID todo dari URL
$id = (int) $_GET['id'];

// Membuat object repository
$repo = new TodoRepository($pdo);

// Mengambil data todo berdasarkan ID
$todo = $repo->getById($id);

// Jika data tidak ditemukan, hentikan program
if (!$todo) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>

    <!-- Memanggil file CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Todolist</h2>

    <!-- Form update todo -->
    <form action="update.php" method="post">

    <!-- ID disembunyikan -->
    <input type="hidden" name="id" value="<?= $todo->id ?>">

    <label>Judul</label><br>
    <input type="text" name="judul" value="<?= htmlspecialchars($todo->judul) ?>" required>
    <br><br>

    <label>Deskripsi</label><br>
    <textarea name="deskripsi"><?= htmlspecialchars($todo->deskripsi) ?></textarea>
    <br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="pending" <?= $todo->status == 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="selesai" <?= $todo->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>

<a href="index.php">Kembali</a>

</body>
</html>