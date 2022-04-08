<?php
require_once "models/VideoTmp.class.php";
$information= [
    ["id"=> 1,"titre"=> "AVENGERS 1","duree"=> "2h23min","photo"=> "avenger1.jfif"],
    ["id"=> 2,"titre"=> "AVENGERS 2 : l'Ere d'Ultron","duree"=> "2h21min","photo" => "avenger2.jfif"],
    ["id"=> 3,"titre"=> "AVENGERS 3 : Infinity War","duree"=> "2h29min","photo" => "avenger3.jfif"],
    ["id"=> 4,"titre"=> "AVENGERS 4 : ENDGAME","duree"=> "3h2min","photo" => "avenger4.jpg"]
];
foreach ($information as $data) {
    $video= new Video($data);   # code...
}


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
<a href="<?= URL ?>videos/a/" class="btn btn-success d-block">Ajouter</a>
<!--<div class=" row">
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?= $video->getPhoto(); ?>" alt="" srcset="">
    </div>
    <div class="col-6">
        <p>Titre:
            <? $video->getTitre(); ?>
        </p>
        <p>
            Durée:
            <? $video->getDuree(); ?>
        </p>
    </div>
    </div>-->
<?php
$content = ob_get_clean();
$titre = $video->getTitre();

require "template.php";

?>