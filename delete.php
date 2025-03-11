<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'MahasiswaController.php';

if (!isset($_GET['id'])) {
    die("ID mahasiswa tidak ditemukan.");
}

$id = $_GET['id'];
$controller = new MahasiswaController();
$controller->delete($id);
?>