<?php
require_once __DIR__ . '/../config/database.php';

class Produk {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT p.*, k.nama_kategori FROM tb_produk p LEFT JOIN tb_kategori k ON p.id_kategori = k.ID_kategori ORDER BY p.id_produk DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_produk WHERE id_produk = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($data) {
        $query = "INSERT INTO tb_produk (nama_produk, harga, stok, deskripsi, id_kategori, foto_produk) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nama_produk'], $data['harga'], $data['stok'], $data['deskripsi'], $data['id_kategori'], $data['foto_produk']]);
    }

    public function update($id, $data) {
        $query = "UPDATE tb_produk SET nama_produk=?, harga=?, stok=?, deskripsi=?, id_kategori=?, foto_produk=? WHERE id_produk=?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$data['nama_produk'], $data['harga'], $data['stok'], $data['deskripsi'], $data['id_kategori'], $data['foto_produk'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tb_produk WHERE id_produk = ?");
        return $stmt->execute([$id]);
    }

    public function count() {
        return $this->db->query("SELECT COUNT(*) FROM tb_produk")->fetchColumn();
    }
}
