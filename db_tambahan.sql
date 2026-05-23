CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `ID_kategori`   INT AUTO_INCREMENT PRIMARY KEY,
  `nama_kategori` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk`    INT AUTO_INCREMENT PRIMARY KEY,
  `nama_produk`  VARCHAR(255) NOT NULL,
  `harga`        INT NOT NULL DEFAULT 0,
  `stok`         INT NOT NULL DEFAULT 0,
  `deskripsi`    TEXT,
  `id_kategori`  INT DEFAULT NULL,
  `foto_produk`  VARCHAR(500) DEFAULT NULL,
  `created_at`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori`(`ID_kategori`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
