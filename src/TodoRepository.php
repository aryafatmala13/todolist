<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/Todo.php'; 

// Repository untuk akses data todo
class TodoRepository {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Ambil semua data todo
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM todos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Simpan todo baru
    public function create($title, $description) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO todos (title, description) VALUES (?, ?)"
        );
        return $stmt->execute([$title, $description]);
    }

    // Hapus todo
    public function delete($id) {
        $stmt = $this->pdo->prepare(
            "DELETE FROM todos WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}
