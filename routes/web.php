<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        include "page/home.php";
        break;
    case 'detail':
        include "page/detail.php";
        break;
    case 'pria':
        include "page/pria.php";
        break;
    case 'wanita':
        include "page/wanita.php";
        break;
    case 'anak':
        include "page/anak.php";
        break;
    case 'showall':
        include "page/showall.php";
        break;
    default:
        include "page/home.php";
        break;
}
?>