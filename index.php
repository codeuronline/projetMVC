<?php
if (empty($_GET['page'])) {
    require "views/accueil.views.php";
} else {
    switch ($variable) {
        case 'accueil':
            require "views/accueil.views.php";
            break;
    }
}