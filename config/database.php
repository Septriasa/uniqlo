<?php
class Database {
    // Properti konfigurasi database
    private $host     = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'uniqlouse';
    private $koneksi;

    // Method untuk membuat dan mengambil koneksi
    public function getConnection() {
        $this->koneksi = null;

        try {
            // Membuat koneksi PDO
            $this->koneksi = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=utf8mb4", 
                $this->username, 
                $this->password
            );
            
            // Mengatur mode error
            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->koneksi->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }

        return $this->koneksi;
    }
}
?>