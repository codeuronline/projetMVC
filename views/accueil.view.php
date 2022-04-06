<?php
ob_start(); ?>
<center>
    <p>
    <h1> le contenu de ma page d'accueil</h1>
    </p>
</center>
<?php
$titre = "Videothèque MGA";
$content = ob_get_clean();
require "template.php";