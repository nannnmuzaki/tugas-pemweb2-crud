<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . 'Mahasiswa.php';

class MahasiswaController {
    private $mahasiswaModel;

    public function __construct() {
        $this->mahasiswaModel = new Mahasiswa();
    }

    public function index() {
        return $this->mahasiswaModel->getAllUsers();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nim = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $major = filter_input(INPUT_POST, 'major', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($name && $nim && $major) {
                $this->mahasiswaModel->createUser($name, $nim, $major);
                header("Location: index.php");
                exit;
            }
        }
    }

    public function update($id) {
        $user = $this->mahasiswaModel->getUserById($id);
        if (!$user) {
            die("Mahasiswa tidak ditemukan.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nim = filter_input(INPUT_POST, 'nim', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $major = filter_input(INPUT_POST, 'major', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($name && $nim && $major) {
                $this->mahasiswaModel->updateUser($id, $name, $nim, $major);
                header("Location: index.php");
                exit;
            }
        }
        return $user;
    }

    public function delete($id) {
        if ($this->mahasiswaModel->getUserById($id)) {
            $this->mahasiswaModel->deleteUser($id);
        }
        header("Location: index.php");
        exit;
    }
}
