<?php include 'header.php'; ?>

<link rel="stylesheet" href="../assets/CSS/data_produk.css">

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
                    <th>Pengambil</th>
                    <th>Jumlah Ambil</th>
                    <th>Tanggal Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count(getListBarangKeluar()) > 0) : ?>
                    <?php $no = 1; foreach(getListBarangKeluar() as $transaksi_keluar) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $transaksi_keluar['nama_produk']; ?></td>
                    <td><?php echo $transaksi_keluar['nama']; ?></td>
                    <td><?php echo $transaksi_keluar['jumlah_ambil']; ?></td>
                    <td><?php echo $transaksi_keluar['tanggal_keluar']; ?></td>
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

    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#produk').DataTable({
                responsive: true,
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: false,
                pageLength: 10
            });
        });
    </script>
</body>
<?php include 'footer.php'; ?>
