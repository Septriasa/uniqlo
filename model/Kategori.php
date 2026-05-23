<?php
require_once __DIR__ . '../../config/database.php';

class Kategori {
    private $db;
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM tb_kategori ORDER BY ID_kategori DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_kategori WHERE ID_kategori = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($nama) {
        $query = "INSERT INTO tb_kategori (nama_kategori) VALUES (?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nama]);
    }

    public function update($id, $nama) {
        $stmt = $this->db->prepare("UPDATE tb_kategori SET nama_kategori=? WHERE ID_kategori=?");
        return $stmt->execute([$nama, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tb_kategori WHERE ID_kategori = ?");
        return $stmt->execute([$id]);
    }

    public function count() {
        return $this->db->query("SELECT COUNT(*) FROM tb_kategori")->fetchColumn();
    }
}
?>