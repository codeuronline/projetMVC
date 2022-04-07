<?php 
ob_start(); 
?>
<div class="row">
    <div class="col-6">
        <img src="<?=URL ?>public/images/<?=$video->getPhoto();?>" alt="" srcset="">
    </div>
    <div class="col-6">
        <p>Titre:
            <?$video->getTitre();?>
        </p>
        <p>
            Durée:
            <?$video->getDuree();?>
        </p>
    </div>
</div>
<?php
$content = ob_get_clean();
$titre = $video->getTitre();

require "template.php";

?>