<?php
require_once __DIR__ . '/../config/database.php';

class Kategori {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // Ambil semua kategori
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM tb_kategori ORDER BY ID_kategori DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambah kategori baru
    public function store($nama) {
        $query = "INSERT INTO tb_kategori (nama_kategori) VALUES (?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nama]);
    }

    // Hapus kategori
    // public function delete($id) {
    //     $query = "DELETE FROM tb_kategori WHERE ID_kategori = ?";
    //     $stmt = $this->db->prepare($query);
    //     return $stmt->execute([$id]);
    // }
}
