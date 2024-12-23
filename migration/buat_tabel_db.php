<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../config/koneksi.php');

$koneksi = new Koneksi();
$conn = $koneksi->getConnection();

$sql_user = "CREATE TABLE users(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    ip VARCHAR(45) NOT NULL,
    agent VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$sql_produk = "CREATE TABLE produks(
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    harga DECIMAL(10,2) NOT NULL,
    stok INT(11) NOT NULL DEFAULT 0,
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if($conn->query($sql_user) === TRUE && $conn->query($sql_produk)){
    echo 'Berhasil Membuat User Tabel dan Produk Tabel';
}else{
    echo 'Gagal Membuat Tabel database';
}

$conn->close();
?>