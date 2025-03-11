<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'mahasiswaController.php';

$controller = new MahasiswaController();
$user = $controller->update($_GET['id']);

if (!isset($user)) {
    die("Data mahasiswa tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Mahasiswa</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Update Mahasiswa</h2>
    <!-- Form action menyertakan parameter id untuk memastikan update data yang tepat -->
    <form action="update.php?id=<?php echo htmlspecialchars($user['id']); ?>" method="POST">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo htmlspecialchars($user['name']); ?>" placeholder="Masukkan nama" required>
      </div>
      <div class="form-group">
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" class="form-control" value="<?php echo htmlspecialchars($user['nim']); ?>" placeholder="Masukkan NIM" required>
      </div>
      <div class="form-group">
        <label for="major">Jurusan</label>
        <input type="text" name="major" id="major" class="form-control" value="<?php echo htmlspecialchars($user['major']); ?>" placeholder="Masukkan jurusan" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
