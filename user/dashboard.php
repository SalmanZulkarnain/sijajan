<?php include 'header.php'; ?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Layout Umum */
    body {
        display: flex;
        min-height: 100vh;
        background-color: #f5f5f5;
        /* Warna latar belakang */
    }

    .dashboard {
        display: flex;
        width: 100%;
    }

    .main-content {
        flex: 1;
        padding: 20px;
    }

    /* Gambar Banner atau Header */
    .banner {
        width: 100%;
        height: 300px;
        /* Sesuaikan dengan ukuran banner */
        background-image: url('../kurma-media.png');
        /* Ganti dengan path gambar banner */
        background-size: cover;
        background-position: center;
        border-radius: 8px;
        margin-bottom: 30px;
        /* Memberi jarak antara banner dan produk */
    }

    /* Header */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    header h2 {
        font-size: 24px;
        color: #455a64;
    }

    header h2 span {
        font-size: 16px;
        color: #78909c;
        margin-left: 10px;
    }

    /* Kartu Produk */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }

    .card {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    .card img {
        width: 100%;
        height: 150px;
        object-fit: contain;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 16px;
        margin: 10px 0;
        color: #37474f;
    }

    .card p {
        font-size: 14px;
        color: #546e7a;
        margin-bottom: 10px;
    }

    /* Tombol Ambil */
    .ambil-btn {
        display: inline-block;
        padding: 8px 15px;
        background-color: #28a745;
        /* Warna hijau untuk tombol */
        color: #ffffff;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .ambil-btn i {
        margin-right: 5px;
        /* Jarak antara ikon dan teks */
    }

    .ambil-btn:hover {
        background-color: #218838;
        /* Warna hijau lebih gelap saat hover */
        transform: scale(1.05);
    }
</style>

<div class="main-content">
    <header>
        <h2>User<span>Control Panel</span></h2>
    </header>
    <!-- ruang kreasi developer -->
    <section class="stats-grid">

        <?php foreach(getNamaProduk() as $product) : ?> 
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
            <div class="card-icon"><i class="fas fa-car"></i></div>
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