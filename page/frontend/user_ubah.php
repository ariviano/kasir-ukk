<?php

// Pastikan hanya admin yang dapat mengakses halaman ini
if ($_SESSION['user']['level'] != 'admin') {
    echo '<script>alert("Anda tidak memiliki akses!"); location.href="index.php";</script>';
    exit();
}

// Ambil data user berdasarkan ID
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
    $data = mysqli_fetch_array($query);

    if (!$data) {
        echo '<script>alert("Data tidak ditemukan!"); location.href="?page=user";</script>';
        exit();
    }
}

// Proses update data
if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $level = $_POST['level'];
    $password = !empty($_POST['password']) ? md5($_POST['password']) : $data['password'];

    $update = mysqli_query($koneksi, "UPDATE user SET 
        nama='$nama',
        username='$username',
        password='$password',
        level='$level' 
        WHERE id_user='$id_user'");

    if ($update) {
        echo '<script>alert("Data berhasil diubah!"); location.href="?page=user";</script>';
    } else {
        echo '<script>alert("Data gagal diubah!");</script>';
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="?page=user">User</a></li>
        <li class="breadcrumb-item active">Ubah User</li>
    </ol>
    <hr>
    <form method="POST">
        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
        </div>
        <div class="form-group mb-3">
            <label>Password (Kosongkan jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Level</label>
            <select name="level" class="form-control" required>
                <option value="admin" <?php if ($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="petugas" <?php if ($data['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
            </select>
        </div>
        <button type="submit" name="ubah" class="btn btn-success">Simpan Perubahan</button>
        <a href="?page=user" class="btn btn-danger">Batal</a>
    </form>
</div>
