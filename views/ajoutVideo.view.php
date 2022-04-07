<?php 

ob_start(); 

?>


<form method="post" action="<?=URL?>videos/av/" enctype="multipart/form-data">
    <div class=" form-group">
        <label for="Titre" class="form-control">Titre : </label>
        <input type="text" id="Titre" aria-describedby="Titre du film" name="titre">
    </div>
    <div class="form-group">
        <label for="Duree" class="form-control">Durée : </label>
        <input type="text" id="duree" aria-describedby="Durée du film" name="duree">
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
$titre = "Ajout d'une video à la VJK";
require "template.php";
?>