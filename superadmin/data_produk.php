<?php include 'header.php'; ?>

<link rel="stylesheet" href="../assets/CSS/data_produk.css">
<link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">

<div class="main-content">
    <!-- ruang kreasi developer -->
    <div class="container">
        <div class="header">
            <h1>Daftar Produk</h1>
            <div class="button">
                <a href="tambah_kendaraan.php"><button>+ Tambah</button></a>
            </div>
        </div>

        <table id="produk">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Gambar Produk</th>
                    <th>Barcode</th>
                    <th>Kode Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count(getListProduct()) > 0) : ?>
                    <?php $no = 1; foreach(getListProduct() as $product) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $product['nama_produk']; ?></td>
                    <td><img src="<?php echo $product['gambar_produk']; ?>" alt="<?php echo $product['nama_produk']; ?>" width="200"></td>
                    <td><?php echo $product['barcode']; ?></td>
                    <td><?php echo $product['kode_produk']; ?></td>
                    <td>
                        <a href="#">Edit</a> |
                        <a href="#">Hapus</a>
                    </td>
                </tr>
                    <?php $no++; endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
<?php include 'footer.php'; ?>
