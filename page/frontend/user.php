<?php if ($_SESSION['user']['level'] == 'admin') { ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
    </ol>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Nama user</th>
            <th>Username</th>
            <th>level</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['level']; ?></td>
                <td>
                    <a href="?page=user_ubah&id_user=<?php echo $data['id_user']; ?>" class="btn btn-primary">Ubah</a>
                    <a href="?page=user_hapus&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>

<?php } else { ?>

 <h1>mau ngapain?</h1>


<?php } ?>
