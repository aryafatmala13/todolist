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
</head>
<body>

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
        Status: <?= htmlspecialchars($todo->status) ?>

        <form action="delete.php" method="post" style="display:inline">
            <input type="hidden" name="id" value="<?= $todo->id ?>">
            <button type="submit">Hapus</button>
        </form>
    </li>
<?php endforeach; ?>

</ul>


</body>
</html>
