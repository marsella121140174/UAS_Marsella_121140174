<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1);
    session_start();
    require_once('../ProdukController.php');
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $category = $_POST['category'];

        $produkController = new ProdukController();
        $response = $produkController->createProduk($nama_produk, $harga, $stok, $category);

        if($response['status']){
            header('Location: ../../view/dashboard.php');
            exit();
        }
    }
?>