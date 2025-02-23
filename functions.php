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

function getListBarangKeluar()
{
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

function getListBarangMasuk()
{
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

function tambahProduk($nama_produk, $gambar, $barcode, $kode_produk)
{
    global $db;

    // Cek apakah ada file yang diupload
    if (isset($gambar) && $gambar['error'] == 0) {
        // Tentukan direktori untuk menyimpan gambar
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($gambar["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi format gambar
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (in_array($imageFileType, $allowed_types)) {
            // Pindahkan file gambar yang diupload ke direktori yang ditentukan
            if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
                // Simpan data ke database
                $query = "INSERT INTO sijajan_produk (nama_produk, gambar_produk, barcode, kode_produk) VALUES (?, ?, ?, ?)";
                $stmt = $db->prepare($query);
                $stmt->bind_param("ssss", $nama_produk, $target_file, $barcode, $kode_produk);

                if ($stmt->execute()) {
                    return ["status" => "success", "message" => "Produk berhasil ditambahkan"];
                } else {
                    return ["status" => "error", "message" => "Gagal menyimpan data produk"];
                }
            } else {
                return ["status" => "error", "message" => "Gagal mengupload gambar"];
            }
        } else {
            return ["status" => "error", "message" => "Format file tidak didukung"];
        }
    } else {
        return ["status" => "error", "message" => "Tidak ada gambar yang diupload"];
    }
}

function hapusProduk() {
    global $db; 

    if(isset($_GET['id'])) {
        $get_id = $_GET['id'];

        $sql = "DELETE FROM sijajan_produk WHERE id='$get_id'";
        $eksekusi = $db->query($sql);

        if($eksekusi) {
            header('Location: data_produk.php');
            exit;
        }
    }
}

function getProdukById() {
    global $db;

    $data = array();
    if (isset($_GET['id'])) {
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM sijajan_produk WHERE id = '$get_id'";
        $eksekusi = $db->query($sql);

        if ($eksekusi && $eksekusi->num_rows > 0) {
            $data = $eksekusi->fetch_assoc();
        }
    }
    return $data;
}

function updateProduk($nama_produk, $gambar, $barcode, $kode_produk, $id)
{
    global $db;

    // Ambil path gambar lama dari database jika tidak ada gambar baru
    $query = "SELECT gambar_produk FROM sijajan_produk WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $gambar_lama = $result['gambar_produk'];

    // Tentukan direktori untuk menyimpan gambar
    $target_dir = "./uploads/";
    $target_file = $target_dir . basename($gambar["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "jpeg", "png", "gif"];

    // Jika ada gambar baru yang diunggah, gunakan gambar baru
    if (isset($gambar) && $gambar['error'] == 0 && in_array($imageFileType, $allowed_types)) {
        if (move_uploaded_file($gambar["tmp_name"], $target_file)) {
            // Ganti gambar lama dengan gambar baru
            $gambar_produk = $target_file;

            // Hapus gambar lama jika ada dan bukan gambar default
            if ($gambar_lama && file_exists($gambar_lama)) {
                unlink($gambar_lama);
            }
        } else {
            return ["status" => "error", "message" => "Gagal mengupload gambar"];
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $gambar_produk = $gambar_lama;
    }

    // Simpan data ke database
    $query = "UPDATE sijajan_produk SET nama_produk=?, gambar_produk=?, barcode=?, kode_produk=? WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ssssi", $nama_produk, $gambar_produk, $barcode, $kode_produk, $id);

    if ($stmt->execute()) {
        return ["status" => "success", "message" => "Produk berhasil diupdate"];
    } else {
        return ["status" => "error", "message" => "Gagal menyimpan data produk"];
    }
}

function get_all_users() {
    global $db;
    $sql = "SELECT * FROM sijajan_user";
    $result = $db->query($sql);

    $users = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }

    return $users;
}