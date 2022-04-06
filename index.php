<?php
require_once "Controllers/videos.controller.php";
$videoController= new VideosController;
if (empty($_GET['slug'])) {
    require "views/accueil.view.php";
} else {
    switch ($_GET['slug']) {
        case 'accueil':
            require "views/accueil.view.php";
            break;
            case 'videos':
                $videoController->afficherVideos();
                break;
    default:
            echo "<center><h1>Erreur 404 PAGE not Found</h1></center>";
    }
}