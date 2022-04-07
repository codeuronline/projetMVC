<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
    <title><?=$titre?></title>
</head>

<body>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="<?=URL?>accueil">Accueil</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="<?=URL?>videos">Videos</a>
            </li>
        </ul>
    </div>
    <?=$content?>
</body>

</html>