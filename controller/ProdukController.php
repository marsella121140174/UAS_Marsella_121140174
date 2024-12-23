<?php
require_once(__DIR__ . '/../config/koneksi.php');

class ProdukController
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Koneksi())->getConnection();
    }

    public function createProduk($nama_produk, $harga, $stok, $category)
    {
        $sql = "INSERT INTO produks (nama_produk, harga, stok, category) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sdss', $nama_produk, $harga, $stok, $category);
        
        if ($stmt->execute()) {
            return [
                'status' => true,
                'msg' => 'Produk berhasil ditambahkan.'
            ];
        } else {
            return [
                'status' => false,
                'msg' => 'Gagal menambahkan produk.'
            ];
        }
    }

    public function getAllProduk()
    {
        $sql = "SELECT * FROM produks";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [
                'status' => false,
                'msg' => 'Tidak ada produk ditemukan.'
            ];
        }
    }

    public function getProdukById($id)
    {
        $sql = "SELECT * FROM produks WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return [
                'status' => false,
                'msg' => 'Produk tidak ditemukan.'
            ];
        }
    }


    public function updateProduk($id, $nama_produk, $harga, $stok, $category)
    {
        $sql = "UPDATE produks SET nama_produk = ?, harga = ?, stok = ?, category = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sdssi', $nama_produk, $harga, $stok, $category, $id);

        if ($stmt->execute()) {
            return [
                'status' => true,
                'msg' => 'Produk berhasil diperbarui.'
            ];
        } else {
            return [
                'status' => false,
                'msg' => 'Gagal memperbarui produk.'
            ];
        }
    }

    public function deleteProduk($id)
    {
        $sql = "DELETE FROM produks WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            return [
                'status' => true,
                'msg' => 'Produk berhasil dihapus.'
            ];
        } else {
            return [
                'status' => false,
                'msg' => 'Gagal menghapus produk.'
            ];
        }
    }
}