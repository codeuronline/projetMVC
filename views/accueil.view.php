<?php 

ob_start(); 

?>



<center>
    <h1>
        Ici la page d'accueil
    </h1>
</center>

<?php

$content = ob_get_clean();

$titre = "Vidothèque MGA";

require "template.php";

?>