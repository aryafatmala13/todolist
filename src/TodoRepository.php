<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/Todo.php';

class TodoRepository {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM todolist ORDER BY id DESC");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $todos = [];
        foreach ($rows as $row) {
            $todos[] = new Todo(
                $row['id'],
                $row['Judul'],
                $row['deskripsi'],
                $row['status'],
                $row['created_at']
            );
        }
        return $todos;
    }

    public function create($judul, $deskripsi) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO todolist (Judul, deskripsi) VALUES (?, ?)"
        );
        return $stmt->execute([$judul, $deskripsi]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare(
            "DELETE FROM todolist WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
    // Ambil 1 todo berdasarkan id
public function getById($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM todolist WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update todo
public function update($id, $judul, $deskripsi, $status) {
    $stmt = $this->pdo->prepare(
        "UPDATE todolist 
         SET Judul = ?, deskripsi = ?, status = ?
         WHERE id = ?"
    );
    return $stmt->execute([$judul, $deskripsi, $status, $id]);
}

}
