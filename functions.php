<?php

require_once 'config/config.php';

function getListProduct()
{
    global $db;

    $sql = "SELECT * FROM sijajan_produk";
    $eksekusi = $db->query($sql);

    $data = array();
    while ($row = $eksekusi->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getListBarangKeluar() {
    global $db;

    $sql = "SELECT sijajan_transaksi_keluar.*, sijajan_produk.nama_produk, sijajan_user.nama
            FROM sijajan_transaksi_keluar
            LEFT JOIN sijajan_produk ON sijajan_transaksi_keluar.id_produk = sijajan_produk.id
            LEFT JOIN sijajan_user ON sijajan_transaksi_keluar.id_user = sijajan_user.id
            WHERE sijajan_user.level_user = 'pengguna'"; // Menambahkan table alias jika perlu

    $eksekusi = $db->query($sql);

    $data = array();
    while ($row = $eksekusi->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getListBarangMasuk() {
    global $db;

    $sql = "SELECT sijajan_transaksi_masuk.*, sijajan_produk.nama_produk, sijajan_user.nama
            FROM sijajan_transaksi_masuk
            LEFT JOIN sijajan_produk ON sijajan_transaksi_masuk.id_produk = sijajan_produk.id
            LEFT JOIN sijajan_user ON sijajan_transaksi_masuk.id_user = sijajan_user.id
            WHERE sijajan_user.level_user = 'admin'";

    $eksekusi = $db->query($sql);

    $data = array();
    while ($row = $eksekusi->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function getNamaProduk()
{
    global $db;

    $sql = "SELECT * FROM sijajan_produk";
    $eksekusi = $db->query($sql);

    $data = array();
    while ($row = $eksekusi->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

function transaksiKeluar()
{
    global $db;

    $id_user = $_SESSION['id_user'];
    $id_produk = $_POST['id_produk'];
    $jumlah_ambil = $_POST['jumlah_ambil'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    
    $message = "";

    $sql_select = "SELECT jumlah FROM sijajan_transaksi_masuk WHERE id_produk = '$id_produk'";
    $eksekusi_select = $db->query($sql_select);

    if ($eksekusi_select->num_rows > 0) {
        $row = $eksekusi_select->fetch_assoc();
        $jumlah_tersedia = $row['jumlah'];

        if ($jumlah_ambil > $jumlah_tersedia) {
            return "Jumlah yang diminta melebihi jumlah yang tersedia.";
        }

        $sql_insert = "INSERT INTO sijajan_transaksi_keluar (id_produk, id_user, jumlah_ambil, tanggal_keluar) VALUES ('$id_produk', '$id_user', '$jumlah_ambil', '$tanggal_keluar')";
        $eksekusi_insert = $db->query($sql_insert);

        if ($eksekusi_insert) {
            $jumlah_tersedia_baru = $jumlah_tersedia - $jumlah_ambil;
            $sql_update = "UPDATE sijajan_transaksi_masuk SET jumlah = '$jumlah_tersedia_baru' WHERE id_produk = '$id_produk'";
            $eksekusi_update = $db->query($sql_update);

            if ($eksekusi_update) {
                header("Location: dashboard.php");
                exit;
            }
        }
    } else {
        return "Produk tidak ditemukan di transaksi masuk.";
    }
}