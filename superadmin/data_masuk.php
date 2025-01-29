<?php include 'header.php'; ?>

<link rel="stylesheet" href="../assets/CSS/data_produk.css">
<link rel="stylesheet" href="../assets/CSS/style.css" type="text/css">

<body>
<div class="main-content">
    <!-- ruang kreasi developer -->
    <div class="container">
        <div class="header">
            <h1>Produk Keluar</h1>
            <div class="button">
                <a href="tambah_kendaraan.php"><button>+ Tambah</button></a>
            </div>
        </div>

        <table id="produk">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Penyuplai</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count(getListBarangMasuk()) > 0) : ?>
                    <?php $no = 1; foreach(getListBarangMasuk() as $transaksi_masuk) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $transaksi_masuk['nama_produk']; ?></td>
                    <td><?php echo $transaksi_masuk['nama']; ?></td>
                    <td><?php echo $transaksi_masuk['jumlah']; ?></td>
                    <td><?php echo $transaksi_masuk['tanggal_masuk']; ?></td>
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
