<?php
require_once "models/Video.class.php";
require_once  "models/VideoManager.class.php";
$videoManager = new VideoManager;
$videoManager->chargementVideos();

    ob_start();
?>
<table class="table text-center">

    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Durée</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php 
        $videos = $videoManager->getVideos();
        for ($i=0; $i < count($videos); $i++) :?>

    <tr>
        <td class="align-middle"><img src="public/images/<?=$videos[$i]->getPhoto()?>" alt="" width="60px" srcset="">
        </td>
        <td class="align-middle"><a href="<?=URL?>/videos/s/<?=$videos[$i]->getId()?>"><?=$videos[$i]->getTitre()?></a>
        </td>
        <td class=" align-middle"><?=$videos[$i]->getDuree()?></td>
        <td class="align-middle"><a href="<?=URL?>/videos/u/<?=$videos[$i]->getId()?>"
                class="btn btn-warning">Modifier</a></td>
        <td class=" align-middle"><a href="<?=URL?>/videos/d/<?=$videos[$i]->getId()?>"
                class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endfor ?>
</table>
<a href="<?= URL ?>videos/a/" class="btn btn-success d-block">Ajouter</a>
<?php
$content = ob_get_clean();

$titre = "liste des vidéos"; // $videos->getTitre();
require "template.php";

?>