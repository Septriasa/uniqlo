<?php
// uniqlo/controller/KategoriController.php
// JANGAN ADA SPASI ATAU KARAKTER SEBELUM <?php !!!

require_once __DIR__ . '/../model/Kategori.php';

class KategoriController {

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
        $kategori = new Kategori();
        $data = $kategori->getAll();
        $_SESSION['kategori_data'] = $data;
        include __DIR__ . '/../page/admin/admin-page/view_kategori.php';
        exit();
    }

    public function create() {
        include __DIR__ . '/../page/admin/admin-page/form_kategori_input.php';
        exit();
    }

    public function store() {
        if (isset($_POST['nama_kategori']) && !empty(trim($_POST['nama_kategori']))) {
            $nama = trim($_POST['nama_kategori']);
            $kategori = new Kategori();
            $kategori->store($nama);
            $this->safeRedirect('?page=kategori&action=index&success=tambah');
        } else {
            $this->safeRedirect('?page=kategori&action=create&error=1');
        }
    }

    public function edit() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $kategori = new Kategori();
            $data = $kategori->getById($id);
            if ($data) {
                $_SESSION['edit_kategori'] = $data;
                include __DIR__ . '/../page/admin/admin-page/form_kategori_edit.php';
                exit();
            }
        }
        $this->safeRedirect('?page=kategori&action=index');
    }

    public function update() {
        if (isset($_POST['id'], $_POST['nama_kategori']) && is_numeric($_POST['id']) && !empty(trim($_POST['nama_kategori']))) {
            $id = (int)$_POST['id'];
            $nama = trim($_POST['nama_kategori']);
            $kategori = new Kategori();
            $kategori->update($id, $nama);
            $this->safeRedirect('?page=kategori&action=index&success=edit');
        } else {
            $this->safeRedirect('?page=kategori&action=index&error=1');
        }
    }

    public function delete() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $kategori = new Kategori();
            $kategori->delete($id);
            $this->safeRedirect('?page=kategori&action=index&success=hapus');
        } else {
            $this->safeRedirect('?page=kategori&action=index');
        }
    }
}

// JANGAN ADA SPASI ATAU KARAKTER SETELAH ?>
