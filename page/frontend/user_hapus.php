<?php

// Pastikan hanya admin yang dapat mengakses halaman ini
if ($_SESSION['user']['level'] != 'admin') {
    echo '<script>alert("Anda tidak memiliki akses!"); location.href="index.php";</script>';
    exit();
}

// Proses hapus data
if (isset($_GET['id'])) {
    $id_user = $_GET['id'];

    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_user'");

    if ($delete) {
        echo '<script>alert("Data berhasil dihapus!"); location.href="?page=user";</script>';
    } else {
        echo '<script>alert("Data gagal dihapus!"); location.href="?page=user";</script>';
    }
} else {
    echo '<script>alert("ID tidak ditemukan!"); location.href="?page=user";</script>';
}
?>
