<?php include 'header.php'; ?>
<link rel="stylesheet" href="../assets/CSS/dashboard.css">

<div class="main-content">
    <div class="banner"></div>
    <!-- ruang kreasi developer -->
    <section class="stats-grid">

        <?php foreach (getNamaProduk() as $product) : ?>
            <div class="card">
                <img src="../coki.png" alt="<?php echo $product['nama_produk'] ?>">
                <h3><?php echo $product['nama_produk'] ?></h3>
                <!-- <p>Jajanan Manis dengan Gula Halus</p> -->
                <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
            </div>
        <?php endforeach; ?>

    </section>
    <!-- ruang kreasi developer -->
    <section class="stats-grid">

        <div class="card orange">
            <div class="card-icon"><i class="fa-solid fa-cookie"></i></div>
            <h3><?php ?></h3>
            <p>Total Jajan Minggu Ini</p>
        </div>

        <div class="card green">
            <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
            <h3>Rp <?php ?></h3>
            <p>Total Harga Jajanan</p>
        </div>
    </section>
</div>
<!-- end kreasi development section -->
</div>

<?php include 'footer.php'; ?>