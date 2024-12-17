<?php
if (isset($_POST['nama_produk'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $stock = mysqli_real_escape_string($koneksi, $_POST['stock']);

    $query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,harga,stock) values('$nama','$harga','$stock')");
    if ($query) {
        echo '<script>alert("Tambah Data Berhasil")</script>';
    } else {
        echo '<script>alert("Tambah Data Gagal")</script>';
    }
}
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-danger">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" type="text" name="nama_produk" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td>
                    <textarea name="harga" rows="5" class="form-control" required></textarea>
                </td>
            </tr>
            </tr>
            <tr>
                <td>Stock</td>
                <td>:</td>
                <td>
                    <textarea name="stock" rows="5" class="form-control" required></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>
