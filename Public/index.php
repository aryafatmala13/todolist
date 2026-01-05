<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../src/TodoRepository.php';

$repo = new TodoRepository($pdo);
$todos = $repo->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>Todo List</h2>

    <form action="create.php" method="post">
    <input type="text" name="judul" placeholder="Judul" required>
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
    <button type="submit">Tambah</button>
</form>

<hr>

<ul>
<?php foreach ($todos as $todo): ?>
    <li>
        <strong><?= htmlspecialchars($todo->judul) ?></strong><br>
        <?= htmlspecialchars($todo->deskripsi) ?><br>
        <small>Dibuat: <?= date('d-m-Y H:i', strtotime($todo->created_at)) ?></small><br>
        <span class="status-badge">Status: <?= htmlspecialchars($todo->status) ?></span>

        <div style="margin-top: 10px;">
                <a href="edit.php?id=<?= $todo->id ?>" class="btn-edit">Edit</a>

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
