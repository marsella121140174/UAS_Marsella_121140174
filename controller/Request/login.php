<?php 
    session_start();
    require_once('../AuthController.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $login = new AuthController();

        $user = $login->authentication($username, $password);
        
        if($user){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../../view/dashboard.php');
            exit();
        }else{
            $msg = 'Username/Password Salah!';
            header('Location: ../../index.php?notif='.$msg);
            exit();
        }
    }
?>