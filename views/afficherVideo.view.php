<?php 
require_once "models/Video.class.php";
require_once  "models/VideoManager.class.php";
$videoManager = new VideoManager;
$videoManager->chargementVideos();
$video= $videoManager->getVideoById($id);

ob_start(); 
?>
<table class="table text-center">

    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Durée</th>
        <th>Actions</th>
    </tr>

    <tr>
        <td class="align-middle"><img src="public/element/avenger.jpg" alt="" width="60px" srcset="">
        </td>
        <td class="align-middle">AVENGERS : ENDGAME</td>
        <td class="align-middle">3 h 02 min</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class=" align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
    </tr>

</table>
<a href="<?=URL?>videos/a/" class="btn btn-success d-block">Ajouter</a>
<!--<div class=" row">
    <div class="col-6">
        <img src="<?=URL ?>public/images/<?=$video->getPhoto();?>" alt="" srcset="">
    </div>
    <div class="col-6">
        <p>Titre:
            <?$video->getTitre();?>
        </p>
        <p>
            Durée:
            <?$video->getDuree();?>
        </p>
    </div>
    </div>-->
<?php
$content = ob_get_clean();
$titre = $video->getTitre();

require "template.php";

?>