<?php 

ob_start(); 

?>


<form method="POST" action="<?=URL?>video/av" enctype="multipart/form-data">
    <div class=" form-group">
        <label for="Titre" class="form-control" name="titre">Titre : </label>
        <input type="text" id="Titre" aria-describedby="Titre du film">
    </div>
    <div class="form-group">
        <label for="Duree" class="form-control" name="duree">Durée : </label>
        <input type="text" id="Titre" aria-describedby="Durée du film">
    </div>
    <div class="form-group">
        <label for="photo" class="form-control">Photo : </label>
        <input type="file" id="Photo" aria-describedby="photo du film" name="photo">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
    <button type="cancel" class="btn btn-primary">Annuler</button>
</form>
<?php
$content = ob_get_clean();
$titre = "Ajout d'une video MGA";
require "template.php";
?>