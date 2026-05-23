<?php
ob_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Kategori.php';
require_once __DIR__ . '/../model/Produk.php';
require_once __DIR__ . '/../controller/KategoriController.php';
require_once __DIR__ . '/../controller/ProdukController.php';

$page   = $_GET['page']   ?? 'dashboard';
$action = $_GET['action'] ?? 'index';

$kategoriController = new KategoriController();
$produkController   = new ProdukController();

switch ($page) {
    case 'dashboard':
        include __DIR__ . '/../page/admin/admin-page/dashboard_home.php';
        break;

    case 'kategori':
        switch ($action) {
            case 'index':
                $kategoriController->index();
                break;
            case 'create':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $kategoriController->store();
                } else {
                    $kategoriController->create();
                }
                break;
            case 'edit':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $kategoriController->update();
                } else {
                    $kategoriController->edit();
                }
                break;
            case 'delete':
                $kategoriController->delete();
                break;
            default:
                $kategoriController->index();
                break;
        }
        break;

    case 'produk':
        switch ($action) {
            case 'index':
                $produkController->index();
                break;
            case 'create':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $produkController->store();
                } else {
                    $produkController->create();
                }
                break;
            case 'edit':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $produkController->update();
                } else {
                    $produkController->edit();
                }
                break;
            case 'delete':
                $produkController->delete();
                break;
            default:
                $produkController->index();
                break;
        }
        break;

    default:
        include __DIR__ . '/../page/admin/admin-page/dashboard_home.php';
        break;
}

ob_end_flush();
?>