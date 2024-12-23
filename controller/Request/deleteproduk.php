<?php 

    session_start();
    require_once('../ProdukController.php');
    
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        $id = $_GET['id'];

        $produkController = new ProdukController();
        $response = $produkController->deleteProduk($id);

        if($response['status']){
            header('Location: ../../view/dashboard.php');
            exit();
        }
    }
?>