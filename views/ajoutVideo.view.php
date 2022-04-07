<?php 

ob_start(); 

?>


<form>
    <div class="form-group">
        <label for="Titre" class="form-control" name="titre">Titre : </label>
        <input type="text" id="Titre" aria-describedby="Titre du film">
    </div>
    <div class="form-group">
        <label for="Duree" class="form-control" name="duree">Durée : </label>
        <input type="text" id="Titre" aria-describedby="Durée du film">
    </div>
    <div class="form-group"> <label for="photo" class="form-control">Titre </label>

        <input type="file" id="Titre" aria-describedby="photo du film">


</form>
<?php

$content = ob_get_clean();

$titre = "Ajout d'une video MGA";

require "template.php";

?>