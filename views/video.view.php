<?php 

ob_start(); 

?>



<table class="table text-center">

    <tr class="table-dark">

        <th>Photo</th>

        <th>Titre</th>

        <th>Durée</th>

        <th colspan="2">Actions</th>

    </tr>



    <?php for($i=0; $i < count(@$videos);$i++) :?>

    <tr>

        <td class="align-middle"><img src="public/element/<?= @$videos[$i]->getImage()?>" width="60px;"></td>

        <td class="align-middle">
            <a href="<?=URL?>/video/s/<?=@$videos[$i]->getId()?>"><?= @$videos[$i]->getTitre(); ?></a>
        </td>

        <td class=" align-middle"><?= @$videos[$i]->getDuree(); ?></td>

        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>

        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>

    </tr>

    <?php endfor; 
     ?>
</table>


<a href="<?=URL?>videos/a" class="btn btn-success d-block">Ajouter</a>

<?php

$content = ob_get_clean();

$titre = "Les Videos de la VJK";

require "template.php";