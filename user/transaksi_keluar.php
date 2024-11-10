<?php
include 'header.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $jumlah_ambil = $_POST['jumlah_ambil'];
    $tanggal_keluar = $_POST['tanggal_keluar'];

    $message = "";

    if (!empty($id_produk) && !empty($jumlah_ambil) && !empty($tanggal_keluar)) {

        $id_produk = intval($id_produk); 
        $jumlah_ambil = intval($jumlah_ambil);  
        $tanggal_keluar = htmlspecialchars($tanggal_keluar); 

        $message = transaksiKeluar();
    } else {
        $message = "Data tidak lengkap, silakan isi semua kolom.";
    }
}


?>
<link rel="stylesheet" href="../assets/CSS/transaksi_keluar.css">
<link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">

<div class="main-content">
    <h1>Ambil Jajanan</h1>
    <div class="container">
        <header>
            <h2>Lapor Jajan</h2>
            <a href="dashboard.php" class="pure-button button-success">
                <i class="fa-solid fa-left-long"></i> Kembali
            </a>
        </header>
        
        <?php if (!empty($message)) echo $message; ?>

        <div class="form-container">
            <form action="transaksi_keluar.php" class="pure-form pure-form-stacked" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                <div class="input-group">
                    <label for="id_produk">Nama Produk</label>
                    <div class="input-icon">
                        <select id="id_produk" name="id_produk" class="pure-input-1">
                            <option value="">-- Pilih Jajanan --</option>
                            <?php foreach (getNamaProduk() as $product): ?>
                                <option value="<?php echo $product['id']; ?>"><?php echo $product['nama_produk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="input-group">
                    <label for="jumlah_ambil">Jumlah Ambil</label>
                    <div class="input-icon">
                        <input type="number" id="jumlah_ambil" name="jumlah_ambil" class="pure-input-1" min="1" placeholder="Masukkan Jumlah Barang Yang Kamu Ambil" autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <label for="tanggal_keluar">Tanggal Ambil</label>
                    <div class="input-icon">
                        <input type="datetime-local" class="pure-input-1" id="tanggal_keluar" name="tanggal_keluar">
                    </div>
                </div>
                <div class="input-group">
                    <input type="submit" class="pure-button button-success" name="submit" value="Simpan">
                </div>
            </form>
        </div>
    </div>
    <!-- END KREASI DEVELOPMENT -->
</div>

<?php include 'footer.php'; ?>