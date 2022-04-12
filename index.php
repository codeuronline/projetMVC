<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once "controllers/VideosControllers.php";
$videosController = new VideosController();

error_log("instance :" . print_r($videosController, 1));
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
                    $videosController->afficherVideos();
                } elseif ($url[1] === "s") {
                    $videosController->afficherVideo($url[2]);
                    echo "Affichage d'une video";
                } elseif ($url[1] === "a") {
                    echo "Ajouter une video";
                    $videosController->ajoutVideo();
                } elseif ($url[1] === "u") {
                    echo "Modification d'une video";
                    $videosController->modificationVideo($url[2]);
                } elseif ($url[1] === 'd') {
                    echo "Suppression d'une video";
                    $videosController->suppressionVideo($url[2]);
                } elseif ($url[1] === 'av') {
                    echo "Valider l'enregistrement d'une video";
                    $videosController->ajoutVideoValidation();
                } elseif ($url[1] === 'uv') {
                    echo "Valider la modfication d'une video";
                    $videosController->ajoutVideoValidation();
                } else {
                    throw new Exception("La page n'existe pas");
                }
                break;

            default:
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}