<?php include 'header.php'; ?>
<link rel="stylesheet" href="../assets/CSS/halaman_profil.css">
<div class="main-content">
    <!-- ruang kreasi developer -->
    <div class="card-profil">
        <div class="card-profil-header">
            <a href="add_user.php" class="pure-button-primary pure-button">Tambah Profil</a>
        </div>
        <div class="card-profil-content">
            <table id="profil" class="cell-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach (get_all_users() as $row): ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['level_user']; ?></td>
                            <td><a href="edit_user.php?id=<?php echo $row['id']; ?>" class="icon-box"> <i class="fa fa-gear"></i></a>| <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="icon-box"> <i class="fa fa-trash icon-color"></i></a></td>
                        </tr>
                    <?php $no++;
                    endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end kreasi development section -->
</div>
<?php include 'footer.php'; ?>