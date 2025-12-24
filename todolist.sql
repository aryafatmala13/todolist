-- Buat database
CREATE DATABASE todo_list;
USE todo_list;

-- Membuat tabel to do list
CREATE TABLE todolist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Judul VARCHAR(150) NOT NULL,
    deskripsi TEXT,
    status ENUM('pending','selesai') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
