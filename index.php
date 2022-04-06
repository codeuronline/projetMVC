<?php
if (empty($_GET['slug'])) {
    require "views/accueil.views.php";
} else {
    switch ($_GET['slug']) {
        case 'accueil':
            require "views/accueil.views.php";
            break;
    default:echo "<center><h1>Erreur 404 PAGE not Found</h1></center>";
    }
}