<?php 

ob_start(); 

?>



Ici la page d'accueil



<?php

$content = ob_get_clean();

$titre = "Vidothèque MGA";

require "template.php";

?>