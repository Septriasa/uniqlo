<?php
class Database {
    private $host     = 'localhost';
    private $username = 'hexacode_uniqlouser';
    private $password = 'rahasiaUniqlouse';
    private $database = 'hexacode_db_tambahan';
    private $koneksi;

    public function getConnection() {
        $this->koneksi = null;

        try {
            $this->koneksi = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=utf8mb4", 
                $this->username, 
                $this->password
            );
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->koneksi->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
        return $this->koneksi;
    }
}
?>