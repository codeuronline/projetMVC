<?php
require_once "Model.class.php";
require_once "Video.class.php";

class VideoManager extends Model{

private $videos;


public function ajoutVideo($video){

$this->videos[] = $video;
}



public function getVideos()
{
return $this->videos;


}

public function chargementVideos(){
$req = $this->getBdd()->prepare("SELECT * FROM videos");
$req->execute();
$mesVideos = $req->fetchAll();
$req->closeCursor();

foreach($mesVideos as $video){
$l = new Video($video['id'],$video['titre'],$video['duree'],$video['photo']);
$this->ajoutVideo($l);
}

}
public function getVideoById($id){
for ($i=0; $i < count($this->videos); $i++) {
    if ($this->videos[$i]->getId()=== $id){
    return $this->videos[$i];
    }
    }
    }
    public function ajoutVideoBd($data){
    extract($data);
    $sql ="INSERT INTO videos(titre,duree,photo) VALUES (:titre,:duree,:photo) ";
    $pdo= $this->getBdd()->prepare($sql);
    foreach ($data as $key => $value) {
    $pdo->bindValue(":".$key, $value,PDO::PARAM_STR); # code...
    }
    // $pdo->bindValue(":titre", $titre,PDO::PARAM_STR);
    // $pdo->bindValue(":duree", $duree,PDO::PARAM_STR);
    // $pdo->bindValue(":photo", $photo,PDO::PARAM_STR);
    $resultat=$pdo->execute();
    $pdo->closeCursor;
    if ($resultat>0) {
    $data['id']=$this->getBdd()->lastInsertId();
    $video = new Video($data);
    $this->ajoutVideo($video);
    }
    }

    }

    ?>