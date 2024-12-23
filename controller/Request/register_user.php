<?php
session_start();
require_once('../AuthController.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = (new AuthController())->register($email, $username, $password);

    if($auth['status'] == true){
        header('location: ../../index.php?notif='.$auth['msg'].'');
        exit();
    }else{
        header('location: ../../index.php?notif='.$auth['msg'].'');
        exit();
    }
}