<?php
// uniqlo/controller/ProdukController.php

require_once __DIR__ . '/../model/Produk.php';
require_once __DIR__ . '/../model/Kategori.php';

class ProdukController {

    private function safeRedirect($url) {
        if (!headers_sent()) {
            header("Location: " . $url);
            exit();
        } else {
            echo "<script>window.location.href = '" . $url . "';</script>";
            echo "<noscript><meta http-equiv='refresh' content='0;url=" . $url . "'></noscript>";
            exit();
        }
    }

    public function index() {
        $produk = new Produk();
        $data = $produk->getAll();
        $_SESSION['produk_data'] = $data;
        include __DIR__ . '/../page/admin/admin-page/view_produk.php';
        exit();
    }

    public function create() {
        $kategoriModel = new Kategori();
        // SINKRONISASI: Simpan data ke session 'kategori_list' agar terbaca oleh form_produk_input.php
        $_SESSION['kategori_list'] = $kategoriModel->getAll(); 
        
        // PERBAIKAN: Mengarah ke file form input produk yang benar sesuai struktur folder kamu
        include __DIR__ . '/../page/admin/admin-page/form_produk_input.php'; 
        exit();
    }

    public function store() {
        if (isset($_POST['nama_produk']) && !empty(trim($_POST['nama_produk']))) {
            $data = [
                'nama_produk' => trim($_POST['nama_produk']),
                'harga'       => (int)str_replace(['.', ','], '', $_POST['harga'] ?? 0),
                'stok'        => (int)($_POST['stok'] ?? 0),
                'deskripsi'   => trim($_POST['deskripsi'] ?? ''),
                'id_kategori' => !empty($_POST['id_kategori']) ? (int)$_POST['id_kategori'] : null, // Mengubah ke null jika tidak pilih kategori agar tidak memicu error foreign key
                'foto_produk' => trim($_POST['foto_produk'] ?? '')
            ];
            $produk = new Produk();
            $produk->store($data);
            $this->safeRedirect('?page=produk&action=index&success=tambah');
        } else {
            $this->safeRedirect('?page=produk&action=create&error=1');
        }
    }

    public function edit() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $produk = new Produk();
            $data = $produk->getById($id);
            if ($data) {
                $_SESSION['edit_produk'] = $data;
                $kategori = new Kategori();
                $_SESSION['kategori_list'] = $kategori->getAll();
                include __DIR__ . '/../page/admin/admin-page/form_produk_edit.php';
                exit();
            }
        }
        $this->safeRedirect('?page=produk&action=index');
    }

    public function update() {
        if (isset($_POST['id'], $_POST['nama_produk']) && is_numeric($_POST['id']) && !empty(trim($_POST['nama_produk']))) {
            $id = (int)$_POST['id'];
            $data = [
                'nama_produk' => trim($_POST['nama_produk']),
                'harga'       => (int)str_replace(['.', ','], '', $_POST['harga'] ?? 0),
                'stok'        => (int)($_POST['stok'] ?? 0),
                'deskripsi'   => trim($_POST['deskripsi'] ?? ''),
                'id_kategori' => !empty($_POST['id_kategori']) ? (int)$_POST['id_kategori'] : null,
                'foto_produk' => trim($_POST['foto_produk'] ?? '')
            ];
            $produk = new Produk();
            $produk->update($id, $data);
            $this->safeRedirect('?page=produk&action=index&success=edit');
        } else {
            $this->safeRedirect('?page=produk&action=index&error=1');
        }
    }

    public function delete() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $produk = new Produk();
            $produk->delete($id);
            $this->safeRedirect('?page=produk&action=index&success=hapus');
        } else {
            $this->safeRedirect('?page=produk&action=index');
        }
    }
}
?>