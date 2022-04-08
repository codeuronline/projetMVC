<?php
require_once "models/Video.class.php";
$data = [
    ["id" => 1, "titre" => "AVENGERS 1", "duree" => "2h23min", "photo" => "avenger1.jfif"],
    ["id" => 2, "titre" => "AVENGERS 2 : l'Ere d'Ultron", "duree" => "2h21min", "photo" => "avenger2.jfif"],
    ["id" => 3, "titre" => "AVENGERS 3 : Infinity War", "duree" => "2h29min", "photo" => "avenger3.jpg"],
    ["id" => 4, "titre" => "AVENGERS 4 : ENDGAME", "duree" => "3h2min", "photo" => "avenger4.jfif"]
];
require_once  "models\VideoManager.class.php";
$videoManager = new VideoManager;
/*for ($i=0; $i <count($data) ; $i++) { 
    $videoManager->ajoutVideo(new Video($data[$i]));
}*/
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
        <td class="align-middle"><?=$videos[$i]->getTitre()?>
        </td>
        <td class=" align-middle"><?=$videos[$i]->getDuree()?></td>
        <td class="align-middle"><a href="<?=URL?>/videos/u<?=$videos[$i]->getId()?>"
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