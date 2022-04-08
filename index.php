<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/VideosControllers.php";
$videoController= new VideosController;
try {
    var_dump($_SERVER['REQUEST_METHOD']);
    if (empty($_GET['slug'])) {
    require "views/accueil.view.php";
} else {
        $url = explode("/", filter_var($_GET['slug']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
        case 'accueil':
            require "views/accueil.view.php";
            break;
        case 'videos':
            if (empty($url[1])) {
                $videoController->afficherVideos();
            } elseif ($url[1] === "s") {
                $videoController->afficherVideo($url[2]);
                echo "Affichage d'une video";
            } elseif ($url[1] === "a") {
                echo "Ajouter une video";
                $videoController->ajoutVideo();
            } elseif ($url[1] === "u") {
                echo "Modification d'une video";
            } elseif ($url[1] === 'd') {
                echo "Suppression d'une video";
            } elseif ($url[1] === 'av') {
                
                $videoController->ajoutVideoValidation();
                echo "Valider l'enregistrement d'une video";
            
            } else {
                throw new Exception("Error Processing Request", 1);
            }
        break;
        default:
            throw new Exception("Error Processing Request", 1);
    }
}
} catch (Exception $e) {
    echo $e->getMessage();
}