<?php

class Koneksi
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'uas_pemweb';
    private $port = '8889';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->dbname,
            $this->port
        );

        if($this->conn->connect_error){
            die('Koneksi Gagagl: '.mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function close()
    {
        $this->conn->close();
    }
}
