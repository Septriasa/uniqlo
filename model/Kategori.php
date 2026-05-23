<?php
// 1. Panggil file database.php menggunakan __DIR__ agar jalurnya lebih aman dan presisi
require_once __DIR__ . '../../config/database.php';

class Kategori {
    private $db;

    // 2. Konstruktor untuk menginisialisasi koneksi database
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    // 3. Mengambil semua data kategori
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM tb_kategori ORDER BY ID_kategori DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 4. Mengambil satu data kategori berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_kategori WHERE ID_kategori = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 5. Menambahkan data kategori baru
    public function store($nama) {
        $query = "INSERT INTO tb_kategori (nama_kategori) VALUES (?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nama]);
    }

    // 6. Mengubah/Update data kategori
    public function update($id, $nama) {
        $stmt = $this->db->prepare("UPDATE tb_kategori SET nama_kategori=? WHERE ID_kategori=?");
        return $stmt->execute([$nama, $id]);
    }

    // 7. Menghapus data kategori
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tb_kategori WHERE ID_kategori = ?");
        return $stmt->execute([$id]);
    }

    // 8. Menghitung total data kategori (biasanya dipake untuk dashboard/informasi)
    public function count() {
        return $this->db->query("SELECT COUNT(*) FROM tb_kategori")->fetchColumn();
    }
}
?>