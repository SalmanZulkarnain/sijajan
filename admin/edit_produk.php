<?php include 'header.php'; ?>
<?php
$products = getProdukById();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_produk = $_POST['nama_produk'];
    $gambar = $_FILES['gambar_produk'];
    $barcode = $_POST['barcode'];
    $kode_produk = $_POST['kode_produk'];

    $result = updateProduk($nama_produk, $gambar, $barcode, $kode_produk, $id);

    // Menampilkan pesan sukses atau gagal
    if ($result['status'] === 'success') {
        echo "<script>alert('{$result['message']}'); window.location.href='data_produk.php';</script>";
    } else {
        echo "<script>alert('{$result['message']}');</script>";
    }
}
?>
<link rel="stylesheet" href="../assets/CSS/tambah_edit_produk.css">

<body>

    <div class="form-tambah-edit-container">
        <h2>Form Tambah Produk</h2>
        <form action="edit_produk.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $products['id']; ?>" required>
            <div class="form-tambah-edit-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" value="<?php echo htmlspecialchars($products['nama_produk']); ?>" required>
            </div>
            <?php if (!empty($products['gambar_produk'])): ?>
                <img src="<?php echo htmlspecialchars($products['gambar_produk']); ?>" alt="Gambar Produk" width="100">
                <p>Gambar saat ini</p>
            <?php endif; ?>
            <div class="form-tambah-edit-group">
                <label for="gambar">Gambar Produk</label>
                <input type="file" id="gambar" name="gambar_produk" accept="image/*" required>
            </div>
            <div class="form-tambah-edit-group">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" name="barcode" value="<?php echo htmlspecialchars($products['barcode']); ?>" required>
            </div>
            <div class="form-tambah-edit-group">
                <label for="kode_produksi">Kode Produksi</label>
                <input type="text" id="kode_produksi" name="kode_produk" value="<?php echo htmlspecialchars($products['kode_produk']); ?>" required>
            </div>
            <div class="form-tambah-edit-actions">
                <button type="submit" class="form-tambah-edit-button simpan">Simpan</button>
                <button type="button" class="form-tambah-edit-button batal" onclick="window.location.href='data_produk.php'">Batal</button>
            </div>
        </form>
    </div>
</body>
<?php include 'footer.php'; ?>