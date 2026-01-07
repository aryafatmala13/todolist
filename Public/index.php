<?php

// Koneksi database
require_once __DIR__ . '/../config.php';

// Repository Todo
require_once __DIR__ . '/../src/TodoRepository.php';

// Membuat object repository
$repo = new TodoRepository($pdo);

// Mengambil semua data todo
$todos = $repo->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>

    <!-- File CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>Todo List</h2>

    <!-- Form tambah todo -->
    <form action="create.php" method="post">
    <input type="text" name="judul" placeholder="Judul" required>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
    <button type="submit">Tambah</button>
</form>

<hr>

 <!-- Daftar todo -->
<ul>
<?php foreach ($todos as $todo): ?>
    <li>
        <strong><?= htmlspecialchars($todo->judul) ?></strong><br>
        <?= htmlspecialchars($todo->deskripsi) ?><br>
        <small>Dibuat: <?= date('d-m-Y H:i', strtotime($todo->created_at)) ?></small><br>
       <?php if($todo->status == 'selesai'): ?>
    <span class="status-selesai">Status: selesai</span>
<?php else: ?>
    <span class="status-pending">Status: pending</span>
<?php endif; ?>

        <div style="margin-top: 10px;">

            <!-- Link edit -->
                <a href="edit.php?id=<?= $todo->id ?>" class="btn-edit">Edit</a>

            <!-- Form hapus -->
            <form action="delete.php" method="post" style="display:inline">
                <input type="hidden" name="id" value="<?= $todo->id ?>">
                <button type="submit">Hapus</button>
            </form>
        </div>
    </li>
<?php endforeach; ?>

</ul>


</body>
</html>
