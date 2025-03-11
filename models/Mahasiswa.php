<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.php';

class Mahasiswa {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM students");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($name, $nim, $major) {
        $stmt = $this->pdo->prepare("INSERT INTO students (name, nim, major) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $nim, $major]);
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $name, $nim, $major) {
        $stmt = $this->pdo->prepare("UPDATE students SET name=?, nim=?, major=? WHERE id=?");
        return $stmt->execute([$name, $nim, $major, $id]);
    }

    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
