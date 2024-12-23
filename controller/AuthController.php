<?php
require_once(__DIR__ . '/../config/koneksi.php');

class AuthController
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Koneksi())->getConnection();
    }

    public function authentication($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();

            if($password === $user['password']){
                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function register($email, $username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            return [
                'status' => false,
                'msg' => 'Email/Username Sudah Terdaftar'
            ];
        }

        $has_password = password_hash($password, PASSWORD_DEFAULT);

        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];

        $sql = "INSERT INTO users (username, email, password, ip, agent) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $username, $email, $password, $ip, $agent);

        if($stmt->execute()){
            return [
                'status' => true,
                'msg' => 'Register Berhasil.'
            ];;
        }
    }
}
?>