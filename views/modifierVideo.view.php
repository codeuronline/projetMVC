<?php 
ob_start(); 
?>
<form method="POST" action="<?= URL ?>videos/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $video->getTitre()?>">
    </div>
    <div class="form-group">
        <label for="duree">Durée : </label>
        <input type="text" class="form-control" id="duree" name="duree" value="<?= $video->getDuree()?>">
    </div>
    <h3>Photo : </h3>
    <img src="<?= URL ?>public/images/<?= $video->getPhoto() ?>">
    <div class="form-group">
        <label for="photot">Changer la photo : </label>
        <input type="file" class="form-control-file" id="photo" name="photo">
    </div>
    <input type="hidden" name="id" value="<?= $video->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$content = ob_get_clean();
$titre = "Modification de la Video: ".$video->getTitre();
require "template.php";

?>