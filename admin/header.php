<?php
require_once "../functions.php";
session_start();

if (!isset($_SESSION['id_user']) || !isset($_SESSION['log-in']) || $_SESSION['level_user'] != 'admin') {
    echo "<script>
    alert('Login Terlebih Dahulu');
    window.location='../login.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Si Jajan Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../assets/js/DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css"
        integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/CSS/style.css">
</head>

<body>
    <header class="main-header">
        <h1 class="logo">
            <i class="fas fa-store"></i> Si Jajan
        </h1>
        <nav class="nav-menu">
            <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="data_produk.php"><i class="fa-solid fa-arrow-down"></i> Produk Masuk</a>
            <a href="data_keluar.php"><i class="fa-solid fa-arrow-up"></i> Produk Keluar</a>
            <a href="transaksi_keluar.php"><i class="fas fa-dollar-sign"></i> Laporan</a>
            <a href="#"><i class="fa-solid fa-user"></i> Profil</a>
            <a href="#"><i class="fas fa-file-alt"></i> Laporan Jajan</a>
        </nav>

        <p><?php echo "Selamat datang, " . $_SESSION['email'] . "!"; ?></p>
        <a href="../logout.php" onclick="return confirm('Yakin ingin keluar?')">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </header>

    <!-- Sisanya halaman konten Anda -->
</body>

</html>
