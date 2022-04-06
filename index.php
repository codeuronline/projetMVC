<?php
if (empty($_GET['slug'])) {
    require "view/accueil.view.php";
} else {
    switch ($_GET['slug']) {
        case 'accueil':
            require "view/accueil.view.php";
            break;
            case 'videos':
                require "view/videos.view.php";
                break;
    default:
            echo "<center><h1>Erreur 404 PAGE not Found</h1></center>";
    }
}