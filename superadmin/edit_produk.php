<?php include 'header.php'; ?>
<link rel="stylesheet" href="../assets/CSS/tambah_edit_produk.css">
<link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">
<body>
    <div class="form-tambah-edit-container">
        <h2>Form Edit Produk</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-tambah-edit-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="form-tambah-edit-group">
                <label for="gambar">Gambar Produk</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="form-tambah-edit-group">
                <label for="barcode">Barcode</label>
                <input type="text" id="barcode" name="barcode" required>
            </div>
            <div class="form-tambah-edit-group">
                <label for="kode_produksi">Kode Produksi</label>
                <input type="text" id="kode_produksi" name="kode_produk" required>
            </div>
            <div class="form-tambah-edit-actions">
                <button type="submit" class="form-tambah-edit-button simpan">Simpan</button>
                <button type="button" class="form-tambah-edit-button batal" onclick="window.location.href='data_produk.html'">Batal</button>
            </div>
        </form>
    </div>
</body>
<?php include 'footer.php'; ?>
