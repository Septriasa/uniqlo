<?php

    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        if($page == 'home') include "page/home.php";
        else if ($page == 'showall') include "page/showall.php";
        
 ?>