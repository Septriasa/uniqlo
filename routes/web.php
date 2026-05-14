<?php
// Mengambil parameter 'page' dari URL, contoh: index.php?page=detail
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include "page/home.php";
        break;
    case 'detail':
        include "page/detail.php";
        break;
    case 'showall':
        include "page/showall.php";
        break;
    default:
        include "page/home.php";
        break;
}
?>