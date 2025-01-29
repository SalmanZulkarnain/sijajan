<?php 
include 'header.php'; 
hapusProduk();
?>

<link rel="stylesheet" href="../assets/CSS/data_produk.css">

<div class="main-content">
    <!-- ruang kreasi developer -->
    <div class="container">
        <div class="header">
            <h1>Daftar Produk</h1>
            <div class="button">
                <a href="tambah_produk.php"><button>+ Tambah</button></a>
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
                        <a href="edit_produk.php?id=<?php echo $product['id']; ?>">Edit</a> |
                        <a href="data_produk.php?id=<?php echo $product['id']; ?>" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
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
