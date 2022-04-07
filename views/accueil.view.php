<?php 
ob_start(); 
?>



<center>
    <h1>
        Ici la page d'accueil
    </h1>
</center>

<?php


$titre = "Vidothèque MGA";
$content = ob_get_clean();
require "template.php";

?>