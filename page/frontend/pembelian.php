<div class="container-fluid px-4">
    <h1 class="mt-4">Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pembelian</li>
    </ol> 
    <hr>
    <a href="?page=pembelian_tambah" class="btn btn-primary mb-3">+ Tambah Pembelian</a>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Pembelian</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM penjualan LEFT JOIN pelanggan on pelanggan.id_pelanggan = penjualan.id_pelanggan");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['tanggal_penjualan']; ?></td>
                <td><?php echo $data['nama_pelanggan']; ?></td>
                <td><?php echo $data['total_harga']; ?></td>
                <td>
                    <a href="?page=penjualan_detail&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-primary">Detail</a>
                    <a href="?page=penjualan_hapus&id=<?php echo $data['id_penjualan']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
