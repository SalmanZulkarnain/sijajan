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
    background-color: #f5f5f5; /* Warna latar belakang */
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
    height: 300px; /* Sesuaikan dengan ukuran banner */
    background-image: url('../kurma-media.png'); /* Ganti dengan path gambar banner */
    background-size: cover;
    background-position: center;
    border-radius: 8px;
    margin-bottom: 30px; /* Memberi jarak antara banner dan produk */
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
    background-color: #28a745; /* Warna hijau untuk tombol */
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
    margin-right: 5px; /* Jarak antara ikon dan teks */
}

.ambil-btn:hover {
    background-color: #218838; /* Warna hijau lebih gelap saat hover */
    transform: scale(1.05);
}

</style>

<div class="main-content">
    <div class="banner"></div>

    <!-- ruang kreasi developer -->
    <section class="stats-grid">

        <div class="card">
            <img src="../coki.png" alt="Donat">
            <h3>Donat</h3>
            <p>Jajanan Manis dengan Gula Halus</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>

        <div class="card">
            <img src="../coki.png" alt="Es Krim">
            <h3>Es Krim</h3>
            <p>Es Krim dengan Rasa Cokelat dan Vanila</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>

        <div class="card">
            <img src="../coki.png" alt="Pizza Mini">
            <h3>Pizza Mini</h3>
            <p>Pizza dengan Topping Keju dan Sosis</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>

        <div class="card">
            <img src="../coki.png" alt="Roti Bakar">
            <h3>Roti Bakar</h3>
            <p>Roti Bakar dengan Isian Cokelat</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>

        <div class="card">
            <img src="../coki.png" alt="Permen Karet">
            <h3>Permen Karet</h3>
            <p>Permen Karet Aneka Rasa</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>

        <div class="card">
            <img src="../coki.png" alt="Popcorn">
            <h3>Popcorn</h3>
            <p>Popcorn Rasa Caramel</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>
        <div class="card">
            <img src="../coki.png" alt="Popcorn">
            <h3>Popcorn</h3>
            <p>Popcorn Rasa Caramel</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>
        <div class="card">
            <img src="../coki.png" alt="Popcorn">
            <h3>Popcorn</h3>
            <p>Popcorn Rasa Caramel</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>
        <div class="card">
            <img src="../coki.png" alt="Popcorn">
            <h3>Popcorn</h3>
            <p>Popcorn Rasa Caramel</p>
            <a href="transaksi_keluar.php" class="ambil-btn"><i class="fa fa-plus"></i> Ambil</a>
        </div>

    </section>
</div>
<!-- end kreasi development section -->

<?php include 'footer.php'; ?>
